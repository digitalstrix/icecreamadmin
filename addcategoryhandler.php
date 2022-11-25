<?php
include ("admin/connect.php");
include ("admin/session.php");


$data_array =  array(
    "token" => $_SESSION["usertoken"],
    "category_name" => $_POST['category']
);
    $make_call = callAPI1('POST', 'addNewsCategory', $data_array,null);
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='addnewscategory.php';
        </script>
        ";
        
    }  

?>