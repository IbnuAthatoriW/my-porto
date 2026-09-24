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
