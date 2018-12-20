<?php
$con= mysqli_connect("localhost","root","");
mysqli_select_db($con,'demo');
if($con){
    return 1;
}

else{
    echo "Database not connected!";

}

?>
