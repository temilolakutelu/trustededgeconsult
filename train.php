<?php include 'XownCMS/conn.php';
$cat = '2';
//var_dump($cat);
$trainingSql = "SELECT * FROM tb_training WHERE category_id='.$cat.'";

$trainings = mysqli_query($conn, $trainingSql);

$projects = array();
while ($project = mysqli_fetch_assoc($trainings)) {
    $projects[] = $project;
}

//var_dump($projects);
foreach ($projects as $project) {
    echo "<option value='" . $project['trainingID'] . "'>" . $project['trainingTitle'] . "</option>";
}
?>