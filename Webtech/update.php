<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:index.php");
}
include 'Nav.html';
include 'Database.php';
if (isset($_POST['done'])) {
    $id=$_GET['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email =$_POST['email'];
    $course=$_POST['course'];
    mysqli_query($con,"UPDATE student set id=$id, Username='$username',Password='$password',Email='$email',Course='$course' where id=$id");
    header('location:List.php');
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
    <script type="text/javascript">
        function validateform() {
            var username = document.myform.username.value;
            var password = document.myform.password.value;
            var course = document.myform.course.value;
            var x = document.myform.email.value;
            var atposition = x.indexOf("@");
            var dotposition = x.lastIndexOf(".");

            if (username == null || username == "") {
                alert("Name can't be blank");
                return false;
            }
            if (password.length < 6) {
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
        }
    </script>
    <br>
    <title>Insert Operation</title>
</head>
<body>

<div id="box">
    <form name="myform" method="POST"  onsubmit="return validateform()">
        <h1>Update</h1>
        <div id="textbox">
            <input type="text" placeholder="Enter username"name="username"><br><br>
           <input type="password" placeholder="Enter password"name="password"><br><br>
             <input type="text" placeholder="Enter email"name="email"><br><br>
            <input type="course" placeholder="Enter course"name="course"><br><br>
            <input class="btn" type="Submit" value="UPDATE" name="done">

        </div>
    </form>
</div>
</body>
</html>
