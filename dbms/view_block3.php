<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident</title>
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
<h2>RESIDENT DETAILS BLOCK-C</h2>
<br><br>
<div class="data">
    <div class="item">
        <h5>Number of Residents-Block D</h5>
   <?php
       $server="localhost";
       $user="root";
       $password="";
       $database="login";
       $connection=new mysqli($server,$user,$password,$database);
       if($connection->connect_error){
           die("connection failed:".$connection->connect_error);
       }
   $sql1="select count(*) from resident where block='C'";
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
        <th>Floor Number</th>
        <th>Flat Number</th>
        <th> Block</th>
        <th> Username</th>
        <th>Name</th>
        <th> Age</th>
        <th> Number of people</th>
        <th> Profession</th>
        <th> Company Name</th>
        <th> Hometown</th>
        <th> Phone Number</th>
        <th>Date of Purchase</th>
        <th> Number of adults</th>
        <th>Number of kids<th>
        </tr>
</thead>
<tbody>
    <?php
    $server="localhost";
    $user="root";
    $password="";
    $database="login";
    $connection=new mysqli($server,$user,$password,$database);
    if($connection->connect_error){
        die("connection failed:".$connection->connect_error);
    }
    $sql="select * from resident where block='C'";
    $result=$connection->query($sql);
    if(!$result){
        die("Invalid query:".$connection->error);
    }
    while($row=$result->fetch_assoc()){
        echo " <tr>
        <td>".$row["floor no"]."</td>
        <td>".$row["flat no"]."</td>
        <td>".$row["block"]."</td>
        <td>".$row["username"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["age"]."</td>
        <td>".$row["n0 of people"]."</td>
        <td>".$row["profession"]."</td>
        <td>".$row["company name"]."</td>
        <td>".$row["hometown"]."</td>
        <td>".$row["phone no"]."</td>
        <td>".$row["date of purchase"]."</td>
        <td>".$row["no of adults"]."</td>
        <td>".$row["no of kids"]."</td>
       </tr> ";
    }
    ?>
</tbody>

    </table>
    
</body>
</html>