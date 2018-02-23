<?php
    $host_name  = "localhost";
    $user_name  = "****";
    $password   = "****";
    $database   = "****";

$mysqli = new mysqli($host_name, $user_name, $password, $database);

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

mysqli_set_charset($mysqli,'utf8');