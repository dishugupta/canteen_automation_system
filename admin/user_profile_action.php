<?php
	include('config.php');
	$name			=	$_POST['name'];
	$id				=	$_POST['id'];
	$email			=	$_POST['email'];
	$user_name		=	$_POST['user_name'];
	$mobile			=	$_POST['mobile'];
	$address		=	$_POST['address'];
	$image			=	$_FILES['image']['name'];
	$old_image		=	$_POST['old_pic'];
	$old_email		=	$_POST['old_email'];
	$old_mobile		=	$_POST['old_mobile'];
	$old_user		=	$_POST['old_user'];
	$errval			=	0;
	$exp 			= 	"/^.*\.(jpg|jpeg|gif|JPG|png|PNG)$/";//"([^\\s]+(\\.(?i)(jpg|png|gif|bmp))$)";
	$mail_ex		=	"/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i"; 
	
	
	$data			=	mysql_query("SELECT `email` FROM `users` WHERE `email`='$email' AND `userrollid`='2';");
	$count_mail		=	mysql_num_rows($data);
	
	$mobile_data	=	mysql_query("SELECT `mobile` FROM `users` WHERE `mobile`='$mobile' AND `userrollid`='2';");
	$count_mobile	=	mysql_num_rows($mobile_data);
	
	$user_data		=	mysql_query("SELECT `username` FROM `users` WHERE `username`='$user_name';");
	$count_user		=	mysql_num_rows($mobile_data);

	if(trim($name)	==	"")
	{
		$_SESSION['name']	=	"Please enter name";
		$errval	=	1;
	}
	else if(!preg_match("/^[a-zA-Z ]*$/",$name))
	{
		$_SESSION['name']	=	"Invalid name";
		$errval	=	1;
	}
	else
	{
		$_SESSION['name']	=	"";
	}
	
	if(trim($email)	==	"")
	{
		$_SESSION['myemailid']	=	"Please enter email id";
		$errval	=	1;
	}
	else if(!preg_match($mail_ex,$email))
	{
		$_SESSION['myemailid']	=	"Invalid email id";
		$errval	=	1;
	}
	else if($count_mail>0 && $old_email	!=	$email)
	{
		$_SESSION['myemailid']	=	"Email id is allready exist";
		$errval	=	1;
	}
	else
	{
		$_SESSION['myemailid']	=	"";
		
	}
	
	if(trim($user_name)	==	"")
	{
		
		$_SESSION['username']	=	"Please enter user name";
		$errval	=	1;
	}
	else if($count_user	>	0	&&	$old_user	!=	$user_name)
	{
		$_SESSION['username']	=	"User name is allready exist";
		$errval	=	1;
	}
	else
	{
		$_SESSION['username']	=	"";
	}
	
	if(trim($mobile)	==	"")
	{
		$_SESSION['mobile']	=	"Please enter contact no.";
		$errval	=	1;
	}
	else if(!preg_match("/^[0-9]*$/",$mobile))
	{
		$_SESSION['mobile']	=	"Invalid mobile number";
		$errval	=	1;
	}
	else if(strlen($mobile)>10)
	{
		$_SESSION['mobile']	=	"Contact must be in 10 digits";
		$errval	=	1;
	}
	else if($count_mobile>0	&&	$old_mobile	!=	$mobile)
	{
		$_SESSION['mobile']	=	"Contact is allready exist";
		$errval	=	1;
	}
	else
	{
		$_SESSION['mobile']	=	"";
	}
	
	if(trim($address)	==	"")
	{
		$_SESSION['address']	=	"Please enter address";
		$errval	=	1;
	}
	else
	{
		$_SESSION['address']	=	"";
	}

	if($image	!=	"")
	{

		if(!preg_match($exp,$image))
		{
			$_SESSION['image']	=	"Please select JPG or JPEG or other image formate";
			$errval	=	1;
		}
	}
	else
	{
		$_SESSION['image']	=	"";
	}
	
	if($errval	==	1)
	{
		@header("location:user_profile.php");
	}
	else
	{
		if(trim($image)	==	"" || $_FILES['image']['size']	==	0)
		{
			$image	=	$old_image;
			mysql_query("UPDATE `users` SET `fullname`='$name',`email`='$email',`username`='$user_name',`mobile`='$mobile',`address`='$address',`pic`='$image' WHERE `id`='$id'")or die(mysql_error());
		
		}
		else
		{
			$image	=	time().$image;
			if(move_uploaded_file($_FILES['image']['tmp_name'],"image1/".$image))
			{
				unlink("image1/$old_image");
				mysql_query("UPDATE `users` SET `fullname`='$name',`email`='$email',`username`='$user_name',`mobile`='$mobile',`address`='$address',`pic`='$image' WHERE `id`='$id'")or die(mysql_error());
			
			}
			else
			{
				echo "Error! in uploading file please check memory storage";
				exit;
			}
		}
		
		$_SESSION['edit_success']	=	"record has been updated";
		@header("location:user_profile.php");
		exit;
	}
	
	
	
?>