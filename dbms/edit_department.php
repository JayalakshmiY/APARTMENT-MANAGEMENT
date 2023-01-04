<?php
$insert=false;
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=='GET'){
       $dnum=$_GET["rn"];
        $sql="SELECT * FROM department WHERE dnum=$dnum";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        if(!$row){
            header("location:update_department.php");
            exit;
        }
        $dnum=$row['dnum'];
        $dname=$row['dname'];
        $block=$row['block'];
    
    }
else{
        $insert=false;
if(isset($_POST['dnum'])){
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
//check for connection success
if(!$con){
die("connection to this database failed due to".mysqli_connect_error());
}
$dnum=$_POST['dnum'];
$dname=$_POST['dname'];
$block=$_POST['block'];
$sql="UPDATE `department` SET `dnum`='$dnum', `dname`='$dname', `block`='$block' WHERE dnum=$dnum";
if($con->query($sql)==true){
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();

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
.back ,a{
    font-size:18px;
    background-color:#69ad98;
    width:50px;
    height:22px;
    margin:auto;
    text-align: center;
    cursor: pointer;
    text-decoration:none;  
}
.back a:hover{
color:white;
}
    </style>
    <div class="container">
        <h2>FlatEasy</h2>
        <br>
        <p>Update details of the Department</p>
        <?php
        if ($insert==true){
        echo "<p class='pop'>Successfully Updated</p>";
        }
        ?>
        <form action="edit_department.php" method="post">
            <input type="text" name="dnum" id="dnum" placeholder="Department number" value="<?php echo $dnum;?>">
            <input type="text" name="dname" id="dname" placeholder="Department Name" value="<?php echo $dname;?>">
            <input type="text" name="block" id="block" placeholder="Block" value="<?php echo $block;?>">
            <button class="btn">Submit</button>
        </form>
    </div>
    <p class="back"><a href="view_department.php">view</a></p>
</body>
</html>