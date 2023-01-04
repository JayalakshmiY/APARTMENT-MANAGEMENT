<?php
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=='GET'){
    $flat_no=$_GET["rn"];
     $sql1="UPDATE `resident_rent` SET `payment_status`='paid' WHERE `flat_no`='$flat_no';";
     if($con->query($sql1)==true){
        echo "<font color=\"#142e4f\" size=\"20\" font-weight=bold;>RENT PAID</font>";
    }
    else{
        echo "<font color=\"#142e4f\" size=\"20\" font-weight=bold;>RENT NOT PAID</font>";
    }
     $sql2="select `floor no` from `resident` WHERE `flat_no`='$flat_no';";
     $result1=$con->query($sql2);
     if(!$result1){
         die("Invalid query:".$con->error);
     }
     $row=$result1->fetch_assoc();
     $floorno=$row['floor no'];
    $sql="SELECT rent_amount FROM `rent` WHERE floor_no='$floorno';";
    $result=$con->query($sql);
    $row1=$result->fetch_assoc();
    $price= $row1['rent_amount'];
    $sql1="UPDATE `revenue` SET `rent`=$price+rent;";
    $result2=$con->query($sql1);
    }
    
?>