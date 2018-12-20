<?php
session_start();
include 'Database.php';
if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2= $_POST['password2'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $username=stripslashes($username);
    $password=stripslashes($password);
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);
    $password2 = mysqli_real_escape_string($con, $password2);

    if($password==$password2){
        mysqli_query($con,"INSERT INTO student (`Username`,`Password`,`Email`,`Course`) VALUES ('$username','$password','$email','$course')") or die(mysqli_error($con));
        header('location:home.html');
    }
}
?>

<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
    <title>Login Page</title>
    <script type="text/javascript">
        function validateform(){
            var username=document.myform.username.value;
            var password=document.myform.password.value;
            var course = document.myform.course.value;
            var x = document.myform.email.value;
            var atposition = x.indexOf("@");
            var dotposition = x.lastIndexOf(".");
            var secondpassword=document.myform.password2.value;

            if (username==null || username==""){
                alert("Name can't be blank");
                return false;
            } if(password.length<6){
                alert("Password must be at least 6 characters long.");
                return false;
            }
            if (course == null || course == "") {
                alert("Course can't be blank");
                return false;
            }
            if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
                alert("Please enter a valid e-mail address \n atpostion:" + atposition + "\n dotposition:" + dotposition);
                return false;
            }
            if(password==secondpassword){
                return true;
            }
            else{
                alert("password must be same!");
                return false;
            }
        }
    </script>
</head>
<body>
<div class="bg-img">
<div id="regbox">
    <form name="myform" method="post" action="register.php" onsubmit="return validateform()">
        <h1>Register</h1>
        <div id="textbox">
            <input type="text" placeholder="Enter username" name="username" ><br><br>
            <input type="password" placeholder="Enter password"  name="password" ><br><br>
            <input type="password" placeholder="Enter password again"  name="password2" ><br><br>
            <input type="text" placeholder="Enter email" name="email" ><br><br>
            <input type="text" placeholder="Enter course" name="course" ><br><br>
            <input class="btn" type="Submit" value="REGISTER" name="register">
        </div>
    </form>
</div>
</div>
</body>
</html>


