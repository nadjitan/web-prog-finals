@extends('layouts.app')

@section('pageTitle', '- Contact Us')

@section('content')
    <div class="main-body contact-us" style="margin-top: 220px;">
        <div class="header-contact-us">Contact Us</div>

        <div class="container-contact-us">
            <form class="cu-form" action="">
                <input type="name" placeholder="Your Name" class="input">
                <input type="email" placeholder="Your Email" class="input">
                <textarea name="paragraph_text" cols="50" rows="10" class="input"></textarea>

                <a href="#SUBMIT-MAIL" class="btn btn-signup btn-send">Send</a>
            </form>

            <div class="cu-socials">
                <img src="{{ asset('img/Vertical-white.svg') }}" alt="">

                <div class="cu-contact-options">
                    <div>
                        <div class="icon-phone"></div> +63 987-654-3210
                    </div>
                    
                    <div>
                        <div class="icon-email"></div> customer.support@agilabooking.com
                    </div>
                </div>

                <img src="{{ asset('img/Social Media Icons.svg') }}" alt="">
            </div>
        </div>
    </div>
@endsection