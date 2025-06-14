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
                    <div class="row justify-content-between align-items-center mb-1">
                        <div class="col-lg-4 col-md-6 ">
                            <legend class="h4">
                                Create User
                            </legend>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 mt-lg-0">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Create User</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="statbox widget box box-shadow">
                        <form class="mt-3" method="POST" action="{{ route('backend.user.store') }}">
                            @csrf
                            <div class="form-group mb-4 row">
                                <div class="col-12 col-md-12">
                                    <label for="formGroupExampleInput3">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Full Name" value="{{ old('full_name') }}" minlength="3" maxlength="80"
                                        required name="full_name">
                                    @if ($errors->has('full_name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('full_name') }}</div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-12 mt-2">
                                    <label for="formGroupExampleInput3">Mobile No</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Mobile No" value="{{ old('mobile') }}" minlength="10" maxlength="10"
                                        required name="mobile">
                                    @if ($errors->has('mobile'))
                                        <div class="text-danger" role="alert">{{ $errors->first('mobile') }}</div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-12 mt-2">
                                    <label for="formGroupExampleInput3">Gender</label>
                                   <select name="gender" class="form-control" required>
                                    <option value="">Select Any</option>
                                    <option value="male" @if (old('gender') == 'male') {{'selected'}} @endif>Male</option>
                                    <option value="female" @if (old('gender') == 'female') {{'selected'}} @endif>Female</option>
                                   </select>
                                    @if ($errors->has('gender'))
                                        <div class="text-danger" role="alert">{{ $errors->first('gender') }}</div>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    @endsection
