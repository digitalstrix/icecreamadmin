<?php
include 'admin/connect.php';
include 'admin/session.php';
include 'admin/header.php';
// $id = $_GET['edit_id'];
// $sql1="Select * from posts where id = $id";
//           $results1=$connect->query($sql1);
//           $f=$results1->fetch_assoc();

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
                    <a href="productview.php">
                        <button type="button" class="btn btn-primary">View Product</button>
                    </a>
                    <div class="card-header">
                        <strong class="card-title">Edit Post</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="addproducthandler.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group mb-3">

                                        <label for="simpleinput">Product Name</label>
                                        <input required type="text" id="simpleinput" class="form-control"
                                            placeholder="Product Name" name="name">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="example-password">Product Description</label>
                                        <input required type="text" id="example-password" class="form-control"
                                            name="description" placeholder="Product Description">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label required for="example-password">Product Price</label>
                                        <input required type="text" id="example-password" class="form-control"
                                            name="price" placeholder="Product price">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="custom-select">Select Category</label>
                                        <select required name="category_id" class="custom-select" id="custom-select">
                                            <option selected>
                                                Select Category</option>
                                            <?php
          $sql="Select * from categories";
          $results=$connect->query($sql);
          while($final=$results->fetch_assoc()){ ?>
                                            <option value="<?php echo $final['id'];?>"><?php echo $final['name'];?>
                                            </option>
                                            <?php }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="custom-select">Is New</label>
                                        <select required name="is_new" class="custom-select" id="custom-select">
                                            <option selected>
                                                Select</option>

                                            <option value="0">
                                                Old Book
                                            </option>
                                            <option value="1">
                                                New Book
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="customFile">Select Product Image</label>
                                        <div class="custom-file">
                                            <input required type="file" name="product_file" required
                                                class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose
                                                file</label>
                                        </div>
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





            </div> <!-- .container-fluid -->

            <?php include "admin/footer.php"; ?>