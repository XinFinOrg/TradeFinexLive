<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thankyouc extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library('session');
		$this->load->model(array('manage','suser'));
		
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
		// $data['notifications'] = get_initial_notification_status();
			
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
		
		// $data['notifications'] = array();
		// $data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			// $data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->suser->get_social_user_company_info_by_id($data['user_id']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				$data['ufname'] = $uresult[0]->tfs_first_name;
				$data['ulname'] = $uresult[0]->tfs_last_name;
				$data['uemail'] = $uresult[0]->tfs_email;
				$data['ucontact'] = $uresult[0]->tfs_contact_number;
				$data['uprofpic'] = $uresult[0]->tfs_pic_file;
				
			}elseif(!empty($uresult) && sizeof($uresult) <> 0){
				
				$uresulta = $this->suser->get_user_base_info_by_id_and_type($data['user_id']);
				if(!empty($uresulta) && is_array($uresulta) && sizeof($uresulta) <> 0){
					$data['ufname'] = $uresult[0]->tfs_first_name;
					$data['ulname'] = $uresult[0]->tfs_last_name;
					$data['uemail'] = $uresult[0]->tfs_email;
					$data['ucontact'] = $uresult[0]->tfs_contact_number;
					$data['uprofpic'] = $uresult[0]->tfs_pic_file;
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
	