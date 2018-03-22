<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apisearch extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'crediwatch', 'notification'));
		$this->load->library(array('session', 'encrypt'));
		$this->load->model(array('manage', 'plisting'));
		
		$data = array();
		$data_add = array();
	}
	
	public function get_basic_search_result(){
		
		$data = array();
		$data_add = array();
		
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
		$data['notification_count'] = 0;
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			
			
		}
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$subscriber_id = "4xOWvxwxE5l4Fxf3";
		$subscriber_token = "F45rpfpaHxeln0Dsg8NnNmioIC8fq";
		$search_type = "basic-search";
		$search_string = "INFOS";
		
		$options = array('subscriber_id' => $subscriber_id, 'subscriber_token' => $subscriber_token, 'm' => $search_type, 's' => $search_string);
			
		$crediwatch_search_result = get_crediwatch_basic_search_result($options);
		
		if($data['user_id'] <> 0){
								
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
						
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tfsp_public_visibility;
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
					$data['uvisibility'] = $uresult[0]->tff_public_visibility;
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}
		}
		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/public/api_search_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/search_scripts', $data); 
		$this->load->view('includes/footern', $data);
		
	}
	
	public function get_initial_search_results(){
		
		$data = array();
		$data_add = array();
		
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
		$data['notification_count'] = 0;
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			
			
		}
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$term = $this->input->post('name_startsWith');
				
		$subscriber_id = "4xOWvxwxE5l4Fxf3";
		$subscriber_token = "F45rpfpaHxeln0Dsg8NnNmioIC8fq";
		$search_type = "autocomplete";
		$search_string = strtoupper($term); // "INFOS";
		
		$options = array('subscriber_id' => $subscriber_id, 'subscriber_token' => $subscriber_token, 'm' => $search_type, 's' => $search_string);
			
		$crediwatch_isearch_result = get_crediwatch_initial_search_result($options);
		
		$cdata = array();
		
		if($crediwatch_isearch_result && !empty($crediwatch_isearch_result) && is_array($crediwatch_isearch_result) && sizeof($crediwatch_isearch_result) <> 0){
						
			for($i = 0; $i < sizeof($crediwatch_isearch_result); $i++){
				
				$name = $crediwatch_isearch_result[$i].'|'.$crediwatch_isearch_result[$i];
				array_push($cdata, $name);
			
			}
		}	
		
		echo json_encode($cdata);
	
	}
	
	public function get_isearch_results(){
	
		$subscriber_id = "4xOWvxwxE5l4Fxf3";
		$subscriber_token = "F45rpfpaHxeln0Dsg8NnNmioIC8fq";
		$search_type = "basic-search-exact";
		$search_string = "INFO SERVICES PRIVATE LIMITED"; // "INFOS";
		
		$options = array('subscriber_id' => $subscriber_id, 'subscriber_token' => $subscriber_token, 'm' => $search_type, 's' => $search_string);
			
		$crediwatch_isearch_result = get_crediwatch_initial_search_result($options);
		
		echo '<pre>';
		print_r($crediwatch_isearch_result);
		
		$cdata = array();
		
		if($crediwatch_isearch_result && !empty($crediwatch_isearch_result) && is_array($crediwatch_isearch_result) && sizeof($crediwatch_isearch_result) <> 0){
						
			for($i = 0; $i < sizeof($crediwatch_isearch_result); $i++){
				
				$name = $crediwatch_isearch_result[$i].'|'.$crediwatch_isearch_result[$i];
				array_push($cdata, $name);
			
			}
		}	
		
		echo json_encode($cdata);
	
	}
	
	public function get_basic_search_results(){
		
		$data = array();
		$data_add = array();
		
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
		$data['notification_count'] = 0;
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			
			
		}
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$term = $this->input->post('name_startsWith');
				
		$subscriber_id = "4xOWvxwxE5l4Fxf3";
		$subscriber_token = "F45rpfpaHxeln0Dsg8NnNmioIC8fq";
		// $search_type = "basic-search";
		$search_type = "basic-search-exact";
		$search_string = strtoupper($term); // "INFOS";
		
		$options = array('subscriber_id' => $subscriber_id, 'subscriber_token' => $subscriber_token, 'm' => $search_type, 's' => $search_string);
			
		$crediwatch_search_result = get_crediwatch_basic_search_result($options);
		
		$cdata = array();
		$sdata = array();
		
		$sdata['crediwatch_search_result'] = $crediwatch_search_result;
		
		if($crediwatch_search_result && !empty($crediwatch_search_result) && is_array($crediwatch_search_result) && sizeof($crediwatch_search_result) <> 0){
			foreach($crediwatch_search_result as $csrow){
				
				$name = $csrow['name'].'|'.$csrow['id'].'|'.$csrow['status'].'|'.$csrow['date_of_incorporation'];
				array_push($cdata, $name);
			}
		}	
		
		// echo json_encode($cdata);
		$this->load->view('pages/datas/crediwatch_search_result_list_view', $sdata);
	}
	
	public function get_product_search_result(){
		
		$psearch_id = $this->input->post('psearch_id');
		
		$subscriber_id = "4xOWvxwxE5l4Fxf3";
		$subscriber_token = "F45rpfpaHxeln0Dsg8NnNmioIC8fq";
		$search_type = "snapshot";
		$search_product_id = $psearch_id;
		$data = array();
		
		$options = array('subscriber_id' => $subscriber_id, 'subscriber_token' => $subscriber_token, 'm' => $search_type, 'e' => $search_product_id);
			
		$crediwatch_search_result = get_crediwatch_product_search_result($options);
		
		$data['crediwatch_search_result'] = $crediwatch_search_result;
		
		$this->load->view('pages/datas/crediwatch_search_result_detail_view', $data);
		
	}
}
