<?php
	include("config.php");
	
	@$id	=	$_GET['id'];
	echo $id;
	
	mysql_query("DELETE FROM `dinnermenu` WHERE `id`='$id'")or die(mysql_error());
	$_SESSION['success']	=	"record has been deleted ";
	@header('location:show_lunch_meal.php');
	exit;
?>