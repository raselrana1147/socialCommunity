
@extends('layouts.app')
@section('title','Sells History')
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
                        <h2 class="section-title">My Sell's History</h2>
                        <!-- /SECTION TITLE -->
                    </div>
                    <!-- /SECTION HEADER INFO -->
                </div>
                <!-- /SECTION HEADER -->

                <!-- TABLE WRAP -->
                <div class="table-wrap" data-simplebar>
                        
                    <div class="table table-downloads split-rows">
                            
                        <div class="table-header">
                            
                            <div class="table-header-column padded">
                                    
                                <p class="table-header-title">Thumbnail</p>
                                
                            </div>
                            <div class="table-header-column padded text-center">
                                
                                <p class="table-header-title">Title</p>
                        
                            </div>

                            <div class="table-header-column padded text-center">
                                
                                <p class="table-header-title">Token</p>
                   
                            </div>

                            <div class="table-header-column padded">
                                <p class="table-header-title">Image Type</p>
                            </div>

                            <div class="table-header-column padded">
                                 <p class="table-header-title">Order ID</p>
                            </div>

                        </div>

                        <div class="table-body same-color-rows">
                            @foreach($orders as $order)
                                @php
                                    $products=json_decode($order->product_data,true);
                                @endphp
                                @foreach ($products as $product)
                                 @php
                                     $owner=App\Models\Product::find($product['product_id'])->user_id;
                                     $pro_info=App\Models\Product::find($product['product_id']);  
                                 @endphp
                                 @if ($owner==Auth::user()->id)
                                <div class="table-row medium">
                                    <div class="table-column padded">
                                        <p class="table-title"><a href="{{ route('marketplace.product.show',$pro_info->id) }}"><img class="thumb-style" src="{{ asset('front/image/product/thumb/'.$pro_info->thumbnail) }}"></a></p>
                                    </div>
                                    <div class="table-column padded text-center">
                                        <p class="table-title">{{$pro_info->title}}</p>
                                    </div>
                                    <div class="table-column padded text-center">
                                        <p class="table-title">{{ $pro_info->require_token }}</p>
                                    </div>
                                    
                                    <div class="table-column padded text-center">
                                        <p class="price-title">{{$pro_info->image_type}}</p>  
                                    </div>
                                    <div class="table-column padded-left"> 
                                         <p class="price-title">{{$order->order_id}}</p>
                                    </div>
                                </div>
                                  @endif
                                @endforeach
                            @endforeach
                        </div>
                      
                        <!-- /TABLE BODY -->
                    </div>
                    <!-- /TABLE -->
                </div>
                 <div class="own-pagination">
                   {{$orders->links()}}
                </div>
                <!-- TABLE WRAP -->
            </div>
            <!-- /GRID COLUMN -->
        </div>
        <!-- /GRID -->
    </div>
    <!-- /CONTENT GRID -->
@endsection