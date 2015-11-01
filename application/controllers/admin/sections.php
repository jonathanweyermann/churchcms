<?php 
class Sections extends MY_Controller{
	public function __construct(){
		parent::__construct();
		
		//Access Control
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
	}
	
	/*
	 * Sections Main Index
	 */
	public function index(){
		//Get Sections
		$data['sections'] = $this->Article_model->get_sections('id', 'DESC');
		
		//Views
        $data['main_content'] = 'admin/sections/index';
        $this->load->view('admin/layouts/main', $data);
	}
	
	/*
	 * Add Section
	*/
	public function add(){
		//Validation Rules
		$this->form_validation->set_rules('name','Name','trim|required|min_length[4]|xss_clean');
		$data['sections'] = $this->Article_model->get_sections('id', 'DESC');
		if($this->form_validation->run() == FALSE){
			//Views
			$data['main_content'] = 'admin/sections/add';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create Data Array
			$data = array(
					'name'         => $this->input->post('name')
			);
				
			//Sections Table Insert
			$this->Article_model->insert_section($data);
				
			//Create Message
			$this->session->set_flashdata('section_saved', 'Your section has been saved');
				
			//Redirect to pages
			redirect('admin/sections');
		}
	}
	
	/*
	 * Edit Section
	*
	* @param - $id
	*/
	public function edit($id){
		//Validation Rules
		$this->form_validation->set_rules('name','Name','trim|required|min_length[4]|xss_clean');
		$data['sections'] = $this->Article_model->get_sections('id', 'DESC');
		if($this->form_validation->run() == FALSE){
			$data['section'] = $this->Article_model->get_section($id);
			
			//Views
			$data['main_content'] = 'admin/sections/edit';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create Data Array
			$data = array(
					'name'         => $this->input->post('name')
			);
	
			//Articles Table Insert
			$this->Article_model->update_section($data, $id);
	
			//Create Message
			$this->session->set_flashdata('section_saved', 'Your section has been saved');
	
			//Redirect to pages
			redirect('admin/sections');
		}
	}
	
	/*
	 * Delete Section
	*
	* @param - (int) $id
	*/
	public function delete($id){
		$this->Article_model->delete_section($id);
			
		//Create Message
		$this->session->set_flashdata('section_deleted', 'Your section has been deleted');
	
		//Redirect to articles
		redirect('admin/sections');
	}
	
	public function view($id){
		//Get Sections
		$data['sections'] = $this->Article_model->get_sections('id', 'DESC');
		$data['section'] = $this->Article_model->get_section($id);
		//Get Articles
		$data['articles'] = $this->Article_model->get_articles_by_section('id','DESC',99,$id);
	
	
		//Get Users
		$data['users'] = $this->User_model->get_users('id','DESC',5);
		
		//View
		$data['main_content'] = 'admin/sections/details';
		$this->load->view('admin/layouts/main',$data);
	}
	
}