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
				<h2>Report Stock</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="height:100%">
                <form id="form-reportstock" action="/pdfstock" data-parsley-validate class="form-horizontal form-label-left" method="post" >
                    {{csrf_field()}}
					<div class="form-group">
						<label for="stock_tgl" class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal </label>
						<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="input-group date" id="myDatepicker2">
							<input type="text" class="form-control col-md-7 col-xs-12" id="stock_tgl" name="stock_tgl1" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>	
						</div>
						<label for="stock_tgl2" class="control-label col-md-1 col-sm-1 col-xs-12" >Sampai </label>
						<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="input-group date" id="myDatepicker3">
							<input type="text" class="form-control col-md-7 col-xs-12" id="stock_tgl2" name="stock_tgl2" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>	
						</div>
					</div>
					
						<input type="hidden" class="form-control col-md-7 col-xs-12" id="created_by" name="created_by" aria-describedby="created_by" value="{{auth()->user()->id}}">
						
						<input type="hidden" class="form-control col-md-7 col-xs-12" id="updated_by" name="updated_by" aria-describedby="updated_by" value="{{auth()->user()->id}}">
						
						
						<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<button type="submit" class="btn btn-primary" id="savebtn">Cetak</button>
			
					</div>
					</div>
                    
                    </form>
				</div>
              </div>
            </div>
			
			<!-- end widget -->
			  		  
            </div>
			<!--end list userakses-->
			
        </div>
        <!-- /page content -->
        @include('template/footermeta')
		 <script type="text/javascript">
		$('#myDatepicker2').datetimepicker({
        		format: 'DD/MM/YYYY'
			});
			$('#myDatepicker3').datetimepicker({
        		format: 'DD/MM/YYYY'
			});
       
		  
    </script> 
    </body>
</html>
        