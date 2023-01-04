<?php
 $server="localhost";
 $user="root";
 $password="";
 $database="login";
 $con=new mysqli($server,$user,$password,$database);
 if($_SERVER['REQUEST_METHOD']=='GET'){
    $eno=$_GET["rn"];
    $sql="delete from employee where eno=$eno";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:view_employee.php');
    }
else{
    die(mysqli_error($con));
}
}
?>