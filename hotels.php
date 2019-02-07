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
							<div id="colorlib-logo"><a href="index.html">Tour</a></div>
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
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/hotel.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Accommodation</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-wrap">
			<div class="container">
						<h1>Recommend</h1>
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="wrap-division">
								<?php
									$query = "SELECT * FROM `accomodation` ";
              						$result = mysqli_query($conn, $query);
             						if($result) {
              						if(mysqli_num_rows($result) > 0) {
              						while($row = mysqli_fetch_assoc($result)) {?>
								<div class="col-md-6 col-sm-6 animate-box">
									<div class="hotel-entry">
										<a class="hotel-img" style="background-image: url(images/<?php echo $row['image']; ?>);">
											<p class="price"><span>$<?php echo $row['RatePerNight']; ?></span><small> /night</small></p>
										</a>
										<div class="desc">
										<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
										<h3><a href="hotel-room.html"><?php echo $row['hotelName']; ?></a></h3>
										<span class="place"><?php echo $row['AccommodationType']; ?></span>
										<p><?php echo $row['review']; ?></p>
										<p><a href="pay.php?chose_to4=<?php echo $row['AccomodationID']; ?>" class="btn btn-primary">Book Now!</a></p></div>	
									</div>
								</div>									
										<?php }}}?>

							</div>
						</div>
					</div>

					<!-- SIDEBAR-->
					<form action="hotellist.php" method="GET" style="color: white;">
					<div class="col-md-3">
						<div class="sidebar-wrap">
							<div class="side search-wrap animate-box">
								<h3 class="sidebar-heading">Find your hotel</h3>
								<form method="post" class="colorlib-form">
				              	<div class="row">
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="date">Check-in:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" id="date" class="form-control date" placeholder="Check-in date">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="date">Check-out:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" id="date" class="form-control date" placeholder="Check-out date">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="guests">Guest</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="people"  class="form-control">
				                      	<option></option>
				                        <option value="#">1</option>
				                        <option value="#">2</option>
				                        <option value="#">3</option>
				                        <option value="#">4</option>
				                        <option value="#">5+</option>
				                      </select>
				                    </div>
				                  </div>
				                </div>
									
								 <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="guests">ACCOMMODATION TYPE</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="type"class="form-control">
				                      	<option></option>
				                        <option value="Apartment">Apartment</option>
				                        <option value="Hotel">Hotel</option>
				                        <option value="Airbnb">Airbnb</option>
				                        <option value="cabin">cabin</option>
				          
				                      </select>
				                    </div>
				                  </div>
				                </div>
									
								
									
							    <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="guests">Location</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="city" class="form-control">
				                      	<option></option>
				          				 <?php
                                          $query="SELECT * FROM `location`";
                                          $results =  mysqli_query($conn,$query);

                                          while ($row = mysqli_fetch_assoc($results)) {
                                          ?>
                                              <option name="" value="<?php echo $row['City']; ?>"><?php echo $row['City']; ?></option>
                                          <?php } ?>
				                      </select>
				                    </div>
				                  </div>
				                </div>
							</form>	
									

								
				                <div class="col-md-12">
				                  <input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary btn-block">
				                </div>
				              </div>
				            </form>
							</div>
							
						


						
						</div>
					</div>
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

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

