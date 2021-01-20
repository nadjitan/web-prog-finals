@extends('layouts.app')

@section('pageTitle', '- Home')

@section('content')
    <div class="main-body" style="margin-top: 260px;">
        <div class="container-hom-row-1">
            <div class="con-1-col-home-1">
                <div class="sub-text">
                    <div>Fast</div>
                    <div>Secure</div>
                    <div>Accessible</div>
                </div>

                <div class="main-text">BOOKING</div>

                <a class="btn btn-gs" href="{{ route('signup') }}">Get Started</a>
            </div>

            <div class="con-1-col-home-2">
                <img src="{{ asset('img/undraw_aircraft_fbvl.svg') }}" alt="">
            </div>
        </div>
        
        <div class="container-hom-row-2">
            <img src="{{ asset('img/logo-3.svg') }}" alt="">
            <img src="{{ asset('img/logo-8.svg') }}" alt="">
            <img src="{{ asset('img/logo-4.svg') }}" alt="">
            <img src="{{ asset('img/logo-10.svg') }}" alt="">
            <img src="{{ asset('img/logo-11.svg') }}" alt="">
        </div>

        <div class="home-learn-more">
            <button class="btn btn-learn">Learn More<div class="icon-expand-white"></div></button>
        </div>
    </div>
@endsection