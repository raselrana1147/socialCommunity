 <nav class="section-navigation">
      <!-- SECTION MENU -->
      <div id="section-navigation-slider" class="section-menu">
        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item {{ (request()->is('profile/about')) ? 'active' : '' }}" href="{{ route('user.profile.about') }}">
          <!-- SECTION MENU ITEM ICON -->
          <svg class="section-menu-item-icon icon-profile">
            <use xlink:href="#svg-profile"></use>
          </svg>
          <!-- /SECTION MENU ITEM ICON -->
  
          <!-- SECTION MENU ITEM TEXT -->
          <p class="section-menu-item-text">About</p>
          <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->
  
        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item {{ (request()->is('profile/user/timeline')) ? 'active' : '' }}" href="{{ route('user.profile.timeline')}}">
          <!-- SECTION MENU ITEM ICON -->
          <svg class="section-menu-item-icon icon-timeline">
            <use xlink:href="#svg-timeline"></use>
          </svg>

          <p class="section-menu-item-text">Timeline</p>
          
        </a>

        <a class="section-menu-item" href="{{ route('user.profile.manage-item') }}">
          <!-- SECTION MENU ITEM ICON -->
          <svg class="section-menu-item-icon icon-store">
            <use xlink:href="#svg-store"></use>
          </svg>
          <!-- /SECTION MENU ITEM ICON -->
  
          <!-- SECTION MENU ITEM TEXT -->
          <p class="section-menu-item-text">Store</p>
          <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->
      </div>
      <!-- /SECTION MENU -->
  
      <!-- SLIDER CONTROLS -->
      <div id="section-navigation-slider-controls" class="slider-controls">
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
    </nav>