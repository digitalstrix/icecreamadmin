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


                <div class="card shadow mb-4">
                    <a href="dashboard.php">
                        <button type="button" class="btn btn-primary">Dashboard</button>
                    </a>
                    <div class="card-header">
                        <!-- <strong class="card-title">Add Question</strong> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="views.php" method="GET" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <label for="custom-select">Difficulty Level</label>
                                        <select name="level" class="custom-select" id="custom-select">
                                            <option value="">Choose...</option>
                                            <?php
                                            $sql="Select * from savsoft_level";
                                            $results=$connect->query($sql);
                                            while($final=$results->fetch_assoc()){ 
                                            echo "<option value='".$final['lid']."'>".$final['level_name']."</option>";
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="custom-select">Model</label>
                                        <select name="model" class="custom-select" id="custom-select">
                                            <option value="">Choose...</option>
                                            <?php
                                            $sql="Select * from models";
                                            $results=$connect->query($sql);
                                            while($final=$results->fetch_assoc()){ 
                                            echo "<option value='".$final['id']."'>".$final['name']."</option>";
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="custom-select">Source</label>
                                        <select name="source" class="custom-select" id="custom-select">
                                            <option value="">Choose...</option>
                                            <?php
                                            $sql="Select * from gmattutor_sources";
                                            $results=$connect->query($sql);
                                            while($final=$results->fetch_assoc()){ 
                                            echo "<option value='".$final['sid']."'>".$final['source_name']."</option>";
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="custom-select">Categories</label>
                                        <select name="category" class="custom-select" id="custom-select">
                                            <option value="">Choose...</option>
                                            <?php
                                            $sql="Select * from gmattutor_types";
                                            $results=$connect->query($sql);
                                            while($final=$results->fetch_assoc()){ 
                                            echo "<option value='".$final['tid']."'>".$final['type_name']."</option>";
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="custom-select">Course Type</label>
                                        <select name="course_type" class="custom-select" id="custom-select">
                                            <option value="">Choose...</option>
                                            <?php
                                            $sql="Select * from gmattutor_course_types";
                                            $results=$connect->query($sql);
                                            while($final=$results->fetch_assoc()){ 
                                            echo "<option value='".$final['ctid']."'>".$final['course_type_name']."</option>";
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="custom-select">Course</label>
                                        <select name="course" class="custom-select" id="custom-select">
                                            <option value="">Choose...</option>
                                            <?php
                                            $sql="Select * from gmattutor_courses";
                                            $results=$connect->query($sql);
                                            while($final=$results->fetch_assoc()){ 
                                            echo "<option value='".$final['cid']."'>".$final['course_name']."</option>";
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="custom-select">Type</label>
                                        <select name="type" class="custom-select" id="custom-select">
                                            <option value="">Choose...</option>
                                            <?php
                                            $sql="Select * from gmattutor_models";
                                            $results=$connect->query($sql);
                                            while($final=$results->fetch_assoc()){ 
                                            echo "<option value='".$final['mid']."'>".$final['model_name']."</option>";
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="custom-select">Select Subject</label>
                                        <select name="subject" class="custom-select" id="custom-select"
                                            onchange="fetch_select(this.value);">
                                            <option value="">Choose...</option>
                                            <?php
                                            $sql="Select * from savsoft_category";
                                            $results=$connect->query($sql);
                                            while($final=$results->fetch_assoc()){ 
                                            echo "<option value='".$final['cid']."'>".$final['category_name']."</option>";
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-sm-12 col-md-2 col-form-label">Select Topic</label>
                                        <div class="col-sm-12 col-md-10">
                                            <select onchange="fetch_topic(this.value);" id="newselect" name="topic"
                                                class="custom-select col-12">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-sm-12 col-md-2 col-form-label">Select Concept</label>
                                        <div class="col-sm-12 col-md-10">
                                            <select onchange="" id="newselect1" name="concept"
                                                class="custom-select col-12">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">

                                        <input type="submit" id="example-palaceholder" class="btn btn-primary"
                                            value="Submit">
                                    </div>
                            </div> <!-- /.col -->
                            </form>
                        </div>
                    </div>
                </div>





            </div> <!-- .container-fluid -->

            <?php include "admin/footer.php"; ?>
            <script type="text/javascript">
            function fetch_select(val) {
                console.log(val);
                $.ajax({
                    type: 'post',
                    url: 'res1.php',
                    data: {
                        subject: val
                    },
                    success: function(response) {
                        console.log(response, "feknmkesncm");
                        document.getElementById("newselect").innerHTML = response;
                    }
                });
            }
            </script>
            <script type="text/javascript">
            function fetch_topic(val) {
                console.log(val);
                $.ajax({
                    type: 'post',
                    url: 'res2.php',
                    data: {
                        topic: val
                    },
                    success: function(response) {
                        console.log(response, "feknmkesncm");
                        document.getElementById("newselect1").innerHTML = response;
                    }
                });
            };
            </script>