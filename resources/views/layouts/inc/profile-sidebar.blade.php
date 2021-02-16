<div class="account-hub-sidebar">
	
	        <div class="sidebar-menu">
	         	
	          <div class="sidebar-menu-item">
	           	
	            <div class="sidebar-menu-header accordion-trigger-linked">
	            	
	              <svg class="sidebar-menu-header-icon icon-profile">
	                <use xlink:href="#svg-profile"></use>
	              </svg>

	              <div class="sidebar-menu-header-control-icon">
	              	
	                <svg class="sidebar-menu-header-control-icon-open icon-minus-small">
	                  <use xlink:href="#svg-minus-small"></use>
	                </svg>
	
	                <svg class="sidebar-menu-header-control-icon-closed icon-plus-small">
	                  <use xlink:href="#svg-plus-small"></use>
	                </svg>
	                	
	              </div>
	             	
	              <p class="sidebar-menu-header-title">My Profile</p>

	              <p class="sidebar-menu-header-text">Change your avatar &amp; cover, accept friends, read messages and more!</p>
	             	
	            </div>

	            <div class="sidebar-menu-body accordion-content-linked {{(request()->is(['profile/info','profile/user/social','user/order/history','profile/sell/history','profile/password','notification/all','profile/user/referal/friend'])) ? 'accordion-open': ''}}">
	             	
	              <a class="sidebar-menu-link {{ (request()->is('profile/info')) ? 'active' : '' }}" href="{{ route('user.profile.info') }}">Profile Info</a>
	             	

	              	
	              <a class="sidebar-menu-link {{ (request()->is('profile/user/social')) ? 'active' : '' }}"  href="{{ route('user.update.social.link') }}">Social &amp; Links</a>
                   <a class="sidebar-menu-link {{ (request()->is('user/order/history')) ? 'active' : '' }}" href="{{ route('user.order.history') }}">My Orders</a>

                   <a class="sidebar-menu-link {{ (request()->is('profile/sell/history')) ? 'active' : '' }}" href="{{ route('user.sell.history') }}">My Sell History</a>
                  	

	              <a class="sidebar-menu-link {{ (request()->is('profile/password')) ? 'active' : '' }}" href="{{ route('profile.password') }}">Change Password</a>

	               <a class="sidebar-menu-link {{ (request()->is('notification/all')) ? 'active' : '' }}" href="{{ route('notification.all') }}">All Notifiations</a>
	               @if (Auth::user()->is_affiliate ==2)
	                 <a class="sidebar-menu-link">
	                   Affilite Status: {{App\helpers\Help::affiliateStatus(Auth::user()->is_affiliate)}}
	                 </a>
	               @elseif (Auth::user()->is_affiliate ==3)
	                 <a class="sidebar-menu-link" href="{{ route('user.referal.friend') }}">
	                   {{__('My Referals')}}</a>
	               @elseif (Auth::user()->is_affiliate==1 || Auth::user()->is_affiliate==4)
	                 <a class="sidebar-menu-link apply-affialte-member" href="javascript:;">{{__('Apply For Affiliate Member')}}</a>
	               @endif
	               
	            </div>
	           	
	          </div>

	          <div class="sidebar-menu-item">
	           	
	            <div class="sidebar-menu-header accordion-trigger-linked">
	              	
	              <svg class="sidebar-menu-header-icon icon-store">
	                <use xlink:href="#svg-store"></use>
	              </svg>
  	
	              <div class="sidebar-menu-header-control-icon">
	               	
	                <svg class="sidebar-menu-header-control-icon-open icon-minus-small">
	                  <use xlink:href="#svg-minus-small"></use>
	                </svg>

	                <svg class="sidebar-menu-header-control-icon-closed icon-plus-small">
	                  <use xlink:href="#svg-plus-small"></use>
	                </svg>
	              	
	              </div>

	              <p class="sidebar-menu-header-title">My Store</p>

	              <p class="sidebar-menu-header-text">Review your account, manage products check stats and much more!</p>
	    	
	            </div>
	            <div class="sidebar-menu-body accordion-content-linked {{(request()->is(['profile/account/statement','profile/manage-item','profile/withdraw/redeem'])) ? 'accordion-open': ''}}">

	              <a class="sidebar-menu-link {{ (request()->is('profile/account/statement')) ? 'active' : '' }}" href="{{ route('user.account.statement') }}">My Store</a>
	            		
                   <a class="sidebar-menu-link {{ (request()->is('profile/manage-item')) ? 'active' : '' }}" href="{{ route('user.profile.manage-item') }}">Manage Items</a>

	              <a class="sidebar-menu-link {{ (request()->is('profile/withdraw/redeem')) ? 'active' : '' }}" href="{{ route('user.withdraw.redeen') }}">Withdraw And Redeem</a>
	            	
	            </div>
	           	
	          </div>
	        	
	        </div>
</div>