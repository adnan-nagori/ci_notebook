<?php

/**
 * 
 */
class Admin_login extends CI_Model
{
	
	public function can_login($email, $password)
	{
		$this->db->where('ad_email', $email);
		$query = $this->db->get('admin_details');
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$password = md5($password);
				if($password == $row->ad_password)
				{
					$res = array('admin_id' => $row->admin_id, 'status' => 1);
					return $res;
				}else{
					return "Wrong Password";
				}
			}
		}else{
			return "Please enter registered email address.";
		}

	}
}