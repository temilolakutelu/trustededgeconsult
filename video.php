
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
<section class="videos container-fluid">
        <div class="pb-video-container">
                <div class="col-md-10 col-md-offset-1 row">
            
                    <div class="pb-row">
                        <?php if (!empty($videos) && mysqli_num_rows($videos) > 0) {
                                    $x = 1;
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($videos)) { ?>
                        <div class="col-md-3 pb-video mx-4">
                            <iframe class="pb-video-frame" width="100%" height="230" src="<?= $row['url']; ?>" frameborder="0" allowfullscreen></iframe>
                            <label class="form-control">
                                <?= $row['title']; ?></label>
                        </div>
                        <?php 
                                }
                            } ?>
            
                    </div>
            
            
                </div>
            </div>
            
</section>
<br>
<br>

<?php include_once('footer.php'); ?>