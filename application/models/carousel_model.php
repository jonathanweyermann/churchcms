<?php
class Carousel_model extends CI_Model{
	

	/*
	 * Get carousels
	 * 
	 * @param - $order_by (string)
	 * @param - $sort (string)
	 * @param - $limit (int)
	 * @param - $offset (int)
	 * 
	 */
	public function get_carousels($order_by = null, $sort='DESC', $limit = null, $offset = 0){
		$this->db->select('*');
		$this->db->from('carousels');
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
	 * Get Single carousel
	 **/
	public function get_carousel($id){
		$this->db->where('id',$id);
		$query = $this->db->get('carousels');
		return $query->row();
	}
	
	
	
	
	/**
	 * Insert carousel
	 * 
	 * @param - (array) $data
	 **/
	public function insert($data){
		$this->db->insert('carousels', $data);
		return true;
	}
	
	/**
	 * Update carousel
	 *
	 * @param - (array) $data
	 * @param - (int) $id
	 **/
	public function update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('carousels', $data);
		return true;
	}
	
	
	
	/*
	 * Delete carousel
	*
	* @param - (int) $id
	*/
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('carousels', $data);
		return true;
	}
	
	/* Clean up excess image files, run after update */
	public function file_cleanup(){
		$query = $this->db->get('carousels');
		$map = directory_map('./carousel/', 1);
		$g = "x";
		foreach($map as $file)
		{
							
			//return $query->result();
			$g = $g . "--";
			$x = 0;
			$soundfile="";
			foreach($query->result() as $row){
				//return $row;
				$picture = $row->image;
				$g = $g . "<" . $soundfile . "-" . $file . ">";
				if ($file==$picture)	{
					$g = $g . "files are the same";
					$x++;
				}
			}
			if ($x==0 )
			{
			 	$g = $g . "we're in the loop";
				unlink("./carousel/" . $file);
					$g = $g . "  removed: " . "./carousel/" . $file . " - ";
				
			}
			if (strlen($g) > 700)
   				$g = substr($g, 0, 700);
		}
		//return $g;
		//$this->session->set_flashdata('carousel_saved',  $file . "--" . $soundfile );
	}
	
}