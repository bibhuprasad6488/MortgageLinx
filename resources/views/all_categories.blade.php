@extends('layouts.app')
@section('title', 'All Services')
@section('content')

    <div id="all_services" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ asset('images/form.jpg') }}')">
        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100">

                    <!-- LEFT -->
                    <div class="col-lg-12 text-white text-center">
                        <h4 class="mb-3 page-banner-title">All Services</h4>
                        <p class="page_banner-text">Life is unpredictable. The right protection gives you and your
                            family peace of mind, no matter what the future holds.</p>

                        {{-- <a href="#"><button class="btn bannerbtn1 custom-btn">Get a Free Consultation</button></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section brand_coloring pb-5">
        <div class="container">
            <div class="row ">
                @foreach ($serviceCats as $cat)
                    <div class="col-md-3">
                        <div class="text-center service card">
                            <a href="{{ route('service', $cat->slug) }}" class="text-dark text-decoration-none">
                                <img src="{{ $cat->cat_image }}" class="w-100">
                            </a>
                            <div class="service-text">
                                <a href="{{ route('service', $cat->slug) }}" class="text-dark text-decoration-none">
                                    <h4>{{ $cat->title }}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
