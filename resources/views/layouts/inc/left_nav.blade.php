 <nav id="navigation-widget-small" class="navigation-widget navigation-widget-desktop closed sidebar left delayed">
    <!-- USER AVATAR -->
    <a class="user-avatar small no-outline online" href="{{ route('user.profile.about') }}">
      <!-- USER AVATAR CONTENT -->
      <div class="user-avatar-content">
        <!-- HEXAGON -->
        <div class="hexagon-image-30-32" data-src="{{(Auth::user()->avatar !=null) ?  asset('front/image/user/avatar/'.Auth::user()->avatar) : asset('front/image/user/profile.jpg')}}"></div>
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
    </a>
    <!-- /USER AVATAR -->

    <!-- MENU -->
    <ul class="menu small">
      <!-- MENU ITEM -->
      <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="{{ route('home') }}" data-title="Newsfeed">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-newsfeed">
            <use xlink:href="#svg-newsfeed"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item {{ request()->is('badges') ? 'active' : '' }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="{{ route('badges') }}" data-title="Badges">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-badges">
            <use xlink:href="#svg-badges"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item {{ request()->is('quests') ? 'active' : '' }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="{{ route('quests') }}" data-title="Quests">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-quests">
            <use xlink:href="#svg-quests"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="{{ route('marketplace') }}" data-title="Marketplace">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-marketplace">
            <use xlink:href="#svg-marketplace"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->
    </ul>
    <!-- /MENU -->
  </nav>