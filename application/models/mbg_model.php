<?php

class Mbg_Model extends CI_Model {


	

	public function __construct()
	{
		$this->load->database();
		
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
				$seedyear
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
		'seedyear'	=>	$seedyear
		
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
				$seedyear
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
		'seedyear'	=> $seedyear
		
		
	);

	$this->db->insert('th_dbh',$data2);
		
	}
	
//	
	public function updateColumns($columnid,$value){
		
		$this->db->set("display", $value);
		$this->db->where("id",$columnid);
		
		$this->db->update("column");
		
	}
	
		
}//end of model

?>