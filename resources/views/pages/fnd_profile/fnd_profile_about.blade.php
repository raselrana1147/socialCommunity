@extends('layouts.app')
@section('title',($fnd_user->name ==null) ? $fnd_user->username : $fnd_user->name)
@section('main_content')
   <div class="content-grid">
    <!-- PROFILE HEADER -->
@include('pages.fnd_profile.inc.fnd_profile_header')
    <!-- /PROFILE HEADER -->

    <!-- SECTION NAVIGATION -->
 @include('pages.fnd_profile.inc.fnd_profile_nav')
    <!-- /SECTION NAVIGATION -->

    <!-- GRID -->
    <div class="grid grid-3-6-3">
      <!-- GRID COLUMN -->
      <div class="grid-column">
        <!-- WIDGET BOX -->
        <div class="widget-box">
          <!-- WIDGET BOX SETTINGS -->
          <div class="widget-box-settings">
            <!-- POST SETTINGS WRAP -->
            <div class="post-settings-wrap">
              <!-- POST SETTINGS -->
              <div class="post-settings widget-box-post-settings-dropdown-trigger">
                <!-- POST SETTINGS ICON -->
                <svg class="post-settings-icon icon-more-dots">
                  <use xlink:href="#svg-more-dots"></use>
                </svg>
                <!-- /POST SETTINGS ICON -->
              </div>
              <!-- /POST SETTINGS -->
      
              <!-- SIMPLE DROPDOWN -->
              <div class="simple-dropdown widget-box-post-settings-dropdown">
                <!-- SIMPLE DROPDOWN LINK -->
                <p class="simple-dropdown-link">Widget Settings</p>
                <!-- /SIMPLE DROPDOWN LINK -->
              </div>
              <!-- /SIMPLE DROPDOWN -->
            </div>
            <!-- /POST SETTINGS WRAP -->
          </div>
          <!-- /WIDGET BOX SETTINGS -->
      
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">About Me</p>
          <!-- /WIDGET BOX TITLE -->
      
          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- PARAGRAPH -->
            <p class="paragraph">Hi! My name is Marina but some people may know me as GameHuntress! I have a Twitch channel where I stream, play and review all the newest games.</p>
            <!-- /PARAGRAPH -->
      
            <!-- INFORMATION LINE LIST -->
            <div class="information-line-list">
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Joined</p>
                <!-- /INFORMATION LINE TITLE -->
      
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{date('M jS, Y', strtotime($fnd_user->created_at))}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
              @if ($fnd_user->city !=null)
              <div class="information-line">
                <p class="information-line-title">City</p>
                <p class="information-line-text">{{$fnd_user->city}}</p>
              </div>
             @endif
              <!-- /INFORMATION LINE -->
      
             @if ($fnd_user->country !=null)
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Country</p>
                <p class="information-line-text">{{$fnd_user->country}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
             @endif
      
              <!-- INFORMATION LINE -->
              @if ($fnd_user->dob !=null)
              <div class="information-line">
                <p class="information-line-title">Age</p>
                <p class="information-line-text">{{ round((time() - strtotime($fnd_user->dob))/31556926)}} Years</p>
              </div>
              @endif
            @if ($fnd_user->dob !=null)
              <div class="information-line">
                <p class="information-line-title">Web</p>
                <p class="information-line-text"><a href="#">{{$fnd_user->website}}</a></p>
              </div>
             @endif
            </div>
            <!-- /INFORMATION LINE LIST -->
          </div>
          <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
      
        <!-- WIDGET BOX -->
        <div class="widget-box">
          <!-- WIDGET BOX SETTINGS -->
          <div class="widget-box-settings">
            <!-- POST SETTINGS WRAP -->
            <div class="post-settings-wrap">
              <!-- POST SETTINGS -->
              <div class="post-settings widget-box-post-settings-dropdown-trigger">
                <!-- POST SETTINGS ICON -->
                <svg class="post-settings-icon icon-more-dots">
                  <use xlink:href="#svg-more-dots"></use>
                </svg>
                <!-- /POST SETTINGS ICON -->
              </div>
              <!-- /POST SETTINGS -->
      
              <!-- SIMPLE DROPDOWN -->
              <div class="simple-dropdown widget-box-post-settings-dropdown">
                <!-- SIMPLE DROPDOWN LINK -->
                <p class="simple-dropdown-link">Widget Settings</p>
                <!-- /SIMPLE DROPDOWN LINK -->
              </div>
              <!-- /SIMPLE DROPDOWN -->
            </div>
            <!-- /POST SETTINGS WRAP -->
          </div>
          <!-- /WIDGET BOX SETTINGS -->
      
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Personal Info</p>
          <!-- /WIDGET BOX TITLE -->
      
          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- INFORMATION LINE LIST -->
            <div class="information-line-list">
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Email</p>
                <!-- /INFORMATION LINE TITLE -->
      
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{$fnd_user->email}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
              @if ($fnd_user->dob !=null)
             
              <div class="information-line">
                <p class="information-line-title">Birthday</p>
                <p class="information-line-text">{{date('M jS, Y',strtotime($fnd_user->dob))}}</p>
              </div>
             @endif
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
               @if ($fnd_user->occupation !=null)
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Occupation</p>
                <!-- /INFORMATION LINE TITLE -->
      
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{$fnd_user->occupation}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
               @endif
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <p class="information-line-title">Status</p>
                <p class="information-line-text">{{App\helpers\Help::relationStatus($fnd_user->life_status)}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
              @if ($fnd_user->birth_place !=null)
            
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Birthplace</p>
                <!-- /INFORMATION LINE TITLE -->
      
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{$fnd_user->birth_place}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>

              @endif
              <!-- /INFORMATION LINE -->
            </div>
            <!-- /INFORMATION LINE LIST -->
          </div>
          <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
      </div>
      <!-- /GRID COLUMN -->

      <!-- GRID COLUMN -->
      <div class="grid-column">
        <!-- WIDGET BOX -->
       
        <div class="widget-box">
          <!-- WIDGET BOX SETTINGS -->
          <div class="widget-box-settings">
            <!-- POST SETTINGS WRAP -->
            <div class="post-settings-wrap">
              <!-- POST SETTINGS -->
              <div class="post-settings widget-box-post-settings-dropdown-trigger">
                <!-- POST SETTINGS ICON -->
                <svg class="post-settings-icon icon-more-dots">
                  <use xlink:href="#svg-more-dots"></use>
                </svg>
                <!-- /POST SETTINGS ICON -->
              </div>
              <!-- /POST SETTINGS -->
      
              <!-- SIMPLE DROPDOWN -->
              <div class="simple-dropdown widget-box-post-settings-dropdown">
                <!-- SIMPLE DROPDOWN LINK -->
                <p class="simple-dropdown-link">Widget Settings</p>
                <!-- /SIMPLE DROPDOWN LINK -->
              </div>
              <!-- /SIMPLE DROPDOWN -->
            </div>
            <!-- /POST SETTINGS WRAP -->
          </div>
          <!-- /WIDGET BOX SETTINGS -->
      
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Interests</p>
          <!-- /WIDGET BOX TITLE -->
      
          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- INFORMATION BLOCK LIST -->
            <div class="information-block-list">
              <!-- INFORMATION BLOCK -->
              @php
                $tv_show=App\Models\UserMeta::where('user_id',$fnd_user->id)
                ->where('meta_key','tv_shows')->where('meta_type','interest')->first();

                 $artist=App\Models\UserMeta::where('user_id',$fnd_user->id)
                ->where('meta_key','brand_artist')->where('meta_type','interest')->first();

                 $movie=App\Models\UserMeta::where('user_id',$fnd_user->id)
                ->where('meta_key','movies')->where('meta_type','interest')->first();


                 $game=App\Models\UserMeta::where('user_id',$fnd_user->id)
                ->where('meta_key','games')->where('meta_type','interest')->first();

                 $book=App\Models\UserMeta::where('user_id',$fnd_user->id)
                ->where('meta_key','books')->where('meta_type','interest')->first();

                 $hobby=App\Models\UserMeta::where('user_id',$fnd_user->id)
                ->where('meta_key','hobbies')->where('meta_type','interest')->first();

              @endphp
              @if (!is_null($tv_show))
             
              <div class="information-block">
                <!-- INFORMATION BLOCK TITLE -->
                <p class="information-block-title">Favourite TV Shows</p>
                <p class="information-block-text">{{$tv_show->meta_value}}</p>
                <!-- /INFORMATION BLOCK TEXT -->
              </div>
               @endif
               @if (!is_null($artist))
              <div class="information-block">
                <p class="information-block-title">Favourite Music Bands / Artists</p>
                <p class="information-block-text">{{$artist->meta_value}}</p>
                <!-- /INFORMATION BLOCK TEXT -->
              </div>
              @endif
              <!-- /INFORMATION BLOCK -->
      
              <!-- INFORMATION BLOCK -->
               @if (!is_null($movie))
              <div class="information-block">
                <!-- INFORMATION BLOCK TITLE -->
                <p class="information-block-title">Favourite Movies</p>
                <!-- /INFORMATION BLOCK TITLE -->
      
                <!-- INFORMATION BLOCK TEXT -->
                <p class="information-block-text">{{$movie->meta_value}}</p>
                <!-- /INFORMATION BLOCK TEXT -->
              </div>
              @endif
              <!-- /INFORMATION BLOCK -->
      
              <!-- INFORMATION BLOCK -->
               @if (!is_null($book))
              <div class="information-block">
                <!-- INFORMATION BLOCK TITLE -->
                <p class="information-block-title">Favourite Books</p>
                <p class="information-block-text">{{$book->meta_value}}</p>
                <!-- /INFORMATION BLOCK TEXT -->
              </div>
              @endif

               @if (!is_null($game))
              <div class="information-block">
                <!-- INFORMATION BLOCK TITLE -->
                <p class="information-block-title">Favourite Games</p>
                <p class="information-block-text">{{$game->meta_value}}.</p>
                <!-- /INFORMATION BLOCK TEXT -->
              </div>
              @endif


               @if (!is_null($hobby))
              <div class="information-block">
                <!-- INFORMATION BLOCK TITLE -->
                <p class="information-block-title">Favourite Hobbies</p>
                <p class="information-block-text">{{$hobby->meta_value}}.</p>
                <!-- /INFORMATION BLOCK TEXT -->
              </div>
              @endif
              <!-- /INFORMATION BLOCK -->
            </div>
            <!-- /INFORMATION BLOCK LIST -->
          </div>
          <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
      
        <!-- WIDGET BOX -->
        <!-- /WIDGET BOX -->
      </div>
      <!-- /GRID COLUMN -->

      <!-- GRID COLUMN -->
      <div class="grid-column">
        <!-- WIDGET BOX -->
        <div class="widget-box">
          <!-- PROGRESS ARC SUMMARY -->
          <div class="progress-arc-summary">
            <!-- PROGRESS ARC WRAP -->
            <div class="progress-arc-wrap">
              <!-- PROGRESS ARC -->
              <div class="progress-arc">
                <canvas id="profile-completion-chart"></canvas>
              </div>
              <!-- PROGRESS ARC -->
        
              <!-- PROGRESS ARC INFO -->
              <div class="progress-arc-info">
                <!-- PROGRESS ARC TITLE -->
                <p class="progress-arc-title">59%</p>
                <!-- /PROGRESS ARC TITLE -->
              </div>
              <!-- /PROGRESS ARC INFO -->
            </div>
            <!-- /PROGRESS ARC WRAP -->
        
            <!-- PROGRESS ARC SUMMARY INFO -->
            <div class="progress-arc-summary-info">
              <!-- PROGRESS ARC SUMMARY TITLE -->
              <p class="progress-arc-summary-title">Profile Completion</p>
              <!-- /PROGRESS ARC SUMMARY TITLE -->
        
              <!-- PROGRESS ARC SUMMARY TITLE -->
              <p class="progress-arc-summary-subtitle">{{($fnd_user->name !=null) ?  $fnd_user->name : $fnd_user->username}}</p>
              <!-- /PROGRESS ARC SUMMARY TITLE -->
        
              <!-- PROGRESS ARC SUMMARY TITLE -->
              <p class="progress-arc-summary-text">Complete your profile by filling profile info fields, completing quests &amp; unlocking badges</p>
              <!-- /PROGRESS ARC SUMMARY TITLE -->
            </div>
            <!-- /PROGRESS ARC SUMMARY INFO -->
          </div>
          <!-- /PROGRESS ARC SUMMARY -->
      
          <!-- ACHIEVEMENT STATUS LIST -->
          <div class="achievement-status-list">
            <!-- ACHIEVEMENT STATUS -->
            <div class="achievement-status">
              <!-- ACHIEVEMENT STATUS PROGRESS -->
              <p class="achievement-status-progress">11/30</p>
              <!-- /ACHIEVEMENT STATUS PROGRESS -->
      
              <!-- ACHIEVEMENT STATUS INFO -->
              <div class="achievement-status-info">
                <!-- ACHIEVEMENT STATUS TITLE -->
                <p class="achievement-status-title">Quests</p>
                <!-- /ACHIEVEMENT STATUS TITLE -->
                
                <!-- ACHIEVEMENT STATUS TEXT -->
                <p class="achievement-status-text">Completed</p>
                <!-- /ACHIEVEMENT STATUS TEXT -->
              </div>
              <!-- /ACHIEVEMENT STATUS INFO -->
      
              <!-- ACHIEVEMENT STATUS IMAGE -->
              <img class="achievement-status-image" src="{{asset('front/img/badge/completedq-s.png')}}" alt="bdage-completedq-s">
              <!-- /ACHIEVEMENT STATUS IMAGE -->
            </div>
            <!-- /ACHIEVEMENT STATUS -->
      
            <!-- ACHIEVEMENT STATUS -->
            <div class="achievement-status">
              <!-- ACHIEVEMENT STATUS PROGRESS -->
              <p class="achievement-status-progress">22/46</p>
              <!-- /ACHIEVEMENT STATUS PROGRESS -->
      
              <!-- ACHIEVEMENT STATUS INFO -->
              <div class="achievement-status-info">
                <!-- ACHIEVEMENT STATUS TITLE -->
                <p class="achievement-status-title">Badges</p>
                <!-- /ACHIEVEMENT STATUS TITLE -->
                
                <!-- ACHIEVEMENT STATUS TEXT -->
                <p class="achievement-status-text">Unlocked</p>
                <!-- /ACHIEVEMENT STATUS TEXT -->
              </div>
              <!-- /ACHIEVEMENT STATUS INFO -->
      
              <!-- ACHIEVEMENT STATUS IMAGE -->
              <img class="achievement-status-image" src="{{asset('front/img/badge/unlocked-badge.png')}}" alt="bdage-unlocked-badge">
              <!-- /ACHIEVEMENT STATUS IMAGE -->
            </div>
            <!-- /ACHIEVEMENT STATUS -->
          </div>
          <!-- /ACHIEVEMENT STATUS LIST -->
        </div>

      </div>
      <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
  </div>
@endsection

@section('all_modal')
  @include('layouts.inc.modals.balance_credit')
@endsection
