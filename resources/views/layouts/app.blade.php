<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- bootstrap 4.3.1 -->
  @include('layouts.inc.css')
  
</head>
<body>
<input type="hidden" value="{{ URL::to('/') }}/" id="base-url">
  <!-- PAGE LOADER -->
@include('layouts.inc.loader')
  <!-- /PAGE LOADER -->
@include('layouts.inc.left_nav')
  <!-- NAVIGATION WIDGET -->
 
  <!-- /NAVIGATION WIDGET -->
@include('layouts.inc.left_nav_desk')
  <!-- NAVIGATION WIDGET -->
 
  <!-- /NAVIGATION WIDGET -->
@include('layouts.inc.left_nav_mobile')
  <!-- NAVIGATION WIDGET -->
  

@include('layouts.inc.top_header')
  <!-- HEADER -->

  <!-- /HEADER -->

  <!-- FLOATY BAR -->
  <aside class="floaty-bar">
    <!-- BAR ACTIONS -->
    <div class="bar-actions">
      <!-- PROGRESS STAT -->
      <div class="progress-stat">
        <!-- BAR PROGRESS WRAP -->
        <div class="bar-progress-wrap">
          <!-- BAR PROGRESS INFO -->
          <p class="bar-progress-info">Next: <span class="bar-progress-text"></span></p>
          <!-- /BAR PROGRESS INFO -->
        </div>
        <!-- /BAR PROGRESS WRAP -->
    
        <!-- PROGRESS STAT BAR -->
        <div id="logged-user-level-cp" class="progress-stat-bar"></div>
        <!-- /PROGRESS STAT BAR -->
      </div>
      <!-- /PROGRESS STAT -->
    </div>
    <!-- /BAR ACTIONS -->

    <!-- BAR ACTIONS -->
    <div class="bar-actions">
      <!-- ACTION LIST -->
      <div class="action-list dark">
        <!-- ACTION LIST ITEM -->
        <a class="action-list-item" href="marketplace-cart.html">
          <!-- ACTION LIST ITEM ICON -->
          <svg class="action-list-item-icon icon-shopping-bag">
            <use xlink:href="#svg-shopping-bag"></use>
          </svg>
          <!-- /ACTION LIST ITEM ICON -->
        </a>
        <!-- /ACTION LIST ITEM -->

        <!-- ACTION LIST ITEM -->
        <a class="action-list-item" href="hub-profile-requests.html">
          <!-- ACTION LIST ITEM ICON -->
          <svg class="action-list-item-icon icon-friend">
            <use xlink:href="#svg-friend"></use>
          </svg>
          <!-- /ACTION LIST ITEM ICON -->
        </a>
        <!-- /ACTION LIST ITEM -->

        <!-- ACTION LIST ITEM -->
        <a class="action-list-item" href="hub-profile-messages.html">
          <!-- ACTION LIST ITEM ICON -->
          <svg class="action-list-item-icon icon-messages">
            <use xlink:href="#svg-messages"></use>
          </svg>
          <!-- /ACTION LIST ITEM ICON -->
        </a>
        <!-- /ACTION LIST ITEM -->

        <!-- ACTION LIST ITEM -->
        <a class="action-list-item unread" href="hub-profile-notifications.html">
          <!-- ACTION LIST ITEM ICON -->
          <svg class="action-list-item-icon icon-notification">
            <use xlink:href="#svg-notification"></use>
          </svg>
          <!-- /ACTION LIST ITEM ICON -->
        </a>
        <!-- /ACTION LIST ITEM -->
      </div>
      <!-- /ACTION LIST -->

      <!-- ACTION ITEM WRAP -->
      <a class="action-item-wrap" href="hub-profile-info.html">
        <!-- ACTION ITEM -->
        <div class="action-item dark">
          <!-- ACTION ITEM ICON -->
          <svg class="action-item-icon icon-settings">
            <use xlink:href="#svg-settings"></use>
          </svg>
          <!-- /ACTION ITEM ICON -->
        </div>
        <!-- /ACTION ITEM -->
      </a>
      <!-- /ACTION ITEM WRAP -->
    </div>
    <!-- /BAR ACTIONS -->
  </aside>
  <!-- /FLOATY BAR -->
@section('main_content')
@show

  <!-- CONTENT GRID -->

  <!-- /CONTENT GRID -->

  <!-- POPUP PICTURE -->
 @include('layouts.inc.popup')
  @yield('all_modal')
  <!-- /POPUP PICTURE -->
 @include('layouts.inc.script')

</body>
</html>