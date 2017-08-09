<?php
	include("admin/config.php");
	if(isset($_POST['submit']))
	{
		$name	=	$_POST['name'];
		$uname	=	$_POST['username'];
		$add	=	$_POST['address'];
		$mail	=	$_POST['mail_id'];
		$num	=	$_POST['contect_no'];
		$rollid	=	$_POST['rollid'];
		$img	=	$_FILES['image']['name'];
		$imgtype=	$_FILES['image']['type'];
		$error	=	0;
		
		$user_data	=	mysql_query("SELECT * FROM `users` WHERE `id`='".$_SESSION['user_id']."'");
		$user_row	=	mysql_fetch_array($user_data);
		$oldimg		=	$user_row['pic'];
		
		//echo $_SESSION['user_id'];die;
		/*validation*/
		
		if(trim($name)	==	"")
		{
			$_SESSION['error']['name']	=	"please enter name";
			$error	=	1;
		}
		if(trim($uname)	==	"")
		{
			$_SESSION['error']['uname']	=	"please enter username";
			$error	=	1;
		}
		if(trim($add)	==	"")
		{
			$_SESSION['error']['address']	=	"please enter address";
			$error	=	1;
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
		
		if($_FILES['image']['error']	==	0)
		{
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
			else if($_FILES['image']['size']	==	0)
			{
				$_SESSION['error']['image']	=	"image not found";
				$error	=	1;
			}
			else
			{
				$img	=	time().$img;
				
			}
		}
		else
		{
			$img		=	$oldimg;
		}
		
		$data	=	mysql_query("select * from `users` where `username`='".$uname."' AND `id` != '".$_SESSION['user_id']."'");
		$count	=	mysql_num_rows($data);
			
		$data1	=	mysql_query("select * from `users` where `email`='".$mail."' AND `id` != '".$_SESSION['user_id']."' AND `rollid`='1'");
		$count1	=	mysql_num_rows($data1);
		
		
		$data2	=	mysql_query("select * from `users` where `mobile`='".$num."' AND `id` != '".$_SESSION['user_id']."' AND `rollid`='1'");
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
			
			$save	=	mysql_query("UPDATE `users` SET `username`='".$uname."' , `email`='".$mail."' , `fullname`='".$name."' , `userrollid`='".$rollid."' , `mobile`='".$num."' , `address`='".$add."' , `pic`='".$img."' WHERE `id`='".$_SESSION['user_id']."'")or die(mysql_error());
			if($save	==	1)
			{
				$_SESSION['sucesses']	=	"Your profile updated Succsessfully";
				if($_FILES['image']['error']	==	0)
				{
					move_uploaded_file($_FILES['image']['tmp_name'],'admin/image1/'.$img);
					unlink('admin/image1'.$oldimg);
				}
				@header('location:index.php');
				exit;
			}
			else
			{
				$_SESSION['unsucesses']	=	"some error occured. please try later";
				@header("location:profile.php");
				exit;
			}
		}
		else
		{
		
			@header("location:profile.php");
			exit;
			
		}
	}
	else
	{
		$_SESSION['unsucesses']	=	"It's not valid please fill the registration form Corectly";
		@header("location:login.php");
		exit;
	}
?>