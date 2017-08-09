<?php
include("header.php");

	$data	=	mysql_query("SELECT * FROM `dinnermenu`")or die(mysql_error());
	

	
	if(isset($_SESSION['success']))
	{
		echo"
				<div id='d1' class='alert alert-success'>
					<b>Success! </b> ".$_SESSION['success']."
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
				
			";unset($_SESSION['success']);
	}
?>

	<div class="container">
	<h2 class="food_head">Dinner  Meal List</h2>
		<div id="table-lunch_dinner">
			<div class="row thead">
				<div class="col-md-1 th">Srno.</div>
				<div class="col-md-2 th">Name</div>
				<div class="col-md-2 th">Menu of meal</div>
				<div class="col-md-2 th">per day rate</div>
				<div class="col-md-2 th">Monthly rate</div>
				<div class="col-md-2 th">Description</div>
				<div class="col-md-1 th">Action</div>
			</div>
			
				
					<?php
						$i	=	1;
						while($row	=	mysql_fetch_array($data))
						{
							$name			=	$row['name'];
							$menu			=	$row['menu'];
							$dayrate		=	$row['dayrate'];
							$monthrate		=	$row['monthrate'];
							$description	=	$row['description'];
					?>
							<div class="row tr">
								<div class="col-md-1 td"><?php echo $i; $i++;?></div>
								<div class="col-md-2 td"><?php echo $name;?></div>
								<div class="col-md-2 td"><?php echo $menu;?></div>
								<div class="col-md-2 td"><?php echo $dayrate;?></div>
								<div class="col-md-2 td"><?php echo $monthrate;?></div>
								<div class="col-md-2 td"><?php echo $description;?></div>
								<div class="col-md-1 td"><a href="edit_dinner_meal.php?id=<?php echo $row['id'];?>" />Edit</a>/<a onclick="return confirm('Are you sure you want to delete this record');" href="delete_dinner_meal.php?id=<?php echo $row['id'];?>" />Delete</a></div>
							</div>
					<?php
						}
					?>
				
		</div>
	</div>
	</body>
</html>