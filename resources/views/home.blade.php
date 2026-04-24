@extends('layouts.app')
@section('title', $setting->site_title)
@section('meta_title', $setting->site_title)
@section('meta_description', $setting->site_meta_desc)
@section('meta_keywords', $setting->site_meta_key)
@section('content')

    <div id="intro-example" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ $homePage->banner_image }}')">
        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100 align-items-center">

                    <!-- LEFT -->
                    <div class="col-lg-6 text-white">
                        <p><img src="{{ $homePage->banner_logo_image }}"></p>
                        {!! $homePage->banner_title !!}
                        <p class="banner-text">
                            {{ $homePage->banner_desc }}
                        </p>

                        <a class="btn btn-outline-light btn-lg m-2 rounded-0" href="{{ route('contact') }}">
                            {{ $homePage->banner_btn_text }}
                        </a>
                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-6 text-white text-center">
                        <p>
                            <a href="{{ route('contact') }}">
                                <button class="btn bannerbtn1 custom-btn">
                                    Speak to a Specialist
                                </button>
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid partner">
        <div class="partner-marquee">
            <div class="partner-track">
                @foreach ($partners as $p)
                    <span class="partner-card"><img src="{{ $p->partner_image }}"
                            alt="Partner {{ $loop->iteration }}"></span>
                @endforeach
            </div>
        </div>
    </div>

    <section class="section about_us">
        <div class="container">
            <div class="row g-4">
                <!-- RIGHT TEXT BOXES -->
                <div class="col-md-12">
                    <div class="d-flex flex-column h-100 gap-4">

                        <div class="feature-box flex-fill text-center">
                            <h3>{{ $homePage->welcome_title }}</h3>
                            <p>{{ $homePage->welcome_sub_title }}</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="section features">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 br1">
                    <div class="text-center">
                        <img src="{{ $homePage->f_icon_one }}" class="">
                        <div>
                            <h5 class="service-title">
                                {{ $homePage->f_title_one }}
                            </h5>
                            <p>{{ $homePage->f_subtitle_one }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 br1">
                    <div class="text-center">
                        <img src="{{ $homePage->f_icon_two }}" class="">
                        <div>
                            <h5 class="service-title">
                                {{ $homePage->f_title_two }}
                            </h5>
                            <p>{{ $homePage->f_subtitle_two }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 br1">
                    <div class="text-center">
                        <img src="{{ $homePage->f_icon_three }}">

                        <div>
                            <h5 class="service-title">
                                {{ $homePage->f_title_three }}
                            </h5>
                            <p>{{ $homePage->f_subtitle_three }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 br1 bn">
                    <div class="text-center">
                        <img src="{{ $homePage->f_icon_four }}">

                        <div>
                            <h5 class="service-title">
                                {{ $homePage->f_title_four }}
                            </h5>
                            <p>{{ $homePage->f_subtitle_four }}</p>
                        </div>
                    </div>
                </div>

                <div class="start_will">
                    <p>Your home may be repossessed if you do not keep up repayments on your mortgage.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section brand_coloring pb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="row">
                        @foreach ($serviceCats as $cat)
                            <div class="col-md-6 ">
                                <div class="text-center service"><img src="{{ $cat->cat_image }}" class="w-100">
                                    <div class="service-text">
                                        <h4>{{ $cat->title }}</h4>
                                        <p>{{ $cat->short_desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            <p class="tac py-4"><a href="#" class="site_branding fs-4">View All Services ></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="home-form p-4">

                        <h4 class="text-white mb-4">Get a Free Consultation</h4>
                        <p><img src="images/struggling.png"></p>
                        <h6>{{ $setting->cta_title }}</h6>
                        <h6>{{ $setting->cta_sub_title }}</h6>
                        <a href="{{ route('contact') }}">
                            <button type="submit" class="btn btn1 w-100 custom-btn">
                                Request Consultation
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
