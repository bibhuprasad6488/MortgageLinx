@if (request()->routeIs('introducer'))
    <section class="section footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 left_container">
                    <img src="{{ asset('images/icon31.png') }}" class="fl">
                    <div>
                        <h4>Ready to Partner With Us?</h4>
                        <p>Join our introducer network today and let's help more clients acheive their property goals
                            together.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 text-center right_container">
                    <a href="{{ route('become-an-introducer') }}"><button class="btn btn1 custom-btn btn-lg">
                            Become an Introducer</button></a>
                </div>
            </div>
        </div>
    </section>
@elseif (request()->routeIs(['service', 'service-details']))
    <section class="section footer_top">
        <div class="container">
            @if ($serviceCat->slug == 'protection')
                <div class="row">
                    <div class="col-xs-12 col-md-6 left_container">
                        <img src="{{ asset('images/icon31.png') }}" class="fl">
                        <div>
                            <h4>Let's Protect What Matters Most</h4>
                            <p>book a free, no-obligation consultation with one of our protection specialists today.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 text-center right_container">
                        <a href="{{ route('become-an-introducer') }}"><button class="btn btn1 custom-btn btn-lg">
                                Become an Introducer</button></a>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-xs-12 col-md-6 left_container">
                        <img src="{{ asset('images/icon31.png') }}" class="fl">
                        <div>
                            <h4>Ready to Take the Next Step?</h4>
                            <p>Get in touch today for a free, no-obligation consultation with one of our mortgage
                                specialists.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 text-center right_container">
                        <a href="{{ route('become-an-introducer') }}"><button class="btn btn1 custom-btn btn-lg">
                                Become an Introducer</button></a>
                    </div>
                </div>
            @endif
        </div>
    </section>
@elseif (request()->routeIs(['protection']))
    <section class="section footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 left_container">
                    <img src="{{ asset('images/icon31.png') }}" class="fl">
                    <div>
                        <h4>Let's Protect What Matters Most</h4>
                        <p>book a free, no-obligation consultation with one of our protection specialists today.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 text-center right_container">
                    <a href="{{ route('become-an-introducer') }}"><button class="btn btn1 custom-btn btn-lg">
                            Become an Introducer</button></a>
                </div>
            </div>
        </div>
    </section>
@elseif (request()->routeIs(['contact']))
    <section class="section footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 left_container">
                    <img src="{{ asset('images/icon31.png') }}" class="fl">
                    <div>
                        <h4>Prefer to speak now?</h4>
                        <p>Call our team on {{ $setting->contact_phone }} <br> Mon - Sat 9:00am - 6:00pm</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 text-center right_container">
                    <a href="{{ route('become-an-introducer') }}"><button class="btn btn1 custom-btn btn-lg">
                            Become an Introducer</button></a>
                </div>
            </div>
        </div>
    </section>
@else
    <section class="section footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 left_container">
                    <img src="{{ asset('images/icon31.png') }}" class="fl">
                    <div>
                        <h4>Ready to Partner With Us?</h4>
                        <p>Join our introducer network today and let's help more clients acheive their property goals
                            together.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 text-center right_container">
                    <a href="{{ route('become-an-introducer') }}"><button class="btn btn1 custom-btn btn-lg">
                            Become an Introducer</button></a>
                </div>
            </div>
        </div>
    </section>
@endif
