<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                {{ auth()->user()->name }}
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ request()->routeIs(['admin.dashboard']) ? 'active' : '' }} ">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li> --}}
                <li class="nav-item">
                    <a data-bs-toggle="collapse" data-bs-target="#base" href="javascript:void(0)">
                        <i class="fas fa-layer-group"></i>
                        <p>Cms Pages</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs(['admin.homepage.*', 'admin.privacy-policy.*', 'admin.terms-and-condition.*', 'admin.become-introducer.*', 'admin.protection-page.*', 'admin.introducer-details-page', 'admin.aboutus.index', 'admin.ourprocess.index', 'admin.contactus.*']) ? 'show' : '' }}"
                        id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs(['admin.homepage.index']) ? 'active' : '' }}">
                                <a href="{{ route('admin.homepage.index') }}">
                                    <span class="sub-item">Home Page</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs(['admin.aboutus.index']) ? 'active' : '' }}">
                                <a href="{{ route('admin.aboutus.index') }}">
                                    <span class="sub-item">About Us</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs(['admin.contactus.index']) ? 'active' : '' }}">
                                <a href="{{ route('admin.contactus.index') }}">
                                    <span class="sub-item">Contact Us</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs(['admin.ourprocess.index']) ? 'active' : '' }}">
                                <a href="{{ route('admin.ourprocess.index') }}">
                                    <span class="sub-item">Our Process</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs(['admin.become-introducer.index']) ? 'active' : '' }}">
                                <a href="{{ route('admin.become-introducer.index') }}">
                                    <span class="sub-item">Introducer</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs(['admin.introducer-details-page']) ? 'active' : '' }}">
                                <a href="{{ route('admin.introducer-details-page') }}">
                                    <span class="sub-item">Introducer Details</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs(['admin.protection-page.index']) ? 'active' : '' }}">
                                <a href="{{ route('admin.protection-page.index') }}">
                                    <span class="sub-item">Protection</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs(['admin.privacy-policy.index']) ? 'active' : '' }}">
                                <a href="{{ route('admin.privacy-policy.index') }}">
                                    <span class="sub-item">Privacy Policy</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs(['admin.terms-and-condition.index']) ? 'active' : '' }}">
                                <a href="{{ route('admin.terms-and-condition.index') }}">
                                    <span class="sub-item">Terms & Condition</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->routeIs(['admin.service-categories.*']) ? 'active' : '' }} ">
                    <a href="{{ route('admin.service-categories.index') }}">
                        <i class="fa fa-book"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs(['admin.services.*']) ? 'active' : '' }} ">
                    <a href="{{ route('admin.services.index') }}">
                        <i class="fas fa-book-open"></i>
                        <p>Services</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs(['admin.partners.*']) ? 'active' : '' }} ">
                    <a href="{{ route('admin.partners.index') }}">
                        <i class="fas fa-handshake"></i>
                        <p>Partners</p>
                    </a>
                </li>
                {{-- <li class="nav-item {{ request()->routeIs(['admin.introducers-list']) ? 'active' : '' }} ">
                    <a href="{{ route('admin.introducers-list') }}">
                        <i class="fas fa-user-friends"></i>
                        <p>Introducers</p>
                    </a>
                </li> --}}
                <li class="nav-item {{ request()->routeIs(['admin.website-setting.index']) ? 'active' : '' }} ">
                    <a href="{{ route('admin.website-setting.index') }}">
                        <i class="fas fa-cogs"></i>
                        <p>Site Setting</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
