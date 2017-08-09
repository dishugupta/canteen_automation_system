<?php
	include("header.php");
	if(isset($_SESSION['unsucesses']))
	{
		echo' 	
			<div id="d1" class="alert alert-danger" role="alert">
				<strong>Error!</strong>'.$_SESSION['unsucesses'].';
			</div>
				
			<script>
				$(document).ready(function()
				{
					x=window.setInterval(fun,3000);
					function fun()
					{
						$("#d1").hide();
						clearInterval(x);
					}
				});
			</script>
		';
		unset($_SESSION['unsucesses']);
	}
	$name			=	'';
	$username		=	'';
	$address		=	'';
	$email			=	'';
	$mobile			=	'';
	$password		=	'';
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
<div class="container regform">
	<form method="post" action="admin/insert.php"  id="f1" onchange="return validation()" enctype="multipart/form-data" />
		<input type="hidden" name="rollid" value="1"/>
		<div class="row">
			<div class="col-md-12">
				<center><h1>Registration Form<h1></center>
			</div>
		</div>
	
		<div class="row">
			<div class="col-md-2">
				<label>Full Name</label>
			</div>
			<div class="col-md-4">
				<input type="text"  class="form-control" id="name" name="f_name" placeholder="Full name" value="<?php echo $name; ?>" />
			</div>
			<div class="col-md-6">
				<span id="name_error" ><?php echo $name_error; ?></span>
			</div>
		</div>		
		
		<div class="row">
			<div class="col-md-2">
				<label>User Name</label>
			</div>
			<div class="col-md-4">
				<input type="text" name="username" class="form-control" id="username" placeholder="User name" value="<?php echo $username; ?>" /> 
			</div>
			<div class="col-md-6">
				<span id="username_error" ><?php echo $username_error; ?></span>
			</div>
		</div>			
		
		<div class="row">
			<div class="col-md-2">
				<label>Address</label>
			</div>
			<div class="col-md-4">
				<textarea class="form-control address" rows="3" name="address" cols="3" id="address" placeholder="Enter address"><?php echo $address; ?></textarea>
			</div>
			<div class="col-md-6">
				<span id="address_error" ><?php echo $address_error; ?></span>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-2">
				<label>E_mail</label>
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" name="mail_id" id="email" value="<?php echo $email; ?>"placeholder="E_mail" />
			</div>
			<div class="col-md-6">
				<span id="email_error" ><?php echo $email_error; ?></span>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-2">
				<label>Mobile</label>
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" name="contect_no" value="<?php echo $mobile; ?>" id="mobile"placeholder="Mobile no." />
			</div>
			<div class="col-md-6">
				<span id="mobile_error"><?php echo $mobile_error; ?></span>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-2">
				<label>Password</label>
			</div>
			<div class="col-md-4">
				<input type="password" class="form-control" value="<?php echo $password; ?>"  name="pass" id="password"placeholder="Password" />
			</div>
			<div class="col-md-6">
				<span id="password_error"><?php echo $password_error; ?></span>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-2"> 
				<label> Select Image </label> 
			</div>
			<div class="col-md-4">
				<input type="file"  name="image" id="image" /> 
			</div>
			<div class="col-md-6"> 
				<span id="image_error"><?php echo $image_error; ?></span> 
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-10">
				<br /><input type="submit" class="btn btn-success" id="submitbtn" onclick="return validation()" name="submit" value="submit" />
				<input type="reset" class="btn btn-danger"  id="canceltbtn" name="cancel" value="Cancel" />
			</div>
		</div>
	</form>
</div>