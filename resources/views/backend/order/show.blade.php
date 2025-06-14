@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-1">
                            <legend class="h4">
                                Order Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Order Details</a></li>
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
                                                    class="label-title">User</label><br>
                                                <p class="label-title">{{ $order->user->full_name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Order
                                                    Id</label><br>
                                                <p class="label-title">{{ $order->api_order_id }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Total
                                                    Amount</label><br>
                                                <p class="label-title">{{ $order->total_amount }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Discount
                                                    Amount</label><br>
                                                <p class="label-title">{{ $order->discount_amount }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Taxable
                                                    Amount</label><br>
                                                <p class="label-title">{{ $order->taxable_amount ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">CGST
                                                    Percent</label><br>
                                                <p class="label-title">{{ $order->cgst_percent }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">CGST</label><br>
                                                <p class="label-title">{{ $order->cgst }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">SGST
                                                    Percent</label><br>
                                                <p class="label-title">{{ $order->sgst_percent }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">SGST</label><br>
                                                <p class="label-title">{{ $order->sgst }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Date</label><br>
                                                <p class="label-title">{{ dd_format($order->created_at, 'd-m-Y h:i a') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Status</label><br>
                                                <p class="label-title">
                                                    @if ($order->status == 'initial')
                                                        <label class="badge badge-primary"
                                                            style="color:white">{{ $order->status }}</label>
                                                    @elseif ($order->status == 'failed')
                                                        <label class="badge badge-danger"
                                                            style="color:white">{{ $order->status }}</label>
                                                    @else
                                                        <label class="badge badge-success"
                                                            style="color:white">{{ $order->status }}</label>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Mode</label><br>
                                                <p class="label-title">
                                                    @if ($order->mode == 'offline')
                                                        <label class="badge badge-primary"
                                                            style="color:white">{{ $order->mode }}</label>
                                                    @else
                                                        <label class="badge badge-success"
                                                            style="color:white">{{ $order->mode }}</label>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($transaction)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a class="btn btn-primary" href="{{ route('backend.transaction.show', $transaction->id) }}">View
                                                    Transaction</a>
                                            </div>
                                        </div>
                                    @endif
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
    <link type=" text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css" />
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js') }}">
    </script>
    <script src="{{ asset('js/lg-zoom.min.js') }}"></script>
    {{-- <link rel="stylesheet" type=" text/css" href="{{ asset('css/lightgallery.css') }}">
        <script src="{{ asset('js/lightgallery.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $("#lightgallery2").lightGallery({
                download: false,
                escKey: true,
                fullScreen: true,
            });
        });
    </script>
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
