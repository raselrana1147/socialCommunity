<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Badge;
use App\models\UserBadge;
use App\Models\Post;

class BadgeController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $badges = DB::table('badges')->where('status', 1)->get();
        $posts = DB::table('posts')->where('user_id', Auth::id())->get();

        $user_id=Auth::user()->id;
        $posts = Post::where('user_id', $user_id)->get();
        $check = UserBadge::where('user_id', $user_id)->get();
        $badges = Badge::where('status', 1)->get();
        $logged_user = Auth::user();

        $chkBadgeArr = [];
        foreach ($check as $bg){
            $chkBadgeArr[] = $bg->badge_id;
        }

        //this logic should be on post controller
        foreach ($badges as $badge){
            if (count($posts) >= $badge->qty){
                if (count($check) > 0){
                    foreach ($check as $chk){
                        if (!in_array($badge->id, $chkBadgeArr)){
                            $userBadge = new UserBadge();
                            $userBadge = [
                                'user_id' => $user_id,
                                'badge_id' => $badge->id
                            ];
                            $result = UserBadge::insert($userBadge);

                            if($result){
                                $logged_user->credit = $logged_user->credit + $badge->credit;
                                $logged_user->save();
                            }

                        }
                    }
                }else{
                    $userBadge = new UserBadge();

                    $userBadge = [
                        'user_id' => $user_id,
                        'badge_id' => $badge->id
                    ];
                    $result = UserBadge::insert($userBadge);

                    if($result){
                        $logged_user->credit = $logged_user->credit + $badge->credit;
                        $logged_user->save();
                    }

                }
            }
        }

        return view('pages.badge.badge', ['badges' => $badges, 'posts' => $posts]);
    }


}
