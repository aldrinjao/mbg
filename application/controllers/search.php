<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

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
				
		$data['displayresult'] = "0";
		$this->load->vars($data);
		$data['searchterm']=null;
		$data['searchby']=null;
		$data['field_list'] = $this->mbg_model->getcolumns();
		$this->load->view('search_view',$data);
		$this->load->model('mbg_model');
	}
	
	
	public function searchby(){
			
		
		$data['displayresult'] = "1";
		$this->load->vars($data);
		
		$searchterm= $this->input->post('searchterm');
		$searchby= $this->input->post('searchcategory'); 
		
		if (($searchterm ==null) or ($searchby==null)){
			redirect ('search');
		}  
		
		$searchresults = $this->mbg_model->searchby($searchby,$searchterm);
		
		if($searchresults==false){
			$data['resultflag']=0;
			
		}else{
			$data['resultflag']=1;
		}
		
		$data['searchterm']=$searchterm;
		$data['searchby']=$searchby;
		$data['results'] = $searchresults;
		$data['field_list'] = $this->mbg_model->getcolumns();
		$this->load->view('search_view',$data);

	}


	public function entryInfo(){
	
	
		$id = $this->uri->segment(3);
		$data2['id']=$id;
		$data['results']= $this->mbg_model->getSingleEntry($id);
		$data['home']= FALSE; 
		$data['input_error'] = FALSE;
		 

		if($data['results']){
			$this->load->view('entry_view',$data);
		}else{
			//not existing redirects
			$this->load->view('error_view',$data2);
			
		}	

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */