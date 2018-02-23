<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css" />
<style>
	.category_name {
		font-size: 16px;
		color: rgb(40,40,40);
	}

	.category_name_first {
		font-size: 16px;
		color: blue;
		background: rgb(240,240,240);
		padding: 4px;
		margin-bottom: 10px;
	}

	.item_name {
		font-size: 20px;
		color: rgb(140,140,140);
	}

	.input_outer {
		border: 1px solid black;
		background: white; 
		margin-top: 30px;
		width: 100%;
	}

	.input_outer td {
		padding: 5px;
	}

	.input_outer th {
		 text-align: center;
	}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>DotFive - Coding test</title>
<?php
require('connect_db.php');
session_start();
if (!(isset($_SESSION['user']))) {header("Location:login.php");}
?>
</head>

<body>

<?php
    //  Get list of categories in the data, for use in select drop downs
	$dataAllCategories = [];
	$dataUsableCategories = [];
    $sql = "select distinct category_name from d5_catalogue";
	if (!($result = $mysqli->query($sql))) {
	    echo "<br>Error: " . $mysqli->error;
    	exit();
	} else {
		while($selected = $result->fetch_assoc()) {
    		$dataAllCategories[] = $selected['category_name'];
    		if ($selected['category_name'] != 'catalogue' ) {
    			$dataUsableCategories[] = $selected['category_name'];
    		}
    	}
	}

	//  Select a list of categories which are available to delete - i.e. no items attached and no child categories
	$sql = "select cat_id from d5_catalogue where item_name is null and category_name not in (select category_parent from d5_catalogue)";
	if (!($result = $mysqli->query($sql))) {
	    echo "<br>Error: " . $mysqli->error;
    	exit();
	}
	while($row = $result->fetch_assoc()) {
		$deletableCategories[$row['cat_id']] = "Y";
	}

    //  Read all catalogue data ordered by sort key.
    //  If empty then insert an initial row and reselect
    //  Save to to an array for later display
	$sql = "select cat_id, category_parent, category_name, item_name, sort_key from d5_catalogue order by sort_key";
	if (!($result = $mysqli->query($sql))) {
	    echo "<br>Error: " . $mysqli->error;
    	exit();
	}
	if ($result->num_rows == 0) {
		$sql = "insert into d5_catalogue (category_parent,category_name,item_name,sort_key) values('catalogue','catalogue',null, 'catalogue/')";
		if (!($result = $mysqli->query($sql))) {
		    echo "<br>Error: " . $mysqli->error;
	    	exit();
	    }
	   	$sql = "select cat_id, category_parent, category_name, item_name, sort_key from d5_catalogue order by sort_key";
		if (!($result = $mysqli->query($sql))) {
	    	echo "<br>Error: " . $mysqli->error;
    		exit();
		}
		$dataAllCategories[] = 'catalogue';
	}
	$data = [];
	while($selected = $result->fetch_assoc()) {
        $data[] = $selected;
    }
?>

<section id="container">
	<header>
	    <div style="font-size: 24px">
	        DotFive Coding Test
	    </div>
	    <div>
	        <a href='logoff_action.php'>Logoff</a>
	    </div>
	</header>
	
	<main>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-1"></div>
  				<div class="col-sm-6">
					<?php
					    $fill = "&nbsp;&nbsp;&nbsp;&nbsp;";
						$lastCategoryName = "";
						foreach($data as $row) {
							$thisCatId          = $row['cat_id'];
							$thisCategoryParent = $row['category_parent'];
							$thisCategoryName   = $row['category_name'];
							$thisItemName       = $row['item_name'];
							$thisSortKey        = $row['sort_key'];
							$indent = max(substr_count($thisSortKey, '/'), 1);

							if ($thisCategoryName != $lastCategoryName) {
								echo "<br>";
								if(isset($deletableCategories[$thisCatId])) {
									echo "<a href='update_delete_category.php?cat_id=$thisCatId'><img src='delete.bmp'></a>";
								} else {
									echo "<img src='keep.bmp'>";
								}
								echo str_repeat($fill, $indent);
								if ($thisCategoryName == 'catalogue') {
									echo "<span class='category_name_first'>$thisCategoryName</span>\n";
								} else {
									echo "<span class='category_name'>$thisCategoryName</span>\n";
								}
							}
							if ($thisItemName != '') {
								echo "<br>";
								echo "<a href='update_delete_item.php?cat_id=$thisCatId'><img src='delete.bmp'></a>";
								echo str_repeat($fill, $indent + 2);
								echo "<span class='item_name'>$thisItemName</span>\n";
							}

							$lastCategoryName = $thisCategoryName;
						}
					?>
				</div> <!-- Bootstrap column -->
				<div class="col-sm-1"></div>
				<div class="col-sm-3">
					<!--  Display forms to add an item, add a category, and move a category  -->
					<?php if ($_SESSION['access_level'] == 1) {include 'form_add_item.php';} ?>

					<?php if ($_SESSION['access_level'] == 1) {include 'form_add_category.php';} ?>

					<?php if ($_SESSION['access_level'] == 1) {include 'form_move_category.php';} ?>
				</div> <!-- Bootstrap column -->
				<div class="col-sm-1"></div>
			</div> <!-- Bootstrap row -->
		</div> <!-- Bootstrap container -->
	</main>

	<footer>
		<?php
		    echo $_SESSION['user'] . "&nbsp;&nbsp;&nbsp;&nbsp;";
		    if ($_SESSION['access_level'] == 1) {
		    	echo "Full update access";
		    } else {
		    	echo "Read only access";
		    }
		?>
	</footer>
</section>


</body>

</html>