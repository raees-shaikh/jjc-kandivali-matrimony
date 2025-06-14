@extends('frontend.layouts.app')
@section('title', 'Contact Us - ')
@section('cdn')
    <link rel="stylesheet" href="{{ asset('frontend/dropify/css/dropify.min.css') }}">
    <style>
        @media screen and (max-width:1115px) {
            .pink-img {
                background-size: cover !important;

            }

        }

        @media screen and (min-width:1120px) {
            .mr-- {
                position: relative;
                left: -8px;
            }

        }

        @media only screen and (max-width: 1115px) and (min-width: 400px) {
            .pink-img {
                background: url('frontend/image/pink-img.png ');

                background-repeat: no-repeat;
                background-size: contain;
                border-radius: 10px;
            }
        }


        .pink-img {
            background: url('frontend/image/pink-img.png ');
            padding: 5px 0px 67px;
            background-repeat: no-repeat;
            background-size: contain;

        }

        @media screen and (max-width:400px) {
            .pink-img {
                background: url('frontend/image/pink-img.png ');
                padding: 5px 0px 48px;
                background-repeat: no-repeat;
                background-size: contain;
                border-radius: 10px;
            }
        }

        input:focus {
            outline: none !important;
            outline: 0 !important;
            outline: none !important;
            outline: 0 !important;
        }

        @media screen and (max-width:346px) {
            .contact-add {

                margin-right: 0px !important;
                padding-right: 20px;
            }

            .pink-img {
                background-size: cover !important;
                padding: 0px 0px 90px;
            }

            .small,
            small {
                font-size: 0.775em;
            }
        }
    </style>
@endsection
@section('content')
    <section class="breadcrumb-area">
        <img class="breadcrumb-area-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">

    </section>

    <section class=" detail-form ">
        <div class="register-form-container container py-3  ">
            <h2 class="text-center">Contact Us</h2>
            <p class="text-center light-grey mb-4">Any question or remarks? Just write us a message!</p>
            <div class="card  width-xl mx-auto custom-card-design">
                <div class="row m-0  justify-content-center justify-content-md-start  py-xl-0 py-lg-1 px-xl-0 px-2">




                    <div class="col-lg-5    pink-img  my-lg-2 mr-- order-lg-1 order-2 px-3">

                        <h4 class=" text-white mt-3 px-3 h3">Contact Information</h4>
                        <small class="px-3 silver">Say something to start a live chat!</small>
                        <div class=" mt-3">
                            <ul class="list-unstyled">
                                {{-- <li class="mb-3 mx-3">
                                    <a href="tel:+91-22-28660169" class="icon-group text-white text-decoration-none">
                                        <i class="fa fa-phone fs-12 pink-card-text"></i>
                                        <small class="contact-info fs-12 pink-card-text">
                                            &nbsp; +91-22-28660169
                                        </small>
                                    </a>
                                </li> --}}
                                <li class="mb-1 d-sm-inline m--14">
                                    <a href="tel:+919869787439" class="icon-group text-white text-decoration-none">
                                        <i class="fa fa-phone fs-12 pink-card-text"></i>
                                        <small class="opacity-08 contact-info fs-12 pink-card-text">
                                            &nbsp; +91-9869787439 <span class="d-sm-inline d-none">|</span>
                                        </small>
                                    </a>
                                </li>
                                <li class=" px-0 mx-0 d-sm-inline">
                                    <a href="tel:+919821050169" class="icon-group text-white text-decoration-none">

                                        <small class="opacity-08 contact-info fs-12 pink-card-text font-family-regular m-sm-40">
                                            +91-9821050169 <span class="d-sm-inline d-none">|</span>
                                        </small>
                                    </a>
                                </li>
                                <li class="mt-2 mx-3">
                                    <a href="tel:+918104597390" class="icon-group text-white text-decoration-none">

                                        <small class="opacity-08 contact-info fs-12 pink-card-text font-family-regular">
                                            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; +91-8104597390
                                        </small>
                                    </a>
                                </li>
                                <li class="mt-2 mx-3">
                                    <a href="mailto:info@jjckandivali.com"
                                        class="icon-group text-white text-decoration-none">
                                        <i class="fa fa-envelope fs-12 pink-card-text"></i>
                                        <small
                                            class="opacity-08 contact-info contact fs-12 pink-card-text font-family-regular">
                                            &nbsp; info@jjckandivali.com
                                        </small>
                                    </a>
                                </li>
                                {{-- <li class=" mx-3 ">

                                    <a href="" class="icon-group text-white text-decoration-none contact-location">
                                        <i class="fa-solid fa-location-dot fs-12 pink-card-text"></i>
                                    </a>
                                    <p
                                        class="opacity-08 text-white d-block contact-add  f-12 pink-card-text font-family-regular">
                                         C/o. Calcutta Tea Centre, 5, Dattani Shopping Centre, Vasanji Lalji Road, Kandivali
                                        (West), Mumbai - 400 067.
                                        C/o. Calcutta Tea Centre, 5, Dattani Shopping Centre, Vasanji Lalji Road, Kandivali
                                        (West), Mumbai - 400 067.
                                    </p>

                                </li> --}}
                                <li class=" mx-3 mt-3 ">
                                    <h5 class="correspondence-add">Correspondence Office</h5>
                                    <div class="cust-second-add">
                                        <a href=""
                                            class="icon-group text-white text-decoration-none contact-location">
                                            <i class="fa-solid fa-location-dot fs-12 pink-card-text"></i>
                                        </a>
                                        <p
                                            class="opacity-08 text-white d-block contact-add pb-3 f-12 pink-card-text font-family-regular">
                                            {{-- C/o. Calcutta Tea Centre, 5, Dattani Shopping Centre, Vasanji Lalji Road, Kandivali
                                        (West), Mumbai - 400 067. --}}
                                            Jain Sagpan Mahiti Centre
                                            Shop No. 9, Sai Raj Garden,
                                            Opp. Modi Park,
                                            Hemu Kalani Road No. 3,
                                            Irani Wadi,
                                            Kandivali (West),
                                            Mumbai - 400 067.
                                        </p>
                                    </div>

                                </li>

                            </ul>
                            <div class="px-3">
                                <button class="btn py-1 px-2 text-red download-form-btn " data-bs-toggle="modal"
                                    data-bs-target="#loginPopup-2">
                                    Download Form
                                </button>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-7  padding-xl order-lg-2 order-1">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <form action="{{ route('contact.submit') }}" method="post" class="border-bottom">
                                    @csrf
                                    <div class="form-group mt-4">
                                        <label for="email" class="light-grey bold-fn">First Name</label>
                                        <input type="text" class="form-control px-0 fs-15 focus-fn mt-1"
                                            name="first_name" id="f-name" placeholder="Enter First Name" minlength="3"
                                            maxlength="30" value="{{ old('first_name') }}" required>
                                        @if (session()->has('contact-from-error') && $errors->has('first_name'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('first_name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="pwd" class="bold-email light-grey">Email</label>
                                        <input type="email" class="form-control px-0 focus-email fs-15 mt-1"
                                            name="email" id="email" placeholder="Enter Email" minlength="5"
                                            maxlength="40" value="{{ old('email') }}" required>
                                        @if (session()->has('contact-from-error') && $errors->has('email'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-4 border-bottom b-bottom">
                                    <label for="email" class="light-grey focus-bold">Last Name</label>
                                    <input type="text" class="input-control px-0 cust-input fs-15 focus-ln mt-1"
                                        id="l-name" placeholder="Enter Last Name" name="last_name" minlength="3"
                                        maxlength="30" value="{{ old('last_name') }}" required>
                                    @if (session()->has('contact-from-error') && $errors->has('last_name'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('last_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mt-4 border-bottom">
                                    <label for="pwd" class="bold-phone light-grey">Phone Number</label>
                                    <input type="text" class="input-control px-0 cust-input fs-15 focus-phone mt-1"
                                        id="phone" placeholder="Enter Phone Number" name="phone" minlength="10"
                                        maxlength="10" value="{{ old('phone') }}" required>
                                    @if (session()->has('contact-from-error') && $errors->has('phone'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <div class="form-group mt-4 border-bottom">
                                    <label for="email" class="light-grey bold-msg">Messsage</label>
                                    <input type="text" name="message"
                                        class="input-control px-0 cust-input fs-15 focus-msg mt-1" id="msg"
                                        placeholder="Write Your Messsage" minlength="5" maxlength="250"
                                        value="{{ old('message') }}" required>
                                    @if (session()->has('contact-from-error') && $errors->has('message'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('message') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="my-5 text-lg-end text-center">
                                <button class="cust-btn d-inline  fs-15 box " type="submit">Send Message</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
@section('js')
    <script src="{{ asset('frontend/dropify/js/dropify.min.js') }}"></script>
    <script>
        $(".focus-ln").focus(function() {
            $(".focus-bold").css({
                "color": "black",
                "font-weight": "bold"
            });
        });
        $(".focus-ln").blur(function() {
            $(".focus-bold").css({
                "color": "#55595F",
                "font-weight": "normal"
            });
        });
        $(".focus-fn").focus(function() {
            $(".bold-fn").css({
                "color": "black",
                "font-weight": "bold"
            });
        });
        $(".focus-fn").blur(function() {
            $(".bold-fn").css({
                "color": "#55595F",
                "font-weight": "normal"
            });
        });
        $(".focus-email").focus(function() {
            $(".bold-email").css({
                "color": "black",
                "font-weight": "bold"
            });
        });
        $(".focus-email").blur(function() {
            $(".bold-email").css({
                "color": "#55595F",
                "font-weight": "normal"
            });
        });
        $(".focus-phone").focus(function() {
            $(".bold-phone").css({
                "color": "black",
                "font-weight": "bold"
            });
        });
        $(".focus-phone").blur(function() {
            $(".bold-phone").css({
                "color": "#55595F",
                "font-weight": "normal"
            });
        });
        $(".focus-msg").focus(function() {
            $(".bold-msg").css({
                "color": "black",
                "font-weight": "bold"
            });
        });
        $(".focus-msg").blur(function() {
            $(".bold-msg").css({
                "color": "#55595F",
                "font-weight": "normal"
            });
        });
    </script>
@endsection
