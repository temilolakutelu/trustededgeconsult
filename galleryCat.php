
<?php
include 'XownCMS/conn.php';

if (isset($_GET["photos"])) {
  $page = $_GET["photos"];
  $gal = "SELECT * FROM tb_gallery where gal_category = $page";
  $gals = mysqli_query($conn, $gal);

} else {

  $bannerSql = 'SELECT * FROM tb_gallery_category';
  $gallerys = mysqli_query($conn, $bannerSql);

}
?> 

<?php include_once('header.php'); ?>
<section class="banner_area">
  <div class="container">
    <div class="banner_content">
      <h3>Gallery</h3>
    </div>
  </div>
</section>


<div class="banner_link">
  <div class="container">
    <div class="abnner_link_inner">
      <a class="active" href="index.php">Home</a>
      <a href="galleryCat.php">Gallery</a>
    </div>
  </div>
</div>
<br>
<br>
<br>

<section id='gallery_section' class='container-fluid'>
  <ul id='gallery_box' class='container'>
  <?php if (!empty($gallerys) && mysqli_num_rows($gallerys) > 0) {
    $x = 1;
                // output data of each row
    while ($row = mysqli_fetch_assoc($gallerys)) { ?>
    <div class="responsive">
      <div class="gallery">
        <a href="gallery?photos=<?= $row['id'] ?>">
          <img src="XownCMS/images/thumbnail/<?= $row['image']; ?>"  alt="Events 1">
        </a>
        <div class="desc"> <p class="text-center"><?= strtoupper($row['name']); ?></p></div>
      </div>
    </div>
    <?php 
  }
} ?>

    <div class="clearfix"></div>
</ul>
</section>



<?php include_once('footer.php'); ?>