<?php
$admin=$_POST['admin'];
if($admin==="iamanadmin"){ 
    echo "login successfull"; 
    header("Location:admin1.php"); //to link to next page
}
else{
    echo "login unsuccessfull";
}
?>

