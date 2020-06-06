<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session', 'encrypt','facebook'));
		$this->load->model(array('manage', 'plisting','suser'));
		
		$data = array();
		$data_add = array();
	}
	
	public function out()
	{
		$data = array();
		$data['user_id'] = 0;
		$data['full_name'] = '';
		
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
		}
				
		$result = $this->suser->update_logout_user($data['user_id']);
		
		if($result){
		
			$session_data = array(
				'user_id' => '',
				'user_full_name' => ''
			);
			// $this->facebook->destroy_session();
			
			
        	// Remove user data from session
			$this->session->unset_userdata('logged_in', $session_data);
			$yes = session_destroy();
			
			if($yes){
				log_message("info","@@@@@");
			}
			redirect(base_url());
		} 
	}	
}
