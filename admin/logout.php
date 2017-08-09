<?php

	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['user_name']);
	@header("location:index.php");
	
?>