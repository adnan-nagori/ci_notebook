<!-- https://www.youtube.com/watch?v=bnZpMEi9Ojo -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Private_area extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('account_model');
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));

		if (!$this->session->userdata('user_id'))
		{
			redirect('login');	
		}
	}

	function index()
	{
		$data = array();
        if($this->session->userdata('user_id')){
            $data['user'] = $this->account_model->getdata($this->session->userdata('user_id'));
        	$data['statall'] = $this->account_model->getallstate();
        	// $data['cityall'] = $this->account_model->getallcity();
            //load the view
        	// $this->load->view('account', $data,$res_state);
            $this->load->view('account', $data);
        }else{
            redirect('login');
        }

        // if ($res_state != '') {
        // }
		// if($this->session->userdata('user_id')){
		// 	$this->load->view('');
		// 	//redirect('private_area');	
		// }else{
			
		// $this->load->view('login');
		// }
		// echo 'Welcome User';
		// echo '<p align="center"><a href="'.base_url().'private_area/logout">Logout</a></p>';
	}

	function logout()
	{
		$data = $this->session->all_userdata();
		foreach ($data as $row => $rows_value)
		{
			$this->session->unset_userdata($row);
		}
		redirect('login');
	}

	function updateData()
	{
		// $this->form_validation->set_error_delimiters('<span style="color:red;">');
  //       $this->form_validation->set_rules('title', 'Title', 'trim|required');
  //       $this->form_validation->set_rules('content', 'Content', 'trim|required');

		$id = $this->input->post('user_id');
		$table_name = 'user_details'; // pass the real table name
		$state = $this->input->post('user_state');
		$res_ad = $this->db->where("ID",$state)->get("state")->result();
		$res_ad = $res_ad[0]->state_name;

		$hobbies = $this->input->post('user_hobbies');
    	$hobbies = implode(',',$hobbies);
    	

    	// if (!empty($_FILES['user_photo']['name']))
  //       {
  //           $this->form_validation->set_rules('user_photo', 'IMAGE Document', 'required');
  //       }    
       
        // upload img code   
        $image =@$_FILES['user_photo']['name'];
        // $rev_image=strrev($image);
        // $name_arr_image=explode(".", $rev_image);
        // $rev_ext_image=$name_arr_image[0];
        // $ext_image=strrev($rev_ext_image);
        // $name=time().".".$ext_image;
        // $final_name_image=trim($name);
        
        $config_img['upload_path'] = './uploads/';
        $config_img['allowed_types'] = 'jpeg|gif|jpg|png';
        $config_img['max_size'] = '1024';
        $config_img['file_name']=$image;
        //print_r($config_img);die;
        $this->upload->initialize($config_img);
        $check = $this->upload->do_upload('user_photo');
        // if (!$check) {
        //     $this->session->set_flashdata('message',$this->upload->display_errors('<p>', '</p>'));
        //     redirect('private_area');   
        // }
        
		$image1 = @$_FILES['user_photo1']['name'];
		$config_img1['upload_path'] = './uploads/';
		$config_img1['allowed_types'] = 'jpeg|gif|jpg|png';
		$config_img1['max_size'] = '1024';
		$config_img1['file_name'] = $image1;
		$this->upload->initialize($config_img1);
		$check=$this->upload->do_upload('user_photo1');

		// if (!empty($_FILES['user_gal']['name'])) {
			$filescount = count($_FILES['user_gal']['name']);
			for($i = 0; $i < $filescount; $i++){
				$_FILES['usr_gal']['name'] = $_FILES['user_gal']['name'][$i];
				$_FILES['usr_gal']['type'] = $_FILES['user_gal']['type'][$i];
				$_FILES['usr_gal']['tmp_name'] = $_FILES['user_gal']['tmp_name'][$i];
				$_FILES['usr_gal']['error'] = $_FILES['user_gal']['error'][$i];
				$_FILES['usr_gal']['size'] = $_FILES['user_gal']['size'][$i];

				//file upload configuration
				$uploadpath = 'uploads/gallery';
				$config_img2['upload_path'] = $uploadpath;
				$config_img2['allowed_types'] = 'jpeg|png|jpg|gif';

				//load and initialize upload library
				$this->upload->initialize($config_img2);

				//upload file to server
				if($this->upload->do_upload('usr_gal')){
					$filedata = $this->upload->data();
					// $uploaddata[$i]['file_name'] = $filedata['file_name'];
					$uploaddata[] = $filedata['file_name'];
				}
				// $this->upload->do_upload();
				// $filedata = $_FILES['usr_gal']['name'];
				// $uploaddata[] = $filedata;
			}
			$filedata = implode(',', $uploaddata);

		// }

        if($image == '' && $image1 == '' && $filedata == '' ){
        	$data = array(
				'user_phone' 	=> $this->input->post('user_phone'),
				'user_address' 	=> $this->input->post('user_address'),
				'user_state' 	=> $res_ad,
				'user_city' 	=> $this->input->post('user_city'),
				'user_gender' 	=> $this->input->post('user_gender'),
				'user_hobbies' 	=> $hobbies
			);	
        }elseif($image == '' && $filedata == '' && $image1 != '') {
        	$data = array(
				'user_phone' 	=> $this->input->post('user_phone'),
				'user_address' 	=> $this->input->post('user_address'),
				'user_state' 	=> $res_ad,
				'user_city' 	=> $this->input->post('user_city'),
				'user_gender' 	=> $this->input->post('user_gender'),
				'user_hobbies' 	=> $hobbies,
				'user_photo1' 	=> $image1
	    	);
        }elseif ($image1 == '' && $filedata == '' && $image != '') {
        	$data = array(
				'user_phone' 	=> $this->input->post('user_phone'),
				'user_address' 	=> $this->input->post('user_address'),
				'user_state' 	=> $res_ad,
				'user_city' 	=> $this->input->post('user_city'),
				'user_gender' 	=> $this->input->post('user_gender'),
				'user_hobbies' 	=> $hobbies,
				'user_photo' 	=> $image
	    	);
        }elseif($image == '' && $image1 == '' && $filedata != '' ){
        	$data = array(
				'user_phone' 	=> $this->input->post('user_phone'),
				'user_address' 	=> $this->input->post('user_address'),
				'user_state' 	=> $res_ad,
				'user_city' 	=> $this->input->post('user_city'),
				'user_gender' 	=> $this->input->post('user_gender'),
				'user_hobbies' 	=> $hobbies,
				'user_gallery' 	=> $filedata
			);
        }else{
        	$data = array(
				'user_phone' 	=> $this->input->post('user_phone'),
				'user_address' 	=> $this->input->post('user_address'),
				'user_state' 	=> $res_ad,
				'user_city' 	=> $this->input->post('user_city'),
				'user_gender' 	=> $this->input->post('user_gender'),
				'user_hobbies' 	=> $hobbies,
				'user_photo' 	=> $image,
				'user_photo1' 	=> $image1,
				'user_gallery' 	=> $filedata
			);
        }
    			
	    if($res = $this->account_model->upddata($table_name,$data,$id)) // call the method from the model
	    {
	        $this->session->set_flashdata('message', 'Data Updated Succefully');
	        redirect('private_area');	
	    }
	    else
	    {
	        $this->session->set_flashdata('message', 'not updated');
	     	redirect('private_area'); 				
	    }
	}

	

   	function fetch_city()
	{
		if($this->input->post('stateID'))
		{
	  		echo $this->account_model->fetch_city($this->input->post('stateID'));
		}
	}


	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
	}
}