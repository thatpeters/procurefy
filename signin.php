<?php 

session_start();

if (isset($_SESSION['name'])) {
	header('Location: dashboard/index.php');
};

if(isset($_COOKIE["auto_login"]))
{
	header('Location: authenticate.php');
}

?>




<!doctype html>
<html class="fixed">
<title>PFFS</title>

<head>


	<!-- Basic -->
	<meta charset="UTF-8">

	<meta name="theme-color" content="#ffffff"/>


	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link rel="apple-touch-icon" href="assets/images/apple-touch-icon-iphone-60x60.png">
<link rel="apple-touch-icon" sizes="60x60" href="assets/images/apple-touch-icon-ipad-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-touch-icon-iphone-retina-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="assets/images/apple-touch-icon-ipad-retina-152x152.png">
<link rel="icon" href="assets/images/apple-touch-icon-iphone-60x60.png">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<link rel="manifest" href="manifest.webmanifest">
	<script type="text/javascript">
      if ( "serviceWorker" in navigator ) {
        navigator.serviceWorker.register( "sw.js" )
          .then( function ( registration ) { 
            console.log( "ServiceWorker registration successful with scope: ", registration.scope );
      
          } ).catch( function ( err ) { 
      
            console.error( "ServiceWorker registration failed: ", err );
          } );
      
      }
   </script>

</head>





<body>
	<!-- start: page -->
	<section class="body-sign">
		<div class="center-sign">
			<a href="." class="logo pull-left">
				<img src="assets/images/PWA.png" height="54" alt="Porto Admin" />
			</a>

			<div class="panel panel-sign">
				<div class="panel-title-sign mt-xl text-right">
					<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
				</div>
				<div class="panel-body">
					<form name="login_form" method="post" action="authenticate.php">
						<div class="form-group mb-lg">
							<label>Email / Identification Number / Identifier</label>
							<div class="input-group input-group-icon">
								<input name="email" type="text" class="form-control input-lg" required />
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-user"></i>
									</span>
								</span>
							</div>
						</div>

						<div class="form-group mb-lg">
							<div class="clearfix">
								<label class="pull-left">Password</label>
							</div>
							<div class="input-group input-group-icon">
								<input name="password" type="password" class="form-control input-lg" required />
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-lock"></i>
									</span>
								</span>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">

							</div>
							<div class="col-sm-4 text-right">
								<button type="submit" name="submit" class="btn btn-primary hidden-xs">Sign In</button>
								<button type="submit" name="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
							</div>
						</div>

						<span class="mt-lg mb-lg line-thru text-center text-uppercase">
							<span>or</span>
						</span>



						<p class="text-center">Don't have an account yet? <a href="signup.html">Sign Up!</a>

					</form>
				</div>
			</div>

		</div>
	</section>
	<!-- end: page -->



</html>