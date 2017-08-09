
<?php
	include('header.php');
	
	if(isset($_SESSION['successes']))
	{
		echo' 	
			<div id="d1" class="alert alert-success" role="alert">
				<strong>Success! </strong>'.$_SESSION['successes'].';
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
		unset($_SESSION['successes']);
	}
	
	if(isset($_GET['id']))
	{
		@$id	=	$_GET['id'];
	}
	else
	{
		if(isset($_SESSION['id']))
		{
			@$id	=	$_SESSION['id'];
		}
	}
	
	@$data		=	mysql_query("SELECT * FROM `order` WHERE `id`='$id'");
	$user_row	=	mysql_fetch_array($data);
	
?>

<div class="container">
	<div class="row edit_order_header">
		<div class="col-md-12 orderhead">UPDATE IN ORDER & DELIVERY DETAIL</div>
	</div>
	<div class="row edit_oredr_image">
		<div class="container" id="background_div">
			<form id="form" action="edit_orderaction.php" method="post">
				<div class="col-md-6"> 	
					<div class="form-group">
						<label for="name"><strong>NAME:</strong></label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="<?php echo $user_row['name']; ?>" />
					</div>
					<div class="form-group">
						<label for="mobile"><strong>MOBILE:</strong></label>
						<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" value="<?php echo $user_row['phone']; ?>" />
					</div>
					<div class="form-group">
						<label for="email"><strong>EMAIL:</strong></label>
						<input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="<?php echo $user_row['email']; ?>" />
					</div>
					<div class="form-group">
						<label for="address"><b>ADDRESS:</b></label>
						<textarea class="form-control address" rows="4" name="address" cols="3" id="address" placeholder="Enter address" ><?php echo $user_row['address']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="confirm"><b>CONFIRMATION:</b></label>
						<input type="text" class="form-control" name="confirm" id="confirm" value="<?php echo $user_row['confirm']; ?>" />
					</div>
				</div>
				<div class="col-md-6"> 
					<div class="form-group">
						<label for="type"><strong>TYPE:</strong></label>
						<input type="text" class="form-control" name="type" id="type" placeholder="Enter Type"value="<?php echo $user_row['type']; ?>" readonly />
					</div>
					<div class="form-group">
						<label for="packname"><strong>PACK:</strong></label>
						<input type="text" class="form-control" id="packname" name="pack" placeholder="Enter pack name" value="<?php echo $user_row['pack'];?>" readonly />
					</div>
					<div class="form-group">
						<label for="date"><strong>START DATE:</strong></label>
						<input type="text" class="form-control" id="start_date" name="start_date" placeholder="Enter date" value="<?php echo $user_row['start date'];?>" />
					</div>
					<div class="form-group">
						<label for="date"><strong>END DATE:</strong></label>
						<input type="text" class="form-control" id="end_date" name="end_date" placeholder="Enter date" value="<?php echo $user_row['end date'];?>" />
					</div>
					<div class="form-group">
						<label for="pwd"><b>PACK DURATION:</b></label>
						<input type="text" name="packduration" id="packduration" class="form-control" value="<?php echo $user_row['duration']; ?>" readonly>
							
					</div>
					<div class="form-group">
						<label for="amount"><b>AMOUNT CHARGES (CID):</b></label>
						<input type="date" class="form-control" name="amount" id="amount" placeholder="Enter amount" value="<?php echo $user_row['amount'];?>" />
					</div>
					<input class="btn btn-success" type="submit" name="submit" value="UPDATE ORDER" />
					<input type="hidden" name="id" value="<?php echo $id; ?>" />
				</div>
			</form>
		</div>
	</div>
</div>
<link rel="stylesheet" href="../jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
<script src="../jquery-ui-1.11.4/jquery-ui.js"></script>
<script>
	$(function() 
		{
			$( "#start_date" ).datepicker({minDate:0});
			$( "#end_date" ).datepicker({minDate:0});
		});
</script>