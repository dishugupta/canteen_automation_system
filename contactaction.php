<?php
	include("admin/config.php");
	if(isset($_POST['submit']))
	{
		$name=$_POST['username'];
		$email=$_POST['email'];
		$mob=$_POST['mobile'];
		$msg=$_POST['message'];
		$add=$_POST['address'];
		
		require 'PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'abhi4204u@gmail.com';                 // SMTP username
		$mail->Password = 'Chhotoo1991';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom($email, $name);
		$mail->addAddress('abhi4204u@gmail.com');     // Add a recipient
		$mail->addReplyTo($email);
		//$mail->addCC('shradhasidana167@gmail..com');
		//$mail->addBCC('kamlbharia@gmail.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'sizzling Food';
		$mail->Body    = $msg;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) 
		{
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			$_SESSION['contact_failed']="Your message has been failed";
			@header("Location:contactus.php");
			exit;
		} 
		else 
		{
		
			$data=mysql_query("insert into `user_contactus`(`name`,`mailid`,`contact`,`message`,`address`)values('".$name."','".$email."','".$mob."','".$msg."','".$add."');")or die(mysql_error());
			$_SESSION['sucesses']="Your message has send";
			@header("Location:index.php");
			exit;
		}	
	}
	else
	{
		$_SESSION['contact_failed']="please fill form first";
		@header("Location:contactus.php");
		exit;
	}
?>