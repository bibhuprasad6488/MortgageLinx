@extends('layouts.app')
@section('title', 'All Services')
@section('content')

    <div id="all_services" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ asset('images/form.jpg') }}')">
        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100">

                    <!-- LEFT -->
                    <div class="col-lg-12 text-white text-center">
                        <h4 class="mb-3 page-banner-title">All Services</h4>
                        <p class="page_banner-text">Life is unpredictable. The right protection gives you and your
                            family peace of mind, no matter what the future holds.</p>

                        {{-- <a href="#"><button class="btn bannerbtn1 custom-btn">Get a Free Consultation</button></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partner')

    <section class="section">
        <div class="container">
            <h3 class="text-center">Solutions Tailored To You</h3>
            <hr class="hr1">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3  g-4">
                @foreach ($serviceCats as $s)
                    <div class="col">
                        <div class="single_col">
                            <p class="icon"><img src="{{ $s->cat_image }}" class="w-100 cat_image"
                                    alt="{{ $s->title }}"></p>
                            <h5 class="title">{{ $s->title }}</h5>
                            <p class="description">{{ Str::limit($s->short_desc, 100, '...') }}</p>
                            <p><a
                                    href="@if ($s->slug == 'protection') {{ route('protection') }}
                                @else
                                {{ route('service', $s->slug) }} @endif">Learn
                                    More &gt;</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('footer_upsection')
@endsection
