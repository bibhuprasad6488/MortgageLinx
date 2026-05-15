@extends('layouts.app')
@section('title', 'Contact Us')
@section('meta_title', '')
@section('meta_description', '')
@section('content')

    <div id="introducer" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ asset('images/001.jpg') }}');">

        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100 align-items-center">

                    <!-- LEFT -->
                    <div class="col-lg-6 text-white">
                        <h4 class="mb-3 page-banner-title">Contact Us</h4>
                        <h5 class="page-banner-subtitle">We're Here to Help</h5>
                        <hr class="hr2">
                        <p class="page_banner-text">Have a question or need expert mortgage advice? <br> Get in touch with
                            our team today.
                        </p>

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

    <section class="section pb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 contact_form">
                    <div class="card">
                        <div class="card-body">

                            <div class="">
                                <h4 class="ptb20">Send Us a Message</h4>
                                <p>Complete the form below and we'll get back to you as soon as possible.</p>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="s-alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="s-alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form id="contact_form" action="{{ route('contact.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single_column mb-3">
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="full_name"
                                                class="mb-1 form-control border-muted rounded-0"
                                                placeholder="Your full name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_column mb-3">
                                            <label>Email Address <span class="text-danger">*</span></label>
                                            <input type="text" name="email_address"
                                                class="mb-1 form-control border-muted rounded-0"
                                                placeholder="Your email address" required>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_column mb-3">
                                            <label>Phone Number <span class="text-danger">*</span></label>
                                            <input type="text" name="phone_number" placeholder="Your phone number"
                                                class="mb-1 form-control border-muted rounded-0" maxlength="15" required
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single_column mb-3">
                                            <label>Enquiry Type <span class="text-danger">*</span></label>
                                            <select name="enquiry_type" id="enquiry_type"
                                                class="mb-1 form-control border-muted rounded-0" required>
                                                <option value="" selected disabled>Select Enquiry Type</option>
                                                <option value="general">General Inquiry</option>
                                                <option value="support">Support Request</option>
                                                <option value="feedback">Feedback</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single_column mb-3">
                                            <label> Subject <span class="text-danger">*</span></label>
                                            <input type="text"
                                                name="your_subject"class="mb-1 form-control border-muted rounded-0"
                                                placeholder="Brief subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single_column mb-3">
                                            <label> Message <span class="text-danger">*</span></label>
                                            <textarea name="your_messsage" id="your_messsage" class="mb-1 form-control border-muted rounded-0"
                                                placeholder="How can we help you?" rows="8"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single_column mb-3">
                                            <label>
                                                <input type="checkbox" name="terms_conditions" value="1">
                                                I agree to the <a href="{{ route('privacy-policy') }}"
                                                    target="_blank">Privacy
                                                    Policy</a> and <a href="{{ route('terms-of-business') }}"
                                                    target="_blank">Terms
                                                    and Conditions</a>.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button class="btn cta px-4 py-2">
                                            Send Message
                                        </button>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <p class="text-muted"> <img src="{{ asset('images/lock.png') }}" alt="Secure"
                                                width="18"> Your information is secure and will never be shared.
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card get_in_touch">
                        <div class="card-body">
                            <h4 class="ptb20">Get in Touch</h4>
                            <div class="why_partner">
                                <p class="why_partner_partner_icon">
                                    <img src="{{ asset('images/chat.png') }}">
                                </p>
                                <h5>Call Us</h5>
                                <p>{{ $setting->contact_phone }} <br>Mon - Fri: 9:00 am - 5:30 pm</p>
                            </div>
                            <div class="why_partner">
                                <p class="why_partner_partner_icon">
                                    <img src="{{ asset('images/chat.png') }}">
                                </p>
                                <h5>Email Us</h5>
                                <p>{{ $setting->contact_email }} <br>We aim to respond within 1 day</p>
                            </div>
                            <div class="why_partner">
                                <p class="why_partner_partner_icon">
                                    <img src="{{ asset('images/chat.png') }}">
                                </p>
                                <h5>Visit Us</h5>
                                <p>{!! $setting->address !!}</p>
                            </div>
                            <div class="why_partner">
                                <p class="why_partner_partner_icon">
                                    <img src="{{ asset('images/chat.png') }}">
                                </p>
                                <h5>Live Chat</h5>
                                <p>Chat with a member of our team <br> during business hours.</p>
                            </div>
                            <div class="why_partner bg-dark p-4 text-white rounded contact_form">
                                <p class="why_partner_partner_icon">
                                    <img src="{{ asset('images/icon28.png') }}">
                                </p>
                                <h5>Introducer Partnership</h5>
                                <p>Are you a professional looking <br> partner with us? <br> <a
                                        href="{{ route('introducer') }}">Learn More &gt;</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="section features">
        <div class="container">
            <div class="ptb30">
                <h3 class="text-center">Why client choose Mortgage Lynx</h3>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                <div class="col br1 ">
                    <div class="text-center mortgage_col">
                        <p class="icon"><img src="{{ asset('images/icon24.png') }}"></p>
                        <p class="title">Exper Advice</p>
                        <p class="description">Whole of market advice from experienced mortgage specialists.</p>
                    </div>
                </div>
                <div class="col br1 ">
                    <div class="text-center mortgage_col">
                        <p class="icon"><img src="{{ asset('images/icon26.png') }}"></p>
                        <p class="title">Professional Service</p>
                        <p class="description">Tailored solutions to meet your unique needs.</p>
                    </div>
                </div>
                <div class="col br1 ">
                    <div class="text-center mortgage_col">
                        <p class="icon"><img src="{{ asset('images/icon29.png') }}"></p>
                        <p class="title">Quick Response</p>
                        <p class="description">We work efficiently to keep you plans on track.</p>
                    </div>
                </div>
                <div class="col br1 ">
                    <div class="text-center mortgage_col">
                        <p class="icon"><img src="{{ asset('images/icon24.png') }}"></p>
                        <p class="title">Trusted by Clients</p>
                        <p class="description">Built in trust, transparency and results.</p>
                    </div>
                </div>
                <div class="col br1 ">
                    <div class="text-center mortgage_col">
                        <p class="icon"><img src="{{ asset('images/icon21.png') }}"></p>
                        <p class="title">No Obligation</p>
                        <p class="description">Speak to us with no pressure and no obligation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map_section">
        <div class="container-fluid map_view">
            {!! $setting->site_map_key !!}
        </div>
    </section>

    @include('footer_upsection')
@endsection
@push('scripts')
    <script>
        document.getElementById('contact_form').addEventListener('submit', function(e) {

            // Email Validation
            const emailField = document.querySelector('input[name="email_address"]');
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
            const phoneField = document.querySelector('input[name="phone_number"]');
            const phone = phoneField.value.trim();

            // Allows only numbers and minimum 10 digits
            const phonePattern = /^[0-9]{10,15}$/;

            if (!phonePattern.test(phone)) {
                alert('Please enter a valid phone number.');
                phoneField.focus();
                phoneField.classList.add('border-danger');
                e.preventDefault();
                return;
            }

            // Checkbox Validation
            const checkbox = document.querySelector('input[name="terms_conditions"]');
            let checkboxChecked = false;

            if (checkbox.checked) {
                checkboxChecked = true;
            }

            if (!checkboxChecked) {
                alert('Please agree to the terms and conditions.');
                checkbox.focus();
                checkbox.classList.add('border-danger');
                e.preventDefault();
                return;
            }

        });
    </script>
@endpush
