<?php 
include ("connect.php");
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tour Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

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

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.html">Travel</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="tours.php">Transport</a></li>
								<li><a href="hotels.php">Hotels</a></li>
								<li><a href="services.php">Review</a></li><?php 
								// echo "Pageviews=". $_SESSION['customer_email'];
									if(isset($_SESSION['customer_email'])){
										
									echo "<li><a href='logout.php'>Logout</a></li>";
									}
									else{
										echo "<script>alert('Please login first!')</script>";
      									echo "<script>window.open('contact.html','_self')</script>";
										echo "<li><a href='contact.html'>Login</a></li>";
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_5.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Confirm Your Order</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div id="colorlib-contact">
			<div class="container" style="background: wheat;">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3 style="margin-top:50px ;">Your Order</h3>
						<hr>
	<div style="text-align: center; font: 20px;">
						<?php
	if(isset($_POST['chose_to'])===true) {
			$to = $_POST['chose_to'];
			$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
			$r1 = mysqli_query($conn, $q1);
				while($row1 = mysqli_fetch_assoc($r1)) {
					echo '<p>Your flight from '.$row1['from_city'].' to '.$row1['to_city'].':</p>';
					echo "<div class = 'book'>";
					echo 'Flight Number: '.$row1['fno'].'<br>';
					echo 'Departure Date: '.$row1['departure_date'].'<br>';
					echo 'Departure Time: '.$row1['departure_time'].'<br>';
					echo 'Arrival Time: '.$row1['arrival_time'].'<br>';
					echo '<hr>';
					echo '<h3 style="color: #FE910E ;text-align: right;">Cost : $'.$row1['e_price'].'</h3><hr>';
					echo "<div>";
				}

	}
if(isset($_POST['chose_to2'])===true) {
			$to = $_POST['chose_to2'];
			$q1 = "SELECT * FROM `carrental` WHERE `CarRentalID`='$to'";
			$r1 = mysqli_query($conn, $q1);
				while($row1 = mysqli_fetch_assoc($r1)) {
					echo '<p>Your Pick Up Location: '.$row1['Rentloc'].'</p>';
                    echo '<p>Return Location: '.$row1['Returnloc'].'</p>';
					echo "<div class = 'book'>";
					echo 'Car Number: '.$row1['CarRentalID'].'<br>';
                    echo 'Car Brand: '.$row1['Brand'].'<br>';
					echo 'Car Type: '.$row1['Cartype'].'<br>';
					echo '<hr>';
					echo '<h3 style="color: #FE910E ;text-align: right;">Cost : $'.$row1['Rent'].'</h3><hr>';
					echo "<div>";
				}

	}
        if(isset($_POST['chose_to3'])===true) {
			$to = $_POST['chose_to3'];
			$q1 = "SELECT * FROM `cruise` WHERE `CruiseNum`='$to'";
			$r1 = mysqli_query($conn, $q1);
				while($row1 = mysqli_fetch_assoc($r1)) {
					echo '<p>Your Cruise from '.$row1['SourceLocation'].' to '.$row1['Destination'].':</p>';
					echo "<div class = 'book'>";
					echo 'Cruise Number: '.$row1['CruiseNum'].'<br>';
					
					echo '<hr>';
					echo '<h3 style="color: #FE910E ;text-align: right;">Cost : $'.$row1['Fare'].'</h3><hr>';
					echo "<div>";
				}

	} 
	if(isset($_GET['chose_to4'])===true) {
			$to = $_GET['chose_to4'];
			$q1 = "SELECT * FROM `accomodation` WHERE `AccomodationID`='$to'";
			$r1 = mysqli_query($conn, $q1);
				while($row1 = mysqli_fetch_assoc($r1)) {
					echo '<p>Your Hotel :<h1 > '.$row1['hotelName'].' </h1></p>';
					echo 'location: '.$row1['location'].'<br>';?>
					price: $<?php echo $row1['RatePerNight']; ?>/per night<br>
					<hr>
					<h3 style="color: #FE910E ;text-align: right;" >Cost : $ <?php echo $row1['RatePerNight']; ?> </h3><hr>
					<div>
				<?php
				}

	}
			?> 
			</div>
					</div>
					
					</div>
				</div>
		</div>

		</div>
		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<form method = "post" action="setorder.php">
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Check Out</h3>
						<hr>
							<div class="row form-group">
								<div class="col-md-6">
									<label for="payment">Select payment method:</label>
									<div style="width: 100%;">
									<div class="col-md-6">
									<input type="radio" name="payment" value="VISA" > VISA
									</div>
									<div class="col-md-6">
									<input type="radio" name="payment" value="MASTERCARD" >MASTERCARD
									</div>
									</div>
								</div>
							</div>
								
							<div class="row form-group">
								<div class="col-md-12">
									<label for="cardNum">Card Number</label>
									<input type="text" name="cardNum" class="form-control" placeholder="your card number">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-6">
									<label for="email">Card Expiry Date: </label>
									<input type="text" name="cardDate" class="form-control" placeholder="mm/yy">
								</div>
								<div class="col-md-6">
									<label for="email">Security Code </label>
									<input type="text" name="securCode" class="form-control" placeholder="XXX">
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" value="Submit" class="btn btn-primary">
							</div>
							
					</div>
					</form>
					</div>
				</div>
			
			</div>

	
		

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">

    			<center style="font-size: 20px; color: gainsboro;">CONTACT US</center>
    			<center style="margin: 10px;">jiawei.chu@stonybrook.edu</center>
				<center style="margin: 10px;">chen.jin@stonybrook.edu</center>
				<center style="margin: 10px;">jingqiu.tao@stonybrook.edu</center>
   			</div>
  		</footer>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<script src="js/jquery.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/main.js"></script>

	</body>
</html>
