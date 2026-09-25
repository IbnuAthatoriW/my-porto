{{-- Projects Section --}}
<section id="projects" class="section projects-section">
    <div class="container">
        {{-- Section Header --}}
        <div class="section-header reveal-up">
            <span class="section-tag">03</span>
            <h2 class="section-title" data-lang-id="Proyek Unggulan">Featured Projects</h2>
            <div class="section-line"></div>
        </div>

        <p class="section-subtitle reveal-up" data-delay="1" data-lang-id="Kumpulan proyek publik saya yang terhubung langsung dari GitHub.">
            A selection of my public repositories directly synced from GitHub.
        </p>

        <div class="projects-grid">
            @forelse($projects ?? [] as $index => $project)
                <div class="project-card reveal-up" data-delay="{{ ($index % 3) + 2 }}">
                    <div class="project-card-header">
                        <div class="project-icon-badge">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="22" height="22">
                                <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/>
                                <path d="M9 18c-4.51 2-5-2-7-2"/>
                            </svg>
                        </div>
                        @if(!empty($project['language']))
                            <span class="project-lang-badge">{{ $project['language'] }}</span>
                        @endif
                        <div class="project-overlay">
                            <div class="project-overlay-actions">
                                <a href="{{ $project['html_url'] }}" class="project-link" target="_blank" rel="noopener noreferrer" aria-label="GitHub Repository">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="20" height="20">
                                        <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/>
                                        <path d="M9 18c-4.51 2-5-2-7-2"/>
                                    </svg>
                                </a>
                                @if(!empty($project['homepage']))
                                    <a href="{{ $project['homepage'] }}" class="project-link" target="_blank" rel="noopener noreferrer" aria-label="Live Demo">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="20" height="20">
                                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                            <polyline points="15 3 21 3 21 9"/>
                                            <line x1="10" x2="21" y1="14" y2="3"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="project-info">
                        <h3 class="project-name">{{ $project['name'] }}</h3>
                        <p class="project-description">{{ $project['description'] }}</p>

                        @if(!empty($project['topics']))
                            <div class="project-tech">
                                @foreach(array_slice($project['topics'], 0, 4) as $topic)
                                    <span class="tech-tag">{{ $topic }}</span>
                                @endforeach
                            </div>
                        @endif

                        <div class="project-stats">
                            @if(($project['stars'] ?? 0) > 0)
                                <span class="project-stat-item">
                                    <svg viewBox="0 0 24 24" fill="currentColor" width="14" height="14">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    {{ $project['stars'] }}
                                </span>
                            @endif
                            @if(($project['forks'] ?? 0) > 0)
                                <span class="project-stat-item">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14">
                                        <circle cx="12" cy="18" r="3"/><circle cx="6" cy="6" r="3"/><circle cx="18" cy="6" r="3"/>
                                        <path d="M6 9v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V9"/><path d="M12 12v3"/>
                                    </svg>
                                    {{ $project['forks'] }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="project-card reveal-up" style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                    <p data-lang-id="Tidak ada repositori publik ditemukan.">No public repositories found.</p>
                </div>
            @endforelse
        </div>

        {{-- GitHub CTA Footer --}}
        <div class="projects-footer reveal-up" data-delay="3">
            <a href="https://github.com/IbnuAthatoriW?tab=repositories" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="20" height="20">
                    <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/>
                    <path d="M9 18c-4.51 2-5-2-7-2"/>
                </svg>
                <span data-lang-id="Lihat Semua Repositori di GitHub">View All Repositories on GitHub</span>
            </a>

            <div class="github-sync-badge">
                <span class="github-pulse-dot"></span>
                <span data-lang-id="Otomatis terhubung dari GitHub">Auto-synced from GitHub</span>
            </div>
        </div>
    </div>
</section>
