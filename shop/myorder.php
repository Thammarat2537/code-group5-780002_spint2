<?php include_once'header.php';?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop &mdash; Free Website Template, Free HTML5 Template by gettemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />
	<META HTTP-EQUIV="Content-Type"CONTENT="text/html; charset=utf-8">

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<style type="text/css">
	.centerDiv
	{
		width: 60%;
		height:100px;
		margin: 0 auto;
		
	}
	</style>

	</head>
	<body>
		

	<!--<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/images_bg1.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>My Order</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>-->

	<div class="centerDiv">
	<a>Order code</a>
	<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Enter Your Order code">
		<input id="Order code" class="input100" type="text" name="Order code" placeholder="Order code">
		<span class="focus-input100"></span><button class="login100-form-btn">ok</button>
	</div>
	</div>

	
		

	<table class="wp-table">
	<col width="10">
	<col width="200">
	<col width="150">
    <tr>
      <th></th>
      <th>Order</th>
      <th>Receipt</th>
    </tr>
    <tr>
	
    <td></td>
    <td><?php
			if(isset($_SESSION['u_email'])){
				$sql = "SELECT * FROM orderdetail WHERE user = '$_SESSION[u_email]'";
				$result = mysqli_query($connect->getConn(),$sql);
				$order_id = array();
				$total  = array();
				$i = 0;
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
						$order_id[] = $row['orderID'];
						$total[] = $row['grandtotal'];
						echo '<a href="order_confirm.php">OrderNo: '.$order_id{$i}.' Total: '.$total{$i}.'</a><br>';
						$i++;
					}
					echo '<div><p id="demo"></p></div>';
				}
				else{
					
				}
			}
			
		?></td>
    <td><?php
			if(isset($_SESSION['u_email'])){
				$sql = "SELECT * FROM receipt WHERE user = '$_SESSION[u_email]'";
				$result = mysqli_query($connect->getConn(),$sql);
				$rID = array();
				$total  = array();
				$i = 0;
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
						$rID[] = $row['rID'];
						$total[] = $row['grandtotal'];
						echo '<a href="bill.php">OrderNo: '.$rID{$i}.' Total: '.$total{$i}.'</a><br>';
						$i++;
					}
					echo '<div><p id="demo2"></p></div>';
				}
				else{
					
				}
			}
			
		?></td>
    </tr>
	
	<script>
		var d = new Date();
		document.getElementById("demo").innerHTML = d.toDateString();
		document.getElementById("demo2").innerHTML = d.toDateString();
	</script>	
	
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>


	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>


	</body>
</html>

