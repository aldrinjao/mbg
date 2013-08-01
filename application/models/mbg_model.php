<?php

class Mbg_Model extends CI_Model {


	

	public function __construct()
	{
		$this->load->database();
		$this->load->dbutil();
		$this->load->helper('csv_helper');
	}

	public function getAll(){
		
		
		$query = $this->db->get('mbg_species_list');
		if ($query->num_rows() > 0) 
			{ 
	                //true if there are rows in the table
	                return $query->result(); //returns an object of data
	        }
	    return false;
		
	}
	
	
	public function getcolumns(){
		
		$fields =$this->db->list_fields('mbg_species_list');
		return  $fields;
				
	}
	
	public function searchby($searchby,$searchterm){
		
		$this->db->from('mbg_species_list');
		
		if($searchby =='taxonid'){
			
			$this->db->where('mbg_species_list.taxonid',$searchterm);
		} else{
			
			$this->db->like($searchby,$searchterm);	
		}
		$this->db->join('th_dbh', 'th_dbh.id = mbg_species_list.taxonid');
		$query = $this->db->get();
		
		
		if ($query->num_rows() > 0) 
			{ 
	                //true if there are rows in the table
	                return $query->result(); //returns an object of data
	        }
	    return false;
	}
	
	
	
	public function getSingleEntry($id){
		
		$this->db->from('th_dbh');
		
		$this->db->where("taxonid",$id);
		$this->db->join('mbg_species_list', 'mbg_species_list.taxonid = th_dbh.id');
		$query = $this->db->get();
		
		
		if ($query->num_rows() == 1) 
			{ 
	                //true if there are rows in the tabl
				return $query->result(); //returns an object of data
	        		
			}else{
	    		return false;
			}
	}

	
	public function getNumberofEntries(){
		$this->db->from('mbg_species_list');
		$query = $this->db->get();
		return $query->num_rows();
			
	}
	
	
	
	public function deleteEntry($taxonid){
		$this->db->where('taxonid', $taxonid);
		$this->db->delete('mbg_species_list'); 
	}
	
		
	public function getAllEntry(){
		$this->db->from('mbg_species_list');
		$this->db->join('th_dbh', 'mbg_species_list.taxonid = th_dbh.id');
		$query = $this->db->get();		
		return $query->result();
		
		
	}
	
	public function saveCSV(){
		$this->db->from('mbg_species_list');
		$query = $this->db->get();
		query_to_csv($query,TRUE,'mbg_dwcformat.csv');
		
		
	}
	
	public function saveCSVthdbh(){
		
		$this->db->from('th_dbh');
		$query = $this->db->get();
		query_to_csv($query,TRUE,'extras.csv');
		
	}	
	public function editEntry(
				$taxonid,
				$kingdom,
				$phylum,
				$class,
				$order,
				$family,
				$genus,
				$subgenus,
				$species,
				$subspecies,
				$snauthor,
				$yearcollected,
				$monthcollected,
				$daycollected,
				$commonname,
				$basis,
				$reference,
				$continentocean,
				$country,
				$stateprovince,
				$threatstatus,
				$th,
				$dbh,
				$yearevaluated,
				$remarks,
				$filepath,
				$origin,
				$long,
				$lat,
				$dateplanted,
				$seedyear,
				$distribution,
				$characteristic
				){
		
		
			if($yearcollected==0000){
				$yearcollected=NULL;
			}
			if($yearevaluated==0){
				$yearevaluated=NULL;
			}
			$data=array(
				'kingdom'				=>	$kingdom,
				'phylum'				=>	$phylum,
				'order'					=>	$order,
				'class'					=> 	$class,
				'family'				=> 	$family,
				'genus'					=> 	$genus,
				'subgenus' 				=> 	$subgenus,			
				'species'				=> 	$species,
				'subspecies'			=>	$subspecies,
				'scientificnameauthor' 	=>	$snauthor,
				'yearcollected'			=>	$yearcollected,
				'monthcollected'		=> 	$monthcollected,
				'daycollected' 			=> 	$daycollected,
				'vernacularname'		=> 	$commonname,
				'basisofrecord' 		=> 	$basis,
				'reference' 			=> 	$reference,
				'continentocean'		=>	$continentocean,
				'country'				=>	$country,
				'stateprovince' 		=> 	$stateprovince,
				'threatstatus'			=> 	$threatstatus,
				'yearevaluated'			=> 	$yearevaluated,
				'Longitude'				=> 	$long,
				'Latitude'				=> 	$lat
			);
		
		//update
		
	$this->db->where('taxonid', $taxonid);
	$this->db->update('mbg_species_list', $data);
	
	
	if($filepath!=NULL){
		$data=array(
		 		'speciespic'			=>	$filepath
		);
		
		$this->db->where('taxonid', $taxonid);
		$this->db->update('mbg_species_list', $data);
	}
	
	
	//$this->db->insert('mbg_species_list',$data);
	$foreignkey=$this->db->insert_id();
	$data2= array( 
		'th'		=>	$th,
		'dbh'		=>	$dbh,
		'remarks'	=>	$remarks,
		'origin'	=>	$origin,
		'dateplanted' => $dateplanted,
		'seedyear'	=>	$seedyear,
		'distribution'	=> $distribution,
		'characteristics' => $characteristic
		
	);

	$this->db->where('id', $taxonid);
	$this->db->update('th_dbh', $data2); 	
	//$this->db->insert('th_dbh',$data2);
		
	}

	
	public function addEntry(
	
				$kingdom,
				$phylum,
				$class,
				$order,
				$family,
				$genus,
				$subgenus,
				$species,
				$subspecies,
				$snauthor,
				$yearcollected,
				$monthcollected,
				$daycollected,
				$commonname,
				$basis,
				$reference,
				$continentocean,
				$country,
				$stateprovince,
				$threatstatus,
				$th,
				$dbh,
				$yearevaluated,
				$remarks,
				$filepath,
				$origin,
				$long,
				$lat,
				$dateplanted,
				$seedyear,
				$distribution,
				$characteristic
				){
	//insert			
	
	$data=array(
		'kingdom'				=>	$kingdom,
		'phylum'				=>	$phylum,
		'order'					=>	$order,
		'class'					=> 	$class,
		'family'				=> 	$family,
		'genus'					=> 	$genus,
		'subgenus' 				=> 	$subgenus,
		'subspecies'			=>	$subspecies,
		'species'				=> 	$species,
		'scientificnameauthor' 	=>	$snauthor,
		'yearcollected'			=>	$yearcollected,
		'monthcollected'		=> 	$monthcollected,
		'daycollected' 			=> 	$daycollected,
		'vernacularname'		=> 	$commonname,
		'basisofrecord' 		=> 	$basis,
		'reference' 			=> 	$reference,
		'continentocean'		=>	$continentocean,
		'country'				=>	$country,
		'stateprovince' 		=> 	$stateprovince,
		'threatstatus'			=> 	$threatstatus,
		'yearevaluated'			=> 	$yearevaluated,
		'speciespic'			=>	$filepath,
		'Longitude'				=> 	$long,
		'Latitude'				=> 	$lat
	);

	$this->db->insert('mbg_species_list',$data);
	$foreignkey=$this->db->insert_id();
	$data2= array( 
		'id'		=>	$foreignkey,
		'th'		=>	$th,
		'dbh'		=>	$dbh,
		'remarks'	=>	$remarks,
		'origin' 	=>	$origin,
		'dateplanted' => $dateplanted,
		'seedyear'	=> $seedyear,
		'distribution'	=> $distribution,
		'characteristics' => $characteristic
		
		
	);

	$this->db->insert('th_dbh',$data2);
		
	}
	
//	

	public function addEntryfromCSV($csvrow){
	
	
	if (strlen(implode($csvrow)) != 0){ 
	
		$data = array(
				'Kingdom'					=>	$csvrow[1],
				'Phylum'					=>	$csvrow[2],
				'Class'						=>	$csvrow[3],
				'Order'						=>	$csvrow[4],
				'Family'					=>	$csvrow[5],
				'Genus'						=>	$csvrow[6],
				'Species'					=>	$csvrow[7],
				'Infraspecies'				=>	$csvrow[8],
				'InfraspeciesRank'			=>	$csvrow[9],
				'ScientificNameAuthor'		=>	$csvrow[10],
				'Synonyms'					=>	$csvrow[11],
				'Reference'					=>	$csvrow[12],
				'VernacularName'			=>	$csvrow[13],
				'Country'					=>	$csvrow[14],
				'ThreatStatus'				=>	$csvrow[15],
				'YearEvaluated'				=>	$csvrow[16],
				'NativeStatus'				=>	$csvrow[17],
				'Distribution'				=>	$csvrow[18],
				'DateLastModified'			=>	$csvrow[19],
				'Institutioncode'			=>	$csvrow[20],
				'CollectionCode'			=>	$csvrow[21],
				'CatalogNumber'				=>	$csvrow[22],
				'RecordURL'					=>	$csvrow[23],
				'CollectorNumber'			=>	$csvrow[24],
				'FieldNumber'				=>	$csvrow[25],
				'Collector'					=>	$csvrow[26],
				'StartYearCollected'		=>	$csvrow[27],
				'StartMonthCollected'		=>	$csvrow[28],
				'StartDayCollected'			=>	$csvrow[29],
				'EndYearCollected'			=>	$csvrow[30],
				'EndMonthCollected'			=>	$csvrow[31],
				'EndDayCollected'			=>	$csvrow[32],
				'YearCollected'				=>	$csvrow[33],
				'MonthCollected'			=>	$csvrow[34],
				'DayCollected'				=>	$csvrow[35],
				'JulianDay'					=>	$csvrow[36],
				'StartJulianDay'			=>	$csvrow[37],
				'EndJulianDay'				=>	$csvrow[38],
				'TimeOfDay'					=>	$csvrow[39],
				'StartTimeOfDay'			=>	$csvrow[40],
				'EndTimeOfDay'				=>	$csvrow[41],
				'TimeZone'					=>	$csvrow[42],
				'Subgenus'					=>	$csvrow[43],
				'Subspecies'				=>	$csvrow[44],
				'BasisOfRecord'				=>	$csvrow[45],
				'Source'					=>	$csvrow[46],
				'Citation'					=>	$csvrow[47],
				'ContinentOcean'			=>	$csvrow[48],
				'StateProvince'				=>	$csvrow[49],
				'County'					=>	$csvrow[50],
				'Locality'					=>	$csvrow[51],
				'Longitude'					=>	$csvrow[52],
				'StartLongitude'			=>	$csvrow[53],
				'EndLongitude'				=>	$csvrow[54],
				'Latitude'					=>	$csvrow[55],
				'StartLatitude'				=>	$csvrow[56],
				'EndLatitude'				=>	$csvrow[57],
				'CoordinatePrecision'		=>	$csvrow[58],
				'Start_EndCoordinatePrecision'=>$csvrow[59],
				'BoundingBox'				=>	$csvrow[60],
				'MinimumElevation'			=>	$csvrow[61],
				'MaximumElevation'			=>	$csvrow[62],
				'MinimumDepth'				=>	$csvrow[63],
				'MaximumDepth'				=>	$csvrow[64],
				'DepthRange'				=>	$csvrow[65],
				'Temperature'				=>	$csvrow[66],
				'Sex'						=>	$csvrow[67],
				'LifeStage'					=>	$csvrow[68],
				'PreparationType'			=>	$csvrow[69],
				'IndividualCount'			=>	$csvrow[70],
				'ObservedIndividualCount'	=>	$csvrow[71],
				'ObservedWeight'			=>	$csvrow[72],
				'PreviousCatalogNumber'		=>	$csvrow[73],
				'RelationshipType'			=>	$csvrow[74],
				'RelatedCatalogItem'		=>	$csvrow[75],
				'Notes'						=>	$csvrow[76],
				'GMLFeature'				=>	$csvrow[77],
				'CountryID'					=>	$csvrow[78],
				'LocalityLong'				=>	$csvrow[79],
				'LocalityLat'				=>	$csvrow[80],
				'SpeciesPic'				=>	$csvrow[81],
				'NationalStatus'			=>	$csvrow[82],
				'CITESAppendix1'			=>	$csvrow[83],
				'CITESAppendix2'			=>	$csvrow[84],
				'Observer'					=>	$csvrow[85]
			);
		
		if($csvrow[0]==NULL){
			$csvrow[0]=0;
			
		}
		
		$this->db->from('th_dbh');
		$this->db->where("id",$csvrow[0]);
		
		$query = $this->db->get();
			
			
		if ($query->num_rows() == 1) {//if existing update
			$this->db->where('taxonid',$csvrow[0]);
			$this->db->update('mbg_species_list',$data);
			$foreignkey=$csvrow[0];
			
		}else{//if not insert
			
			$this->db->insert('mbg_species_list',$data);
			$foreignkey=$this->db->insert_id();
			
			
		}
		
		$data2= array( 
			'id'				=>	$foreignkey,
			'th'				=>	$csvrow[86],
			'dbh'				=>	$csvrow[87],
			'remarks'			=>	$csvrow[88],
			'origin' 			=>	$csvrow[89],
			'dateplanted' 		=> 	$csvrow[90],
			'seedyear'			=> 	$csvrow[91],
			'distribution'		=> 	$csvrow[92],
			'characteristics' 	=> 	$csvrow[93]
			
			
		);
	
			if ($query->num_rows() == 1) {//if existing update
				$this->db->where('id',$csvrow[0]);
				$this->db->update('th_dbh',$data2);
				$foreignkey=$csvrow[0];
				
			}else{//if not insert
				
				$this->db->insert('th_dbh',$data2);
				$foreignkey=$this->db->insert_id();
				
				
			}	
		
		}
		
		
	}

	public function updateColumns($columnid,$value){
		
		$this->db->set("display", $value);
		$this->db->where("id",$columnid);
		
		$this->db->update("column");
		
	}
	
		
}//end of model

?>