<!-- https://www.youtube.com/watch?v=bnZpMEi9Ojo -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Show_users extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/users_show');
		$this->load->model('admin/admin_account');
		$this->load->library('session');
		$this->load->helper(array('form','url'));
	}

	function index()
	{
		if($this->session->userdata('admin_id'))
		{
			$admin_id = $this->session->userdata('admin_id');
			$data1['users'] = $this->users_show->get_alluser();
			$data1['admindata'] = $this->admin_account->getdata($admin_id);
			// $data1['admindata'] = $admin_name;
			$this->load->view('admin/show_user', $data1);
		}else{
			echo "admin id not found.";
		}
	}
}