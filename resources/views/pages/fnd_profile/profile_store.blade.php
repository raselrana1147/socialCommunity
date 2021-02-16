@extends('layouts.app')
@section('title',($fnd_user->name ==null) ? $fnd_user->username : $fnd_user->name )
@section('main_content')





    <div class="content-grid">
        <!-- PROFILE HEADER -->
    @include('pages.fnd_profile.inc.fnd_profile_header')
    <!-- /PROFILE HEADER -->

        <!-- SECTION NAVIGATION -->
    @include('pages.fnd_profile.inc.fnd_profile_nav')
    <!-- /SECTION NAVIGATION -->

        <!-- CONTENT GRID -->
        <div class="content-grid">
            <!-- GRID -->
            <div class="grid grid-3-3-3 centered-on-mobile">
                <!-- /CREATE ENTITY BOX -->
            @foreach($products as $product)
                <!-- PRODUCT PREVIEW -->
                    <div class="product-preview fixed-height">
                        <!-- PRODUCT PREVIEW IMAGE -->
                        <a href="{{ url('/marketplace/product/'.$product->id) }}">
                            <figure class="product-preview-image liquid">
                                <img src="{{ asset('front/image/product/'.$product->thumbnail) }}" alt="item-01">
                            </figure>
                        </a>
                        <!-- /PRODUCT PREVIEW IMAGE -->

                        <!-- PRODUCT PREVIEW INFO -->
                        <div class="product-preview-info">
                            <!-- TEXT STICKER -->
                            <p class="text-sticker"><span class="highlighted">$</span> {{ $product->regular_price }}</p>
                            <!-- /TEXT STICKER -->

                            <!-- PRODUCT PREVIEW TITLE -->
                            <p class="product-preview-title"><a href="{{ url('/marketplace/product/'.$product->id) }}">{{ $product->title }}</a></p>
                            <!-- /PRODUCT PREVIEW TITLE -->

                            <!-- PRODUCT PREVIEW CATEGORY -->
                            <p class="product-preview-category digital">{{ $product->category->title }}</p>
                            <!-- /PRODUCT PREVIEW CATEGORY -->
                            <p class="product-preview-category digital {{ ($product->status == 1? 'text-warning':($product->status == 2?'text-success':'text-danger')) }}">
                                {{ ($product->status == 1? 'In Review':($product->status == 2?'Approved':'Rejected')) }}
                            </p>

                            <!-- BUTTON -->
                            <a class="button blue full popup-edit-item-trigger edit-item" href="{{ route('marketplace.product.show', $product->id) }}">
                                View Details
                            </a>
                            <!-- /BUTTON -->
                        </div>
                        <!-- /PRODUCT PREVIEW INFO -->
                    </div>
                    <!-- /PRODUCT PREVIEW -->
                @endforeach
            </div>
            <!-- /GRID -->
        </div>
        <!-- /CONTENT GRID -->
    </div>

@endsection