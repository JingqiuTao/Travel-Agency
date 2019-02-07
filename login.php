<?php
session_start();
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "travel";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (!empty($email) and !empty($password)){
  if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
    }
  else{
    $check_cumtomer = mysqli_num_rows(mysqli_query($conn,"select * from User where email='$email' AND password='$password'"));
    if ($check_cumtomer == 0){
      echo "<script>alert('Email or Password is incorrect,try again!')</script>";
      echo "<script>window.open('contact.html','_self')</script>";
    }
    else{
      $_SESSION['customer_email']=$email; 

      echo "<script>alert('login successful!')</script>";
      echo "<script>window.open('tours.php','_self')</script>";
    }
  }
}
else{
  $message = "fulfilled all the field when you login";
  echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<script>window.open('contact.html','_self')</script>";
}
  $conn->close();

