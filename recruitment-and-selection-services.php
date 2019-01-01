

<?php
include 'XownCMS/conn.php';

if (isset($_POST['submit'])) {

    $location = 'uploads/';

    $fileName = $_FILES['file']['name'];
    $tmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];

    if ($fileType == "application/pdf") {
        if (move_uploaded_file($tmpName, $location . $fileName)) {
            $filesql = "INSERT INTO tb_cv(fullname,email,qualification,field,grade,url,type)VALUES('" . $_POST["fname"] . "','" . $_POST["email"] . "','" . $_POST["qual"] . "','" . $_POST["field"] . "','" . $_POST["grade"] . "','$fileName','$fileType')";

            if (mysqli_query($conn, $filesql)) {
                $success = 'cv uploaded successfully';
            }
            $conn->close();
            
            // $conn->multi_query($filesql);
        } else {

            echo "<p>Upload Failed.</p>";
        }


    } else {
        $exmsg = 'cv must be uploaded in PDF format';
    }
}
?>


<?php include_once('header.php') ?>
<section class="banner_area banner_area2">
    <div class="container">
        <div class="banner_content">
            <h3>Registration & Selection Services</h3>
        </div>
    </div>
</section>
<div class="banner_link">
    <div class="container">
        <div class="abnner_link_inner">
            <a class="active" href="index.php">Home</a>
            <a href="recruitment-and-selection-services.php">Registration & Selection Services</a>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="course_outline">
        <div class="row">
            <div class="col-md-6">
                <div class="zoom">
                    <img src="img/services/selection-services.jpg">

                    <div id="cv">
                        <!-- CV Submission toggle -->
                        <button id="Mybtn" class="btn cv-btn">Submit your CV</button>
                        <?php
                        if (isset($success)) {
                            echo "<div style='color: grey;'>" . $success . "</div>";
                        }
                        ?>
                        <!-- Cv submission form -->
                        <form id="myform" method="post" action="" enctype="multipart/form-data">
                            <i class="fa fa-times" id='form-close'></i>

                            <div class="row">

                                <div class="col-4">
                                    <label class="control-label" for="fname">Full Name</label>
                                    <input type="text" class="form-control" name='fname' required>
                                </div>
                                <div class="col-4">
                                    <label class="control-label" for="email">Email</label>
                                    <input type="text" class="form-control" name='email' required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-4">
                                    <label for="qualifications">Qualification</label>
                                    <select id="qualifications" class="form-control" name='qual' required>
                                        <option selected>Choose...</option>
                                        <option>Degree</option>
                                        <option>Masters'</option>
                                        <option>PostGraduate</option>
                                        <option>HND</option>
                                        <option>OND</option>

                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="fiels">Field Of Study</label>
                                    <input type="text" class="form-control" name='field' placeholder="Field Of Study"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="grade">Grade</label>
                                    <select id="grade" class="form-control" name='grade' placeholder='Grade' required>
                                        <option selected>Choose...</option>
                                        <option>First Class/Distinction</option>
                                        <option>Second Class Upper/Upper Credit</option>
                                        <option>Second Class Lower/Lower credit</option>
                                        <option>Third Class</option>
                                        <option>Pass</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-group mb-3 col">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">CV Upload( *pdf
                                            *msword)</span>
                                    </div>
                                    <div class="custom-file">
                                        <input name="file" type="file">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn-success" value="submit">

                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <h3 style="color: rgb(148, 212, 43);">Recruitment And Selection Services</h3>
                <p>Our recruitment and selection services provide timely, effective and high quality services to assist
                    our clients to recruit the right staff to meet current needs and future challenges.</p>
                <p style="color: rgb(148, 212, 43);">Recruitment Options</p>
                <ul style="color: #898989;">
                    <li>General Recruitment</li>
                    <li>Specialised Recruitment</li>
                    <li>Head Hunting - Executive Search</li>
                </ul>
                <p>Consultants from Trusted Edge Consult are experienced in all aspects of the recruitment and
                    selection process and adopt global best practise in doing so whilst also not neglecting local
                    requirements and the peculiarities of the sector/industry our clients operate in.</p>
                <p>We offer both permanent and temporary recruitment services to our clients, either supplying
                    candidates for direct recruitment or as an outsourced service, depending on our client’s choice.</p>
                <p>Our search to fill your position began long before your need arose. Our global executive talent bank
                    of over 200,000 already filtered candidates lets us quickly identify the right candidates much
                    faster than traditional executive headhunters do.</p>
                <p>These candidates were carefully selected from over 1,000,000 applications. They are available for
                    temporary management, permanent executive recruitment, or project management, in any type of
                    executive role you may require: Managing Directors, CEOs, CFOs, CROs and Human Resources experts
                    through to Marketing Directors, National Sales Manager Call Centre Managers, Sales Directors,
                    Operations Managers, Supply Chain specialists, and more.</p>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<?php include_once('footer.php') ?>

<script src="js/cv.js"></script>