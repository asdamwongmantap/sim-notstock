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
				<h2>Ubah Produk</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="height:100%">
               
                <form id="form-editproduct" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    {{csrf_field()}}
					<div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_name">Nama </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_name" name="product_name" aria-describedby="product_name" value="{{$data_product->product_name}}">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_category">Kategori </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_category" name="product_category" aria-describedby="product_category" value="{{$data_product->product_category}}">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_weight">Berat </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_weight" name="product_weight" aria-describedby="product_weight" value="{{$data_product->product_weight}}">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_price">Harga </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_price" name="product_price" aria-describedby="product_price" value="{{$data_product->product_price}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_desc">Deskripsi </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_desc" name="product_desc" aria-describedby="product_desc" value="{{$data_product->product_desc}}">
                    </div>
				  </div>
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_sku">SKU </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" class="form-control col-md-7 col-xs-12" id="product_sku" name="product_sku" aria-describedby="product_sku" value="{{$data_product->product_sku}}">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qty">Qty </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" disabled class="form-control col-md-7 col-xs-12" id="qty" name="qty" aria-describedby="qty" value="{{$data_product->qty}}">
                    </div>
				  </div>
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="min_qty">Minimal Qty </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<input type="text" disabled class="form-control col-md-7 col-xs-12" id="min_qty" name="min_qty" aria-describedby="min_qty" value="{{$data_product->min_qty}}">
                    </div>
				  </div>

				 <div class="form-group">
					<input type="hidden" class="form-control col-md-7 col-xs-12" id="updated_by" name="updated_by" aria-describedby="updated_by" value="{{auth()->user()->id}}">
					<input type="hidden" class="form-control col-md-7 col-xs-12" id="product_id" name="product_id" aria-describedby="product_id" value="{{$data_product->product_id}}">
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
        $('#form-editproduct').on('submit',function(e) {
			var form = $('#form-editproduct')[0];
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
					url:"{{url('/updateproduct/')}}/"+id,
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