<?php
include 'admin/connect.php';
include 'admin/session.php';
include 'admin/header.php';
// error_reporting(0);
// error_reporting(E_ALL ^ E_WARNING); 
error_reporting(E_ALL);
ini_set('display_errors', 0);
require_once('richtexteditor/include_rte.php');
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
                        <strong class="card-title">Company</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="addmanagerhandler.php" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Name</label>
                                        <input type="text" id="simpleinput" class="form-control" placeholder="Name"
                                            name="name" value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Mobile</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Your Phone Number" name="mobile" value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Desk Id</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            placeholder="Desk ID Of Employee" name="desk_id" value="">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Company ID</label>
                                        <select type="sel" id="simpleinput" class="form-control" placeholder="Caption"
                                            name="company_id" value="">
                                            <?php
                                        $sqlv = "select * from users where company_id LIKE '%%'";
                                        $resultsv = $connect->query($sqlv);
                                        while($finalv=$resultsv->fetch_assoc()){?>
                                            <option value="<?php echo $finalv['company_id'];?>">
                                                <?php echo $finalv['organization_name'];?>
                                            </option>
                                            <?php 
                                        }?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Profile</label>
                                        <input type="file" id="simpleinput" class="form-control" placeholder="Caption"
                                            name="profile" value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="submit" id="example-palaceholder" class="btn btn-primary"
                                            value="Submit">
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "admin/footer.php"; ?>