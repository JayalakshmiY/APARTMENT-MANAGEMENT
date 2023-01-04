<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department</title>
    <!-- CSS only -->
    <link rel="shortcut icon" type="x-icon" href="https://cdn-icons-png.flaticon.com/512/197/197722.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    .data{
        display:flex;
    }
    .item{
        width:14rem;
        height:7rem;
        border: 3px solid #d8cd58;
        box-shadow: 9px 10px 21px #352e00;
    }
</style>
<body style="margin:50px;">
<h2>DEPARTMENT DETAILS</h2>
<br><br>
<div class="data">
    <div class="item">
        <h5>Number of Departments</h5>
   <?php
       $server="localhost";
       $user="root";
       $password="";
       $database="login";
       $connection=new mysqli($server,$user,$password,$database);
       if($connection->connect_error){
           die("connection failed:".$connection->connect_error);
       }
   $sql1="select count(*) from department";
   $result1=$connection->query($sql1);
   if(!$result1){
       die("Invalid query:".$connection->error);
   }
   $row=$result1->fetch_assoc();
   $count=$row['count(*)'];;
   echo '<h1>'.$count.'</h1>';
   ?>
   </div>
</div>  
<br><br>
    <table class="table">
<thead>

        <tr>
        <th> Department Number</th>
        <th> Department Name</th>
        <th> Block</th>
        </tr>
</thead>
<tbody>
<?php
$sql="select * from department ;";
    $result=$connection->query($sql);
    if(!$result){
        die("Invalid query:".$connection->error);
    }
    while($row=$result->fetch_assoc()){
        echo " <tr>
        <td>".$row["dnum"]."</td>
        <td>".$row["dname"]."</td>
        <td>".$row["block"]."</td>
       </tr> ";
    }
    ?> 
</tbody>

    </table>
 
</body>
</html>