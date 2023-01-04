<?php
$insert=false;
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=='GET'){
    $flatno=$_GET["rn"];
        $sql="SELECT `floor no` FROM  resident where flat_no=$flatno";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        if(!$row){
           // header("location:update_resident.php");
            header("location:unpaid.php");
             exit;
        }
        $floorno=$row['floor no'];
        $sql="SELECT rent_amount FROM rent WHERE floor_no=$floorno";
        $result=$con->query($sql);
        $row1=$result->fetch_assoc();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="https://cdn-icons-png.flaticon.com/512/197/197722.png">
    <title>RENT</title>
    <style>
                h1{
    color:darkblue;
    font-family: 'Trebuchet MS';
    height:100px;
    font-size:68px;
}
h1 span{
    color:#d9bc6b;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
    
}
strong{
    margin:-24px 10px;
    padding:10px 10px;
    float:right;
    color: #2a678b;
    font-family:cursive;
}
.heading{
    font-size:38px;
    text-align:center;
    color:red;
    font-family:Arial;
   
}
body{
            background:linear-gradient(to bottom, #fefefe 0%, #d1d1d1 33%, #b0b0bc 66%, #e6e6e6 100%);
        }
        .price{
            color:black;
        font-family:  Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
         padding:10px 10px;
         font-size:50px;
        }
    </style>
</head>
<body>
    <h1>Flat<span>Easy</span></h1>
    <br>
    <div class="heading">
                  <h3>YOU HAVE NOT PAID YOUR RENT</h3>
     <p class="price">RENT   -  <?php echo $row1['rent_amount'];?></p>
        <a href="pay.php?rn=<?php echo $flatno;?>">PAY RENT</a>
     </div>
</body>
    
</html>