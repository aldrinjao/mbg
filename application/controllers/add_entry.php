<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_entry extends CI_Controller {

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
		
		$this->load->helper(array('form', 'url','email'));
		$data['inserted'] = FALSE;
		$data['file_error'] = FALSE;
		$this->load->view('add_entry_view',$data);
	}
	
	public function insert(){
		
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


		$uploadconfig['upload_path'] = './uploads/';
		$uploadconfig['allowed_types'] = 'gif|jpg|png';
		$uploadconfig['max_size']	= '1000';
		$uploadconfig['max_width']  = '1024';
		$uploadconfig['max_height']  = '768';

		$this->load->library('upload', $uploadconfig);
			
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
					$data['error'] = array('error' => $this->upload->display_errors());
				
				}
				
				$this->mbg_model->addEntry(
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
					$uploaddata['file_name'],
					$this->input->post('iorigin'),
					$this->input->post('ilong'),
					$this->input->post('ilat'),
					$this->input->post('idplanted'),
					$this->input->post('iseedyear')
					
					);
		
		
						
				$data['inserted'] = TRUE;
				$this->load->view('add_entry_view',$data);	
				
			}//end of if validated
		
	}

function edit(){
			
		$data['file_error'] = FALSE;
		$data['input_error'] = FALSE;
		
		$id = $this->uri->segment(3);
		$data2['id']=$id;
		$data['results']= $this->mbg_model->getSingleEntry($id);
		
		$error = $this->uri->segment(4);

		if($data['results']){
			$this->load->view('edit_entry_view',$data);
		}else{
			//not existing redirects
			$this->load->view('error_view',$data2);
			
		}

}


function update_entry()
{
	
		$data['inserted'] = FALSE;
		$data['file_error'] = FALSE;
		$data['input_error'] = FALSE;
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


		$uploadconfig['upload_path'] = './uploads/';
		$uploadconfig['allowed_types'] = 'gif|jpg|png';
		$uploadconfig['max_size']	= '1000';
		$uploadconfig['max_width']  = '1024';
		$uploadconfig['max_height']  = '768';

		$this->load->library('upload', $uploadconfig);
			
			if ($this->form_validation->run() == FALSE)
			{
				
				$data['results']= $this->mbg_model->getSingleEntry($this->input->post('editid'));
				$this->load->view('edit_entry_view',$data);
			
			}
			else
			{
				
					
				$temp= $this->mbg_model->getSingleEntry($id);
					
					foreach($temp as $item) {
						$filepath=$item->SpeciesPic;
						echo $filepath;
					}
						
				if($this->upload->do_upload()){
					
					$uploaddata=$this->upload->data();
			
			
					if($uploaddata['file_name']!=NULL){
						
						$filepath=$uploaddata['file_name'];
						
					}
					
				}else 
				{
					$data['file_error']=TRUE;
				
				
				}
				
				$this->mbg_model->editEntry(
					$this->input->post('editid'),
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
					$filepath,
					$this->input->post('iorigin'),
					$this->input->post('ilong'),
					$this->input->post('ilat'),
					$this->input->post('idplanted'),
					$this->input->post('iseedyear')
					
					);
		
		
						
				$data['inserted'] = TRUE;
				$redir="add_entry/edit/".$this->input->post('editid').$filepath;
				redirect($redir);	
				
				}
	
}
		
		public function deleteEntry(){
				
				$this->mbg_model->deleteEntry($this->input->post('htaxonid'));
			
				
				$this->load->view('successdelete');
				
		}

}//end of controlloer

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */