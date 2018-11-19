<?php
include '../XownCMS/conn.php';

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

//"SELECT * FROM tb_blog LIMIT $offset, $no_of_records_per_page";
$blogsql = "SELECT * FROM tb_blog INNER JOIN tb_blog_tag ON tb_blog.tag=tb_blog_tag.name";
$tagsql = "SELECT * FROM tb_blog_tag";
$blogs = mysqli_query($conn, $blogsql);
$tags = mysqli_query($conn, $tagsql);

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
                    <div  class="row">
                        <!-- start logo -->
                        <div class="col-md-2 col-xs-5">
                        <a href="blog-index.php"><img src="../img/tec-logo-small.png" alt=""></a>
                        </div>
                        <!-- end logo -->
                        <div class="col-md-7 col-xs-2 width-auto pull-right accordion-menu xs-no-padding-right">
                            <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                                <span class="sr-only">toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-collapse collapse pull-right" id="navbar-collapse-toggle-1">
                                  <a href="../index.php">Back to Main site</a>
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
            </nav>
            <!-- end navigation --> 
        </header>
    <!-- start page title section -->
    <section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('images/parallax-bg39.jpg');">
        <div class="opacity-medium bg-extra-dark-gray"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                    <div class="display-table-cell vertical-align-middle text-center">
                        <!-- start page title -->
                        <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">Our
                            Blog</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title section -->
    <!-- start blog list section -->
    <section style='background: #f1f5f18f;padding: 50px 0;'>
        <div class="container-fluid padding-five-lr sm-padding-25px-lr xs-padding-15px-lr">
            <div id='blogP' class="row">
                <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom sm-padding-15px-lr">
                    <!-- start post item -->
                    <?php if (!empty($blogs) && mysqli_num_rows($blogs) > 0) {
                        $x = 1;
                            // output data of each row
                        while ($row = mysqli_fetch_assoc($blogs)) { ?>

                    <div class="equalize sm-equalize-auto blog-post-content margin-60px-bottom padding-60px-bottom display-inline-block border-bottom border-color-extra-light-gray sm-margin-30px-bottom sm-padding-30px-bottom xs-text-center sm-no-border">
                        <div class="blog-image col-md-5 no-padding sm-margin-30px-bottom xs-margin-20px-bottom margin-45px-right sm-no-margin-right display-table">
                            <div class="display-table-cell vertical-align-middle">
                                <a href="blog-standard-post.php"><img class='img-responsive img-fluid'  src="../XownCMS/images/blog/<?= $row['image']; ?>" alt=""></a>
                            </div>
                        </div>
                        <div class="blog-text col-md-6 display-table no-padding">
                            <div class="display-table-cell vertical-align-middle">
                                <div class="content margin-20px-bottom sm-no-padding-left ">
                                    <a href="blog-standard-post.php" class="text-extra-dark-gray margin-5px-bottom alt-font text-extra-large font-weight-600 display-inline-block"> <?= $row['title'] ?></a>
                                    <div class="text-medium-gray text-extra-small margin-15px-bottom text-uppercase alt-font"><span>By
                                            <span class="text-medium-gray"> <?= $row['author'] ?></span></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span> <?= $row['date'] ?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="blog-grid.php"
                                            class="text-medium-gray"> <?= $row['tag'] ?></a></div>
                                    <p class="no-margin width-95"> <?= $row['subtitle'] ?></p>
                                </div>
                             
                                <a class="btn btn-very-small btn-dark-gray text-uppercase" href='blog-standard-post.php?post=<?= $row['tag'] ?>&id=<?= $row['blogID'] ?>&tag=<?= $row['tagID'] ?>'>Continue
                                    Reading</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            } ?>
                    <!-- end post item -->
                    
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
                    <!-- end pagination -->
                </main>
                <!-- right-sidebar -->
                <?php include_once('side-bar.php'); ?>
            </div>
        </div>
    </section>
    <!-- end blog list section -->
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

