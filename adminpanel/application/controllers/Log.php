<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library('session');
		$this->load->model('manage');
		$this->output->delete_cache();

		$data = array();
		$data_add = array();
	}
	
	public function in()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'login';
		$data['msg'] = '';
		
		$action = $this->input->post('action');
		$data['user_name'] = $this->input->post('user_name');
		$data['user_password'] = $this->input->post('user_password');
		
		if($action == 'login'){
			$result = $this->manage->fetch_user($data);
		}
		
		if(!empty($result) && is_array($result) && sizeof($result) <> 0){
						
			if($result['error'] == 0){
				
				if($result['user_detail']->tfa_utype == -1){
					$user_full_name = $result['user_detail']->tfa_fname.' '.$result['user_detail']->tfa_lname;
					$user_type = 'Admin';
				}
							
				$session_data = array(
					'user_id' => $result['user_detail']->tfa_id,
					'user_type' => $user_type,
					'user_type_ref' => $result['user_detail']->tfa_utype,
					'user_full_name' => $user_full_name
				);
				
				$this->session->set_userdata('alogged_in', $session_data);
				$data['msg'] = 'success';
				redirect(base_url().'dashboard');
			}
			
			if($result['error'] == 1){
				$data['msg'] = 'error';
			}	
		}	
		
		$user = $this->session->userdata('alogged_in');
		
		$this->load->view('pages/login_view', $data);
	}
	
	public function out()
	{
		$session_data = array(
			'user_id' => '',
			'user_type' => '',
			'user_type_ref' => '',
			'user_full_name' => ''
		);
		
		$this->session->unset_userdata('alogged_in', $session_data);
		
		redirect(base_url());
	}	
}
	