<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESIDENT RENT</title>
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
    .check{
        float:right;
        color:blue;
    }
    a:hover{
    color:red;
} 
</style>
<body style="margin:50px;">
<h2>RESIDENT RENT DETAILS</h2>
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
    $sql="select name,`floor_no`,flat_no,payment_status from resident join resident_rent using(flat_no) where `flat_no` like '{$input}%' OR `name` like '{$input}%' OR `payment_status` like '{$input}%';";
    $result=$connection->query($sql);
    if(!$result){
        die("Invalid query:".$connection->error);
    }
    while($row=$result->fetch_assoc()){
        echo " <tr>
        <td>".$row["name"]."</td>
        <td>".$row["floor_no"]."</td>
        <td>".$row["flat_no"]."</td>
        <td>".$row["payment_status"]."</td>
       </tr> ";
    }
}
    ?>
    </tbody>
    </table>
<br><br>
<div class="data">
    <div class="item">
        <h5>Number of Flats In Use</h5>
   <?php
   $server="localhost";
   $user="root";
   $password="";
   $database="login";
   $connection=new mysqli($server,$user,$password,$database);
   if($connection->connect_error){
       die("connection failed:".$connection->connect_error);
   }
   $sql1="select count(*) from resident_rent";
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
   <h5>Number of flats which have paid rent</h5>
   <?php
   $sql1="select count(*) from resident_rent where payment_status='paid'";
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
    <h5>Number of flats which have due rent</h5>
    <?php
   $sql1="select count(*) from resident_rent where payment_status='unpaid'";
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
        <h5>Revenue</h5>
   <?php
   $sql1="select * from revenue";
   $result1=$connection->query($sql1);
   if(!$result1){
       die("Invalid query:".$connection->error);
   }
   $row=$result1->fetch_assoc();
   $par=$row['rent'];;
   echo '<h1>'.$par.'</h1>';
   ?>
   </div>

</div>
<br><br>
    <table class="table">
<thead>

        <tr>
        <th> Name</th>
        <th> Floor Number</th>
        <th> Flat Number</th>
        <th> Payment Status</th>
        </tr>
</thead>
<tbody>
    <?php
    // $sql="select * from resident_rent";
    $sql="SELECT name,`floor no`,flat_no,payment_status from resident join resident_rent using(flat_no)";
    $result=$connection->query($sql);
    if(!$result){
        die("Invalid query:".$connection->error);
    }
    
    while($row=$result->fetch_assoc()){
        // $sql1="SELECT `rent_amount` from `rent` where floor_no=$row['floor no'];";
        // $result=$connection->query($sql1);
        // $row1=$result->fetch_assoc();
        echo " <tr>
        <td>".$row["name"]."</td>
        <td>".$row["floor no"]."</td>
        <td>".$row["flat_no"]."</td>
        <td>".$row["payment_status"]."</td>
        
       </tr> ";
    }
    ?>
</tbody>

    </table>
    <div class="reset">
    <a href="reset.php?rn=<?php echo 7;?>">Reset Revenue</a>
    <a href="make_unpaid.php" class="check">make unpaid</a>
   </div> 
</body>
</html>