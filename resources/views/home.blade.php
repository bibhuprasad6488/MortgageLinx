@extends('layouts.app')
@section('title', $setting->site_title)
@section('meta_title', $setting->site_title)
@section('meta_description', $setting->site_meta_desc)
@section('meta_keywords', $setting->site_meta_key)
@section('content')
    @php
        // dd(['homePage' => $homePage, 'setting' => $setting, 'serviceCats' => $serviceCats]);
    @endphp
    <h1>Home Page Loading....</h1>
@endsection
