@include('template/headermeta')

<!-- @section('content') -->
        <!-- page content -->
        <body class="nav-md" progress_bar="true">
  
    <div class="container body">
      <div class="main_container">
      @include('template/menu')
      @include('template/topmenu')
        <div class="right_col" role="main">
           <!--marquee-->
           @include('template/headerinfo')
		  <!-- end marquee-->
		  <!--list userakses-->
			<div class="row">
			
			<div class="col-md-12 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Welcome <small>{{auth()->user()->name}}</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
				<div class="dashboard-widget-content">
						Welcome  To SIM-NOTSTOCK Admin Panel</br>

				</div>
				</div>
              </div>
            </div>
			
			<!-- end widget -->
			  		  
            </div>
			<!--end list userakses-->
			
        </div>
        <!-- /page content -->
        @include('template/footermeta')
        </body>
</html>