@extends('frontend.layouts.app')
@section('title', 'Payment Failed - ')
@section('cdn')
    <link rel="stylesheet" href="{{ asset('frontend/dropify/css/dropify.min.css') }}">

    <style>
        .failed-color {
            color: #E31111;
        }

        .failed-btn {
            width: 250px;
            height: 40px;
            left: 323px;
            top: 658px;
            background: #E31111;
            border: 1px solid #FFFFFF;
            border-radius: 42px;
            font-size: 18px;
            color: white;
        }
    </style>
@endsection
@section('content')
    <section class="breadcrumb-area">
        <img class="breadcrumb-area-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">

    </section>
    <section class=" detail-form ">
        <div class="register-form-container container  p-3 py-4 p-md-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mt-md-5 pt-md-4 order-lg-1 order-2">
                        <h3 class="d-md-block d-none payment-details">Payment Details</h3>
                        <hr class="d-md-block d-none">
                        <h3 class="failed-color mt-md-0 mt-3">Payment Failed!</h3>
                        {{-- <p class="opacity-06 light-grey d-inline-block py-2 px-4 mt-3 description d-md-block d-none"> Transaction ID :
                            <span> {{ $transaction_id }}</span> --}}
                        </p>
                        <p class="failed-color mt-2 failed-text font-weight-400 opacity-06">Your Subscription Has Failed!.</p> 
                        <button class="d-block go-to-profile-fail mx-auto mt-4">
                            <a href="{{ route('frontend.subscription') }}" class="text-white text-decoration-none font-weight-600"> Go To
                                Subscription Page</a>
                        </button>
                    </div>
                    <div class="col-lg-5 order-lg-2 order-1">
                        <img src="frontend/image/failed.png" alt="" class="w-100 d-md-block d-none">
                        <img src="frontend/image/failed-mobile.png" alt="" class="w-auto d-md-none d-block mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="{{ asset('frontend/dropify/js/dropify.min.js') }}"></script>
    <script></script>
@endsection
