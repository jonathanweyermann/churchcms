<?php 
class Dashboard extends MY_Controller{
	public function __construct(){
		parent::__construct();
		
		//Access Control
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
	}

	public function index(){
		//Get Articles
		$data['articles'] = $this->Article_model->get_articles('id','DESC',10);
		
		//Get sections
		$data['sections'] = $this->Article_model->get_sections('id','DESC',5);
		
		//Get Users
		$data['users'] = $this->User_model->get_users('id','DESC',5);
		
		//View
		$data['main_content'] = 'admin/dashboard/index';
		$this->load->view('admin/layouts/main',$data);
	}
}