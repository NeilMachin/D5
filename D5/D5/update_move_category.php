<?php
require('connect_db.php');
session_start();
foreach($_POST as $k => $v) {echo "<br>$k => $v";}
$thisCategoryName   = $_POST['category_name'];
$thisCategoryParent = $_POST['category_parent'];

/*  First find the level for this parent category then create the record
 */
$sql = "update d5_catalogue set category_parent = '$thisCategoryParent', sort_key = null where category_name = '$thisCategoryName'";
if (!($result = $mysqli->query($sql))) {
    echo "<br>Error: " . $mysqli->error;
    exit();
}

header("Location:update_fix_sort_keys.php");
