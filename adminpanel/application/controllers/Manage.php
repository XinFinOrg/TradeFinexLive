<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->helper('date');
		// $this->is_logged_in();
		// $this->load->model('manage');
		$this->output->delete_cache();

		$data = array();
		$data_add = array();
	}
	
	public function view(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'admins';
		$data['sub'] = 'view';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'View';
				
		$user = $this->session->userdata('logged_in');
		$type_id = $this->input->post('user_type');
		
		$data['type_id'] = $type_id;
		$data['users'] = '';
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/header_after_login', $data);
		$this->load->view('pages/admins', $data);
		$this->load->view('includes/footer_after_login', $data);
		// $this->load->view('pages_scripts/users_scripts', $data);
		$this->load->view('includes/footer_common', $data);
		
	}
	
	public function create(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'admins';
		$data['sub'] = 'create';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Create';
				
		$user = $this->session->userdata('logged_in');
		$type_id = $this->input->post('user_type');
		
		$data['type_id'] = $type_id;
		$data['users'] = '';
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/header_after_login', $data);
		$this->load->view('pages/admins', $data);
		$this->load->view('includes/footer_after_login', $data);
		// $this->load->view('pages_scripts/users_scripts', $data);
		$this->load->view('includes/footer_common', $data);
		
	}
	
}	