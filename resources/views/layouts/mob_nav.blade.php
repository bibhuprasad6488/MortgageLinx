<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">

    <div class="offcanvas-header">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ $setting->site_logo ? asset('storage/images/settings/' . $setting->site_logo) : '' }}"
                alt="{{ $setting->site_title }}">
        </a>

        <button type="button" class="btn-close btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    {{-- justify-content-center --}}
    <div class="offcanvas-body d-flex flex-column ">

        <ul class="navbar-nav text-center fs-4 my_menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('about-us') }}">About Us</a></li>

            @foreach ($serviceCats as $sc)
                <li class="nav-item">
                    <div class="d-flex justify-content-between align-items-center">
                        {{-- Clickable Category Link --}}
                        <a class="nav-link "
                            href="@if ($sc->slug == 'protection') {{ route('protection') }}@else{{ route('service', $sc->slug) }}@endif">
                            {{ $sc->title }}
                        </a>

                        {{-- Collapse Toggle --}}
                        @if ($sc->services->count())
                            <a class="nav-link px-2" data-bs-toggle="collapse"
                                href="#serviceSubMenu{{ $loop->iteration }}" role="button" aria-expanded="false"
                                aria-controls="serviceSubMenu{{ $loop->iteration }}">
                                +
                            </a>
                        @endif

                    </div>

                    @if ($sc->services->count())
                        <div class="collapse" id="serviceSubMenu{{ $loop->iteration }}">
                            <ul class="navbar-nav ps-3">
                                @foreach ($sc->services as $service)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('service-details', $service->slug) }}">
                                            {{ $service->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </li>
            @endforeach
            {{-- <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link align-items-center" data-bs-toggle="collapse" href="#btlSubMenu" role="button"
                    aria-expanded="false" aria-controls="aboutSubMenu">
                    Buyt-to-let
                    <span class="ms-2">+</span>
                </a>

                <div class="collapse" id="btlSubMenu">
                    <ul class="navbar-nav ps-3 mt-2">
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">First-Time Landlords</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Portfolio Landlords</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Limited Company BTL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">HMO / Multi-Unit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Holiday Lets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Holiday Lets</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link align-items-center" data-bs-toggle="collapse" href="#bridgingSubMenu" role="button"
                    aria-expanded="false" aria-controls="aboutSubMenu">
                    Bridging
                    <span class="ms-2">+</span>
                </a>

                <div class="collapse" id="bridgingSubMenu">
                    <ul class="navbar-nav ps-3 mt-2">
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Regulated Bridging</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Unregulated Bridging</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Auction Finance</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link align-items-center" data-bs-toggle="collapse" href="#commercialSubMenu"
                    role="button" aria-expanded="false" aria-controls="aboutSubMenu">
                    Commercial
                    <span class="ms-2">+</span>
                </a>

                <div class="collapse" id="commercialSubMenu">
                    <ul class="navbar-nav ps-3 mt-2">
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Commercial Mortgage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Semi-Commercial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">
                                Development Finance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Asset Finance</a>
                        </li>
                        <li>
                    </ul>
                </div>
            </li> --}}
        </ul>
        <div class="ms-lg-3 text-center">
            <a href="{{ route('contact') }}" class="btn cta px-4 py-2">
                Get Mortgage Advice
            </a>
        </div>
    </div>
</div>
