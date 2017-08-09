<nav class="navbar navbar-inverse" id="nev_main">
	<div class="container-fluid">
		<div class="navbar-header container">
			<button style="background-color:gray" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="glyphicon glyphicon-menu-hamburger"></span>
			</button>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li class="dropdown" id="nev_main_menu"><a  class="dropdown-toggle" data-toggle="dropdown" href="#">Services <span class="caret"></span></a>
						<ul class="dropdown-menu" id="nev_main_menu1">
							<li ><a href="lunch.php">Lunch</a></li>
							<li><a  href="dinner.php">Dinner</a></li>
						</ul>
					</li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="contact.php">Contact Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown" id="nev_account_menu"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="admin/image1/<?php echo $user_row['pic']; ?>" width="30px"> Account <span class="caret"></span></a>
						<ul class="dropdown-menu" id="nev_account_menu1">
							<li><a href="profile.php"><span class="glyphicon glyphicon-user theme1"></span> Profile</a></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-log-out theme1"></span> LogOut</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>