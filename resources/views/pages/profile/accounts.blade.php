@extends('layouts.app')
@section('title',((Auth::user()->name !=null)? Auth::user()->name : Auth::user()->username))
@section('main_content')
	<div class="content-grid">
	  <!-- SECTION BANNER -->
	  <div class="section-banner">
	    <!-- SECTION BANNER ICON -->
	    <img class="section-banner-icon" src="{{asset('front/img/banner/accounthub-icon.png')}}" alt="accounthub-icon">
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
	    <div class="account-hub-sidebar">
	      <!-- SIDEBAR BOX -->
	      <div class="sidebar-box no-padding">

	       @include('layouts.inc.profile-sidebar')
	      </div>
	      <!-- /SIDEBAR BOX -->
	    </div>
		    <div class="account-hub-content">
        <!-- SECTION HEADER -->
        <div class="section-header">
          <!-- SECTION HEADER INFO -->
          <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">My Store</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">Account Overview</h2>
            <!-- /SECTION TITLE -->
          </div>
          <!-- /SECTION HEADER INFO -->
        </div>
        <!-- /SECTION HEADER -->

        <!-- GRID COLUMN -->
        <div class="grid-column">
          <!-- EARNING STAT BOX -->
          <div class="earning-stat-box full">
            <!-- EARNING STAT BOX INFO -->
            <div class="earning-stat-box-info">
              <!-- EARNING STAT BOX ICON WRAP -->
              <div class="earning-stat-box-icon-wrap stat-balance">
                <!-- EARNING STAT BOX ICON -->
                <svg class="earning-stat-box-icon icon-wallet">
                  <use xlink:href="#svg-wallet"></use>
                </svg>
                <!-- /EARNING STAT BOX ICON -->
              </div>
              <!-- /EARNING STAT BOX ICON WRAP -->
        
              <!-- EARNING STAT BOX TITLE -->
              <p class="earning-stat-box-title">{{number_format(Auth::user()->balance)}} <span class="currency">U$D</span></p>

              <p class="earning-stat-box-text">Account Balance</p>
             {{--   <button class="button white small-space withdraw-balance">Withdraw</button> --}}
              <!-- /EARNING STAT BOX TEXT -->
            </div>
            <!-- /EARNING STAT BOX INFO -->

            <!-- USER STATS -->
            <div class="user-stats">
              <!-- USER STAT -->
              <div class="user-stat big">
                <!-- USER STAT TITLE -->
                <p class="user-stat-title">{{Auth::user()->products->count()}}</p>
                <!-- /USER STAT TITLE -->
        
                <!-- USER STAT TEXT -->
                <p class="user-stat-text">items</p>
                <!-- /USER STAT TEXT -->
              </div>
            </div>
            <!-- /USER STATS -->
          </div>
          <!-- /EARNING STAT BOX -->

          <!-- GRID -->
          <div class="grid grid-3-3-3 centered">
            <!-- EARNING STAT BOX -->
            <div class="earning-stat-box">
              <!-- EARNING STAT BOX INFO -->
              <div class="earning-stat-box-info">
                <!-- EARNING STAT BOX ICON WRAP -->
                <div class="earning-stat-box-icon-wrap stat-item">
                  <!-- EARNING STAT BOX ICON -->
                  <svg class="earning-stat-box-icon icon-item">
                    <use xlink:href="#svg-item"></use>
                  </svg>
                  <!-- /EARNING STAT BOX ICON -->
                </div>
                <!-- /EARNING STAT BOX ICON WRAP -->
          
                <!-- EARNING STAT BOX TITLE -->
                <p class="earning-stat-box-title">
                  {!! App\helpers\Help::totalProSell() !!}
                </p>
                <!-- /EARNING STAT BOX TITLE -->
          
                <!-- EARNING STAT BOX TEXT -->
                <p class="earning-stat-box-text">Total Items Sell</p>
                <!-- /EARNING STAT BOX TEXT -->
              </div>
              <!-- /EARNING STAT BOX INFO -->
            </div>
            <!-- /EARNING STAT BOX -->
          
            <!-- EARNING STAT BOX -->
            <div class="earning-stat-box">
              <!-- EARNING STAT BOX INFO -->
              <div class="earning-stat-box-info">
                <!-- EARNING STAT BOX ICON WRAP -->
                <div class="earning-stat-box-icon-wrap stat-earning">
                  <!-- EARNING STAT BOX ICON -->
                  <svg class="earning-stat-box-icon icon-earnings">
                    <use xlink:href="#svg-earnings"></use>
                  </svg>
                  <!-- /EARNING STAT BOX ICON -->
                </div>
                <!-- /EARNING STAT BOX ICON WRAP -->
          
                <!-- EARNING STAT BOX TITLE -->
                <p class="earning-stat-box-title">1.925 <span class="currency">U$D</span></p>
                <!-- /EARNING STAT BOX TITLE -->
          
                <!-- EARNING STAT BOX TEXT -->
                <p class="earning-stat-box-text">Total Earnings</p>
                <!-- /EARNING STAT BOX TEXT -->
              </div>
              <!-- /EARNING STAT BOX INFO -->
            </div>
            <!-- /EARNING STAT BOX -->
        

            <div class="earning-stat-box" >
              <!-- EARNING STAT BOX INFO -->
              <div class="earning-stat-box-info">
                <!-- EARNING STAT BOX ICON WRAP -->
                <div class="earning-stat-box-icon-wrap stat-revenue">
                  <!-- EARNING STAT BOX ICON -->
                  <svg class="earning-stat-box-icon icon-item">
                    <use xlink:href="#svg-item"></use>
                  </svg>
                  <!-- /EARNING STAT BOX ICON -->
                </div>
                <p class="earning-stat-box-title">{{Auth::user()->credit}}</p>
                <p class="earning-stat-box-text">Total Credits</p>
                 <!-- <button class="button white small-space convert-credit-to-doller" style="width: 150px">Convert To Doller</button> -->
                <!-- /EARNING STAT BOX TEXT -->
              </div>
              <!-- /EARNING STAT BOX INFO -->
            </div>
            <!-- /EARNING STAT BOX -->
          </div>
          <!-- /GRID -->
        </div>
        <!-- /GRID COLUMN -->
      </div>
	  </div>
	  <!-- /GRID -->
	</div>
@endsection

@section('all_modal')
  @include('layouts.inc.modals.balance_credit')
@endsection
