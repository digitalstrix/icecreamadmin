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
                                    <?php if(isset($_GET['user_type'])){
        if($_GET['user_type']=='admin'){
            echo 'All Admins';
        }
        elseif($_GET['user_type']=='user'){
            echo 'All Users';
        }
         }
         else{
           echo  " Users";
         } ?> </strong>
                                <a class="float-right small text-muted" href="#!"></a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-borderless table-striped mt-n3 mb-n1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>User Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
         if(isset($_GET['user_type'])){
            $usertype = $_GET['user_type'];
            $sql = "select * from users where user_type='$usertype'";
         }
         else{
            $sql = "select * from users";
         }
         
         $results = $connect->query($sql);
         while($final=$results->fetch_assoc()){?>
                                        <tr>
                                            <td><?php echo $final['id']?></td>
                                            <th scope="col"><?php echo $final['name']?></th>
                                            <td><?php echo $final['email']?>
                                            </td>
                                            <td><?php echo $final['mobile']?>
                                            </td>

                                            <td>
                                                <?php 
                                                if($final['user_type']=='admin'){
                                                    echo 'Admin';
                                                }
                                                elseif($final['user_type']=='user'){
                                                    echo 'User';
                                                }
                                                
                                                ?>
                                            </td>
                                            <td><a href="userdelete.php?del_id=<?php echo $final['id']; ?>">Delete</a>
                                                <br>
                                                <a href="edit.php?userid=<?php echo $final['id']; ?>">Edit User</a>
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