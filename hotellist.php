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
								<li><a href="services.php">Review</a></li>
								<?php 
								// echo "Pageviews=". $_SESSION['customer_email'];
									if(isset($_SESSION['customer_email'])){
										
									echo "<li><a href='logout.php'>Logout</a></li>";
									}
									else{
										echo "<li><a href='contact.html'>Login</a></li>";
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
			<div class="title" style="background-image: url(images/hotel-6.jpg); width: 100%; height: 650px; background-size:cover ;"></div>
		<div id="colorlib-contact">
			<div class="container" >
	<div style=" font: 20px;">
		<div class="">
            <form action="pay.php" method="POST" style="align-content: center; width: 100%;">
            <?php 
            
            if(isset($_GET['city'])===true){
              
              $city = $_GET['city'];
              

              if(empty($_GET['type'])===false  ) {
				  
              $type = $_GET['type'];
			  
             $query = "SELECT * FROM `accomodation` WHERE `location`= '$city' AND `AccommodationType` = '$type' ";
              $result = mysqli_query($conn, $query);
              if($result) {
              if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {?>
              	
										<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6">
														<div class="room-img" style="background-image: url(images/<?php echo $row['image']; ?>);"></div>
													</div>
													<div class="col-md-6 col-sm-6">
														<div class="desc">
															<h2><?php echo $row['hotelName']; ?></h2>
															<p class="price"><span>$<?php echo $row['RatePerNight']; ?></span> <small>/ night</small></p>
															<p><?php echo $row['review']; ?></p>
															<p><a href="pay.php?chose_to4=<?php echo $row['AccomodationID']; ?>" class="btn btn-primary">Book Now!</a></p>
														</div>
													</div>
												</div>
											</div>
										</div>
   
                <?php } ?>
			<div class="form-group text-center" style="margin-bottom: 150px;margin-top: 50px;">
				<input type="button" value="Back to Search" onclick="window.location.href=('hotels.php')" class="btn btn-primary">
			</div>

              <?php
            } else { echo 'No hotels found';?>
            
			<div class="form-group text-center" style="margin-bottom: 150px;margin-top: 50px;">
				<input type="button" value="Back to Search" onclick="window.location.href=('hotels.php')" class="btn btn-primary">
			</div>
			<?php
            }
          }
              else {  die(mysqli_error($conn)); }
			  
          } ?>
		  <?php
		
              if(empty($_GET['type'])===true  ) {
				  
              $type = $_GET['type'];
			  
             $query = "SELECT * FROM `accomodation` WHERE `location`= '$city' ";
              $result = mysqli_query($conn, $query);
              if($result) {
              if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {?>
              	
										
										<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6">
														<div class="room-img" style="background-image: url(images/<?php echo $row['image']; ?>);"></div>
													</div>
													<div class="col-md-6 col-sm-6">
														<div class="desc">
															<h2><?php echo $row['hotelName']; ?></h2>
															<p class="price"><span>$<?php echo $row['RatePerNight']; ?></span> <small>/ night</small></p>
															<p><?php echo $row['review']; ?></p>
															<p><a href="pay.php?chose_to4=<?php echo $row['AccomodationID']; ?>" class="btn btn-primary">Book Now!</a></p>
														</div>
													</div>
												</div>
											</div>
										</div>
   
                <?php } ?>
			<div class="form-group text-center" style="margin-bottom: 150px;margin-top: 50px;">
				<input type="button" value="Back to Search" onclick="window.location.href=('hotels.php')" class="btn btn-primary">
			</div>

              <?php
            } else { echo 'No hotels found';?>
            
			<div class="form-group text-center" style="margin-bottom: 150px;margin-top: 50px;">
				<input type="button" value="Back to Search" onclick="window.location.href=('hotels.php')" class="btn btn-primary">
			</div>
			<?php
            }
          }
              else {  die(mysqli_error($conn)); }
			  
          } 
                
                
                
                
		  /* Round Trip */
		  
         
         
          } ?>
		
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

