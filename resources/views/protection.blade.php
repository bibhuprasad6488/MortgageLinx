@extends('layouts.app')
@section('title', 'Protection')
@section('content')
    <div id="protection" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ $protection->banner_image }}')">
        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100">

                    <!-- LEFT -->
                    <div class="col-lg-6 text-white">
                        {!! $protection->banner_title !!}
                        <p class="page_banner-text">Life is unpredictable. The right protection gives you and your
                            family peace of mind, no matter what the future holds.</p>

                        <a href="#"><button class="btn bannerbtn1 custom-btn">Get a Free Consultation</button></a>
                    </div>
                    <div class="col-lg-6 text-white">
                        <div class="banner-txt-container">
                            <ul>
                                <li></li>
                                <li>
                                    <img src="{{ $protection->bnr_icon_one }}">
                                    <div>
                                        <p>{{ $protection->bnr_title_one }}</p>
                                        <p>{{ $protection->bnr_subtitle_one }}</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{ $protection->bnr_icon_two }}">
                                    <div>
                                        <p>{{ $protection->bnr_title_two }}</p>
                                        <p>{{ $protection->bnr_subtitle_two }}</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{ $protection->bnr_icon_three }}">
                                    <div>
                                        <p>{{ $protection->bnr_title_three }}</p>
                                        <p>{{ $protection->bnr_subtitle_three }}</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{ $protection->bnr_icon_four }}">
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
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                <div class="col">
                    <div class="single_col">
                        <p class="icon"><img src="{{ asset('images/icon_1.png') }}"></p>
                        <p class="title">Life Insurance</p>
                        <p class="description">Provide a financial safety net for your family if the unthinkable
                            happens.</p>
                        <p><a href="#">Learn More &gt;</a></p>
                    </div>
                </div>
                <div class="col">
                    <div class="single_col">
                        <p class="icon"><img src="{{ asset('images/icon_1.png') }}"></p>
                        <p class="title">Critical Illness Cover</p>
                        <p class="description">Get a lump sum payment if you're diagnosed with a serious illness.</p>
                        <p><a href="#">Learn More &gt;</a></p>
                    </div>
                </div>
                <div class="col">
                    <div class="single_col">
                        <p class="icon"><img src="{{ asset('images/icon_1.png') }}"></p>
                        <p class="title">Income Protection</p>
                        <p class="description">Replace part of your income if you're unable to work due to illness or
                            injury.</p>
                        <p><a href="#">Learn More &gt;</a></p>
                    </div>
                </div>
                <div class="col">
                    <div class="single_col">
                        <p class="icon"><img src="{{ asset('images/icon_1.png') }}"></p>
                        <p class="title">Buildings &amp; Contents Insurance</p>
                        <p class="description">Protect your home and belongings from unexpected events.</p>
                        <p><a href="#">Learn More &gt;</a></p>
                    </div>
                </div>
                <div class="col">
                    <div class="single_col">
                        <p class="icon"><img src="{{ asset('images/icon_1.png') }}"></p>
                        <p class="title">Family Income Benefit</p>
                        <p class="description">Ensure your family’s lifestyle is maintained if you pass away or are unable
                            to work.</p>
                        <p><a href="#">Learn More &gt;</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col">
                        <img src="{{ $protection->wgpw_image }}" class="w-100 coverage">
                    </div>
                    <div class="col">
                        {!! $protection->wgpw_content !!}
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
                            <p class="img_container"><img src="{{ $protection->sp_icon_one }}"></p>
                            <p class="step_heading">{{ $protection->sp_title_one }}</p>
                            <span>1</span>
                            <p>{{ $protection->sp_subtitle_one }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter">
                            <p class="img_container"><img src="{{ $protection->sp_icon_two }}"></p>
                            <p class="step_heading">{{ $protection->sp_title_two }}</p>
                            <span>2</span>
                            <p>{{ $protection->sp_subtitle_two }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter">
                            <p class="img_container"><img src="{{ $protection->sp_icon_three }}"></p>
                            <p class="step_heading">{{ $protection->sp_title_three }}</p>
                            <span>3</span>
                            <p>{{ $protection->sp_subtitle_three }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter bn">
                            <p class="img_container"><img src="{{ $protection->sp_icon_four }}"></p>
                            <p class="step_heading">{{ $protection->sp_title_four }}</p>
                            <span>4</span>
                            <p>{{ $protection->sp_subtitle_four }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section lets_get_started">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="#">
                        <button class="btn bannerbtn1 custom-btn">
                            Become an Introducer</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
