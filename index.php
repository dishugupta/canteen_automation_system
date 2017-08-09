 <?php
	include('header.php');
	
	if(isset($_SESSION['sucesses']))
	{
		echo"  <div id='d1' class='alert alert-success' role='alert'>
					<strong>Well done! </strong>".$_SESSION['sucesses'].";
				</div>
				
				<script>
				
					$(document).ready(function(){
						
						x=setInterval(fun,3000);
						
						function fun()
						{
							$('#d1').hide();
							claerInterval(x);
						}
					});
					
				</script>
				
				
				";
		//echo"<script>alert('".$_SESSION['contact_sucesses']."');</script>";
		unset($_SESSION['sucesses']);
	}
	
?>
<div class="container">
	<ul class="bxslider">
		<li><img src="image/one.jpg" height="400px" width="100%"></li>
		<li><img src="image/two.jpg" height="400px" width="100%"></li>
		<li><img src="image/three.jpg" height="400px" width="100%"></li>
		<li><img src="image/six.jpg" height="400px" width="100%"></li>
		<li><img src="image/five.jpg" height="400px" width="100%"></li>
	</ul>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<a class="menustonelink" href="lunch.php">
				<div class="menustone">
					LUNCH
				</div>
			</a>
		</div>
		<div class="col-md-6">
			<a href="dinner.php" class="menustonelink">
				<div class="menustone">
					DINNER
				</div>
			</a>
		</div>
	</div>
</div>
<script>
$(document).ready(function()
{
	$('.bxslider').bxSlider(
	{
		auto:true,
		pager:false
	});
});
</script>
<?php include('footer.php');?>