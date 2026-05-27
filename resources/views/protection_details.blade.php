@extends('layouts.app')
@section('title', $service->meta_title ?? $service->title)
@section('meta_title', $service->meta_title ?? '')
@section('meta_description', $service->meta_desc ?? '')
@section('meta_keywords', $service->meta_keywords ?? '')

@section('content')
    <div id="protection" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ $service->service_image }}')">
        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100">

                    <!-- LEFT -->
                    <div class="col-lg-6 text-white">
                        <h4 class="mb-3 page-banner-title">{{ $service->title }}</h4>
                        <p class="page_banner-text">{{ $service->short_desc }}</p>

                        <a href="{{ route('contact') }}"><button class="btn bannerbtn1 custom-btn">Get a Free
                                Consultation</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partner')


    <section class="section features">
        <div class="container">
            <div class="ptb30">
                <h3 class="text-center">We’ll Help You To Find the Right Protection</h3>
                <p class="text-center">Our experienced advisers take the time to understand your goals and provide tailored
                    solutions from across the whole market.</p>
            </div>
            <div class="row row-cols-12">
                <div class="col">
                    {!! $service->content !!}
                </div>
            </div>
        </div>
    </section>


    <section class="step_section_container">
        <div class="container">
            <div class="step_process">
                <h3 class="text-center">Our Simple 4-Step Process</h3>
                <hr class="hr1">
                <div class="row g-4 text-center ">

                    <div class="col-md-3">
                        <div class="step_counter">
                            <p class="img_container"><img src="{{ $protection->sp_icon_one }}"
                                    alt="{{ $protection->sp_title_one }}"></p>
                            <p class="step_heading">{{ $protection->sp_title_one }}</p>
                            <span>1</span>
                            <p>{{ $protection->sp_subtitle_one }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter">
                            <p class="img_container"><img src="{{ $protection->sp_icon_two }}"
                                    alt="{{ $protection->sp_title_two }}"></p>
                            <p class="step_heading">{{ $protection->sp_title_two }}</p>
                            <span>2</span>
                            <p>{{ $protection->sp_subtitle_two }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter">
                            <p class="img_container"><img src="{{ $protection->sp_icon_three }}"
                                    alt="{{ $protection->sp_title_thre }}"></p>
                            <p class="step_heading">{{ $protection->sp_title_three }}</p>
                            <span>3</span>
                            <p>{{ $protection->sp_subtitle_three }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter bn">
                            <p class="img_container"><img src="{{ $protection->sp_icon_four }}"
                                    alt="{{ $protection->sp_title_four }}"></p>
                            <p class="step_heading">{{ $protection->sp_title_four }}</p>
                            <span>4</span>
                            <p>{{ $protection->sp_subtitle_four }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('footer_upsection')

@endsection
