<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Friend;
use App\Models\Notification;


class FriendRequestController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function requestSend($friend_id){
    		$f_request=new Friend();
    		$f_request->request_from=Auth::user()->id;
    		$f_request->request_to=$friend_id;
    		$sent=$f_request->save();
    		if ($sent) {
    			Notification::create([
    				'title'=>'Send a friend request',
    				'type'=>7,
    				'notification_to'=>$friend_id,
                    'notification_from'=>Auth::user()->id,
    			]);
    			$msg=['status'=>'success','message'=>'Freind Request Sent Successfully'];
    		}else{
    			$msg=['status'=>'error','message'=>'Something went wrong'];
    		}
    		
    		return json_encode($msg);
    }

    public function requestCancel($request_id){
    		
    		$delete=Friend::findOrFail($request_id)->delete();
    		if ($delete) {
    			$msg=['status'=>'success','message'=>'Request Canceled'];
    		}else{
    			$msg=['status'=>'error','message'=>'Something went wrong'];
    		}
    		return json_encode($msg);
    }

    public function requestAccept($request_id){
        $fnd_request=Friend::findOrFail($request_id);
        $fnd_request->status=2;
        $accept=$fnd_request->save();
        if ($accept) {
            Notification::create([
                'title'=>'Accept your friend request',
                'type'=>8,
                'notification_to'=>$fnd_request->request_from,
                'notification_from'=>Auth::user()->id,
            ]);
            $msg=['status'=>'success','message'=>'Request accepted'];
        }else{
            $msg=['status'=>'error','message'=>'Something went wrong'];
        }
        return json_encode($msg);
    }


    public function unfriend($fnd_ship_id){
       
        $delete=Friend::findOrFail($fnd_ship_id)->delete();
        if ($delete) {
            $msg=['status'=>'success','message'=>'Successfully unfriend'];
        }else{
            $msg=['status'=>'error','message'=>'Something went wrong'];
        }
        return json_encode($msg);
    }

}
