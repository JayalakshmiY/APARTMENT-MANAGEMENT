<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
    $user=$_GET["rn"]; 
    header("Location:view_profile.php?rn='$user'");
}
?>