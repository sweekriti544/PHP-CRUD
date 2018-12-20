<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:index.php");
    exit();
}
include 'Nav.html';
include 'Database.php';
$id=$_GET['id'];
mysqli_query($con,"DELETE FROM `student` WHERE id=$id");
header('location:List.php');
exit();
?>