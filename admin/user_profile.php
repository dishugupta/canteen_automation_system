<?php
	include("header.php");

	$data			=	mysql_query("select * from `users` where `username`='".$_SESSION['user_name']."';")or die(mysql_error());
	
	$row			=	mysql_fetch_assoc($data);
	$user_id				=	$row['id'];
	$user_name		=	$row['fullname'];
	$user_uname		=	$row['username'];
	$user_address	=	$row['address'];
	$user_mobile	=	$row['mobile'];
	$user_mail		=	$row['email'];
	$user_pic		=	$row['pic'];
	
	//variables decleared...****
	$err_name			=	'';
	$err_email			=	'';
	$err_username		=	'';
	$err_mobile			=	'';
	$err_address		=	'';
	$err_image			=	'';
	
	//session checked...****
	if(isset($_SESSION['name'])){	$err_name				=	$_SESSION['name']; unset($_SESSION['name']);}
	if(isset($_SESSION['myemailid'])){	$err_email			=	$_SESSION['myemailid']; unset($_SESSION['myemailid']);}
	if(isset($_SESSION['username'])){	$err_username		=	$_SESSION['username']; unset($_SESSION['username']);}
	if(isset($_SESSION['mobile'])){	$err_mobile				=	$_SESSION['mobile']; unset($_SESSION['mobile']);}
	if(isset($_SESSION['address'])){	$err_address		=	$_SESSION['address']; unset($_SESSION['address']);}
	if(isset($_SESSION['image'])){	$err_image				=	$_SESSION['image']; unset($_SESSION['image']);}

	if(isset($_SESSION["edit_success"]))
	{
		echo"
				<div id='d1' class='alert alert-success'>
					<b>Success! </b> ".$_SESSION["edit_success"]."
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
				</script>
				
			";unset($_SESSION['edit_success']);
	}
?>

	
	
	<div class="container-flude">
		<form class="form-style-9" action="user_profile_action.php" method="post" enctype="multipart/form-data">
			<div id="user_image" >
				<?php echo"<img src='image1/$user_pic' class='img-thumbnail' height='100%' width='100%'>"; ?>
			</div>

			<ul>
			<div class="section">Name &amp; Email</div> 
			<div id="user_errname" class="error"><?php echo $err_name;?></div>
			<div id="user_erremail" class="error"><?php echo $err_email; ?></div>
			<li>
				<input type="text" id="user_name" name="name" class="field-style field-split align-left" placeholder="Name" value="<?php echo $user_name; ?>" />
				<input type="text" id="user_email" name="email" class="field-style field-split align-right" placeholder="Email" value="<?php echo $user_mail; ?>" />

			</li>
			<div class="section">User name &amp; Contact</div> 
			<div id="user_erruname" class="error"><?php echo $err_username; ?></div>
			<div id="user_errmobile" class="error"><?php echo $err_mobile; ?></div>
			<li>
				<input type="text" id="user_uname" name="user_name" class="field-style field-split align-left" placeholder="User name" value="<?php echo $user_uname; ?>" />
				<input type="text" id="user_mobile" name="mobile" class="field-style field-split align-right" placeholder="Phone" value="<?php echo $user_mobile; ?>" />
			</li>
			<div class="section">Address</div>
			<div id="user_erraddress" class="error"><?php echo $err_address; ?></div>
			<li>
				<textarea id="user_address" name="address" class="field-style" placeholder="Address"><?php echo $user_address; ?></textarea>
			</li>
			<div class="section">Select image</div>
			<div id="user_errimage" class="error"><?php echo $err_image; ?></div>
				<div  class="field-style field-split align-left">
				<li>
					<input type="file" name="image" id="user_img"/>
				</li>
				</div>
			<li>
				<input type="submit"  name="submit" value="Update" onclick="return user_profile_validation();" />
				<input type="hidden" name="old_pic" value="<?php echo $user_pic; ?>" />
				<input type="hidden" name="old_email" value="<?php echo $user_mail; ?>" />
				<input type="hidden" name="old_mobile" value="<?php echo $user_mobile; ?>" />
				<input type="hidden" name="old_user" value="<?php echo $user_uname; ?>" />
				<input type="hidden" name="id" value="<?php echo $user_id; ?>" />
			</li>
			</ul>
		</form>
	</div>
	</body>
</html>	


