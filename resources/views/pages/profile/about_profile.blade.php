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
                <p class="information-line-text">{{date('M jS, Y', strtotime(Auth::user()->created_at))}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
              @if (Auth::user()->city !=null)
              <div class="information-line">
                <p class="information-line-title">City</p>
                <p class="information-line-text">{{Auth::user()->city}}</p>
              </div>
             @endif
              <!-- /INFORMATION LINE -->
      
             @if (Auth::user()->country !=null)
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Country</p>
                <p class="information-line-text">{{Auth::user()->country}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
             @endif
      
              <!-- INFORMATION LINE -->
              @if (Auth::user()->dob !=null)
              <div class="information-line">
                <p class="information-line-title">Age</p>
                <p class="information-line-text">{{ round((time() - strtotime(Auth::user()->dob))/31556926)}} Years</p>
              </div>
              @endif
            @if (Auth::user()->dob !=null)
              <div class="information-line">
                <p class="information-line-title">Web</p>
                <p class="information-line-text"><a href="#">{{Auth::user()->website}}</a></p>
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
                <p class="information-line-text">{{Auth::user()->email}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
              @if (Auth::user()->dob !=null)
             
              <div class="information-line">
                <p class="information-line-title">Birthday</p>
                <p class="information-line-text">{{date('M jS, Y',strtotime(Auth::user()->dob))}}</p>
              </div>
             @endif
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
               @if (Auth::user()->occupation !=null)
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Occupation</p>
                <!-- /INFORMATION LINE TITLE -->
      
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{Auth::user()->occupation}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
               @endif
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <p class="information-line-title">Status</p>
                <p class="information-line-text">{{App\helpers\Help::relationStatus(Auth::user()->life_status)}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
              @if (Auth::user()->birth_place !=null)
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Birthplace</p>
                <!-- /INFORMATION LINE TITLE -->
      
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{Auth::user()->birth_place}}</p>
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
        <div class="quick-post">
          <!-- QUICK POST HEADER -->
          <div class="quick-post-header">
            <!-- OPTION ITEMS -->
            <div class="option-items">
              <!-- OPTION ITEM -->
              <div class="option-item active">
                <!-- OPTION ITEM ICON -->
                <svg class="option-item-icon icon-status">
                  <use xlink:href="#svg-status"></use>
                </svg>
                <!-- /OPTION ITEM ICON -->
        
                <!-- OPTION ITEM TITLE -->
                <p class="option-item-title">Status</p>
                <!-- /OPTION ITEM TITLE -->
              </div>
              <!-- /OPTION ITEM -->
        
              <!-- OPTION ITEM -->
              <div class="option-item">
                <!-- OPTION ITEM ICON -->
                <svg class="option-item-icon icon-blog-posts">
                  <use xlink:href="#svg-blog-posts"></use>
                </svg>
                <!-- /OPTION ITEM ICON -->
        
                <!-- OPTION ITEM TITLE -->
                <p class="option-item-title">Blog Post</p>
                <!-- /OPTION ITEM TITLE -->
              </div>
              <!-- /OPTION ITEM -->
        
              <!-- OPTION ITEM -->
              <div class="option-item">
                <!-- OPTION ITEM ICON -->
                <svg class="option-item-icon icon-poll">
                  <use xlink:href="#svg-poll"></use>
                </svg>
                <!-- /OPTION ITEM ICON -->
        
                <!-- OPTION ITEM TITLE -->
                <p class="option-item-title">Poll</p>
                <!-- /OPTION ITEM TITLE -->
              </div>
              <!-- /OPTION ITEM -->
            </div>
            <!-- /OPTION ITEMS -->
          </div>
          <!-- /QUICK POST HEADER -->
        
          <!-- QUICK POST BODY -->
          <form class="form" id="postform" data-action="{{ route('user.post.create') }}" enctype="multipart/form-data" method="post">
          <div class="quick-post-body">
              <!-- FORM ROW -->
                @csrf
              <div class="form-row">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM TEXTAREA -->
                  <div class="form-textarea">
                    <textarea id="quick-post-text" name="post_text" placeholder="Hi, {{(Auth::user()->name !=null) ? Auth::user()->name :  Auth::user()->username}} share your post here..."></textarea>
                    <!-- FORM TEXTAREA LIMIT TEXT -->
                    <p class="form-textarea-limit-text">998/1000</p>
                    <!-- /FORM TEXTAREA LIMIT TEXT -->
                    <div id="imagePreview" style="background-image: url('{{ asset('front/img/achievement/banner/01.jpg') }}');"></div>
                  </div>
                  <!-- /FORM TEXTAREA -->
                </div>
                <!-- /FORM ITEM -->
              </div>
            <!-- /FORM -->
          </div>
          <!-- /QUICK POST BODY -->
        
          <!-- QUICK POST FOOTER -->
          <div class="quick-post-footer">
            <!-- QUICK POST FOOTER ACTIONS -->
            <div class="quick-post-footer-actions">
              <!-- QUICK POST FOOTER ACTION -->
              <div class="quick-post-footer-action text-tooltip-tft-medium" data-title="Insert Photo">
                <!-- QUICK POST FOOTER ACTION ICON -->
                <svg class="quick-post-footer-action-icon icon-camera" id="imageGrabber">
                  <use xlink:href="#svg-camera"></use>
                </svg>
                <input type="file" class="d-none" name="postimg" id="imageUpper">
                <!-- /QUICK POST FOOTER ACTION ICON -->
              </div>
              <!-- /QUICK POST FOOTER ACTION -->
        
              <!-- QUICK POST FOOTER ACTION -->
              <div class="quick-post-footer-action text-tooltip-tft-medium" data-title="Insert GIF">
                <!-- QUICK POST FOOTER ACTION ICON -->
                <svg class="quick-post-footer-action-icon icon-gif">
                  <use xlink:href="#svg-gif"></use>
                </svg>
                <!-- /QUICK POST FOOTER ACTION ICON -->
              </div>
              <!-- /QUICK POST FOOTER ACTION -->
        
              <!-- QUICK POST FOOTER ACTION -->
              <div class="quick-post-footer-action text-tooltip-tft-medium" data-title="Insert Tag">
                <!-- QUICK POST FOOTER ACTION ICON -->
                <svg class="quick-post-footer-action-icon icon-tags">
                  <use xlink:href="#svg-tags"></use>
                </svg>
                <!-- /QUICK POST FOOTER ACTION ICON -->
              </div>
              <!-- /QUICK POST FOOTER ACTION -->
            </div>
            <!-- /QUICK POST FOOTER ACTIONS -->
        
              <!-- QUICK POST FOOTER ACTIONS -->
              <div class="quick-post-footer-actions">
                <!-- BUTTON -->
                <p class="button small void">Discard</p>
                <!-- /BUTTON -->
                <!-- BUTTON -->
                <button class="button small secondary" type="submit" name="post_submit">Post</button>
               
                <!-- /BUTTON -->
              </div>
              <!-- /QUICK POST FOOTER ACTIONS -->
          </div>
          <!-- /QUICK POST FOOTER -->
        </div>
        <!-- /QUICK POST -->
        </form>
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
                $tv_show=App\Models\UserMeta::where('user_id',Auth::user()->id)
                ->where('meta_key','tv_shows')->where('meta_type','interest')->first();

                 $artist=App\Models\UserMeta::where('user_id',Auth::user()->id)
                ->where('meta_key','brand_artist')->where('meta_type','interest')->first();

                 $movie=App\Models\UserMeta::where('user_id',Auth::user()->id)
                ->where('meta_key','movies')->where('meta_type','interest')->first();


                 $game=App\Models\UserMeta::where('user_id',Auth::user()->id)
                ->where('meta_key','games')->where('meta_type','interest')->first();

                 $book=App\Models\UserMeta::where('user_id',Auth::user()->id)
                ->where('meta_key','books')->where('meta_type','interest')->first();

                 $hobby=App\Models\UserMeta::where('user_id',Auth::user()->id)
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
              <p class="progress-arc-summary-subtitle">{{(Auth::user()->name !=null) ?  Auth::user()->name : Auth::user()->username}}</p>
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
