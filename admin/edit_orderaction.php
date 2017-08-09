<?php
	include('config.php');
	
	if(isset($_POST['submit']))
	{
		$id				=	$_POST['id'];
		$name			=	$_POST['name'];
		$mobile			=	$_POST['mobile'];
		$email			=	$_POST['email'];
		$address		=	$_POST['address'];
		$type			=	$_POST['type'];
		$pack			=	$_POST['pack'];
		$sdate			=	$_POST['start_date'];
		$edate			=	$_POST['end_date'];
		$packduration	=	$_POST['packduration'];
		$amount			=	$_POST['amount'];
		$confirm		=	$_POST['confirm'];
		$errval			=	0;
		
		
		if($errval	==	1)
		{
			@header("location:order.php");
			exit;
		}
		else
		{
				
			mysql_query("UPDATE `order` SET `name`	=	'".$name."',`phone`	=	'".$mobile."',`address`	=	'".$address."',`type`	=	'".$type."',`pack`	=	'".$pack."',`amount`	=	'".$amount."',`confirm`	=	'".$confirm."',`duration`	=	'".$packduration."',`email`	=	'".$email."',`start date`	=	'".$sdate."',`end date`	=	'".$edate."' WHERE `id`	=	'$id' ")or die(mysql_error());
			$_SESSION['flash']	=	"order record has been update";
			@header("location:index.php");
			exit;
				
		}
	}
	else
	{
			$_SESSION['error']	=	"can't access directly";
			@header("location:index.php");
			exit;
	}
?>