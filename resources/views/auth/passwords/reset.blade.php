
@extends('auth.app')
@section('log_title','Login & Register Form')
@section('login_main')
 
 <div class="landing-form">
   <!-- FORM BOX -->
   <div class="form-box login-register-form-element">

     <!-- FORM BOX DECORATION -->
     <img class="form-box-decoration overflowing" src="{{asset('front/img/landing/rocket.png')}}" alt="rocket">
     <!-- /FORM BOX DECORATION -->

     <!-- FORM BOX TITLE -->
     <h2 class="form-box-title">Provide New Password</h2>
     <!-- /FORM BOX TITLE -->
       @include('partial.front.error_login')
     <!-- FORM -->
     <form class="form" action="{{ route('password.update') }}" method="POST">
       @csrf
        <input type="hidden" name="token" value="{{ $token }}">
       <div class="form-row">
         <!-- FORM ITEM -->
         <div class="form-item">
           <div class="form-input">
                 <label for="login-username">Email</label>
                  <input  type="text" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
            </div>
         </div>

       </div>
       <div class="form-row">
           <div class="form-item">
             <div class="form-input">
                   <label for="login-username">New Password</label>
                   <input type="password" class="form-control" name="password" required="">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
           </div>
       </div>

       <div class="form-row">
           <div class="form-item">
             <div class="form-input">
                   <label for="login-username">Confirm Password</label>
                   <input type="password" class="form-control" name="password_confirmation" required="">
                    
              </div>
           </div>
       </div>


       <div class="form-row">
           
           <div class="form-item">
             <a class="form-link" href="{{ route('login') }}">Sing In?</a>
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

