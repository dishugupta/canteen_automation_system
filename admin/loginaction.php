<?php
	include("config.php");
	
	if(isset($_POST['submit']))
	{
		$name		=	$_POST['username'];	
		$password	=	$_POST['password'];
		$error=1;
		
		if(trim($name)	!=	"")
		{
			
			$name=$_POST['username'];
		}
		else
		{
			$_SESSION['user_error']="Please Enter User Name";
			$error=0;
		}
		
	
		if(trim($password)	!=	"")
		{
			
			$pass=md5($_POST['password']);
		}
		else
		{
			$_SESSION['password_error']="Please Enter Password";
			$error=0;
		}
	
		if($error==0)
		{
		
			header("location:login.php");
			
		}
		else
		{
			$data	=	mysql_query("select * from `users` where `username`='".$name."' AND `password`='".$pass."' AND `userrollid`='2'; ")or die(mysql_error());
			$row	=	mysql_num_rows($data);
			
			if($row==0)
			{
				$_SESSION['login_error']="Invalid username or password";
				header("location:login.php");
				
			}
			else
			{
				$_SESSION['login']="true";
				$_SESSION['user_name']=$_POST['username'];
				header("location:index.php");
			}
		}
			
	}
	else
	{
		
			$_SESSION['unsucesses']="It's not valide please login first";
			header("location:login.php");
		
		
	}
?>