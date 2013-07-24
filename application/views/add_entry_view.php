<?php
	include ("header.php");
	echo validation_errors();
	
	
	echo form_open_multipart('/add_entry/insert');

if($inserted){
	
	echo "new entry added!";	
}

if($file_error){
	foreach ($error as $ierror) {
		echo $ierror;
	}
}
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
				<input name='icommonname' value="<?php echo set_value('icommonname');?>" />
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
				<label>Basis of Record</label>
			</td>
			<td class="inputtd">
				<input name='ibasis'/>
			</td>
			<td class="columnname">
				<label>Kingdom:</label>
			</td>
			<td class="inputtd">
				<input name="ikingdom"/>
			</td>
			
		</tr>
		<tr class="altrow">

			<td class="columnname">
				<label>Continent Ocean</label>
			</td>
			<td class="inputtd">
				<input name='iocean'/>
			</td>

			<td class="columnname">
				<label>Phylum</label>
			</td>
			<td class="inputtd">
				<input name='iphylum' />
			</td>

		</tr>

		<tr>
			<td class="columnname">
				<label>Country</label>
			</td>
			<td class="inputtd">
				<input name='icountry'/>
			</td>

			<td class="columnname">
				<label>Class</label>
			</td>
			<td class="inputtd">
				<input name='iclass'/>
			</td>

		</tr>
		<tr class="altrow">
			<td class="columnname">
				<label>State Province</label>
			</td>
			<td class="inputtd">
				<input name="iprovince"/>
			</td>
			


			<td class="columnname">
				<label>Order</label>
			</td>
			<td class="inputtd">
				<input name="iorder"/>
			</td>

		</tr>

		<tr>
			
			<td class="columnname">
				<label>Locality</label>
			</td>
			<td class="inputtd">
				<input name="iprovince"/>
			</td>
			
			<td class="columnname">
			
				<label>Family</label>
			</td>
			<td class="inputtd">
				<input name="ifamily"/>
			</td>

		</tr>
		<tr class="altrow">


			<td class="columnname">
				<label>Threat Status</label>
			</td>
			<td class="inputtd">
				<input name="ithreat"/>
			</td>


			<td class="columnname">
				<label>Genus</label>
			</td>
			<td class="inputtd">
				<input id="igenus" name="igenus"/>
			</td>
			
			
		</tr>
		<tr>
	
	
			<td class="columnname">
				<label>Total Height(m)</label>
			</td>
			<td class="inputtd">
				<input name="ith"/>
			</td>

			
			<td class="columnname">
				<label>Subgenus</label>
			</td>
			<td class="inputtd">
				<input name="isubgenus"/>
			</td>
		</tr>

		<tr class="altrow">

			<td class="columnname" style="font-size:.8em;">
				<label>Diameter at Breast Height(cm)</label>
			</td>
			<td class="inputtd">
				<input name="idbh"/>
			</td>
			
			<td class="columnname">
				<label>Species</label>
			</td>
			<td class="inputtd">
				<input id="ispecies" name="ispecies"/>
			</td>
		</tr>
		<tr>
			<td class="columnname">
				<label>Remarks</label>
			</td>
			<td class="inputtd">
				<input name="iremarks"/>
			</td>			


			<td class="columnname">
				<label>Subspecies</label>
			</td>
			<td class="inputtd">
				<input name="isubspecies"/>
			</td>
		</tr>

		<tr class="altrow">



			<td class="columnname">
				<label>Year Evaluated</label>
			</td>
			<td class="inputtd">
				<input name="iyeareval" />
			</td>
			

			<td class="columnname" style="font-size:.9em;">
				<label>Scientific Name Author</label>
			</td>
			<td class="inputtd">
				<input name="isnauthor"/>
			</td>
		</tr>

		<tr>
			<td class="columnname">
				<label>National Status</label>
			</td>
			<td class="inputtd">
				<input />
			</td>
			
			
			<td class="columnname">
				<label>Year Collected <span style='font-size:.8em;'>(yyyy)</span></label>
			</td>
			<td class="inputtd">
				<input name="iyearcollected"  value="<?php echo set_value('iyearcollected');?>"/>
			</td>
		</tr>
		
		
		<tr class="altrow">
			<td class="columnname">

				Native Status
			</td>
			<td class="inputtd">
				<input />
			</td>

			

			<td class="columnname">
				<label>Month Collected <span style='font-size:.8em;'>(mm)</span></label>
			</td>
			<td class="inputtd">
				
				<input name="imonthcollected"  value="<?php echo set_value('imonthcollected');?>"/>
				
			</td>
		</tr>		



		<tr>
			<td class="columnname">
				<label>Seed Year (yyyy)</label>
			</td>
			<td class="inputtd">
				
				<input name="iseedyear"/>
				
			</td>

			<td class="columnname">
				<label>Day Collected <span style='font-size:.8em;'>(dd)</span></label>
			</td>
			<td class="inputtd">
				
				<input name="idaycollected"  value="<?php echo set_value('idaycollected');?>"/>
				
			</td>
		</tr>		

		<tr class="altrow">
			
			<td class="columnname">
				<label>Latitude</label>
			</td>
	
			<td class="inputtd">
				
				<input name="ilat"/>
				
			</td>
	
			<td class="columnname">
				<label>Longitude</label>
			</td>
	
			<td class="inputtd">
				
				<input name="ilong"/>
				
			</td>


		</tr>		

		<tr>
			<td class="columnname">
			<label>Origin</label>
			</td>
			<td class="inputtd">
				
				<input name="iorigin"/>
				
			</td>


			<td class="columnname">
			<label style='font-size:11px;'>Date Planted (YYYY-MM-DD)</label>
			</td>
			
			<td class="inputtd">
				
				<input name="idplanted"/>
				
			</td>


		</tr>		
		<tr class="altrow">
			
			<td class="columnname">
				<label>Reference</label>
			</td>
			<td class="inputtd" colspan="3" >
				
				<input name="ireference"/>
				
			</td>
			
			
		</tr>
		<tr>
			<td colspan="3">
				<input  type='submit'/>
			</td>
		</tr>
	</tbody>
	
</table><!--end of 1st table-->


<div id="right_panel">
	<div id="picture_container">
		<label>300px X 300px recommended(jpg|png|gif)</label>			
			<input type="file" name="userfile" size="20" />
			<!--WAG PALITAN ANG 'name="userfile"' default yun para umandar yung $this->upload->do_upload(); -->
			
			
		
	</div>
	
	
	<div id="map_container">	
	</div>
</div>

<?php

echo form_close();
//end of for each
include("footer.php");
?>	