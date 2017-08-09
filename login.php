<?php
include("header.php");
	if(isset($_SESSION['login_error']))
	{
		
		//echo"<script> alert('".$_SESSION['login_error']."');</script>";
		
		echo'<div id="d1" class="alert alert-danger" role="alert">
					<strong>Error! </strong>'.$_SESSION['login_error'].'
				</div>
					<script>
						$(document).ready(function(){
							
							x=setInterval(fun,3000);
							
							function fun()
							{
								$("#d1").hide();
								clearInterval(x);
							}
						});
					</script>
				';
				unset($_SESSION['login_error']);
	}
/*if(isset($_SESSION['user']))
{
	echo"<script>alert('".$_SESSION['user']."'); </script>";
	unset($_SESSION['user']);
	
}*/

if(isset($_SESSION['sucesses']))
{
	echo'
			<div id="d1" class="alert alert-success">
				<b>Well done! </b>'.$_SESSION['sucesses'].'
			</div>
			
			<script>
				$(document).ready(function(){
					
					x=setInterval(fun,3000);
					
					function fun()
					{
						$("#d1").hide();
						clearInterval(x);
					}
				});
			</script>
		';
	//echo"<script>alert('".$_SESSION['sucesses']."'); </script>";
	unset($_SESSION['sucesses']);
	
}

if(isset($_SESSION['unsucesses']))
{
	echo'
			<div id="d1" class="alert alert-danger" role="alert">
				<b>Error! </b>'.$_SESSION['unsucesses'].'
			</div>
			
			<script>
				$(document).ready(function(){
					x=setInterval(fun,3000);
					
					function fun()
					{
						$("#d1").hide();
						clearInterval(x);
					}
				});
			</script>
		';
	//echo"<script>alert('".$_SESSION['unsucesses']."'); </script>";
	unset($_SESSION['unsucesses']);
	
}

?>
<form action="loginaction.php" method="post" >
	<div class="container loginform">
		<div class="row d2">
			<div class="col-md-12">
				<span class="glyphicon glyphicon-user theme2"></span><label>USER NAME</label><input type="text" name="username" id="uname" class="form-control" />
				<?php 
					if(isset($_SESSION['user_error']))
					{
						echo $_SESSION['user_error'];
						unset($_SESSION['user_error']);
					}
				?>
			</div>
		</div>	
		<br />
		<div class="row d2">
			<div class="col-md-12">
				<span class="glyphicon glyphicon-lock theme2"></span> <label>PASSWORD</label>  <input type="password" name="password" id="pass" class="form-control" />
				<?php
					if(isset($_SESSION['password_error']))
					{
						echo $_SESSION['password_error'];
						unset($_SESSION['password_error']);	 
					}
				?>
			</div>
		</div>		
		<br />
		<div class="row d2">
			<div class="col-md-12">
				<input type="submit" name="submit" value="Login"  class="btn btn-success"/>&nbsp&nbsp&nbsp <input type="button" class="btn btn-danger" value="Sign up" onclick="window.location.href='signup.php'" />
			</div>
		</div>	
	</div>
</form>
