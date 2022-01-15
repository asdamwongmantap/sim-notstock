
<div class="container body">
    <div class="main_container">
    <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border:0px solid black;">
              <a href="#" class="site_title"><i class="fa fa-truck"></i> <span><small>SIM-NOTSTOCK</small></span></a>
            </div>
            
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('/assets/images/logoawr.png')}}" alt="user" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{auth()->user()->name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
			
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              @if (auth()->user()->level == '1')
              <ul class="nav side-menu">
                <h3>General</h3>
                <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
                <h3>Master Data</h3>
                <li><a href="/listuser"><i class="fa fa-users"></i> List Pengguna </a></li>
                <li><a href="/listcustomer"><i class="fa fa-user"></i> List Customer </a></li>
                <h3>Logistik</h3>
                <li><a href="/listproduct"><i class="fa fa-list"></i> List Barang </a></li>
                <h3>Report</h3>
                <li><a href="/reportterima"><i class="fa fa-file-pdf-o"></i> Laporan Penerimaan </a></li>
                <li><a href="/reportkeluar"><i class="fa fa-file-pdf-o"></i> Laporan Pengeluaran </a></li>
                <h3>Others</h3>
                <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout </a></li>
              </ul>
              @else
              <ul class="nav side-menu">
                <h3>General</h3>
                <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
                <h3>Master Data</h3>
                <li><a href="/listcustomer"><i class="fa fa-user"></i> List Customer </a></li>
                <h3>Logistik</h3>
                <li><a href="/listproduct"><i class="fa fa-list"></i> List Barang </a></li>
                <h3>Others</h3>
                <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout </a></li>
              </ul>
              @endif
              </div>
              
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
        