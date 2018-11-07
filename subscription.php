<?php
include 'XownCMS/conn.php';

$subscriptionsql = "INSERT INTO tb_subscription (name,email) VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "');";
$conn->multi_query($subscriptionsql);

?>