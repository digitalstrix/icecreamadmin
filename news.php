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
                
               
                    $sql="Select * from newes";
          $results=$connect->query($sql);
          while($final=$results->fetch_assoc()){
            ?>
                <?php
$userid = $final['category_id'];
 $sql1="Select * from newscategories where id=$userid";
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
                                            alt="<?php echo $final['title']; ?>" class="avatar-img rounded">
                                    </a>
                                </div>

                                <div class="col">

                                    <div class="row align-items-center">
                                        <div class="col-md-7">Title:
                                            <h4 class="mb-1"><?php echo $final['title']; ?></h4>
                                            <p class="small mb-3"><span class="badge badge-dark">News
                                                    ID:
                                                    <?php echo $final['id']; ?></span>
                                            </p><br>
                                            <p class="small mb-3"><span class="badge badge-dark">Catgory:
                                                    <?php echo $user['name']; ?></span>
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

                                            <a href="deletenews.php?del_id=<?php echo $final['id']; ?>">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                            </div> <!-- / .row- -->
                        </div> <!-- / .card-body - -->
                    </div> <!-- / .card- -->
                </div>

                <?php } ?>


            </div> <!-- .container-fluid -->

            <?php include "admin/footer.php"; ?>