<?php
       $server="localhost";
       $username="root";
       $password="";
       $database="login";
       $con=mysqli_connect($server,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=='GET'){
    $username=$_GET["rn"]; 
    $sql="SELECT * FROM resident WHERE username='$username'";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
    if(!$row){
        header("location:user_Spa.php");
        exit;
    }
    $flatno=$row['flat_no'];
     $sql="SELECT flat_no
     FROM resident
     WHERE EXISTS (SELECT flat_no FROM spa WHERE flat_no=$flatno);";
    $result1=$con->query($sql);
    $row=$result1->fetch_assoc();
    if($row){
        header("Location:user_pspa.php?rn=$flatno");
    }
    else{
        header("Location:user_aspa.php?rn=$flatno");
    }
}
?>