<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicv extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date','blockchain'));
		$this->load->library(array('session', 'encrypt', 'email'));
		$this->load->model(array('plisting', 'manage','suser'));
		// $this->output->cache(0.5);
		$this->config->load('emailc');
		$data = array();
		$data_add = array();
	}
	
	public function cred(){
		
		$data = array();
		
		$data['page'] = 'Infactor';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// // $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}	
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$this->load->view('pages/cred_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}

	public function bondCreate(){
		
		$data = array();
		
		$data['page'] = 'bond-create';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// // $data['notifications'] = get_notification_status($options);
		}
		
		if(empty($_POST['g-recaptcha-response']))
		{
			$captcha_error = 'Captcha is required';
			log_message("error","empty g-reacptcha-response".$captcha_error);
			$data['flash_error'] = $this->session->flashdata('flashError');
		}
		else
		{
			$secret_key = $this->config->item('recaptcha_secret_key');
		
			$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
		
			$response_data = json_decode($response);
				
			log_message("info","g-reacptcha-response".$_POST['g-recaptcha-response']);

			if(!$response_data->success)
			{
				$captcha_error = 'Captcha verification failed';
				log_message("error","Captcha Verification failed".$response_data->success.$captcha_error);
			}
			else{
				$data['response'] = $response_data->success;
				log_message("info","Captcha Verified".$response_data->success);
				
			}
				
		}

		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		
		$this->load->view('pages/public/bond_create_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	
	public function boss101(){
        
        $data = array();
        
        $data['page'] = 'bond';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// // $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
        
        $this->load->view('pages/public/bond_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
    }
	
	public function cordaBridge(){
        
        $data = array();
        
        $data['page'] = 'corda_bridge';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// // $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
       
        $this->load->view('pages/public/corda_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
    }
	
	
	public function projects(){
        
        $data = array();
        
        $data['page'] = 'projects';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
       
        $this->load->view('pages/public/projects_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
    }
	
	public function projectsDetail(){
        
        $data = array();
        
        $data['page'] = 'projects_detail';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
       
        $this->load->view('pages/public/projects_detail_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
    }
	
	public function beneficiary(){
		
		$data = array();
		
		$data['page'] = 'beneficiary';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
				
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/beneficiary_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	
	}
	
	public function buyersupplier(){
		
		$data = array();
		
		$data['page'] = 'buyersupplier';
		$data['pcountry'] = 0;

		if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cm']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
			$dbdata = $this->manage->get_paypal_paymentby_tx($_GET['tx']);
			$db = json_encode($dbdata);
			if(sizeof($dbdata) > 0 ){
				$this->session->set_flashdata('msg_type', 'error');
				// redirect($this->uri->uri_string());
				redirect(current_url());
			}
			else{
				$burn = burnXDC($_GET['amt']);
				$status = explode(': ',$burn[10]);
				$status = $status[1];
				$status = str_replace(",","", $status);
				if($status == true){
					$_GET['burnStatus'] = $status;
					// $transactionHash = explode(': ',$burn[13]);
					$transactionHash = $burn[13];
					$transactionHash = str_replace(array("'",","),"", $transactionHash);
					$_GET['transactionHash'] = $transactionHash;
					$result = $this->manage->add_paypal_details($_GET);

				}
				else{
					$_GET['burnStatus'] = false;
					$_GET['transactionHash'] = '0x';
					$result = $this->manage->add_paypal_details($_GET);
				}
			
			}
			
		}

		$action = $this->input->post('action');
		$data['instrument'] = $this->input->post('instrument');
		$data['country'] = $this->input->post('pcountry');
		if($this->input->post('name') != " " ){
			$data['name'] = $this->input->post('name');
		}
		$data['currency_supported'] = $this->input->post('currency_supported');
		$data['amount'] = $this->input->post('amount');
		$data['maturity_date'] = $this->input->post('maturity_date');
		$data['docRef'] = $this->input->post('docRef');
		$data['contractAddr'] = $this->input->post('contractAddr');
		$data['deployerAddr'] = $this->input->post('deployerAddr');
		$data['secretKey'] = $this->input->post('secretKey');

		

		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$ccountries = $this->plisting->get_country();
		
		if($ccountries && !empty($ccountries) && is_array($ccountries) && sizeof($ccountries) <> 0){
			$data['pcountries'] = $ccountries;			
		}
		

		if($action == 'adddetail'){

			$result['contract'] = $this->manage->add_instrument($data);
			$addr = $this->input->post('addr');
			$doc = $this->input->post('doc');
			// log_message("info","<<1.".$addr,"3.".$doc);
			$result['txn'] = $this->manage->update_paypalpayment_by_txn($addr,$doc);
		}
		if($action == 'getpasskey'){
			$key = $this->manage->get_secretkey($contractAddr);
		}
	
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/buyer_supplier_view', $data);
		
		
	}

	public function funddesign(){
		
		$data = array();
		
		$data['page'] = 'funddesign';
		$data['pcountry'] = 0;

		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			// redirect(base_url().'log/out');
		}

		if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cm']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
			$dbdata = $this->manage->get_paypal_paymentby_tx($_GET['tx']);
			$db = json_encode($dbdata);
			if(sizeof($dbdata) > 0 ){
				$this->session->set_flashdata('msg_type', 'error');
				// redirect($this->uri->uri_string());
				redirect(current_url());
			}
			else{
				$burn = burnXDC($_GET['amt']);
				$status = explode(': ',$burn[10]);
				$status = $status[1];
				$status = str_replace(",","", $status);
				if($status == true){
					$_GET['burnStatus'] = $status;
					// $transactionHash = explode(': ',$burn[13]);
					$transactionHash = $burn[13];
					$transactionHash = str_replace(array("'",","),"", $transactionHash);
					$_GET['transactionHash'] = $transactionHash;
					$result = $this->manage->add_paypal_details($_GET);

				}
				else{
					$_GET['burnStatus'] = false;
					$_GET['transactionHash'] = '0x';
					$result = $this->manage->add_paypal_details($_GET);
				}
			
			}
			
		}

		$action = $this->input->post('action');
		$data['country'] = $this->input->post('pcountry');
		if($this->input->post('name') != " " ){
			$data['name'] = $this->input->post('name');
		}
		$data['mmob'] = $this->input->post('mmob');
		$data['currency_supported'] = $this->input->post('currency_supported');
		$data['amount'] = $this->input->post('amount');
		$data['quantity'] = $this->input->post('quantity');
		$data['manu_method'] = $this->input->post('manu_method');
		$data['material_type'] = $this->input->post('material_type');
		$data['docRef'] = $this->input->post('docRef');
		$data['contractAddr'] = $this->input->post('contractAddr');
		$data['deployerAddr'] = $this->input->post('deployerAddr');
		$data['secretKey'] = $this->input->post('secretKey');
		$data['transactionHash'] = $this->input->post('transactionHash');

		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$ccountries = $this->plisting->get_country();
		
		if($ccountries && !empty($ccountries) && is_array($ccountries) && sizeof($ccountries) <> 0){
			$data['pcountries'] = $ccountries;			
		}
		
		$allStats = getXinFinStats();
		
		$data['xdc_usd'] = $allStats->priceUsd;
		$show = getConverted('INR');
		foreach($show as $sh) {
		
		log_message("info","INR_USD".$sh) ;
		$data['xdc_inr'] = $data['xdc_usd'] * $sh;
		
		}
		$show = getConverted('GBP');
		foreach($show as $sh) {
		
		log_message("info","GBP_USD".$sh) ;
		$data['xdc_gbp'] = $data['xdc_usd'] * $sh;
		
		}
		$show = getConverted('JPY');
		foreach($show as $sh) {
		
		log_message("info","JPY_USD".$sh) ;
		$data['xdc_jpy'] = $data['xdc_usd'] * $sh;
		
		}
		$show = getConverted('SGD');
		foreach($show as $sh) {
		
		log_message("info","SGD_USD".$sh) ;
		$data['xdc_sgd'] = $data['xdc_usd'] * $sh;
		
		}
		$show = getConverted('EUR');
		foreach($show as $sh) {
		
		log_message("info","EUR_USD".$sh) ;
		$data['xdc_eur'] = $data['xdc_usd'] * $sh;
		
		}

		if($action == 'adddetail'){
			log_message("info","@@@@".$data['contractAddr']);
			$result['contract'] = $this->manage->add_funddesign($data);
			$addr = $this->input->post('addr');
			$doc = $this->input->post('doc');
			// log_message("info","<<1.".$addr,"3.".$doc);
			$result['txn'] = $this->manage->update_paypalpayment_by_txn($addr,$doc);
		}
		if($action == 'getpasskey'){
			$key = $this->manage->get_secretkey($contractAddr);
		}
	
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/fund_design', $data);
		
		
	}

	public function buyerssupplier(){
		
		$data = array();
		
		$data['page'] = 'b_s';
				
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$milliseconds = round(microtime(true) * 1000);
		
		
		$action = $this->input->post('action');
		$data['email'] = strtolower($this->input->post('memail'));
		$data['name'] = $this->input->post('mname');
		$data['mobile'] = $this->input->post('mmob');
		$data['compN'] = $this->input->post('mcomp');
		$data['loanp'] = $this->input->post('loanp');
		$data['docRef'] = $data['loanp'].$milliseconds;
		$data['amount'] = $this->input->post('amount');
		$data['currency'] = $this->input->post('currency');
		$NewDate = Date('Y-m-d', strtotime("+90 days"));
		$data['maturityDate'] = $NewDate;

		$split = preg_split("/[+\s]+/", $data['mobile']);
		$ccountries = $this->plisting->get_country_byphone($split[1]);
		if($ccountries && !empty($ccountries) && is_array($ccountries) && sizeof($ccountries) <> 0){
			foreach($ccountries as $country){
				$data['country'] = $country->tfc_name;
			}
						
		} 
		
		
		// echo json_encode($data);
		// die;
		
		if($action == 'send_mail'){
			// echo (">>>".$data['country'].$split[1]);
			// die;
			$data['result'] = $this->manage->add_funding_details($data);
			// echo json_encode($data);
			// die;
			$config = array();
			$config = $this->config->item('$econfig');
						
			$this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$suser = $this->manage->get_superadmin();
			
			$from_email = 'info@tradefinex.org'; 
			$to_email = $this->input->post('memail'); 
					
			$this->email->from($from_email, 'Admin Tradefinex'); 
			$this->email->to($to_email);
			$this->email->bcc($from_email);
			$this->email->set_mailtype('html');
			$this->email->set_newline("\r\n");
			$this->email->subject('Apply for Funding'); 
			$mail_body = $this->load->view('templates/mails/funding_mail_body', $data, TRUE);
			$this->email->message($mail_body);
		
            		
			// Send mail ** Our customer support team will respond to your query as soon as possible. Please find below the details of the query submitted.
			if($this->email->send()){ 
				$this->session->set_flashdata('msg_type', 'success');
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Sent</h4>"); 
				$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Thank you for your requirement. Your requirement has been received. Our team will respond to your requirement as soon as possible.</h3>"); 
			}	
			else{ 
				$this->session->set_flashdata('msg_type', 'error');
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Can't be Sent</h4>"); 
				$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Error in sending Email. Please try again.</h3>");
			}
			
			redirect(base_url().'thankyouc');
		}
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/b_s_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/finance_doc_scripts', $data);
		$this->load->view('includes/footern');
		
		
	}
	
	public function fees(){
		
		$data = array();
		
		$data['page'] = 'fees';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
				
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/fees_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	
	}	
	
	
	public function hostMasternode(){
		
		$data = array();
		
		$data['page'] = 'host_masternode';
		
				
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			// redirect(base_url().'log/out');
		}
		
		$action = $this->input->post('action');
		$number = $this->input->post('nummasternode');

		$allStats = getXinFinStats();
		
		$data['xdc_usd'] = $allStats->priceUsd;

		$data['total_price'] = floatval($data['xdc_usd'] * 10000000);

		
		$data['amount'] =  floatval(800 + $data['total_price']);
		
		
		if($action == "kycdoc"){
			$data['status'] = $this->input->post('status');
			$data['hash'] = $this->input->post('hash');
			$result1 = $this->manage->masternode_kyc_details($data);
		}

		if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cm']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
			$dbdata = $this->manage->get_paypal_payment_masternodeby_tx($_GET['tx']);
			$db = json_encode($dbdata);
			if(sizeof($dbdata) > 0 ){
				$this->session->set_flashdata('msg_type', 'error');
				// redirect($this->uri->uri_string());
				redirect(current_url());
			}else{
				$result = $this->manage->add_masternode_paypal_details($_GET);
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-family: 'open_sansregular';font-size:30px;color:#282c3f;font-weight:700;'>Confirmation</h4>"); 
				$this->session->set_flashdata("email_sent", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#c5c5c5;padding-left:8px;padding-right:8px;'> Thank you for setting Masternode. "); 
				$this->load->view('includes/headern', $data);
				$this->load->view('includes/header_publicn', $data);
				$this->load->view('pages/thankyou_signup', $data);
				$this->load->view('includes/footer_commonn', $data);
				$this->load->view('pages_scripts/thankyou_scripts', $data); 
				$this->load->view('includes/footern', $data);
			}
			
		}
		
		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/host_masternode_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	
	}
	
	
	
	
	public function markets(){
        
        $data = array();
        
        $data['page'] = 'markets';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// // $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
        
        $this->load->view('pages/public/markets_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
    }
	
	
	
	public function marketsValidus(){
        
        $data = array();
        
        $data['page'] = 'marketsValidus';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// // $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
        
        $this->load->view('pages/public/markets_validus_view.php', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
    }
	
	
	
	//TODO:Registration
	public function investerRegistration(){
        
        $data = array();
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		$mail_data = array();
                
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
//			$data['full_name'] = $user['user_full_name'];
//			$data['user_id'] = $user['user_id'];
			// redirect(base_url().'dashboard');
                    redirect(base_url().'log/out');
		}else{
			// redirect(base_url().'log/out');
                    $action = $this->input->post('action');
                    
                    $data['uname'] = $this->input->post('first_name');
                    $data['uemail'] = $this->input->post('email');
                    $data['ummob'] = $this->input->post('mmob');
                    
                    $mail_data['uname'] = $this->input->post('first_name');
                    $mail_data['uemail'] = $this->input->post('email');
                    $mail_data['ummob'] = $this->input->post('mmob');
            	
                    $random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
                    $data['hash'] = $random_hash;
                    
                    $data['user_type'] = $this->input->post('user_type');
                    $user_type = $this->input->post('user_type');
		
                    
                    if($action == 'signup'){
						$result = $this->manage->add_validus_user($data, $user_type);
                    }   
                    
                    $data['page'] = 'investerRegistration';
                    $data['user_id'] = 0;
                    $data['full_name'] = '';
                   
                    if(!empty($result) && is_array($result) && sizeof($result) <> 0){
			
			// $this->manage->update_rotp($otpval, $result[0]->tfu_id);
			$created = $result[0]->tfu_created;
			$time_now = strtotime(date('Y-m-d H:i:s'));
			// $expired = strtotime('+3 hours', strtotime($result[0]->tfu_created));
			$expired = strtotime('+3 hours', strtotime(date('Y-m-d H:i:s')));
			
			$config = $this->config->item('$econfig');
		
			$this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$from_email = $config['smtp_user']; 
			$to_email = $this->input->post('email'); 
			
			$mail_data['generator']= $random_hash;
			$url = base_url().'/publicv/investorDoc?investor='.$mail_data['generator'];
			$request_string = 'email='.$to_email.'&hash='.$random_hash.'&expired='.$expired;
			$encode_request_string = $this->encrypt->encode($request_string, $encryption_key);

			
			$mail_data['encoded_uri'] = $encode_request_string;			
			$this->email->from($from_email, 'Admin Tradefinex'); 
			$this->email->to($to_email);
			$this->email->set_mailtype('html');
			$this->email->set_newline("\r\n");
			$this->email->subject('Account Activation by Tradefinex'); 
			$this->email->subject('Account Activation by Tradefinex'); 
			$mail_body = $this->load->view('templates/mails/welcome_account_validus_mail_body', $mail_data, TRUE);
			$this->email->message($mail_body);
			
			// Send mail 
			if($this->email->send()){ 
				$data['msg'] = 'success';
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-family: 'open_sansregular';font-size:30px;color:#282c3f;font-weight:700;'>Confirmation Mail</h4>"); 
				$this->session->set_flashdata("email_sent", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#c5c5c5;padding-left:8px;padding-right:8px;'> A verification mail already sent to <a href='mailto:$to_email' style='font-family: 'open_sansregular';color:#33c088;' target='_top'>$to_email</a>, to confirm the validity of your email address. After receiving the email follow the link provided to complete you registration. Click <a href='".base_url()."' style=''>here</a> to go to home.</h3>"); 
			}
			else{ 
				$data['msg'] = 'email_error';
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Registration Acknowledgement</h4>");
				$this->session->set_flashdata("email_sent", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>We are unable to sent mail of your reactivation link. We will get back to you shortly. Please click <a href='".base_url()."publicv/contact' style=''>here</a> to contact us for your resolution.</h3>"); 
			}
					
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
			$this->load->view('pages/thankyou_signup', $data);
			$this->load->view('includes/footer_commonn', $data);
			$this->load->view('pages_scripts/thankyou_scripts', $data); 
			$this->load->view('includes/footern', $data);
			
                    }else{
			
			if($action == 'signup'){
				$this->session->set_flashdata("error_signup", "<font color='red' class='alert-error' style='margin-left:20px'>Email-ID already registered. Try another.</font>");
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
			$this->load->view('pages/public/invester_registration_view.php', $data);
			$this->load->view('includes/footer_commonn', $data);
			$this->load->view('pages_scripts/common_scripts', $data);
			$this->load->view('includes/footern', $data);
            }
		}
                
    }
	

	public function investorDoc(){
		$genertator = urlencode(htmlentities(htmlspecialchars(trim($_GET['investor']))));
		
		if(!ctype_alnum($genertator)){
			redirect(base_url());
		}
		$checkUser = $this->manage->checkValidusUser($genertator);

		

		if(empty($checkUser)){
			redirect(base_url());
		}

		$data = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		$data['email'] = $checkUser[0]->tfv_email;
		$data['unid']= $checkUser[0]->tfv_id;

		// $checkUserDoc = $this->manage->checkUserDoc($data['unid']);

		// if(!empty($checkUserDoc)){
		// 	redirect(base_url());
		// }

		$mail_data = array();

		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/inverstor_docuploads_view.php', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern', $data);
		
	}


	public function uploadDoc(){
		$data = [];
   
	 	$count = count($_FILES['files']['name']);

	  	//Email
		$Econfig = $this->config->item('$econfig');
		
		$rece = array($this->input->post('email'),$Econfig['smtp_user']);
		$this->email->initialize($Econfig);
		$from_email = $this->input->post('email'); 
		$to_email = $Econfig['smtp_user'];
		$this->email->from("",$this->input->post('email')); 
		$this->email->to(implode(', ', $rece));
		$this->email->set_mailtype('html');
		$this->email->set_newline("\r\n");
		$this->email->subject('Investor Documents'); 
		$this->email->message('Your uploaded documents are attached below');

      	for($i=0;$i<$count;$i++){
    
			if(!empty($_FILES['files']['name'][$i])){
		
				$_FILES['file']['name'] = $_FILES['files']['name'][$i];
				$_FILES['file']['type'] = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['files']['error'][$i];
				$_FILES['file']['size'] = $_FILES['files']['size'][$i];
		
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx|doc';
				$config['max_size'] = '5048';
				$config['file_name'] = rand(1,9999)."_".$_FILES['files']['name'][$i];
				$this->load->library('upload',$config); 
				$this->upload->initialize($config);

				$ImgName = $config['file_name'];
				// $url2 = base_url().'/uploads/'.$ImgName;
				// var_dump($url2);die();
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					$ImgPath =$uploadData['full_path'];
					$docs['uid'] = $this->input->post('rndid');
					$docs['name'] = $this->input->post('email');
					$docs['image_name'] = $filename;
					
					$saveData = $this->manage->addDocs($docs);
					$this->email->attach($ImgPath);
					
				}
			}
		
		}
	
		if($this->email->send()){
			$data['msg'] = 'success';
			$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-family: 'open_sansregular';font-size:30px;color:#282c3f;font-weight:700;'>Confirmation Mail</h4>"); 
			$this->session->set_flashdata("email_sent", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#c5c5c5;padding-left:8px;padding-right:8px;'> Your documents upload successfully. Click<a href='".base_url()."' style=''>here</a> to go to home.</h3>"); 
		}
		else{ 
			$data['msg'] = 'email_error';
			$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Document Upload Acknowledgement</h4>");
			$this->session->set_flashdata("email_sent", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Something went wrong try again or Please click <a href='".base_url()."publicv/contact' style=''>here</a> to contact us for your resolution.</h3>"); 
		}

		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/thankyou_signup', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/thankyou_scripts', $data); 
		$this->load->view('includes/footern', $data);
	}


	public function getPasskey(){
		
		$data = array();

		
		if ($this->input->is_ajax_request()){
			$pass = $this->input->post('pass');
			$contractAddr = $this->input->post('contractAddr');
		}

		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		if($pass == 'getpasskey'){
			$key = $this->manage->get_secretkey($contractAddr);
			// log_message("info",json_encode($key));
		}
		if($pass == 'getpasskeyfund'){
			$key = $this->manage->get_secretkey_fund($contractAddr);
			// log_message("info",json_encode($key));
		}
		foreach($key as $k){
			$data['key'] = $k->tfi_secretKey;
			$data['key'] = $k->tffd_secretKey;
			
		}
		echo json_encode($data);
	}

	public function financier(){
		
		$data = array();
		
		$data['page'] = 'financier';

		$action = $this->input->post('action');
		$docRef = $this->input->post('docRef');

		
			
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			// redirect(base_url().'log/out');
		}
		
		$date = date('Y-m-d');
		$instrument = $this->manage->get_instrument($date);
		$design = $this->manage->get_funddesign();
		$buyersupplier = $this->manage->get_buyersupplier($date);
		
		if($instrument && !empty($instrument) && is_array($instrument) && sizeof($instrument) <> 0){
			$data['instrument'] = $instrument;	
					
		}
		if($design && !empty($design) && is_array($design) && sizeof($design) <> 0){
			$data['design'] = $design;						
		}
		if($buyersupplier && !empty($buyersupplier) && is_array($buyersupplier) && sizeof($buyersupplier) <> 0){
			$data['buyersupplier'] = $buyersupplier;					
		}
				
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/financier_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}

	public function statistics(){
		
		$data = array();
		
		$data['page'] = 'statistics';

			
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			// redirect(base_url().'log/out');
		}
		$d;
		$data['rec_sum']=0;
		$data['loc_sum']=0;
		$data['pay_sum']=0;
		$data['sblc_sum']=0;
		$data['wr_sum']=0;
		$data['bg_sum']=0;
		$data['oth_sum']=0;
		$data['tot_sum']=0;
		$usd_amount = 0;
		$date = date('Y-m-d');
		// $instrument = $this->manage->get_instrument($date);
		$data['count'] = $this->manage->get_instrument_active_count($date);
		$data['total_count'] = $this->manage->get_instrument_count();
		$receivable = $this->manage->get_receivable_instrument_sum($date);
		foreach($receivable['instrument'] as $k){
			if($k->tfi_currency == "USD"){
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($k->tfi_amount);
			}
			elseif($k->tfi_currency == "XDC"){
				$allStats = getXinFinStats();		
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price']) * floatval($k->tfi_amount);
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($usd_amount);
				
				
			}
			elseif($k->tfi_currency == "GBP"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price'] = $sh;
				
				}
				$usd_amount = floatval($data['price']) * floatval($k->tfi_amount);
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "EUR"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price'] = $sh;
				
				}
				$usd_amount = floatval($data['price']) * floatval($k->tfi_amount);
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "JPY"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price'] = $sh;
				
				}
				$usd_amount = floatval($data['price']) * floatval($k->tfi_amount);
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "SGD"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_rec'] = $sh;
				
				}
				$usd_amount = floatval($data['price_rec']) * floatval($k->tfi_amount);
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($usd_amount);
				
			}
			
			
		}
		foreach($receivable['funding'] as $f){
			if($f->tfbs_currency == "USD"){
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($f->tfbs_amount);
			}
			elseif($f->tfbs_currency == "XDC"){
				$allStats = getXinFinStats();		
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_rec'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_rec']) * floatval($f->tfbs_amount);
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($usd_amount);
				
				
			}
			elseif($f->tfbs_currency == "GBP"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_rec'] = $sh;
				
				}
				$usd_amount = floatval($data['price_rec']) * floatval($f->tfbs_amount);
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "EUR"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_rec'] = $sh;
				
				}
				$usd_amount = floatval($data['price_rec']) * floatval($f->tfbs_amount);
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "JPY"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_rec'] = $sh;
				
				}
				$usd_amount = floatval($data['price_rec']) * floatval($f->tfbs_amount);
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($usd_amount);
				
			}
			elseif($f->tfbs_currency == "SGD"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_rec'] = $sh;
				
				}
				$usd_amount = floatval($data['price_rec']) * floatval($f->tfbs_amount);
				$data['rec_sum'] = floatval($data['rec_sum']) + floatval($usd_amount);
				
			}

			
			
		}
		$sblc = $this->manage->get_sblc_instrument_sum($date);
		foreach($sblc['instrument'] as $k){
			if($k->tfi_currency == "USD"){
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($k->tfi_amount);
			}
			elseif($k->tfi_currency == "XDC"){
				$allStats = getXinFinStats();	
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_sblc'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_sblc']) * floatval($k->tfi_amount);
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($usd_amount);
				
				
			}
			elseif($k->tfi_currency == "GBP"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_sblc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_sblc']) * floatval($k->tfi_amount);
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "EUR"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_sblc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_sblc']) * floatval($k->tfi_amount);
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "JPY"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_sblc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_sblc']) * floatval($k->tfi_amount);
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "SGD"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_sblc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_sblc']) * floatval($k->tfi_amount);
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($usd_amount);
				
			}
			
			
		}
		foreach($sblc['funding'] as $f){
			if($f->tfbs_currency == "USD"){
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($f->tfbs_amount);
			}
			elseif($f->tfbs_currency == "XDC"){
				$allStats = getXinFinStats();	
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_sblc'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_sblc']) * floatval($f->tfbs_amount);
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($usd_amount);
				
				
			}
			elseif($f->tfbs_currency == "GBP"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_sblc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_sblc']) * floatval($f->tfbs_amount);
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "EUR"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_sblc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_sblc']) * floatval($f->tfbs_amount);
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "JPY"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_sblc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_sblc']) * floatval($f->tfbs_amount);
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($usd_amount);
				
			}
			elseif($f->tfbs_currency == "SGD"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_sblc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_sblc']) * floatval($f->tfbs_amount);
				$data['sblc_sum'] = floatval($data['sblc_sum']) + floatval($usd_amount);
				
			}

			
			
		}
		$loc = $this->manage->get_loc_instrument_sum($date);
		foreach($loc['instrument'] as $k){
			if($k->tfi_currency == "USD"){
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($k->tfi_amount);
			}
			elseif($k->tfi_currency == "XDC"){
				$allStats = getXinFinStats();	
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_loc'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_loc']) * floatval($k->tfi_amount);
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($usd_amount);
				
				
			}
			elseif($k->tfi_currency == "GBP"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_loc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_loc']) * floatval($k->tfi_amount);
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "EUR"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_loc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_loc']) * floatval($k->tfi_amount);
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "JPY"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_loc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_loc']) * floatval($k->tfi_amount);
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "SGD"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_loc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_loc']) * floatval($k->tfi_amount);
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($usd_amount);
				
			}
			
			
		}
		foreach($loc['funding'] as $f){
			if($f->tfbs_currency == "USD"){
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($f->tfbs_amount);
			}
			elseif($f->tfbs_currency == "XDC"){
				$allStats = getXinFinStats();	
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_loc'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_loc']) * floatval($f->tfbs_amount);
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($usd_amount);
				
				
			}
			elseif($f->tfbs_currency == "GBP"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_loc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_loc']) * floatval($f->tfbs_amount);
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "EUR"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_loc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_loc']) * floatval($f->tfbs_amount);
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "JPY"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_loc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_loc']) * floatval($f->tfbs_amount);
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($usd_amount);
				
			}
			elseif($f->tfbs_currency == "SGD"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_loc'] = $sh;
				
				}
				$usd_amount = floatval($data['price_loc']) * floatval($f->tfbs_amount);
				$data['loc_sum'] = floatval($data['loc_sum']) + floatval($usd_amount);
				
			}

			
			
		}
		$bg = $this->manage->get_bg_instrument_sum($date);
		foreach($bg['instrument'] as $k){
			if($k->tfi_currency == "USD"){
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($k->tfi_amount);
			}
			elseif($k->tfi_currency == "XDC"){
				$allStats = getXinFinStats();		
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_bg'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_bg']) * floatval($k->tfi_amount);
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($usd_amount);
				
				
			}
			elseif($k->tfi_currency == "GBP"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_bg'] = $sh;
				
				}
				$usd_amount = floatval($data['price_bg']) * floatval($k->tfi_amount);
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "EUR"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_bg'] = $sh;
				
				}
				$usd_amount = floatval($data['price_bg']) * floatval($k->tfi_amount);
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "JPY"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_bg'] = $sh;
				
				}
				$usd_amount = floatval($data['price_bg']) * floatval($k->tfi_amount);
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "SGD"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_bg'] = $sh;
				
				}
				$usd_amount = floatval($data['price_bg']) * floatval($k->tfi_amount);
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($usd_amount);
				
			}
			
			
		}
		foreach($bg['funding'] as $f){
			if($f->tfbs_currency == "USD"){
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($f->tfbs_amount);
			}
			elseif($f->tfbs_currency == "XDC"){
				$allStats = getXinFinStats();		
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_bg'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_bg']) * floatval($f->tfbs_amount);
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($usd_amount);
				
				
			}
			elseif($f->tfbs_currency == "GBP"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_bg'] = $sh;
				
				}
				$usd_amount = floatval($data['price_bg']) * floatval($f->tfbs_amount);
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "EUR"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_bg'] = $sh;
				
				}
				$usd_amount = floatval($data['price_bg']) * floatval($f->tfbs_amount);
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "JPY"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_bg'] = $sh;
				
				}
				$usd_amount = floatval($data['price_bg']) * floatval($f->tfbs_amount);
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($usd_amount);
				
			}
			elseif($f->tfbs_currency == "SGD"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_bg'] = $sh;
				
				}
				$usd_amount = floatval($data['price_bg']) * floatval($f->tfbs_amount);
				$data['bg_sum'] = floatval($data['bg_sum']) + floatval($usd_amount);
				
			}

			
			
		}
		$pay = $this->manage->get_pay_instrument_sum($date);
		foreach($pay['instrument'] as $k){
			if($k->tfi_currency == "USD"){
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($k->tfi_amount);
			}
			elseif($k->tfi_currency == "XDC"){
				$allStats = getXinFinStats();		
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_pay'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_pay']) * floatval($k->tfi_amount);
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($usd_amount);
				
				
			}
			elseif($k->tfi_currency == "GBP"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_pay'] = $sh;
				
				}
				$usd_amount = floatval($data['price_pay']) * floatval($k->tfi_amount);
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "EUR"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_pay'] = $sh;
				
				}
				$usd_amount = floatval($data['price_pay']) * floatval($k->tfi_amount);
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "JPY"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_pay'] = $sh;
				
				}
				$usd_amount = floatval($data['price_pay']) * floatval($k->tfi_amount);
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "SGD"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_pay'] = $sh;
				
				}
				$usd_amount = floatval($data['price_pay']) * floatval($k->tfi_amount);
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($usd_amount);
				
			}
			
			
		}
		foreach($pay['funding'] as $f){
			if($f->tfbs_currency == "USD"){
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($f->tfbs_amount);
			}
			elseif($f->tfbs_currency == "XDC"){
				$allStats = getXinFinStats();		
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_pay'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_pay']) * floatval($f->tfbs_amount);
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($usd_amount);
				
				
			}
			elseif($f->tfbs_currency == "GBP"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_pay'] = $sh;
				
				}
				$usd_amount = floatval($data['price_pay']) * floatval($f->tfbs_amount);
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "EUR"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_pay'] = $sh;
				
				}
				$usd_amount = floatval($data['price_pay']) * floatval($f->tfbs_amount);
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "JPY"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_pay'] = $sh;
				
				}
				$usd_amount = floatval($data['price_pay']) * floatval($f->tfbs_amount);
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($usd_amount);
				
			}
			elseif($f->tfbs_currency == "SGD"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_pay'] = $sh;
				
				}
				$usd_amount = floatval($data['price_pay']) * floatval($f->tfbs_amount);
				$data['pay_sum'] = floatval($data['pay_sum']) + floatval($usd_amount);
				
			}

			
			
		}
		$oth = $this->manage->get_oth_instrument_sum($date);
		foreach($oth['instrument'] as $k){
			if($k->tfi_currency == "USD"){
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($k->tfi_amount);
			}
			elseif($k->tfi_currency == "XDC"){
				$allStats = getXinFinStats();		
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_oth'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_oth']) * floatval($k->tfi_amount);
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($usd_amount);
				
				
			}
			elseif($k->tfi_currency == "GBP"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_oth'] = $sh;
				
				}
				$usd_amount = floatval($data['price_oth']) * floatval($k->tfi_amount);
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "EUR"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_oth'] = $sh;
				
				}
				$usd_amount = floatval($data['price_oth']) * floatval($k->tfi_amount);
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "JPY"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_oth'] = $sh;
				
				}
				$usd_amount = floatval($data['price_oth']) * floatval($k->tfi_amount);
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "SGD"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_oth'] = $sh;
				
				}
				$usd_amount = floatval($data['price_oth']) * floatval($k->tfi_amount);
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($usd_amount);
				
			}

			
			
		}
		foreach($oth['funding'] as $f){
			if($f->tfbs_currency == "USD"){
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($f->tfbs_amount);
			}
			elseif($f->tfbs_currency == "XDC"){
				$allStats = getXinFinStats();		
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_oth'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_oth']) * floatval($f->tfbs_amount);
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($usd_amount);
				
				
			}
			elseif($f->tfbs_currency == "GBP"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_oth'] = $sh;
				
				}
				$usd_amount = floatval($data['price_oth']) * floatval($f->tfbs_amount);
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "EUR"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_oth'] = $sh;
				
				}
				$usd_amount = floatval($data['price_oth']) * floatval($f->tfbs_amount);
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "JPY"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_oth'] = $sh;
				
				}
				$usd_amount = floatval($data['price_oth']) * floatval($f->tfbs_amount);
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($usd_amount);
				
			}
			elseif($f->tfbs_currency == "SGD"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_oth'] = $sh;
				
				}
				$usd_amount = floatval($data['price_oth']) * floatval($f->tfbs_amount);
				$data['oth_sum'] = floatval($data['oth_sum']) + floatval($usd_amount);
				
			}

			
			
		}
		$wr = $this->manage->get_wr_instrument_sum($date);
		foreach($wr['instrument'] as $k){
			if($k->tfi_currency == "USD"){
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($k->tfi_amount);
			}
			elseif($k->tfi_currency == "XDC"){
				$allStats = getXinFinStats();		
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_wr'] = $allStats->priceUsd;
				
			
				$usd_amount = floatval($data['price_wr']) * floatval($k->tfi_amount);
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($usd_amount);
				
				
			}
			elseif($k->tfi_currency == "GBP"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_wr'] = $sh;
				
				}
				$usd_amount = floatval($data['price_wr']) * floatval($k->tfi_amount);
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "EUR"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_wr'] = $sh;
				
				}
				$usd_amount = floatval($data['price_wr']) * floatval($k->tfi_amount);
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "JPY"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_wr'] = $sh;
				
				}
				$usd_amount = floatval($data['price_wr']) * floatval($k->tfi_amount);
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "SGD"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_wr'] = $sh;
				
				}
				$usd_amount = floatval($data['price_wr']) * floatval($k->tfi_amount);
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($usd_amount);
				
			}
			
			
		}
		foreach($wr['funding'] as $f){
			if($f->tfbs_currency == "USD"){
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($f->tfbs_amount);
			}
			elseif($f->tfbs_currency == "XDC"){
				$allStats = getXinFinStats();
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_wr'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_wr']) * floatval($f->tfbs_amount);
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($usd_amount);
				
				
			}
			elseif($f->tfbs_currency == "GBP"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_wr'] = $sh;
				
				}
				$usd_amount = floatval($data['price_wr']) * floatval($f->tfbs_amount);
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "EUR"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_wr'] = $sh;
				
				}
				$usd_amount = floatval($data['price_wr']) * floatval($f->tfbs_amount);
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "JPY"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_wr'] = $sh;
				
				}
				$usd_amount = floatval($data['price_wr']) * floatval($f->tfbs_amount);
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($usd_amount);
				
			}
			elseif($f->tfbs_currency == "SGD"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_wr'] = $sh;
				
				}
				$usd_amount = floatval($data['price_wr']) * floatval($f->tfbs_amount);
				$data['wr_sum'] = floatval($data['wr_sum']) + floatval($usd_amount);
				
			}

			
			
		}

		$fund = $this->manage->get_fund_design_sum();
		foreach($fund as $k){
			if($k->tffd_currency == "USD"){
				$data['fund_design_sum'] = floatval($data['fund_design_sum']) + (floatval($k->tffd_amount) * floatval($k->tffd_quantity));
			}
			elseif($k->tffd_currency == "XDC"){
				$allStats = getXinFinStats();
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_fund'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_fund']) * (floatval($k->tffd_amount) * floatval($k->tffd_quantity));
				$data['fund_design_sum'] = floatval($data['fund_design_sum']) + floatval($usd_amount);
				
			}	
			
			elseif($k->tffd_currency == "GBP"){
				$show = getConversion($k->tffd_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_fund'] = $sh;
				
				}
				$usd_amount = floatval($data['price_fund']) * (floatval($k->tffd_amount)* floatval($k->tffd_quantity));
				$data['fund_design_sum'] = floatval($data['fund_design_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tffd_currency == "EUR"){
				$show = getConversion($k->tffd_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_fund'] = $sh;
				
				}
				$usd_amount = floatval($data['price_fund']) * (floatval($k->tffd_amount)* floatval($k->tffd_quantity));
				$data['fund_design_sum'] = floatval($data['fund_design_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tffd_currency == "JPY"){
				$show = getConversion($k->tffd_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['fund_design_sum'] = $sh;
				
				}
				$usd_amount = floatval($data['price_fund']) * (floatval($k->tffd_amount)* floatval($k->tffd_quantity));
				$data['fund_design_sum'] = floatval($data['fund_design_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tffd_currency == "SGD"){
				$show = getConversion($k->tffd_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_fund'] = $sh;
				
				}
				$usd_amount = floatval($data['price_fund']) * (floatval($k->tffd_amount) * floatval($k->tffd_quantity));
				$data['fund_design_sum'] = floatval($data['fund_design_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tffd_currency == "INR"){
				$show = getConversion($k->tffd_currency);
				foreach($show as $sh) {
				
				log_message("info","INR_USD".$sh) ;
				$data['price_fund'] = $sh;
				
				}
				$usd_amount = floatval($data['price_fund']) * (floatval($k->tffd_amount) * floatval($k->tffd_quantity));
				$data['fund_design_sum'] = floatval($data['fund_design_sum']) + floatval($usd_amount);
				
			}
			
			
		}
		$tot = $this->manage->get_instrument_sum($date);
		foreach($tot['instrument'] as $k){
			if($k->tfi_currency == "USD"){
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($k->tfi_amount);
			}
			elseif($k->tfi_currency == "XDC"){
				$allStats = getXinFinStats();		
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_tot'] = $allStats->priceUsd;
				
			
				$usd_amount = floatval($data['price_tot']) * floatval($k->tfi_amount);
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
				
				
			}
			elseif($k->tfi_currency == "GBP"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_tot'] = $sh;
				
				}
				$usd_amount = floatval($data['price_tot']) * floatval($k->tfi_amount);
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "EUR"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_tot'] = $sh;
				
				}
				$usd_amount = floatval($data['price_tot']) * floatval($k->tfi_amount);
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
			
			}
			elseif($k->tfi_currency == "JPY"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_tot'] = $sh;
				
				}
				$usd_amount = floatval($data['price_tot']) * floatval($k->tfi_amount);
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
				
			}
			elseif($k->tfi_currency == "SGD"){
				$show = getConversion($k->tfi_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_tot'] = $sh;
				
				}
				$usd_amount = floatval($data['price_tot']) * floatval($k->tfi_amount);
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
				
			}
			
			
		}
		foreach($tot['funding'] as $f){
			if($f->tfbs_currency == "USD"){
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($f->tfbs_amount);
			}
			elseif($f->tfbs_currency == "XDC"){
				$allStats = getXinFinStats();
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_tot'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_tot']) * floatval($f->tfbs_amount);
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
				
				
			}
			elseif($f->tfbs_currency == "GBP"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_tot'] = $sh;
				
				}
				$usd_amount = floatval($data['price_tot']) * floatval($f->tfbs_amount);
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "EUR"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_tot'] = $sh;
				
				}
				$usd_amount = floatval($data['price_tot']) * floatval($f->tfbs_amount);
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
			
			}
			elseif($f->tfbs_currency == "JPY"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['price_tot'] = $sh;
				
				}
				$usd_amount = floatval($data['price_tot']) * floatval($f->tfbs_amount);
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
				
			}
			elseif($f->tfbs_currency == "SGD"){
				$show = getConversion($f->tfbs_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_tot'] = $sh;
				
				}
				$usd_amount = floatval($data['price_tot']) * floatval($f->tfbs_amount);
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
				
			}

			
			
		}
		foreach($tot['funddesign'] as $fd){
			if($fd->tffd_currency == "USD"){
				$data['tot_sum'] = floatval($data['tot_sum']) + (floatval($fd->tffd_amount) * floatval($fd->tffd_quantity));
				log_message("info","#@@@@".$data['tot_sum']);
			}
			elseif($fd->tffd_currency == "XDC"){
				$allStats = getXinFinStats();
				
				log_message("info","XDC_USD".$allStats->priceUsd) ;
				$data['price_fund'] = $allStats->priceUsd;
				
				
				$usd_amount = floatval($data['price_fund']) * (floatval($fd->tffd_amount) * floatval($fd->tffd_quantity));
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
				
			}	
			
			elseif($fd->tffd_currency == "GBP"){
				$show = getConversion($fd->tffd_currency);
				foreach($show as $sh) {
				
				log_message("info","GBP_USD".$sh) ;
				$data['price_fund'] = $sh;
				
				}
				$usd_amount = floatval($data['price_fund']) * (floatval($fd->tffd_amount)* floatval($fd->tffd_quantity));
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
			
			}
			elseif($fd->tffd_currency == "EUR"){
				$show = getConversion($fd->tffd_currency);
				foreach($show as $sh) {
				
				log_message("info","EUR_USD".$sh) ;
				$data['price_fund'] = $sh;
				
				}
				$usd_amount = floatval($data['price_fund']) * (floatval($fd->tffd_amount)* floatval($fd->tffd_quantity));
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
			
			}
			elseif($fd->tffd_currency == "JPY"){
				$show = getConversion($fd->tffd_currency);
				foreach($show as $sh) {
				
				log_message("info","JPY_USD".$sh) ;
				$data['fund_design_sum'] = $sh;
				
				}
				$usd_amount = floatval($data['price_fund']) * (floatval($fd->tffd_amount)* floatval($fd->tffd_quantity));
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
				
			}
			elseif($fd->tffd_currency == "SGD"){
				$show = getConversion($fd->tffd_currency);
				foreach($show as $sh) {
				
				log_message("info","SGD_USD".$sh) ;
				$data['price_fund'] = $sh;
				
				}
				$usd_amount = floatval($data['price_fund']) * (floatval($fd->tffd_amount) * floatval($fd->tffd_quantity));
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
				
			}
			elseif($fd->tffd_currency == "INR"){
				$show = getConversion($fd->tffd_currency);
				foreach($show as $sh) {
				
				log_message("info","INR_USD".$sh) ;
				$data['price_fund'] = $sh;
				
				}
				$usd_amount = floatval($data['price_fund']) * (floatval($fd->tffd_amount) * floatval($fd->tffd_quantity));
				$data['tot_sum'] = floatval($data['tot_sum']) + floatval($usd_amount);
				
			}
			
			
		}
		$data['tot_act_sum'] = floatval($data['rec_sum'] + $data['wr_sum'] + $data['oth_sum'] + $data['loc_sum'] + $data['sblc_sum'] + $data['pay_sum'] + $data['bg_sum'] + $data['fund_design_sum']);
		$allStats = getXinFinStats();
		
		$data['xdc_usd'] = $allStats->priceUsd;
		$data['xdvolume'] = $allStats->xdcVol24HR ;
		
		$data['marketCap'] = $allStats->totalXDCFiat;
		$data['xdc_burnt'] = $allStats->burntBalance;
		$data['xdcMasternode'] = $allStats->totalMasterNodes;
		$data['stakedXDC'] = $allStats->totalStakedValue;
		$data['stakedXDCUSD'] = $allStats->totalStakedValueFiat;
		
		$data['rewards'] = $allStats->monthlyRewards;
		$data['rewardsUSD'] = $allStats->monthlyRewardsFiat;

		$utility = $this->manage->get_instrument_value();
		$data['utility'] = 20 + floatval(10 * $utility);

		$data['percent'] = $allStats->monthlyRewardPer;
		$data['percent_year'] = $allStats->yearlyRewardPer;
		// echo  $data['utility'] ;
		// die;
		
		if($instrument && !empty($instrument) && is_array($instrument) && sizeof($instrument) <> 0){
			$data['instrument'] = $instrument;						
		}


				
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/statistics_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	public function getAccess(){
		
		$data = array();
		
		$action = $this->input->post('action');
		$docRef = $this->input->post('docRef');
		$privkey = $this->input->post('privkey');
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;

		function startsWith ($string, $startString) 
		{ 
			$len = strlen($startString); 
			return (substr($string, 0, $len) === $startString); 
		} 
  

		if(startsWith($privkey,"0x")){
			$privkey = $this->input->post('privkey');
		}
		else{
			$privkey = "0x".$this->input->post('privkey');
		}
		
		if($action == 'getaccess'){
			$data['privatekey'] = getFinancier($privkey);
			$key = $this->manage->get_secretkey_by_docRef($docRef);
			foreach($key as $k){
				$data['key'] = $k->tfi_secretKey;
				$data['contractAddr'] = $k->tfi_contractAddr;
			}
		}
		if($action == 'getfundaccess'){
			$data['privatekey'] = getFinancier($privkey);
			$key = $this->manage->get_secretkey_by_docRef_design($docRef);
			foreach($key as $k){
				$data['key'] = $k->tffd_secretKey;
				$data['contractAddr'] = $k->tffd_contractAddr;
			}
		}

		if($action == 'getaccessint'){
			$key = $this->manage->get_secretkey_by_docRef($docRef);
			foreach($key as $k){
				$data['key'] = $k->tfi_secretKey;
				$data['contractAddr'] = $k->tfi_contractAddr;
			}
		}
		if($action == 'getaccessdesign'){
			$key = $this->manage->get_secretkey_by_docRef_design($docRef);
			foreach($key as $k){
				$data['key'] = $k->tffd_secretKey;
				$data['contractAddr'] = $k->tffd_contractAddr;
			}
			
		}
		$data['docRef'] = $docRef;
			
		if($action == 'getdetails'){
			log_message("info","checking".$action);
			$data['privatekey'] = getFinancier($privkey);
			$data['address'] = getAddress($privkey);
			if($data['privatekey'] == "true"){
				$data['contact'] = $this->manage->get_contact_details($docRef);
			}
			
		}
		if($action == 'getdetailsinternal'){
			
				$data['contact'] = $this->manage->get_contact_details($docRef);
			
			
		}
		if($action == 'sendmail'){
			$data['address'] = getAddress($privkey);
			
			$config = array();
			$config = $this->config->item('$econfig');
						
			$this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$suser = $this->manage->get_superadmin();
			
			$from_email = 'info@tradefinex.org'; 
			$to_email ="mansi@xinfin.org";
					
			$this->email->from($from_email, 'Admin Tradefinex'); 
			$this->email->to($to_email);
			$this->email->bcc($from_email);
			$this->email->set_mailtype('html');
			$this->email->set_newline("\r\n");
			$this->email->subject('Access for Buyer/Supplier Details'); 
			$mail_body = $this->load->view('templates/mails/req_doc_mail_body', $data, TRUE);
			$this->email->message($mail_body);
		
            		
			// Send mail ** Our customer support team will respond to your query as soon as possible. Please find below the details of the query submitted.
			if($this->email->send()){ 
				log_message("info","Email Sent successfully");
			}	
			else{ 
				log_message("error","Error in sending email");
			}
			
			

			
			
		}
		echo json_encode($data);
				
	}
	
	public function contact(){
		
		$data = array();
		
		$data['page'] = 'contact';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
				
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			
			// redirect(base_url().'dashboard');
			
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}

		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
		}

		if($data['user_id'] <> 0){
		
			$uresult = $this->suser->get_social_user_company_info_by_id($data['user_id']);
	
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				
				$data['ufname'] = $uresult[0]->tfs_first_name;
				$data['ulname'] = $uresult[0]->tfs_last_name;
				$data['uemail'] = $uresult[0]->tfs_email;
				$data['ucontact'] = $uresult[0]->tfs_contact_number;
				$data['uprofpic'] = $uresult[0]->tfs_pic_file;
				
			}else if(!empty($uresult)  && sizeof($uresult) <> 0){
				$uresulta = $this->suser->get_user_base_info_by_id_and_type($data['user_id']);
				if(!empty($uresulta) && is_array($uresulta) && sizeof($uresulta) <> 0){
					$data['ufname'] = $uresult[0]->tfs_first_name;
					$data['ulname'] = $uresult[0]->tfs_last_name;
					$data['uemail'] = $uresult[0]->tfs_email;
					$data['ucontact'] = $uresult[0]->tfs_contact_number;
					$data['uprofpic'] = $uresult[0]->tfs_pic_file;
				}
					
			}	
		
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
			
		}

		if(empty($_POST['g-recaptcha-response']))
		{
			$captcha_error = 'Captcha is required';
			log_message("error","empty g-reacptcha-response".$captcha_error);
			$data['flash_error'] = $this->session->flashdata('flashError');
		}
		else
		{
			$secret_key = $this->config->item('recaptcha_secret_key');
		
			$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
		
			$response_data = json_decode($response);
				
			log_message("info","g-reacptcha-response".$_POST['g-recaptcha-response']);

			if(!$response_data->success)
			{
				$captcha_error = 'Captcha verification failed';
				log_message("error","Captcha Verification failed".$response_data->success.$captcha_error);
			}
			else{
				$data['response'] = $response_data->success;
				log_message("info","Captcha Verified".$response_data->success);

				
			}
			
		}
		$action = $this->input->post('action');

		if($action == 'send_mail'){
			$config = array();
			$config = $this->config->item('$econfig');
						
			$this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$suser = $this->manage->get_superadmin();
			
			$from_email = 'contact@tradefinex.org'; 
			$to_email = $this->input->post('memail'); 
					
			$message = '<strong>Name : </strong>'.ucwords($this->input->post('mname')).'<br/>';
			$message .= '<strong>Email : </strong>'.$this->input->post('memail').'<br/>';
			$message .= '<strong>Contact : </strong>'.$this->input->post('mmob').'<br/>';
			$message .= '<strong>Company : </strong>'.$this->input->post('mcomp').'<br/>';
			// $message .= '<strong>User Type : </strong>'.$this->input->post('musertype').'<br/>';
			// $message .= '<strong>Service Type : </strong>'.$this->input->post('menquiry').'<br/>';
			$message .= '<strong>Message : </strong>'.$this->input->post('mmsg').'<br/>';
			
			$this->email->from($from_email, 'Support Tradefinex'); 
			$this->email->to($to_email);
			$this->email->bcc($from_email);
			$this->email->set_mailtype('html');
			$this->email->subject('Tradefinex Enquiry'); 
			$this->email->message($message);
					
			// Send mail ** Our customer support team will respond to your query as soon as possible. Please find below the details of the query submitted.
			if($this->email->send()){ 
				log_message("info","mail sent");
				$this->session->set_flashdata('msg_type', 'success');
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Sent</h4>"); 
				$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Thank you for your query. Your query has been received. Our customer support team will respond to your query as soon as possible.</h3>"); 
			}	
			else{ 
				log_message("error","mail not sent");
				$this->session->set_flashdata('msg_type', 'error');
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Can't be Sent</h4>"); 
				$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Error in sending Email. Please try again.</h3>");
			}
			redirect(base_url().'thankyouc');
		
		}
		
		
		// $this->load->view('includes/headern', $data);
		// $this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/contact_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function subscribe(){
		
		$action = $this->input->post('action');
		$request_page = $this->input->post('request_page');
		$encryption_key = $this->config->item('encryption_key');
		
		if($action == 'send_mail'){
				
			$config = $this->config->item('$econfig');
						
			$this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$suser = $this->manage->get_superadmin();
			
			$data['notifications'] = array();
			$data['notifications'] = get_initial_notification_status();
			
			if($data['user_id'] <> 0){
				
				$options = array();
				$options['user_id'] = $data['user_id'];
				$options['user_type'] = $data['user_type_ref'];
				
				// $data['notifications'] = get_notification_status($options);
			}
			
			$from_email = 'social@tradefinex.org'; // $config['smtp_user'];  
			$to_email = $this->input->post('semail'); 
			
			$request_string = 'email='.$to_email.'&action=unsubscribe';
			$encode_request_string = $this->encrypt->encode($request_string, $encryption_key);
					
			$message = '';
			$message .= '<strong>Email : </strong>'.$this->input->post('semail').'<br/>';
			$message .= 'Thanks for Your subscription <br/>. If you will want to unsubscribe from us in future please click <a href="'.base_url('unsubscribe/?'.$encode_request_string).'">here</a>.';
			
			$this->email->from($from_email, 'Support Tradefinex'); 
			$this->email->to($to_email);
			$this->email->cc($suser[0]->tfa_email);
			$this->email->set_mailtype('html');
			$this->email->subject('Tradefinex Subscription'); 
			$this->email->message($message); 
			
			// Send mail 
			if($this->email->send()){ 
			
				$data_add = array();
				$data_add['semail'] = $to_email;
				
				$this->manage->add_subscription($data_add);
				
			   	$this->session->set_flashdata("sub_email_action", $this->input->post('action_area'));
				$this->session->set_flashdata("sub_email_sent", "<font class='sub_msg alert' color='orange' style='float:left;margin-top:5px;padding:0px;font-size:12px;margin-bottom: 0px;'>Thank you for Your subscription to us.</font>"); 
			}	
			else{ 
			    $this->session->set_flashdata("sub_email_action", $this->input->post('action_area'));
				$this->session->set_flashdata("sub_email_sent", "<font class='sub_msg alert' color='red' style='float:left;margin-top:5px;padding:0px;font-size:12px;margin-bottom: 0px;'>Error in sending Email. Please try again.</font>"); 
			}
		}
		
		redirect(base_url().$request_page);
	}
		
	public function consortium(){
		
		$data = array();
		
		$data['page'] = 'consortium';
		$data['msg'] = '';
		$mail_data['mmsg'] = $this->input->post('mmsg');
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$mail_data['full_name'] = $this->input->post('mname');
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
	    	$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}

			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$action = $this->input->post('action');
		
		if($action == 'send_mail'){
				
			$config = $this->config->item('$econfig');
						
			$this->email->initialize($config);
			//$this->email->cc('mansi.vora@tradefinex.org');
			// $this->email->bcc('mansi.vora@tradefinex.org');
			
			$suser = $this->manage->get_superadmin();
			
			$from_email = 'info@tradefinex.org'; // $config['smtp_user']; 
			$to_email = $this->input->post('memail'); 
						
			$message = '<strong>Name : </strong>'.ucwords($this->input->post('mname')).'<br/>';
			$message .= '<strong>Email : </strong>'.$this->input->post('memail').'<br/>';
			$message .= '<strong>Contact : </strong>'.$this->input->post('mmob').'<br/>';
			$message .= '<strong>Company : </strong>'.$this->input->post('mcomp').'<br/>';
			//$message .= '<strong>Nature of Business : </strong>'.$this->input->post('musertype').'<br/>';
			//$message .= '<strong>Website : </strong>'.$this->input->post('murl').'<br/>';
			//$message .= '<strong>Message : </strong>'.$this->input->post('mmsg').'<br/>';
			
			$this->email->from($from_email, 'Support Tradefinex'); 
			$this->email->to($to_email);
			$this->email->bcc($from_email);
			$this->email->set_mailtype('html');
			$this->email->subject('Tradefinex Consortium Enquiry'); 
		//$this->email->message($message); 
			$mail_body = $this->load->view('templates/mails/consortium_mail_body', $mail_data, TRUE);
			$this->email->message($mail_body);
			
			console.log("$from_email");
			
			
			// Send mail 
			if($this->email->send()){ 
				$this->session->set_flashdata('msg_type', 'success');
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Sent</h4>"); 
				$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Congratulations!!<br>Now, you are part of TradeFinex Consortium. </h3>"); 
			}	
			else{ 
				$this->session->set_flashdata('msg_type', 'error');
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Can't be Sent</h4>"); 
				$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Error in sending Email. Please try again.</h3>");
			}
			
			redirect(base_url().'thankyouc');
		}
		
		$this->load->view('pages/public/consortium_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function advertise(){
		
		$data = array();
		
		$data['page'] = 'advertise';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
		
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}	
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$action = $this->input->post('action');
		
		if($action == 'send_mail'){
				
			$config = $this->config->item('$econfig');
						
			$this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$suser = $this->manage->get_superadmin();
			
			$from_email = 'info@tradefinex.org';// $config['smtp_user'];  
			$to_email = $this->input->post('memail'); 
						
			$message = '<strong>Name : </strong>'.ucwords($this->input->post('mname')).'<br/>';
			$message .= '<strong>Email : </strong>'.$this->input->post('memail').'<br/>';
			$message .= '<strong>Contact : </strong>'.$this->input->post('mmob').'<br/>';
			$message .= '<strong>Company : </strong>'.$this->input->post('mcomp').'<br/>';
			$message .= '<strong>User Type : </strong>'.$this->input->post('musertype').'<br/>';
			$message .= '<strong>Message : </strong>'.$this->input->post('mmsg').'<br/>';
			
			$this->email->from($from_email, 'Support Tradefinex'); 
			$this->email->to($to_email);
			$this->email->cc($from_email);
			$this->email->set_mailtype('html');
			$this->email->subject('Tradefinex Advertise Enquiry'); 
			$this->email->message($message); 
			
			// Send mail 
			if($this->email->send()){ 
				$this->session->set_flashdata('msg_type', 'success');
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Sent</h4>"); 
				$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Thank you for your query. Your query has been received. Our customer support team will respond to your query as soon as possible.</h3>"); 
			}	
			else{ 
				$this->session->set_flashdata('msg_type', 'error');
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Can't be Sent</h4>"); 
				$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Error in sending Email. Please try again.</h3>");
			}
			
			redirect(base_url().'thankyouc');
		}
		
		$this->load->view('pages/public/advertise_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function careers(){
		
		$data = array();
		
		$data['page'] = 'careers';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
				
		if($data['user_id'] <> 0){
		
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}

			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$action = $this->input->post('action');
		
		if($action == 'send_mail'){
			
			$upfile_url = '';
			
		    $config = $this->config->item('$econfig');
						
			$this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$suser = $this->manage->get_superadmin();
					
			$configf = array();
			$configf['upload_path']   = FCPATH.'assets/career_files/';
			$configf['allowed_types'] = 'pdf'; // doc|docx|
			$configf['max_size']      = 1048576;
				
			if(isset($_FILES) && !empty($_FILES) && trim($_FILES["mfile"]['name']) <> ''){
				
				$file_name = time().'_'.str_replace(" ", "-", $_FILES["mfile"]['name']);
				$configf['file_name'] = $file_name;
				$file_namea = explode('.', $file_name);
				$this->load->library('upload', $configf);
				
				if(!$this->upload->do_upload('mfile'))
				{
				   $data['msg'] = 'error';
				   $data['msg_extra'] = 'Error occurred during addition. <br/>'.$this->upload->display_errors();
				}
				else
				{
					$data['msg'] = 'success';
					$upfile_url = base_url().'assets/career_files/'.$file_name;
					$success_data = $this->upload->data();
				}
			}
					
			$suser = $this->manage->get_superadmin();
			
			$from_email = 'careers@tradefinex.org'; // $config['smtp_user']; 
			$to_email = $this->input->post('memail'); 
						
			$message = '<strong>Name : </strong>'.ucwords($this->input->post('mfname').' '.$this->input->post('mlname')).'<br/>';
			$message .= '<strong>Email : </strong>'.$this->input->post('memail').'<br/>';
			$message .= '<strong>Contact : </strong>'.$this->input->post('mmob').'<br/>';
			$message .= '<strong>Linkedin URL : </strong>'.$this->input->post('mlinkurl').'<br/>';
			$message .= '<strong>Cover Letter : </strong>'.$this->input->post('mcoverl').'<br/>';
			// $message .= '<strong>User view about Tradefinex : </strong>'.$this->input->post('minmsg').'<br/>';
			
			if($upfile_url != ''){
				$message .= '<a href="'.$upfile_url.'" target="_blank">View uploaded Resume</a><br/>';
			}
			
			$this->email->from($from_email, 'Support Tradefinex'); 
			$this->email->to($to_email);
			$this->email->cc($suser[0]->tfa_email);
			$this->email->set_mailtype('html');
			$this->email->subject('Tradefinex Careers Enquiry'); 
			$this->email->message($message);
						
			// Send mail 
			if($this->email->send()){ 
				$this->session->set_flashdata('msg_type', 'success');
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Sent</h4>"); 
				$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Thank you for your query. Your query has been received. Our customer support team will respond to your query as soon as possible.</h3>"); 
			}	
			else{ 
				$this->session->set_flashdata('msg_type', 'error');
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Can't be Sent</h4>"); 
				$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Error in sending Email. Please try again.</h3>"); 
			}
					
			redirect(base_url().'thankyouc');
		}
		
		$this->load->view('pages/public/careers_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	 
	public function faq(){
		
		$data = array();
		
		$data['page'] = 'faq';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// // // $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}	
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$this->load->view('pages/public/faq_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	
	public function financeSolutions(){
		
		$data = array();
		
		$data['page'] = 'Finance Solutions';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// // $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}	
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$this->load->view('pages/public/finance_solutions_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function tradeSolutions(){
		
		$data = array();
		
		$data['page'] = 'Trade Solutions';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// // $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}	
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$this->load->view('pages/public/trade_solutions_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	public function infactor(){
		
		$data = array();
		
		$data['page'] = 'Infactor';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// // $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$this->load->view('pages/public/infactor_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	

	public function quickbook_dashboard(){
		
		$data = array();
		
		$data['page'] = 'Quickbook';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		// $suria = explode('?', $_SERVER['REQUEST_URI']);

		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$this->load->view('pages/public/quickbook_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}

	public function invoiceFactoring(){
		
		$data = array();
		
		$data['page'] = 'invoice_factoring';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}

		if(empty($_POST['g-recaptcha-response']))
		{
			$captcha_error = 'Captcha is required';
			log_message("error","empty g-reacptcha-response".$captcha_error);
			$data['flash_error'] = $this->session->flashdata('flashError');
		}
		else
		{
			$secret_key = $this->config->item('recaptcha_secret_key');
		
			$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
		
			$response_data = json_decode($response);
				
			log_message("info","g-reacptcha-response".$_POST['g-recaptcha-response']);

			if(!$response_data->success)
			{
				$captcha_error = 'Captcha verification failed';
				log_message("error","Captcha Verification failed".$response_data->success.$captcha_error);
			}
			else{
				$data['response'] = $response_data->success;
				log_message("info","Captcha Verified".$response_data->success);
				
			}
				
		}
		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		
		$this->load->view('pages/public/invoice_factoring_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function mediaCenter(){
		
		$data = array();
		
		$data['page'] = 'media_center';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}	
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$data['medias'] = $medias = array();
		$data['medias'] = $medias = json_decode(file_get_contents(FCPATH.'/assets/frontend_pages/media/media_center.txt'), TRUE);
		
		$this->load->view('pages/public/media_center_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function videos(){
		
		$data = array();
		
		$data['page'] = 'videos';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}	
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$this->load->view('pages/public/videos_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function privacyPolicy(){
		
		$data = array();
		
		$data['page'] = 'privacy_policy';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}	
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$this->load->view('pages/public/privacy_policy_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function termsCondition(){
		
		$data = array();
		
		$data['page'] = 'terms_condition';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}	
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		$this->load->view('pages/public/terms_condition_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
	

	public function setupMasternode(){
        
        $data = array();
        
        $data['page'] = 'setup_masternode';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
        
        $this->load->view('pages/public/setup_masternode_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
	}
	
	public function xdcLiquidity(){
        
        $data = array();
        
        $data['page'] = 'xdc_liquidity';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
        
        $this->load->view('pages/public/xdc_liquidity_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
	}
	
	public function docker(){
        
        $data = array();
        
        $data['page'] = 'docker';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
        
        $this->load->view('pages/public/docker_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
	}
	
	public function aboutXinfinMasternode(){
        
        $data = array();
        
        $data['page'] = 'about_xinfin_masternode';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
        
        $this->load->view('pages/public/about_xinfin_masternode_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
	}
	
	public function masternodeFaqs(){
        
        $data = array();
        
        $data['page'] = 'masternode_faqs';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
        
        $this->load->view('pages/public/masternode_faqs_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
	}
	
	public function privateDistributedLedgerSolution(){
        
        $data = array();
        
        $data['page'] = 'private_distributed_ledger_solution';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
        
        $this->load->view('pages/public/private_distributed_ledger_solution_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
	}
	
	public function hybridDistributedLedgerSolution(){
        
        $data = array();
        
        $data['page'] = 'hybrid_distributed_ledger_solution';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
        
        $this->load->view('pages/public/hybrid_distributed_ledger_solution_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
	}
	
	public function brokers(){
		
		$data = array();
		
		$data['page'] = 'brokers';
		$data['pcountry'] = 0;
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			// redirect(base_url().'log/out');
		}
		if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cm']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
			$dbdata = $this->manage->get_paypal_paymentby_tx($_GET['tx']);
			$db = json_encode($dbdata);
			if(sizeof($dbdata) > 0 ){
				$this->session->set_flashdata('msg_type', 'error');
				// redirect($this->uri->uri_string());
				redirect(current_url());
			}
			else{
				$burn = burnXDC($_GET['amt']);
				$status = explode(': ',$burn[10]);
				$status = $status[1];
				$status = str_replace(",","", $status);
				if($status == true){
					$_GET['burnStatus'] = $status;
					// $transactionHash = explode(': ',$burn[13]);
					$transactionHash = $burn[13];
					$transactionHash = str_replace(array("'",","),"", $transactionHash);
					$_GET['transactionHash'] = $transactionHash;
					$result = $this->manage->add_paypal_details($_GET);
					
				}
				else{
					$_GET['burnStatus'] = false;
					$_GET['transactionHash'] = '0x';
					$result = $this->manage->add_paypal_details($_GET);
				}
				
			}
			
		}

		$action = $this->input->post('action');
		$data['instrument'] = $this->input->post('instrument');
		$data['name'] = $this->input->post('name');
		$data['country'] = $this->input->post('pcountry');
		$data['currency_supported'] = $this->input->post('currency_supported');
		$data['amount'] = $this->input->post('amount');
		$data['maturity_date'] = $this->input->post('maturity_date');
		$data['docRef'] = $this->input->post('docRef');

		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$ccountries = $this->plisting->get_country();
		
		if($ccountries && !empty($ccountries) && is_array($ccountries) && sizeof($ccountries) <> 0){
			$data['pcountries'] = $ccountries;			
		}
		

		if($action == 'bkrdetail'){
			$result = $this->manage->add_instrument($data);
		}
	
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/brokers_view', $data);
		
		
	}

	public function multiBrokers(){
		
		$data = array();
		
		$data['page'] = 'multi_brokers';
		$data['pcountry'] = 0;
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			// redirect(base_url().'log/out');
		}
		if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cm']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
			$dbdata = $this->manage->get_paypal_paymentby_tx($_GET['tx']);
			$db = json_encode($dbdata);
			if(sizeof($dbdata) > 0 ){
				$this->session->set_flashdata('msg_type', 'error');
				// redirect($this->uri->uri_string());
				redirect(current_url());
			}
			else{
				$burn = burnXDC($_GET['amt']);
				$status = explode(': ',$burn[10]);
				$status = $status[1];
				$status = str_replace(",","", $status);
				if($status == true){
					$_GET['burnStatus'] = $status;
					// $transactionHash = explode(': ',$burn[13]);
					$transactionHash = $burn[13];
					$transactionHash = str_replace(array("'",","),"", $transactionHash);
					$_GET['transactionHash'] = $transactionHash;
					$result = $this->manage->add_paypal_details($_GET);
					
				}
				else{
					$_GET['burnStatus'] = false;
					$_GET['transactionHash'] = '0x';
					$result = $this->manage->add_paypal_details($_GET);
				}
				
			}
			
		}

		$action = $this->input->post('action');
		$data['instrument'] = $this->input->post('instrument');
		$data['name'] = $this->input->post('name');
		$data['country'] = $this->input->post('pcountry');
		$data['currency_supported'] = $this->input->post('currency_supported');
		$data['amount'] = $this->input->post('amount');
		$data['maturity_date'] = $this->input->post('maturity_date');
		$data['docRef'] = $this->input->post('docRef');

		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$ccountries = $this->plisting->get_country();
		
		if($ccountries && !empty($ccountries) && is_array($ccountries) && sizeof($ccountries) <> 0){
			$data['pcountries'] = $ccountries;			
		}
		

		if($action == 'bkrdetail'){
			$result = $this->manage->add_instrument($data);
		}
	
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/multi_brokers_view', $data);
		
		
	}
	
	public function rollout(){
        
        $data = array();
        
        $data['page'] = 'rollout';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
        
        
        
        $this->load->view('pages/public/rollout_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
	}
	
	public function smartContract($data_add){
        
        $data = array();
        
        $data['page'] = 'smart_contract';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
        
		$data['display'] = $data_add;
		
		        
        
        $this->load->view('pages/public/smart_contract_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
	}
	
	public function supplyChain(){
        
        $data = array();
        
        $data['page'] = 'supply_chain';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
                
        
        $this->load->view('pages/public/supply_chain_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
	}
	
	public function caseStudy(){
        
        $data = array();
        
        $data['page'] = 'case_study';
        $data['msg'] = '';
        $data['user_id'] = 0;
        $data['user_type'] = '';
        $data['full_name'] = '';
        $data['ufname'] = '';
        $data['ulname'] = '';
        $data['uemail'] = '';
        $data['ucontact'] = '';
        $data['uaddress'] = '';
        $data['uname'] = '';
        $data['upass'] = '';
        $data['uprofpic'] = '';
        
        $data['csrf'] = array();
        
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		$action = $this->input->post('action');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			// redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}
		
		
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			
			
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
		}

		if(empty($_POST['g-recaptcha-response']))
		{
			$captcha_error = 'Captcha is required';
			log_message("error","empty g-reacptcha-response".$captcha_error);
			$data['flash_error'] = $this->session->flashdata('flashError');
		}
		else
		{
			$secret_key = $this->config->item('recaptcha_secret_key');
		
			$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
		
			$response_data = json_decode($response);
				
			log_message("info","g-reacptcha-response".$_POST['g-recaptcha-response']);

			if(!$response_data->success)
			{
				$captcha_error = 'Captcha verification failed';
				log_message("error","Captcha Verification failed".$response_data->success.$captcha_error);
			}
			else{
				$data['response'] = $response_data->success;
				log_message("info","Captcha Verified".$response_data->success);
				
			}
				
		}

        if($action == 'send_mail'){        
			log_message("info",">>>>>".$_SERVER['DOCUMENT_ROOT'].'/assets/project_agreements/NDA_TradeFinex_Tech_Ltd_AD.pdf');
					$atch = $_SERVER['DOCUMENT_ROOT'].'/assets/project_agreements/NDA_TradeFinex_Tech_Ltd_AD.pdf';
					$config = array();
					$config = $this->config->item('$econfig');
								
					$this->email->initialize($config);
					// $this->email->cc('another@another-example.com');
					// $this->email->bcc('them@their-example.com');
					
					$suser = $this->manage->get_superadmin();
					
					$from_email = 'info@tradefinex.org'; 
					$to_email = $this->input->post('memail'); 
					$data['email'] = $this->input->post('memail');
					$data['mmob'] = $this->input->post('mmob');

					$message .= '<strong>Email : </strong>'.$this->input->post('memail').'<br/>';
					$message .= '<strong>Contact : </strong>'.$this->input->post('mmob').'<br/>';
					
					$this->email->from($from_email, 'Support Tradefinex'); 
					$this->email->to($to_email);
					$this->email->bcc('mansi@xinfin.org');
					$this->email->set_mailtype('html');
					$this->email->subject('Tradefinex Case Study Request');
					$mail_body = $this->load->view('templates/mails/case_study_mail_body', $data, TRUE);
					$this->email->message($mail_body); 
					$this->email->attach($atch, array(
					'mime' => 'application/pdf'));
							
					// Send mail ** Our customer support team will respond to your query as soon as possible. Please find below the details of the query submitted.
					if($this->email->send()){ 
						$this->session->set_flashdata('msg_type', 'success');
						$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Sent</h4>"); 
						$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Thank you for your interest in Case Study . NDA will be sent on your mail, after signing the NDA, you can access to TradeFinex Case Study.</h3>"); 
					}	
					else{ 
						$this->session->set_flashdata('msg_type', 'error');
						$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Can't be Sent</h4>"); 
						$this->session->set_flashdata("popup_desc", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Error in sending Email. Please try again.</h3>");
					}
					
					redirect(base_url().'thankyouc');
		}
        $this->load->view('pages/public/case_study_view', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');
	}
	
	public function sendMail()
	{
		// log_message("info",">>>>");
	    $data = array();
		
		$encryption_key = $this->config->item('encryption_key');
					
		$action = $this->input->post('action');
		$data['email'] = $this->input->post('email');
		$data['deployData'] = $this->input->post('deployData');
		// log_message("info",">>>>1",gettype($email));
		// log_message("info",">>>>2",gettype($deployData));
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		
		$data['csrf'] = $csrf;
		
				
		if($action == 'sendmail'){
			
			$config = array();
			$config = $this->config->item('$econfig');
						
			$this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$suser = $this->manage->get_superadmin();
			
			$from_email = 'info@tradefinex.org'; 
			$to_email =$data['email'];
					
			$this->email->from($from_email, 'Admin Tradefinex'); 
			$this->email->to($to_email);
			$this->email->bcc('mansi@xinfin.org');
			$this->email->set_mailtype('html');
			$this->email->set_newline("\r\n");
			$this->email->subject('Contract Details'); 
			$mail_body = $this->load->view('templates/mails/contract_details_mail_body', $data, TRUE);
			$this->email->message($mail_body);
		
            		
			// Send mail ** Our customer support team will respond to your query as soon as possible. Please find below the details of the query submitted.
			if($this->email->send()){ 
				log_message("info","Email Sent successfully");
				$data['status'] = 1;
				
			}	
			else{ 
				log_message("error","Error in sending email");
				$data['status'] = 0;
				
			}	
			echo json_encode($data);
		}
	}


	public function gitPull() {
		
		//make sure to make the shell file executeable first before running the shell_exec function
		$output = shell_exec('git pull origin master');
		echo $output;

	}


	public function errorPage(){
		
		$data = array();
		if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
			// Get transaction information from URL 
			$data['item_number'] = $_GET['item_number'];  
			$data['txn_id'] = $_GET['tx']; 
			$data['payment_gross'] = $_GET['amt']; 
			$data['currency_code'] = $_GET['cc']; 
			$data['payment_status'] = $_GET['st']; 
			 
			var_dump(">>>>".$_GET);
			 
			
		} 
	
				
	}

	public function paypal(){
		
		$data = array();
		
		$addr = $this->input->post('addr');
		// log_message("info","<<4".$addr);
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$dbdata = $this->manage->get_paypal_payment($addr);
		// log_message("info","@@@".json_encode($dbdata));
		echo json_encode($dbdata);
				
	}

	public function getAddress(){
		
		$data = array();
		
		$action = $this->input->post('action');
		$privkey = $this->input->post('privkey');

		// log_message("info",">>>".$action.$privkey);
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;

		
		if($action == 'getaddress'){
			$data['privatekey'] = getAddress($privkey);
			foreach($key as $k){
				$data['key'] = $k->tfi_secretKey;
				$data['contractAddr'] = $k->tfi_contractAddr;
			}
		}
		
		echo json_encode($data);
				
	}

	public function strategy(){

		$data = array();
		$data['page'] = 'strategy';       
        
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			// redirect(base_url().'log/out');
		}
        $this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
        $this->load->view('pages/public/viral_strategy', $data);
        $this->load->view('includes/footer_commonn', $data);
        $this->load->view('pages_scripts/common_scripts', $data);
        $this->load->view('includes/footern');

	}
	public function certificate(){

		$data = array();
		$data['page'] = 'certificate';       
        
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
        $this->load->view('templates/mails/certificate');
		
	}

}
	
