<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Post extends Model
{
    
    protected $fillable=['post_text','user_id','tag','status','image'];

    public function user(){
        //return $this->belongsTo(User::class,'user_id'); 
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function reactions()
    {
        return $this->hasMany('App\Models\React');
    }

    public static function singlepost(){
    	$post=Post::orderBy('id','DESC')->first();
    	$allpost="";
    	if (!is_null($post)) {
    		$allpost.='<div class="widget-box-status">
                <div class="widget-box-settings"> 
                  <div class="post-settings-wrap">
                    <div class="post-settings widget-box-post-settings-dropdown-trigger">
                      <svg class="post-settings-icon icon-more-dots">
                        <use xlink:href="#svg-more-dots"></use>
                      </svg>
                    </div>
                    <div class="simple-dropdown widget-box-post-settings-dropdown">
                      <p class="simple-dropdown-link">Edit Post</p>
                      <p class="simple-dropdown-link">Delete Post</p>
                      <p class="simple-dropdown-link">Make it Featured</p>
                      <p class="simple-dropdown-link">Report Post</p>
                      <p class="simple-dropdown-link">Report Author</p>
                    </div>
                  </div>
                </div>
               <div class="widget-box-status-content">
                 <div class="user-status">
                   <a class="user-status-avatar" href="profile-timeline.html">
                     <div class="user-avatar small no-outline">
                       <div class="user-avatar-content">
                         <div class="hexagon-image-30-32" data-src="'.asset('front/image/user/profile.jpg').'"></div>
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
                         <p class="user-avatar-badge-text">19</p>
                       </div>
                     </div>
                   </a>
                   <p class="user-status-title medium">
                    <a class="bold" href="profile-timeline.html">Rasel Rana</a> uploaded 
                    <span class="bold">26 new photos</span></p>
                   <p class="user-status-text small">17</p>
                 </div>
                <p class="widget-box-status-text">'.$post->post_text.'</p>
                '.($post->image !=null) ?  '<div class="picture-collage">
                   <div class="picture-collage-row medium">
                     <div class="picture-collage-item">
                       <div class="photo-preview">
                         <figure class="photo-preview-image liquid">
                           <img src="'.asset('front/image/post/'.$post->image).'" alt="">
                         </figure>
                       </div>
                     </div>
                   </div>
                 </div>' : ''.'
                 

                 <div class="tag-list">
                   <a class="tag-item secondary" href="newsfeed.html">Photos</a>
                   <a class="tag-item secondary" href="newsfeed.html">StreamCon</a>
                   <a class="tag-item secondary" href="newsfeed.html">StarGirl</a>
                 </div>
           
                 <div class="content-actions">
                   <div class="content-action">
                     <div class="meta-line">
                       <div class="meta-line-list reaction-item-list">
                         <div class="reaction-item">
                           <img class="reaction-image reaction-item-dropdown-trigger" src="'.asset('front/img/reaction/wow.png').'" alt="reaction-wow">
                           <div class="simple-dropdown padded reaction-item-dropdown">
                             <p class="simple-dropdown-text"><img class="reaction" src="'.asset('front/img/reaction/wow.png').'" alt="reaction-wow"> <span class="bold">Wow</span></p>
                             <p class="simple-dropdown-text">Matt Parker</p>
                           </div>
                         </div>
                         <div class="reaction-item">
                           <img class="reaction-image reaction-item-dropdown-trigger" src="'.asset('front/img/reaction/like.png').'" alt="reaction-like">
                           <div class="simple-dropdown padded reaction-item-dropdown">
                             <p class="simple-dropdown-text"><img class="reaction" src="'.asset('front/img/reaction/like.png').'" alt="reaction-like"> <span class="bold">Like</span></p>
                             <p class="simple-dropdown-text">Sandra Strange</p>
                           </div>
                         </div>
                       </div>
                       <p class="meta-line-text">3</p>
                     </div>
                     <div class="meta-line">
                       <div class="meta-line-list user-avatar-list">
                         <div class="user-avatar micro no-stats">
                           <div class="user-avatar-border">
                             <div class="hexagon-22-24"></div>
                           </div>
                           <div class="user-avatar-content">
                             <div class="hexagon-image-18-20" data-src="'.asset('front/img/avatar/03.jpg').'"></div>
                           </div>
                         </div>
                         <div class="user-avatar micro no-stats">
                           <div class="user-avatar-border">
                             <div class="hexagon-22-24"></div>
                           </div>
                           <div class="user-avatar-content">
                             <div class="hexagon-image-18-20" data-src="'.asset('front/img/avatar/15.jpg').'"></div>
                           </div>
                         </div>
                         <div class="user-avatar micro no-stats">
                           <div class="user-avatar-border">
                             <div class="hexagon-22-24"></div>
                           </div>
                           <div class="user-avatar-content">
                             <div class="hexagon-image-18-20" data-src="'.asset('front/img/avatar/14.jpg').'"></div>
                           </div>                      
                         </div>
                         <div class="user-avatar micro no-stats">
                           <div class="user-avatar-border">
                             <div class="hexagon-22-24"></div>
                           </div>
                           <div class="user-avatar-content">
                             <div class="hexagon-image-18-20" data-src="'.asset('front/img/avatar/07.jpg').'"></div>
                           </div>
                         </div>
                       </div>
                       <p class="meta-line-text">4 Participants</p>
                     </div>
                   </div>
                   <div class="content-action">
                     <div class="meta-line">
                       <p class="meta-line-link">'.$post->comment->count().'Comments'.'</p>
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
                 <div class="post-option reaction-options-dropdown-trigger">
                   <svg class="post-option-icon icon-thumbs-up">
                     <use xlink:href="#svg-thumbs-up"></use>
                   </svg>
                   <p class="post-option-text">React!</p>
                 </div>
                 <div class="reaction-options reaction-options-dropdown">
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
               <div class="post-option">
                 <svg class="post-option-icon icon-comment">
                   <use xlink:href="#svg-comment"></use>
                 </svg>
                 <p class="post-option-text">Comment</p>
               </div>
               <div class="post-option">
                 <svg class="post-option-icon icon-share">
                   <use xlink:href="#svg-share"></use>
                 </svg>
                 <p class="post-option-text">Share</p>
               </div>
             </div>';
    	}


        return $allpost;
    }


    public function comment(){
      return $this->hasMany('App\Models\Comment');
    }
}
