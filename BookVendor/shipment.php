<?php
if(!(isset($_GET['uid'])&& isset($_GET['id']))){
    header('Location: dashboard.php');
}
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
                        <strong class="card-title">Edit Shipment Details</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="shipmenthandler.php" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="form-group mb-3">

                                        <input hidden type="text" id="simpleinput" class="form-control"
                                            placeholder="Your Address" name="order_id"
                                            value="<?php echo $_GET['id']; ?>">
                                        <input hidden type="text" id="simpleinput" class="form-control"
                                            placeholder="Your Address" name="user_id"
                                            value="<?php echo $_GET['uid']; ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Tracking ID</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Tracking Id" name="shipment_id">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Tracking Url</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Tracking Url" name="shipment_url">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Estimated Delivery Date</label>
                                        <input type="date" id="simpleinput" class="form-control"
                                            placeholder="Your State Name" name="estimated_delivery_date">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Note</label>
                                        <input type="text" id="simpleinput" class="form-control" placeholder="Note"
                                            name="note">
                                    </div>
                                    <div class="form-group mb-3">

                                        <input type="submit" id="example-palaceholder" class="btn btn-primary"
                                            name="update" value="Submit">
                                    </div>
                            </div>


                        </div> <!-- /.col -->
                        </form>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <?php
        $vendor_id =  $_SESSION['userid'];
        $order_id = $_GET['id'];
        $sql = "select * from shipment where vendor_id=$vendor_id AND order_id=$order_id";
        $results = $connect->query($sql);
        $row =  mysqli_num_rows($results);
if ($row>0) {
    $ptsc = mysqli_fetch_assoc($results); ?>
                <div class="card-header">
                    <strong class="card-title">Saved Shipment</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" action="addresshandler.php" method="POST" enctype="multipart/form-data">

                                <div class="form-group mb-3">
                                    <label for="simpleinput">Order Id</label>
                                    <input type="text" id="simpleinput" class="form-control" placeholder="Your Address"
                                        name="address" disabled value="<?php echo $order_id ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Tracking ID</label>
                                    <input type="text" id="simpleinput" class="form-control"
                                        placeholder="Your City Name" name="city" disabled
                                        value="<?php echo $ptsc['shipment_id'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Tracking Url</label>
                                    <input type="text" id="simpleinput" class="form-control" placeholder="Area Pincode"
                                        name="pincode" disabled value="<?php echo $ptsc['shipment_url'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Estimated Delivery Date</label>
                                    <input type="text" id="simpleinput" class="form-control"
                                        placeholder="Your State Name" name="state" disabled
                                        value="<?php echo $ptsc['expected_delivery'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Note</label>
                                    <input type="text" id="simpleinput" class="form-control"
                                        placeholder="Your State Name" name="state" disabled
                                        value="<?php echo $ptsc['note'] ?>">
                                </div>


                        </div> <!-- /.col -->
                        </form>
                    </div>
                </div>
            </div>
            <?php
} ?>




    </div> <!-- .container-fluid -->

    <?php include "admin/footer.php"; ?>