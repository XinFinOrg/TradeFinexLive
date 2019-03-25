<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session', 'encrypt'));
		$this->load->model(array('plisting', 'manage', 'notification'));
		$this->output->cache(0.5);

		$data = array();
		$data_add = array();
	}
	
	public function account_password()
	{
		$data = array();
		$data_add = array();
		$result = array();
		
		$data['page'] = 'Reset_Password';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type_ref'] = 0;
		$data['full_name'] = '';
		$data['encrypted_string'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$suria = explode('?', $_SERVER['REQUEST_URI']);
		
		$encryption_key = $this->config->item('encryption_key');
		$data['encrypted_string'] = $suria[1];
		$decode_request_string = $this->encrypt->decode($suria[1], $encryption_key);
		$req_string = explode('&', $decode_request_string);
			
		$req_string_1a = explode('=', $req_string[0]);
		$req_string_2a = explode('=', $req_string[1]);
		$req_string_3a = explode('=', $req_string[2]);
				
		$email = $req_string_1a[1];
		$hash = $req_string_2a[1];
		$expired = $req_string_3a[1]; 
		
		$action = $this->input->post('action');
		$req_passwd = $this->input->post('password');
		echo("1.".$action."<br>2.".$req_passwd);
		$data_add['tfu_passwd'] = openssl_encrypt($this->input->post('password'),"AES-128-ECB",$encryption_key);
		
// 		$data_add['tfu_passwd'] = $this->input->post('password');
				
		$result = $this->manage->verify_user($email, $hash);
				
// 		print_r($result);
				
		if($action == 'reset_password' && $req_passwd != ''){
		    
		  //  echo "Test";
		  //  echo '<pre>';
		  //  print_r($result);
				// 			echo '</pre>';	
			$time_now = strtotime(date('Y-m-d H:i:s'));
			echo($time_now." ".$expired);
			if($time_now > $expired){
			    
				$this->session->set_flashdata('msg_type', 'error'); // error_userlink
				$this->session->set_flashdata("email_sent_common", "<h3>Verification Failure</h3>");
				$this->session->set_flashdata("popup_desc", "<p>Your verification link was expired. Please contact customer support for your resolution.</p>");
			}else{
				// $datan = array();
				// $datan['tfu_active'] = 1;
				// echo $expired;
					$this->manage->update_base_user_info_by_id($result[0]->tfu_id, $data_add['tfu_passwd']);
			
				$this->session->set_flashdata('msg_type', 'success'); // reset_password
				$this->session->set_flashdata("email_sent_common", "<h3>Password Changed</h3>");
				$this->session->set_flashdata("popup_desc", "<p>Password has been successfully changed. Please <a href='".base_url()."'>click here</a> to go home.</p>");
			
			}
			
	    	//redirect(base_url().'thankyouc');
				
		}else{
		    echo("inside else");
			if($action == 'reset_password'){
				
				$data['msg'] = 'error';
				$this->session->set_flashdata('msg_type', 'error');
				
				$this->session->set_flashdata("email_sent_common", "<h3>Username Error</h3>");
				$this->session->set_flashdata("popup_desc", "<p>Username not found ! Try again.</p>");
				
				redirect(base_url().'thankyouc');
			}	
		}	
		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/set_password_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
}
	