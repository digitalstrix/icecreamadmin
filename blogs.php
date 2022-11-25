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
                if(isset($_GET['id'])){
                    $acid = $_GET['id'];
                    $sql="Select * from blogs where active=$acid";
                }
                else{
                    $sql="Select * from blogs";
                }
          $results=$connect->query($sql);
          while($final=$results->fetch_assoc()){
            ?>
                <?php
$userid = $final['user_id'];
 $sql1="Select * from users where id=$userid";
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
                                            alt="<?php echo $final['caption']; ?>" class="avatar-img rounded">
                                    </a>
                                </div>

                                <div class="col">

                                    <div class="row align-items-center">
                                        <div class="col-md-7">Title:
                                            <h4 class="mb-1"><?php echo $final['caption']; ?></h4>
                                            <p class="small mb-3"><span class="badge badge-dark">Blog
                                                    ID:
                                                    <?php echo $final['id']; ?></span>
                                            </p>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                    <div class="row mb-4">

                                        <div class="col-md-7">
                                            Content:
                                            <b>
                                                <p class="text-muted"> <?php echo $final['content']; ?> </p>
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

                                            <a href="deleteblog.php?del_id=<?php echo $final['id']; ?>">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                            <?php if($final['active'] =='1'){ ?>
                                            <a href="actblog.php?del_id=<?php echo $final['id']; ?>">
                                                <button type="button" class="btn btn-danger">Inactive</button>
                                            </a>
                                            <?php } ?>
                                            <?php if($final['active'] =='0'){ ?>
                                            <a href="activeblog.php?del_id=<?php echo $final['id']; ?>">
                                                <button type="button" class="btn btn-success">Active</button>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    User Details:
                                    <p class="small mb-0 text-muted">Name : <?php echo $user['name']; ?></p>
                                    <p class="small mb-0 text-muted">Email : <?php echo $user['email']; ?></p>
                                    <p class="small mb-0 text-muted">Mobile : <?php echo $user['mobile']; ?></p>
                                    <p class="small mb-0 text-muted">User Type : <?php echo $user['user_type']; ?></p>


                                </div>
                            </div> <!-- / .row- -->
                        </div> <!-- / .card-body - -->
                    </div> <!-- / .card- -->
                </div>

                <?php } ?>


            </div> <!-- .container-fluid -->

            <?php include "admin/footer.php"; ?>