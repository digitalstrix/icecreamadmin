<?php
include("admin/connect.php");
include("admin/session.php");
$newid=$_GET['user_id'];

$sql="UPDATE users SET current_status='1' where id='$newid'";
if(mysqli_query($connect,$sql)){
    header('location: subcriptions.php');
}else{
    echo "Not Changed";
}


?>