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
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Favicon -->
    <link rel="icon"
        href="@if ($setting) {{ asset('storage/images/settings/' . $setting->favicon) }} @else {{ asset('admin/img/favicon.png') }} @endif"
        type="image/x-icon" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @if (config('database.connections.mysql.username') === 'root')
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @endif
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

    @stack('scripts')
</body>

</html>
