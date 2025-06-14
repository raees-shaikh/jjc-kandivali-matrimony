@extends('frontend.layouts.app')
@section('title', 'Registration - ')
@section('cdn')
    <link rel="stylesheet" href="{{ asset('frontend/dropify/css/dropify.min.css') }}">
@endsection
@section('content')
    {{-- <section class="breadcrumb-area">
        <img class="breadcrumb-area-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">
        <div class="container">
            <div class=" rounded-3 border-3 border border-white page-title-strip">
                <h2 class="rounded-3 text-white h3 text-end p-4 bg-gradient-shadow m-0">
                    Registration Charges Rs. 500/- <br>
                    (VALID FOR THREE YEARS)
                </h2>
            </div>
        </div>
    </section> --}}
    <section class="breadcrumb-area">
        <img class="breadcrumb-area-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">
        <div class="container">
            <div class="res-add">
                <h3 class="mt-5 text-center">Registration Charges Rs. 750/- (Valid For Three Years)</h3>
            </div>
        </div>
    </section>

    <section class="mb-4 px-md-0 px-3 ">
        <div class="register-form-container container p-3 py-4 p-md-5">
            <legend class="">Personal Details</legend>
            <div class="register-form-wrap">
                <form id="register-form" action="{{ route('frontend.form-one.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row ">
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" name="full_name" id="full_name" placeholder=" Your Full Name"
                                    class="form-control" minlength="3" maxlength="30" value="{{ old('full_name') }}"
                                    required>
                                @if ($errors->has('full_name'))
                                    <div class="text-danger" role="alert">{{ $errors->first('full_name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="datetime-local" name="date_of_birth" id="dob"
                                    placeholder="Enter your place" class="form-control" value="{{ old('date_of_birth') }}"
                                    required>
                                @if ($errors->has('date_of_birth'))
                                    <div class="text-danger" role="alert">{{ $errors->first('date_of_birth') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="birth_place">Place of Birth</label>
                                <input type="text" name="birth_place" id="birth_place" placeholder="Enter your place"
                                    class="form-control" minlength="3" maxlength="30" value="{{ old('birth_place') }}"
                                    required>
                                @if ($errors->has('birth_place'))
                                    <div class="text-danger" role="alert">{{ $errors->first('birth_place') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="email">Email ID</label>
                                <input type="email" name="email" id="email" placeholder="Enter Your Email ID"
                                    class="form-control" minlength="3" maxlength="30" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <div class="text-danger" role="alert">{{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group pt-2">
                                <div class="res-add ">
                                    <label for="native_place"> Gender
                                    </label>
                                </div>
                                <div class="pt-2">
                                    <input class="form-check-input d-inline-block" type="radio" name="gender"
                                        id="gender_male" value="male"
                                        @if (old('gender') == 'male') {{ 'checked' }} @endif>
                                    <label class="form-check-label d-inline-block" for="gender_male">
                                        Male
                                    </label>
                                    <input class="form-check-input d-inline-block" type="radio" name="gender"
                                        id="gender_female" value="female"
                                        @if (old('gender') == 'female') {{ 'checked' }} @endif>
                                    <label class="form-check-label d-inline-block" for="gender_female">
                                        Female
                                    </label>
                                </div>
                                @if ($errors->has('gender'))
                                    <div class="text-danger" role="alert">{{ $errors->first('gender') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group pt-2">
                                <label for="native_place">Native Place</label>
                                <input type="text" name="native_place" id="native_place" placeholder="Enter your place"
                                    class="form-control" minlength="3" maxlength="30"value="{{ old('native_place') }}"
                                    required>
                                @if ($errors->has('native_place'))
                                    <div class="text-danger" role="alert">{{ $errors->first('native_place') }}
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="input-file-now-custom-2">Profile Image</label>
                                <input accept="image/png, image/jpeg" name="profile_image" type="file"
                                    id="input-file-now-custom-2" class="dropify" data-height="250" required />
                                @if ($errors->has('profile_image'))
                                    <div class="text-danger" role="alert">{{ $errors->first('profile_image') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group res-add">
                                <label for="native_place"> Marital Status
                                </label>
                                <select class="form-control" name="martial_status" required>
                                    <option>Select Any</option>
                                    @foreach (App\Models\User::MARTIAL_STATUS as $ms)
                                        <option value="{{ $ms }}"
                                            @if (old('martial_status') == $ms) {{ 'selected' }} @endif>
                                            {{ $ms }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('martial_status'))
                                <div class="text-danger" role="alert">{{ $errors->first('martial_status') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group res-add">
                                <label for="status_of_children">Status of Children</label>
                                <select class="form-control" name="status_of_children" id="status_of_children">
                                    <option>Select any if Applicable</option>
                                    @foreach (App\Models\User::CHILDREN_STATUS as $cs)
                                        <option value="{{ $cs }}"
                                            @if (old('status_of_children') == $cs) {{ 'selected' }} @endif>
                                            {{ $cs }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('status_of_children'))
                                <div class="text-danger" role="alert">{{ $errors->first('status_of_children') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for=""> No. of Children</label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-white text-black h-100">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Small" name="no_of_children"
                                        value="{{ old('no_of_children') ?? '0' }}" min="0" max="99">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-white text-black h-100 ">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </span>
                                    </div>
                                    @if ($errors->has('no_of_children'))
                                        <div class="text-danger" role="alert">{{ $errors->first('no_of_children') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="caste">Caste</label>
                                <input type="text" name="caste" id="caste" placeholder="Enter Your Caste"
                                    class="form-control" minlength="3" maxlength="30" value="{{ old('caste') }}"
                                    required>
                                @if ($errors->has('caste'))
                                    <div class="text-danger" role="alert">{{ $errors->first('caste') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="sub_caste">Sub Caste</label>
                                <input type="text" name="sub_caste" id="sub_caste" placeholder="Enter Your Sub Caste"
                                    class="form-control" value="{{ old('sub_caste') }}">
                                @if ($errors->has('sub_caste'))
                                    <div class="text-danger" role="alert">{{ $errors->first('sub_caste') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group res-add">
                                <label for="mother_tongue">Mother Tongue</label>
                                <select class="form-control" id="mother_tongue" name="mother_tongue" required>
                                    <option>Select Any</option>
                                    @foreach (App\Models\User::MOTHER_TONGUE as $mt)
                                        <option value="{{ $mt }}"
                                            @if (old('mother_tongue') == $mt) {{ 'selected' }} @endif>
                                            {{ $mt }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('mother_tongue'))
                                    <div class="text-danger" role="alert">{{ $errors->first('mother_tongue') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="">Manglik
                                </label>
                                <div class="pt-2">
                                    <input class="form-check-input d-inline-block" type="radio" name="manglik"
                                        id="manglik_yes" value="Yes"
                                        @if (old('manglik') == 'Yes') {{ 'checked' }} @endif>
                                    <label class="form-check-label d-inline-block" for="manglik_yes">
                                        Yes
                                    </label>
                                    <input class="form-check-input d-inline-block" type="radio" name="manglik"
                                        id="manglik_no" value="No"
                                        @if (old('manglik') == 'No') {{ 'checked' }} @endif>
                                    <label class="form-check-label d-inline-block" for="manglik_no">
                                        No
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('manglik'))
                                <div class="text-danger" role="alert">{{ $errors->first('manglik') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="height"> Height (cm)</label>
                                <input type="text" name="height" id="height" placeholder="Enter Your Height"
                                    class="form-control" value="{{ old('height') }}" required>
                                @if ($errors->has('height'))
                                    <div class="text-danger" role="alert">{{ $errors->first('height') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="weight"> Weight (Kg)</label>
                                <input type="text" name="weight" id="weight" placeholder="Enter Your Weight"
                                    class="form-control" value="{{ old('weight') }}" required>
                                @if ($errors->has('weight'))
                                    <div class="text-danger" role="alert">{{ $errors->first('weight') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group res-add">
                                <label for="blood_group">Blood Group</label>
                                <select class="form-control" id="blood_group" name="blood_group" required>
                                    <option>Select Any</option>
                                    @foreach (App\Models\User::BLOOD_GROUP as $bg)
                                        <option value="{{ $bg }}"
                                            @if (old('blood_group') == $bg) {{ 'selected' }} @endif>
                                            {{ $bg }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('blood_group'))
                                    <div class="text-danger" role="alert">{{ $errors->first('blood_group') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="native_place">Handicap
                                </label>
                                <div class="pt-2">
                                    <input class="form-check-input d-inline-block" type="radio" name="handicap"
                                        id="handicap_yes" value="Yes"
                                        @if (old('handicap') == 'Yes') {{ 'checked' }} @endif>
                                    <label class="form-check-label d-inline-block" for="handicap_yes">
                                        Yes
                                    </label>
                                    <input class="form-check-input d-inline-block" type="radio" name="handicap"
                                        id="handicap_no" value="No"
                                        @if (old('handicap') == 'No') {{ 'checked' }} @endif>
                                    <label class="form-check-label d-inline-block" for="handicap_no">
                                        No
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('handicap'))
                                <div class="text-danger" role="alert">{{ $errors->first('handicap') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-4 col-md-6 ">
                            <div class="form-group">
                                <label for="handicap_details">Handicap Details</label>
                                <input type="text" name="handicap_details" id="handicap_details"
                                    placeholder="Enter Handicap Details" class="form-control" minlength="3"
                                    maxlength="30" value="{{ old('handicap_details') }}">
                                @if ($errors->has('handicap_details'))
                                    <div class="text-danger" role="alert">{{ $errors->first('handicap_details') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <legend class="">Education & Occupation Details</legend>
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="education">Education</label>
                                <select name="education" class="form-control" required>
                                    <option value="">Select Any</option>
                                    @foreach (App\Models\User::EDUCATION as $e)
                                        <option value="{{ $e }}"
                                            @if (old('education') == $e) {{ 'selected' }} @endif>
                                            {{ $e }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('education'))
                                    <div class="text-danger" role="alert">{{ $errors->first('education') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="education_medium">Medium</label>
                                <select name="education_medium" class="form-control" required>
                                    <option value="">Select Any</option>
                                    @foreach (App\Models\User::EDUCATION_MEDIUM as $em)
                                        <option value="{{ $em }}"
                                            @if (old('education_medium') == $em) {{ 'selected' }} @endif>
                                            {{ $em }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('education_medium'))
                                    <div class="text-danger" role="alert">{{ $errors->first('education_medium') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="education_details">Education Details</label>
                                <input type="text" name="education_details" id="education_details"
                                    placeholder="Enter Your Education Details" class="form-control" minlength="3"
                                    maxlength="60" value="{{ old('education_details') }}" required>
                                @if ($errors->has('education_details'))
                                    <div class="text-danger" role="alert">{{ $errors->first('education_details') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group res-add">
                                <label for="occupation">Occupation</label>
                                <select class="form-control" name="occupation" required>
                                    <option value="">Select Any</option>
                                    @foreach (App\Models\User::OCCUPATION as $occu)
                                        <option value="{{ $occu }}"
                                            @if (old('occupation') == $occu) {{ 'selected' }} @endif>
                                            {{ $occu }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('occupation'))
                                    <div class="text-danger" role="alert">{{ $errors->first('occupation') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="occupation_details">Occupation Details</label>
                                <input type="text" name="occupation_details" id="occupation_details"
                                    placeholder="Enter Your Occupation Details" class="form-control" minlength="3"
                                    maxlength="120" value="{{ old('occupation_details') }}">
                                @if ($errors->has('occupation_details'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('occupation_details') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="income">Income (PA) - in Lakhs</label>
                                <input type="number" step=".001" name="income" id="income"
                                    placeholder="Enter Your Annual Income" class="form-control"
                                    value="{{ old('income') }}" required>
                                @if ($errors->has('income'))
                                    <div class="text-danger" role="alert">{{ $errors->first('income') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group res-add">
                                <label for="occupation_address">Occupation Address</label>
                                <textarea type="text" placeholder="Enter Your Occupation Address" name="occupation_address"
                                    id="occupation_address" class="form-control" required rows="2" minlength="3" maxlength="120">{{ old('occupation_address') }}</textarea>
                                @if ($errors->has('occupation_address'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('occupation_address') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number (WhatsApp No.)</label>
                                <input type="text" name="mobile_number" id="mobile_number"
                                    placeholder="Enter Your Mobile No." class="form-control" minlength="10"
                                    maxlength="10" value="{{ old('mobile_number') }}" required>
                                @if ($errors->has('mobile_number'))
                                    <div class="text-danger" role="alert">{{ $errors->first('mobile_number') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="no_of_married_sisters"> No. of Married Sisters (Other than
                                    Candidate)</label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-white text-black h-100">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Small"
                                        name="no_of_married_sisters" id="no_of_married_sisters" required value="0"
                                        min="0" max="99">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-white text-black h-100 ">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </span>
                                    </div>
                                    @if ($errors->has('no_of_married_sisters'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('no_of_married_sisters') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="no_of_unmarried_sisters"> No. of Unmarried Sisters (Other than
                                    Candidate)</label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-white text-black h-100">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Small"
                                        name="no_of_unmarried_sisters" id="no_of_unmarried_sisters" required
                                        value="0" min="0" max="99">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-white text-black h-100 ">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </span>
                                        @if ($errors->has('no_of_unmarried_sisters'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('no_of_unmarried_sisters') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="no_of_married_brothers"> No. of Married Brothers (Other than
                                    Candidate)</label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-white text-black h-100">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Small"
                                        name="no_of_married_brothers" required value="0" id="no_of_married_brothers"
                                        min="0" max="99">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-white text-black h-100 ">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </span>
                                        @if ($errors->has('no_of_married_brothers'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('no_of_married_brothers') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="form-group">
                                <label for="no_of_unmarried_brothers"> No. of Unmarried Brothers (Other than
                                    Candidate)</label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-white text-black h-100">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Small"
                                        name="no_of_unmarried_brothers" id="no_of_unmarried_brothers" required
                                        value="0" min="0" max="99">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-white text-black h-100 ">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </span>
                                        @if ($errors->has('no_of_unmarried_brothers'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('no_of_unmarried_brothers') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="submit"
                            class="btn btn-gradient mx-auto
                        btn-block px-5">
                            Next
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('frontend/dropify/js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
