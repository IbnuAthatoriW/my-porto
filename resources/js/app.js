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
    initContactForm();
});

/* ============================================================
   LANGUAGE SWITCHER (Blade is the Single Source of Truth)
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
    // 1. Text elements with data-lang-id
    document.querySelectorAll('[data-lang-id]').forEach(el => {
        if (!el.dataset.langDefault) {
            el.dataset.langDefault = el.textContent.trim();
        }
        if (lang === 'id' && el.dataset.langId) {
            el.textContent = el.dataset.langId;
        } else {
            el.textContent = el.dataset.langDefault;
        }
    });

    // 2. HTML elements with data-lang-id-html
    document.querySelectorAll('[data-lang-id-html]').forEach(el => {
        if (!el.dataset.langDefaultHtml) {
            el.dataset.langDefaultHtml = el.innerHTML.trim();
        }
        if (lang === 'id' && el.dataset.langIdHtml) {
            el.innerHTML = el.dataset.langIdHtml;
        } else {
            el.innerHTML = el.dataset.langDefaultHtml;
        }
    });

    // 3. Placeholder elements with data-lang-id-placeholder
    document.querySelectorAll('[data-lang-id-placeholder]').forEach(el => {
        if (!el.dataset.langDefaultPlaceholder) {
            el.dataset.langDefaultPlaceholder = el.placeholder;
        }
        if (lang === 'id' && el.dataset.langIdPlaceholder) {
            el.placeholder = el.dataset.langIdPlaceholder;
        } else {
            el.placeholder = el.dataset.langDefaultPlaceholder;
        }
    });

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

/* ============================================================
   CONTACT FORM SUBMISSION (AJAX)
   ============================================================ */
function initContactForm() {
    const contactForm = document.getElementById('contactForm');
    if (!contactForm) return;

    const contactAlert = document.getElementById('contactAlert');
    const submitBtn = document.getElementById('contactSubmitBtn');
    const btnText = document.getElementById('contactBtnText');

    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (contactAlert) {
            contactAlert.style.display = 'none';
            contactAlert.className = 'contact-alert';
        }

        const originalText = btnText ? btnText.textContent : 'Send Message';
        if (submitBtn) submitBtn.disabled = true;
        if (btnText) btnText.textContent = document.documentElement.lang === 'id' ? 'Mengirim...' : 'Sending...';

        try {
            const formData = new FormData(contactForm);
            const response = await fetch(contactForm.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok && data.success) {
                if (contactAlert) {
                    contactAlert.className = 'contact-alert alert-success';
                    contactAlert.textContent = data.message || 'Pesan Anda berhasil dikirim!';
                    contactAlert.style.display = 'block';
                }
                contactForm.reset();
            } else {
                let errorMsg = data.message || (document.documentElement.lang === 'id' ? 'Terjadi kesalahan saat mengirim pesan.' : 'An error occurred while sending your message.');
                if (data.errors) {
                    const firstErr = Object.values(data.errors)[0];
                    if (firstErr && firstErr[0]) {
                        errorMsg = firstErr[0];
                    }
                }
                if (contactAlert) {
                    contactAlert.className = 'contact-alert alert-error';
                    contactAlert.textContent = errorMsg;
                    contactAlert.style.display = 'block';
                }
            }
        } catch (err) {
            if (contactAlert) {
                contactAlert.className = 'contact-alert alert-error';
                contactAlert.textContent = document.documentElement.lang === 'id' ? 'Gagal terhubung ke server. Silakan coba lagi.' : 'Failed to connect to server. Please try again.';
                contactAlert.style.display = 'block';
            }
        } finally {
            if (submitBtn) submitBtn.disabled = false;
            if (btnText) btnText.textContent = originalText;
        }
    });
}


