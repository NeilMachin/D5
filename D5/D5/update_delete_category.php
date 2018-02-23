<?php
require('connect_db.php');
session_start();

$thisCatId = $_GET['cat_id'];

/*  Not limitations on deleting a category. If a cat_id is passed the just delete the record
 */
$sql = "delete from d5_catalogue where cat_id = '$thisCatId'";
if (!($result = $mysqli->query($sql))) {
    echo "<br>Error: " . $mysqli->error;
    exit();
}

header("Location:index.php");
