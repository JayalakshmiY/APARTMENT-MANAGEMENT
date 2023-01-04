<?php
 $server="localhost";
 $user="root";
 $password="";
 $database="login";
 $con=new mysqli($server,$user,$password,$database);
 if($_SERVER['REQUEST_METHOD']=='GET'){
    $user=$_GET["rn"];
    $sql2="select flat_no from resident where username='$user'";
    $result2=mysqli_query($con,$sql2);
    $row1=$result2->fetch_assoc();
    $flatno= $row1['flat_no'];
    $sql="delete from resident where username='$user'";
    $result=mysqli_query($con,$sql);
    $sql1="delete from registration where user='$user'";
    $result1=mysqli_query($con,$sql1);
    $sql3="delete from resident_rent where flat_no=$flatno";
    $result3=mysqli_query($con,$sql3);
    if($result3){
        header('location:view_resident.php');
    }  
    if(!$result3){
        die("Invalid query:".$con->error);
    }
}
?>