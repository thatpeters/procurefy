<!doctype html>
<html class="fixed">

<head>
<link rel="icon" href="../assets/images/apple-touch-icon-iphone-60x60.png">

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>PFFS</title>
	<meta name="theme-color" content="#ffffff"/>


	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="../assets/vendor/pnotify/pnotify.custom.css" />
	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="../assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
	<link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
	<link rel="stylesheet" href="../assets/vendor/morris/morris.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/theme.css" />
	<link rel="apple-touch-icon" href="../assets/images/apple-touch-icon-iphone-60x60.png">
<link rel="apple-touch-icon" sizes="60x60" href="../assets/images/apple-touch-icon-ipad-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../assets/images/apple-touch-icon-iphone-retina-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../assets/images/apple-touch-icon-ipad-retina-152x152.png">

	<!-- Skin CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<script src="../assets/vendor/modernizr/modernizr.js"></script>
	<link rel="manifest" href="../manifest.webmanifest">
	<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<style type="text/css">
    .desc {
        display: none;
    }
</style>



</head>

<?php
include '../connect.php';
session_start();

if (!$_SESSION['userid']) {
	header('Location: ../index.html');
}
function getAddress($RG_Lat, $RG_Lon)
{
	$json = "https://nominatim.openstreetmap.org/reverse?format=json&lat=" . $RG_Lat . "&lon=" . $RG_Lon . "&zoom=18&addressdetails=1";

	$ch = curl_init($json);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0");
	$jsonfile = curl_exec($ch);
	curl_close($ch);

	$RG_array = json_decode($jsonfile, true);

	return $RG_array['display_name'];

}

?>




<body>
	<section class="body">

		<!-- start: header -->
		<header class="header">
			<div class="logo-container">
				<a href="." class="logo">
					<img src="../assets/images/PWA.png" height="35" alt="JSOFT Admin" />
				</a>
				<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
					<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<!-- start: search & user box -->
			<div class="header-right">






				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="../assets/images/user.png" alt="ERROR" class="img-circle" data-lock-picture="../assets/images/user.png" />
						</figure>
						<div class="profile-info">
							<span class="name"><?php echo $_SESSION['name']; ?></span>
							<span class="role">Manage Profile</span>

						</div>

						<i class="fa custom-caret"></i>
					</a>

					<div class="dropdown-menu">
						<ul class="list-unstyled">
							<li class="divider"></li>
							<li>
								<a role="menuitem" tabindex="-1" href="update_profile.php"><i class="fa fa-user"></i> My Profile</a>
							</li>
							<li>
								<a role="menuitem" tabindex="-1" href="update_password.php"><i class="fa fa-key"></i> My Password</a>
							</li>

							<li>
								<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">

				<div class="sidebar-header">
					<div class="sidebar-title">

					</div>
					<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<div class="nano">
					<div class="nano-content">
						<nav id="menu" class="nav-main" role="navigation">
							<ul class="nav nav-main">
								<li class="nav-active">
									<a href=".">
										<i class="fa fa-home" aria-hidden="true"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<li class="nav-active">
									<a href="new_post.php">
										<i class="fa fa-plus" aria-hidden="true"></i>
										<span>New Post</span>
									</a>
								</li>
								<li class="nav-active">
									<a href="my_posts.php">
										<i class="fa fa-user" aria-hidden="true"></i>
										<span>My Post</span>
									</a>
								</li>
								<li class="nav-active">
									<a href="#" onclick='find_current_location()'>
										<i class="fa fa-users" aria-hidden="true"></i>
										<span>Nearby Post</span>
									</a>
								</li>
								<li class="nav-active">
									<a href="search_location.php">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<span>Search For Location</span>
									</a>
								</li>
								<li class="nav-active">
									<a href="phone_call.php">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<span>Phone Call</span>
									</a>
								</li>
								



							</ul>
						</nav>






					</div>

				</div>

			</aside>



			<!-- end: sidebar -->

			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Public Facility Feedback System</h2>

				</header>



				<!-- start: page -->





				<!-- end: page -->