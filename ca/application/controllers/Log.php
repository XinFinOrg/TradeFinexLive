<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session', 'encrypt'));
		$this->load->model(array('manage', 'plisting'));
		
		$data = array();
		$data_add = array();
	}
	
	public function out()
	{
		$data = array();
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_type_ref'] = '';
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}
				
		$result = $this->manage->update_logout_user($data['user_id'], $data['user_type_ref']);
		
		if($result){
		
			$session_data = array(
				'user_id' => '',
				'user_type' => '',
				'user_type_ref' => '',
				'user_full_name' => ''
			);
			
			$this->session->unset_userdata('logged_in', $session_data);
			
			redirect(base_url());
		} 
	}	
}
