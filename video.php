<head>
    <link rel="stylesheet" href="css/video.css">
</head>

<?php
include 'XownCMS/conn.php';

$videoSql = 'SELECT * FROM tb_youtube';
$videos = mysqli_query($conn, $videoSql);

?>

<?php include_once('header.php'); ?>
<section class="banner_area">
    <div class="container">
        <div class="banner_content">
            <h3>Videos</h3>
        </div>
    </div>
</section>


<div class="banner_link">
    <div class="container">
        <div class="abnner_link_inner">
            <a class="active" href="index.php">Home</a>
            <a href="video.php">Videos</a>
        </div>
    </div>
</div>
<br>
<br>
<br>
<section class="container videos">

    <div class="container">
   
        <div class="row">
            <div id="page-title" class="col-12 text-center mb-5">
                <h1>Video Gallery</h1>
            </div>
            <br>
            <ul>
            <?php if (!empty($videos) && mysqli_num_rows($videos) > 0) {
                $x = 1;
                // output data of each row
                while ($row = mysqli_fetch_assoc($videos)) { ?>
                <li  class=" video-box col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class='video'>
                <iframe src="<?= $row['url']; ?>" frameborder="0" allowfullscreen width="350" height="300"></iframe>
                <p style='color: rgb(100, 182, 33);'><?= $row['title']; ?></p>
                </div>
                </li>
                <?php 
            }
        } ?>
            </ul>
           
        </div>
           
   
    </div>
</section>
<br>
<br>

<script src="js/video.js"></script>

<?php include_once('footer.php'); ?>