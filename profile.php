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
		@$name		=	$user_row['fullname'];
		@$username	=	$user_row['username'];
		@$address	=	$user_row['address'];
		@$email		=	$user_row['email'];
		@$mobile	=	$user_row['mobile'];
		@$image		=	$user_row['pic'];
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
<div class="container">
	<div class="row header">
		<div class="col-md-12 orderhead">PROFILE</div>
	</div>
</div>

<div class="container prifile">
	<form method="post" action="editprofile.php"  id="f1" onchange="return editvalidation()" enctype="multipart/form-data" />
		<input type="hidden" name="rollid" value="1"/>
		
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-3">
				<img class="profilepic" src="admin/image1/<?php echo $image; ?>" height="100px" />
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<label>Full Name</label>
			</div>
			<div class="col-md-4">
				<input type="text"  class="form-control" id="name" name="name" placeholder="Full name" value="<?php echo $name; ?>" />
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
				<br /><input type="submit" class="btn btn-success" id="submitbtn" onclick="return editvalidation()" name="submit" value="submit" />
				<input type="reset" class="btn btn-danger"  id="canceltbtn" name="cancel" value="Cancel" />
			</div>
		</div>
	</form>
</div>