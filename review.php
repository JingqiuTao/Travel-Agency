<?php
session_start();
$rate = filter_input(INPUT_POST, 'rate');
$review_detail = filter_input(INPUT_POST, 'message');

if(!isset($_SESSION['customer_email'])){
  echo "<script>alert('login before you write reviews, Thanks!')</script>";
  echo "<script>window.open('contact.html','_self')</script>";
  }

$email = $_SESSION['customer_email'];


$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "travel";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (!empty($rate) and !empty($review_detail) ){
  if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
    }
  else{
    $sql = "INSERT INTO Review (Email, Rating,Review_Detail)
    values ('$email','$rate','$review_detail')";
    if ($conn->query($sql)){
        echo "<script>alert('We have received your review, Thanks!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      echo "Error: ". $sql ."". $conn->error;
    }
  }
}
else{
  $message = "fulfilled all the field when you sign up";
  echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<script>window.open('services.php','_self')</script>";
}
  $conn->close();

