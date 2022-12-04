<?php
include("admin/connect.php");
include("admin/session.php");
$newid=$_GET['del_id'];

$sql="DELETE from uoms where id='$newid'";
if(mysqli_query($connect,$sql)){
    header('location: uoms.php');
}else{
    echo "Not Delete";
}


?>