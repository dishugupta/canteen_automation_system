<?php
	include('config.php');
	//print_r($_FILES);
	$setting_title			=	$_POST['title'];
	$setting_logo			=	$_FILES['logo']['name'];
	$setting_logo_size		=	$_FILES['logo']['size'];
	$setting_mail			=	$_POST['mailid'];
	$setting_mobile			=	$_POST['contact'];
	$setting_copyright		=	$_POST['copyright_text'];
	$setting_old_logo		=	$_POST['old_logo'];
	$errval					=	0;
	$img_exp 				= 	"/^.*\.(jpg|jpeg|gif|JPG|png|PNG)$/";
	$mail_exp				=	"/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i"; 

	
	if(trim($setting_title)	==	"")
	{
		$_SESSION['err_title']	=	"Please enter title";
		$errval	=	1;
	}
	else if(!preg_match("/^[a-zA-Z ]*$/",$setting_title))
	{
		$_SESSION['err_title']	=	"Invalid title name";
		$errval	=	1;
	}
	
	if(trim($setting_logo)	!=	""	||	$setting_logo_size	!=	0)
	{
		if(!preg_match($img_exp,$setting_logo))
		{
			$_SESSION['err_image']	=	"Invalid image formate";
			$errval	=	1;
		}
	}
	
	if(trim($setting_mail)	==	"")
	{
		$_SESSION['err_mail']	=	"Please enter email id";
		$errval	=	1;
	}
	else if(!preg_match($mail_exp,$setting_mail))
	{
		$_SESSION['err_mail']	=	"Invalid email id";
		$errval	=	1;
	}
	
	if(trim($setting_mobile)	==	"")
	{
		$_SESSION['err_mobile']	=	"Please enter contact no.";
		$errval	=	1;
	}
	else if(!preg_match("/^[0-9]{10}$/",$setting_mobile))
	{
		$_SESSION['err_mobile']	=	"Invalid contact no.";
		$errval	=	1;
	}
	
	if(trim($setting_copyright)	==	"")
	{
		$_SESSION['err_copyright']	=	"Please enter copyright text";
		$errval	=	1;
	}
	
	if($errval	==	1)
	{
	
		@header("location:settings.php");
		exit;
	}
	
	if($setting_logo	==	"" || $setting_logo_size	==	0)
	{
		$setting_logo	=	$setting_old_logo;
		move_uploaded_file($_FILES['logo']['tmp_name'],"../image/$setting_logo");
	}

	mysql_query('UPDATE  `settings`  SET `title` = "'.$setting_title.'" ,`logo`="'.$setting_logo.'",`copyright_text`="'.$setting_copyright.'",`contect`="'.$setting_mobile.'",`mailid`="'.$setting_mail.'"');
	$_SESSION['flash']	=	"Setting Record Has Been Updated";
	@header('location:index.php');
	
?>