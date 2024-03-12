<?php

session_start();

$host       = "localhost:3306";
$user       = "unklabcb";
$password       = "Coursebot08";
$database="db_admin";

$connection=mysqli_connect($host,$user,$password,$database);

if($dbconfig){
 
}else{
    header("Location: pages/login.php");
}

if(!$_SESSION['name'])
{
    header('Location: pages/login.php');
}

?>