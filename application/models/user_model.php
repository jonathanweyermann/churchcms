<?php
class User_model extends CI_Model{
	/*
	* Get Users
	*
	* @param - (string) $order_by
	* @param - (string) $sort
	* @param - (int) $limit
	* @param - (int) $offset
	*
	*/
	public function get_users($order_by = null, $sort = 'DESC', $limit = null, $offset = 0){
		$this->db->select('*');
		$this->db->from('users');
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
	 * Get Single User
	 */
	public function get_user($id){
		$this->db->where('id',$id);
		$query = $this->db->get('users');
		return $query->row();
	}
	
	/**
	 * Insert
	 *
	 * @param - (array) $data
	 **/
	public function insert($data){
		$this->db->insert('users', $data);
		return true;
	}
	
	/*
	* Get User Groups
	*
	*/
	public function get_groups(){
        $query = $this->db->get('groups');
        return $query->result();
	}
	
	/*
	 * Get Single Group
	*/
	public function get_group($id){
		$this->db->where('id',$id);
		$query = $this->db->get('groups');
		return $query->row();
	}
	
	/**
	 * Update
	 *
	 * @param - (array) $data
	 * @param - (int) $id
	 **/
	public function update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		return true;
	}
	
	/*
	 * Delete
	*
	* @param - (int) $id
	*/
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('users', $data);
		return true;
	}
	
	/**
	 * Insert Group
	 *
	 * @param - (array) $data
	 **/
	public function insert_group($data){
		$this->db->insert('groups', $data);
		return true;
	}
	
	/**
	 * Update Group
	 *
	 * @param - (array) $data
	 * @param - (int) $id
	 **/
	public function update_group($data, $id){
		$this->db->where('id', $id);
		$this->db->update('groups', $data);
		return true;
	}
	
	/*
	 * Delete Group
	*
	* @param - (int) $id
	*/
	public function delete_group($id){
		$this->db->where('id', $id);
		$this->db->delete('groups', $data);
		return true;
	}
	
}