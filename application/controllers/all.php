<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class All extends CI_Controller {

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
		
		$this->load->helper(array('form', 'url','email','string','csv_helper'));
		$data['resultflag'] = TRUE;
		$temp= $this->mbg_model->getAllEntry();
		$data['results'] = $temp;
		$this->load->view('all_view',$data);
		//array_to_csv($temp,  "test.csv");
		
	}
	
	public function saveasCSV(){
		
		$this->mbg_model->saveCSV();
		$data['resultflag'] = TRUE;
		$data['results'] = $this->mbg_model->getAllEntry();
		$this->load->view('all_view',$data);
	}
	
		public function saveasCSVthdbh(){
		
		$this->mbg_model->saveCSVthdbh();
		$data['resultflag'] = TRUE;
		$data['results'] = $this->mbg_model->getAllEntry();
		$this->load->view('all_view',$data);
	}

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */