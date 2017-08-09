<?php
	include("header.php");
	
	if(isset($_SESSION['error']))
	{
		echo"
				<div id='d1' class='alert alert-danger'>
					<b>Error! </b> ".$_SESSION['error']."
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
				
			";unset($_SESSION['error']);
	}
	
	if(!isset($_SESSION['order']) || empty($_SESSION['order']))
	{
		@header('location:index.php');
		exit;
	}
	else
	{
		$user_id		=	$_SESSION['user_id'];
		$id				=	$_SESSION['order']['id'];
		$type			=	$_SESSION['order']['type'];
		$userdata		=	mysql_query("SELECT * FROM `users` WHERE `id`='".$user_id."' ");
		$user_row		=	mysql_fetch_array($userdata);
		if($type=="lunch")
		{
			$service_data	=	mysql_query("SELECT * FROM `lunchmenu` WHERE `id`='".$id."'");	
			$service_row	=	mysql_fetch_array($service_data);
		}
		else
		{
			$service_data	=	mysql_query("SELECT * FROM `dinnermenu` WHERE `id`='".$id."'");	
			$service_row	=	mysql_fetch_array($service_data);
		}
	}
?>
<div class="container" id="div_main">
	<div class="row header">
		<div class="col-md-12 orderhead">ORDER & DELIVERY DETAIL</div>
	</div>
	<div class="row image">
		<div class="container" id="background_div">
			<form id="form" action="orderbill.php" method="post">
				<div class="col-md-6"> 	
					<div class="form-group">
						<label for="name"><strong>NAME:</strong></label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="<?php echo $user_row['fullname']; ?>" readonly />
					</div>
					<div class="form-group">
						<label for="mobile"><strong>MOBILE:</strong></label>
						<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" value="<?php echo $user_row['mobile']; ?>" readonly />
					</div>
					<div class="form-group">
						<label for="email"><strong>EMAIL:</strong></label>
						<input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="<?php echo $user_row['email']; ?>" readonly />
					</div>
					<div class="form-group">
						<label for="address"><b>ADDRESS:</b></label>
						<textarea class="form-control address" rows="3" name="address" cols="3" id="address" placeholder="Enter address" ><?php echo $user_row['address']; ?></textarea>
					</div>
				</div>
				<div class="col-md-6"> 
					<div class="form-group">
						<label for="type"><strong>TYPE:</strong></label>
						<input type="text" class="form-control" name="type" id="type" placeholder="Enter Type"value="<?php echo $type; ?>" readonly />
					</div>
					<div class="form-group">
						<label for="packname"><strong>PACK:</strong></label>
						<input type="text" class="form-control" id="packname" name="pack" placeholder="Enter pack name" value="<?php echo $service_row['name'];?>" readonly />
					</div>
					<div class="form-group">
						<label for="date"><strong>DATE:</strong></label>
						<input type="text" class="form-control" id="date" name="date" placeholder="Enter date" />
					</div>
					<div class="form-group">
						<label for="pwd"><b>PACK DURATION:</b></label>
						<select name="packduration" id="packduration" class="form-control" onchange="display_amount()">
							<option value="">select pack</option>
							<option value="one day">one day</option>
							<option value="monthly">monthly</option>
						</select>
					</div>
					<div class="form-group">
						<label for="amount"><b>AMOUNT CHARGES (CID):</b></label>
						<input type="text" class="form-control" name="amount" id="amount" placeholder="0" readonly />
					</div>
					<input class="btn btn-success" type="submit" name="submit" value="Place Order" />
				</div>
			</form>
		</div>
	</div>
</div>
<link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
<script src="jquery-ui-1.11.4/jquery-ui.js"></script>
<script>
	$(function() 
		{
			$( "#date" ).datepicker({minDate:0});
		});
</script>
<script>
	function display_amount()
	{
		packduration= $("#packduration").val();
		
		if(packduration	==	"one day")
		{
			document.getElementById('amount').value	=	<?php echo $service_row['dayrate']; ?>;
		}
		else if(packduration	==	"monthly")
		{
			document.getElementById('amount').value	=	<?php echo $service_row['monthrate']*30; ?>;
		}
		else
		{
			document.getElementById('amount').value	=	"0";
		}
	}
</script>	
<?php
	include("footer.php");
?>