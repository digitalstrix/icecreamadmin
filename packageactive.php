<?php
include("admin/connect.php");
include("admin/session.php");
$newid=$_GET['user_id'];

$sql="UPDATE packages SET active='1' where id='$newid'";
if(mysqli_query($connect,$sql)){
    header('location: packages.php');
}else{
    echo "Not Changed";
}


?>