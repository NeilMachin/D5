<?php
require('connect_db.php');
session_start();

$sql = "select user,password,access_level from d5_users where user='{$_POST['user']}' and password='{$_POST['password']}'";
if (!($result = $mysqli->query($sql))) {
    echo "<br>Error: " . $mysqli->error;
    exit();
}

if ($result->num_rows == 1) {
	$row = $result->fetch_assoc();
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['access_level'] = $row['access_level'];
	header("Location:index.php");
} else {
	header("Location:login.php");
}
