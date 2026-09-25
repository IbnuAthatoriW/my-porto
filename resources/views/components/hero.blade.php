{{-- Hero Section --}}
<section id="home" class="hero">
    <div class="hero-bg-elements">
        <div class="hero-line hero-line-1"></div>
        <div class="hero-line hero-line-2"></div>
        <div class="hero-line hero-line-3"></div>
        <div class="hero-glow"></div>
    </div>

    <div class="hero-container">
        <div class="hero-content">
            {{-- Badge --}}
            <div class="hero-badge reveal-up">
                <span class="badge-dot"></span>
                <span data-lang-id="MAHASISWA INFORMATIKA • WEB DEVELOPER">INFORMATICS STUDENT • WEB DEVELOPER</span>
            </div>

            {{-- Squad Number Style Decorative --}}
            <div class="hero-number reveal-up" data-delay="1">
                <span>10</span>
            </div>

            {{-- Name --}}
            <h1 class="hero-name reveal-up" data-delay="2">
                <span class="hero-name-first">Ibnu Athatori</span>
                <span class="hero-name-last">Wibisono</span>
            </h1>

            {{-- Headline --}}
            <p class="hero-headline reveal-up" data-delay="3" data-lang-id-html="Menciptakan <span class=&quot;text-gold&quot;>pengalaman digital</span> dengan kode bersih dan desain modern.">
                Crafting <span class="text-gold">digital experiences</span> with clean code and modern design.
            </p>

            {{-- Description --}}
            <p class="hero-description reveal-up" data-delay="4" data-lang-id="Seorang developer yang bersemangat, fokus membangun aplikasi web yang elegan, berperforma tinggi, dan berpusat pada pengguna. Mengubah ide menjadi kenyataan yang sempurna.">
                A passionate developer focused on building elegant, performant, and user-centric web applications. Turning ideas into pixel-perfect reality.
            </p>

            {{-- CTA Buttons --}}
            <div class="hero-cta reveal-up" data-delay="5">
                <a href="#projects" class="btn btn-primary">
                    <span data-lang-id="Lihat Karya Saya">View My Work</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 17 5-5-5-5"/><path d="m13 17 5-5-5-5"/></svg>
                </a>
                <a href="#" class="btn btn-secondary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                    <span data-lang-id="Unduh CV">Download CV</span>
                </a>
            </div>

            {{-- Decorative Stats Row --}}
            <div class="hero-mini-stats reveal-up" data-delay="6">
                <div class="mini-stat">
                    <span class="mini-stat-number" data-count="{{ $stats['projects'] ?? 3 }}">{{ $stats['projects'] ?? 3 }}</span>
                    <span class="mini-stat-label" data-lang-id="Proyek">Projects</span>
                </div>
                <div class="mini-stat-divider"></div>
                <div class="mini-stat">
                    <span class="mini-stat-number" data-count="{{ $stats['technologies'] ?? 8 }}">{{ $stats['technologies'] ?? 8 }}</span>
                    <span class="mini-stat-label" data-lang-id="Teknologi">Technologies</span>
                </div>
                <div class="mini-stat-divider"></div>
                <div class="mini-stat">
                    <span class="mini-stat-number" data-count="{{ $stats['years'] ?? 3 }}">{{ $stats['years'] ?? 3 }}</span>
                    <span class="mini-stat-label" data-lang-id="Tahun Belajar">Years Learning</span>
                </div>
            </div>
        </div>

        {{-- Hero Visual --}}
        <div class="hero-visual reveal-up" data-delay="3">
            <div class="hero-visual-card">
                <div class="visual-card-inner">
                    <div class="visual-card-pattern">
                        <div class="pattern-line"></div>
                        <div class="pattern-line"></div>
                        <div class="pattern-line"></div>
                        <div class="pattern-line"></div>
                        <div class="pattern-line"></div>
                    </div>
                    <div class="visual-card-circle">
                        <svg viewBox="0 0 100 100" class="visual-card-svg">
                            <circle cx="50" cy="50" r="45" fill="none" stroke="var(--gold)" stroke-width="0.5" opacity="0.3"/>
                            <circle cx="50" cy="50" r="35" fill="none" stroke="var(--gold)" stroke-width="0.3" opacity="0.2"/>
                            <circle cx="50" cy="50" r="25" fill="none" stroke="var(--navy)" stroke-width="0.5" opacity="0.3"/>
                        </svg>
                    </div>
                    <div class="visual-card-badge">
                        <span class="visual-badge-icon">⟨/⟩</span>
                        <span class="visual-badge-text" data-lang-id="Developer">Developer</span>
                    </div>
                    <div class="visual-card-accent"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="scroll-indicator reveal-up" data-delay="7">
        <div class="scroll-mouse">
            <div class="scroll-dot"></div>
        </div>
        <span data-lang-id="Gulir ke Bawah">Scroll Down</span>
    </div>
</section>
