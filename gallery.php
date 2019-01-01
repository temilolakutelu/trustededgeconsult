<head>
  <!-- <link rel="stylesheet" href="css/gallery.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="js/gallery.js"></script>
</head>

<?php
include 'XownCMS/conn.php';
if (isset($_GET["photos"])) {
  $page = $_GET["photos"];
  $gal = "SELECT * FROM tb_gallery where gal_category = $page";
  $gals = mysqli_query($conn, $gal);
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
      <a href="galleryCat.php">Gallery Category</a>
    </div>
  </div>
</div>
<br>
<br>
<br>

<section id='gallery' class='container-fluid'>
  <div id=" gallery_list" class="row container mx-auto">
                
                <?php if (!empty($gals) && mysqli_num_rows($gals) > 0) { ?>
              <?php $x = 1;
               // output data of each row
              while ($row = mysqli_fetch_assoc($gals)) { ?>

    <div class="col-lg-3 col-md-4 col-xs-12 thumb  bg-white rounded"> 
      <a class="thumb" href="#" data-toggle="modal" data-image-id=''
       data-image="XownCMS/images/picture/<?= $row['path']; ?>"
        data-target="#image-gallery<?= $row['gallery_id']; ?>"
        value=<?= $row['gallery_id']; ?> >
        <img class="img-responsive img-fluid" 
        src="XownCMS/images/picture/<?= $row['path']; ?>" alt="gallery picture">
        <div class='desc'><?= $row['gal_title']; ?></div>
      </a>
    </div>
     
    <p><a href="#popup" class="popup-link"></a></p>
    <!-- Use invisible wraper to hide popup window content -->
    <div style="display:none;">
      <div id="popup">
        <h3>Popup content</h3>
        <p>Some text for popup window.</p>
        <p><button type="button" class="close-button">Close</button></p>
      </div>
      </div>


   
   
     <?php 
  }
} ?>
</div>

</section>
<br>
<br>
  

<?php include_once('footer.php'); ?>