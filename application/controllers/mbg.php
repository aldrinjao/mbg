<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbg extends CI_Controller {

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
		
		$this->load->helper(array('form', 'url','email','string'));
		
		
		$id2 =  random_string('numeric', 5);
		$id = $id2 % $this->mbg_model->getNumberofEntries(); 
		$searchresults = $this->mbg_model->getSingleEntry($id);
		$data['results'] = $searchresults;
		$this->load->view('entry_view',$data);
		
	}
	
	
	

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */