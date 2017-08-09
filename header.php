<?php
	include('admin/config.php');
	$setting_data	=	mysql_query("SELECT * FROM `settings`");
	$settings	=	mysql_fetch_array($setting_data);
		
?>
<html>
	<head>
		<title><?php echo $settings['title']; ?></title>
		<script src="js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		
		<script src="bxslider/jquery.bxslider.min.js"></script>
		<script src="js/valid.js"></script>
		<link rel="stylesheet" href="bxslider/jquery.bxslider.css"/>
		<link rel="stylesheet" href="css/project.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="css/contactus.css" type="text/css">
		<link rel="stylesheet" href="css/registration.css" type="text/css" />
		<link rel="stylesheet" href="css/lunch.css" type="text/css" />
		<link rel="stylesheet" href="css/order.css" type="text/css" />
		<link rel="stylesheet" href="css/about.css" type="text/css" />
	
	</head>
	
	<body style="background-color:rgb(201,201,201);">
		<header>
			<div id="outer" class="container-fluid" style="background-color:rgb(201,201,201);">
				<div id="mid" class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-6" style="background-color:rgb(201,201,201);"><div  class="up"><h1 style="text-align:center; font-family:red serif ; font-size:80px;" >Delicious Food</h1></div>
					</div>
					<div id="right" class="col-md-3">
					</div>
				</div>
			</div>
			<?php
				if(isset($_SESSION['user_login']))
				{
					$user_id		=	$_SESSION['user_id'];
					$userdata		=	mysql_query("SELECT * FROM `users` WHERE `id`='".$user_id."' ");
					$user_row		=	mysql_fetch_array($userdata);
					include ('logoutmenu.php');
				}
				else
				{
					include('loginmenu.php');
				}
			?>
		</header>