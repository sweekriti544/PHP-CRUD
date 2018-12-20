<?php
include 'Nav.html';
include 'Database.php';
if (isset($_POST['done'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email= $_POST['email'];
    $course=$_POST['course'];
    mysqli_query($con,"SELECT * FROM student");
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
    <title> View List</title>
</head>
<body>
<br>
<button class="w3-btn w3-green"> <a href="Insert.php">Create Students</a></button>
<table id="students">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Course</th>
        <th>Action</th>

    </tr>
    <?php
    include 'Database.php';
        $query=mysqli_query($con,"SELECT * FROM student");
        while ($res=mysqli_fetch_array($query)) {

            ?>
            <tr>
                <td><?php echo $res['id']; ?></td>
                <td><?php echo $res['Username']; ?></td>
                <td><?php echo $res['Email']; ?></td>
                <td><?php echo $res['Course']; ?></td>
                <td> <button class="w3-btn w3-red"> <a href="delete.php?id=<?php echo $res['id']; ?>"> Delete </a>  </button>
                 <button class="w3-btn w3-blue"> <a href="update.php?id=<?php echo $res['id']; ?>"> Update </a> </button> </td>
            </tr>
            <?php
        }
    ?>
</table>
</body>
</html>
