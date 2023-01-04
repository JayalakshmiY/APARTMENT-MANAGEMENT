<?php
$insert=false;
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=='GET'){
       $username=$_GET["rn"];
        $sql="SELECT * FROM resident WHERE username='$username'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        if(!$row){
            header("location:update_resident.php");
            exit;
        }
        $floorno=$row['floor no'];
        $flatno=$row['flat_no'];
        $block=$row['block'];
        $username=$row['username'];
        $name=$row['name'];
        $age=$row['age'];
        $no_of_people=$row['n0 of people'];
        $profession=$row['profession'];
        $company_name=$row['company name'];
        $hometown=$row['hometown'];
        $phone_no=$row['phone no'];
        $date_of_purchase=$row['date of purchase'];
        $no_of_adults=$row['no of adults'];
        $no_of_kids=$row['no of kids'];
    }
else{
        $insert=false;
if(isset($_POST['username'])){
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
//check for connection success
if(!$con){
die("connection to this database failed due to".mysqli_connect_error());
}
$floorno=$_POST['floorno'];
$flatno=$_POST['flatno'];
$flatno1=$_POST['flat'];
$block=$_POST['block'];
$username=$_POST['username'];
$name=$_POST['name'];
$age=$_POST['age'];
$no_of_people=$_POST['no_of_people'];
$profession=$_POST['profession'];
$company_name=$_POST['company_name'];
$hometown=$_POST['hometown'];
$phone_no=$_POST['phone_no'];
$date_of_purchase=$_POST['date_of_purchase'];
$no_of_adults=$_POST['no_of_adults'];
$no_of_kids=$_POST['no_of_kids'];
$sql="SELECT EXISTS (SELECT flat_no FROM resident WHERE flat_no=$flatno and $flatno1!=$flatno);";
    $result1=$con->query($sql);
    $row=$result1->fetch_assoc();
    $yes=$row["EXISTS (SELECT flat_no FROM resident WHERE flat_no=$flatno and $flatno1!=$flatno)"];
    if($yes==1){
        echo "l̥<font color=\"red\" size=\"20\" font-weight=bold;>This Flat is not available</font>";   
    }
    else{
$sql="UPDATE `resident` SET `floor no`='$floorno',`flat_no`='$flatno',`block`='$block',`username`='$username',`name`='$name',`age`='$age',`n0 of people`='$no_of_people',`profession`='$profession',`company name`='$company_name',`hometown`='$hometown', `phone no`='$phone_no', `date of purchase`='$date_of_purchase',`no of adults`='$no_of_adults',`no of kids`='$no_of_kids' WHERE username='$username'";
if($con->query($sql)==true){
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();

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
        <p>Update details of the Resident</p>
        <?php
        if ($insert==true){
        echo "<p class='pop'>Successfully Updated</p>";
        }
        ?>
        <form action="edit_resident.php" method="post">
            <!-- <form action="https://en.wikipedia.org/wiki/Singapore" method="GET" target="blank"> -->
            <input type="number" id="floorno" name="floorno" min="1" max="8" placeholder="Floor Number" value="<?php echo $floorno;?>">
            <input type="text" name="flatno" id="flatno" placeholder="Flat Number" value="<?php echo $flatno;?>">
            <input type="hidden" name="flat" id="flat" placeholder="Flat Number" value="<?php echo $flatno;?>">
            <input type="text" name="block" id="block" placeholder="Block" value="<?php echo $block;?>">
            <input type="hidden" name="username" id="username" placeholder="Username" value="<?php echo $username;?>">
            <input type="text" name="name" id="name" placeholder="Name"value="<?php echo $name;?>">
            <input type="number" id="age" name="age" min="1" max="120" placeholder="Age" value="<?php echo $age;?>">
            <input type="number" id="no_of_people" name="no_of_people" min="1" max="20" placeholder="Number of People" value="<?php echo $no_of_people;?>">
            <input type="text" name="profession" id="profession" placeholder="Profession" value="<?php echo $profession;?>">
            <input type="text" name="company_name" id="company_name" placeholder="Company name" value="<?php echo $company_name;?>">  
            <input type="text" name="hometown" id="hometown" placeholder="Hometown" value="<?php echo $hometown;?>">
            <input type="text" name="phone_no" id="phone_no" placeholder="Phone number" value="<?php echo $phone_no;?>">
            <input type="date" name="date_of_purchase" id="date_of_purchase" value="<?php echo $date_of_purchase;?>">
            <input type="number" id="no_of_adults" name="no_of_adults" min="1" max="8" placeholder="Adults" value="<?php echo $no_of_adults;?>">
            <input type="number" id="no_of_kids" name="no_of_kids" min="1" max="8" placeholder="kids" value="<?php echo $no_of_kids;?>">
            <button class="btn">Submit</button>
        </form>
    </div>
    <p class="back"><a href="view_resident.php">view</a></p>
</body>
</html>