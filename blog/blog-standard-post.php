<?php
include '../XownCMS/conn.php';

global $id;
global $post;
global $tagid;
$id = $_GET['id'];
$tagid = $_GET['tag'];
$post = $_GET['post'];

if (isset($_GET['post'])) {
    $postsql = "SELECT * FROM tb_blog where blogID =" . $id;
    $post = mysqli_query($conn, $postsql);

    $relatesql = "SELECT * FROM tb_blog INNER JOIN tb_blog_tag ON tb_blog.tag=tb_blog_tag.name WHERE NOT blogID = '$id' AND tagID =" . $tagid;
    $related = mysqli_query($conn, $relatesql);

}


$tagsql = "SELECT * FROM tb_blog_tag";
$tags = mysqli_query($conn, $tagsql);



if (isset($_POST) & !empty($_POST)) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    $fname = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];

    if (isset($fname)) {
        if (!empty($fname)) {
            $location = 'images/comment/';
            if (move_uploaded_file($temp_name, $location . $fname)) {
                $isql = "INSERT INTO tb_blog_comment (name, email, comment,avatar,blogID) VALUES ('$name', '$email', '$comment', '$fname', '$id')";
                $ires = mysqli_query($conn, $isql) or die(mysqli_error($conn));

                if ($ires) {
                    $smsg = "Your Comment Submitted Successfully";
                } else {
                    $fmsg = "Failed to Submit Your Comment";
                }
            }
        }
    } else {
        echo 'You should select a file to upload !!';
    }
}
    // // Select file type
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // //Valid file extensions
    // $extensions_arr = array("jpg", "jpeg", "png", "gif");


    // if (in_array($imageFileType, $extensions_arr)) {

    // }
$sql = "SELECT * FROM tb_blog_comment where blogID =" . $id;
$res = mysqli_query($conn, $sql);

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

    <?php if (!empty($post) && mysqli_num_rows($post) > 0) { ?>
    <?php $x = 1;
               // output data of each row
    while ($row = mysqli_fetch_assoc($post)) { ?>

    <!-- start page title section -->
    <section class="wow fadeIn bg-light-gray padding-35px-tb page-title-small top-space" style='margin: 73px 0px 0px;'>

        <div class="container">
            <div class="row equalize xs-equalize-auto">
                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                    <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                        <!-- start page title -->
                        <h1 class="alt-font text-extra-dark-gray font-weight-600 no-margin-bottom text-uppercase">
                            <?= $row['title']; ?>
                        </h1>
                        <!-- end page title -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 display-table text-right xs-text-left xs-margin-10px-top">
                    <div class="display-table-cell vertical-align-middle breadcrumb text-small alt-font">
                        <!-- breadcrumb -->
                        <ul class="xs-text-center text-uppercase">
                            <li>
                                    <?= $row['date']; ?></li>
                            <li><span class="text-dark-gray">by
                                        <?= $row['author']; ?></span></li>
                            <li class="text-dark-gray">
                                    <?= $row['tag']; ?></li>
                        </ul>
                        <!-- end breadcrumb -->
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- end page title section -->
    <!-- start post content section -->
    <section>

        <div class="container">
            <div class="row">
                <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">

                    <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">
                        <img src="../XownCMS/images/blog/<?= $row['image']; ?>" alt="" class="width-100 margin-45px-bottom">
                        <p><i>
                                <?= $row['subtitle']; ?></i></p>
                        <p>
                            <?= $row['article']; ?>
                        </p>

                       

                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 margin-seven-bottom margin-eight-top">
                        <div class="divider-full bg-medium-light-gray"></div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 sm-text-center">
                            <div class="tag-cloud margin-20px-bottom">
                            <?php if (!empty($tags) && mysqli_num_rows($tags) > 0) {
                                $x = 1;
                            // output data of each row
                                while ($tag = mysqli_fetch_assoc($tags)) { ?>
                            <a href="blog-grid.php?id=<?= $tag['tagID'] ?>&tag=<?= $tag['name'] ?>"><?= $tag['name'] ?></a>
                          
                            
                              <?php 
                            }
                        } ?>
                            </div>
                        </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 text-right sm-text-center">
                        <div class="social-icon-style-6">
                            <ul class="extra-small-icon">
                                <li><a class="likes-count" href="#" target="_blank"><i class="fas fa-heart text-deep-pink"></i><span
                                            class="text-small">300</span></a></li>
                                <li><a class="facebook" href="javascript:void(0)" onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=http://www.trustededgeconsult.com/blog/blog-standard-post.php')" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="twitter" href="javascript:void(0)" onclick="javascript:genericSocialShare('http://twitter.com/share?text=Trustededge%20Blog&url=http://www.trustededgeconsult.com/blog/blog-standard-post.php')" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="google" href="javascript:void(0)" onclick="javascript:genericSocialShare('https://plus.google.com/share?url=http://www.trustededgeconsult.com/blog/blog-standard-post.php')" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a class="linkedin" href="javascript:void(0)" onclick="javascript:genericSocialShare('http://www.linkedin.com/shareArticle?mini=true&url=http://www.trustededgeconsult.com/blog/blog-standard-post.php')" target="_blank"><i class="fab fa-linkedIn-in"></i></a></li>
                            </ul>
                        </div>
                    </div>


                    <!-- related POSTS -->

                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                    <div class="col-md-12 col-sm-12 col-xs-12 margin-lr-auto text-center margin-80px-tb sm-margin-50px-tb xs-margin-30px-tb">
                                <div class="position-relative overflow-hidden width-100">
                                    <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">Related Posts</span>
                                </div>
                            </div>
                        <!-- start post item -->
                        <?php if (!empty($related) && mysqli_num_rows($related) > 0) {
                            $x = 1;
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($related)) { ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 last-paragraph-no-margin sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn">
                            <div class="blog-post blog-post-style1 xs-text-center">
                                <div class="blog-post-images overflow-hidden margin-25px-bottom sm-margin-20px-bottom">
                                    <a href='blog-standard-post.php?post=<?= $row['tag'] ?>&id=<?= $row['blogID'] ?>&tag=<?= $row['tagID'] ?>'>
                                        <img src="../XownCMS/images/blog/<?= $row['image']; ?>" alt="">
                                    </a>
                                </div>
                                <div class="post-details">
                                    <span class="post-author text-extra-small text-medium-gray text-uppercase display-block margin-10px-bottom xs-margin-5px-bottom">
                                        <?= $row['date']; ?> | by 
                                            <?= $row['author']; ?></span>
                                    <p class="post-title text-medium text-extra-dark-gray width-100 display-block sm-width-100">
                                        <?= $row['title']; ?></p>
                                    <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb sm-margin-15px-tb"></div>
                                    <p class="width-90 xs-width-100">
                                        <?= $row['subtitle']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php 
                    }
                } ?>
                        <!-- end post item -->

                    </div>


                    <div class="col-md-12 col-sm-12 col-xs-12 margin-eight-top">
                        <div class="divider-full bg-medium-light-gray"></div>
                    </div>
                     <!-- comments session -->
                     <div class="col-md-12 col-sm-12 col-xs-12 blog-details-comments">
                        <?php if (!empty($res) && mysqli_num_rows($res) > 0) { ?>
                        <?php $x = 1;
                        $rows = mysqli_num_rows($res); ?>

                        <div class="width-100 margin-lr-auto text-center margin-80px-tb sm-margin-50px-tb xs-margin-30px-tb">
                            <div class="position-relative overflow-hidden width-100">
                                <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">
                                    <?= $rows ?> Comments</span>
                            </div>
                        </div>


                        <ul class="blog-comment">
                            <?php while ($row = mysqli_fetch_assoc($res)) { ?>

                            <li>
                                <div class="display-table width-100">
                                    <div class="display-table-cell width-100px xs-width-50px text-center vertical-align-top xs-display-block xs-margin-10px-bottom">
                                        <img src="images/comment/<?= $row['avatar']; ?>" class="img-circle width-85 xs-width-100" alt="" />
                                    </div>
                                    <div class="padding-40px-left display-table-cell vertical-align-top last-paragraph-no-margin xs-no-padding-left xs-display-block">
                                        <p class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small">
                                            <?= $row['name']; ?>
                                        </p>
                                        <a href="#comments" class="inner-link btn-reply text-uppercase alt-font text-extra-dark-gray">Reply</a>
                                        <div class="text-small text-medium-gray text-uppercase margin-10px-bottom">
                                            <?= $row['date']; ?>
                                        </div>
                                        <p>
                                            <?= $row['comment']; ?>
                                        </p>
                                    </div>
                                </div>

                            </li>
                            <?php 
                        }
                    } ?>
                        </ul>

                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 margin-eight-top" id="comments">
                        <div class="divider-full bg-medium-light-gray"></div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 margin-lr-auto text-center margin-80px-tb sm-margin-50px-tb xs-margin-30px-tb">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">Write
                                A Comment</span>
                        </div>
                    </div>

   
<form id='comment' method="post" enctype="multipart/form-data">

<div class="form-group col-lg-6">
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
</div>
<div class="form-group col-lg-6">
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
</div>
<div class="form-group col-lg-6">
    <label for="file">Upload Avatar(optional)</label>
    <input type="file" name="file" class="form-control" id="file">
</div>
<div class="form-group col-6">
    
    <textarea name="comment" class="form-control" rows="5" placeholder='enter your comment...'></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
              
<?php if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php 
                                                                                                    } ?>
<?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php 
                                                                                                } ?>
  
                    
                </main>
                <!-- right-sidebar -->
                <?php include_once('side-bar.php'); ?>
            </div>
        </div>
    </section>
    <!-- end blog content section -->
    <?php 
}
} ?>
    <!-- scroll to top -->
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
    <!-- end scroll to top  -->
    <footer>
<p>TrustedEdge Consult &copy; <?php echo date('Y'); ?></p>

</footer>


    <!-- javascript libraries -->
     <script type="text/javascript">
function genericSocialShare(url){
    window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
    return true;
}
</script>
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
    
<script src='https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js'></script>
<script src='https://matthewelsom.com/assets/js/libs/instafeed.min.js'></script>
</body>