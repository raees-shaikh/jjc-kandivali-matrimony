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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Name</label><br>
                                                <p class="label-title">{{ $user->full_name ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Email</label><br>
                                                <p class="label-title">{{ $user->email ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Profile
                                                    No.</label><br>
                                                <p class="label-title">{{ $user->profile_no ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Date Of
                                                    Birth - Time</label><br>
                                                <p class="label-title">{{ dd_format($user->date_of_birth, 'd-m-Y h:i a') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Gender
                                                </label><br>
                                                <p class="label-title">{{ ucFirst($user->gender ?? '---') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Phone
                                                    No</label><br>
                                                <p class="label-title">{{ $user->mobile ?? '---' }}</p>
                                            </div>
                                        </div>

                                        @if ($user->filled_by)
                                            <div class="col-xl-4 col-md-3 col-6 mt-md-0 mt-3">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Filled
                                                        By
                                                    </label><br>
                                                    <p class="label-title">Admin</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-xl-4 col-md-3 col-6 mt-md-0 mt-3">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Filled
                                                        By
                                                    </label><br>
                                                    <p class="label-title">User</p>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="cust-title">Profile</label><br>
                                                <a class="btn btn-primary"
                                                    href="{{ route('backend.user.profile', $user->id) }}">
                                                    View Profile
                                                </a>
                                            </div>
                                        </div>

                                        @if ($user->profile_image || $user->images()->count())
                                            <div class="col-xl-4 col-md-3 col-6 mt-md-0 mt-3">
                                                <div class="form-group">
                                                    <label class="cust-title" class="label-title">Images </label>
                                                    <br>
                                                    <div class="" id="lightgallery">
                                                        <a class="btn btn-primary"
                                                            href="{{ $user->profile_image ? asset('storage/images/profile/' . $user->profile_image) : url('/frontend/image/profile_static.svg') }}">
                                                            View Images
                                                        </a>
                                                        @foreach ($user->images()->get() as $image)
                                                            <a href="{{ asset('storage/images/' . $image->filename) }}">
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-xl-4 col-md-3 col-6 mt-md-0 mt-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">PDF
                                                </label><br>
                                                <a href="{{ route('backend.user.print', $user->id) }}"
                                                    class="btn btn-primary mt-1" target="_blank"><img
                                                        src="{{ url('frontend/image/white-printer.png') }}" alt=""
                                                        width="20px"></a>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Subscription</label><br>
                                                @if ($user->getActiveSubscription())
                                                    <span class="badge bg-primary">Active</span><br>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </div>
                                        </div>

                                        @if (!$user->getActiveSubscription())
                                            <div class="col-xl-4 col-md-3 col-6 mt-md-0 mt-3">
                                                <form action="{{ route('backend.user.subscription.create', $user->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure, you want to create subscription?')">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="" class="cust-title">Subscription</label><br>
                                                        <button type="submit"
                                                            class="btn btn-primary mt-1">Create</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Start
                                                        Date</label><br>
                                                    <p class="label-title">
                                                        {{ dd_format($user->getActiveSubscription()->start_date, 'd-m-Y h:i a') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">End
                                                        Date</label><br>
                                                    <p class="label-title">
                                                        {{ dd_format($user->getActiveSubscription()->end_date, 'd-m-Y h:i a') }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif




                                    </div>
                                    <div class="row">

                                        <div class="col-xl-4 col-md-6">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Status</label><br>
                                                <form id="mt-3"
                                                    action="{{ route('backend.user.status', $user->id) }}" method="post"
                                                    class="section work-experience" enctype="multipart/form-data"
                                                    onsubmit="return confirm('Are you sure, you want to update status?')">
                                                    @csrf
                                                    <div class="col-md-12 mb-2 px-0 d-flex align-items-center">
                                                        <select name="status" class="form-control" required>
                                                            <option value="">Select Any</option>
                                                            <option value="Approved"
                                                                @if ($user->status == 'Approved') {{ 'selected' }} @endif>
                                                                Approved</option>
                                                            <option value="Rejected"
                                                                @if ($user->status == 'Rejected') {{ 'selected' }} @endif>
                                                                Rejected</option>
                                                        </select>
                                                        @if ($errors->has('status'))
                                                            <div class="text-danger" role="alert">
                                                                {{ $errors->first('status') }}
                                                            </div>
                                                        @endif
                                                        <div class=" ml-2">
                                                            <input type="submit" value="Submit" class="btn btn-primary">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
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
            <div class="widget-content widget-content-area simple-tab">
                <ul class="nav nav-tabs " id="simpletab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="shortlist-tab" data-toggle="tab" href="#shortlist"
                            role="tab" aria-controls="shortlist" aria-selected="true">Shortlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab"
                            aria-controls="orders" aria-selected="false">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="subscription-tab" data-toggle="tab" href="#subscription" role="tab"
                            aria-controls="subscription" aria-selected="false">Past Subscriptions</a>
                    </li>
                </ul>
                <div class="tab-content" id="simpletabContent">
                    <div class="tab-pane fade p-0 active show" id="shortlist" role="tabpanel"
                        aria-labelledby="shortlist-tab">
                        <div class="table-responsive shortlist-table min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($shortlists as $shortlist)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $shortlists) }}</td>
                                            <td>{{ $shortlist->shortlistedUser->full_name }}</td>
                                            <td>{{ $shortlist->shortlistedUser->mobile }}</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink1" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="19" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="5" cy="12" r="1">
                                                            </circle>
                                                        </svg>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.user.show', $shortlist->shortlisted_id) }}">View</a>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="4">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($shortlists)
                                <div class="pagination col-lg-12 mt-4">
                                    <div class="col-md-12 text-center align-self-center">
                                        <ul class="pagination text-center">
                                            {{ $shortlists->withQueryString()->links('pagination::bootstrap-4') }}
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade p-0" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="table-responsive orders-table min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Total Amount</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $orders) }}</td>
                                            <td>{{ $order->total_amount }}</td>
                                            <td>{{ dd_format($order->created_at, 'd-m-Y h:i a') }}</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink1" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="19" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="5" cy="12" r="1">
                                                            </circle>
                                                        </svg>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.order.show', $order->id) }}">View</a>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="4">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($orders)
                                <div class="pagination col-lg-12 mt-4">
                                    <div class="col-md-12 text-center align-self-center">
                                        <ul class="pagination text-center">
                                            {{ $orders->withQueryString()->links('pagination::bootstrap-4') }}
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade p-0" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                        <div class="table-responsive wishlist-table min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($wishlists as $wishlist)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $wishlists) }}</td>
                                            <td>
                                                <a href="{{ route('backend.product.show', $wishlist->product_id) }}">
                                                    {{ $wishlist->product->name }}
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="4">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($wishlists)
                                <div class="pagination col-lg-12 mt-4">
                                    <div class="col-md-12 text-center align-self-center">
                                        <ul class="pagination text-center">
                                            {{ $wishlists->withQueryString()->links('pagination::bootstrap-4') }}
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div> --}}
                    <div class="tab-pane fade p-0" id="subscription" role="tabpanel" aria-labelledby="subscription-tab">
                        <div class="table-responsive subscription-table min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        {{-- <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($subscriptions as $subscription)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $subscriptions) }}</td>
                                            <td>{{ dd_format($subscription->start_date, 'd-m-Y h:i a') }}</td>
                                            <td>{{ dd_format($subscription->end_date, 'd-m-Y h:i a') }}</td>
                                            {{-- <td class="text-center">
                                                    <div class="dropdown custom-dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            id="dropdownMenuLink1" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                class="feather feather-more-horizontal">
                                                                <circle cx="12" cy="12" r="1">
                                                                </circle>
                                                                <circle cx="19" cy="12" r="1">
                                                                </circle>
                                                                <circle cx="5" cy="12" r="1">
                                                                </circle>
                                                            </svg>
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                            <a class="dropdown-item"
                                                                href="{{ route('backend.subscripton.show', $subscripton->id) }}">View</a>
                                                        </div>
                                                    </div>

                                                </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="3">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($subscriptions)
                                <div class="pagination col-lg-12 mt-4">
                                    <div class="col-md-12 text-center align-self-center">
                                        <ul class="pagination text-center">
                                            {{ $subscriptions->withQueryString()->links('pagination::bootstrap-4') }}
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('cdn')
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
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
    <link rel="stylesheet" href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css">
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
