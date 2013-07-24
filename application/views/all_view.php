
<?php
	include('header.php');

			if($resultflag==1){
				
				
				?>
			
				
<table id="all_result_table">
	
		<thead>
		<tr class="headerrow">
			<td  style="width:30px">
				
			</td>
			<td>
				id
			</td>
			<td>
				Scientific Name
			</td>
			<td>
				Common Name
			</td>
			<td>
				Family		
			</td>
			<td>
				Genus
			</td>
			<td>
				Species
			</td>
			<td>
				TH
			</td>
			<td>
				DBH
			</td>
			<td>
				Last Modified
			</td>
		</tr>
	</thead>
	
	<tbody>
		
				
		<?php
			foreach ($results as $result) {
				echo "<tr>";
					echo "<td style='text-align:center;'>";	
					echo "<a href='".base_url()."index.php/search/entryinfo/".$result->taxonid."' target='_blank'><img src='".base_url()."/public/images/expand.png'></a>";
					echo "</td>";
					
					echo "<td>";
					echo $result->taxonid;
					echo "</td>";
					
					echo "<td>";
					echo $result->Genus." ".$result->Species;
					echo "</td>";
					
					echo "<td>";
					echo $result->VernacularName;
					echo "</td>";
					
					echo "<td>";
					echo $result->Family;
					echo "</td>";
					
					echo "<td>";
					echo $result->Genus;
					echo "</td>";
					echo "<td>";
					echo $result->Species;
					echo "</td>";
			
					echo "<td>";
					echo $result->th;
					echo "</td>";
					echo "<td>";
					echo $result->dbh;
					echo "</td>";
					echo "<td>";
					echo $result->DateLastModified;
					echo "</td>";
					
				echo "</tr>";
					}
					
					
		?>

		</tr>
		
	</tbody>
	
	
</table>
<script>



	$('#all_result_table').dataTable();
	$('#all_result_table_wrapper').css("width","80%");
	$('#all_result_table_wrapper').css("margin","auto");
</script>
<?php
}else{
				echo "<div id='noresultsdiv'>";
				echo "<spanl>Found 0 items</span>";
				echo "</div>";
			}

	

?>