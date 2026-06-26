@extends('layouts.app')
@section('title', $serviceCat->meta_title ?? $serviceCat->title)
@section('meta_title', $serviceCat->meta_title ?? '')
@section('meta_description', $serviceCat->meta_desc ?? '')
@section('meta_keywords', $serviceCat->meta_keywords ?? '')
@section('content')

    <div id="mortgage" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ $serviceCat->cat_image }}')">

        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100">

                    <!-- LEFT -->
                    <div class="col-lg-6 text-white">
                        <h4 class="mb-3 page-banner-title">{{ $serviceCat->title }}</h4>
                        <h5 class="page-banner-subtitle">Mortgages</h5>
                        <hr class="hr2">
                        <p class="page_banner-text">
                            {{ $serviceCat->short_desc }}
                        </p>
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
                <h3 class="text-center">We’ll Help You Find the Right Mortgage</h3>
                <p class="text-center">Our experienced advisers take the time to understand your goals and provide tailored
                    solutions from across the whole market.</p>
            </div>
            @php
                $count = 5;
                if (count($services) > 0) {
                    if (count($services) > 6) {
                        $count = 5;
                    } else {
                        $count = count($services);
                    }
                }
            @endphp
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-{{ $count }} g-4">
                @foreach ($services as $s)
                    <div class="col br1 ">
                        <div class="text-center mortgage_col">
                            <p class="icon"><img src="{{ $s->thumb_image ?? asset('images/icon24.png') }}"
                                    alt="{{ $s->thumb_title ?? $s->title }}"></p>
                            <p class="title">{{ $s->thumb_title ?? $s->title }}</p>
                            <p class="description">{{ $s->thumb_short_desc ?? $s->short_desc }}</p>
                            <p><a href="{{ route('service-details', $s->slug) }}">Learn More &gt;</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col">
                        <img src="{{ $setting->wcml_image }}" alt="Coverage" class="w-100 coverage">
                    </div>
                    <div class="col">
                        <div class="page-ulli-container2">
                            <h3>Why Choose Mortage Lynx?</h3>
                            <ul>
                                @foreach ($setting->wcml_content as $wContent)
                                    <li>
                                        <img src="{{ asset('images/tickfill.png') }}"
                                            alt="tickfill{{ $loop->iteration }}">
                                        <div>
                                            <p>{{ $wContent }}</p>
                                        </div>
                                    </li>
                                @endforeach
                                {{-- <li><img src="{{ asset('images/tickfill.png') }}" alt="tickfill2">
                                    <div>
                                        <p>Whole of market advice</p>
                                    </div>
                                </li>
                                <li><img src="{{ asset('images/tickfill.png') }}" alt="tickfill3">
                                    <div>
                                        <p>Expert guidance from experienced advisers</p>
                                    </div>
                                </li>
                                <li><img src="{{ asset('images/tickfill.png') }}" alt="tickfill4">
                                    <div>
                                        <p>Support from application to completion</p>
                                    </div>
                                </li>
                                <li><img src="{{ asset('images/tickfill.png') }}" alt="tickfill5">
                                    <div>
                                        <p>No obligation consultations</p>
                                    </div>
                                </li> --}}

                            </ul>
                        </div>
                    </div>
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
