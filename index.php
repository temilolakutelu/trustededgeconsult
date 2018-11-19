<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '46883479-abfb-4e07-b8e4-121af55614ae', f: true }); done = true; } }; })();</script>
<!-- Pull banners from the database -->

<?php
include 'XownCMS/conn.php';

$bannerSql = 'SELECT * FROM tb_banner WHERE bannerID = 1';
$banner = mysqli_query($conn, $bannerSql);

$bannerSql2 = 'SELECT * FROM tb_banner WHERE bannerID = 2';
$banner2 = mysqli_query($conn, $bannerSql2);

$bannerSql3 = 'SELECT * FROM tb_banner WHERE bannerID = 3';
$banner3 = mysqli_query($conn, $bannerSql3);
//$banners = mysqli_fetch_assoc($banners);

$testimonialSql = 'SELECT * FROM tb_testimonial';
$testimonials = mysqli_query($conn, $testimonialSql);


if (isset($_POST["name"]) || isset($_POST["email"])) {
    if (preg_match("/[^A-Za-z'-]/", $_POST['name'])) {
        die("invalid name and name should be alpha");
    }
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }
    $subscriptionsql = "INSERT INTO tb_subscription(name,email) VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "');";
    $conn->multi_query($subscriptionsql);
}

?>

<!-- Include the header -->
<?php

include_once('header.php');

?>

<!--================Slider Area =================-->
<section class="main_slider_area">
    <div id="main_slider3" class="rev_slider" data-version="5.3.1.6">
        <ul>
        <?php if (!empty($banner) && mysqli_num_rows($banner) > 0) { ?>
              <?php $x = 1;
               // output data of each row
                while ($row = mysqli_fetch_assoc($banner)) { ?>
            <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="500"
                data-thumb="img/banner/<?= $row['imageURL']; ?>" data-rotate="0" data-saveperformance="off" data-title="Creative"
                data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->
                <img src="img/banner/<?= $row['imageURL']; ?>" alt="" data-bgposition="center center" data-bgfit="cover"
                    data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                <!-- LAYER NR. 1 -->
                <div class="slider_text_box">
                    <div class="tp-caption tp-resizeme first_text" id="slide-1585-layer-1" data-x="['left','left','left','15','0']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['240','240','240','220','130']"
                        data-fontsize="['55','55','55','40','30']" data-lineheight="['59','59','59','50','40']"
                        data-width="['550','550','550','400']" data-height="none" data-whitespace="normal" data-type="text"
                        data-responsive_offset="on" data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']"><?= $row['textLine1']; ?> </div>

                    <div class="tp-caption tp-resizeme secand_text" id="slide-1586-layer-2" data-x="['left','left','left','15','0']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['384','384','384','340','225']"
                        data-fontsize="['18','18','18','18','16']" data-lineheight="['110','110','110','110']"
                        data-width="['550','550','550','550','300']" data-height="none" data-whitespace="normal"
                        data-type="text" data-responsive_offset="on" data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']"><?= $row['textLine2']; ?></div>

                    <div class="tp-caption tp-resizeme slider_button" id="slide-1587-layer-3" data-x="['left','left','left','15','0']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['460','460','460','425','330']"
                        data-fontsize="['14','14','14','14']" data-lineheight="['46','46','46','46']" data-width="none"
                        data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">

                    </div>
                </div>
            </li>
            <?php 
        }
    } ?>
     <?php if (!empty($banner2) && mysqli_num_rows($banner2) > 0) { ?>
              <?php $x = 1;
               // output data of each row
                while ($row2 = mysqli_fetch_assoc($banner2)) { ?>
            <li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="500"
                data-thumb="img/banner/<?= $row2['imageURL']; ?>" data-rotate="0" data-saveperformance="off" data-title="Creative"
                data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->
                <img src="img/banner/<?= $row2['imageURL']; ?>" alt="" data-bgposition="center center" data-bgfit="cover"
                    data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="slider_text_box">
                    <div class="tp-caption tp-resizeme first_text" id="slide-1588-layer-1" data-x="['left','left','left','15','0']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['240','240','240','220','130']"
                        data-fontsize="['55','55','55','40','30']" data-lineheight="['59','59','59','50','40']"
                        data-width="['550','550','550','400']" data-height="none" data-whitespace="normal" data-type="text"
                        data-responsive_offset="on" data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']"><?= $row2['textLine1']; ?></div>

                    <div class="tp-caption tp-resizeme secand_text" id="slide-1589-layer-2" data-x="['left','left','left','15','0']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['384','384','384','340','225']"
                        data-fontsize="['18','18','18','18','16']" data-lineheight="['26','26','26','26']" data-width="['550','550','550','550','300']"
                        data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']"><?= $row2['textLine2']; ?></div>

                    <div class="tp-caption tp-resizeme slider_button" id="slide-1590-layer-3" data-x="['left','left','left','15','0']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['460','460','460','425','330']"
                        data-fontsize="['14','14','14','14']" data-lineheight="['46','46','46','46']" data-width="none"
                        data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">

                    </div>
                </div>
            </li>
            <?php 
        }
    } ?>

<?php if (!empty($banner3) && mysqli_num_rows($banner3) > 0) { ?>
              <?php $x = 1;
               // output data of each row
                while ($row3 = mysqli_fetch_assoc($banner3)) { ?>
    <li data-index="rs-1589" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="500"
                data-thumb="img/banner/<?= $row3['imageURL']; ?>" data-rotate="0" data-saveperformance="off" data-title="Creative"
                data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->
                <img src="img/banner/<?= $row3['imageURL']; ?>" alt="" data-bgposition="center center" data-bgfit="cover"
                    data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>

                <!-- LAYER NR. 1 -->
                <div class="slider_text_box">
                    <div class="tp-caption tp-resizeme first_text" id="slide-1591-layer-1" data-x="['left','left','left','15','0']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['240','240','240','220','130']"
                        data-fontsize="['55','55','55','40','30']" data-lineheight="['59','59','59','50','40']"
                        data-width="['550','550','550','400']" data-height="none" data-whitespace="normal" data-type="text"
                        data-responsive_offset="on" data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']"><?= $row3['textLine1']; ?></div>

                    <div class="tp-caption tp-resizeme secand_text" id="slide-1592-layer-2" data-x="['left','left','left','15','0']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['384','384','384','340','225']"
                        data-fontsize="['18','18','18','18','16']" data-lineheight="['26','26','26','26']" data-width="['550','550','550','550','300']"
                        data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']"><?= $row3['textLine2']; ?></div>

                    <div class="tp-caption tp-resizeme slider_button" id="slide-1593-layer-3" data-x="['left','left','left','15','0']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['460','460','460','425','330']"
                        data-fontsize="['14','14','14','14']" data-lineheight="['46','46','46','46']" data-width="none"
                        data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">

                    </div>
                </div>
            </li>

            <?php 
        }
    } ?>
        </ul>
    </div>
</section>
<!--================End Slider Area =================-->

<!--================Our Service Area =================-->
<section class="our_service_area">
    <div class="container">
        <div class="section_title">
            <h2>EARN MORE WITH ONLY THREE STEPS</h2>
        </div>
        <div class="row service_inner">

            <div class="col-md-4 col-sm-6">
                <div class="service_item">
                    <div class="media">
                        <div class="media-title">
                            <h4>STEP 1</h4><br>
                            <div class="media-left">
                                <img src="img/icon/service-icon4.png" alt="">
                                <img src="img/icon/service-icon4-h.png" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    <h4>DESCRIBE YOUR PROBLEM</h4>
                                </a>
                                <p>You describe your problem we analyze the situation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="service_item">
                    <div class="media">
                        <div class="media-title-">
                            <h4>STEP 2</h4><br>
                            <div class="media-left">
                                <img src="img/icon/service-icon2.png" alt="">
                                <img src="img/icon/service-icon2-h.png" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    <h4>GET OUR HELP AND ADVISE</h4>
                                </a>
                                <p>We verify your problem and give you best advice for your needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="service_item">
                    <div class="media">
                        <div class="media-title-">
                            <h4>STEP 3</h4><br>
                            <div class="media-left">
                                <img src="img/icon/service-icon6.png" alt="">
                                <img src="img/icon/service-icon6-h.png" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    <h4>INCREASE YOUR SALES & PROFITS</h4>
                                </a>
                                <p>Start increasing your sales and profits thanks to our diagnosis. This is so easy!</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--================Latest News Area =================-->
<section class="latest_news_area">
    <div class="container">
        <div class="section_title">
            <h2>Training</h2>
        </div>
        <div class="row latest_news_inner">
            <div class="col-md-4 col-sm-6">
                <div class="latest_n_item">
                    <div class="l_n_image">
                        <img src="img/events8.jpg" alt="">
                        <div class="date">
                            <h5>27 <span>June</span></h5>
                        </div>
                    </div>
                    <a href="#">
                        <h4>FAIRS, EXHIBITIONS & SCHOOL VISITS</h4>
                    </a>
                    <a class="more_link" href="#">Read more</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="latest_n_item">
                    <div class="l_n_image">
                        <img src="img/events7.jpg" alt="">
                        <div class="date">
                            <h5>27 <span>June</span></h5>
                        </div>
                    </div>
                    <a href="#">
                        <h4>CAREER COUNSELLING</h4>
                    </a>
                    <a class="more_link" href="#">Read more</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="latest_n_item">
                    <div class="l_n_image">
                        <img src="img/events9.jpg" alt="">
                        <div class="date">
                            <h5>27 <span>June</span></h5>
                        </div>
                    </div>
                    <a href="#">
                        <h4>SCHOLARSHIP</h4>
                    </a>
                    <a class="more_link" href="#">Read more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Latest News Area =================-->

<br>
<br>
<br>

<!-- Here is the section -->


<section id="counter" class="counter">
    <div class="main_counter_area">
        <div class="overlay p-y-3">
            <div class="container">
                <div class="row">
                    <div class="main_counter_content text-center white-text wow fadeInUp">
                        <div class="col-md-3">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fa fa-building m-b-1"></i>
                                <h2 class="statistic-counter">100</h2>
                                <p>Clients</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fa fa-plus-square m-b-1"></i>
                                <h2 class="statistic-counter">400</h2>
                                <p>Trainer</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fa fa-group m-b-1"></i>
                                <h2 class="statistic-counter">312</h2>
                                <p>Training</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fa fa-pie-chart m-b-1"></i>
                                <h2 class="statistic-counter">480</h2>
                                <p>Consultaion</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End of counter Section -->


<!-- Add this script before </body> -->


<br>
<br>
<br>





<!--================Helpline Area =================-->
<section class="helpline_area">
    <div class="container">
        <div class="helpline_inner">
            <div class="media">
                <div class="media-left">
                    <img src="img/help-icon.png" alt="">
                </div>
                <div class="media-body">
                    <h6>Need consultation</h6>
                    <h4>start improving your business today</h4>
                    <p>Contact our customer support team if you have any further questions. We are heare to help you
                        out</p>
                    <div class="contact_d">
                        <a href="#">+234-705-041-5550</a>
                        <a href="#">info@trustededgeconsult.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Helpline Area =================-->





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

<!--================Testimonial Area =================-->
<section class="testimonial text-center" style=" background:url(img/testimonials-bg.jpg) center; background-size:cover;">
    <div class="container">
        <h2>Our Clients Are Happy!!!</h2>
        <div id="carousel">
            <div class="container">
                <div class="carousel slide" id="fade-carousel" data-ride="carousel" data-interval="3000">
                    <!-- Carousel indicators -->

                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <?php if (!empty($testimonials) && mysqli_num_rows($testimonials) > 0) {
                            $x = 1;
                // output data of each row
                            while ($row = mysqli_fetch_array($testimonials)) { ?>
                        <div class="item <?php echo $row['item']; ?>">

                            <div>
                                <p >
                                    <?= $row['content'] ?>
                                </p>
                                <span>
                                    <?= $row['name'] ?> </span><br>
                                <i>
                                    <?= $row['position'] ?> ,
                                    <?= $row['company'] ?></i>

                            </div>

                        </div>

                        <?php 
                    }
                } ?>


                    </div>
                    <a data-slide="prev" href="#fade-carousel" class="left carousel-control"><img src="img/icon/left.png" alt=""></a>
                    <a data-slide="next" href="#fade-carousel" class="right carousel-control"><img src="img/icon/right.png" alt=""></a>
                </div>

            </div>
        </div>
    </div>
</section>



<!--================End Testimonial Area =================-->
<!--================Partner Area =================-->
<section class="partner_area">
    <div class="container">
        <div class="partner_slider owl-carousel">
            <div class="item">
                <img src="img/partner-logo/dangote.jpg" alt="">
            </div>
            <div class="item">
                <img src="img/partner-logo/fbn.png" alt="">
            </div>
            <div class="item">
                <img src="img/partner-logo/forte.jpg" alt="">
            </div>
            <div class="item">
                <img src="img/partner-logo/lafarge.png" alt="">
            </div>
            <div class="item">
                <img src="img/partner-logo/pz.jpg" alt="">
            </div>
            <div class="item">
                <img src="img/partner-logo/seven.jpg" alt="">
            </div>
            <div class="item">
                <img src="img/partner-logo/uac.jpg" alt="">
            </div>
            <div class="item">
                <img src="img/partner-logo/ubn.png" alt="">
            </div>
        </div>
    </div>
</section>
<!--================End Partner Area =================-->
<!--================ Email Subscription PopUp Area =================-->
<div id="list-builder"></div>
<div id="popup-box">
    <i class="fa fa-times" id='popup-close'></i>
    <div id="popup-box-content">
        <h1>Subscribe to Our Newsletter</h1>
        <p>
            Stay up to date on the latest in our trainings plus receive exclusive content by
            subscribing to our newsletter.
        </p>
        <form id="popup-form" method='post' action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]); ?>">
            <input type="hidden" name="list" value="key_list_etc" />
            <input type="text" name="name" id="name" placeholder="Full Name" style='color: #2d2929;' required />
            <input type="text" name="email" id="email" placeholder="Email Address" style='color: #2d2929;' required />
            <button type="submit" name="subscribe">Subscribe</button>
        </form>
    </div>
</div>
<script>

</script>
<script src='js/subscription.js'></script>


<?php include_once('footer.php'); ?>