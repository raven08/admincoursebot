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
	$email = $_POST['input-email'];
	$password = $_POST['input-password'];
	
	//$email = 'semmy@gmail.com';
	//$password = '12345';
	
	// Check connection
	if ($conn->connect_error) {
	  echo "ERROR";
	
	}else{
		$sql = "SELECT * FROM tbl_user_mobile WHERE email='$email' AND password='$password';";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "SUCCESS";
			// convert to associative array
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
			// to json format
			$json_data = json_encode($rows);
			echo $json_data;
		  
		} else {
		  echo "ERROR";
		  
		}
		$conn->close();
	}

	
	
}else{
	echo "ERROR";
}



?>