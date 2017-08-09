<?php
	session_start();
	
	if(isset($_SESSION['error']))
	{
		//echo"<pre>";
		//print_r($_SESSION['error']);
	
	}

	if(isset($_SESSION['user']))
	{
		echo"<script>alert('".$_SESSION['user']."'); </script>";
		unset($_SESSION['user']);
	
	}
	
	if(isset($_SESSION['user1']))
	{
		echo"<script>alert('".$_SESSION['user1']."'); </script>";
		unset($_SESSION['user1']);
	
	}
	
	if(isset($_SESSION['user2']))
	{
		echo"<script>alert('".$_SESSION['user2']."'); </script>";
		unset($_SESSION['user2']);
	
	}

	if(isset($_SESSION['unsucesses']))
	{
		echo"<script>alert('".$_SESSION['unsucesses']."'); </script>";
		unset($_SESSION['unsucesses']);
	}
	
	//declear variables for data...***
	$name			=	'';
	$username		=	'';
	$address		=	'';
	$email			=	'';
	$mobile			=	'';
	$password		=	'';
	
	//declear variables for error...***
	$name_error		=	'';
	$username_error	=	'';
	$address_error	=	'';
	$email_error	=	'';
	$mobile_error	=	'';
	$password_error	=	'';
	$image_error	=	'';
	
	if(isset($_SESSION['data'])	&& !empty($_SESSION['data']))
	{
		@$name			=	$_SESSION['data']['name'];
		@$username		=	$_SESSION['data']['username'];
		@$address		=	$_SESSION['data']['address'];
		@$email			=	$_SESSION['data']['email'];
		@$mobile		=	$_SESSION['data']['mobile'];
		@$password		=	$_SESSION['data']['password'];
		unset($_SESSION['data']);
	}
	if(isset($_SESSION['error'])&& !empty($_SESSION['error']))
	{
		@$name_error		=	$_SESSION['error']['name'];
		@$username_error	=	$_SESSION['error']['username'];
		@$address_error		=	$_SESSION['error']['address'];
		@$email_error		=	$_SESSION['error']['email'];
		@$mobile_error		=	$_SESSION['error']['mobile'];
		@$password_error	=	$_SESSION['error']['password'];
		@$image_error		=	$_SESSION['error']['image'];
		unset($_SESSION['error']);
	}
	
?>

<html>
	<head>
	
	<title>Registration</title>
		<link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="css/signup.css" rel="stylesheet" type="text/css" />
		<script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
		<script src="jquery-1.12.0.js"></script>
		<script src="js/signup.js"></script>
		
		<?php
			
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
		
	</head>
	<body id="signup_body">
	<div class="container">
	<div id="div_registration" class="container">
	
	
		<form method="post" action="insert.php"  id="form_registration" enctype="multipart/form-data">
			<input type="hidden" name="rollid" value="2" />
			<div class="row">
			<div class="col-md-12 colum">
				<h1>Registration Form<h1>
			</div>
		</div>
	
		<div class="row">
			<div class="col-md-3 colum">
				<label>Full Name</label>
			</div>
			<div class="col-md-4 colum">
				<input type="text"  class="form-control" id="name" name="f_name" placeholder="Entere full name" value="<?php echo $name; ?>" />
			</div>
			<div class="col-md-5 colum">
				<span id="name_error" ><?php echo $name_error; ?></span>
			</div>
		</div>		
		
		<div class="row">
			<div class="col-md-3 colum">
				<label>User Name</label>
			</div>
			<div class="col-md-4 colum">
				<input type="text" name="username" class="form-control" id="username" placeholder="Enter user name" value="<?php echo $username; ?>" /> 
			</div>
			<div class="col-md-5 colum">
				<span id="username_error" ><?php echo $username_error; ?></span>
			</div>
		</div>			
		
		<div class="row">
			<div class="col-md-3 colum">
				<label>Address</label>
			</div>
			<div class="col-md-4 colum">
				<textarea class="form-control address" rows="3" name="address" cols="3" id="address" placeholder="Enter address"><?php echo $address; ?></textarea>
			</div>
			<div class="col-md-5 colum">
				<span id="address_error" ><?php echo $address_error; ?></span>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3 colum">
				<label>Email id</label>
			</div>
			<div class="col-md-4 colum">
				<input type="text" class="form-control" name="mail_id" id="email" value="<?php echo $email; ?>"placeholder="Enter email id" />
			</div>
			<div class="col-md-5 colum">
				<span id="email_error" ><?php echo $email_error; ?></span>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3 colum">
				<label>Mobile</label>
			</div>
			<div class="col-md-4 colum">
				<input type="text" class="form-control" name="contect_no" value="<?php echo $mobile; ?>" id="mobile" placeholder="Enter mobile no." />
			</div>
			<div class="col-md-5 colum">
				<span id="mobile_error"><?php echo $mobile_error; ?></span>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3 colum">
				<label>Password</label>
			</div>
			<div class="col-md-4 colum">
				<input type="password" class="form-control" value="<?php echo $password; ?>"  name="pass" id="password"placeholder="Enter password" />
			</div>
			<div class="col-md-5 colum">
				<span id="password_error"><?php echo $password_error; ?></span>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3 colum"> 
				<label> Select Image </label> 
			</div>
			<div class="col-md-4 colum">
				<input type="file"  name="image" id="image" /> 
			</div>
			<div class="col-md-5 colum"> 
				<span id="image_error"><?php echo $image_error; ?></span> 
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3 colum">
			<input class="btn btn-success" type="submit" onClick="return validation();" id="submitbtn" name="submit" value="Submit">
			</div>
			<div class="col-md-9 colum">
			<a href="login.php" >Go to login page</a>
			</div>
		</div>
		</form>
		
		</div>
		</div>
	</body>
</html>