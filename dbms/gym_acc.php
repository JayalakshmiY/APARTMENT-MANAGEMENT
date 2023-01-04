<?php
$insert=false;
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=='GET'){
    $flat_no=$_GET["rn"];
    date_default_timezone_set("Asia/Kolkata");
    $today=date('Y-m-d');
    $expire= date('Y-m-d', strtotime($today. ' + 30 days'));
    $sql="INSERT INTO `gym` (`flat_no`, `start_date`,`end_date`) VALUES ('$flat_no', '$today','$expire');";
     $result=$con->query($sql);
     $sql="SELECT price FROM `facilities` WHERE department='gym';";
     $result=$con->query($sql);
     $row1=$result->fetch_assoc();
     $price= $row1['price'];
     $sql1="UPDATE `revenue` SET `gym`=$price+gym;";
     if($con->query($sql1)==true){
        echo "<font color=\"#142e4f\" size=\"20\" font-weight=bold;>ACCESS GRANTED</font>";
    }
    else{
        echo "<font color=\"#142e4f\" size=\"20\" font-weight=bold;>ACCESS DENIED</font>";
    }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="https://cdn-icons-png.flaticon.com/512/197/197722.png">
    <title>Gym</title>
    <style>
         h1{
    color:darkblue;
    font-family: 'Trebuchet MS';
}
h1 span{
    color:#d9bc6b;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
}
.heading{
    font-size:38px;
    text-align: center;
    color:red;
    font-family:Arial;
   
}
.btn{
    font size:100px;
    width:200px;
    padding:200px;
}

    </style>
</head>
<body>
    <div class="heading">
     </div>
</body>
</html>