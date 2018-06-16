<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session', 'encrypt'));
		$this->load->model(array('manage', 'plisting'));
		$this->output->delete_cache();
		
		$data = array();
		$data_add = array();
	}
	
	public function in()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'Public_Home';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['full_name'] = '';
		$data['pcategories'] = array();
		$data['industry'] = array();
		$data['sectors'] = array();
		$carr = array();
		$icat = array();
		$icat['cat_id'] = array();
		$icat['cat_name'] = array();
		$icat['cat_image'] = array();
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
		
		if($action == 'login'){
			$result = $this->manage->fetch_user($data);
		}
			
		if(!empty($result) && is_array($result) && sizeof($result) <> 0){
			
			if($result['error'] == 0){
				
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
			
			if($result['error'] == 1){
				$data['msg'] = 'error';
			}	
		}	
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
			redirect(base_url().'dashboard');
		}else{
			// redirect(base_url().'log/out');
		}
		
		$ccategories = $this->plisting->get_projects_by_categories();
		
		if($ccategories && !empty($ccategories) && is_array($ccategories) && sizeof($ccategories) <> 0){
			$data['pcategories'] = $ccategories;			
		}
		
		$ccontracts = $this->plisting->get_sectors_by_categories();
		
		if($ccontracts && !empty($ccontracts) && is_array($ccontracts) && sizeof($ccontracts) <> 0){
			// $data['ccontracts'] = $ccontracts;	
			
			foreach($ccontracts as $crow){
			
				if(in_array($crow->cat_id, $icat['cat_id'])){
					
				}else{
					array_push($icat['cat_id'], $crow->cat_id);
					array_push($icat['cat_name'], $crow->cat_name);
					array_push($icat['cat_image'], $crow->cat_image);
				}
				
				if(isset($carr[$crow->cat_id]) && is_array($carr[$crow->cat_id])){
				
				}else{
					$carr[$crow->cat_id] = array();
				}
				
				if(isset($carr[$crow->cat_id]) && is_array($carr[$crow->cat_id])){
					array_push($carr[$crow->cat_id], $crow->sectorName);
				}	
			}
			
			$data['industry'] = $icat;
			$data['sectors'] = $carr;
		}
		
		$data['medias'] = $medias = array();
		$data['medias'] = $medias = json_decode(file_get_contents(FCPATH.'/assets/frontend_pages/media/media_center.txt'), TRUE);
				
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public_home', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern', $data);
	}
}
