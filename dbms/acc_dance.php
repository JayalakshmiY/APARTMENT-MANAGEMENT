<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dance</title>
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
        padding:1px 20px;
    }
</style>
<body style="margin:50px;">
<h2>DANCE DETAILS</h2>
<br><br>
<div class="data">
    <div class="item">
        <h5>Total Participants</h5>
   <?php
       $server="localhost";
       $user="root";
       $password="";
       $database="login";
       $connection=new mysqli($server,$user,$password,$database);
       if($connection->connect_error){
           die("connection failed:".$connection->connect_error);
       }
   $sql1="select count(*) from dance";
   $result1=$connection->query($sql1);
   if(!$result1){
       die("Invalid query:".$connection->error);
   }
   $row=$result1->fetch_assoc();
   $count=$row['count(*)'];;
   echo '<h1>'.$count.'</h1>';
   ?>
   </div>
   <div class="item">
        <h5>Revenue</h5>
   <?php
   $sql1="select * from revenue";
   $result1=$connection->query($sql1);
   if(!$result1){
       die("Invalid query:".$connection->error);
   }
   $row=$result1->fetch_assoc();
   $par=$row['dance'];;
   echo '<h1>'.$par.'</h1>';
   ?>
   </div>
</div>
<br><br>
    <table class="table">
<thead>

        <tr>
        <th> Name</th>
        <th> Flat No</th>
        <th> start date</th>
        <th> end date </th>
        </tr>
</thead>
<tbody>
    <?php
    $sql="SELECT name,flat_no,start_date,end_date from resident join dance using(flat_no)";
    $result=$connection->query($sql);
    if(!$result){
        die("Invalid query:".$connection->error);
    }
    while($row=$result->fetch_assoc()){
        echo " <tr>
        <td>".$row["name"]."</td>
        <td>".$row["flat_no"]."</td>
        <td>".$row["start_date"]."</td>
        <td>".$row["end_date"]."</td>
       </tr> ";
    }
    ?>
</tbody>

    </table>
   <div class="reset">
    <a href="reset.php?rn=<?php echo 1;?>">Reset Revenue</a>
   </div> 
</body>
</html>