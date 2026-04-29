@extends('layouts.app')
@section('title', $serviceCat->title)
@section('content')
    <div id="intro-example" class="carousel slide" data-bs-ride="carousel"
        style="background-image: url('{{ $serviceCat->cat_image }}')">
        <!-- CONTENT OVERLAY (same as your current content) -->
        <div class="mask">
            <div class="container h-100">
                <div class="row h-100 align-items-center">

                    <!-- LEFT -->
                    <div class="col-lg-6 text-white">
                        {!! $serviceCat->title !!}
                        <p class="banner-text">
                            {{ $serviceCat->short_desc }}
                        </p>
                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-6 text-white text-center">
                        <p>
                            <a href="{{ route('contact') }}">
                                <button class="btn bannerbtn1 custom-btn">
                                    Speak to a Specialist
                                </button>
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
