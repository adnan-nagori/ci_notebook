<?php

/**
 * 
 */
class Admin_account extends CI_Model
{
	
	function __construct()
	{
		$this->adminTbl = 'admin_details';
	}

	function getdata($admin_id)
	{
		// echo "admin id in model" .$admin_id;
		// die;
		$this->db->select('*');
		$this->db->from($this->adminTbl);
		$this->db->where('admin_id', $admin_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			// foreach ($query->result() as $value)
			// {
			// 	// $value->admin_id;	
			// 	$res = array('admin_id' => $value->admin_id);
			// 	return $res;
			// }
			$row = $query->row_array();
			// $res = 
			return $row;
		}else{
			
			return "";
		}
	}
}