<?php
include ("header.php");
//retrieve individual data here then display below

foreach ($results as $result) {
	
?>

<table id="individual_table">
	<thead>
		
	</thead>
	<tbody>
		<tr class="altrow">
			<td class="columnname">
				<label>Common Name:</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->VernacularName;
				?>
			</td>
			<td class="columnname">
				<label>Scientific Name</label>
			</td>
			<td>
				<div class="scientific_name">
					<?php
						echo $result->Genus." ".$result->Species;
					?>
				</div>
			</td>
		</tr>
		<tr>
			<td class="columnname">
				<label>Basis of Record</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->BasisOfRecord;
				?>
			</td>
			<td class="columnname">
				<label>Kingdom</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Kingdom;
				?>
			</td>
			
		</tr>
		<tr class="altrow">

			<td class="columnname">
				<label>Continent Ocean</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->ContinentOcean;
				?>
			</td>
			<td class="columnname">
				<label>Phylum</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Phylum;
				?>
			</td>

		</tr>

		<tr>

			<td class="columnname">
				<label>Country</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Country;
				?>
			</td>
			<td class="columnname">
				<label>Class</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Class;
				?>
			</td>

		</tr>
		<tr class="altrow">
			
			<td class="columnname">
				<label>State Province</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->StateProvince;
				?>
			</td>


			<td class="columnname">
				<label>Order</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Order;
				?>
			</td>

		</tr>

		<tr>
			<td class="columnname">
				<label>Locality</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Locality;
				?>
			</td>

			
			
			<td class="columnname">
			
				<label>Family</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Family;
				?>
			</td>

		</tr>
		<tr class="altrow">
			<td class="columnname">
				<label>Threat Status</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->ThreatStatus;
				?>
			</td>


			<td class="columnname">
				<label>Genus</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Genus;
				?>
			</td>
			
			
		</tr>
		<tr>
			
		<td class="columnname">
				<label>Total Height(m)</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->th;
				?>
			</td>
			<td class="columnname">
				<label>Subgenus</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Subgenus;
				?>
			</td>
		</tr>

		<tr class="altrow">
			
			<td class="columnname">
				<label style="font-size:.8em;">Diameter Breast Height (cm)</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->dbh;
				?>
			</td>
			<td class="columnname">
				<label>Species</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Species;
				?>
			</td>
		</tr>
		<tr>
			
			<td class="columnname">
				<label>Remarks</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->remarks;
				?>
			</td>
			<td class="columnname">
				<label>Subspecies</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Subspecies;
				?>
			</td>
		</tr>

		<tr class="altrow">
			
			<td class="columnname">
				<label>Year Evaluated</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->YearEvaluated;
				?>
			</td>
			<td class="columnname">
				<label style="font-size: .8em;">Scientific Name Author</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->ScientificNameAuthor;
				?>
			</td>
		</tr>

		<tr>
			
			<td class="columnname">
				<label>National Status</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->NationalStatus;
				?>
			</td>
			<td class="columnname">
				<label>Year Collected</label>
			</td>
			<td class="datatd">
				<?php
				if ($result->YearCollected=='0000'){
					
				}else{
					echo $result->YearCollected;
				}
				?>
			</td>
		</tr>
		
		
		<tr class="altrow">
			
			<td class="columnname">
				<label>Native Status</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->NativeStatus;
				?>
			</td>
			<td class="columnname">
				<label>Month Collected</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->MonthCollected;
				?>
			</td>
		</tr>		



		<tr>
			
			<td class="columnname">
				<label>Seed Year</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->seedyear;
				?>
			</td>
			<td class="columnname">
				<label>Day Collected</label>
			</td>
			<td class="datatd">
				<?php
				if ($result->DayCollected=='0'){
					echo "-";
				}else{
					echo $result->DayCollected;
				}
				?>
			</td>
		</tr>	
		<tr class="altrow">
			
			<td class="columnname">
				<label>Latitude</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Latitude;
				?>
			</td>
			
			<td class="columnname">
				<label style='font-size:11px;'>Longitude</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->Longitude;
				?>
			</td>
		</tr>			


		<tr>
			
			<td class="columnname">
				<label>Origin</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->origin;
				?>
			</td>
			
			<td class="columnname">
				<label style='font-size:11px;'>Date Planted (YYYY-MM-DD)</label>
			</td>
			<td class="datatd">
				<?php
					echo $result->dateplanted;
				?>
			</td>
			

		</tr>			
		
				<tr class="altrow">
			
			<td class="columnname">
				<label>Distribution</label>
			</td>
			<td class="inputtd">
				<?php echo $result->distribution;?>
			</td>
			<td class="columnname">
				<label>Characteristics</label>
			</td>
			<td class="datatd">
				<?php echo $result->characteristics;?>
			</td>
		</tr>		
		
		<tr>
			
			<td class="columnname">
				<label>Reference</label>
			</td>
			<td class="datatd" colspan="3" style="padding: 10px 5px 10px 5px;">
				<?php
					echo $result->Reference;
				?>
			</td>
			
			
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>
				<?php  echo form_open_multipart('/add_entry/deleteEntry');?>
				<input type="hidden" name="htaxonid" value="<?php echo $result->taxonid;?>" ></input>
				<input style="float:left" type="submit" value="DELETE"  onclick="return confirm('Are you sure you want to delete this entry?')" />
				<?php echo form_close();?>
				<a href='<?php echo base_url();?>index.php/add_entry/edit/<?php echo $result->taxonid?>' style="float:right">EDIT</a>
			</td>
		</tr>
	</tbody>
	
</table><!--end of 1st table-->

<div id="right_panel">
	<div id="picture_container">
		<div id="picture_container2">
			<image	style='width:300px;height:300px;' src='<?php echo base_url()."uploads/";
					if ($result->SpeciesPic==NULL){
						echo "none.jpg'";
					}else{
						echo $result->SpeciesPic."'>";
					}
			
			?> 
			</image>
		</div>
	</div>
	<div id="map_container">
		
		
		
	</div>
</div>
	<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?sensor=false">
    </script>
    <?php
    
		$marker=$result->Latitude.",".$result->Longitude;
		$latlong=$result->Latitude.",".$result->Longitude;
	
    ?>
    <script type="text/javascript">
		function initialize() {
        var mapOptions = {
          	center:new google.maps.LatLng(<?php echo $latlong;?>),
          	zoom: 12,
          	mapTypeId: google.maps.MapTypeId.ROADMAP,
			suppressInfoWindow:false
        };
		
		var map = new google.maps.Map(document.getElementById("map_container"),
            mapOptions);
      
      
		var myLatlng = new google.maps.LatLng(<?php echo $marker;?>);
		
		var marker = new google.maps.Marker({
	      position: myLatlng,
	      map: map
	      
		});
      }
      google.maps.event.addDomListener(window, 'load', initialize);
 
 
  </script>


<?php
}//end of for each
include("footer.php");
?>	