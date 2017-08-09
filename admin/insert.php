<?php
	include("config.php");
	if(isset($_POST['submit']))
	{
		$name	=	$_POST['f_name'];
		$uname	=	$_POST['username'];
		$add	=	$_POST['address'];
		$mail	=	$_POST['mail_id'];
		$num	=	$_POST['contect_no'];
		$rollid	=	$_POST['rollid'];
		$pass	=	$_POST['pass'];
		$img	=	$_FILES['image']['name'];
		$imgtype=	$_FILES['image']['type'];
		$error	=	0;
		

		/*validation*/
		
		
		if(trim($name)	==	"")
		{
			$_SESSION['error']['name']	=	"please enter name";
			$error	=	1;
		}
		else
		{
			$_SESSION['data']['name']	=	$name;
		}
		if(trim($uname)	==	"")
		{
			$_SESSION['error']['uname']	=	"please enter username";
			$error	=	1;
		}
		else
		{
			$_SESSION['data']['uname']	=	$uname;
		}
		if(trim($add)	==	"")
		{
			$_SESSION['error']['address']	=	"please enter address";
			$error	=	1;
		}
		else
		{
			$_SESSION['data']['address']	=	$add;
		}
		if(trim($mail)	==	"")
		{
			$_SESSION['error']['email']	=	"please enter email";
			$error	=	1;
		}
		else if(!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/",$mail))
		{
			$_SESSION['error']['email']	=	"please enter valid email";
			$error	=	1;
		}
		else
		{
			$_SESSION['data']['email']	=	$mail;
		}
		if(trim($num)	==	"")
		{
			$_SESSION['error']['contact_no']	=	"please enter mobile no.";
			$error	=	1;
		}
		else if(!preg_match('/^[0-9]{10}$/',$num))
		{
			$_SESSION['error']['contact_no']	=	"please enter valid mobile no.";
			$error	=	1;
		}
		else
		{
			$_SESSION['data']['contact_no']	=	$num;
		}
		if(trim($pass)	==	"")
		{
			$_SESSION['error']['password']	=	"please enter password";
			$error	=	1;
		}
		else if(strlen($pass)<8)
		{
			$_SESSION['error']['password']	=	"minimum 8 character required";
			$error	=	1;
		}
		else
		{
			$_SESSION['data']['password']	=	$pass;
			$pass	=	md5($pass);
		}
		if($img	==	"")
		{
			$_SESSION['error']['image']	=	"please upload your image";
			$error	=	1;
		}
		else if($imgtype != 'image/jpg' && $imgtype != 'image/jpeg' && $imgtype != 'image/png' && $imgtype != 'image/gif' && $imgtype != 'image/bmp')
		{
			$_SESSION['error']['image']	=	"only jpg,jpeg,bmp,gif,png allowed";
			$error	=	1;
		}
		else if($_FILES['image']['error']	!=	0)
		{
			$_SESSION['error']['image']	=	"image not found";
			$error	=	1;
		}
		else if($_FILES['image']['size']	==	0)
		{
			$_SESSION['error']['image']	=	"image not found";
			$error	=	1;
		}
		else
		{
			$img	=	time().$img;
		}
			$data	=	mysql_query("select * from `users` where `username`='".$uname."';");
			$count	=	mysql_num_rows($data);
			
			$data1	=	mysql_query("select * from `users` where `email`='".$mail."' AND `userrollid`='".$rollid."';");
			$count1	=	mysql_num_rows($data1);
			
			$data2	=	mysql_query("select * from `users` where `mobile`='".$num."' AND `userrollid`='".$rollid."';");
			$count2	=	mysql_num_rows($data2);
			
			if($count1>0)
			{	
				$_SESSION['error']['email']	=	"Mail id is allready exist";
				$error	=	1;
			}
			else if($count2>0)
			{	
				$_SESSION['error']['mobile']	=	"contact no. is allready exist";
				$error	=	1;
			}
			else if($count>0)
			{
				$_SESSION['error']['username']	=	"User name allready exist";
				$error	=	1;
			}
		
		
	
		
		if($error	==	0)
		{
		
			$save	=	mysql_query("insert into `users`(`username`,`email`,`fullname`,`password`,`userrollid`,`mobile`,`address`,`pic`) values('".$uname."','".$mail."','".$name."','".$pass."','".$rollid."','".$num."','".$add."','".$img."');")or die(mysql_error());
			if($save	==	1)
			{
				move_uploaded_file($_FILES['image']['tmp_name'],'image1/'.$img);
				$_SESSION['sucesses']	=	"You registered Succsessfully";
				if($rollid	==	1)
				{
					@header("location:../login.php");
					exit;
				}
				else
				{
					@header("location:login.php");
					exit;
				}
			}
			else
			{
				$_SESSION['unsucesses']	=	"some error occured. please try later";
				if($rollid	==	1)
				{
					@header("location:../signup.php");
					exit;
				}
				else
				{
					@header("location:signup.php");
					exit;
				}
			}
		}
		else
		{
		
			if($rollid	==	1)
			{
				@header("location:../signup.php");
				exit;
			}
			else
			{
				@header("location:signup.php");
				exit;
			}
		}
	}
	else
	{
		$_SESSION['unsucesses']	=	"It's not valid please fill the registration form Corectly";
		@header("location:../signup.php");
		exit;
	}
?>