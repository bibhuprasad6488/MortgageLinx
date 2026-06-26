@extends('layouts.app')
@section('title', $protection->meta_title ?? $protection->title)
@section('meta_title', $protection->meta_title ?? '')
@section('meta_description', $protection->meta_desc ?? '')
@section('meta_keywords', $protection->meta_keywords ?? '')
@section('content')
    <div id="protection" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ $protection->banner_image }}')">
        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100">

                    <!-- LEFT -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-white">
                        {!! $protection->banner_title !!}
                        <p class="page_banner-text">Life is unpredictable. The right protection gives you and your
                            family peace of mind, no matter what the future holds.</p>

                        <a href="{{ route('contact') }}"><button class="btn bannerbtn1 custom-btn">Get a Free
                                Consultation</button></a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-white">
                        <div class="banner-txt-container">
                            <ul>
                                <li></li>
                                <li>
                                    <img src="{{ $protection->bnr_icon_one }}" alt="{{ $protection->bnrtitlen_one }}">
                                    <div>
                                        <p>{{ $protection->bnr_title_one }}</p>
                                        <p>{{ $protection->bnr_subtitle_one }}</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{ $protection->bnr_icon_two }}" alt="{{ $protection->bnrtitlen_two }}">
                                    <div>
                                        <p>{{ $protection->bnr_title_two }}</p>
                                        <p>{{ $protection->bnr_subtitle_two }}</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{ $protection->bnr_icon_three }}" alt="{{ $protection->bnr_ititlethree }}">
                                    <div>
                                        <p>{{ $protection->bnr_title_three }}</p>
                                        <p>{{ $protection->bnr_subtitle_three }}</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{ $protection->bnr_icon_four }}" alt="{{ $protection->bnr_title_four }}">
                                    <div>
                                        <p>{{ $protection->bnr_title_four }}</p>
                                        <p>{{ $protection->bnr_subtitle_four }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partner')

    <section class="section">
        <div class="container">
            <h3 class="text-center">Protection Solutions Tailored To You</h3>
            <hr class="hr1">
            @php
                $count = 5;
                if (count($protectionServices) > 0) {
                    if (count($protectionServices) > 6) {
                        $count = 5;
                    } else {
                        $count = count($protectionServices);
                    }
                }
            @endphp
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-{{ $count }} g-4">
                @foreach ($protectionServices as $s)
                    <div class="col">
                        <div class="single_col">
                            <p class="icon"><img src="{{ $s->thumb_image }}" alt="{{ $s->thumb_title }}"></p>
                            <p class="title">{{ $s->thumb_title }}</p>
                            <p class="description">{{ $s->thumb_short_desc }}</p>
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
                        <img src="{{ $protection->wgpw_image }}" class="w-100 coverage" alt="Coverage">
                    </div>
                    <div class="col">
                        <div class="page-ulli-container">
                            <h3>Why Get Protection With Mortage Lynx?</h3>
                            <ul>
                                <li><img src="{{ asset('images/tickfill.png') }}" alt="tickfill1">
                                    <div>
                                        <p>Protect Your Family</p>
                                        <p>Ensure your loved ones are financially secure.</p>
                                    </div>
                                </li>
                                <li><img src="{{ asset('images/tickfill.png') }}" alt="tickfill2">
                                    <div>
                                        <p>Protect Your Home</p>
                                        <p>Keep a roof over your head, whatever happens.</p>
                                    </div>
                                </li>
                                <li><img src="{{ asset('images/tickfill.png') }}" alt="tickfill3">
                                    <div>
                                        <p>Protect Your Income</p>
                                        <p>Stay on top of bills and commitments.</p>
                                    </div>
                                </li>
                                <li><img src="{{ asset('images/tickfill.png') }}" alt="tickfill4">
                                    <div>
                                        <p>Protect Your Futur</p>
                                        <p>Plan today for a more confident tomorrow.</p>
                                    </div>
                                </li>
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
                <h3 class="text-center">Our Simple 4-Step Process</h3>
                <hr class="hr1">
                <div class="row g-4 text-center ">

                    <div class="col-md-3">
                        <div class="step_counter">
                            <p class="img_container"><img src="{{ $protection->sp_icon_one }}"
                                    alt="{{ $protection->stitleon_one }}"></p>
                            <p class="step_heading">{{ $protection->sp_title_one }}</p>
                            <span>1</span>
                            <p>{{ $protection->sp_subtitle_one }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter">
                            <p class="img_container"><img src="{{ $protection->sp_icon_two }}"
                                    alt="{{ $protection->stitleon_two }}"></p>
                            <p class="step_heading">{{ $protection->sp_title_two }}</p>
                            <span>2</span>
                            <p>{{ $protection->sp_subtitle_two }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter">
                            <p class="img_container"><img src="{{ $protection->sp_icon_three }}"
                                    alt="{{ $protection->sp_title_three }}"></p>
                            <p class="step_heading">{{ $protection->sp_title_three }}</p>
                            <span>3</span>
                            <p>{{ $protection->sp_subtitle_three }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter bn">
                            <p class="img_container"><img src="{{ $protection->sp_icon_four }}"
                                    alt="{{ $protection->sptitlen_four }}"></p>
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
