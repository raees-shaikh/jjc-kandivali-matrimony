@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        {{-- <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow" style="padding: 10px">
            <div class="widget-header">
                <div class="row justify-content-between align-items-center">
                    <div class="col-3">
                        <h5>Expenses</h5>
                    </div>
                    <div class="col-7">
                    </div>
                    <div class="col-2">
                        <p>Home -> Expenses</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-2 mb-1">
                            <legend class="h4">
                                Edit User
                            </legend>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">
                                            Edit User</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <form class="mt-3" method="POST" action="{{ route('backend.user.form-two-update', $users->id) }}"
                            enctype="multipart/form-data" onsubmit="return confirm('Are you sure, you want to Submit?')">
                            @csrf
                            <div class="form-group mb-4 row">
                                <div class="col-12   px-0">
                                    <legend class="text-center h3 cutom-head-mobi">DETAILS OF MOSAL</legend>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="mosal_name">Name of Nana/ Mama's Name</label>
                                    <input type="text" name="mosal_name" id="mosal_name" placeholder="Enter Full Name"
                                        class="form-control" value="{{ old('mosal_name') ?? $users->mosal_name }}"
                                        minlength="3" maxlength="30" required>
                                    @if ($errors->has('mosal_name'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('mosal_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="mosal_mobile">Mobile number</label>
                                    <input type="text" name="mosal_mobile" id="mosal_mobile"
                                        placeholder="Enter Mosal Mobile Number" class="form-control"
                                        value="{{ old('mosal_mobile') ?? $users->mosal_mobile }}" minlength="10"
                                        maxlength="10">
                                    @if ($errors->has('mosal_mobile'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('mosal_mobile') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="mosal_residential_address">Residential Address</label>
                                    <textarea name="mosal_residential_address" id="mosal_residential_address" class="form-control"
                                        placeholder="Enter Mosal Address" minlength="3" maxlength="120">{{ old('mosal_residential_address') ?? $users->mosal_residential_address }}</textarea>
                                    @if ($errors->has('mosal_residential_address'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('mosal_residential_address') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mt-4 mb-0 px-0">
                                    <legend class="text-center h3 cutom-head-mobi">TWO REFERENCES WHO KNOW ABOUT YOU / YOUR FAMILY</legend>
                                </div>
                                <div class="col-12 mt-3">
                                    <legend class="h3 person-head">Person 1</legend>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="reference_one_name">Name Of Person</label>
                                    <input type="text" name="reference_one_name" id="reference_one_name"
                                        placeholder="Enter Full Name" class="form-control"
                                        value="{{ $userReferenceOne ? $userReferenceOne->name : '' }}" minlength="3"
                                        maxlength="30" required>
                                    @if ($errors->has('reference_one_name'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('reference_one_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="reference_one_mobile">Mobile number</label>
                                    <input type="text" name="reference_one_mobile" id="reference_one_mobile"
                                        placeholder="Enter Mobile Number" class="form-control"
                                        value="{{ $userReferenceOne ? $userReferenceOne->mobile : '' }}" minlength="10"
                                        maxlength="10" required>
                                    @if ($errors->has('reference_one_mobile'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('reference_one_mobile') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="reference_one_address">Address</label>
                                    <textarea name="reference_one_address" id="reference_one_address" class="form-control" placeholder="Enter Full Address"
                                        minlength="3" maxlength="120">{{ $userReferenceOne ? $userReferenceOne->address : '' }}</textarea>
                                    @if ($errors->has('reference_one_address'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('reference_one_address') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mt-3">
                                    <legend class="h3 person-head">Person 2</legend>
                                </div>
                                {{-- <div class="col-6 my-3">
                                </div> --}}
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="reference_two_name">Name Of Person</label>
                                    <input type="text" name="reference_two_name" id="reference_two_name"
                                        placeholder="Enter Full Name" class="form-control"
                                        value="{{ $userReferenceTwo ? $userReferenceTwo->name : '' }}" minlength="3"
                                        maxlength="30" required>
                                    @if ($errors->has('reference_two_name'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('reference_two_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="reference_two_mobile">Mobile number</label>
                                    <input type="text" name="reference_two_mobile" id="reference_two_mobile"
                                        placeholder="Enter Mobile Number" class="form-control"
                                        value="{{ $userReferenceTwo ? $userReferenceTwo->mobile : '' }}" minlength="10"
                                        maxlength="10" required>
                                    @if ($errors->has('reference_two_mobile'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('reference_two_mobile') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="reference_two_address"> Address</label>
                                    <textarea name="reference_two_address" id="reference_two_address" class="form-control"
                                        placeholder="Enter Full Address" minlength="3" maxlength="120">{{ $userReferenceTwo ? $userReferenceTwo->address : '' }}</textarea>
                                    @if ($errors->has('reference_two_address'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('reference_two_address') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mt-4 mb-0 px-0">
                                    <legend class="text-center h3 cutom-head-mobi">FAMILY DETAILS</legend>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="father_name">Name Of Father</label>
                                    <input type="text" name="father_name" id="father_name"
                                        placeholder="Enter Full Name"
                                        value="{{ old('father_name') ?? $users->father_name }}" class="form-control"
                                        minlength="3" maxlength="30" required>
                                    @if ($errors->has('father_name'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('father_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="father_occupation">Occupation</label>
                                    <select class="form-control" id="father_occupation" name="father_occupation">
                                        <option value="">Select Any</option>
                                        @if (old('father_occupation'))
                                            @foreach (App\Models\User::OCCUPATION as $o)
                                                <option value="{{ $o }}"
                                                    @if (old('father_occupation') == $o) {{ 'selected' }} @endif>
                                                    {{ $o }}
                                                </option>
                                            @endforeach
                                        @else
                                            @foreach (App\Models\User::OCCUPATION as $o)
                                                <option value="{{ $o }}"
                                                    @if ($users->father_occupation == $o) {{ 'selected' }} @endif>
                                                    {{ $o }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('father_occupation'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('father_occupation') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="mother_name">Name Of Mother</label>
                                    <input type="text" name="mother_name" id="mother_name"
                                        placeholder="Enter Full Name"
                                        value="{{ old('mother_name') ?? $users->mother_name }}" class="form-control"
                                        minlength="3" maxlength="30" required>
                                    @if ($errors->has('mother_name'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('mother_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="mother_occupation">Occupation</label>
                                    <select class="form-control" name="mother_occupation" id="mother_occupation">
                                        <option value="">Select Any</option>
                                        @if (old('mother_occupation'))
                                            @foreach (App\Models\User::MOTHER_OCCUPATION as $o)
                                                <option value="{{ $o }}"
                                                    @if (old('mother_occupation') == $o) {{ 'selected' }} @endif>
                                                    {{ $o }}
                                                </option>
                                            @endforeach
                                        @else
                                            @foreach (App\Models\User::MOTHER_OCCUPATION as $o)
                                                <option value="{{ $o }}"
                                                    @if ($users->mother_occupation == $o) {{ 'selected' }} @endif>
                                                    {{ $o }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('mother_occupation'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('mother_occupation') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class=" text-center mt-4 px-0">
                                    <legend class="text-center h3 mb-3 cutom-head-mobi">CANDIDATE'S SPECIAL CHOICE</legend>
                                </div>
                                <div class="col-12 col-md-10 mx-auto text-center">
                                    <label for="choice_of_life_partner mb-2 pb-2">Choice of Life Partner</label>
                                    <select class="form-control" name="choice_of_life_partner"
                                        id="choice_of_life_partner">
                                        <option value="">Select Any If Required</option>
                                        @if (old('choice_of_life_partner'))
                                            <option value="Never Married"
                                                @if (old('choice_of_life_partner') == 'Never Married') {{ 'selected' }} @endif>Never
                                                Married
                                            </option>
                                            <option value="Seperated"
                                                @if (old('choice_of_life_partner') == 'Seperated') {{ 'selected' }} @endif>Seperated
                                            </option>
                                            <option value="Widowed"
                                                @if (old('choice_of_life_partner') == 'Widowed') {{ 'selected' }} @endif>Widowed
                                            </option>
                                            <option value="Divorced"
                                                @if (old('choice_of_life_partner') == 'Divorced') {{ 'selected' }} @endif>Divorced
                                            </option>
                                        @else
                                            <option value="Never Married"
                                                @if ($users->choice_of_life_partner == 'Never Married') {{ 'selected' }} @endif>Never
                                                Married
                                            </option>
                                            <option value="Seperated"
                                                @if ($users->choice_of_life_partner == 'Seperated') {{ 'selected' }} @endif>Seperated
                                            </option>
                                            <option value="Widowed"
                                                @if ($users->choice_of_life_partner == 'Widowed') {{ 'selected' }} @endif>Widowed
                                            </option>
                                            <option value="Divorced"
                                                @if ($users->choice_of_life_partner == 'Divorced') {{ 'selected' }} @endif>Divorced
                                            </option>
                                        @endif

                                    </select>
                                    @if ($errors->has('choice_of_life_partner'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('choice_of_life_partner') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center mt-md-2 mt-3">
                                <div class="col-12 col-md-4 text-center mx-auto">
                                    <label class="d-block">Willing to Settle abroad?</label>
                                    <div class="pt-2">
                                        @if (old('willing_to_settle_abroad'))
                                            <input type="radio" class="form-control-check"
                                                name="willing_to_settle_abroad" id="willing_to_settle_abroad_yes"
                                                value="Yes"
                                                @if (old('willing_to_settle_abroad') == 'Yes') {{ 'checked' }} @endif>
                                            <label for="willing_to_settle_abroad_yes">Yes</label>
                                            <input type="radio" class="form-control-check"
                                                name="willing_to_settle_abroad" id="willing_to_settle_abroad_no"
                                                value="No"@if (old('willing_to_settle_abroad') == 'No') {{ 'checked' }} @endif>
                                            <label for="willing_to_settle_abroad_no">No</label>
                                        @else
                                            <input type="radio" class="form-control-check"
                                                name="willing_to_settle_abroad" id="willing_to_settle_abroad_yes"
                                                value="Yes"
                                                @if ($users->willing_to_settle_abroad == 'Yes') {{ 'checked' }} @endif>
                                            <label for="willing_to_settle_abroad_yes">Yes</label>
                                            <input type="radio" class="form-control-check"
                                                name="willing_to_settle_abroad" id="willing_to_settle_abroad_no"
                                                value="No"@if ($users->willing_to_settle_abroad == 'No') {{ 'checked' }} @endif>
                                            <label for="willing_to_settle_abroad_no">No</label>
                                        @endif

                                    </div>
                                    @if ($errors->has('willing_to_settle_abroad'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('willing_to_settle_abroad') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-1 text-center mx-auto">
                                    <label class="d-block">Willing to Marry having Strictly
                                        Jain Food habits?</label>
                                    <div class="pt-2">
                                        @if (old('willing_to_marry_having_strictly_jain_foods'))
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
                                        @else
                                            <input type="radio" class="form-control-check"
                                                name="willing_to_marry_having_strictly_jain_foods"
                                                id="willing_to_marry_having_strictly_jain_foods_yes" value="Yes"
                                                @if ($users->willing_to_marry_having_strictly_jain_foods == 'Yes') {{ 'checked' }} @endif>
                                            <label for="willing_to_marry_having_strictly_jain_foods_yes">Yes</label>
                                            <input type="radio" class="form-control-check"
                                                name="willing_to_marry_having_strictly_jain_foods"
                                                id="willing_to_marry_having_strictly_jain_foods_no" value="No"
                                                @if ($users->willing_to_marry_having_strictly_jain_foods == 'No') {{ 'checked' }} @endif>
                                            <label for="willing_to_marry_having_strictly_jain_foods_no">No</label>
                                        @endif

                                    </div>
                                    @if ($errors->has('willing_to_marry_having_strictly_jain_foods'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('willing_to_marry_having_strictly_jain_foods') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12 mt-4 mb-0 px-0">
                                    <legend class="text-center h3 cutom-head-mobi">MUMBAI CONTACT FOR OUTSIDE CANDIDATE</legend>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="mumbai_contact_name">Name</label>
                                    <input type="text" name="mumbai_contact_name" id="mumbai_contact_name"
                                        value="{{ old('mumbai_contact_name') ?? $users->mumbai_contact_name }}"
                                        placeholder="Enter Full Name" class="form-control" minlength="3"
                                        maxlength="30">
                                    @if ($errors->has('mumbai_contact_name'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('mumbai_contact_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="mumbai_contact_mobile">Mobile number</label>
                                    <input type="text" name="mumbai_contact_mobile" id="mumbai_contact_mobile"
                                        value="{{ old('mumbai_contact_mobile') ?? $users->mumbai_contact_mobile }}"
                                        placeholder="+91" class="form-control" minlength="10" maxlength="10">
                                    @if ($errors->has('mumbai_contact_mobile'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('mumbai_contact_mobile') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="mumbai_contact_family_relation">Family Relation</label>
                                    <select class="form-control" name="mumbai_contact_family_relation"
                                        id="mumbai_contact_family_relation">
                                        <option value="">Select Any If Required</option>
                                        @if (old('mumbai_contact_family_relation'))
                                            @foreach (App\Models\User::FAMILY_RELATION as $fr)
                                                <option value="{{ $fr }}"
                                                    @if (old('mumbai_contact_family_relation') == $fr) {{ 'selected' }} @endif>
                                                    {{ $fr }}
                                                </option>
                                            @endforeach
                                        @else
                                            @foreach (App\Models\User::FAMILY_RELATION as $fr)
                                                <option value="{{ $fr }}"
                                                    @if ($users->mumbai_contact_family_relation == $fr) {{ 'selected' }} @endif>
                                                    {{ $fr }}
                                                </option>
                                            @endforeach
                                        @endif

                                    </select>
                                    @if ($errors->has('mumbai_contact_family_relation'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('mumbai_contact_family_relation') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="mumbai_contact_address">Residential Address</label>
                                    <textarea name="mumbai_contact_address" id="mumbai_contact_address" placeholder="Enter Address" class="form-control"
                                        minlength="3" maxlength="120">{{ old('mumbai_contact_address') ?? $users->mumbai_contact_address }}</textarea>
                                    @if ($errors->has('mumbai_contact_address'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('mumbai_contact_address') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary d-block mx-auto  mt-4 text-center"
                                value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
