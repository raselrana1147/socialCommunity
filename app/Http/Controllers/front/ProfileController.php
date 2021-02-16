<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use App\models\UserBadge;
use App\Models\UserQuest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Image;
use Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConvertCredit;
use App\Models\Withdraw;
use App\Models\Post;
use Carbon\Carbon;
use App\Models\Badge;
use App\Models\React;
use App\Models\Product;

class ProfileController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function profile_about(){
        return view('pages.profile.about_profile');
    }

   public function profile()
   {
      $managed_badges = Auth::user()->badges;
      $user = Auth::user();

   	  return view('pages.profile.profile_info',
          [
              'managed_badges' => $managed_badges,
              'user' => $user
          ]
      );
   }


   public function updateInfo(Request $request){
      $user=User::findOrFail($request->user_id);
      $this->validate($request,[

        'phone'=>'nullable|unique:users,phone,'.$user->id
      ]);

      $user->name      =$request->input('name');
      $user->phone      =$request->input('phone');
      $user->email      =$request->input('email');
      $user->about      =$request->input('about');
      $user->website    =$request->input('website');
      $user->city       =$request->input('city');
      $user->country    =$request->input('country');
      $user->dob        =$request->input('dob');
      $user->occupation =$request->input('occupation');
      $user->life_status=$request->input('life_status');
      $user->birth_place=$request->input('birth_place');
      $user_save        =$user->save();
      if (!is_null($user_save)) {
        $msg=['status'=>'success','message'=>'Successfully Updated'];
      }else{
        $msg=['status'=>'error','message'=>'Something went wrong'];
      }

       return json_encode($msg);
   }

   public function applyAffMember(Request $request){
      $user=User::where('id',$request->user_id)->first();
      $user->is_affiliate=2;
      $user->affiliate_id="aff".rand(10000,99999);
      $user->save();

       $notification=array(
         'messege'=>'Successfully applied',
         'alert-type'=>'success'
          );
        return Redirect()->back()->with($notification);
   }



   public function passwordForm(){
      return view('pages.profile.password');
   }

   public function passwordChange(Request $request){
      
      $user=User::findOrFail(Auth::user()->id);
      if ($request->current_password) {
        if (Hash::check($request->current_password,$user->password)) {
            if ($request->new_password==$request->password_confirmation) {
                $user->password=Hash::make($request->new_password);
                $user->salt=base64_encode($request->new_password);
                   $user->save();
                   $msg=['status'=>'success','message'=>'Successfully updated'];
            }else{
               $msg=['status'=>'error','message'=>'Confirm password does not match'];
            }
        }else{
          $msg=['status'=>'error','message'=>'Current password did not match'];
        }
      }
       return json_encode($msg);
   }

   public function changeAvatar(Request $request){

      $user=User::findOrFail(Auth::user()->id);
     if ($request->hasFile('avatar')) {

      if (File::exists(base_path('/front/image/user/avatar/'.$user->avatar))) {
          File::delete(base_path('/front/image/user/avatar/'.$user->avatar));
      }

        $avatar=$request->avatar;
        $avatarname=strtolower(Str::random(10)).time().".".$avatar->getClientOriginalExtension();
        $location=base_path('/front/image/user/avatar/'.$avatarname);
        Image::make($avatar)->save($location);

        $user->avatar=$avatarname;
     }
     $user->save();

      $notification=array(
      'messege'=>'Successfully profile photo updated',
      'alert-type'=>'success'
       );
     return redirect(route('user.profile.info'))->with($notification);
   }

   public function changeCoverPhoto(Request $request){

     $user=User::findOrFail(Auth::user()->id);
    if ($request->hasFile('cover_photo')) {
      if (File::exists(base_path('/front/image/user/cover/'.$user->cover_photo))) {
          File::delete(base_path('/front/image/user/cover/'.$user->cover_photo));
      }
       $cover=$request->cover_photo;
       $covername=strtolower(Str::random(10)).time().".".$cover->getClientOriginalExtension();
       $location=base_path('/front/image/user/cover/'.$covername);
       Image::make($cover)->save($location);

       $user->cover_photo=$covername;
    }
    $user->save();
     $notification=array(
     'messege'=>'Successfully cover photo updated',
     'alert-type'=>'success'
      );
    return redirect(route('user.profile.info'))->with($notification);

   }

   public function updatePayment(Request $request){
      $user=Auth::user();

      $user->payment_method=$request->payment_method;
      $user->payment_email=$request->payment_email;
      $user->save();
      if ($user) {
        $msg=['status'=>'success','message'=>'Payment Method updated successfully'];
      }else{
         $msg=['status'=>'error','message'=>'Something went wrong'];
      }
      $msg=['status'=>'success','message'=>'Payment Method updated successfully'];
      return json_encode($msg);
   }

   public function accounts(){
      return view('pages.profile.accounts');
   }

   public function withdrawAndRedeem(){
      $withdraws=Withdraw::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
      return view('pages.profile.withdraw_redeem',compact('withdraws'));
   }

   public function convertCredit(Request $request){
       $user=Auth::user();
       if ($user->credit >=$request->credit) {

           $convertBalance  =($request->credit*1)/100;
           $current_balance =$user->balance;
           $current_credit  =$user->credit;
           $current_balance +=$convertBalance;
           $current_credit  -=$request->credit;

           $user->balance=$current_balance;
           $user->credit =$current_credit;
           $user->save();
           $convert=array(
              'credit'=>$request->credit,
              'balance'=>$convertBalance,
           );

          Mail::send(new ConvertCredit($user,$convert));
            $notification=array(
            'messege'=>'Successfully credit convered',
            'alert-type'=>'success'
             );
           return redirect(route('user.withdraw.redeen'))->with($notification);
       }else{
           $notification=array(
           'messege'=>'You have no enough credit',
           'alert-type'=>'error'
            );
          return redirect(route('user.withdraw.redeen'))->with($notification);
       }  
   }

   public function timeline(){

       $logged_user = Auth::user();
       $completed_quests = UserQuest::where('user_id', $logged_user->id)->get();
       $unlocked_badges = UserBadge::where('user_id', $logged_user->id)->get();

       $posts = Post::where('user_id', $logged_user->id)->orderBy('id','DESC')->get();
       $data = [];
       foreach ($posts as $post){
           $data[] = [
               'post' => $post,
               'reacts' => React::where('post_or_comment_id', $post->id)->where('type', 1)->get(),
               'user_react' => React::where('post_or_comment_id', $post->id)->where('user_id', $logged_user->id)->where('type', 1)->first()
           ];
       }
       $item=Product::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first();
       $post_photos=Post::where('user_id',Auth::user()->id)->where('image','!=',null)->take(10)->get();
       return view('pages.profile.timeline_profile',compact(['data', 'completed_quests', 'unlocked_badges','item','post_photos']));
   }

   public function userLoadData(Request $request){
    $posts=Post::where('user_id',Auth::user()->id)
             ->offset($request['start'])
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
                         
                          <p class="post-option-text post-comment-trigger-user" data-target="'.$post->id.'" data-action="'.route('getAllComment').'">Comment</p>
                         
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

   public function referalFriend(){
    $aff_users=User::where('parent_id',Auth::user()->id)->paginate(6);
      return view('pages.profile.profile_referal',compact('aff_users'));
   }


}
