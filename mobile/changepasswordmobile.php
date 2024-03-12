<?php

$host="localhost:3306";
$user="unklabcb";
$password="Coursebot08";
$database="db_admin";

// Create connection
$conn = new mysqli($host,$user,$password,$database);

date_default_timezone_set('Asia/Jakarta');


if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// validate user input
	$old_pass = $_POST['input-old-password'];
	$new_pass = $_POST['input-new-password'];
	$email_user = $_POST['email-user'];
	
	// Check connection
	if ($conn->connect_error) {
	  echo "ERROR";
	
	}else{
		$sql = "SELECT * FROM tbl_students WHERE email='$email_user' AND password='$old_pass';";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// sql query
			$sql = "UPDATE `tbl_students` SET `password`='$new_pass' WHERE `email`='$email_user' AND `password`='$old_pass';";

			if ($conn->query($sql) === TRUE) {
				echo "SUCCESS";
			
			} else {
				echo "ERROR";
			}
		} else {
			return "PASSWORD INCORRECT"; // password WRONG and NOT exists 
		}
		$conn->close();
	}

	
	
}else{
	echo "ERROR";
}



?>