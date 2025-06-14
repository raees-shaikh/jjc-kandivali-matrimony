@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing ">

            {{-- new --}}

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 m-0">
                        <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                            <legend class="h4">
                                Users
                            </legend>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6  d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Users</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row pl-2">
                        <div class="col-xl-7 col-lg-12 col-md-7 col-sm-12 mt-2">
                            <form class="form-inline row app_form" action="{{ route('backend.user.index') }}"
                                method="GET">
                                <select class="form-control form-control-sm app_form_select select-input-status"
                                    id="exampleFormControlSelect1" name="status">
                                    <option value="">Select Any</option>
                                    <option value="Approved"
                                        {{ request('status') && request('status') == 'Approved' ? 'selected' : '' }}>
                                        Approved</option>
                                    <option value="Rejected"
                                        {{ request('status') && request('status') == 'Rejected' ? 'selected' : '' }}>
                                        Rejected</option>
                                    <option value="Pending"
                                        {{ request('status') && request('status') == 'Pending' ? 'selected' : '' }}>
                                        Pending</option>
                                </select>
                                <input class="form-control form-control-sm app_form_input mt-lg-0   ml-md-2 ml-0"
                                    type="text" placeholder="Name/Email/Phone/Profile No" name="q"
                                    value="{{ request('q') ?? '' }}" minlength="3" maxlength="40">
                                <input type="submit" value="Search"
                                    class="btn btn-success ml-0 ml-lg-4 ml-md-4 ml-sm-2 mt-lg-0 mt-sm-2  search_btn  search_btn_size ">
                            </form>
                            @if ($errors->has('q'))
                                <div class="text-danger" role="alert">{{ $errors->first('q') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-5 col-lg-12 col-md-5 col-sm-12 mt-2 text-right">
                            <a href="{{ route('backend.import.index') }}" name="txt"
                                class="btn btn-primary mr-1 mt-2 mt-xl-0 mt-d-3 p-xl-2 mx-lg-0 p-2 ">
                                Import User
                            </a>
                            <a href="{{ route('backend.user.create') }}" name="txt"
                                class="btn btn-primary mr-1 mt-2 mt-xl-0 mt-d-3 ">
                                Add User
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-md-4 col-sm-4 col-4">
                            {{-- <h4>Appointments</h4> --}}
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-4 col-4">
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive min-height-20em">
                        <table class="table mb-4">
                            <thead>
                                <tr>
                                    <th>Sr no.</th>
                                    <th>Profile No.</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Status</th>
                                    <th>Subcription</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ tableRowSrNo($loop->index, $users) }}</td>
                                        <td>{{ $user->profile_no ?? '---' }}</td>
                                        <td>{{ $user->full_name ?? '---' }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>
                                            @if ($user->status == 'Approved')
                                                <span class="badge bg-primary">Approved</span>
                                            @elseif ($user->status == 'Rejected')
                                                <span class="badge bg-danger">Rejected</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->getActiveSubscription())
                                                <span class="badge bg-primary">Active</span>
                                            @else
                                                <span class="badge bg-warning">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <a class="dropdown-item"
                                                        href="{{ route('backend.user.show', $user->id) }}">View</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('backend.user.profile', $user->id) }}">View Full
                                                        Profile</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('backend.user.form-one-edit', $user->id) }}">Edit</a>
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ route('backend.user.delete', $user->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this Follow-Up?')">Delete</a> --}}
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">No Records Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class=" table-responsive">
                        <div class=" col-lg-12 ">
                            <div class="col-md-12 text-center align-self-center">
                                <ul class="d-flex  text-center justify-content-center mt-md-2 mt-4">
                                    {{ $users->appends(Request::all())->links('pagination::bootstrap-4') }}
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

        </div>
    </div>
@endsection
@section('js')

@endsection
