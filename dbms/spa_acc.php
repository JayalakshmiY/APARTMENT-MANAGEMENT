<?php
$insert=false;
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=='GET'){
        $flat_no=$_GET["rn"];
    }
else{
        $insert=false;
if(isset($_POST['flat_no'])){
    $flat_no=$_POST["flat_no"];   
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
//check for connection success
if(!$con){
die("connection to this database failed due to".mysqli_connect_error());
}
$date=$_POST['date'];
$time=$_POST['time'];
$sql="SELECT EXISTS (SELECT time FROM spa WHERE time='$time' and date='$date');";
    $result1=$con->query($sql);
    $row=$result1->fetch_assoc();
    $yes=$row["EXISTS (SELECT time FROM spa WHERE time='$time' and date='$date')"];
    if($yes==1){
        echo "l̥<font color=\"red\" size=\"20\" font-weight=bold;>This slot is not available,choose other time</font>";   
    }
    else{
        // echo "l̥<font color=\"#142e4f\" size=\"20\" font-weight=bold;>Functional hall is booked in this date.Please use other date</font>";   
$sql="INSERT INTO  `login`.`spa` (`flat_no`, `date`,`time`) VALUES ('$flat_no','$date','$time');";
if($con->query($sql)==true){
    $insert=true;
}
$sql="SELECT price FROM `facilities` WHERE department='spa';";
     $result=$con->query($sql);
     $row1=$result->fetch_assoc();
     $price= $row1['price'];
    
    $sql1="UPDATE `revenue` SET `spa`=$price+spa;"; 
    $result=$con->query($sql1);  
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<link rel="shortcut icon" type="x-icon" href="https://cdn-icons-png.flaticon.com/512/197/197722.png">
<link href="https://fonts.googleapis.com/css2?family=Rubik+Distressed&family=Sono&family=Ubuntu&display=swap" rel="stylesheet">
<body>
    <style>
        *{
    margin:0;
    padding: 0;
    box-sizing: border-box;
    background-color:black;
    
}
.container{
    padding: 10px 20px;
    max-width: 50%;
    margin:auto;
   
}
.container h2{
    text-align: center;
    font-family: 'Sono', sans-serif;
    font-size: 25px;
    color:white;
}
.container p{
    text-align: center;
    font-size: 18px;
    color:white;
}
.pop{
    color: black;
    background-color:rgb(201, 236, 215) ;
    font-family: cursive;
    background-color:rgb(2 119 49);
}


input,button,select{
    /* display:block; */
    width:50%;
    padding: 5px;
    border-radius: 5px;
    border: 1.59px solid black;
    margin:10px 10px;
    background-color:white;

}
form{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color:white;
}
.btn{
    color: white;
    background-color: rgb(56, 56, 205);
    cursor: pointer;
    border-radius: 15px;
}
.btn:hover
{
 color: black;
 box-shadow: 5px 5px 2px 1px rgba(27, 9, 97, 0.2);
}
h1{
    color:white;
    font-family: 'Trebuchet MS';
    text-align:center;
}
h1 span{
    color:#d9bc6b;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
}
    </style>
    <div class="container">
    <h1>Flat<span>Easy</span></h1>
        <br>
        <p>Choose the date and time</p>
        <?php
        if ($insert==true){
        echo "<p class='pop'>Access Granted</p>";
        }
        ?>
        <form action="spa_acc.php" method="post">
            <!-- <form action="https://en.wikipedia.org/wiki/Singapore" method="GET" target="blank"> -->
            <input type="hidden" id="flat_no" name="flat_no" value="<?php echo $flat_no;?>">
            <input type="date" name="date" id="date">
            <input type="number" name="time" id="time" min="8" max="20" placeholder="Railways time">
            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>