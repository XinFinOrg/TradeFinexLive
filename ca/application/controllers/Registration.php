<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session', 'email', 'encrypt'));
		$this->load->model(array('plisting', 'manage', 'notification'));
		// $this->output->cache(0.5);
		$this->output->delete_cache();
        $this->config->load('emailc');
		$data = array();
		$data_add = array();
	}
		
	public function index()
	{
	    $data = array();
		$mail_data = array();
		$result = array();
		$encryption_key = $this->config->item('encryption_key');
		
		$domain = $this->siteURL();
		
		$domain_arr = explode('.', $domain);
		
		$domain_type = $domain_arr[0];
		
		$data['user_access_domain_type'] = $domain_type;
				
		if(!empty($domain_arr) && sizeof($domain_arr) <> 0){
			
			$domain_name = '';
			
			for($i  = 1; $i < sizeof($domain_arr); $i++){
				
				if($i > 1){
					$domain_name .= '.'.$domain_arr[$i];
				}else{
					$domain_name .= $domain_arr[$i];
				}
			}
		}
		
		$data['user_access_domain_name'] = $domain_name;
					
		$action = $this->input->post('action');
		$data['usern'] = $this->input->post('email');
		$mail_data['usern'] = $this->input->post('email');
		$data['upasswd'] = openssl_encrypt($this->input->post('password'),"AES-128-ECB",$encryption_key);
		$mail_data['upasswd'] = $this->input->post('password');
		$data['ufname'] = $this->input->post('first_name');
		$mail_data['ufname'] = $this->input->post('first_name');
		$data['ulname'] = $this->input->post('last_name');
		$mail_data['ulname'] = $this->input->post('last_name');
		$data['uemail'] = $this->input->post('email');
		$data['udomaint'] = $this->input->post('last_name');
		
		$user_type = $this->input->post('user_type');
		// $otpval = $this->input->post('register_otp');
		$random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
		$data['hash'] = $random_hash;
				
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		if($action == 'signup'){
			$result = $this->manage->add_user($data, $user_type);
		}
		
		$data['page'] = 'signup';
		$data['user_id'] = 0;
		$data['full_name'] = '';
		$notifya = array();
				
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
			
			
			$request_string = 'email='.$to_email.'&hash='.$random_hash.'&expired='.$expired;
			$encode_request_string = $this->encrypt->encode($request_string, $encryption_key);
			$mail_data['encoded_uri'] = $encode_request_string;			
			$this->email->from($from_email, 'Admin Tradefinex'); 
			$this->email->to($to_email);
			$this->email->set_mailtype('html');
			$this->email->set_newline("\r\n");
			$this->email->subject('Account Activation by Tradefinex'); 
			$this->email->subject('Account Activation by Tradefinex'); 
			$mail_body = $this->load->view('templates/mails/welcome_account_mail_body', $mail_data, TRUE);
			$this->email->message($mail_body);
			
			// Send mail 
			if($this->email->send()){ 
				$data['msg'] = 'success';
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Confirmation Mail</h4>"); 
				$this->session->set_flashdata("email_sent", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'> A verification mail already sent to <a href='mailto:$to_email' style='color:#33c088;' target='_top'>$to_email</a>, to confirm the validity of your email address. After receiving the email follow the link provided to complete you registration. Click <a href='".base_url()."' style=''>here</a> to go to home.</h3>"); 
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
			$this->load->view('pages/registration_view', $data);
			$this->load->view('includes/footer_commonn', $data);
			$this->load->view('pages_scripts/common_scripts', $data);
			$this->load->view('includes/footern', $data);
		}
	}
	
	public function siteURL() {
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		// $domainName = $_SERVER['HTTP_HOST'] . '/';
		$domainName = $_SERVER['HTTP_HOST'];
		// return $protocol . $domainName;
		return $domainName;
	}
	
	public function get_regotp(){
		
		$data = array();
		$action = $this->input->post('action');
		$otpval = $this->input->post('otpval');
		
		$data['oerror'] = 1;
		$data['oused'] = 0;
		
		if($action == 'match_otp'){
			$otp_results = $this->manage->check_rotp($otpval);
			if($otp_results && !empty($otp_results) && sizeof($otp_results) <> 0){
			    
			    if($otp_results[0]->tfro_row_deleted == 0){
			        
			        $data['oerror'] = 0;
			    }
			    
				if($otp_results[0]->tfro_row_deleted == 1){
			        
			        $data['oerror'] = 1;
			        $data['oused'] = 1;
			    }
			}
		}
		
		echo json_encode($data);
	}
}