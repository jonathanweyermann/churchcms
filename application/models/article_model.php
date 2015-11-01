<?php
class Article_model extends CI_Model{
	

	/*
	 * Get Articles
	 * 
	 * @param - $order_by (string)
	 * @param - $sort (string)
	 * @param - $limit (int)
	 * @param - $offset (int)
	 * 
	 */
	public function get_articles($order_by = null, $sort='DESC', $limit = null, $offset = 0){
		$this->db->select('a.*, b.name as section_name, c.first_name, c.last_name');
		$this->db->from('articles as a');
		$this->db->join('sections AS b', 'b.id = a.section_id','left');
		$this->db->join('users AS c', 'c.id = a.user_id','left');
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $sort);
		}
		$query = $this->db->get();	
		return $query->result();
	}
	
	/*
	 * Get Articles
	 * 
	 * @param - $order_by (string)
	 * @param - $sort (string)
	 * @param - $limit (int)
	 * @param - $offset (int)
	 * 
	 */
	public function get_articles_by_section($order_by = null, $sort='DESC', $limit = null, $section, $offset = 0){
		$this->db->select('a.*, b.name as section_name, c.first_name, c.last_name');
		$this->db->from('articles as a');
		$this->db->join('sections AS b', 'b.id = a.section_id','left');
		$this->db->join('users AS c', 'c.id = a.user_id','left');
		$this->db->where('b.id', $section);
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $sort);
		}
		$query = $this->db->get();	
		return $query->result();
	}
	
	/*
	 * Get Filtered Articles
	*
	* @param - $order_by (string)
	* @param - $sort (string)
	* @param - $limit (int)
	* @param - $offset (int)
	*
	*/
	public function get_filtered_articles($keywords, $order_by = null, $sort = 'DESC', $limit = null, $offset = 0){
		$this->db->select('a.*, b.name as section_name, c.first_name, c.last_name');
		$this->db->from('articles as a');
		$this->db->join('sections AS b', 'b.id = a.section_id','left');
		$this->db->join('users AS c', 'c.id = a.user_id','left');
		$this->db->like('title', $keywords);
		$this->db->or_like('body', $keywords);
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $sort);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	/*
	 * Get Menu Items
	*
	*/
	public function get_menu_items(){
		$this->db->where('in_menu', 1);
		$this->db->order_by('order');
		$query = $this->db->get('articles');
        return $query->result();
	}
	
	/**
	 * Get Single Article
	 **/
	public function get_article($id){
		$this->db->where('id',$id);
		$query = $this->db->get('articles');
		return $query->row();
	}
	
	/*
	 * Get sections
	*
	* @param - (string) $order_by
	* @param - (string) $sort
	* @param - (int) $limit
	* @param - (int) $offset
	*
	*/
	public function get_sections($order_by = null, $sort = 'DESC', $limit = null, $offset = 0){
		$this->db->select('*');
		$this->db->from('sections');	
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $sort);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	/**
	 * Get Single Section
	 **/
	public function get_section($id){
		$this->db->where('id',$id);
		$query = $this->db->get('sections');
		return $query->row();
	}
	
	/**
	 * Insert Article
	 * 
	 * @param - (array) $data
	 **/
	public function insert($data){
		$this->db->insert('articles', $data);
		return true;
	}
	
	/**
	 * Update Article
	 *
	 * @param - (array) $data
	 * @param - (int) $id
	 **/
	public function update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('articles', $data);
		return true;
	}
	
	/*
	 * Publish Article
	*
	* @param - (int) $id
	*/
	public function publish($id){
		$data = array(
               		'is_published' => 1
            	);

		$this->db->where('id', $id);
		$this->db->update('articles', $data); 
	}
	
	/*
	 * Unpublish Article
	*
	* @param - (int) $id
	*/
	public function unpublish($id){
		$data = array(
               		'is_published' => 0
            	);

		$this->db->where('id', $id);
		$this->db->update('articles', $data); 
	}
	
	/*
	 * Delete Article
	*
	* @param - (int) $id
	*/
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('articles', $data);
		return true;
	}
	
	/* Clean up excess audio files, run after update */
	public function file_cleanup(){
		$this->load->helper('chrome_logger');	
		$query = $this->db->get('articles');
		$map = directory_map('./uploads/', 1);
		$g = "x";
		foreach($map as $file)
		{
							
			//return $query->result();
			$g = $g . "--";
			$x = 0;
			$soundfile="";
			foreach($query->result() as $row){
				//return $row;
				$soundfile = $row->audio;
				$g = $g . "<" . $soundfile . "-" . $file . ">";
				if ($file==$soundfile)	{
					$g = $g . "files are the same";
					$x++;
				}
			}
			if ($x==0 )
			{
			 	$g = $g . "we're in the loop";
				unlink("./uploads/" . $file);
					$g = $g . "  removed: " . "./uploads/" . $file . " - ";
				
			}
			if (strlen($g) > 700)
   				$g = substr($g, 0, 700);
		}
		//return $g;
		//$this->session->set_flashdata('article_saved',  $file . "--" . $soundfile );
	}
	
	
	
	/**
	 * Insert Section
	 *
	 * @param - (array) $data
	 **/
	public function insert_section($data){
		$this->db->insert('sections', $data);
		return true;
	}
	
	/**
	 * Update Section
	 *
	 * @param - (array) $data
	 * @param - (int) $id
	 **/
	public function update_section($data, $id){
		$this->db->where('id', $id);
		$this->db->update('sections', $data);
		return true;
	}
	
	/*
	 * Delete Section
	*
	* @param - (int) $id
	*/
	public function delete_section($id){
		$this->db->where('id', $id);
		$this->db->delete('sections', $data);
		return true;
	}
	
}