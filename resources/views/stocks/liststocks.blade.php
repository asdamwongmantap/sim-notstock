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
		  <!--list stock-->
			<div class="row">
			
			<div class="col-md-12 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <h2>List Stock</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="height:100%">
                  <input type="hidden" id="userid" value="">
                   <table id="mydata" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Qty</th>
						  <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="show_data">
                      @foreach($data_stock as $stock)
					  @if ($stock->qty == $stock->min_qty)
						<tr style="background-color:#fc032c;color:#ffffff;">
                          <td><a href="/detailstock/{{$stock->product_id}}" style="color:#ffffff;">{{$stock->product_name}}</a></td>							
                          <td>{{$stock->qty}}</td>
						  <td>
                            <a href="/editstock/{{$stock->product_id}}" class="btn btn-primary">Edit</a>
                         </td>
                        </tr>
					  @else
						<tr style="background-color:#F7F7F7;color:#000000;">
                          <td><a href="/detailstock/{{$stock->product_id}}">{{$stock->product_name}}</a></td>							
                          <td>{{$stock->qty}}</td>
						  <td>
                            <a href="/editstock/{{$stock->product_id}}" class="btn btn-primary">Edit</a>
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
			<!--end list stock-->
			
        </div>
        <!-- /page content -->
        @include('template/footermeta')
        <script type="text/javascript">
		$(document).ready(function(){
		$('#mydata').dataTable();
		});
		
		//prosesdelete
		$(document).on('click','.item_deletestock',function(e) {
		var id = $(this).data('id');
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
				url:"{{url('/deletestock')}}/"+id,
				dataType:'text',
				data : {id:id},
				success:function(e){
					if (e !== "error") {
					swal({
						title: "Success",
						confirmButtonColor: "#002855",
						text: "Data Berhasil Dihapus !",
						type: "success"
					},function(){
						window.location='/liststock';
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