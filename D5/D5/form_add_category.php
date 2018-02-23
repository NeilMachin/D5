<table class='input_outer'>
	<tr>
		<td>
			<form action='update_add_category.php' method='POST'>
				<table class='input_inner'>
					<tr>
						<th colspan=2>
						    Add a new category
						</td>
					</tr>
					<tr>
						<td>
						    Parent
						</td>
						<td>
							<select name='category_parent'>
				    			<?php foreach($dataAllCategories as $category) { echo "<option>$category</option>\n";} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							Category
						</td>
						<td>
							<input type='text' name='category_name'>
						</td>
					</tr>
					<tr>
						<td colspan=2 style='text-align: center'>
							<input type='submit' value='Update'>
						</td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
</table>