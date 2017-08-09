<?php
	//echo "<pre>";
	//print_r($_POST);
	mysql_connect('localhost','root','');
	mysql_query("UPDATE `sizzlingfood`.`users` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobile`='".$_POST['mobile']."' where `id`='".$_POST['id']."'");
	header('location:list.php');
?>