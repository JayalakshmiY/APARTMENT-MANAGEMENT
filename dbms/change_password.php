<?php
$insert=false;
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if(isset($_POST['username'])){
if(!$con){
die("connection to this database failed due to".mysqli_connect_error());
}
$username=$_POST['username'];
$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$sql="SELECT password FROM registration WHERE user='$username'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
    $pass=$row['password'];
    if($pass==$old_password){
        $sql="update `registration` set password='$new_password' where user='$username';";
        $result=$con->query($sql);
        ?>
        <html>
  <head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <script>
     swal({
    title: "SUCCESS",
    text: "Password Successfully Changed",
    type: "success"
}).then(function() {
    window.location = "view_profile.php?rn=<?php echo $username;?>";
});
    </script>
  </body>
</html>
        <?php
    }
    else{
        ?>
        <html>
  <head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <script>
     swal({
    title: "Failed",
    text: "Invalid Password",
    type: "failed"
}).then(function() {
    window.location = "view_profile.php?rn=<?php echo $username;?>";
});
    </script>
  </body>
</html>
        <?php
    }
$con->close();

    }    
?>
