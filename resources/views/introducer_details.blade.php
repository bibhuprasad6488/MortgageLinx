@extends('layouts.app')
@section('title', $intDetails->meta_title ?? 'Become an Introducer')
@section('meta_title', $intDetails->meta_title)
@section('meta_description', $intDetails->meta_desc)
@section('meta_keywords', $intDetails->meta_keywords)
@section('content')

    <div id="introducer" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ $intDetails->banner_image }}');">

        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100 align-items-center">

                    <!-- LEFT -->
                    <div class="col-lg-6 text-white">
                        <h4 class="mb-3 page-banner-title">{{ $intDetails->banner_title }}</h4>
                        <p class="page_banner-text">{{ $intDetails->banner_desc }}
                        </p>

                        <a href="#introducerForm"><button class="btn bannerbtn1 custom-btn">
                                {{ $intDetails->banner_btn_text }}</button>
                        </a>
                        <p class="callback">
                            <a href="tel:{{ $setting->contact_phone }}"><img src="{{ asset('images/callback.png') }}">
                                Request a call
                                back</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('partner')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 tac">
                    <h4 class="tac">We Work With Professionals Who Work With People</h4>
                    <p><i>If you provide professional advice or services to clients, you could earn by introducing them
                            to Mortgage Lynx.</i></p>
                    <p><b>Our introducer network includes:</b></p>
                </div>
                <div class="clearboth"></div>

                @foreach ($intTypes as $int)
                    <div class="col-md-2 br1">
                        <div class="our_introducer">
                            <img src="{{ $int->icon }}">
                            <p>{{ $int->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="section pb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 introducer_form" id="introducerForm">
                    <div class="">
                        <h4 class="ptb20">Become an Introducer Partner</h4>
                        <p>Complete the form below and a member of our team will be in touch</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="ptb20">Why Partner With Mortgage Lynx</h4>
                    <div class="why_partner">
                        <p class="why_partner_partner_icon">
                            <img src="{{ $intDetails->wpwm_icon_one }}">
                        </p>
                        <h5>{{ $intDetails->wpwm_title_one }}</h5>
                        <p>{{ $intDetails->wpwm_subtitle_one }}</p>
                    </div>
                    <div class="why_partner">
                        <p class="why_partner_partner_icon">
                            <img src="{{ $intDetails->wpwm_icon_two }}">
                        </p>
                        <h5>{{ $intDetails->wpwm_title_two }}</h5>
                        <p>{{ $intDetails->wpwm_subtitle_two }}</p>
                    </div>
                    <div class="why_partner">
                        <p class="why_partner_partner_icon">
                            <img src="{{ $intDetails->wpwm_icon_three }}">
                        </p>
                        <h5>{{ $intDetails->wpwm_title_three }}</h5>
                        <p>{{ $intDetails->wpwm_subtitle_three }}</p>
                    </div>
                    <div class="why_partner">
                        <p class="why_partner_partner_icon">
                            <img src="{{ $intDetails->wpwm_icon_four }}">
                        </p>
                        <h5>{{ $intDetails->wpwm_title_four }}</h5>
                        <p>{{ $intDetails->wpwm_subtitle_four }}</p>
                    </div>
                    <div class="why_partner">
                        <p class="why_partner_partner_icon">
                            <img src="{{ $intDetails->wpwm_icon_five }}">
                        </p>
                        <h5>{{ $intDetails->wpwm_title_five }}</h5>
                        <p>{{ $intDetails->wpwm_subtitle_five }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="container text-center">
            <h4>Our Introducer Process</h4>
            <hr class="hr1">
            <div class="row row-cols-1 row-cols-md-5 g-4 introducer_process">

                <div class="col">
                    <p class="img_container"><img src="{{ $intDetails->sp_icon_one }}"></p>
                    <span class="clearboth"></span>
                    <div>1</div>
                    <h5>{{ $intDetails->sp_title_one }}</h5>
                    <p>{{ $intDetails->sp_subtitle_one }}</p>
                </div>

                <div class="col">
                    <p class="img_container"><img src="{{ $intDetails->sp_icon_two }}"></p>
                    <span class="clearboth"></span>
                    <div>2</div>
                    <h5>{{ $intDetails->sp_title_two }}</h5>
                    <p>{{ $intDetails->sp_subtitle_two }}</p>
                </div>

                <div class="col">
                    <p class="img_container"><img src="{{ $intDetails->sp_icon_three }}"></p>
                    <span class="clearboth"></span>
                    <div>3</div>
                    <h5>{{ $intDetails->sp_title_three }}</h5>
                    <p>{{ $intDetails->sp_subtitle_three }}</p>
                </div>

                <div class="col">
                    <p class="img_container"><img src="{{ $intDetails->sp_icon_four }}"></p>
                    <span class="clearboth"></span>
                    <div>4</div>
                    <h5>{{ $intDetails->sp_title_four }}</h5>
                    <p>{{ $intDetails->sp_subtitle_four }}</p>
                </div>

                <div class="col">
                    <p class="img_container"><img src="{{ $intDetails->sp_icon_five }}"></p>
                    <span class="clearboth"></span>
                    <div>5</div>
                    <h5>{{ $intDetails->sp_title_five }}</h5>
                    <p>{{ $intDetails->sp_subtitle_five }}</p>
                </div>

            </div>
        </div>
    </section>

@endsection
