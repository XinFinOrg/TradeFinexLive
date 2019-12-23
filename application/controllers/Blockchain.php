<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blockchain extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date','blockchain'));
		// $this->load->library(array('session', 'encrypt', 'email'));
		// $this->load->model(array('plisting', 'manage'));
		// // $this->output->cache(0.5);
		// $this->config->load('emailc');
		$data = array();
		$data_add = array();
	}

	public function createaccount(){
		$data = array();
		
		$data['page'] = 'test1';
		$data['csrf'] = array();
        
		$result = createAddress();
		log_message('info','create account called');
        $data1['address'] = $result[2];
		$data1['private_key'] = $result[3];
		// $add = explode(":",$data1['address']);
		// $add = str_replace(array("'"," "),"",end($add));
		// $add = rtrim($add,',');
		// $data1['balance'] = getBalance($add);
		// $addr = explode("'",$add);
		// $res1 = getBalance(end($addr));
		// echo("PP".json_encode($result));

		// die;
		
		$this->load->view('pages/public/test1_view',$data1);
		
	}
	public function test(){
		$data = array();
		
		$data['page'] = 'test';
		$data['csrf'] = array();
        
		$add = $this->input->post('address');
		$data1['balance'] = getBalance($add);
		
		$this->load->view('pages/public/test_view',$data1);
		
	}
	public function sendtokens(){
		$data = array();
		
		$data['page'] = 'test2';
		$data['csrf'] = array();
        
		$toAddr = $this->input->post('address');
		$privKey = $this->input->post('privkey');
		$amount = $this->input->post('amount');
		$result = sendTokens($privKey,$toAddr,$amount);
		$data2['fromAddr'] = $result[6];
		$data2['toAddr'] = $result[11];
		$data2['txFee'] = $result[5];
		$data2['transactionHash'] = $result[12];
		// echo("PP".json_encode($data2));

		// die;
		$this->load->view('pages/public/test2_view',$data2);
		
	}
}
	
