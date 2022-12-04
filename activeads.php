<?php
include("admin/connect.php");
include("admin/session.php");
$newid=$_GET['ad_id'];

$sql="UPDATE advertisement SET is_approved='1' where id='$newid'";
if(mysqli_query($connect,$sql)){
    header('location: advertisement.php');
}else{
    echo "Not Changed";
}
?>