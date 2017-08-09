<?php
	include("header.php");
	
	//variables decleared...***
	$name			=	'';
	$menu			=	'';
	$dayrate		=	'';
	$monthrate		=	'';
	$description	=	'';
	
	$errname			=	'';
	$errmenu			=	'';
	$errdayrate			=	'';
	$errmonthrate		=	'';
	$errdescription		=	'';

	//check validation...****
	if(isset($_SESSION['name'])){$name					=	$_SESSION['name']; unset($_SESSION['name']);}
	if(isset($_SESSION['menu'])){$menu					=	$_SESSION['menu']; unset($_SESSION['menu']);}
	if(isset($_SESSION['dayrate'])){$dayrate			=	$_SESSION['dayrate']; unset($_SESSION['dayrate']);}
	if(isset($_SESSION['monthrate'])){$monthrate		=	$_SESSION['monthrate']; unset($_SESSION['monthrate']);}
	if(isset($_SESSION['description'])){$description	=	$_SESSION['description']; unset($_SESSION['description']);}
	
	
	if(isset($_SESSION['errname'])){$errname				=	$_SESSION['errname']; unset($_SESSION['errname']);}
	if(isset($_SESSION['errmenu'])){$errmenu				=	$_SESSION['errmenu']; unset($_SESSION['errmenu']);}
	if(isset($_SESSION['errdayrate'])){$errdayrate			=	$_SESSION['errdayrate']; unset($_SESSION['errdayrate']);}
	if(isset($_SESSION['errmonthrate'])){$errmonthrate		=	$_SESSION['errmonthrate']; unset($_SESSION['errmonthrate']);}
	if(isset($_SESSION['errdescription'])){$errdescription	=	$_SESSION['errdescription']; unset($_SESSION['errdescription']);}
	
	
?>

<div class="container">
<div class="form-style-3">
<form action="add_dinner_mealaction.php" method="post">
<fieldset><legend>Dinner Detail</legend>
<label><span>Name<span class="required">*</span></span><input type="text" id="lunchname" class="input-field" name="name" value="<?php echo $name;?>" /><div id="errname" class="error"><?php echo $errname; ?></div></label>
<label><span>Menu<span class="required">*</span></span><input type="text" id="lunchmenu" class="input-field" name="menu" value="<?php echo $menu; ?>" /><div id="errmenu" class="error"><?php echo $errmenu; ?></div></label>
</fieldset>
<fieldset><legend>Rate</legend>
<label><span>Per Day<span class="required">*</span></span><input type="text" id="lunchdayrate" class="input-field" name="dayrate" value="<?php echo $dayrate; ?>" /><div id="errdayrate" class="error"><?php echo $errdayrate; ?></div></label>
<label><span>Monthly<span class="required">*</span></span><input type="text" id="lunchmonthrate" class="input-field" name="monthrate" value="<?php echo $monthrate; ?>" /><div id="errmonthrate" class="error"><?php echo $errmonthrate; ?></div></label>
</fieldset>
<fieldset><legend>Description</legend>
<label><span>Enter Description <span class="required">*</span></span><textarea id="lunchdescription" name="description" class="textarea-field"><?php echo $description; ?></textarea><div id="errdescription" class="error"><?php echo $errdescription; ?></div></label>
<label><span>&nbsp;</span><input type="submit" name="submit" value="Submit" onclick="return adddinner()" /></label>
</fieldset>
</form>
</div>
</div>
</body>
</html>