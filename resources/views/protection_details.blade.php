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
                <h3 class="text-center ptb30">The Mortgage Process – Simple &amp; Straightforward</h3>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

                    <div class="col text-center mortgage_process">
                        <div class="">
                            <p class="no_container">1</p>
                            <p class="process_heading">Initial Consultation</p>
                            <p>We discuss your needs and circumstances.</p>
                        </div>
                    </div>
                    <div class="col text-center mortgage_process">
                        <div class="">
                            <p class="no_container">2</p>
                            <p class="process_heading">Mortgage Research</p>
                            <p>We search the market to find the right options.</p>
                        </div>
                    </div>
                    <div class="col text-center mortgage_process">
                        <div class="">
                            <p class="no_container">3</p>
                            <p class="process_heading">Agreement in Principle</p>
                            <p>Get an agreement in principle to strengthen your position.</p>
                        </div>
                    </div>
                    <div class="col text-center mortgage_process">
                        <div class="">
                            <p class="no_container">4</p>
                            <p class="process_heading">Application</p>
                            <p>We manage your application from start to finish.</p>
                        </div>
                    </div>
                    <div class="col text-center mortgage_process bn">
                        <div class="">
                            <p class="no_container">5</p>
                            <p class="process_heading">Offer &amp; Completion</p>
                            <p>Receive your mortgage offer and move into your new home.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('footer_upsection')

@endsection
