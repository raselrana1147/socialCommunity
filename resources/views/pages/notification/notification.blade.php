@extends('layouts.app')
@section('title','Notifications')
@section('main_content')
<div class="content-grid">
  <!-- SECTION BANNER -->
  <div class="section-banner">
    <!-- SECTION BANNER ICON -->
    <img class="section-banner-icon" src="{{asset('front/img/banner/accounthub-icon.png')}}" alt="accounthub-icon">
    <!-- /SECTION BANNER ICON -->

    <!-- SECTION BANNER TITLE -->
    <p class="section-banner-title">Account Hub</p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">Profile info, messages, settings and much more!</p>
    <!-- /SECTION BANNER TEXT -->
  </div>
  <!-- /SECTION BANNER -->

  <!-- GRID -->
  <div class="grid grid-3-9 medium-space">
    <!-- GRID COLUMN -->
    <div class="account-hub-sidebar">
      <!-- SIDEBAR BOX -->
     	    @include('layouts.inc.profile-sidebar')
      <!-- /SIDEBAR BOX -->
    </div>
    <!-- /GRID COLUMN -->

    <!-- GRID COLUMN -->
    <div class="account-hub-content">
      <!-- SECTION HEADER -->
      <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
          <!-- SECTION PRETITLE -->
        
          <!-- /SECTION PRETITLE -->

          <!-- SECTION TITLE -->
          <h2 class="section-title">Notifications</h2>
          <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->

        <!-- SECTION HEADER ACTIONS -->
        <div class="section-header-actions">
          <!-- SECTION HEADER ACTION -->
          <p class="section-header-action">Mark all as Read</p>
          <!-- /SECTION HEADER ACTION -->
    
          <!-- SECTION HEADER ACTION -->
          <p class="section-header-action">Settings</p>
          <!-- /SECTION HEADER ACTION -->
        </div>
        <!-- /SECTION HEADER ACTIONS -->
      </div>
      <!-- /SECTION HEADER -->

      <!-- NOTIFICATION BOX LIST -->
      <div class="notification-box-list">
        <!-- NOTIFICATION BOX -->


@if (count($notifications))
		
		@foreach ($notifications as $notification)
        <div class="notification-box">
          <div class="user-status notification">
            <a class="user-status-avatar" href="{{ ($notification->type==1 || $notification->type==7 || $notification->type==8) ? 
                    route('friend.profile.timeline',$notification->notificationfrom->username) : ($notification->type==2 ? 
                    route('user.sell.history') : ($notification->type==3 ||  $notification->type==4 ?  route('marketplace.product.show',$notification->product_id): ($notification->type==5 || $notification->type==6 ? 
                    route('user.post.single',$notification->post_id) : '')))}}">
              <div class="user-avatar small no-outline">
                <div class="user-avatar-content">
                  <div class="hexagon-image-30-32" data-src="{{($notification->notificationfrom->avatar !=null) ? asset('front/image/user/avatar/'.$notification->notificationfrom->avatar) : asset('front/image/user/profile.jpg')}}"></div>
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
                  <p class="user-avatar-badge-text">16</p>

                </div>
              </div>
            </a>

            <p class="user-status-title"><a class="bold" href="{{ ($notification->type==1 || $notification->type==7 || $notification->type==8) ? route('friend.profile.timeline',$notification->notificationfrom->username) :
                   ($notification->type==2 ? route('user.sell.history') : ($notification->type==3 ||  $notification->type==4 ?  
                   route('marketplace.product.show',$notification->product_id): ($notification->type==5 || $notification->type==6 ? 
                   route('user.post.single',$notification->post_id) : '')))}}">{{$notification->notificationfrom->name}}</a> {{$notification->title}}</p>	
            <p class="user-status-timestamp small-space">{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</p>
          </div>

          <div class="notification-box-close-button">
           	
            <svg class="notification-box-close-button-icon icon-cross">
              <use xlink:href="#svg-cross"></use>
            </svg>
            	
          </div>
          <div class="mark-read-button"></div>
        </div>
        @endforeach
        @else
        <p><strong>No Notifications Found</strong></p>
        @endif
      </div>
      <div class="own-pagination">
        {{$notifications->links()}}
     </div>
    </div>
    <!-- /GRID COLUMN -->
  </div>
  <!-- /GRID -->
</div>
@endsection