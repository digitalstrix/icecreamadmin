<?php 
include "admin/connect.php";
include "admin/session.php";
if (isset($_POST['update'])) {
    $data_array =  array(
    "token" => $_SESSION['usertoken'],
    "email" => $_SESSION['email'],
    "address" => $_POST['address'],
    "city" => $_POST['city'],
    "pincode" => $_POST['pincode'],
    "state" => $_POST['state'],
);
    $make_call = callAPI('POST', 'vendorAddress', json_encode($data_array), $_SESSION['token']);
    $response = json_decode($make_call, true);
    if ($response['status']==true) {
        echo '<script>alert("'.$response['message'].'")
        window.location.href="address.php"
        </script>';
    }
    if ($response['email']) {
        echo '<script>alert("'.$response['email'][0].'")
        window.location.href="address.php"
        </script>';
    }
    if ($response['address']) {
        echo '<script>alert("'.$response['address'][0].'")
        window.location.href="address.php"
        </script>';
    }
    if ($response['city']) {
        echo '<script>alert("'.$response['city'][0].'")
        window.location.href="address.php"
        </script>';
    }
    if ($response['pincode']) {
        echo '<script>alert("'.$response['pincode'][0].'")
        window.location.href="address.php"
        </script>';
    }
    if ($response['state']) {
        echo '<script>alert("'.$response['state'][0].'")
        window.location.href="address.php"
        </script>';
    }
}

?>