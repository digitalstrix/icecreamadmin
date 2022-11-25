<?php
include ("admin/connect.php");
include ("admin/session.php");


$data_array =  array(
    "email" => $_POST['email'],
    "name" => $_POST['name'],
    "password" => $_POST['password'],
    "mobile" => $_POST['mobile'],
    "token" => $_SESSION['usertoken']
);
    $make_call = callAPI1('POST', 'updateUserAdmin', $data_array,$_SESSION['token']);
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='users.php';
        </script>
        ";
        
    }  

?>