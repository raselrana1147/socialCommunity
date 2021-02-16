@extends('auth.app')
@section('log_title','Verify Email')
@section('login_main')
  <div class="landing-info">
    <!-- LOGO -->
    <div class="logo">
      <!-- ICON LOGO VIKINGER -->
      <svg class="icon-logo-vikinger">
        <use xlink:href="#svg-logo-vikinger"></use>
      </svg>
      <!-- /ICON LOGO VIKINGER -->
    </div>
    <!-- /LOGO -->

    <!-- LANDING INFO PRETITLE -->
    <h2 class="landing-info-pretitle">Welcome to</h2>
    <!-- /LANDING INFO PRETITLE -->

    <!-- LANDING INFO TITLE -->
    <h1 class="landing-info-title">Vikinger</h1>
    <!-- /LANDING INFO TITLE -->

    <!-- LANDING INFO TEXT -->
    <p class="landing-info-text">The next generation social network &amp; community! Connect with your friends and play with our quests and badges gamification system!</p>
    <!-- /LANDING INFO TEXT -->

    <!-- TAB SWITCH -->
   
    <!-- /TAB SWITCH -->
  </div>
  <!-- /LANDING INFO -->

  <!-- LANDING FORM -->
  <div class="landing-form">
    <!-- FORM BOX -->
    <div class="form-box login-register-form-element">
      <!-- FORM BOX DECORATION -->
      <img class="form-box-decoration overflowing" src="{{asset('front/img/landing/rocket.png')}}" alt="rocket">
      <!-- /FORM BOX DECORATION -->

      <!-- FORM BOX TITLE -->
      <h2 class="form-box-title">Account Login</h2>
      <!-- /FORM BOX TITLE -->
  
      <!-- FORM -->
      <form class="form">
        <!-- FORM ROW -->
        <div class="form-row">
          <!-- FORM ITEM -->
          <div class="form-item">
            <!-- FORM INPUT -->
            <div class="form-input">
              <label for="login-username">Username or Email</label>
              <input type="text" id="login-username" name="login_username">
            </div>
            <!-- /FORM INPUT -->
          </div>
          <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
  
        <!-- FORM ROW -->
        <div class="form-row">
          <!-- FORM ITEM -->
          <div class="form-item">
            <!-- FORM INPUT -->
            <div class="form-input">
              <label for="login-password">Password</label>
              <input type="password" id="login-password" name="login_password">
            </div>
            <!-- /FORM INPUT -->
          </div>
          <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
  
        <!-- FORM ROW -->
        <div class="form-row space-between">
          <!-- FORM ITEM -->
          <div class="form-item">
            <!-- CHECKBOX WRAP -->
            <div class="checkbox-wrap">
              <input type="checkbox" id="login-remember" name="login_remember" checked>
              <!-- CHECKBOX BOX -->
              <div class="checkbox-box">
                <!-- ICON CROSS -->
                <svg class="icon-cross">
                  <use xlink:href="#svg-cross"></use>
                </svg>
                <!-- /ICON CROSS -->
              </div>
              <!-- /CHECKBOX BOX -->
              <label for="login-remember">Remember Me</label>
            </div>
            <!-- /CHECKBOX WRAP -->
          </div>
          <!-- /FORM ITEM -->
  
          <!-- FORM ITEM -->
          <div class="form-item">
            <!-- FORM LINK -->
            <a class="form-link" href="#">Forgot Password?</a>
            <!-- /FORM LINK -->
          </div>
          <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
  
        <!-- FORM ROW -->
        <div class="form-row">
          <!-- FORM ITEM -->
          <div class="form-item">
            <!-- BUTTON -->
            <button class="button medium secondary">Login to your Account!</button>
            <!-- /BUTTON -->
          </div>
          <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
      </form>
      <!-- /FORM -->
  
      <!-- LINED TEXT -->
      <p class="lined-text">Login with your Social Account</p>
      <!-- /LINED TEXT -->
  
      <!-- SOCIAL LINKS -->
     
      <!-- /SOCIAL LINKS -->
    </div>
    <!-- /FORM BOX -->
  
    <!-- FORM BOX -->
    <div class="form-box login-register-form-element">
      <!-- FORM BOX DECORATION -->
      <img class="form-box-decoration" src="{{asset('img/landing/rocket.png')}}" alt="rocket">
      <!-- /FORM BOX DECORATION -->

      <!-- FORM BOX TITLE -->
      <h2 class="form-box-title">Create your Account!</h2>
      <!-- /FORM BOX TITLE -->
  
      <!-- FORM -->
    
      <!-- /FORM -->
  
      <!-- FORM TEXT -->
      <p class="form-text">You'll receive a confirmation email in your inbox with a link to activate your account. If you have any problems, <a href="#">contact us</a>!</p>
      <!-- /FORM TEXT -->
    </div>
    <!-- /FORM BOX -->
  </div>
@endsection