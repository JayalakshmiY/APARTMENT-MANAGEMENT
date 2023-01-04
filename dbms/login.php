<?php 
$user=$_POST['user'];
$password=$_POST['password'];
$con=new mysqli("localhost","root","","login");
if ($con->connect_error)
{
    die("Failed to connect: ".$con->connect_error);
}
else{
    $stmt=$con->prepare("select * from registration where user=?");
    $stmt->bind_param("s",$user);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows >0){
 $data=$stmt_result->fetch_assoc();
 if($data['password']===$password){
    echo "<h2>Login succesfull</h2>";
    header("Location:login1.php?rn='$user'");
 }
 else{
    echo "<h2>Invalid</h2>";
 }
    }
    else{
        echo "<h2>Invalid </h2>";
    }
}
?>
