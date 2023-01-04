<?php
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=='GET'){
       $user=$_GET["rn"];
       $sql="SELECT flat_no FROM `resident` WHERE username='$user';";
       $result=$con->query($sql);
       $row=$result->fetch_assoc();
       $flat_no=$row['flat_no'];
      $sql="SELECT payment_status FROM resident_rent WHERE flat_no=$flat_no";
       $result=$con->query($sql);
       $row1=$result->fetch_assoc();
       $payment=$row1['payment_status'];
       echo $payment;
       if($payment=='paid'){
        header("Location:paid.php?rn=$flat_no");
       }
       else if($payment=='unpaid'){
        header("Location:unpaid.php?rn=$flat_no");
       }
    }
    
?>