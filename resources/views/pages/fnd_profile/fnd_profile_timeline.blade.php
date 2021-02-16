@extends('layouts.app')
@section('title',($fnd_user->name ==null) ? $fnd_user->username : $fnd_user->name )
@section('main_content')
   <div class="content-grid">
    <!-- PROFILE HEADER -->
  @include('pages.fnd_profile.inc.fnd_profile_header')
    <!-- /PROFILE HEADER -->

    <!-- SECTION NAVIGATION -->
   @include('pages.fnd_profile.inc.fnd_profile_nav')
    <!-- /SECTION NAVIGATION -->

   <div class="grid grid-3-6-3 mobile-prefer-content">
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
          <p class="widget-box-title">Badges <span class="highlighted">{{count($badges)}}</span></p>
          <div class="widget-box-content">
           
            <div class="badge-list">
             @foreach ($badges as $badge)

              <div class="badge-item text-tooltip-tft" data-title="Gold User">
                <img class="badge-style" src="{{ asset($badge->badge->icon) }}" alt="{{$badge->badge->title}}">
              </div>
             @endforeach
            </div>
           
          </div>
      </div>
      </div>
      <!-- /GRID COLUMN -->

      <!-- GRID COLUMN -->
      <div class="grid-column">


         <button class="comment-modal-show-up-fnd trigger-commentButton-fnd" type="button" style="display: none">Click</button>
        <div class="widget-box no-padding" id="main_post_container_fnd" userId="{{$fnd_user->id}}" pageNameFnd="3">
         
        </div>

        <!-- LOADER BARS -->
        <div class="loader-bars" id="loader_section_fnd">

        </div>
        <!-- /LOADER BARS -->
      </div>
      <!-- /GRID COLUMN -->

      <!-- GRID COLUMN -->
      <div class="grid-column">
        <!-- WIDGET BOX -->
       
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
          <p class="widget-box-title">Photos <span class="highlighted"></span></p>
          <div class="widget-box-content">
              
          <div class="picture-item-list small">
            @foreach ($post_photos as $photo)
              <div class="picture-item">
                <figure class="picture round liquid">
                  <img src="{{asset('front/image/post/'.$photo->image)}}" alt="avatar-01">
                </figure>
              </div>
           @endforeach
            </div>
            
          </div>
          
        </div>

        @if (!is_null($item))
        <div class="widget-box">
          <p class="widget-box-title">Latest Item</p>
          <div class="widget-box-content">
            <div class="product-preview small">
              <a href="{{ route('marketplace.product.show',$item->id) }}">
                <figure class="product-preview-image liquid">
                  <img src="{{asset('front/image/product/thumb/'.$item->thumbnail)}}" alt="item-01">
                </figure>
              </a>
              <div class="product-preview-info">
                <p class="text-sticker"><span class="highlighted">$</span> {{number_format($item->price,2)}}</p>
                <p class="product-preview-title"><a href="{{ route('marketplace.product.show',$item->id) }}">{{$item->title}}</a></p>
                <p class="product-preview-category digital">{{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</p>
              </div>
            </div>
          </div>
        </div>
       @endif
      </div>
    </div>
  </div>
@endsection

@section('all_modal')
 @include('layouts.inc.modals.comment-fnd')
@endsection

