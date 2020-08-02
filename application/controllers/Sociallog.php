<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sociallog extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session', 'encrypt','facebook'));
		$this->load->model(array('user'));
		
		$data = array();
		$data_add = array();
	}
	
	public function out()
	{
	
		session_start();
		unset($_SESSION['token']);
		// $facebook->destroySession();
		session_destroy();
		
		// echo 'hiiii'.$_SESSION['token'];
		// echo 'You have been logged out. <a href="">Go back</a>';
		// die;
		header('Location:'.base_url());
    }
}
