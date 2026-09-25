<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GitHubService
{
    /**
     * Get the configured GitHub username.
     */
    public function getUsername(): string
    {
        return env('GITHUB_USERNAME', 'IbnuAthatoriW');
    }

    /**
     * Get cache duration in seconds.
     * Uses 60 seconds in local environment for fast auto-updates, 1 hour in production.
     */
    public function getCacheTtl(): int
    {
        if (env('GITHUB_CACHE_TTL') !== null) {
            return (int) env('GITHUB_CACHE_TTL');
        }

        return app()->environment('local') ? 60 : 3600;
    }

    /**
     * Fetch public repositories from GitHub API.
     *
     * Returns cached data when available. Falls back to empty array on failure.
     *
     * @param  int  $perPage  Number of repos to fetch
     */
    public function getRepositories(int $perPage = 30): array
    {
        $username = $this->getUsername();
        $cacheKey = "github_repos_{$username}";

        // Force refresh cache if ?refresh=1 is passed in request
        if (request()->has('refresh')) {
            Cache::forget($cacheKey);
            Cache::forget("github_stats_{$username}");
            Cache::forget("github_skills_{$username}");
        }

        return Cache::remember($cacheKey, $this->getCacheTtl(), function () use ($cacheKey, $username, $perPage) {
            try {
                $headers = [
                    'Accept' => 'application/vnd.github.v3+json',
                    'User-Agent' => 'Laravel-Portfolio',
                ];

                if ($token = env('GITHUB_TOKEN')) {
                    $headers['Authorization'] = "Bearer {$token}";
                }

                $response = Http::withHeaders($headers)
                    ->timeout(10)
                    ->get("https://api.github.com/users/{$username}/repos", [
                        'sort' => 'updated',
                        'direction' => 'desc',
                        'per_page' => $perPage,
                        'type' => 'all',
                    ]);

                if ($response->successful()) {
                    return $this->transformRepositories($response->json());
                }

                Log::warning('GitHub API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return Cache::get("{$cacheKey}_stale", []);
            } catch (\Exception $e) {
                Log::error('GitHub API error', ['message' => $e->getMessage()]);

                return Cache::get("{$cacheKey}_stale", []);
            }
        });
    }

    /**
     * Get computed portfolio stats automatically from GitHub data.
     */
    public function getStats(): array
    {
        $username = $this->getUsername();
        $cacheKey = "github_stats_{$username}";

        if (request()->has('refresh')) {
            Cache::forget($cacheKey);
        }

        return Cache::remember($cacheKey, $this->getCacheTtl(), function () {
            $repos = $this->getRepositories(100);

            // Total projects count from GitHub
            $projectsCount = count($repos);

            // Collect unique technologies and languages from GitHub repos
            $languages = collect($repos)->pluck('language')->filter()->unique();
            $topics = collect($repos)->pluck('topics')->flatten()->filter()->unique();

            // Core technologies stack + detected repo languages
            $baseTechs = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Node.js', 'MySQL', 'REST API'];
            $allTechs = $languages->merge($topics)->merge($baseTechs)->unique()->values();
            $techCount = count($allTechs);

            // Calculate estimated lines of code (KB size * ~45 lines/KB)
            $totalKb = collect($repos)->sum('size');
            $linesOfCode = max(12500, (int) ($totalKb * 45));

            // Calculate learning years dynamically from earliest repository creation date
            $earliestYear = collect($repos)
                ->pluck('created_at')
                ->filter()
                ->map(fn ($date) => (int) date('Y', strtotime($date)))
                ->min() ?: (date('Y') - 2);

            $calculatedYears = max(1, (int) date('Y') - $earliestYear + 1);
            $yearsLearning = env('PORTFOLIO_YEARS_LEARNING', $calculatedYears);

            return [
                'projects' => $projectsCount > 0 ? $projectsCount : 3,
                'technologies' => $techCount > 0 ? $techCount : 8,
                'years' => $yearsLearning,
                'lines_of_code' => $linesOfCode,
                'lines_of_code_formatted' => number_format($linesOfCode, 0, ',', '.').'+',
            ];
        });
    }

    /**
     * Get dynamic skills aggregated directly from GitHub repositories.
     */
    public function getSkills(): array
    {
        $username = $this->getUsername();
        $cacheKey = "github_skills_{$username}";

        if (request()->has('refresh')) {
            Cache::forget($cacheKey);
        }

        return Cache::remember($cacheKey, $this->getCacheTtl(), function () {
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

            // Dynamically add any newly discovered languages from GitHub repos
            foreach ($languageCounts as $lang => $count) {
                $alreadyIncluded = collect($frontendList)->pluck('name')
                    ->merge(collect($backendList)->pluck('name'))
                    ->merge(collect($toolsList)->pluck('name'))
                    ->contains($lang);

                if (! $alreadyIncluded) {
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
     * @param  array  $repos  Raw GitHub API response
     * @return array Transformed repository data
     */
    protected function transformRepositories(array $repos): array
    {
        return collect($repos)
            ->filter(fn ($repo) => ! $repo['archived'])
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
                    'created_at' => $repo['created_at'] ?? null,
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
     * @param  string  $name  Raw repository name
     * @return string Formatted name
     */
    protected function formatRepoName(string $name): string
    {
        return ucwords(str_replace(['-', '_'], ' ', $name));
    }
}
