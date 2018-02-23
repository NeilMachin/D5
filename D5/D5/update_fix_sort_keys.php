<?php
require('connect_db.php');
session_start();

/*  
 *    Fix sort keys for any records where this value is null
 *
 *    Firstly get all rows where a fix is required, save to an array
 *    Then for each found build up the required key and update the record
 */
$fixesRequired = [];
$sql = "select category_parent, category_name from d5_catalogue where sort_key is null";
if (!($result = $mysqli->query($sql))) {
    echo "<br>Error: " . $mysqli->error;
    exit();
}
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$fixesRequired[] = ['category_parent' => $row['category_parent'], 
	                    'category_name'   => $row['category_name']];
}

foreach($fixesRequired as $row) {
	$thisCategoryParent = $row['category_parent'];
	$thisCategoryName   = $row['category_name'];
	$thisSortKey = "$thisCategoryParent/$thisCategoryName/";
	while($thisCategoryParent != 'catalogue') {
		$sql = "select distinct category_parent from d5_catalogue where category_name = '$thisCategoryParent'";
		if (!($result = $mysqli->query($sql))) {
		    echo "<br>Error: " . $mysqli->error;
		    exit();
		}
		if ($result->num_rows != 1) {
			echo "<br>Error creating key";
			exit();
		}
		$row = $result->fetch_assoc();
		$thisCategoryParent = $row['category_parent'];
		$thisSortKey = "$thisCategoryParent/$thisSortKey";
	}
	$sql = "update d5_catalogue set sort_key = '$thisSortKey' where category_name = '$thisCategoryName' and sort_key is null";
	if (!$result = $mysqli->query($sql)) {
   		echo "<br>Error: " . $mysqli->error;
   		exit;
   	}
}

header("Location:index.php");
