@extends('layouts.app')
@section('title', 'Terms of Business')
@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! $terms->content ?? '' !!}
                </div>
            </div>
        </div>
    </section>
@endsection
