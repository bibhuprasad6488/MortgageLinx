@extends('layouts.app')
@section('title', 'Protction')
@section('content')
    <div id="protection" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ asset('images/protection.jpg') }}')">
        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100">

                    <!-- LEFT -->
                    <div class="col-lg-6 text-white">
                        <h4 class="mb-3 page-banner-title">Protection For What</h4>
                        <h5 class="page-banner-subtitle">Matters Most</h5>
                        <p class="page_banner-text">Life is unpredictable. The right protection gives you and your
                            family peace of mind, no matter what the future holds.</p>

                        <a href="#"><button class="btn bannerbtn1 custom-btn">Get a Free Consultation</button></a>
                    </div>
                    <div class="col-lg-6 text-white">
                        <div class="banner-txt-container">
                            <ul>
                                <li></li>
                                <li>
                                    <img src="images/icon21.png">
                                    <div>
                                        <p>Protect Your Family</p>
                                        <p>Ensure your loved ones are financially secure.</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="images/icon22.png">
                                    <div>
                                        <p>Protect Your Home</p>
                                        <p>Keep a roof over your head, whatever happens.</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="images/icon23.png">
                                    <div>
                                        <p>Protect Your Income</p>
                                        <p>Stay on top of bills and commitments.</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="images/icon24.png">
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
                        <img src="{{ asset('images/coverage.png') }}" class="w-100 coverage">
                    </div>
                    <div class="col">
                        <div class="page-ulli-container">
                            <h3>Why Get Protection With Mortage Lynx?</h3>
                            <ul>
                                <li><img src="{{ asset('images/tickfill.png') }}">
                                    <div>
                                        <p>Protect Your Family</p>
                                        <p>Ensure your loved ones are financially secure.</p>
                                    </div>
                                </li>
                                <li><img src="{{ asset('images/tickfill.png') }}">
                                    <div>
                                        <p>Protect Your Home</p>
                                        <p>Keep a roof over your head, whatever happens.</p>
                                    </div>
                                </li>
                                <li><img src="{{ asset('images/tickfill.png') }}">
                                    <div>
                                        <p>Protect Your Income</p>
                                        <p>Stay on top of bills and commitments.</p>
                                    </div>
                                </li>
                                <li><img src="{{ asset('images/tickfill.png') }}">
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
                            <p class="img_container"><img src="{{ asset('images/chat.png') }}"></p>
                            <p class="step_heading">Understand Your Needs</p>
                            <span>1</span>
                            <p>We’ll chat about your situation and what you want to protect.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter">
                            <p class="img_container"><img src="{{ asset('images/search.png') }}"></p>
                            <p class="step_heading">Find The Right Cover</p>
                            <span>2</span>
                            <p>We compare the market to find cover that fits your needs and budget.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter">
                            <p class="img_container"><img src="{{ asset('images/notepad.png') }}"></p>
                            <p class="step_heading">Apply with Confidende</p>
                            <span>3</span>
                            <p>We guide you through the application process from start to finish.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step_counter bn">
                            <p class="img_container"><img src="{{ asset('images/security.png') }}"></p>
                            <p class="step_heading">Protected For The Future</p>
                            <span>4</span>
                            <p>You get the peace of mind knowing you and your loved ones are protected.</p>
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
