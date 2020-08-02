<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'xdcapi', 'file', 'blockchain', 'notification'));
		$this->load->library(array('session', 'encrypt'));
		$this->load->model(array('manage','plisting','suser'));
		// $this->is_logged_in();
		$this->output->delete_cache();
		
		$data = array();
	}
	
	public function is_logged_in()
	{
		$user = $this->session->userdata('logged_in');
	
		if(!empty($user) && is_array($user)){
			if($user['user_id'] <> 0){
				
			}else{
				redirect(base_url().'log/out');
			}
		}else{
			redirect(base_url().'log/out');
		}
	} 
	
	private function thumb($srcImg,$thumb_size,$create_thumb)    
	{       
		$config['image_library'] = 'gd2';    
		$config['source_image'] = $srcImg;      
		$config['create_thumb'] = $create_thumb;    
		$config['maintain_ratio'] = TRUE;    
		$config['width'] = $thumb_size;     
		$config['height'] = $thumb_size;     
		$this->load->library('image_lib', $config);    
		$this->image_lib->resize();    
	}  
	
	public function edit()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'Edit Profile';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['membership_status'] = '';
		$data['upass'] = '';
		$data['uxwallet'] = '';
		$data['uxbalance'] = '';
		$data['ulinkedin'] = '';
		$data['ubankno'] = '';
		$data['ubankname'] = '';
		$data['udesignation'] = '';
		$data['uprofpic'] = '';
		$data['user_products'] = array();
		$data['user_services'] = array();
		$data['get_subscription_fees'] = '';
		$data['c1fname'] = '';
		$data['c1lname'] = '';
		$data['c1email'] = '';
		$data['c1contact'] = '';
		$data['c2fname'] = '';
		$data['c2lname'] = '';
		$data['c2email'] = '';
		$data['c2contact'] = '';
		$data['c2linkedin'] = '';
		$data['c2desgination'] = '';
		$data['comname'] = '';
		$data['caddress'] = '';
		$data['ccity'] = '';
		$data['cbhn'] = '';
		$data['cpinc'] = '';
		$data['cstate'] = '';
		$data['cweb'] = '';
		$data['clogo'] = '';
		$data['ccountry'] = 0;
		$data['cdept'] = 0;
		$data['crow'] = 0;
		$data['cregno'] = '';
		$data['com_legal_form'] = '';
		$data['com_business_overv'] = '';
		$data['com_linkedin'] = '';
		$data['com_sectors'] = array();
		$data['com_wiki'] = '';
		$data['com_incop'] = '';
		$data['check_company']  = '';
		$data['ubase_info'] = 0;
		$data['ucompany_info'] = 0;
		$data['uprodserv_info'] = 0;
		$data['ufinance_info'] = 0;
		
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
			
		}else{
			redirect(base_url().'log/out');
		}
		
		$action = $this->input->post('action');
		
		$data['UPOST'] = $_POST;
				
		$ccategories = $this->plisting->get_categories();
		
		if($ccategories && !empty($ccategories) && is_array($ccategories) && sizeof($ccategories) <> 0){
			$data['pcategories'] = $ccategories;			
		}
		
		$ccountry = $this->plisting->get_country();
		
		if($ccountry && !empty($ccountry) && is_array($ccountry) && sizeof($ccountry) <> 0){
			$data['pcountry'] = $ccountry;			
		}
		
		$csectors = $this->plisting->get_sectors();
		
		if($csectors && !empty($csectors) && is_array($csectors) && sizeof($csectors) <> 0){
			$data['psectors'] = $csectors;			
		}
		
		$encryption_key = $this->config->item('encryption_key');
		
		$config = array();
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 3072;
		$config['overwrite']            = TRUE;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 1024;
	
		if($action == 'edit_profile_base_bank' && $data['user_id'] <> 0){

			$getUser = $this->suser->get_user_base_info_by_id_and_type($data['user_id']);

			if(!empty($getUser)&& is_array($getUser) && sizeof($getUser) <> 0){
				$walletAddress = $getUser[0]->tfs_xdc_wallet;
				if($walletAddress != "" || $walletAddress != NULL){
					$data_add['tfs_bank_acc_number'] = $this->input->post('ubank_num');
					$data_add['tfs_bank_name'] = $this->input->post('ubank_name');
				}
				else{
					$addr = generateAddress();
					$data_add = array();
					
					$data_add['tfs_xdc_wallet'] = $addr->address;					
					$data_add['tfs_xdc_wallet_privateKey'] = openssl_encrypt($addr->privateKey,"AES-128-ECB",$encryption_key);
					$data_add['tfs_bank_acc_number'] = $this->input->post('ubank_num');
					$data_add['tfs_bank_name'] = $this->input->post('ubank_name');
				}
			}
			$this->suser->update_user_base_info_all_by_id($data['user_id'], $data_add);
		}
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			
		}
		

		if($action == 'edit_profile_base' && $data['user_id'] <> 0){ // || $action == 'edit_profile_finance'
			
			$data_add = array();
			$config['upload_path']          = FCPATH.'assets/social_user_profile_image/';
        
			$data_add['ufname'] = $this->input->post('first_name');
			$data_add['ulname'] = $this->input->post('last_name');
			$data_add['uemail'] = $this->input->post('email');
			$data_add['ucontact'] = $this->input->post('contactn');
			// $data_add['uaddress'] = $this->input->post('contacta');
			// $data_add['uname'] = $this->input->post('email');
			// $data_add['ubanknum'] = $this->input->post('ubank_num');
			// $data_add['ubankname'] = $this->input->post('ubank_name');
			$data_add['ulinkedin'] = $this->input->post('ulinkedin');
			$data_add['udesignation'] = $this->input->post('udesignation');
			
										
			$uresult = $this->suser->update_user_info_by_id($data['user_id'], $data_add);
			log_message("info","#####".$uresult);
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
			
				$file_name = time().str_replace(" ", "-", $_FILES["user_pic"]['name']);
				$config['file_name'] = $file_name;
				$file_namea = explode('.', $file_name);
				$this->load->library('upload', $config);
				
				if(isset($_FILES["user_pic"]['name']) && trim($_FILES["user_pic"]['name']) <> ''){
					
					if(!$this->upload->do_upload('user_pic'))
					{
					   $data['msg'] = 'error';
					   $data['msg_extra'] = 'Error occurred during profile picture update. <br/>'.$this->upload->display_errors();
					}
					else
					{
						$data_add = array();
						$data_add['tfs_pic_file'] = $uresult[0]->tfs_id.'_profimg.'.end($file_namea);
						
						
						$this->suser->update_profile_details_by_id_type($data['user_id'], $data_add);
							
						rename(FCPATH.'assets/social_user_profile_image/'.$file_name, FCPATH.'assets/social_user_profile_image/'.$uresult[0]->tfu_id.'_profimg.'.end($file_namea));
						$success_data = $this->upload->data();
						
						if(file_exists(FCPATH.'assets/social_user_profile_image/'.$uresult[0]->tfs_id.'_profimg.'.end($file_namea))){
						
							$this->thumb(FCPATH.'assets/social_user_profile_image/'.$uresult[0]->tfs_id.'_profimg.'.end($file_namea),100,true);  
						}
						
						$data['msg'] = 'success';
					}
				}else{
					$data['msg'] = 'success';
				}
				
				// $data_add = array();
				
				// // $data_add['tfscom_contact_linkedin'] = $this->input->post('com_linkedin');
				// $data_add['tfscom_user_ref'] = $data['user_id'];
				// $crow = $this->input->post('c_row');
					
				// if($crow > 0){
				// 	$data_add['tfscom_updated_at'] = date('Y-m-d H:i:s');
				// 	$cresult = $this->suser->update_company_info($data['user_id'], $data_add);	
				// }else{
				// 	$cresult = $this->suser->add_company_info($data_add);	
				// }
				
			}
			elseif(!empty($uresult) && sizeof($uresult) <> 0){
				$file_name = time().str_replace(" ", "-", $_FILES["user_pic"]['name']);
				$config['file_name'] = $file_name;
				$file_namea = explode('.', $file_name);
				$this->load->library('upload', $config);
				
				if(isset($_FILES["user_pic"]['name']) && trim($_FILES["user_pic"]['name']) <> ''){
					
					if(!$this->upload->do_upload('user_pic'))
					{
					   $data['msg'] = 'error';
					   $data['msg_extra'] = 'Error occurred during profile picture update. <br/>'.$this->upload->display_errors();
					}
					else
					{
						$data_add = array();
						$data_add['tfs_pic_file'] = $uresult.'_profimg.'.end($file_namea);
						
						
						$this->suser->update_profile_details_by_id_type($data['user_id'], $data_add);
							
						rename(FCPATH.'assets/social_user_profile_image/'.$file_name, FCPATH.'assets/social_user_profile_image/'.$uresult.'_profimg.'.end($file_namea));
						$success_data = $this->upload->data();
						
						if(file_exists(FCPATH.'assets/social_user_profile_image/'.$uresult.'_profimg.'.end($file_namea))){
						
							$this->thumb(FCPATH.'assets/social_user_profile_image/'.$uresult.'_profimg.'.end($file_namea),100,true);  
						}
						
						$data['msg'] = 'success';
					}
				}else{
					$data['msg'] = 'success';
				}
				
				// $data_add = array();
				
				// // $data_add['tfscom_contact_linkedin'] = $this->input->post('com_linkedin');
				// $data_add['tfscom_user_ref'] = $data['user_id'];
				// $crow = $this->input->post('c_row');
					
				// if($crow > 0){
				// 	$data_add['tfscom_updated_at'] = date('Y-m-d H:i:s');
				// 	$cresult = $this->suser->update_company_info($data['user_id'], $data_add);	
				// }else{
				// 	$cresult = $this->suser->add_company_info($data_add);	
				// }
			}
			else{
				$data['msg'] = 'success';
			}
		}

		
		if($action == 'edit_comapny' && $data['user_id'] <> 0){
			
			$data_add = array();
			
			$config['upload_path'] = FCPATH.'assets/social_user_company_logo/';
						
			$com_sectors = $this->input->post('com_sectors');
			
			$sectors = '';
			
			if(sizeof($com_sectors) <> 0){
				for($tc=0; $tc < sizeof($com_sectors); $tc++){
					
					if($tc > 0 && $com_sectors[$tc]){
						$sectors .= ',';
					}
					
					if(trim($com_sectors[$tc])){
						$sectors .= $com_sectors[$tc];
					}
				}
			}
        
			$data_add['tfscom_name'] = $this->input->post('c_name');
			// $data_add['tfcom_address'] = $this->input->post('c_bhn').'*'.$this->input->post('c_asa').'*'.$this->input->post('c_city').'*'.$this->input->post('c_pincode').'*'.$this->input->post('c_state');
			$data_add['tfscom_address'] = str_replace(',', '*', $this->input->post('caddress'));
			$data_add['tfscom_sectors'] = $sectors;
			// $data_add['tfscom_wikipedia_url'] = $this->input->post('com_wiki');
			$data_add['tfscom_legal_form'] = $this->input->post('com_legal_form');
			$data_add['tfscom_regno'] = $this->input->post('com_regno');
			$data_add['tfscom_incorporation_year'] = $this->input->post('com_incop');
			$data_add['tfscom_contact_linkedin'] = $this->input->post('com_linkedin');
			$data_add['tfscom_business_overview'] = $this->input->post('com_business_overv');
			
			/*
			$data_add['tfcom_contact1_fname'] = $this->input->post('c1_fname');
			$data_add['tfcom_contact1_lname'] = $this->input->post('c1_lname');
			$data_add['tfcom_contact1_email'] = $this->input->post('c1_email');
			$data_add['tfcom_contact1_number'] = $this->input->post('c1_contactn');
			
			$data_add['tfcom_contact2_fname'] = $this->input->post('c2_fname');
			$data_add['tfcom_contact2_lname'] = $this->input->post('c2_lname');
			$data_add['tfcom_contact2_linkedin'] = $this->input->post('c2_linkedin');
			$data_add['tfcom_contact2_designation'] = $this->input->post('c2_desgination');
			$data_add['tfcom_contact2_email'] = $this->input->post('c2_email');
			$data_add['tfcom_contact2_number'] = $this->input->post('c2_contactn'); */
			
			$data_add['tfscom_industry'] = $this->input->post('c_dept');
			$data_add['tfscom_country_ref'] = $this->input->post('c_country');
			$data_add['tfscom_web_url'] = $this->input->post('c_web');
			$data_add['tfscom_user_ref'] = $data['user_id'];
			$crow = $this->input->post('c_row');
					
			if($crow > 0){
				$data_add['tfscom_updated_at'] = date('Y-m-d H:i:s');
				$cresult = $this->suser->update_company_info($data['user_id'], $data_add);	
			}else{
				$cresult = $this->suser->add_company_info($data_add);	
			}
						
			if(!empty($cresult) && is_array($cresult) && sizeof($cresult) <> 0 && isset($_FILES) && isset($_FILES["comp_pic"]['name'])){
			
				$file_name = time().str_replace(" ", "-", $_FILES["comp_pic"]['name']);
				$config['file_name'] = $file_name;
				$file_namea = explode('.', $file_name);
				$this->load->library('upload', $config);
				
				if(isset($_FILES["comp_pic"]['name']) && trim($_FILES["comp_pic"]['name']) <> ''){
					
					if(!$this->upload->do_upload('comp_pic'))
					{
					   $data['msg'] = 'error';
					   $data['msg_extra'] = 'Error occurred during company logo update. <br/>'.$this->upload->display_errors();
					}
					else
					{
						$data_add = array();
						$data_add['tfscom_logo_file'] = $cresult[0]->tfscom_id.'_compimg.'.end($file_namea);
						
						$this->suser->update_company_info($data['user_id'], $data_add);
							
						rename(FCPATH.'assets/social_user_company_logo/'.$file_name, FCPATH.'assets/social_user_company_logo/'.$cresult[0]->tfscom_id.'_compimg.'.end($file_namea));
						$success_data = $this->upload->data();
						$data['msg'] = 'success';
					}
				}else{
					$data['msg'] = 'success';
				}
				
			}else{
				$data['msg'] = 'success';
			}	
		}	
				
		if($data['user_id'] <> 0){
						
			$data['check_company']  = $this->suser->get_company_info_by_uid($data['user_id']);
			
			$ucresult = $this->suser->get_company_info_by_uid($data['user_id']);
			
			if(!empty($ucresult) && is_array($ucresult) && sizeof($ucresult) <> 0){
				
				
				$data['comname'] = $ucresult[0]->tfscom_name;
				
				/* $adda = explode('*', $ucresult[0]->tfcom_address);
				
				if(sizeof($adda) > 2){
					$data['cbhn'] = $adda[0];
					$data['caddress'] = $adda[1];
					$data['ccity'] = $adda[2];
					$data['cpinc'] = $adda[3];
					$data['cstate'] = $adda[4];
				} */
				
				$data['caddress'] = str_replace('*', ',', $ucresult[0]->tfscom_address);
				$data['cregno'] = $ucresult[0]->tfscom_regno;
				$data['com_legal_form'] = $ucresult[0]->tfscom_legal_form;
				$data['com_business_overv'] = $ucresult[0]->tfscom_business_overview;
				$data['com_linkedin'] = $ucresult[0]->tfscom_linkedin;
				$data['com_sectors'] = array();
				
				$com_sec = explode(',', $ucresult[0]->tfscom_sectors);
				
				if(sizeof($com_sec) <> 0){
					for($tc=0; $tc < sizeof($com_sec); $tc++){
						array_push($data['com_sectors'], preg_replace("/[\s_]/", "-", strtolower($com_sec[$tc])));
					}
				}
				
				// $data['com_wiki'] = $ucresult[0]->tfcom_wikipedia_url;
				$data['com_incop'] = $ucresult[0]->tfscom_incorporation_year;
				$data['cweb'] = $ucresult[0]->tfscom_web_url;
				$data['clogo'] = $ucresult[0]->tfscom_logo_file;
				$data['ccountry'] = $ucresult[0]->tfscom_country_ref;
				$data['cdept'] = $ucresult[0]->tfscom_industry;
				$data['crow'] = $ucresult[0]->tfscom_id;
				
				if($data['comname'] && $data['caddress'] && $data['com_legal_form'] && $data['ccountry'] && $data['com_business_overv']  && $data['cdept'] && !empty($data['com_sectors']) && $data['com_incop'] && $data['cregno']){
				
					$data['ucompany_info'] = 1;
				}
				
				if($ucresult[0]->tfscom_industry == 0 || $ucresult[0]->tfscom_country_ref == 0){
					$uresult = $this->suser->get_user_base_info_by_id_and_type($data['user_id']);
				}
				else{
					$uresult = $this->suser->get_social_user_company_info_by_id($data['user_id']);
				}
			}else{
				$uresult = $this->suser->get_user_base_info_by_id_and_type($data['user_id']);
			}			
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				$data['ufname'] = $uresult[0]->tfs_first_name;
				$data['ulname'] = $uresult[0]->tfs_last_name;
				$data['uemail'] = $uresult[0]->tfs_email;
				$data['ucontact'] = $uresult[0]->tfs_contact_number;
				// $data['uaddress'] = $uresult[0]->tfb_address;
				$data['uprofpic'] = $uresult[0]->tfs_pic_file;

				$data['uname'] = $uresult[0]->tfs_email;
				$data['uxwallet'] = $uresult[0]->tfs_xdc_wallet;
				$data['ubankno'] = $uresult[0]->tfs_bank_acc_number;
				$data['ubankname'] = $uresult[0]->tfs_bank_name;
				$data['ulinkedin'] = $uresult[0]->tfs_linkedin;
				$data['udesignation'] = $uresult[0]->tfs_designation;
				
			}	
			
			if($data['ufname'] && $data['ulname'] && $data['ucontact'] && $data['ulinkedin'] && $data['udesignation']){
				
				$data['ubase_info'] = 1;
			}
			
			if($data['uxwallet']){ // && $data['ubankname'] && $data['ubankno']
				
				$data['ufinance_info'] = 1;
			}
		}
		

		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/user_profile_edit', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/profile_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function update_membership()
	{
		$data = array();

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
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}

		$this->manage->update_membership_status_by_id($data['user_id']);

       $data['msg'] = 'success';

        $this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		// $this->load->view('pages/user_profile_edit', $data);
		 $this->load->view('pages/user_sub_update', $data);
		$this->load->view('includes/footer_commonn', $data);
		// $this->load->view('pages_scripts/profile_scripts', $data);
		$this->load->view('includes/footern');
        
		
	}

	public function retry_membership()
	{
		$data = array();
		$data['msg'] = '';

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
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
       	
		$data['msg'] = 'error';

        $this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		// $this->load->view('pages/user_profile_edit', $data);
		 $this->load->view('pages/user_sub_update', $data);
		$this->load->view('includes/footer_commonn', $data);
		// $this->load->view('pages_scripts/profile_scripts', $data);
		$this->load->view('includes/footern');
	}
	public function profile()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'View Profile';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data['uwalleta'] = '';
		$data['uwalletbal'] = 0;
		$data['ulinkedin'] = '';
		
		$data['c1fname'] = '';
		$data['c1lname'] = '';
		$data['c1email'] = '';
		$data['c1contact'] = '';
		$data['c2fname'] = '';
		$data['c2lname'] = '';
		$data['c2email'] = '';
		$data['c2contact'] = '';
		$data['c2linkedin'] = '';
		$data['c2desgination'] = '';
		$data['comname'] = '';
		$data['cregno'] = '';
		$data['caddress'] = '';
		$data['ccity'] = '';
		$data['cbhn'] = '';
		$data['cpinc'] = '';
		$data['cstate'] = '';
		$data['cweb'] = '';
		$data['clogo'] = '';
		$data['ubankaccno'] = '';
		$data['ubankaccname'] = '';
		$data['ccountry'] = 0;
		$data['ccountryn'] = '';
		$data['cdept'] = 0;
		$data['cdeptn'] = '';
		$data['crow'] = 0;
		$data['check_company']  = '';
		$data['upcategory'] = array();
		$data['uscategory'] = array();
		
		
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
		}else{
			// redirect(base_url().'log/out');
		}
		
		$action = $this->input->post('action');
		
		$ccategories = $this->plisting->get_categories();
		
		if($ccategories && !empty($ccategories) && is_array($ccategories) && sizeof($ccategories) <> 0){
			$data['pcategories'] = $ccategories;			
		}
		
		$ccountry = $this->plisting->get_country();
		
		if($ccountry && !empty($ccountry) && is_array($ccountry) && sizeof($ccountry) <> 0){
			$data['pcountry'] = $ccountry;			
		}
		
		$encryption_key = $this->config->item('encryption_key');
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			
			
			// $data['notifications'] = get_notification_status($options);
		}
				
		if($data['user_id'] <> 0){ 
		
						
			$data['check_company']  = $this->suser->get_company_info_by_uid($data['user_id']);
			
			$ucresult = $this->suser->get_company_info_by_uid($data['user_id']);
			
			if(!empty($ucresult) && is_array($ucresult) && sizeof($ucresult) <> 0){
				
				$data['c1fname'] = $ucresult[0]->tfscom_contact1_fname;
				$data['c1lname'] = $ucresult[0]->tfscom_contact1_lname;
				$data['c1email'] = $ucresult[0]->tfscom_contact1_email;
				$data['c1contact'] = $ucresult[0]->tfscom_contact1_number;
				$data['c1linkedin'] = $ucresult[0]->tfscom_contact_linkedin;
				// $data['c1desgination'] = $ucresult[0]->tfscom_designation;
				$data['comname'] = $ucresult[0]->tfscom_name;
				$data['cregno'] = $ucresult[0]->tfscom_regno;
				
				$adda = explode('*', $ucresult[0]->tfscom_address);
				
				if(sizeof($adda) > 2){
					$data['cbhn'] = $adda[0];
					$data['caddress'] = $adda[1];
					$data['ccity'] = $adda[2];
					$data['cpinc'] = $adda[3];
					$data['cstate'] = $adda[4];
				}
				
				$data['com_legal_form'] = $ucresult[0]->tfscom_legal_form;
				$data['com_business_overv'] = $ucresult[0]->tfscom_business_overview;
				$data['com_linkedin'] = $ucresult[0]->tfscom_linkedin;
				$data['com_sectors'] = explode(',', $ucresult[0]->tfscom_sectors);
				
				$data['com_incop'] = $ucresult[0]->tfscom_incorporation_year;
				$data['cweb'] = $ucresult[0]->tfscom_web_url;
				$data['clogo'] = $ucresult[0]->tfscom_logo_file;
				$data['ccountry'] = $ucresult[0]->tfscom_country_ref;
				$data['cdept'] = $ucresult[0]->tfscom_insdustry;
				$data['crow'] = $ucresult[0]->tfscom_id;
			}	
			
			$uresult = $this->suser->get_social_user_company_info_by_id($data['user_id']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
					$data['ufname'] = $uresult[0]->tfs_first_name;
					$data['ulname'] = $uresult[0]->tfs_last_name;
					$data['uemail'] = $uresult[0]->tfs_email;
					$data['ucontact'] = $uresult[0]->tfs_contact_number;
					$data['uaddress'] = $uresult[0]->tfscom_address;
					$data['uprofpic'] = $uresult[0]->tfs_pic_file;
					
					$data['uname'] = $data['ufname']." ".$data['ulname'];
					$data['ccountryn'] = $uresult[0]->tfc_name;
					$data['cdeptn'] = $uresult[0]->cName;				
				
					$data['uwalleta'] = $uresult[0]->tfs_xdc_wallet;
					$data['ubankaccno'] = $uresult[0]->tfs_bank_acc_number;
					$data['ubankaccname'] = $uresult[0]->tfs_bank_name;
					$data['ulinkedin'] = $uresult[0]->tfs_linkedin;
					$data['udesignation'] = $uresult[0]->tfs_designation;
			}	
		}
		
		$request_user_id = $this->input->post('ruser_id');
		
				
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/user_profile_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/profile_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function update_balance(){
		
		$data = array();
		$data_json = array();
		
		$data['page'] = 'Update Balance';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['user_type_ref'] = 0;
		$data['user_type'] = '';
		$data_json['status'] = 0;
		
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
			
		$user = $this->session->userdata('logged_in');
		$action = $this->input->post('action');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
			$user_profile = $this->manage->get_user_info_by_id($data['user_id']);
			$wallet_id = $user_profile[0]->tfu_xdc_walletID;
			
			if(trim($wallet_id) <> '' && $action == 'update_balance'){
			
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
					
					if(!empty($result) && sizeof($result) <> 0){
						
						$data_json['balance'] = $balance;
						$data_json['status'] = 1;
					}
				}
			}
			
		}else{
			redirect(base_url().'log/out');
		}
		
		echo json_encode($data_json);
	}	
	
	public function check_product(){
		
		$data = array();
		
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['user_type_ref'] = 0;
		$data['user_type'] = '';
		$data['error'] = 0;
		
		$user = $this->session->userdata('logged_in');
		$action = $this->input->post('action');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		
		}
		
		$product_input = $this->input->post('product_input');
		
		$upresult = $this->manage->check_product_exist_by_name($product_input, $data['user_id'], $data['user_type_ref']);
		
		$data['pid'] = 0;
		
		if(!empty($upresult) && is_array($upresult) && sizeof($upresult) <> 0){
			$data['error'] = 1;
		}else{
			
			$i = 1;
			$data_add['tfup_name'] = $this->input->post('product_input');
			$data_add['tfup_user_ref'] = $data['user_id'];
			$data_add['tfup_user_type_ref'] = $data['user_type_ref'];
			$data_add['tfup_updated'] = date('Y-m-d H:i:s');
					
			$product_input_row = 0;
				
			$data_add['tfup_admin_approval'] = 1;
			
			if($data_add['tfup_name']){
			
				if($product_input_row > 0){
					$upresult = $this->manage->update_user_product_by_id($product_input_row, $data_add);
				}else{
					$upresult = $this->manage->add_user_product($data['user_id'], $data['user_type_ref'], $data_add);
				} 
				
				$data['pid'] = $upresult[0]->tfup_id;
			}	
		}	
		
		echo json_encode($data);
	}	
	
	public function check_service(){
		
		$data = array();
		
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['user_type_ref'] = 0;
		$data['user_type'] = '';
		$data['error'] = 0;
		
		$user = $this->session->userdata('logged_in');
		$action = $this->input->post('action');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		
		}
				
		$service_input = $this->input->post('service_input');
		$data['sid'] = 0;
		
		$usresult = $this->manage->check_service_exist_by_name($service_input, $data['user_id'], $data['user_type_ref']);
				
		if(!empty($usresult) && is_array($usresult) && sizeof($usresult) <> 0){
			$data['error'] = 1;
		}else{
			
			$i = 1;
			$data_add['tfus_name'] = $this->input->post('service_input');
			$data_add['tfus_user_ref'] = $data['user_id'];
			$data_add['tfus_user_type_ref'] = $data['user_type_ref'];
			$data_add['tfus_updated'] = date('Y-m-d H:i:s');
			
			$service_input_row = 0;
			
			$data_add['tfus_admin_approval'] = 1;
			
			if($data_add['tfus_name']){
				if($service_input_row > 0){
					$usresult = $this->manage->update_user_service_by_id($service_input_row, $data_add);
				}else{
					$usresult = $this->manage->add_user_service($data['user_id'], $data['user_type_ref'], $data_add);
				}
			}
			
			$data['sid'] = $usresult[0]->tfus_id;
		}	
		
		echo json_encode($data);
	} 
			
	public function add_viewer(){
		
		$data['page'] = 'Project Viewer';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			// redirect(base_url().'log/out');
		}
		
		$proj_user = $this->input->post('proj_user');
		$proj_id = $this->input->post('proj_id');
		
		if($data['user_id'] <> 0 && $data['user_id'] !== $proj_user){
				
			$this->manage->add_project_viewer($proj_id);
		}
	}
	
	public function update_log(){
		
		$data['page'] = 'Update Log';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			// redirect(base_url().'log/out');
		}
		
		if($data['user_id'] <> 0){
			
			$this->manage->update_user_log($data['user_id'], $data['user_type_ref']);
		}	
	}
	
	public function delete_service(){
	
		$data = array();
		$user = $this->session->userdata('logged_in');
		
		$data['user_id'] = 0;
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
				
		$action = $this->input->post('action');
		$serv_id = $this->input->post('serv_id');
		
		if($action == 'delete_service' && $data['user_id'] > 0 && $serv_id > 0){
			
			$data_add = array();
			$data_add['row_deleted'] = 1;
			$this->manage->update_user_service_by_id($serv_id, $data_add);
		
		}
	
	}
	
	public function delete_product(){
	
		$data = array();
		$user = $this->session->userdata('logged_in');
		
		$data['user_id'] = 0;
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
				
		$action = $this->input->post('action');
		$prod_id = $this->input->post('prod_id');
		
		if($action == 'delete_product' && $data['user_id'] > 0 && $prod_id > 0){
			
			$data_add = array();
			$data_add['row_deleted'] = 1;
			$this->manage->update_user_product_by_id($prod_id, $data_add);
		
		}
	
	}
		
	public function update_notification(){
		
		$data = array();
		$user = $this->session->userdata('logged_in');
		
		$data['user_id'] = 0;
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
				
		$action = $this->input->post('action');
		$checkedv = $this->input->post('checkedv');
		
		if($checkedv == ''){
			$checkedv = 0;
		}
		
		$data_add = array();
		
		if($data['user_id'] <> 0){
			if($data['user_type_ref'] == 3){
				if($action == 'financier_notification'){
					$data_add['tfb_financier_notification'] = $checkedv;
				}
				
				if($action == 'provider_notification'){
					$data_add['tfb_provider_notification'] = $checkedv;
				}
				
				if($action == 'project_visibility'){
					$data_add['tfb_project_post_visibility'] = $checkedv;
				}
				
				if($action == 'project_expire_visibility'){
					$data_add['tfb_project_expiration_visibility'] = $checkedv;
				}
			}
			
			if($data['user_type_ref'] == 1){
				if($action == 'beneficiaries_notification'){
					$data_add['tfsp_benif_notification'] = $checkedv;
				}
				
				if($action == 'new_project_notification'){
					$data_add['tfsp_posted_project_visibility'] = $checkedv;
				}
			}
			
			if($data['user_type_ref'] == 2){
				if($action == 'beneficiaries_notification'){
					$data_add['tff_benif_notification'] = $checkedv;
				}
				
				if($action == 'new_project_notification'){
					$data_add['tff_posted_project_visibility'] = $checkedv;
				}
			}
		}
		
		if($data['user_id'] <> 0){
			$this->manage->update_notification_setting($data['user_id'], $data['user_type_ref'], $data_add);
		}
	}
	
	public function update_visibility(){
		
		$data = array();
		$user = $this->session->userdata('logged_in');
		
		$data['user_id'] = 0;
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
				
		$action = $this->input->post('action');
		$checkedv = $this->input->post('checkedv');
		
		if($checkedv == ''){
			$checkedv = 0;
		}
		
		$data_add = array();
		
		if($data['user_id'] <> 0){
			
			if($data['user_type_ref'] == 1){
				if($action == 'user_visibility'){
					$data_add['tfsp_public_visibility'] = $checkedv;
				}
			}
			
			if($data['user_type_ref'] == 2){
				if($action == 'user_visibility'){
					$data_add['tff_public_visibility'] = $checkedv;
				}
			}
		}
		
		if($data['user_id'] <> 0){
			$this->manage->update_visibility_setting($data['user_id'], $data['user_type_ref'], $data_add);
		}
	}
}
	