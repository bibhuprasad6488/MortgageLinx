@extends('layouts.app')
@section('title', 'Terms of Business')
@section('content')
    <section>
        {!! $terms->content !!}
    </section>
@endsection
