<?php
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
            header("location:login1.php");
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
    if(isset($_POST['username'])){
        if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
        }
        $username=$_POST['username'];
        echo $username;
        $old_password=$_POST['old_password'];
        $new_password=$_POST['new_password'];
        $sql="SELECT password FROM registration WHERE user='$username'";
                $result=$con->query($sql);
                $row=$result->fetch_assoc();
            $pass=$row['password'];
            if($pass==$old_password){
                echo "Correct";
            }
            else{
                echo "incorrect";  
            }
        $con->close();
        
            } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>
<link rel="shortcut icon" type="x-icon" href="https://cdn-icons-png.flaticon.com/512/197/197722.png">
<link href="https://fonts.googleapis.com/css2?family=Rubik+Distressed&family=Sono&family=Ubuntu&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<script src="https://kit.fontawesome.com/39a9d14536.js" crossorigin="anonymous"></script>
<body>
    <style>
        *{
    margin:0;
    padding: 0;
    box-sizing: border-box;
    background-color:#6b9199;
    
}
.container h1{
    color:white;
    font-family: 'Trebuchet MS';
    text-align:center;
}
.container h1 span{
    color:#d9bc6b;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
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
.change{
    float:right;
    background:none;
    color:black;
}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  background:#cfd1c1;
}
::selection{
  color: #fff;
  background: #6F36FF;
}
.wrapper{
  position: absolute;
  top: 50%;
  left: 50%;
  max-width: 450px;
  width: 100%;
  background: #fff;
  border-radius: 10px;
  transform: translate(-50%, -50%);
  box-shadow: 10px 10px 15px rgba(0,0,0,0.06);
}
.wrapper header{
  font-size: 23px;
  font-weight: 500;
  padding: 17px 30px;
  border-bottom: 1px solid #ccc;
}
.wrapper header.active{
  cursor: move;
  user-select: none;
}
.wrapper .content{
  display: flex;
  padding: 30px 30px 40px 30px;
  align-items: center;
  flex-direction: column;
  justify-content: center;
}
.content .icon{
  height: 95px;
  width: 95px;
  border-radius: 50%;
  border: 5px solid #6F36FF;
  display: flex;
  align-items: center;
  justify-content: center;
}
.content .icon i{
  color: #6F36FF;
  font-size: 60px;
}
.content .title{
  margin: 15px 0;
  font-size: 29px;
  font-weight: 500;
}
.content p{
  font-size: 16px;
  text-align: center;
}
.btn{
    width:80px;
}
#change_pass{
    display:none;
}
    </style>
    <div class="container"> 
        <h1>Flat<span>Easy</span></h1>
        <br>
    <div class="wrapper" id="change_pass">
      <header>Change Password<a onclick="show(2)" href="#" class="change"><i class="fa-solid fa-xmark"></i></a></header>
      
     <form action="change_password.php"  method="post" html_class="content" autocomplete="off">
     <input type="hidden" id="username" name="username" value="<?php echo $username;?>">
     <input type="text" id="old_password" name="old_password" placeholder="Enter the old password" required>
     <input type="text" id="new_password" name="new_password" placeholder="Enter the new password" required>
     <button class="btn">Submit</button></form>
    </div>
        <a onclick="show(1)" href="#" class="change"><i class="fa-solid fa-lock"></i></a>
      <?php
      echo "<font color=\"#142e4f\" size=\"20\" font-weight=bold;>MY PROFILE</font>";
      echo "<table class='table'>";
        echo "<tr>";
         echo "<td>";
             echo "<b> FLOOR NUMBER : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['floor no'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
             echo "<b> FLAT NUMBER : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['flat_no'];
         echo "</td>";
         echo "</tr>";



         echo "<td>";
             echo "<b> USERNAME : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['username'];
         echo "</td>";

         echo "</tr>";

         echo "<tr>";
         echo "<td>";
             echo "<b> NAME : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['name'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
             echo "<b> BLOCK : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['block'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
             echo "<b> AGE : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['age'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
             echo "<b> NUMBER OF PEOPLE : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['n0 of people'];
         echo "</td>";
         echo "</tr>";


         echo "<tr>";
         echo "<td>";
             echo "<b> PROFESSION : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['profession'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
             echo "<b> COMPANY NAME : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['company name'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
             echo "<b> NATIVE : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['hometown'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
             echo "<b> PHONE NUMBER : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['phone no'];
         echo "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>";
             echo "<b> FLAT PURCHASE DATE : </b>";
         echo "</td>";

         echo "<td>";
              echo $row['date of purchase'];
         echo "</td>";
         echo "</tr>";


         echo "<tr>";
         echo "<td>";
             echo "<b> NUMBER OF ADULTS: </b>";
         echo "</td>";

         echo "<td>";
              echo $row['no of adults'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
             echo "<b> NUMBER OF KIDS: </b>";
         echo "</td>";

         echo "<td>";
              echo $row['no of kids'];
         echo "</td>";
         echo "</tr>";
         echo "</table>";
      ?>
    </div>
</body>
<script>
    const wrapper = document.querySelector(".wrapper"),
    header = wrapper.querySelector("header");
    function onDrag({movementX, movementY}){
      let getStyle = window.getComputedStyle(wrapper);
      let leftVal = parseInt(getStyle.left);
      let topVal = parseInt(getStyle.top);
      wrapper.style.left = `${leftVal + movementX}px`;
      wrapper.style.top = `${topVal + movementY}px`;
    }
    header.addEventListener("mousedown", ()=>{
      header.classList.add("active");
      header.addEventListener("mousemove", onDrag);
    });
    document.addEventListener("mouseup", ()=>{
      header.classList.remove("active");
      header.removeEventListener("mousemove", onDrag);
    });
    function show(a){ 
    if(a==1){
        document.getElementById("change_pass").style.display="block";
    }
    if(a==2){
        document.getElementById("change_pass").style.display="none";
    }
}
  </script>
</html>