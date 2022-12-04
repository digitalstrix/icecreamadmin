<?php
include ("admin/connect.php");
include ("admin/session.php");


$data_array =  array(
    "name" => $_POST['name'],
    "mobile" => $_POST['mobile'],
    "password" => $_POST['password'],
    "profile" => $_POST['profile'],
    "company_id" => $_POST['company_id'],
    "desk_id" => $_POST['desk_id']
);
    $make_call = callAPI1('POST', 'registerMember', $data_array,null);
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='addmember.php';
        </script>
        ";
        
    }  

?>