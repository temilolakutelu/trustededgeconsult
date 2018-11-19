<link rel="stylesheet" href="css/register.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php
include 'XownCMS/conn.php';

//get training categories from db
$catSql = 'SELECT * FROM tb_training_category';
$category = mysqli_query($conn, $catSql);

//inserting feedback form input into db
if (isset($_POST["name"]) || isset($_POST["email"]) || isset($_POST["message"])) {

    $feedbacksql = "INSERT INTO tb_feedback(name,email,message) VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "','" . $_POST["message"] . "');";
    $conn->multi_query($feedbacksql);
}
//inserting register form input into db
if (isset($_POST["rname"]) || isset($_POST["remail"]) || isset($_POST["rtel"])) {

    $sql = "INSERT INTO tb_registered(trainee_name,email,mobile,course,category) VALUES ('" . $_POST["rname"] . "','" . $_POST["remail"] . "','" . $_POST["rtel"] . "','" . $_POST["rcourse"] . "','" . $_POST["course-category"] . "');";
    $conn->multi_query($sql);
}




$trainingSql = "SELECT * FROM tb_training";
$training = mysqli_query($conn, $trainingSql);

?>

<?php include_once('header.php'); ?>
<br>
<br>
<div class="banner_link">
    <div class="container">
        <div class="abnner_link_inner">
            <a class="active" href="index.php">Home</a>
            <a href="course-training">Our Team</a>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="register_landing">
        <div class="row">
            <div class="col-md-8">
                <p>Apply for</p>
                <br>
                <h2>OUR CUTTING EDGE</h2>
                <br>
                <p>Training Courses Today</p>
            </div>
            <fieldset>
               
               
            <form action="" method="post">

                    <div class="col-md-4">
                        <div class="register_box">
                            <h2>Register for your courses now!</h2>
                            <br>
                            <input type="text" placeholder="Full Names" name='rname'required>
                            <br>
                            <br>
                            <input type="email" placeholder="Email Address"name='remail'required>
                            <br>
                            <br>
                            <input type="tel" placeholder="Phone Number"name='rtel'required>
                            <br>
                            <br>
                            <label for="course-category" style='color:black;'>Select Course Category</label>
                            <select name="course-category" required id='category'>
                            <?php if (!empty($category) && mysqli_num_rows($category) > 0) {
                                $x = 1;
                                while ($row = mysqli_fetch_assoc($category)) { ?>
                                <option value='<?= $row['category_id'] ?>'><?= $row['name'] ?></option>
                               
                                <?php 
                            }
                        } ?>
                            </select>
                           
                            <br>
                            <br>
                            <label for="rcourse" style='color:black;'>Select Course</label>
                            <select name="rcourse" required id='course'>
                
                            <?php if (!empty($training) && mysqli_num_rows($training) > 0) {
                                $x = 1;
                                while ($row = mysqli_fetch_assoc($training)) { ?>

                                <option><?= $row['trainingTitle'] ?></option>
                               
                               <?php 
                            }
                        } ?>
                            </select>
                            <br>
                            <br>
                            <input type="submit" name='submit' value="Apply Now" class="button button1" />
                            
                            <br>
                            <br>
                            <br>

                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>


    <div class="hr_icon">
        <i class="fa fa-chevron-down"></i>
        <i class="fa fa-chevron-down"></i>
        <i class="fa fa-chevron-down"></i>
        <i class="fa fa-chevron-down"></i>
        <i class="fa fa-chevron-down"></i>
        <i class="fa fa-chevron-down"></i>
    </div>

    <br>
    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="section_team">
                <h2>why chose our courses?</h2>
                <p>We have lots of satisfied clients which includes - Dangote Group and Subsidiaries, Cordros Captital
                    Limited,
                    Vitafoam, Sovereign Trust Insurance, Forte Oil, Promasidor, Cardinal Stone Partners, Lafarge, PZ
                    Nutricimma, Union Bank, etc.</p>
            </div>
            <br>
            <div class="hr_icon">
                <i class="fa fa-chevron-down"></i>
                <i class="fa fa-chevron-down"></i>
                <i class="fa fa-chevron-down"></i>
                <i class="fa fa-chevron-down"></i>
                <i class="fa fa-chevron-down"></i>
                <i class="fa fa-chevron-down"></i>
            </div>
            <br>
            <br>
            <br>
            <br>



            <div class="container course_outline">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="panel-group wrap" id="bs-collapse">

                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#bs-collapse" href="#mgt_details">
                                        Management <i class="fa fa-arrow-circle-o-down "></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="mgt_details" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li>- Managing People for Strategic Performance</li>
                                        <li>- Delegation, Motivation and Coaching Skills</li>
                                        <li>-Advanced Supervisory Skills: The Management Development Programme</li>
                                    </ul>

                                </div>

                            </div>
                        </div>



                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#bs-collapse" href="#hr_details">
                                        Human Resources <i class="fa fa-arrow-circle-o-down "></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="hr_details" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li>- HR for Non HR Managers</li>
                                        <li>- Manpower Organization: Succession Planning and Trend Analysis</li>
                                    </ul>

                                </div>

                            </div>
                        </div>


                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#bs-collapse" href="#ms_details">
                                        Marketing and sales <i class="fa fa-arrow-circle-o-down "></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="ms_details" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li>- Essential Selling and Marketing Skills</li>
                                        <li>- Key Account Management and Solution Selling</li>
                                        <li>- Sales Master Class</li>
                                        <li>- Managing an Effective Sales Force</li>
                                        <li>- Brand Building and Brand Management</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#bs-collapse" href="#finance">
                                        Finance <i class="fa fa-arrow-circle-o-down "></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="finance" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li>- Account and Finance for Non Account Managers</li>
                                        <li>- Financial Modelling Using Excel Applications</li>
                                        <li>- Financial Management and Cost Control</li>
                                        <li>- Corporate Financial Planning: Budgeting and Control for Managers</li>
                                        <li>- Essentials of Budgeting: Budget Preparation Skills</li>
                                        <li>- Treasury Management Essentials in Turbulent Times</li>
                                        <li>- Treasury, Cash Flow and Working Management Capital</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#bs-collapse" href="#lrm_details">
                                        library and record management <i class="fa fa-arrow-circle-o-down "></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="lrm_details" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li>- Library Cataloguing Classification and Indexing</li>
                                        <li>- Record Management and Document Control for Capital Projects</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#bs-collapse" href="#bcm_details">
                                        banking and credit management <i class="fa fa-arrow-circle-o-down "></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="bcm_details" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li>- Basic Credit Analysis</li>
                                        <li>- Effective Treasury Management</li>
                                        <li>- Branch Management</li>
                                        <li>- Advanced Credit Analysis</li>
                                        <li>- Intermediate Credit Analysis</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#bs-collapse" href="#ic_details">
                                        international courses <i class="fa fa-arrow-circle-o-down "></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="ic_details" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li>- Risk Analysis and Management</li>
                                        <li>- Corporate and Business Performance Management</li>
                                        <li>- Sustainable Business Practice: Strategies for Growth</li>
                                        <li>- Tax Performance Advisory and Management</li>
                                        <li>- Process Improvement and Practical Advices for Growth</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end of #bs-collapse  -->

                </div>
            </div>

        </div>

        <div class="feedback-form col-lg-3 col-md-3 col-sm-2 col-xs-12">

            <form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]); ?>" method="post" id="feedback">
                <h1 style="color: #7eda2c;font-weight: bold;">Feedback Form</h1>
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required autofocus />
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="example@example.com" required />
                <label for="message">Message</label>
                <textarea id="message" id="message" name="message" required></textarea>
                <div class="g-recaptcha" data-sitekey="6LcHrnUUAAAAAEbQ1q26UlGY2bAtjJAtn5oypraD"></div>
                <input type="submit" name='submit' value="Submit" />
            </form>
        </div>
    </div>
</div>

<br>

<script> $(document).ready(function () {
        $('.collapse.in').prev('.panel-heading').addClass('active');
        $('#accordion, #bs-collapse')
            .on('show.bs.collapse', function (a) {
                $(a.target).prev('.panel-heading').addClass('active');
            })
            .on('hide.bs.collapse', function (a) {
                $(a.target).prev('.panel-heading').removeClass('active');
            });
    });

</script>

<script src='js/feedback.js'></script>

<?php include_once('footer.php'); ?>