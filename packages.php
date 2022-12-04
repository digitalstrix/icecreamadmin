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
                <!-- <div class="row justify-content-center"> -->

                <!-- / .row -->
                <div class="row">
                    <!-- Recent orders -->
                    <div class="col-md-12">
                        <div class="card shadow eq-card">
                            <div class="card-header">
                                <strong class="card-title">
                                    Manage Packages </strong>
                                <a class="float-right small text-muted" href="#!"></a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-borderless table-striped mt-n3 mb-n1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Validity</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "select * from packages";
                                        $results = $connect->query($sql);
                                        while($final=$results->fetch_assoc()){?>
                                        <tr>
                                            <td><?php echo $final['id']?></td>
                                            <th scope="col"><?php echo $final['package_name']?></th>
                                            <td><?php echo $final['price']?>
                                            </td>
                                            <td><?php echo $final['validity']?> Months
                                            </td>
                                            <td><?php echo $final['start_date']?>
                                            </td>
                                            <td><?php echo $final['end_date']?>
                                            </td>
                                            <td>
                                                <?php 
                                                if($final['active']=='1'){
                                                    echo 'Active';
                                                }
                                                else{
                                                    echo 'Deactivated';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a
                                                    href="packageactive.php?user_id=<?php echo $final['id']; ?>">Active</a>
                                                <br>
                                                <a
                                                    href="packagedeactive.php?user_id=<?php echo $final['id']; ?>">Deactivate</a>
                                            </td>
                                        </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- / .col-md-8 -->
                    <!-- Recent Activity -->
                    <!-- / .col-md-3 -->
                </div> <!-- end section -->
            </div>
    </div> <!-- .row -->
    </div> <!-- .container-fluid -->

    <?php include "admin/footer.php"; ?>