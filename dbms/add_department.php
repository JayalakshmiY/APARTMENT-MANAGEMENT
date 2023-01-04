<?php
 $insert=false;
 //set connection variables
if(isset($_POST['dname'])){
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
$dnum=$_POST['dnum'];
$dname=$_POST['dname'];
$block=$_POST['block'];
$sql="SELECT EXISTS (SELECT dnum FROM department WHERE dnum=$dnum);";
    $result1=$con->query($sql);
    $row=$result1->fetch_assoc();
    $yes=$row["EXISTS (SELECT dnum FROM department WHERE dnum=$dnum)"];
    if($yes==1){
        echo "l̥<font color=\"red\" size=\"20\" font-weight=bold;>Department number already in use </font>";   
    }
    else{
$sql="INSERT INTO  `login`.`department` (`dnum`,`dname`,`block`) VALUES ('$dnum','$dname','$block');";
// execute the query
if($con->query($sql)==true){
    // echo "successfully inserted";
    //flag for succesful connection
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
// close the database connection
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
        <p>Enter your details of the Employe</p>
        <?php
        if ($insert==true){
        echo "<p class='pop'>Successfully Entered</p>";
        }
        ?>
        <form action="add_department.php" method="post">
            <input type="text" name="dnum" id="dnum" placeholder="Department number" required>
            <input type="text" name="dname" id="dname" placeholder="Department Name" required>
            <select name="block" id="block" required>
               <option  value="none" disabled selected hidden>Block</option>
              <option value="A" style="color:white;">A</option>
               <option value="B" style="color:white;">B</option>
               <option value="C"style="color:white;">C</option>
               <option value="D"style="color:white;">D</option>
               <option value="E"style="color:white;">E</option>
            </select>
            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>