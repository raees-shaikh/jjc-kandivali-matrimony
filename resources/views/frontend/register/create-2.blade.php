@extends('frontend.layouts.app')
@section('title', 'Registration - ')
@section('cdn')
    <link rel="stylesheet" href="{{ asset('frontend/dropify/css/dropify.min.css') }}">
@endsection
@section('content')
    <section class="breadcrumb-area">
        <img class="breadcrumb-area-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">

    </section>
    <section class="mb-4 detail-form px-md-0 px-3">
        <div class="register-form-container container p-3 py-4 p-md-5 custom-padding-for-desk">
            <legend class="text-center  mb-2 font-weight-600"> Details Of Mosal</legend>
            <div class="register-form-wrap">
                <form id="register-form" action="{{ route('frontend.form-two.store') }}" method="post">
                    @csrf
                    <div class="row mx-auto  justify-content-center">
                        <div class="col-xl-4 col-md-6 ">
                            <div class="form-group pt-3">
                                <label for="mosal_name">Name of Nana / Mama's Name</label>
                                <input type="text" name="mosal_name" id="mosal_name" placeholder="Enter Full Name"
                                    class="form-control" value="{{ old('mosal_name') }}" minlength="3" maxlength="30"
                                    required>
                                @if ($errors->has('mosal_name'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('mosal_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group pt-3">
                                <label for="mosal_mobile">Mobile Number (WhatsApp No.)</label>
                                <input type="text" name="mosal_mobile" id="mosal_mobile"
                                    placeholder="Enter Mosal Mobile Number" class="form-control"
                                    value="{{ old('mosal_mobile') }}" minlength="10" maxlength="10">
                                @if ($errors->has('mosal_mobile'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('mosal_mobile') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-xl-7  mt-0">
                            <div class="form-group pt-3">
                                <label for="mosal_residential_address">Residential Address</label>
                                <textarea name="mosal_residential_address" id="mosal_residential_address" class="form-control"
                                    placeholder="Enter Mosal Address" minlength="3" maxlength="120">{{ old('mosal_residential_address') }}</textarea>
                                @if ($errors->has('mosal_residential_address'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('mosal_residential_address') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center m-0">
                            <div class="col-12 mt-5 mb-4 px-0">
                                <legend class="text-center  font-weight-600">Two References Who Know About You / Your Family</legend>
                            </div>
                            <div class="col-10 px-0">
                                <div class="row justify-content-around ">
                                    <div class="col-md-5  box-gray ">
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <p class="p-0 my-2">1) Person</p>
                                                    <label for="reference_one_name">Name Of Person</label>
                                                    <input type="text" name="reference_one_name" id="reference_one_name"
                                                        placeholder="Enter Full Name" class="form-control"
                                                        value="{{ old('reference_one_name') }}" minlength="3"
                                                        maxlength="30" required>
                                                    @if ($errors->has('reference_one_name'))
                                                        <div class="text-danger" role="alert">
                                                            {{ $errors->first('reference_one_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="reference_one_mobile">Mobile number</label>
                                                    <input type="text" name="reference_one_mobile"
                                                        id="reference_one_mobile" placeholder="Enter Mobile Number"
                                                        class="form-control" value="{{ old('reference_one_mobile') }}"
                                                        minlength="10" maxlength="10" required>
                                                    @if ($errors->has('reference_one_mobile'))
                                                        <div class="text-danger" role="alert">
                                                            {{ $errors->first('reference_one_mobile') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="reference_one_address">Address</label>
                                                <textarea name="reference_one_address" id="reference_one_address" class="adrs  form-control" placeholder="Enter Full Address"
                                                    minlength="3" maxlength="120">{{ old('reference_one_address') }}</textarea>
                                                @if ($errors->has('reference_one_address'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('reference_one_address') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5  box-gray mt-md-0 mt-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <p class="p-0 my-2">2) Person</p>
                                                    <label for="reference_two_name">Name Of Person</label>
                                                    <input type="text" name="reference_two_name"
                                                        id="reference_two_name" placeholder="Enter Full Name"
                                                        class="form-control" value="{{ old('reference_two_name') }}"
                                                        minlength="3" maxlength="30" required>
                                                    @if ($errors->has('reference_two_name'))
                                                        <div class="text-danger" role="alert">
                                                            {{ $errors->first('reference_two_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="reference_two_mobile">Mobile number</label>
                                                    <input type="text" name="reference_two_mobile"
                                                        id="reference_two_mobile" placeholder="Enter Mobile Number"
                                                        class="form-control" value="{{ old('reference_two_mobile') }}"
                                                        minlength="10" maxlength="10" required>
                                                    @if ($errors->has('reference_two_mobile'))
                                                        <div class="text-danger" role="alert">
                                                            {{ $errors->first('reference_two_mobile') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="reference_two_address"> Address</label>
                                                <textarea name="reference_two_address" id="reference_two_address" class="adrs  form-control"
                                                    placeholder="Enter Full Address" minlength="3" maxlength="120">{{ old('reference_two_address') }}</textarea>
                                                @if ($errors->has('reference_two_address'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('reference_two_address') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 m-0">
                            <legend class="text-center  mb-1 mt-4 font-weight-600"> Family Details</legend>
                            <div class="col-md-6 ">
                                <div class="row ">
                                    <div class="col-lg-6">
                                        <div class="form-group pt-3">
                                            <label for="father_name">Name Of Father</label>
                                            <input type="text" name="father_name" id="father_name"
                                                placeholder="Enter Full Name" value="{{ old('father_name') }}"
                                                class="form-control" minlength="3" maxlength="30" required>
                                            @if ($errors->has('father_name'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('father_name') }}
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group pt-3">
                                            <label for="father_occupation">Occupation</label>
                                            <select class="form-control" id="father_occupation" name="father_occupation">
                                                <option value="">Select Any</option>
                                                @foreach (App\Models\User::OCCUPATION as $occu)
                                                    <option value="{{ $occu }}"
                                                        @if (old('father_occupation') == $occu) {{ 'selected' }} @endif>
                                                        {{ $occu }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('father_occupation'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('father_occupation') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group pt-3">
                                            <label for="mother_name">Name Of Mother</label>
                                            <input type="text" name="mother_name" id="mother_name"
                                                placeholder="Enter Full Name" value="{{ old('mother_name') }}"
                                                class="form-control" minlength="3" maxlength="30" required>
                                            @if ($errors->has('mother_name'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('mother_name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group pt-3">
                                            <label for="mother_occupation">Occupation</label>
                                            <select class="form-control" name="mother_occupation" id="mother_occupation">
                                                <option value="">Select Any</option>
                                                @foreach (App\Models\User::MOTHER_OCCUPATION as $occu)
                                                    <option value="{{ $occu }}"
                                                        @if (old('mother_occupation') == $occu) {{ 'selected' }} @endif>
                                                        {{ $occu }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('mother_occupation'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('mother_occupation') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-4 m-0">
                            <legend class="text-center mb-3 mt-4 font-weight-600">Candidate's Special Choice</legend>
                            <div class="col-md-8 box-gray-custom  mt-3">
                                <div class="form-group">
                                    <label for="choice_of_life_partner">Choice of Life Partner</label>
                                    <select class="form-control" name="choice_of_life_partner"
                                        id="choice_of_life_partner">
                                        <option value="">Select Any If Required</option>
                                        <option value="Never Married"
                                            @if (old('choice_of_life_partner') == 'Never Married') {{ 'selected' }} @endif>Never Married
                                        </option>
                                        <option value="Separated"
                                            @if (old('choice_of_life_partner') == 'Separated') {{ 'selected' }} @endif>Separated
                                        </option>
                                        <option value="Widowed"
                                            @if (old('choice_of_life_partner') == 'Widowed') {{ 'selected' }} @endif>Widowed</option>
                                        <option value="Divorced"
                                            @if (old('choice_of_life_partner') == 'Divorced') {{ 'selected' }} @endif>Divorced</option>
                                    </select>
                                    @if ($errors->has('choice_of_life_partner'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('choice_of_life_partner') }}
                                        </div>
                                    @endif
                                    {{-- <textarea name="" id="" class="form-control" placeholder="Full Name"></textarea> --}}
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-5 pt-3 pt-md-0">
                                        <label class="d-block">Willing to settle abroad</label>
                                        <div class="pt-2">
                                            <input type="radio" class="form-control-check"
                                                name="willing_to_settle_abroad" id="willing_to_settle_abroad_yes"
                                                value="Yes"
                                                @if (old('willing_to_settle_abroad') == 'Yes') {{ 'checked' }} @endif>
                                            <label for="willing_to_settle_abroad_yes">Yes</label>
                                            <input type="radio" class="form-control-check"
                                                name="willing_to_settle_abroad" id="willing_to_settle_abroad_no"
                                                value="No"@if (old('willing_to_settle_abroad') == 'No') {{ 'checked' }} @endif>
                                            <label for="willing_to_settle_abroad_no">No</label>
                                        </div>
                                        @if ($errors->has('willing_to_settle_abroad'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('willing_to_settle_abroad') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-7 pt-3 pt-md-0">
                                        <label class="d-block">Willing to marry having strictly
                                            jain food habits</label>
                                        <div class="pt-2">
                                            <input type="radio" class="form-control-check"
                                                name="willing_to_marry_having_strictly_jain_foods"
                                                id="willing_to_marry_having_strictly_jain_foods_yes" value="Yes"
                                                @if (old('willing_to_marry_having_strictly_jain_foods') == 'Yes') {{ 'checked' }} @endif>
                                            <label for="willing_to_marry_having_strictly_jain_foods_yes">Yes</label>
                                            <input type="radio" class="form-control-check"
                                                name="willing_to_marry_having_strictly_jain_foods"
                                                id="willing_to_marry_having_strictly_jain_foods_no" value="No"
                                                @if (old('willing_to_marry_having_strictly_jain_foods') == 'No') {{ 'checked' }} @endif>
                                            <label for="willing_to_marry_having_strictly_jain_foods_no">No</label>
                                        </div>
                                        @if ($errors->has('willing_to_marry_having_strictly_jain_foods'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('willing_to_marry_having_strictly_jain_foods') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-0 mt-5">
                            <legend class="text-center font-weight-600 mb-1 mt-4">Mumbai Contact For Outside Candidate</legend>
                            <div class="row mt-3 justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group pt-3">
                                        <label for="mumbai_contact_name">Name</label>
                                        <input type="text" name="mumbai_contact_name" id="mumbai_contact_name"
                                            value="{{ old('mumbai_contact_name') }}" placeholder="Enter Full Name"
                                            class="form-control" minlength="3" maxlength="30">
                                        @if ($errors->has('mumbai_contact_name'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('mumbai_contact_name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group pt-3">
                                        <label for="mumbai_contact_mobile">Mobile number</label>
                                        <input type="text" name="mumbai_contact_mobile" id="mumbai_contact_mobile"
                                            value="{{ old('mumbai_contact_mobile') }}" placeholder="+91"
                                            class="form-control" minlength="10" maxlength="10">
                                        @if ($errors->has('mumbai_contact_mobile'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('mumbai_contact_mobile') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group pt-3">
                                        <label for="mumbai_contact_family_relation">Family Relation</label>
                                        <select class="form-control" name="mumbai_contact_family_relation"
                                            id="mumbai_contact_family_relation">
                                            <option value="">Select Any If Required</option>
                                            @foreach (App\Models\User::FAMILY_RELATION as $fr)
                                                <option value="{{ $fr }}"
                                                    @if (old('mumbai_contact_family_relation') == $fr) {{ 'selected' }} @endif>
                                                    {{ $fr }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('mumbai_contact_family_relation'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('mumbai_contact_family_relation') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8 mt-md-3 mt-0">
                                    <div class="form-group pt-3">
                                        <label for="mumbai_contact_address">Residential Address</label>
                                        <textarea name="mumbai_contact_address" id="mumbai_contact_address" placeholder="Enter Full Address" class="form-control" minlength="3"
                                            maxlength="120">{{ old('mumbai_contact_address') }}</textarea>
                                        @if ($errors->has('mumbai_contact_address'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('mumbai_contact_address') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 mt-5 justify-content-center">
                                <legend class="text-center font-weight-600"> Confirmation</legend>
                                <div class="col-md-10 mt-3 px-0">
                                    <div class="box-white p-md-5 p-2 py-3 rounded">
                                        <ol class="num mb-0">
                                            <li> All Information given above are True & Correct. We don't have any objection
                                                to pass the information by
                                                your Centre to any other Person who is willing to marry.</li>
                                            <li class="mt-3"> It's our duty & responsibility to check correctness of
                                                candidates details</li>
                                            <li class="mt-3">Center will not have any responsibility and liabilities for
                                                the same.</li>
                                            <li class="mt-3">We agree for registration in website.</li>
                                            <li class="mt-3 w-break"> Misbehavior/Misconduct/Harassment will result into
                                                Police Complaint & Termination of Membership
                                                without any refund of Registration Fees.</li>
                                            <li class="mt-3"> Subject to Mumbai Jurisdiction only</li>
                                        </ol>
                                        <div class="mt-md-5 agree-checkbox px-md-0 px-2" >
                                            <input type="checkbox" class="form-group-check form-group agree-check" id="confirm1" value="1" name="confirmation" required>
                                            <small class="agree-text d-inline-block"><label for="confirm1">I Have Read And Agree To The Terms And Conditions.</label></small></div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" id="submit"
                                    class="btn btn-gradient mx-auto btn-block px-5 py-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('frontend/dropify/js/dropify.min.js') }}"></script>
    <script></script>
@endsection
