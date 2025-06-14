@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row layout-top-spacing m-0 pa-padding-remove">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <legend class="h4">
                                Orders
                            </legend>
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 px-4 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Orders</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 mt-2">
                            <form class="form-inline row app_form" action="{{ route('backend.order.index') }}"
                                method="GET">
                                <select class="form-control form-control-sm app_form_select cust-size-input" id="exampleFormControlSelect1"
                                    name="status">
                                    <option {{ request('status') && request('status') == 'all' ? 'selected' : '' }}>All
                                    </option>
                                    <option value="initial"
                                        {{ request('status') && request('status') == 'initial' ? 'selected' : '' }}>
                                        Initial</option>
                                    <option value="failed"
                                        {{ request('status') && request('status') == 'failed' ? 'selected' : '' }}>
                                        Failed</option>
                                    <option value="completed"
                                        {{ request('status') && request('status') == 'completed' ? 'selected' : '' }}>
                                        Completed</option>
                                </select>
                                {{-- <input id="rangeCalendarFlatpickr" name="date_range" value="{{request('date_range')}}" class="form-control flatpickr flatpickr-input active w-50"
                                        type="text" placeholder="Select Date.." readonly="readonly"> --}}
                                <input type="submit" value="Search"
                                    class="btn btn-success ml-0 ml-lg-4 ml-md-4 ml-sm-4 mt-lg-0 mt-sm-3  search_btn  search_btn_size ">
                            </form>
                            @if ($errors->has('q'))
                                <div class="text-danger" role="alert">{{ $errors->first('q') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12 mb-2">
                        </div>
                        {{--
                        <div class="align-items-center col-xl-5 col-lg-4 col-md-12 col-sm-12 d-flex justify-content-end row mb-2">
                            <a href="{{ route('backend.showcase.create') }}" name="txt"
                                class="btn btn-primary mt-2 ml-3 ">
                                Add Showcase
                            </a>
                        </div> --}}

                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow temp-index">
                <div class="">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>User</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                    {{-- @dd($order->user->name) --}}
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $orders) }}</td>
                                            <td><a class="blue-col-a"
                                                    href="{{ route('backend.user.show', $order->user_id) }}"
                                                    target="target_blank">{{ $order->user->full_name }}</a></td>
                                            <td>{{ $order->total_amount }}</td>
                                            <td>
                                                @if ($order->status == 'initial')
                                                    <label class="badge badge-primary">{{ $order->status }}</label>
                                                @elseif ($order->status == 'failed')
                                                    <label class="badge badge-danger">{{ $order->status }}</label>
                                                @else
                                                    <label class="badge badge-success">{{ $order->status }}</label>
                                                @endif
                                            </td>
                                            <td>{{ dd_format($order->created_at, 'd-m-Y h:i a') }}</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
                                                        </svg>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.order.show', $order->id) }}">View</a>
                                                        {{-- <a class="dropdown-item"
                                                            href="{{ route('backend.showcase.edit', $showcase->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                            href="{{ route('backend.showcase.destroy', $showcase->id) }}">Delete</a> --}}
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="6">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class=" table-responsive">
                        <div class=" col-lg-12">
                            <div class="col-md-12 text-center align-self-center">
                                <ul class="d-flex text-center justify-content-center mt-md-2 mt-4">
                                    {{ $orders->appends(Request::all())->links('pagination::bootstrap-4') }}
                                </ul>
                            </div>
                        </div></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
