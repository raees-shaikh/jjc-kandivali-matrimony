@extends('frontend.layouts.app')
@section('title', 'Search - ')
@section('cdn')
    <link rel="stylesheet" href="{{ asset('frontend/dropify/css/dropify.min.css') }}">
@endsection
@section('content')
    <section class="breadcrumb-area">
        <img class="breadcrumb-area-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">
        <div class="container py-0 mt-5">
            <div class="row m-0 justify-content-center py-0">
                <div class="col-md-6 py-0">
                    <h1 class="text-pink text-center  py-0">Someone Somewhere is Dreaming of You</h1>
                </div>
            </div>
        </div>
    </section>
    <form action="{{ route('frontend.search') }}" method="GET">


        <section >
            <div class="container">
                <div class="row bg-white custom-box-search " >
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control-custom form-control-focus mt-2" name="name"
                                placeholder="Enter Name" minlength="3" maxlength="20"
                                value="{{ request('name') ?? old('name') }}">
                        </div>
                    </div>
                    @if ($errors->has('name'))
                        <div class="text-danger" role="alert">{{ $errors->first('name') }}
                        </div>
                    @endif
                    <div class="col-md-3 mt-md-0 mt-3">
                        <div class="form-group">
                            <label for="" class="d-block"> Age</label>
                            <input type="text" class="form-control-age mt-2 form-control-focus" name="min_age"
                                value="{{ request('min_age') }}" placeholder="Min"> To
                            <input type="text" class="form-control-age mt-2 form-control-focus" name="max_age"
                                value="{{ request('max_age') }}" placeholder="Max">

                        </div>
                    </div>
                    @if ($errors->has('min_age'))
                        <div class="text-danger" role="alert">{{ $errors->first('min_age') }}
                        </div>
                    @endif
                    @if ($errors->has('max_age'))
                        <div class="text-danger" role="alert">{{ $errors->first('max_age') }}
                        </div>
                    @endif
                    <div class="col-md-3 mt-md-0 mt-3">
                        <div class="form-group ">
                            <label for="">Mother Tongue</label>
                            <select class="mt-2 form-control-custom form-control-focus" name="mother_tongue">
                                <option value="">Select Any</option>
                                @foreach (App\Models\User::MOTHER_TONGUE as $mt)
                                    <option value="{{ $mt }}"
                                        {{ request('mother_tongue') && request('mother_tongue') == $mt ? 'selected' : '' }}>
                                        {{ $mt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if ($errors->has('mother_tongue'))
                        <div class="text-danger" role="alert">{{ $errors->first('mother_tongue') }}
                        </div>
                    @endif
                    <div class="col-md-3 mt-md-0 mt-4">
                        {{--<div class="form-group ">
                            <label for="f_caste">Caste</label>
                            <input type="text" class="form-control-custom form-control-focus mt-2" name="caste"
                                placeholder="Enter Caste" minlength="2" maxlength="30" value="{{ request('caste') }}">
                        </div>
                        <div class="mt-4 px-lg-5 text-center filter-div">
                            {{-- <i class="fa fa-plus mx-1 cust-icon status-text-color"></i><a
                                class="more-btn status-text-color text-center my-2  text-decoration-none filter-text"
                                href="javascript:void(0)" id="moreFilter">More Filter</a> --}}
                        {{--</div>
                    </div>
                    @if ($errors->has('caste'))
                        <div class="text-danger" role="alert">{{ $errors->first('caste') }}
                        </div>
                    @endif

                </div>--}}

                <div class="form-group ">
                    <label for="caste">Caste</label>
                    <select class="form-control-custom form-control-focus mt-2" id="caste" name="caste">
                        <option value="">Select Any</option>
                        @foreach (App\Models\User::CASTE as $c)
                            <option value="{{ $c }}"
                                @if (old('caste') == $c) {{ 'selected' }} @endif>
                                {{ $c }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('caste'))
                        <div class="text-danger" role="alert">{{ $errors->first('caste') }}
                        </div>
                    @endif
                </div>
                {{-- <div class="row bg-white py-3 filter-sec" id="moreFilterDiv">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Name / ID</label>
                            <input type="text" class="form-control mt-2" name="name" placeholder="Enter Name / ID"
                                minlength="3" maxlength="20" value="{{ request('name') }}">
                        </div>
                    </div>
                    <div class="col-md-3 mt-md-0 mt-3">
                        <div class="form-group">
                            <label for="" class="d-block"> Age</label>
                            <input type="text" class="form-control-age mt-2 form-control-focus" name="min_age"
                                value="{{ request('min_age') }}"> To
                            <input type="text" class="form-control-age mt-2 form-control-focus" name="max_age"
                                value="{{ request('max_age') }}">

                        </div>
                    </div>
                    <div class="col-md-3 mt-md-0 mt-3">
                        <div class="form-group ">
                            <label for="">Mother Tongue</label>
                            <select class="mt-2 form-control" required>
                                <option>Select</option>
                                @foreach (App\Models\User::MOTHER_TONGUE as $mt)
                                    <option value="{{ $mt }}"
                                        {{ request('mother_tongue') && request('mother_tongue') == $mt ? 'selected' : '' }}>
                                        {{ $mt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mt-md-0 mt-3">
                        <div class="form-group ">
                            <label for="f_caste">Caste</label>
                            <input type="text" class="form-control mt-2" name="caste" placeholder="Enter Caste"
                                minlength="2" maxlength="30" value="{{ request('caste') }}">
                        </div>
                    </div>

                </div> --}}
            </div>
        </section>


        <section class="my-md-4 ">
            <div class="container">
                {{-- <div class="row">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0 panel-title">
                                <button class="btn btn-link accord-title text-black" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    &nbsp; &nbsp; Religious Background
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body ">

                                <div class="row m-0 justify-content-center">
                                    <div class="col-md-5">

                                        <div class="row m-0">


                                            <div class="col-6">
                                                <p class="light-grey">Religion</p>
                                                <p class="light-grey">Community</p>
                                                <p class="light-grey">Mother Tongue</p>

                                            </div>
                                            <div class="col-6">
                                                <p>: Hindu</p>
                                                <p>: Maratha</p>
                                                <p>: Marathi</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">

                                        <div class="row m-0">


                                            <div class="col-6">
                                                <p class="light-grey">Sub community</p>
                                                <p class="light-grey">Gothra / Gothram</p>

                                            </div>
                                            <div class="col-6">
                                                <p>: Not Specified</p>
                                                <p>: Not Specified</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 mt-md-4">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0 panel-title ">
                                <button class="btn btn-link collapsed accord-title text-black " data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    &nbsp; &nbsp; Family Details
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row m-0 justify-content-center">
                                    <div class="col-md-5">

                                        <div class="row m-0">


                                            <div class="col-6">
                                                <p class="light-grey">Father's Status</p>
                                                <p class="light-grey">Mother's Status</p>
                                                <p class="light-grey">Family Location</p>
                                                <p class="light-grey">Native Place</p>

                                            </div>
                                            <div class="col-6">
                                                <p>: Enter Now</p>
                                                <p>: Enter Now</p>
                                                <p>: Nagpur,
                                                    Maharashtra, India</p>
                                                <p>: Not Specified</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">

                                        <div class="row m-0">


                                            <div class="col-6">
                                                <p class="light-grey">No. of Brothers</p>
                                                <p class="light-grey">No. of Sisters</p>
                                                <p class="light-grey">Family Type</p>
                                                <p class="light-grey">Family Values</p>
                                                <p class="light-grey">Mother Tongue</p>

                                            </div>
                                            <div class="col-6">
                                                <p>: Enter Now</p>
                                                <p>: Enter Now</p>
                                                <p>: Not Specified</p>
                                                <p>: Not Specified</p>
                                                <p>: Marathi</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 mt-md-4">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0 panel-title">
                                <button class="btn btn-link collapsed accord-title text-black" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    &nbsp; &nbsp; Education & Career
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="row m-0 justify-content-center">
                                    <div class="col-md-5">

                                        <div class="row m-0">


                                            <div class="col-6">
                                                <p class="light-grey">Highest Qualification</p>
                                                <p class="light-grey">College(s) Attended</p>
                                                <p class="light-grey">Annual Income</p>

                                            </div>
                                            <div class="col-6">
                                                <p>: B.E / B.Tech Engineering</p>
                                                <p>: Acharya</p>
                                                <p>: INR 20 Lakh to 30 Lakh</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">

                                        <div class="row m-0">


                                            <div class="col-6">
                                                <p class="light-grey">Working With</p>
                                                <p class="light-grey">Working As</p>
                                                <p class="light-grey">Employer Name</p>

                                            </div>
                                            <div class="col-6">
                                                <p>: Private Company</p>
                                                <p>: Banking Professional</p>
                                                <p>: A</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

                <div class=" mb-md-0 mb-4 text-center">
                    {{-- <button class="cust-btn d-inline">Add Filter</button> --}}

                    <button class="cust-btn d-inline mx-1 box " type="submit">Search Profile</button>
                </div>
            </div>
        </section>
    </form>

    <section class="pt-0 pb-5">
        <div class="container-fluid">

            <div class="row m-0 justify-content-center">
                <div class="col-12">
                    <h3 class="text-center">Results</h3>
                </div>

                @forelse ($profiles as $p)
                    <div class="col-lg-5 col-md-6 register-form-container py-3 px-1 mx-2 mt-3 ">
                        <div class="row m-0">
                            <div class="text-end ">
                                <span class="p-2 heart"> <img
                                        src="{{ $p->shortlisted() ? 'frontend/image/icons/pink-heart.png' : 'frontend/image/icons/heart.png' }}"
                                        class="shortlist-img" alt=""
                                        data-shortlist-id='{{ $p->id }}'></span>
                            </div>
                            <div class="col-md-3 col-sm-3 ">
                                <img src="{{ $p->profile_image ? asset('storage/images/profile/' . $p->profile_image) : url('/frontend/image/profile_static.svg') }}" alt="" width="120px"
                                    class="d-block mb-3 rounded mx-auto text-center px-1">

                                <div class="text-center d-lg-none d-sm-block d-none">
                                    <a class="btn btn-success parrot-color btn-md p-2 w-112"
                                        href="{{ route('frontend.profile.show-2', $p->profile_no) }}"> View Profile</a>
                                    {{-- <a class="btn  btn-md px-xl-5 px-md-3 profile-btn "> Remove Profile</a> --}}
                                </div>
                            </div>

                            <div class="col-sm-9">
                                <div class="text-sm-start text-center px-0">

                                    <div class="row m-0 justify-content-center justify-content-md-start">
                                        <div class="text-sm-start text-center px-0">
                                            <h6 class="mt-md-0 mb-3  px-xl-0 px-lg-4 px-md-5 px-5 px--31 profile-t">
                                                {{ $p->full_name }}</h6>
                                        </div>
                                        <div class="col-1 d-xl-none d-md-block d-block"></div>
                                        <div class="col-5 px-0 ">
                                            <p class="light-grey age-h">Age /Height</p>
                                            <p class="light-grey">Caste</p>
                                            <p class="light-grey text-no-wrap-sm">Mother Tongue</p>
                                            <p class="light-grey">Qualification</p>
                                        </div>
                                        <div class="col-5 p-280">
                                            <p class="text-no-wrap">:
                                                {{ Carbon\Carbon::parse($p->date_of_birth)->age . ' / ' . $p->height . 'cm' }}
                                            </p>
                                            <p>: {{ $p->caste }}</p>
                                            <p class="pl-10 text-no-wrap-sm">: {{ $p->mother_tongue }} </p>
                                            <p class="ml--13">: {{ $p->qualification }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center d-lg-block d-sm-none d-block">
                            <a class="btn btn-success view-profile-btn parrot-color btn-md px-xl-5 px-md-3"
                                href="{{ route('frontend.profile.show-2', $p->profile_no) }}"> View Profile</a>
                            {{-- <a class="btn  btn-md px-xl-5 px-md-3 profile-btn "> Remove Profile</a> --}}
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        No Profile Found
                    </div>
                @endforelse
                {{-- <a href="" class="text-center mt-5 text-decoration-none light-grey acetrot-hover"> View All</a> --}}
            </div>
            <div class="row text-center">
                <div class="mt-5 mb-2">
                    {{ $profiles->appends(Request::all())->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        $(document).ready(function() {

            $('.filter-sec').hide();
            $(".more-btn").click(function() {
                var link = $(this);
                $(".filter-sec").slideToggle("slow",


                    function() {
                        if ($(this).is(':visible')) {
                            link.text('Hide Filter').css("color", "#c31010");
                            $(".cust-icon").removeClass("fa-plus");
                            $(".cust-icon").addClass("fa-minus").css("color", "#c31010");

                        } else {
                            link.text('More Filter').css("color", "green");
                            $(".cust-icon").removeClass("fa-minus");
                            $(".cust-icon").addClass("fa-plus").css("color", "green");
                        }
                    });
            });
        });
    </script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script>
        $('img.shortlist-img').click(function() {
            if ($(this).attr("data-shortlist-id")) {
                var img = $(this);
                axios.post('{{ route('frontend.shortlist') }}', {
                        shortlist_id: $(this).attr("data-shortlist-id")
                    })
                    .then(function(res) {
                        // console.log(res.data);
                        if (res.data.status) {
                            if (res.data.shortlist) {
                                img.attr('src', 'frontend/image/icons/pink-heart.png');
                            } else {
                                img.attr('src', 'frontend/image/icons/heart.png');
                            }
                            Snackbar.show({
                                text: res.data.message,
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#1abc9c'
                            });
                        } else {
                            Snackbar.show({
                                text: res.data.message,
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                        }
                    })
                    .catch(function(error) {
                        Snackbar.show({
                            text: "Something Went Wrong",
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    });
            }
        });
    </script>


@endsection
