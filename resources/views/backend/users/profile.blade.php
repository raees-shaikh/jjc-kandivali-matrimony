@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-2 mb-1">
                            <legend class="h4">
                                User Details
                            </legend>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">User Details</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info statbox widget box box-shadow">
                <div class="row widget-header">
                    <div class="col-md-11">
                        <div class="work-section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                    </div>
                                    <div class="row">
                                        <legend class="text-center  mb-3 font-weight-600"> CANDIDATE DETAILS -
                                            {{ $users->profile_no }}</legend>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Name</label><br>
                                                <p class="label-title">{{ $users->full_name ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Email</label><br>
                                                <p class="label-title">{{ $users->email ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Date Of
                                                    Birth - Time</label><br>
                                                <p class="label-title">
                                                    {{ $users->date_of_birth ? dd_format($users->date_of_birth, 'd-m-Y h:i a') : '---' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Gender
                                                </label><br>
                                                <p class="label-title">{{ ucFirst($users->gender ?? '---') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Place Of
                                                    Birth</label><br>
                                                <p class="label-title">{{ $users->place_of_birth ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Native
                                                    Place</label><br>
                                                <p class="label-title">{{ $users->native_place ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Marital
                                                    Status</label><br>
                                                <p class="label-title">{{ $users->martial_status ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Status Of
                                                    Children</label><br>
                                                <p class="label-title">{{ $users->status_of_children ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Number Of
                                                    Children</label><br>
                                                <p class="label-title">{{ $users->no_of_children ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Caste</label><br>
                                                <p class="label-title">{{ $users->caste ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Sub
                                                    Caste</label><br>
                                                <p class="label-title">{{ $users->sub_caste ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Mother
                                                    Tongue</label><br>
                                                <p class="label-title">{{ $users->mother_tongue ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Manglik</label><br>
                                                <p class="label-title">
                                                    {{ $users->manglik === null ? '---' : ($users->manglik == 1 ? 'Yes' : 'No') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Handicap</label><br>
                                                <p class="label-title">
                                                    {{ $users->handicap === null ? '---' : ($users->handicap == 1 ? 'Yes' : 'No') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Handicap
                                                    Details</label><br>
                                                <p class="label-title">{{ $users->handicap_details ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Residential
                                                    Address</label><br>
                                                <p class="label-title">{{ $users->residential_address ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Mobile
                                                    Number
                                                </label><br>
                                                <p class="label-title">{{ $users->mobile ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Alternative
                                                    Mobile</label><br>
                                                <p class="label-title">{{ $users->alternative_mobile ?? '---' }}</p>
                                            </div>
                                        </div>

                                        @if ($users->profile_image || $users->images()->count())
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="cust-title" class="label-title">Images </label>
                                                    <br>
                                                    <div class="" id="lightgallery">
                                                        <a class="btn btn-primary"
                                                            href="{{ asset('storage/images/profile/' . $users->profile_image) }}">
                                                            View Images
                                                        </a>
                                                        @foreach ($users->images()->get() as $image)
                                                            <a href="{{ asset('storage/images/' . $image->filename) }}">
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <legend class="text-center  my-md-5 my-3 font-weight-600"> EDUCATION AND
                                                OCCUPATION DETAILS</legend>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Qualification
                                                    </label><br>
                                                    <p class="label-title">{{ $users->qualification ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Medium
                                                    </label><br>
                                                    <p class="label-title">{{ $users->education_medium ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Education Details
                                                    </label><br>
                                                    <p class="label-title">{{ $users->education_details ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Occupation</label><br>
                                                    <p class="label-title">{{ $users->occupation ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Occupation Details</label><br>
                                                    <p class="label-title">{{ $users->occupation_details ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">income
                                                    </label><br>
                                                    <p class="label-title">{{ $users->income ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Occupation Address
                                                    </label><br>
                                                    <p class="label-title">{{ $users->occupation_address ?? '---' }}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">No. of
                                                        Married Sisters
                                                        (Other than Candidate)</label><br>
                                                    <p class="label-title">{{ $users->married_sisters ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">No. Of
                                                        Unmarried
                                                        Sisters
                                                        (Other than Candidate)</label><br>
                                                    <p class="label-title">{{ $users->unmarried_sisters ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">No. of
                                                        Married Brothers
                                                        (Other than Candidate)</label><br>
                                                    <p class="label-title">{{ $users->married_brothers ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">No. of
                                                        Unmarried Brothers
                                                        (Other than Candidate)</label><br>
                                                    <p class="label-title">{{ $users->unmarried_brothers ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <legend class="text-center  my-md-4 my-3 font-weight-600">DETAILS OF
                                                        MOSAL</legend>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="degree3" class="cust-title"
                                                                class="label-title">Name of Nana/ Mama's Name</label><br>
                                                            <p class="label-title">{{ $users->mosal_name ?? '---' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="degree3" class="cust-title"
                                                                class="label-title">Mobile Number (WhatsApp
                                                                No.)</label><br>
                                                            <p class="label-title">{{ $users->mosal_mobile ?? '---' }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="degree3" class="cust-title"
                                                                class="label-title">Residential Address</label><br>
                                                            <p class="label-title">
                                                                {{ $users->mosal_residential_address ?? '---' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <legend class="text-center  my-md-5 my-3 font-weight-600">TWO REFERENCES WHO
                                                KNOW ABOUT YOU / YOUR FAMILY</legend>
                                            <h5 class="col-md-12 mb-2">Person 1</h5><br>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Name</label><br>
                                                    <p class="label-title">
                                                        {{ $referenceOne ? $referenceOne->name : '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Mobile
                                                        Number (WhatsApp No.)</label><br>
                                                    <p class="label-title">
                                                        {{ $referenceOne ? $referenceOne->mobile : '---' }}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Residential Address</label><br>
                                                    <p class="label-title">
                                                        {{ $referenceOne ? $referenceOne->address : '---' }}</p>
                                                </div>
                                            </div>
                                            <h5 class="col-md-12 mb-2">Person 2</h5><br>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Name</label><br>
                                                    <p class="label-title">
                                                        {{ $referenceTwo ? $referenceTwo->name : '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Mobile
                                                        Number (WhatsApp No.)</label><br>
                                                    <p class="label-title">
                                                        {{ $referenceTwo ? $referenceTwo->mobile : '---' }}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Residential Address</label><br>
                                                    <p class="label-title">
                                                        {{ $referenceTwo ? $referenceTwo->address : '---' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <legend class="text-center  my-md-5 my-3 font-weight-600">FAMILY DETAILS
                                            </legend>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Name Of
                                                        Father</label><br>
                                                    <p class="label-title">{{ $users->father_name ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Occupation</label><br>
                                                    <p class="label-title">{{ $users->father_occupation ?? '---' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Name
                                                        Of Mother</label><br>
                                                    <p class="label-title">{{ $users->mother_name ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Occupation</label><br>
                                                    <p class="label-title">{{ $users->mother_occupation ?? '---' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <legend class="text-center  my-md-5 my-3 font-weight-600">CANDIDATE'S SPECIAL
                                                CHOICE</legend>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Choice
                                                        Of Life Partner</label><br>
                                                    <p class="label-title">{{ $users->choice_of_life_partner ?? '---' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Willing
                                                        to Settle abroad</label><br>
                                                    <p class="label-title">{{ $users->willing_to_settle_abroad ?? '---' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Willing
                                                        to Marry having Strictly Jain Food habits</label><br>
                                                    <p class="label-title">
                                                        {{ $users->willing_to_marry_having_strictly_jain_foods ?? '---' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <legend class="text-center  my-md-5 my-3 font-weight-600">MUMBAI CONTACT FOR
                                                OUTSIDE CANDIDATE</legend>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Name</label><br>
                                                    <p class="label-title">{{ $users->mumbai_contact_name ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Mobile
                                                        number</label><br>
                                                    <p class="label-title">{{ $users->mumbai_contact_mobile ?? '---' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Family
                                                        Relation</label><br>
                                                    <p class="label-title">
                                                        {{ $users->mumbai_contact_family_relation ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Residential Address</label><br>
                                                    <p class="label-title">{{ $users->mumbai_contact_address ?? '---' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="widget-content widget-content-area">

            </div> --}}
                </div>
            </div>
        @endsection
        @section('cdn')
            <link href="{{ asset('assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet"
                type="text/css" />
        @endsection
        @section('js')
            <script>
                $(document).ready(function() {
                    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                        localStorage.setItem('activeTab', $(e.target).attr('href'));
                    });
                    let activeTab = localStorage.getItem('activeTab');
                    if (activeTab) {
                        $('a[href="' + activeTab + '"]').tab('show');
                    }
                })
            </script>
            <link rel="stylesheet"
                href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="{{ asset('js/lg-zoom.min.js') }}"></script>>
            <script src="{{ asset('plugins/lightgallery/js/lightgallery.min.js') }}"></script>
            <script src="{{ asset('js/lightgallery.js') }}"></script>
            <script>
                lightGallery(document.getElementById('lightgallery'), {
                    speed: 500,
                    download: false,
                    thumbnail: true,
                });
            </script>
        @endsection
        <style>
            .lg-icon {
                background: transparent !important;
            }
        </style>
