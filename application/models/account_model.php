<?php

/**
 * 
 */
class Account_model extends CI_Model
{
	function __construct() 
	{
	    $this->userTbl = 'user_details';
	}

	// function getdata($user_id, $field=array())
	function getdata($user_id)
	{

		$this->db->select('*');
	    $this->db->from($this->userTbl);
	    $this->db->where('user_id', $user_id );
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
    	{
	        $row = $query->row_array();
	        return $row;
    	}
	}

	public function upddata($table_name,$data,$id)
	{
	    // extract($data);
	    return $this->db
	    		->where('user_id', $id)
	    		->update($table_name, $data);
	    // return true;
	}

	function getallstate()
	{
		$this->db->select('*')
				 ->from('state');
		$query = $this->db->get();
		if($query->num_rows() >0){
			return $query->result();
			
		}
		//$query=$this->db->select('*')->from('zone')->where('town',$town)->get();
	}

	// function getallcity()
	// {
	// 	$this->db->select('*')
	// 			 ->from('cities');
	// 	$query = $this->db->get();
	// 	if($query->num_rows() >0){
	// 		return $query->result();
			
	// 	}
	// 	//$query=$this->db->select('*')->from('zone')->where('town',$town)->get();
	// }

	function fetch_city($state_id)
 	{
	  	$this->db->where('state_id', $state_id);
	  	$this->db->order_by('city_name', 'ASC');
	  	$query = $this->db->get('cities');
	  	$output = '<option value="">Select City</option>';
	  	foreach($query->result() as $row)
	  	{
	  		$output .= '<option value="'.$row->city_name.'">'.$row->city_name.'</option>';
	  	}
	  	return $output;
 	}
}