@extends('auth.app')
@section('log_title','Login & Register Form')
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
    <div class="tab-switch">
      <!-- TAB SWITCH BUTTON -->
      <p class="tab-switch-button login-register-form-trigger">Login</p>
      <!-- /TAB SWITCH BUTTON -->

      <!-- TAB SWITCH BUTTON -->
      <p class="tab-switch-button login-register-form-trigger">Register</p>
      <!-- /TAB SWITCH BUTTON -->
    </div>
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
        @include('partial.front.error_login')
      <!-- FORM -->
      <form class="form" action="{{ route('login.action') }}" method="POST">
        @csrf
        <!-- FORM ROW -->
        <div class="form-row">
          <!-- FORM ITEM -->
          <div class="form-item">
            <!-- FORM INPUT -->
            <div class="form-input">
              <label for="login-username">Username or Email</label>
              <input type="text" name="username" value="{{old('username')}}">
              @error('username')
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
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
              <input type="password" name="password">
              @error('password')
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
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
            <a class="form-link" href="{{ route('password.request') }}">Forgot Password?</a>
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
      <div class="social-links">
        <!-- SOCIAL LINK -->
        <a class="social-link facebook" href="#">
          <!-- ICON FACEBOOK -->
          <svg class="icon-facebook">
            <use xlink:href="#svg-facebook"></use>
          </svg>
          <!-- /ICON FACEBOOK -->
        </a>
        <!-- /SOCIAL LINK -->
  
        <!-- SOCIAL LINK -->
        <a class="social-link twitter" href="#">
          <!-- ICON TWITTER -->
          <svg class="icon-twitter">
            <use xlink:href="#svg-twitter"></use>
          </svg>
          <!-- /ICON TWITTER -->
        </a>
        <!-- /SOCIAL LINK -->
  
        <!-- SOCIAL LINK -->
        <a class="social-link twitch" href="#">
          <!-- ICON TWITCH -->
          <svg class="icon-twitch">
            <use xlink:href="#svg-twitch"></use>
          </svg>
          <!-- /ICON TWITCH -->
        </a>
        <!-- /SOCIAL LINK -->
  
        <!-- SOCIAL LINK -->
        <a class="social-link youtube" href="#">
          <!-- ICON YOUTUBE -->
          <svg class="icon-youtube">
            <use xlink:href="#svg-youtube"></use>
          </svg>
          <!-- /ICON YOUTUBE -->
        </a>
        <!-- /SOCIAL LINK -->
      </div>
      <!-- /SOCIAL LINKS -->
    </div>
    <!-- /FORM BOX -->
  
    <!-- FORM BOX -->
    <div class="form-box login-register-form-element">
      <!-- FORM BOX DECORATION -->
      <img class="form-box-decoration" src="{{asset('front/img/landing/rocket.png')}}" alt="rocket">
      <!-- /FORM BOX DECORATION -->

      <!-- FORM BOX TITLE -->
      <h2 class="form-box-title">Create your Account!</h2>

      <!-- /FORM BOX TITLE -->
      @include('partial.front.reg_error')
      <!-- FORM -->

      <form class="form" action="{{ route('create.register') }}" method="POST">
        @csrf
        <!-- FORM ROW -->
        @if ($parent_id !=null)
          <input type="hidden" name="parent_id" value="{{$parent_id}}">
         @endif
        <div class="form-row">
          <!-- FORM ITEM -->
          <div class="form-item">
            <!-- FORM INPUT -->
            <div class="form-input">
              <label for="register-email">Your Email</label>
              <input type="text" id="" name="email" value="{{old('email')}}">
              @error('email')
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
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
              <label for="register-username">Username</label>
              <input type="text" id="regusername" name="username" data-url="{{ route('check.username') }}" value="{{old('username')}}">
              @error('username')
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <p class="userstatus"></p>
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
              <label for="register-password">Password</label>
              <input type="password" id="password" name="password">
              @error('password')
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
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
              <label for="register-password-repeat">Repeat Password</label>
              <input type="password"  name="password_confirmation">
              @error('password_confirmation')
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
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
            <!-- CHECKBOX WRAP -->
            <div class="checkbox-wrap">
              <input type="checkbox" id="register-newsletter" name="register_newsletter" checked>
              <!-- CHECKBOX BOX -->
              <div class="checkbox-box">
                <!-- ICON CROSS -->
                <svg class="icon-cross">
                  <use xlink:href="#svg-cross"></use>
                </svg>
                <!-- /ICON CROSS -->
              </div>
              <!-- /CHECKBOX BOX -->
              <label for="register-newsletter">Send me news and updates via email</label>
            </div>
            <!-- /CHECKBOX WRAP -->
          </div>
          <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
  
        <!-- FORM ROW -->
        <div class="form-row">
          <!-- FORM ITEM -->
          <div class="form-item">
            <!-- BUTTON -->
            <button class="button medium primary">Register Now!</button>
            <!-- /BUTTON -->
          </div>
          <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
      </form>
      <!-- /FORM -->
  
      <!-- FORM TEXT -->
      <p class="form-text">You'll receive a confirmation email in your inbox with a link to activate your account. If you have any problems, <a href="#">contact us</a>!</p>
      <!-- /FORM TEXT -->
    </div>
    <!-- /FORM BOX -->
  </div>
@endsection