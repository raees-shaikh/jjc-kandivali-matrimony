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
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Edit User</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <form class="mt-3" method="POST" action="{{ route('backend.user.form-one-update', $users->id) }}"
                            enctype="multipart/form-data" onsubmit="return confirm('Are you sure, you want to submit?')">
                            @csrf
                            <div class="form-group mb-4 row">
                                <div class="col-12 col-md-4 mt-3">
                                    <label for="formGroupExampleInput3">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Full Name" value="{{ old('full_name') ?? $users->full_name }}"
                                        minlength="3" maxlength="30" required name="full_name">
                                    @if ($errors->has('full_name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('full_name') }}</div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <label for="formGroupExampleInput3">Email</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Email" value="{{ old('email') ?? $users->email }}" minlength="3"
                                        maxlength="30" required name="email">
                                    @if ($errors->has('email'))
                                        <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <label for="formGroupExampleInput3">Date Of Birth - Time</label>
                                    <input type="datetime-local" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Date Of Birth"
                                        value="{{ old('date_of_birth') ?? $users->date_of_birth }}" required
                                        name="date_of_birth">
                                    @if ($errors->has('date_of_birth'))
                                        <div class="text-danger" role="alert">{{ $errors->first('date_of_birth') }}</div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <div class="form-check-inline d-block pt-1">
                                        <label for="formGroupExampleInput3">Gender</label><br>
                                        @if (old('gender'))
                                            <input class="form-check-input d-inline-block" type="radio" name="gender"
                                                id="gender_male" value="male"
                                                @if (old('gender') == 'male') {{ 'checked' }} @endif required>
                                            <label class="form-check-label d-inline-block" for="gender_male">
                                                Male
                                            </label>
                                            <input class="form-check-input d-inline-block" type="radio" name="gender"
                                                id="gender_female" value="female"
                                                @if (old('gender') == 'female') {{ 'checked' }} @endif required>
                                            <label class="form-check-label d-inline-block" for="gender_female">
                                                Female
                                            </label>
                                        @else
                                            <input class="form-check-input d-inline-block" type="radio" name="gender"
                                                id="gender_male" value="male"
                                                @if ($users->gender == 'male') {{ 'checked' }} @endif required>
                                            <label class="form-check-label d-inline-block" for="gender_male">
                                                Male
                                            </label>
                                            <input class="form-check-input d-inline-block" type="radio" name="gender"
                                                id="gender_female" value="female"
                                                @if ($users->gender == 'female') {{ 'checked' }} @endif required>
                                            <label class="form-check-label d-inline-block" for="gender_female">
                                                Female
                                            </label>
                                        @endif
                                        @if ($errors->has('gender'))
                                            <div class="text-danger" role="alert">{{ $errors->first('gender') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <label for="formGroupExampleInput3">Place Of Birth</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Place Of Birth"
                                        value="{{ old('place_of_birth') ?? $users->place_of_birth }}" minlength="3"
                                        maxlength="30" required name="place_of_birth">
                                    @if ($errors->has('place_of_birth'))
                                        <div class="text-danger" role="alert">{{ $errors->first('place_of_birth') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <label for="formGroupExampleInput3">Native Place</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Native Place"
                                        value="{{ old('native_place') ?? $users->native_place }}" minlength="3"
                                        maxlength="30" required name="native_place">
                                    @if ($errors->has('native_place'))
                                        <div class="text-danger" role="alert">{{ $errors->first('native_place') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <label for="formGroupExampleInput3">Profile Image</label><br>
                                    @if ($users->profile_image)
                                        <img src="{{ asset('storage/images/profile/' . $users->profile_image) }}"
                                            width="150px" height="150px">
                                    @endif
                                    <input type="file" class="form-control" id="formGroupExampleInput3"
                                        name="profile_image" @if (!$users->profile_image) required @endif>
                                    @if ($errors->has('profile_image'))
                                        <div class="text-danger" role="alert">{{ $errors->first('profile_image') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <div class="form-group res-add">
                                        <label for="martial_status"> Marital Status
                                        </label>
                                        <select class="form-control" name="martial_status" required>
                                            <option value="">Select Any</option>
                                            @if (old('martial_status'))
                                                @foreach (App\Models\User::MARTIAL_STATUS as $ms)
                                                    <option value="{{ $ms }}"
                                                        @if (old('martial_status') == $ms) {{ 'selected' }} @endif>
                                                        {{ $ms }}
                                                    </option>
                                                @endforeach
                                            @else
                                                @foreach (App\Models\User::MARTIAL_STATUS as $ms)
                                                    <option value="{{ $ms }}"
                                                        @if ($users->martial_status == $ms) {{ 'selected' }} @endif>
                                                        {{ $ms }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    @if ($errors->has('martial_status'))
                                        <div class="text-danger" role="alert">{{ $errors->first('martial_status') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group res-add">
                                        <label for="status_of_children">Status of Children</label>
                                        <select class="form-control" name="status_of_children" id="status_of_children">
                                            <option value="">Select any if Applicable</option>
                                            @if (old('status_of_children'))
                                                @foreach (App\Models\User::CHILDREN_STATUS as $cs)
                                                    <option value="{{ $cs }}"
                                                        @if (old('status_of_children') == $cs) {{ 'selected' }} @endif>
                                                        {{ $cs }}
                                                    </option>
                                                @endforeach
                                            @else
                                                @foreach (App\Models\User::CHILDREN_STATUS as $cs)
                                                    <option value="{{ $cs }}"
                                                        @if ($users->status_of_children == $cs) {{ 'selected' }} @endif>
                                                        {{ $cs }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    @if ($errors->has('status_of_children'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('status_of_children') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <label for="formGroupExampleInput3">No Of Children</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter No Of Children"
                                        value="{{ old('no_of_children') ?? $users->no_of_children }}"
                                        name="no_of_children" required min="0" max="99">
                                    @if ($errors->has('no_of_children'))
                                        <div class="text-danger" role="alert">{{ $errors->first('no_of_children') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <label for="formGroupExampleInput3">Caste</label>
                                    <select class="form-control" id="caste" name="caste" required>
                                        <option value="">Select Any</option>
                                        @if (old('caste'))
                                            @foreach (App\Models\User::CASTE as $c)
                                                <option value="{{ $c }}"
                                                    @if (old('caste') == $c) {{ 'selected' }} @endif>
                                                    {{ $c }}
                                                </option>
                                            @endforeach
                                        @else
                                            @foreach (App\Models\User::CASTE as $c)
                                                <option value="{{ $c }}"
                                                    @if ($users->caste == $c) {{ 'selected' }} @endif>
                                                    {{ $c }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('caste'))
                                        <div class="text-danger" role="alert">{{ $errors->first('caste') }}</div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <label for="formGroupExampleInput3">Sub Caste</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Sub Caste" value="{{ old('sub_caste') ?? $users->sub_caste }}"
                                        minlength="3" maxlength="30" name="sub_caste">
                                    @if ($errors->has('sub_caste'))
                                        <div class="text-danger" role="alert">{{ $errors->first('sub_caste') }}</div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <label for="mother_tongue">Mother Tongue</label>
                                    <select class="form-control" id="mother_tongue" name="mother_tongue" required>
                                        <option value="">Select Any</option>
                                        @if (old('mother_tongue'))
                                            @foreach (App\Models\User::MOTHER_TONGUE as $mt)
                                                <option value="{{ $mt }}"
                                                    @if (old('mother_tongue') == $mt) {{ 'selected' }} @endif>
                                                    {{ $mt }}
                                                </option>
                                            @endforeach
                                        @else
                                            @foreach (App\Models\User::MOTHER_TONGUE as $mt)
                                                <option value="{{ $mt }}"
                                                    @if ($users->mother_tongue == $mt) {{ 'selected' }} @endif>
                                                    {{ $mt }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('mother_tongue'))
                                        <div class="text-danger" role="alert">{{ $errors->first('mother_tongue') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <div class="form-group form-check-inline d-block">
                                        <label for="">Manglik
                                        </label>
                                        <div class="pt-2">
                                            @if (old('manglik'))
                                                <input class="form-check-input d-inline-block" type="radio"
                                                    name="manglik" id="manglik_yes" value="1"
                                                    @if (old('manglik') == '1') {{ 'checked' }} @endif>
                                                <label class="form-check-label d-inline-block" for="manglik_yes">
                                                    Yes
                                                </label>
                                                <input class="form-check-input d-inline-block" type="radio"
                                                    name="manglik" id="manglik_no" value="0"
                                                    @if (old('manglik') == '0') {{ 'checked' }} @endif>
                                                <label class="form-check-label d-inline-block" for="manglik_no">
                                                    No
                                                </label>
                                            @else
                                                <input class="form-check-input d-inline-block" type="radio"
                                                    name="manglik" id="manglik_yes" value="1"
                                                    @if ($users->manglik == '1') {{ 'checked' }} @endif>
                                                <label class="form-check-label d-inline-block" for="manglik_yes">
                                                    Yes
                                                </label>
                                                <input class="form-check-input d-inline-block" type="radio"
                                                    name="manglik" id="manglik_no" value="0"
                                                    @if ($users->manglik == '0') {{ 'checked' }} @endif>
                                                <label class="form-check-label d-inline-block" for="manglik_no">
                                                    No
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($errors->has('manglik'))
                                        <div class="text-danger" role="alert">{{ $errors->first('manglik') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <label for="formGroupExampleInput3">Height(cm)</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Height" value="{{ old('height') ?? $users->height }}" required
                                        name="height">
                                    @if ($errors->has('height'))
                                        <div class="text-danger" role="alert">{{ $errors->first('height') }}</div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <label for="formGroupExampleInput3">Weight(kg)</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Weight" value="{{ old('weight') ?? $users->weight }}" required
                                        name="weight">
                                    @if ($errors->has('weight'))
                                        <div class="text-danger" role="alert">{{ $errors->first('weight') }}</div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3 ">
                                    <label for="blood_group">Blood Group</label>
                                    <select class="form-control" id="blood_group" name="blood_group">
                                        <option value="">Select Any</option>
                                        @if (old('blood_group'))
                                            @foreach (App\Models\User::BLOOD_GROUP as $bg)
                                                <option value="{{ $bg }}"
                                                    @if (old('blood_group') == $bg) {{ 'selected' }} @endif>
                                                    {{ $bg }}
                                                </option>
                                            @endforeach
                                        @else
                                            @foreach (App\Models\User::BLOOD_GROUP as $bg)
                                                <option value="{{ $bg }}"
                                                    @if ($users->blood_group == $bg) {{ 'selected' }} @endif>
                                                    {{ $bg }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('blood_group'))
                                        <div class="text-danger" role="alert">{{ $errors->first('blood_group') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-check-inline d-block pt-1">
                                        <label for="handicap">Handicap
                                        </label><br>
                                        @if (old('handicap'))
                                            <input class="form-check-input d-inline-block" type="radio" name="handicap"
                                                id="handicap_yes" value="1"
                                                @if (old('handicap') == '1') {{ 'checked' }} @endif required>
                                            <label class="form-check-label d-inline-block" for="handicap_yes">
                                                Yes
                                            </label>
                                            <input class="form-check-input d-inline-block" type="radio" name="handicap"
                                                id="handicap_no" value="0"
                                                @if (old('handicap') == '0') {{ 'checked' }} @endif required>
                                            <label class="form-check-label d-inline-block" for="handicap_no">
                                                No
                                            </label>
                                        @else
                                            <input class="form-check-input d-inline-block" type="radio" name="handicap"
                                                id="handicap_yes" value="1"
                                                @if ($users->handicap == '1') {{ 'checked' }} @endif required>
                                            <label class="form-check-label d-inline-block" for="handicap_yes">
                                                Yes
                                            </label>
                                            <input class="form-check-input d-inline-block" type="radio" name="handicap"
                                                id="handicap_no" value="0"
                                                @if ($users->handicap == '0') {{ 'checked' }} @endif required>
                                            <label class="form-check-label d-inline-block" for="handicap_no">
                                                No
                                            </label>
                                        @endif
                                        @if ($errors->has('handicap'))
                                            <div class="text-danger" role="alert">{{ $errors->first('handicap') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <label for="formGroupExampleInput3">Handicap Details</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Handicap Details"
                                        value="{{ old('handicap_details') ?? $users->handicap_details }}" minlength="3"
                                        maxlength="30" name="handicap_details">
                                    @if ($errors->has('handicap_details'))
                                        <div class="text-danger" role="alert">{{ $errors->first('handicap_details') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group res-add">
                                        <label for="occupation_address">Residential Address</label>
                                        <textarea type="text" placeholder="Enter your Residential Address" name="residential_address"
                                            id="residential_address" class="form-control" rows="2" minlength="3" maxlength="120" required>{{ old('residential_address') ?? $users->residential_address }}</textarea>
                                        @if ($errors->has('residential_address'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('residential_address') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="alternative_mobile">Mobile number</label>
                                        <input type="text" name="alternative_mobile" id="alternative_mobile"
                                            placeholder="Enter You Mobile No. (WhatsApp)" class="form-control" minlength="10"
                                            maxlength="10" value="{{ old('alternative_mobile') ?? $users->alternative_mobile }}">
                                        @if ($errors->has('alternative_mobile'))
                                            <div class="text-danger" role="alert">{{ $errors->first('alternative_mobile') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="education">Qualification</label>
                                        <select class="form-control" name="qualification" required>
                                            <option value="">Select Any</option>
                                            @if (old('qualification'))
                                                @foreach (App\Models\User::QUALIFICATION as $e)
                                                    <option value="{{ $e }}"
                                                        @if (old('qualification') == $e) {{ 'selected' }} @endif>
                                                        {{ $e }}
                                                    </option>
                                                @endforeach
                                            @else
                                                @foreach (App\Models\User::QUALIFICATION as $e)
                                                    <option value="{{ $e }}"
                                                        @if ($users->qualification == $e) {{ 'selected' }} @endif>
                                                        {{ $e }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('qualification'))
                                            <div class="text-danger" role="alert">{{ $errors->first('qualification') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="education_medium">Medium</label>
                                        <select class="form-control" name="education_medium" required>
                                            <option value="">Select Any</option>
                                            @if (old('education_medium'))
                                                @foreach (App\Models\User::EDUCATION_MEDIUM as $em)
                                                    <option value="{{ $em }}"
                                                        @if (old('education_medium') == $em) {{ 'selected' }} @endif>
                                                        {{ $em }}
                                                    </option>
                                                @endforeach
                                            @else
                                                @foreach (App\Models\User::EDUCATION_MEDIUM as $em)
                                                    <option value="{{ $em }}"
                                                        @if ($users->education_medium == $em) {{ 'selected' }} @endif>
                                                        {{ $em }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('education_medium'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('education_medium') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="education_details">Education Details</label>
                                        <input type="text" name="education_details" id="education_details"
                                            placeholder="Enter Your Education Details" class="form-control"
                                            minlength="3" maxlength="60"
                                            value="{{ old('education_details') ?? $users->education_details }}" required>
                                        @if ($errors->has('education_details'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('education_details') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group res-add">
                                        <label for="occupation">Occupation</label>
                                        <select class="form-control" name="occupation" required>
                                            <option value="">Select Any</option>
                                            @if (old('occupation'))
                                                @foreach (App\Models\User::OCCUPATION as $o)
                                                    <option value="{{ $o }}"
                                                        @if (old('occupation') == $o) {{ 'selected' }} @endif>
                                                        {{ $o }}
                                                    </option>
                                                @endforeach
                                            @else
                                                @foreach (App\Models\User::OCCUPATION as $o)
                                                    <option value="{{ $o }}"
                                                        @if ($users->occupation == $o) {{ 'selected' }} @endif>
                                                        {{ $o }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('occupation'))
                                            <div class="text-danger" role="alert">{{ $errors->first('occupation') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="occupation_details">Occupation Details</label>
                                        <input type="text" name="occupation_details" id="occupation_details"
                                            placeholder="Enter Your Occupation Details" class="form-control"
                                            minlength="3" maxlength="120"
                                            value="{{ old('occupation_details') ?? $users->occupation_details }}">
                                        @if ($errors->has('occupation_details'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('occupation_details') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="income">Income (PA) - in Lakhs</label>
                                        <input type="number" step=".001" name="income" id="income"
                                            placeholder="Enter your Income (PA) - in Lakhs" class="form-control"
                                            value="{{ old('income') ?? $users->income }}">
                                        @if ($errors->has('income'))
                                            <div class="text-danger" role="alert">{{ $errors->first('income') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group res-add">
                                        <label for="occupation_address">Occupation Address</label>
                                        <textarea type="text" placeholder="Enter your Occupation Address" name="occupation_address"
                                            id="occupation_address" class="form-control" rows="2" minlength="3" maxlength="120">{{ old('occupation_address') ?? $users->occupation_address }}</textarea>
                                        @if ($errors->has('occupation_address'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('occupation_address') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="mobile_number">No. of Married Sisters (Other than
                                            Candidate)</label>
                                        <input type="number" name="married_sisters" id="married_sisters"
                                            placeholder="Enter No. of Married Sisters" class="form-control"
                                            value="{{ old('married_sisters') ?? $users->married_sisters }}" required min="0" max="99">
                                        @if ($errors->has('married_sisters'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('married_sisters') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="mobile_number">No. of Unmarried Sisters (Other than
                                            Candidate)</label>
                                        <input type="number" name="unmarried_sisters" id="unmarried_sisters"
                                            placeholder="Enter No. of Unmarried Sisters" class="form-control"
                                            value="{{ old('unmarried_sisters') ?? $users->unmarried_sisters }}" required min="0" max="99">
                                        @if ($errors->has('unmarried_sisters'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('unmarried_sisters') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="married_brothers">No. of Married Brothers (Other than
                                            Candidate)</label>
                                        <input type="number" name="married_brothers" id="married_brothers"
                                            placeholder="Enter No. of Married Brothers" class="form-control"
                                            value="{{ old('married_brothers') ?? $users->married_brothers }}" required min="0" max="99">
                                        @if ($errors->has('married_brothers'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('married_brothers') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="unmarried_brothers">No. of Unmarried Brothers (Other than
                                            Candidate)</label>
                                        <input type="number" name="unmarried_brothers" id="unmarried_brothers"
                                            placeholder="Enter No. of Unmarried Brothers" class="form-control"
                                            value="{{ old('unmarried_brothers') ?? $users->unmarried_brothers }}"
                                            required min="0" max="99">
                                        @if ($errors->has('unmarried_brothers'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('unmarried_brothers') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary d-block mx-auto text-center" value="Next">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
