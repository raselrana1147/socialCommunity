<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Notifications\VerifyMail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm($parent_id=null)
    {
        if ($parent_id !=null) {
                 $parent_id=User::where('affiliate_id',$parent_id)->first();
                 return view('auth.login',['parent_id'=>$parent_id->id]);
        }else{

             return view('auth.login',['parent_id'=>$parent_id]);
        }
      
    }


    public function login(Request $request){
        $this->validate($request,[
            'username' => ['required'],
            'password' => ['required'],
        ],[
            'username.required'=>'Email or password is required'
        ]
    );
      $user=User::where('email',$request->username)->orWhere('username',$request->username)->first();
      if (!is_null($user)) {
         if ($user->email_active==1) {
            if ($user->status==2) {
                $field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
               if (Auth::guard('web')->attempt([$field=>$request->username,'password'=>$request->password],$request->remember)) {
                   return redirect()->intended(route('home'));
               }else{
                    $notification=array(
                    'messege'=>'Invalid credential.',
                    'alert-type'=>'error'
                     );
                   return Redirect()->back()->with($notification);
               }
            }elseif ($user->status==1) {
                 session()->flash('verify_error_message','Your account is Pending.');
                   return redirect(route('login'));
            }elseif ($user->status==3) {
               session()->flash('verify_error_message','Your account is Inactive.');
               return redirect(route('login'));
            }elseif ($user->status==4) {
                session()->flash('verify_error_message','Your account is locked.');
                return redirect(route('login'));
            }else{
                session()->flash('verify_error_message','Your account is suspended.');
                return redirect(route('login'));
            }
            
         }else{
            $user->remember_token=strtolower(str_random(60));
            $user->save();
            $user->notify(new VerifyMail($user));
             session()->flash('verify_error_message','Email did not verified.Please verify email');
               return redirect(route('login'));
         }
      }else{
             $notification=array(
             'messege'=>'No account found.Please sign up.',
             'alert-type'=>'error'
              );
            return Redirect()->back()->with($notification);
      }

          
    }

   

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }
        $notification=array(
         'messege'=>'Successfully Logout.',
         'alert-type'=>'success'
         );
       
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect(route('login'))->with($notification);
    }
}
