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
                <p class="section-pretitle">Search what you want!</p>
                <!-- /SECTION PRETITLE -->

                <!-- SECTION TITLE -->
                <h2 class="section-title">Market Categories</h2>
                <!-- /SECTION TITLE -->
            </div>
            <!-- /SECTION HEADER INFO -->
        </div>
        <!-- /SECTION HEADER -->



        <!-- SECTION HEADER -->
        <div class="section-header">
            <!-- SECTION HEADER INFO -->
            <div class="section-header-info">
                <!-- SECTION PRETITLE -->
                <p class="section-pretitle">See what's new!</p>
                <!-- /SECTION PRETITLE -->

                <!-- SECTION TITLE -->
                <h2 class="section-title">Latest Items</h2>
                <!-- /SECTION TITLE -->
            </div>
            <!-- /SECTION HEADER INFO -->

            <!-- SECTION HEADER ACTIONS -->
            {{--<div class="section-header-actions">--}}
                {{--<!-- SECTION HEADER ACTION -->--}}
                {{--<a class="section-header-action" href="marketplace-category.html">Browse All Latest</a>--}}
                {{--<!-- /SECTION HEADER ACTION -->--}}
            {{--</div>--}}
            <!-- /SECTION HEADER ACTIONS -->
        </div>
        <!-- /SECTION HEADER -->

        <!-- GRID -->
        <div class="grid grid-3-3-3-3 centered">
            @foreach($products as $product)
                <!-- PRODUCT PREVIEW -->
                <div class="product-preview">
                    <!-- PRODUCT PREVIEW IMAGE -->
                    <a href="{{ url('/marketplace/product/'.$product->id) }}">
                        <figure class="product-preview-image liquid">
                            <img src="{{ asset('front/image/product/thumb/'.$product->thumbnail) }}" alt="item-01">
                        </figure>
                    </a>
                    <!-- /PRODUCT PREVIEW IMAGE -->

                    <!-- PRODUCT PREVIEW INFO -->
                    <div class="product-preview-info">
                        <!-- TEXT STICKER -->
                        <p class="text-sticker">{{ $product->require_token }} <span class="highlighted">Tk</span></p>
                        <!-- /TEXT STICKER -->

                        <!-- PRODUCT PREVIEW TITLE -->
                        <p class="product-preview-title"><a href="{{ url('/marketplace/product/'.$product->id) }}">{{ $product->title }}</a></p>
                        <!-- /PRODUCT PREVIEW TITLE -->

                        <!-- PRODUCT PREVIEW TEXT -->
                        <p class="product-preview-text">
                            {{ (strlen($product->description) > 30?substr($product->description, 0, 30).'...': $product->description) }}
                        </p>
                        <!-- /PRODUCT PREVIEW TEXT -->
                    </div>
                    <!-- /PRODUCT PREVIEW INFO -->

                    <!-- PRODUCT PREVIEW META -->
                    <div class="product-preview-meta">
                        <!-- PRODUCT PREVIEW AUTHOR -->
                        <div class="product-preview-author">
                            <!-- PRODUCT PREVIEW AUTHOR IMAGE -->
                            <a class="product-preview-author-image user-avatar micro no-border" href="{{($product->user->id ==Auth::user()->id) ?  route('user.profile.timeline') :  route('friend.profile.timeline',$product->user->username)}}">
                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-18-20" data-src="front/image/user/avatar/{{ $product->user->avatar }}"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->
                            </a>
                            <!-- /PRODUCT PREVIEW AUTHOR IMAGE -->

                            <!-- PRODUCT PREVIEW AUTHOR TITLE -->
                            <p class="product-preview-author-title">Posted By</p>
                            <!-- /PRODUCT PREVIEW AUTHOR TITLE -->

                            <!-- PRODUCT PREVIEW AUTHOR TEXT -->
                            <p class="product-preview-author-text">
                                <a href="{{($product->user->id ==Auth::user()->id) ?  route('user.profile.timeline') :  route('friend.profile.timeline',$product->user->username)}}">
                                    {{ ($product->user->name?$product->user->name:$product->user->username) }}
                                </a>
                            </p>
                            <!-- /PRODUCT PREVIEW AUTHOR TEXT -->
                        </div>
                        <!-- /PRODUCT PREVIEW AUTHOR -->

                    </div>
                    <!-- /PRODUCT PREVIEW META -->
                </div>
                <!-- /PRODUCT PREVIEW -->
            @endforeach
        </div>
        <!-- /GRID -->
    </div>
    <!-- /CONTENT GRID -->
@endsection