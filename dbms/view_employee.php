<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
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
    .btn{
        color:white;
        background-color:blue;
    }
    .input_group{
float:right;
position:relative;
bottom:40px;
    }
</style>
<body style="margin:50px;">
<h2>EMPLOYEE DETAILS</h2>
<div class="input_group" id="get">
        <form method="post" autocomplete="off">
            <input type="text" name="input" id="live_search"    placeholder="Search">
            <button  class="btn" name="submit" type="submit" onclick="show(1)">search</button>
          </div>  </form>
          <table class="table">
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
    if(isset($_POST['submit'])){
    $input=$_POST['input'];
    $sql="select * from employee where `ename` like '{$input}%' OR `eno` like '{$input}%' OR `gender` like '{$input}%' OR `hiredate` like '{$input}%' OR `dnum` like '{$input}%';";
    $result=$connection->query($sql);
    if(!$result){
        die("Invalid query:".$connection->error);
    }
    while($row=$result->fetch_assoc()){
        echo " <tr>
        <td>".$row["eno"]."</td>
        <td>".$row["ename"]."</td>
        <td>".$row["dnum"]."</td>
        <td>".$row["salary"]."</td>
        <td>".$row["hiredate"]."</td>
        <td>".$row["gender"]."</td>
       </tr> ";
    }
}
    ?>
    </tbody>
    </table>
<br><br>
<div class="data">
    <div class="item">
        <h5>Number of Employees</h5>
   <?php
   $server="localhost";
   $user="root";
   $password="";
   $database="login";
   $connection=new mysqli($server,$user,$password,$database);
   if($connection->connect_error){
       die("connection failed:".$connection->connect_error);
   }
   $sql1="select count(*) from employee";
   $result1=$connection->query($sql1);
   if(!$result1){
       die("Invalid query:".$connection->error);
   }
   $row=$result1->fetch_assoc();
   $count=$row['count(*)'];
   echo '<h1>'.$count.'</h1>';
   ?>
   </div>
   <div class="item">
   <h5>Number of Males</h5>
   <?php
   $sql1="select count(*) from employee where gender='male'";
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
    <h5>Number of Females</h5>
    <?php
   $sql1="select count(*) from employee where gender='female'";
   $result1=$connection->query($sql1);
   if(!$result1){
       die("Invalid query:".$connection->error);
   }
   $row=$result1->fetch_assoc();
   $count=$row['count(*)'];
   echo '<h1>'.$count.'</h1>';
   ?>
    </div>
</div>
<br><br>
    <table class="table">
<thead>

        <tr>
        <th> Employee Number</th>
        <th> Employee Name</th>
        <th> Department Number</th>
        <th> Salary</th>
        <th> Hiredate</th>
        <th> Gender</th>
        </tr>
</thead>
<tbody>
    <?php
    $sql="select * from employee";
    $result=$connection->query($sql);
    if(!$result){
        die("Invalid query:".$connection->error);
    }
    while($row=$result->fetch_assoc()){
        echo " <tr>
        <td>".$row["eno"]."</td>
        <td>".$row["ename"]."</td>
        <td>".$row["dnum"]."</td>
        <td>".$row["salary"]."</td>
        <td>".$row["hiredate"]."</td>
        <td>".$row["gender"]."</td>
       </tr> ";
    }
    ?>
</tbody>
    </table>
</div>
</body>
</html>