@extends('layouts.app')
@section('title', 'Privacy Policy')
@section('content')
<section>
    {!! $privacy->content !!}
</section>
@endsection
