{{-- About Section --}}
<section id="about" class="section about-section">
    <div class="container">
        {{-- Section Header --}}
        <div class="section-header reveal-up">
            <span class="section-tag">01</span>
            <h2 class="section-title" data-lang-id="Tentang Saya">About Me</h2>
            <div class="section-line"></div>
        </div>

        <div class="about-grid">
            {{-- Profile Image --}}
            <div class="about-image-wrapper reveal-up" data-delay="1">
                <div class="about-image">
                    <div class="about-image-placeholder">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" width="48" height="48">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <span data-lang-id="Foto Anda">Your Photo</span>
                    </div>
                    <div class="about-image-border"></div>
                    <div class="about-image-accent"></div>
                </div>
            </div>

            {{-- About Content --}}
            <div class="about-content">
                <div class="about-text reveal-up" data-delay="2">
                    <p class="about-intro" data-lang-id-html="Halo! Saya Ibnu, mahasiswa S1 Informatika di Telkom University dengan minat yang kuat di bidang Web Development, Software Development, dan UI/UX.">
                        Hello! I'm a Ibnu, an Informatics undergraduate student at Telkom University with a strong interest in Web Development, Software Development, and UI/UX.
                    </p>
                    <p data-lang-id-html="Saya senang membangun website dan aplikasi yang tidak hanya berfungsi dengan baik, tetapi juga <strong>modern, responsif, dan mudah digunakan</strong>. Saya memiliki pengalaman menggunakan berbagai teknologi seperti <strong>HTML, CSS, JavaScript, Node.js, Express.js, Laravel, REST API, dan MySQL</strong>.<br><br>Selama perkuliahan dan mengerjakan berbagai project, saya mengembangkan kemampuan teknis dan problem solving sekaligus mempelajari berbagai aspek pengembangan frontend dan backend. Saya juga senang mempelajari teknologi baru, bekerja sama dengan orang lain, dan terus meningkatkan kemampuan dalam bidang software development.<br><br>Bagi saya, development bukan hanya tentang menulis kode. Development adalah tentang <strong>mengubah ide menjadi solusi digital yang bermakna melalui desain yang baik, kode yang terstruktur, dan pengalaman pengguna yang nyaman</strong>.">
                        I enjoy building websites and applications that are not only functional, but also 
                        <strong>modern, responsive, and user-friendly</strong>. I have experience working with 
                        technologies such as <strong>HTML, CSS, JavaScript, Node.js, Express.js, Laravel, REST API, and MySQL</strong>.

                        <br><br>

                        Throughout my studies and various projects, I have developed both my technical and 
                        problem-solving skills while exploring different aspects of frontend and backend development. 
                        I also enjoy learning new technologies, collaborating with others, and continuously improving 
                        my development skills.

                        <br><br>

                        For me, development is not just about writing code. It is about 
                        <strong>turning ideas into meaningful digital solutions through thoughtful design, clean code, 
                        and a good user experience</strong>.
                    </p>
                </div>

                {{-- Info Cards --}}
                <div class="about-info-grid reveal-up" data-delay="3">
                    <div class="about-info-card">
                        <div class="info-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                            </svg>
                        </div>
                        <div class="info-card-content">
                            <span class="info-card-label" data-lang-id="Pendidikan">Education</span>
                            <!-- PLACEHOLDER: Replace with your university -->
                            <span class="info-card-value" data-lang-id="Informatika">Informatics</span>
                        </div>
                    </div>
                    <div class="about-info-card">
                        <div class="info-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
                                <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/>
                                <path d="M9 18c-4.51 2-5-2-7-2"/>
                            </svg>
                        </div>
                        <div class="info-card-content">
                            <span class="info-card-label" data-lang-id="Fokus">Focus</span>
                            <span class="info-card-value" data-lang-id="Pengembangan Web">Web Development</span>
                        </div>
                    </div>
                    <div class="about-info-card">
                        <div class="info-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </div>
                        <div class="info-card-content">
                            <span class="info-card-label">Status</span>
                            <!-- PLACEHOLDER: Replace with your actual status -->
                            <span class="info-card-value" data-lang-id="Mahasiswa Aktif">Active Student</span>
                        </div>
                    </div>
                    <div class="about-info-card">
                        <div class="info-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div class="info-card-content">
                            <span class="info-card-label" data-lang-id="Lokasi">Location</span>
                            <!-- PLACEHOLDER: Replace with your location -->
                            <span class="info-card-value">Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
