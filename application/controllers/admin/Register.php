<!-- https://www.youtube.com/watch?v=bnZpMEi9Ojo -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Register extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// $this->load->library('encrypt');
		$this->load->model('admin/register_admin');
		$this->load->library('session');
		// $this->load->library('email');
	}

	public function index()
	{
		if($this->session->userdata('admin_id')){
			redirect('admin/home');	
		}else{
			$this->load->view('admin/register');
		}
	}


	function validation()
	{
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('admin_email','Email', 'trim|required|valid_email|is_unique[admin_details.ad_email]');
		$this->form_validation->set_rules('admin_password','Password','required|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('confirm_pass','Confirm Password','required|matches[admin_password]');
		// $this->form_validation->set_rules('user_name', 'Name', 'trim|required|regex_match[/[a-zA-Z ]|\s/]');
		if ($this->form_validation->run())
		{
			
			$data = array(
				'ad_first_name' 		=> $this->input->post('firstname'),
				'ad_last_name' 			=> $this->input->post('lastname'),
				'ad_email' 				=> $this->input->post('admin_email'),
				'ad_password' 			=> md5($this->input->post('admin_password'))
			);

			$admin_id = $this->register_admin->insert($data);

			if ($admin_id > 0)
			{
				$this->session->set_flashdata('message', 'Registerd Successfully. Login here!');
					redirect('admin/login');
			}

		} else {		
			$this->index();
		}
	}
}