<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $setting = \App\Models\SiteSetting::find(1);
    $serviceCats = \App\Models\ServiceCategory::with('services')->orderBy('id')->get();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <meta name="title" content="@yield('meta_title', '')">
    <meta name="keywords" content="@yield('meta_keywords', '')">
    <meta name="description" content="@yield('meta_description', '')">
    <meta property="og:site_name" content="{{ $setting->og_site_name }}">
    <meta property="twitter:title" content="{{ $setting->og_site_name }}">
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Og Data -->
    <meta property="og:title" content="@yield('meta_title', '')" />
    <meta property="og:description" content="@yield('meta_description', '')" />
    <meta property="og:image" content="{{ asset('images/ogimage.jpg') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    <!-- Favicon -->
    <link rel="icon"
        href="@if ($setting) {{ asset('storage/images/settings/' . $setting->favicon) }} @else {{ asset('admin/img/favicon.png') }} @endif"
        type="image/x-icon" />

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- Scripts -->
    @if (config('database.connections.mysql.username') === 'root')
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @endif
    <style>
        .error-message {
            display: none;
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    @include('layouts.navigation')
    @include('layouts.mob_nav')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const track = document.querySelector(".carousel-track");
            const logos = Array.from(track.children);

            logos.forEach(logo => {
                const clone = logo.cloneNode(true);
                track.appendChild(clone);
            });
        });
    </script>

    <script>
        window.onload = function() {
            let alert = document.getElementById('s-alert');
            if (alert) {
                setTimeout(function() {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }, 3000);
            }
        };
    </script>
    @stack('scripts')
    <div class="floating-contact">
        <a href="https://api.whatsapp.com/send?phone={{ $setting->contact_phone }}&text={{ $setting->wp_message }}"
            target="_blank">
            <img src="{{ asset('storage/images/whatsapp.png') }}" width="40" height="40" alt="WhatsApp">
        </a>

        <a href="tel:{{ $setting->contact_phone }}">
            <img src="{{ asset('storage/images/phone.png') }}" width="40" height="40" alt="Phone">
        </a>
    </div>

    <button id="backToTop" title="Back to Top">
        ↑
    </button>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopBtn = document.getElementById('backToTop');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTopBtn.style.display = 'block';
                } else {
                    backToTopBtn.style.display = 'none';
                }
            });

            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
