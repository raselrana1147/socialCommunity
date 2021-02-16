@extends('layouts.app')
@section('title',((Auth::user()->name !=null)? Auth::user()->name : Auth::user()->username))
@section('main_content')
   <div class="content-grid">
    <!-- PROFILE HEADER -->
  @include('layouts.inc.profile_header')
    <!-- /PROFILE HEADER -->

    <!-- SECTION NAVIGATION -->
   @include('layouts.inc.profile_nav')
    <!-- /SECTION NAVIGATION -->

    <!-- GRID -->
    <section class="section">
      <!-- SECTION HEADER -->
      <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
          
  
          <!-- SECTION TITLE -->
          <h2 class="section-title">Total Referrals <span class="highlighted">{{count($aff_users)}}</span></h2>
          <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
      </div>
      <!-- /SECTION HEADER -->

      <!-- SECTION FILTERS BAR -->
      <div class="section-filters-bar v1">
        <!-- SECTION FILTERS BAR ACTIONS -->
        <div class="section-filters-bar-actions">
            <div class="form-input">
              Your Refferal Link: <input id="friends-search" readonly="true" value="{{url('/').'/login/'.Auth::user()->affiliate_id}}" style="min-width: 500px; font-weight: 600">
              <button class="button small" id="copylink" data-url="{{url('/').'/login/'.Auth::user()->affiliate_id}}">Copy Link</button>
            </div>
        </div>
        <!-- /SECTION FILTERS BAR ACTIONS -->
        <!-- /SECTION FILTERS BAR ACTIONS -->
      </div>
      <!-- /SECTION FILTERS BAR -->

      <!-- GRID -->

      @if (count($aff_users)>0)
        {{-- expr --}}
     
      <div class="grid grid-3-3-3-3 centered">
        <!-- USER PREVIEW -->

       @foreach ($aff_users as $aff_user)

     
        <div class="user-preview small">
          <!-- USER PREVIEW COVER -->
          <figure class="user-preview-cover liquid">
            <img src="{{($aff_user->cover_photo !=null) ? asset('front/image/user/cover/'.$aff_user->cover_photo) : asset('front/image/user/cover.jpg') }}" alt="cover-04">
          </figure>
          <!-- /USER PREVIEW COVER -->
      
          <!-- USER PREVIEW INFO -->
          <div class="user-preview-info">
            <!-- USER SHORT DESCRIPTION -->
            <div class="user-short-description small">
              <!-- USER SHORT DESCRIPTION AVATAR -->
              <a class="user-short-description-avatar user-avatar" href="{{ route('friend.profile.timeline',$aff_user->username) }}">
                <!-- USER AVATAR BORDER -->
                <div class="user-avatar-border">
                  <!-- HEXAGON -->
                  <div class="hexagon-100-110"></div>
                  <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR BORDER -->
            
                <!-- USER AVATAR CONTENT -->
                <div class="user-avatar-content">
                  <!-- HEXAGON -->
                  <div class="hexagon-image-68-74" data-src="{{($aff_user->avatar !=null) ? asset('front/image/user/avatar/'.$aff_user->avatar) : asset('front/image/user/profile.jpg') }}"></div>
                  <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR CONTENT -->
            
                <!-- USER AVATAR PROGRESS -->
                <div class="user-avatar-progress">
                  <!-- HEXAGON -->
                  <div class="hexagon-progress-84-92"></div>
                  <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR PROGRESS -->
              </a>
              <!-- /USER SHORT DESCRIPTION AVATAR -->
        
              <!-- USER SHORT DESCRIPTION TITLE -->
              <p class="user-short-description-title"><a href="{{ route('friend.profile.timeline',$aff_user->username) }}">{{($aff_user->name !=null) ?  $aff_user->name :  $aff_user->username}}</a></p>
              <!-- /USER SHORT DESCRIPTION TITLE -->
        
              <!-- USER SHORT DESCRIPTION TEXT -->
              @if ($aff_user->website !=null)
               <p class="user-short-description-text"><a href="{{$aff_user->website}}" target="_blank">{{$aff_user->website}}</a></p>
               @else
                <p class="user-short-description-text"><span >Not Available</span></p>
              @endif
              
              <!-- /USER SHORT DESCRIPTION TEXT -->
            </div>
            <!-- /USER SHORT DESCRIPTION -->
        
            <!-- BADGE LIST -->
            <div class="badge-list small">
              <!-- BADGE ITEM -->
              <div class="badge-item">
                <img src="{{asset('front/img/badge/silver-s.png')}}" alt="badge-silver-s">
              </div>
              <!-- /BADGE ITEM -->
        
              <!-- BADGE ITEM -->
              <div class="badge-item">
                <img src="{{asset('front/img/badge/fcultivator-s.png')}}" alt="badge-fcultivator-s">
              </div>
              <!-- /BADGE ITEM -->
        
              <!-- BADGE ITEM -->
              <div class="badge-item">
                <img src="{{asset('front/img/badge/scientist-s.png')}}" alt="badge-scientist-s">
              </div>
              <!-- /BADGE ITEM -->
        
              <!-- BADGE ITEM -->
              <a class="badge-item" href="profile-badges.html">
                <img src="{{asset('front/img/badge/blank-s.png')}}" alt="badge-blank-s">
                <!-- BADGE ITEM TEXT -->
                <p class="badge-item-text">+29</p>
                <!-- /BADGE ITEM TEXT -->
              </a>
              <!-- /BADGE ITEM -->
            </div>
            <!-- /BADGE LIST -->
      
            <!-- USER STATS -->
            <div class="user-stats">
              <!-- USER STAT -->
              <div class="user-stat">
                <!-- USER STAT TITLE -->
                <p class="user-stat-title">{{count($aff_user->post)}}</p>
                <!-- /USER STAT TITLE -->
        
                <!-- USER STAT TEXT -->
                <p class="user-stat-text">posts</p>
                <!-- /USER STAT TEXT -->
              </div>
             
              <!-- /USER STAT -->
            </div>
            <!-- /USER STATS -->
      
            <!-- SOCIAL LINKS -->

            @php
 
              $twitter=App\Models\UserMeta::where('user_id',$aff_user->id)
              ->where('meta_type','social')
              ->where('meta_key','twitter')->first();

              $instagram=App\Models\UserMeta::where('user_id',$aff_user->id)
              ->where('meta_type','social')
              ->where('meta_key','instagram')->first();

              $twitch=App\Models\UserMeta::where('user_id',$aff_user->id)
              ->where('meta_type','social')
              ->where('meta_key','twitch')->first();

              $patreon=App\Models\UserMeta::where('user_id',$aff_user->id)
              ->where('meta_type','social')
              ->where('meta_key','patreon')->first();
            @endphp

            <div class="social-links small">
              <!-- SOCIAL LINK -->
              @if (!is_null($twitter))
              <a class="social-link small twitter" target="_blank" href="https://www.twitter.com/"{{$twitter->meta_value}}>
                <!-- SOCIAL LINK ICON -->
                <svg class="social-link-icon icon-twitter">
                  <use xlink:href="#svg-twitter"></use>
                </svg>
                <!-- /SOCIAL LINK ICON -->
              </a>
            @endif
              <!-- /SOCIAL LINK -->

              <!-- SOCIAL LINK -->
               @if (!is_null($instagram))
              <a class="social-link small instagram" target="_blank" href="https://www.instagram.com/"{{$instagram->meta_value}}>
                <!-- SOCIAL LINK ICON -->
                <svg class="social-link-icon icon-instagram">
                  <use xlink:href="#svg-instagram"></use>
                </svg>
                <!-- /SOCIAL LINK ICON -->
              </a>
              @endif
              <!-- /SOCIAL LINK -->

              <!-- SOCIAL LINK -->
             @if (!is_null($twitter))
              <a class="social-link small twitch" target="_blank" href="https://www.twitch.tv.com/"{{$twitch->meta_value}}>
                <!-- SOCIAL LINK ICON -->
                <svg class="social-link-icon icon-twitch">
                  <use xlink:href="#svg-twitch"></use>
                </svg>
                <!-- /SOCIAL LINK ICON -->
              </a>
            @endif
              <!-- /SOCIAL LINK -->

              <!-- SOCIAL LINK -->
            @if (!is_null($patreon))
              <a class="social-link small discord" target="_blank" href="https://www.patreon.tv.com/"{{$patreon->meta_value}}>
                <!-- SOCIAL LINK ICON -->
                <svg class="social-link-icon icon-discord">
                  <use xlink:href="#svg-discord"></use>
                </svg>
                <!-- /SOCIAL LINK ICON -->
              </a>
            @endif
              <!-- /SOCIAL LINK -->
            </div>
            <!-- /SOCIAL LINKS -->
          </div>
          <!-- /USER PREVIEW INFO -->

        </div>
    @endforeach

      </div>


    
    <div class="own-pagination">
        {{$aff_users->links()}}
    </div>

 @endif
      <!-- /SECTION PAGER BAR -->
    </section>
    <!-- /GRID -->
  </div>
@endsection

@section('all_modal')
  @include('layouts.inc.modals.balance_credit')
@endsection
