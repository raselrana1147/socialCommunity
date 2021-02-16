<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class NotificationController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function allNottification(){
    	$notifications=Notification::where('notification_to',Auth::user()->id)->orderBy('id','DESC')->paginate(5);
    	return view('pages.notification.notification',compact('notifications'));
    }

    public function read(Request $request){
    	
    	$notifiation=Notification::where('notification_to',$request->user_id)->update(['status'=>2]);
    }




}
