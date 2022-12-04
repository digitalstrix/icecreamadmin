<?php
include ("admin/connect.php");
include ("admin/session.php");


$data_array =  array(
    "name" => $_POST['name']
);
    $make_call = callAPI1('POST', 'adduoms', $data_array,null);
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='addoums.php';
        </script>
        ";
    }
?>