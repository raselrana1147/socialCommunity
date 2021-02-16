<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
   

    use AuthenticatesUsers;

    public function __construct()
    {
         $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
      return view('admin.auth.login');
    }


    public function login(Request $request)
    {
          $this->validate($request,
              [
                  'email' => 'required|string|email',
                  'password' => 'required|string'
              ]
          );
          if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
               $notification=array(
               'messege'=>'Your Session is started !',
               'alert-type'=>'success'
                );
              return redirect()->intended(route('admin.dashboard'))->with($notification);
          }else{
             $notification=array(
             'messege'=>'Invalid credentials !',
             'alert-type'=>'error'
              );
            return Redirect()->back()->with($notification);
          }   
    }

   

   public function logout(Request $request)
   {
       $this->guard()->logout();
       $request->session()->invalidate();
       session()->flash('success-message','successfully loged out...');
       return redirect()->route('admin.login');
   }

   protected function guard()
   {
       return Auth::guard('admin');
   }
}
