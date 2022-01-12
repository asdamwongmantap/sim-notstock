<!-- top navigation -->
<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                 
				  <a class="user-profile dropdown-toggle">
                    <img src="{{ asset('/assets/images/logoawr.png')}}" alt="">{{auth()->user()->name}}
                   
                  </a>
                
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->