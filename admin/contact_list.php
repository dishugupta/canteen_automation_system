<?php
include("header.php");

	$data			=	mysql_query("SELECT * FROM `user_contactus`")or die(mysql_error());
	

	
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
	<h2 class="food_head">Contact List</h2>
		<div id="table-lunch_dinner">
			<div class="row thead">
				<div class="col-md-1 th">Srno.</div>
				<div class="col-md-2 th">Name</div>
				<div class="col-md-2 th">Mail Id</div>
				<div class="col-md-2 th">Contact no.</div>
				<div class="col-md-2 th">Message</div>
				<div class="col-md-2 th">Address</div>
				<div class="col-md-1 th">Action</div>
			</div>
			
				
					<?php
						$i	=	1;
						while($row	=	mysql_fetch_array($data))
						{
							$id			=	$row['id'];
							$name			=	$row['name'];
							$mail			=	$row['mailid'];
							$contact		=	$row['contact'];
							$message		=	$row['message'];
							$address		=	$row['address'];
					?>
						<div class="row tr">
							<div class="col-md-1 td"><?php echo $i; $i++;?></div>
							<div class="col-md-2 td"><?php echo $name;?></div>
							<div class="col-md-2 td"><?php echo $mail;?></div>
							<div class="col-md-2 td"><?php echo $contact;?></div>
							<div class="col-md-2 td"><?php echo $message;?></div>
							<div class="col-md-2 td"><?php echo $address;?></div>
							<div class="col-md-1 td"><a href="contact_delete.php?id=<?php echo $id; ?>" >Delete</a></div>
				
						</div>
					<?php
						}
					?>
					
			
		</div>
	</div>
	</body>
</html>