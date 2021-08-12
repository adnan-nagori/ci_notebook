<?php

/**
 * 
 */
class Users_show extends CI_Model
{
	
	function __construct()
	{
		$this->userTbl = 'user_details';
	}

	function get_alluser()
	{
		$this->db->select('*')
				 ->from('user_details');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			// foreach ($query->result() as $value)
			// {
			// 	// $value->admin_id;	
			// 	$res = array('admin_id' => $value->admin_id);
			// 	return $res;
			// }
			$row = $query->result();
			// $res = 
			return $row;
		}else{
			
			return "";
		}
	}
}