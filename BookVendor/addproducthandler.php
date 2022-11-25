<?php
include("admin/connect.php");
include("admin/session.php");
if(isset($_POST['update'])){
    
    $data_array =  array(
        "token" => $_SESSION['usertoken'],
        "name" => $_POST['name'],
        "category_id" => $_POST['category_id'],
        "description" => $_POST['description'],
        "price" => $_POST['price'],
        "is_new" => $_POST['is_new'],
     'image'=> curl_file_create( $_FILES['product_file']['tmp_name'], $_FILES['product_file']['type'], $_FILES['product_file']['name']),
    );
        $make_call = callAPI1('POST', 'addProduct', $data_array,$_SESSION['token']);
        $response = json_decode($make_call, true);
        if ($response['message']) {
            echo "<script>alert('".$response['message']."')
            window.location.href='productview.php';
            </script>
            ";
        }
    }
?>