{{-- Contact Section --}}
<section id="contact" class="section contact-section">
    <div class="container">
        {{-- Section Header --}}
        <div class="section-header reveal-up">
            <span class="section-tag">05</span>
            <h2 class="section-title" data-lang-id="Hubungi Saya">Get In Touch</h2>
            <div class="section-line"></div>
        </div>

        <p class="section-subtitle reveal-up" data-delay="1" data-lang-id="Punya proyek atau ingin berkolaborasi? Jangan ragu untuk menghubungi saya.">
            Have a project in mind or want to collaborate? Feel free to reach out.
        </p>

        <div class="contact-grid">
            {{-- Contact Info --}}
            <div class="contact-info reveal-up" data-delay="2">
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="22" height="22">
                            <rect width="20" height="16" x="2" y="4" rx="2"/>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                        </svg>
                    </div>
                    <div>
                        <span class="contact-card-label">Email</span>
                        <a href="mailto:athatori05@gmail.com" class="contact-card-value">athatori05@gmail.com</a>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="22" height="22">
                            <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/>
                            <path d="M9 18c-4.51 2-5-2-7-2"/>
                        </svg>
                    </div>
                    <div>
                        <span class="contact-card-label">GitHub</span>
                        <a href="https://github.com/IbnuAthatoriW" target="_blank" rel="noopener noreferrer" class="contact-card-value">github.com/IbnuAthatoriW</a>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="22" height="22">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                            <rect width="4" height="12" x="2" y="9"/>
                            <circle cx="4" cy="4" r="2"/>
                        </svg>
                    </div>
                    <div>
                        <span class="contact-card-label">LinkedIn</span>
                        <a href="https://www.linkedin.com/in/ibnu-athatori-wibisono-1ba923399/" target="_blank" rel="noopener noreferrer" class="contact-card-value">Ibnu Athatori Wibisono</a>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="22" height="22">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                        </svg>
                    </div>
                    <div>
                        <span class="contact-card-label">Instagram</span>
                        <a href="https://www.instagram.com/_ibnooe/" target="_blank" rel="noopener noreferrer" class="contact-card-value">@_ibnooe</a>
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="contact-form-wrapper reveal-up" data-delay="3">
                @if(session('success'))
                    <div class="contact-alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="contact-alert alert-error" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div id="contactAlert" class="contact-alert" style="display: none;"></div>

                <form class="contact-form" id="contactForm" action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label" data-lang-id="Nama">Name</label>
                        <input type="text" id="name" name="name" class="form-input" data-lang-id-placeholder="Nama Anda" placeholder="Your name" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="your.email@example.com" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message" class="form-label" data-lang-id="Pesan">Message</label>
                        <textarea id="message" name="message" class="form-input form-textarea" rows="5" data-lang-id-placeholder="Pesan Anda..." placeholder="Your message..." required>{{ old('message') }}</textarea>
                        @error('message')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-full" id="contactSubmitBtn">
                        <span id="contactBtnText" data-lang-id="Kirim Pesan">Send Message</span>
                        <svg id="contactBtnIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
