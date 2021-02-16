<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Quest;
use App\Models\UserQuest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuestController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $logged_user = Auth::user();

        $quests = DB::table('quests')->where('status', 1)->get();
        $social_links = DB::table('user_metas')->where('user_id', $logged_user->id)
            ->where('meta_type', 'social_link')
            ->get();
        //adding quest credit to user account
       //$posts = Post::where('user_id', $logged_user->id)->get();
        $check = UserQuest::where('user_id', $logged_user->id)->get();
        $quests = Quest::where('status', 1)->get();

        //this logic should be on post controller
        $chkQuestArr = [];
        foreach ($check as $qst){
            $chkQuestArr[] = $qst->quest_id;
        }

        foreach ($quests as $quest){
            if ($quest->type == 1){
                if (count($social_links) >= $quest->qty){
                    if (count($check) > 0){
                        foreach ($check as $chk){
                            if (!in_array($quest->id, $chkQuestArr)){
                                $userQuest = new UserQuest();
                                $userQuest = [
                                    'user_id' => $logged_user->id,
                                    'quest_id' => $quest->id
                                ];
                                $result = UserQuest::insert($userQuest);

                                if($result){
                                    $logged_user->credit = $logged_user->credit + $quest->credit;
                                    $logged_user->save();
                                }

                            }
                        }
                    }else{
                        $userQuest = new UserQuest();

                        $userQuest = [
                            'user_id' => $logged_user->id,
                            'quest_id' => $quest->id
                        ];
                        $result = UserQuest::insert($userQuest);

                        if($result){
                            $logged_user->credit = $logged_user->credit + $quest->credit;
                            $logged_user->save();
                        }

                    }
                }
            }
        }

        return view('pages.quest.quest', ['quests' => $quests, 'social_links' => $social_links]);
    }




    //quest filter show
    public function questFilterShow(Request $request){
        $logged_user = Auth::user();
        $social_links = DB::table('user_metas')->where('user_id', $logged_user->id)
                                                    ->where('meta_type', 'social_link')
                                                    ->get();

        if ($request->filter_type == 0){

            $quests = DB::table('quests')->get();

        }elseif ($request->filter_type == 1){

            $quests = $logged_user->quests;

        }

        $data = [
            'quests' => $quests,
            'social_links' => $social_links
        ];

        return json_encode($data);

    }

    //quest filter order
    public function questFilterOrder(Request $request){
        $logged_user = Auth::user();
        $social_links = DB::table('user_metas')->where('user_id', $logged_user->id)
                                                    ->where('meta_type', 'social_link')
                                                    ->get();

        if ($request->filter_type == 0){

            $quests = DB::table('quests')->orderBy('id', 'DESC')->get();

        }elseif ($request->filter_type == 1){

            $quests = DB::table('quests')->orderBy('id', 'ASC')->get();

        }
        $data = [
            'quests' => $quests,
            'social_links' => $social_links
        ];

        return json_encode($data);

    }
}
