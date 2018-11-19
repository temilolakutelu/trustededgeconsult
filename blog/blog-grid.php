<?php
include '../XownCMS/conn.php';

global $id;
global $tag;
$id = $_GET['id'];
$tag = $_GET['tag'];


$postsql = "SELECT * FROM tb_blog  WHERE tag ='$tag'";
$posts = mysqli_query($conn, $postsql);


$blogsql = "SELECT * FROM tb_blog_tag  WHERE tagID =" . $id;
$blogs = mysqli_query($conn, $blogsql);

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 10;
$offset = ($pageno - 1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM tb_blog";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);


?>
<head>
    <!-- title -->
    <title>TrustedEdge Consult BLog</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="ThemeZaa">
    <!-- description -->
    <meta name="description" content="Trustededge Blog">
    <!-- keywords -->
    <meta name="keywords" content="trustededge">
    <!-- favicon -->
    <link rel="icon" href="../img/fav-1.png" type="image/x-icon" />
    <!-- animation -->
    <link rel="stylesheet" href="css/animate.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- et line icon -->
    <link rel="stylesheet" href="css/et-line-icons.css" />
    <!-- font-awesome icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <!-- themify icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- swiper carousel -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!-- justified gallery  -->
    <link rel="stylesheet" href="css/justified-gallery.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <!-- revolution slider -->
    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">
    <!-- bootsnav -->
    <link rel="stylesheet" href="css/bootsnav.css">
    <!-- style -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!--[if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
</head>

    <body>
        <!-- start header -->
        <header>
        <!-- start navigation -->
        <nav class="navbar navbar-default bootsnav navbar-top header-light bg-transparent nav-box-width white-link">
            <div class="container-fluid nav-header-container">
                <div class="row">
                    <!-- start logo -->
                    <div class="col-md-2 col-xs-5">
                        <a href="blog-index.php"><img src="../img/tec-logo-small.png" alt=""></a>
                    </div>
                    <!-- end logo -->
                    <div class="col-md-7 col-xs-2 width-auto pull-right accordion-menu xs-no-padding-right">
                        <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse"
                            data-target="#navbar-collapse-toggle-1">
                            <span class="sr-only">toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-collapse collapse pull-right" id="navbar-collapse-toggle-1">
                            <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal"
                                data-in="fadeIn" data-out="fadeOut">
                                <li class="megamenu-fw"><a href="../index.php">Back to Main site</a></li>
                                <li class="megamenu-fw"><a href="blog-index.php">Back to Blog</a></li>
                            </ul>


                        </div>
                    </div>
                    <div class="col-md-2 col-xs-5 width-auto">

                        <div class="header-social-icon xs-display-none">
                                <a href="https://www.facebook.com/trustededgeconsult/" title="Facebook" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/Trustededge" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/trustededge/" title="Twitter" target="_blank"><i class="fab fa-instagram"></i></a>
                                                       
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end navigation -->
    </header>

        <!-- end header -->
        
     <!-- start page title section -->
     <?php if (!empty($blogs) && mysqli_num_rows($blogs) > 0) { ?>
    <?php $x = 1;
               // output data of each row
    while ($row = mysqli_fetch_assoc($blogs)) { ?>
    <section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('images/parallax-bg39.jpg');">
        <div class="opacity-medium bg-extra-dark-gray"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                    <div class="display-table-cell vertical-align-middle text-center">
                        <!-- start page title -->
                        <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom" style='text-transform:uppercase;'><?= $row['name']; ?></h1>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
}
} ?>
    <!-- end page title section -->
       
        <!-- start post content section --> 
        <section class="wow fadeIn hover-option4 blog-post-style3">
            <div class="container"> 
                <div class="row equalize xs-equalize-auto">
                    <!-- start post item -->
                    <?php if (!empty($posts) && mysqli_num_rows($posts) > 0) { ?>
    <?php $x = 1;
               // output data of each row
    while ($row = mysqli_fetch_assoc($posts)) { ?>
                    <div id='blog-grid' class="grid-item col-md-4 col-sm-6 col-xs-12 margin-30px-bottom xs-text-center wow fadeInUp">
                        <div class="blog-post inner-match-height tag-post">
                            <div class="blog-post-images overflow-hidden position-relative">
                                <a href="blog-standard-post.php?post=<?= $row['tag'] ?>&id=<?= $row['blogID'] ?>&tag=">
                                    <img src="../XownCMS/images/blog/<?= $row['image']; ?>" alt="">
                                    <div class="blog-hover-icon"><span class="text-extra-large font-weight-300">+</span></div>
                                </a>
                            </div>
                            <div class="post-details padding-40px-all sm-padding-20px-all" style='padding: 8px;'>
                                <a href="blog-standard-post.php?post=<?= $row['tag'] ?>&id=<?= $row['blogID'] ?>&tag=<?= $row['tagID'] ?>" class="alt-font post-title text-medium text-extra-dark-gray width-100 display-block md-width-100 margin-15px-bottom"> <?= $row['title']; ?></a>
                                <p style='font-size: 11px;'> <?= $row['subtitle']; ?></p>
                                <div class="separator-line-horrizontal-full bg-medium-gray margin-20px-tb"></div>
                                <div class="author">
                                    <span class="text-medium-gray text-uppercase text-extra-small display-inline-block sm-display-block sm-margin-10px-top">by <span class="text-medium-gray"> <?= $row['author']; ?></span>&nbsp;&nbsp;|&nbsp;&nbsp; <?= $row['date']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post item -->
                    <?php 
                }
            } ?>
                </div>
                             <!-- start pagination -->
                             <div class="col-md-12 col-sm-12 col-xs-12 text-center margin-100px-top sm-margin-50px-top position-relative wow fadeInUp">
                        <div class="pagination text-small text-uppercase text-extra-dark-gray">
                            <ul>
                            <li><a href="?pageno=1">First</a></li>
                                <li class="<?php if ($pageno <= 1) {
                                                echo 'disabled';
                                            } ?>"><a href="<?php if ($pageno <= 1) {
                                                                echo '#';
                                                            } else {
                                                                echo "?pageno=" . ($pageno - 1);
                                                            } ?>"><i class="fas fa-long-arrow-alt-left margin-5px-right xs-display-none"></i>
                                        Prev</a></li>
                                
                                <li class="<?php if ($pageno >= $total_pages) {
                                                echo 'disabled';
                                            } ?>"><a href="<?php if ($pageno >= $total_pages) {
                                                                echo '#';
                                                            } else {
                                                                echo "?pageno=" . ($pageno + 1);
                                                            } ?>">Next <i class="fas fa-long-arrow-alt-right margin-5px-left xs-display-none"></i></a></li>
                                                              <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                            </ul>

                        </div>

                        
                    </div>
                   
            </div>

            <!-- right-sidebar -->
        
        </section>
        <!-- end blog content section -->  
        
        <!-- start footer --> 
        <footer>
<p>TrustedEdge Consult &copy; <?php echo date('Y'); ?></p>

</footer>
        <!-- start scroll to top -->
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
    <!-- end scroll to top  -->
    <!-- javascript libraries -->
    <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/modernizr.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/skrollr.min.js"></script>
        <script type="text/javascript" src="js/smooth-scroll.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <!-- menu navigation -->
        <script type="text/javascript" src="js/bootsnav.js"></script>
        <script type="text/javascript" src="js/jquery.nav.js"></script>
        <!-- animation -->
        <script type="text/javascript" src="js/wow.min.js"></script>
        <!-- page scroll -->
        <script type="text/javascript" src="js/page-scroll.js"></script>
        <!-- swiper carousel -->
        <script type="text/javascript" src="js/swiper.min.js"></script>
        <!-- counter -->
        <script type="text/javascript" src="js/jquery.count-to.js"></script>
        <!-- parallax -->
        <script type="text/javascript" src="js/jquery.stellar.js"></script>
        <!-- magnific popup -->
        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
        <!-- portfolio with shorting tab -->
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <!-- images loaded -->
        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
        <!-- pull menu -->
        <script type="text/javascript" src="js/classie.js"></script>
        <script type="text/javascript" src="js/hamburger-menu.js"></script>
        <!-- counter  -->
        <script type="text/javascript" src="js/counter.js"></script>
        <!-- fit video  -->
        <script type="text/javascript" src="js/jquery.fitvids.js"></script>
        <!-- equalize -->
        <script type="text/javascript" src="js/equalize.min.js"></script>
       
        <!-- instagram -->
        <script type="text/javascript" src="js/instafeed.min.js"></script>
        <!-- revolution slider extensions (load below extensions JS files only on local file systems to make the slider work! The following part can be removed on server for on demand loading) -->
        <!--<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>-->
        <!-- setting -->
        <script type="text/javascript" src="js/main.js"></script>
            </body>
