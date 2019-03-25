<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smartcontract extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'xdcapi', 'rating'));
		$this->load->library(array('session', 'curl'));
		$this->load->model(array('manage', 'plisting'));
		$this->is_logged_in();
		$this->output->delete_cache();

		$data = array();
	}
	
	public function is_logged_in()
	{
		$user = $this->session->userdata('logged_in');
	
		if(!empty($user) && is_array($user) && $user['user_id'] && ($user['user_type'] == 'Service-Provider' || $user['user_type'] == 'Financier' || $user['user_type'] == 'Beneficiary')){
			if($user['user_id'] <> 0){
				
			}else{
				redirect(base_url().'log/out');
			}
		}else{
			redirect(base_url().'log/out');
		}
	} 
	
	public function pay_beneficiary(){
	
		$data = array();
		$result = array();
		
		$data['page'] = 'Pay Beneficiary';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data['uxdcwallet'] = '';
		$data['uxdcbal'] = 0;
				
		$data['xdcval'] = get_xdc_token_rate();
		
		$data['check_company']  = '';
		$data['f_notification'] = 0;
		$data['p_notification'] = 0;
		$data['b_notification'] = 0;
		$data['pp_notification'] = 0;
		$data['ppex_notification'] = 0;
								
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			// redirect(base_url().'log/out');
		}
		
		$action = $this->input->post('action');
		$request_action = $this->input->post('raction');
		$proj_id = $this->input->post('proj_id');
		
		$user_type_request = $this->input->post('user_type_request');
		$user_id_request = $this->input->post('user_id_request');
		$request_db_type = $this->input->post('request_db_type');
		$request_user_id = $this->input->post('ruser_id');
		$request_user_type = $this->input->post('ruser_type');
		$request_project_id = $this->input->post('rproject_ref');
		$request_type = $this->input->post('request_type');
		
		if(trim($user_type_request) == ''){
			$user_type_request = 0;
		}
		
		$data_json = array();
		
		if(trim($user_id_request) == ''){
			$user_id_request = 0;
		}
		
		$data_json['fpayment_status'] = 0;
				
		if($request_action == 'pay_beneficiary' && $request_project_id <> 0 && $data['user_id'] <> 0 && $data['user_type_ref'] <> 0 && $request_user_type == 3 && $request_user_id <> 0){
										
			$rproject = $this->plisting->get_project_info_by_id($request_project_id);
			
			if($data['user_type_ref'] == 2){
			
				$presult = $this->plisting->get_proposal_by_ref($request_project_id, $data['user_id'], 'f');
					
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
					$data_json['fpayment_status'] = $presult[0]->tpf_fpayment_status;
					$data_json['finance_amount'] = $presult[0]->tpf_price;
					$data_json['finance_rate'] = $presult[0]->tpf_tax_percent * 100;
					$data_json['finance_tenure'] = $presult[0]->tpf_finance_tenure_value;
				}
			}
							
			$financing_amount = $data_json['finance_amount'];
			$ftokens = $financing_amount / $data['xdcval'];
					
			$xinfin_user = $this->session->userdata('xinfin_after_logged_in');
			$xpublic = $xinfin_user['public'];
			$xemail = $xinfin_user['email'];
			
			$rproject = $this->plisting->get_project_info_by_id($request_project_id);
								
			$projectID = 'TF-'.strtotime($rproject[0]->postDate);
						
			$options = array('_projectId' => $projectID, '_financerAddress' => $xpublic, '_financerEmail' => $xemail, '_tokenInvestment' => $ftokens, '_interestRate' => $data_json['finance_rate'], '_tenure' => $data_json['finance_tenure']);
			
			$rculrfp = get_status_after_financier_payment_to_beneficiary($options);
						
			if($rculrfp){
				$rculrfpa = json_decode(stripslashes($rculrfp));
							
				$status = $rculrfpa->status; // SUCCESS OR FAILED
				$txID = ((isset($rculrfpa->txId)) ? $rculrfpa->txId : (isset($rculrfpa->message) ? $rculrfpa->message : ''));
					
				if(strtolower($status) == 'success'){
					
					$data_add = array();
					$data_add['tpf_fpayment_status'] = 1; 
					$data_add['tpf_fpayment_time'] = date('Y-m-d H:i:s'); 
					$data_add['txn_id'] = $txID;
					$data_add['txn_status'] = $status;
					$data_json['txn_id'] = $txID;
					$data_json['status'] = $status;
											
					$this->plisting->update_financer_proposal_by_project_and_user($request_project_id, $data['user_id'], 2, $data_add);
					
					$in_proposals = $this->plisting->get_all_sc_financier_initiate_proposals_by_project($request_project_id);
					
					$complete_fpayment = 0;
					
					if(!empty($in_proposals) && sizeof($in_proposals) <> 0){
											
						foreach($in_proposals as $inrow){
							if($inrow->tpf_fpayment_status == 0){
								$complete_fpayment = 1;
							}
						}
					}
					
					if($complete_fpayment == 0){
						$data_add = array();
					
						$data_add['financier_completion_request'] = 1;
						$this->plisting->update_project_by_id($request_project_id, $data_add);
					}
				}
				
				if(strtolower($status) == 'failed'){
					
					$data_add = array();
					$data_add['txn_id'] = $txID;
					$data_add['txn_status'] = $status;
					$data_json['txn_id'] = $txID;
					$data_json['status'] = $status;
											
					$this->plisting->update_financer_proposal_by_project_and_user($request_project_id, $data['user_id'], 2, $data_add);
				}	
			}
		}
		
		echo json_encode($data_json);
	}
	
	public function pay_financier(){
	
		$data = array();
		$result = array();
		
		$data['page'] = 'Pay Financier';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data['uxdcwallet'] = '';
		$data['uxdcbal'] = 0;
				
		$data['xdcval'] = get_xdc_token_rate();
		
		$data['check_company']  = '';
		$data['f_notification'] = 0;
		$data['p_notification'] = 0;
		$data['b_notification'] = 0;
		$data['pp_notification'] = 0;
		$data['ppex_notification'] = 0;
								
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			// redirect(base_url().'log/out');
		}
		
		$action = $this->input->post('action');
		$request_action = $this->input->post('raction');
		$proj_id = $this->input->post('proj_id');
		
		$user_type_request = $this->input->post('user_type_request');
		$user_id_request = $this->input->post('user_id_request');
		$request_db_type = $this->input->post('request_db_type');
		$request_user_id = $this->input->post('ruser_id');
		$request_user_type = $this->input->post('ruser_type');
		$request_project_id = $this->input->post('rproject_ref');
		$request_type = $this->input->post('request_type');
		$pay_cycle_no = $this->input->post('pay_cycle');
		
		$data_json = array();
		
		$data_json['fpayment_status'] = 0;
				
		if($request_action == 'pay_financier' && $request_project_id <> 0 && $data['user_id'] <> 0 && $data['user_type_ref'] <> 0 && $request_user_type == 2){
										
			$rproject = $this->plisting->get_project_info_by_id($request_project_id);
			
			if($data['user_type_ref'] == 3){
				
				$data["beneficiary_financier_payment"] = $this->plisting->fetch_beneficiary_payment_financiers_info($request_project_id, 2);
				
				if(!empty($data["beneficiary_financier_payment"]) && is_array($data["beneficiary_financier_payment"]) && sizeof($data["beneficiary_financier_payment"]) <> 0){
				
					$xinfin_user = $this->session->userdata('xinfin_after_logged_in');
					$xpublic = $xinfin_user['public'];
					$xemail = $xinfin_user['email'];
										
					foreach($data["beneficiary_financier_payment"] as $bprow){
											
						$fproposal = $this->plisting->get_proposal_by_id($bprow->tpf_id, 'f');
						$user_profile = $this->manage->get_user_info_by_id($bprow->tpf_user_ref);
						
						$rproject = $this->plisting->get_project_info_by_id($request_project_id);
								
						$projectID = 'TF-'.strtotime($rproject[0]->postDate);
						
						$payment_cycle = $bprow->tpf_payment_cycles;
																		
						$tfpcstatusa = json_decode($bprow->tpf_bpayment_status);
						
						$pay_status = 0;
						$p_mstatus = '';
						
						for($c = 1; $c <= $payment_cycle; $c++){
							
							if($c == $pay_cycle_no){
								
								$pay_status = $tfpcstatusa->$c->pay_status;
								$p_mstatus = $tfpcstatusa->$c->status;
								
							}
						}
						
						$options = array('_projectId' => $projectID, '_financerAddress' => $user_profile[0]->tfu_xdc_walletID, '_beneficiaryAddress' => $xpublic, '_beneficiaryEmail' => $xemail);
						
						$rculrfp = '';
						
						if($pay_status == 0 && (trim($p_mstatus) == '' || strtolower($p_mstatus) == 'failed')){					
							$rculrfp = get_status_after_beneficiary_payment_to_financier($options);
						}
						
						if($rculrfp){
							
							$rculrfpa = json_decode(stripslashes($rculrfp));
							
							$data_json['status'] = 0;
									
							$status = $rculrfpa->status; // SUCCESS OR FAILED(isset($rculrfpa->message) ? $rculrfpa->message : '')
							$txID = ((isset($rculrfpa->message)) ? $rculrfpa->message : '');
								
							if(strtolower($status) == 'success' || strtolower($status) == 'failed'){
								
								$payment_cycle = $bprow->tpf_payment_cycles;
								$sdata = array();
																	
								$tfpcstatusa = json_decode($bprow->tpf_bpayment_status);
											
								for($c = 1; $c <= $payment_cycle; $c++){
									
									if($c == $pay_cycle_no){
										
										if(strtolower($status) == 'failed'){
											$sdata[$c]['pay_status'] = 0;
										}
										if(strtolower($status) == 'success'){
											$sdata[$c]['pay_status'] = 1;
										}
										$sdata[$c]['status'] = $status;
										$sdata[$c]['txn_id'] = $txID;
													
									}else{
										$sdata[$c]['pay_status'] = $tfpcstatusa->$c->pay_status;
										$sdata[$c]['status'] = $tfpcstatusa->$c->status;
										$sdata[$c]['txn_id'] = $tfpcstatusa->$c->txn_id;
									}
								}
								
								if(!empty($sdata)){
									$data_add = array();
									
									if($pay_cycle_no == 1 && $sdata[$pay_cycle_no]['pay_status'] == 1){
										$data_add['tpf_bpayment_initiate_time'] = date('Y-m-d H:i:s');	
									}
									
									if($sdata[$pay_cycle_no]['pay_status'] == 1){
										$data_add['tpf_last_benif_payment_cycle'] = $pay_cycle_no;	
										$data_add['tpf_last_benif_payment_date'] = date('Y-m-d H:i:s');	
									}
									
									$data_add['tpf_bpayment_status'] = json_encode($sdata); 
									$update_info = $this->plisting->update_proposal_by_id($bprow->tpf_id, $data_add, 'f');
								}
								
								if(!empty($update_info) && is_array($update_info) && sizeof($update_info) <> 0){
								
									$data_json['status'] = 1;
								}
							}
						}	
					}
				}
			}
		}
		
		echo json_encode($data_json); 
	}
	
	public function pay_supplier(){
	
		$data = array();
		$result = array();
		
		$data['page'] = 'Smart Contract';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			// redirect(base_url().'log/out');
		}
		
		$action = $this->input->post('action');
		$request_action = $this->input->post('raction');
		$proj_id = $this->input->post('proj_id');
		
		$user_type_request = $this->input->post('user_type_request');
		$user_id_request = $this->input->post('user_id_request');
		$request_db_type = $this->input->post('request_db_type');
		$request_user_id = $this->input->post('ruser_id');
		$request_user_type = $this->input->post('ruser_type');
		$request_project_id = $this->input->post('rproject_ref');
		$trade_amtval = $this->input->post('trade_amtval');
		$request_type = $this->input->post('request_type');
				
		if(trim($user_type_request) == ''){
			$user_type_request = 0;
		}
		
		if(trim($user_id_request) == ''){
			$user_id_request = 0;
		}
		
		$xinfin_user = $this->session->userdata('xinfin_after_logged_in');
		$xpublic = $xinfin_user['public'];
		$xemail = $xinfin_user['email'];
		
		$rproject = $this->plisting->get_project_info_by_id($request_project_id);
		
		if($rproject && is_array($rproject) && !empty($rproject)){
			
			$projectID = 'TF-'.strtotime($rproject[0]->postDate);
			
			$user_profile = $this->manage->get_user_info_by_id($request_user_id);
		
			$options = array('_projectId' => $projectID, '_buyerEmail' => $xemail, '_buyerWalletAddress' => $xpublic, '_fiatAmount' => $trade_amtval, '_supplierWalletAddress' => $user_profile[0]->tfu_xdc_walletID, '_metaData' => '');
							
			$rculrsp = '';
							
			$rculrsp = get_status_after_initiate_supplier($options);
			
			$data_json['status'] = 0;
			$data_json['options'] = $options;
			
			if($rculrsp){
				
				$rculrspa = json_decode(stripslashes($rculrsp));
				$data_json['results'] = $rculrspa;	
				$data_json['postsv'] = $_POST;					
				$status = $rculrspa->status; // SUCCESS OR FAILED
				$txID = ((isset($rculrspa->transactionHash)) ? $rculrspa->transactionHash : ((isset($rculrspa->message)) ? $rculrspa->message : ''));
				
				$data_add = array();
				$data_add['tpp_bpayment_status'] = $status;
				$data_add['tpp_bpayment_txn_id'] = $txID;
				
				$this->plisting->update_proposal_by_project_and_user_ref($proj_id, $user_id_request, $data_add, 'p');
							
				if(strtolower($status) == 'success'){
							
					if($request_action == 'request_completion' && $data['user_id'] <> 0 && $data['user_type_ref'] <> 0){
				
						$this->plisting->request_complete_project($proj_id, $data['user_id'], $data['user_type_ref'], $user_id_request, $user_type_request, $request_db_type);
					}
					
					$data_json['status'] = 1;
				}
				
				if(strtolower($status) == 'failed'){
					
				}
			}
		}
						
		echo json_encode($data_json);
	}
	
	public function initiate()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'Smart Contract';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data['uxdcwallet'] = '';
		$data['uxdcbal'] = 0;
		
		$data['uofname'] = '';
		$data['uolname'] = '';
		$data['uoemail'] = '';
		$data['uocontact'] = '';
		$data['uoaddress'] = '';
		$data['uoname'] = '';
		$data['uopass'] = '';
		$data['uoprofpic'] = '';
		$data['uoxdcwallet'] = '';
		$data['uoxdcbal'] = 0;
		$data['usprofpic'] = '';
		
		$data['c1fname'] = '';
		$data['c1lname'] = '';
		$data['c1email'] = '';
		$data['c1contact'] = '';
		$data['c2fname'] = '';
		$data['c2lname'] = '';
		$data['c2email'] = '';
		$data['c2contact'] = '';
		$data['comname'] = '';
		$data['caddress'] = '';
		$data['ccity'] = '';
		$data['cbhn'] = '';
		$data['cpinc'] = '';
		$data['cstate'] = '';
		$data['cweb'] = '';
		$data['cregno'] = '';
		$data['clogo'] = '';
		$data['ccountry'] = 0;
		$data['ccountryn'] = '';
		$data['cdept'] = 0;
		$data['cdeptn'] = '';
		$data['crow'] = 0;
		
		$data['co1fname'] = '';
		$data['co1lname'] = '';
		$data['co1email'] = '';
		$data['co1contact'] = '';
		$data['co2fname'] = '';
		$data['co2lname'] = '';
		$data['co2email'] = '';
		$data['co2contact'] = '';
		$data['coomname'] = '';
		$data['coaddress'] = '';
		$data['cocity'] = '';
		$data['cobhn'] = '';
		$data['copinc'] = '';
		$data['costate'] = '';
		$data['coweb'] = '';
		$data['coregno'] = '';
		$data['cologo'] = '';
		$data['cocountry'] = 0;
		$data['cocountryn'] = '';
		$data['codept'] = 0;
		$data['codeptn'] = '';
		$data['corow'] = 0;
		$data['uotype'] = '';
		$data['xdcval'] = get_xdc_token_rate();
		
		$data['prrow'] = 0;
		$data['ppriceval'] = 0;
		$data['pcurr'] = 0;
		$data['ppricetax'] = 0;
		$data['ppricetot'] = 0;
		$data['pvalid'] = 0;
		$data['pvalidu'] = 0;
		$data['premarks'] = '';
		$data['pdeliveryt'] = '';
		$data['psleadtime'] = 0;
		$data['psleadtimeu'] = 0;
		$data['pcommission'] = 0;
		$data['pcommissionu'] = 0;
		$data['pattachf'] = '';
		
		$data['check_company']  = '';
		$data['f_notification'] = 0;
		$data['p_notification'] = 0;
		$data['b_notification'] = 0;
		$data['pp_notification'] = 0;
		$data['ppex_notification'] = 0;
								
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			// redirect(base_url().'log/out');
		}
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$action = $this->input->post('action');
		$request_action = $this->input->post('raction');
		$proj_id = $this->input->post('proj_id');
		
		$user_type_request = $this->input->post('user_type_request');
		$user_id_request = $this->input->post('user_id_request');
		$request_db_type = $this->input->post('request_db_type');
		$request_user_id = $this->input->post('ruser_id');
		$request_user_type = $this->input->post('ruser_type');
		$request_project_id = $this->input->post('rproject_ref');
		$request_type = $this->input->post('request_type');
		
		$presult = array();
						
		if(trim($user_type_request) == ''){
			$user_type_request = 0;
		}
		
		if(trim($user_id_request) == ''){
			$user_id_request = 0;
		}
				
		if($request_action == 'request_completion' && $data['user_id'] <> 0 && $data['user_type_ref'] <> 0){
			
			$rproject = $this->plisting->get_project_info_by_id($request_project_id);
		
			if($rproject && is_array($rproject) && !empty($rproject)){
				
				$projectID = 'TF-'.strtotime($rproject[0]->postDate);
								
				$options = array('_projectId' => $projectID);
				
				if($data['user_type_ref'] == 3 && $request_db_type == 'accept'){
					get_status_after_completed_supplier($options);
				}
				
				if($data['user_type_ref'] == 3 && $request_db_type == 'reject'){
					get_status_after_terminate_supplier($options);
				}
			}	
						
			$this->plisting->request_complete_project($proj_id, $data['user_id'], $data['user_type_ref'], $user_id_request, $user_type_request, $request_db_type);
		}
		
		if($request_action == 'initiate_finance' && $request_project_id <> 0 && $data['user_id'] <> 0 && $data['user_type_ref'] <> 0 && $request_user_type == 2){
			
			$rfusers = $this->input->post('rfusers');
			$rproject = $this->plisting->get_project_info_by_id($request_project_id);
			
			if($rproject[0]->awarded_financier == 0){	
			
				if(trim($rfusers) <> 0 || trim($rfusers) <> ''){
					
					$rfusersa = explode(',', trim($rfusers));
					$data_add = array();
					
					for($i = 0; $i < sizeof($rfusersa); $i++){
						
						$fproposal = $this->plisting->get_proposal_by_ref($request_project_id, $rfusersa[$i], 2);
						
						$payment_cycle = 0;
						
						if(!empty($fproposal) && sizeof($fproposal) <> 0){
							$payment_cycle = $fproposal[0]->tpf_finance_tenure_value;
						}
										
						$data_add['tpf_awardStatus'] = 1;
						$data_add['tpf_payment_cycles'] = $payment_cycle;
						$data_add['test_mode'] = 1;
						
						if($payment_cycle > 0){
							
							$sdata = array();
							$fcsdata = array();
							
							for($j = 1; $j <= $payment_cycle; $j++){
								$sdata[$j]['pay_status'] = 0;
								$sdata[$j]['status'] = '';
								$sdata[$j]['txn_id'] = '';
								$fcsdata[$j] = 0;						
							}
							
							if(!empty($sdata)){
								$data_add['tpf_bpayment_status'] = json_encode($sdata); 
								$data_add['tpf_fpayment_confirm_status'] = json_encode($fcsdata);
								$data_add['tpf_fstartingDate'] = date('Y-m-d H:i:s');
								$data_add['tpf_beneficiary_accept_project_completion_request'] = 1;
							}
						}
											
						$this->plisting->update_financer_proposal_by_project_and_user($request_project_id, $rfusersa[$i], 2, $data_add);
					}
					
					$data_add = array();
					
					$data_add['awarded_financier'] = 1;
					$data_add['fstartingDate'] = date('Y-m-d H:i:s');
					$this->plisting->update_project_by_id($request_project_id, $data_add);
													
					$financing_amount = $rproject[0]->financing_amount;
					$ftokens = $financing_amount / $data['xdcval'];
					$tfb_xwallet_id = $rproject[0]->tfu_xdc_walletID;
									
					$projectID = 'TF-'.strtotime($rproject[0]->postDate);
					
					$options = array('_projectId' => $projectID, '_tokenTarget' => $ftokens, '_projectOwner' => $tfb_xwallet_id, '_metaData' => '');
					
					$rcurladdp = get_add_project_block_chain_status($options);
					
					if($rcurladdp){
						$rcurladdpa = json_decode(stripslashes($rcurladdp));
						
						if(strtolower($rcurladdpa->status) == 'success'){
							$txId = $rcurladdpa->txId;
						}
						
						$data_add = array();
						$data_add['finance_xdc_msg'] = $rcurladdpa->status;
						$data_add['finance_xdc_txnid'] = $rcurladdpa->txId;
						
						$this->plisting->update_project_by_id($request_project_id, $data_add);
					}
				}
				
				$data_add = array();
				$data_add['tpf_awardStatus'] = 2;
				$data_add['tpf_beneficiary_accept_project_completion_request'] = 2;
				$this->plisting->update_financer_proposal_by_project_and_user($request_project_id, 0, 2, $data_add);
			}	
		}
				
		if($request_action == 'request_message_financier' && $request_project_id > 0 && $data['user_id'] <> 0 && $request_user_id > 0 && $request_user_type == 2){
			
			$data_add = array();
			
			$rmsg_detail = $this->input->post('rmsg_detail');
			
			$data_add['tpf_beneficiary_edit_mode '] = 1;
			$data_add['tpf_beneficiary_request_message'] = $rmsg_detail;
			
			$this->plisting->update_proposal_by_project_and_user_ref($request_project_id, $request_user_id, $data_add, 'f');
		}
		
		if($request_type == 'required_subcontractor' && $proj_id > 0 && $user_id_request > 0 && $user_type_request == 3){
			
			$data_add = array();
			
			$proposal_info = $this->plisting->get_proposal_by_ref($proj_id, $data['user_id'], 'p');
			
			$contractor_email = $this->input->post('contractor_email');
			$contract_amount = $this->input->post('contract_amount');
			$cdeliv_date = date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('cdeliv_date'))));
			
			$user_profile = $this->manage->get_user_info_by_username($contractor_email);
			
			$rproject = $this->plisting->get_project_info_by_id($request_project_id);
		
			if($rproject && is_array($rproject) && !empty($rproject)){
				
				$projectID = 'TF-'.strtotime($rproject[0]->postDate);
				
				$options = array('_projectId' => $projectID, '_participantAddress' => $user_profile[0]->tfu_xdc_walletID);
				
				get_status_after_initiate_sub_supplier($options);
			}	
			
			$data_add['tfss_user_ref'] = $user_profile[0]->tfu_id;
			$data_add['tfss_contract_issued_by_user_ref'] = $data['user_id'];
			$data_add['tfss_contract_issued_by_user_type_ref'] = $data['user_type_ref'];
			$data_add['tfss_contract_amount'] = $contract_amount;
			$data_add['tfss_proposal_ref'] = $proposal_info[0]->tpp_id;
			$data_add['tfss_contract_deadline'] = $cdeliv_date;
			
			$this->manage->add_sub_contractor_info($data_add);
					
			$data_add = array();
			
			$data_add['tpp_contract_mode'] = 1;
			$data_add['tpp_contract_amount'] = $contract_amount;
			
			$this->plisting->update_proposal_by_project_and_user_ref($proj_id, $data['user_id'], $data_add, 'p');
		}
		
		if($request_type == 'confirm_shipment' && $proj_id > 0 && $user_id_request > 0 && $user_type_request == 3){
			
			$data_add = array();
			
			$ship_no = $this->input->post('ship_no');
			$ship_detail = $this->input->post('ship_detail');
			$ship_date = date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('ship_date'))));
			
			$data_add['tpp_shipment_number'] = $ship_no;
			$data_add['tpp_shipment_details'] = $ship_detail;
			$data_add['tpp_shipment_date'] = $ship_date;
			
			$subcinfo = $this->plisting->get_sc_provider_subcontractor_proposal_by_project($request_project_id);
					
			if(!empty($subcinfo) && sizeof($subcinfo) <> 0){
							
				$this->plisting->update_proposal_by_project_and_user_ref($proj_id, $subcinfo[0]->tpp_user_ref, $data_add, 'p');
			
			}else{
				
				$this->plisting->update_proposal_by_project_and_user_ref($proj_id, $data['user_id'], $data_add, 'p');
			}
		}
		
		$ccategories = $this->plisting->get_categories();
		
		if($ccategories && !empty($ccategories) && is_array($ccategories) && sizeof($ccategories) <> 0){
			$data['pcategories'] = $ccategories;			
		}
		
		$ccountry = $this->plisting->get_country();
		
		if($ccountry && !empty($ccountry) && is_array($ccountry) && sizeof($ccountry) <> 0){
			$data['pcountry'] = $ccountry;			
		}
		
		$encryption_key = $this->config->item('encryption_key');
				
		if($data['user_id'] <> 0){ 
				
			$nresult = $this->manage->get_notification_setting($data['user_id'], $data['user_type_ref']);
			
			if(!empty($nresult) && is_array($nresult) && sizeof($nresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['b_notification'] = $nresult[0]->tfsp_benif_notification;
					$data['pp_notification'] = $nresult[0]->tfsp_posted_project_visibility;
				}

				if($data['user_type_ref'] == 2){
					$data['b_notification'] = $nresult[0]->tff_benif_notification;
					$data['pp_notification'] = $nresult[0]->tff_posted_project_visibility;
				}
				
				if($data['user_type_ref'] == 3){
				
					$data['f_notification'] = $nresult[0]->tfb_financier_notification;
					$data['p_notification'] = $nresult[0]->tfb_provider_notification;
					$data['pp_notification'] = $nresult[0]->tfb_project_post_visibility;
					$data['ppex_notification'] = $nresult[0]->tfb_project_expiration_visibility;
				}
			}
			
			$data['check_company']  = $this->manage->get_company_info_by_uid($data['user_id']);
			
			$ucresult = $this->manage->get_company_info_by_uid($data['user_id']);
			
			if(!empty($ucresult) && is_array($ucresult) && sizeof($ucresult) <> 0){
				
				$data['c1fname'] = $ucresult[0]->tfcom_contact1_fname;
				$data['c1lname'] = $ucresult[0]->tfcom_contact1_lname;
				$data['c1email'] = $ucresult[0]->tfcom_contact1_email;
				$data['c1contact'] = $ucresult[0]->tfcom_contact1_number;
				$data['c2fname'] = $ucresult[0]->tfcom_contact2_fname;
				$data['c2lname'] = $ucresult[0]->tfcom_contact2_lname;
				$data['c2email'] = $ucresult[0]->tfcom_contact2_email;
				$data['c2contact'] = $ucresult[0]->tfcom_contact2_number;
				$data['comname'] = $ucresult[0]->tfcom_name;
				
				$adda = explode('*', $ucresult[0]->tfcom_address);
				
				if(sizeof($adda) > 2){
					$data['cbhn'] = $adda[0];
					$data['caddress'] = $adda[1];
					$data['ccity'] = $adda[2];
					$data['cpinc'] = $adda[3];
					$data['cstate'] = $adda[4];
				}
				
				$data['cweb'] = $ucresult[0]->tfcom_web_url;
				$data['clogo'] = $ucresult[0]->tfcom_logo_file;
				$data['cregno'] = $ucresult[0]->tfcom_regno;
				$data['ccountry'] = $ucresult[0]->tfcom_country_ref;
				$data['cdept'] = $ucresult[0]->tfcom_cat_ref;
				$data['crow'] = $ucresult[0]->tfcom_id;
			}
			
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
								
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['utype'] = 'Supplier';
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uxdcwallet'] = $uresult[0]->tfu_xdc_walletID;
					$data['uxdcbal'] = $uresult[0]->tfu_xdc_balance;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = openssl_decrypt($uresult[0]->tfu_passwd,"AES-128-ECB",$encryption_key);
					$data['ccountryn'] = $uresult[0]->tfc_name;
					$data['cdeptn'] = $uresult[0]->cName;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($uresult[0]->tfsp_user_ref, 1);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$data['purating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$data['purating'] = 0;
					}
					
					$subcinfo = $this->plisting->get_sc_provider_subcontractor_proposal_by_project($request_project_id);
					
					if(!empty($subcinfo) && sizeof($subcinfo) <> 0){
					
						$usuppresult = $this->manage->get_user_info_by_id_and_type($subcinfo[0]->tfss_user_ref, 1);
						
						$data['usfname'] = $usuppresult[0]->tfsp_fname;
						$data['uslname'] = $usuppresult[0]->tfsp_lname;
						$data['ustype'] = 'Sub-Contractor';
						$data['usemail'] = $usuppresult[0]->tfsp_email;
						$data['uscontact'] = $usuppresult[0]->tfsp_contact;
						$data['usaddress'] = $usuppresult[0]->tfsp_address;
						$data['usprofpic'] = $usuppresult[0]->tfsp_pic_file;
						$data['usxdcwallet'] = $usuppresult[0]->tfu_xdc_walletID;
						$data['usxdcbal'] = $usuppresult[0]->tfu_xdc_balance;
						$data['usname'] = $usuppresult[0]->tfu_usern;
						$data['uspass'] = openssl_decrypt($usuppresult[0]->tfu_passwd,"AES-128-ECB",$encryption_key);
						$data['cscountryn'] = $usuppresult[0]->tfc_name;
						$data['csdeptn'] = $usuppresult[0]->cName;
						$ratinga = $this->plisting->get_user_rating_by_uid_type($usuppresult[0]->tfsp_user_ref, 1);
							
						if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
							$data['pusrating'] = $ratinga[0]->tfur_rating_value;
						}else{	
							$data['pusrating'] = 0;
						}
						
						$ucresult = $this->manage->get_company_info_by_uid($subcinfo[0]->tfss_user_ref);
			
						if(!empty($ucresult) && is_array($ucresult) && sizeof($ucresult) <> 0){
							
							$data['c1sfname'] = $ucresult[0]->tfcom_contact1_fname;
							$data['c1slname'] = $ucresult[0]->tfcom_contact1_lname;
							$data['c1semail'] = $ucresult[0]->tfcom_contact1_email;
							$data['c1scontact'] = $ucresult[0]->tfcom_contact1_number;
							$data['c2sfname'] = $ucresult[0]->tfcom_contact2_fname;
							$data['c2slname'] = $ucresult[0]->tfcom_contact2_lname;
							$data['c2semail'] = $ucresult[0]->tfcom_contact2_email;
							$data['c2scontact'] = $ucresult[0]->tfcom_contact2_number;
							$data['csomname'] = $ucresult[0]->tfcom_name;
							
							$adda = explode('*', $ucresult[0]->tfcom_address);
							
							if(sizeof($adda) > 2){
								$data['csbhn'] = $adda[0];
								$data['csaddress'] = $adda[1];
								$data['cscity'] = $adda[2];
								$data['cspinc'] = $adda[3];
								$data['csstate'] = $adda[4];
							}
							
							$data['csweb'] = $ucresult[0]->tfcom_web_url;
							$data['cslogo'] = $ucresult[0]->tfcom_logo_file;
							$data['csregno'] = $ucresult[0]->tfcom_regno;
							$data['cscountry'] = $ucresult[0]->tfcom_country_ref;
							$data['csdept'] = $ucresult[0]->tfcom_cat_ref;
							$data['csrow'] = $ucresult[0]->tfcom_id;
						}
											
						if($data['user_id'] <> $subcinfo[0]->tpp_user_ref){
						
							$uresult = $this->manage->get_user_info_by_id_and_type($subcinfo[0]->tpp_user_ref, 1);
							
							$data['ufname'] = $uresult[0]->tfsp_fname;
							$data['ulname'] = $uresult[0]->tfsp_lname;
							$data['utype'] = 'Supplier';
							$data['uemail'] = $uresult[0]->tfsp_email;
							$data['ucontact'] = $uresult[0]->tfsp_contact;
							$data['uaddress'] = $uresult[0]->tfsp_address;
							$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
							$data['uxdcwallet'] = $uresult[0]->tfu_xdc_walletID;
							$data['uxdcbal'] = $uresult[0]->tfu_xdc_balance;
							$data['uname'] = $uresult[0]->tfu_usern;
							$data['upass'] = openssl_decrypt($uresult[0]->tfu_passwd,"AES-128-ECB",$encryption_key);
							$data['ccountryn'] = $uresult[0]->tfc_name;
							$data['cdeptn'] = $uresult[0]->cName;
							$ratinga = $this->plisting->get_user_rating_by_uid_type($uresult[0]->tfsp_user_ref, 1);
								
							if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
								$data['purating'] = $ratinga[0]->tfur_rating_value;
							}else{	
								$data['purating'] = 0;
							}
							
							$ucresult = $this->manage->get_company_info_by_uid($subcinfo[0]->tpp_user_ref);
			
							if(!empty($ucresult) && is_array($ucresult) && sizeof($ucresult) <> 0){
								
								$data['c1fname'] = $ucresult[0]->tfcom_contact1_fname;
								$data['c1lname'] = $ucresult[0]->tfcom_contact1_lname;
								$data['c1email'] = $ucresult[0]->tfcom_contact1_email;
								$data['c1contact'] = $ucresult[0]->tfcom_contact1_number;
								$data['c2fname'] = $ucresult[0]->tfcom_contact2_fname;
								$data['c2lname'] = $ucresult[0]->tfcom_contact2_lname;
								$data['c2email'] = $ucresult[0]->tfcom_contact2_email;
								$data['c2contact'] = $ucresult[0]->tfcom_contact2_number;
								$data['comname'] = $ucresult[0]->tfcom_name;
								
								$adda = explode('*', $ucresult[0]->tfcom_address);
								
								if(sizeof($adda) > 2){
									$data['cbhn'] = $adda[0];
									$data['caddress'] = $adda[1];
									$data['ccity'] = $adda[2];
									$data['cpinc'] = $adda[3];
									$data['cstate'] = $adda[4];
								}
								
								$data['cweb'] = $ucresult[0]->tfcom_web_url;
								$data['clogo'] = $ucresult[0]->tfcom_logo_file;
								$data['cregno'] = $ucresult[0]->tfcom_regno;
								$data['ccountry'] = $ucresult[0]->tfcom_country_ref;
								$data['cdept'] = $ucresult[0]->tfcom_cat_ref;
								$data['crow'] = $ucresult[0]->tfcom_id;
							}
						}
					}
				}
				
				if($data['user_type_ref'] == 2){
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['utype'] = 'Financier';
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uxdcwallet'] = $uresult[0]->tfu_xdc_walletID;
					$data['uxdcbal'] = $uresult[0]->tfu_xdc_balance;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = openssl_decrypt($uresult[0]->tfu_passwd,"AES-128-ECB",$encryption_key);
					$data['ccountryn'] = $uresult[0]->tfc_name;
					$data['cdeptn'] = $uresult[0]->cName;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($uresult[0]->tff_user_ref, 2);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$data['purating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$data['purating'] = 0;
					}
				}
				
				if($data['user_type_ref'] == 3){
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['utype'] = 'Beneficiary';
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uxdcwallet'] = $uresult[0]->tfu_xdc_walletID;
					$data['uxdcbal'] = $uresult[0]->tfu_xdc_balance;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = openssl_decrypt($uresult[0]->tfu_passwd,"AES-128-ECB",$encryption_key);
					$data['ccountryn'] = $uresult[0]->tfc_name;
					$data['cdeptn'] = $uresult[0]->cName;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($uresult[0]->tfb_user_ref, 3);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$data['purating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$data['purating'] = 0;
					}
				}
			}	
		}
		
		$data['request_user_type'] = 0;
		$data['request_user_id'] = 0;
		$data['request_project_id'] = 0;
		$data["beneficiary_provider_accepted"] = array();
		$data["beneficiary_financier_accepted"] = array();
		$data["accepted_proposal_financier"] = array();
		$data["all_initiated_financier"] = array();
		$data["sub_contract_info"] = array();
		
		$data['puorating'] = 0;
		$data['prrow'] = 0;
		$data['puser'] = 0;
		$data['ppriceval'] = 0;
		$data['pcurr'] = array();
		$data['pcurr_ref'] = 0;
		$data['ppricetax'] = 0;
		$data['ppriceemi'] = 0;
		$data['ppricetot'] = 0;
		$data['pvalid'] = 0;
		$data['pvalidu'] = 0;
		$data['ptenure'] = 0;
		$data['ptenureu'] = 0;
		$data['premarks'] = '';
		$data['pposted'] = '';
		$data['pdeliveryt'] = '';
		$data['pleadtime'] = 0;
		$data['pleadtimeu'] = 0;
		$data['pcompletion'] = 0;
		$data['pcompletionu'] = 0;
		$data['pattachf'] = '';
		$data['projref'] = 0;
		$data['pawarded'] = 0;
		$data['paccepted'] = 0;
		$data['prowdeleted'] = 0;
		$data['putype_ref'] = 0;
		$data['pfin_status'] = 0;
		$data['pfin_awardStatus'] = 0;
		$data['pbfin_status'] = 0;
		$data['pshipment_no'] = '';
		$data['pshipment_details'] = '';
		$data['pshipment_date'] = '';
					
		$project_info = array();
		$data['all_units'] = array();
		
		$all_units = $this->plisting->get_units();
		
		if($all_units && !empty($all_units) && is_array($all_units) && sizeof($all_units) <> 0){
		
			foreach($all_units as $au_row){
				
				$data['all_units'][$au_row->tfun_id] = $au_row->tfun_name;
			}
		}
				
		if($request_project_id > 0){
		
			$data['request_project_id'] = $request_project_id;
			$project_info = $this->plisting->get_project_info_by_id($request_project_id);
		}
		
		$data['project_listed_info'] = array();
		$data['proj_curr'] = array();
		$data['projf_curr'] = array();
		$data['proposal_info'] = array();
		$data['financier_payment_complete'] = 1;
			
		if($project_info && !empty($project_info) && is_array($project_info) && sizeof($project_info) <> 0){
			$data['project_listed_info'] = $project_info;		

			$data['proj_curr'] = $this->plisting->get_currency_by_id($project_info[0]->currency_ref);
			$data['projf_curr'] = $this->plisting->get_currency_by_id($project_info[0]->financing_currency_ref);
			
			if($request_user_type && $request_user_type == 2){
				
				$data["bpay_status"] = array();
				
				$data['accepted_proposal_financier'] = $this->plisting->get_all_sc_financier_proposals_by_project($request_project_id);
								
				$data["beneficiary_financier_payment"] = $this->plisting->fetch_beneficiary_payment_financiers($request_project_id, 2);
				$data["beneficiary_financier_paymenti"] = $this->plisting->fetch_beneficiary_payment_financiers_info($request_project_id, 2);
				
				if(!empty($data["beneficiary_financier_paymenti"]) && is_array($data["beneficiary_financier_paymenti"]) && sizeof($data["beneficiary_financier_paymenti"]) <> 0){
					
					$pcount = sizeof($data["beneficiary_financier_paymenti"]);
					$data["bpay_count"] = $pcount;
					$rowc = 0;
						
					foreach($data["beneficiary_financier_paymenti"] as $bfrow){
						
						$payment_cycle = $bfrow->tpf_payment_cycles;
						
						if($rowc == 0){
							
							for($c = 1; $c <= $payment_cycle; $c++){
								
								$pay_count_status = 0;
								
								foreach($data["beneficiary_financier_paymenti"] as $binfrow){
									$tfpcstatusa = json_decode($binfrow->tpf_bpayment_status);
									
									if($tfpcstatusa->$c->pay_status == 1){
										$pay_count_status++;
									}
								}
								
								$data["bpay_status"][$c] = (($pcount == $pay_count_status) ? 2 : (($pcount > $pay_count_status && $pay_count_status <> 0) ? 1 : 0));
							}
						}	
						
						$rowc++;
					}
				}
							
				$data["beneficiary_financier_accepted"] = $this->plisting->fetch_beneficiary_accepted_invitaion($request_project_id, 2);
				
				$data["all_initiated_financier"] = $this->plisting->get_all_sc_financier_initiate_proposals_by_project($request_project_id);
				
				if(!empty($data["all_initiated_financier"]) && is_array($data["all_initiated_financier"]) && sizeof($data["all_initiated_financier"]) <> 0){
				
					foreach($data["all_initiated_financier"] as $aif_row){
						
						if($aif_row->tpf_fpayment_status == 0){
						
							$data['financier_payment_complete'] = 0;
							
						}
					}
				}
			}		
		}
				
		if($request_user_id && $request_user_type && $request_user_id <> 0 && $request_user_type <> 0){ 
			
			$data['request_type'] = $request_type;	
			$subcinfo = array();
			
			if($request_user_id <> 0 && ($request_user_type == 1 || $request_user_type == 2)){
				$ruser_id = $request_user_id;
				
				if($request_user_type == 1){
					$subcinfo = $this->plisting->get_sc_provider_subcontractor_proposal_by_project($request_project_id);
					$data["sub_contract_info"] = $subcinfo;
					if(!empty($subcinfo) && sizeof($subcinfo) <> 0){
						$ruser_id = $subcinfo[0]->tpp_user_ref;
					}
				}
			}
			
			$subcinfo = array();
			
			if($data['user_type_ref'] == 1 || $data['user_type_ref'] == 2){
				
				$ruser_id = $data['user_id'];
				
				if($data['user_type_ref'] == 1){
					$subcinfo = $this->plisting->get_sc_provider_subcontractor_proposal_by_project($request_project_id);
					$data["sub_contract_info"] = $subcinfo;
					if(!empty($subcinfo) && sizeof($subcinfo) <> 0){
						$ruser_id = $subcinfo[0]->tpp_user_ref;
					}
				}
			}
			
			if($ruser_id <> 0 && ($request_user_type == 1 || $data['user_type_ref'] == 1)){
								
				$data["beneficiary_provider_accepted"] = $this->plisting->fetch_beneficiary_accepted_invitaion($request_project_id, 1);
			
				$presult = $this->plisting->get_proposal_by_ref($request_project_id, $ruser_id, 'p');
				$data["proposals_subcontractor_info"] = $this->plisting->get_proposal_by_contractor_ref($request_project_id, $ruser_id, 'p');
				
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
					
					$data['prrow'] = $presult[0]->tpp_id;
					$data['projref'] = $presult[0]->tpp_project_ref;
					$data['puser'] = $presult[0]->tpp_user_ref;
					$data['puname'] = $presult[0]->tfsp_fname.' '.$presult[0]->tfsp_lname;
					$data['pucompany'] = $presult[0]->tfcom_name;
					$data['pucountry'] = $presult[0]->tfc_name;
					$data['putype'] = 'Supplier';
					$data['putype_ref'] = 1;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($presult[0]->tfsp_user_ref, 1);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$data['puorating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$data['puorating'] = 0;
					}
					
					$data['pawarded'] = $presult[0]->awarded_provider;
					$data['paccepted'] = $presult[0]->tpp_beneficiary_accept;
					$data['prowdeleted'] = $presult[0]->prow_deleted;
					$data['ppriceval'] = $presult[0]->tpp_price;
					$data['pcurr_ref'] = $presult[0]->tpp_price_currency_ref;
					$data['pcurr'] = $this->plisting->get_currency_by_id($presult[0]->tpp_price_currency_ref);
					$data['ppricetax'] = $presult[0]->tpp_tax_percent;
					$data['ppricetot'] = $presult[0]->tpp_total_amount;
					$data['pvalid'] = $presult[0]->tpp_validity_value;
					$data['pvalidu'] = $this->plisting->get_units_by_id($presult[0]->tpp_validity_ref);
					$data['premarks'] = $presult[0]->tpp_remarks;
					$data['pdeliveryt'] = $presult[0]->tpp_delivery_type;
					$data['pleadtime'] = $presult[0]->tpp_delivery_lead_time_value;
					$data['pleadtimeu'] = $this->plisting->get_units_by_id($presult[0]->tpp_delivery_lead_time_ref);
					$data['pcompletion'] = $presult[0]->tpp_completion_time_value;
					$data['pcompletionu'] = $this->plisting->get_units_by_id($presult[0]->tpp_completion_time_ref);
					$data['pattachf'] = $presult[0]->tpp_file;
					$data['pposted'] = $presult[0]->tpp_posted;
					$data['pshipment_no'] = $presult[0]->tpp_shipment_number;
					$data['pshipment_details'] = $presult[0]->tpp_shipment_details;
					$data['pshipment_date'] = $presult[0]->tpp_shipment_date;
				}	
			}
			
			if($ruser_id <> 0 && ($request_user_type == 2 || $data['user_type_ref'] == 2)){
				
				$data["fpayconf_status"] = array();
				$data["bpay_status"] = array();
								
				$data["beneficiary_financier_payment"] = $this->plisting->fetch_beneficiary_payment_financiers($request_project_id, 2);
				$data["beneficiary_financier_paymenti"] = $this->plisting->fetch_beneficiary_payment_financiers_info($request_project_id, 2);
				
				if(!empty($data["beneficiary_financier_paymenti"]) && is_array($data["beneficiary_financier_paymenti"]) && sizeof($data["beneficiary_financier_paymenti"]) <> 0){
					
					$pcount = sizeof($data["beneficiary_financier_paymenti"]);
					$data["bpay_count"] = $pcount;
					$rowc = 0;
						
					foreach($data["beneficiary_financier_paymenti"] as $bfrow){
						
						$payment_cycle = $bfrow->tpf_payment_cycles;
						
						if($rowc == 0){
							
							for($c = 1; $c <= $payment_cycle; $c++){
								
								$pay_count_status = 0;
								
								foreach($data["beneficiary_financier_paymenti"] as $binfrow){
									$tfpcstatusa = json_decode($binfrow->tpf_bpayment_status);
									
									if($tfpcstatusa->$c->pay_status == 1){
										$pay_count_status++;
									}
								}
								
								$data["bpay_status"][$c] = (($pcount == $pay_count_status) ? 2 : (($pcount > $pay_count_status && $pay_count_status <> 0) ? 1 : 0));
							}
						}	
						
						$rowc++;
					}
				}
										
				$data["beneficiary_financier_accepted"] = $this->plisting->fetch_beneficiary_accepted_invitaion($request_project_id, 2);
				$data["beneficiary_financier_paymentu"] = $this->plisting->fetch_beneficiary_payment_financiers_by_uid($request_project_id, $ruser_id, 2);
				
				if(!empty($data["beneficiary_financier_accepted"]) && sizeof($data["beneficiary_financier_accepted"]) <> 0){
					
					$data["beneficiary_financier_accepted"]["urating"] = array();
					
					foreach($data["beneficiary_financier_accepted"] as $bfa){
						
						$ratinga = $this->plisting->get_user_rating_by_uid_type($bfa->tff_user_ref, 2);
						
						if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0){
							$data["beneficiary_financier_accepted"]["urating"][$bfa->tff_user_ref] = $ratinga[0]->tfur_rating_value;
						}else{	
							$data["beneficiary_financier_accepted"]["urating"][$bfa->tff_user_ref] = 0;
						}
					}
				}
				
				if(!empty($data["beneficiary_financier_paymentu"]) && is_array($data["beneficiary_financier_paymentu"]) && sizeof($data["beneficiary_financier_paymentu"]) <> 0){
				
					foreach($data["beneficiary_financier_paymentu"] as $bfrow){
						
						$payment_cycle = $bfrow->tpf_payment_cycles;
						$tfpcstatusa = json_decode($bfrow->tpf_fpayment_confirm_status);
						
						for($c = 1; $c <= $payment_cycle; $c++){
							$data["fpayconf_status"][$c] = $tfpcstatusa->$c;
						}
					}
				}
				
				$data['proposal_info'] = $presult = $this->plisting->get_proposal_by_ref($request_project_id, $ruser_id, 'f');
				
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
					
					$data['prrow'] = $presult[0]->tpf_id;
					$data['projref'] = $presult[0]->tpf_project_ref;
					$data['puser'] = $presult[0]->tpf_user_ref;
					$data['puname'] = $presult[0]->tff_fname.' '.$presult[0]->tff_lname;
					$data['pucompany'] = $presult[0]->tfcom_name;
					$data['pucountry'] = $presult[0]->tfc_name;
					$data['putype'] = 'Financier';
					$data['putype_ref'] = 2;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($presult[0]->tff_user_ref, 2);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$data['puorating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$data['puorating'] = 0;
					}
					$data['ptenure'] = $presult[0]->tpf_finance_tenure_value;
					$data['ptenureu'] = $this->plisting->get_units_by_id($presult[0]->tpf_finance_tenure_ref);
					$data['pawarded'] = $presult[0]->awarded_financier;
					$data['paccepted'] = $presult[0]->tpf_beneficiary_accept;
					$data['prowdeleted'] = $presult[0]->prow_deleted;
					$data['ppriceval'] = $presult[0]->tpf_price;
					$data['pcurr_ref'] = $presult[0]->tpf_price_currency_ref;
					$data['pcurr'] = $this->plisting->get_currency_by_id($presult[0]->tpf_price_currency_ref);
					$data['ppricetax'] = $presult[0]->tpf_tax_percent;
					$data['ppriceemi'] = $presult[0]->tpf_emi_amount;
					$data['ppricetot'] = $presult[0]->tpf_total_amount;
					$data['pvalid'] = $presult[0]->tpf_validity_value;
					$data['pvalidu'] = $this->plisting->get_units_by_id($presult[0]->tpf_validity_ref);
					$data['premarks'] = $presult[0]->tpf_remarks;
					$data['pattachf'] = $presult[0]->tpf_file;
					$data['pposted'] = $presult[0]->tpf_posted;		
					$data['pfin_status'] = $presult[0]->tpf_fpayment_status;
					$data['pfin_awardStatus'] = $presult[0]->tpf_awardStatus;
					$data['pbfin_status'] = $presult[0]->tpf_bpayment_complete_status;
				}	
			}
			
			$ucresult = $this->manage->get_company_info_by_uid($request_user_id);
			
			if(!empty($ucresult) && is_array($ucresult) && sizeof($ucresult) <> 0){
				
				$data['request_user_type'] = $request_user_type;
				$data['request_user_id'] = $request_user_id;
				
				$data['co1fname'] = $ucresult[0]->tfcom_contact1_fname;
				$data['co1lname'] = $ucresult[0]->tfcom_contact1_lname;
				$data['co1email'] = $ucresult[0]->tfcom_contact1_email;
				$data['co1contact'] = $ucresult[0]->tfcom_contact1_number;
				$data['co2fname'] = $ucresult[0]->tfcom_contact2_fname;
				$data['co2lname'] = $ucresult[0]->tfcom_contact2_lname;
				$data['co2email'] = $ucresult[0]->tfcom_contact2_email;
				$data['co2contact'] = $ucresult[0]->tfcom_contact2_number;
				$data['coomname'] = $ucresult[0]->tfcom_name;
				
				$adda = explode('*', $ucresult[0]->tfcom_address);
				
				if(sizeof($adda) > 2){
					$data['cobhn'] = $adda[0];
					$data['coaddress'] = $adda[1];
					$data['cocity'] = $adda[2];
					$data['copinc'] = $adda[3];
					$data['costate'] = $adda[4];
				}
				
				$data['coweb'] = $ucresult[0]->tfcom_web_url;
				$data['cologo'] = $ucresult[0]->tfcom_logo_file;
				$data['coregno'] = $ucresult[0]->tfcom_regno;
				$data['cocountry'] = $ucresult[0]->tfcom_country_ref;
				$data['codept'] = $ucresult[0]->tfcom_cat_ref;
				$data['corow'] = $ucresult[0]->tfcom_id;
			}	
			
			$uresult = $this->manage->get_user_info_by_id_and_type($request_user_id, $request_user_type);
					
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($request_user_type == 1){
					
					$data["proposals_subcontractor_info"] = $this->plisting->get_proposal_by_contractor_ref($request_project_id, $request_user_id, 'p');
					
					$data['uofname'] = $uresult[0]->tfsp_fname;
					$data['uolname'] = $uresult[0]->tfsp_lname;
					$data['uotype'] = 'Supplier';
					$data['uoemail'] = $uresult[0]->tfsp_email;
					$data['uocontact'] = $uresult[0]->tfsp_contact;
					$data['uoaddress'] = $uresult[0]->tfsp_address;
					$data['uoprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uoxdcwallet'] = $uresult[0]->tfu_xdc_walletID;
					$data['uoxdcbal'] = $uresult[0]->tfu_xdc_balance;
					// $data['uoname'] = $uresult[0]->tfu_usern;
					// $data['uopass'] = openssl_decrypt($uresult[0]->tfu_passwd,"AES-128-ECB",$encryption_key);
					$data['cocountryn'] = $uresult[0]->tfc_name;
					$data['codeptn'] = $uresult[0]->cName;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($uresult[0]->tfsp_user_ref, 1);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$data['pourating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$data['pourating'] = 0;
					}
				}
				
				if($request_user_type == 2){
					$data['uofname'] = $uresult[0]->tff_fname;
					$data['uolname'] = $uresult[0]->tff_lname;
					$data['uotype'] = 'Financier';
					$data['uoemail'] = $uresult[0]->tff_email;
					$data['uocontact'] = $uresult[0]->tff_contact;
					$data['uoaddress'] = $uresult[0]->tff_address;
					$data['uoprofpic'] = $uresult[0]->tff_pic_file;
					$data['uoxdcwallet'] = $uresult[0]->tfu_xdc_walletID;
					$data['uoxdcbal'] = $uresult[0]->tfu_xdc_balance;
					// $data['uoname'] = $uresult[0]->tfu_usern;
					// $data['uopass'] = openssl_decrypt($uresult[0]->tfu_passwd,"AES-128-ECB",$encryption_key);
					$data['cocountryn'] = $uresult[0]->tfc_name;
					$data['codeptn'] = $uresult[0]->cName;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($uresult[0]->tff_user_ref, 2);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$data['pourating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$data['pourating'] = 0;
					}
				}
				
				if($request_user_type == 3){
					$data['uofname'] = $uresult[0]->tfb_fname;
					$data['uolname'] = $uresult[0]->tfb_lname;
					$data['uotype'] = 'Beneficiary';
					$data['uoemail'] = $uresult[0]->tfb_email;
					$data['uocontact'] = $uresult[0]->tfb_contact;
					$data['uoaddress'] = $uresult[0]->tfb_address;
					$data['uoprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uoxdcwallet'] = $uresult[0]->tfu_xdc_walletID;
					$data['uoxdcbal'] = $uresult[0]->tfu_xdc_balance;
					// $data['uoname'] = $uresult[0]->tfu_usern;
					// $data['uopass'] = openssl_decrypt($uresult[0]->tfu_passwd,"AES-128-ECB",$encryption_key);
					$data['cocountryn'] = $uresult[0]->tfc_name;
					$data['codeptn'] = $uresult[0]->cName;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($uresult[0]->tfb_user_ref, 3);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$data['pourating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$data['pourating'] = 0;
					}
				}
			}	
		}
		
		if(($request_user_type && $request_user_type == 1) || $data['user_type_ref'] == 1){
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
			$this->load->view('pages/smart_contract_supplier_dashboard', $data);
			$this->load->view('includes/footer_commonn', $data);
			$this->load->view('pages_scripts/profile_scripts', $data);
			$this->load->view('includes/footern');
		}
		else if(($request_user_type && $request_user_type == 2) || $data['user_type_ref'] == 2){
			$this->load->view('includes/headern', $data);
			$this->load->view('includes/header_publicn', $data);
			$this->load->view('pages/smart_contract_financier_dashboard', $data);
			$this->load->view('includes/footer_commonn', $data);
			$this->load->view('pages_scripts/profile_scripts', $data);
			$this->load->view('includes/footern');
		}
		else{
			/* $this->load->view('includes/header', $data);
			$this->load->view('includes/header_public', $data);
			$this->load->view('pages/smartcontract_view', $data);
			$this->load->view('includes/footer_common', $data);
			$this->load->view('pages_scripts/profile_scripts', $data);
			$this->load->view('includes/footer'); */
			redirect(base_url().'dashboard/smart_contract');
		}
	}
	
	public function confirm_beneficiary_payment(){
	
		$proj_id = $this->input->post('proj_id');
		$puser_id = $this->input->post('puser_id');
		$puser_type = $this->input->post('puser_type');
		$user_id = $this->input->post('user_id');
		$user_type = $this->input->post('user_type');
		$pro_row_id = $this->input->post('pro_row_id');
		$pay_cycle_no = $this->input->post('pay_cycle_no');
		$fproposal = $this->plisting->get_proposal_by_id($pro_row_id, 'f');
		
		$payment_cycle = 0;
		$fpayconf_status = array();
		$data = array();
		$data['status'] = 0;
		$complete_bpayment = 1;
		$data_add = array();
		$update_info = array();
		
		if(!empty($fproposal) && sizeof($fproposal) <> 0){
			
			$payment_cycle = $fproposal[0]->tpf_payment_cycles;
			$fpayconf_status = array();
			$tfpcstatusa = json_decode($fproposal[0]->tpf_fpayment_confirm_status);
						
			for($c = 1; $c <= $payment_cycle; $c++){
				
				if($c == $pay_cycle_no){
					$fpayconf_status[$c] = 1;
				}else{
					$fpayconf_status[$c] = $tfpcstatusa->$c;
				}
			}
		
			for($count=1; $count <= sizeof($fpayconf_status); $count++)
			{
				if($fpayconf_status[$count] == 0){
					$complete_bpayment = 0;
				}
			}
			
			if($complete_bpayment == 1){
				$data_add['tpf_bpayment_complete_status'] = 1;
				$data_add['tpf_awardStatus'] = 3;
			}
		
			$data['fpayconf'] = json_encode($fpayconf_status);
			
			$data_add['tpf_fpayment_confirm_status'] = json_encode($fpayconf_status);
			
			if($payment_cycle > 0 && empty($fpayconf_status) && is_array($fpayconf_status) && sizeof($fpayconf_status) == 0){
				
				$fcsdata = array();
				
				for($j = 1; $j <= $payment_cycle; $j++){
					$fcsdata[$j] = 0;						
				}
				
				if(!empty($fcsdata)){
					$data_add['tpf_fpayment_confirm_status'] = json_encode($fcsdata);
				}
			} 
		}
		
		$update_info = $this->plisting->update_proposal_by_id($pro_row_id, $data_add, 'f');
		
		$in_proposals = $this->plisting->get_all_sc_financier_initiate_proposals_by_project($proj_id);
					
		$complete_bpayment_status = 1;
		
		if(!empty($in_proposals) && sizeof($in_proposals) <> 0){
								
			foreach($in_proposals as $inrow){
				if($inrow->tpf_bpayment_complete_status == 0){
					$complete_bpayment_status = 0;
				}
			}
		}
		
		$data_add = array();
		
		if($complete_bpayment_status == 1){
			$data_add['tpf_fclosingDate'] = date('Y-m-d H:i:s');
		}
		
		$update_info = $this->plisting->update_proposal_by_id($pro_row_id, $data_add, 'f');
		
		if($complete_bpayment_status == 1){
			
			$data_add = array();
			
			$data_add['awarded_financier'] = 2;
			$data_add['financier_completion_request'] = 2;
			$data_add['fcompletedDate'] = date('Y-m-d H:i:s');
			$this->plisting->update_project_by_id($proj_id, $data_add);
			$this->plisting->request_complete_project($proj_id, $puser_id, $puser_type, 0, 2, '');
		}
		
		if(!empty($update_info) && is_array($update_info) && sizeof($update_info) <> 0){
			$data['status'] = 1;
		}
		
		echo json_encode($data);
	}
	
	public function get_beneficiary_info()
	{
		$user_id = $this->input->post('user_id');
		$user_type = $this->input->post('user_type');
		$user_info = array();
		$data = array();
		
		if($user_id <> 0 && $user_type <> 0){
					
			$user_info = $this->manage->get_user_info_by_id_and_type($user_id, $user_type);	
		}
		
		if(!empty($user_info) && sizeof($user_info) <> 0){
			$data['user_id'] = $user_info[0]->tfu_id;
			$data['user_type'] = $user_info[0]->tfu_utype;
			$data['user_email'] = $user_info[0]->tfu_usern;
			$data['user_xinfin_walletID'] = $user_info[0]->tfu_xdc_walletID;
			$data['user_xinfin_walletBalance'] = $user_info[0]->tfu_xdc_balance;
		}
		
		echo json_encode($data);
	}
	
	public function xinfin_login(){
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			// redirect(base_url().'log/out');
		}
		
		$api_infoa = $this->manage->get_api_info();
		$api_type = '';
		$api_value = '';
		$merchant_code = '';
		$merchant_name = '';
		$register_api = '';
		
		$request_user_name = $this->input->post('xuser_name');
		$request_user_passwd = $this->input->post('xuser_passwd');
		$request_user_otp = $this->input->post('xuser_otp');
		$request_action = $this->input->post('action');
		$ftokens = $this->input->post('ftokens');
		$session_data = array();
		
		if(!empty($api_infoa) && sizeof($api_infoa) <> 0){
			
			foreach($api_infoa as $arow){
			
				if($arow->tfaac_api_type){
					$api_type = $arow->tfaac_api_type;
				}
				
				if($arow->tfaac_api_value){
					$api_value = $arow->tfaac_api_value	;
				}
				
				if($api_type == 'MerchantCode'){
					$merchant_code = $api_value;		
				}
				
				if($api_type == 'MerchantName'){
					$merchant_name = $api_value;		
				}
				
				if($api_type == 'signin_APIKey'){
					$register_api = $api_value;		
				}
			}
		}
		
		$ret_dat = array();
			
		if($request_user_name <> '' && $request_user_passwd <> '' && $merchant_code <> '' && $merchant_name <> '' && $register_api <> '' && $request_action == 'get_otp'){
			
			$options = array('username' => $request_user_name, 'password' => $request_user_passwd, 'MerchantCode' => $merchant_code, 'MerchantName' => $merchant_name, 'APIKey' => $register_api, 'otpNo' => "");
			
			$rcurl = get_signin_status_with_otp($options);
			
			if($rcurl){
				$rcurla = json_decode(stripslashes($rcurl));
			}
			
			if($rcurla){
							
				$session_data = array(
					'status' => $rcurla->status, // SUCCESS OR FAILED
					'message' => ((isset($rcurla->message)) ? $rcurla->message : ''),
					'xuser_name' => $request_user_name,
					'xuser_passwd' => $request_user_passwd,
					'xuser_merchant_code' => $merchant_code,
					'xuser_merchant_name' => $merchant_name,
					'xuser_sign_api' => $register_api
				);
				
				$this->session->set_userdata('xinfin_logged_in', $session_data);
			}
		}
				
		$xinfin_user = $this->session->userdata('xinfin_logged_in');
		
		if(trim($request_user_otp) == ''){
			$request_user_otp = 0;
		}
		
		if($xinfin_user && !empty($xinfin_user) && sizeof($xinfin_user) <> 0 && $request_user_otp <> '' && $request_action == 'xinfin_login_add_wallet'){
			
			$request_user_name = $xinfin_user['xuser_name'];
			$request_user_passwd = $xinfin_user['xuser_passwd'];
			
			$options = array('username' => $request_user_name, 'password' => $request_user_passwd, 'MerchantCode' => $merchant_code, 'MerchantName' => $merchant_name, 'APIKey' => $register_api, 'otpNo' => $request_user_otp);
			
			$rcurl = get_signin_status_with_otp($options);
			
			if($rcurl){
				$rcurla = json_decode(stripslashes($rcurl));
			}
			
			if($rcurla){
			
				$status = $rcurla->status; // SUCCESS OR FAILED
				$isLogged = ((isset($rcurla->isLogged)) ? $rcurla->isLogged : FALSE);
				$public = ((isset($rcurla->public)) ? $rcurla->public : '');
				$mobile = ((isset($rcurla->mobile)) ? $rcurla->mobile : '');
				$email = ((isset($rcurla->email)) ? $rcurla->email : '');
				$message = ((isset($rcurla->message)) ? $rcurla->message : '');
				
				$options = array('address' => $public);
				
				$rcurlf = get_xdc_balance($options);
			
				if($rcurlf){
					$rcurlfa = json_decode(stripslashes($rcurlf));
				}
				
				$balance = ((isset($rcurlfa->balance)) ? $rcurlfa->balance : '');
							
				$data_add = array();
				$data_add['tfu_xdc_walletID'] = $public;
				$data_add['tfu_xdc_balance'] = $balance;
				
				if(strtolower($status) == 'success' && trim($public) <> '' && trim($balance) <> ''){
					$result = $this->manage->update_user_base_info_by_id_and_type($data['user_id'], $data['user_type_ref'], $data_add);
				}
								
				if(strtolower($status) == 'success'){
				
					if($result && !empty($result) && is_array($result) && sizeof($result) <> 0){
						/* Wallet Added Successfully */
					}else{
						/* Wallet Already There */
						$status = 'duplicate_wallet';
					}
				}
				
				$session_data = array(
					'xuser_name' => $request_user_name,
					'xuser_passwd' => $request_user_passwd,
					'xuser_merchant_code' => $merchant_code,
					'xuser_merchant_name' => $merchant_name,
					'xuser_sign_api' => $register_api,
					'status' => $status,
					'isLogged' => $isLogged,
					'public' => $public,
					'mobile' => $mobile,
					'email' => $email,
					'message' => $message,
					'balance' => $balance
				);
				
				$this->session->set_userdata('xinfin_after_logged_in', $session_data);
			}	
		}
		
		$xinfin_user = $this->session->userdata('xinfin_logged_in');
		
		if($xinfin_user && !empty($xinfin_user) && sizeof($xinfin_user) <> 0 && $request_user_otp <> '' && $request_action == 'xinfin_login_update_wallet'){
			
			$request_user_name = $xinfin_user['xuser_name'];
			$request_user_passwd = $xinfin_user['xuser_passwd'];
			
			$options = array('username' => $request_user_name, 'password' => $request_user_passwd, 'MerchantCode' => $merchant_code, 'MerchantName' => $merchant_name, 'APIKey' => $register_api, 'otpNo' => $request_user_otp);
			
			$rcurl = get_signin_status_with_otp($options);
			
			if($rcurl){
				$rcurla = json_decode(stripslashes($rcurl));
			}
			
			if($rcurla){
			
				$status = $rcurla->status; // SUCCESS OR FAILED
				$isLogged = ((isset($rcurla->isLogged)) ? $rcurla->isLogged : FALSE);
				$public = ((isset($rcurla->public)) ? $rcurla->public : '');
				$mobile = ((isset($rcurla->mobile)) ? $rcurla->mobile : '');
				$email = ((isset($rcurla->email)) ? $rcurla->email : '');
				$message = ((isset($rcurla->message)) ? $rcurla->message : '');
				
				$options = array('address' => $public);
				
				$rcurlf = get_xdc_balance($options);
			
				if($rcurlf){
					$rcurlfa = json_decode(stripslashes($rcurlf));
				}
				
				$balance = ((isset($rcurlfa->balance)) ? $rcurlfa->balance : '');
							
				$data_add = array();
				$data_add['tfu_xdc_walletID'] = $public;
				$data_add['tfu_xdc_balance'] = $balance;
				
				if(strtolower($status) == 'success' && trim($public) <> '' && trim($balance) <> ''){
					$result = $this->manage->update_user_base_info_by_id_and_type($data['user_id'], $data['user_type_ref'], $data_add);
				}
								
				if(strtolower($status) == 'success'){
				
					if($result && !empty($result) && is_array($result) && sizeof($result) <> 0){
						/* Wallet Added Successfully */
					}else{
						/* Wallet Already There */
						$status = 'duplicate_wallet';
					}
				}
				
				$session_data = array(
					'xuser_name' => $request_user_name,
					'xuser_passwd' => $request_user_passwd,
					'xuser_merchant_code' => $merchant_code,
					'xuser_merchant_name' => $merchant_name,
					'xuser_sign_api' => $register_api,
					'status' => $status,
					'isLogged' => $isLogged,
					'public' => $public,
					'mobile' => $mobile,
					'email' => $email,
					'message' => $message,
					'balance' => $balance
				);
				
				$this->session->set_userdata('xinfin_after_logged_in', $session_data);
			}	
		}
				
		if($xinfin_user && !empty($xinfin_user) && sizeof($xinfin_user) <> 0 && $request_user_otp <> '' && $request_action == 'xinfin_login'){
			
			$request_user_name = $xinfin_user['xuser_name'];
			$request_user_passwd = $xinfin_user['xuser_passwd'];
			
			$options = array('username' => $request_user_name, 'password' => $request_user_passwd, 'MerchantCode' => $merchant_code, 'MerchantName' => $merchant_name, 'APIKey' => $register_api, 'otpNo' => $request_user_otp);
						
			$rcurl = get_signin_status_with_otp($options);
			
			if($rcurl){
				$rcurla = json_decode(stripslashes($rcurl));
			}
			
			if($rcurla){
			
				$status = $rcurla->status; // SUCCESS OR FAILED
				$isLogged = ((isset($rcurla->isLogged)) ? $rcurla->isLogged : FALSE);
				$public = ((isset($rcurla->public)) ? $rcurla->public : '');
				$mobile = ((isset($rcurla->mobile)) ? $rcurla->mobile : '');
				$email = ((isset($rcurla->email)) ? $rcurla->email : '');
				$message = ((isset($rcurla->message)) ? $rcurla->message : '');
				
				$options = array('address' => $public);
				
				$rcurlf = get_xdc_balance($options);
			
				if($rcurlf){
					$rcurlfa = json_decode(stripslashes($rcurlf));
				}
				
				$balance = ((isset($rcurlfa->balance)) ? $rcurlfa->balance : 0);
								
				$result = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
				$xwalletid = 0;
				$xwalletbal = 0;
				
				if(!empty($result) && is_array($result) && sizeof($result) <> 0){
					
					$xwalletid = $result[0]->tfu_xdc_walletID;	
					$xwalletbal = $result[0]->tfu_xdc_balance;	
				}
				
				$data_add = array();
								
				if(strtolower($status) == 'success'){
				
					$data_add['tfu_xdc_balance'] = $balance;
					$this->manage->update_user_base_info_all_by_id_and_type($data['user_id'], $data['user_type_ref'], $data_add);
					
					if($xwalletid && $xwalletid > 0 && $xwalletid == $public && $balance > 0 && (($balance - 1000) >= $ftokens)){
						/* Wallet Matched */
					}else{
						/* Wallet didn't Matched */
						$status = 'wrong_wallet';
					}
				}
				
				$session_data = array(
					'xuser_name' => $request_user_name,
					'xuser_passwd' => $request_user_passwd,
					'xuser_merchant_code' => $merchant_code,
					'xuser_merchant_name' => $merchant_name,
					'xuser_sign_api' => $register_api,
					'status' => $status,
					'isLogged' => $isLogged,
					'public' => $public,
					'mobile' => $mobile,
					'email' => $email,
					'message' => $message
				);
				
				$this->session->set_userdata('xinfin_after_logged_in', $session_data);
			}	
		}
					
		echo json_encode($session_data);
				
	}
			
	public function get_fproposal_info()
	{
		$user_id = $this->input->post('user_id');
		$proj_id = $this->input->post('proj_id');
		$user_type = $this->input->post('user_type');
		$fproposal_info = array();
		$data = array();
		
		if($user_id <> 0 && $proj_id <> 0){
					
			$fproposal_info = $this->plisting->get_sc_financier_proposals_by_project_and_user($proj_id, $user_id);	
		}
		
		if(!empty($fproposal_info) && sizeof($fproposal_info) <> 0){
			$data['proj_ref'] = $fproposal_info[0]->tpf_project_ref;
			$data['fin_amt'] = $fproposal_info[0]->tpf_price;
			$data['tenure_val'] = $fproposal_info[0]->tpf_finance_tenure_value;
			$data['tax_amt'] = $fproposal_info[0]->tpf_tax_percent;
		}
		
		echo json_encode($data);
	}
}
	