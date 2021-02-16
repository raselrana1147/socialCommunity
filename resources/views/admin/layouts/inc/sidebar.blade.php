 <header class="main-nav">
          <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a></div>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
                    <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-title">
                    <div>
                      <h6 class="lan-1">General</h6>
                      <p class="lan-2">Dashboards,widgets & layout.</p>
                    </div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('admin.dashboard') }}"><i data-feather="home"> </i><span>Dashboard</span></a></li>
                   <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('admin.user') }}"><i data-feather="users"> </i><span>Users</span></a></li>
                   <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="shopping-bag"></i><span>Elements</span></a>
                     <ul class="nav-submenu menu-content">
                       <li><a href="{{ route('location.index') }}">Locations</a></li>
                       <li><a href="{{ route('quest.index') }}">Quests</a></li>
                       <li><a href="{{ route('badge.index') }}">Badges</a></li>
                       <li><a href="{{ route('admin.post.index') }}">Posts</a></li>
                     </ul>
                   </li>
              
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="knowledgebase.html"><i data-feather="sunrise"> </i><span>Knowledgebase</span></a></li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="support-ticket.html"><i data-feather="users"> </i><span>Support Ticket</span></a></li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>