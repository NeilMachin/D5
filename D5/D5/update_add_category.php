<?php
require('connect_db.php');
session_start();

$thisCategoryName   = $_POST['category_name'];
$thisCategoryParent = $_POST['category_parent'];

$sql = "insert into d5_catalogue (category_parent, category_name) values ('$thisCategoryParent','$thisCategoryName')";
	if (!$result = $mysqli->query($sql)) {
   		echo "<br>Error: " . $mysqli->error;
   		echo "<br>$sql";
   		exit;
   	}

header("Location:update_fix_sort_keys.php");
