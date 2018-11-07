<?php  

include 'XownCMS/conn.php';

//echo $status;

$id = $_GET['pageID'];
//echo $id;

$query = "select * from tb_page_content where shortURL='{$id}'";
$result = mysqli_query($conn, $query);
$numOfRow = mysqli_num_rows($result);
if ($numOfRow == 1) {
    $arr = mysqli_fetch_array($result);
    $pageTitle = $arr['pageTitle'];
    $pageID = $arr['pageID'];
    $pageContent = html_entity_decode($arr['pageContent']);
    $meta_data = $arr['pageMetaData'];
// $ID=$arr['id'];
} else {
//echo $query;
header('location:404');
}

$title=$pageTitle;
?>

<?php
include_once('header.php'); 
?>

<div class="banner_link">
            <div class="container">
                <div class="abnner_link_inner">
                    <a class="active" href="../">Home</a>
                    <a href="<?= $id; ?>"><?=  $pageTitle; ?></a>
                </div>
            </div>        
</div>
<section class="about">
    <?= $pageContent; ?>
</section>

<?php include_once('footer.php'); ?>
