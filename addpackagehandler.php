<?php
include ("admin/connect.php");
include ("admin/session.php");


$data_array =  array(
    "package_name" => $_POST['package_name'],
    "price" => $_POST['price'],
    "validity" => $_POST['validity'],
    "start_date" => $_POST['start_date'],
    "end_date" => $_POST['end_date'],
);
    $make_call = callAPI1('POST', 'addpackage', $data_array,null);
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='addpackage.php';
        </script>
        ";
        
    }  

?>