<?php
include 'admin/connect.php';
include 'admin/session.php';
include 'admin/header.php';
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
                    <a href="packages.php">
                        <button type="button" class="btn btn-primary">View Test Packages</button>
                    </a>
                    <div class="card-header">
                        <strong class="card-title">Add New Test Package</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="packagehandler.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Package Name" name="package" value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="submit" id="example-palaceholder" class="btn btn-primary"
                                            value="Submit">
                                    </div>
                            </div> <!-- /.col -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end section -->
            </div>
    </div> <!-- .row -->
    </div> <!-- .container-fluid -->

    </div> <!-- .container-fluid -->



    </div> <!-- .container-fluid -->

    <?php include "admin/footer.php"; ?>