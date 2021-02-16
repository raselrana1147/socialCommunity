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
            <p class="section-pretitle">Account</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">Change Password</h2>
            <!-- /SECTION TITLE -->
          </div>
          <!-- /SECTION HEADER INFO -->
        </div>
        <!-- /SECTION HEADER -->

        <!-- GRID COLUMN -->
        <div class="grid-column">
          <!-- WIDGET BOX -->
          <div class="widget-box">
            <!-- WIDGET BOX CONTENT -->
            <div class="widget-box-content">
              <!-- FORM -->
              <form class="form" action="{{ route('user.password.change') }}" method="post" id="changaePassword">
              	@csrf
                <!-- FORM ROW -->
                <div class="form-row">
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input small">
                      <label for="account-current-password">Confirm your Current Password</label>
                      <input type="password"  name="current_password" required="" oninvalid="this.setCustomValidity('Provide ccurrent password')" oninput="setCustomValidity('')">
                    </div>
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->
                </div>
                <!-- /FORM ROW -->

                <!-- FORM ROW -->
                <div class="form-row split">
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input small">
                      <label for="account-new-password">Your New Password</label>
                      <input type="password" name="new_password" required="" oninvalid="this.setCustomValidity('Provide new password')" oninput="setCustomValidity('')">
                    </div>
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->

                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input small">
                      <label for="account-new-password-confirm">Confirm New Password</label>
                      <input type="password" id="" name="password_confirmation" required="" oninvalid="this.setCustomValidity('Confirm password')" oninput="setCustomValidity('')">
                    </div>
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->
                </div>
                <div class="form-row split">
                  <div class="form-item">
                    <!-- BUTTON -->
                    <input type="submit" name="password_change" value="Change Password Now!" class="button full primary">
                 
                  </div>
                  <!-- /FORM ITEM -->
                </div>
                <!-- /FORM ROW -->
              </form>
              <!-- /FORM -->
            </div>
            <!-- WIDGET BOX CONTENT -->
          </div>
          <!-- /WIDGET BOX -->
        </div>
        <!-- /GRID COLUMN -->
      </div>
	  </div>
	  <!-- /GRID -->
	</div>
@endsection