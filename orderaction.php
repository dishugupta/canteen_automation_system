<?php
	include("admin/config.php");
	if(!isset($_POST['submit']))
	{
		@header('location:index.php');
		exit;
	}
	else
	{
		$_SESSION['order']['id']	=	$_POST['orderid'];
		$_SESSION['order']['type']	=	$_POST['type'];
		if(isset($_SESSION['user_login']))
		{
			@header('location:order.php');
			exit;
		}
		else
		{
			@header('location:login.php');
			exit;
		}
	}
?>