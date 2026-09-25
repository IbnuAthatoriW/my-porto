{{-- Skills Section --}}
<section id="skills" class="section skills-section">
    <div class="container">
        {{-- Section Header --}}
        <div class="section-header reveal-up">
            <span class="section-tag">02</span>
            <h2 class="section-title" data-lang-id="Keahlian & Kemampuan">Skills & Arsenal</h2>
            <div class="section-line"></div>
        </div>

        <p class="section-subtitle reveal-up" data-delay="1" data-lang-id="Teknologi dan alat yang saya gunakan untuk mewujudkan ide menjadi kenyataan.">
            Technologies and tools I work with to bring ideas to life.
        </p>

        <div class="skills-grid">
            {{-- Frontend --}}
            <div class="skill-category reveal-up" data-delay="2">
                <div class="skill-category-header">
                    <div class="skill-category-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="24" height="24">
                            <polyline points="16 18 22 12 16 6"/>
                            <polyline points="8 6 2 12 8 18"/>
                        </svg>
                    </div>
                    <h3 class="skill-category-title">Frontend</h3>
                    <span class="skill-category-count">{{ count($skills['frontend'] ?? []) }} skills</span>
                </div>
                <div class="skill-list">
                    @foreach($skills['frontend'] ?? [] as $skill)
                        <div class="skill-item">
                            <div class="skill-info">
                                <span class="skill-name">{{ $skill['name'] }}</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-bar-fill" data-width="{{ $skill['percentage'] }}"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Backend --}}
            <div class="skill-category reveal-up" data-delay="3">
                <div class="skill-category-header">
                    <div class="skill-category-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="24" height="24">
                            <rect width="20" height="8" x="2" y="2" rx="2" ry="2"/>
                            <rect width="20" height="8" x="2" y="14" rx="2" ry="2"/>
                            <line x1="6" x2="6.01" y1="6" y2="6"/>
                            <line x1="6" x2="6.01" y1="18" y2="18"/>
                        </svg>
                    </div>
                    <h3 class="skill-category-title">Backend</h3>
                    <span class="skill-category-count">{{ count($skills['backend'] ?? []) }} skills</span>
                </div>
                <div class="skill-list">
                    @foreach($skills['backend'] ?? [] as $skill)
                        <div class="skill-item">
                            <div class="skill-info">
                                <span class="skill-name">{{ $skill['name'] }}</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-bar-fill" data-width="{{ $skill['percentage'] }}"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Tools --}}
            <div class="skill-category reveal-up" data-delay="4">
                <div class="skill-category-header">
                    <div class="skill-category-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="24" height="24">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                    <h3 class="skill-category-title" data-lang-id="Alat & Lainnya">Tools & Others</h3>
                    <span class="skill-category-count">{{ count($skills['tools'] ?? []) }} skills</span>
                </div>
                <div class="skill-list">
                    @foreach($skills['tools'] ?? [] as $skill)
                        <div class="skill-item">
                            <div class="skill-info">
                                <span class="skill-name">{{ $skill['name'] }}</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-bar-fill" data-width="{{ $skill['percentage'] }}"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
