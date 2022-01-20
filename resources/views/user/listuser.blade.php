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
                <h2>List User</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="height:100%">
                  <input type="hidden" id="userid" value="">
                  <a href="/adduser" class="btn btn-success" title="Tambah User" data-target=".bs-example-modal-smadd" style="float:right;display:block;" 
                  id="tomboltambah"><i class="fa fa-plus"></i> Tambah User</a></br>
                  </br>
                  <table id="mydata" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nama</th>
						  <th>Email</th>
						  <th>Level</th>
						  <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="show_data">
                    
                      	 
                      @foreach($data_user as $user)
                      <tr style="background-color:#F7F7F7;color:#000000;">
                          <td>{{$user->name}}</td>							
                          <td>{{$user->email}}</td>
						  <td>{{$user->level}}</td>
                          <td>
                            <a href="/edituser/{{$user->id}}" class="btn btn-primary">Edit
                            <a href="/deleteuser/{{$user->id}}" class="btn btn-danger item_deleteuser" data-id="{{$user->id}}">Delete</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
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
		$(document).ready(function(){
		$('#mydata').dataTable();
		});
		
			//prosesdelete
			$(document).on('click','.item_deleteuser',function(e) {
			var user_id = $(this).data('id');
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
					url:"{{url('/deleteuser/')}}/"+user_id,
					dataType:'text',
					data : {user_id:user_id},
					success:function(e){
						if (e !== "error") {
						swal({
						  title: "Success",
						  confirmButtonColor: "#002855",
						  text: "Data Berhasil Dihapus !",
						  type: "success"
						},function(){
							window.location='/listuser';
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