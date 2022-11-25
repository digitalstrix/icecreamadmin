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
          $sql="Select * from products";
          $results=$connect->query($sql);
          while($final=$results->fetch_assoc()){
            ?>
                <div class="col-md-12 mb-4">
                    <div class="card profile shadow">
                        <div class="card-body my-4">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-center mb-5">
                                    <a href="#!" class="avatar avatar-xl">
                                        <img src="<?php echo $uri.$final['image']; ?>"
                                            alt="<?php echo $final['name']; ?>" class="avatar-img rounded">
                                    </a>
                                </div>

                                <div class="col">

                                    <div class="row align-items-center">
                                        <div class="col-md-7">Name:
                                            <h4 class="mb-1"><?php echo $final['name']; ?></h4>
                                            <p class="small mb-3"><span class="badge badge-dark">Product
                                                    ID:
                                                    <?php echo $final['id']; ?></span>
                                            </p>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                    <div class="row mb-4">

                                        <div class="col-md-7">
                                            Description:
                                            <b>
                                                <p class="text-muted"> <?php echo $final['description']; ?> </p>
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

                                            <a href="deleteproduct.php?del_id=<?php echo $final['id']; ?>">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    Category Details:
                                    <?php
          $product_id = $final['id'];
          $sql1="Select * from assigncategories where product_id=$product_id";
          $results1=$connect->query($sql1);
while ($final1=$results1->fetch_assoc()) {
    ?>
                                    <?php
$userid = $final1['category_id'];
 $sql1="Select * from categories where id=$userid";
 $results1=$connect->query($sql1);
$user=$results1->fetch_assoc();
            ?>
                                    <p class="small mb-0 text-muted">Category : <?php echo $user['name']; ?></p>
                                    <p class="small mb-0 text-muted">Description : <?php echo $user['description']; ?>
                                    </p>
                                    <?php } ?>
                                    <br>
                                    SubCategory Details:
                                    <?php
          $product_id = $final['id'];
          $sql1="Select * from assignsubcategories where product_id=$product_id";
          $results1=$connect->query($sql1);
while ($final1=$results1->fetch_assoc()) {
    ?>
                                    <?php
$userid = $final1['subcategory_id'];
 $sql1="Select * from subcategories where id=$userid";
 $results1=$connect->query($sql1);
$user=$results1->fetch_assoc();
            ?>
                                    <p class="small mb-0 text-muted">Name : <?php echo $user['name']; ?></p>
                                    <p class="small mb-0 text-muted">Quantity : <?php echo $user['quantity']; ?>
                                    <p class="small mb-0 text-muted">Price : <?php echo $user['price']; ?>
                                    </p>
                                    <?php } ?>



                                </div>
                            </div> <!-- / .row- -->
                        </div> <!-- / .card-body - -->
                    </div> <!-- / .card- -->
                </div>

                <?php } ?>


            </div> <!-- .container-fluid -->

            <?php include "admin/footer.php"; ?>