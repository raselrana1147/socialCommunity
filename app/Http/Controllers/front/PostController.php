<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\React;
use App\models\UserBadge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Auth;
use Image;
use Str;
use Carbon\Carbon;
use App\Models\Notification;
use App\Models\User;


class PostController extends Controller
{

    function __construct(){
    	$this->middleware('auth');
    }


    public function loadData(Request $request){

       $posts=Post::offset($request['start'])
             ->limit($request['limit'])->orderBy('id','DESC')
             ->get();
      $setPost='';
      if (count($posts)>0) {
         foreach ($posts as $post) {
          $reacts = React::where('post_or_comment_id', $post->id)->where('type', 1)->get();
          $user_react = React::where('post_or_comment_id', $post->id)->where('user_id', Auth::user()->id)->where('type', 1)->first();


          $setPost.='
          <div class="widget-box no-padding mb-3">
          <div class="widget-box-settings">
            <div class="post-settings-wrap">
              
              <div class="post-settings widget-box-post-settings-dropdown-trigger mi-post-settings" data-target="#post-'.$post->id.'">
              
                <svg class="post-settings-icon icon-more-dots">
                  <use xlink:href="#svg-more-dots"></use>
                </svg>
               
              </div>
            
              <div class="simple-dropdown widget-box-post-settings-dropdown mi-hide" id="post-'.$post->id.'">
               
                <p class="simple-dropdown-link">Edit Post</p>
               
                <p class="simple-dropdown-link">Delete Post</p>
               
                <p class="simple-dropdown-link">Make it Featured</p>
                
                <p class="simple-dropdown-link">Report Post</p>
               
                <p class="simple-dropdown-link">Report Author</p>
               
              </div>
             
            </div>
          </div>
         
          <div class="widget-box-status">
            <div class="widget-box-status-content">
            
              <div class="user-status">
              
                <a class="user-status-avatar" href="'.(($post->user_id ==Auth::user()->id) ?  route('user.profile.timeline') :  route('friend.profile.timeline',$post->user->username)).'">
                  
                  <div class="user-avatar small no-outline">
                    
                    <div class="user-avatar-content">
                      <img class="hexagon-image-30-32" src="'.(($post->user->avatar ==null) ? asset('front/image/user/profile.jpg') : asset('front/image/user/avatar/'.$post->user->avatar)).'">
                    </div>
                  
                  </div>
                 
                </a>
              
                <p class="user-status-title medium"><a class="bold" href="'.(($post->user_id ==Auth::user()->id) ?  route('user.profile.timeline') :  route('friend.profile.timeline',$post->user->username)).'">'.(($post->user->name !=null) ? $post->user->name :  $post->user->username).'</a> posted</p>
               
                <p class="user-status-text small">'.Carbon::parse($post->created_at)->diffForHumans().'</p>
                
              </div>
             
              <p class="widget-box-status-text">'.$post->post_text.'</p>

              '.(($post->image !=null) ? '<div class="picture-collage">
               
                <div class="picture-collage-row medium">
                
                  <div class="picture-collage-item popup-picture-trigger">
                   
                    <div class="photo-preview">
                     
                      <figure class="photo-preview-image liquid">
                        <img src="'.asset('front/image/post/'.$post->image).'" alt="photo-preview-10">
                      </figure>
                     
                    </div>
                   
                  </div>
                 
                </div>
                
              </div>' : '').'
            
              <div class="content-actions">
              
                <div class="content-action">
                
                  <div class="meta-line">
                  
                    <p class="meta-line-text post-react-count-'.$post->id.'">'.count($reacts).' Reacts</p>
                   
                  </div>
                
                </div>
                
                <div class="content-action">
                 
                  <div class="meta-line">
                   
                    <p class="meta-line-link">'.$post->comment->count().' Comments'.'</p>
                  
                  </div>
                 
                  <div class="meta-line">
                   
                    <p class="meta-line-text">0 Shares</p>
                  
                  </div>
                
                </div>
               
              </div>
            
            </div>
          </div>
         
          <div class="post-options">
            <div class="post-option-wrap">
            
              <div class="post-option reaction-options-dropdown-trigger mi-post-reactions show-user-reaction-'.$post->id.'" data-target="#post-reactions-'.$post->id.'">';

             if(!empty($user_react)) {
                 if ($user_react->user_id == Auth::user()->id) {
                     if ($user_react->react_type == 1) {
                         $setPost .= '<img class="reaction-image" src = "'.asset('front/img/reaction/like.png').'" alt = "reaction-like" >
						&nbsp;<p class="post-option-text react-like-text" > Like</p>';
                     } elseif ($user_react->react_type == 2) {
                         $setPost .= '<img class="reaction-image" src="'.asset('front/img/reaction/love.png').'" alt="reaction-love">
                        &nbsp;<p class="post-option-text react-love-text">Love</p>';
                     } elseif ($user_react->react_type == 3) {
                         $setPost .= '<img class="reaction-image" src = "'.asset('front/img/reaction/dislike.png').'" alt = "reaction-dislike" >
                        &nbsp;<p class="post-option-text react-dislike-text" > Dislike</p >';
                     } elseif ($user_react->react_type == 4) {
                         $setPost .= '<img class="reaction-image" src = "'.asset('front/img/reaction/happy.png').'" alt = "reaction-happy" >
                        &nbsp;<p class="post-option-text react-happy-text" > Happy</p >';
                     } elseif ($user_react->react_type == 5) {
                         $setPost .= '<img class="reaction-image" src = "'.asset('front/img/reaction/funny.png').'" alt = "reaction-funny" >
                                             &nbsp;<p class="post-option-text react-funny-text" > Funny</p >';
                     } elseif ($user_react->react_type == 6) {
                         $setPost .= '<img class="reaction-image" src = "'.asset('front/img/reaction/wow.png').'" alt = "reaction-wow" >
                                             &nbsp;<p class="post-option-text react-wow-text" > Wow</p >';
                     } elseif ($user_react->react_type == 7) {
                         $setPost .= '<img class="reaction-image" src = "'.asset('front/img/reaction/angry.png').'" alt = "reaction-angry" >
                                             &nbsp;<p class="post-option-text react-angry-text" > Angry</p >';
                     } else {
                         $setPost .= '<img class="reaction-image" src = "'.asset('front/img/reaction/sad.png').'" alt = "reaction-sad" >
                                             &nbsp;<p class="post-option-text react-sad-text" > Sad</p >';
                     }
                 } else {
                     $setPost .= '<svg class="post-option-icon icon-thumbs-up" >
									 <use xlink:href = "#svg-thumbs-up" ></use>
								 </svg >
								 <p class="post-option-text" > React!</p >';
                 }
             }else {
                 $setPost.='<svg class="post-option-icon icon-thumbs-up" >
							 <use xlink:href = "#svg-thumbs-up" ></use>
						 </svg >
						 <p class="post-option-text" > React!</p >';
             }
               
$setPost.='</div>
             
              <div class="reaction-options reaction-options-dropdown post-reaction mi-hide" id="post-reactions-'.$post->id.'">
	              
	               <div class="reaction-option text-tooltip-tft post-reaction-type" data-title="Like" react-value="1" post-id="'.$post->id.'">
	                 <img class="reaction-option-image" src="'.asset('front/img/reaction/like.png').'" alt="reaction-like">
	                
	               </div>
	               <div class="reaction-option text-tooltip-tft post-reaction-type" data-title="Love" react-value="2" post-id="'.$post->id.'">
	                 
	                 <img class="reaction-option-image" src="'.asset('front/img/reaction/love.png').'" alt="reaction-love">
	               
	               </div>
	             
	               <div class="reaction-option text-tooltip-tft post-reaction-type" data-title="Dislike" react-value="3" post-id="'.$post->id.'">
	                
	                 <img class="reaction-option-image" src="'.asset('front/img/reaction/dislike.png').'" alt="reaction-dislike">
	                
	               </div>
	              
	               <div class="reaction-option text-tooltip-tft post-reaction-type" data-title="Happy" react-value="4" post-id="'.$post->id.'">
	                
	                 <img class="reaction-option-image" src="'.asset('front/img/reaction/happy.png').'" alt="reaction-happy">
	               
	               </div>
	             
	               <div class="reaction-option text-tooltip-tft post-reaction-type" data-title="Funny" react-value="5" post-id="'.$post->id.'">
	                
	                 <img class="reaction-option-image" src="'.asset('front/img/reaction/funny.png').'" alt="reaction-funny">
	               
	               </div>
	              
	               <div class="reaction-option text-tooltip-tft post-reaction-type" data-title="Wow" react-value="6" post-id="'.$post->id.'">
	                
	                 <img class="reaction-option-image" src="'.asset('front/img/reaction/wow.png').'" alt="reaction-wow">
	               
	               </div>
	              
	               <div class="reaction-option text-tooltip-tft post-reaction-type" data-title="Angry" react-value="7" post-id="'.$post->id.'">
	                
	                 <img class="reaction-option-image" src="'.asset('front/img/reaction/angry.png').'" alt="reaction-angry">
	                
	               </div>
	              
	               <div class="reaction-option text-tooltip-tft post-reaction-type" data-title="Sad" react-value="8" post-id="'.$post->id.'">
	                
	                 <img class="reaction-option-image" src="'.asset('front/img/reaction/sad.png').'" alt="reaction-sad">
	                 
	               </div>
	               
	             </div>
             
            </div>
            
            <div class="post-option">
            
              <svg class="post-option-icon icon-comment">
                <use xlink:href="#svg-comment"></use>
              </svg>
               <p class="post-option-text post-comment-trigger" data-target="'.$post->id.'" data-action="'.route('getAllComment').'">Comment</p>
            </div>
           
            <div class="post-option">
             
              <svg class="post-option-icon icon-share">
                <use xlink:href="#svg-share"></use>
              </svg>
              <p class="post-option-text">Share</p>
             </div>
               </div></div>';
         }
      }else{
        $setPost.='';
      }
       echo $setPost;

}

   public function create(Request $request){


        $this->validate($request, [
            'post_text' => 'required|max:1000',
            'postimg'=>'nullable'
        ],[
          'post_text.required'=>'Please provide post text',
          'post_text.max'=>'Post text limit character',

        ]);
      $path=base_path();
   		$post=new Post();
   		$user_id=Auth::user()->id;
   		$post->post_text=$request->input('post_text');
      
      if ($request->hasFile('postimg')) {

        $image=$request->postimg;
        $imagename=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
        $location=base_path('/front/image/post/'.$imagename);
        Image::make($image)->save($location);
        $post->image=$imagename;

      }

   		$post->user_id=$user_id;
   		$save=$post->save();
   		if (!is_null($save)) {

   			$msg=['status'=>'success','message'=>'Post Save successfully','postlist'=>Post::singlepost()];

   		}else{
   			$msg=['status'=>'error','message'=>'Something went wrong'];
   		}
   		
   		return json_encode($msg);
   }

//   ----------------------post reaction---------------------
    public function postReaction(Request $request){
        $logged_user = Auth::user();
        $react_type  = $request->react_type;
        $post_id     = $request->post_id;
        $type        = $request->type;
       // $onwer_id=Post::findOrFail($post_id);

        $check = DB::table('reacts')
                ->where('user_id', $logged_user->id)
                ->where('type', $type)
                ->where('post_or_comment_id', $post_id)
                ->get();


        if (count($check) > 0){

            $affected = DB::table('reacts')
                      ->where('user_id', $logged_user->id)
                      ->where('type', $type)
                      ->where('post_or_comment_id', $post_id)
                      ->update(['react_type' => $react_type]);

                Notification::create([
                    'title'=>'Has reacted on your post',
                    'type'=>5,
                    'notification_to'=>Post::findOrFail($post_id)->user_id,
                    'notification_from'=>Auth::user()->id,
                    'post_id'=>$post_id,
                ]);
        }else{
            DB::table('reacts')->insert([
                'react_type' => $react_type,
                'user_id'    => $logged_user->id,
                'post_or_comment_id' => $post_id,
                'type' => $type

            ]);

            Notification::create([
                'title'=>'has reacted on your post',
                'type'=>5,
                'notification_to'=>Post::findOrFail($post_id)->user_id,
                'notification_from'=>Auth::user()->id,
                'post_id'=>$post_id,
            ]);
        }
        $counter = DB::table('reacts')->where('post_or_comment_id', $post_id)->get();
        $user_react_type = DB::table('reacts')->where('post_or_comment_id', $post_id)
                                                    ->where('user_id', $logged_user->id)->first();

        $data = [
            'counter' => count($counter),
            'user_react_type' => $user_react_type
        ];

        return $data;
    }



    public function single($post_id){
      $post=Post::findOrFail($post_id);
        return view('pages.feed.single_post',compact('post'));
    }



}
