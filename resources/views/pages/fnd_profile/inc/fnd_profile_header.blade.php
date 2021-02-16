 <div class="profile-header">
      <!-- PROFILE HEADER COVER -->
      <figure class="profile-header-cover liquid">
        <img src="{{($fnd_user->cover_photo !=null) ? asset('front/image/user/cover/'.$fnd_user->cover_photo) : asset('front/image/user/cover.jpg')}}" alt="cover-01">
      </figure>
      <!-- /PROFILE HEADER COVER -->
  
      <!-- PROFILE HEADER INFO -->
      <div class="profile-header-info">
        <!-- USER SHORT DESCRIPTION -->
        <div class="user-short-description big">
          <!-- USER SHORT DESCRIPTION AVATAR -->
          <a class="user-short-description-avatar user-avatar big" href="{{ route('friend.profile.about',$fnd_user->username) }}">
            <!-- USER AVATAR BORDER -->
            <div class="user-avatar-border">
              <!-- HEXAGON -->
              <div class="hexagon-148-164"></div>
              <!-- /HEXAGON -->
            </div>
            <div class="user-avatar-content">
              <!-- HEXAGON -->
              <div class="hexagon-image-100-110" data-src="{{($fnd_user->avatar !=null) ? asset('front/image/user/avatar/'.$fnd_user->avatar) : asset('front/image/user/profile.jpg')}}"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR CONTENT -->
        
            <!-- USER AVATAR PROGRESS -->
            <div class="user-avatar-progress">
              <!-- HEXAGON -->
              <div class="hexagon-progress-124-136"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR PROGRESS -->
        
            <!-- USER AVATAR PROGRESS BORDER -->
            <div class="user-avatar-progress-border">
              <!-- HEXAGON -->
              <div class="hexagon-border-124-136"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR PROGRESS BORDER -->
        
            <!-- USER AVATAR BADGE -->
            <div class="user-avatar-badge">
              <!-- USER AVATAR BADGE BORDER -->
              <div class="user-avatar-badge-border">
                <!-- HEXAGON -->
                <div class="hexagon-40-44"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR BADGE BORDER -->
        
              <!-- USER AVATAR BADGE CONTENT -->
              <div class="user-avatar-badge-content">
                <!-- HEXAGON -->
                <div class="hexagon-dark-32-34"></div>
                <!-- /HEXAGON -->
              </div>


              <!-- /USER AVATAR BADGE CONTENT -->
        
              <!-- USER AVATAR BADGE TEXT -->
              <p class="user-avatar-badge-text">24</p>


              <!-- /USER AVATAR BADGE TEXT -->
            </div>

            <!-- /USER AVATAR BADGE -->
          </a>
          <!-- /USER SHORT DESCRIPTION AVATAR -->
  
          <!-- USER SHORT DESCRIPTION AVATAR -->
          <a class="user-short-description-avatar user-short-description-avatar-mobile user-avatar medium" href="profile-timeline.html">
            <!-- USER AVATAR BORDER -->
            <div class="user-avatar-border">
              <!-- HEXAGON -->
              <div class="hexagon-120-132"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR BORDER -->
        
            <!-- USER AVATAR CONTENT -->
            <div class="user-avatar-content">
              <!-- HEXAGON -->
              <div class="hexagon-image-82-90" data-src="{{($fnd_user->avatar !=null) ? asset('front/image/user/avatar/'.$fnd_user->avatar) : asset('front/image/user/profile.jpg')}}"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR CONTENT -->
        
            <!-- USER AVATAR PROGRESS -->
            <div class="user-avatar-progress">
              <!-- HEXAGON -->
              <div class="hexagon-progress-100-110"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR PROGRESS -->
        
            <!-- USER AVATAR PROGRESS BORDER -->
            <div class="user-avatar-progress-border">
              <!-- HEXAGON -->
              <div class="hexagon-border-100-110"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR PROGRESS BORDER -->
        
            <!-- USER AVATAR BADGE -->
            <div class="user-avatar-badge">
              <!-- USER AVATAR BADGE BORDER -->
              <div class="user-avatar-badge-border">
                <!-- HEXAGON -->
                <div class="hexagon-32-36"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR BADGE BORDER -->
        
              <!-- USER AVATAR BADGE CONTENT -->
              <div class="user-avatar-badge-content">
                <!-- HEXAGON -->
                <div class="hexagon-dark-26-28"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR BADGE CONTENT -->
        
              <!-- USER AVATAR BADGE TEXT -->
              <p class="user-avatar-badge-text">24</p>
              <!-- /USER AVATAR BADGE TEXT -->
            </div>
            <!-- /USER AVATAR BADGE -->
          </a>
          <!-- /USER SHORT DESCRIPTION AVATAR -->
    
          <!-- USER SHORT DESCRIPTION TITLE -->
          <p class="user-short-description-title"><a href="{{ route('friend.profile.about',$fnd_user->username) }}">{{($fnd_user->name !=null) ? $fnd_user->name :  $fnd_user->username}}</a></p>
          <!-- /USER SHORT DESCRIPTION TITLE -->
    
          <!-- USER SHORT DESCRIPTION TEXT -->
          <p class="user-short-description-text"><a href="{{($fnd_user->website !=null) ? $fnd_user->website : ''}}" target="_blank">{{($fnd_user->website !=null) ? $fnd_user->website : ''}}</a></p>
          <!-- /USER SHORT DESCRIPTION TEXT -->
        </div>
        <!-- /USER SHORT DESCRIPTION -->
  
        <!-- PROFILE HEADER SOCIAL LINKS WRAP -->
        <div class="profile-header-social-links-wrap">
          <!-- PROFILE HEADER SOCIAL LINKS -->
             @php
               
               $facebook=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','facebook')->first();

               $twitter=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','twitter')->first();

               $instagram=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','instagram')->first();

               $twitch=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','twitch')->first();

               $googleplus=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','googleplus')->first();

               $youtube=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','youtube')->first();

               $patreon=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','patreon')->first();

               $discord=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','discord')->first();

               $deviantart=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','deviantart')->first();

               $behance=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','behance')->first();

               $dribbble=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','dribbble')->first();

               $artstation=App\Models\UserMeta::where('user_id',$fnd_user->id)
               ->where('meta_type','social')
               ->where('meta_key','artstation')->first();
             
             @endphp
             <div id="profile-header-social-links-slider" class="profile-header-social-links">

             @if (!is_null($facebook))
               <div class="profile-header-social-link">
                 <!-- SOCIAL LINK -->
                 <a class="social-link facebook" href="https://www.facebook.com/{{$facebook->meta_value}}" target="_blank">
                   <!-- ICON FACEBOOK -->
                   <svg class="icon-facebook">
                     <use xlink:href="#svg-facebook"></use>
                   </svg>
                   <!-- /ICON FACEBOOK -->
                 </a>
                 <!-- /SOCIAL LINK -->
               </div>
             @endif
              @if (!is_null($twitter))
               <div class="profile-header-social-link">
                 <!-- SOCIAL LINK -->
                 <a class="social-link twitter" target="_blank" href="https://www.twitter.com/{{$twitter->meta_value}}">
                   <!-- ICON TWITTER -->
                   <svg class="icon-twitter">
                     <use xlink:href="#svg-twitter"></use>
                   </svg>
                   <!-- /ICON TWITTER -->
                 </a>
                 <!-- /SOCIAL LINK -->
               </div>
               @endif
         @if (!is_null($instagram))
               <div class="profile-header-social-link">
                 <!-- SOCIAL LINK -->
                 <a class="social-link instagram" target="_blank" href="https://www.instagram.com/{{$instagram->meta_value}}">
                   <!-- ICON INSTAGRAM -->
                   <svg class="icon-instagram">
                     <use xlink:href="#svg-instagram"></use>
                   </svg>
                   <!-- /ICON INSTAGRAM -->
                 </a>
                 <!-- /SOCIAL LINK -->
               </div>
           @endif
         @if (!is_null($twitch))
               <div class="profile-header-social-link">
                 <!-- SOCIAL LINK -->
                 <a class="social-link twitch" target="_blank" href="https://www.twitch.tv/{{$youtube->meta_value}}">
                   <!-- ICON TWITCH -->
                   <svg class="icon-twitch">
                     <use xlink:href="#svg-twitch"></use>
                   </svg>
                   <!-- /ICON TWITCH -->
                 </a>
                 <!-- /SOCIAL LINK -->
               </div>
         @endif
         @if (!is_null($twitch))
               <div class="profile-header-social-link">
                 <!-- SOCIAL LINK -->
                 <a class="social-link youtube" target="_blank" href="https://www.youtube.com/{{$youtube->meta_value}}">
                   <!-- ICON YOUTUBE -->
                   <svg class="icon-youtube">
                     <use xlink:href="#svg-youtube"></use>
                   </svg>
                   <!-- /ICON YOUTUBE -->
                 </a>
                 <!-- /SOCIAL LINK -->
               </div>
          @endif
          @if (!is_null($patreon))
               <div class="profile-header-social-link">
                 <!-- SOCIAL LINK -->
                 <a class="social-link patreon" target="_blank" href="https://discord.com/{{$patreon->meta_value}}">
                   <!-- ICON PATREON -->
                   <svg class="icon-patreon">
                     <use xlink:href="#svg-patreon"></use>
                   </svg>
                   <!-- /ICON PATREON -->
                 </a>
                 <!-- /SOCIAL LINK -->
               </div>
          @endif
           @if (!is_null($discord))
               <div class="profile-header-social-link">
                 <!-- SOCIAL LINK -->
                 <a class="social-link discord" href="https://www.patreon.com/{{$discord->meta_value}}">
                   <!-- ICON DISCORD -->
                   <svg class="icon-discord">
                     <use xlink:href="#svg-discord"></use>
                   </svg>
                   <!-- /ICON DISCORD -->
                 </a>
                 <!-- /SOCIAL LINK -->
               </div>
             @endif
             </div>

          <!-- /PROFILE HEADER SOCIAL LINKS -->
  
          <!-- SLIDER CONTROLS -->
          <div id="profile-header-social-links-slider-controls" class="slider-controls">
            <!-- SLIDER CONTROL -->
            <div class="slider-control left">
              <!-- SLIDER CONTROL ICON -->
              <svg class="slider-control-icon icon-small-arrow">
                <use xlink:href="#svg-small-arrow"></use>
              </svg>
              <!-- /SLIDER CONTROL ICON -->
            </div>
            <!-- /SLIDER CONTROL -->
  
            <!-- SLIDER CONTROL -->
            <div class="slider-control right">
              <!-- SLIDER CONTROL ICON -->
              <svg class="slider-control-icon icon-small-arrow">
                <use xlink:href="#svg-small-arrow"></use>
              </svg>
              <!-- /SLIDER CONTROL ICON -->
            </div>
            <!-- /SLIDER CONTROL -->
          </div>
          <!-- /SLIDER CONTROLS -->
        </div>
        <!-- /PROFILE HEADER SOCIAL LINKS WRAP -->
  
        <!-- USER STATS -->
        <div class="user-stats">
          <!-- USER STAT -->
          <div class="user-stat big">
            <!-- USER STAT TITLE -->
            <p class="user-stat-title">{{count($posts)}}</p>
            <!-- /USER STAT TITLE -->
    
            <!-- USER STAT TEXT -->
            <p class="user-stat-text">posts</p>
            <!-- /USER STAT TEXT -->
          </div>
          <!-- /USER STAT -->
    
          <!-- USER STAT -->
          <div class="user-stat big">
            <!-- USER STAT TITLE -->
            <p class="user-stat-title">82</p>
            <!-- /USER STAT TITLE -->
    
            <!-- USER STAT TEXT -->
            <p class="user-stat-text">friends</p>
            <!-- /USER STAT TEXT -->
          </div>
          <!-- /USER STAT -->
    
          <!-- USER STAT -->
          <div class="user-stat big">
            <!-- USER STAT TITLE -->
            <p class="user-stat-title">5.7k</p>
            <!-- /USER STAT TITLE -->
    
            <!-- USER STAT TEXT -->
            <p class="user-stat-text">visits</p>
            <!-- /USER STAT TEXT -->
          </div>
          <!-- /USER STAT -->
  
          <!-- USER STAT -->
          <div class="user-stat big">
            <!-- USER STAT IMAGE -->
            <p class="user-stat-text">{{$fnd_user->country}}</p>
            <!-- /USER STAT TEXT -->
          </div>
          <!-- /USER STAT -->
        </div>
        @if (!is_null($two_way))
       <div class="profile-header-info-actions">
            <p class="profile-header-info-action button primary unfriend_current_friend" data-target="{{$two_way->id}}">
          <span class="hide-text-mobile">Unfriend</span></p>
         <p class="profile-header-info-action button secondary friend_request_send" style="display:none" data-target="{{$fnd_user->id}}">
          <span class="hide-text-mobile">Add</span> Friend +</p>
       </div>
        @else
      
        @if (is_null($already_request))
           @if(is_null($friend_request))
             <div class="profile-header-info-actions">
                 <p class="profile-header-info-action button secondary friend_request_send" data-target="{{$fnd_user->id}}"><span class="hide-text-mobile">Add</span> Friend +</p>
                 <p class="profile-header-info-action button secondary after_request_sent" style="display:none"><span class="hide-text-mobile">Request Sent</p>
             </div> 
            @else
            <div class="profile-header-info-actions">
              @if ($friend_request->status==1)
               <p class="profile-header-info-action button secondary request_send">
                <span class="hide-text-mobile">Request Sent</p>
               <p class="profile-header-info-action button primary cancel_friend_request " data-target="{{$friend_request->id}}">
                <span class="hide-text-mobile">Cancel Request</span></p>
                <p class="profile-header-info-action button secondary friend_request_send" style="display:none" data-target="{{$fnd_user->id}}">
                  <span class="hide-text-mobile">Add</span> Friend +</p>
                 <p class="profile-header-info-action button secondary after_request_sent" style="display:none"><span class="hide-text-mobile">Request Sent</p>
               @elseif($friend_request->status==2)
                <p class="profile-header-info-action button primary now_friend"><span class="hide-text-mobile">Unfriend</p>
              @endif

            </div> 
           @endif
           @else
            <div class="profile-header-info-actions">
             @if ($already_request->status==1)
             <div class="after_accept_request">
               <p class="profile-header-info-action button secondary accept_friend_request" data-target={{$already_request->id}}><span class="hide-text-mobile">Accept Request</span></p>
               <p class="profile-header-info-action button primary unfriend_current_friend" data-target="{{$already_request->id}}"><span class="hide-text-mobile">Delete</span></p>
              <p class="profile-header-info-action button secondary after_request_sent_two after_delete_request" style="display:none"data-target="{{$fnd_user->id}}"><span class="hide-text-mobile">Add</span> Friend +</p>
               <p class="profile-header-info-action button secondary request_sent_two" style="display:none"><span class="hide-text-mobile">Request Sent</p>
             </div>
             @else
              <p class="profile-header-info-action button secondary now_friend" style="display:none"><span class="hide-text-mobile" >Unfriend</p>
             @endif
            
           </div>
        @endif
           @endif
    
       
      
        <div class="profile-header-info-actions">
        </div>
        <!-- /PROFILE HEADER INFO ACTIONS -->
      </div>
      <!-- /PROFILE HEADER INFO -->
    </div>