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
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row align-items-center mb-2">
                            <div class="col">
                                <h2 class="h5 page-title">Welcome!</h2>
                            </div>
                            <div class="col-auto">
                                <form class="form-inline">
                                    <div class="form-group d-none d-lg-inline">
                                        <label for="reportrange" class="sr-only">Date Ranges</label>
                                        <div id="reportrange" class="px-2 py-2 text-muted">
                                            <span class="small"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm"><span
                                                class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                                        <button type="button" class="btn btn-sm mr-2"><span
                                                class="fe fe-filter fe-16 text-muted"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow my-4">
                            <div class="card-body">
                                <div class="row align-items-center my-12">
                                    <div class="col-md-12">
                                        <!-- <div class="mx-4">
                                            <strong class="mb-0 text-uppercase text-muted">Earning</strong><br />
                                            <h3>$2,562.30</h3>
                                            <p class="text-muted">Etiam ultricies nisi vel augue. Curabitur ullamcorper
                                                ultricies nisi. Nam eget dui. Etiam rhoncus...</p>
                                        </div> -->
                                        <div class="row align-items-center">

                                            <div class="col-6">
                                                <div class="p-4">
                                                    <p class="small text-uppercase text-muted mb-0">Total Books Listed
                                                        By You
                                                    </p>
                                                    <?php
        $vid = $_SESSION['userid'];
        $sql = "select * from products where vendor_id=$vid";
        $results = $connect->query($sql);
       $pt = mysqli_num_rows($results);
        ?>
                                                    <span class="h2 mb-0"><?php echo $pt; ?></span>
                                                    <p class="small mb-0">

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="p-4">
                                                    <p class="small text-uppercase text-muted mb-0">Total Partial Orders
                                                    </p>
                                                    <?php
        $sql = "select * from blogs";
        $results = $connect->query($sql);
       $pts = mysqli_num_rows($results);
        ?>
                                                    <span class="h2 mb-0"><?php echo $pts; ?></span>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-4">
                                                    <p class="small text-uppercase text-muted mb-0">Total Categories of
                                                        Books</p>
                                                    <?php
        
        $sql = "select * from categories";
        $results = $connect->query($sql);
       $ptsc = mysqli_num_rows($results);
        ?>
                                                    <span class="h2 mb-0"><?php echo $ptsc;?></span>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-4">
                                                    <p class="small text-uppercase text-muted mb-0">Total Order Placed
                                                    </p>
                                                    <?php
        
        $sql = "select * from orders where is_placed=1";
        $results = $connect->query($sql);
       $ptsc = mysqli_num_rows($results);
        ?>
                                                    <span class="h2 mb-0"><?php echo $ptsc;?></span>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-4">
                                                    <p class="small text-uppercase text-muted mb-0">Total Earnings</p>
                                                    <?php
        
        $sql = "select sum(total_amount) as total from orders where is_placed=1";
        $results = $connect->query($sql);
       $ptsc = mysqli_fetch_assoc($results);
        ?>
                                                    <span class="h2 mb-0"><?php echo $ptsc['total'];?> Rs</span>

                                                </div>
                                            </div> -->
                                    </div>
                                </div>
                                <!-- .col-md-8 -->
                            </div> <!-- end section -->
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->

                    <!-- / .row -->
                    <div class="row">
                        <!-- Recent orders -->

                    </div> <!-- end section -->
                </div>
            </div> <!-- .row -->
    </div> <!-- .container-fluid -->

    <?php include "admin/footer.php"; ?>