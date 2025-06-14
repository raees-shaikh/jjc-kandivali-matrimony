@extends('frontend.layouts.app')
@section('title', 'Profile Details - ')
@section('cdn')
    <link rel="stylesheet" href="{{ asset('frontend/dropify/css/dropify.min.css') }}">

@endsection
@section('content')
    <section class="breadcrumb-area">
        <img class="breadcrumb-area-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">

    </section>
    <section class="mb-4 detail-form px-md-0 px-3">
        <div class="register-form-container container p-3 py-4 p-md-5 custom-padding-for-desk">
            <legend class="text-center  mb-5 font-weight-600"> CANDIDATE DETAILS</legend>
            <div class="register-form-wrap">
                <section class="  pb-4 custom-h6">
                    <div class="container px-0">

                        <div class="row m-0 ">
                            <div class="col-lg-3 col-md-6 mx-auto  order-1  text-center d-lg-none d-block">
                                <img src="{{ $user->profile_image ? asset('/storage/images/profile/' . $user->profile_image) : url('/frontend/image/profile_static.svg') }}"
                                    alt="" class="profile-show-img">

                                @if ($user->profile_image || $user->images()->count())
                                    <div class="" id="lightgallery">
                                        <a href="{{ $user->profile_image ? asset('storage/images/profile/' . $user->profile_image) : url('/frontend/image/profile_static.svg') }}"
                                            class="v-gallery-btn btn box profile-btn d-lg-inline d-block  mt-2 px-md-4 d-lg-inline d-inline-block btn-sm">
                                            View Images</a>
                                        @foreach ($user->images()->get() as $image)
                                            <a href="{{ asset('storage/images/' . $image->filename) }}">
                                            </a>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                            <div class="col-lg-9 order-md-1 order-2 mt-lg-0 mt-3 px-0">
                                <div class="row w-100 mx-auto justify-content-center">
                                    <div class="col-12 col-md-6">
                                        <p>Full Name</p>
                                        <h6>{{ $user->full_name }}</h6>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <p>Email ID</p>
                                        <h6 class="text-wrap">{{ $user->email ?? '---' }}</h6>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p>Gender</p>
                                        <h6>{{ ucfirst($user->gender) }}</h6>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p>DOB/Time</p>
                                        <h6>{{ $user->date_of_birth ? dd_format($user->date_of_birth, 'd-m-Y h:i a') : '---' }}
                                        </h6>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p>Mobile</p>
                                        <h6>{{ ucfirst($user->mobile) }}</h6>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p>Mobile No WhatsApp</p>
                                        <h6>{{ ucfirst($user->alternative_mobile ?? '---') }}</h6>
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-3 col-md-6 order-md-2 order-1  text-center d-lg-block d-none">
                                <img src="{{ $user->profile_image ? asset('/storage/images/profile/' . $user->profile_image) : url('/frontend/image/profile_static.svg') }}"
                                    alt="" class="profile-show-img">

                                @if ($user->profile_image || $user->images()->count())
                                    <div class="" id="lightgallery2">
                                        <a href="{{ $user->profile_image ? asset('storage/images/profile/' . $user->profile_image) : url('/frontend/image/profile_static.svg') }}"
                                            class="btn box profile-btn  mt-2 px-md-4 btn-sm">
                                            View Images</a>
                                        @foreach ($user->images()->get() as $image)
                                            <a href="{{ asset('storage/images/' . $image->filename) }}">
                                            </a>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>


                    </div>

                    <div class="container mt-md-1 mt-0 px-0">
                        <div class="row w-100 mx-auto ">
                            <div class="col-lg-3 col-md-6">
                                <p>Place Of Birth</p>
                                <h6>{{ $user->place_of_birth ?? '---' }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p>Native Place</p>
                                <h6>{{ $user->native_place ?? '---' }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p>Caste</p>
                                <h6>{{ $user->caste ?? '---' }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p>Sub Caste</p>
                                <h6>{{ $user->sub_caste ?? '---' }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p>Mother Tongue</p>
                                <h6>{{ $user->mother_tongue ?? '---' }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p>Height</p>
                                <h6>{{ $user->height ?? '---' }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p>Blood Group</p>
                                <h6>{{ $user->blood_group ?? '---' }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p>Weight</p>
                                <h6>{{ $user->weight ?? '---' }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6 ">
                                <p>Marital Status</p>
                                <h6>{{ $user->martial_status ?? '---' }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6 ">
                                <p>Manglik</p>
                                <h6>{{ $user->manglik === null ? '---' : ($user->manglik == 1 ? 'Yes' : 'No') }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6 ">
                                <p>No. of Children</p>
                                <h6>{{ $user->no_of_children ?? '---' }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6 ">
                                <p>Status Of Children</p>
                                <h6>{{ $user->status_of_children ?? '---' }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6 ">
                                <p>Handicap</p>
                                <h6>{{ $user->handicap === null ? '---' : ($user->handicap == 1 ? 'Yes' : 'No') }}</h6>
                            </div>
                            <div class="col-lg-3 col-md-6 ">
                                <p>Handicap Details</p>
                                <h6>{{ $user->handicap_details ?? '---' }}</h6>
                            </div>


                            <div class=" col-lg-6 col-md-12  ">
                                <p>Residential Address</p>
                                <h6>{{ $user->residential_address ?? '---' }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-md-1 mt-0 px-0">

                        <legend class="text-center  my-md-5 my-3 font-weight-600"> EDUCATION AND OCCUPATION DETAILS</legend>
                        <div class="row m-0 px-2">
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Qualifiaction</p>
                                <h6>{{ $user->qualification ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Medium</p>
                                <h6>{{ $user->education_medium ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Education Details</p>
                                <h6>{{ $user->education_details ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Occupation</p>
                                <h6>{{ $user->occupation ?? '---' }}</h6>

                            </div>
                        </div>

                        <div class="row m-0 px-2 mt-4">
                            <div class="col-lg-4 col-md-6 mt-lg-0 mt-3">
                                <p>Occupation Details</p>
                                <h6>{{ $user->occupation_details ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-4 col-md-6 mt-lg-0 mt-3">
                                <p>Income (PA) - in Lakhs</p>
                                <h6>{{ $user->income ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-4 col-md-6 mt-lg-0 mt-3">
                                <p class="">Occupation Address</p>
                                <h6>{{ $user->occupation_address ?? '---' }}</h6>

                            </div>

                        </div>


                        <div class="row m-0 px-2 mt-4">
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>No. of Married Sisters
                                    (Other than Candidate)</p>
                                <h6>{{ $user->married_sisters ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>No. of Unmarried Sisters
                                    (Other than Candidate)</p>
                                <h6>{{ $user->unmarried_sisters ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>No. of Married Brothers
                                    (Other than Candidate)</p>
                                <h6>{{ $user->married_brothers ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3 ">
                                <p class="">No. of Unmarried Brothers
                                    (Other than Candidate)</p>
                                <h6>{{ $user->unmarried_brothers ?? '---' }}</h6>

                            </div>
                        </div>
                    </div>
                    <div class="container mt-4 px-0">

                        <legend class="text-center  my-md-4 my-3 font-weight-600">DETAILS OF MOSAL</legend>
                        <div class="row justify-content-center m-0">
                            <div class=" ">
                                <div class="row m-0">
                                    <div class="col-lg-4 mt-md-0 mt-3">
                                        <p class="">Name of Nana/ Mama's Name</p>
                                        <h6>{{ $user->mosal_name ?? '---' }}</h6>
                                        <p class="mt-4">Mobile Number (WhatsApp No.)</p>
                                        <h6>{{ $user->mosal_mobile ?? '---' }}</h6>
                                    </div>
                                    <div class="col-lg-8 mt-lg-0 mt-3">
                                        <p class="">Residential Address</p>
                                        <h6 class="" style="min-height: 122px">
                                            {{ $user->mosal_residential_address ?? '---' }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-4 px-0">
                        <legend class="text-center  my-md-5 my-3 font-weight-600">TWO REFERENCES WHO KNOW ABOUT YOU / YOUR
                            FAMILY</legend>

                        <div class="row m-0 px-2">
                            <h5>Person 1</h5>
                            <div class="col-lg-4  mt-md-0 mt-3">
                                <p class="">Name</p>
                                <h6 class="">{{ $referenceOne ? $referenceOne->name : '---' }}</h6>
                                <p class=" mt-4">Mobile Number (WhatsApp No.)</p>
                                <h6>{{ $referenceOne ? $referenceOne->mobile : '---' }}</h6>
                            </div>
                            <div class="col-lg-8 mt-md-0 mt-3 ">
                                <p class="">Residential Address</p>
                                <h6 class="" style="min-height: 122px">
                                    {{ $referenceOne && $referenceOne->address ? $referenceOne->address : '---' }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-4 px-0">

                        <div class="row m-0 px-2">
                            <h5>Person 2</h5>
                            <div class="col-lg-4 mt-lg-0 mt-3">
                                <p class="">Name</p>
                                <h6 class="">{{ $referenceTwo ? $referenceTwo->name : '---' }}</h6>
                                <p class=" mt-4">Mobile Number (WhatsApp No.)</p>
                                <h6>{{ $referenceTwo ? $referenceTwo->mobile : '---' }}</h6>
                            </div>
                            <div class="col-lg-8 mt-lg-0 mt-3">
                                <p class="">Residential Address</p>
                                <h6 class="" style="min-height: 122px">
                                    {{ $referenceTwo && $referenceTwo->address ? $referenceTwo->address : '---' }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-lg-1 mt-0 px-0">

                        <legend class="text-center  my-md-5 my-3 font-weight-600">FAMILY DETAILS</legend>
                        <div class="row m-0 px-2">
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Name Of Father</p>
                                <h6>{{ $user->father_name ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Occupation</p>
                                <h6>{{ $user->father_occupation ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Name Of Mother</p>
                                <h6>{{ $user->mother_name ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Occupation</p>
                                <h6>{{ $user->mother_occupation ?? '---' }}</h6>

                            </div>
                        </div>
                    </div>

                    <div class="container mt-4 px-0">
                        <legend class="text-center  my-md-5 my-3 font-weight-600">CANDIDATE'S SPECIAL CHOICE</legend>
                        <div class="row m-0 px-2">
                            <div class="col-lg-3  mt-lg-0 mt-3">
                                <p>Choice Of Life Partner</p>
                                <h6>{{ $user->choice_of_life_partner ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Willing to Settle abroad</p>
                                <div>
                                    <h6> {{ $user->willing_to_settle_abroad ?? '---' }} </h6>
                                </div>

                            </div>

                            <div class="col-md-5 mt-lg-0 mt-3 px-1">
                                <p>Willing to Marry having Strictly Jain Food habits</p>
                                <div>
                                    <h6> {{ $user->willing_to_marry_having_strictly_jain_foods ?? '---' }} </h6>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="container mt-md-1 mt-0 mb-5 px-0">
                        <legend class="text-center  my-md-5 my-3 font-weight-600">MUMBAI CONTACT FOR OUTSIDE CANDIDATE
                        </legend>
                        <div class="row m-0 px-2">
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Name</p>
                                <h6>{{ $user->mumbai_contact_name ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Mobile number</p>
                                <h6>{{ $user->mumbai_contact_mobile ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Family Relation</p>
                                <h6>{{ $user->mumbai_contact_family_relation ?? '---' }}</h6>

                            </div>
                            <div class="col-lg-3 col-md-6 mt-lg-0 mt-3">
                                <p>Residential Address</p>
                                <h6>{{ $user->mumbai_contact_address ?? '---' }}</h6>

                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <a href="{{ url()->previous() }}" class="btn box profile-btn  mt-4 px-md-4 py-2">
                                <i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>

                </section>

            </div>
        </div>
    </section>

    <style>
        .profile-show-img {
            width: 200px;
            max-height: 220px;
            object-fit: contain;
        }
    </style>


@endsection
@section('js')
    <script src="{{ asset('frontend/dropify/js/dropify.min.js') }}"></script>
    {{-- <link rel="stylesheet" href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/lg-zoom.min.js') }}"></script>>
    <script src="{{ asset('plugins/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('js/lightgallery.js') }}"></script> --}}
    <script>
        lightGallery(document.getElementById('lightgallery'), {
            speed: 500,
            download: false,
            thumbnail: true,
        });
        lightGallery(document.getElementById('lightgallery2'), {
            speed: 500,
            download: false,
            thumbnail: true,
        });
    </script>
@endsection
