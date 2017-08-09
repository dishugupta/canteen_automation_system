 <?php
	include('header.php');
?>
<?php
	if(isset($_SESSION['contact_failed']))
	{
		echo'
			<div id="d1" class="alert alert-danger">
			<b>ERROR! </b>'.$_SESSION['contact_failed'].'
			</div>

			<script>
				$(document).ready(function()
				{
					x=setInterval(fun,5000);
					function fun()
					{
						$("#d1").hide();
						clearInterval(x);
					}
				});
			</script>
		';
		unset($_SESSION['contact_failed']);
	}
?>
<form method="post" action="contactaction.php" onsubmit="return contact_validation()">
	<div class="container contactform">
		<div id="contact_upperdiv">
			<div class="row"> 
				<div class="col-md-12">
					<span class="get-in-touch-heading text-uppercase ob">get in touch<span>
				</div>
			</div><br />
			<div class="row">
				<div class="col-md-6">
					<div class="upper"><a href="#"><span id="phone" class="glyphicon glyphicon-earphone"></span></a>
					</div><div class="upper"><a id="contact"><?php echo $settings['contect']; ?></a></div>
				</div>
				<div class="col-md-6">
					<div class="upper"><a href="mailto:abhi4204u@gmail.com"><span id="envelop"  class="glyphicon glyphicon-envelope"></span></a>
					</div>
					<div class="upper"><a id="mail"><?php echo $settings['mailid']; ?></a></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="contact_middlediv">
			<div class="row">
				<div class="col-md-12">
					<h3 id="mailheading">Send Us On Mail</h3>
				</div>
			</div>
			<div class="row">
				<div  class="col-md-6">
					<div class="row">
						<div class="inner-addon left-addon ">
							<i class="glyphicon glyphicon-user"></i>
							<input id="username" name="username" class="form-control" type="text" placeholder="Enter Your Name" />
							<span id="username_error"></span>
						</div>
					</div>	
					<br />
					<div class="row">
						<div class="inner-addon left-addon ">
							<i class="glyphicon glyphicon-envelope"></i>
							<input id="email" name="email" class="form-control" type="text" placeholder="Enter Your E-mail Name" />
							<span id="email_error"></span>
						</div>
					</div>
					<br />
					<div class="row">
						<div class="inner-addon left-addon ">
							<i class="glyphicon glyphicon-earphone"></i>
							<input id="mobile" name="mobile" class="form-control" type="text"placeholder="Enter Your Mobile-no."/>
							<span id="mobile_error"></span>
						</div>
					</div>
					<br />
					<div class="row">
						<div class="inner-addon left-addon">
							<i class="glyphicon glyphicon-home"></i>
							<textarea id="address" class="address form-control" name="address" rows="3" cols="10" placeholder="Enter Your Address"></textarea><br />
							<span id="address_error"></span>
						</div>
					</div>
					 <br />
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="inner-addon left-addon">
							<i class="glyphicon glyphicon-pencil"></i>
							<textarea id="message" class="address form-control" rows="8" name="message" placeholder="Enter Your Message"></textarea>
							<span id="message_error"></span>
						</div>
					</div>
					<br />
					<div class="row">
						<input id="submit" class="btn btn-primary" type="submit" value="Submit" name="submit" />
						<input id="cancel" class="btn btn-danger" type="reset" value="Reset" />
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php include('footer.php'); ?>