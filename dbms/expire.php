<?php
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
       date_default_timezone_set("Asia/Kolkata");
       $today=date('Y-m-d');
       $sql1="delete  from `parking` where end_date<'$today';";
       $result=$con->query($sql1);
       $sql2="delete  from `gym` where end_date<'$today';";
       $result=$con->query($sql2);
       $sql3="delete  from `yoga` where end_date<'$today';";
       $result=$con->query($sql3);
       $sql4="delete  from `dance` where end_date<'$today';";
       $result=$con->query($sql4);
       $sql5="delete  from `function_hall` where date<'$today';";
       $result=$con->query($sql5);
       $sql6="delete  from `spa` where date<'$today';";
       $result=$con->query($sql6);
       header("Location:admin1.php");
?>