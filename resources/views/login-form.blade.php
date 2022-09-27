<!DOCTYPE html>
<html lang="en">
<head>
	<title>Azure Investama - System Application | Log in</title>
	<meta charset="UTF-8">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('login-form/css/style.css')}}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('login_form/css/style.css')}}">
	<link rel="icon" type="image/png" href="{{asset('login-form/images/icons/favicon.ico')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('login-form/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login-form/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login-form/fonts/iconic/css/material-design-iconic-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login-form/vendor/animate/animate.css')}}">	
	<link rel="stylesheet" type="text/css" href="{{asset('login-form/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login-form/vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login-form/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login-form/vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login-form/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('login-form/css/main.css')}}">
</head>
<body>
	
  <section class="ftco-section">
		<div class="container">
			{{-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">RAISA</h2>
				</div>
			</div> --}}
            <br>
		<div class="row justify-content-center">
		<div class="col-md-12 col-lg-7">
			<div class="login-wrap">
				<form action="{{ url('login') }}" method="post" class="signin-form d-md-flex">
						{{ csrf_field() }}
						<div class="half p-4 py-md-5">
			      		<div class="w-100">
			      			<h3 class="mb-4"><b></b></h3>
			      		</div>
			      		<div class="form-group mt-3">
			      			<label class="label" for="name">NIK</label>
			      			<input type="text" class="form-control" placeholder="NIK" name="username" id="username" required>
							  @if ($errors->has('username'))
							  <span class="text-danger">{{ $errors->first('username') }}</span>
							  @endif
						</div>
		            <div class="form-group">
							<label class="label" for="password">Kata sandi</label>
						<input id="password" name="password" type="password" class="form-control" placeholder="Kata sandi" required>
						<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						@if ($errors->has('password-field'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
                    <div class="form-group">
		            	<button type="submit" class="form-control btn btn-secondary rounded submit px-3">Masuk</button>
		            </div>
		          </div>
					<!--<div class="half p-4 py-md-5" style="background-color:#17223b;">-->
					<div class="half p-4 py-md-5" style="background-image:url('uploads/iStock-582256640.jpg'); background-repeat: no-repeat;
					background-size: cover;opacity:1;">
                    <p>
                    <center>
                        <img src="{{asset('uploads/Azure-4a_Transparent_alt_TRIM.png')}}" width="50%" height="50%">
                        <br>
                        <br>
                    {{-- <span style="font-size: 19px; color: white;line-height: 0.8;"></span></center> --}}
                    <br>
                    <br>
                    <br>
                    
                    <span style="font-size: 28px; color: white;"><b>RAISA</b></span>
                    </p>
                  
		            <p class="w-100 text-center" style="color:white;"> <i>integrated system administration</i> </p>
			            <div class="w-100">
                            <!--<p class="social-media d-flex justify-content-center">-->
                            <!--    <a href="https://www.linkedin.com/company/azure-investama/" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-linkedin"></span></a>-->
                            <!--    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-instagram"></span></a>-->
                            <!--</p>-->
					    </div>
		          </div>
	          </form>
	        </div>
	      </div>
			</div>
		</div>
	</section>   


	<div id="dropDownSelect1"></div>
	<script src="{{asset('login-form/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('login-form/vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{asset('login-form/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('login-form/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('login-form/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('login-form/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('login-form/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('login-form/vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{asset('login-form/js/main.js')}}"></script>
	<script src="{{ asset('login_form/js/jquery.min.js') }}"></script>
  <script src="{{ asset('login_form/js/popper.js')}}"></script>
  <script src="{{ asset('login_form/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('login_form/js/main.js')}}"></script>
  {{-- ------------------------------------------- --}}
 
  <script type="text/javascript">
		function hideshow(){
			var password = document.getElementById("password");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");

			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}
    	}
	</script>
</body>
</html>


