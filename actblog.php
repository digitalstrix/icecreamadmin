<?php
include("admin/connect.php");
include("admin/session.php");
$newid=$_GET['del_id'];

$sql="UPDATE blogs SET active='0' where id='$newid'";
if(mysqli_query($connect,$sql)){
    header('location: blogs.php');
}else{
    echo "Not Changed";
}


?>