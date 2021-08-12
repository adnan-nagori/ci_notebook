<!-- https://www.youtube.com/watch?v=bnZpMEi9Ojo -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/admin_login');
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->userdata('admin_id')){
			redirect('admin/home');	
		}else{
			$this->load->view('admin/login');
		}
	}

	public function validation()
	{
		$this->form_validation->set_rules('admin_email','Email Address','trim|required|valid_email');
		$this->form_validation->set_rules('admin_password','Password', 'required');
		if ($this->form_validation->run())
		{
			$result = array();
			$result = $this->admin_login->can_login($this->input->post('admin_email'), $this->input->post('admin_password'));
			print_r($result);
			// die;
			if($result['status'] == 1)
			{
				$this->session->set_userdata('admin_id', $result['admin_id']);
				redirect('admin/home');
			}else{
				$this->session->set_flashdata('message', $result);
				redirect('admin/login');
			}
		}else{
			echo "user not valid";
		}
	}
}