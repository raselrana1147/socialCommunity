
@extends('layouts.app')
@section('main_content')
    <!-- CONTENT GRID -->
    <div class="content-grid">
        <!-- SECTION BANNER -->
        <div class="section-banner">
            <!-- SECTION BANNER ICON -->
            <img class="section-banner-icon" src="{{ asset('front/img/banner/marketplace-icon.png') }}" alt="marketplace-icon">
            <!-- /SECTION BANNER ICON -->

            <!-- SECTION BANNER TITLE -->
            <p class="section-banner-title">Marketplace</p>
            <!-- /SECTION BANNER TITLE -->

            <!-- SECTION BANNER TEXT -->
            <p class="section-banner-text">The best place for the community to buy and sell!</p>
            <!-- /SECTION BANNER TEXT -->
        </div>
        <!-- /SECTION BANNER -->

        <!-- SECTION HEADER -->
        <div class="section-header">
            <!-- SECTION HEADER INFO -->
            <div class="section-header-info">
                <!-- SECTION PRETITLE -->
                <p class="section-pretitle">Browse Your</p>
                <!-- /SECTION PRETITLE -->

                <!-- SECTION TITLE -->
                <h2 class="section-title">Shopping Cart <span class="highlighted">{{ count($products) }}</span></h2>
                <!-- /SECTION TITLE -->
            </div>
            <!-- /SECTION HEADER INFO -->
        </div>
        <!-- /SECTION HEADER -->

        <!-- GRID -->
        <div class="grid grid-9-3 small-space">
            <!-- GRID COLUMN -->
            <div class="grid-column">
                <!-- TABLE WRAP -->
                <div class="table-wrap" data-simplebar>
                    <!-- TABLE -->
                    <div class="table table-cart split-rows">
                        <!-- TABLE HEADER -->
                        <div class="table-header">
                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column">
                                <!-- TABLE HEADER TITLE -->
                                <p class="table-header-title">Item</p>
                                <!-- /TABLE HEADER TITLE -->
                            </div>
                            <!-- /TABLE HEADER COLUMN -->

                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded-left">
                                <!-- TABLE HEADER TITLE -->
                                <p class="table-header-title">Type</p>
                                <!-- /TABLE HEADER TITLE -->
                            </div>

                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded-left">
                                <!-- TABLE HEADER TITLE -->
                                <p class="table-header-title">Token</p>
                                <!-- /TABLE HEADER TITLE -->
                            </div>
                            <!-- /TABLE HEADER COLUMN -->

                            <!-- TABLE HEADER COLUMN -->
                            {{--<div class="table-header-column centered padded-left">--}}
                                {{--<!-- TABLE HEADER TITLE -->--}}
                                {{--<p class="table-header-title">Price</p>--}}
                                {{--<!-- /TABLE HEADER TITLE -->--}}
                            {{--</div>--}}
                            <!-- /TABLE HEADER COLUMN -->

                            <!-- TABLE HEADER COLUMN -->
                            <div class="table-header-column padded-big-left"></div>
                            <!-- /TABLE HEADER COLUMN -->
                        </div>
                        <!-- /TABLE HEADER -->

                        <!-- TABLE BODY -->
                        <div class="table-body same-color-rows">
                            @php($total = 0)
                            @foreach($products as $product)
                                @php($total+= $product->require_token)
                                <!-- TABLE ROW -->
                                <div class="table-row medium">
                                    <!-- TABLE COLUMN -->
                                    <div class="table-column">
                                        <!-- PRODUCT PREVIEW -->
                                        <div class="product-preview tiny">
                                            <!-- PRODUCT PREVIEW IMAGE -->
                                            <a href="marketplace-product.html">
                                                <figure class="product-preview-image liquid">
                                                    <img src="{{ asset('front/image/product/thumb/'.$product->thumbnail) }}" alt="item-01">
                                                </figure>
                                            </a>
                                            <!-- /PRODUCT PREVIEW IMAGE -->

                                            <!-- PRODUCT PREVIEW INFO -->
                                            <div class="product-preview-info">
                                                <!-- PRODUCT PREVIEW TITLE -->
                                                <p class="product-preview-title"><a href="marketplace-product.html">{{ $product->title }}</a></p>
                                                <!-- /PRODUCT PREVIEW TITLE -->
                                            </div>
                                            <!-- /PRODUCT PREVIEW INFO -->
                                        </div>
                                        <!-- /PRODUCT PREVIEW -->
                                    </div>
                                    <!-- /TABLE COLUMN -->

                                    <!-- TABLE COLUMN -->
                                    <div class="table-column padded-left">
                                        <!-- FORM SELECT -->
                                        <p class="price-title">{{ ($product->image_type == 1?'Single Photo':'4 Set Photo') }}</p>
                                        <!-- /FORM SELECT -->
                                    </div>
                                    <!-- /TABLE COLUMN -->

                                    <!-- TABLE COLUMN -->
                                    <div class="table-column padded-left">
                                        <!-- FORM SELECT -->
                                        <p class="price-title">{{ $product->require_token }}</p>
                                        <!-- /FORM SELECT -->
                                    </div>
                                    <!-- /TABLE COLUMN -->

                                    <!-- TABLE COLUMN -->
                                    {{--<div class="table-column centered padded-left">--}}
                                        {{--<!-- PRICE TITLE -->--}}
                                        {{--<p class="price-title"><span class="currency">$</span> {{ $product->price }}</p>--}}
                                        {{--<!-- /PRICE TITLE -->--}}
                                    {{--</div>--}}
                                    <!-- /TABLE COLUMN -->

                                    <!-- TABLE COLUMN -->
                                    <div class="table-column padded-big-left">
                                        <!-- TABLE ACTION -->
                                        <form class="table-action" action="{{ route('product.main.cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="cart_id" value="{{ $product->cart_id }}">
                                            <button>
                                                <!-- ICON DELETE -->
                                                <svg class="icon-delete">
                                                    <use xlink:href="#svg-delete"></use>
                                                </svg>
                                                <!-- /ICON DELETE -->
                                            </button>
                                        </form>
                                        <!-- /TABLE ACTION -->
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
                <!-- /TABLE WRAP -->
            </div>
            <!-- /GRID COLUMN -->

            <!-- GRID COLUMN -->
            <div class="grid-column">
                <!-- SIDEBAR BOX -->
                <div class="sidebar-box margin-top">
                    <!-- SIDEBAR BOX TITLE -->
                    <p class="sidebar-box-title">Order Totals</p>
                    <!-- /SIDEBAR BOX TITLE -->

                    <!-- SIDEBAR BOX ITEMS -->
                    <div class="sidebar-box-items">
                        <!-- PRICE TITLE -->
                        <p class="price-title big">{{ $total }} <span class="currency">Tk</span></p>
                        <!-- /PRICE TITLE -->

                        <!-- TOTALS LINE LIST -->
                        <div class="totals-line-list">
                            <!-- TOTALS LINE -->
                            <div class="totals-line">
                                <!-- TOTALS LINE TITLE -->
                                <p class="totals-line-title">Cart ({{ count($products) }})</p>
                                <!-- /TOTALS LINE TITLE -->

                                <!-- PRICE TITLE -->
                                <p class="price-title">{{ $total }} <span class="currency">Tk</span></p>
                                <!-- /PRICE TITLE -->
                            </div>
                            <!-- /TOTALS LINE -->

                            <!-- TOTALS LINE -->
                            <div class="totals-line">
                                <!-- TOTALS LINE TITLE -->
                                <p class="totals-line-title">Total</p>
                                <!-- /TOTALS LINE TITLE -->

                                <!-- PRICE TITLE -->
                                <p class="price-title">{{ $total }} <span class="currency">Tk</span></p>
                                <!-- /PRICE TITLE -->
                            </div>
                            <!-- /TOTALS LINE -->
                        </div>
                        <hr>
                        @if(count($products) > 0)
                            <!-- /TOTALS LINE LIST -->
                            <p class="sidebar-box-title">Payment Method</p>
                            <div class="sidebar-box-items">
                                <!-- CHECKBOX WRAP -->
                                <div class="checkbox-wrap">
                                    <input type="radio" id="payment-paypal" name="payment_type" value="payment-paypal" checked>
                                    <!-- CHECKBOX BOX -->
                                    <div class="checkbox-box round"></div>
                                    <!-- /CHECKBOX BOX -->
                                    <label class="accordion-trigger-linked" for="payment-paypal">Paypal</label>

                                    <!-- CHECKBOX INFO -->
                                    <div class="checkbox-info accordion-content-linked accordion-open">
                                        <!-- CHECKBOX INFO TEXT -->
                                        <p class="checkbox-info-text">Pay with your Paypal balance or connected bank account! It's quick and really secure.</p>
                                        <!-- /CHECKBOX INFO TEXT -->
                                    </div>
                                    <!-- /CHECKBOX INFO -->
                                </div>
                                <!-- /CHECKBOX WRAP -->
                            </div>


                            <!-- BUTTON -->
                            <button class="button primary" id="complete-order" data-action="{{ route('marketplace.product.order') }}">
                                Complete Order!
                            </button>
                            <!-- /BUTTON -->
                        @endif
                    </div>
                    <!-- /SIDEBAR BOX ITEMS -->
                </div>
                <!-- /SIDEBAR BOX -->
            </div>
            <!-- /GRID COLUMN -->
        </div>
        <!-- /GRID -->
    </div>
    <!-- /CONTENT GRID -->
@endsection