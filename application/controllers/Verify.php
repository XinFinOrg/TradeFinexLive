<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session', 'encrypt'));
		$this->load->model(array('plisting', 'manage', 'notification'));
		$this->output->delete_cache();

		$data = array();
		$data_add = array();
	}
	
	public function account()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'verification';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['user_id'] = 0;
		$data['full_name'] = '';
		
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
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$suria = explode('?', $_SERVER['REQUEST_URI']);
		
		$encryption_key = $this->config->item('encryption_key');
		$decode_request_string = $this->encrypt->decode($suria[1], $encryption_key);
		$req_string = explode('&', $decode_request_string);
			
		$req_string_1a = explode('=', $req_string[0]);
		$req_string_2a = explode('=', $req_string[1]);
		$req_string_3a = explode('=', $req_string[2]);
				
		$email = $req_string_1a[1];
		$hash = $req_string_2a[1];
		$expired = $req_string_3a[1]; 
		
		$result = $this->manage->verify_user($email, $hash, $data);
		
		if(!empty($result) && is_array($result) && sizeof($result) <> 0){
								
			$time_now = strtotime(date('Y-m-d H:i:s'));
			
			if($time_now > $expired){
				$data['msg'] = 'error';
				$data['msg_extra'] = "<h3>Email Verification Failed</h3> <p>Oops ! A problem has been occurred while activating your profile. Contact customer support to activate your account. Click <a href='".base_url()."'>here</a> to go home.</p>";
				
			}else{
				$datan = array();
				$datan['tfu_active'] = 1;
				$this->manage->update_base_user_info_by_id($result[0]->tfu_id, $datan);
				$data['msg'] = 'success';
				$data['msg_extra'] = "<h3>Email Verified</h3> <p>Thank You ! Your account has been successfully activated. Click <a href='".base_url()."'>here</a> to go home.</p>";
			}
			
			$all_user_info = $this->manage->get_all_user_info();
			$count = 0;
						
			if(!empty($all_user_info) && is_array($all_user_info) && sizeof($all_user_info) > 0){
				
				foreach($all_user_info as $aurow)
				{
					$data_add = array();
					
					if($aurow[0]->tfu_id != $result[0]->tfu_id){
										
						if($aurow[0]->tfu_utype == 1 && $result[0]->tfu_utype == 3){	
							
							$nresult = $this->manage->get_notification_setting($aurow[0]->tfu_id, $aurow[0]->tfu_utype);
			
							if(!empty($nresult) && is_array($nresult) && sizeof($nresult) <> 0){
														
								if($nresult[0]->tfsp_benif_notification == 1){
									
									$nofifya[$count]['notify_type'] = 'user_registered';
									$nofifya[$count]['notify_id'] = time();
									$nofifya[$count]['notify_for_user'] = $result[0]->tfu_id;
									$nofifya[$count]['notify_for_user_type'] = $result[0]->tfu_utype;
									$nofifya[$count]['notify_for_project'] = 0;
									$nofifya[$count]['notify_for_proposal'] = 0;
									
									$user_info = $this->manage->get_user_info_by_id($result[0]->tfu_id);
				
									$nofifya[$count]['notify_user_ref'] = $aurow[0]->tfu_id;
									$nofifya[$count]['notify_user_type_ref'] = $aurow[0]->tfu_utype;
									$nofifya[$count]['notify_text'] = 'New Beneficiary Registered - '.ucwords($user_info[0]->tfb_fname.' '.$user_info[0]->tfb_lname);
									$nofifya[$count++]['notify_time'] = date('Y-m-d H:i:s');
									
								}
							}

							if($aurow[0]->tfu_utype == 2 && $result[0]->tfu_utype == 3){
								
								$nresult = $this->manage->get_notification_setting($aurow[0]->tfu_id, $aurow[0]->tfu_utype);
			
								if(!empty($nresult) && is_array($nresult) && sizeof($nresult) <> 0){
														
									if($nresult[0]->tff_benif_notification == 1){
								
										$nofifya[$count]['notify_type'] = 'user_registered';
										$nofifya[$count]['notify_id'] = time();
																			
										$nofifya[$count]['notify_for_user'] = $result[0]->tfu_id;
										$nofifya[$count]['notify_for_user_type'] = $result[0]->tfu_utype;
										$nofifya[$count]['notify_for_project'] = 0;
										$nofifya[$count]['notify_for_proposal'] = 0;
					
										$user_info = $this->manage->get_user_info_by_id($result[0]->tfu_id);
					
										$nofifya[$count]['notify_user_ref'] = $aurow[0]->tfu_id;
										$nofifya[$count]['notify_user_type_ref'] = $aurow[0]->tfu_utype;
										$nofifya[$count]['notify_text'] = 'New Beneficiary Registered - '.ucwords($user_info[0]->tfb_fname.' '.$user_info[0]->tfb_lname);
										$nofifya[$count++]['notify_time'] = date('Y-m-d H:i:s');
									}
								}	
							}
							
							if($aurow[0]->tfu_utype == 3 && $result[0]->tfu_utype == 1){
							
								$nresult = $this->manage->get_notification_setting($aurow[0]->tfu_id, $aurow[0]->tfu_utype);
			
								if(!empty($nresult) && is_array($nresult) && sizeof($nresult) <> 0){
														
									if($nresult[0]->tfb_provider_notification == 1){
								
										$nofifya[$count]['notify_type'] = 'user_registered';
										$nofifya[$count]['notify_id'] = time();
										$nofifya[$count]['notify_for_user'] = $result[0]->tfu_id;
										$nofifya[$count]['notify_for_user_type'] = $result[0]->tfu_utype;
										$nofifya[$count]['notify_for_project'] = 0;
										$nofifya[$count]['notify_for_proposal'] = 0;
					
										$user_info = $this->manage->get_user_info_by_id($result[0]->tfu_id);
					
										$nofifya[$count]['notify_user_ref'] = $aurow[0]->tfu_id;
										$nofifya[$count]['notify_user_type_ref'] = $aurow[0]->tfu_utype;
										$nofifya[$count]['notify_text'] = 'New Supplier Registered - '.ucwords($user_info[0]->tfsp_fname.' '.$user_info[0]->tfsp_lname);
										$nofifya[$count++]['notify_time'] = date('Y-m-d H:i:s');
									}
								}
							}
							
							if($aurow[0]->tfu_utype == 3 && $result[0]->tfu_utype == 2){
							
								$nresult = $this->manage->get_notification_setting($aurow[0]->tfu_id, $aurow[0]->tfu_utype);
			
								if(!empty($nresult) && is_array($nresult) && sizeof($nresult) <> 0){
														
									if($nresult[0]->tfb_financier_notification == 1){
								
										$nofifya[$count]['notify_type'] = 'user_registered';
										$nofifya[$count]['notify_id'] = time();
										$nofifya[$count]['notify_for_user'] = $result[0]->tfu_id;
										$nofifya[$count]['notify_for_user_type'] = $result[0]->tfu_utype;
										$nofifya[$count]['notify_for_project'] = 0;
										$nofifya[$count]['notify_for_proposal'] = 0;
					
										$user_info = $this->manage->get_user_info_by_id($result[0]->tfu_id);
					
										$nofifya[$count]['notify_user_ref'] = $aurow[0]->tfu_id;
										$nofifya[$count]['notify_user_type_ref'] = $aurow[0]->tfu_utype;
										$nofifya[$count]['notify_text'] = 'New Financier Registered - '.ucwords($user_info[0]->tff_fname.' '.$user_info[0]->tff_lname);
										$nofifya[$count++]['notify_time'] = date('Y-m-d H:i:s');
									}
								}
							}
						}
					}
				}
				
				if(!empty($nofifya) && sizeof($nofifya) <> 0){
					$this->notification->save_notification($nofifya);
				}
			}
					
		}else{
			// $data['msg'] = 'error';
			// $data['msg_extra'] = "<h4 class='text-center' style='font-size:20px;color:#000;font-weight:700;font-family:Open_Sans_Regular;'>Email Verification Failed</h4> <h3 class='text-center' style='font-size:16px;line-height:20px;color:#000;font-family:Open_Sans_Regular;padding-left:10px;padding-right:10px;'>Oops ! A problem has been occurred while activating your profile. Contact customer support to activate your account. Click <a href='".base_url()."' style='font-family: Open_Sans_Regular;'>here</a> to go home.</h3>";
			redirect(base_url());
		}	
		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/account_activate', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/verify_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function siteURL() {
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		// $domainName = $_SERVER['HTTP_HOST'] . '/';
		$domainName = $_SERVER['HTTP_HOST'];
		// return $protocol . $domainName;
		return $domainName;
	}
}
	