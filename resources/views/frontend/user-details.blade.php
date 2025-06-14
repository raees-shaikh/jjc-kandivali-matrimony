@extends('frontend.layouts.app')
@section('title', 'User Details - ')
@section('cdn')
    <link rel="stylesheet" href="{{ asset('frontend/dropify/css/dropify.min.css') }}">

@endsection
@section('content')
    <section class="breadcrumb-area">
        <img class="breadcrumb-area-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">
        <h1 class="text-center  text-pink bread-align">User Details</h1>
    </section>

    <section class="gray-bg mt-160 pb-5 custom-h6">
        <div class="container">
            <h3 class="text-center py-md-5 py-4">Candidate Details</h3>
            <div class="row m-0">
                <div class="col-md-9 order-md-1 order-2 mt-md-0 mt-3">
                    <div class="row m-0">
                        <div class="col-md-4">
                            <p>Full Name*</p>
                            <h6>Testing User</h6>
                            <p class="mt-4">Gender*</p>
                            <h6>Male</h6>
                        </div>
                        <div class="col-md-4 mt-md-0 mt-3">
                            <p>Email ID*</p>
                            <h6>User12@gmail.com</h6>
                            <p class="mt-4">Place Of Birth*</p>
                            <h6>Mumbai</h6>
                        </div>
                        <div class="col-md-4 mt-md-0 mt-3">
                            <p>DOB*</p>
                            <h6>12/12/2000</h6>
                            <p class="mt-4">Native Place*</p>
                            <h6>Mumbai</h6>
                        </div>

                    </div>
                </div>
                <div class="col-md-3 order-md-2 order-1  text-center">
                    <img src="{{ url('/frontend/image/profile_static.svg') }}" alt="" class="" width="180px">
                </div>
            </div>


        </div>

        <div class="container mt-md-1 mt-0">
            <div class="row m-0 px-2">
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Marital Status*</p>
                    <h6>Married</h6>
                    <p class="mt-4">Sub Caste*</p>
                    <h6>Open</h6>
                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Status Of Children*</p>
                    <h6>Living With Me</h6>
                    <p class="mt-4">Mother Tongue*</p>
                    <h6>English</h6>
                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>No. of Children*</p>
                    <h6>2</h6>
                    <p class="mt-4">Manglik*</p>
                    <h6>No</h6>
                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Caste*</p>
                    <h6>Caste D</h6>
                    <p class="mt-4">Handicap*</p>
                    <h6>No</h6>
                </div>
            </div>
        </div>

        <div class="container mt-md-1 mt-0">
            <h3 class="text-center py-md-5 py-4 ">Education And Occupation Details</h3>
            <div class="row m-0 px-2">
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Education*</p>
                    <h6>Graduate</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Medium*</p>
                    <h6>English</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Education Details*</p>
                    <h6>Master</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Occupation*</p>
                    <h6>Business</h6>

                </div>
            </div>

            <div class="row m-0 px-2 mt-4">
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Occupation Details*</p>
                    <h6>No Details</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Income (PA) - in Lakhs*</p>
                    <h6>1000000</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Occupation Address*</p>
                    <h6>UK</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3 px-md-0">
                    <p class="px-0">Mobile Number
                        (WhatsApp No.)*</p>
                    <h6>8888888888</h6>

                </div>
            </div>


            <div class="row m-0 px-2 mt-4">
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>No. of Married Sisters
                        (Other than Candidate)*</p>
                    <h6>2</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>No. of Married Sisters
                        (Other than Candidate)*</p>
                    <h6>1</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>No. of Married Sisters
                        (Other than Candidate)*</p>
                    <h6>2</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3 ">
                    <p class="">No. of Married Sisters
                        (Other than Candidate)*</p>
                    <h6>2</h6>

                </div>
            </div>
        </div>
        <div class="container mt-4">
            <h3 class="text-center py-4">Details Of Mosal</h3>
            <div class="row justify-content-center m-0">
                <div class="col-md-8 mt-md-0 mt-3">
                    <div class="row m-0">
                        <div class="col-md-6">
                            <p class="">Name of Nana/ Mama's Name</p>
                            <h6>Xyz</h6>
                            <p class="mt-md-0 mt-4">Mobile Number (WhatsApp No.)</p>
                            <h6>7777777777</h6>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-3">
                            <p class="">Residential Address</p>
                            <h6 class="h-106">Mumbai</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <h3 class="text-center py-md-5 py-4">Two References Who Know About You / Your Family</h3>
            <div class="row m-0 px-2">
                <h5>Person 1</h5>
                <div class="col-md-4 mt-md-0 mt-3">
                    <p class="">Name of Nana/ Mama's Name</p>
                    <h6 class="">xyz</h6>
                    <p class="mt-md-0 mt-4">Mobile Number (WhatsApp No.)</p>
                    <h6>7777777777</h6>
                </div>
                <div class="col-md-8 mt-md-0 mt-3">
                    <p class="">Residential Address</p>
                    <h6 class="h-106">Mumbai</h6>
                </div>
            </div>
        </div>

        <div class="container mt-4">

            <div class="row m-0 px-2">
                <h5>Person 2</h5>
                <div class="col-md-4 mt-md-0 mt-3">
                    <p class="">Name of Nana/ Mama's Name</p>
                    <h6 class="">xyz</h6>
                    <p class="mt-md-0 mt-4">Mobile Number (WhatsApp No.)</p>
                    <h6>7777777777</h6>
                </div>
                <div class="col-md-8 mt-md-0 mt-3">
                    <p class="">Residential Address</p>
                    <h6 class="h-106">Mumbai</h6>
                </div>
            </div>
        </div>

        <div class="container mt-md-1 mt-0">
            <h3 class="text-center py-md-5 py-4 ">Family Details</h3>
            <div class="row m-0 px-2">
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Name Of Father*</p>
                    <h6>Xyz</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Occupation*</p>
                    <h6>Business</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Name Of Mother*</p>
                    <h6>abc</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Occupation*</p>
                    <h6>Business</h6>

                </div>
            </div>
        </div>

        <div class="container mt-4">
            <h3 class="text-center py-md-5 py-4 "> Candidate's Special Choice</h3>
            <div class="row m-0">
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Choice Of Life Partner*</p>
                    <h6>Xyz</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Willing to Settle abroad*</p>
                    <div>
                        <input type="checkbox" class="form-control-check mx-2">Yes
                        <input type="checkbox" class="form-control-check mx-2">No
                    </div>

                </div>

                <div class="col-md-5 mt-md-0 mt-3">
                    <p>Willing to Marry having Strictly Jain Food habits*</p>
                    <div>
                        <input type="checkbox" class="form-control-check mx-2">Yes
                        <input type="checkbox" class="form-control-check mx-2">No
                    </div>

                </div>
            </div>
        </div>

        <div class="container mt-md-1 mt-0 mb-5">
            <h3 class="text-center py-md-5 py-4 ">Mumbai Contact For Outside Candidate</h3>
            <div class="row m-0 px-2">
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Name*</p>
                    <h6>Xyz</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Mobile number*</p>
                    <h6>7878787878</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Family Relation*</p>
                    <h6>Friend</h6>

                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <p>Residential Address*</p>
                    <h6>Mumbai</h6>

                </div>
            </div>
        </div>

    </section>


@endsection
@section('js')
    <script src="{{ asset('frontend/dropify/js/dropify.min.js') }}"></script>
    <script></script>
@endsection
