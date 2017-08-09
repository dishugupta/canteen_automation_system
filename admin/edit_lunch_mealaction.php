<?php
	include("config.php");
	
if(isset($_POST['submit']))
{
	$id				=	$_POST['id'];
	$name			=	$_POST['name'];
	$menu			=	$_POST['menu'];
	$dayrate		=	$_POST['dayrate'];
	$monthrate		=	$_POST['monthrate'];
	$description	=	$_POST['description'];
	$old_name		=	$_POST['old_name'];
	$errval			=	0;
	
	$data			=	mysql_query("SELECT `name` FROM `lunchmenu` WHERE `name`='$name'");
	$count			=	mysql_num_rows($data);
	
	
	if(trim($name)	==	"")
	{
		$_SESSION['errname']	=	"Please enter meal name";
		$errval				=	1;
	}
	else if($count	>0	&& $name	!=	$old_name)
	{
		$_SESSION['errname']	=	"Meal name allready exist";
		$errval				=	1;
	}
	
	
	if(trim($menu)	==	"")
	{
		$_SESSION['errmenu']	=	"Please enter meal menu";
		$errval					=	1;
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
	
	
	if(trim($description)	==	"")
	{
		$_SESSION['errdescription']	=	"Please enter description";
		$errval						=	1;
	}
	
	if($errval	==	1)
	{
		$_SESSION['id']	=	$id;
		@header("location:edit_lunch_meal.php");
		exit;
	}
	else
	{
		mysql_query("UPDATE `lunchmenu` SET `name`='".$name."',`menu`='".$menu."',`dayrate`='".$dayrate."',`monthrate`='".$monthrate."',`description`='".$description."' WHERE `id`='$id'")or die(mysql_error());
		
		$_SESSION['success']	=	"lunch meal pack updated.";
		@header("location:show_lunch_meal.php");
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