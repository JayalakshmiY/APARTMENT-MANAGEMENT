<?php
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
       date_default_timezone_set("Asia/Kolkata");
       $sql1="UPDATE `resident_rent` set payment_status='unpaid'";
       $result=$con->query($sql1);
       header("Location:view_resident_rent.php");
?>