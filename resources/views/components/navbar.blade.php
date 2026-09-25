{{-- Navbar Component --}}
<nav id="navbar" class="navbar">
    <div class="navbar-container">
        {{-- Logo / Monogram --}}
        <a href="#home" class="navbar-logo">
            <span class="logo-monogram">Noe</span>
            <span class="logo-divider"></span>
            <span class="logo-text">Portofolio</span>
        </a>

        {{-- Desktop Navigation --}}
        <ul class="navbar-menu" id="navMenu">
            <li><a href="#home" class="nav-link active" data-lang-id="Beranda">Home</a></li>
            <li><a href="#about" class="nav-link" data-lang-id="Tentang">About</a></li>
            <li><a href="#skills" class="nav-link" data-lang-id="Keahlian">Skills</a></li>
            <li><a href="#projects" class="nav-link" data-lang-id="Proyek">Projects</a></li>
            <li><a href="#experience" class="nav-link" data-lang-id="Pengalaman">Experience</a></li>
            <li><a href="#contact" class="nav-link" data-lang-id="Kontak">Contact</a></li>
        </ul>

        <div class="navbar-actions">
            {{-- Language Switcher --}}
            <div class="lang-switcher">
                <button class="lang-toggle" id="langToggle" aria-label="Toggle language" type="button">
                    <span class="lang-flag" id="langFlag">🇬🇧</span>
                    <span class="lang-code" id="langCode">EN</span>
                    <svg class="lang-arrow" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                </button>

                {{-- Language Dropdown --}}
                <div class="lang-dropdown" id="langDropdown">
                    <button class="lang-option active" data-lang="en" type="button">
                        <span class="lang-option-label">English</span>
                        <svg class="lang-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </button>
                    <button class="lang-option" data-lang="id" type="button">
                        <span class="lang-option-label">Indonesia</span>
                        <svg class="lang-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </button>
                </div>
            </div>

            {{-- Hamburger Menu --}}
            <button class="hamburger" id="hamburger" aria-label="Toggle menu">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </div>

    {{-- Mobile Menu Overlay --}}
    <div class="mobile-menu" id="mobileMenu">
        <ul class="mobile-menu-list">
            <li><a href="#home" class="mobile-nav-link" data-lang-id="Beranda">Home</a></li>
            <li><a href="#about" class="mobile-nav-link" data-lang-id="Tentang">About</a></li>
            <li><a href="#skills" class="mobile-nav-link" data-lang-id="Keahlian">Skills</a></li>
            <li><a href="#projects" class="mobile-nav-link" data-lang-id="Proyek">Projects</a></li>
            <li><a href="#experience" class="mobile-nav-link" data-lang-id="Pengalaman">Experience</a></li>
            <li><a href="#contact" class="mobile-nav-link" data-lang-id="Kontak">Contact</a></li>
        </ul>
    </div>
</nav>
