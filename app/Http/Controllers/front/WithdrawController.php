<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Withdraw;
use Mail;
use App\Mail\WithdrawBalance;

class WithdrawController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function withdraw(Request $request){

         $user=Auth::user();

       if ($user->balance >=$request->balance) {

           $current_balance =$user->balance;
           $current_balance -=$request->balance;
           $user->balance=$current_balance;
           $user->save();
           $info=array(
              'name'=>($user->name !=null) ? $user->name : $user->username,
              'balance'=>$request->balance,
           );

            Mail::send(new WithdrawBalance($user,$info));

         		$withdraw                =new Withdraw();
            	$withdraw->user_id       =$user->id;
            	$withdraw->amount        =$request->balance;
            	$withdraw->payment_method=$user->payment_method;
            	$withdraw->payment_email =$user->payment_email;
            	$withdraw->save();
            

            $notification=array(
            'messege'=>'Successfully balance withdrawed',
            'alert-type'=>'success'
             );
           return redirect(route('user.withdraw.redeen'))->with($notification);
       }else{
           $notification=array(
           'messege'=>'You have no enough balance',
           'alert-type'=>'error'
            );
          return redirect(route('user.withdraw.redeen'))->with($notification);
       }
    }


}
