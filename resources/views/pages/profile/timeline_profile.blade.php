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

          <p class="widget-box-title">Badges <span class="highlighted">{{count($unlocked_badges)}}</span></p>

          <div class="widget-box-content">
            <div class="badge-list">
              @foreach ($unlocked_badges as $badge)
              <div class="badge-item text-tooltip-tft " data-title="{{$badge->badge->title}}">
                <img class="badge-style" src="{{asset($badge->badge->icon)}}" alt="{{$badge->badge->title}}">
              </div>
             @endforeach
            </div>
            
          </div>
          
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
         <button class="comment-modal-show-up-user trigger-commentButton-user" type="button" style="display: none">Click</button>
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
        <div class="widget-box no-padding" id="main_post_container_user" pageNameUser='2'> {{-- main START --}}

        
        </div>

        <!-- LOADER BARS -->
        <div class="loader-bars" id="loader_section_user">
         
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
          <p class="widget-box-title">Photos</p>

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
        
        
          @if (!is_null($item))
          <p class="widget-box-title">Latest Item</p>
          <div class="widget-box-content">
            <div class="product-preview small">
              <a href="{{ route('marketplace.product.show',$item->id) }}">
                <figure class="product-preview-image liquid">
                  <img src="{{asset('front/image/product/thumb/'.$item->thumbnail)}}" alt="item-01">
                </figure>
              </a>
              <div class="product-preview-info">
                
                <p class="text-sticker"><span class="highlighted">$</span>{{number_format($item->price,2)}}</p>
                <p class="product-preview-title"><a href="marketplace-product.html">{{$item->title}}</a></p>
                <p class="product-preview-category digital"><a href="marketplace-category.html">{{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</a></p>
                
              </div>
              
            </div>
          </div>
            @endif

          <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
      </div>
      <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
  </div>
@endsection

@section('all_modal')
  @include('layouts.inc.modals.balance_credit')
  @include('layouts.inc.modals.comment-user')
@endsection
