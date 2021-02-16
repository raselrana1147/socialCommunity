@extends('layouts.app')
@section('title','Order Details')
@section('main_content')
    <!-- CONTENT GRID -->
    <div class="content-grid">
        <!-- SECTION BANNER -->
        <div class="section-banner">
            <!-- SECTION BANNER ICON -->
            <img class="section-banner-icon" src="{{ asset('front/img/banner/accounthub-icon.png') }}" alt="accounthub-icon">
            <!-- /SECTION BANNER ICON -->

            <!-- SECTION BANNER TITLE -->
            <p class="section-banner-title">Account Hub</p>
            <!-- /SECTION BANNER TITLE -->

            <!-- SECTION BANNER TEXT -->
            <p class="section-banner-text">Profile info, messages, settings and much more!</p>
            <!-- /SECTION BANNER TEXT -->
        </div>
        <!-- /SECTION BANNER -->

        <!-- GRID -->
        <div class="grid grid-3-9 medium-space">
            <!-- GRID COLUMN -->
        @include('layouts.inc.profile-sidebar')
        <!-- /GRID COLUMN -->

            <!-- GRID COLUMN -->
            <div class="account-hub-content">
                <!-- SECTION HEADER -->
                <div class="section-header">
                    <!-- SECTION HEADER INFO -->
                    <div class="section-header-info">
                        <!-- SECTION PRETITLE -->
                        <p class="section-pretitle">My Profile</p>
                        <!-- /SECTION PRETITLE -->

                        <!-- SECTION TITLE -->
                        <h2 class="section-title">Order - {{ $order->order_id }}</h2>
                        <!-- /SECTION TITLE -->
                    </div>
                    <!-- /SECTION HEADER INFO -->
                </div>
                <!-- /SECTION HEADER -->
                <div class="row">
                    <div class="col-md-6">
                        <h6>Order Details</h6>
                        <hr>
                        <!-- INFORMATION LINE LIST -->
                        <div class="information-line-list">
                            <!-- INFORMATION LINE -->
                            <div class="information-line">
                                <!-- INFORMATION LINE TITLE -->
                                <p class="information-line-title">Order ID</p>
                                <!-- /INFORMATION LINE TITLE -->

                                <!-- INFORMATION LINE TEXT -->
                                <p class="information-line-text"><span class="bold">{{ $order->order_id }}</span></p>
                                <!-- /INFORMATION LINE TEXT -->
                            </div>
                            <!-- /INFORMATION LINE -->
                            <!-- INFORMATION LINE -->
                            <div class="information-line">
                                <!-- INFORMATION LINE TITLE -->
                                <p class="information-line-title">Total Token</p>
                                <!-- /INFORMATION LINE TITLE -->

                                <!-- INFORMATION LINE TEXT -->
                                <p class="information-line-text"><span class="bold"> {{ $order->total_price }} </span></p>
                                <!-- /INFORMATION LINE TEXT -->
                            </div>
                            <!-- /INFORMATION LINE -->
                            <!-- INFORMATION LINE -->
                            <div class="information-line">
                                <!-- INFORMATION LINE TITLE -->
                                <p class="information-line-title">Order Status</p>
                                <!-- /INFORMATION LINE TITLE -->

                                <!-- INFORMATION LINE TEXT -->
                                <p class="information-line-text"><span class="bold">{{ ($order->status == 1?'Pending':($order->status == 2?'Approved':'Cancelled')) }}</span></p>
                                <!-- /INFORMATION LINE TEXT -->
                            </div>
                            <!-- /INFORMATION LINE -->
                            <!-- INFORMATION LINE -->
                            <div class="information-line">
                                <!-- INFORMATION LINE TITLE -->
                                <p class="information-line-title">Order Date</p>
                                <!-- /INFORMATION LINE TITLE -->

                                <!-- INFORMATION LINE TEXT -->
                                <p class="information-line-text"><span class="bold">{{ date('d, F, Y', strtotime($order->created_at)) }}</span></p>
                                <!-- /INFORMATION LINE TEXT -->
                            </div>
                            <!-- /INFORMATION LINE -->
                            <!-- INFORMATION LINE -->
                            <div class="information-line">
                                <!-- INFORMATION LINE TITLE -->
                                <p class="information-line-title">Payment Status</p>
                                <!-- /INFORMATION LINE TITLE -->

                                <!-- INFORMATION LINE TEXT -->
                                <p class="information-line-text"><span class="bold">{{ ($order->transaction_id == !null?'Paid':'Not Paid') }}</span></p>
                                <!-- /INFORMATION LINE TEXT -->
                            </div>
                            <!-- /INFORMATION LINE -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>User Details</h6>
                        <hr>
                        <div class="information-line-list">
                            <!-- INFORMATION LINE -->
                            <div class="information-line">
                                <!-- INFORMATION LINE TITLE -->
                                <p class="information-line-title">Name</p>
                                <!-- /INFORMATION LINE TITLE -->

                                <!-- INFORMATION LINE TEXT -->
                                <p class="information-line-text"><span class="bold">{{ Auth::user()->name }}</span></p>
                                <!-- /INFORMATION LINE TEXT -->
                            </div>
                            <!-- /INFORMATION LINE -->
                            <!-- INFORMATION LINE -->
                            <div class="information-line">
                                <!-- INFORMATION LINE TITLE -->
                                <p class="information-line-title">Email</p>
                                <!-- /INFORMATION LINE TITLE -->

                                <!-- INFORMATION LINE TEXT -->
                                <p class="information-line-text"><span class="bold">{{ Auth::user()->email }}</span></p>
                                <!-- /INFORMATION LINE TEXT -->
                            </div>
                            <!-- /INFORMATION LINE -->
                            <!-- INFORMATION LINE -->
                            <div class="information-line">
                                <!-- INFORMATION LINE TITLE -->
                                <p class="information-line-title">Phone</p>
                                <!-- /INFORMATION LINE TITLE -->

                                <!-- INFORMATION LINE TEXT -->
                                <p class="information-line-text"><span class="bold">{{ Auth::user()->phone }}</span></p>
                                <!-- /INFORMATION LINE TEXT -->
                            </div>
                            <!-- /INFORMATION LINE -->
                        </div>
                    </div>
                </div>
                <!-- TABLE WRAP -->
                <div class="table-wrap" data-simplebar>
                    <!-- TABLE -->
                    <div class="table table-downloads split-rows">
                        <!-- TABLE HEADER -->
                        <div class="table-header">
                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded">
                                <!-- TABLE HEADER TITLE -->
                                <p class="table-header-title">Image</p>
                                <!-- /TABLE HEADER TITLE -->
                            </div>
                            <!-- /TABLE HEADER COLUMN -->

                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded text-center">
                                <!-- TABLE HEADER TITLE -->
                                <p class="table-header-title">Title</p>
                                <!-- /TABLE HEADER TITLE -->
                            </div>
                            <!-- /TABLE HEADER COLUMN -->

                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded text-center">
                                <!-- TABLE HEADER TITLE -->
                                <p class="table-header-title">Product Type</p>
                                <!-- /TABLE HEADER TITLE -->
                            </div>

                        </div>
                        <!-- /TABLE HEADER -->

                        <!-- TABLE BODY -->
                        <div class="table-body same-color-rows">
                            @foreach($products as $prod)
                        <!-- TABLE ROW -->
                            <div class="table-row medium">
                                <!-- TABLE COLUMN -->
                                <div class="table-column">
                                    <!-- PRODUCT PREVIEW -->
                                    <div class="product-preview tiny">
                                        <!-- PRODUCT PREVIEW IMAGE -->
                                            <figure class="product-preview-image liquid">
                                                <img src="{{ asset('front/image/product/thumb/'.$prod->thumbnail) }}" alt="item-01">
                                            </figure>
                                        <!-- /PRODUCT PREVIEW IMAGE -->
                                    </div>
                                    <!-- /PRODUCT PREVIEW -->
                                </div>
                                <!-- /TABLE COLUMN -->

                                <!-- TABLE COLUMN -->
                                <div class="table-column padded text-center">
                                    <!-- TABLE TITLE -->
                                    <p class="table-title">{{ $prod->title }}</p>
                                    <!-- /TABLE TITLE -->
                                </div>

                                <div class="table-column padded text-center">
                                    <!-- TABLE TITLE -->
                                    <p class="table-title">{{ (($prod->product_type==1) ? "Single Photo" : "4 Set Photo") }}</p>
                                    <!-- /TABLE TITLE -->
                                </div>
                              
                            </div>
                            <!-- /TABLE ROW -->
                            @endforeach
                        </div>
                        <!-- /TABLE BODY -->
                    </div>
                    <!-- /TABLE -->
                </div>
                <!-- TABLE WRAP -->
            </div>
            <!-- /GRID COLUMN -->
        </div>
        <!-- /GRID -->
    </div>
    <!-- /CONTENT GRID -->
@endsection