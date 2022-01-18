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
		  <!--edit product-->
			<div class="row">
			
			<div class="col-md-12 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
				<h2>Ubah Stock</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="height:100%">
               
                <form id="form-editstock" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    {{csrf_field()}}
					<div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qty">Qty </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="qty" name="qty" aria-describedby="qty" value="{{$data_stock->qty}}">
                    </div>
                  </div>
				  <div class="form-group">
					<input type="hidden" class="form-control col-md-7 col-xs-12" id="updated_by" name="updated_by" aria-describedby="updated_by" value="{{auth()->user()->id}}">
					<input type="hidden" class="form-control col-md-7 col-xs-12" id="product_id" name="product_id" aria-describedby="product_id" value="{{$data_stock->product_id}}">
                    <div class="form-group">
                    	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <button type="submit" class="btn btn-primary" id="savebtn">Simpan</button>
                        </div>
                    </div>
				  </div>
                </form>  
				</div>
              </div>
            </div>
			
			<!-- end widget -->
			  		  
            </div>
			<!--end edit product-->
			
        </div>
        <!-- /page content -->
        @include('template/footermeta')
        <script type="text/javascript">
        $('#form-editstock').on('submit',function(e) {
			var form = $('#form-editstock')[0];
			var data = new FormData(form);
      var id = document.getElementById('product_id').value;
			swal({
			  title: "Simpan Data",
			  text: "Apakah anda ingin menyimpan data ini ?",
			  confirmButtonText:"Yakin",
			  confirmButtonColor: "#002855",
			  cancelButtonText:"Tidak",
			  showCancelButton: true,
			  closeOnConfirm: false,
			  type: "warning",
			  showLoaderOnConfirm: true
			}, function () {
				$.ajax({
					type: "POST",
					enctype: 'multipart/form-data',
					url:"{{url('/updateqtyproduct/')}}/"+id,
					data: data,
					processData: false,
					contentType: false,
					cache: false,
					success:function(e){
						if (e !== "error") {
						swal({
						  title: "Success",
						  confirmButtonColor: "#002855",
						  text: "Data berhasil disimpan !.",
						  type: "success"
						},function(){
							window.location='/listproduct';
						  });
						}
						else{
						swal({
						  title: "Failed",
						  confirmButtonColor: "#002855",
						  text: e+"1",
						  type: "error"
						});
						}
						
					},
					error:function(xhr, ajaxOptions, thrownError){
						swal({
						  title: "Failed",
						  confirmButtonColor: "#002855",
						  text: e+"2",
						  type: "error"
						});
					}
					
				});
				return false;
			});
			e.preventDefault(); 
		  });
		  
    </script>
        </body>
</html>