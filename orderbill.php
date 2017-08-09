<?php
	
	include('admin/config.php');
	
	if(isset($_POST['submit']))
	{
		$name			=	$_POST['name'];
		$mobile			=	$_POST['mobile'];
		$email			=	$_POST['email'];
		$address		=	$_POST['address'];
		$type			=	$_POST['type'];
		$pack			=	$_POST['pack'];
		$date			=	$_POST['date'];
		$packduration	=	$_POST['packduration'];
		$amount			=	$_POST['amount'];
		$confirm		=	"N/A";
		$errval			=	0;
		$user_id		=	$_SESSION['user_id'];
		$id				=	$_SESSION['order']['id'];
		$type1			=	$_SESSION['order']['type'];
		$userdata		=	mysql_query("SELECT * FROM `users` WHERE `id`='".$user_id."' ");
		$user_row		=	mysql_fetch_array($userdata);
		
		if($type=="lunch")
		{
			$service_data	=	mysql_query("SELECT * FROM `lunchmenu` WHERE `id`='".$id."'");	
			$service_row	=	mysql_fetch_array($service_data);
		}
		else
		{
			$service_data	=	mysql_query("SELECT * FROM `dinnermenu` WHERE `id`='".$id."'");	
			$service_row	=	mysql_fetch_array($service_data);
		}
		
		echo $id."<br />";
		echo $user_id."<br />";
		echo $type."<br />";
		print_r($service_row);
		
		
		if($name	!=	$user_row['fullname'])
		{
			$_SESSION['error']	=	"name is missing";
			$errval	=	1;
		}
		
		if($mobile	!=	$user_row['mobile'])
		{
			$_SESSION['error']	=	"contact no. is missing";
			$errval	=	1;
		}
		
		if($email	!=	$user_row['email'])
		{
			$_SESSION['error']	=	"mail id is missing";
			$errval	=	1;
		}
		
		if($address	!=	$user_row['address'])
		{
			$_SESSION['error']	=	"address is missing";
			$errval	=	1;
		}
		
		if($type	!=	$type1)
		{
			$_SESSION['error']	=	"meal type is missing";
			$errval	=	1;
		}
		
		if($pack	!=	$service_row['name'])
		{
			$_SESSION['error']	=	"meal name is missing";
			$errval	=	1;
		}
		
		if(trim($date)	==	"")
		{
			$_SESSION['error']	=	"date is missing";
			$errval	=	1;
		}
		
		if($packduration	!=	"one day"	&&	$packduration	!=	"monthly") 
		{
			$_SESSION['error']	=	"invalid pack duration";
			$errval	=	1;
		}
		
		if(trim($amount)	==	""	||	!preg_match("/^[0-9]*$/",$amount))
		{
			$_SESSION['error']	=	"invalid amount";
			$errval	=	1;
		}
		
		if($errval	==	1)
		{
			@header("location:order.php");
			exit;
		}
		else
		{
				//$date1	= 	date('m-d-Y h:i:s',time());
				$timezone	=	new DateTimeZone("Asia/Kolkata");
				$date1		= 	new DateTime($date);//date('m-d-Y h:i:s',time());
				$date1->setTimezone($timezone);
				$last_date	=	date('m-d-Y',strtotime($date." + 1 month"));
				//echo $date1->format('H:i:s A/ D, M jS, Y');die;
				echo $last_date." is last date<br />";
				$lat_date	= $date1->format('m-d-Y');
				echo $lat_date;
				
				if($packduration	==	"monthly")
				{
					require 'PHPMailer/PHPMailerAutoload.php';
					$mail = new PHPMailer;

					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'abhi4204u@gmail.com';                 // SMTP username
					$mail->Password = 'Chhotoo1991';                           // SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to

					$mail->setFrom($email, "Sizzling Food");
					$mail->addAddress($email);     // Add a recipient
					$mail->addReplyTo('abhi4204u@gmail.com');
					$mail->isHTML(true);                                  // Set email format to HTML

					$mail->Subject = $type.' order';
					$mail->Body    = 'Thank you! '.$name.' for order at Sizzling food <br /><br />delivered your monthly order very soon at your registered address and you should pay cash on delivered<br />';
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					if(!$mail->send()) 
					{
						$confirm	=	"mail not send";
					}
					else
					{
						$confirm	=	"mail confirm";
					}
					
					mysql_query("INSERT INTO `order`(`name`,`phone`,`address`,`type`,`pack`,`amount`,`confirm`,`duration`,`email`,`start date`,`end date`) VALUES('".$name."','".$mobile."','".$address."','".$type."','".$pack."','".$amount."','".$confirm."','".$packduration."','".$email."','".$date."','".$last_date."');")or die(mysql_error());
					$_SESSION['sucesses']	=	"order has been send";
					@header("location:index.php");
				}
				else
				{
					require 'PHPMailer/PHPMailerAutoload.php';
					$mail = new PHPMailer;

					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'abhi4204u@gmail.com';                 // SMTP username
					$mail->Password = 'Chhotoo1991';                           // SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to

					$mail->setFrom($email, "Sizzling Food");
					$mail->addAddress($email);     // Add a recipient
					$mail->addReplyTo('abhi4204u@gmail.com');
					$mail->isHTML(true);                                  // Set email format to HTML

					$mail->Subject = $type.' order';
					$mail->Body    = 'Thank you! '.$name.' for order at Sizzling food <br /><br />delivered your order very soon at your registered address and you should pay cash on delivered<br />you can continue with our monthly pack ';
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					if(!$mail->send()) 
					{
						$confirm	=	"mail not send";
					}
					else
					{
						$confirm	=	"mail confirm";
					}
					mysql_query("INSERT INTO `order`(`name`,`phone`,`address`,`type`,`pack`,`amount`,`confirm`,`duration`,`email`,`start date`,`end date`) VALUES('".$name."','".$mobile."','".$address."','".$type."','".$pack."','".$amount."','".$confirm."','".$packduration."','".$email."','".$date."','".$date."');")or die(mysql_error());
					$_SESSION['sucesses']	=	"order has been send";
					@header("location:index.php");
				}
		}
	}
?>