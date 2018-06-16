<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
		$this->load->library(array('session', 'email', 'encrypt'));
		$this->load->helper('date');
		$this->output->cache(5);
		$this->load->model('manage');
		$data = array();
		$data_add = array();
	}
		
	public function index()
	{
		$data = array();
		$result = array();
		$encryption_key = $this->config->item('encryption_key');
			
		$action = $this->input->post('action');
		$data['usern'] = $this->input->post('email');
		$data['upasswd'] = openssl_encrypt($this->input->post('password'),"AES-128-ECB",$encryption_key);
		$data['ufname'] = $this->input->post('first_name');
		$data['ulname'] = $this->input->post('last_name');
		$data['uemail'] = $this->input->post('email');
		$user_type = $this->input->post('user_type');
		$random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
		$data['hash'] = $random_hash;
		
		if($action == 'signup'){
			$result = $this->manage->add_user($data, $user_type);
		}
		
		$data['page'] = 'signup';
		$data['user_id'] = 0;
		$data['full_name'] = '';
		
		if(!empty($result) && is_array($result) && sizeof($result) <> 0){
			
			$data['msg'] = 'success';
			
			$created = $result[0]->tfu_created;
			$time_now = strtotime(date('Y-m-d H:i:s'));
			// $expired = strtotime('+3 hours', strtotime($result[0]->tfu_created));
			$expired = strtotime('+3 hours', strtotime(date('Y-m-d H:i:s')));
			
			// $config['protocol'] = 'sendmail';
			// $config['mailpath'] = '/usr/sbin/sendmail';
			// $config['charset'] = 'iso-8859-1';
			// $config['wordwrap'] = TRUE;

			$config['protocol'] = 'smtp';
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;

			// $this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$from_email = "admin@tradefinex.com"; 
			$to_email = $this->input->post('email'); 
			
			
			$request_string = 'email='.$to_email.'&hash='.$random_hash.'&expired='.$expired;
			$encode_request_string = $this->encrypt->encode($request_string, $encryption_key);
						
			$this->email->from($from_email, 'Admin Tradefinex'); 
			$this->email->to($to_email);
			$this->email->set_mailtype('html');
			$this->email->subject('Account Activation by Tradefinex'); 
			$this->email->message('Thank You for Joining with Us. <b>Verification link will expire within 3 hours.</b><br/><br/><a href ="'.base_url().'verify/account/?'.$encode_request_string.'">Please click here to activate your Account.</a>'); 
			
			// Send mail 
			if($this->email->send()){ 
				$this->session->set_flashdata("email_sent", "<font color='green'>Thank you for joining us. A verification mail has been sent to your Email
Id. Kindly check to activate your account.</font>"); 
			}	
			else{ 
				$this->session->set_flashdata("email_sent", "<font color='red'>Error in sending Email. Contact customer support to activate your account.</font>"); 
			}
			
			$this->load->view('includes/header', $data);
			$this->load->view('includes/header_public', $data);
			$this->load->view('pages/thankyou_signup', $data);
			$this->load->view('includes/footer_common', $data);
			$this->load->view('pages_scripts/thankyou_scripts', $data); 
			
		}else{
			$this->session->set_flashdata("error_signup", "<font color='red' class='alert-error' style='margin-left:20px'>Username already exist ! Try again.</font>");
			redirect(base_url());
		}
	}
}
	