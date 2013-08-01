<?php
	include ("header.php");

	echo form_open_multipart('import/displaycsv');
?>

<div id='uploaddivcont'>
	<label>Upload CSV File:</label><br />
	<input type="file" name="userfile" id='userfile' size="20" />
	<input type="submit" value="upload" style="float: right"></input>
</div>

<?php
	echo form_close();
	echo form_open('import/insertcsv');

if($saved){
	echo "
	
	<div id='filenamecont'><label>csv file name: <br>\"".$filename."\"
	
	<input type='submit' value='save to DB' style='float:right;'>
	
	</label></div>
	";
	echo "<br>";
	echo "<table name='importtable' id='importtable'>";
	echo "<thead>";
	echo "<tr>";
	for( $i = 0 ; $i < count($rows[0]) ; $i++){
		echo "<th >".$rows[0][$i]."</th>";
	}
	echo "</tr>";	
	echo "</thead>";
	echo "<tbody>";
	for( $i=1 ; $i < count($rows) ; $i++){
		echo "<tr>";
				for( $j = 0 ; $j < count($rows[$i]) ; $j++){
					echo "<td>".$rows[$i][$j]."</td>";
				}
		echo "</tr>";		
	}
	echo "</tbody>";
	echo "</table>";
	echo "<input type='hidden' name='filename' id='filename' value='".$filename."'>";
}

// Set path to CSV file
//make form, on submit loop through csv while passing csv[row] individually
//ang gawan ng array_fill yung csv[row]

	echo form_close();
	include("footer.php");
?>
<script>
	
	$('#importtable').dataTable();
	
	
</script>	