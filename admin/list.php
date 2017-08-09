<?php
	mysql_connect('localhost','root','');
	$data	=	mysql_query('SELECT * FROM `sizzlingfood`.`users`');
?>
	<table border="1">
		<tr>
			<th>S.No.</th>
			<th>Name</th>
			<th>Email</th>
			<th>mobile</th>
			<th>Action</th>
		</tr>
	
<?php	
	$i=1;
	while($row	=	mysql_fetch_array($data)){
		
?>
		<tr>
			<td><?php echo $i; $i++; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['mobile']; ?></td>
			<td>
				<a href="edit.php?id=<?php echo $row['id']; ?>">
				EDIT</a>/
				<a href="delete.php?id=<?php echo $row['id']; ?>">
			DELETE</a></td>
		</tr>
<?php		
	}
?>	
</table>