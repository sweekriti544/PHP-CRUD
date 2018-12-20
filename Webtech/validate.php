<?php
include 'Nav.html';
include 'Database.php';
$username=$_POST['username'];
$password=$_POST['password'];

$username=stripslashes($username);
$password=stripslashes($password);
$username=mysqli_real_escape_string($con,$username);
$password=mysqli_real_escape_string($con,$password);

$query=mysqli_query($con,"SELECT * FROM student WHERE Username='$username'AND Password='$password'")or die(mysqli_error($con));
$res=mysqli_fetch_array($query);
if($res['Username']==$username&&$res['Password']==$password){
    header('location:home.html');
}
else{
    header('location:index.php');
}

?>