<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->helper('date');
		// $this->is_logged_in();
		$this->load->model('manage');
		$this->output->delete_cache();

		$data = array();
		$data_add = array();
	}
	
	public function is_logged_in()
	{
		$user = $this->session->userdata('alogged_in');
	
		if(!empty($user) && is_array($user) && ($user['user_type'] == 'Admin')){
			if($user['user_id'] <> 0){
				
			}else{
				redirect(base_url().'log/out');
			}
		}else{
			redirect(base_url().'log/out');
		}
	}
	
	public function index(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'dashboard';
		$data['sub'] = '';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['upic'] = '';
		
		$user = $this->session->userdata('alogged_in');
		
		// echo '<pre>';
		// print_r($user);
		// exit;
				
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_profile_by_id($data['user_id']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
			}
		}
				
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/dashboard_scripts', $data);
		$this->load->view('includes/footer_common', $data);
		
	}
	
}	