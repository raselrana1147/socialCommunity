@extends('layouts.app')
@section('title','Single Post')
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
	             <p class="achievement-status-progress"></p>
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
	             <p class="achievement-status-progress"></p>
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
	         <p class="widget-box-title">Members</p>
	         <!-- /WIDGET BOX TITLE -->

	         <!-- WIDGET BOX CONTENT -->
	         <div class="widget-box-content">
	           <!-- FILTERS -->
	           <div class="filters">
	             <!-- FILTER -->
	             <p class="filter">Newest</p>
	             <!-- /FILTER -->

	             <!-- FILTER -->
	             <p class="filter active">Popular</p>
	             <!-- /FILTER -->

	             <!-- FILTER -->
	             <p class="filter">Active</p>
	             <!-- /FILTER -->
	           </div>
	           <!-- /FILTERS -->

	           <!-- USER STATUS LIST -->
	           <div class="user-status-list">
	             <!-- USER STATUS -->
	             <div class="user-status request-small">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="profile-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-outline">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-30-32" data-src="{{asset('front/img/avatar/07.jpg')}}"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	               
	                   <!-- USER AVATAR PROGRESS -->
	                   <div class="user-avatar-progress">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-progress-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS -->
	               
	                   <!-- USER AVATAR PROGRESS BORDER -->
	                   <div class="user-avatar-progress-border">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-border-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS BORDER -->
	               
	                   <!-- USER AVATAR BADGE -->
	                   <div class="user-avatar-badge">
	                     <!-- USER AVATAR BADGE BORDER -->
	                     <div class="user-avatar-badge-border">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-22-24"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE BORDER -->
	               
	                     <!-- USER AVATAR BADGE CONTENT -->
	                     <div class="user-avatar-badge-content">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-dark-16-18"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE CONTENT -->
	               
	                     <!-- USER AVATAR BADGE TEXT -->
	                     <p class="user-avatar-badge-text">26</p>
	                     <!-- /USER AVATAR BADGE TEXT -->
	                   </div>
	                   <!-- /USER AVATAR BADGE -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="profile-timeline.html">Sarah Diamond</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TEXT -->
	               <p class="user-status-text small">24.5K profile views</p>
	               <!-- /USER STATUS TEXT -->
	           
	               <!-- ACTION REQUEST LIST -->
	               <div class="action-request-list">
	                 <!-- ACTION REQUEST -->
	                 <div class="action-request accept">
	                   <!-- ACTION REQUEST ICON -->
	                   <svg class="action-request-icon icon-add-friend">
	                     <use xlink:href="#svg-add-friend"></use>
	                   </svg>
	                   <!-- /ACTION REQUEST ICON -->
	                 </div>
	                 <!-- /ACTION REQUEST -->
	               </div>
	               <!-- ACTION REQUEST LIST -->
	             </div>
	             <!-- /USER STATUS -->

	             <!-- USER STATUS -->
	             <div class="user-status request-small">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="profile-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-outline">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-30-32" data-src="{{asset('front/img/avatar/03.jpg')}}"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	               
	                   <!-- USER AVATAR PROGRESS -->
	                   <div class="user-avatar-progress">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-progress-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS -->
	               
	                   <!-- USER AVATAR PROGRESS BORDER -->
	                   <div class="user-avatar-progress-border">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-border-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS BORDER -->
	               
	                   <!-- USER AVATAR BADGE -->
	                   <div class="user-avatar-badge">
	                     <!-- USER AVATAR BADGE BORDER -->
	                     <div class="user-avatar-badge-border">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-22-24"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE BORDER -->
	               
	                     <!-- USER AVATAR BADGE CONTENT -->
	                     <div class="user-avatar-badge-content">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-dark-16-18"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE CONTENT -->
	               
	                     <!-- USER AVATAR BADGE TEXT -->
	                     <p class="user-avatar-badge-text">16</p>
	                     <!-- /USER AVATAR BADGE TEXT -->
	                   </div>
	                   <!-- /USER AVATAR BADGE -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="profile-timeline.html">Nick Grissom</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TEXT -->
	               <p class="user-status-text small">20.1K profile views</p>
	               <!-- /USER STATUS TEXT -->
	           
	               <!-- ACTION REQUEST LIST -->
	               <div class="action-request-list">
	                 <!-- ACTION REQUEST -->
	                 <div class="action-request accept">
	                   <!-- ACTION REQUEST ICON -->
	                   <svg class="action-request-icon icon-add-friend">
	                     <use xlink:href="#svg-add-friend"></use>
	                   </svg>
	                   <!-- /ACTION REQUEST ICON -->
	                 </div>
	                 <!-- /ACTION REQUEST -->
	               </div>
	               <!-- ACTION REQUEST LIST -->
	             </div>
	             <!-- /USER STATUS -->

	             <!-- USER STATUS -->
	             <div class="user-status request-small">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="profile-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-outline">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-30-32" data-src="{{asset('front/img/avatar/23.jpg')}}"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	               
	                   <!-- USER AVATAR PROGRESS -->
	                   <div class="user-avatar-progress">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-progress-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS -->
	               
	                   <!-- USER AVATAR PROGRESS BORDER -->
	                   <div class="user-avatar-progress-border">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-border-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS BORDER -->
	               
	                   <!-- USER AVATAR BADGE -->
	                   <div class="user-avatar-badge">
	                     <!-- USER AVATAR BADGE BORDER -->
	                     <div class="user-avatar-badge-border">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-22-24"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE BORDER -->
	               
	                     <!-- USER AVATAR BADGE CONTENT -->
	                     <div class="user-avatar-badge-content">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-dark-16-18"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE CONTENT -->
	               
	                     <!-- USER AVATAR BADGE TEXT -->
	                     <p class="user-avatar-badge-text">19</p>
	                     <!-- /USER AVATAR BADGE TEXT -->
	                   </div>
	                   <!-- /USER AVATAR BADGE -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="profile-timeline.html">Rosie Sakura</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TEXT -->
	               <p class="user-status-text small">19.7K profile views</p>
	               <!-- /USER STATUS TEXT -->
	           
	               <!-- ACTION REQUEST LIST -->
	               <div class="action-request-list">
	                 <!-- ACTION REQUEST -->
	                 <div class="action-request accept">
	                   <!-- ACTION REQUEST ICON -->
	                   <svg class="action-request-icon icon-add-friend">
	                     <use xlink:href="#svg-add-friend"></use>
	                   </svg>
	                   <!-- /ACTION REQUEST ICON -->
	                 </div>
	                 <!-- /ACTION REQUEST -->
	               </div>
	               <!-- ACTION REQUEST LIST -->
	             </div>
	             <!-- /USER STATUS -->

	             <!-- USER STATUS -->
	             <div class="user-status request-small">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="profile-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-outline">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-30-32" data-src="{{asset('front/img/avatar/15.jpg')}}"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	               
	                   <!-- USER AVATAR PROGRESS -->
	                   <div class="user-avatar-progress">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-progress-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS -->
	               
	                   <!-- USER AVATAR PROGRESS BORDER -->
	                   <div class="user-avatar-progress-border">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-border-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS BORDER -->
	               
	                   <!-- USER AVATAR BADGE -->
	                   <div class="user-avatar-badge">
	                     <!-- USER AVATAR BADGE BORDER -->
	                     <div class="user-avatar-badge-border">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-22-24"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE BORDER -->
	               
	                     <!-- USER AVATAR BADGE CONTENT -->
	                     <div class="user-avatar-badge-content">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-dark-16-18"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE CONTENT -->
	               
	                     <!-- USER AVATAR BADGE TEXT -->
	                     <p class="user-avatar-badge-text">22</p>
	                     <!-- /USER AVATAR BADGE TEXT -->
	                   </div>
	                   <!-- /USER AVATAR BADGE -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="profile-timeline.html">Peter Stark</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TEXT -->
	               <p class="user-status-text small">16.5K profile views</p>
	               <!-- /USER STATUS TEXT -->
	           
	               <!-- ACTION REQUEST LIST -->
	               <div class="action-request-list">
	                 <!-- ACTION REQUEST -->
	                 <div class="action-request accept">
	                   <!-- ACTION REQUEST ICON -->
	                   <svg class="action-request-icon icon-add-friend">
	                     <use xlink:href="#svg-add-friend"></use>
	                   </svg>
	                   <!-- /ACTION REQUEST ICON -->
	                 </div>
	                 <!-- /ACTION REQUEST -->
	               </div>
	               <!-- ACTION REQUEST LIST -->
	             </div>
	             <!-- /USER STATUS -->

	             <!-- USER STATUS -->
	             <div class="user-status request-small">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="profile-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-outline">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-30-32" data-src="{{asset('front/img/avatar/04.jpg')}}"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	               
	                   <!-- USER AVATAR PROGRESS -->
	                   <div class="user-avatar-progress">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-progress-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS -->
	               
	                   <!-- USER AVATAR PROGRESS BORDER -->
	                   <div class="user-avatar-progress-border">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-border-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS BORDER -->
	               
	                   <!-- USER AVATAR BADGE -->
	                   <div class="user-avatar-badge">
	                     <!-- USER AVATAR BADGE BORDER -->
	                     <div class="user-avatar-badge-border">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-22-24"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE BORDER -->
	               
	                     <!-- USER AVATAR BADGE CONTENT -->
	                     <div class="user-avatar-badge-content">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-dark-16-18"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE CONTENT -->
	               
	                     <!-- USER AVATAR BADGE TEXT -->
	                     <p class="user-avatar-badge-text">6</p>
	                     <!-- /USER AVATAR BADGE TEXT -->
	                   </div>
	                   <!-- /USER AVATAR BADGE -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="profile-timeline.html">Bearded Wonder</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TEXT -->
	               <p class="user-status-text small">9.8K profile views</p>
	               <!-- /USER STATUS TEXT -->
	           
	               <!-- ACTION REQUEST LIST -->
	               <div class="action-request-list">
	                 <!-- ACTION REQUEST -->
	                 <div class="action-request accept">
	                   <!-- ACTION REQUEST ICON -->
	                   <svg class="action-request-icon icon-add-friend">
	                     <use xlink:href="#svg-add-friend"></use>
	                   </svg>
	                   <!-- /ACTION REQUEST ICON -->
	                 </div>
	                 <!-- /ACTION REQUEST -->
	               </div>
	               <!-- ACTION REQUEST LIST -->
	             </div>
	             <!-- /USER STATUS -->
	           </div>
	           <!-- /USER STATUS LIST -->
	         </div>
	         <!-- WIDGET BOX CONTENT -->
	       </div>
	       <!-- /WIDGET BOX -->

	       <!-- BANNER PROMO -->
	       <a class="banner-promo" href="https://themeforest.net/user/odin_design" target="_blank">
	         <img src="{{asset('front/img/banner/banner-promo.jpg')}}" alt="banner-promo">
	       </a>
	       <!-- /BANNER PROMO -->

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
	         <p class="widget-box-title">Open Quests</p>
	         <!-- /WIDGET BOX TITLE -->
	     
	         <!-- WIDGET BOX CONTENT -->
	         <div class="widget-box-content">
	           <!-- QUEST PREVIEW LIST -->
	           <div class="quest-preview-list">
	             <!-- QUEST PREVIEW -->
	             <div class="quest-preview">
	               <!-- QUEST PREVIEW INFO -->
	               <div class="quest-preview-info">
	                 <!-- QUEST PREVIEW IMAGE -->
	                 <img class="quest-preview-image" src="{{asset('front/img/quest/openq-s.png')}}" alt="openq-s">
	                 <!-- /QUEST PREVIEW IMAGE -->
	           
	                 <!-- QUEST PREVIEW TITLE -->
	                 <p class="quest-preview-title">Nothing to hide</p>
	                 <!-- /QUEST PREVIEW TITLE -->
	           
	                 <!-- QUEST PREVIEW TEXT -->
	                 <p class="quest-preview-text">You have completed all your profile information fields</p>
	                 <!-- /QUEST PREVIEW TEXT -->
	               </div>
	               <!-- /QUEST PREVIEW INFO -->
	           
	               <!-- PROGRESS STAT -->
	               <div class="progress-stat">
	                 <!-- PROGRESS STAT BAR -->
	                 <div id="quest-preview-nth" class="progress-stat-bar"></div>
	                 <!-- /PROGRESS STAT BAR -->
	               </div>
	               <!-- /PROGRESS STAT -->
	             </div>
	             <!-- /QUEST PREVIEW -->
	     
	             <!-- QUEST PREVIEW -->
	             <div class="quest-preview">
	               <!-- QUEST PREVIEW INFO -->
	               <div class="quest-preview-info">
	                 <!-- QUEST PREVIEW IMAGE -->
	                 <img class="quest-preview-image" src="{{asset('front/img/quest/openq-s.png')}}" alt="openq-s">
	                 <!-- /QUEST PREVIEW IMAGE -->
	           
	                 <!-- QUEST PREVIEW TITLE -->
	                 <p class="quest-preview-title">Social King</p>
	                 <!-- /QUEST PREVIEW TITLE -->
	           
	                 <!-- QUEST PREVIEW TEXT -->
	                 <p class="quest-preview-text">You have linked at least 8 social networks to your profile</p>
	                 <!-- /QUEST PREVIEW TEXT -->
	               </div>
	               <!-- /QUEST PREVIEW INFO -->
	           
	               <!-- PROGRESS STAT -->
	               <div class="progress-stat">
	                 <!-- PROGRESS STAT BAR -->
	                 <div id="quest-preview-sk" class="progress-stat-bar"></div>
	                 <!-- /PROGRESS STAT BAR -->
	               </div>
	               <!-- /PROGRESS STAT -->
	             </div>
	             <!-- /QUEST PREVIEW -->
	     
	             <!-- QUEST PREVIEW -->
	             <div class="quest-preview">
	               <!-- QUEST PREVIEW INFO -->
	               <div class="quest-preview-info">
	                 <!-- QUEST PREVIEW IMAGE -->
	                 <img class="quest-preview-image" src="{{asset('front/img/quest/openq-s.png')}}" alt="openq-s">
	                 <!-- /QUEST PREVIEW IMAGE -->
	           
	                 <!-- QUEST PREVIEW TITLE -->
	                 <p class="quest-preview-title">Buffed Profile</p>
	                 <!-- /QUEST PREVIEW TITLE -->
	           
	                 <!-- QUEST PREVIEW TEXT -->
	                 <p class="quest-preview-text">You have posted every day for at least 30 days in a row</p>
	                 <!-- /QUEST PREVIEW TEXT -->
	               </div>
	               <!-- /QUEST PREVIEW INFO -->
	           
	               <!-- PROGRESS STAT -->
	               <div class="progress-stat">
	                 <!-- PROGRESS STAT BAR -->
	                 <div id="quest-preview-bp" class="progress-stat-bar"></div>
	                 <!-- /PROGRESS STAT BAR -->
	               </div>
	               <!-- /PROGRESS STAT -->
	             </div>
	             <!-- /QUEST PREVIEW -->
	     
	             <!-- QUEST PREVIEW -->
	             <div class="quest-preview">
	               <!-- QUEST PREVIEW INFO -->
	               <div class="quest-preview-info">
	                 <!-- QUEST PREVIEW IMAGE -->
	                 <img class="quest-preview-image" src="{{asset('front/img/quest/openq-s.png')}}" alt="openq-s">
	                 <!-- /QUEST PREVIEW IMAGE -->
	           
	                 <!-- QUEST PREVIEW TITLE -->
	                 <p class="quest-preview-title">Hear the People</p>
	                 <!-- /QUEST PREVIEW TITLE -->
	           
	                 <!-- QUEST PREVIEW TEXT -->
	                 <p class="quest-preview-text">You have created and posted your first poll</p>
	                 <!-- /QUEST PREVIEW TEXT -->
	               </div>
	               <!-- /QUEST PREVIEW INFO -->
	           
	               <!-- PROGRESS STAT -->
	               <div class="progress-stat">
	                 <!-- PROGRESS STAT BAR -->
	                 <div id="quest-preview-htp" class="progress-stat-bar"></div>
	                 <!-- /PROGRESS STAT BAR -->
	               </div>
	               <!-- /PROGRESS STAT -->
	             </div>
	             <!-- /QUEST PREVIEW -->
	     
	             <!-- QUEST PREVIEW -->
	             <div class="quest-preview">
	               <!-- QUEST PREVIEW INFO -->
	               <div class="quest-preview-info">
	                 <!-- QUEST PREVIEW IMAGE -->
	                 <img class="quest-preview-image" src="{{asset('front/img/quest/openq-s.png')}}" alt="openq-s">
	                 <!-- /QUEST PREVIEW IMAGE -->
	           
	                 <!-- QUEST PREVIEW TITLE -->
	                 <p class="quest-preview-title">Store Manager</p>
	                 <!-- /QUEST PREVIEW TITLE -->
	           
	                 <!-- QUEST PREVIEW TEXT -->
	                 <p class="quest-preview-text">You have uploaded at least 10 items in your shop</p>
	                 <!-- /QUEST PREVIEW TEXT -->
	               </div>
	               <!-- /QUEST PREVIEW INFO -->
	           
	               <!-- PROGRESS STAT -->
	               <div class="progress-stat">
	                 <!-- PROGRESS STAT BAR -->
	                 <div id="quest-preview-sm" class="progress-stat-bar"></div>
	                 <!-- /PROGRESS STAT BAR -->
	               </div>
	               <!-- /PROGRESS STAT -->
	             </div>
	             <!-- /QUEST PREVIEW -->
	           </div>
	           <!-- /QUEST PREVIEW LIST -->
	         </div>
	         <!-- WIDGET BOX CONTENT -->
	     
	         <!-- WIDGET BOX BUTTON -->
	         <a class="widget-box-button button small white" href="quests.html">See all Quests!</a>
	         <!-- /WIDGET BOX BUTTON -->
	       </div>
	       <!-- /WIDGET BOX -->
	     </div>
	     <!-- /GRID COLUMN -->
 
	     <!-- GRID COLUMN -->
	     <div class="grid-column">
	      
	     <div class="widget-box no-padding" >

	     	<div class="widget-box-settings">
	     	 
	     	  <div class="post-settings-wrap">
	     	   	
	     	    <div class="post-settings widget-box-post-settings-dropdown-trigger">
	     	      	
	     	      <svg class="post-settings-icon icon-more-dots">
	     	        <use xlink:href="#svg-more-dots"></use>
	     	      </svg>
	     	     	
	     	    </div>
	     	    <div class="simple-dropdown widget-box-post-settings-dropdown">
	     	      <p class="simple-dropdown-link">Edit Post</p>

	     	      <p class="simple-dropdown-link">Report Post</p>

	     	      <p class="simple-dropdown-link">Report Author</p>
	     	    </div>
	     	  </div>
	     	 	
	     	</div>
		         <div class="widget-box-status">
		       
		           <div class="widget-box-status-content">
		            
		             <div class="user-status">
		             
		               <a class="user-status-avatar" href="{{route('user.profile.timeline')}}">
		                
		                 <div class="user-avatar small no-outline">
		                  
		                   <div class="user-avatar-content">
		                   
		                     <div class="hexagon-image-30-32" data-src="{{($post->user->avatar ==null) ? asset('front/image/user/profile.jpg') : asset('front/image/user/avatar/'.$post->user->avatar)}}"></div>
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
		               	<a class="bold" href="profile-timeline.html">{{($post->user->name ==null) ? $post->user->username : $post->user->name}}</a>
		              
		               <p class="user-status-text small">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
		              
		             </div>
		            <p class="widget-box-status-text">{!! $post->post_text!!}</p>
		             @if ($post->image !=null)
		             <div class="picture-collage">
		               <div class="picture-collage-row medium">
		                 <div class="picture-collage-item"> 
		                   <div class="photo-preview">
		                     <figure class="photo-preview-image liquid">
		                       <img src="{{($post->image !=null) ? asset('front/image/post/'.$post->image) : ''}}" alt="{{__('Post Image')}}">
		                     </figure>
		                   </div>
		                 </div>
		               </div>
		             </div>
		              @endif
		             @if ($post->tag !=null)
		             <div class="tag-list">
		               <a class="tag-item secondary" href="newsfeed.html">Photos</a>
		               <a class="tag-item secondary" href="newsfeed.html">StreamCon</a>
		               <a class="tag-item secondary" href="newsfeed.html">StarGirl</a>
		             </div>
	                @endif
		             <div class="content-actions">
		               <div class="content-action">
		                 <div class="meta-line">
		                  
		                   <div class="meta-line-list reaction-item-list">
		                    
		                     <div class="reaction-item">
		                       
		                       <img class="reaction-image reaction-item-dropdown-trigger" src="{{asset('front/img/reaction/wow.png')}}" alt="reaction-wow">
		                      
		                       <div class="simple-dropdown padded reaction-item-dropdown">
		                        
		                         <p class="simple-dropdown-text"><img class="reaction" src="{{asset('front/img/reaction/wow.png')}}" alt="reaction-wow"> <span class="bold">Wow</span></p>
		                         <p class="simple-dropdown-text">Matt Parker</p>
		                      
		                       </div>
		                     </div>
		                     <div class="reaction-item">
		                       <img class="reaction-image reaction-item-dropdown-trigger" src="{{asset('front/img/reaction/like.png')}}" alt="reaction-like">
		                       <div class="simple-dropdown padded reaction-item-dropdown">
		                         <p class="simple-dropdown-text"><img class="reaction" src="{{asset('front/img/reaction/like.png')}}" alt="reaction-like"> <span class="bold">Like</span></p>
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
		                        
		                         <div class="hexagon-image-18-20" data-src="{{asset('front/img/avatar/03.jpg')}}"></div>
		                     
		                       </div>
		                      
		                     </div>
		                    
		                     <div class="user-avatar micro no-stats">
		                      
		                       <div class="user-avatar-border">
		                       
		                         <div class="hexagon-22-24"></div>
		                        
		                       </div>
		                     
		                       <div class="user-avatar-content">
		                      
		                         <div class="hexagon-image-18-20" data-src="{{asset('front/img/avatar/15.jpg')}}"></div>
		                        
		                       </div>
		                      
		                     </div>
		                   
		                     <div class="user-avatar micro no-stats">
		                      
		                       <div class="user-avatar-border">
		                       
		                         <div class="hexagon-22-24"></div>
		                      
		                       </div>
		                      
		                       <div class="user-avatar-content">
		                        
		                         <div class="hexagon-image-18-20" data-src="{{asset('front/img/avatar/14.jpg')}}"></div>
		                         
		                       </div>
		                      
		                     </div>
		                     
		                     <div class="user-avatar micro no-stats">
		                     
		                       <div class="user-avatar-border">
		                     
		                         <div class="hexagon-22-24"></div>
		                   
		                       </div>
		                   
		                       <div class="user-avatar-content">
		                      
		                         <div class="hexagon-image-18-20" data-src="{{asset('front/img/avatar/07.jpg')}}"></div>
		                        
		                       </div>
		                     
		                     </div>
		                   
		                   </div>
		                 
		                   <p class="meta-line-text">4 Participants</p>
		                   
		                 </div>
		              
		               </div>
		           
		               <div class="content-action">
		              
		                 <div class="meta-line">
		                  
		                   <p class="meta-line-link">{{$post->comment->count()}} Comments</p>
		              
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
		                 <img class="reaction-option-image" src="{{asset('front/img/reaction/like.png')}}" alt="reaction-like">
		                
		               </div>
		               <div class="reaction-option text-tooltip-tft" data-title="Love">
		                 
		                 <img class="reaction-option-image" src="{{asset('front/img/reaction/love.png')}}" alt="reaction-love">
		               
		               </div>
		             
		               <div class="reaction-option text-tooltip-tft" data-title="Dislike">
		                
		                 <img class="reaction-option-image" src="{{asset('front/img/reaction/dislike.png')}}" alt="reaction-dislike">
		                
		               </div>
		              
		               <div class="reaction-option text-tooltip-tft" data-title="Happy">
		                
		                 <img class="reaction-option-image" src="{{asset('front/img/reaction/happy.png')}}" alt="reaction-happy">
		               
		               </div>
		              
		     
		             
		               <div class="reaction-option text-tooltip-tft" data-title="Funny">
		                
		                 <img class="reaction-option-image" src="{{asset('front/img/reaction/funny.png')}}" alt="reaction-funny">
		               
		               </div>
		              
		               <div class="reaction-option text-tooltip-tft" data-title="Wow">
		                
		                 <img class="reaction-option-image" src="{{asset('front/img/reaction/wow.png')}}" alt="reaction-wow">
		               
		               </div>
		              
		               <div class="reaction-option text-tooltip-tft" data-title="Angry">
		                
		                 <img class="reaction-option-image" src="{{asset('front/img/reaction/angry.png')}}" alt="reaction-angry">
		                
		               </div>
		              
		               <div class="reaction-option text-tooltip-tft" data-title="Sad">
		                
		                 <img class="reaction-option-image" src="{{asset('front/img/reaction/sad.png')}}" alt="reaction-sad">
		                 
		               </div>
		               
		             </div>
		            
		           </div>
		         
		           <div class="post-option">
		            
		             <svg class="post-option-icon icon-comment">
		               <use xlink:href="#svg-comment"></use>
		             </svg>
		           
		             <p class="post-option-text comment-modal-show-up-single" data-target="{{$post->id}}" data-action="{{route('getAllComment')}}">Comment</p>
		           
		           </div>
		          
		           <div class="post-option">
		            
		             <svg class="post-option-icon icon-share">
		               <use xlink:href="#svg-share"></use>
		             </svg>
		             
		             <p class="post-option-text">Share</p>
		           
		           </div>
		         </div>
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
	         <!-- /WIDGET BOX SETTINGS -->
	     
	         <!-- WIDGET BOX TITLE -->
	         <p class="widget-box-title">Friends Activity</p>
	         <!-- /WIDGET BOX TITLE -->
	     
	         <!-- WIDGET BOX CONTENT -->
	         <div class="widget-box-content">
	           <!-- USER STATUS LIST -->
	           <div class="user-status-list">
	             <!-- USER STATUS -->
	             <div class="user-status">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="profile-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-outline">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-30-32" data-src="img/avatar/05.jpg"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	               
	                   <!-- USER AVATAR PROGRESS -->
	                   <div class="user-avatar-progress">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-progress-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS -->
	               
	                   <!-- USER AVATAR PROGRESS BORDER -->
	                   <div class="user-avatar-progress-border">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-border-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS BORDER -->
	               
	                   <!-- USER AVATAR BADGE -->
	                   <div class="user-avatar-badge">
	                     <!-- USER AVATAR BADGE BORDER -->
	                     <div class="user-avatar-badge-border">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-22-24"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE BORDER -->
	               
	                     <!-- USER AVATAR BADGE CONTENT -->
	                     <div class="user-avatar-badge-content">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-dark-16-18"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE CONTENT -->
	               
	                     <!-- USER AVATAR BADGE TEXT -->
	                     <p class="user-avatar-badge-text">12</p>
	                     <!-- /USER AVATAR BADGE TEXT -->
	                   </div>
	                   <!-- /USER AVATAR BADGE -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="profile-timeline.html">Neko Bebop</a> commented on Destroy Dex's <a class="highlighted" href="profile-timeline.html">photo</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TIMESTAMP -->
	               <p class="user-status-timestamp">3 minutes ago</p>
	               <!-- /USER STATUS TIMESTAMP -->
	             </div>
	             <!-- /USER STATUS -->
	     
	             <!-- USER STATUS -->
	             <div class="user-status">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="profile-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-outline">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-30-32" data-src="img/avatar/03.jpg"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	               
	                   <!-- USER AVATAR PROGRESS -->
	                   <div class="user-avatar-progress">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-progress-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS -->
	               
	                   <!-- USER AVATAR PROGRESS BORDER -->
	                   <div class="user-avatar-progress-border">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-border-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS BORDER -->
	               
	                   <!-- USER AVATAR BADGE -->
	                   <div class="user-avatar-badge">
	                     <!-- USER AVATAR BADGE BORDER -->
	                     <div class="user-avatar-badge-border">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-22-24"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE BORDER -->
	               
	                     <!-- USER AVATAR BADGE CONTENT -->
	                     <div class="user-avatar-badge-content">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-dark-16-18"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE CONTENT -->
	               
	                     <!-- USER AVATAR BADGE TEXT -->
	                     <p class="user-avatar-badge-text">16</p>
	                     <!-- /USER AVATAR BADGE TEXT -->
	                   </div>
	                   <!-- /USER AVATAR BADGE -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="profile-timeline.html">Nick Grissom</a> liked Marina Valentine's <a class="highlighted" href="profile-timeline.html">status update</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TIMESTAMP -->
	               <p class="user-status-timestamp">12 minutes ago</p>
	               <!-- /USER STATUS TIMESTAMP -->
	             </div>
	             <!-- /USER STATUS -->
	     
	             <!-- USER STATUS -->
	             <div class="user-status">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="profile-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-outline">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-30-32" data-src="img/avatar/10.jpg"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	               
	                   <!-- USER AVATAR PROGRESS -->
	                   <div class="user-avatar-progress">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-progress-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS -->
	               
	                   <!-- USER AVATAR PROGRESS BORDER -->
	                   <div class="user-avatar-progress-border">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-border-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS BORDER -->
	               
	                   <!-- USER AVATAR BADGE -->
	                   <div class="user-avatar-badge">
	                     <!-- USER AVATAR BADGE BORDER -->
	                     <div class="user-avatar-badge-border">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-22-24"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE BORDER -->
	               
	                     <!-- USER AVATAR BADGE CONTENT -->
	                     <div class="user-avatar-badge-content">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-dark-16-18"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE CONTENT -->
	               
	                     <!-- USER AVATAR BADGE TEXT -->
	                     <p class="user-avatar-badge-text">5</p>
	                     <!-- /USER AVATAR BADGE TEXT -->
	                   </div>
	                   <!-- /USER AVATAR BADGE -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="profile-timeline.html">The Green Goo</a> liked Nick Grissom's <a class="highlighted" href="profile-timeline.html">video</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TIMESTAMP -->
	               <p class="user-status-timestamp">17 minutes ago</p>
	               <!-- /USER STATUS TIMESTAMP -->
	             </div>
	             <!-- /USER STATUS -->
	     
	             <!-- USER STATUS -->
	             <div class="user-status">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="profile-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-outline">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-30-32" data-src="img/avatar/03.jpg"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	               
	                   <!-- USER AVATAR PROGRESS -->
	                   <div class="user-avatar-progress">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-progress-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS -->
	               
	                   <!-- USER AVATAR PROGRESS BORDER -->
	                   <div class="user-avatar-progress-border">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-border-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS BORDER -->
	               
	                   <!-- USER AVATAR BADGE -->
	                   <div class="user-avatar-badge">
	                     <!-- USER AVATAR BADGE BORDER -->
	                     <div class="user-avatar-badge-border">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-22-24"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE BORDER -->
	               
	                     <!-- USER AVATAR BADGE CONTENT -->
	                     <div class="user-avatar-badge-content">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-dark-16-18"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE CONTENT -->
	               
	                     <!-- USER AVATAR BADGE TEXT -->
	                     <p class="user-avatar-badge-text">16</p>
	                     <!-- /USER AVATAR BADGE TEXT -->
	                   </div>
	                   <!-- /USER AVATAR BADGE -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="profile-timeline.html">Nick Grissom</a> changed his <a class="highlighted" href="profile-timeline.html">profile picture</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TIMESTAMP -->
	               <p class="user-status-timestamp">33 minutes ago</p>
	               <!-- /USER STATUS TIMESTAMP -->
	             </div>
	             <!-- /USER STATUS -->
	     
	             <!-- USER STATUS -->
	             <div class="user-status">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="profile-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-outline">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-30-32" data-src="img/avatar/02.jpg"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	               
	                   <!-- USER AVATAR PROGRESS -->
	                   <div class="user-avatar-progress">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-progress-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS -->
	               
	                   <!-- USER AVATAR PROGRESS BORDER -->
	                   <div class="user-avatar-progress-border">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-border-40-44"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR PROGRESS BORDER -->
	               
	                   <!-- USER AVATAR BADGE -->
	                   <div class="user-avatar-badge">
	                     <!-- USER AVATAR BADGE BORDER -->
	                     <div class="user-avatar-badge-border">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-22-24"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE BORDER -->
	               
	                     <!-- USER AVATAR BADGE CONTENT -->
	                     <div class="user-avatar-badge-content">
	                       <!-- HEXAGON -->
	                       <div class="hexagon-dark-16-18"></div>
	                       <!-- /HEXAGON -->
	                     </div>
	                     <!-- /USER AVATAR BADGE CONTENT -->
	               
	                     <!-- USER AVATAR BADGE TEXT -->
	                     <p class="user-avatar-badge-text">19</p>
	                     <!-- /USER AVATAR BADGE TEXT -->
	                   </div>
	                   <!-- /USER AVATAR BADGE -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="profile-timeline.html">Destroy Dex</a> commented on Rosie Sakura's <a class="highlighted" href="profile-timeline.html">profile</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TIMESTAMP -->
	               <p class="user-status-timestamp">41 minutes ago</p>
	               <!-- /USER STATUS TIMESTAMP -->
	             </div>
	             <!-- /USER STATUS -->
	           </div>
	           <!-- /USER STATUS LIST -->
	         </div>
	         <!-- WIDGET BOX CONTENT -->
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
	         <p class="widget-box-title">Groups</p>
	         <!-- /WIDGET BOX TITLE -->
	     
	         <!-- WIDGET BOX CONTENT -->
	         <div class="widget-box-content">
	           <!-- FILTERS -->
	           <div class="filters">
	             <!-- FILTER -->
	             <p class="filter">Newest</p>
	             <!-- /FILTER -->
	     
	             <!-- FILTER -->
	             <p class="filter active">Popular</p>
	             <!-- /FILTER -->
	     
	             <!-- FILTER -->
	             <p class="filter">Active</p>
	             <!-- /FILTER -->
	           </div>
	           <!-- /FILTERS -->
	     
	           <!-- USER STATUS LIST -->
	           <div class="user-status-list">
	             <!-- USER STATUS -->
	             <div class="user-status request-small">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="group-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-border">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-40-44" data-src="img/avatar/29.jpg"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="group-timeline.html">Twitch Streamers</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TEXT -->
	               <p class="user-status-text small">265 members</p>
	               <!-- /USER STATUS TEXT -->
	           
	               <!-- ACTION REQUEST LIST -->
	               <div class="action-request-list">
	                 <!-- ACTION REQUEST -->
	                 <div class="action-request accept">
	                   <!-- ACTION REQUEST ICON -->
	                   <svg class="action-request-icon icon-join-group">
	                     <use xlink:href="#svg-join-group"></use>
	                   </svg>
	                   <!-- /ACTION REQUEST ICON -->
	                 </div>
	                 <!-- /ACTION REQUEST -->
	               </div>
	               <!-- ACTION REQUEST LIST -->
	             </div>
	             <!-- /USER STATUS -->
	     
	             <!-- USER STATUS -->
	             <div class="user-status request-small">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="group-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-border">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-40-44" data-src="img/avatar/24.jpg"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="group-timeline.html">Cosplayers of the World</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TEXT -->
	               <p class="user-status-text small">139 members</p>
	               <!-- /USER STATUS TEXT -->
	           
	               <!-- ACTION REQUEST LIST -->
	               <div class="action-request-list">
	                 <!-- ACTION REQUEST -->
	                 <div class="action-request accept">
	                   <!-- ACTION REQUEST ICON -->
	                   <svg class="action-request-icon icon-join-group">
	                     <use xlink:href="#svg-join-group"></use>
	                   </svg>
	                   <!-- /ACTION REQUEST ICON -->
	                 </div>
	                 <!-- /ACTION REQUEST -->
	               </div>
	               <!-- ACTION REQUEST LIST -->
	             </div>
	             <!-- /USER STATUS -->
	     
	             <!-- USER STATUS -->
	             <div class="user-status request-small">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="group-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-border">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-40-44" data-src="img/avatar/25.jpg"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="group-timeline.html">Stream Designers</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TEXT -->
	               <p class="user-status-text small">466 members</p>
	               <!-- /USER STATUS TEXT -->
	           
	               <!-- ACTION REQUEST LIST -->
	               <div class="action-request-list">
	                 <!-- ACTION REQUEST -->
	                 <div class="action-request accept">
	                   <!-- ACTION REQUEST ICON -->
	                   <svg class="action-request-icon icon-join-group">
	                     <use xlink:href="#svg-join-group"></use>
	                   </svg>
	                   <!-- /ACTION REQUEST ICON -->
	                 </div>
	                 <!-- /ACTION REQUEST -->
	               </div>
	               <!-- ACTION REQUEST LIST -->
	             </div>
	             <!-- /USER STATUS -->
	     
	             <!-- USER STATUS -->
	             <div class="user-status request-small">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="group-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-border">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-40-44" data-src="img/avatar/28.jpg"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="group-timeline.html">Street Artists</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TEXT -->
	               <p class="user-status-text small">951 members</p>
	               <!-- /USER STATUS TEXT -->
	           
	               <!-- ACTION REQUEST LIST -->
	               <div class="action-request-list">
	                 <!-- ACTION REQUEST -->
	                 <div class="action-request decline">
	                   <!-- ACTION REQUEST ICON -->
	                   <svg class="action-request-icon icon-leave-group">
	                     <use xlink:href="#svg-leave-group"></use>
	                   </svg>
	                   <!-- /ACTION REQUEST ICON -->
	                 </div>
	                 <!-- /ACTION REQUEST -->
	               </div>
	               <!-- ACTION REQUEST LIST -->
	             </div>
	             <!-- /USER STATUS -->
	     
	             <!-- USER STATUS -->
	             <div class="user-status request-small">
	               <!-- USER STATUS AVATAR -->
	               <a class="user-status-avatar" href="group-timeline.html">
	                 <!-- USER AVATAR -->
	                 <div class="user-avatar small no-border">
	                   <!-- USER AVATAR CONTENT -->
	                   <div class="user-avatar-content">
	                     <!-- HEXAGON -->
	                     <div class="hexagon-image-40-44" data-src="img/avatar/27.jpg"></div>
	                     <!-- /HEXAGON -->
	                   </div>
	                   <!-- /USER AVATAR CONTENT -->
	                 </div>
	                 <!-- /USER AVATAR -->
	               </a>
	               <!-- /USER STATUS AVATAR -->
	           
	               <!-- USER STATUS TITLE -->
	               <p class="user-status-title"><a class="bold" href="group-timeline.html">Gaming Watchtower</a></p>
	               <!-- /USER STATUS TITLE -->
	           
	               <!-- USER STATUS TEXT -->
	               <p class="user-status-text small">2.365 members</p>
	               <!-- /USER STATUS TEXT -->
	           
	               <!-- ACTION REQUEST LIST -->
	               <div class="action-request-list">
	                 <!-- ACTION REQUEST -->
	                 <div class="action-request accept">
	                   <!-- ACTION REQUEST ICON -->
	                   <svg class="action-request-icon icon-join-group">
	                     <use xlink:href="#svg-join-group"></use>
	                   </svg>
	                   <!-- /ACTION REQUEST ICON -->
	                 </div>
	                 <!-- /ACTION REQUEST -->
	               </div>
	               <!-- ACTION REQUEST LIST -->
	             </div>
	             <!-- /USER STATUS -->
	           </div>
	           <!-- /USER STATUS LIST -->
	         </div>
	         <!-- WIDGET BOX CONTENT -->
	       </div>
	       <!-- /WIDGET BOX -->
	     </div>
	     <!-- /GRID COLUMN -->
	   </div>
	   <!-- /GRID -->
	 </div>

	
@endsection

@section('all_modal')
 @include('layouts.inc.modals.comment-single')
@endsection

