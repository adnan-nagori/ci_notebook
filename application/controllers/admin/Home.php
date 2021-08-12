<!-- https://www.youtube.com/watch?v=bnZpMEi9Ojo -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('admin/admin_account');
		$this->load->library('upload');
		// $this->load->helper(array('form','url');

		if (!$this->session->userdata('admin_id')) 
		{
			redirect('admin/login');
		}
	}

	
	function index()
	{
		$data = array();
		if($this->session->userdata('admin_id'))
		{
			$data['admindata'] = $this->admin_account->getdata($this->session->userdata('admin_id'));
			//print_r($data);
			$this->load->view('admin/index', $data);
		
		}else{
			$this->load->view('admin/login');
		}
	}

	function logout()
	{
		$data = $this->session->all_userdata();
		foreach ($data as $key => $value)
		{
			$this->session->unset_userdata($key);
		}
		$this->session->set_flashdata('message', "Logged out successfully");
		redirect('admin/login');
	}
}