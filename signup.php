<?php
session_start();
$firstname = filter_input(INPUT_POST, 'fname');
$lastname = filter_input(INPUT_POST, 'lname');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "travel";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (!empty($firstname) and !empty($lastname) and !empty($email) and !empty($password)){
  if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
    }
  else{
    $sql = "INSERT INTO user (First_name, Last_name,Email,Password)
    values ('$firstname','$lastname','$email','$password')";
    if ($conn->query($sql)){
        $_SESSION['customer_email']=$email;
        echo "<script>alert('Account has been created successfully, Thanks!')</script>";
        echo "<script>window.open('tours.php','_self')</script>";
    }
    else{
      echo "Error: ". $sql ."". $conn->error;
    }
  }
}
else{
  $message = "fulfilled all the field when you sign up";
  echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<script>window.open('contact.html','_self')</script>";
}
  $conn->close();

