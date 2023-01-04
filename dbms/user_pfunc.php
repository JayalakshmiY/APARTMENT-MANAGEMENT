<?php
$insert=false;
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=='GET'){
    // $flatno=$row[flat_no];
       $flat_no=$_GET["rn"];
        $sql="SELECT date FROM function_hall WHERE flat_no=$flat_no";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        if(!$row){
           // header("location:update_resident.php");
            header("location:user_Function.php");
             exit;
        }
        $sql="SELECT name FROM resident WHERE flat_no=$flat_no";
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
    <title>Functional hall</title>
    <style>
        body{
            background:linear-gradient(to bottom, #fefefe 0%, #d1d1d1 33%, #7a7a99 66%, #e6e6e6 100%);
        }
    .flat{
    color:darkblue;
    font-family: 'Trebuchet MS';
    font-size:64px;
}
strong{
    margin:-24px 10px;
    padding:10px 10px;
    float:right;
    color: #2a678b;
    font-family:cursive;
}
.flat span{
    color:#d9bc6b;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
}
.design{
    display:flex;
    font-size:20px;
    padding:33px;
}
.head{
    display:flex;
    font-size:39px;
    padding: 10px 32px;
    width: 204px;
}
.items{
    font-weight: bold;
    font-size: 39px;
    color: #7c2b71;
    padding: 23px 10px;
    margin: 37px 11px;
}
.name{
    font-size:40px;
    color:#801900;
    font-weight:bold;
    text-align:center; 
    border:3px solid black;
}
    </style>
</head>
<body>
    <h class="flat">Flat<span>Easy</span><strong><?php echo ($row1['name']);?></strong></h>
    <P class="name">FUNCTIONAL HALL FACILITY</P>
    <p id="greet"></p>
      <div class="design">
        <p class="head">DATE</p>
       <p class="items"><?php echo date("d", strtotime($row['date']));?></p>
       <p class="items"><?php echo date("F", strtotime($row['date']));?></p>
       <p class="items"><?php echo date("l", strtotime($row['date']));?></p>
       <p class="items"><?php echo date("Y", strtotime($row['date']));?></p>
      </div>
    </body>
</html>

