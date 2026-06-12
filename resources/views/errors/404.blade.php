@extends('layouts.app')
@section('title', 'Page Not Found')
@section('content')

    @php
        $serviceCats = \App\Models\ServiceCategory::with('services')->orderBy('id')->get();
    @endphp
    <style>
        :root {
            --amber: #F2B711;
            --amber-dk: #D4881A;
            --bg: #F7F5F2;
            --white: #FFFFFF;
            --ink: #1A1A1A;
            --muted: #6B6B6B;
            --border: #E5E2DC;
            --tag-dark: #2B2B2B;
        }

        /* ── HERO ───────────────────────────────────── */
        .hero-cont {
            /* max-width: 1100px; */
            margin: 0 auto;
            padding: 56px 40px 64px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 48px;
        }

        .hero-left {}

        .oops {
            font-size: 14px;
            font-weight: 600;
            color: var(--amber);
            letter-spacing: .04em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .big404 {
            font-size: clamp(96px, 12vw, 140px);
            font-weight: 900;
            line-height: 1;
            color: var(--ink);
            letter-spacing: -4px;
            margin-bottom: 16px;
        }

        .headline {
            font-size: 22px;
            font-weight: 700;
            line-height: 1.35;
            color: var(--ink);
            margin-bottom: 10px;
            max-width: 340px;
        }

        .subtext {
            font-size: 14px;
            color: var(--muted);
            margin-bottom: 32px;
        }

        .cta-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--amber);
            color: #000;
            font-size: 14px;
            font-weight: 600;
            padding: 11px 22px;
            border-radius: 6px;
            border: 2px solid var(--amber);
            cursor: pointer;
            text-decoration: none;
            transition: background .2s, border-color .2s;
        }

        .btn-primary:hover {
            background: var(--amber-dk);
            border-color: var(--amber-dk);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            color: var(--ink);
            font-size: 14px;
            font-weight: 600;
            padding: 11px 22px;
            border-radius: 6px;
            border: 2px solid var(--amber);
            cursor: pointer;
            text-decoration: none;
            transition: border-color .2s;
        }

        .btn-outline:hover {
            border-color: #aaa;
        }

        /* ── ILLUSTRATION ───────────────────────────── */
        .hero-right {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .illustration {
            width: 100%;
            max-width: 440px;
        }

        /* ── POPULAR PAGES ──────────────────────────── */
        .popular {
            background: var(--white);
            padding: 56px 40px;
        }

        .popular h2 {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 36px;
        }

        .cards {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
        }

        .card {
            background: var(--bg);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 28px 20px 24px;
            text-align: center;
            text-decoration: none;
            color: inherit;
            transition: box-shadow .2s, transform .2s;
        }

        .card:hover {
            box-shadow: 0 6px 24px rgba(0, 0, 0, .07);
            transform: translateY(-2px);
        }

        .card-icon {
            width: 60px;
            height: auto;
            margin: 0 auto 14px;
            color: var(--amber);
        }

        .card h3 {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .card p {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.5;
        }

        /* ── BOTTOM BANNER ──────────────────────────── */
        .banner {
            max-width: 1100px;
            margin: 48px auto;
            padding: 0 5px;
        }

        .banner-inner {
            background: #F0EDE8;
            border-radius: 12px;
            padding: 24px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }

        .banner-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .banner-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            color: var(--amber);
        }

        .banner-left strong {
            font-size: 15px;
            font-weight: 700;
            display: block;
            margin-bottom: 2px;
        }

        .banner-left span {
            font-size: 13px;
            color: var(--muted);
        }

        .btn-consult {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--amber);
            color: #000;
            font-size: 14px;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            transition: background .2s;
            white-space: nowrap;
        }

        .btn-consult:hover {
            background: var(--amber-dk);
        }

        /* ── RESPONSIVE ─────────────────────────────── */
        @media (max-width: 860px) {
            .hero-cont {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .cta-row {
                justify-content: center;
            }

            .headline {
                max-width: 100%;
            }

            /* .hero-right {
                order: -1;
            } */

            .cards {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 560px) {
            .hero-cont {
                padding: 36px 24px 48px;
            }

            .popular {
                padding: 40px 24px;
            }

            .banner {
                padding: 0 20px;
            }

            .cards {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
    <!-- ══ HERO ══════════════════════════════════════ -->
    <section class="">
        <div class="container hero-cont">
                        <div class="hero-left">
                <p class="oops">Oops! Page Not Found</p>
                <div class="big404">404</div>
                <h1 class="headline">The page you're looking for doesn't exist or has been moved.</h1>
                <p class="subtext">Let us help you find the right direction.</p>
                <div class="cta-row">
                    <a href="{{ route('home') }}" class="btn-primary">
                        <!-- home icon -->
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9.5L12 3l9 6.5V20a1 1 0 01-1 1H4a1 1 0 01-1-1V9.5z" />
                            <polyline points="9 21 9 12 15 12 15 21" />
                        </svg>
                        Return to Homepage
                    </a>
                    <a href="{{ route('all-services') }}" class="btn-outline">Browse Services</a>
                </div>
            </div>

            <div class="hero-right">
                <!-- ── INLINE SVG ILLUSTRATION ── -->
                <svg xmlns="http://w3.org" viewBox="0 0 800 550" width="100%" height="100%">
                    <defs>
                        <style>
                            .bg-line {
                                stroke: #e0e0e0;
                                stroke-width: 1.5;
                                fill: none;
                                stroke-linecap: round;
                                stroke-linejoin: round;
                            }

                            .house-line {
                                stroke: #7a7a7a;
                                stroke-width: 2;
                                fill: #ffffff;
                                stroke-linejoin: round;
                                stroke-linecap: round;
                            }

                            .sign-text {
                                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                                font-weight: bold;
                                font-size: 14px;
                                letter-spacing: 0.5px;
                                text-anchor: middle;
                            }

                            .shadow {
                                fill: rgba(0, 0, 0, 0.05);
                            }
                        </style>

                        <!-- Arrow Left Template -->
                        <g id="arrow-left">
                            <path d="M 0,22 L 25,0 L 240,0 L 240,44 L 25,44 Z" stroke-width="2" stroke-linejoin: "round" />
                        </g>
                        <!-- Arrow Right Template -->
                        <g id="arrow-right">
                            <path d="M 0,0 L 215,0 L 240,22 L 215,44 L 0,44 Z" stroke-width="2" stroke-linejoin: "round" />
                        </g>
                    </defs>

                    <!-- BACKGROUND ELEMENTS -->
                    <!-- Soft background sun/circle -->
                    <circle cx="360" cy="240" r="200" fill="#f9f9f9" />

                    <!-- Stylized Distant City Skyline -->
                    <path
                        d="M 60,380 L 60,260 L 90,260 L 90,380 M 95,380 L 95,220 L 135,220 L 135,380 M 140,380 L 140,290 L 170,290 L 170,380 M 340,380 L 340,250 L 375,250 L 375,380 M 385,380 L 385,210 L 430,210 L 430,380 M 440,380 L 440,280 L 470,280 L 470,380"
                        class="bg-line" stroke-dasharray="4 4" />

                    <!-- Clouds -->
                    <path d="M 140,70 Q 155,55 175,60 Q 190,45 210,55 Q 225,55 230,70 Z" class="bg-line" />
                    <path d="M 680,130 Q 690,120 702,123 Q 712,112 725,120 Q 735,120 738,130 Z" class="bg-line" />

                    <!-- Ground Line -->
                    <line x1="40" y1="380" x2="760" y2="380" stroke="#b5b5b5" stroke-width="2"
                        stroke-linecap="round" />

                    <!-- THE HOUSE -->
                    <!-- Left Extension / Garage -->
                    <path d="M 105,380 L 105,305 L 175,305 L 175,380 Z" class="house-line" />
                    <rect x="120" y="325" width="40" height="30" class="house-line" />

                    <!-- Main House Body -->
                    <path d="M 165,380 L 165,280 L 290,195 L 415,280 L 415,380 Z" class="house-line" />

                    <!-- Roof Trim Lines -->
                    <path d="M 155,283 L 290,183 L 425,283" stroke="#7a7a7a" stroke-width="4" fill="none"
                        stroke-linecap="round" />

                    <!-- Chimney -->
                    <path d="M 195,235 L 195,190 L 220,190 L 220,216" class="house-line" />

                    <!-- Windows and Door -->
                    <!-- Round Attic Window -->
                    <circle cx="290" cy="235" r="18" class="house-line" />
                    <line x1="290" y1="217" x2="290" y2="253" stroke="#7a7a7a" stroke-width="1.5" />
                    <line x1="272" y1="235" x2="308" y2="235" stroke="#7a7a7a" stroke-width="1.5" />

                    <!-- Square Windows -->
                    <rect x="195" y="295" width="35" height="35" class="house-line" />
                    <line x1="212.5" y1="295" x2="212.5" y2="330" stroke="#7a7a7a" stroke-width="1" />
                    <line x1="195" y1="312.5" x2="230" y2="312.5" stroke="#7a7a7a" stroke-width="1" />

                    <rect x="245" y="295" width="35" height="35" class="house-line" />
                    <line x1="262.5" y1="295" x2="262.5" y2="330" stroke="#7a7a7a" stroke-width="1" />
                    <line x1="245" y1="312.5" x2="280" y2="312.5" stroke="#7a7a7a" stroke-width="1" />

                    <!-- Front Door -->
                    <path d="M 315,380 L 315,315 L 355,315 L 355,380 Z" class="house-line" />
                    <circle cx="323" cy="350" r="2.5" fill="#7a7a7a" />

                    <!-- Foliage / Plants Foreground -->
                    <path d="M 45,380 C 45,360 60,350 75,360 C 85,345 105,350 110,365 C 120,360 135,365 135,380 Z"
                        fill="#e8e8e8" stroke="#7a7a7a" stroke-width="1.5" />
                    <path d="M 460,380 C 460,365 475,355 490,365 C 500,355 515,360 520,372 C 530,368 540,372 540,380 Z"
                        fill="#e8e8e8" stroke="#7a7a7a" stroke-width="1.5" />

                    <!-- Detailed stylized leaves on left -->
                    <g transform="translate(140,340)" stroke="#7a7a7a" stroke-width="1.5" fill="none">
                        <path d="M 15,40 Q 5,10 0,0 Q 25,15 15,40 Z" fill="#f3dfc1" />
                        <path d="M 25,40 Q 30,15 35,5 Q 45,25 25,40 Z" fill="#f3dfc1" />
                        <path d="M 0,40 Q -15,20 -20,10 Q -5,25 0,40 Z" fill="#f3dfc1" />
                        <line x1="15" y1="40" x2="0" y2="0" />
                        <line x1="25" y1="40" x2="35" y2="5" />
                        <line x1="0" y1="40" x2="-20" y2="10" />
                    </g>

                    <!-- Detailed stylized leaves on right -->
                    <g transform="translate(630,345)" stroke="#7a7a7a" stroke-width="1.5" fill="none">
                        <path d="M 15,35 Q 5,10 0,0 Q 25,15 15,35 Z" fill="#f3dfc1" />
                        <path d="M 25,35 Q 35,15 45,8 Q 45,25 25,35 Z" fill="#f3dfc1" />
                        <path d="M -5,35 Q -15,15 -25,12 Q -10,25 -5,35 Z" fill="#f3dfc1" />
                        <line x1="15" y1="35" x2="0" y2="0" />
                        <line x1="25" y1="35" x2="45" y2="8" />
                        <line x1="-5" y1="35" x2="-25" y2="12" />
                    </g>


                    <!-- THE SIGNPOST -->
                    <!-- Main Vertical Wooden Pole -->
                    <rect x="560" y="70" width="22" height="350" fill="#dcdcdc" stroke="#7a7a7a" stroke-width="2"
                        stroke-linejoin="round" />
                    <!-- Pole cap / top angle -->
                    <path d="M 560,70 L 571,55 L 582,70 Z" fill="#dcdcdc" stroke="#7a7a7a" stroke-width="2"
                        stroke-linejoin="round" />
                    <!-- Base Mound -->
                    <path d="M 535,420 C 550,405 590,405 605,420 Z" fill="#e0e0e0" stroke="#7a7a7a" stroke-width="1.5" />

                    @php
                        $directions = ['left', 'right', 'left', 'right', 'right'];

                        $positions = [
                            ['x' => 415, 'y' => 95],
                            ['x' => 560, 'y' => 155],
                            ['x' => 450, 'y' => 215],
                            ['x' => 560, 'y' => 275],
                            ['x' => 560, 'y' => 335],
                        ];
                    @endphp

                    @foreach ($serviceCats as $service)
                        @php
                            $direction = $directions[$loop->index] ?? ($loop->index % 2 == 0 ? 'left' : 'right');

                            $position = $positions[$loop->index] ?? [
                                'x' => $direction == 'left' ? 415 : 568,
                                'y' => 95 + $loop->index * 60,
                            ];

                            // Colors based on your original design
                            if ($loop->index == 0 || $loop->index == 3) {
                                $fillColor = '#f1a924';
                                $textColor = '#222222';
                            } elseif ($loop->index == 2) {
                                $fillColor = '#1a1a1a';
                                $textColor = '#ffffff';
                            } else {
                                $fillColor = '#ffffff';
                                $textColor = '#222222';
                            }

                            $url = $service->slug == 'protection' ? route('protection') : route('service', $service->slug);
                        @endphp

                        <a xlink:href="{{ $url }}">

                            @if ($direction == 'left')
                                <!-- Left Arrow Sign -->
                                <g transform="translate({{ $position['x'] }},{{ $position['y'] }})" style="cursor:pointer">

                                    <path d="M 5,27 L 27,5 L 242,5 L 242,49 L 27,49 Z" class="shadow" />

                                    <use href="#arrow-left" fill="{{ $fillColor }}" stroke="#7a7a7a" />

                                    @if ($fillColor == '#f1a924')
                                        <path d="M 4,22 L 26,2 L 236,2 L 236,42 L 26,42 Z" fill="none" stroke="#fcd67a"
                                            stroke-width="1" />
                                    @endif

                                    <text x="132" y="27" class="sign-text" fill="{{ $textColor }}">
                                        {{ strtoupper($service->title) }}
                                    </text>

                                </g>
                            @else
                                <!-- Right Arrow Sign -->
                                <g transform="translate({{ $position['x'] }},{{ $position['y'] }})" style="cursor:pointer">

                                    <path d="M 5,5 L 220,5 L 245,27 L 220,49 L 5,49 Z" class="shadow" />

                                    <use href="#arrow-right" fill="{{ $fillColor }}" stroke="#7a7a7a" />

                                    @if ($fillColor == '#f1a924')
                                        <path d="M 2,2 L 213,2 L 236,22 L 213,42 L 2,42 Z" fill="none" stroke="#fcd67a"
                                            stroke-width="1" />
                                    @endif

                                    <text x="110" y="27" class="sign-text" fill="{{ $textColor }}">
                                        {{ strtoupper($service->title) }}
                                    </text>

                                </g>
                            @endif

                        </a>
                    @endforeach

                </svg>

            </div>
        </div>
    </section>

    <!-- ══ POPULAR PAGES ══════════════════════════════ -->
    <section class="popular">
        <h2>Popular Pages</h2>
        <div class="cards">
            @foreach ($serviceCats as $service)
                <!-- {{ $service->title }} -->
                <a href="@if ($service->slug == 'protection') {{ route('protection') }}@else{{ route('service', $service->slug) }} @endif"
                    class="card">
                    <img src="{{ asset('storage/images/service_category/' . $service->footer_icon) }}" class="card-icon"
                        alt="{{ $service->title }}">

                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->short_desc }}</p>
                </a>
            @endforeach
        </div>
    </section>

    <!-- ══ BOTTOM BANNER ══════════════════════════════ -->
    <div class="banner">
        <div class="banner-inner">
            <div class="banner-left">
                <svg class="banner-icon" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="20" cy="20" r="16" />
                    <line x1="20" y1="12" x2="20" y2="20" />
                    <circle cx="20" cy="28" r="1.5" fill="currentColor" />
                </svg>
                <div>
                    <strong>Still can't find what you're looking for?</strong>
                    <span>Our team is here to help you.</span>
                </div>
            </div>
            <a href="{{ route('contact') }}" class="btn-consult">
                Request Consultation
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
        </div>
    </div>


@endsection
