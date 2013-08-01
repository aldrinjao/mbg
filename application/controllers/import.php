<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->dbutil();
		$this->load->helper(array('form', 'url','email','file','csv_helper'));
		$data['saved']=FALSE;
		$data['file_error'] = FALSE;
		$this->load->view('import_view',$data);
	}
	
	public function uploadCSV()
	{
		$uploadconfig['upload_path'] = './tempupload/';
		$uploadconfig['allowed_types'] = 'csv';
		$this->load->library('upload', $uploadconfig);
		
		if($this->upload->do_upload()){
					
					$uploaddata=$this->upload->data();
					return $uploaddata;
				}else 
		{
		//error inserting
			echo "not csv";
				
		}
		
	}
	
	public function readCSV($csvFile){
			$file_handle = fopen($csvFile, 'r');
			
			while (!feof($file_handle) ) {
				$line_of_text[] = fgetcsv($file_handle);
			}
			
			fclose($file_handle);
			
		return $line_of_text;
	}
	
	
	public function displaycsv(){
		
		 
		$uploaddata = $this->uploadCSV();
		$filepath = $uploaddata['file_name'];
				
		if($filepath!=NULL){
			$contaunerarray=array();
			$csv = $this->readCSV("./tempupload/".$filepath);
			$containerarray = array_fill(0,count($csv),array_fill(0,95,NULL));
		
			for( $i=0 ; $i < count($csv) ; $i++){
				for( $j = 0 ; $j < count($csv[$i]) ; $j++){
			
					$containerarray[$i][$j]=$csv[$i][$j];
				}
				//$this->mbg_model->addEntryfromCSV($containerarray[$i]);
			}
		$data['filename']=$filepath;
		$data['saved']=TRUE;
		$data['rows']=$containerarray;
		unlink("./tempupload/".$filepath);
		$this->load->view('import_view',$data);
					
		}else{
			redirect('import');
			
		}
		
	}
	
	public function insertcsv(){
		if($filepath!=NULL){
	
			
			$csv = $this->readCSV($filepath);
			$containerarray = array_fill(0,count($csv),array_fill(0,95,NULL));
		
			for( $i=1 ; $i < count($csv) ; $i++){
				for( $j = 0 ; $j < count($csv[$i]) ; $j++){
			
					echo $containerarray[$i][$j]=$csv[$i][$j];
					
			
				}
				//$this->mbg_model->addEntryfromCSV($containerarray[$i]);
			}
		$data['filename']=$filepath;
		$data['saved']=TRUE;
		$data['rows']=$containerarray;
		$this->load->view('import_view',$data);
				
		}else{
			redirect('import');
			
		}
		//call model
		
	}
	
	

	

}//end of controlloer

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */