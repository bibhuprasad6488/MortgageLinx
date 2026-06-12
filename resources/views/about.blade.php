@extends('layouts.app')
@section('title', 'About Us')
@section('meta_title', optional($aboutUs)->meta_title)
@section('meta_description', optional($aboutUs)->meta_desc)
@section('meta_keywords', optional($aboutUs)->meta_keywords)
@section('content')

    <div id="about_us" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ optional($aboutUs)->banner_image }}');">

        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100 align-items-center">

                    <!-- LEFT -->
                    <div class="col-lg-6 text-white">
                        <h1 class="mb-3 page-banner-title">{{ optional($aboutUs)->banner_title }}</h1>
                        <h5 class="page-banner-subtitle">{{ optional($aboutUs)->banner_sub_title }}</h5>
                        <p class="page_banner-text">{!! optional($aboutUs)->banner_desc !!}</p>

                        <a href="{{ route('contact') }}"><button class="btn bannerbtn1 custom-btn my-3">
                                Speak to a specialist</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section story_container_section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-5">
                    <div>
                        <h6 class="color2">OUR STORY</h6>
                        <h2>{!! optional($aboutUs)->our_story_title !!}</h2>
                        <hr class="hr2">
                        {!! optional($aboutUs)->our_story_desc !!}
                    </div>
                </div>
                <div class="col-md-7">
                    <p class="story_img_sec">
                        <img src="{{ optional($aboutUs)->story_right_image }}" alt="About Us" class="w-100">
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-5 order-2 order-md-1">
                    @if ($aboutUs->consultation_show)
                        <div class="home-form p-4">

                            <h4 class="text-white mb-4">Get a Free Consultation</h4>
                            <p><img src="{{ asset('images/struggling.png') }}" alt="Struggling"></p>
                            <h6>{{ $setting->cta_title }}</h6>
                            <h6>{{ $setting->cta_sub_title }}</h6>
                            <a href="{{ route('contact') }}">
                                <button type="submit" class="btn btn1 w-100 custom-btn">
                                    Request Consultation
                                </button>
                            </a>
                        </div>
                    @endif
                </div>
                <div class="col-md-7 order-1 order-md-2">

                    {!! optional($aboutUs)->story_right_desc !!}
                </div>
            </div>
        </div>
    </section>
@endsection
