 <div class="profile-header">
      <!-- PROFILE HEADER COVER -->
      <figure class="profile-header-cover liquid">
        <img src="{{(Auth::user()->cover_photo !=null) ? asset('front/image/user/cover/'.Auth::user()->cover_photo) : asset('front/image/user/cover.jpg')}}" alt="cover-01">
      </figure>
      <!-- /PROFILE HEADER COVER -->
  
      <!-- PROFILE HEADER INFO -->
      <div class="profile-header-info">
        <!-- USER SHORT DESCRIPTION -->
        <div class="user-short-description big">
          <!-- USER SHORT DESCRIPTION AVATAR -->
          <a class="user-short-description-avatar user-avatar big" href="{{ route('user.profile.about') }}">
            <!-- USER AVATAR BORDER -->
            <div class="user-avatar-border">
              <!-- HEXAGON -->
              <div class="hexagon-148-164"></div>
              <!-- /HEXAGON -->
            </div>
            <div class="user-avatar-content">
              <!-- HEXAGON -->
              <div class="hexagon-image-100-110" data-src="{{(Auth::user()->avatar !=null) ? asset('front/image/user/avatar/'.Auth::user()->avatar) : asset('front/image/user/profile.jpg')}}"></div>
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
              <div class="hexagon-image-82-90" data-src="{{(Auth::user()->avatar !=null) ? asset('front/image/user/avatar/'.Auth::user()->avatar) : asset('front/image/user/profile.jpg')}}"></div>
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
          <p class="user-short-description-title"><a href="{{ route('user.profile.about') }}">{{(Auth::user()->name !=null) ? Auth::user()->name :  Auth::user()->username}}</a></p>
          <!-- /USER SHORT DESCRIPTION TITLE -->
    
          <!-- USER SHORT DESCRIPTION TEXT -->
          <p class="user-short-description-text"><a href="#">{{(Auth::user()->website !=null) ? Auth::user()->website : ''}}</a></p>
          <!-- /USER SHORT DESCRIPTION TEXT -->
        </div>
        <!-- /USER SHORT DESCRIPTION -->
  
        <!-- PROFILE HEADER SOCIAL LINKS WRAP -->
        <div class="profile-header-social-links-wrap">
          <!-- PROFILE HEADER SOCIAL LINKS -->


          @php
            
            $facebook=App\Models\UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','facebook')->first();

            $twitter=App\Models\UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','twitter')->first();

            $instagram=App\Models\UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','instagram')->first();

            $twitch=App\Models\UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','twitch')->first();

            $googleplus=App\Models\UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','googleplus')->first();

            $youtube=App\Models\UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','youtube')->first();

            $patreon=App\Models\UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','patreon')->first();

            $discord=App\Models\UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','discord')->first();

            $deviantart=App\Models\UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','deviantart')->first();

            $behance=App\Models\UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','behance')->first();

            $dribbble=App\Models\UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','dribbble')->first();

            $artstation=App\Models\UserMeta::where('user_id',Auth::user()->id)
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

        @php
            $posts = App\Models\Post::where('user_id', Auth::user()->id)->get();
            $prods = App\Models\Product::where('user_id', Auth::user()->id)->get();
            $orders = App\Models\Order::where('user_id', Auth::user()->id)->get();
        @endphp
        <!-- USER STATS -->
        <div class="user-stats">
          <!-- USER STAT -->
          <div class="user-stat big">
            <!-- USER STAT TITLE -->
            <p class="user-stat-title">{{ count($posts) }}</p>
            <!-- /USER STAT TITLE -->
    
            <!-- USER STAT TEXT -->
            <p class="user-stat-text">posts</p>
            <!-- /USER STAT TEXT -->
          </div>
          <!-- /USER STAT -->
    
          <!-- USER STAT -->
          <div class="user-stat big">
            <!-- USER STAT TITLE -->
            <p class="user-stat-title">{{ count($prods) }}</p>
            <!-- /USER STAT TITLE -->
    
            <!-- USER STAT TEXT -->
            <p class="user-stat-text">products</p>
            <!-- /USER STAT TEXT -->
          </div>
          <!-- /USER STAT -->
    
          <!-- USER STAT -->
          <div class="user-stat big">
            <!-- USER STAT TITLE -->
            <p class="user-stat-title">{{ count($orders) }}</p>
            <!-- /USER STAT TITLE -->
    
            <!-- USER STAT TEXT -->
            <p class="user-stat-text">orders</p>
            <!-- /USER STAT TEXT -->
          </div>
          <!-- /USER STAT -->
  
          <!-- USER STAT -->
          <div class="user-stat big">
            <!-- USER STAT IMAGE -->
            <p class="user-stat-text">{{Auth::user()->country}}</p>
            <!-- /USER STAT TEXT -->
          </div>
          <!-- /USER STAT -->
        </div>
        <!-- /USER STATS -->
  
        <!-- PROFILE HEADER INFO ACTIONS -->
        <div class="profile-header-info-actions">
          <!-- PROFILE HEADER INFO ACTION -->
          <!-- <p class="profile-header-info-action button secondary"><span class="hide-text-mobile">Add</span> Friend +</p> -->
          <!-- /PROFILE HEADER INFO ACTION -->
          
          <!-- PROFILE HEADER INFO ACTION -->
          <!-- <p class="profile-header-info-action button primary"><span class="hide-text-mobile">Send</span> Message</p> -->
          <!-- /PROFILE HEADER INFO ACTION -->
        </div>
        <!-- /PROFILE HEADER INFO ACTIONS -->
      </div>
      <!-- /PROFILE HEADER INFO -->
    </div>