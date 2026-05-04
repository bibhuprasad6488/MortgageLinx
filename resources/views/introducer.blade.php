@extends('layouts.app')
@section('title', $introducer->meta_title)
@section('meta_title', $introducer->meta_title)
@section('meta_description', $introducer->meta_desc)
@section('meta_keywords', $introducer->meta_keywords)
@section('content')

    <div id="introducer" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ $introducer->banner_image }}');">

        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100 align-items-center">

                    <!-- LEFT -->
                    <div class="col-lg-6 text-white">
                        <h4 class="mb-3 page-banner-title">{{ $introducer->banner_title }}</h4>
                        <p class="page_banner-text">{{ $introducer->banner_desc }}
                        </p>

                        <a href="#"><button class="btn bannerbtn1 custom-btn">
                                {{ $introducer->banner_btn_text }}</button></a>
                        <p class="callback"><a href="#"><img src="images/callback.png"> Request a call back</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('partner')

    <section class="section why_partner_with_us">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    {!! $introducer->wpwu_content !!}
                </div>
                <div class="col-sm-12 col-md-6 tac">
                    <img src="{{ $introducer->wpwu_image }}">
                </div>
            </div>
        </div>
    </section>

    <section class="section brand_coloring pb-5">
        <div class="container">
            <div class="row g-4">
                <h4>How it Works</h4>
                <div class="col-md-3">
                    <div class="hiw_step">
                        <img src="{{ $introducer->hw_icon_one }}">
                        <p class="step_heading"><span>1. </span>{{ $introducer->hw_title_one }}</p>
                        <p>{{ $introducer->hw_subtitle_one }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hiw_step">
                        <img src="{{ $introducer->hw_icon_two }}">
                        <p class="step_heading"><span>2. </span>{{ $introducer->hw_title_two }}</p>
                        <p>{{ $introducer->hw_subtitle_two }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hiw_step">
                        <img src="{{ $introducer->hw_icon_three }}">
                        <p class="step_heading"><span>3. </span>{{ $introducer->hw_title_three }}</p>
                        <p>{{ $introducer->hw_subtitle_three }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hiw_step">
                        <img src="{{ $introducer->hw_icon_four }}">
                        <p class="step_heading"><span>4. </span>{{ $introducer->hw_title_four }}</p>
                        <p>{{ $introducer->hw_subtitle_four }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="dark_bg  mb15">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Become an Introducer</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="introducer">
                                <img src="images/accountant.png">
                                <p>Accountant</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="introducer">
                                <img src="images/estate.png">
                                <p>Estate Agents</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="introducer">
                                <img src="images/solicitors.png">
                                <p>Solicitors</p>
                            </div>
                        </div>
                        <div class="cb mb15"></div>
                        <div class="col-md-4">
                            <div class="introducer">
                                <img src="images/finance.png">
                                <p>Financial Advisers</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="introducer">
                                <img src="images/others.png">
                                <p>Other Professional Introducers</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="introducer_form">
                        <form id="introducer_form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single_column">
                                        <p>A. Business Details</p>
                                        <label>Business Name</label>
                                        <input type="text">
                                        <label>Trading Name (if different)</label>
                                        <input type="text">
                                        <label>Your Role</label>
                                        <select>
                                            <option>Accountant</option>
                                            <option>Estate Agents</option>
                                            <option>Solicitors</option>
                                            <option>Financial Advisers</option>
                                            <option>Other Professional Introducers</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single_column">
                                        <p>B. Contact Details</p>
                                        <label>Primary Contact Name</label>
                                        <input type="text">
                                        <label>Email Address</label>
                                        <input type="text">
                                        <label>Phone Number</label>
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single_column">
                                        <p>C. Referral Information</p>
                                        <label>Estimated Referrals Per Month</label>
                                        <label>
                                            <input type="checkbox" name="range[]" value="1-6">
                                            0 - 1
                                        </label>

                                        <label>
                                            <input type="checkbox" name="range[]" value="2-5">
                                            2 - 5
                                        </label>

                                        <label>
                                            <input type="checkbox" name="range[]" value="51">
                                            5+
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single_column">
                                        <p>D. Preferred Contact Method</p>
                                        <label>
                                            <input type="radio" name="contact_method" value="phone">
                                            Phone
                                        </label>

                                        <label>
                                            <input type="radio" name="contact_method" value="Email">
                                            Email
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <a href="#" class="btn cta px-4 py-2">
                                        Submit Application
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="light_bg section why_partner_with_us">
        <div class="container">
            <div class="row">
                <h3 class="text-center heading2">Become an Introducer</h3>
                @foreach ($intTypes as $int)
                    <div class="col-md-2 mb-3">
                        <div class="introducer">
                            <img src="{{ $int->icon }}">
                            <p>{{ $int->title }}</p>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-6">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section lets_get_started">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="#"><button class="btn bannerbtn1 custom-btn">
                            Become an Introducer</button></a>
                </div>
            </div>
        </div>
    </section>
@endsection
