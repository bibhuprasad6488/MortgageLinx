@extends('layouts.app')
@section('title', optional($process)->meta_title ?? 'Our Process')
@section('meta_title', optional($process)->meta_title)
@section('meta_description', optional($process)->meta_desc)
@section('meta_keywords', optional($process)->meta_keywords)
@section('content')


    <div id="about_us" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ asset('images/home.png') }}');">

        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100 align-items-center">

                    <!-- LEFT -->
                    <div class="col-lg-6 text-white">
                        <h1 class="mb-3 page-banner-title">{{ optional($process)->banner_title }}</h1>
                        <h5 class="page-banner-subtitle">{{ optional($process)->banner_sub_title }}</h5>
                        <p class="page_banner-text">{{ optional($process)->banner_desc }}</p>

                        <a href="{{ route('contact') }}"><button class="btn bannerbtn1 custom-btn my-3">
                                Speak to a specialist</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="journey-section">
        <div class="container">
            <div class="journey-header">
                <h2>Your Mortgage Journey</h2>
                <p>From initial consultation to completion, we're with you every step of the way.</p>
            </div>
            <!-- Timeline & Cards Container -->
            <div class="timeline-container">
                <!-- Connecting Dotted Line -->
                <div class="timeline-line"></div>
                <div class="journey-grid">
                    <!-- Step 1 -->
                    <div class="journey-item">
                        <div class="step-number">1</div>
                        <div class="card process_step_card">
                            <div class="icon-wrapper">
                                <!-- Chat/Speech Bubbles Icon -->
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                                    <circle cx="9" cy="11" r="1" fill="currentColor" />
                                    <circle cx="13" cy="11" r="1" fill="currentColor" />
                                    <circle cx="17" cy="11" r="1" fill="currentColor" />
                                </svg>
                            </div>
                            <h3>{{ optional($process)->mj_title_one }}</h3>
                            <p>{{ optional($process)->mj_subtitle_one }}</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="journey-item">
                        <div class="step-number">2</div>
                        <div class="card process_step_card">
                            <div class="icon-wrapper">
                                <!-- Document & Magnifying Glass Icon -->
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                    <polyline points="14 2 14 8 20 8" />
                                    <line x1="16" y1="13" x2="8" y2="13" />
                                    <line x1="16" y1="17" x2="8" y2="17" />
                                    <polyline points="10 9 9 9 8 9" />
                                    <circle cx="17" cy="17" r="3" />
                                    <line x1="19.1" y1="19.1" x2="22" y2="22" />
                                </svg>
                            </div>
                            <h3>{{ optional($process)->mj_title_two }}</h3>
                            <p>{{ optional($process)->mj_subtitle_two }}</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="journey-item">
                        <div class="step-number">3</div>
                        <div class="card process_step_card">
                            <div class="icon-wrapper">
                                <!-- Calculator & Market Analysis Icon -->
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="4" y="2" width="16" height="20" rx="2" ry="2" />
                                    <line x1="8" y1="6" x2="16" y2="6" />
                                    <line x1="16" y1="10" x2="16" y2="18" />
                                    <rect x="8" y="10" width="2" height="2" />
                                    <rect x="12" y="10" width="2" height="2" />
                                    <rect x="8" y="14" width="2" height="2" />
                                    <rect x="12" y="14" width="2" height="2" />
                                    <rect x="8" y="18" width="2" height="2" />
                                </svg>
                            </div>
                            <h3>{{ optional($process)->mj_title_three }}</h3>
                            <p>{{ optional($process)->mj_subtitle_three }}</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="journey-item">
                        <div class="step-number">4</div>
                        <div class="card process_step_card">
                            <div class="icon-wrapper">
                                <!-- Checklist / AIP Icon -->
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                    <polyline points="14 2 14 8 20 8" />
                                    <polyline points="9 15 11 17 15 13" />
                                </svg>
                            </div>
                            <h3>{{ optional($process)->mj_title_four }}</h3>
                            <p>{{ optional($process)->mj_subtitle_four }}</p>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="journey-item">
                        <div class="step-number">5</div>
                        <div class="card process_step_card">
                            <div class="icon-wrapper">
                                <!-- Handshake Icon -->
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                            <h3>{{ optional($process)->mj_title_five }}</h3>
                            <p>{{ optional($process)->mj_subtitle_five }}</p>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="journey-item">
                        <div class="step-number">6</div>
                        <div class="card process_step_card">
                            <div class="icon-wrapper">
                                <!-- Keys / House Completion Icon -->
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="7.5" cy="15.5" r="4.5" />
                                    <path d="M11.5 11.5L20 3v4h3v3h-3v3h-3.5" />
                                </svg>
                            </div>
                            <h3>{{ optional($process)->mj_title_six }}</h3>
                            <p>{{ optional($process)->mj_subtitle_six }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- Top Block: Features Section -->
    <section class="section ">
        <div class="container features-card">
            <div class="row">
                <div class="col-md-6">
                    <!-- Left Column: Image Area -->
                    <div class="features-image-box">
                        <!-- Replace placeholder URL with your actual image file path -->
                        <img src="{{ optional($process)->wccu_image }}" alt="Mortgage Advisor Consultation"
                            class="w-100">
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Right Column: Benefits Checklist List -->
                    <div class="features-content">
                        <div class="headline-with-icon">
                            <img src="{{ asset('images/icon24.png') }}" alt="shield icon" class="main-shield-icon">
                            <h2>Why Clients Choose Us</h2>
                        </div>

                        <ul class="benefits-list">
                            @if (!empty($process->wccu_content))
                                @foreach ($process->wccu_content as $content)
                                    <li><span class="check-icon">✓</span> {{ $content }}</li>
                                @endforeach
                            @endif
                            {{-- <li><span class="check-icon">✓</span> Specialists in complex and specialist mortgages</li>
                            <li><span class="check-icon">✓</span> Access to the whole market</li>
                            <li><span class="check-icon">✓</span> Experienced, friendly, and independent advice</li>
                            <li><span class="check-icon">✓</span> We work for you, not the lenders</li>
                            <li><span class="check-icon">✓</span> High approval rate for complex cases</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Bottom Block: Timeline CTA Banner -->
    <section class="info-top-section">
        <div class="container info-banner">
            <div class="banner-left">
                <div class="clock-icon-wrapper">
                    <!-- Standard Clock Icon -->
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
                <div class="banner-text">
                    <h3>How Long Does It Take?</h3>
                    <p>Every case is unique, but most mortgage completions take between 2 to 6 weeks from full application
                        to
                        offer. We'll keep you informed every step of the way.</p>
                </div>
            </div>

            <div class="banner-right">
                <a href="{{ route('contact') }}" class="cta-button">Get a Free Consultation</a>
            </div>
        </div>
    </section>

@endsection
