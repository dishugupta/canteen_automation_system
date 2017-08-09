<?php
	include("admin\config.php");
	$error=0;
	if(isset($_POST['submit']))
	{
		$name		=	$_POST['username'];	
		$password	=	$_POST['password'];	
		
		if(trim($name)	!=	"")
		{
			
			$name=$_POST['username'];
		}
		else
		{
			$_SESSION['user_error']="Please Enter Name";
			$error=1;
		}
	
		if(trim($password)	!=	"")
		{
			
			$pass=md5($_POST['password']);
		}
		else
		{
			$_SESSION['password_error']="Please Enter Password";
			$error=1;
		}
	
		if($error==1)
		{
			@header("location:login.php");
			exit;
		}
		else
		{
			
			$data=mysql_query("select * from `users` where `username`='".$name."' AND `password`='".$pass."' AND `userrollid`='1'; ")or die(mysql_error());
			$row=mysql_num_rows($data);
			if($row==0)
			{
				$_SESSION['login_error']="Invalid username or password";
				@header("location:login.php");
				exit;
			}
			else
			{
				$user=mysql_fetch_array($data);
				$_SESSION['user_login']=$user['userrollid'];
				$_SESSION['user_id']=$user['id'];
				if(isset($_SESSION['order']) && !empty($_SESSION['order']))
				{
					@header('location:order.php');
					exit;
				}
				else
				{
					@header("location:index.php");
					exit;
				}
				
			}
		}
	}
	else
	{
		$_SESSION['unsucesses']="It's Not valide";
		@header("location:../login.php");
		exit;
	}
?>