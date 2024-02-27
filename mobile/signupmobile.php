<?php

$host="localhost:3306";
$user="phpmyadmin";
$password="#Fm123456";
$database="db_admin";

// Create connection
$conn = new mysqli($host,$user,$password,$database);

date_default_timezone_set('Asia/Jakarta');


if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// validate user input
	$fullname= $_POST['fullname'];
	$email= $_POST['email'];
	$phone_number= $_POST['phone_number'];
	$address= $_POST['address'];
	$password= $_POST['password'];
	
	//$email = 'semmy@gmail.com';
	//$password = '12345';
	
	// Check connection
	if ($conn->connect_error) {
	  echo "ERROR";
	
	}else{
		$sql = "SELECT * FROM tbl_user_mobile WHERE email='$email' AND password='$password';";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			return "STUDENT DUPLICATE"; // student already exists 
		  
		} else {
			// sql query
			$sql = "INSERT INTO `tbl_user_mobile`(`user_name`, `email`, `phonenumber`, `address`, `password`, `created_at`) VALUES ('$fullname','$email','$phone_number','$address','$password',NOW())";
			
			if ($conn->query($sql) === TRUE) {
				echo "SUCCESS";
			
			} else {
				echo "ERROR";
			}
		  
		}
		$conn->close();
	}

	
	
}else{
	echo "ERROR";
}



?>