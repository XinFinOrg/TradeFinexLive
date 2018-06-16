<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thankyouc extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'notification'));
		$this->load->library('session');
		$this->load->model('manage');
		
		$data = array();
	}
	
	public function index()
	{
		$data = array();
		$data['msg'] = '';
		$data['page'] = 'thankyou';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			// redirect(base_url().'log/out');
		}
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
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
		}	
		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/thankyou_common', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/thankyou_scripts', $data); 
		$this->load->view('includes/footern');
	}
}
	