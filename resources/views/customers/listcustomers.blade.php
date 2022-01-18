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
		  <!--list customer-->
			<div class="row">
			
			<div class="col-md-12 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <h2>List Customer</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="height:100%">
                  <table id="mydata" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						  <th>ID</th>
                          <th>Nama</th>
                          <th>Email</th>
						  <th>No.HP</th>
                        </tr>
                      </thead>
                      <tbody id="show_data">
                      @foreach($data_customer as $customer)
                      <tr style="background-color:#F7F7F7;color:#000000;">
					  <td><a href="/detailcustomer/{{$customer->customer_id}}">{{$customer->customer_id}}</a></td>
                          <td>{{$customer->customer_name}}</td>							
                          <td>{{$customer->customer_email}}</td>
						  <td>{{$customer->customer_phone}}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
				        </div>
              </div>
            </div>
			
			<!-- end widget -->
			  		  
            </div>
			<!--end list customer-->
			
        </div>
        <!-- /page content -->
        @include('template/footermeta')
        <script type="text/javascript">
		$(document).ready(function(){
		$('#mydata').dataTable();
		});
		
		//prosesdelete
		$(document).on('click','.item_deletecustomer',function(e) {
		var customer_id = $(this).data('id');
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
				url:"{{url('/deletecustomer')}}/"+customer_id,
				dataType:'text',
				data : {customer_id:customer_id},
				success:function(e){
					if (e !== "error") {
					swal({
						title: "Success",
						confirmButtonColor: "#002855",
						text: "Data Berhasil Dihapus !",
						type: "success"
					},function(){
						window.location='/listcustomer';
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