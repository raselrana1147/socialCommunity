
@extends('layouts.app')
@section('title','Order History')
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
                        <h2 class="section-title">My Order History</h2>
                        <!-- /SECTION TITLE -->
                    </div>
                    <!-- /SECTION HEADER INFO -->
                </div>
                <!-- /SECTION HEADER -->

                <!-- TABLE WRAP -->
                <div class="table-wrap" data-simplebar>
                    <!-- TABLE -->
                    <div class="table table-downloads split-rows">
                        <!-- TABLE HEADER -->
                        <div class="table-header">
                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded">
                                <!-- TABLE HEADER TITLE -->
                                <p class="table-header-title">Order ID</p>
                                <!-- /TABLE HEADER TITLE -->
                            </div>
                            <!-- /TABLE HEADER COLUMN -->

                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded text-center">
                                <!-- TABLE HEADER TITLE -->
                                <p class="table-header-title">Total Item</p>
                                <!-- /TABLE HEADER TITLE -->
                            </div>
                            <!-- /TABLE HEADER COLUMN -->

                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded text-center">
                                <!-- TABLE HEADER TITLE -->
                                <p class="table-header-title">Total Token</p>
                                <!-- /TABLE HEADER TITLE -->
                            </div>
                            <!-- /TABLE HEADER COLUMN -->

                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded">
                                <!-- TABLE HEADER TITLE -->
                                <p class="table-header-title">Payment Status</p>
                                <!-- /TABLE HEADER TITLE -->
                            </div>
                            <!-- /TABLE HEADER COLUMN -->

                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded">
                                <!-- TABLE HEADER TITLE -->
                                <p class="table-header-title">Order Status</p>
                                <!-- /TABLE HEADER TITLE -->
                            </div>
                            <!-- /TABLE HEADER COLUMN -->

                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded-left"></div>
                            <!-- /TABLE HEADER COLUMN -->
                        </div>
                        <!-- /TABLE HEADER -->

                        <!-- TABLE BODY -->
                        <div class="table-body same-color-rows">
                            @foreach($orders as $order)
                                <!-- TABLE ROW -->
                                <div class="table-row medium">
                                    <!-- TABLE COLUMN -->
                                    <div class="table-column padded">
                                        <p class="table-title">{{ $order->order_id }}</p>
                                    </div>
                                    <!-- /TABLE COLUMN -->

                                    <!-- TABLE COLUMN -->
                                    <div class="table-column padded text-center">
                                        <!-- TABLE TITLE -->
                                        <p class="table-title">{{ count($order->counter) }}</p>
                                        <!-- /TABLE TITLE -->
                                    </div>
                                    <!-- /TABLE COLUMN -->

                                    <!-- TABLE COLUMN -->
                                    <div class="table-column padded text-center">
                                        <!-- TABLE TITLE -->
                                        <p class="table-title">{{ $order->total_price }}</p>
                                        <!-- /TABLE TITLE -->
                                    </div>
                                    <!-- /TABLE COLUMN -->

                                    <!-- TABLE COLUMN -->
                                    <div class="table-column padded text-center">
                                        <!-- PRICE TITLE -->
                                        <p class="price-title">{{ ($order->transaction_id == !null? 'Paid':'Not Paid') }}</p>
                                        <!-- /PRICE TITLE -->
                                    </div>
                                    <!-- /TABLE COLUMN -->

                                    <!-- TABLE COLUMN -->
                                    <div class="table-column padded text-center">
                                        <!-- PRICE TITLE -->
                                        <p class="price-title">{{ ($order->status == 1? 'Pending':($order->status == 2?'Approved':'Cancelled')) }}</p>
                                        <!-- /PRICE TITLE -->
                                    </div>
                                    <!-- /TABLE COLUMN -->

                                    <!-- TABLE COLUMN -->
                                    <div class="table-column padded-left">
                                        <!-- TABLE ACTIONS -->
                                        <div class="table-actions">
                                            <!-- BUTTON -->
                                            {{--<button class="button danger">Cancel Order</button>--}}
                                            <!-- /BUTTON -->

                                            <!-- BUTTON -->
                                            <a class="button secondary" href="{{ url('user/order/view/'.$order->order_id) }}">View</a>
                                            <!-- /BUTTON -->
                                        </div>
                                        <!-- /TABLE ACTIONS -->
                                    </div>
                                    <!-- /TABLE COLUMN -->
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