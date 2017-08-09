<?php
include("header.php");

	$data			=	mysql_query("SELECT * FROM `order`")or die(mysql_error());
	//$row			=	mysql_fetch_assoc($data);
		

	if(isset($_SESSION['flash']))
	{
		echo"
				<div id='d1' class='alert alert-success'>
					<b>Success! </b> ".$_SESSION['flash']."
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
				
			";unset($_SESSION['flash']);
	}
	
	if(isset($_SESSION['error']))
	{
		echo"
				<div id='d1' class='alert alert-success'>
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
?>

	<div class="container">
		<table id="table-2">
			<thead>
				<th>Srno.</th>
				<th>Name</th>
				<th>Contact</th>
				<th>Address</th>
				<th>Type</th>
				<th>Meal Name</th>
				<th>Amount</th>
				<th>Confirmation</th>
				<th>Time Duration</th>
				<th>Email id</th>
				<th>Starting Date</th>
				<th>Ending Date</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$i	=	1;
					while($row	=	mysql_fetch_assoc($data))
					{
						$order_id		=	$row['id'];
						$order_name		=	$row['name'];
						$order_mobile	=	$row['phone'];
						$order_address	=	$row['address'];
						$order_type		=	$row['type'];
						$order_pack		=	$row['pack'];
						$order_amount	=	$row['amount'];
						$order_confirm	=	$row['confirm'];
						$order_duration	=	$row['duration'];
						$order_email	=	$row['email'];
						$order_sdate	=	$row['start date'];
						$order_edate	=	$row['end date'];
				?>
						<tr>
							<td><?php echo $i;$i++; ?></td>
							<td><?php echo $order_name; ?></td>
							<td><?php echo $order_mobile; ?></td>
							<td><?php echo $order_address; ?></td>
							<td><?php echo $order_type; ?></td>
							<td><?php echo $order_pack; ?></td>
							<td><?php echo $order_amount; ?></td>
							<td class="confirmorder"><?php echo $order_confirm; ?></td>
							<td><?php echo $order_duration; ?></td>
							<td><?php echo $order_email; ?></td>
							<td><?php echo $order_sdate; ?></td>
							<td><?php echo $order_edate; ?></td>
							<td><a href="edit_order.php?id=<?php echo $order_id;?>" />Edit</a>/<a href="delete_order.php?id=<?php echo $order_id;?>" />Delete</a></td>
						</tr>
				<?php
					}
				?>
				
			</tbody>
		</table>
	</div>
	</body>
</html>	
<script>
	function confirm(val)
	{
		alert("tr"+val);
		//document.getElementById(val).style.border="2px solid green";
		document.getElementById("tr"+val).style.border = "2px solid green";
	}
</script>

