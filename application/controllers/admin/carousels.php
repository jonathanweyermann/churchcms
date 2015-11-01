<?php 
class Carousels extends MY_Controller{
	public function __construct(){
		parent::__construct();
		
		//Access Control
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
	}
	
	public function index(){
		
		//Get Carousels
		$data['carousels'] = $this->Carousel_model->get_carousels('id','DESC',10);
		
		//Get sections
		$data['sections'] = $this->Article_model->get_sections('id','DESC',5);
		
		//Get Users
		$data['users'] = $this->User_model->get_users('id','DESC',5);
		
		//View
		$data['main_content'] = 'admin/carousels/index';
		$this->load->view('admin/layouts/main',$data);
	}
	
	/*
	 * Add carousel
	 */
	public function add(){
		//Validation Rules
		$this->form_validation->set_rules('title1','Main Title','required');
		if (empty($_FILES['image']['name']))
		{
			$this->form_validation->set_rules('image','Image','required');
		}
		$data['sections'] = $this->Article_model->get_sections();
		
		$data['users'] = $this->User_model->get_users();
		
		$data['groups'] = $this->User_model->get_groups();
		
		if($this->form_validation->run() == FALSE){
			//Views
			$data['main_content'] = 'admin/carousels/add';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Configure image upload
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size']	= '5000';
			$config['file_name'] = substr(preg_replace('/[^a-zA-Z0-9]/', '', ucwords($_FILES['image']['name'])),0,-3);
			$img="";
			if ($config['file_name']!=""){
				$img = $config['file_name'] . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			}
			
			//Create Carousels Data Array
			$data = array(
					'header1'          => $this->input->post('title1'),
					'header2'          => $this->input->post('title2'),
					'image'		       => $img
			);
			
			//Carousels Table Insert
			$this->Carousel_model->insert($data);
			
			//finish Image upload
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('image'))
			{
				$this->session->set_flashdata('carousel_saved',$this->upload->display_errors());
			}
			else
			{
				$this->session->set_flashdata('carousel_saved','success');
			}
			//Create Message
			//$this->session->set_flashdata('carousel_saved', image);	
			//$this->session->set_flashdata('carousel_saved', 'Your carousel has been saved');
			
			//Redirect to pages
			redirect('admin/carousels');
		}
	}
	
	/*
	 * Edit carousel
	 * 
	 * @param - $id
	*/
	public function edit($id){
		
		//Validation Rules
		$this->form_validation->set_rules('title1','Main Title','required');
		if (empty($_FILES['image']['name']))
		{
			$this->form_validation->set_rules('image','Image','required');
		}

		$data['sections'] = $this->Article_model->get_sections();
	
		$data['users'] = $this->User_model->get_users();
		$data['groups'] = $this->User_model->get_groups();
		$data['carousel'] = $this->Carousel_model->get_carousel($id);
	
		if($this->form_validation->run() == FALSE){
			//Views
			$data['main_content'] = 'admin/carousels/edit';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Configure image upload
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size']	= '5000';
			$config['file_name'] = substr(preg_replace('/[^a-zA-Z0-9]/', '', ucwords($_FILES['image']['name'])),0,-3);
			$img="";
			if ($config['file_name']!=""){
				$img = $config['file_name'] . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			}
			//Create Carousels Data Array
			$data = array(
					'header1'          => $this->input->post('title1'),
					'header2'          => $this->input->post('title2'),
					'image'		       => $img
			);
				
			//Carousels Table Insert
			$this->Carousel_model->update($data, $id);
			
			
			//finish Image upload
			$this->load->library('upload', $config);
			$this->upload->overwrite = true;
			
			if ( ! $this->upload->do_upload('image'))
			{
				//$this->session->set_flashdata('carousel_saved',$this->upload->display_errors());
			}
			else
			{
				
				//$this->session->set_flashdata('carousel_saved', $bob . "abc");
				//foreach($bob as $b){
				// $x = $x . " " . $b;
				//}
				
			}
			
			//Create Message
			$this->session->set_flashdata('carousel_saved', 'Your carousel has been saved');
			$this->session->set_flashdata('carousel_saved', image);		
			$this->session->set_flashdata('carousel_saved', 'cheese');					
			//Redirect to pages
			$bob = $this->Carousel_model->file_cleanup();
			//$this->session->set_flashdata('carousel_saved', $bob . "-x-");
			redirect('admin/carousels');
		}
	}
	

	
	/*
	 * Delete carousel
	 * 
	 * @param - (int) $id
	 */
	public function delete($id){
		$this->Carousel_model->delete($id);
		 
		//Create Message
		$this->session->set_flashdata('carousel_deleted', 'Your carousel has been deleted');
		$this->Carousel_model->file_cleanup();
		//Redirect to Carousels
		redirect('admin/carousels');
	}
}