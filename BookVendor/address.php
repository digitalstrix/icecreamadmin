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
                        <strong class="card-title">Add Address</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="addresshandler.php" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Your Address</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Your Address" name="address" value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Your City</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Your City Name" name="city" value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Area Pincode</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Area Pincode" name="pincode" value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Your State</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Your State Name" name="state" value="">
                                    </div>




                                    <div class="form-group mb-3">

                                        <input type="submit" id="example-palaceholder" class="btn btn-primary"
                                            name="update" value="Submit">
                                    </div>
                            </div> <!-- /.col -->
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <?php
        $userid =  $_SESSION['userid'];
        $sql = "select * from address where userid=$userid";
        $results = $connect->query($sql);
        $row =  mysqli_num_rows($results);
if ($row>0) {
    $ptsc = mysqli_fetch_assoc($results); ?>
                    <div class="card-header">
                        <strong class="card-title">Saved Address</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="addresshandler.php" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Your Address</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Your Address" name="address" disabled
                                            value="<?php echo $ptsc['address'] ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Your City</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Your City Name" name="city" disabled
                                            value="<?php echo $ptsc['city'] ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Area Pincode</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Area Pincode" name="pincode" disabled
                                            value="<?php echo $ptsc['pincode'] ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Your State</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Your State Name" name="state" disabled
                                            value="<?php echo $ptsc['state'] ?>">
                                    </div>


                            </div> <!-- /.col -->
                            </form>
                        </div>
                    </div>
                </div>
                <?php
}   
                ?>





            </div> <!-- .container-fluid -->

            <?php include "admin/footer.php"; ?>