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
                <?php
                
                    $sql="Select * from advertisement";
          $results=$connect->query($sql);
          while($final=$results->fetch_assoc()){
            ?>
                <?php
$userid = $final['company_id'];
 $sql1="Select * from users where company_id='$userid'";
 $results1=$connect->query($sql1);
$user=$results1->fetch_assoc();

            ?>

                <div class="col-md-12 mb-4">
                    <div class="card profile shadow">
                        <div class="card-body my-4">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-center mb-5">
                                    <a href="#!" class="avatar avatar-xl">
                                        <img src="<?php echo $uri.$final['image']; ?>"
                                            alt="<?php echo $user['name']; ?>" class="avatar-img rounded">
                                    </a>
                                </div>
                                <div class="col">

                                    <div class="row align-items-center">
                                        <div class="col-md-7">Company:
                                            <h4 class="mb-1"><?php echo $final['company_id']; ?></h4>
                                            <p class="small mb-3"><span class="badge badge-dark">Advertisement
                                                    ID:
                                                    <?php echo $final['id']; ?></span>
                                            </p>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                    <div class="row mb-4">

                                        <div class="col-md-7">
                                            Advertise Zone:
                                            <b>
                                                <p class="text-muted"> <?php echo $final['advertise_zone']; ?> </p>
                                            </b>
                                        </div>
                                        <div class="col-md-7">
                                            Payment Status:
                                            <b>
                                                <p class="text-muted"> <?php echo $final['payment_status']; ?> </p>
                                            </b>
                                        </div>
                                        <div class="col-md-7">
                                            Payment Id:
                                            <b>
                                                <p class="text-muted"> <?php echo $final['payment_id']; ?> </p>
                                            </b>
                                        </div>
                                        <div class="col-md-7">
                                            Payment Date:
                                            <b>
                                                <p class="text-muted"> <?php echo $final['payment_date']; ?> </p>
                                            </b>
                                        </div>
                                        <div class="col-md-7">
                                            Start:
                                            <b>
                                                <p class="text-muted"> <?php echo $final['start_date']; ?> </p>
                                            </b>
                                        </div>
                                        <div class="col-md-7">
                                            End:
                                            <b>
                                                <p class="text-muted"> <?php echo $final['end_date']; ?> </p>
                                            </b>
                                        </div>
                                        <div class="col-md-7">
                                            Is Approved Status:
                                            <b>
                                                <p class="text-muted"> <?php 
                                                if($final['is_approved']==1){
                        echo "Active";
                                                }else{
                                                    echo "Deactivated";
                                                }
                                                ?> </p>
                                            </b>
                                        </div>
                                        <div class="col">

                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-7 mb-2">
                                            <span class="small text-muted mb-0">Posted On
                                                <?php echo $final['created_at']; ?></span>
                                        </div>
                                        <div class="col mb-2">
                                            <a href="activeads.php?ad_id=<?php echo $final['id']; ?>">
                                                <button type="button" class="btn btn-success">Active</button>
                                            </a>
                                        </div>
                                        <div class="col mb-2">
                                            <a href="deactiveads.php?ad_id=<?php echo $final['id']; ?>">
                                                <button type="button" class="btn btn-danger">Deactive</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    User Details:
                                    <p class="small mb-0 text-muted">Name : <?php echo $user['name']; ?></p>
                                    <p class="small mb-0 text-muted">Email : <?php echo $user['email']; ?></p>
                                    <p class="small mb-0 text-muted">Mobile : <?php echo $user['mobile']; ?></p>
                                    <p class="small mb-0 text-muted">Company Name :
                                        <?php echo $user['organization_name']; ?></p>


                                </div>
                            </div> <!-- / .row- -->
                        </div> <!-- / .card-body - -->
                    </div> <!-- / .card- -->
                </div>

                <?php } ?>


            </div> <!-- .container-fluid -->

            <?php include "admin/footer.php"; ?>