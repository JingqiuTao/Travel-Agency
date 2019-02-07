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
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/tour.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Choose Your Transport</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>


		<div id="colorlib-reservation">
			<!-- <div class="container"> -->
				<div class="row">
					<div class="search-wrap">
						<div class="container">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#flight"><i class="flaticon-plane"></i> Flight</a></li>
								<li><a data-toggle="tab" href="#car"><i class="flaticon-car"></i> Car Rent</a></li>
								<li><a data-toggle="tab" href="#cruises"><i class="flaticon-boat"></i> Cruises</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div id="flight" class="tab-pane fade in active">
								<form action="flightList.php" method="get"  class="colorlib-form">
                                
                                    
				              	<div class="row">
				              	 <div class="col-md-3">
				              	 	<div class="form-group">
				                    <label for="date">Depart:</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="from_city"  class="form-control" value="<?php if(isset($_GET['from_city'])) { echo htmlentities ($_GET['from_city']); } else echo ''; ?>">
                                          <option></option>
                                          <?php
                                          $query="SELECT * FROM `location`";
                                          $results =  mysqli_query($conn,$query);

                                          while ($row = mysqli_fetch_assoc($results)) {
                                          ?>
                                          
                                              <option name="" value="<?php echo $row['City']; ?>"><?php echo $row['City']; ?></option>
                                          
                                        
                                          <?php } ?>
                                           
                                         
				                        <!-- <option name="" value="New York">New York</option> -->
                                          
                                         
				                        
				                      </select>     
				                    </div>
				                  </div>
				              	 </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="date">Arrive:</label>
				                    <div class="form-field">
				                      
                                        <i class="icon icon-arrow-down3"></i>
				                      <select name="to_city"  class="form-control" value="<?php if(isset($_GET['to_city'])) { echo htmlentities ($_GET['to_city']); } else echo ''; ?>">
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
				                <div class="col-md-2">
				                  <div class="form-group">
                                <!--      -------------------
                                      <div class="depart">
							<h3>Depart</h3>
							<input class="date" id="datepicker2" name="departure_date" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="i   f (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
						</div>
                                      -------------------      -->
				                    <label for="date">Date:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                       <input class="form-control" id="date" name="departure_date" type="date" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" >
				                       	
				                       </div>
				                  </div>
				                </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="guests">Class</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
                                        
				                      <select name="class" id="class" onchange="change_country(this.value)" class="form-control">
				                         <option name="" value="Economy">Economy</option>
				                        <option name="" value="Business">Business</option>
				                        
				                      </select>
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-2">
				                  <input type="submit" name="submit" id="submit" value="Find Flights" class="btn btn-primary btn-block">
				                </div>
				              </div>
				            </form>
                            
				         </div>
						   <div id="car" class="tab-pane fade">
                            <form action="car.php" method="get"  class="colorlib-form">
                                <div class="row">
                                    
                                    
                                    
				              	 <div class="col-md-3">
				              	 	<div class="form-group">
				                    <label for="date">Rent Location:</label>
				                    <div class="form-field">
				                     
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="from_city"  class="form-control" value="<?php if(isset($_GET['from_city'])) { echo htmlentities ($_GET['from_city']); } else echo ''; ?>">
                                           <option></option>
                                          <?php
                                          $query="SELECT * FROM `location`";
                                          $results =  mysqli_query($conn,$query);

                                          while ($row = mysqli_fetch_assoc($results)) {
                                          ?>
                                          
                                              <option name="" value="<?php echo $row['City']; ?>"><?php echo $row['City']; ?></option>
                                          
                                        
                                          <?php } ?>
                                           
                                         
				                        <!-- <option name="" value="New York">New York</option> -->
                                          
                                         
				                        
				                      </select> 
                                        
                                        
				                    </div>
				                  </div>
				              	 </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="date">Return Location:</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="to_city"  class="form-control" value="<?php if(isset($_GET['to_city'])) { echo htmlentities ($_GET['to_city']); } else echo ''; ?>">
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
				                <div class="col-md-2">
				                  <div class="form-group">
				                    <label for="date">Pick Up Date:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                       <input class="form-control" id="date" name="pickup_date" type="date" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" >
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="guests">Car Type:</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
                                        
				                      <select name="cartype" id="cartype" onchange="change_country(this.value)" class="form-control">
				                         <option></option>
				                         <option name="" value="Sedan">Sedan</option>
                                          <option name="" value="Wagon">Wagon</option>
                                          <option name="" value="Convertible">Convertible</option>
				                        <option name="" value="SUV">SUV</option>
				                        
				                      </select>
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-2">
				                  <input type="submit" name="submit" id="submit" value="Find Cars" class="btn btn-primary btn-block">
				                </div>
				              </div>

				            </form>
						   </div>
						   <div id="cruises" class="tab-pane fade">
						      <form action="cruises.php" method="get"  class="colorlib-form">

				              	<div class="row">
				              	 <div class="col-md-4">
				              	 	<div class="form-group">
				                    <label for="date">From:</label>
				                    <div class="form-field">
				                     
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="from_city"  class="form-control" value="<?php if(isset($_GET['from_city'])) { echo htmlentities ($_GET['from_city']); } else echo ''; ?>">
                                           <option></option>
                                          <?php
                                          $query="SELECT * FROM `location`";
                                          $results =  mysqli_query($conn,$query);

                                          while ($row = mysqli_fetch_assoc($results)) {
                                          ?>
                                          
                                              <option name="" value="<?php echo $row['City']; ?>"><?php echo $row['City']; ?></option>
                                          
                                        
                                          <?php } ?>
                                           
                                         
				                        <!-- <option name="" value="New York">New York</option> -->
                                          
                                         
				                        
				                      </select> 
                                        
                                        
				                    </div>
				                  </div>
				              	 </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="date">To:</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="to_city"  class="form-control" value="<?php if(isset($_GET['to_city'])) { echo htmlentities ($_GET['to_city']); } else echo ''; ?>">
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
				                <div class="col-md-2">
				                  <div class="form-group">
				                    <label for="date">Boarding Date:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                       <input class="form-control" id="date" name="boarding_date" type="date" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" >
				                    
				                    </div>
				                  </div>
				                </div>
				              
                                    
				                <div class="col-md-2">
				                  <input type="submit" name="submit" id="submit" value="Find Cruises" class="btn btn-primary btn-block">
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

