<footer class="site-footer">
    <div class="container">
        <div class="row align-items-start text-center text-md-start">

            <div class="col-md-3 col-xs-12 mb-4 mb-md-0">
                <p class="tac"><img
                        src="{{ $setting->footer_logo ? asset('storage/images/settings/' . $setting->footer_logo) : '' }}"
                        class="w-100"></p>
                <p class="tac m-tac">{{ optional($setting)->footer_text_two }}</p>
                <hr class="hr1">
                <div class="footer_column1_card">
                    <div class="icon_text_contaiiner">
                        <div class="icon"></div>
                        <div class="text">
                            <p>Need expert mortgage advice?</p>
                            <p>We're here to help.</p>
                        </div>
                    </div>
                    <a class="cta btn" href="{{ route('contact') }}">Request Consultation</a>
                </div>
                <p class="tac mt-4">FOLLOW US</p>
                <div class="footer-socials">
                    <div class="social-box">
                        <img src="{{ asset('images/fb.png') }}" alt="Facebook">
                    </div>
                    <div class="social-box">
                        <img src="{{ asset('images/gplus.png') }}" alt="Google Plus">
                    </div>
                    <div class="social-box">
                        <img src="{{ asset('images/twitter.png') }}" alt="Twitter">
                    </div>
                    <div class="social-box">
                        <img src="{{ asset('images/whatsapp.png') }}" alt="WhatsApp">
                    </div>
                </div>
            </div>
            <!-- Column 1: Company -->
            <div class="col-md-3 col-xs-12 mb-4 mb-md-0">

                <p class="footer-title">OUR SERVICES</p>
                <ul class="footer-links">
                    @foreach ($serviceCats as $sc)
                        <li>
                            <a
                                href="@if ($sc->slug == 'protection') {{ route('protection') }}@else{{ route('service', $sc->slug) }} @endif">
                                <img src="{{ asset('storage/images/service_category/' . $sc->footer_icon) }}"
                                    alt="">
                                {{ $sc->title }}</a>
                        </li>
                    @endforeach

                    <li><a href="{{ route('all-services') }}" class="fclass">View All Services &#8594;</a></li>
                </ul>
            </div>

            <!-- Column 2: Services -->
            <div class="col-md-3 col-xs-12 mb-4 mb-md-0 third_column">
                <p class="footer-title">COMPANY</p>
                <ul class="footer-links">
                    <li>
                        <a href="{{ route('about-us') }}">
                            <img src="{{ asset('images/right_arrow.png') }}" alt="Arrow">About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('process') }}">
                            <img src="{{ asset('images/right_arrow.png') }}" alt="Arrow">Our Process
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">
                            <img src="{{ asset('images/right_arrow.png') }}" alt="Arrow">Contact </a>
                    </li>
                    <li>
                        <a href="{{ route('introducer') }}">
                            <img src="{{ asset('images/right_arrow.png') }}" alt="Arrow">Introducer Partnership
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('become-an-introducer') }}">
                            <img src="{{ asset('images/right_arrow.png') }}" alt="Arrow">Become an Introducer
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Navigation -->
            <div class="col-md-3 col-xs-12 mb-4 mb-md-0 fourth_column">
                <p class="footer-title">GET IN TOUCH</p>
                <ul class="footer-links">
                    <li>
                        <img src="{{ asset('images/addres_icon.png') }}" alt="Address">
                        {{ $setting->address }}
                    </li>
                    <li>
                        <a href="tel:{{ $setting->contact_phone }}">
                            <img src="{{ asset('images/call_icon.png') }}" alt="Call">
                            {{ $setting->contact_phone }}
                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{ $setting->contact_email }}">
                            <img src="{{ asset('images/mail_icon.png') }}" alt="Mail"> Click Here
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('images/clock.png') }}" alt="Cloud"> Mon-Sat | 9.00am - 6.00pm
                    </li>
                </ul>
            </div>
        </div>
        <!-- <hr class="footer-divider"> -->
    </div>
    <div class="container-fluid footer_row_middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-1">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L4 5V10C4 15.5 7.5 20.2 12 22C16.5 20.2 20 15.5 20 10V5L12 2Z" stroke="white"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 12L11 14L15 10" stroke="white" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="col-lg-3 sp1">


                    <P class="color1">AUTHORISED & REGULATED</P>
                    <P>Portman Rise Ltd is authorised and regulated
                        by the Financial Conduct Authority (FCA).
                        Firm Reference Number 998232.</P>
                </div>
                <div class="col-lg-6 pl30">
                    {!! $setting->footer_text_one !!}
                </div>
                <div class="col-lg-2 tar">
                    <img src="{{ $setting->footer_logo_one ? asset('storage/images/settings/' . $setting->footer_logo_one) : '' }}"
                        alt="Certified Logo" width="63" class="certified-img">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="col-xs-12">
            <div class="text-center">
                <p class="">&copy; {{ date('Y') }} {{ $setting->copyright }} <a
                        href="{{ route('privacy-policy') }}">Privacy
                        Policy</a> <a href="{{ route('terms-of-business') }}">Terms & Conditions</a></p>
            </div>
        </div>
    </div>
</footer>
