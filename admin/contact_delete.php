<?php
	include("config.php");
	
	if(isset($_GET['id']))
	{
		$id	=	$_GET['id'];
		
		mysql_query("DELETE FROM `user_contactus` WHERE `id`='$id'")or die(mysql_error());
		$_SESSION['flash']	=	"record has been deleted";
		@header("location:index.php");
		exit;
	}
?>
