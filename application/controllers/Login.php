<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		require_once APPPATH.'third_party/src/Google_Client.php';
		require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
		
        $this->load->helper(array('form', 'url', 'date', 'xdcapi'));
		$this->load->library(array('session', 'encrypt', 'email','linkedin','facebook','twitteroauth'));
		$this->load->model(array('manage','suser'));
		// $this->output->delete_cache();
		$this->config->load('emailc');
		$this->config->load('twitter');
		$this->config->load('linkedin');
		$data = array();
		$data_add = array();
	}
	
	public function index()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'login';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['full_name'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$encryption_key = $this->config->item('encryption_key');
		
		$action = $this->input->post('action');
		$data['user_name'] = $this->input->post('user_name');
		$data['user_password'] = openssl_encrypt($this->input->post('user_password'),"AES-128-ECB",$encryption_key);
				
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
		
		if($action == 'login'){
			$result = $this->manage->fetch_user($data);
		}
		
		if(!empty($result) && is_array($result) && sizeof($result) <> 0){
			
			if($result['error'] == 0 && $result['user_detail']->tfu_admin_blocked == 0){
				
				if($result['user_detail']->tfu_utype == 1){
					$user_full_name = $result['user_detail']->tfsp_fname.' '.$result['user_detail']->tfsp_lname;
					$user_type = 'Service-Provider';
				}
				
				if($result['user_detail']->tfu_utype == 2){
					$user_full_name = $result['user_detail']->tff_fname.' '.$result['user_detail']->tff_lname;
					$user_type = 'Financier';
				}
				
				if($result['user_detail']->tfu_utype == 3){
					$user_full_name = $result['user_detail']->tfb_fname.' '.$result['user_detail']->tfb_lname;
					$user_type = 'Beneficiary';
				}
				
				$session_data = array(
					'user_id' => $result['user_detail']->tfu_id,
					'user_type' => $user_type,
					'user_type_ref' => $result['user_detail']->tfu_utype,
					'user_full_name' => $user_full_name
				);
				
				$this->session->set_userdata('logged_in', $session_data);
				$data['msg'] = 'success';
				redirect(base_url().'dashboard');
			}
			
			if($result['error'] == 0 && $result['user_detail']->tfu_admin_blocked == 1){
				
				$data['msg'] = 'error';
				$this->session->set_flashdata("set_message", "error");
				$this->session->set_flashdata("error_logged_in", "<font style='color:red;font-size: 14px;float: left;margin-left: 15px;margin-top: 5px;'>User account blocked by admin. Please click <a href='".base_url()."publicv/contact' style='font-family: open_sansregular;'>here</a> to contact us.</font>");
				redirect(base_url());
			}	
			
			if($result['error'] == 1){
				$data['msg'] = 'error';
				$this->session->set_flashdata("set_message", "error");
				$this->session->set_flashdata("error_logged_in", "<font style='color:red;font-size: 14px;float: left;margin-left: 15px;margin-top: 5px;'>Username/Password Not Valid ! Try again.</font>");
				redirect(base_url());
			}	
		}	
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			
			$user_profile = $this->manage->get_user_info_by_id($data['user_id']);
			$wallet_id = $user_profile[0]->tfu_xdc_walletID;
			
			if(trim($wallet_id) <> ''){
			
				$options = array('address' => $wallet_id);
				
				$rcurlf = get_xdc_balance($options);
			
				if($rcurlf){
					$rcurlfa = json_decode(stripslashes($rcurlf));
				}
				
				$balance = ((isset($rcurlfa->balance)) ? $rcurlfa->balance : '');
				$status = ((isset($rcurlfa->status)) ? $rcurlfa->status : ''); 
							
				$data_add = array();
				// $data_add['tfu_xdc_walletID'] = $wallet_id;
				$data_add['tfu_xdc_balance'] = $balance;
				
				if(strtolower($status) == 'success' && trim($wallet_id) <> '' && trim($balance) <> ''){
					$result = $this->manage->update_user_base_info_all_by_id_and_type($data['user_id'], $data['user_type_ref'], $data_add);
				}
			}	
			
			redirect(base_url().'dashboard');
		}else{
			if($action <> 'login'){
				redirect(base_url().'log/out');
			}
		}
	}
	
	public function siteURL() {
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		// $domainName = $_SERVER['HTTP_HOST'] . '/';
		$domainName = $_SERVER['HTTP_HOST'];
		// return $protocol . $domainName;
		return $domainName;
	}
	
	public function reactivate_account()
	{
		$data = array();
		$data_add = array();
		$mail_data = array();
		$result = array();
		
		$data['page'] = 'login_reset';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type_ref'] = 0;
		$data['full_name'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$encryption_key = $this->config->item('encryption_key');
		
		$action = $this->input->post('action');
		$user_email = $this->input->post('user_name');
		
		$random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
		$data_add['tfu_hash'] = $random_hash;
		
		if($user_email <> '' && $action == 'reset_password'){
			
			$result = $this->manage->update_user_by_mail($user_email, $data_add);
			$user_login_details = $this->manage->get_user_login_by_username($user_email);
		}
		
		if(!empty($result) && is_array($result) && sizeof($result) <> 0){
			
			$created = $result[0]->tfu_created;
			$time_now = strtotime(date('Y-m-d H:i:s'));
			// $expired = strtotime('+3 hours', strtotime($result[0]->tfu_created));
			$expired = strtotime('+3 hours', strtotime(date('Y-m-d H:i:s')));
			
			$config = $this->config->item('$econfig');
		
			$this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$from_email = $config['smtp_user']; 
			$to_email = $user_email; 
			
			$name = '';
			$fname = '';
			$lname = '';
			
			if($result[0]->tfu_utype == 1){
				$name = ucwords($result[0]->tfsp_fname.' '.$result[0]->tfsp_lname);
				$fname = ucfirst($result[0]->tfsp_fname);
				$lname = ucfirst($result[0]->tfsp_lname);
			}
			
			if($result[0]->tfu_utype == 2){
				$name = ucwords($result[0]->tff_fname.' '.$result[0]->tff_lname);
				$fname = ucfirst($result[0]->tff_fname);
				$lname = ucfirst($result[0]->tff_lname);
			}
			
			if($result[0]->tfu_utype == 3){
				$name = ucwords($result[0]->tfb_fname.' '.$result[0]->tfb_lname);
				$fname = ucfirst($result[0]->tfb_fname);
				$lname = ucfirst($result[0]->tfb_lname);
			}
			
			$mail_data['name'] = $name;
			$data['usern'] = $user_email;
			$mail_data['usern'] = $user_email;
		    $data['upasswd'] = openssl_decrypt($result[0]->tfu_passwd,"AES-128-ECB",$encryption_key);
		    $mail_data['upasswd'] = openssl_decrypt($result[0]->tfu_passwd,"AES-128-ECB",$encryption_key);
	    	$data['ufname'] = $fname;
	    	$mail_data['ufname'] = $fname;
	    	$data['ulname'] = $lname;
	    	$mail_data['ulname'] = $lname;
	    	$data['uemail'] = $user_email;
			
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
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Reactivation Mail Sent</h4>"); 
				$this->session->set_flashdata("email_sent", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'> A verification mail already sent to <a href='mailto:$to_email' style='color:#33c088;font-family: open_sansregular;' target='_top'>$to_email</a>, to confirm the validity of your email address. After receiving the email follow the link provided to complete you registration. Click <a href='".base_url()."' style='font-family: open_sansregular;'>here</a> to go to home.</h3>"); 
			}	
			else{ 
				$data['msg'] = 'email_error';
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Reactivation Mail Failure</h4>");
				$this->session->set_flashdata("email_sent", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>We are unable to sent mail of your reactivation link. We will get back to you shortly. Please click <a href='".base_url()."publicv/contact' style='font-family: open_sansregular;'>here</a> to contact us for your resolution.</h3>"); 
			}
				
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
			$this->load->view('pages/thankyou_signup', $data);
			$this->load->view('includes/footer_commonn', $data);
			$this->load->view('pages_scripts/thankyou_scripts', $data); 
			$this->load->view('includes/footern', $data);
			
		}
		
	}
		
	public function reset_password()
	{
		$data = array();
		$data_add = array();
		$mail_data = array();
		$result = array();
		
		$data['page'] = 'login_reset';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type_ref'] = 0;
		$data['full_name'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$encryption_key = $this->config->item('encryption_key');
		
		$action = $this->input->post('action');
		$user_email = $this->input->post('user_name');
		// $data['upasswd'] = openssl_encrypt($this->input->post('password'),"AES-128-ECB",$encryption_key);
		
		$random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
		$data_add['tfu_hash'] = $random_hash;
		
		if($user_email <> '' && $action == 'reset_password'){
			$result = $this->manage->update_user_by_mail($user_email, $data_add);
			$user_login_details = $this->manage->get_user_login_by_username($user_email);
		}
		
		$notifya = array();
				
		if(!empty($result) && is_array($result) && sizeof($result) <> 0 && $result[0]->tfu_active == 1){
			
			$data['msg'] = 'success';
			
			$created = $result[0]->tfu_created;
			$time_now = strtotime(date('Y-m-d H:i:s'));
			// $expired = strtotime('+3 hours', strtotime($result[0]->tfu_created));
			$expired = strtotime('+3 hours', strtotime(date('Y-m-d H:i:s')));
			
			$config = $this->config->item('$econfig');
			$this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$from_email = $config['smtp_user']; 
			$to_email = $this->input->post('user_name'); 
			
			$name = '';
			
			if($result[0]->tfu_utype == 1){
				$name = ucwords($result[0]->tfsp_fname.' '.$result[0]->tfsp_lname);
			}
			
			if($result[0]->tfu_utype == 2){
				$name = ucwords($result[0]->tff_fname.' '.$result[0]->tff_lname);
			}
			
			if($result[0]->tfu_utype == 3){
				$name = ucwords($result[0]->tfb_fname.' '.$result[0]->tfb_lname);
			}
			
			$mail_data['name'] = $name;
						
			$request_string = 'email='.$to_email.'&hash='.$random_hash.'&expired='.$expired;
			$encode_request_string = $this->encrypt->encode($request_string, $encryption_key);
			$mail_data['encoded_uri'] = $encode_request_string;	
			$this->email->from($from_email, 'Support Tradefinex'); 
			$this->email->to($to_email);
			$this->email->set_mailtype('html');
			$this->email->subject('Password Reset Request by Tradefinex'); 
			$mail_body = $this->load->view('templates/mails/reset_password_mail_body', $mail_data, TRUE);
			$this->email->message($mail_body);
			
			if($result[0]->tfu_admin_blocked == 0 && $result[0]->tfu_active == 1){
			
				// Send mail 
				if($this->email->send()){ 
					
					$data['msg'] = 'success';
					
					$this->session->set_flashdata('msg_type', 'success'); 
					$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Sent</h4>"); 
					$this->session->set_flashdata("email_sent", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>A password reset link already sent to <a href='mailto:$to_email' style='color:#33c088;' target='_top'>$to_email</a>. Please check for reset your password.</h3>"); 
				}	
				else{ 
					
					$data['msg'] = 'error';
					
					$this->session->set_flashdata('msg_type', 'email_error');// error_userlink
					$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>Email Can't be Sent</h4>"); 
					$this->session->set_flashdata("email_sent", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Error in sending Email. Contact customer support for your resolution.</h3>"); 
				}
			}
			
			if($result[0]->tfu_admin_blocked == 1){
				
				$data['msg'] = 'error';
					
				$this->session->set_flashdata('msg_type', 'error');
				$this->session->set_flashdata("email_sent_common", "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;'>User Account Blocked</h4>"); 
				$this->session->set_flashdata("email_sent", "<h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;padding-left:8px;padding-right:8px;'>Your account was blocked by admin. Please click <a href='".base_url()."publicv/contact' style='font-family: open_sansregular;'>here</a> to contact us.</h3>");
			}	
					
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
			$this->load->view('pages/thankyou_signup', $data);
			$this->load->view('includes/footer_commonn', $data);
			$this->load->view('pages_scripts/thankyou_scripts', $data); 
			$this->load->view('includes/footern');
			
		}else{
			
			
			if($action == 'reset_password'){
				
				if(!empty($user_login_details) && is_array($user_login_details) && sizeof($user_login_details) <> 0){
					
					if($user_login_details[0]->tfu_admin_blocked == 0 && $user_login_details[0]->tfu_active == 0){
						
						$data['msg'] = 'error';
					
						$this->session->set_flashdata("error_reset_password", "<font color='red' class='alert-error' style='font-size:14px;margin-left:20px;margin-bottom:10px;float: left;'> Your account was not activated. Please click <a href='javascript:void(0)' uemail='".$user_login_details[0]->tfu_usern."' class='reactivate_account' style='font-family: open_sansregular;'>here</a> to activate your account.</font>");
						
					}	
					
				}else{
				
					$data['msg'] = 'error';
					
					$this->session->set_flashdata("error_reset_password", "<font color='red' class='alert-error' style='font-size:14px;margin-left:20px;margin-bottom:10px;'> Username not found ! Try again.</font>");
				}
			}
			
			redirect(base_url());
		}
	}

	public function financier_login()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'demo_login';
	
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$encryption_key = $this->config->item('encryption_key');
	
		$action = $this->input->post('action');
		$data['user_name'] = $this->input->post('user_name');
		$data['user_password'] = openssl_encrypt($this->input->post('user_password'),"AES-128-ECB",$encryption_key);
			
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
		
		if($action == 'login'){
			if($data['user_name'] == "info@tradefinex.org"){
				$result = $this->manage->fetch_user($data);
			}
			else{
				$this->session->set_flashdata('error', "<div style='color:red;'>Not Correct Financer.");
				redirect(base_url().'publicv/financier');
			}
			
		}
		
		if(!empty($result) && is_array($result) && sizeof($result) <> 0){
			
			if($result['error'] == 0 && $result['user_detail']->tfu_admin_blocked == 0){
				
				if($result['user_detail']->tfu_utype == 1){
					$user_full_name = $result['user_detail']->tfsp_fname.' '.$result['user_detail']->tfsp_lname;
					$user_type = 'Service-Provider';
				}
				
				if($result['user_detail']->tfu_utype == 2){
					$user_full_name = $result['user_detail']->tff_fname.' '.$result['user_detail']->tff_lname;
					$user_type = 'Financier';
				}
				
				if($result['user_detail']->tfu_utype == 3){
					$user_full_name = $result['user_detail']->tfb_fname.' '.$result['user_detail']->tfb_lname;
					$user_type = 'Beneficiary';
				}
				
				$session_data = array(
					'user_id' => $result['user_detail']->tfu_id,
					'user_type' => $user_type,
					'user_type_ref' => $result['user_detail']->tfu_utype,
					'user_full_name' => $user_full_name
				);
				$this->session->set_userdata('logged_in', $session_data);
				$data['msg'] = 'success';
				$this->session->set_flashdata('success', "<div style='color:green;'>Logged In.");
				redirect(base_url().'dashboard/financier');
			}
			
			if($result['error'] == 0 && $result['user_detail']->tfu_admin_blocked == 1){
				
				echo "Blocked";
				die;
			}	
			
			if($result['error'] == 1){
				echo "error";
				die;
			}	
		}	

		
		
		$user = $this->session->userdata('logged_in');
				
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			
			
			redirect(base_url().'dashboard/financier');
		}else{
			if($action <> 'login'){
				redirect(base_url().'log/out');
			}
		}
		
	}

	public function fblogin()
	{
	  
		$fb = new \Facebook\Facebook([ 'app_id' => '2080555445396680', 'app_secret' => 'e169cd179a489dfc3901a69f9771d29e', 'default_graph_version' => 'v3.2', 'persistent_data_handler' => 'session' ]);
		$helper = $fb->getRedirectLoginHelper(); if (isset($_GET['state'])) { $helper->getPersistentDataHandler()->set('state', $_GET['state']); }
		$permissions = ['email']; 
		// For more permissions like user location etc you need to send your application for review
		
		// $loginUrl = $helper->getLoginUrl('http://localhost/TradeFinexLive/login/fbcallback', $permissions);
		$loginUrl = $helper->getLoginUrl('https://beta.tradefinex.org/login/fbcallback', $permissions);
		header("location: ".$loginUrl);
	}	

	public function fbcallback(){
		$fb = new \Facebook\Facebook([ 'app_id' => '2080555445396680', 'app_secret' => 'e169cd179a489dfc3901a69f9771d29e', 'default_graph_version' => 'v2.4', 'persistent_data_handler' => 'session' ]);
		$helper = $fb->getRedirectLoginHelper(); if (isset($_GET['state'])) { $helper->getPersistentDataHandler()->set('state', $_GET['state']); }
			
			// $helper = $fb->getRedirectLoginHelper();  
			try{
				if(isset($session)) {
					$accessToken = $session->getToken();
				} else {
					// $accessToken = $helper->getAccessToken('http://localhost/TradeFinexLive/login/fbcallback');
					$accessToken = $helper->getAccessToken('https://beta.tradefinex.org/login/fbcallback');
				}	
			}catch(FacebookResponseException $e){
				log_message("info", 'Graph returned an error: ' . $e->getMessage());
				echo 'Graph returned an error: ' . $e->getMessage();
        		exit;
			}catch (FacebookSDKException $e) {
				// When validation fails or other local issues
				log_message("info", 'Facebook SDK returned an error: ' . $e->getMessage());
				echo 'Facebook SDK returned an error: ' . $e->getMessage();
				exit;
			}
			if (!isset($accessToken)) {
				if ($helper->getError()) {
					header('HTTP/1.0 401 Unauthorized');
					echo "Error: " . $helper->getError() . "\n";
					echo "Error Code: " . $helper->getErrorCode() . "\n";
					echo "Error Reason: " . $helper->getErrorReason() . "\n";
					echo "Error Description: " . $helper->getErrorDescription() . "\n";
				} else {
					header('HTTP/1.0 400 Bad Request');
					echo 'Bad request';
				}
				exit;
			}else{
				$_SESSION['token'] = (string)$accessToken;
					 
				
				$response = $fb->get('/me?fields=id,name,email,first_name,last_name,birthday,location,gender', $accessToken);
				//   echo ("token".print_r($response));
				//   die;
				// User Information Retrival begins................................................
				$me = $response->getGraphUser();
				$userData['oauth_provider'] = 'facebook';
				$userData['oauth_uid']      = $me->getProperty('id');
				$userData['first_name']     = $me->getProperty('first_name');
				$userData['last_name']      = $me->getProperty('last_name');
				$userData['email']          = !empty($me->getProperty('email'))? $me->getProperty('email') : ' ';
				// $userData['gender']         = !empty($me->getProperty('gender'))? $me->getProperty('gender') : ' ';
				// $userData['locale']         = !empty($me->getProperty('locale'))? $me->getProperty('locale') : ' ';
				// $userData['link']           = !empty($me->getProperty('link'))? $me->getProperty('link') : ' ';
				// $userData['picture']        = !empty($me->getProperty('picture'))? $me->getProperty('picture') : ' ';
				
				if(isset($userData)){
					$userID = $this->suser->checkSocialUser($userData);
				}
					
				
				// Check user data insert or update status
				if(!empty($userID) && is_array($userID) && sizeof($userID) <> 0){
					if($userID['error'] == 1){
						log_message("info","User Added successfully");
						$user = $this->suser->add_social_user($userData);
						foreach($user as $userr){
							
							$user_name = $userr->tfs_first_name.' '.$userr->tfs_last_name;
							$session_data = array(
								'user_id' => $userr->tfs_id,
								'user_full_name' => $user_name,
								'media'=>'facebook'
							);
						}
						$this->session->set_userdata('logged_in', $session_data);
						$data['msg'] = 'success';
						log_message("info","Session Set".$data['msg']);
						redirect(base_url().'dashboard');
					}	
					elseif($userID['error'] == 0){
						log_message("info","User Exsist");
					
						$user_name = $userID['user_detail']->tfs_first_name.' '.$userID['user_detail']->tfs_last_name;
						$session_data = array(
							'user_id' => $userID['user_detail']->tfs_id,
							'user_full_name' => $user_name,
							'media'=>'facebook'
						);
						
						$this->session->set_userdata('logged_in', $session_data);
						$data['msg'] = 'success';
						log_message("info","Session Set".json_encode($userID));
						redirect(base_url().'dashboard');
					}
					$user = $this->session->userdata('logged_in');
	
					if($user && !empty($user) && sizeof($user) <> 0){
						$data['full_name'] = $user['user_full_name'];
						$data['user_id'] = $user['user_id'];
						
						log_message("info","User loggedIn");
						$user_profile = $this->suser->get_social_user_info_by_id($data['user_id']);
						$wallet_id = $user_profile[0]->tfs_xdc_wallet;
						
						if(trim($wallet_id) <> ''){
						
							$options = array('address' => $wallet_id);
							
							// $rcurlf = get_xdc_balance($options);
						
							// if($rcurlf){
							// 	$rcurlfa = json_decode(stripslashes($rcurlf));
							// }
							
							// $balance = ((isset($rcurlfa->balance)) ? $rcurlfa->balance : '');
							// $status = ((isset($rcurlfa->status)) ? $rcurlfa->status : ''); 
										
							// $data_add = array();
							// // $data_add['tfu_xdc_walletID'] = $wallet_id;
							// $data_add['tfu_xdc_balance'] = $balance;
							
							// if(strtolower($status) == 'success' && trim($wallet_id) <> '' && trim($balance) <> ''){
							// 	$result = $this->manage->update_user_base_info_all_by_id_and_type($data['user_id'], $data['user_type_ref'], $data_add);
							// }
						}	
						
						redirect(base_url().'dashboard');
					}else{
						
							redirect(base_url().'log/out');
						
					}
				}
			}
			
	}
	
	public function glogin()
	{
		
		$clientId = '977764941413-fppejvmkbotrqpf0oc43nl5409lfrumf.apps.googleusercontent.com'; //Google client ID
		$clientSecret = 'gFvYYhuD9bZKFZf0mnSOYo16'; //Google client secret
		$redirectURL = base_url().'login/glogin';
		// $redirectURL = "http://localhost/TradeFinexLive/login/glogin";
		//Call Google API
		$gClient = new Google_Client();
		$gClient->setApplicationName('Glogin');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if(isset($_GET['code']))
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) 
		{
			$gClient->setAccessToken($_SESSION['token']);
		}
		
		if ($gClient->getAccessToken()) {
			$gpInfo = $google_oauthV2->userinfo->get();
			
			$userData['oauth_provider'] = 'google';
			$userData['oauth_uid']      = $gpInfo['id'];
			$userData['first_name']     = $gpInfo['given_name'];
			$userData['last_name']      = $gpInfo['family_name'];
			$userData['email']          = $gpInfo['email'];
			$userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:'';
			$userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:'';
			$userData['link']           = !empty($gpInfo['link'])?$gpInfo['link']:'';
			$userData['picture']        = !empty($gpInfo['picture'])?$gpInfo['picture']:'';
		
			if(isset($userData)){
				$userID = $this->suser->checkSocialUser($userData);
			}
				
            
            // Check user data insert or update status
            if(!empty($userID) && is_array($userID) && sizeof($userID) <> 0){
				if($userID['error'] == 1){
					log_message("info","User Added successfully");
					$user = $this->suser->add_social_user($userData);
					foreach($user as $userr){
						
						$user_name = $userr->tfs_first_name.' '.$userr->tfs_last_name;
						$session_data = array(
							'user_id' => $userr->tfs_id,
							'user_full_name' => $user_name,
							'media'=>"google"
						);
					}
					$this->session->set_userdata('logged_in', $session_data);
					$data['msg'] = 'success';
					log_message("info","Session Set".$data['msg']);
					redirect(base_url().'dashboard');
				}	
				elseif($userID['error'] == 0){
					log_message("info","User Exsist");
				
					$user_name = $userID['user_detail']->tfs_first_name.' '.$userID['user_detail']->tfs_last_name;
					$session_data = array(
						'user_id' => $userID['user_detail']->tfs_id,
						'user_full_name' => $user_name,
						'media'=>"google"
					);
					
					$this->session->set_userdata('logged_in', $session_data);
					$data['msg'] = 'success';
					log_message("info","Session Set".json_encode($userID));
					redirect(base_url().'dashboard');
				}
				$user = $this->session->userdata('logged_in');

				if($user && !empty($user) && sizeof($user) <> 0){
					$data['full_name'] = $user['user_full_name'];
					$data['user_id'] = $user['user_id'];
					
					log_message("info","User loggedIn");
					$user_profile = $this->suser->get_social_user_info_by_id($data['user_id']);
					$wallet_id = $user_profile[0]->tfs_xdc_wallet;
					
					// if(trim($wallet_id) <> ''){
					
					// 	$options = array('address' => $wallet_id);
						
					// 	$rcurlf = get_xdc_balance($options);
					
					// 	if($rcurlf){
					// 		$rcurlfa = json_decode(stripslashes($rcurlf));
					// 	}
						
					// 	$balance = ((isset($rcurlfa->balance)) ? $rcurlfa->balance : '');
					// 	$status = ((isset($rcurlfa->status)) ? $rcurlfa->status : ''); 
									
					// 	$data_add = array();
					// 	// $data_add['tfu_xdc_walletID'] = $wallet_id;
					// 	$data_add['tfu_xdc_balance'] = $balance;
						
					// 	if(strtolower($status) == 'success' && trim($wallet_id) <> '' && trim($balance) <> ''){
					// 		$result = $this->manage->update_user_base_info_all_by_id_and_type($data['user_id'], $data['user_type_ref'], $data_add);
					// 	}
					// }	
					
					redirect(base_url().'dashboard');
				}else{
					
						redirect(base_url().'log/out');
					
				}
			}
			
        } 
		else 
		{
            $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
		}
		
		
	}
    
	function tlogin(){
		session_start();
		
		if(isset($_REQUEST['oauth_token']) && $_SESSION['token']  !== $_REQUEST['oauth_token']) {

			//If token is old, distroy session and redirect user to index.php
			session_destroy();
			header('Location:'.base_url());
			
		}elseif(isset($_REQUEST['oauth_token']) && $_SESSION['token'] == $_REQUEST['oauth_token']) {
			$CONSUMER_KEY = $this->config->item('CONSUMER_KEY');
			$CONSUMER_SECRET = $this->config->item('CONSUMER_SECRET');
			$OAUTH_CALLBACK = $this->config->item('OAUTH_CALLBACK');
			
			//Successful response returns oauth_token, oauth_token_secret, user_id, and screen_name
			$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $_SESSION['token'] , $_SESSION['token_secret']);
			$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
			if($connection->http_code == '200')
			{
				//Redirect user to twitter
				$_SESSION['status'] = 'verified';
				$_SESSION['request_vars'] = $access_token;
				
				//Insert user into the database
				$user_info = $connection->get('account/verify_credentials'); 
				$name = explode(" ",$user_info->name);
				$fname = isset($name[0])?$name[0]:'';
				$lname = isset($name[1])?$name[1]:'';
				// echo json_encode($user_info);	
				// die;

				$userData['oauth_provider'] = 'twitter';
				$userData['oauth_uid']      = $user_info->id;
				$userData['first_name']     = $fname;
				$userData['last_name']      = !empty($lname)?$lname:'';
				$userData['email']          = !empty($user_info->email)?$user_info->email:'';
				$userData['gender']         = !empty($user_info->gender)?$user_info->gender:'';
				$userData['locale']         = !empty($user_info->locale)?$user_info->locale:'';
				$userData['link']           = !empty($user_info->link)?$user_info->link:'';
				$userData['picture']        = !empty($user_info->profile_image_url)?$user_info->profile_image_url:'';

				if(isset($userData)){
					$userID = $this->suser->checkSocialUser($userData);
				}
					
				
				// Check user data insert or update status
				if(!empty($userID) && is_array($userID) && sizeof($userID) <> 0){
					// //Unset no longer needed request tokens
					// unset($_SESSION['token']);
					// unset($_SESSION['token_secret']);
				
					if($userID['error'] == 1){
						log_message("info","User Added successfully");
						$user = $this->suser->add_social_user($userData);
						
						foreach($user as $userr){
							
							$user_name = $userr->tfs_first_name.' '.$userr->tfs_last_name;
				
							$session_data = array(
								'user_id' => $userr->tfs_id,
								'user_full_name' => $user_name,
								'media'=>"twitter"
							);
						}
						$this->session->set_userdata('logged_in', $session_data);
						$data['msg'] = 'success';
						log_message("info","Session Set".json_encode($session_data));
						redirect(base_url().'dashboard');
					}	
					elseif($userID['error'] == 0){
						log_message("info","User Exsist");
					
						$user_name = $userID['user_detail']->tfs_first_name.' '.$userID['user_detail']->tfs_last_name;
						$session_data = array(
							'user_id' => $userID['user_detail']->tfs_id,
							'user_full_name' => $user_name,
							'media'=>"twitter"
						);
						
						$this->session->set_userdata('logged_in', $session_data);
						$data['msg'] = 'success';
						log_message("info","Session Set".json_encode($userID));
						redirect(base_url().'dashboard');
					}
					$user = $this->session->userdata('logged_in');
	
					if($user && !empty($user) && sizeof($user) <> 0){
						$data['full_name'] = $user['user_full_name'];
						$data['user_id'] = $user['user_id'];
						
						log_message("info","User loggedIn");
						$user_profile = $this->suser->get_social_user_info_by_id($data['user_id']);
						$wallet_id = $user_profile[0]->tfs_xdc_wallet;
						
						// if(trim($wallet_id) <> ''){
						
						// 	$options = array('address' => $wallet_id);
							
						// 	$rcurlf = get_xdc_balance($options);
						
						// 	if($rcurlf){
						// 		$rcurlfa = json_decode(stripslashes($rcurlf));
						// 	}
							
						// 	$balance = ((isset($rcurlfa->balance)) ? $rcurlfa->balance : '');
						// 	$status = ((isset($rcurlfa->status)) ? $rcurlfa->status : ''); 
										
						// 	$data_add = array();
						// 	// $data_add['tfu_xdc_walletID'] = $wallet_id;
						// 	$data_add['tfu_xdc_balance'] = $balance;
							
						// 	if(strtolower($status) == 'success' && trim($wallet_id) <> '' && trim($balance) <> ''){
						// 		$result = $this->manage->update_user_base_info_all_by_id_and_type($data['user_id'], $data['user_type_ref'], $data_add);
						// 	}
						// }	
						
						redirect(base_url().'dashboard');
					}else{
						
							redirect(base_url().'log/out');
						
					}
				}
			}	
				
		}else{
		
			if(isset($_GET["denied"]))
			{
				header('Location:'.base_url());
				die();
			}
			$CONSUMER_KEY = $this->config->item('CONSUMER_KEY');
			$CONSUMER_SECRET = $this->config->item('CONSUMER_SECRET');
			$OAUTH_CALLBACK = $this->config->item('OAUTH_CALLBACK');
			//Fresh authentication
			$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET);
			
			$request_token = $connection->getRequestToken($OAUTH_CALLBACK);
			
			//Received token info from twitter
			$_SESSION['token'] 			= $request_token['oauth_token'];
			$_SESSION['token_secret'] 	= $request_token['oauth_token_secret'];
			
			//Any value other than 200 is failure, so continue only if http code is 200
			if($connection->http_code == '200')
			{
				//redirect user to twitter
				$twitter_url = $connection->getAuthorizeURL($request_token['oauth_token']);
				header('Location: ' . $twitter_url); 
			}else{
				die("error connecting to twitter! try again later!");
			}
		}
	}

	public function lLogin(){
		$userData = array();
		
		// Get status and user info from session
        $oauthStatus = $this->session->userdata('oauth_status');
        $sessUserData = $this->session->userdata('userData');
		
		if(isset($oauthStatus) && $oauthStatus == 'verified'){
			// Get the user info from session
            $userData = $sessUserData;
		}elseif((isset($_GET["oauth_init"]) && $_GET["oauth_init"] == 1) || (isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])) || (isset($_GET['code']) && isset($_GET['state']))){
			
			// Authenticate with LinkedIn
			if($this->linkedin->authenticate()){
				
				// Get the user account info
				$userInfo = $this->linkedin->getUserInfo();
				
				// Preparing data for database insertion
				$userData = array();
				$userData['oauth_provider'] = 'linkedin';
				$userData['oauth_uid']  = !empty($userInfo['account']->id)?$userInfo['account']->id:'';
				$userData['first_name'] = !empty($userInfo['account']->firstName->localized->en_US)?$userInfo['account']->firstName->localized->en_US:'';
				$userData['last_name']  = !empty($userInfo['account']->lastName->localized->en_US)?$userInfo['account']->lastName->localized->en_US:'';
				$userData['email']      = !empty($userInfo['email']->elements[0]->{'handle~'}->emailAddress)?$userInfo['email']->elements[0]->{'handle~'}->emailAddress:'';
				$userData['picture']    = !empty($userInfo['account']->profilePicture->{'displayImage~'}->elements[0]->identifiers[0]->identifier)?$userInfo['account']->profilePicture->{'displayImage~'}->elements[0]->identifiers[0]->identifier:'';
				$userData['link']       = 'https://www.linkedin.com/';
		
				if(isset($userData)){
					$userID = $this->suser->checkSocialUser($userData);
				}
					
				
				// Check user data insert or update status
				if(!empty($userID) && is_array($userID) && sizeof($userID) <> 0){
					// //Unset no longer needed request tokens
					// unset($_SESSION['token']);
					// unset($_SESSION['token_secret']);
				
					if($userID['error'] == 1){
						log_message("info","User Added successfully");
						$user = $this->suser->add_social_user($userData);
						
						foreach($user as $userr){
							
							$user_name = $userr->tfs_first_name.' '.$userr->tfs_last_name;
				
							$session_data = array(
								'user_id' => $userr->tfs_id,
								'user_full_name' => $user_name,
								'media'=>"linkedin"
							);
						}
						$this->session->set_userdata('logged_in', $session_data);
						$data['msg'] = 'success';
						log_message("info","Session Set".json_encode($session_data));
						redirect(base_url().'dashboard');
					}	
					elseif($userID['error'] == 0){
						log_message("info","User Exsist");
					
						$user_name = $userID['user_detail']->tfs_first_name.' '.$userID['user_detail']->tfs_last_name;
						$session_data = array(
							'user_id' => $userID['user_detail']->tfs_id,
							'user_full_name' => $user_name,
							'media'=>"twitter"
						);
						
						$this->session->set_userdata('logged_in', $session_data);
						$data['msg'] = 'success';
						log_message("info","Session Set".json_encode($userID));
						redirect(base_url().'dashboard');
					}
					$user = $this->session->userdata('logged_in');
	
					if($user && !empty($user) && sizeof($user) <> 0){
						$data['full_name'] = $user['user_full_name'];
						$data['user_id'] = $user['user_id'];
						
						log_message("info","User loggedIn");
						$user_profile = $this->suser->get_social_user_info_by_id($data['user_id']);
						$wallet_id = $user_profile[0]->tfs_xdc_wallet;
						
						// if(trim($wallet_id) <> ''){
						
						// 	$options = array('address' => $wallet_id);
							
						// 	$rcurlf = get_xdc_balance($options);
						
						// 	if($rcurlf){
						// 		$rcurlfa = json_decode(stripslashes($rcurlf));
						// 	}
							
						// 	$balance = ((isset($rcurlfa->balance)) ? $rcurlfa->balance : '');
						// 	$status = ((isset($rcurlfa->status)) ? $rcurlfa->status : ''); 
										
						// 	$data_add = array();
						// 	// $data_add['tfu_xdc_walletID'] = $wallet_id;
						// 	$data_add['tfu_xdc_balance'] = $balance;
							
						// 	if(strtolower($status) == 'success' && trim($wallet_id) <> '' && trim($balance) <> ''){
						// 		$result = $this->manage->update_user_base_info_all_by_id_and_type($data['user_id'], $data['user_type_ref'], $data_add);
						// 	}
						// }	
						
						redirect(base_url().'dashboard');
					}else{
						
							redirect(base_url().'log/out');
						
					}
				}

			}else{
				 $data['error_msg'] = 'Error connecting to LinkedIn! try again later! <br/>'.$this->linkedin->client->error;
			}
		}elseif(isset($_REQUEST["oauth_problem"]) && $_REQUEST["oauth_problem"] <> ""){
			$data['error_msg'] = $_GET["oauth_problem"];
		}
		$data['userData'] = $userData;
		$data['oauthURL'] = $this->config->item('linkedin_redirect_url').'?oauth_init=1';
		
		// Load login & profile view
		// header('Location:http://localhost/TradeFinexLive'.$data['oauthURL']);
		header('Location:https://beta.tradefinex.org'.$data['oauthURL']);
			
	}

}

?>