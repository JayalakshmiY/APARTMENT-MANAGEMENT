<?php
$insert=false;
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=='GET'){
       $flat_no=$_GET["rn"];
       $sql="SELECT price FROM `facilities` WHERE department='gym';";
       $result=$con->query($sql);
       $row=$result->fetch_assoc();
       if(!$row){
          // header("location:update_resident.php");
           header("location:user_Gym.php");
            exit;
       }
       $sql="SELECT name FROM resident WHERE flat_no=$flat_no";
       $result=$con->query($sql);
       $row1=$result->fetch_assoc();
       $sql="SELECT duration FROM `facilities` WHERE department='gym';";
       $result=$con->query($sql);
       $row2=$result->fetch_assoc();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="https://cdn-icons-png.flaticon.com/512/197/197722.png">
    <title>GYM</title>
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
    <h1>Flat<span>Easy</span><strong><?php echo ($row1['name']);?></strong></h1>
    <br>
    <div class="heading">
    YOU HAVE NO ACCESS TO GYM    <br>   
   CLICK ON THE BELOW LINK TO HAVE ACCESS
   <p class="price">PRICE   -  <?php echo $row['price'];?></p>
   <p class="price">DURATION   -  <?php echo $row2['duration'];?></p>
        <a href="gym_acc.php?rn=<?php echo $flat_no;?>" class="btn">GYM ACCESS</a>
     </div>
</body>
</html>