<?php
	include('config.php');
	$data		=	mysql_query("SELECT * FROM `settings`");
	$settings	=	mysql_fetch_array($data);
	
	$title		=	$settings['title'];
	$logo		=	$settings['logo'];
	$mail		=	$settings['mailid'];
	$mobile		=	$settings['contect'];
	$copyright	=	$settings['copyright_text'];
	
	if(!isset($_SESSION['login']))
	{
	
		@header('location:login.php');
	}
	
	$order_data	=	mysql_query("SELECT * from `order` WHERE `duration`	='monthly'");
	date_default_timezone_set("Asia/Kolkata");
	$date		=	date('m/d/Y',time());
	
	while($row	=	mysql_fetch_array($order_data))
	{
		$enddate	=	$row['end date'];
		$name		=	$row['name'];
		$email		=	$row['email'];
		if($enddate	==	$date)
		{
			echo "<br />".strtotime($date)."<br />";
			echo $date;
			
					require '../PHPMailer/PHPMailerAutoload.php';
					$mail = new PHPMailer;

					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'abhi4204u@gmail.com';                 // SMTP username
					$mail->Password = 'Chhotoo1991';                           // SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to

					$mail->setFrom($email, $name);
					$mail->addAddress($email);     // Add a recipient
					$mail->addReplyTo('abhi4204u@gmail.com');
					$mail->isHTML(true);                                  // Set email format to HTML

					$mail->Subject = "Regarding sizzling food";
					$mail->Body    = 'Hello! '.$name.' your monthly pack duration has been expired<br />please send your confirmation mail to us for continue or you can be call us for inform about that<br /> thank you for using sizzling food services.!';
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					if(!$mail->send()) 
					{
						$confirm	=	"mail not send";
						mysql_query("UPDATE `order` SET `end date`	=	'NULL', `confirm`	=	'N/A' WHERE `end date`	=	'$date'");
						$_SESSION['error']	=	"mail not send to ".$name." today is last date of order";
						@header("location:index.php");
						exit;
					}
					else
					{
						mysql_query("UPDATE `order` SET `end date`	=	'NULL', `confirm`	=	'N/A' WHERE `end date`	=	'$date'");
						$_SESSION['flash']	=	"mail send to ".$name." today is last date of order";
						@header("location:index.php");
					}
			
			
			
		}
	}

?>
<html>

	
	<head>
		<title><?php echo $title; ?></title>
		<script src="../js/jquery.min.js"></script>
		<script src="jquery-1.12.0.js"></script>
		<script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
		
		<script src="js/validation.js"></script>
		
		<link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<link href="css/index.css" rel="stylesheet" type="text/css" />
		
		<link href="css/settings.css" rel="stylesheet" type="text/css" />
		
		<link href="css/user_profile.css" rel="stylesheet" type="text/css" />
		
		<link href="css/header.css" rel="stylesheet" type="text/css" />
		<link href="css/meal.css" rel="stylesheet" type="text/css" />
		<link href="css/lunch&dinner.css" rel="stylesheet" type="text/css" />
		<link href="css/editorder.css" rel="stylesheet" type="text/css" />
		
	</head>
	<body style="background-color:rgb(201,201,201);">
	
	<header>	
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button style="background-color:gray" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="glyphicon glyphicon-menu-hamburger"></span>
						

					</button>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav" id="navbaar">
							<li><a href="index.php">HOME</a></li>
							<li><a href="settings.php">SETTINGS</a></li>
							<li><a href="user_profile.php">USER PROFILE</a></li>
							<li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown" href="#">ADD MEAL PACK <span class="caret"></span></a>
								<ul class="dropdown-menu" id="dropdown_nevmenu">
								<li><a href="add_lunch_meal.php">Lunch</a></li>
								<li><a href="add_dinner_meal.php">Dinner</a></li>
								</ul>
							</li>
							
							<li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown" href="#">SHOW MEAL PACK <span class="caret"></span></a>
										<ul class="dropdown-menu" id="dropdown_nevmenu">
											<li><a href="show_lunch_meal.php">Lunch</a></li>
											<li><a href="show_dinner_meal.php">Dinner</a></li>
										</ul>
							</li>
							<li><a href="contact_list.php">CONTACT LIST</a></li>								
							<li><a href="logout.php">LOGOUT</a></li>								
						</ul>
						
					</div>
				</div>
			</div>
		</nav>
	</header>
	