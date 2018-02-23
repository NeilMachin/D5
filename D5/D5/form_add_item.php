			<table class='input_outer'><tr><td>
				<form action='update_add_item.php' method='POST'>
					<table class='input_inner'>
						<tr>
							<th colspan=2>
							    Add a new item
							</td>
						</tr>
						<tr>
							<td>
							    Category
							</td>
							<td>
								<select name='category'<?php if(count($dataUsableCategories)==0) {echo " disabled";} ?>>
				    			<?php foreach($dataUsableCategories as $category) { echo "<option>$category</option>\n";} ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								Item
							</td>
							<td>
								<input type='text' name='item_name'<?php if(count($dataUsableCategories)==0) {echo " disabled";} ?>>
							</td>
						</tr>
						<tr>
							<td colspan=2 style='text-align: center'>
								<input type='submit' value='Update'>
							</td>
						</tr>
					</table>
				</form>
			</td></tr></table>