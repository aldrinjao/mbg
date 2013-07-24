<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

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
	
		$id = $this->uri->segment(2);
		echo $id;	
		$searchresults = $this->mbg_model->getSingleEntry($id);
		$data['results'] = $searchresults;
		
		$this->load->view('edit_entry_view',$data);
	}
	
	function updateEntry()
	{
	
		$data['inserted'] = FALSE;
		$data['file_error'] = FALSE;
		$this->load->library('form_validation');
		$this->load->helper('text');
		
		$rulesconfig = array(
               array(
                     'field'   => 'icommonname', 
                     'label'   => 'Common Name', 
                     'rules'   => 'required|trim'
                  ),
               array(
                     'field'   => 'iyearcollected', 
                     'label'   => 'Year Collected', 
                     'rules'   => 'is_natural_no_zero|trim|exact_length[4]'
                  ),
               array(
                     'field'   => 'imonthcollected', 
                     'label'   => 'Month Collected', 
                     'rules'   => 'is_natural_no_zero|trim|max_length[2]'
                  ),   
               array(
                     'field'   => 'idaycollected', 
                     'label'   => 'Day Collected', 
                     'rules'   => 'is_natural_no_zero|trim|max_length[2]'
                  )
            );

		$this->form_validation->set_rules($rulesconfig);
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;font-size:.8em;">INPUT ERROR:  ', '</div>');


		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
			
			if ($this->form_validation->run() == FALSE)
			{
				
				$this->load->view('add_entry_view',$data);
			}
			else
			{
				$uploaddata['file_name']=NULL;
				if($this->upload->do_upload()){
					$uploaddata=$this->upload->data();
			
				}else 
				{
					//error inserting
					$data['file_error']=TRUE;
					
				
				}
				
				/*$this->mbg_model->addEntry(
					$this->input->post('ikingdom'),
					$this->input->post('iphylum'),
					$this->input->post('iclass'),
					$this->input->post('iorder'),
					$this->input->post('ifamily'),
					$this->input->post('igenus'),
					$this->input->post('isubgenus'),
					$this->input->post('ispecies'),
					$this->input->post('isubspecies'),
					$this->input->post('isnauthor'),
					$this->input->post('iyearcollected'),
					$this->input->post('imonthcollected'),
					$this->input->post('idaycollected'),
					$this->input->post('icommonname'),
					$this->input->post('ibasis'),
					$this->input->post('ireference'),
					$this->input->post('iocean'),
					$this->input->post('icountry'),
					$this->input->post('iprovince'),
					$this->input->post('ithreat'),
					$this->input->post('ith'),
					$this->input->post('idbh'),
					$this->input->post('iyeareval'),
					$this->input->post('iremarks'),
					$uploaddata['file_name']
					
					);
		
					*/
						
				$data['inserted'] = TRUE;
				$this->load->view('add_entry_view',$data);	
				
			}//end of if validated
	
	
}
	
	

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */