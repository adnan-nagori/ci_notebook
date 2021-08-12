<!-- https://www.youtube.com/watch?v=bnZpMEi9Ojo -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// $this->load->library('encrypt');
		$this->load->model('register_model');
		$this->load->library('session');
		// $this->load->library('email');
	}

	function index()
	{
		if($this->session->userdata('user_id')){
			redirect('private_area');	
		}else{
		
		$this->load->view('register');
		}
	}

	function validation()
	{
		// $this->form_validation->set_rules('user_name', 'Name', 'trim|required|regex_match[/[a-zA-Z ]|\s/]');
		$this->form_validation->set_rules('user_name', 'Name', 'trim|required|alpha');
		$this->form_validation->set_rules('user_email', 'Email Address', 'trim|required|valid_email|is_unique[user_details.user_email]');
		$this->form_validation->set_rules('user_password', 'Password', 'required|min_length[5]|max_length[12]');
		if ($this->form_validation->run())
		{
			$verification_key = md5(rand());
			// $encrypted_password = $this->encrypt->encode($this->input->post('user_password'));
			$data = array(
				'user_name' 		=> $this->input->post('user_name'),
				'user_email' 		=> $this->input->post('user_email'),
				'user_password' 	=> md5($this->input->post('user_password')),
				'verification_key'	=> $verification_key
			);
			$id = $this->register_model->insert($data);
			
			if ($id > 0) {
			
				$subject = "Please verify email for login";
				$message = "<p>HI ".$this->input->post('user_name')."</p>
				<p> This is email verification mail from xyz. For complete registration process and login into system. First you want to verify your email by click this <a href='".base_url()."register/verify_email/".$verification_key."'>link</a>.</p>
				<p>Once you click this link your email will be verified and you can login into system.</p>
				<p>Thanks,</p>";
				$config = array(
					'protocol'		=> 'smtp',
					'smtp_host'		=> 'ssl://smtp.gmail.com',
					'smtp_post'		=> 465,
					'smtp_user'		=> 'eway.dev3@gmail.com',
					'smtp_pass'		=> 'eway@1234#'		
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('eway.dev3@gmail.com','test_user');
				$this->email->to($this->input->post('user_email'));
				$this->email->subject($subject);
				$this->email->message($message);
				$send = $this->email->send();
				if ($send)
				{
					// echo "mail send";
					$this->session->set_flashdata('message', 'Check in your email for email verification mail');
					redirect('register');
				}else{
					$this->session->set_flashdata('message', 'Register successfully, but email not sent');
					redirect('register');
				}
			}
		} else {
			
			$this->index();
		}
	}

	function verify_email()
	{
		if($this->uri->segment(3))
		{
			$verification_key = $this->uri->segment(3);
			if ($this->register_model->verify_email($verification_key))
			{
				$data['message'] = '<h1 align="center"> Your email has beed successfully verified, Now you can login from <a href ="'.base_url().'login">here</a></h1>';
			}else{
				$data['message'] = '<h1 align="center">Invalid Link</h1>';
			}
			$this->load->view('email_verification', $data);
		}
	}
}