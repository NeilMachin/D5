<table class='input_outer'>
	<tr>
		<td>
			<form action='update_move_category.php' method='POST'>
				<table class='input_inner'>
					<tr>
						<th colspan=2>
						    Move a category
						</th>
					</tr>
					<tr>
						<td>
						    Category
						</td>
						<td>
							<select name='category_name'>
				    			<?php foreach($dataAllCategories as $category) { echo "<option>$category</option>\n";} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
						    New Parent
						</td>
						<td>
							<select name='category_parent'>
				    			<?php foreach($dataAllCategories as $category) { echo "<option>$category</option>\n";} ?>
							</select>
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