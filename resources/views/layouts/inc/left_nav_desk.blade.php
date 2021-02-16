 <nav id="navigation-widget" class="navigation-widget navigation-widget-desktop sidebar left hidden" data-simplebar>
    <!-- NAVIGATION WIDGET COVER -->
    <figure class="navigation-widget-cover liquid">
      <img src="{{ (Auth::user()->cover_photo !=null) ?  asset('front/image/user/cover/'.Auth::user()->cover_photo) : asset('front/image/user/cover.jpg')}}" alt="cover-01">
    </figure>
    <!-- /NAVIGATION WIDGET COVER -->

    <!-- USER SHORT DESCRIPTION -->
    <div class="user-short-description">
      <!-- USER SHORT DESCRIPTION AVATAR -->
      <a class="user-short-description-avatar user-avatar medium" href="{{ route('user.profile.timeline') }}">
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
          <div class="hexagon-image-82-90" data-src="{{ (Auth::user()->avatar !=null) ?  asset('front/image/user/avatar/'.Auth::user()->avatar) : asset('front/image/user/profile.jpg')}}"></div>
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
      <p class="user-short-description-title"><a href="{{ route('user.profile.info') }}">{{(Auth::user()->name !=null) ?  Auth::user()->name : Auth::user()->username}}</a></p>
      <!-- /USER SHORT DESCRIPTION TITLE -->

      <!-- USER SHORT DESCRIPTION TEXT -->
      <p class="user-short-description-text"><a href="#">{{Auth::user()->website}}</a></p>
      <!-- /USER SHORT DESCRIPTION TEXT -->
    </div>
 @php
   $five_badges = App\Models\UserBadge::where('user_id', Auth::user()->id)->take(5)->orderBy('id','DESC')->get();
 @endphp
 @if (count($five_badges))
  <div class="badge-list small">
        @foreach ($five_badges as $fbadge)
      
          <div class="badge-item">
            <img class="badge-style" src="{{asset($fbadge->badge->icon)}}" alt="{{$fbadge->badge->title}}">
          </div>
       @endforeach
 @endif
    
  
      
    </div>
    <!-- /BADGE LIST -->

    <!-- USER STATS -->
    <div class="user-stats">
      <!-- USER STAT -->
      <div class="user-stat">
        <!-- USER STAT TITLE -->
        <p class="user-stat-title">{{count(Auth::user()->post)}}</p>
        <!-- /USER STAT TITLE -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text">posts</p>
        <!-- /USER STAT TEXT -->
      </div>

    </div>
    <!-- /USER STATS -->

    <!-- MENU -->
    <ul class="menu">
      <!-- MENU ITEM -->
      <li class="menu-item {{ (request()->is('/')) ? 'active' : '' }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link ac" href="{{ route('home') }}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-newsfeed">
            <use xlink:href="#svg-newsfeed"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Newsfeed
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <li class="menu-item {{ (request()->is('badges')) ? 'active' : '' }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{ route('badges') }}">
          
          <svg class="menu-item-link-icon icon-badges">
            <use xlink:href="#svg-badges"></use>
          </svg>
          
          Badges
        </a>
      
      </li>

      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link {{ (request()->is('quests')) ? 'active' : '' }}" href="{{ route('quests') }}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-quests">
            <use xlink:href="#svg-quests"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Quests
        </a>
      </li>
    
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link {{ (request()->is('marketplace')) ? 'active' : '' }}" href="{{ route('marketplace') }}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-marketplace">
            <use xlink:href="#svg-marketplace"></use>
          </svg>
          
          Marketplace
        </a>
        
      </li>
    </ul>
    <!-- /MENU -->
  </nav>