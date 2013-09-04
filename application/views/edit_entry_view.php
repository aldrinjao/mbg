<?php
include ("header.php");
//retrieve individual data here then display below
echo validation_errors();
echo form_open_multipart('add_entry/update_entry');


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
			<td class="inputtd">
				<input name='icommonname' value="<?php echo $result->VernacularName;?>" />
				<input type="hidden" name="editid" value="<?php echo $result->taxonid;?>"
			</td>
			<td class="columnname">
				<label>Scientific Name</label>
			</td>
			<td>
				<div class="scientific_name">
					<label id="scientificnamegenus" name="scientificnamegenus"></label>
					<label id="scientificnamespecies" name="scientificnamescpecies"></label>
				</div>
			</td>
		</tr>
		<tr>
			<td class="columnname">
				<label>Synonyms</label>
			</td>
			<td class="inputtd">
				<input name='isynonym' value="<?php echo $result->Synonyms;?>" />
			</td>
			<td class="columnname">
				<label>Kingdom:</label>
			</td>
			<td class="inputtd">
				<input name="ikingdom" value="<?php echo $result->Kingdom;?>" />
			</td>
			
		</tr>
		<tr class="altrow">

			<td class="columnname">
				<label>Continent Ocean</label>
			</td>
			<td class="inputtd">
				<input name='iocean'  value="<?php echo $result->ContinentOcean;?>" />
			</td>

			<td class="columnname">
				<label>Phylum</label>
			</td>
			<td class="inputtd">
				<input name='iphylum' value="<?php echo $result->Phylum;?>"  />
			</td>

		</tr>

		<tr>
			<td class="columnname">
				<label>Country</label>
			</td>
			<td class="inputtd">
				<input name='icountry' value="<?php echo $result->Country;?>" />
			</td>

			<td class="columnname">
				<label>Class</label>
			</td>
			<td class="inputtd">
				<input name='iclass' value="<?php echo $result->Class;?>" />
			</td>

		</tr>
		<tr class="altrow">
			<td class="columnname">
				<label>State Province</label>
			</td>
			<td class="inputtd">
				<input name="istateprovince" value="<?php echo $result->StateProvince;?>" />
			</td>
			


			<td class="columnname">
				<label>Order</label>
			</td>
			<td class="inputtd">
				<input name="iorder" value="<?php echo $result->Order;?>" />
			</td>

		</tr>

		<tr>
			
			<td class="columnname">
				<label>Locality</label>
			</td>
			<td class="inputtd">
				<input name="ilocality" value="<?php echo $result->Locality;?>" />
			</td>
			
			<td class="columnname">
			
				<label>Family</label>
			</td>
			<td class="inputtd">
				<input name="ifamily" value="<?php echo $result->Family;?>" />
			</td>

		</tr>
		<tr class="altrow">


			<td class="columnname">
				<label>Threat Status</label>
			</td>
			<td class="inputtd">
				<input name="ithreat" value="<?php echo $result->ThreatStatus;?>" />
			</td>


			<td class="columnname">
				<label>Genus</label>
			</td>
			<td class="inputtd">
				<input id="igenus" name="igenus" value="<?php echo $result->Genus;?>" />
			</td>
			
			
		</tr>
		<tr>
	
	
			<td class="columnname">
				<label>Total Height(m)</label>
			</td>
			<td class="inputtd">
				<input name="ith" value="<?php echo $result->th;?>" />
			</td>

			
			<td class="columnname">
				<label>Subgenus</label>
			</td>
			<td class="inputtd">
				<input name="isubgenus" value="<?php echo $result->Subgenus;?>" />
			</td>
		</tr>

		<tr class="altrow">

			<td class="columnname" style="font-size:.8em;">
				<label>Diameter at Breast Height(cm)</label>
			</td>
			<td class="inputtd">
				<input name="idbh" value="<?php echo $result->dbh;?>" />
			</td>
			
			<td class="columnname">
				<label>Species</label>
			</td>
			<td class="inputtd">
				<input id="ispecies" name="ispecies" value="<?php echo $result->Species;?>" />
			</td>
		</tr>
		<tr>
			<td class="columnname">
				<label>Remarks</label>
			</td>
			<td class="inputtd">
				<input name="iremarks" value="<?php echo $result->remarks;?>" />
			</td>			


			<td class="columnname">
				<label>Subspecies</label>
			</td>
			<td class="inputtd">
				<input name="isubspecies" value="<?php echo $result->Subspecies;?>" />
			</td>
		</tr>

		<tr class="altrow">



			<td class="columnname">
				<label>Year Evaluated</label>
			</td>
			<td class="inputtd">
				<input name="iyeareval"  value="<?php echo $result->YearEvaluated;?>" />
			</td>
			

			<td class="columnname" style="font-size:.9em;">
				<label>Scientific Name Author</label>
			</td>
			<td class="inputtd">
				<input name="isnauthor" value="<?php echo $result->ScientificNameAuthor;?>" />
			</td>
		</tr>

		<tr>
			<td class="columnname">
				<label>National Status</label>
			</td>
			<td class="inputtd">
				<input name="inationalstat"  value="<?php echo $result->NationalStatus;?>"/>
			</td>
			
			
			<td class="columnname">
				<label>Year Collected <span style='font-size:.8em;'>(yyyy)</span></label>
			</td>
			<td class="inputtd">
				<input name="iyearcollected"   value="<?php echo $result->YearCollected;?>" />
			</td>
		</tr>
		
		
		<tr class="altrow">
			<td class="columnname">

				Native Status
			</td>
			<td class="inputtd">
				<input name="inativestat"  value="<?php echo $result->NativeStatus;?>"/>
			</td>

			

			<td class="columnname">
				<label>Month Collected <span style='font-size:.8em;'>(mm)</span></label>
			</td>
			<td class="inputtd">
				
				<input name="imonthcollected"   value="<?php echo $result->MonthCollected;?>" />
				
			</td>
		</tr>		



		<tr>
			<td class="columnname">
				<label>Seed Year (yyyy)</label>
			</td>
			<td class="inputtd"    value="<?php echo $result->seedyear;?>">
				
				<input name="iseedyear"   value="<?php echo $result->seedyear;?>" />
				
			</td>

			<td class="columnname">
				<label>Day Collected <span style='font-size:.8em;'>(dd)</span></label>
			</td>
			<td class="inputtd">
				
				<input name="idaycollected"   value="<?php echo $result->DayCollected;?>" />
				
			</td>
		</tr>		

		<tr class="altrow">

			<td class="columnname">
				<label>Latitude</label>
			</td>
			<td class="inputtd">
				
				<input name="ilat" value="<?php echo $result->Latitude;?>"/>
				
			</td>

			<td class="columnname">
				<label>Longitude</label>
			</td>
			<td class="inputtd">
				
				<input name="ilong" value="<?php echo $result->Longitude;?>"/>
				
			</td>


		</tr>		

		<tr>
			
			<td class="columnname">
				<label>Origin</label>
			</td>
			<td class="inputtd">
				<input name="iorigin" value="<?php echo $result->origin;?>"/>
			</td>
			<td class="columnname">
				<label style='font-size:11px;'>Date Planted (YYYY-MM-DD)</label>
			</td>
			<td class="datatd">
				<input name="idplanted" value="<?php echo $result->dateplanted;?>"/>
			</td>
		</tr>		

		<tr class="altrow">
			
			<td class="columnname">
				<label>Distribution</label>
			</td>
			<td class="inputtd">
				<input name="idistribution" value="<?php echo $result->Distribution;?>"/>
			</td>
			<td class="columnname">
				<label>Reference</label>
			</td>
			<td class="inputtd">
				
				<input name="ireference" value="<?php echo $result->Reference;?>" />
				
			</td>

		</tr>		
		<tr>
			
			<td class="columnname"  style="padding:5px 0px 5px 10px;"  colspan="4"><label>Characteristics</label></td>

			
		</tr>
		<tr class="altrow">
			
			<td class="columnname">
				<label>Habit</label>
			</td>
			<td class="inputtd">
				<input name="ihabit" value="<?php echo $result->habits;?>" />
			</td>
			<td class="columnname">
				<label>Leaves/Fronds</label>
			</td>
			<td class="inputtd" >
				<input name="ileaves" value="<?php echo $result->leaves;?>" />				
			</td>
			
		</tr>		


		<tr>
			
			<td class="columnname">
				<label>Flowers</label>
			</td>
			<td class="inputtd">
				<input name="iflowers" value="<?php echo $result->flowers;?>" />
			</td>
			<td class="columnname">
				<label>Fruits/Seeds</label>
			</td>
			<td class="inputtd" >
				<input name="ifruits" value="<?php echo $result->fruits;?>" />
			</td>
			
		</tr>		
		<tr class="altrow">
			
			<td class="columnname">
				<label>Uses</label>
			</td>
			<td class="inputtd" colspan="3">
				<input name="iuses" value="<?php echo $result->uses;?>" />
			</td>

			
		</tr>
		
	</tbody>
	
</table><!--end of 1st table-->

<div id="right_panel">
	<div class="deletedivcont">
		<input  type='submit'/>
	</div>
	<div id="picture_container">
		
			<input type="file" name="userfile" size="20" />
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
	<div class="mapcontdiv">
	<div id="map_container">
		
		
		
	</div>
	</div>
</div>
	<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?sensor=false">
    </script>
    <?php
    	$lat=$result->Latitude;
		$long=$result->Longitude;
		$longlat=$long.",".$lat;
		$marker=$longlat;
		//echo $marker;
    ?>
    <script type="text/javascript">
		function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(<?php echo $longlat;?>),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        suppressInfoWindow:false
        };
		
		var map = new google.maps.Map(document.getElementById("map_container"),
            mapOptions);
      
      
		var myLatlng = new google.maps.LatLng(<?php echo $marker;?>);
		
		var marker = new google.maps.Marker({
	      position: myLatlng,
	      map: map,
	      title:"Hello World!"
		});
      }
      google.maps.event.addDomListener(window, 'load', initialize);
 
    </script>


<?php
}//end of for each
echo form_close();

include("footer.php");
?>	