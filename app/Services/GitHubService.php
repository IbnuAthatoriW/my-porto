<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GitHubService
{
    /**
     * The GitHub username to fetch repositories for.
     */
    protected string $username = 'IbnuAthatoriW';

    /**
     * Cache duration in seconds (1 hour).
     */
    protected int $cacheTtl = 3600;

    /**
     * Fetch public repositories from GitHub API.
     *
     * Returns cached data when available. Falls back to empty array on failure.
     *
     * @param int $perPage Number of repos to fetch
     * @return array
     */
    public function getRepositories(int $perPage = 30): array
    {
        $cacheKey = "github_repos_{$this->username}";

        return Cache::remember($cacheKey, $this->cacheTtl, function () use ($perPage) {
            try {
                $response = Http::withHeaders([
                    'Accept' => 'application/vnd.github.v3+json',
                    'User-Agent' => 'Laravel-Portfolio',
                ])->timeout(10)->get("https://api.github.com/users/{$this->username}/repos", [
                    'sort' => 'updated',
                    'direction' => 'desc',
                    'per_page' => $perPage,
                    'type' => 'owner',
                ]);

                if ($response->successful()) {
                    return $this->transformRepositories($response->json());
                }

                Log::warning('GitHub API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return [];
            } catch (\Exception $e) {
                Log::error('GitHub API error', ['message' => $e->getMessage()]);
                return [];
            }
        });
    }

    /**
     * Get computed portfolio stats automatically from GitHub data.
     *
     * @return array
     */
    public function getStats(): array
    {
        $cacheKey = "github_stats_{$this->username}";

        return Cache::remember($cacheKey, $this->cacheTtl, function () {
            $repos = $this->getRepositories(100);

            // Total projects count
            $projectsCount = count($repos);

            // Collect unique technologies and languages
            $languages = collect($repos)->pluck('language')->filter()->unique();
            $topics = collect($repos)->pluck('topics')->flatten()->filter()->unique();
            
            // Core technologies stack + detected repo languages
            $baseTechs = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Node.js', 'MySQL', 'REST API'];
            $allTechs = $languages->merge($topics)->merge($baseTechs)->unique()->values();
            $techCount = count($allTechs);

            // Calculate estimated lines of code (KB size * ~45 lines/KB)
            $totalKb = collect($repos)->sum('size');
            $linesOfCode = max(10000, $totalKb * 45);

            return [
                'projects' => $projectsCount > 0 ? $projectsCount : 3,
                'technologies' => $techCount > 0 ? $techCount : 8,
                'years' => 3,
                'lines_of_code' => $linesOfCode,
                'lines_of_code_formatted' => number_format($linesOfCode, 0, ',', '.') . '+',
            ];
        });
    }

    /**
     * Get dynamic skills aggregated directly from GitHub repositories.
     *
     * @return array
     */
    public function getSkills(): array
    {
        $cacheKey = "github_skills_{$this->username}";

        return Cache::remember($cacheKey, $this->cacheTtl, function () {
            $repos = $this->getRepositories(100);

            // Aggregate language frequency and topics from GitHub repos
            $languageCounts = [];
            foreach ($repos as $repo) {
                $lang = $repo['language'] ?? null;
                if ($lang) {
                    $languageCounts[$lang] = ($languageCounts[$lang] ?? 0) + 1;
                }
                foreach ($repo['topics'] ?? [] as $topic) {
                    $topicName = ucwords(str_replace(['-', '_'], ' ', $topic));
                    $languageCounts[$topicName] = ($languageCounts[$topicName] ?? 0) + 1;
                }
            }

            // Standard categories mapping
            $frontendTechs = ['HTML', 'CSS', 'JavaScript', 'Blade', 'Vue', 'React', 'TypeScript', 'Tailwind', 'Bootstrap', 'Responsive Design'];
            $backendTechs = ['PHP', 'Laravel', 'Node.js', 'Express.js', 'Express', 'MySQL', 'REST API', 'Python', 'Java', 'C++', 'Go'];
            $toolsTechs = ['Git', 'GitHub', 'UI/UX Basics', 'Docker', 'Vite', 'Postman', 'Figma'];

            // Build list for Frontend
            $frontendList = [];
            foreach ($frontendTechs as $tech) {
                if (isset($languageCounts[$tech]) || in_array($tech, ['HTML', 'CSS', 'JavaScript', 'Responsive Design'])) {
                    $count = $languageCounts[$tech] ?? 1;
                    $percentage = min(95, max(60, 65 + ($count * 8)));
                    $frontendList[] = [
                        'name' => $tech,
                        'percentage' => $percentage,
                        'repo_count' => $count,
                    ];
                }
            }

            // Build list for Backend
            $backendList = [];
            foreach ($backendTechs as $tech) {
                if (isset($languageCounts[$tech]) || in_array($tech, ['PHP', 'Laravel', 'Node.js', 'Express.js', 'REST API'])) {
                    $count = $languageCounts[$tech] ?? 1;
                    $percentage = min(95, max(60, 60 + ($count * 8)));
                    $backendList[] = [
                        'name' => $tech,
                        'percentage' => $percentage,
                        'repo_count' => $count,
                    ];
                }
            }

            // Build list for Tools
            $toolsList = [];
            foreach ($toolsTechs as $tech) {
                $count = $languageCounts[$tech] ?? 1;
                $percentage = min(95, max(60, 70 + ($count * 5)));
                $toolsList[] = [
                    'name' => $tech,
                    'percentage' => $percentage,
                    'repo_count' => $count,
                ];
            }

            // Dynamically add any newly discovered languages from GitHub repos that are not in default lists
            foreach ($languageCounts as $lang => $count) {
                $alreadyIncluded = collect($frontendList)->pluck('name')
                    ->merge(collect($backendList)->pluck('name'))
                    ->merge(collect($toolsList)->pluck('name'))
                    ->contains($lang);

                if (!$alreadyIncluded) {
                    $percentage = min(95, max(60, 60 + ($count * 8)));
                    $backendList[] = [
                        'name' => $lang,
                        'percentage' => $percentage,
                        'repo_count' => $count,
                    ];
                }
            }

            return [
                'frontend' => $frontendList,
                'backend' => $backendList,
                'tools' => $toolsList,
            ];
        });
    }

    /**
     * Transform raw GitHub API data into a clean format for the portfolio.
     *
     * @param array $repos Raw GitHub API response
     * @return array Transformed repository data
     */
    protected function transformRepositories(array $repos): array
    {
        return collect($repos)
            ->filter(fn($repo) => !$repo['fork'] && !$repo['archived'])
            ->map(function ($repo) {
                return [
                    'name' => $this->formatRepoName($repo['name']),
                    'name_raw' => $repo['name'],
                    'description' => $repo['description'] ?? 'No description available.',
                    'html_url' => $repo['html_url'],
                    'homepage' => $repo['homepage'] ?? null,
                    'language' => $repo['language'],
                    'stars' => $repo['stargazers_count'],
                    'forks' => $repo['forks_count'],
                    'size' => $repo['size'] ?? 0,
                    'updated_at' => $repo['updated_at'],
                    'topics' => $repo['topics'] ?? [],
                ];
            })
            ->values()
            ->toArray();
    }

    /**
     * Format repository name into a human-readable title.
     * e.g., "my-cool-project" → "My Cool Project"
     *
     * @param string $name Raw repository name
     * @return string Formatted name
     */
    protected function formatRepoName(string $name): string
    {
        return ucwords(str_replace(['-', '_'], ' ', $name));
    }
}
