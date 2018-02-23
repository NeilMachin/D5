<?php
require('connect_db.php');
session_start();

$thisCategoryName = $_POST['category'];
$thisItemName = $_POST['item_name'];

/*  First check if an entry exists for this category with a null item 
 *  (i.e. a category that has a sub category, but does not have any items defined)
 *  If found then add the item to this row
 *  Otherwise insert a new row
 */
$sql = "select category_parent from d5_catalogue where category_name = '$thisCategoryName' and item_name is null";
if (!($result = $mysqli->query($sql))) {
    echo "<br>Error: " . $mysqli->error;
    exit();
}

if ($result->num_rows == 1) {
	$row = $result->fetch_assoc();
	$thisCategoryParent = $row['category_parent'];
	$sql = "update d5_catalogue set item_name = '$thisItemName' where category_parent = '$thisCategoryParent' and category_name = '$thisCategoryName'";
	if (!$result = $mysqli->query($sql)) {
   		echo "<br>Error: " . $mysqli->error;
   		exit;
   	}
} else {
	$sql = "select category_parent from d5_catalogue where category_name = '$thisCategoryName' limit 1";
	if (!($result = $mysqli->query($sql))) {
    	echo "<br>Error: " . $mysqli->error;
    	exit();
    }
    if ($result->num_rows == 1) {
    	$row = $result->fetch_assoc();
    	$thisCategoryParent = $row['category_parent'];
    	$sql = "insert into d5_catalogue (category_parent,category_name,item_name) values('$thisCategoryParent','$thisCategoryName','$thisItemName')";
    	if (!$result = $mysqli->query($sql)) {
   			echo "<br>Error: " . $mysqli->error;
   			exit;
   		}
   	}
}

header("Location:update_fix_sort_keys.php");
