<?php
include 'admin/connect.php';
include 'admin/session.php';
include 'admin/header.php';
// error_reporting(0);
// error_reporting(E_ALL ^ E_WARNING); 
error_reporting(E_ALL);
ini_set('display_errors', 0);
require_once('richtexteditor/include_rte.php');
?>

<body class="vertical  light  ">
    <div class="wrapper">
        <?php
include 'admin/navbar.php';
include 'admin/aside.php';
?>

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Add News Category</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="addcategoryhandler.php" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Category Name</label>
                                        <input type="text" id="simpleinput" class="form-control" placeholder="Name"
                                            name="category" value="">
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="submit" id="example-palaceholder" class="btn btn-primary"
                                            value="Submit">
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "admin/footer.php"; ?>