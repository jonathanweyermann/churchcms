<?php
class Sections extends MY_Controller{

	
	public function view($id){
		//Get Menu Items
		$data['menu_items'] = $this->Article_model->get_menu_items();
		
		//Get Article
		$data['article'] = $this->Article_model->get_article($id);
		$data['sections'] = $this->Article_model->get_sections('id', 'DESC');
		$data['articles'] = $this->Article_model->get_articles_by_section('id','DESC',99,$id);
		//Load View
		$this->load->view('section', $data);
	}
}