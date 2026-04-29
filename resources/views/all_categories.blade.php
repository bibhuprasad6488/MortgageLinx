@extends('layouts.app')
@section('title', 'All Services')
@section('content')

    <section class="section brand_coloring pb-5">
        <div class="container">
            <div class="row ">
                @foreach ($serviceCats as $cat)
                    <div class="col-md-3">
                        <div class="text-center service card">
                            <a href="{{ route('service', $cat->slug) }}" class="text-dark text-decoration-none">
                                <img src="{{ $cat->cat_image }}" class="w-100" >
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
