<?php include '../XownCMS/conn.php';

if (isset($_POST["name"]) || isset($_POST["email"])) {
    // if (preg_match("/[^A-Za-z'-]/", $_POST['name'])) {
    //     die("invalid name and name should be alpha");
    // }
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    $subscriptionsql = "INSERT INTO tb_subscription(name,email) VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "');";
    $conn->multi_query($subscriptionsql);
}

// $blogsql = "SELECT * FROM tb_blog_tag";
// $blogs = mysqli_query($conn, $blogsql);

$blogsql = "SELECT * FROM tb_blog_tag";
$blogs = mysqli_query($conn, $blogsql);
?>


<aside class="col-md-3 pull-right">
                   
                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                        <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase text-small font-weight-600 aside-title"><span>About
                                TrustedEdge</span></div>
                        <a href="../about-us.php"><img src="../img/tec-logo-small.png" alt="" class="margin-25px-bottom" /></a>
                        <p class="margin-20px-bottom text-small">We are a solutions and technology company, and we apply unbeatable and unique approaches to
                            identifying and filling-up gaps in clients’ business processes.</p>
                        <a class="btn btn-very-small btn-dark-gray text-uppercase" href="../about-us.php">About Author</a>
                        </div>
                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                        <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Follow
                                Us</span></div>
                        <div class="social-icon-style-1 text-center">
                            <ul class="extra-small-icon">
                                <li><a class="facebook" href="https://www.facebook.com/trustededgeconsult/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="twitter" href="https://twitter.com/Trustededge" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="google" href="http://google.com/" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a class="linkedin" href="https://www.linkedin.com/in/trusted-edge-5b4b2b105/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a class="instagram" href="https://www.instagram.com/trustededge/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        </div>
                   
                        <div class="bg-deep-pink padding-30px-all text-white text-center margin-45px-bottom xs-margin-25px-bottom">
                        <i class="fas fa-quote-left icon-small margin-15px-bottom display-block"></i>
                        <span class="text-extra-large font-weight-300 margin-20px-bottom display-block">The future
                            belongs to those who believe in the beauty of their dreams.</span>
                        <a class="btn btn-very-small btn-transparent-white border-width-1 text-uppercase" href="../register.php">Explore
                            Our Trainings</a>
                        </div>
                       
                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                        <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>blogs
                                cloud</span></div>
                        <div class="tag-cloud">
                        <?php if (!empty($blogs) && mysqli_num_rows($blogs) > 0) {
                            $x = 1;
                            // output data of each row
                            while ($tag = mysqli_fetch_assoc($blogs)) { ?>
                            <a href="blog-grid.php?id=<?= $tag['tagID'] ?>&tag=<?= $tag['name'] ?>"><?= $tag['name'] ?></a>
                          
                            
                              <?php 
                            }
                        } ?>
                        </div>
                    </div>

                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                        <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Newsletter</span></div>
                        <div class="display-inline-block width-100">
                        <form method='post' action="">
                                <div class="position-relative">
                                
            
            <input type="text" name="name" id="name" placeholder="Full Name" style='color: #2d2929;' required />
            <input type="text" name="email" id="email" placeholder="Email Address" style='color: #2d2929;' required />
            <button type="submit" name="subscribe" style='background-color: #3e790e;color: #78d625;font-weight: bold;'>Subscribe</button>
       
                                </div>
                            </form>
                        </div>
                        </div>
                        <div>
                        <!-- <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Instagram</span></div>
                        <div class="instagram-follow-api">
                            <ul id="instaFeed-aside"></ul>
                        </div> -->

</div>
                        </div>
                    </aside>

