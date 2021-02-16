<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Carbon\Carbon;
use App\Models\Notification;

class CommentController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function getAllComment(Request $request){
    		$comments=Comment::where('post_id',$request->post_id)->get();
    		$setComment='';
    		if (count($comments)>0) {
    			foreach ($comments as $comment) {
    				$setComment.='<div class="post-comment">
            <a class="user-avatar small no-outline" href="'.(($comment->user_id ==Auth::user()->id) ?  route('user.profile.timeline') :  route('friend.profile.timeline',$comment->user->username)).'">
              <div class="user-avatar-content">
                 <div class="user-avatar-content" style="margin-top:-15px">
                      <img class="hexagon-image-30-32" src="'.(($comment->user->avatar !=null) ? asset('front/image/user/avatar/'.$comment->user->avatar) : asset('front/image/user/profile.jpg')).'">
                 </div>
              </div>
              <div class="user-avatar-progress">
               
                <div class="hexagon-progress-40-44"></div>
               
              </div>
              
              <div class="user-avatar-progress-border">
              
                <div class="hexagon-border-40-44"></div>
              
              </div>
              
              <div class="user-avatar-badge">
               
                <div class="user-avatar-badge-border">
                 
                  <div class="hexagon-22-24"></div>
                 
                </div>
                
                <div class="user-avatar-badge-content">
                  
                  <div class="hexagon-dark-16-18"></div>
                 
                </div>
               
                <p class="user-avatar-badge-text">12</p>
               
              </div>
             
            </a>
           
            <p class="post-comment-text"><a class="post-comment-text-author" href="'.(($comment->user_id ==Auth::user()->id) ?  route('user.profile.timeline') :  route('friend.profile.timeline',$comment->user->username)).'">'.(($comment->user->name !=null) ? $comment->user->name : $comment->user->username).'</a>'.$comment->content.'</p>
           
            <div class="content-actions">
              
              <div class="content-action">
               
                <div class="meta-line">
                
                  <div class="meta-line-list reaction-item-list small" style="display:none">
                 
                    <div class="reaction-item">
                    
                      <img class="reaction-image reaction-item-dropdown-trigger" src="'.asset('front/img/reaction/happy.png').'" alt="reaction-happy" >
                      
                      <div class="simple-dropdown padded reaction-item-dropdown">
                       
                        <p class="simple-dropdown-text"><img class="reaction" src="'.asset('front/img/reaction/happy.png').'" alt="reaction-happy"> <span class="bold">Happy</span></p>

                        <p class="simple-dropdown-text">Marcus Jhonson</p>
                      
                      </div>
                    
                    </div>
                    
                    <div class="reaction-item" >
                     
                      <img class="reaction-image reaction-item-dropdown-trigger" src="'.asset('front/img/reaction/like.png').'" alt="reaction-like">
                      
                      <div class="simple-dropdown padded reaction-item-dropdown">
                       
                        <p class="simple-dropdown-text"><img class="reaction" src="'.asset('front/img/reaction/like.png').'" alt="reaction-like"> <span class="bold">Like</span></p>
                       
                        <p class="simple-dropdown-text">Neko Bebop</p>
                       
                        <p class="simple-dropdown-text">Nick Grissom</p>
                       
                        <p class="simple-dropdown-text">Sarah Diamond</p>
                       
                      </div>
                     
                    </div>
                  
                  </div>
                  
                  <p class="meta-line-text">4</p>
                 
                </div>
               
                <div class="meta-line">
                
                  <p class="meta-line-link light reaction-options-small-dropdown-trigger" >React!</p>
                 
                  <div class="reaction-options small reaction-options-small-dropdown" style="display:none">
                  
                    <div class="reaction-option text-tooltip-tft" data-title="Like">
                     
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/like.png').'" alt="reaction-like">
                     
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Love">
                    
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/love.png').'" alt="reaction-love">
                     
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Dislike">
                     
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/dislike.png').'" alt="reaction-dislike">
                    
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Happy">
                   
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/happy.png').'" alt="reaction-happy">
                    
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Funny">
                    
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/funny.png').'" alt="reaction-funny">
                    
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Wow">
                     
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/wow.png').'" alt="reaction-wow">
                    
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Angry">
                    
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/angry.png').'" alt="reaction-angry">
                     
                    </div>
                    
                    <div class="reaction-option text-tooltip-tft" data-title="Sad">
                    
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/sad.png').'" alt="reaction-sad">
                    
                    </div>
                  
                  </div>
                  
                </div>
                
                <div class="meta-line">
                
                  <p class="meta-line-link light">Reply</p>
                
                </div>
              
                <div class="meta-line">
                
                  <p class="meta-line-timestamp">'.Carbon::parse($comment->created_at)->diffForHumans().'</p>
                
                </div>
               
                <div class="meta-line settings">
                 
                  <div class="post-settings-wrap">
                  
                    <div class="post-settings post-settings-dropdown-trigger">
                    
                      <svg class="post-settings-icon icon-more-dots" >
                        <use xlink:href="#svg-more-dots" ></use>
                      </svg>
                    
                    </div>
                   
                    <div class="simple-dropdown post-settings-dropdown" style="display:none">
                     
                      <p class="simple-dropdown-link">Report Post</p>
                     
                    </div>
                   
                  </div>
                 
                </div>
               
              </div>
            
            </div>
          </div>';
    			}
    		}else{
    			$setComment.='<p style="text-align:center;padding:8px;font-weight:bold" id="noComment">No Comment Yet!</p>';
    		}

    		echo $setComment;
    }

    public function comment(Request $request){
    	$comment=new Comment();
    	if ($request->filled('content')) {
    		$comment->user_id=Auth::user()->id;
    		$comment->post_id=$request->post_id;
    		$comment->content=$request->content;
    		$comment->save();
       $post=Post::findOrFail($request->post_id);
       
        Notification::create([
            'title'=>'Comment on your post',
            'type'=>6,
            'notification_to'=>$post->user->id,
            'notification_from'=>Auth::user()->id,
            'post_id'=>$request->post_id,
        ]);
    		$msg=['status'=>'success','message'=>'Your comment is saved','comment'=>$this->getSingleComment()];
    	}else{
    		$msg=['status'=>'error','message'=>'Please Say Something'];
    	}
    	return json_encode($msg);
    }

    protected function getSingleComment(){
    	$comment=Comment::orderBy('id','DESC')->first();
    	$setComment='';
    	if (!is_null($comment)) {
    		$setComment='<div class="post-comment">
            <a class="user-avatar small no-outline" href="'.(($comment->user_id ==Auth::user()->id) ?  route('user.profile.timeline') :  route('friend.profile.timeline',$comment->user->username)).'">
              <div class="user-avatar-content">
              <div class="user-avatar-content" style="margin-top:-15px">
                   <img class="hexagon-image-30-32" src="'.(($comment->user->avatar !=null) ? asset('front/image/user/avatar/'.$comment->user->avatar) : asset('front/image/user/profile.jpg')).'">
              </div>
                
              </div>
              <div class="user-avatar-progress">
               
                <div class="hexagon-progress-40-44"></div>
               
              </div>
              
              <div class="user-avatar-progress-border">
              
                <div class="hexagon-border-40-44"></div>
              
              </div>
              
              <div class="user-avatar-badge">
               
                <div class="user-avatar-badge-border">
                 
                  <div class="hexagon-22-24"></div>
                 
                </div>
                
                <div class="user-avatar-badge-content">
                  
                  <div class="hexagon-dark-16-18"></div>
                 
                </div>
               
                <p class="user-avatar-badge-text">12</p>
               
              </div>
             
            </a>
           
            <p class="post-comment-text"><a class="post-comment-text-author" href="'.(($comment->user_id ==Auth::user()->id) ?  route('user.profile.timeline') :  route('friend.profile.timeline',$comment->user->username)).'">'.(($comment->user->name !=null) ? $comment->user->name : $comment->user->username).'</a>'.$comment->content.'</p>
           
            <div class="content-actions">
              
              <div class="content-action">
               
                <div class="meta-line">
                
                  <div class="meta-line-list reaction-item-list small" style="display:none">
                 
                    <div class="reaction-item">
                    
                      <img class="reaction-image reaction-item-dropdown-trigger" src="'.asset('front/img/reaction/happy.png').'" alt="reaction-happy" >
                      
                      <div class="simple-dropdown padded reaction-item-dropdown">
                       
                        <p class="simple-dropdown-text"><img class="reaction" src="'.asset('front/img/reaction/happy.png').'" alt="reaction-happy"> <span class="bold">Happy</span></p>

                        <p class="simple-dropdown-text">Marcus Jhonson</p>
                      
                      </div>
                    
                    </div>
                    
                    <div class="reaction-item" >
                     
                      <img class="reaction-image reaction-item-dropdown-trigger" src="'.asset('front/img/reaction/like.png').'" alt="reaction-like">
                      
                      <div class="simple-dropdown padded reaction-item-dropdown">
                       
                        <p class="simple-dropdown-text"><img class="reaction" src="'.asset('front/img/reaction/like.png').'" alt="reaction-like"> <span class="bold">Like</span></p>
                       
                        <p class="simple-dropdown-text">Neko Bebop</p>
                       
                        <p class="simple-dropdown-text">Nick Grissom</p>
                       
                        <p class="simple-dropdown-text">Sarah Diamond</p>
                       
                      </div>
                     
                    </div>
                  
                  </div>
                  
                  <p class="meta-line-text">4</p>
                 
                </div>
               
                <div class="meta-line">
                
                  <p class="meta-line-link light reaction-options-small-dropdown-trigger" >React!</p>
                 
                  <div class="reaction-options small reaction-options-small-dropdown" style="display:none">
                  
                    <div class="reaction-option text-tooltip-tft" data-title="Like">
                     
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/like.png').'" alt="reaction-like">
                     
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Love">
                    
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/love.png').'" alt="reaction-love">
                     
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Dislike">
                     
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/dislike.png').'" alt="reaction-dislike">
                    
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Happy">
                   
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/happy.png').'" alt="reaction-happy">
                    
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Funny">
                    
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/funny.png').'" alt="reaction-funny">
                    
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Wow">
                     
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/wow.png').'" alt="reaction-wow">
                    
                    </div>
                   
                    <div class="reaction-option text-tooltip-tft" data-title="Angry">
                    
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/angry.png').'" alt="reaction-angry">
                     
                    </div>
                    
                    <div class="reaction-option text-tooltip-tft" data-title="Sad">
                    
                      <img class="reaction-option-image" src="'.asset('front/img/reaction/sad.png').'" alt="reaction-sad">
                    
                    </div>
                  
                  </div>
                  
                </div>
                
                <div class="meta-line">
                
                  <p class="meta-line-link light">Reply</p>
                
                </div>
              
                <div class="meta-line">
                
                  <p class="meta-line-timestamp">'.Carbon::parse($comment->created_at)->diffForHumans().'</p>
                
                </div>
               
                <div class="meta-line settings">
                 
                  <div class="post-settings-wrap">
                  
                    <div class="post-settings post-settings-dropdown-trigger">
                    
                      <svg class="post-settings-icon icon-more-dots" >
                        <use xlink:href="#svg-more-dots" ></use>
                      </svg>
                    
                    </div>
                   
                    <div class="simple-dropdown post-settings-dropdown" style="display:none">
                     
                      <p class="simple-dropdown-link">Report Post</p>
                     
                    </div>
                   
                  </div>
                 
                </div>
               
              </div>
            
            </div>
          </div>';

    	}

    	return $setComment;
    }

  
}
