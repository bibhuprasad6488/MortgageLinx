<div class="menu">
    <nav class="navbar navbar-expand-lg navbar-dark tbb2">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ $setting->site_logo ? asset('storage/images/settings/' . $setting->site_logo) : '' }}"
                    alt="{{ $setting->site_title }}">
            </a>

            <!-- Mobile toggler -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu"
                aria-controls="mobileMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Desktop menu -->
            <div class="collapse navbar-collapse d-none d-lg-flex">
                <ul class="navbar-nav ms-auto align-items-lg-center my_menu">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a>
                    </li>

                    @foreach ($serviceCats as $sc)
                        <li class="nav-item dropdown">

                            <a class="nav-link"
                                href="@if ($sc->slug == 'protection') {{ route('protection') }}@else{{ route('service', $sc->slug) }} @endif">
                                {{ $sc->title }}
                            </a>

                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            </a>

                            <ul class="dropdown-menu rounded-0">
                                @foreach ($sc->services as $service)
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('service-details') && request()->route('slug') == $service->slug ? 'active' : '' }}"
                                            href="{{ route('service-details', $service->slug) }}">
                                            {{ $service->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">Contact Us</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Buy-to-let
                        </a>
                        <ul class="dropdown-menu rounded-0">
                            <li><a class="dropdown-item" href="#">First-Time Landlords</a></li>
                            <li><a class="dropdown-item" href="#">Portfolio Landlords</a></li>
                            <li><a class="dropdown-item" href="#">Limited Company BTL</a></li>
                            <li><a class="dropdown-item" href="#">HMO / Multi-Unit</a></li>
                            <li><a class="dropdown-item" href="#">Holiday Lets</a></li>
                            <li><a class="dropdown-item" href="#">Complex BTL</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Bridging
                        </a>
                        <ul class="dropdown-menu rounded-0">
                            <li><a class="dropdown-item" href="#">Regulated Bridging</a></li>
                            <li><a class="dropdown-item" href="#">Unregulated Bridging</a></li>
                            <li><a class="dropdown-item" href="#">Auction Finance</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Commercial
                        </a>
                        <ul class="dropdown-menu rounded-0">
                            <li><a class="dropdown-item" href="#">Commercial Mortgages</a></li>
                            <li><a class="dropdown-item" href="#">Semi-Commercial</a></li>
                            <li><a class="dropdown-item" href="#">Development Finance</a></li>
                            <li><a class="dropdown-item" href="#">Asset Finance</a></li>
                        </ul>
                    </li> --}}

                </ul>
                <div class="ms-lg-3">
                    <a href="{{ route('contact') }}" class="btn cta px-4 py-2">
                        Speak to a Specialist
                    </a>
                </div>
            </div>

        </div>
    </nav>
</div>
