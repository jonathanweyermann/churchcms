<?php
class Articles extends MY_Controller{
	public function index(){
		//Get Articles
		$data['articles'] = $this->Article_model->get_articles('id','DESC','10');
		
		//Get Carousel
		$data['carousels'] = $this->Carousel_model->get_carousels('id','ASC','5');
		
		//Get Menu Items
		$data['menu_items'] = $this->Article_model->get_menu_items();

		$data['sections'] = $this->Article_model->get_sections('id', 'DESC');
		//Load View
		$this->load->view('home', $data);
	}
	
	public function view($id){
		//Get Menu Items
		$data['menu_items'] = $this->Article_model->get_menu_items();
		
		//Get Article
		$data['article'] = $this->Article_model->get_article($id);
		$data['sections'] = $this->Article_model->get_sections('id', 'DESC');
		//Load View
		$this->load->view('inner', $data);
	}
}