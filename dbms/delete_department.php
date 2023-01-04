<?php
 $server="localhost";
 $user="root";
 $password="";
 $database="login";
 $con=new mysqli($server,$user,$password,$database);
 if($_SERVER['REQUEST_METHOD']=='GET'){
    $dnum=$_GET["rn"];
    $sql="delete from department where dnum=$dnum";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:view_department.php');
    }
else{
    die(mysqli_error($con));
}
}
?>