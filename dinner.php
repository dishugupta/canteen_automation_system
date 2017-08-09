<?php
	include("header.php");
	$dinnerdata	=	mysql_query("select * from `dinnermenu`");
?>
<div class="container lunch">
	<div class="row">
		<div class="col-md-12"><h1>DINNER</h1></div>
	</div>
	
	<div class="row">
		<?php while($dinnerrow	=	mysql_fetch_array($dinnerdata)){?>
		<div class="col-md-4">
			<div class="mealpack">
				<div class="ordernow packname">
					<h3><?php echo $dinnerrow['name']; ?></h3>
				</div>
				<h4><?php echo $dinnerrow['description']; ?><br /></h4>
				
				<hr>
				<h4><?php echo $dinnerrow['menu']; ?></h4>
				<hr>
				<h3>Package</h3>
				<h4>for one meal <?php echo $dinnerrow['dayrate']; ?> rs<br />
				for one month <?php echo $dinnerrow['monthrate']; ?>*30 rs<br /></h4>  
				<h5>(inclusive of taxes & delivery charges)</h5>
				<h2>package is for either<br />
				lunch/dinner</h2><br />	
				<div class="ordernow orderbtn">
					<form method="post"action="orderaction.php">
						<input type="hidden" name="orderid" value="<?php echo $dinnerrow['id'];?>"/>
						<input type="hidden" name="type" value="dinner"/>
						<input id="ordernow"type="submit" name="submit" value="ORDERNOW"/>
					</form>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>	
<div class="container"> 
	<div class="row days">
		<div class="col-md-12 "><h1><b>ALWAYS FRESH ,DON'T MISS IT</b></h1></div>
	</div>
</div>	
<div class="container slider">
	<div class="col-md-12">
		<ul class="bxslider" >
			<li><img src="image/1.png" /></li>
			<li><img src="image/2.png" /></li>
			<li><img src="image/3.png" /></li>
			<li><img src="image/4.png" /></li>
			<li><img src="image/5.png" /></li>
			<li><img src="image/6.png" /></li>
		</ul>
	</div>
</div>
<script>
	$(document).ready(function()
	{
		$('.bxslider').bxSlider(
		{
			auto:true,
			slideWidth:300,
			minSlides:2,
			maxSlides:3,
			slideMargin:100,
			pager:false
		});
	});
</script>
