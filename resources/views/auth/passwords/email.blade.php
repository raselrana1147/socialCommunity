@extends('auth.app')
@section('log_title','Send Reset Link')
@section('login_main')
 
 <div class="landing-form">
   <!-- FORM BOX -->
   <div class="form-box login-register-form-element">

     <!-- FORM BOX DECORATION -->
     <img class="form-box-decoration overflowing" src="{{asset('front/img/landing/rocket.png')}}" alt="rocket">
     <!-- /FORM BOX DECORATION -->

     <!-- FORM BOX TITLE -->
     <h2 class="form-box-title">Reset Your Passsword</h2>
     <!-- /FORM BOX TITLE -->
       @include('partial.front.error_login')
     <!-- FORM -->
     <form class="form" action="{{ route('password.email') }}" method="POST">
       @csrf
       <!-- FORM ROW -->
       <div class="form-row">
         <!-- FORM ITEM -->
         <div class="form-item">
           <!-- FORM INPUT -->
           <div class="form-input">
                 <label for="login-username">Email</label>
                 <input type="text" name="email" required="">
            </div>
           <!-- /FORM INPUT -->
         </div>

       </div>
       <div class="form-row">
         <div class="form-item">
           <!-- FORM LINK -->
           <a class="form-link" href="{{ route('login') }}">Sing In?</a>
           <!-- /FORM LINK -->
         </div>
       </div>
    
       <div class="form-row">
         <!-- FORM ITEM -->
         <div class="form-item">
           <!-- BUTTON -->
           <button class="button medium secondary">Send A Reset Link!</button>
           <!-- /BUTTON -->
         </div>
         <!-- /FORM ITEM -->
       </div>
       <!-- /FORM ROW -->
     </form>

    
   </div>
 </div>
@endsection