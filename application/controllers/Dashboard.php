<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'notification', 'rating'));
		$this->load->library('session');
		$this->load->model(array('plisting', 'manage'));
		$this->is_logged_in();
		// $this->output->cache(0.5);

		$data = array();
		$data_add = array();
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
	
	public function index()
	{
		$data = array();
		$result = array();
		
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
				
		$data['pcategories'] = array();
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		if($data['user_type_ref'] <> 3){
			$data['page'] = 'dashboardpf';
		}else{
			$data['page'] = 'dashboard';
		}
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data['uvisibility'] = 0;
			
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
		
		$domain = $this->siteURL();
		
		$domain_arr = explode('.', $domain);
		
		$domain_type = $domain_arr[0];
		$domain_name = '';
		
		$data['user_access_domain_type'] = $domain_type;
				
		if(!empty($domain_arr) && sizeof($domain_arr) <> 0){
			
			
			
			for($i  = 1; $i < sizeof($domain_arr); $i++){
				
				if($i > 1){
					$domain_name .= '.'.$domain_arr[$i];
				}else{
					$domain_name .= $domain_arr[$i];
				}
			}
		}
		
		$data['user_access_domain_name'] = $domain_name;
				
		if($data['user_type_ref'] == 3){
		
			$data["projects_listed"] = array();
			$data["provider_interested"] = array();
			$data["provider_interested_user"] = array();
			$data["financier_interested"] = array();
			$data["financier_interested_user"] = array();
			$data['project_user_rating'] = array();
			
			if($data['user_id'] <> 0){
							
				$data["projects_listed"] = $this->plisting->get_all_projects($data, $data['user_id']);
				$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
				$data['check_company'] = $this->manage->get_company_info_by_uid($data['user_id']);
				
				$data['all_invitation'] = $this->plisting->get_project_invitation_by_uid($data['user_id']);
				
				if($user['user_type_ref'] == 1){
					$data['invitation_accept'] = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'p');
				}
				
				if($user['user_type_ref'] == 2){
					$data['invitation_accept'] = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'f');
				}
				
				if(!empty($data["projects_listed"]) && is_array($data["projects_listed"]) && sizeof($data["projects_listed"]) <> 0){
					
					foreach($data["projects_listed"] as $prow){
						$data["provider_interested"][$prow->ID] = $this->plisting->fetch_accepted_invitaion($prow->ID, 1);
						$data["financier_interested"][$prow->ID] = $this->plisting->fetch_accepted_invitaion($prow->ID, 2);
						
						if(!empty($data["provider_interested"][$prow->ID]) && is_array($data["provider_interested"][$prow->ID]) && sizeof($data["provider_interested"][$prow->ID]) <> 0){
							
							$count = 0;
							
							foreach($data["provider_interested"][$prow->ID] as $puser){
								
								$data['provider_interested_user'][$prow->ID][$count]['uid'] = $puser->tfsp_user_ref;
								$data['provider_interested_user'][$prow->ID][$count]['ufname'] = $puser->tfsp_fname;
								$data['provider_interested_user'][$prow->ID][$count]['ulname'] = $puser->tfsp_lname;
								$data['provider_interested_user'][$prow->ID][$count]['uemail'] = $puser->tfsp_email;
								$data['provider_interested_user'][$prow->ID][$count]['ucontact'] = $puser->tfsp_contact;
								$data['provider_interested_user'][$prow->ID][$count]['uaddress'] = $puser->tfsp_address;
								$data['provider_interested_user'][$prow->ID][$count]['uprofpic'] = $puser->tfsp_pic_file;
								$data['provider_interested_user'][$prow->ID][$count]['company'] = $puser->tfcom_name;
								$data['provider_interested_user'][$prow->ID][$count]['country'] = $puser->tfc_name;
								$proposal = $this->plisting->get_project_proposal_by_id_uid_type($prow->ID, $puser->tfsp_user_ref, 'p');
								$proposal_id = 0;
								if(!empty($proposal) && is_array($proposal) && sizeof($proposal) <> 0){
									$proposal_id = $proposal[0]->tpp_id;
								}
								$data['provider_interested_user'][$prow->ID][$count]['benif_accept'] = $puser->tpp_beneficiary_accept;
								$data['provider_interested_user'][$prow->ID][$count]['proposal_id'] = $proposal_id;
								$rresult = $this->plisting->get_rating_info_by_project($prow->ID, $data['user_id'], $data['user_type_ref'], $puser->tfsp_user_ref, 1);
							
								if(!empty($rresult) && is_array($rresult) && sizeof($rresult) <> 0){
									$data['provider_interested_user'][$prow->ID][$count]['benif_rating'] = $rresult[0]->tfur_rating_value;
								}else{
									$data['provider_interested_user'][$prow->ID][$count]['benif_rating'] = 0;
								}
								
								$ratinga = $this->plisting->get_user_rating_by_uid_type($puser->tfsp_user_ref, 1);
							
								if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0){
									$data['provider_interested_user'][$prow->ID][$count++]['rating'] = $ratinga[0]->tfur_rating_value;
								}else{	
									$data['provider_interested_user'][$prow->ID][$count++]['rating'] = 0;
								}
							}	
						}
						
						if(!empty($data["financier_interested"][$prow->ID]) && is_array($data["financier_interested"][$prow->ID]) && sizeof($data["financier_interested"][$prow->ID]) <> 0){
							
							$count = 0;
							
							foreach($data["financier_interested"][$prow->ID] as $fuser){
														
								$data['financier_interested_user'][$prow->ID][$count]['uid'] = $fuser->tff_user_ref;
								$data['financier_interested_user'][$prow->ID][$count]['ufname'] = $fuser->tff_fname;
								$data['financier_interested_user'][$prow->ID][$count]['ulname'] = $fuser->tff_lname;
								$data['financier_interested_user'][$prow->ID][$count]['uemail'] = $fuser->tff_email;
								$data['financier_interested_user'][$prow->ID][$count]['ucontact'] = $fuser->tff_contact;
								$data['financier_interested_user'][$prow->ID][$count]['uaddress'] = $fuser->tff_address;
								$data['financier_interested_user'][$prow->ID][$count]['uprofpic'] = $fuser->tff_pic_file;
								$data['financier_interested_user'][$prow->ID][$count]['company'] = $fuser->tfcom_name;
								$data['financier_interested_user'][$prow->ID][$count]['country'] = $fuser->tfc_name;
								$proposal = $this->plisting->get_project_proposal_by_id_uid_type($prow->ID, $fuser->tff_user_ref, 'f');
								$proposal_id = 0;
								if(!empty($proposal) && is_array($proposal) && sizeof($proposal) <> 0){
									$proposal_id = $proposal[0]->tpf_id;
								}
								$data['financier_interested_user'][$prow->ID][$count]['benif_accept'] = $fuser->tpf_beneficiary_accept;
								$data['financier_interested_user'][$prow->ID][$count]['proposal_id'] = $proposal_id;
								
								$rresult = $this->plisting->get_rating_info_by_project($prow->ID, $data['user_id'], $data['user_type_ref'], $fuser->tff_user_ref, 2);
							
								if(!empty($rresult) && is_array($rresult) && sizeof($rresult) <> 0){
									$data['financier_interested_user'][$prow->ID][$count]['benif_rating'] = $rresult[0]->tfur_rating_value;
								}else{
									$data['financier_interested_user'][$prow->ID][$count]['benif_rating'] = 0;
								}
								
								$ratinga = $this->plisting->get_user_rating_by_uid_type($fuser->tff_user_ref, 2);
							
								if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0){
									$data['financier_interested_user'][$prow->ID][$count++]['rating'] = $ratinga[0]->tfur_rating_value;
								}else{	
									$data['financier_interested_user'][$prow->ID][$count++]['rating'] = 0;
								}
							}
						}	
					}
				}
							
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
					
					$ccategories = $this->plisting->get_projects_by_categories_id($uresult[0]->tfcom_cat_ref);
				
					if($ccategories && !empty($ccategories) && is_array($ccategories) && sizeof($ccategories) <> 0){
						$data['pucategories'] = $ccategories;			
					}
				}	
			}
		}	
		
		
		if($data['user_type_ref'] == 1 || $data['user_type_ref'] == 2){
		
			$data["projects_listed"] = array();
			$data["provider_interested"] = array();
			$data["provider_interested_user"] = array();
			$data["financier_interested"] = array();
			$data["financier_interested_user"] = array();
			$data['invitation_accept'] = array();
			$data['saved_project'] = array();
			$data['proposal_submitted'] = array();
			$data['proposal_accepted'] = array();
			$data['proposal_info'] = array();
			$data['project_user_rating'] = array();
			$data['proposal_details_financier'] = array();
			$data['proposal_details_supplier'] = array();
			$data['supplier_info'] = array();
			$data["proposals_subcontractor"] = array();
			$data["beneficiary_provider_accepted"] = array();
			$data["beneficiary_financier_accepted"] = array();
			$data["supplier_project_proposals"] = array();
			$data["financier_project_proposals"] = array();
					
			$action = $this->input->post('action');
			$row_id = $this->input->post('row_id');
			$user_id = $this->input->post('user_id');
						
			if($action == 'remove_saved_project' && $row_id <> 0 && $user_id <> 0){
				
				$data_add = array();
				$data_add['tfusp_row_deleted'] = 1; 
				
				$result = $this->plisting->update_save_project($row_id, $user_id, $data_add);
				
				if(!empty($result) && is_array($result) && sizeof($result) <> 0){
					$data['msg'] = 'success';
					$data['msg_extra'] = 'Project has been successfully removed !';
				}
			}
			
			if($data['user_id'] <> 0){
				
				$data["projects_listed"] = $this->plisting->get_all_projects_public($data, $data['user_type_ref']);
				$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
				$data['check_company'] = $this->manage->get_company_info_by_uid($data['user_id']);
				
				$savedp = $this->plisting->get_saved_project_by_uid($data['user_id']);
				
				if(!empty($savedp) && is_array($savedp) && sizeof($savedp) <> 0){
					foreach($savedp as $svrow){
						array_push($data['saved_project'], $svrow->tfusp_project_ref);	
					}		
				}
				
				$data['all_invitation'] = $this->plisting->get_project_invitation_by_uid($data['user_id']);
				
				if($data['user_type_ref'] == 1){
				
					$proposals_subcontractor = $this->plisting->get_project_proposal_subcontractor_accepted_by_uid_type($data['user_id'], 'p');
					
					$invitation_accept = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'p');
					$proposal_submitted = $this->plisting->get_project_proposal_by_uid_type($data['user_id'], 'p');
					$proposal_accepted = $this->plisting->get_project_proposal_accepted_by_uid_type($data['user_id'], 'p');
					
					if(!empty($invitation_accept) && is_array($invitation_accept) && sizeof($invitation_accept) <> 0){
						
						foreach($invitation_accept as $invrow){
							array_push($data['invitation_accept'], $invrow->tfpi_project_ref);
						}	
					}
					
					if(!empty($proposals_subcontractor) && is_array($proposals_subcontractor) && sizeof($proposals_subcontractor) <> 0){
						
						foreach($proposals_subcontractor as $psrow){
							array_push($data["proposals_subcontractor"], $psrow->tpp_project_ref);
						}	
					}
					
					if(!empty($proposal_submitted) && is_array($proposal_submitted) && sizeof($proposal_submitted) <> 0){
						
						foreach($proposal_submitted as $psrow){
							array_push($data['proposal_submitted'], $psrow->tpp_project_ref);
							
							$data["supplier_project_proposals"][$psrow->tpp_project_ref] = array();
							$data["supplier_project_proposals"][$psrow->tpp_project_ref] = $this->plisting->get_project_proposal_by_id_uid_type($psrow->tpp_project_ref, $data['user_id'], 'p');
						}	
					}
					
					if(!empty($proposal_accepted) && is_array($proposal_accepted) && sizeof($proposal_accepted) <> 0){
						
						foreach($proposal_accepted as $parow){
							array_push($data['proposal_accepted'], $parow->tpp_project_ref);
							$data['proposal_info'][$parow->tpp_project_ref] = array();
							array_push($data['proposal_info'][$parow->tpp_project_ref], $parow->tpp_id);
						}	
					}else{
						if(!empty($proposals_subcontractor) && is_array($proposals_subcontractor) && sizeof($proposals_subcontractor) <> 0){
							
							foreach($proposals_subcontractor as $parow){
								array_push($data['proposal_accepted'], $parow->tpp_project_ref);
								$data['proposal_info'][$parow->tpp_project_ref] = array();
								$data['supplier_info'][$parow->tpp_project_ref] = array();
								array_push($data['proposal_info'][$parow->tpp_project_ref], $parow->tpp_id);
								array_push($data['supplier_info'][$parow->tpp_project_ref], $parow->tpp_user_ref);
							}
						}
					}
				}
				
				if($data['user_type_ref'] == 2){
					
					$invitation_accept = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'f');
					$proposal_submitted = $this->plisting->get_project_proposal_by_uid_type($data['user_id'], 'f');
					$proposal_accepted = $this->plisting->get_project_proposal_accepted_by_uid_type($data['user_id'], 'f');
					
					if(!empty($invitation_accept) && is_array($invitation_accept) && sizeof($invitation_accept) <> 0){
						
						foreach($invitation_accept as $invrow){
							array_push($data['invitation_accept'], $invrow->tfpi_project_ref);
						}	
					}
					
					if(!empty($proposal_submitted) && is_array($proposal_submitted) && sizeof($proposal_submitted) <> 0){
						
						foreach($proposal_submitted as $psrow){
							array_push($data['proposal_submitted'], $psrow->tpf_project_ref);
							
							$data["financier_project_proposals"][$psrow->tpf_project_ref] = array();
							$data["financier_project_proposals"][$psrow->tpf_project_ref] = $this->plisting->get_project_proposal_by_id_uid_type($psrow->tpf_project_ref, $data['user_id'], 'f');
						}	
					}
					
					if(!empty($proposal_accepted) && is_array($proposal_accepted) && sizeof($proposal_accepted) <> 0){
						
						foreach($proposal_accepted as $parow){
							array_push($data['proposal_accepted'], $parow->tpf_project_ref);
							$data['proposal_info'][$parow->tpf_project_ref] = array();
							array_push($data['proposal_info'][$parow->tpf_project_ref], $parow->tpf_id);
						}	
					}
				}
								
				if(!empty($data["projects_listed"]) && is_array($data["projects_listed"]) && sizeof($data["projects_listed"]) <> 0){
					
					foreach($data["projects_listed"] as $plrow){
						
						$data["beneficiary_provider_accepted"][] = $this->plisting->fetch_beneficiary_accepted_invitaion($plrow->ID, 1);
						$data["beneficiary_financier_accepted"][] = $this->plisting->fetch_beneficiary_accepted_invitaion($plrow->ID, 2);
											
						if(!empty($data['proposal_accepted']) && sizeof($data['proposal_accepted']) <> 0 && in_array($plrow->ID, $data['proposal_accepted'])) {
							
							$rresult = $this->plisting->get_rating_info_by_project($plrow->ID, $data['user_id'], $data['user_type_ref'], $plrow->userID, $plrow->userType);
							
							if(!empty($rresult) && is_array($rresult) && sizeof($rresult) <> 0){
								$data['project_user_rating'][$plrow->ID] = $rresult[0]->tfur_rating_value;
							}else{
								$data['project_user_rating'][$plrow->ID] = 0;
							}	
						}
					}	
				}
				
				if(!empty($data["projects_listed"]) && is_array($data["projects_listed"]) && sizeof($data["projects_listed"]) <> 0){
					
					foreach($data["projects_listed"] as $prow){
						$data["provider_interested"][$prow->ID] = $this->plisting->fetch_accepted_invitaion($prow->ID, 1);
						$data["financier_interested"][$prow->ID] = $this->plisting->fetch_accepted_invitaion($prow->ID, 2);
						
						$data['proposal_details_financier'][$prow->ID] = array();
						$data['proposal_details_financier'][$prow->ID] = $this->plisting->get_sc_financier_proposals_by_project_and_user($prow->ID, $data['user_id']);
						
						if(!empty($data["provider_interested"][$prow->ID]) && is_array($data["provider_interested"][$prow->ID]) && sizeof($data["provider_interested"][$prow->ID]) <> 0){
							
							$count = 0;
							
							foreach($data["provider_interested"][$prow->ID] as $puser){
								
								$data['provider_interested_user'][$prow->ID][$count]['uid'] = $puser->tfsp_user_ref;
								$data['provider_interested_user'][$prow->ID][$count]['ufname'] = $puser->tfsp_fname;
								$data['provider_interested_user'][$prow->ID][$count]['ulname'] = $puser->tfsp_lname;
								$data['provider_interested_user'][$prow->ID][$count]['uemail'] = $puser->tfsp_email;
								$data['provider_interested_user'][$prow->ID][$count]['ucontact'] = $puser->tfsp_contact;
								$data['provider_interested_user'][$prow->ID][$count]['uaddress'] = $puser->tfsp_address;
								$data['provider_interested_user'][$prow->ID][$count]['uprofpic'] = $puser->tfsp_pic_file;
								$data['provider_interested_user'][$prow->ID][$count]['company'] = $puser->tfcom_name;
								$data['provider_interested_user'][$prow->ID][$count]['country'] = $puser->tfc_name;
								
								$ratinga = $this->plisting->get_user_rating_by_uid_type($puser->tfsp_user_ref, 1);
						
								if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
									$data['provider_interested_user'][$prow->ID][$count++]['rating'] = $ratinga[0]->tfur_rating_value;
								}else{	
									$data['provider_interested_user'][$prow->ID][$count++]['rating'] = 0;
								}
							}	
						}
						
						if(!empty($data["financier_interested"][$prow->ID]) && is_array($data["financier_interested"][$prow->ID]) && sizeof($data["financier_interested"][$prow->ID]) <> 0){
							
							$count = 0;
							
							foreach($data["financier_interested"][$prow->ID] as $fuser){
														
								$data['financier_interested_user'][$prow->ID][$count]['uid'] = $fuser->tff_user_ref;
								$data['financier_interested_user'][$prow->ID][$count]['ufname'] = $fuser->tff_fname;
								$data['financier_interested_user'][$prow->ID][$count]['ulname'] = $fuser->tff_lname;
								$data['financier_interested_user'][$prow->ID][$count]['uemail'] = $fuser->tff_email;
								$data['financier_interested_user'][$prow->ID][$count]['ucontact'] = $fuser->tff_contact;
								$data['financier_interested_user'][$prow->ID][$count]['uaddress'] = $fuser->tff_address;
								$data['financier_interested_user'][$prow->ID][$count]['uprofpic'] = $fuser->tff_pic_file;
								$data['financier_interested_user'][$prow->ID][$count]['company'] = $fuser->tfcom_name;
								$data['financier_interested_user'][$prow->ID][$count]['country'] = $fuser->tfc_name;
								
								$ratinga = $this->plisting->get_user_rating_by_uid_type($fuser->tff_user_ref, 2);
						
								if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
									$data['financier_interested_user'][$prow->ID][$count++]['rating'] = $ratinga[0]->tfur_rating_value;
								}else{	
									$data['financier_interested_user'][$prow->ID][$count++]['rating'] = 0;
								}
							}
						}	
					}
				}
							
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
					
				$ccategories = $this->plisting->get_projects_by_categories_uid($data['user_id']);
				
				if($ccategories && !empty($ccategories) && is_array($ccategories) && sizeof($ccategories) <> 0){
					$data['pucategories'] = $ccategories;			
				}
			}
		}	
						
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/dashboard_home', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/listing_scripts', $data);
		$this->load->view('pages_scripts/dashboard_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function smart_contract()
	{
		$data = array();
		$result = array();
		
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
		$data['f_notification'] = 0;
		$data['p_notification'] = 0;
		$data['b_notification'] = 0;
		$data['pp_notification'] = 0;
		$data['ppex_notification'] = 0;
		$data['pcategories'] = array();
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		if($data['user_type_ref'] <> 3){
			$data['page'] = 'dashboardpf';
		}else{
			$data['page'] = 'dashboard';
		}
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data["projects_listed"] = '';
		$data["provider_interested"] = array();
		$data["provider_interested_user"] = array();
		$data["financier_interested"] = array();
		$data["financier_initiated"] = array();
		$data['financier_initiated_user'] = array();
		$data["financier_interested_user"] = array();
		$data['project_user_rating'] = array();
		$data["beneficiary_provider_accepted"] = array();
		$data["beneficiary_financier_accepted"] = array();
		$data['invitation_accept'] = array();
		$data['proposal_submitted'] = array();
		$data['proposal_accepted'] = array();
		$data['proposal_info'] = array();
		$data['supplier_info'] = array();
		$data["proposals_subcontractor"] = array();
		$data["proposals_subcontractor_info"] = array();
		
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
						
		if($data['user_id'] <> 0){
			
			if($data['user_type_ref'] == 1){
			
				$proposals_subcontractor = $this->plisting->get_project_proposal_subcontractor_accepted_by_uid_type($data['user_id'], 'p');
				$invitation_accept = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'p');
				$proposal_submitted = $this->plisting->get_project_proposal_by_uid_type($data['user_id'], 'p');
				$proposal_accepted = $this->plisting->get_project_proposal_accepted_by_uid_type($data['user_id'], 'p');
				
				if(!empty($invitation_accept) && is_array($invitation_accept) && sizeof($invitation_accept) <> 0){
					
					foreach($invitation_accept as $invrow){
						array_push($data['invitation_accept'], $invrow->tfpi_project_ref);
					}	
				}
				
				if(!empty($proposals_subcontractor) && is_array($proposals_subcontractor) && sizeof($proposals_subcontractor) <> 0){
					
					foreach($proposals_subcontractor as $psrow){
						array_push($data["proposals_subcontractor"], $psrow->tpp_project_ref);
					}	
				}
				
				if(!empty($proposal_submitted) && is_array($proposal_submitted) && sizeof($proposal_submitted) <> 0){
					
					foreach($proposal_submitted as $psrow){
						array_push($data['proposal_submitted'], $psrow->tpp_project_ref);
					}	
				}
				
				if(!empty($proposal_accepted) && is_array($proposal_accepted) && sizeof($proposal_accepted) <> 0){
					
					foreach($proposal_accepted as $parow){
						array_push($data['proposal_accepted'], $parow->tpp_rejected);
						$data['proposal_info'][$parow->tpp_project_ref] = array();
						array_push($data['proposal_info'][$parow->tpp_project_ref], $parow->tpp_id);
					}	
				}else{
					if(!empty($proposals_subcontractor) && is_array($proposals_subcontractor) && sizeof($proposals_subcontractor) <> 0){
						
						foreach($proposals_subcontractor as $parow){
							array_push($data['proposal_accepted'], $parow->tpp_project_ref);
							$data['proposal_info'][$parow->tpp_project_ref] = array();
							$data['supplier_info'][$parow->tpp_project_ref] = array();
							array_push($data['proposal_info'][$parow->tpp_project_ref], $parow->tpp_id);
							array_push($data['supplier_info'][$parow->tpp_project_ref], $parow->tpp_user_ref);
						}
						
					}
				}
			}
			
			if($data['user_type_ref'] == 2){
				
				$invitation_accept = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'f');
				$proposal_submitted = $this->plisting->get_project_proposal_by_uid_type($data['user_id'], 'f');
				$proposal_accepted = $this->plisting->get_project_proposal_accepted_by_uid_type($data['user_id'], 'f');
				
				if(!empty($invitation_accept) && is_array($invitation_accept) && sizeof($invitation_accept) <> 0){
					
					foreach($invitation_accept as $invrow){
						array_push($data['invitation_accept'], $invrow->tfpi_project_ref);
					}	
				}
				
				if(!empty($proposal_submitted) && is_array($proposal_submitted) && sizeof($proposal_submitted) <> 0){
					
					foreach($proposal_submitted as $psrow){
						array_push($data['proposal_submitted'], $psrow->tpf_project_ref);
					}	
				}
				
				if(!empty($proposal_accepted) && is_array($proposal_accepted) && sizeof($proposal_accepted) <> 0){
					
					foreach($proposal_accepted as $parow){
						array_push($data['proposal_accepted'], $parow->tpf_project_ref);
						$data['proposal_info'][$parow->tpf_project_ref] = array();
						array_push($data['proposal_info'][$parow->tpf_project_ref], $parow->tpf_id);
					}	
				}
			}
					
			$data["projects_listed"] = $this->plisting->get_all_sc_projects($data['user_id']);
			$data["projects_listedf"] = $this->plisting->get_all_sc_financier_projects($data['user_id']);
			// $data["projects_listedp"] = $this->plisting->get_all_sc_supplier_projects($data['user_id']);
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
			$data['check_company'] = $this->manage->get_company_info_by_uid($data['user_id']);
			$data['all_invitation'] = $this->plisting->get_project_invitation_by_uid($data['user_id']);
			
			if($user['user_type_ref'] == 1){
				$data['invitation_accept'] = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'p');
				$data["projects_listed"] = $this->plisting->get_all_sc_projects($data['user_id']);
			}
		
			if($user['user_type_ref'] == 2){
				$data['invitation_accept'] = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'f');
				$data["projects_listedf"] = $this->plisting->get_all_sc_financier_projects_self($data['user_id']);
			}
			
			if(!empty($data["projects_listedf"]) && is_array($data["projects_listedf"]) && sizeof($data["projects_listedf"]) <> 0){
				
				foreach($data["projects_listedf"] as $prow){
					
					$data["beneficiary_financier_accepted"][] = $this->plisting->fetch_beneficiary_accepted_invitaion($prow->ID, 2);
					$data["financier_interested"][$prow->ID] = array();
					$data["financier_interested"][$prow->ID] = $this->plisting->fetch_accepted_invitaion($prow->ID, 2);
					$data["financier_initiated"][$prow->ID] = array();
					$data["financier_initiated"][$prow->ID] = $this->plisting->get_all_sc_financier_initiate_proposals_by_project($prow->ID);
					
					if(!empty($data["financier_interested"][$prow->ID]) && is_array($data["financier_interested"][$prow->ID]) && sizeof($data["financier_interested"][$prow->ID]) <> 0){
						
						$count = 0;
						
						foreach($data["financier_interested"][$prow->ID] as $fuser){
													
							$data['financier_interested_user'][$prow->ID][$count]['uid'] = $fuser->tff_user_ref;
							$data['financier_interested_user'][$prow->ID][$count]['ufname'] = $fuser->tff_fname;
							$data['financier_interested_user'][$prow->ID][$count]['ulname'] = $fuser->tff_lname;
							$data['financier_interested_user'][$prow->ID][$count]['uemail'] = $fuser->tff_email;
							$data['financier_interested_user'][$prow->ID][$count]['ucontact'] = $fuser->tff_contact;
							$data['financier_interested_user'][$prow->ID][$count]['uaddress'] = $fuser->tff_address;
							$data['financier_interested_user'][$prow->ID][$count]['uprofpic'] = $fuser->tff_pic_file;
							$data['financier_interested_user'][$prow->ID][$count]['company'] = $fuser->tfcom_name;
							$data['financier_interested_user'][$prow->ID][$count]['country'] = $fuser->tfc_name;
							$proposal = $this->plisting->get_project_proposal_by_id_uid_type($prow->ID, $fuser->tff_user_ref, 'f');
							$proposal_id = 0;
							if(!empty($proposal) && is_array($proposal) && sizeof($proposal) <> 0){
								$proposal_id = $proposal[0]->tpf_id;
							}
							$data['financier_interested_user'][$prow->ID][$count]['benif_accept'] = $fuser->tpf_beneficiary_accept;
							$data['financier_interested_user'][$prow->ID][$count]['proposal_id'] = $proposal_id;
							
							$rresult = $this->plisting->get_rating_info_by_project($prow->ID, $data['user_id'], $data['user_type_ref'], $fuser->tff_user_ref, 2);
						
							if(!empty($rresult) && is_array($rresult) && sizeof($rresult) <> 0){
								$data['financier_interested_user'][$prow->ID][$count]['benif_rating'] = $rresult[0]->tfur_rating_value;
							}else{
								$data['financier_interested_user'][$prow->ID][$count]['benif_rating'] = 0;
							}
							
							$ratinga = $this->plisting->get_user_rating_by_uid_type($fuser->tff_user_ref, 2);
						
							if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0){
								$data['financier_interested_user'][$prow->ID][$count++]['rating'] = $ratinga[0]->tfur_rating_value;
							}else{	
								$data['financier_interested_user'][$prow->ID][$count++]['rating'] = 0;
							}
						}
					}
										
					if(!empty($data["financier_initiated"][$prow->ID]) && is_array($data["financier_initiated"][$prow->ID]) && sizeof($data["financier_initiated"][$prow->ID]) <> 0){
						
						$count = 0;
						
						foreach($data["financier_initiated"][$prow->ID] as $fiser){
													
							$data['financier_initiated_user'][$prow->ID][$count]['uid'] = $fiser->tff_user_ref;
							$data['financier_initiated_user'][$prow->ID][$count]['ufname'] = $fiser->tff_fname;
							$data['financier_initiated_user'][$prow->ID][$count]['ulname'] = $fiser->tff_lname;
							$data['financier_initiated_user'][$prow->ID][$count]['uemail'] = $fiser->tff_email;
							$data['financier_initiated_user'][$prow->ID][$count]['ucontact'] = $fiser->tff_contact;
							$data['financier_initiated_user'][$prow->ID][$count]['uaddress'] = $fiser->tff_address;
							$data['financier_initiated_user'][$prow->ID][$count]['uprofpic'] = $fiser->tff_pic_file;
							$data['financier_initiated_user'][$prow->ID][$count]['company'] = $fiser->tfcom_name;
							$data['financier_initiated_user'][$prow->ID][$count]['country'] = $fiser->tfc_name;
							$proposal = $this->plisting->get_project_proposal_by_id_uid_type($prow->ID, $fiser->tff_user_ref, 'f');
							$proposal_id = 0;
							if(!empty($proposal) && is_array($proposal) && sizeof($proposal) <> 0){
								$proposal_id = $proposal[0]->tpf_id;
							}
							$data['financier_initiated_user'][$prow->ID][$count]['benif_accept'] = $fiser->tpf_beneficiary_accept;
							$data['financier_initiated_user'][$prow->ID][$count]['proposal_id'] = $proposal_id;
							
							$rresult = $this->plisting->get_rating_info_by_project($prow->ID, $data['user_id'], $data['user_type_ref'], $fiser->tff_user_ref, 2);
						
							if(!empty($rresult) && is_array($rresult) && sizeof($rresult) <> 0){
								$data['financier_initiated_user'][$prow->ID][$count]['benif_rating'] = $rresult[0]->tfur_rating_value;
							}else{
								$data['financier_initiated_user'][$prow->ID][$count]['benif_rating'] = 0;
							}
							
							$ratinga = $this->plisting->get_user_rating_by_uid_type($fiser->tff_user_ref, 2);
						
							if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0){
								$data['financier_initiated_user'][$prow->ID][$count++]['rating'] = $ratinga[0]->tfur_rating_value;
							}else{	
								$data['financier_initiated_user'][$prow->ID][$count++]['rating'] = 0;
							}
						}
					}
				}
			}		
			
			if(!empty($data["projects_listed"]) && is_array($data["projects_listed"]) && sizeof($data["projects_listed"]) <> 0){
				
				foreach($data["projects_listed"] as $prow){
				
					$data['proposal_details_financier'][$prow->ID] = array();
					$data['proposal_details_financier'][$prow->ID] = $this->plisting->get_sc_financier_proposals_by_project_and_user($prow->ID, $data['user_id']);
					
					$data["beneficiary_provider_accepted"][] = $this->plisting->fetch_beneficiary_accepted_invitaion($prow->ID, 1);
											
					$data["provider_interested"][$prow->ID] = $this->plisting->fetch_accepted_invitaion($prow->ID, 1);
					
					$data["proposals_subcontractor_info"][] = $this->plisting->get_proposal_by_contractor_ref($prow->ID, $data['user_id'], 'p');
					
					if(!empty($data["provider_interested"][$prow->ID]) && is_array($data["provider_interested"][$prow->ID]) && sizeof($data["provider_interested"][$prow->ID]) <> 0){
						
						$count = 0;
						
						foreach($data["provider_interested"][$prow->ID] as $puser){
							
							$data['provider_interested_user'][$prow->ID][$count]['uid'] = $puser->tfsp_user_ref;
							$data['provider_interested_user'][$prow->ID][$count]['ufname'] = $puser->tfsp_fname;
							$data['provider_interested_user'][$prow->ID][$count]['ulname'] = $puser->tfsp_lname;
							$data['provider_interested_user'][$prow->ID][$count]['uemail'] = $puser->tfsp_email;
							$data['provider_interested_user'][$prow->ID][$count]['ucontact'] = $puser->tfsp_contact;
							$data['provider_interested_user'][$prow->ID][$count]['uaddress'] = $puser->tfsp_address;
							$data['provider_interested_user'][$prow->ID][$count]['uprofpic'] = $puser->tfsp_pic_file;
							$data['provider_interested_user'][$prow->ID][$count]['company'] = $puser->tfcom_name;
							$data['provider_interested_user'][$prow->ID][$count]['country'] = $puser->tfc_name;
							$proposal = $this->plisting->get_project_proposal_by_id_uid_type($prow->ID, $puser->tfsp_user_ref, 'p');
							$proposal_id = 0;
							if(!empty($proposal) && is_array($proposal) && sizeof($proposal) <> 0){
								$proposal_id = $proposal[0]->tpp_id;
							}
							$data['provider_interested_user'][$prow->ID][$count]['benif_accept'] = $puser->tpp_beneficiary_accept;
							$data['provider_interested_user'][$prow->ID][$count]['proposal_id'] = $proposal_id;
							$rresult = $this->plisting->get_rating_info_by_project($prow->ID, $data['user_id'], $data['user_type_ref'], $puser->tfsp_user_ref, 1);
						
							if(!empty($rresult) && is_array($rresult) && sizeof($rresult) <> 0){
								$data['provider_interested_user'][$prow->ID][$count]['benif_rating'] = $rresult[0]->tfur_rating_value;
							}else{
								$data['provider_interested_user'][$prow->ID][$count]['benif_rating'] = 0;
							}
							
							$ratinga = $this->plisting->get_user_rating_by_uid_type($puser->tfsp_user_ref, 1);
						
							if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0){
								$data['provider_interested_user'][$prow->ID][$count++]['rating'] = $ratinga[0]->tfur_rating_value;
							}else{	
								$data['provider_interested_user'][$prow->ID][$count++]['rating'] = 0;
							}
						}	
					}
															
					if(!empty($data['proposal_accepted']) && sizeof($data['proposal_accepted']) <> 0 && in_array($prow->ID, $data['proposal_accepted'])) {
						
						$rresult = $this->plisting->get_rating_info_by_project($prow->ID, $data['user_id'], $data['user_type_ref'], $prow->userID, $prow->userType);
						
						if(!empty($rresult) && is_array($rresult) && sizeof($rresult) <> 0){
							$data['project_user_rating'][$prow->ID] = $rresult[0]->tfur_rating_value;
						}else{
							$data['project_user_rating'][$prow->ID] = 0;
						}	
					}
				}
			}
						
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
				
				$ccategories = $this->plisting->get_projects_by_categories_id($uresult[0]->tfcom_cat_ref);
			
				if($ccategories && !empty($ccategories) && is_array($ccategories) && sizeof($ccategories) <> 0){
					$data['pucategories'] = $ccategories;			
				}
			}	
		}
				
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/dashboard_smart_contract', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/listing_scripts', $data);
		$this->load->view('pages_scripts/dashboard_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function siteURL() {
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		// $domainName = $_SERVER['HTTP_HOST'] . '/';
		$domainName = $_SERVER['HTTP_HOST'];
		// return $protocol . $domainName;
		return $domainName;
	}

	public function financier(){
		
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
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/financier_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footern');
	}
}
	