@extends('frontend.layouts.app')
@section('title')

@section('content')
    <section class="hero pt-5">
        <img class="hero-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">
        <div class="container pt-5">
            <div class="row align-items-stretch">
                <div class="col-md-6 col-sm-12 text-center d-flex align-items-center justify-content-center">
                    <div class="py-5 m-custom">

                        <h1 class="font-cursive text-pink display-3">
                            Find Your
                            <br>
                            Perfect Match
                        </h1>
                        @auth
                        @else
                            <p>
                                Join Our Matrimonial Website Today!
                            </p>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#loginPopup"
                                class="hero-cta-btn btn btn-lg box">Register Now</a>
                        @endauth
                    </div>

                </div>
                <div class="col-md-6 col-sm-12 d-flex align-items-end">
                    <img src="{{ url('frontend/image/new-banner-img.png') }}" style="max-width: 600px;" draggable="false"
                        class="w-100 d-block mx-auto" alt="">
                </div>
            </div>
        </div>
        <img class="petals-left" src="{{ url('frontend/image/petals.png') }}" alt="">
        <img class="petals-right" src="{{ url('frontend/image/petals.png') }}" alt="">
        <img class="corner-rose" src="{{ url('frontend/image/corner-rose.png') }}" alt="">

    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-md-start text-center">
                About Us
            </h2>
            <div class="row mb-4">
                <div class="col">
                    <p class="h5 font-weight-300 mb-3 text-md-start text-center f-14-sm">
                        A wedding is usually regarded as one of the most important events in a person's lifetime. It should
                        be
                        memorialized
                        and cherished
                    </p>
                </div>
                @auth
                @else
                    <div class="col-md-4 col-lg-3 d-flex align-items-center justify-content-md-end justify-content-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginPopup"
                            class="btn btn-gradient btn-lg d-inline-block w-auto box ">
                            Register Now
                        </a>
                    </div>
                @endauth
            </div>
            <div class="row flex-column-reverse flex-sm-column-reverse flex-md-row align-items-center ">
                <div class="col-md-6 col-12 mt-md-0 mt-5 text-md-start text-center">
                    <ul class="info-list ul-style-item">
                        <li>
                            <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon" height="30"
                                alt="">
                            Only Genuine Profiles
                        </li>
                        <li>
                            <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon" height="30"
                                alt="">
                            Detailed Profiles
                        </li>
                        <li>
                            <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon" height="30"
                                alt="">
                            100% Screened Profiles
                        </li>
                        <li>
                            <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon" height="30"
                                alt="">
                            Strictly No Dating Site
                        </li>
                        <li>
                            <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon" height="30"
                                alt="">
                            Your Profile is Safe
                        </li>
                        <li>
                            <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon"
                                height="30" alt="">
                            Profile Recommendations
                        </li>
                        <li>
                            <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon"
                                height="30" alt="">
                            Dedicated Support
                        </li>
                        <li>
                            <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon"
                                height="30" alt="">
                            Affordable Packages
                        </li>
                    </ul>

                </div>
                <div class="col-md-6 col-12">
                    <img src="{{ url('frontend/image/about-us-img.png') }}" class="w-100 image-drop-shadow "
                        alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
