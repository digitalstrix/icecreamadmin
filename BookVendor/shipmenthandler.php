<?php 
include "admin/connect.php";
include "admin/session.php";
if (isset($_POST['update'])) {
    $data_array =  array(
    "token" => $_SESSION['usertoken'],
    "email" => $_SESSION['email'],
    "shipment_id" => $_POST['shipment_id'],
    "shipment_url" => $_POST['shipment_url'],
    "order_id" => $_POST['order_id'],
    "user_id" => $_POST['user_id'],
    "note" => $_POST['note'],
    "expected_delivery" => $_POST['estimated_delivery_date'],
);
    $make_call = callAPI('POST', 'vendorShipmentUpdate', json_encode($data_array), $_SESSION['token']);
    $response = json_decode($make_call, true);
    if ($response['status']==true) {
        echo '<script>alert("'.$response['message'].'")
        window.location.href="orders.php"
        </script>';
    }
    if ($response['shipment_id']) {
        echo '<script>alert("'.$response['shipment_id'][0].'")
        window.location.href="orders.php"
        </script>';
    }
    if ($response['shipment_url']) {
        echo '<script>alert("'.$response['shipment_url'][0].'")
        window.location.href="orders.php"
        </script>';
    }
}

?>