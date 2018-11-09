<link href="css/jobs.css" rel="stylesheet">

<?php
include 'XownCMS/conn.php';
$job = "SELECT * FROM tb_post_job";
$jobs = mysqli_query($conn, $job);



if (isset($_POST['submit'])) {

    $location = 'uploads/';

    $fileName = $_FILES['file']['name'];
    $tmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];

    if ($fileType == "application/pdf") {
        if (move_uploaded_file($tmpName, $location . $fileName)) {
            $filesql = "INSERT INTO tb_cv(fullname,email,qualification,field,grade,url,type)VALUES('" . $_POST["fname"] . "','" . $_POST["email"] . "','" . $_POST["qual"] . "','" . $_POST["field"] . "','" . $_POST["grade"] . "','$fileName','$fileType')";

            if (mysqli_query($conn, $filesql)) {
                $success = 'cv uploaded successfully';
            }
            $conn->close();
            
            // $conn->multi_query($filesql);
        } else {

            echo "<p>Upload Failed.</p>";
        }


    } else {
        $exmsg = 'cv must be uploaded in PDF format';
    }
}
?>

<?php include_once('header.php'); ?>


<section id="job_banner" class='banner_area'>
    <div class="container">
        <div class="banner_content">
            <h3>Latest Jobs</h3>
        </div>
    </div>
</section>


<div class="banner_link">
    <div class="container">
        <div class="abnner_link_inner">
            <a class="active" href="../">Home</a>
            <a href="featured-jobs">Latest Jobs</a>
             <!-- CV Submission toggle -->
             <button id="Mybtn" class="btn">Submit your CV</button>
        </div>
    </div>
</div>
<br>
<br>
<br>

<section id="search" class="container">
<div>
                       
                        <?php
                        if (isset($success)) {
                            echo "<div style='color: grey;'>" . $success . "</div>";
                        }
                        ?>
                        <!-- Cv submission form -->
                        <form id="myform" method="post" action="" enctype="multipart/form-data">
                            <i class="fa fa-times" id='form-close' style='float: right;margin: 15px;color: #848181;'></i>

                            <div class="row">

                                <div class="col-4">
                                    <label class="control-label" for="fname">Full Name</label>
                                    <input type="text" class="form-control" name='fname' required>
                                </div>
                                <div class="col-4">
                                    <label class="control-label" for="email">Email</label>
                                    <input type="text" class="form-control" name='email' required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-4">
                                    <label for="qualifications">Qualification</label>
                                    <select id="qualifications" class="form-control" name='qual' required>
                                        <option selected>Choose...</option>
                                        <option>Degree</option>
                                        <option>Masters'</option>
                                        <option>PostGraduate</option>
                                        <option>HND</option>
                                        <option>OND</option>

                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="fiels">Field Of Study</label>
                                    <input type="text" class="form-control" name='field' placeholder="Field Of Study"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="grade">Grade</label>
                                    <select id="grade" class="form-control" name='grade' placeholder='Grade' required>
                                        <option selected>Choose...</option>
                                        <option>First Class/Distinction</option>
                                        <option>Second Class Upper/Upper Credit</option>
                                        <option>Second Class Lower/Lower credit</option>
                                        <option>Third Class</option>
                                        <option>Pass</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-group mb-3 col">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">CV Upload( *pdf
                                            *msword)</span>
                                    </div>
                                    <div class="custom-file">
                                        <input name="file" type="file">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn-success" value="submit" style='float: right; margin-bottom: 10px;margin-right: 20%;'>

                        </form>
                    </div>



    <div id='jobs' class='row'>
        <div class="panel-group wrap" id="bs-collapse">

            <?php if (!empty($jobs) && mysqli_num_rows($jobs) > 0) {
                $x = 1;
                            // output data of each row
                while ($row = mysqli_fetch_assoc($jobs)) { ?>

            <div class=" job-panel panel col-8 mb-3 shadow p-3 mb-5 border-0  rounded">
                <div class="job-title panel-heading w-50">Job Title:  
                    <?= $row['title'] ?>
                </div>
                <div class="panel-body">
                    <h5 class=" job-company panel-title">
                        <?= $row['name'] ?>
                    </h5>
                    <p class="panel-text float-right"><i>closing date:
                            <?= $row['date'] ?></i></p>
                            <button type="button" class="details btn rounded mt-5"
                            value=<?= $row['post_id']; ?> 
                            data-toggle="modal" data-target="#myModal-<?= $row['post_id']; ?>">
                        <span>View Details</span>
                    </button>

                </div>
            </div>

             
            <div class="modal fade" id="myModal-<?= $row['post_id']; ?>" data-backdrop="false">
                <div class="modal-dialog ">
                    <div class="modal-content" style="border: 0px solid rgba(0, 0, 0, 0.2);">
                        <div class="modal-header" style=" background-color: rgba(112, 202, 28, 0.5);">
                            <h4>Job Title: <span style="color:#889c80;"><?= $row['title'] ?></span></h4>
                        </div>
                        <div class="modal-body" style='padding: 0px 80px 0px 0px;'>
                            <p class="text-dark" style="color: rgba(50, 51, 48, 0.7);">
                                <?= $row['description'] ?>
                            </p>
                        </div>
                        <div class="modal-footer">
                        <a href="recruitment-and-selection-services.php"><button type="button" class="btn btn-default"style='position: absolute;top: 170;right: 120;'>Apply</button></a>
                            <button type="button" class="btn btn-default" data-dismiss="modal"style='position: absolute;top: 170;right: 50;'>Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
        }
    } ?>
        </div>
    </div>
</section>
<br>
<br>
<br>

<?php include_once('footer.php'); ?>

<script src="js/cv.js"></script>