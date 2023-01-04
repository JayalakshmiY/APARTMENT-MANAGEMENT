<?php
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=='GET'){
       $num=$_GET["rn"];
       if($num==1){
        $sql="UPDATE `revenue` SET `dance`=0;";
        $result=$con->query($sql);
        if($con->query($sql)==true){
           header("Location:acc_dance.php");
       }
       }
       else if($num==2){
        $sql="UPDATE `revenue` SET `functional_hall`=0;";
        $result=$con->query($sql);
        if($con->query($sql)==true){
           header("Location:acc_functionalhall.php");
       }
       }
       else if($num==3){
        $sql="UPDATE `revenue` SET `gym`=0;";
        $result=$con->query($sql);
        if($con->query($sql)==true){
           header("Location:acc_gym.php");
       }
       }
       else if($num==4){
        $sql="UPDATE `revenue` SET `parking`=0;";
        $result=$con->query($sql);
        if($con->query($sql)==true){
           header("Location:acc_parking.php");
       }
       }
       else if($num==5){
        $sql="UPDATE `revenue` SET `spa`=0;";
        $result=$con->query($sql);
        if($con->query($sql)==true){
           header("Location:acc_spa.php");
       }
       }
       else if($num==6){
        $sql="UPDATE `revenue` SET `yoga`=0;";
        $result=$con->query($sql);
        if($con->query($sql)==true){
           header("Location:acc_yoga.php");
       }
       }
       else if($num==7){
        $sql="UPDATE `revenue` SET `rent`=0;";
        $result=$con->query($sql);
        if($con->query($sql)==true){
           header("Location:view_resident_rent.php");
       }
       }

    }
    
?>