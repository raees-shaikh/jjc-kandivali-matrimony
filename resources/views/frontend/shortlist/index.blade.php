@extends('frontend.layouts.app')
@section('title', 'Shortlisted Candidate - ')
@section('cdn')
    <link rel="stylesheet" href="{{ asset('frontend/dropify/css/dropify.min.css') }}">
@endsection
@section('content')
    <section class="breadcrumb-area">
        <img class="breadcrumb-area-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">
        <div class="container">
            <h1 class="text-pink text-center bread-align ">Shortlisted Candidate</h1>
        </div>
    </section>

    <section class="pt-0 pb-5">
        <div class="container-fluid">

            <div class="row m-0 justify-content-center">
                {{-- <div class="col-12">
                    <h4 class="mb-4 ml--30">Result</h4>
                </div> --}}

                @forelse ($shortlists as $s)
                    <div class="col-lg-5 col-md-6 register-form-container py-3 px-1 mx-2 mt-3 ">
                        <div class="row m-0">
                            <div class="text-end ">
                                <span class="p-2 heart"> <img src="frontend/image/icons/pink-heart.png"
                                        class="shortlist-img" alt=""
                                        data-shortlist-id='{{ $s->shortlisted_id }}'></span>
                            </div>
                            <div class="col-md-3 col-sm-3 ">
                                <img src="{{ $s->shortlistedUser->profile_image ? asset('storage/images/profile/' . $s->shortlistedUser->profile_image) : url('/frontend/image/profile_static.svg') }}" alt="" width="120px"
                                    class="d-block mb-3 rounded mx-auto text-center px-1">
                                    <div class="text-center d-lg-none d-sm-block d-none">
                                        <a class="btn btn-success view-profile-btn parrot-color btn-md p-2 w-112"
                                            href="{{ route('frontend.profile.show-2', $s->shortlistedUser->profile_no) }}"> View
                                            Profile</a>
                                        {{-- <a class="btn  btn-md px-xl-5 px-md-3 profile-btn "> Remove Profile</a> --}}
                                    </div>

                            </div>

                            <div class="col-sm-9">

                                <div class="row m-0 justify-content-center justify-content-lg-start justify-content-md-center ">
                             <div class="text-sm-start text-center px-0">
                                <h6 class="mt-md-0 mb-3  px-xl-0 px-lg-4 px-lg-4 px-md-4 px-5 px--31 shortlist-t">
                                    {{ $s->shortlistedUser->full_name }}</h6>
                             </div>
                                    <div class="col-1 d-xl-none d-md-block d-block"></div>
                                    <div class="col-5 px-0 ">
                                        <p class="light-grey age-h">Age /Height</p>
                                        <p class="light-grey">Caste</p>
                                        <p class="light-grey text-no-wrap-sm">Mother Tongue</p>
                                        <p class="light-grey">Qualification</p>
                                    </div>
                                    <div class="col-5 p-280">
                                        <p class="text-no-wrap">: {{ Carbon\Carbon::parse($s->shortlistedUser->date_of_birth)->age . ' / ' . $s->shortlistedUser->height . 'cm' }}
                                        </p>
                                        <p>: {{ $s->shortlistedUser->caste }}</p>
                                        <p class="pl-10 text-no-wrap-sm">: {{ $s->shortlistedUser->mother_tongue }} </p>
                                        <p class="ml--13">: {{ $s->shortlistedUser->qualification }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center d-lg-block d-sm-none d-block">
                            <a class="btn btn-success view-profile-btn parrot-color btn-md px-xl-5 px-md-3"
                                href="{{ route('frontend.profile.show-2', $s->shortlistedUser->profile_no) }}"> View
                                Profile</a>
                            {{-- <a class="btn  btn-md px-xl-5 px-md-3 profile-btn "> Remove Profile</a> --}}
                        </div>
                    </div>
                @empty
                    <div class="mt-200">
                        <p class="text-center">No Shortlist Found</p>
                    </div>
                @endforelse
                {{-- <a href="" class="text-center mt-5 text-decoration-none light-grey acetrot-hover"> View All</a> --}}
            </div>
            <div class="row text-center">
                <div class="mt-5 mb-2">
                    {{ $shortlists->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
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
