<?php
	include("header.php");
	if(isset($_GET['id']))
	{
		@$id				=	$_GET['id'];
	}
	else
	{
		if(isset($_SESSION['id']))
		{
			@$id	=	$_SESSION['id'];
			
		}
	}
	@$data			=	mysql_query("SELECT * FROM `dinnermenu` WHERE `id`='$id'");
	$row			=	mysql_fetch_array($data);
	
	//variables decleared...***
	$name			=	$row['name'];
	$menu			=	$row['menu'];
	$dayrate		=	$row['dayrate'];
	$monthrate		=	$row['monthrate'];
	$description	=	$row['description'];
	
	$errname			=	'';
	$errmenu			=	'';
	$errdayrate			=	'';
	$errmonthrate		=	'';
	$errdescription		=	'';

	//check validation...****
	
	if(isset($_SESSION['errname'])){$errname				=	$_SESSION['errname']; unset($_SESSION['errname']);}
	if(isset($_SESSION['errmenu'])){$errmenu				=	$_SESSION['errmenu']; unset($_SESSION['errmenu']);}
	if(isset($_SESSION['errdayrate'])){$errdayrate			=	$_SESSION['errdayrate']; unset($_SESSION['errdayrate']);}
	if(isset($_SESSION['errmonthrate'])){$errmonthrate		=	$_SESSION['errmonthrate']; unset($_SESSION['errmonthrate']);}
	if(isset($_SESSION['errdescription'])){$errdescription	=	$_SESSION['errdescription']; unset($_SESSION['errdescription']);}
	
	
?>

<div class="container">
<div class="form-style-3">
<form action="edit_dinner_mealaction.php" method="post">
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
<label><span>&nbsp;</span><input type="submit" name="submit" value="Update" onclick="return adddinner()" />
<input type="button" name="cancle" value="Go back" onclick="window.location='show_dinner_meal.php'" /></label>
</fieldset>
<input type="hidden" name="old_name" value="<?php echo $name; ?>" />
<input type="hidden" name="id" value="<?php echo $id; ?>" />
</form>
</div>
</div>
</body>
</html>