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

                    <div class="card-header">
                        <strong class="card-title">Edit Profile</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="profileadminhandler.php" method="POST"
                                    enctype="multipart/form-data">

                                    <?php
                                    $id = $_GET['userid'];
          $sql="Select * from users where id=$id ";
          $results=$connect->query($sql);
          $final=$results->fetch_assoc();?>
                                    <input hidden type="text" id="simpleinput" class="form-control"
                                        placeholder="Caption" name="email" value="<?php echo $final['email']?>">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Email</label>
                                        <input disabled type="text" id="simpleinput" class="form-control"
                                            placeholder="Email" name="name" value="<?php echo $final['email']?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Name</label>
                                        <input type="text" id="simpleinput" class="form-control" placeholder="Caption"
                                            name="name" value="<?php echo $final['name']?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Mobile</label>
                                        <input type="text" id="simpleinput" class="form-control" placeholder="Caption"
                                            name="mobile" value="<?php echo $final['mobile']?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">New Password</label>
                                        <input type="password" id="simpleinput" class="form-control"
                                            placeholder="Enter New Password" name="password" value="">
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





            </div> <!-- .container-fluid -->

            <?php include "admin/footer.php"; ?>