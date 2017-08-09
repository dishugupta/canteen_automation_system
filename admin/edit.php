<?php
	mysql_connect('localhost','root','');
	$data	=	mysql_query('SELECT * FROM `sizzlingfood`.`users` where `id` ="'.$_GET['id'].'"');
	$row	=	mysql_fetch_array($data);
	//print_r($row);
?>
	<form action="edit_action.php" method="post">
		<input type="hidden" value="<?php echo $_GET['id']; ?>" name="id" />
		<input type="text" value="<?php echo $row['username']; ?>" name="username" />
		<input type="text" value="<?php echo $row['email']; ?>" name="email" />
		<input type="text" value="<?php echo $row['mobile']; ?>" name="mobile" />
		<input type="submit" value="Update"  />
	</form>