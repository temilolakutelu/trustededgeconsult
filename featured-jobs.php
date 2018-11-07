<link href="css/jobs.css" rel="stylesheet">

<?php
include 'XownCMS/conn.php';
$job = "SELECT * FROM tb_post_job";
$jobs = mysqli_query($conn, $job);
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
        </div>
    </div>
</div>
<br>
<br>
<br>

<section id="search" class="container">
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
                            <button type="button" class="btn btn-default" data-dismiss="modal"style='margin: 80px 65px;'>Close</button>
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

