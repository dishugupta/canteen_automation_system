<?php
	include('header.php');

	//variable decleared...****
	$err_title		=	'';
	$err_logo		=	'';
	$err_mail		=	'';
	$err_mobile		=	'';
	$err_copyright	=	'';
	
	//check session...***
	if(isset($_SESSION['err_title'])){$err_title			=	$_SESSION['err_title']; unset($_SESSION['err_title']);}
	if(isset($_SESSION['err_logo'])){$err_logo				=	$_SESSION['err_logo']; unset($_SESSION['err_logo']);}
	if(isset($_SESSION['err_mail'])){$err_mail				=	$_SESSION['err_mail']; unset($_SESSION['err_mail']);}
	if(isset($_SESSION['err_mobile'])){$err_mobile			=	$_SESSION['err_mobile']; unset($_SESSION['err_mobile']);}
	if(isset($_SESSION['err_copyright'])){$err_copyright	=	$_SESSION['err_copyright']; unset($_SESSION['err_copyright']);}
?>

<form action="setting_action.php" method="post" enctype="multipart/form-data" >

<br />
<br />
<div class="container">
	<div class="form-style-10">
		<h1>Update Now!<span> tell us what you want to change of the site!</span></h1>

		<div class="section"><span>1</span>Title &amp; Logo</div>
		<div id="setting_errname" class="error"><?php echo $err_title; ?></div>
		<div id="setting_errlogo" class="error"><?php echo $err_logo; ?></div>
		
		<div class="inner-wrap">
			<label>Your Title <input type="text" id="setting_title" name="title" value="<?php echo $title;?>" /></label>
			<label>Your Logo <input type="file" id="setting_logo" name="logo" /><img src='../image/<?php echo $logo; ?>' /></label>
		</div>

		<div class="section"><span>2</span>Email &amp; Phone</div>
		<div id="setting_erremail" class="error"><?php echo $err_mail; ?></div>
		<div id="setting_errmobile" class="error"><?php echo $err_mobile; ?></div>
		<div class="inner-wrap">
			<label>Email id <input type="text" id="setting_email" name="mailid" value="<?php echo $mail;?>" /></label>
			<label>Phone Number <input type="text" id="setting_mobile" name="contact" value="<?php echo $mobile;?>"/></label>
		</div>

		<div class="section"><span>3</span>Copyright</div><div id="setting_errcopy" class="error"><?php echo $err_copyright; ?></div>
			<div class="inner-wrap">
				<label>Copyright Text <input type="text" id="setting_copy" name="copyright_text" value="<?php echo $copyright;?>" /></label>
			</div>
		<div class="button-section">
			<input type="submit" value="Update" name="submit" onclick="return setting_validation();" />
			<input type="hidden" value="<?php echo $logo;?>" name="old_logo" />
		</div>

	</div>
</div>
</form>
</body>
</html>