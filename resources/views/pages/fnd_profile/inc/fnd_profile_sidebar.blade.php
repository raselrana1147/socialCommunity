<!-- SIDEBAR MENU -->
	        <div class="sidebar-menu">
	          <!-- SIDEBAR MENU ITEM -->
	          <div class="sidebar-menu-item">
	            <!-- SIDEBAR MENU HEADER -->
	            <div class="sidebar-menu-header accordion-trigger-linked">
	              <!-- SIDEBAR MENU HEADER ICON -->
	              <svg class="sidebar-menu-header-icon icon-profile">
	                <use xlink:href="#svg-profile"></use>
	              </svg>
	              <!-- /SIDEBAR MENU HEADER ICON -->

	              <!-- SIDEBAR MENU HEADER CONTROL ICON -->
	              <div class="sidebar-menu-header-control-icon">
	                <!-- SIDEBAR MENU HEADER CONTROL ICON OPEN -->
	                <svg class="sidebar-menu-header-control-icon-open icon-minus-small">
	                  <use xlink:href="#svg-minus-small"></use>
	                </svg>
	                <!-- /SIDEBAR MENU HEADER CONTROL ICON OPEN -->

	                <!-- SIDEBAR MENU HEADER CONTROL ICON CLOSED -->
	                <svg class="sidebar-menu-header-control-icon-closed icon-plus-small">
	                  <use xlink:href="#svg-plus-small"></use>
	                </svg>
	                <!-- /SIDEBAR MENU HEADER CONTROL ICON CLOSED -->
	              </div>
	              <!-- /SIDEBAR MENU HEADER CONTROL ICON -->


	            
	              <!-- SIDEBAR MENU HEADER TITLE -->
	              <p class="sidebar-menu-header-title">My Profile</p>
	              <!-- /SIDEBAR MENU HEADER TITLE -->

	              <!-- SIDEBAR MENU HEADER TEXT -->
	              <p class="sidebar-menu-header-text">Change your avatar &amp; cover, accept friends, read messages and more!</p>
	              <!-- /SIDEBAR MENU HEADER TEXT -->
	            </div>
	            <!-- /SIDEBAR MENU HEADER -->

	            <!-- SIDEBAR MENU BODY -->
	            <div class="sidebar-menu-body accordion-content-linked accordion-open">
	              <!-- SIDEBAR MENU LINK -->
	              <a class="sidebar-menu-link active" href="{{ route('friend.profile.about',$fnd_user->username) }}">Profile Info</a>
	              <!-- /SIDEBAR MENU LINK -->

	              <!-- SIDEBAR MENU LINK -->
	              <a class="sidebar-menu-link" href="#">Social &amp; Stream</a>
	              <!-- /SIDEBAR MENU LINK -->
	            </div>
	            <!-- /SIDEBAR MENU BODY -->
	          </div>
	          <!-- /SIDEBAR MENU ITEM -->

	          <!-- SIDEBAR MENU ITEM -->
	          <div class="sidebar-menu-item">
	            <!-- SIDEBAR MENU HEADER -->
	            <div class="sidebar-menu-header accordion-trigger-linked">
	              <!-- SIDEBAR MENU HEADER ICON -->
	              <svg class="sidebar-menu-header-icon icon-settings">
	                <use xlink:href="#svg-settings"></use>
	              </svg>
	              <!-- /SIDEBAR MENU HEADER ICON -->

	              <!-- SIDEBAR MENU HEADER CONTROL ICON -->
	              <div class="sidebar-menu-header-control-icon">
	                <!-- SIDEBAR MENU HEADER CONTROL ICON OPEN -->
	                <svg class="sidebar-menu-header-control-icon-open icon-minus-small">
	                  <use xlink:href="#svg-minus-small"></use>
	                </svg>
	                <!-- /SIDEBAR MENU HEADER CONTROL ICON OPEN -->

	                <!-- SIDEBAR MENU HEADER CONTROL ICON CLOSED -->
	                <svg class="sidebar-menu-header-control-icon-closed icon-plus-small">
	                  <use xlink:href="#svg-plus-small"></use>
	                </svg>
	                <!-- /SIDEBAR MENU HEADER CONTROL ICON CLOSED -->
	              </div>
	              <!-- /SIDEBAR MENU HEADER CONTROL ICON -->

	              <!-- SIDEBAR MENU HEADER TITLE -->
	              <p class="sidebar-menu-header-title">Account</p>
	              <!-- /SIDEBAR MENU HEADER TITLE -->

	              <!-- SIDEBAR MENU HEADER TEXT -->
	              <p class="sidebar-menu-header-text">Change settings, configure notifications, and review your privacy</p>
	              <!-- /SIDEBAR MENU HEADER TEXT -->
	            </div>
	            <!-- /SIDEBAR MENU HEADER -->

	            <!-- SIDEBAR MENU BODY -->
	            <div class="sidebar-menu-body accordion-content-linked">
	              <!-- SIDEBAR MENU LINK -->
	              <a class="sidebar-menu-link" href="{{ route('user.profile.info') }}">Account Info</a>
	              <a class="sidebar-menu-link" href="{{ route('profile.password') }}">Change Password</a>
	            </div>
	            <!-- /SIDEBAR MENU BODY -->
	          </div>
	          <!-- /SIDEBAR MENU ITEM -->

	          <!-- /SIDEBAR MENU ITEM -->

	          <!-- SIDEBAR MENU ITEM -->
	          <div class="sidebar-menu-item">
	            <!-- SIDEBAR MENU HEADER -->
	            <div class="sidebar-menu-header accordion-trigger-linked">
	              <!-- SIDEBAR MENU HEADER ICON -->
	              <svg class="sidebar-menu-header-icon icon-store">
	                <use xlink:href="#svg-store"></use>
	              </svg>
	              <!-- /SIDEBAR MENU HEADER ICON -->

	              <!-- SIDEBAR MENU HEADER CONTROL ICON -->
	              <div class="sidebar-menu-header-control-icon">
	                <!-- SIDEBAR MENU HEADER CONTROL ICON OPEN -->
	                <svg class="sidebar-menu-header-control-icon-open icon-minus-small">
	                  <use xlink:href="#svg-minus-small"></use>
	                </svg>
	                <!-- /SIDEBAR MENU HEADER CONTROL ICON OPEN -->

	                <!-- SIDEBAR MENU HEADER CONTROL ICON CLOSED -->
	                <svg class="sidebar-menu-header-control-icon-closed icon-plus-small">
	                  <use xlink:href="#svg-plus-small"></use>
	                </svg>
	                <!-- /SIDEBAR MENU HEADER CONTROL ICON CLOSED -->
	              </div>
	              <!-- /SIDEBAR MENU HEADER CONTROL ICON -->

	              <!-- SIDEBAR MENU HEADER TITLE -->
	              <p class="sidebar-menu-header-title">My Store</p>
	              <!-- /SIDEBAR MENU HEADER TITLE -->

	              <!-- SIDEBAR MENU HEADER TEXT -->
	              <p class="sidebar-menu-header-text">Review your account, manage products check stats and much more!</p>
	              <!-- /SIDEBAR MENU HEADER TEXT -->
	            </div>
	            <div class="sidebar-menu-body accordion-content-linked">
	              <!-- SIDEBAR MENU LINK -->
	              <a class="sidebar-menu-link" href="{{ route('user.account.statement') }}">My Account</a>
	              <a class="sidebar-menu-link" href="{{ route('user.withdraw.redeen') }}">Withdraw And Redeem</a>
	              <!-- /SIDEBAR MENU LINK -->
	            </div>
	            <!-- /SIDEBAR MENU BODY -->
	          </div>
	          <!-- /SIDEBAR MENU ITEM -->
	        </div>
