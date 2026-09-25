{{-- Stats Section --}}
<section class="section stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card reveal-up" data-delay="1">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="28" height="28">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                </div>
                <span class="stat-number" data-count="{{ $stats['projects'] ?? 3 }}">{{ $stats['projects'] ?? 3 }}</span>
                <span class="stat-label" data-lang-id="Proyek Selesai">Projects Completed</span>
                <div class="stat-accent"></div>
            </div>

            <div class="stat-card reveal-up" data-delay="2">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="28" height="28">
                        <polyline points="16 18 22 12 16 6"/>
                        <polyline points="8 6 2 12 8 18"/>
                    </svg>
                </div>
                <span class="stat-number" data-count="{{ $stats['technologies'] ?? 8 }}">{{ $stats['technologies'] ?? 8 }}</span>
                <span class="stat-label" data-lang-id="Teknologi Dipelajari">Technologies Learned</span>
                <div class="stat-accent"></div>
            </div>

            <div class="stat-card reveal-up" data-delay="3">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="28" height="28">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <span class="stat-number" data-count="{{ $stats['years'] ?? 3 }}">{{ $stats['years'] ?? 3 }}</span>
                <span class="stat-label" data-lang-id="Tahun Belajar">Years Learning</span>
                <div class="stat-accent"></div>
            </div>

            <div class="stat-card reveal-up" data-delay="4">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="28" height="28">
                        <path d="M12 2 2 7l10 5 10-5-10-5z"/>
                        <path d="m2 17 10 5 10-5"/>
                        <path d="m2 12 10 5 10-5"/>
                    </svg>
                </div>
                <span class="stat-number" data-count="{{ $stats['lines_of_code'] ?? 10000 }}" data-format="formatted">{{ $stats['lines_of_code_formatted'] ?? '10.000+' }}</span>
                <span class="stat-label" data-lang-id="Baris Kode">Lines of Code</span>
                <div class="stat-accent"></div>
            </div>
        </div>
    </div>
</section>
