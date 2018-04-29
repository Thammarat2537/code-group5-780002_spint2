<?php include 'process.php';?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		randProduct();
		shirts();
		skirts();
		dress();
		pants();
		
		function randProduct(){
			$.ajax({
				url	:	"process.php",
				method:	"POST",
				data	:	{randPro:1},
				success	:	function(data){
					$("#indexProduct").html(data);
				}
			})
		}
		function shirts(){
			$.ajax({
				url	:	"process.php",
				method:	"POST",
				data	:	{shirts:1},
				success	:	function(data){
					$("#shirts").html(data);
				}
			})
		}
		function skirts(){
			$.ajax({
				url	:	"process.php",
				method:	"POST",
				data	:	{skirts:1},
				success	:	function(data){
					$("#skirts").html(data);
				}
			})
		}
		function dress(){
			$.ajax({
				url	:	"process.php",
				method:	"POST",
				data	:	{dress:1},
				success	:	function(data){
					$("#dress").html(data);
				}
			})
		}
		function pants(){
			$.ajax({
				url	:	"process.php",
				method:	"POST",
				data	:	{pants:1},
				success	:	function(data){
					$("#pants").html(data);
				}
			})
		}

		count_item();
		function count_item(){
			$.ajax({
				url : "process.php",
				method : "POST",
				data : {count_item:1},
				success : function(data){
					$("#in").html(data);
				}
			})
		}

		wish();
		function wish(){
			$.ajax({
				url : "process.php",
				method : "POST",
				data : {getL:1},
				success : function(data){
					$("#this").html(data);
				}
			})
		}

		$("body").delegate("#add","click",function(event){
			var pid = $(this).attr("pid");
			event.preventDefault();
			$.ajax({
				url : "process.php",
				method : "POST",
				data : {addToCart:1,proID:pid},
				success : function(data){
					count_item();
					$('#prod').html(data);
				}
			})
		})

		$("body").delegate("#detail","click",function(event){
			var pid = $(this).attr("pid");
			event.preventDefault();
			$.ajax({
				url : "process.php",
				method : "POST",
				data : {getDetail:1,proID:pid},
				success : function(data){
					$('#prod').html(data);
				}
			})
		})

		$("body").delegate("#like","click",function(event){
			var pid = $(this).attr("pid");
			event.preventDefault();
			$.ajax({
				url : "process.php",
				method : "POST",
				data : {getLike:1,proID:pid},
				success : function(data){
					$('#here').html(data);
				}
			})
		})
		
	
		var text;
		$("body").delegate("#searchBtn","click",function(event){
			text = document.getElementById("searchText").value;
			event.preventDefault();;
			$.ajax({
				url : "process.php",
				method : "POST",
				data : {searchBtn:1,searchText:text},
				success : function(data){
					found();
					$('#ff').html(data);
				}
			})
		})
		found();
		function found(){
			$.ajax({
				url : "process.php",
				method : "POST",
				data : {result:1},
				success : function(data){
					$("#result").html(data);
				}
			})
		}

	});

</script>

<div class="fh5co-loader"></div>

<nav class="fh5co-nav" role="navigation">

	<div class="container">
		<div id="ff"></div>
		<div id="fh5co-logo"><center><a href="indexPage.php">ARIS - STORE</a></center></div>
		<div class="row">
			<div class="col-md-3 col-xs-2">
				<?php if(isset($_SESSION['u_email'])){
					echo '<form action="indexPage.php" method="POST">
					<a href="account.php?'. $_SESSION["u_first"] .'">Welcome, '. $_SESSION["u_first"] .'</a>
					<a href="logout.php" style="color:#DC143C">Logout</a>
					</form>';
				}else{
					echo '<li><a href="login.php">Login/Sign Up</a></li>';
				}
				?>
			</div>

			<div class="col-md-6 col-xs-6 text-center menu-1">
				<ul>
					<li><a href="tops&shirts.php">Tops & Shirts</a></li>
					<li><a href="skirts.php">Skirts</a></li>
					<li><a href="dress.php">DRESS</a></li>
					<li><a href="pants&shorts.php">pants & shorts</a></li>
					<li><a href="myorder.php">my order</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
				<ul>

					<li class="search">
						<div class="input-group">
							<input type="text" id="searchText" placeholder="Search..">

							<span class="input-group-btn">
								<button class="btn btn-primary" id="searchBtn" ><i class="icon-search"></i></button>
							</span>

						</div>
					</li>
					<?php if(isset($_SESSION['u_email'])){
						echo '<li class="shopping-cart">
								<a href="checkout.php" class="cart" target="_blank"><span><small id="in">0</small><i class="icon-shopping-cart">
							</i></span></a></li>';
					}else{
						echo '<li class="shopping-cart"><a href="login.php" class="cart"><span><small id="in">0</small><i class="icon-shopping-cart"></i></span></a></li>';
					}
					?>


				</ul>
			</div>
		</div>
	</div>
</nav>
</head>


