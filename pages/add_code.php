<?php

$connection = mysqli_connect("localhost:3306","unklabcb","Coursebot08","db_admin");

if(isset($_POST['btnsubmit']))
      {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $cpassword = $_POST['cpassword'];

        if($password === $cpassword)
        {
        $query = "INSERT INTO users (name,email,department,password,role) VALUES ('$username','$email','$department','$password','$role')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
          $_SESSION['success'] = "Admin Profil Added";
          header('Location: list_user.php');
        }
        else
        {
          $_SESSION['status'] = "Admin Profil NOT added";
          header('Location: list_user.php');
        }
      }
      else
      {
          $_SESSION['status'] = "Password and Confirm Password Does Not Match";
          header('Location: list_user.php');
      }
    }

?>