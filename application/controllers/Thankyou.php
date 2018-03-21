<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thankyou extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library('session');
		
		$data = array();
	}
		
	public function index()
	{
		$data = array();
		$data['msg'] = '';
		$data['page'] = 'thankyou';
		$data['user_id'] = 0;
		$data['full_name'] = '';
		
		$this->load->view('includes/header', $data);
		$this->load->view('includes/header_public', $data);
		$this->load->view('pages/thankyou_signup', $data);
		$this->load->view('includes/footer_common', $data);
		$this->load->view('pages_scripts/thankyou_scripts', $data); 
	}
}
	