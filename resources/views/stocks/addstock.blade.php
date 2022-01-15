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
		  <!--add product-->
			<div class="row">
			
			<div class="col-md-12 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
				<h2>Tambah Produk</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="height:100%">
                <form id="form-addproduct" data-parsley-validate class="form-horizontal form-label-left" method="post" >
                    {{csrf_field()}}
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_name">Nama </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_name" name="product_name" aria-describedby="product_name">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_category">Kategori </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_category" name="product_category" aria-describedby="product_category">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_weight">Berat </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_weight" name="product_weight" aria-describedby="product_weight">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_sku">SKU </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_sku" name="product_sku" aria-describedby="product_sku">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_price">Harga </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_price" name="product_price" aria-describedby="product_price">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_desc">Deskripsi </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_desc" name="product_desc" aria-describedby="product_desc">
                    </div>
				  </div>
				  
					<input type="hidden" class="form-control col-md-7 col-xs-12" id="created_by" name="created_by" aria-describedby="created_by" value="{{auth()->user()->id}}">
                  <div class="form-group">
					<input type="hidden" class="form-control col-md-7 col-xs-12" id="updated_by" name="updated_by" aria-describedby="updated_by" value="{{auth()->user()->id}}">
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
			<!--end add product-->
			
        </div>
        <!-- /page content -->
        @include('template/footermeta')
        <script type="text/javascript">
        $('#form-addproduct').on('submit',function(e) {
			var form = $('#form-addproduct')[0];
			var data = new FormData(form);
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
					url:"{{url('/saveproduct')}}",
					data: data,
					processData: false,
					contentType: false,
					cache: false,
					success:function(e){
						console.log("tes"+e)
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
        