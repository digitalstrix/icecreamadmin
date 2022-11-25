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
        <?php
         $orderid = $_GET['id'];
         $sql = "select * from orders where order_id=$orderid";
         $results = $connect->query($sql);
         $final=$results->fetch_assoc();
         $uid = $final['user_id'];
         $sqlu = "select * from users where id=$uid";
         $resultsu = $connect->query($sqlu);
         $finalu=$resultsu->fetch_assoc();
         $addresid = $final['address_id'];
         $sqla = "select * from address where id=$addresid";
         $resultsa = $connect->query($sqla);
         $finala=$resultsa->fetch_assoc();
?>

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8">
                        <div class="row align-items-center mb-4">
                            <div class="col">
                                <h2 class="h5 page-title"><small class="text-muted text-uppercase">Order
                                        ID</small><br /><?php echo $final['order_id'] ?>
                                </h2>
                            </div>
                            <!-- <div class="col-auto">
                                <button type="button" class="btn btn-secondary">Print</button>
                                <button type="button" class="btn btn-primary">Pay</button>
                            </div> -->
                        </div>
                        <div class="card shadow">
                            <div class="card-body p-5">
                                <div class="row mb-5">
                                    <div class="col-12 text-center mb-4">
                                        <img src="./assets/images/logo.svg"
                                            class="navbar-brand-img brand-sm mx-auto mb-4" alt="...">
                                        <h2 class="mb-0 text-uppercase">Order Details</h2>
                                        <p class="text-muted"> Books Online Company.<br /> </p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="small text-muted text-uppercase mb-2">Buyer Details</p>
                                        <p class="mb-4">
                                            <strong>Name : <?php echo $finalu['name'] ?></strong><br />Mobile :
                                            <?php echo $finalu['mobile'] ?><br />Email :
                                            <?php echo $finalu['email'] ?><br />
                                            <?php  if($finalu['status']==1){
                                                echo "Active User";
                                            }else{
                                                echo "Inactive User";
                                            } ?>
                                        </p>
                                        <p>
                                            <span class="small text-muted text-uppercase">Order Id #</span><br />
                                            <strong><?php echo $final['order_id'] ?></strong>
                                        </p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="small text-muted text-uppercase mb-2">Deliver To</p>
                                        <p class="mb-4">
                                            <strong><?php echo $finalu['name'] ?></strong><br />
                                            <?php echo $finala['address'] ?><br />City : <?php echo $finala['city'] ?>
                                            <?php echo $finala['state'] ?><br />Pincode :
                                            <?php echo $finala['pincode'] ?><br />
                                            <?php echo $finala['country'] ?><br />
                                        </p>
                                        <p>
                                            <small class="small text-muted text-uppercase">Order Date</small><br />
                                            <strong><?php echo $final['updated_at'] ?></strong>
                                        </p>
                                    </div>
                                </div> <!-- /.row -->
                                <table class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product</th>
                                            <th scope="col" class="text-right">Rate</th>
                                            <th scope="col" class="text-right">Quantity</th>
                                            <th scope="col" class="text-right">Total Ammout</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php    
$vendorid = $_SESSION['userid'];
$sqlvi = "select * from users where id=$vendorid";
         $resultsvi = $connect->query($sqlvi);
         $finalvi=$resultsvi->fetch_assoc();
         ?>
                                        <!-- <tr>
                                            <th scope="col">Vendor  </th>
                                            <th scope="col"><?php echo $finalvi['name'] ?></th>
                                            <th scope="col"><?php echo $finalvi['mobile'] ?></th>
                                        </tr> -->
                                        <?php
         $count = 0;
         $sub = 0;
         $sqlvq = "select * from cartitems where order_id=$orderid AND vendor_id=$vendorid";
         $resultsvq = $connect->query($sqlvq);
         while($finalvq=$resultsvq->fetch_assoc()){
?>
                                        <?php    
 $productid =  $finalvq['product_id'];
$sqlvp = "select * from products where id=$productid";
         $resultsvp = $connect->query($sqlvp);
         $finalvp=$resultsvp->fetch_assoc();
         $count = $count+1;
         $sub = $sub+$finalvq['price'];
         $sqlvii = "select * from cartitems where order_id=$orderid AND product_id=$productid";
         $resultsvii = $connect->query($sqlvii);
         $finalvii=$resultsvii->fetch_assoc();
         $sqlviii = "select * from sitesettings where id=1";
         $resultsviii = $connect->query($sqlviii);
         $finalviii=$resultsviii->fetch_assoc();
         ?>

                                        <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td> <?php echo $finalvp['name'] ?><br />
                                                <span
                                                    class="small text-muted"><?php echo $finalvp['description'] ?></span>
                                            </td>
                                            <td class="text-right"><?php echo $finalvp['price'] ?> Rs.</td>
                                            <td class="text-right"><?php echo $finalvii['quantity'] ?></td>
                                            <td class="text-right"><?php echo $finalvii['price'] ?> Rs.</td>
                                        </tr>
                                        <?php }
?>


                                    </tbody>
                                </table>
                                <div class="row mt-5">
                                    <div class="col-2 text-center">
                                        <img src="./assets/images/qrcode.svg"
                                            class="navbar-brand-img brand-sm mx-auto my-4" alt="...">
                                    </div>
                                    <div class="col-md-5">
                                        <p class="text-muted small">
                                            <strong>Note :</strong> Thankyou for using our Service.
                                        </p>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="text-right mr-2">
                                            <p class="mb-2 h6">
                                                <span class="text-muted">Your Payable Amount :<br></span>
                                                <strong><?php echo $sub ?> Rupees</strong>
                                            </p>
                                            <!-- <p class="mb-2 h6">
                                                <span class="text-muted">Shipping : </span>
                                                <strong><?php echo $final['shipping'] ?> Rupees</strong>
                                            </p>
                                            <p class="mb-2 h6">
                                                <span class="text-muted">TAX (<?php echo $finalviii['tax'] ?>%) :
                                                </span>
                                                <strong><?php echo $final['tax'] ?> Rupees</strong>
                                            </p>
                                            <p class="mb-2 h6">
                                                <span class="text-muted">Grand Total : </span>
                                                <span><?php echo $final['grand_total'] ?> Rupees</span>
                                            </p> -->
                                        </div>
                                    </div>
                                </div> <!-- /.row -->
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
            <?php include "admin/footer.php"; ?>