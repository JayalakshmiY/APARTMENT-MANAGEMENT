<?php
 $insert=false;
 //set connection variables
if(isset($_POST['name'])){
$server="localhost";
$username="root";
$password="";
$database="login";
// create a connection
$con=mysqli_connect($server,$username,$password,$database);
//check for connection success
if(!$con){
die("connection to this database failed due to".mysqli_connect_error());
}
else{
    // echo "Success connecting to database";
}
//collect post variables
$floorno=$_POST['floorno'];
$flatno=$_POST['flatno'];
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
$password=$_POST['password'];
$sql="SELECT EXISTS (SELECT flat_no FROM resident WHERE flat_no=$flatno);";
    $result1=$con->query($sql);
    $row=$result1->fetch_assoc();
    $yes=$row["EXISTS (SELECT flat_no FROM resident WHERE flat_no=$flatno)"];
    if($yes==1){
        echo "l̥<font color=\"red\" size=\"20\" font-weight=bold;>This Flat is not available</font>";   
    }
    else{
$sql="INSERT INTO  `login`.`resident` (`floor no`, `flat_no`,`block`, `username`, `name`, `age`,`n0 of people`,`profession`,`company name`,`hometown`,`phone no`,`date of purchase`,`no of adults`,`no of kids`) VALUES ('$floorno','$flatno','$block','$username','$name','$age','$no_of_people','$profession','$company_name','$hometown','$phone_no','$date_of_purchase','$no_of_adults','$no_of_kids');";
$result1=$con->query($sql);
$sql="SELECT EXISTS (SELECT user FROM registration WHERE user='$username');";
    $result1=$con->query($sql);
    $row=$result1->fetch_assoc();
    $yes=$row["EXISTS (SELECT user FROM registration WHERE user='$username')"];
    if($yes==1){
        echo "l̥<font color=\"red\" size=\"20\" font-weight=bold;>username already exit</font>";   
    }
    else{
        
$sql1="INSERT INTO  `login`.`registration` (`user`, `password`) VALUES ('$username','$password');";
$sql2="INSERT INTO  `login`.`resident_rent` (`floor_no`, `flat_no`,`payment_status`) VALUES ('$floorno','$flatno','paid');";
// execute the query
if($con->query($sql1)==true){
    $insert=true;
}
if($con->query($sql2)==true){
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
// close the database connection
$con->close();
}
}}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Rubik+Distressed&family=Sono&family=Ubuntu&display=swap" rel="stylesheet">
<link rel="shortcut icon" type="x-icon" href="https://cdn-icons-png.flaticon.com/512/197/197722.png">
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
        <p>Enter your details of the Resident</p>
        <?php

        if ($insert==true){
        echo "<p class='pop'>Successfully Entered</p>";
        }
        ?>
        <form action="add_resident.php" method="post">
            <!-- <form action="https://en.wikipedia.org/wiki/Singapore" method="GET" target="blank"> -->
            <input type="number" id="floorno" name="floorno" min="1" max="10" placeholder="Floor Number" required>
            <input type="number" name="flatno" id="flatno" placeholder="Flat Number" min="100" max="1000" required>
            <select name="block" id="block" reqflatnod>
               <option  value="none" disabled selected hidden>Block</option>
              <option value="A" style="color:white;">A</option>
               <option value="B" style="color:white;">B</option>
               <option value="C"style="color:white;">C</option>
               <option value="D"style="color:white;">D</option>
            </select>
            <input type="text" name="username" id="username" placeholder="Username" required>
            <input type="text" name="name" id="name" placeholder="Name" required>
            <input type="number" id="age" name="age" min="1" max="120" placeholder="Age" required>
            <input type="number" id="no_of_people" name="no_of_people" min="1" max="20" placeholder="Number of People" required>
            <input type="text" name="profession" id="profession" placeholder="Profession" required>
            <input type="text" name="company_name" id="company_name" placeholder="Company name" required>
            <input type="text" name="hometown" id="hometown" placeholder="Hometown" required>
            <input type="text" name="phone_no" id="phone_no" placeholder="Phone number" required>
            <input type="date" name="date_of_purchase" id="date_of_purchase" required>
            <input type="number" id="no_of_adults" name="no_of_adults" min="1" max="8" placeholder="Adults" required>
            <input type="number" id="no_of_kids" name="no_of_kids" min="1" max="8" placeholder="kids" required>
            <input type="text" name="password" id="password" placeholder="password" required>
            <button class="btn">Submit</button>
        </form>
        
    </div>
</body>
</html>