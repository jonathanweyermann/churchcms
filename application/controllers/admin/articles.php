<?php 
class Articles extends MY_Controller{
	public function __construct(){
		parent::__construct();
		
		//Access Control
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
	}
	
	public function index(){
		if(!empty($this->input->post('keywords'))){
			//Get Filtered Articles
			$data['articles'] = $this->Article_model->get_filtered_articles($this->input->post('keywords'),'id','DESC',10);
		} else {
			//Get Articles
			$data['articles'] = $this->Article_model->get_articles('id','DESC',10);
		}	
		//Get sections
		$data['sections'] = $this->Article_model->get_sections('id','DESC',5);
		
		//Get Users
		$data['users'] = $this->User_model->get_users('id','DESC',5);
		
		//View
		$data['main_content'] = 'admin/articles/index';
		$this->load->view('admin/layouts/main',$data);
	}
	
	/*
	 * Add Article
	 */
	public function add(){
		//Validation Rules
		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('body','Body','trim|required|xss_clean');
		$this->form_validation->set_rules('is_published','Publish','required');
		$this->form_validation->set_rules('section','Section','required');
		
		$data['sections'] = $this->Article_model->get_sections();
		
		$data['users'] = $this->User_model->get_users();
		
		$data['groups'] = $this->User_model->get_groups();
		
		if($this->form_validation->run() == FALSE){
			//Views
			$data['main_content'] = 'admin/articles/add';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Configure audio upload
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'mp3|wma|wav';
			$config['max_size']	= '50000';
			$config['file_name'] = substr(preg_replace('/[^a-zA-Z0-9]/', '', ucwords($_FILES['audio']['name'])),0,-3);
			$aud="";
			if ($config['file_name']!=""){
				$aud = $config['file_name'] . "." . pathinfo($_FILES['audio']['name'], PATHINFO_EXTENSION);
			}
			
			//Create Articles Data Array
			$data = array(
					'title'         => $this->input->post('title'),
					'body'          => $this->input->post('body'),
					'section_id'   => $this->input->post('section'),
					'user_id'       => $this->input->post('user'),
					'access'   		=> $this->input->post('access'),
					'is_published'  => $this->input->post('is_published'),
					'in_menu'  		=> $this->input->post('in_menu'),
					'order'  		=> $this->input->post('order'),
					'video'         => $this->input->post('video'),
					'audio'			=> $aud,
					'calendar'      => $this->input->post('calendar')
			);
			
			//Articles Table Insert
			$this->Article_model->insert($data);
			
			//finish Audio upload
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('audio'))
			{
				$this->session->set_flashdata('article_saved',$this->upload->display_errors());
			}
			else
			{
				$this->session->set_flashdata('article_saved','success');
			}
			//Create Message
			$this->session->set_flashdata('article_saved', 'Your article has been saved');
			
			//Redirect to pages
			redirect('admin/articles');
		}
	}
	
	/*
	 * Edit Article
	 * 
	 * @param - $id
	*/
	public function edit($id){
		
		//Validation Rules
		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('body','Body','trim|required|xss_clean');
		$this->form_validation->set_rules('is_published','Publish','required');
		$this->form_validation->set_rules('section','Section','required');
	
		$data['sections'] = $this->Article_model->get_sections();
	
		$data['users'] = $this->User_model->get_users();
		$data['groups'] = $this->User_model->get_groups();
		$data['article'] = $this->Article_model->get_article($id);
	
		if($this->form_validation->run() == FALSE){
			//Views
			$data['main_content'] = 'admin/articles/edit';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Configure audio upload
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'mp3|wma|wav';
			$config['max_size']	= '50000';
			$config['file_name'] = substr(preg_replace('/[^a-zA-Z0-9]/', '', ucwords($_FILES['audio']['name'])),0,-3);
			if ($config['file_name']!=""){
				$aud = $config['file_name'] . "." . pathinfo($_FILES['audio']['name'], PATHINFO_EXTENSION);
			}
			//Create Articles Data Array
			$data = array(
					'title'         => $this->input->post('title'),
					'body'          => $this->input->post('body'),
					'section_id'   => $this->input->post('section'),
					'user_id'       => $this->input->post('user'),
					'access'   		=> $this->input->post('access'),
					'is_published'  => $this->input->post('is_published'),
					'in_menu'  		=> $this->input->post('in_menu'),
					'order'  		=> $this->input->post('order'),
					'video'  		=> $this->input->post('video'),
					'audio'			=> $aud,
					'calendar'      => $this->input->post('calendar')
			);
				
			//Articles Table Insert
			$this->Article_model->update($data, $id);
			
			
			//finish Audio upload
			$this->load->library('upload', $config);
			$this->upload->overwrite = true;
			
			if ( ! $this->upload->do_upload('audio'))
			{
				//$this->session->set_flashdata('article_saved',$this->upload->display_errors());
			}
			else
			{
				
				//$this->session->set_flashdata('article_saved', $bob . "abc");
				//foreach($bob as $b){
				// $x = $x . " " . $b;
				//}
				
			}
			
			//Create Message
			$this->session->set_flashdata('article_saved', 'Your article has been saved');
				
			//Redirect to pages
			$bob = $this->Article_model->file_cleanup();
			//$this->session->set_flashdata('article_saved', $bob . "-x-");
			redirect('admin/articles');
		}
	}
	
	/*
	 * Publish Article
	*
	* @param - (int) $id
	*/
	public function publish($id){
		//Publish Menu Items in array
		$this->Article_model->publish($id);
		 
		//Create Message
		$this->session->set_flashdata('article_published', 'Your article has been published');
	
		//Redirect to articles
		redirect('admin/articles');
	}
	 
	 
	/*
	 * Unpublish Article
	*
	* @param - (int) $id
	*/
	public function unpublish($id){
		//Publish Menu Items in array
		$this->Article_model->unpublish($id);
		 
		//Create Message
		$this->session->set_flashdata('article_unpublished', 'Your article has been unpublished');
	
		//Redirect to articles
		redirect('admin/articles');
	}
	
	/*
	 * Delete Article
	 * 
	 * @param - (int) $id
	 */
	public function delete($id){
		$this->Article_model->delete($id);
		 
		//Create Message
		$this->session->set_flashdata('article_deleted', 'Your article has been deleted');
		$this->Article_model->file_cleanup();
		//Redirect to articles
		redirect('admin/articles');
	}
}