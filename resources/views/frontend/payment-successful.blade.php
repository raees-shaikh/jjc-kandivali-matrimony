@extends('frontend.layouts.app')
@section('title', 'Payment Successfull - ')
@section('cdn')
    <link rel="stylesheet" href="{{ asset('frontend/dropify/css/dropify.min.css') }}">

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
                        <hr class="d-md-block d-none hr-payment">
                        <h3 class="success-color mt-md-0 mt-3">Payment Successful!</h3>
                        {{-- <p class="opacity-06 light-grey d-inline-block py-2 px-5 mt-3 description"> Transaction ID : <span>
                                {{ $transaction_id }}</span></p> --}}
                        <p class="light-grey mt-2 opacity-06 font-weight-400">Your Subscription Will Be Activated Soon</p>
                        <button class="d-block go-to-profile mx-auto mt-4">
                            <a href="{{ route('frontend.profile') }}" class="font-weight-600 text-white text-decoration-none"> Go To
                                Profile</a>
                        </button>
                    </div>
                    <div class="col-lg-5 order-lg-2 order-1">
                        <img src="{{ asset('frontend/image/success-mobile.png') }}" alt=""
                            class="w-100 d-md-block d-none">
                        <img src="{{ asset('frontend/image/right-circle.png') }}" alt=""
                            class="w-auto d-md-none d-block mx-auto">
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
