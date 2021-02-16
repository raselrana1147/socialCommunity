<?php

namespace App\Http\Controllers\admin\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Notifications\VerifyMail;
use Illuminate\Support\Str;
use App\Models\Notification;

class RegisterController extends Controller
{
   

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function checkusername(Request $request){

            $user=User::where('username', $request->username)->count();

            if ($user<1) {
                 $message=['status'=>'success','msg'=>'Username available ✓'];
            }else{
                 $message=['status'=>'error','msg'=>'Username already exists ✗'];
            }
            

        return json_encode($message);
    }

    public function register(Request $request){


        $this->validate($request,[
            
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'username' => ['required', 'unique:users'],
            'password' => ['required', 'string', 'min:4','confirmed'],
        ]);

        $user=User::create([
            'parent_id'      =>$request->parent_id,
            'email'          => $request->email,
            'username'       => $request->username,
            'password'       => Hash::make($request->password),
            'remember_token' => strtolower(Str::random(60)),
            'salt'           => base64_encode($request->password),
        ]);

        $parent=User::where('id',$request->parent_id)->first();

        if ($request->filled('parent_id')) {
            Notification::create([
                'title'=>'Has been sign up with your referal name',
                'type'=>1,
                'notification_to'=>$parent->id,
                'notification_from'=>$user->id,
            ]);
        }

        $user->notify(new VerifyMail($user));
        session()->flash('send_message','Please Check your email account to verify email');
        $notification=array(
          'messege'=>'Account created successfully.',
          'alert-type'=>'success'
         );

        return redirect(route('login'))->with($notification);
    }


    public function verifyEmail($token){
        $user=User::where('remember_token',$token)->first();
        if (!is_null($user)) {
           $user->email_active=1;
                  $user->remember_token=Null;
                  $user->save();
                  session()->flash('verify_success_message','Email is now verified.Please sing in');
                  return redirect(route('login'));
        }else{
           session()->flash('verify_success_message','Email is now verified.Please sing in');
           return redirect(route('login'));
        }
       
    }
}
