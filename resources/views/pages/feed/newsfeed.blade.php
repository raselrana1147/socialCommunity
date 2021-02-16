@extends('layouts.app')
@section('title','News Feed')
@section('main_content')
	<div class="content-grid">
	   <!-- SECTION BANNER -->
	   <div class="section-banner">
	     <!-- SECTION BANNER ICON -->
	     <img class="section-banner-icon" src="{{asset('front/img/banner/newsfeed-icon.png')}}" alt="newsfeed-icon">
	     <!-- /SECTION BANNER ICON -->
	 
	     <!-- SECTION BANNER TITLE -->
	     <p class="section-banner-title">Newsfeed</p>
	     <!-- /SECTION BANNER TITLE -->
	 
	     <!-- SECTION BANNER TEXT -->
	     <p class="section-banner-text">Check what your friends have been up to!</p>
	     <!-- /SECTION BANNER TEXT -->
	   </div>
	   <!-- /SECTION BANNER -->

	   <!-- GRID -->
	   <div class="grid grid-3-6-3 mobile-prefer-content">
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
	             <p class="progress-arc-summary-subtitle">
					 {{ (!empty(Auth::user()->name)?Auth::user()->name:Auth::user()->username) }}
				 </p>
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
	             <p class="achievement-status-progress">{{ count($completed_quests) }}/{{ count($quests) }}</p>
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
	             <p class="achievement-status-progress">{{ count($unlocked_badges) }}/{{ count($badges) }}</p>
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
	       <!-- /WIDGET BOX -->

	       <!-- WIDGET BOX -->
	       <div class="widget-box">
	         <!-- WIDGET BOX CONTROLS -->
	         <div class="widget-box-controls">
	           <!-- SLIDER CONTROLS -->
	           <div id="badge-stat-slider-controls" class="slider-controls">
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
	         <!-- /WIDGET BOX CONTROLS -->

	         <!-- WIDGET BOX TITLE -->
	         <p class="widget-box-title">Featured Badges</p>
	         <!-- /WIDGET BOX TITLE -->

	         <!-- WIDGET BOX CONTENT -->
	         <div class="widget-box-content">
	           <!-- WIDGET BOX CONTENT SLIDER -->
	           <div id="badge-stat-slider-items" class="widget-box-content-slider">
	             <!-- WIDGET BOX CONTENT SLIDER ITEM -->
	             <div class="widget-box-content-slider-item">
	               <!-- BADGE ITEM STAT -->
	               <div class="badge-item-stat void">
	                 <!-- TEXT STICKER -->
	                 <p class="text-sticker">
	                   <!-- TEXT STICKER ICON -->
	                   <svg class="text-sticker-icon icon-plus-small">
	                     <use xlink:href="#svg-plus-small"></use>
	                   </svg>
	                   <!-- TEXT STICKER ICON -->
	                   20 Exp
	                 </p>
	                 <!-- /TEXT STICKER -->

	                 <!-- BADGE ITEM STAT IMAGE -->
	                 <img class="badge-item-stat-image" src="{{asset('front/img/badge/uexp-b.png')}}" alt="badge-uexp-b">
	                 <!-- /BADGE ITEM STAT IMAGE -->

	                 <!-- BADGE ITEM STAT TITLE -->
	                 <p class="badge-item-stat-title">Universe Explorer</p>
	                 <!-- /BADGE ITEM STAT TITLE -->

	                 <!-- BADGE ITEM STAT TEXT -->
	                 <p class="badge-item-stat-text">Joined and posted on 20 different groups</p>
	                 <!-- /BADGE ITEM STAT TEXT -->

	                 <!-- PROGRESS STAT -->
	                 <div class="progress-stat medium">
	                   <!-- PROGRESS STAT BAR -->
	                   <div id="badge-uexp" class="progress-stat-bar"></div>
	                   <!-- /PROGRESS STAT BAR -->

	                   <!-- BAR PROGRESS WRAP -->
	                   <div class="bar-progress-wrap">
	                     <!-- BAR PROGRESS INFO -->
	                     <p class="bar-progress-info negative center"><span class="bar-progress-text no-space"></span></p>
	                     <!-- /BAR PROGRESS INFO -->
	                   </div>
	                   <!-- /BAR PROGRESS WRAP -->
	                 </div>
	                 <!-- /PROGRESS STAT -->
	               </div>
	               <!-- /BADGE ITEM STAT -->
	             </div>
	             <!-- /WIDGET BOX CONTENT SLIDER ITEM -->

	             <!-- WIDGET BOX CONTENT SLIDER ITEM -->
	             <div class="widget-box-content-slider-item">
	               <!-- BADGE ITEM STAT -->
	               <div class="badge-item-stat void">
	                 <!-- TEXT STICKER -->
	                 <p class="text-sticker">
	                   <!-- TEXT STICKER ICON -->
	                   <svg class="text-sticker-icon icon-plus-small">
	                     <use xlink:href="#svg-plus-small"></use>
	                   </svg>
	                   <!-- TEXT STICKER ICON -->
	                   40 Exp
	                 </p>
	                 <!-- /TEXT STICKER -->

	                 <!-- BADGE ITEM STAT IMAGE -->
	                 <img class="badge-item-stat-image" src="{{asset('front/img/badge/verifieds-b.png')}}" alt="badge-verifieds-b">
	                 <!-- /BADGE ITEM STAT IMAGE -->

	                 <!-- BADGE ITEM STAT TITLE -->
	                 <p class="badge-item-stat-title">Verified Streamer</p>
	                 <!-- /BADGE ITEM STAT TITLE -->

	                 <!-- BADGE ITEM STAT TEXT -->
	                 <p class="badge-item-stat-text">Has linked a stream that was verified by the staff</p>
	                 <!-- /BADGE ITEM STAT TEXT -->

	                 <!-- PROGRESS STAT -->
	                 <div class="progress-stat medium">
	                   <!-- PROGRESS STAT BAR -->
	                   <div id="badge-verifieds" class="progress-stat-bar"></div>
	                   <!-- /PROGRESS STAT BAR -->

	                   <!-- BAR PROGRESS WRAP -->
	                   <div class="bar-progress-wrap">
	                     <!-- BAR PROGRESS INFO -->
	                     <p class="bar-progress-info negative center"><span class="bar-progress-text no-space"></span></p>
	                     <!-- /BAR PROGRESS INFO -->
	                   </div>
	                   <!-- /BAR PROGRESS WRAP -->
	                 </div>
	                 <!-- /PROGRESS STAT -->
	               </div>
	               <!-- /BADGE ITEM STAT -->
	             </div>
	             <!-- /WIDGET BOX CONTENT SLIDER ITEM -->

	             <!-- WIDGET BOX CONTENT SLIDER ITEM -->
	             <div class="widget-box-content-slider-item">
	               <!-- BADGE ITEM STAT -->
	               <div class="badge-item-stat void">
	                 <!-- TEXT STICKER -->
	                 <p class="text-sticker">
	                   <!-- TEXT STICKER ICON -->
	                   <svg class="text-sticker-icon icon-plus-small">
	                     <use xlink:href="#svg-plus-small"></use>
	                   </svg>
	                   <!-- TEXT STICKER ICON -->
	                   40 Exp
	                 </p>
	                 <!-- /TEXT STICKER -->

	                 <!-- BADGE ITEM STAT IMAGE -->
	                 <img class="badge-item-stat-image" src="{{asset('front/img/badge/qconq-b.png')}}" alt="badge-qconq-b">
	                 <!-- /BADGE ITEM STAT IMAGE -->

	                 <!-- BADGE ITEM STAT TITLE -->
	                 <p class="badge-item-stat-title">Quest Conqueror</p>
	                 <!-- /BADGE ITEM STAT TITLE -->

	                 <!-- BADGE ITEM STAT TEXT -->
	                 <p class="badge-item-stat-text">Succesfully completed at least 10 quests at 100%</p>
	                 <!-- /BADGE ITEM STAT TEXT -->

	                 <!-- PROGRESS STAT -->
	                 <div class="progress-stat medium">
	                   <!-- PROGRESS STAT BAR -->
	                   <div id="badge-qconq" class="progress-stat-bar"></div>
	                   <!-- /PROGRESS STAT BAR -->

	                   <!-- BAR PROGRESS WRAP -->
	                   <div class="bar-progress-wrap">
	                     <!-- BAR PROGRESS INFO -->
	                     <p class="bar-progress-info negative center"><span class="bar-progress-text no-space"></span></p>
	                     <!-- /BAR PROGRESS INFO -->
	                   </div>
	                   <!-- /BAR PROGRESS WRAP -->
	                 </div>
	                 <!-- /PROGRESS STAT -->
	               </div>
	               <!-- /BADGE ITEM STAT -->
	             </div>
	             <!-- /WIDGET BOX CONTENT SLIDER ITEM -->
	           </div>
	           <!-- /WIDGET BOX CONTENT SLIDER -->
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
	         <p class="widget-box-title">Recent Members</p>
	         @if (count($recent_users)>0)
	         	@foreach ($recent_users as $recent_user)
	         	@if ($recent_user->id !=Auth::user()->id)
	         <div class="widget-box-content">
	           <div class="user-status-list">
	             <div class="user-status request-small">
	           	
	               <a class="user-status-avatar" href="{{route('friend.profile.timeline',$recent_user->username)}}">
	              	
	                 <div class="user-avatar small no-outline">
	                   	
	                   <div class="user-avatar-content">
	                    	
	                     <div class="hexagon-image-30-32" data-src="{{$recent_user->avatar !=null ?  asset('front/image/user/avatar/'.$recent_user->avatar) : asset('front/image/user/profile.jpg') }}"></div>
	                    	
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
	
	                     <p class="user-avatar-badge-text">26</p>
	                   </div>
	                 </div>	
	               </a>
	               <p class="user-status-title"><a class="bold" href="{{route('friend.profile.timeline',$recent_user->username)}}">{{$recent_user->name !=null ? $recent_user->name : $recent_user->username}}</a></p>
	               <p class="user-status-text small">{{Carbon\Carbon::parse($recent_user->created_at)->diffForHumans()}}</p>
	               @php
	               	$check_two_way=App\Models\Friend::whereIn('request_to', [$recent_user->id, Auth::user()->id])
	               	 ->whereIn('request_from', [$recent_user->id, Auth::user()->id])
	               	 ->first();
	               @endphp
					@if (is_null($check_two_way))
		               <div class="action-request-list">
		                 <div class="action-request accept friend_request_send hide_after_request{{$recent_user->id}}" data-target="{{$recent_user->id}}">
		                   <svg class="action-request-icon icon-add-friend">
		                     <use xlink:href="#svg-add-friend"></use>
		                   </svg>
		                 </div>
		               </div>
	             	@endif
	             </div>
	           </div>
	         </div>
	         @endif
	         @endforeach

           @endif


	         <!-- WIDGET BOX CONTENT -->
	       </div>
	      @if (count($completed_quests)>0)
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
	       
	         	{{-- expr --}}
	        
	         <p class="widget-box-title">Open Quests</p>
	     
	         <div class="widget-box-content">
	          
	           <div class="quest-preview-list">
	    
	             @foreach ($completed_quests as $comp_quest)
	             <div class="quest-preview">
	           
	               <div class="quest-preview-info">
	                 <img class="quest-preview-image" src="{{asset($comp_quest->quest->icon)}}" alt="openq-s">
	    
	                 <p class="quest-preview-title">{{$comp_quest->quest->title}}</p>
	       
	                 <p class="quest-preview-text">You have completed all your profile information fields</p>
	                 
	               </div>
	       
	               <div class="progress-stat">
	         
	                 <div id="quest-preview-nth" class="progress-stat-bar"></div>
	        
	               </div>
	     
	             </div>
	              @endforeach
	           </div>
	           <!-- /QUEST PREVIEW LIST -->
	         </div>

	         <!-- WIDGET BOX CONTENT -->
	     
	         <!-- WIDGET BOX BUTTON -->
	         <a class="widget-box-button button small white" href="quests.html">See all Quests!</a>
	         <!-- /WIDGET BOX BUTTON -->
	       </div>
	        @endif
	       <!-- /WIDGET BOX -->
	     </div>
	     <!-- /GRID COLUMN -->
 
	     <!-- GRID COLUMN -->
	     <div class="grid-column">
	       <!-- QUICK POST -->
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
	     <button class="comment-modal-show-up trigger-commentButton" type="button" style="display: none">Click</button>
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

	       <!-- SIMPLE TAB ITEMS -->
	       <div class="simple-tab-items">
	         <!-- FORM -->
	         <form class="form">
	           <!-- FORM SELECT -->
	           <div class="form-select">
	             <select id="newsfeed-filter-category" name="newsfeed_filter_category">
	               <option value="0">All Updates</option>
	               <option value="1">Mentions</option>
	               <option value="2">Friends</option>
	               <option value="3">Groups</option>
	               <option value="4">Blog Posts</option>
	             </select>
	             <!-- FORM SELECT ICON -->
	             <svg class="form-select-icon icon-small-arrow">
	               <use xlink:href="#svg-small-arrow"></use>
	             </svg>
	             <!-- /FORM SELECT ICON -->
	           </div>
	           <!-- /FORM SELECT -->
	         </form>

	         <p class="simple-tab-item active">All Updates</p>

	         <p class="simple-tab-item">Mentions</p>

	         <p class="simple-tab-item">Friends</p>

	         <p class="simple-tab-item">Groups</p>

	         <p class="simple-tab-item">Blog Posts</p>
	       </div>

	     {{--   start mian post --}}
	     <div class="no-padding" id="main_post_container" pageName="1">


         </div>
        {{-- end main post --}}
	       <div class="loader-bars" id="loader_section">
	       </div>
	      
	     </div>
	    
	     <div class="grid-column">
	       
	       <div class="stats-box-slider">
	        
	         <div class="stats-box-slider-controls">
	           
	           <p class="stats-box-slider-controls-title">Stats Box</p>
	           
	           <div id="stats-box-slider-controls" class="slider-controls">
	           
	             <div class="slider-control negative left">
	              
	               <svg class="slider-control-icon icon-small-arrow">
	                 <use xlink:href="#svg-small-arrow"></use>
	               </svg>
	              
	             </div>
	            
	             <div class="slider-control negative right">
	               <!-- SLIDER CONTROL ICON -->
	               <svg class="slider-control-icon icon-small-arrow">
	                 <use xlink:href="#svg-small-arrow"></use>
	               </svg>
	              
	             </div>
	            
	           </div>
	          
	         </div>
	         
	         <div id="stats-box-slider-items" class="stats-box-slider-items">
	          
	           <div class="stats-box stat-profile-views">
	            
	             <div class="stats-box-value-wrap">
	              
	               <p class="stats-box-value">87.365</p>
	              
	               <div class="stats-box-diff">
	                
	                 <div class="stats-box-diff-icon positive">
	                  
	                   <svg class="icon-plus-small">
	                     <use xlink:href="#svg-plus-small"></use>
	                   </svg>
	                  
	                 </div>
	                
	                 <p class="stats-box-diff-value">3.2%</p>
	                
	               </div>
	              
	             </div>
	            
	             <p class="stats-box-title">Profile Views</p>
	            
	             <p class="stats-box-text">In the last month</p>
	            
	           </div>
	          
	           <div class="stats-box stat-posts-created">
	            
	             <div class="stats-box-value-wrap">
	               
	               <p class="stats-box-value">294</p>
	              
	               <div class="stats-box-diff">
	               
	                 <div class="stats-box-diff-icon positive">
	                  
	                   <svg class="icon-plus-small">
	                     <use xlink:href="#svg-plus-small"></use>
	                   </svg>
	                  
	                 </div>
	                 
	                 <p class="stats-box-diff-value">0.4%</p>
	                
	               </div>
	              
	             </div>
	             
	             <p class="stats-box-title">Posts Created</p>
	             
	             <p class="stats-box-text">In the last month</p>
	             
	           </div>
	           
	           <div class="stats-box stat-reactions-received">
	            
	             <div class="stats-box-value-wrap">
	              
	               <p class="stats-box-value">2560</p>
	               
	               <div class="stats-box-diff">
	                 
	                 <div class="stats-box-diff-icon negative">
	                  
	                   <svg class="icon-minus-small">
	                     <use xlink:href="#svg-minus-small"></use>
	                   </svg>
	                  
	                 </div>
	        
	                 <p class="stats-box-diff-value">1.8%</p>
	                
	               </div>
	             
	             </div>
	         
	             <p class="stats-box-title">Reactions Received</p>
	            
	             <p class="stats-box-text">In the last month</p>
	            
	           </div>
	          
	           <div class="stats-box stat-comments-received">
	            
	             <div class="stats-box-value-wrap">
	              
	               <p class="stats-box-value">947</p>
	               
	               <div class="stats-box-diff">
	                 
	                 <div class="stats-box-diff-icon positive">
	                  
	                   <svg class="icon-plus-small">
	                     <use xlink:href="#svg-plus-small"></use>
	                   </svg>
	                  
	                 </div>
	                 
	                 <p class="stats-box-diff-value">4.5%</p>
	                
	               </div>
	              
	             </div>
	            
	             <p class="stats-box-title">Comments Received</p>
	            
	             <p class="stats-box-text">In the last month</p>
	            
	           </div>
	          
	         </div>
	       
	       </div>
	      
	       <div class="widget-box">
	        
	         <div class="widget-box-controls">
	           
	           <div id="reaction-stat-slider-controls" class="slider-controls">
	           
	             <div class="slider-control left">
	              
	               <svg class="slider-control-icon icon-small-arrow">
	                 <use xlink:href="#svg-small-arrow"></use>
	               </svg>
	              
	             </div>
	            
	             <div class="slider-control right">
	              
	               <svg class="slider-control-icon icon-small-arrow">
	                 <use xlink:href="#svg-small-arrow"></use>
	               </svg>
	              
	             </div>
	            
	           </div>
	           
	         </div>
	        
	         <p class="widget-box-title">Reactions Received</p>
	       
	         <div class="widget-box-content">
	          
	           <div id="reaction-stat-slider-items" class="widget-box-content-slider">
	            
	             <div class="widget-box-content-slider-item">
	               
	               <div class="reaction-stats">
					
	                
	                 <div class="reaction-stat">
	                 
	                   <img class="reaction-stat-image" src="{{ asset('front/img/reaction/like.png') }}" alt="reaction-like">
	                  
	                   <p class="reaction-stat-title">25</p>
	                   
	                   <p class="reaction-stat-text">Likes</p>
	                   
	                 </div>
	                 
	                 <div class="reaction-stat">
	                  
	                   <img class="reaction-stat-image" src="{{ asset('front/img/reaction/love.png') }}" alt="reaction-love">
	                   
	                   <p class="reaction-stat-title">10</p>
	                   
	                   <p class="reaction-stat-text">Loves</p>
	                  
	                 </div>
	                
	               </div>
	               
	               <div class="reaction-stats">
	                
	                 <div class="reaction-stat">
	                  
	                   <img class="reaction-stat-image" src="{{ asset('front/img/reaction/dislike.png') }}" alt="reaction-dislike">
	                   
	                   <p class="reaction-stat-title">25</p>
	                  
	                   <p class="reaction-stat-text">Dislikes</p>
	                  
	                 </div>
	                
	                 <div class="reaction-stat">
	                  
	                   <img class="reaction-stat-image" src="{{ asset('front/img/reaction/happy.png') }}" alt="reaction-happy">
	                  
	                   <p class="reaction-stat-title">20</p>
	                   
	                   <p class="reaction-stat-text">Happy</p>
	                  
	                 </div>
	                
	               </div>
	              
	             </div>
	            
	             <div class="widget-box-content-slider-item">
	              
	               <div class="reaction-stats">
	                
	                 <div class="reaction-stat">
	                  
	                   <img class="reaction-stat-image" src="{{ asset('front/img/reaction/funny.png') }}" alt="reaction-funny">
	                   
	                   <p class="reaction-stat-title">10</p>
	                  
	                   <p class="reaction-stat-text">Funny</p>
	                 
	                 </div>
	                
	                 <div class="reaction-stat">
	                   
	                   <img class="reaction-stat-image" src="{{ asset('front/img/reaction/wow.png') }}" alt="reaction-wow">
	                  
	                   <p class="reaction-stat-title">10</p>
	                  
	                   <p class="reaction-stat-text">Wow!</p>
	                  
	                 </div>
	                 
	               </div>
	               
	               <div class="reaction-stats">
	               
	                 <div class="reaction-stat">
	                   
	                   <img class="reaction-stat-image" src="{{ asset('front/img/reaction/angry.png') }}" alt="reaction-angry">
	                   
	                   <p class="reaction-stat-title">10</p>
	                  
	                   <p class="reaction-stat-text">Angry</p>
	                  
	                 </div>
	                 
	                 <div class="reaction-stat">
	                  
	                   <img class="reaction-stat-image" src="{{ asset('front/img/reaction/sad.png') }}" alt="reaction-sad">
	                   
	                   <p class="reaction-stat-title">10</p>
	                  
	                   <p class="reaction-stat-text">Sad</p>
	                  
	                 </div>
	                
	               </div>
	              
	             </div>
	             
	           </div>
	           
	         </div>
	        
	       </div>
	      
	       <div class="widget-box">
	        
	         <div class="widget-box-settings">
	          
	           <div class="post-settings-wrap">
	            
	             <div class="post-settings widget-box-post-settings-dropdown-trigger">
	             
	               <svg class="post-settings-icon icon-more-dots">
	                 <use xlink:href="#svg-more-dots"></use>
	               </svg>
	              
	             </div>
	            
	             <div class="simple-dropdown widget-box-post-settings-dropdown">
	               <!-- SIMPLE DROPDOWN LINK -->
	               <p class="simple-dropdown-link">Widget Settings</p>
	               <!-- /SIMPLE DROPDOWN LINK -->
	             </div>
	             <!-- /SIMPLE DROPDOWN -->
	           </div>
	           <!-- /POST SETTINGS WRAP -->
	         </div>
	        	
	     
	       	
	         <p class="widget-box-title">Friends Activity</p>
	         <div class="widget-box-content">
	          	
	           <div class="user-status-list">
	        	@foreach ($fnd_activity as $activity)
	             <div class="user-status">
	               <a class="user-status-avatar" href="{{ route('friend.profile.timeline',$activity->user->username) }}">
	                 <div class="user-avatar small no-outline">
	                   <div class="user-avatar-content">
	                     <div class="hexagon-image-30-32" data-src="{{$activity->user->avatar !=null ? asset('front/image/user/avatar/'.$activity->user->avatar): asset('front/image/user/avatar/profile.jpg')}}"></div>
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
	               <p class="user-status-title"><a class="bold" href="{{ route('friend.profile.timeline',$activity->user->username) }}">{{$activity->user->name !=null ?  $activity->user->name : $activity->user->username}}</a>posted new post</p>
	               <p class="user-status-timestamp">{{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}</p>
	             </div>
	             @endforeach
	           </div>
	         </div>
	       </div>
	     </div>	
	   </div>
	 </div>

	
@endsection

@section('all_modal')
 @include('layouts.inc.modals.comment')
@endsection

