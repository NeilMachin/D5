<?php
require('connect_db.php');
session_start();

$thisCatId = $_GET['cat_id'];

/*  If this is the only item for this category then keep the record but remove the item
 *  Else delete the record
 */
$sql = "select b.category_name 
        from d5_catalogue a, d5_catalogue b 
        where a.cat_id = '$thisCatId' and b.category_name = a.category_name";
if (!($result = $mysqli->query($sql))) {
    echo "<br>Error: " . $mysqli->error;
    exit();
}

if ($result->num_rows == 1) {
    $sql = "update d5_catalogue set item_name = null where cat_id = '$thisCatId'";
} else {
    $sql = "delete from d5_catalogue where cat_id = '$thisCatId'";
}

if (!($result = $mysqli->query($sql))) {
    echo "<br>Error: " . $mysqli->error;
    exit();
}

header("Location:index.php");
