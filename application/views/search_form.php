<?php
	echo form_open('search/searchby');
?>

<div id="searchformcont">
	<table >
		<tr>
			<th colspan="2"><label>Search</label></th>
			
		</tr>
		<tr>
			<td>
				<label>
					Search for:
				</label>
			</td>
			<td>
				
					<input type="textbox" name="searchterm"  id="searchterm" style="width:200px;"
					<?php
						if($searchterm!=null){
							echo "value='".$searchterm."'";
						}
					?>
					
					/>
			</td>
			
		</tr>
		<tr>
			<td>
				<label>
					Search by:
				</label>
			</td>
			<td>
				<select style="width:200px" id="searchcategory" name="searchcategory">
					
				<?php
				
					//$searchbyexplode= explode("`", $searchby);
					foreach ($field_list as $field) {
						
						if($searchby===$field){
							echo "<option value='".$field."' selected='selected'>"; 
						}else{		
						
							echo "<option value='".$field."'>";
						}	
						echo $field;
						echo "</option>";
					}
					
				?>
				</select>
			<?php
			?>
			</td>
				
		</tr>
		<tr>
			<th colspan="2">
				<input type="submit" value="Search" />
			</th>
		</tr>
		<?php
		
			if (($searchterm!=null) or ($searchby!=null)){
				echo "<tr><th colspan='2''><label>";
				echo "Search for \"".$searchterm."\" by ".$searchby;
				
				echo "</label></th></tr>";
			}
		?>
		
	</table>
	<script>
		document.getElementById('searchterm').focus();

	</script>

	
	
	
</script>
</div>
<?php

	echo form_close();

?>