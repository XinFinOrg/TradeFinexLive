<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unsubscribe extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'notification'));
		$this->load->library(array('session', 'encrypt', 'email'));
		$this->load->model(array('plisting', 'manage'));
		
		$this->config->load('emailc');
		
	}
	
	public function index(){
	
		$data = array();
		$data_add = array();
		
		$encryption_key = $this->config->item('encryption_key');
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$suria = explode('?', $_SERVER['REQUEST_URI']);
		
		$decode_request_string = $this->encrypt->decode($suria[1], $encryption_key);
		$req_string = explode('&', $decode_request_string);
			
		$req_string_1a = explode('=', $req_string[0]);
		$req_string_2a = explode('=', $req_string[1]);
				
		$email = $req_string_1a[1];
		$action = $req_string_2a[1];
		
		if($action == 'unsubscribe' && $email){
		
			$data_add['tfs_email'] = $email;
			$data_add['tfs_active'] = 0;
			
			$this->manage->update_subscription($data_add);
			
			$this->session->set_flashdata('msg_type', 'success'); // reset_password
			$this->session->set_flashdata("email_sent_common", "<h3>Successfully Unsubscribed</h3>");
			$this->session->set_flashdata("popup_desc", "<p>You have been successfully unsubscribed from us. Please <a href='".base_url()."'>click here</a> to go home.</p>");
			
			redirect(base_url().'thankyouc');
		}
		
		redirect(base_url());
	}
}
	