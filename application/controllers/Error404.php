<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'xdcapi'));
		$this->load->library(array('session', 'encrypt', 'email'));
		$this->load->model(array('plisting', 'manage'));
		// $this->output->cache(0.5);
		$this->config->load('emailc');
		$data = array();
		$data_add = array();
	}
	
	public function index()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'error404';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/error404_view', $data);
		$this->load->view('includes/footer_commonn', $data); /* footer_common_blank */
		$this->load->view('includes/footern');
	}
}
	