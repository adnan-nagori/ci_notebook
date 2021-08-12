<?php

/**
 * 
 */
class Register_admin extends CI_Model
{
	function insert($data)
	{
		$this->db->insert('admin_details', $data);
		return $this->db->insert_id();
	}

}