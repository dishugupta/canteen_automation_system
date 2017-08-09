<html>
	<head>
		<script src="jquery-1.12.0.js"></script>
		<script src="jquery.bxslider.min.js"></script>
		<link href="jquery.bxslider.css" rel="stylesheet"/>
		<link rel="stylesheet" href="project.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap/js/bootstrap.js">
		<script type="text/javascript">
			$(document).ready(function(){
			$('.bxslider').bxSlider({
			auto:true,
			pager:false
			});
			});
		</script>
	</head>
	<body>
		<div id="outer" class="container-fluid">
			<div id="mid" class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6"><h1 id="three">S<img src="head.jpg"/>zzling food.com</h1>
				</div>
				<div id="right" class="col-md-3">
				</div>
				
			</div>
		</div>	
			<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li><a href="#"id="home">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Services <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Lunch</a></li>
          <li><a href="#">Break-fast</a></li>
          <li><a href="#">Dinner</a></li>
        </ul>
      </li>
      <li><a href="#">Package</a></li>
      <li><a href="#">About Us</a></li>
	  <li><a href="#">Contact Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user theme1"></span> Sign Up</a></li>
      <li><a id="login" href="#"><span class="glyphicon glyphicon-log-in theme1"></span> Login</a></li>
    </ul>
  </div>
</nav>
  


			<div class="container">
				<ul class="bxslider">
					<li><img src="one.jpg" height="400px" width="100%"></li>
					<li><img src="two.jpg" height="400px" width="100%"></li>
					<li><img src="three.jpg" height="400px" width="100%"></li>
					<li><img src="six.jpg" height="400px" width="100%"></li>
					<li><img src="five.jpg" height="400px" width="100%"></li>
				</ul>
			</div>
		
	</body>
</html>
