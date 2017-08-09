<?php
	include("config.php");
	
if(isset($_POST['submit']))
{
	$name			=	$_POST['name'];
	$menu			=	$_POST['menu'];
	$dayrate		=	$_POST['dayrate'];
	$monthrate		=	$_POST['monthrate'];
	$description	=	$_POST['description'];
	$errval			=	0;
	
	$data			=	mysql_query("SELECT `name` FROM `lunchmenu` WHERE `name`='$name'");
	$count			=	mysql_num_rows($data);
	
	
	if(trim($name)	==	"")
	{
		$_SESSION['errname']	=	"Please enter meal name";
		$errval				=	1;
	}
	else if($count>0)
	{
		$_SESSION['errname']	=	"Meal name allready exist";
		$errval				=	1;
	}
	else
	{
		$_SESSION['name']	=	$name;
	}
	
	if(trim($menu)	==	"")
	{
		$_SESSION['errmenu']	=	"Please enter meal menu";
		$errval					=	1;
	}
	else
	{
		$_SESSION['menu']	=	$menu;
	}
	
	if(trim($dayrate)	==	"")
	{
		$_SESSION['errdayrate']	=	"Please enter per day rate amount";
		$errval					=	1;
	}
	else if(!preg_match("/^[0-9]*$/",$dayrate))
	{
		$_SESSION['errdayrate']	=	"Invalid rate amount";
		$errval					=	1;
	}
	else
	{
		$_SESSION['dayrate']	=	$dayrate;
	}

	if(trim($monthrate)	==	"")
	{
		$_SESSION['errmonthrate']	=	"Please enter monthly rate amount";
		$errval					=	1;
	}
	else if(!preg_match("/^[0-9]*$/",$monthrate))
	{
		$_SESSION['errmonthrate']	=	"Invalid rate amount amount";
		$errval						=	1;
	}
	else
	{
		$_SESSION['monthrate']	=	$monthrate;
	}
	
	if(trim($description)	==	"")
	{
		$_SESSION['errdescription']	=	"Please enter description";
		$errval						=	1;
	}
	else
	{
		$_SESSION['description']	=	$description;
	}

	if($errval	==	1)
	{
		@header("location:add_lunch_meal.php");
		exit;
	}
	else
	{
		unset($_SESSION['name']);
		unset($_SESSION['menu']);
		unset($_SESSION['dayrate']);
		unset($_SESSION['monthrate']);
		unset($_SESSION['description']);
		
		mysql_query("INSERT INTO `lunchmenu`(`name`,`menu`,`dayrate`,`monthrate`,`description`) VALUES('".$name."','".$menu."','".$dayrate."','".$monthrate."','".$description."')")or die(mysql_error());
		
		$_SESSION['flash']	=	"new lunch meal pack inserted.";
		@header("location:index.php");
		exit;
	}
}
else
{
		$_SESSION['error']	=	"can not access directly";
		@header("location:index.php");
		exit;
	
}
?>