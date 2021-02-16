<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\Quest;
use App\Models\UserBadge;
use App\Models\UserQuest;
use App\Models\React;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Friend;

class NewsFeedController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }
    
    public function index()
    {

        $logged_user = Auth::user();

        $quests = Quest::where('status', 1)->get();
        $completed_quests = UserQuest::where('user_id', $logged_user->id)->get();

        $badges = Badge::where('status', 1)->get();
        $unlocked_badges = UserBadge::where('user_id', $logged_user->id)->get();
     

        $recent_users=User::orderBy('id','DESC')->take('5')->get();

        $logged_user_reacts = DB::table('reacts')
                                ->join('posts', 'reacts.post_or_comment_id', '=', 'posts.id')
                                ->join('users', 'posts.user_id', '=', 'users.id')
                                ->where('users.id', '=', $logged_user->id)
                                ->get();

    	$posts = Post::orderBy('id','DESC')->limit(10)->get();
      

        $fnd_activity=[];
        foreach ($posts as $f_post) {
            $find_fnd=Friend::whereIn('request_to', [$f_post->user->id, Auth::user()->id])
             ->whereIn('request_from', [$f_post->user->id, Auth::user()->id])
             ->where('status','=','2')
             ->first();
             if (!is_null($find_fnd)) {
                if ($find_fnd->request_from==$f_post->user->id || $find_fnd->request_to==$f_post->user->id){
                   array_push($fnd_activity, $f_post);
                } 
             }
        }

    	$data = [];
    	foreach ($posts as $post){
    	    $data[] = [
    	        'post' => $post,
                'reacts' => React::where('post_or_comment_id', $post->id)->where('type', 1)->get(),
                'user_react' => React::where('post_or_comment_id', $post->id)->where('user_id', $logged_user->id)->where('type', 1)->first()
            ];
        }

    	return view('pages.feed.newsfeed',compact(['data', 'quests', 'completed_quests', 'badges', 'unlocked_badges', 'logged_user_reacts','recent_users','fnd_activity']));
    }
}
