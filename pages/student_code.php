<?php

$connection = mysqli_connect("localhost:3306","unklabcb","Coursebot08","db_admin");

if(isset($_POST['submitbtn']))
      {
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $faculty = $_POST['faculty'];
        $password = $_POST['password'];
        $curriculum = $_POST['curriculum'];
        $nim = $_POST['nim'];
        $reg = $_POST['reg'];
        $jur = $_POST['jur'];
        $cpassword = $_POST['cpassword'];
        


        if($password === $cpassword)
        {
        $query = "INSERT INTO tbl_students (fullname,email,faculty,password,curriculum_name,nim,reg_num,prog_study) VALUES ('$name','$email','$faculty','$password','$nim','$reg','$jur')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
          $_SESSION['success'] = "Admin Profil Added";
          header('Location: home.php');
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