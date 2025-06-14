@extends('frontend.layouts.app')
@section('title', 'Subscription - ')
@section('cdn')
    <link rel="stylesheet" href="{{ asset('frontend/dropify/css/dropify.min.css') }}">

@endsection
@section('content')
    <section class="breadcrumb-area">
        <img class="breadcrumb-area-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">

    </section>
    <section class=" detail-form ">
        <div class="register-form-container container p-3 py-4 p-md-5 radius-4">
            <div class="row m-0 justify-content-md-start justify-content-center ">
                <h4 class="px-0 text-center text-md-start font-weight-400">Subscription Details</h4>
                <div class="col-lg-7 px-0">
                    <div class="row m-0 mt-3 ">
                        <p class="py-2 pb-md-3 px-0 text-center text-md-start font-weight-300">A Personalised Matchmaking
                            Service for You</p>
                        <div class="col-md-6 px-0 text-center text-md-start">
                            <ul class="info-list ul-style-item">
                                <li class="f-14">
                                    <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon"
                                        height="30" alt="">
                                    Dedicated Support
                                </li>
                                <li class="f-14">
                                    <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon"
                                        height="30" alt="">
                                    Strictly No Dating Site
                                </li>
                                <li class="f-14">
                                    <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon"
                                        height="30" alt="">
                                    Detailed Profiles
                                </li>
                                <li class="f-14">
                                    <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon"
                                        height="30" alt="">
                                    Your Profile is Safe
                                </li>
                                <li class="f-14 d-md-none d-block">
                                    <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon"
                                        height="30" alt="">
                                    100% Screened Profiles
                                </li>
                                <li class="f-14 d-md-none d-block">
                                    <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon"
                                        height="30" alt="">
                                    Affordable Packages
                                </li>

                            </ul>

                        </div>
                        <div class="col-md-6 px-0 d-md-block d-none">
                            <ul class="info-list ul-style-item">
                                <li class="f-14 ">
                                    <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon"
                                        height="30" alt="">
                                    100% Screened Profiles
                                </li>
                                <li class="f-14">
                                    <img src="{{ url('frontend/image/icons/list-check-circle.svg') }}" class="icon"
                                        height="30" alt="">
                                    Affordable Packages
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5 mt-md-2 mt-4 px-0">

                    <div class="row m-0">
                        <div class="col-12 px-0">
                            <div class="card border-orange">
                                <img src="{{ url('frontend/image/icons/three-star.png') }}" alt="" width="70px"
                                    class="text-center mx-auto mt-2">
                                <h4 class="text-center my-2 sub-text">Start Subscription</h4>
                                <p class="text-center text-success"><img
                                        src="{{ url('/frontend/image/icons/hr-line.png') }}" alt=""
                                        class="mx-md-2 gray-strip px-0 mx-0"> <span class="f-14"> For 3 Years </span><img
                                        src="{{ url('/frontend/image/icons/hr-line.png') }}" alt=""
                                        class="mx-md-2 gray-strip px-0 mx-0"> </p>
                                <div class="row m-0 justify-content-center">
                                    <div class="col-2 d-lg-none d-md-block d-none"></div>
                                    {{-- <div
                                        class="col-lg-4 col-md-3 col-4 px-0 px-sm-4 text-lg-start text-left-451 text-center">
                                        <p class="light-grey f-14">Subtotal</p>
                                    </div>
                                    <div class="col-1 d-sm-block "></div>
                                    <div
                                        class="col-lg-4 col-md-3 col-4 text-lg-end text-center text-right-451 px-0 px-sm-4">
                                        <p class="light-grey f-14">INR. {{ config('app.subscription_price') }}</p>
                                    </div> --}}
                                    <div class="col-2 d-lg-none d-md-block d-none"></div>
                                    <hr class="w-80">
                                    <div class="row m-0 justify-content-center">
                                        <div
                                            class="col-lg-5 col-md-4 col-5 px-0 px-sm-5 text-left-451 text-lg-start text-center">
                                            <p class="light-grey h5 px-0 opacity-08">Total</p>

                                        </div>

                                        <div
                                            class="col-lg-5 col-md-4 col-5 text-lg-end text-center text-right-451 p-0 px-0 px-sm-4">
                                            <p class="orange-text h5"><b>Rs. {{ config('app.subscription_price') }}/-</b>
                                            </p>

                                        </div>
                                        {{ $api->showPaymentForm($params) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <style>
        #payment_form_submit {
            text-align: center;
        }
    </style>

@endsection
@section('js')
    <script src="{{ asset('frontend/dropify/js/dropify.min.js') }}"></script>
    <script></script>
@endsection
