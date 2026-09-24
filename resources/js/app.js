/**
 * Portfolio JavaScript
 * Handles: Navbar scroll, mobile menu, smooth scrolling, scroll reveal, skill bars, language switching
 */

document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initMobileMenu();
    initSmoothScroll();
    initScrollReveal();
    initSkillBars();
    initActiveNavLink();
    initLanguageSwitcher();
    initCounterStats();
});

/* ============================================================
   TRANSLATIONS
   ============================================================ */
const translations = {
    en: {
        // Navbar
        nav_home: 'Home',
        nav_about: 'About',
        nav_skills: 'Skills',
        nav_projects: 'Projects',
        nav_experience: 'Experience',
        nav_contact: 'Contact',

        // Hero
        hero_badge: 'INFORMATICS STUDENT • WEB DEVELOPER',
        hero_headline: 'Crafting <span class="text-gold">digital experiences</span> with clean code and modern design.',
        hero_description: 'A passionate developer focused on building elegant, performant, and user-centric web applications. Turning ideas into pixel-perfect reality.',
        hero_cta_work: 'View My Work',
        hero_cta_cv: 'Download CV',
        hero_stat_projects: 'Projects',
        hero_stat_tech: 'Technologies',
        hero_stat_years: 'Years Learning',
        hero_badge_developer: 'Developer',
        hero_scroll: 'Scroll Down',

        // About
        about_title: 'About Me',
        about_photo: 'Your Photo',
        about_intro: 'Hello! I\'m a Ibnu, an Informatics undergraduate student at Telkom University with a strong interest in Web Development, Software Development, and UI/UX.',
        about_desc: 'I enjoy building websites and applications that are not only functional, but also <strong>modern, responsive, and user-friendly</strong>. I have experience working with technologies such as <strong>HTML, CSS, JavaScript, Node.js, Express.js, Laravel, REST API, and MySQL</strong>.<br><br>Throughout my studies and various projects, I have developed both my technical and problem-solving skills while exploring different aspects of frontend and backend development. I also enjoy learning new technologies, collaborating with others, and continuously improving my development skills.<br><br>For me, development is not just about writing code. It is about <strong>turning ideas into meaningful digital solutions through thoughtful design, clean code, and a good user experience</strong>.',

        about_education_label: 'Education',
        about_education_value: 'Informatics Engineering',
        about_focus_label: 'Focus',
        about_focus_value: 'Web Development',
        about_status_value: 'Active Student',
        about_location_label: 'Location',

        // Skills
        skills_title: 'Skills & Arsenal',
        skills_subtitle: 'Technologies and tools I work with to bring ideas to life.',
        skills_4skills: '4 skills',
        skills_3skills: '3 skills',
        skills_tools_title: 'Tools & Others',
        skills_responsive: 'Responsive Design',
        skills_uiux: 'UI/UX Basics',

        // Projects
        projects_title: 'Featured Projects',
        projects_subtitle: 'A selection of my public repositories directly synced from GitHub.',
        projects_screenshot: 'Project Screenshot',
        projects_view_github: 'View All Repositories on GitHub',
        projects_synced: 'Auto-synced from GitHub',
        projects_empty: 'No public repositories found.',
        project1_name: 'Project Name',
        project1_desc: 'A brief description of your project goes here. Explain what it does and the problem it solves.',
        project2_name: 'Project Name',
        project2_desc: 'Another project description placeholder. Replace this with your actual project details.',
        project3_name: 'Project Name',
        project3_desc: 'A third project description placeholder. Replace with your real project information.',

        // Experience
        exp_title: 'Experience & Education',
        exp_education: 'Education',
        exp_experience: 'Experience',
        exp_achievement: 'Achievement',
        exp1_date: '20XX — Present',
        exp1_title: 'Informatics Engineering',
        exp1_subtitle: 'Your University Name',
        exp1_desc: 'Currently pursuing a degree in Informatics Engineering, focusing on web development, software engineering, and computer science fundamentals.',
        exp2_title: 'Your Role / Position',
        exp2_subtitle: 'Organization / Company Name',
        exp2_desc: 'Describe your role, responsibilities, and achievements here. Replace this placeholder with your actual experience details.',
        exp3_title: 'Your Achievement',
        exp3_subtitle: 'Event / Organization',
        exp3_desc: 'Describe your achievement here. Replace this placeholder with your actual details.',

        // Stats
        stats_projects: 'Projects Completed',
        stats_tech: 'Technologies Learned',
        stats_years: 'Years Learning',
        stats_lines: 'Lines of Code',

        // Contact
        contact_title: 'Get In Touch',
        contact_subtitle: 'Have a project in mind or want to collaborate? Feel free to reach out.',
        contact_form_name: 'Name',
        contact_form_name_ph: 'Your name',
        contact_form_message: 'Message',
        contact_form_message_ph: 'Your message...',
        contact_form_send: 'Send Message',

        // Footer
        footer_tagline: 'Building the future, one line of code at a time.',
        footer_copyright: '&copy; 2026 Ibnu Athatori Wibisono. All rights reserved.',
    },
    id: {
        // Navbar
        nav_home: 'Beranda',
        nav_about: 'Tentang',
        nav_skills: 'Keahlian',
        nav_projects: 'Proyek',
        nav_experience: 'Pengalaman',
        nav_contact: 'Kontak',

        // Hero
        hero_badge: 'MAHASISWA INFORMATIKA • WEB DEVELOPER',
        hero_headline: 'Menciptakan <span class="text-gold">pengalaman digital</span> dengan kode bersih dan desain modern.',
        hero_description: 'Seorang developer yang bersemangat, fokus membangun aplikasi web yang elegan, berperforma tinggi, dan berpusat pada pengguna. Mengubah ide menjadi kenyataan yang sempurna.',
        hero_cta_work: 'Lihat Karya Saya',
        hero_cta_cv: 'Unduh CV',
        hero_stat_projects: 'Proyek',
        hero_stat_tech: 'Teknologi',
        hero_stat_years: 'Tahun Belajar',
        hero_badge_developer: 'Developer',
        hero_scroll: 'Gulir ke Bawah',

        // About
        about_title: 'Tentang Saya',
        about_photo: 'Foto Anda',
        about_intro: 'Halo! Saya Ibnu, mahasiswa S1 Informatika di Telkom University dengan minat yang kuat di bidang Web Development, Software Development, dan UI/UX.',
        about_desc: 'Saya senang membangun website dan aplikasi yang tidak hanya berfungsi dengan baik, tetapi juga <strong>modern, responsif, dan mudah digunakan</strong>. Saya memiliki pengalaman menggunakan berbagai teknologi seperti <strong>HTML, CSS, JavaScript, Node.js, Express.js, Laravel, REST API, dan MySQL</strong>.<br><br>Selama perkuliahan dan mengerjakan berbagai project, saya mengembangkan kemampuan teknis dan problem solving sekaligus mempelajari berbagai aspek pengembangan frontend dan backend. Saya juga senang mempelajari teknologi baru, bekerja sama dengan orang lain, dan terus meningkatkan kemampuan dalam bidang software development.<br><br>Bagi saya, development bukan hanya tentang menulis kode. Development adalah tentang <strong>mengubah ide menjadi solusi digital yang bermakna melalui desain yang baik, kode yang terstruktur, dan pengalaman pengguna yang nyaman</strong>.',
        about_education_label: 'Pendidikan',
        about_education_value: 'Teknik Informatika',
        about_focus_label: 'Fokus',
        about_focus_value: 'Pengembangan Web',
        about_status_value: 'Mahasiswa Aktif',
        about_location_label: 'Lokasi',

        // Skills
        skills_title: 'Keahlian & Kemampuan',
        skills_subtitle: 'Teknologi dan alat yang saya gunakan untuk mewujudkan ide menjadi kenyataan.',
        skills_4skills: '4 keahlian',
        skills_3skills: '3 keahlian',
        skills_tools_title: 'Alat & Lainnya',
        skills_responsive: 'Desain Responsif',
        skills_uiux: 'Dasar UI/UX',

        // Projects
        projects_title: 'Proyek Unggulan',
        projects_subtitle: 'Kumpulan proyek publik saya yang terhubung langsung dari GitHub.',
        projects_screenshot: 'Screenshot Proyek',
        projects_view_github: 'Lihat Semua Repositori di GitHub',
        projects_synced: 'Otomatis terhubung dari GitHub',
        projects_empty: 'Tidak ada repositori publik ditemukan.',
        project1_name: 'Nama Proyek',
        project1_desc: 'Deskripsi singkat proyek Anda di sini. Jelaskan apa yang dilakukan dan masalah yang diselesaikan.',
        project2_name: 'Nama Proyek',
        project2_desc: 'Placeholder deskripsi proyek lainnya. Ganti ini dengan detail proyek Anda yang sebenarnya.',
        project3_name: 'Nama Proyek',
        project3_desc: 'Placeholder deskripsi proyek ketiga. Ganti dengan informasi proyek Anda yang sebenarnya.',

        // Experience
        exp_title: 'Pengalaman & Pendidikan',
        exp_education: 'Pendidikan',
        exp_experience: 'Pengalaman',
        exp_achievement: 'Pencapaian',
        exp1_date: '20XX — Sekarang',
        exp1_title: 'Teknik Informatika',
        exp1_subtitle: 'Nama Universitas Anda',
        exp1_desc: 'Saat ini sedang menempuh gelar Teknik Informatika, dengan fokus pada pengembangan web, rekayasa perangkat lunak, dan dasar-dasar ilmu komputer.',
        exp2_title: 'Peran / Posisi Anda',
        exp2_subtitle: 'Nama Organisasi / Perusahaan',
        exp2_desc: 'Jelaskan peran, tanggung jawab, dan pencapaian Anda di sini. Ganti placeholder ini dengan detail pengalaman Anda yang sebenarnya.',
        exp3_title: 'Pencapaian Anda',
        exp3_subtitle: 'Acara / Organisasi',
        exp3_desc: 'Jelaskan pencapaian Anda di sini. Ganti placeholder ini dengan detail Anda yang sebenarnya.',

        // Stats
        stats_projects: 'Proyek Selesai',
        stats_tech: 'Teknologi Dipelajari',
        stats_years: 'Tahun Belajar',
        stats_lines: 'Baris Kode',

        // Contact
        contact_title: 'Hubungi Saya',
        contact_subtitle: 'Punya proyek atau ingin berkolaborasi? Jangan ragu untuk menghubungi saya.',
        contact_form_name: 'Nama',
        contact_form_name_ph: 'Nama Anda',
        contact_form_message: 'Pesan',
        contact_form_message_ph: 'Pesan Anda...',
        contact_form_send: 'Kirim Pesan',

        // Footer
        footer_tagline: 'Membangun masa depan, satu baris kode pada satu waktu.',
        footer_copyright: '&copy; 2026 Your Name. Hak cipta dilindungi.',
    }
};

/* ============================================================
   LANGUAGE SWITCHER
   ============================================================ */
function initLanguageSwitcher() {
    const langToggle = document.getElementById('langToggle');
    const langDropdown = document.getElementById('langDropdown');
    const langOptions = document.querySelectorAll('.lang-option');
    const langFlag = document.getElementById('langFlag');
    const langCode = document.getElementById('langCode');

    if (!langToggle || !langDropdown) return;

    // Load saved language
    const savedLang = localStorage.getItem('portfolio-lang') || 'en';
    applyLanguage(savedLang);
    updateToggleDisplay(savedLang);
    updateActiveOption(savedLang);

    // Toggle dropdown
    langToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        langDropdown.classList.toggle('active');
        langToggle.classList.toggle('active');
    });

    // Select language option
    langOptions.forEach(option => {
        option.addEventListener('click', (e) => {
            e.stopPropagation();
            const lang = option.dataset.lang;

            applyLanguage(lang);
            updateToggleDisplay(lang);
            updateActiveOption(lang);

            localStorage.setItem('portfolio-lang', lang);

            // Close dropdown
            langDropdown.classList.remove('active');
            langToggle.classList.remove('active');
        });
    });

    // Close dropdown on outside click
    document.addEventListener('click', () => {
        langDropdown.classList.remove('active');
        langToggle.classList.remove('active');
    });

    function updateToggleDisplay(lang) {
        if (lang === 'id') {
            if (langFlag) langFlag.textContent = '🇮🇩';
            if (langCode) langCode.textContent = 'ID';
        } else {
            if (langFlag) langFlag.textContent = '🇬🇧';
            if (langCode) langCode.textContent = 'EN';
        }
    }

    function updateActiveOption(lang) {
        langOptions.forEach(opt => {
            opt.classList.toggle('active', opt.dataset.lang === lang);
        });
    }
}

function applyLanguage(lang) {
    const t = translations[lang];
    if (!t) return;

    // Update text content (data-i18n)
    document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.dataset.i18n;
        if (t[key] !== undefined) {
            el.textContent = t[key];
        }
    });

    // Update innerHTML (data-i18n-html) — for content with HTML tags like <span>
    document.querySelectorAll('[data-i18n-html]').forEach(el => {
        const key = el.dataset.i18nHtml;
        if (t[key] !== undefined) {
            el.innerHTML = t[key];
        }
    });

    // Update placeholders (data-i18n-placeholder)
    document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
        const key = el.dataset.i18nPlaceholder;
        if (t[key] !== undefined) {
            el.placeholder = t[key];
        }
    });

    // Update the HTML lang attribute
    document.documentElement.lang = lang === 'id' ? 'id' : 'en';
}

/* ============================================================
   NAVBAR SCROLL EFFECT
   ============================================================ */
function initNavbar() {
    const navbar = document.getElementById('navbar');
    if (!navbar) return;

    let lastScrollY = 0;

    function handleScroll() {
        const scrollY = window.scrollY;

        if (scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        lastScrollY = scrollY;
    }

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll(); // Check initial state
}

/* ============================================================
   MOBILE MENU
   ============================================================ */
function initMobileMenu() {
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');
    if (!hamburger || !mobileMenu) return;

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        mobileMenu.classList.toggle('active');
        document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
    });

    // Close mobile menu on link click
    const mobileLinks = mobileMenu.querySelectorAll('.mobile-nav-link');
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            mobileMenu.classList.remove('active');
            document.body.style.overflow = '';
        });
    });
}

/* ============================================================
   SMOOTH SCROLL
   ============================================================ */
function initSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            if (href === '#') return;

            const target = document.querySelector(href);
            if (!target) return;

            e.preventDefault();

            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });
}

/* ============================================================
   SCROLL REVEAL ANIMATION
   ============================================================ */
function initScrollReveal() {
    const elements = document.querySelectorAll('.reveal-up');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = entry.target.dataset.delay || 0;
                setTimeout(() => {
                    entry.target.classList.add('revealed');
                }, delay * 100);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -40px 0px'
    });

    elements.forEach(el => observer.observe(el));
}

/* ============================================================
   SKILL BARS ANIMATION
   ============================================================ */
function initSkillBars() {
    const bars = document.querySelectorAll('.skill-bar-fill');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const width = entry.target.dataset.width || 0;
                entry.target.style.width = width + '%';
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.3
    });

    bars.forEach(bar => observer.observe(bar));
}

/* ============================================================
   ACTIVE NAV LINK ON SCROLL
   ============================================================ */
function initActiveNavLink() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

    function setActiveLink() {
        const scrollY = window.scrollY + 100;

        sections.forEach(section => {
            const top = section.offsetTop;
            const height = section.offsetHeight;
            const id = section.getAttribute('id');

            if (scrollY >= top && scrollY < top + height) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + id) {
                        link.classList.add('active');
                    }
                });
                mobileNavLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + id) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }

    window.addEventListener('scroll', setActiveLink, { passive: true });
    setActiveLink();
}

/* ============================================================
   STAT COUNTER ANIMATION
   ============================================================ */
function initCounterStats() {
    const statNumbers = document.querySelectorAll('[data-count]');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const targetCount = parseInt(el.dataset.count, 10) || 0;
                const isFormatted = el.dataset.format === 'formatted';
                const duration = 1500;
                const startTime = performance.now();

                function updateCount(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const easeProgress = 1 - Math.pow(1 - progress, 3);
                    const currentVal = Math.floor(easeProgress * targetCount);

                    if (isFormatted) {
                        el.textContent = currentVal.toLocaleString('id-ID') + '+';
                    } else {
                        el.textContent = currentVal;
                    }

                    if (progress < 1) {
                        requestAnimationFrame(updateCount);
                    }
                }

                requestAnimationFrame(updateCount);
                observer.unobserve(el);
            }
        });
    }, { threshold: 0.2 });

    statNumbers.forEach(el => observer.observe(el));
}

