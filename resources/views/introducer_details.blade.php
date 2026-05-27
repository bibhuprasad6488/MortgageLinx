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
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="s-alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="s-alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form id="introducer_form" action="{{ route('become-an-introducer-store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single_column">

                                    <p>A. Business Details</p>
                                    <label>Business Name</label>
                                    <input type="text" name="business_name"
                                        class="mb-1 form-control border-secondary rounded-0" required>
                                    <label>Trading Name (if different)</label>
                                    <input type="text" name="trading_name"
                                        class="mb-1 form-control border-secondary rounded-0">
                                    <label>Your Role</label>
                                    <select class="mb-1 form-control border-secondary rounded-0" name="role" required>
                                        <option value="" selected disabled>Select Your Role</option>
                                        @foreach ($intTypes as $int)
                                            <option>{{ $int->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single_column">
                                    <p>B. Contact Details</p>
                                    <label>Primary Contact Name</label>
                                    <input type="text" name="contact_name"
                                        class="mb-1 form-control border-secondary rounded-0" required>
                                    <label>Email Address</label>
                                    <input type="text" name="contact_email"
                                        class="mb-1 form-control border-secondary rounded-0" required>
                                    <label>Phone Number</label>
                                    <input type="text" name="contact_phone"
                                        class="mb-1 form-control border-secondary rounded-0" maxlength="15" required
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
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
                                        <input type="checkbox" name="range[]" value="5+">
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
                            <div class="col-md-12">
                                <div class="single_column mb-3">

                                    <div class="mb-1 input-group">
                                        <div class="g-recaptcha" data-sitekey="{{ config('app.recaptcha_site_key') }}">
                                        </div>
                                    </div>
                                    <small id="captcha-error" class="error-message">
                                        Please verify that you are not a robot.
                                    </small>

                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn cta px-4 py-2">
                                    Submit Application
                                </button>
                            </div>
                            <div class="col-md-12 mt-3">
                                <p class="text-dark"> <img src="{{ asset('images/lock.png') }}" alt="Secure"
                                        width="18"> Your information is secure and will never be shared.
                                </p>
                            </div>
                        </div>
                    </form>
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
@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        document.getElementById('introducer_form').addEventListener('submit', function(e) {

            // Remove previous error styles
            document.querySelectorAll('.border-danger').forEach(el => {
                el.classList.remove('border-danger');
            });

            // Hide captcha error initially
            const captchaError = document.getElementById('captcha-error');

            if (captchaError) {
                captchaError.style.display = 'none';
            }

            // Email Validation
            const emailField = document.querySelector('input[name="contact_email"]');
            const email = emailField.value.trim();

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                emailField.focus();
                emailField.classList.add('border-danger');
                e.preventDefault();
                return;
            }

            // Phone Validation
            const phoneField = document.querySelector('input[name="contact_phone"]');
            const phone = phoneField.value.trim();

            const phonePattern = /^[0-9]{10,15}$/;

            if (!phonePattern.test(phone)) {
                alert('Please enter a valid phone number.');
                phoneField.focus();
                phoneField.classList.add('border-danger');
                e.preventDefault();
                return;
            }

            // Referral Range Validation
            const checkboxes = document.querySelectorAll('input[name="range[]"]');

            let checkboxChecked = false;

            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checkboxChecked = true;
                }
            });

            if (!checkboxChecked) {
                alert('Please select at least one referral range.');
                e.preventDefault();
                return;
            }

            // Preferred Contact Method Validation
            const radios = document.querySelectorAll('input[name="contact_method"]');

            let radioChecked = false;

            radios.forEach(function(radio) {
                if (radio.checked) {
                    radioChecked = true;
                }
            });

            if (!radioChecked) {
                alert('Please select a preferred contact method.');
                e.preventDefault();
                return;
            }

            // Captcha Validation
            const captchaBox = document.querySelector('.g-recaptcha');

            if (captchaBox && typeof grecaptcha !== 'undefined') {

                const captchaResponse = grecaptcha.getResponse();

                if (captchaResponse.length === 0) {

                    if (captchaError) {
                        captchaError.style.display = 'block';
                    }

                    e.preventDefault();
                    return;
                }
            }

        });
    </script>
@endpush
