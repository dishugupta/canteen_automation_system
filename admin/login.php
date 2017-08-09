<?php

	//unset($_SESSION['user_login']);
	session_start();

	
	if(isset($_SESSION['user']))
	{
		echo"<script>alert('".$_SESSION['user']."'); </script>";
		unset($_SESSION['user']);
	
	}

	if(isset($_SESSION['sucesses']))
	{
	
		echo "<script>alert('".$_SESSION['sucesses']."'); </script>";
	//echo"<script>alert('sucessesfully ragistered'); </script>";
		unset($_SESSION['sucesses']);
	
	}
?>

<html>

	<head>
		<title>Login</title>
		<link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="css/login.css" rel="stylesheet" type="text/css" />
		<script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
		<script src="jquery-1.12.0.js"></script>
		<script src="js/login.js"></script>
		
		
	</head>
	
	<?php
	if(isset($_SESSION['login_error']))
	{
		
		echo"
			<div id='d1' class='alert alert-danger'>
				<strong>Error! </strong>".$_SESSION['login_error']."
			</div>
			<script>
				$(document).ready(function(){
					
					x	=	setInterval(stop,3000);
					
					function stop()
					{
						$('#d1').remove();
						clearInterval(x);
					}
				});
			</script>";
			unset($_SESSION['login_error']);
	}
	
	if(isset($_SESSION['unsucesses']))
	{
		
		echo"
			<div id='d1' class='alert alert-danger'>
				<b>Error! </b>".$_SESSION['unsucesses']."
			</div>
			<script>
				$(document).ready(function(){
					
					x	=	setInterval(stop,3000);
					
					function stop()
					{
						$('#d1').remove();
						clearInterval(x);
					}
				});
			</script>";
			unset($_SESSION['unsucesses']);
	}
	?>
<body id="login_body">

	<div class="container">	
	<div id="div_login">
		<form action="loginaction.php" method="post" >
				<div>
					<label>USER NAME</label> <span class=" glyphicon glyphicon-user "></span> <input class="form-control" type="text" name="username" id="uname" />
					<div id='div_name' class='error'>
					<?php 
						if(isset($_SESSION['user_error']))
						{ 
							echo $_SESSION['user_error'];
							unset($_SESSION['user_error']);
						}
					?>
					</div>
				</div>
				<br />
				<div>
					<label>PASSWORD</label> <span class="glyphicon glyphicon-lock"></span>  <input class="form-control" type="password" name="password" id="pass" />
					<div id='div_pass' class='error'>
					<?php
						if(isset($_SESSION['password_error']))
						{
							echo $_SESSION['password_error'];
							unset($_SESSION['password_error']);
						}
					?>
					</div>
				</div>
				<br />
				<input class="btn btn-success" type="submit" name="submit" value="Login" onclick="return login_validation();" />&nbsp&nbsp&nbsp <a href="signup.php">Signup</a>
		</form>
		</div>
	</div>
</body>

</html>
