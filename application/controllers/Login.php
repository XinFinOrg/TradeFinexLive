<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'xdcapi'));
		$this->load->library(array('session', 'encrypt', 'email','facebook'));
		$this->load->model('manage','user');
		$this->output->delete_cache();
        $this->config->load('emailc');
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
				$this->session->set_flashdata('error', "<div style='color:red;'>Not Correct User.");
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

	public function fblogin(){
		$userData = array();
		
		if(!isset($this->session)):
			echo "<pre>";
			print_r('$this->facebook->is_authenticated()');
		endif;
        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';;
            $userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:'';
            $userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:'';
            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:'';
            $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:'';
            $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'';
            
            // Insert or update user data
            $userID = $this->user->checkUser($userData);
            
            // Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
				$this->session->set_userdata('userData', $userData);
				redirect('user_authentication/facebook_profile/');
            }else{
               $data['userData'] = array();
            }
            
            // Get logout URL
            $data['logoutURL'] = $this->facebook->logout_url();
        }else{
			// Get login URL
			// echo "<pre>";
			// print_r($this->facebook->login_url());
			// die;
			$data['authURL'] =  $this->facebook->login_url();
			// header($data);
			
        }
        
		// Load login & profile view
		$this->load->view('user_authentication/facebook',$data);
		if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';;
            $userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:'';
            $userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:'';
            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:'';
            $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:'';
            $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'';
            
            // Insert or update user data
            $userID = $this->user->checkUser($userData);
            
            // Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
				$this->session->set_userdata('userData', $userData);
				redirect('user_authentication/facebook_profile/');
            }else{
               $data['userData'] = array();
            }
            
            // Get logout URL
            $data['logoutURL'] = $this->facebook->logout_url();
        }else{
			// Get login URL
			// echo "<pre>";
			// print_r($this->facebook->login_url());
			// die;
			$data['authURL'] =  $this->facebook->login_url();
			// header($data);
			
        }
		
    
    }
}

?>