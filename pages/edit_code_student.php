<?php

$connection = mysqli_connect("localhost","root","","db_admin");

if(isset($_POST['btnupdate']))
{
        $fullname = $_POST['edit_fullname'];
        $reg_num = $_POST['edit_reg_num'];
        $nim = $_POST['edit_nim'];
        $faculty = $_POST['edit_faculty'];
        $prog_study = $_POST['edit_prog_study'];
        $curriculum_name = $_POST['edit_curriculum_name'];
        $email = $_POST['edit_email'];
        $password = $_POST['edit_password'];
    

    $query ="UPDATE tbl_students set name='$fullname', email='$email', reg_num='$reg_num', nim='$nim',faculty='$faculty', password='$password', curriculum_name = '$curriculum_name',prog_study='$prog_study' WHERE email='$email' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: list_student.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location: list_student.php');
    }
}

if(isset($_POST['delete_btn']))
{
    $email = $_POST['delete_email'];

    $query = "DELETE FROM tbl_students WHERE email='$email' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: list_student.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: list_student.php');
    }
}

?>