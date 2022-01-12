<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('/assets/images/logoawr.png')}}" type="image/ico" />

  <title>SIM-NOTSTOCK</title>
	<!-- Bootstrap -->
    <link href="{{ asset('/assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
	<!--JQUERY JS-->
	 <script src="{{ asset('/assets/js/jquery.js')}}"></script>
	<!-- Custom Theme Style -->
    <link href="{{ asset('/assets/build/css/custom.min.css')}}" rel="stylesheet"> 
</head>
  
  <body class="login">
    <div>
		<div class="login_wrapper">
		<!-- Small modal -->
		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">

			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
			  </button>
			  <h4 class="modal-title" id="myModalLabel2">Login Guide</h4>
			</div>
			<div class="modal-body">
			  <h4>How To Login ?</h4>
			  <p>Please enter <b>your Username and your Password</b> into text area that we have provide </p>
        <p>If you can't login, please contact administrator</p>
        <p>If you don't have account you can <b><a href="">REGISTER</a></b> here</p>
			  <p>Thanks</p>
			</div>
			
		  </div>
		</div>
    </div>
    <!-- end small modal -->
        <div class="animate form login_form">
          <section class="login_content">
		  <img src="{{ asset('/assets/images/logoawr.png')}}" style="height:30%;width:30%;">
            <form action="/ceklogin" method="POST">
            <!-- @csrf -->
            {{csrf_field()}}
			<h1>SIM-NOTSTOCK</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
			  <div>
                <button type="submit" class="btn btn-primary">LOG IN</button>
                
				
              </div>
			  
			  <div class="separator">
			  <div>
				<h5>How To Login ? &nbsp;<a style="cursor:pointer;text-decoration:none;color:blue;" data-toggle="modal" data-target=".bs-example-modal-sm">Login Guide</a></h5>
			  </div>
			  <div class="clearfix"></div>
               <div>
                  <p>©2022 All Rights Reserved.<a href="">PT. Anya Living</a></p>
                </div>
              </div>
            
          </section>
        </div>
		
	  </form>
      </div>
    </div>
	<!-- jQuery -->
    <script src="{{ asset('/assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	 <!-- Custom Theme Scripts -->
    <script src="{{ asset('/assets/build/js/custom.min.js')}}"></script>
  </body>
</html>
