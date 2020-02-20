<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finxtradez extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date','blockchain','notification'));
		$this->load->library(array('session', 'encrypt', 'email'));
		$this->load->model(array('plisting', 'manage'));
		// $this->output->cache(0.5);
		$this->config->load('emailc');
		$data = array();
		$data_add = array();
	}
	

    public function borrower(){
		
		$data = array();
		
		$data['page'] = 'borrower';
		$data['pcountry'] = 0;

		if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cm']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
			$dbdata = $this->manage->get_paypal_paymentby_tx($_GET['tx']);
			$db = json_encode($dbdata);
			if(sizeof($dbdata) > 0 ){
				$this->session->set_flashdata('msg_type', 'error');
				// redirect($this->uri->uri_string());
				redirect(current_url());
			}
			else{
				$burn = burnXDC($_GET['amt']);
				$status = explode(': ',$burn[10]);
				$status = $status[1];
				$status = str_replace(",","", $status);
				if($status == true){
					$_GET['burnStatus'] = $status;
					// $transactionHash = explode(': ',$burn[13]);
					$transactionHash = $burn[13];
					$transactionHash = str_replace(array("'",","),"", $transactionHash);
					$_GET['transactionHash'] = $transactionHash;
					$result = $this->manage->add_paypal_details($_GET);
					
				}
				else{
					$_GET['burnStatus'] = false;
					$_GET['transactionHash'] = '0x';
					$result = $this->manage->add_paypal_details($_GET);
				}
			
			}
			
		}

		$action = $this->input->post('action');
		$data['instrument'] = $this->input->post('instrument');
		$data['country'] = $this->input->post('pcountry');
		if($this->input->post('name') != " " ){
			$data['name'] = $this->input->post('name');
		}
		$data['currency_supported'] = $this->input->post('currency_supported');
		$data['amount'] = $this->input->post('amount');
		$data['maturity_date'] = $this->input->post('maturity_date');
		$data['docRef'] = $this->input->post('docRef');
		$data['contractAddr'] = $this->input->post('contractAddr');
		$data['deployerAddr'] = $this->input->post('deployerAddr');
		$data['secretKey'] = $this->input->post('secretKey');

		

		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$ccountries = $this->plisting->get_country();
		
		if($ccountries && !empty($ccountries) && is_array($ccountries) && sizeof($ccountries) <> 0){
			$data['pcountries'] = $ccountries;			
		}
		

		if($action == 'adddetail'){
			$result['contract'] = $this->manage->add_instrument($data);
			$addr = $this->input->post('addr');
			$doc = $this->input->post('doc');
			// log_message("info","<<1.".$addr,"3.".$doc);
			$result['txn'] = $this->manage->update_paypalpayment_by_txn($addr,$doc);
		}
		if($action == 'getpasskey'){
			$key = $this->manage->get_secretkey($contractAddr);
		}
	
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/head1', $data);
		$this->load->view('pages/borrower_view', $data);
		
		
	}
	
	public function getAddress(){
		
		$data = array();
		
		$action = $this->input->post('action');
		$privkey = $this->input->post('privkey');

		// log_message("info",">>>".$action.$privkey);
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;

		
		if($action == 'getaddress'){
			$data['privatekey'] = getAddress($privkey);
		}
		echo json_encode($data);
				
	}
	public function errorPage(){
		
		$data = array();
		if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
			// Get transaction information from URL 
			$data['item_number'] = $_GET['item_number'];  
			$data['txn_id'] = $_GET['tx']; 
			$data['payment_gross'] = $_GET['amt']; 
			$data['currency_code'] = $_GET['cc']; 
			$data['payment_status'] = $_GET['st']; 
			 
			var_dump(">>>>".$_GET);
			 
			
		} 
	
				
	}

	public function paypal(){
		
		$data = array();
		
		$addr = $this->input->post('addr');
		// log_message("info","<<4".$addr);
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$dbdata = $this->manage->get_paypal_payment($addr);
		// log_message("info","@@@".json_encode($dbdata));
		echo json_encode($dbdata);
				
	}

	public function getAccess(){
		
		$data = array();
		
		$action = $this->input->post('action');
		$docRef = $this->input->post('docRef');
		$privkey = $this->input->post('privkey');
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;

		function startsWith ($string, $startString) 
		{ 
			$len = strlen($startString); 
			return (substr($string, 0, $len) === $startString); 
		} 
  

		if(startsWith($privkey,"0x")){
			$privkey = $this->input->post('privkey');
		}
		else{
			$privkey = "0x".$this->input->post('privkey');
		}
		
		if($action == 'getaccess'){
			$data['privatekey'] = getFinancier($privkey);
			$key = $this->manage->get_secretkey_by_docRef($docRef);
			foreach($key as $k){
				$data['key'] = $k->tfi_secretKey;
				$data['contractAddr'] = $k->tfi_contractAddr;
			}
		}
		$data['docRef'] = $docRef;
			
		if($action == 'getdetails'){
			log_message("info","checking".$action);
			$data['privatekey'] = getFinancier($privkey);
			$data['address'] = getAddress($privkey);
			if($data['privatekey'] == "true"){
				$data['contact'] = $this->manage->get_contact_details($docRef);
			}
			
		}
		if($action == 'sendmail'){
			$data['address'] = getAddress($privkey);
			
			$config = array();
			$config = $this->config->item('$econfig');
						
			$this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$suser = $this->manage->get_superadmin();
			
			$from_email = 'info@tradefinex.org'; 
			$to_email ="mansi@xinfin.org";
					
			$this->email->from($from_email, 'Admin Tradefinex'); 
			$this->email->to($to_email);
			$this->email->bcc($from_email);
			$this->email->set_mailtype('html');
			$this->email->set_newline("\r\n");
			$this->email->subject('Access for Buyer/Supplier Details'); 
			$mail_body = $this->load->view('templates/mails/req_doc_mail_body', $data, TRUE);
			$this->email->message($mail_body);
		
            		
			// Send mail ** Our customer support team will respond to your query as soon as possible. Please find below the details of the query submitted.
			if($this->email->send()){ 
				log_message("info","Email Sent successfully");
			}	
			else{ 
				log_message("error","Error in sending email");
			}
			
			

			
			
		}
		echo json_encode($data);
				
	}

	public function getPasskey(){
		
		$data = array();

		
		if ($this->input->is_ajax_request()){
			$pass = $this->input->post('pass');
			$contractAddr = $this->input->post('contractAddr');
		}

		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		if($pass == 'getpasskey'){
			$key = $this->manage->get_secretkey($contractAddr);
			// log_message("info",json_encode($key));
		}
		foreach($key as $k){
			$data['key'] = $k->tfi_secretKey;
		}
		echo json_encode($data);
	}

	public function financiers(){
		
		$data = array();
		
		$data['page'] = 'financier';

		$action = $this->input->post('action');
		$docRef = $this->input->post('docRef');

		
			
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$date = date('Y-m-d');
		$instrument = $this->manage->get_instrument($date);
		$buyersupplier = $this->manage->get_buyersupplier($date);
		
		if($instrument && !empty($instrument) && is_array($instrument) && sizeof($instrument) <> 0){
			$data['instrument'] = $instrument;						
		}
		if($buyersupplier && !empty($buyersupplier) && is_array($buyersupplier) && sizeof($buyersupplier) <> 0){
			$data['buyersupplier'] = $buyersupplier;					
		}
				
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/head1', $data);
		$this->load->view('pages/financiers_view', $data);
		$this->load->view('includes/footer', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
}
?>
