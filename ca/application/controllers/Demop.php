<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demop extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session', 'encrypt'));
		// $this->is_logged_in();
		$this->load->model(array('manage', 'plisting'));
		$this->output->delete_cache();

		$data = array();
		$data_add = array();
	}
	
	public function how_it_works()
	{
		$data = array();
		$result = array();
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
	
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/how_it_works', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('includes/footern');
	}	
	
}	