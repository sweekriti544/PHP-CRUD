<?php
session_start();
if(isSet($_POST['login'])) {
    include 'Nav.html';
    include 'Database.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    $username=stripslashes($username);
    $password=stripslashes($password);
    $username=mysqli_real_escape_string($con,$username);
    $password=mysqli_real_escape_string($con,$password);

    $query=mysqli_query($con,"SELECT * FROM student WHERE Username='$username'AND Password='$password'")or die(mysqli_error($con));
    $res=mysqli_num_rows($query);
    if ($res == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('location:home.html');
    }
    else{
        header('location:index.php');
    }
}
?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
    <title>Login Page</title>

</head>
<body>
<div class="bg-img">
<div id="box">
<form method="post" action="index.php" onsubmit="return validateform()">
    <h1>Login</h1>
    <div id="textbox">
    <input type="text" placeholder="Enter username" name="username" required><br><br>
     <input type="password" placeholder="Enter password"  name="password" required><br><br>
    <input class="sub-btn" type="Submit" value="LOGIN" name="login"><br>
        <div id="end">
        Not a member? <a href="register.php">Sign Up now! </a>
        </div>
    </div>
</form>
</div>
</div>
</body>
</html>

