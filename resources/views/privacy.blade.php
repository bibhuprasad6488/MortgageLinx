@extends('layouts.app')
@section('title', 'Privacy Policy')
@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! $privacy->content ?? '' !!}
                </div>
            </div>
        </div>
    </section>
@endsection
