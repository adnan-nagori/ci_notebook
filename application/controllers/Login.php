<!-- https://www.youtube.com/watch?v=bnZpMEi9Ojo -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// $this->load->library('encrypt');
		$this->load->model('login_model');
		$this->load->library('session');
	}

	function index()
	{
		if($this->session->userdata('user_id')){
			redirect('private_area');	
		}else{
			
		$this->load->view('login');
		}
	}

	function validation()
	{
		$this->form_validation->set_rules('user_email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('user_password','Password','required');
		if ($this->form_validation->run())
		{
			$result = array();
			$result = $this->login_model->can_login($this->input->post('user_email'), $this->input->post('user_password'));
			// print_r($result);
			// die;
			if ($result['status'] == 1) {
				$this->session->set_userdata('user_id', $result['user_id']);
				redirect('private_area');
			}else{
				$this->session->set_flashdata('message', $result);
				redirect('login');
			}
		}else{
			$this->index();
		}
	}
}