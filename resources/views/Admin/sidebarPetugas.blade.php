 <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/img/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>{{Auth::guard('admin')->user()->name}}</span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-check-square-o"></i> Verifikasi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/verifikasi">Verifikasi Donatur & Donasi</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-automobile"></i> Jemput <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/jemput">Jemput Bantuan</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cube"></i> Gudang <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/gudang">Penyimpanan di Gudang</a></li>
                    </ul>
                  </li>
               <!--   <li><a><i class="fa fa-users"></i> Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/donatur">Data Donatur</a></li>
                    </ul>
                  </li>-->
                  <li><a><i class="fa fa-info-circle"></i> Informasi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/statistik">Data Penjemputan</a></li>
                      <li><a href="/admin/statistik/donasi">Informasi Donasi</a></li>
                      <li><a href="/admin/bencana">Tambah Bencana</a></li>
                      <li><a href="/admin/kurir">Informasi Kurir</a></li>
                     <li><a href="/admin/pakar">Pakar</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="/img/user.png" alt="">{{Auth::guard('admin')->user()->name}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                 
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf
                      </form>
                  </ul>

                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
