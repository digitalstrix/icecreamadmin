<?php

use LDAP\Result;
error_reporting(0);
ini_set('display_errors', 0);
session_start();
include("admin/connect.php");

if (isset($_POST['login'])) {
    $data_array =  array(
    "user_type" => 'admin',
    "name" => $_POST['name'],
    "mobile" => $_POST['mobile'],
    "email" => $_POST['email'],
    "password" => $_POST['password'],
);
    $make_call = callAPI('POST', 'registerAdmin', json_encode($data_array),NULL);
    $response = json_decode($make_call, true);
    // if($response['message']){
    //     echo '<script>alert("'.$response['message'].'")</script>';
    // }  
if ($response['user']['user_token']) {
    $_SESSION['email'] =  $response['user']['email'];
    $_SESSION['name'] = $response['user']['name'];
    $_SESSION['usertoken'] = $response['user']['user_token'];
    $_SESSION['userid'] = $response['user']['id'];
    $_SESSION['useremail'] = $response['user']['email'];
    echo "<script>alert('".$response['message']."')
        window.location.href='dashboard.php';
        </script>
        ";
}
}

?>
<?php include("partials/header.php"); ?>

<body class="light ">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="register.php" method="POST">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                    <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                        xml:space="preserve">
                        <g>
                            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                        </g>
                    </svg>
                </a>
                <h1 class="h6 mb-3">Sign in</h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Name</label>
                    <input name="name" type="text" id="inputEmail" class="form-control form-control-lg"
                        placeholder="Your Name" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Mobile</label>
                    <input name="mobile" type="text" id="inputEmail" class="form-control form-control-lg"
                        placeholder="Your Mobile Number" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input name="email" type="email" id="inputEmail" class="form-control form-control-lg"
                        placeholder="Email address" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control form-control-lg"
                        placeholder="Password" name="password" required="">
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Stay logged in </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>
                <br>
                <p class="mt-5 mb-3 text-muted"><a href="index.php">Login</a></p>
                <br>
                <p class="mt-5 mb-3 text-muted">Strix Digital © 2020</p>
            </form>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/apps.js"></script>
</body>

</html>
</body>

</html>