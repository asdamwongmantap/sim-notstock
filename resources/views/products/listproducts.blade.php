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
		  <!--list product-->
			<div class="row">
			
			<div class="col-md-12 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <h2>List Produk</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="height:100%">
                  <input type="hidden" id="userid" value="">
                  <a href="/addproduct" class="btn btn-success" title="Tambah Produk" data-target=".bs-example-modal-smadd" style="float:right;display:block;" 
                  id="tomboltambah"><i class="fa fa-plus"></i> Tambah Produk</a></br>
                  </br>
                  <table id="mydata" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Kategori</th>
						  <th>SKU</th>
						  <th>Berat</th>
						  <th>Harga</th>
						  <th>Jumlah</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="show_data">
                      @foreach($data_product as $product)
					  @if ($product->qty <= $product->min_qty)
					  <tr style="background-color:#fc032c;color:#ffffff;">
                          <td><a href="/detailproduct/{{$product->product_id}}" style="color:#ffffff;">{{$product->product_name}}</a></td>							
                          <td>{{$product->product_category}}</td>
						  <td>{{$product->product_sku}}</td>
						  <td>{{$product->product_weight}}</td>
						  <td>{{$product->product_price}}</td>
						  <td>{{$product->qty}}</td>
                          <td>
                            <a href="/deleteproduct/{{$product->product_id}}" class="btn btn-danger item_deleteproduct" data-id="{{$product->product_id}}">Delete</a>
							<a href="/editqtyproduct/{{$product->product_id}}" class="btn btn-primary">Edit Stock</a>
						</td>
                        </tr>
						@else
                      <tr style="background-color:#F7F7F7;color:#000000;">
                          <td><a href="/detailproduct/{{$product->product_id}}">{{$product->product_name}}</a></td>							
                          <td>{{$product->product_category}}</td>
						  <td>{{$product->product_sku}}</td>
						  <td>{{$product->product_weight}}</td>
						  <td>{{$product->product_price}}</td>
						  <td>{{$product->qty}}</td>
                          <td>
                            <a href="/editproduct/{{$product->product_id}}" class="btn btn-primary">Edit</a>
                            <a href="/deleteproduct/{{$product->product_id}}" class="btn btn-danger item_deleteproduct" data-id="{{$product->product_id}}">Delete</a>
							<a href="/editqtyproduct/{{$product->product_id}}" class="btn btn-primary">Edit Stock</a>
						</td>
                        </tr>
						@endif
                      @endforeach
                      </tbody>
                    </table>
				        </div>
              </div>
            </div>
			
			<!-- end widget -->
			  		  
            </div>
			<!--end list product-->
			
        </div>
        <!-- /page content -->
        @include('template/footermeta')
        <script type="text/javascript">
		$(document).ready(function(){
		$('#mydata').dataTable();
		});
		
		//prosesdelete
		$(document).on('click','.item_deleteproduct',function(e) {
		var product_id = $(this).data('id');
		var title = "Hapus Data";
		var text = "Apakah anda yakin ingin menghapus data ini ?";
	
		swal({
			title: title,
			text: text,
			confirmButtonText:"Yakin",
			confirmButtonColor: "#002855",
			cancelButtonText:"Tidak",
			showCancelButton: true,
			closeOnConfirm: false,
			type:"warning",
			animation: "slide-from-top",
			header: "Test Header",
			showLoaderOnConfirm: true
		}, function () {
			$.ajax({
				url:"{{url('/deleteproduct')}}/"+product_id,
				dataType:'text',
				data : {product_id:product_id},
				success:function(e){
					if (e !== "error") {
					swal({
						title: "Success",
						confirmButtonColor: "#002855",
						text: "Data Berhasil Dihapus !",
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
						text: e+"1",
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