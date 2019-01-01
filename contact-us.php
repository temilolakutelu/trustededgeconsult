<?php 
//inserting contact form input into db
if (isset($_POST["name"]) || isset($_POST["email"]) || isset($_POST["message"])) {

    $sql = "INSERT INTO tb_feedback(name,email,message) VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "','" . $_POST["message"] . "');";
    $conn->multi_query($sql);
}?>

<?php  include_once('header.php');?>
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h3>Contact Us</h3>
                </div>
            </div>
        </section>
        <div class="banner_link">
            <div class="container">
                <div class="abnner_link_inner">
                    <a class="active" href="index.php">Home</a>
                    <a href="contact-us.php">Contact Us</a>
                </div>
            </div>
        </div>
        <!--================End Banner Area =================-->
        
        <!--================Contact Us Area =================-->
        <section class="contact_us_area">
            <div class="container">
                <div class="contact_us_inner">
                    <div class="section_title">
                        <h2>Stay in touch with us</h2>
                        <p>To stay in touch, fill the form below and a Trusted Edge representative will get in touch with you.</p>
                        <p>We work from Monday till Friday from 9:00 a.m. to 6:00 p.m.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <form class="contact_us_form" action="" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name"required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message" required></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" name="submit" value="submit" class="btn green_submit_btn form-control">submit now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="our_about_image">
                                <img src="img/contact-us.jpg" alt="" class="img-responsive img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact_us_details">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="c_details_item">
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="media-body">
                                        <p>294B, Surulere Way, Dolphin Estate, Ikoyi, Lagos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="c_details_item">
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="#">trustededge@trustededgeconsult.com</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="c_details_item">
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="#">+234-705-041-5550 </a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Contact Us Area =================-->
        
        <!--================Map Area =================-->
        <div class="mapouter"><div class="gmap_canvas"><iframe width="1500" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=Blk%20A6%2C%20Suite%20127%2CSura%20Shopping%20Complex%2CSimpson%20Street%2C%20Lagos%2C%20Nigeria.&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{text-align:center;height:300px;width:1500px;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:1500px;}</style></div>
        <!--================End Map Area =================-->
        
        <!--================Get In Consultation Area =================-->
        <section class="get_consult_area">
            <div class="container">
                <div class="pull-left">
                    <h3>Find the Solution That Best Fits Your Business</h3>
                </div>
                <div class="pull-right">
                    <a class="submit_btn" href="#">get free consultation</a>
                </div>
            </div>
        </section>
        <!--================End Get In Consultation Area =================-->
        
    
        
        <!--================Contact Success and Error message Area =================-->
        <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                        <h2 class="modal-title">Thank you</h2>
                        <p class="modal-subtitle">Your message is successfully sent...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals error -->

        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                        <h2 class="modal-title">Sorry !</h2>
                        <p class="modal-subtitle"> Something went wrong </p>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Contact Success and Error message Area =================-->
        
        
        <?php include_once('footer.php');?>
