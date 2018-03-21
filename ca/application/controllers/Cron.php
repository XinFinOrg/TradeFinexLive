<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->model(array('manage', 'plisting'));
	}
        
	public function index(){

		$this->manage->update_logged_user();
	}
}

?>