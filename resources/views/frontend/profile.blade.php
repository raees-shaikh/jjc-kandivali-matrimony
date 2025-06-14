@extends('frontend.layouts.app')
@section('title', 'Profile - ')
@section('cdn')
    <link rel="stylesheet" href="{{ asset('frontend/dropify/css/dropify.min.css') }}">
    <style>
        ::-webkit-scrollbar {
            width: 3px;
            height: 5px;

        }

        ::-webkit-scrollbar-track {
            background-color: #ebebeb;
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background: #6d6d6d;
        }
    </style>

@endsection
@section('content')
    <section class="breadcrumb-area">
        <img class="breadcrumb-area-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">

    </section>
    <section class=" detail-form ">
        <div class="register-form-container container p-3 py-4 p-md-5 radius-4">
            <div class="row m-0 justify-content-md-start justify-content-center ">
                <div class="col-xl-3 ">

                    <a id="lightgallery1"
                        href="{{ $user->profile_image ? asset('storage/images/profile/' . $user->profile_image) : url('/frontend/image/profile_static.svg') }}"
                        class="d-contents">
                        <img src="{{ $user->profile_image ? asset('storage/images/profile/' . $user->profile_image) : url('/frontend/image/profile_static.svg') }}"
                            alt="" width="230px" class="d-block mb-3 mx-auto profile-photo-main">
                    </a>
                    <div class="text-center d-flex justify-content-center overflow-auto" id="userPhotosGallery">
                        @foreach ($user->images()->latest()->get() as $image)
                            <a href="{{ asset('storage/images/' . $image->filename) }}"
                                data-sub-html='
                            <a href="{{ route('frontend.profile.medial-image-delete', ['media_id' => $image->id]) }}"
                             class="btn btn-danger text-decoration-none">
                             <i class="fa fa-trash "></i> Delete
                            </a>
                            '
                                class="more-img-a">
                                <img src="{{ asset('storage/images/' . $image->filename) }}" alt="" width="73px"
                                    class="more-image mx-1 ">
                            </a>
                        @endforeach

                    </div>

                    @if ($user->images()->count() < 4)
                        <div class=" px-md-0 text-center justify-content-center ">
                            <label for="addMoreImages">
                                <span
                                    class="badge  add-photo-hover  py-2  fs-15 badge-default bg-white text-black cust-add-photo d-xl-block d-lg-inline-block d-md-inline-block d-block mt-3 ml-0 cursor-pointer font-weight-normal"><i
                                        class="fa fa-pencil  "></i> Add Photos</span>
                            </label>
                            <form action="{{ route('frontend.users.uploadMoreImages') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" id="addMoreImages" name="images[]" onchange="this.form.submit()"
                                    multiple hidden>
                            </form>
                        </div>
                    @endif

                </div>
                <div class="col-xl-9 px-0">
                    <div class="row  text-xl-start ">
                        <div class="col-lg-6 col-md-6 profile-div">
                            <h6 class="mt-xl-0 mt-4  ">{{ $user->full_name }}</h6>
                            <div class="row mt-4 m-0">
                                <div class="col-md-4 col-4 px-0">
                                    <p class="light-grey f-12">Mobile</p>

                                    <p class="light-grey f-12">Gender</p>
                                    <p class="light-grey f-12">Age /Height</p>
                                    <p class="light-grey f-12">Email</p>
                                </div>
                                <div class="col-md-8 col-8">
                                    <p class="f-12 ">: {{ $user->mobile ?? '---' }}</p>

                                    <p class="f-12">: {{ ucfirst($user->gender) ?? '---' }}</p>
                                    <p class="f-12">:
                                        {{ ($user->date_of_birth ? Carbon\Carbon::parse($user->date_of_birth)->age : '---') . ' / ' . ($user->height ? $user->height . 'cm' : '---') }}
                                    </p>
                                    <p class=" f-12 word-brk">: {{ $user->email ?? '---' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 profile-div ">
                            <div class=" text-xl-end text-start   px-xl-5 px-0 mt-xl-0 mt-lg-4 mt-3">
                                <span class="text-black   mr-5"> Profile Status : </span>
                                @if ($user->status == 'Approved')
                                    <span class="status-text-color"> Approved</span>
                                @elseif($user->status == 'Rejected')
                                    <span class="text-red"> Rejected</span>
                                @else
                                    <span class="text-warning"> Pending</span>
                                @endif
                            </div>
                            <div class="row   mt-3">
                                <div class="col-1 d-xl-block d-none"></div>
                                <div class="col-5 ">
                                    <p class="light-grey f-12">Marital Status</p>
                                    <p class="light-grey f-12">Caste</p>
                                    <p class="light-grey f-12">Mother Tongue</p>
                                    <p class="light-grey f-12">Address</p>
                                </div>
                                <div class="col-6">
                                    <p class="f-12 mt-sm">: {{ $user->martial_status ?? '---' }}</p>
                                    <p class="f-12 mt-sm">: {{ $user->caste ?? '---' }}</p>
                                    <p class="f-12 mother-t">: {{ $user->mother_tongue ?? '---' }}</p>
                                    <p class="f-12 add-profile text-wrap">: {{ $user->residential_address ?? '---' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row    rounded m-0">
                        @if ($user->getActiveSubscription())
                            <div class="col-md-6 light-pink rounded  p-3 mx-0">
                                <h5 class="p-0 dark-gray">Your Active Subscription</h5>
                                <div class="bg-white rounded px-3">
                                    <div class="row">
                                        <div class="col-6 my-2 px-1 border-rght">
                                            <div class="text-center">
                                                <p class="text-center light-grey">Start Date</p>
                                                <p class="cust-font status-text-color custom-border">
                                                    {{ dd_format($user->getActiveSubscription()->start_date, 'd-m-Y h:i a') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-6 my-2 px-1">
                                            <div class="text-center">
                                                <p class="text-center light-grey">End Date</p>
                                                <p class="cust-font text-danger custom-border">
                                                    {{ dd_format($user->getActiveSubscription()->end_date, 'd-m-Y h:i a') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                        <div class="col-md-6 light-pink rounded   p-3 mx-0">
                            <h5 class="dark-gray">Your Activity</h5>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="bg-white rounded px-3 py-3 mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class=" p-0   pt-2 light-grey d-inline">{{ $user->shortlists->count() }}</h5>
                                            </div>
                                            <div class="col-6 text-end">
                                                <img src="frontend/image/fill-red-heart.png" alt="" width="30px"
                                                    class="text-end">
                                            </div>
                                        </div>
                                        <p class="p-0">Favourite</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="bg-white rounded px-3 py-3 mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class=" p-0   pt-2 light-grey d-inline">{{ $user->othersShortlistedCount() }}</h5>
                                            </div>
                                            <div class="col-6 text-end">
                                                <img src="frontend/image/fill-red-heart.png" alt="" width="30px"
                                                    class="text-end">
                                            </div>
                                        </div>
                                        <p class="p-0">Shortlisted You</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="text-center mt-5   m-0 p-0 justify-content-center">
                    <a href="{{ route('frontend.shortlist') }}"
                        class="btn box profile-btn mx-lg-5 mx-md-2 mx-1 px-xl-4 px-md-2 px-0 d-md-inline d-block"> View
                        Shortlisted</a>
                    <a href="{{ route('frontend.profile.show') }}"
                        class="btn box mt-md-0 mt-4  profile-btn mx-lg-5 mx-md-2 mx-1 px-xl-4 px-md-2 px-0 d-md-inline d-block">
                        View
                        Registration
                        Form</a>
                    <a href="{{ route('frontend.form-one.edit') }}"
                        class="btn box  profile-btn mx-lg-5 mt-md-0 mt-4 mx-md-2 mx-1 px-xl-4 px-md-2 px-0 d-md-inline d-block">
                        Edit Registration
                        Form</a>
                </div>
            </div>
    </section>
    {{-- <section class="pt-0 pb-5">
        <div class="container-fluid">

            <div class="row m-0 justify-content-center">
                <h4 class="mb-4 ml--30 ">Recommended Profiles </h4>

                @for ($i = 1; $i <= 10; $i++)
                    <div class="col-lg-5 col-md-6 register-form-container py-3 px-1 mx-2 mt-3 ">
                        <div class="row m-0">
                            <div class="text-end ">
                                <span class="p-2 heart"> <img src="frontend/image/icons/heart.png" alt=""></span>
                            </div>
                            <div class="col-md-3 col-3 ">
                                <img src="{{ url('/frontend/image/profile_static.svg') }}" alt="" width="120px"
                                    class="d-block mb-3 rounded">
                            </div>

                            <div class="col-9">

                                <div class="row m-0 ">
                                    <h6 class="mt-md-0 mb-3  px-xl-0 px-lg-4 px-md-5 px-5">Kashish Jain</h6>
                                    <div class="col-1 d-xl-none d-md-block d-block"></div>
                                    <div class="col-5 px-0 pl-media-440">
                                        <p class="light-grey">Age /Height</p>
                                        <p class="light-grey">Cast</p>
                                        <p class="light-grey">Posted By</p>
                                        <p class="light-grey">Location</p>
                                    </div>
                                    <div class="col-5 ">
                                        <p>: 25 / 6' 0"</p>
                                        <p>:digambar</p>
                                        <p>: Self</p>
                                        <p>: Tirupati </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <a class="btn btn-success btn-md px-xl-5 px-md-3"> View Profile</a>
                            <a class="btn  btn-md px-xl-5 px-md-3 profile-btn "> Remove Profile</a>
                        </div>
                    </div>
                @endfor



                <a href="" class="text-center mt-5 text-decoration-none light-grey acetrot-hover"> View All</a>
            </div>
        </div>
    </section> --}}
    <style>
        .more-image {
            height: 75px;
            object-fit: cover;
        }

        .more-img-a {
            text-decoration: none;
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('frontend/dropify/js/dropify.min.js') }}"></script>
    <script></script>
    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery1'), {
            speed: 500,
            download: false,
        });

        const userPhotos = lightGallery(
            document.getElementById("userPhotosGallery"), {
                speed: 500,
                download: false,
                thumbnail: true,
                tools: true,
            });
    </script>
    @if ($errors->has('images'))
        <script>
            Snackbar.show({
                text: "{{ $errors->first('images') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#e7515a'
            });
        </script>
    @endif
    @if ($errors->has('images.*'))
        <script>
            Snackbar.show({
                text: "{{ $errors->first('images.*') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#e7515a'
            });
        </script>
    @endif
@endsection
