<?php

$servername = "1000folds.com";
$username = "trusted";
$password = "qwas_098@2@";
$database = "trusted";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo 'error in conection';
}