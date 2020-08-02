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
			$data['media'] = $user['media'];
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
			if($data['media'] == "facebook"){
				 
				// Remove local Facebook session 
				$this->facebook->destroy_session(); 
				// Remove user data from session 
				$this->session->unset_userdata('userData'); 
	
			} elseif($data['media']=="twitter"){
				// Remove session data
				$this->session->unset_userdata('token');
				$this->session->unset_userdata('token_secret');
				$this->session->unset_userdata('status');
				$this->session->unset_userdata('userData');
				$this->session->sess_destroy();
			} elseif($data['media'] == "google"){
				// Reset OAuth access token 
				// $this->google->revokeToken(); 
         
				// // Remove token and user data from the session 
				$this->session->unset_userdata('logged_in'); 
				// $this->session->unset_userdata('userData'); 
				 
				// Destroy entire session data 
				$this->session->sess_destroy(); 
			}
			redirect(base_url());
		} 
	}	
}
