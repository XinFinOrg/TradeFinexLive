<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	
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
	
	public function details(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'category';
		$data['sub'] = '';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Detail';
				
		$user = $this->session->userdata('alogged_in');
		$type_id = $this->input->post('user_type');
		
		$data['type_id'] = $type_id;
		$data['users'] = '';
				
		$user = $this->session->userdata('alogged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/header_after_login', $data);
		$this->load->view('pages/categories', $data);
		$this->load->view('includes/footer_after_login', $data);
		// $this->load->view('pages_scripts/users_scripts', $data);
		$this->load->view('includes/footer_common', $data);
		
	}
	
	public function manage(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'category';
		$data['sub'] = '';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Manage';
				
		$user = $this->session->userdata('alogged_in');
		$type_id = $this->input->post('user_type');
		
		$data['type_id'] = $type_id;
		$data['users'] = '';
				
		$user = $this->session->userdata('alogged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/header_after_login', $data);
		$this->load->view('pages/manage_category', $data);
		$this->load->view('includes/footer_after_login', $data);
		// $this->load->view('pages_scripts/users_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}	
	
}	