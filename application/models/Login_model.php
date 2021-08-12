<?php

/**
 * 
 */
class Login_model extends CI_Model
{
	function can_login($email, $password)
	{
		$this->db->where('user_email', $email);
		$query = $this->db->get('user_details');
		if ($query->num_rows() > 0) 
		{
			foreach($query->result() as $row)
			{
				if($row->is_email_verified == 'yes')
				{
					$password = md5($password);
					if($password == $row->user_password)
					{
						$res = array('user_id' => $row->user_id, 'status' => 1); 
						return $res;
						//$this->session->set_userdata('user_id', $row->user_id);						
					}else{
						return "wrong password";
					}
				}else
				{
					return "First verify your email address";
				}
			}	
		}else{
			return "wrong email address";
		}
	}
}