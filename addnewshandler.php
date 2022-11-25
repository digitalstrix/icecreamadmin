<?php
include ("admin/connect.php");
include ("admin/session.php");


$data_array =  array(
    "token" => $_SESSION["usertoken"],
    "content" => $_POST['content'],
    "title" => $_POST['title'],
    "category_id" => $_POST['category_id'],
 'image'=> curl_file_create( $_FILES['image']['tmp_name'], $_FILES['image']['type'], $_FILES['image']['name'])
);
    $make_call = callAPI1('POST', 'addNews', $data_array,null);
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='news.php';
        </script>
        ";
        
    }  

?>