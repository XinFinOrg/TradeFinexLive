<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'rating', 'notification'));
		$this->load->library(array('session', 'pagination'));
		$this->load->model(array('plisting', 'manage', 'notification'));
		
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
		
	public function details()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'listing';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		
		$data['user_id'] = 0;
		$data['project_saved'] = 0;
		$data['user_type_ref'] = 0;
		$data['search_keyword'] = '';
		
		$data['pcategories'] = array();
		$data['pcontracts'] = array();
		$data['pcountries'] = array();
		$data['psectors'] = array();
		$data['projects_listed'] = array();
		$data['invitation_accept'] = array();
		$data['proposal_submitted'] = array();
		$data['project_proposal'] = array();
		
		$data['scolumn'] = array();
		$data['scatval'] = array();
		$data['sconval'] = array();
		$data['awarded'] = array();
		$data['pposted'] = array();
		$data['sectors'] = array();
		$data['featured'] = array();
		$data['scountry'] = array();
		$data['suser_listed'] = array();
		$data['proposal_accepted'] = array();
		$data['supplier_info'] = array();
		$data["proposals_subcontractor"] = array();
		$data["proposals_subcontractor_info"] = array();
		$data["provider_interested"] = array();
		$data["financier_interested"] = array();
		$data["beneficiary_provider_accepted"] = array();
		$data["beneficiary_financier_accepted"] = array();
			
		$data['saved_project'] = array();
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
			
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			// redirect(base_url().'log/out');
		}
		
		$domain = $this->siteURL();
		
		$domain_arr = explode('.', $domain);
		
		$domain_type = $domain_arr[0];
		$domain_name = '';
		
		if(!empty($domain_arr) && sizeof($domain_arr) <> 0){
					
			for($i  = 1; $i < sizeof($domain_arr); $i++){
				
				if($i > 1){
					$domain_name .= '.'.$domain_arr[$i];
				}else{
					$domain_name .= $domain_arr[$i];
				}
			}
		}
				
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
				
		$ccategories = $this->plisting->get_categories();
		
		if($ccategories && !empty($ccategories) && is_array($ccategories) && sizeof($ccategories) <> 0){
			$data['pcategories'] = $ccategories;			
		}
		
		$ccontracts = $this->plisting->get_contracts();
		
		if($ccontracts && !empty($ccontracts) && is_array($ccontracts) && sizeof($ccontracts) <> 0){
			$data['pcontracts'] = $ccontracts;			
		}
		
		$csectors = $this->plisting->get_sectors();
		
		if($csectors && !empty($csectors) && is_array($csectors) && sizeof($csectors) <> 0){
			$data['psectors'] = $csectors;			
		}
		
		$ccountries = $this->plisting->get_country();
		
		if($ccountries && !empty($ccountries) && is_array($ccountries) && sizeof($ccountries) <> 0){
			$data['pcountries'] = $ccountries;			
		}
				
		$data['user_access_domain_type'] = $domain_type;
		$data['user_access_domain_name'] = $domain_name;
				
		if($data['user_type_ref'] <> 3){
			$all_projects = $this->plisting->get_all_projects_public($data, $data['user_type_ref']);
		}else{	
			$all_projects = $this->plisting->get_all_projects($data, $data['user_id']);
		}
		
		if($all_projects && !empty($all_projects) && is_array($all_projects) && sizeof($all_projects) <> 0){
			$data['projects_listed'] = $all_projects;			
		}
			
		$data['type'] = '';
		$data['sval'] = '';
		$data['sort_order'] = '';
		
		if($this->uri->segment(3)){
			$page = $this->uri->segment(3);
		}
		else{
			$page = 1;
		}
		
		/* if(isset($_GET['per_page']) && $_GET['per_page']){
			$page = $_GET['per_page'];
		}
		else{
			$page = 1;
		} */
		
		$config = array();
		$config["base_url"] = base_url() . "listing/details";
		$total_row = sizeof($data['projects_listed']);
		$config["total_rows"] = $total_row;
		$config['use_page_numbers'] = TRUE;
		$config["per_page"] = 5;
		$config['num_links'] = 5; // $total_row;
		$config['uri_segment'] = 3;
		$config['cur_tag_open'] = '&nbsp;<a class="current page-link">';
		$config['cur_tag_close'] = '</a>';
		$config['page_query_string'] = FALSE;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
						
		$divisionR = $total_row / $config["per_page"];
		$wholeI = floor($divisionR);
		$fractiond = fmod($divisionR, strlen($wholeI));
		$fractiond = $fractiond * 10;
		
		if($fractiond > 0){
			$data['pages_count'] = $wholeI + 1;
		}else{
			$data['pages_count'] = $wholeI;
		}
						
		$data['total_rows'] = $total_row;
				
		$this->pagination->initialize($config);
		
		$data['curr_page'] = $page;
		
		if($wholeI == 0 && $fractiond == 0){
			$data['curr_page'] = 0;
		}
						
		$sort_order = $this->input->post('sort_order');
		$row_id = $this->input->post('row_id');
		$data['action'] = $action = $this->input->post('action');
		$data['suser_type'] = $suser_type = $this->input->post('suser_type');
		$sort_type = $this->input->post('sort_type');
		
		if(trim($action) == ''){
			$data['action'] = $action = 'search';
		}
				
		if($action){
			$this->session->set_userdata('action', $action);
		}else{
			$data['action'] = $this->session->userdata('action');
		}
				
		if($action == 'publish_job'){
			
			$data_add = array();
			$data_add['isDraft'] = 0;
					
			$result = $this->plisting->update_project_by_id($row_id, $data_add);
								
			if(is_array($result) && !empty($result) && sizeof($result) <> 0){
							
				if($result[0]->isDraft == 0){
					$data['msg'] = 'success';
					$data['msg_extra'] = 'Project has been successfully published!';
				}else{
					$data['msg'] = 'error';
					$data['msg_extra'] = 'Error occurred! Project has not been published.';
				}
			}	
		}

		if($action == 'cancel_job'){
			
			$data_add = array();
			$data_add['isDraft'] = 1;
					
			$result = $this->plisting->update_project_by_id($row_id, $data_add);
								
			if(is_array($result) && !empty($result) && sizeof($result) <> 0){
							
				if($result[0]->isDraft == 1){
					$data['msg'] = 'success';
					$data['msg_extra'] = 'Project has been successfully withdrawn!';
				}else{
					$data['msg'] = 'error';
					$data['msg_extra'] = 'Error occurred! Project has not been withdrawn.';
				}
			}	
		}
		
		if($action == 'save_job'){
			$sresult = $this->plisting->save_project($row_id, $data['user_id'], $data['user_type_ref']);
			
			if(!empty($sresult) && !is_array($sresult) && $sresult > 0){
				
				$data['project_saved']  = 1;
				$data['msg'] = 'success';
				$data['msg_extra'] = 'Project has been saved successfully !';
			
			}else if(!empty($sresult) && is_array($sresult) && sizeof($sresult) <> 0){
				
				$data['project_saved']  = 1;
				$data['msg'] = 'success';
				$data['msg_extra'] = 'Project was already saved !';
			
			}else{
				$data['msg'] = 'error';
				$data['msg_extra'] = 'Error occurred during addition. Try again!';
			}
		}
		
		if($sort_order <> ''){
			
			$this->session->set_userdata('sort_order', $sort_order);
			$data['sort_order'] = $sort_order;
			
			if($sort_order == 'asc' || $sort_order == 'desc'){
				$this->session->unset_userdata('col_name');
				$this->session->unset_userdata('col_val');
			}
			
		}else{
			
			$sort_order = $this->session->userdata('sort_order');
			
			if($sort_order == 'asc' || $sort_order == 'desc'){
				$this->session->unset_userdata('col_name');
				$this->session->unset_userdata('col_val');
			}
			
			$data['sort_order'] = $sort_order;
		}
		
		if($sort_order == ''){
			$data['sort_order'] = 'desc';
			$sort_order = 'desc';
		}
			
		if($data['user_type_ref'] <> 3){
			$data["projects_listed"] = $this->plisting->get_all_projects_public_pagi($data, $config["per_page"], $page, $sort_order, $data['user_type_ref']);
		}else{
			$data["projects_listed"] = $this->plisting->get_all_projects_pagi($data, $config["per_page"], $page, $sort_order, $data['user_id']);
		}	
		
		$data['proposal_details_financier'] = array();
		
		if(!empty($data["projects_listed"]) && is_array($data["projects_listed"]) && sizeof($data["projects_listed"]) <> 0){
			foreach($data["projects_listed"] as $plrow){
				$data['project_proposal'][$plrow->ID] = array();
				$data['proposal_details_financier'][$plrow->ID] = array();
				$data['proposal_details_financier'][$plrow->ID] = $this->plisting->get_sc_financier_proposals_by_project_and_user($plrow->ID, $data['user_id']);
				$data["provider_interested"][$plrow->ID] = $this->plisting->fetch_accepted_invitaion($plrow->ID, 1);
				$data["financier_interested"][$plrow->ID] = $this->plisting->fetch_accepted_invitaion($plrow->ID, 2);
		
				$data["beneficiary_provider_accepted"][$plrow->ID] = $this->plisting->fetch_beneficiary_accepted_invitaion($plrow->ID, 1);
				$data["beneficiary_financier_accepted"][$plrow->ID] = $this->plisting->fetch_beneficiary_accepted_invitaion($plrow->ID, 2);
				
				if($user['user_type_ref'] == 1){
					$data["proposals_subcontractor_info"] = $this->plisting->get_proposal_by_contractor_ref($plrow->ID, $data['user_id'], 'p');
				}
			}
		}
					
		$str_links = $this->pagination->create_links();
		$data["plinks"] = explode('&nbsp;', $str_links );
				
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
			
			$savedp = $this->plisting->get_saved_project_by_uid($data['user_id']);
			
			if(!empty($savedp) && is_array($savedp) && sizeof($savedp) <> 0){
				foreach($savedp as $svrow){
					array_push($data['saved_project'], $svrow->tfusp_project_ref);	
				}		
			}	
			
			if($user['user_type_ref'] == 1){
			
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
						$data['project_proposal'][$psrow->tpp_project_ref] = array();
						$data['project_proposal'][$psrow->tpp_project_ref] = $this->plisting->get_project_proposal_by_id_uid_type($psrow->tpp_project_ref, $data['user_id'], 'p');
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
			
			if($user['user_type_ref'] == 2){
				
				$invitation_accept = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'f');
				$proposal_submitted = $this->plisting->get_project_proposal_by_uid_type($data['user_id'], 'f');
				
				if(!empty($invitation_accept) && is_array($invitation_accept) && sizeof($invitation_accept) <> 0){
					
					foreach($invitation_accept as $invrow){
						array_push($data['invitation_accept'], $invrow->tfpi_project_ref);
					}	
				}
				
				if(!empty($proposal_submitted) && is_array($proposal_submitted) && sizeof($proposal_submitted) <> 0){
					
					foreach($proposal_submitted as $psrow){
						array_push($data['proposal_submitted'], $psrow->tpf_project_ref);
						$data['project_proposal'][$psrow->tpf_project_ref] = $this->plisting->get_project_proposal_by_id_uid_type($psrow->tpf_project_ref, $data['user_id'], 'f');
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
		}
		
		$data['all_projects_count'] = $this->plisting->get_project_all_count($data, $data['user_id']);
		$data['all_featured_projects_count'] = $this->plisting->get_featured_project_all_count($data, $data['user_id']);
		$data['all_closed_projects_count'] = $this->plisting->get_closed_project_all_count($data, $data['user_id']);
								
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/listing_details_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/listing_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function search()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'listing';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		
		$data['user_id'] = 0;
		$data['project_saved'] = 0;
		$data['user_type_ref'] = 0;
		$data['sort_order'] = '';
		$data['search_keyword'] = '';
		$data['type'] = '';
		$data['sval'] = '';
		$data['f_notification'] = 0;
		$data['p_notification'] = 0;
		$data['b_notification'] = 0;
		$data['pp_notification'] = 0;
		$data['ppex_notification'] = 0;
		
		$data['pcategories'] = array();
		$data['pcontracts'] = array();
		$data['pcountries'] = array();
		$data['psectors'] = array();
		$data['projects_listed'] = array();
		$data['invitation_accept'] = array();
		$data['proposal_submitted'] = array();
		$data['project_proposal'] = array();
		
		$data['scolumn'] = array();
		$data['scatval'] = array();
		$data['sconval'] = array();
		$data['awarded'] = array();
		$data['pposted'] = array();
		$data['sectors'] = array();
		$data['featured'] = array();
		$data['scountry'] = array();
		$data['proposal_accepted'] = array();
		$data['supplier_info'] = array();
		$data["proposals_subcontractor"] = array();
		$data["proposals_subcontractor_info"] = array();
		$data["provider_interested"] = array();
		$data["financier_interested"] = array();
		$data["beneficiary_provider_accepted"] = array();
		$data["beneficiary_financier_accepted"] = array();
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		); 
		
		$data['csrf'] = $csrf;
		
		$data['saved_project'] = array();
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			// redirect(base_url().'log/out');
		}
		
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
		
		$type = $this->input->post('col_name');
		$val = $this->input->post('col_val');
		$sort_order = $this->input->post('sort_order');
		$search_keyword = $this->input->post('search_keyword');
		$row_id = $this->input->post('row_id');
		
		$sort_type = $this->input->post('sort_type');
		
		$sess_action = $this->session->userdata('action');
		$action = $this->input->post('action');
		
		$sess_rutype = $this->session->userdata('suser_type');
		$rutype = $this->input->post('suser_type');
			
		if($sess_action){
			$data['action'] = $this->session->userdata('action');
		}else{
			$data['action'] = $this->input->post('action');
		}
		
		if($sess_rutype){
			$data['suser_type'] = $suser_type = $this->session->userdata('suser_type');
		}else{
			$data['suser_type'] = $suser_type = $this->input->post('suser_type');
		}
					
		if($action){
			$this->session->set_userdata('action', $action);
			$data['action'] = $action = $this->session->userdata('action');
		}
		
		if($rutype){
			$this->session->set_userdata('suser_type', $rutype);
			$data['suser_type'] = $suser_type = $this->session->userdata('suser_type');
		}
		
		if($action <> $sess_action){
			
			$this->session->unset_userdata('col_name');
			$this->session->unset_userdata('col_val');
			$this->session->unset_userdata('search_keyword');
			$this->session->unset_userdata('col_cat_vals');
			$this->session->unset_userdata('col_con_vals');
			$this->session->unset_userdata('col_coun_vals');
			$this->session->unset_userdata('col_post_vals');
			$this->session->unset_userdata('col_sec_vals');
			$this->session->unset_userdata('col_names');
		
		}
		
		$data['curr_page'] = 0;
		$data['pages_count'] = 0;
		
		if($search_keyword){
			
		}else{
			
			if($this->session->userdata('search_keyword')){
				$search_keyword = $this->session->userdata('search_keyword');
			}
		}
						
		if($action == 'publish_job'){
			
			$data_add = array();
			$data_add['isDraft'] = 0;
					
			$result = $this->plisting->update_project_by_id($row_id, $data_add);
								
			if(is_array($result) && !empty($result) && sizeof($result) <> 0){
							
				if($result[0]->isDraft == 0){
					$data['msg'] = 'success';
					$data['msg_extra'] = 'Project has been successfully published!';
				}else{
					$data['msg'] = 'error';
					$data['msg_extra'] = 'Error occurred! Project has not been published.';
				}
			}	
		}

		if($action == 'cancel_job'){
			
			$data_add = array();
			$data_add['isDraft'] = 1;
					
			$result = $this->plisting->update_project_by_id($row_id, $data_add);
								
			if(is_array($result) && !empty($result) && sizeof($result) <> 0){
							
				if($result[0]->isDraft == 1){
					$data['msg'] = 'success';
					$data['msg_extra'] = 'Project has been successfully withdrawn!';
				}else{
					$data['msg'] = 'error';
					$data['msg_extra'] = 'Error occurred! Project has not been withdrawn.';
				}
			}	
		}
		
		if($action == 'save_job'){
			
			$sresult = $this->plisting->save_project($row_id, $data['user_id'], $data['user_type_ref']);
			
			if(!empty($sresult) && !is_array($sresult) && $sresult > 0){
				
				$data['project_saved']  = 1;
				$data['msg'] = 'success';
				$data['msg_extra'] = 'Project has been saved successfully !';
			
			}else if(!empty($sresult) && is_array($sresult) && sizeof($sresult) <> 0){
				
				$data['project_saved']  = 1;
				$data['msg'] = 'success';
				$data['msg_extra'] = 'Project was already saved !';
			
			}else{
				$data['msg'] = 'error';
				$data['msg_extra'] = 'Error occurred during addition. Try again!';
			}
		}
		
		$ccategories = $this->plisting->get_categories();
		
		if($ccategories && !empty($ccategories) && is_array($ccategories) && sizeof($ccategories) <> 0){
			$data['pcategories'] = $ccategories;			
		}
		
		$ccontracts = $this->plisting->get_contracts();
		
		if($ccontracts && !empty($ccontracts) && is_array($ccontracts) && sizeof($ccontracts) <> 0){
			$data['pcontracts'] = $ccontracts;			
		}
		
		$csectors = $this->plisting->get_sectors();
		
		if($csectors && !empty($csectors) && is_array($csectors) && sizeof($csectors) <> 0){
			$data['psectors'] = $csectors;			
		}
		
		$ccountries = $this->plisting->get_country();
		
		if($ccountries && !empty($ccountries) && is_array($ccountries) && sizeof($ccountries) <> 0){
			$data['pcountries'] = $ccountries;			
		}
		
		if($action == 'search_user' || $sess_action == 'search_user'){
				
			if($type <> '' || $val <> ''){
				
				$this->session->set_userdata('col_name', $type);
				$this->session->set_userdata('col_val', $val);
				$this->session->set_userdata('search_keyword', $search_keyword);
				
				if(($sort_order == 'asc' || $sort_order == 'desc') && $val){
					$this->session->unset_userdata('col_name');
					$this->session->unset_userdata('col_val');
					$this->session->unset_userdata('search_keyword');
				}
								
				if($type == 'mainCategoryId'){
					
					if($this->session->userdata('col_cat_vals') && !empty($this->session->userdata('col_cat_vals'))){
						$data['scatval'] = $this->session->userdata('col_cat_vals');
					}
									
					$vala = explode(',', $val);
					
					foreach($data['scatval'] as $key => $value){	
						unset($data['scatval'][$key]);
					}	
					
					$data['scatval'] = array();
					
					for($c=0; $c < sizeof($vala); $c++){
						
						if(in_array($vala[$c], $data['scatval'])){
							
						}else{
							if($vala[$c]){
								array_push($data['scatval'], $vala[$c]);
							}
						}
					}
					
					foreach($data['scolumn'] as $key => $value){
						
						if($value == 'mainCategoryId' && sizeof($data['scatval']) == 0){
							unset($data['scolumn'][$key]);
						}
					}
					
					$this->session->set_userdata('col_cat_vals', $data['scatval']);
					$this->session->set_userdata('col_names', $data['scolumn']);
					
				}else{
					if($this->session->userdata('col_cat_vals')){
						$data['scatval'] = $this->session->userdata('col_cat_vals');
					}
				}
								
				if($type == 'sectors'){
					
					if($this->session->userdata('col_sec_vals') && !empty($this->session->userdata('col_sec_vals'))){
						$data['sectors'] = $this->session->userdata('col_sec_vals');
					}
											
					$vala = explode(',', $val);
					
					foreach($data['sectors'] as $key => $value){	
						unset($data['sectors'][$key]);
					}	
					
					$data['sectors'] = array();
					
					for($c=0; $c < sizeof($vala); $c++){
						
						if(in_array($vala[$c], $data['sectors'])){
							
						}else{
							if($vala[$c]){
								array_push($data['sectors'], $vala[$c]);
							}
						}
					}
					
					foreach($data['scolumn'] as $key => $value){
						
						if($value == 'sectors' && sizeof($data['sectors']) == 0){
							unset($data['scolumn'][$key]);
						}
					}
					
					$this->session->set_userdata('col_sec_vals', $data['sectors']);
					$this->session->set_userdata('col_names', $data['scolumn']);
					
				}else{
					if($this->session->userdata('col_sec_vals')){
						$data['sectors'] = $this->session->userdata('col_sec_vals');
					}
				}
				
				if($type == 'countryID'){
					
					if($this->session->userdata('col_coun_vals') && !empty($this->session->userdata('col_coun_vals'))){
						$data['scountry'] = $this->session->userdata('col_coun_vals');
					}
									
					$vala = explode(',', $val);
					
					foreach($data['scountry'] as $key => $value){	
						unset($data['scountry'][$key]);
					}
					
					$data['scountry'] = array();
					
					for($c=0; $c < sizeof($vala); $c++){
						
						if(in_array($vala[$c], $data['scountry'])){
							
						}else{
							if($vala[$c]){
								array_push($data['scountry'], $vala[$c]);
							}
						}
					}
									
					foreach($data['scolumn'] as $key => $value){
						
						if($value == 'countryID' && sizeof($data['scountry']) == 0){
							unset($data['scolumn'][$key]);
						}
					}
					
					$this->session->set_userdata('col_coun_vals', $data['scountry']);
					$this->session->set_userdata('col_names', $data['scolumn']);
					
				}else{
					if($this->session->userdata('col_coun_vals')){
						$data['scountry'] = $this->session->userdata('col_coun_vals');
					}
				}
								
				$data['type'] = $type;
				$data['sval'] = $val;
				$data['sort_order'] = $sort_order;
				$data['search_keyword'] = $search_keyword;
				
				if(sizeof($data['scatval']) == 0 && sizeof($data['sectors']) == 0 && sizeof($data['scountry']) == 0){
				
					$this->session->unset_userdata('col_cat_vals');
					$this->session->unset_userdata('col_coun_vals');
					$this->session->unset_userdata('col_sec_vals');
					$this->session->unset_userdata('col_names');
					
					$data['scatval'] = array();
					$data['sectors'] = array();
					$data['scountry'] = array();
					$data['scolumn'] = array();
					
					if($sort_order == ''){
						$data['sort_order'] = 'desc';
						$sort_order = 'desc';
					}
				}
			}else{
						
				if($sort_order == 'asc' || $sort_order == 'desc'){
					
					$this->session->unset_userdata('col_name');
					$this->session->unset_userdata('col_val');
					$this->session->unset_userdata('search_keyword');
					$this->session->unset_userdata('col_cat_vals');
					$this->session->unset_userdata('col_coun_vals');
					$this->session->unset_userdata('col_sec_vals');
					$this->session->unset_userdata('col_names');
				}
			
				$type = $this->session->userdata('col_name');
				$val = $this->session->userdata('col_val');
				
				if($type <> 'featured' || $type <> 'awardStatus'){	
					
					if($this->session->userdata('col_names'))
						$data['scolumn'] = $this->session->userdata('col_names');
				}
				
				if($type == 'mainCategoryId'){
					
					if($this->session->userdata('col_cat_vals'))
						$data['scatval'] = $this->session->userdata('col_cat_vals');
				}
				
				if($type == 'sectors'){
					
					if($this->session->userdata('col_sec_vals'))
						$data['sectors'] = $this->session->userdata('col_sec_vals');
				}
				
				if($type == 'countryID'){
					
					if($this->session->userdata('col_coun_vals'))
						$data['scountry'] = $this->session->userdata('col_coun_vals');
				}
							
				if($this->session->userdata('search_keyword')){
					$search_keyword = $this->session->userdata('search_keyword');
				}
									
				if(sizeof($data['scatval']) == 0 && sizeof($data['sectors']) == 0 && sizeof($data['scountry']) == 0){
					
					if($sort_order == ''){
						
						$data['sort_order'] = 'desc';
						$sort_order = 'desc';
					}
				}
			}
			
			$data['type'] = $type;
			$data['sval'] = $val;
			$data['sort_order'] = $sort_order;
			$data['search_keyword'] = $search_keyword;
						
			if($sort_order <> ''){
				
				$this->session->set_userdata('sort_order', $sort_order);
				
			}else{
				
				$sort_order = $this->session->userdata('sort_order');
			}
						
			$all_users = $this->plisting->get_user_public_by_skey_type($data, $type, $val, $search_keyword, $data['user_type_ref'], $data['user_id'], $suser_type);
						 		
			$data['suser_listed'] = array();
			
			if($all_users && !empty($all_users) && is_array($all_users) && sizeof($all_users) <> 0){
				$data['suser_listed'] = $all_users;			
			}
					
			$config = array();
			$config["base_url"] = base_url() . "listing/search";
			$total_row = sizeof($data['suser_listed']);
			$config["total_rows"] = $total_row;
			$config['use_page_numbers'] = TRUE;
			$config["per_page"] = 5;
			$config['num_links'] = 5; // $total_row;
			$config['cur_tag_open'] = '&nbsp;<a class="current page-link">';
			$config['cur_tag_close'] = '</a>';
			$config['page_query_string'] = FALSE;
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$data['total_rows'] = $total_row;
			
			/* if(isset($_GET['per_page']) && $_GET['per_page']){
				$page = $_GET['per_page'];
			}
			else{
				$page = 1;
			} */
			
			if($this->uri->segment(3)){
				$page = $this->uri->segment(3);
			}
			else{
				$page = 1;
			}
					
			$divisionR = $total_row / $config["per_page"];
			$wholeI = floor($divisionR);
			$fractiond = fmod($divisionR, strlen($wholeI));
			$fractiond = $fractiond * 10;
			
			if($fractiond > 1){
				$data['pages_count'] = $wholeI + 1;
			}else{
				$data['pages_count'] = $wholeI;
			}
						
			$this->pagination->initialize($config);
						
			$data['curr_page'] = $page;
			
			if($wholeI == 0 && $fractiond == 0){
				$data['curr_page'] = 0;
			}
			
			$data['suser_listed'] = $this->plisting->get_user_public_by_skey_type_pagi($data, $type, $val, $search_keyword, $config["per_page"], $page, $data['user_type_ref'], $data['user_id'], $suser_type);
				
		}
		else{
						
			if($type <> '' || $val <> ''){
				
				$this->session->set_userdata('col_name', $type);
				$this->session->set_userdata('col_val', $val);
				$this->session->set_userdata('search_keyword', $search_keyword);
				
				if(($sort_order == 'asc' || $sort_order == 'desc') && $val){
					$this->session->unset_userdata('col_name');
					$this->session->unset_userdata('col_val');
					$this->session->unset_userdata('search_keyword');
				}
								
				if($type <> 'featured' || $type <> 'awardStatus'){	
					
					if($this->session->userdata('col_names') && !empty($this->session->userdata('col_names')))
						$data['scolumn'] = $this->session->userdata('col_names');
					
					if(in_array($type, $data['scolumn'])){
						// already in array
					}else{	
						array_push($data['scolumn'], $type);
					}
						
					$this->session->set_userdata('col_names', $data['scolumn']);
				}
				
				if($type == 'mainCategoryId'){
					
					if($this->session->userdata('col_cat_vals') && !empty($this->session->userdata('col_cat_vals'))){
						$data['scatval'] = $this->session->userdata('col_cat_vals');
					}
									
					$vala = explode(',', $val);
					
					foreach($data['scatval'] as $key => $value){	
						unset($data['scatval'][$key]);
					}	
					
					$data['scatval'] = array();
					
					for($c=0; $c < sizeof($vala); $c++){
						
						if(in_array($vala[$c], $data['scatval'])){
							
						}else{
							if($vala[$c]){
								array_push($data['scatval'], $vala[$c]);
							}
						}
					}
					
					foreach($data['scolumn'] as $key => $value){
						
						if($value == 'mainCategoryId' && sizeof($data['scatval']) == 0){
							unset($data['scolumn'][$key]);
						}
					}
					
					$this->session->set_userdata('col_cat_vals', $data['scatval']);
					$this->session->set_userdata('col_names', $data['scolumn']);
					
				}else{
					if($this->session->userdata('col_cat_vals')){
						$data['scatval'] = $this->session->userdata('col_cat_vals');
					}
				}
				
				if($type == 'contractID'){
					
					if($this->session->userdata('col_con_vals') && !empty($this->session->userdata('col_con_vals'))){
						$data['sconval'] = $this->session->userdata('col_con_vals');
					}
									
					$vala = explode(',', $val);
					
					foreach($data['sconval'] as $key => $value){	
						unset($data['sconval'][$key]);
					}
					
					$data['sconval'] = array();
					
					for($c=0; $c < sizeof($vala); $c++){
						
						if(in_array($vala[$c], $data['sconval'])){
							
						}else{
							if($vala[$c]){
								array_push($data['sconval'], $vala[$c]);
							}	
						}
					}
												
					foreach($data['scolumn'] as $key => $value){
						
						if($value == 'contractID' && sizeof($data['sconval']) == 0){
							unset($data['scolumn'][$key]);
						}
					}
					
					$this->session->set_userdata('col_con_vals', $data['sconval']);
					$this->session->set_userdata('col_names', $data['scolumn']);
					
				}else{
					if($this->session->userdata('col_con_vals')){
						$data['sconval'] = $this->session->userdata('col_con_vals');
					}
				}
				
				if($type == 'sectors'){
					
					if($this->session->userdata('col_sec_vals') && !empty($this->session->userdata('col_sec_vals'))){
						$data['sectors'] = $this->session->userdata('col_sec_vals');
					}
											
					$vala = explode(',', $val);
					
					foreach($data['sectors'] as $key => $value){	
						unset($data['sectors'][$key]);
					}	
					
					$data['sectors'] = array();
					
					for($c=0; $c < sizeof($vala); $c++){
						
						if(in_array($vala[$c], $data['sectors'])){
							
						}else{
							if($vala[$c]){
								array_push($data['sectors'], $vala[$c]);
							}
						}
					}
					
					foreach($data['scolumn'] as $key => $value){
						
						if($value == 'sectors' && sizeof($data['sectors']) == 0){
							unset($data['scolumn'][$key]);
						}
					}
					
					$this->session->set_userdata('col_sec_vals', $data['sectors']);
					$this->session->set_userdata('col_names', $data['scolumn']);
					
				}else{
					if($this->session->userdata('col_sec_vals')){
						$data['sectors'] = $this->session->userdata('col_sec_vals');
					}
				}
				
				if($type == 'countryID'){
					
					if($this->session->userdata('col_coun_vals') && !empty($this->session->userdata('col_coun_vals'))){
						$data['scountry'] = $this->session->userdata('col_coun_vals');
					}
									
					$vala = explode(',', $val);
					
					foreach($data['scountry'] as $key => $value){	
						unset($data['scountry'][$key]);
					}
					
					$data['scountry'] = array();
					
					for($c=0; $c < sizeof($vala); $c++){
						
						if(in_array($vala[$c], $data['scountry'])){
							
						}else{
							if($vala[$c]){
								array_push($data['scountry'], $vala[$c]);
							}
						}
					}
									
					foreach($data['scolumn'] as $key => $value){
						
						if($value == 'countryID' && sizeof($data['scountry']) == 0){
							unset($data['scolumn'][$key]);
						}
					}
					
					$this->session->set_userdata('col_coun_vals', $data['scountry']);
					$this->session->set_userdata('col_names', $data['scolumn']);
					
				}else{
					if($this->session->userdata('col_coun_vals')){
						$data['scountry'] = $this->session->userdata('col_coun_vals');
					}
				}
				
				if($type == 'postDate'){
					
					if($this->session->userdata('col_post_vals') && !empty($this->session->userdata('col_post_vals')))
					$data['pposted'] = $this->session->userdata('col_post_vals');
					
					$vala = explode(',', $val);
					
					foreach($data['pposted'] as $key => $value){	
						unset($data['pposted'][$key]);
					}
					
					$data['pposted'] = array();
					
					for($c=0; $c < sizeof($vala); $c++){
					
						if($vala[$c])	
							$posttime = date('Ymd',strtotime("-".$vala[$c]." days"));
						
						if($vala[$c] && in_array($posttime, $data['pposted'])){
							
						}else{
							
							if($vala[$c])
								array_push($data['pposted'], $posttime);
						}
					}
					
					foreach($data['scolumn'] as $key => $value){
						
						if($value == 'postDate' && sizeof($data['pposted']) == 0){
							unset($data['scolumn'][$key]);
						}
					}
					
					$this->session->set_userdata('col_post_vals', $data['pposted']);
					$this->session->set_userdata('col_names', $data['scolumn']);
					
				}else{
					if($this->session->userdata('col_post_vals'))
						$data['pposted'] = $this->session->userdata('col_post_vals');
				}
				
				$data['type'] = $type;
				$data['sval'] = $val;
				$data['sort_order'] = $sort_order;
				$data['search_keyword'] = $search_keyword;
				
				if(sizeof($data['scatval']) == 0 && sizeof($data['sconval']) == 0 && sizeof($data['pposted']) == 0 && sizeof($data['sectors']) == 0 && sizeof($data['scountry']) == 0){
				
					$this->session->unset_userdata('col_cat_vals');
					$this->session->unset_userdata('col_con_vals');
					$this->session->unset_userdata('col_coun_vals');
					$this->session->unset_userdata('col_post_vals');
					$this->session->unset_userdata('col_sec_vals');
					$this->session->unset_userdata('col_names');
					
					$data['scatval'] = array();
					$data['sconval'] = array();
					$data['pposted'] = array();
					$data['sectors'] = array();
					$data['scountry'] = array();
					$data['scolumn'] = array();
					
					if($sort_order == ''){
						$data['sort_order'] = 'desc';
						$sort_order = 'desc';
					}
				}
			}else{
						
				if($sort_order == 'asc' || $sort_order == 'desc'){
					
					$this->session->unset_userdata('col_name');
					$this->session->unset_userdata('col_val');
					$this->session->unset_userdata('search_keyword');
					$this->session->unset_userdata('col_cat_vals');
					$this->session->unset_userdata('col_con_vals');
					$this->session->unset_userdata('col_coun_vals');
					$this->session->unset_userdata('col_post_vals');
					$this->session->unset_userdata('col_sec_vals');
					$this->session->unset_userdata('col_names');
				}
			
				$type = $this->session->userdata('col_name');
				$val = $this->session->userdata('col_val');
				
				if($type <> 'featured' || $type <> 'awardStatus'){	
					
					if($this->session->userdata('col_names'))
						$data['scolumn'] = $this->session->userdata('col_names');
				}
				
				if($type == 'mainCategoryId'){
					
					if($this->session->userdata('col_cat_vals'))
						$data['scatval'] = $this->session->userdata('col_cat_vals');
				}
						
				if($type == 'contractID'){
					
					if($this->session->userdata('col_con_vals'))
						$data['sconval'] = $this->session->userdata('col_con_vals');
				}
				
				if($type == 'sectors'){
					
					if($this->session->userdata('col_sec_vals'))
						$data['sectors'] = $this->session->userdata('col_sec_vals');
				}
				
				if($type == 'countryID'){
					
					if($this->session->userdata('col_coun_vals'))
						$data['scountry'] = $this->session->userdata('col_coun_vals');
				}
				
				if($type == 'postDate'){
					
					if($this->session->userdata('col_post_vals'))
						$data['pposted'] = $this->session->userdata('col_post_vals');
				}
							
				if($this->session->userdata('search_keyword')){
					$search_keyword = $this->session->userdata('search_keyword');
				}
									
				if(sizeof($data['scatval']) == 0 && sizeof($data['sconval']) == 0 && sizeof($data['pposted']) == 0 && sizeof($data['sectors']) == 0 && sizeof($data['scountry']) == 0){
					
					if($sort_order == ''){
						
						$data['sort_order'] = 'desc';
						$sort_order = 'desc';
					}
				}
			}
			
			$data['type'] = $type;
			$data['sval'] = $val;
			$data['sort_order'] = $sort_order;
			$data['search_keyword'] = $search_keyword;
			
			if($sort_order <> ''){
				
				$this->session->set_userdata('sort_order', $sort_order);
				
			}else{
				
				$sort_order = $this->session->userdata('sort_order');
			}
			if($search_keyword <> ''){
				
				if($data['user_type_ref'] <> 3){
					
					$all_projects = $this->plisting->get_project_public_by_skey_type($data, $type, $val, $search_keyword, $data['user_type_ref']);
							
				}else{
					
					$all_projects = $this->plisting->get_project_by_skey_type($data, $type, $val, $search_keyword, $data['user_id']);
				}	
			}else{
				
				if($data['user_type_ref'] <> 3){
					$all_projects = $this->plisting->get_project_public_by_type($data, $type, $val, $data['user_type_ref']);
				}else{
					$all_projects = $this->plisting->get_project_by_type($data, $type, $val, $data['user_id']);
				}	
			}
			
			if($all_projects && !empty($all_projects) && is_array($all_projects) && sizeof($all_projects) <> 0){
				$data['projects_listed'] = $all_projects;			
			}
			
			$config = array();
			$config["base_url"] = base_url() . "listing/search";
			$total_row = sizeof($data['projects_listed']);
			$config["total_rows"] = $total_row;
			$config['use_page_numbers'] = TRUE;
			$config["per_page"] = 5;
			$config['num_links'] = $total_row;
			$config['cur_tag_open'] = '&nbsp;<a class="current page-link">';
			$config['cur_tag_close'] = '</a>';
			$config['page_query_string'] = FALSE;
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
					
			$divisionR = $total_row / $config["per_page"];
			$wholeI = floor($divisionR);
			$fractiond = fmod($divisionR, strlen($wholeI));
			$fractiond = $fractiond * 10;
						
			if($fractiond > 0){
				$data['pages_count'] = $wholeI + 1;
			}else{
				$data['pages_count'] = $wholeI;
			}
						
			$this->pagination->initialize($config);
			
			if($this->uri->segment(3)){
				$page = $this->uri->segment(3);
			}
			else{
				$page = 1;
			}
			
			/* if(isset($_GET['per_page']) && $_GET['per_page']){
				$page = $_GET['per_page'];
			}
			else{
				$page = 1;
			} */
				
			$data['curr_page'] = $page;
			
			if($wholeI == 0 && $fractiond == 0){
				$data['curr_page'] = 0;
			}
					
			if($search_keyword <> ''){
				
				if($data['user_type_ref'] <> 3){
					$data["projects_listed"] = $this->plisting->get_project_public_by_skey_type_pagi($data, $type, $val, $search_keyword, $config["per_page"], $page, $sort_order, $data['user_type_ref']);
				}else{
					$data["projects_listed"] = $this->plisting->get_project_by_skey_type_pagi($data, $type, $val, $search_keyword, $config["per_page"], $page, $sort_order, $data['user_id']);
				}	
			}else{
				
				if($data['user_type_ref'] <> 3){
					$data["projects_listed"] = $this->plisting->get_project_public_by_type_pagi($data, $type, $val, $config["per_page"], $page, $sort_order, $data['user_type_ref']);
				}else{	
					$data["projects_listed"] = $this->plisting->get_project_by_type_pagi($data, $type, $val, $config["per_page"], $page, $sort_order, $data['user_id']);
				}
			}
		}	
		
		$data['proposal_details_financier'] = array();
		
		if(!empty($data["projects_listed"]) && is_array($data["projects_listed"]) && sizeof($data["projects_listed"]) <> 0){
			foreach($data["projects_listed"] as $plrow){
				$data['project_proposal'][$plrow->ID] = array();
				$data['proposal_details_financier'][$plrow->ID] = array();
				$data['proposal_details_financier'][$plrow->ID] = $this->plisting->get_sc_financier_proposals_by_project_and_user($plrow->ID, $data['user_id']);
				$data["provider_interested"][$plrow->ID] = $this->plisting->fetch_accepted_invitaion($plrow->ID, 1);
				$data["financier_interested"][$plrow->ID] = $this->plisting->fetch_accepted_invitaion($plrow->ID, 2);
		
				$data["beneficiary_provider_accepted"][$plrow->ID] = $this->plisting->fetch_beneficiary_accepted_invitaion($plrow->ID, 1);
				$data["beneficiary_financier_accepted"][$plrow->ID] = $this->plisting->fetch_beneficiary_accepted_invitaion($plrow->ID, 2);
				
				if($user['user_type_ref'] == 1){
					$data["proposals_subcontractor_info"] = $this->plisting->get_proposal_by_contractor_ref($plrow->ID, $data['user_id'], 'p');
				}
			}
		}
				
		$str_links = $this->pagination->create_links();
		$data["plinks"] = explode('&nbsp;', $str_links );
		
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		if($data['user_id'] <> 0){
					
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
			
			$savedp = $this->plisting->get_saved_project_by_uid($data['user_id']);
			
			if(!empty($savedp) && is_array($savedp) && sizeof($savedp) <> 0){
				foreach($savedp as $svrow){
					array_push($data['saved_project'], $svrow->tfusp_project_ref);	
				}		
			}
			
			if($user['user_type_ref'] == 1){
				
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
						$data['project_proposal'][$psrow->tpp_project_ref] = array();
						$data['project_proposal'][$psrow->tpp_project_ref] = $this->plisting->get_project_proposal_by_id_uid_type($psrow->tpp_project_ref, $data['user_id'], 'p');
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
			
			if($user['user_type_ref'] == 2){
				
				$invitation_accept = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'f');
				$proposal_submitted = $this->plisting->get_project_proposal_by_uid_type($data['user_id'], 'f');
				
				if(!empty($invitation_accept) && is_array($invitation_accept) && sizeof($invitation_accept) <> 0){
					
					foreach($invitation_accept as $invrow){
						array_push($data['invitation_accept'], $invrow->tfpi_project_ref);
					}	
				}
				
				if(!empty($proposal_submitted) && is_array($proposal_submitted) && sizeof($proposal_submitted) <> 0){
					
					foreach($proposal_submitted as $psrow){
						array_push($data['proposal_submitted'], $psrow->tpf_project_ref);
						$data['project_proposal'][$psrow->tpf_project_ref] = $this->plisting->get_project_proposal_by_id_uid_type($psrow->tpf_project_ref, $data['user_id'], 'f');
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
		}
		
		$data['all_projects_count'] = $this->plisting->get_project_all_count($data, $data['user_id']);
		$data['all_featured_projects_count'] = $this->plisting->get_featured_project_all_count($data, $data['user_id']);
		$data['all_closed_projects_count'] = $this->plisting->get_closed_project_all_count($data, $data['user_id']);
						
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/listing_details_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/listing_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function create_project()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'listing';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['pcategories'] = '';
		$data['pcontracts'] = '';
		$data['pcountries'] = '';
		$data['psectors'] = '';
		$data['pstates'] = '';
		$data['project_saved']  = 0;
		$data['check_company']  = '';
		
		$data['prrow'] = 0;
		$data['proj_row'] = 0;
		$data['ptitle'] = '';
		$data['pimage'] = '';
		$data['pbudget'] = '0.00';
		$data['pdesc'] = '';
		$data['pfeature'] = 1;
		$data['pcdate'] = '';
		$data['prflie'] = '';
		$data['pcountry'] = 0;
		$data['pstate'] = 0;
		$data['pcategory'] = 0;
		$data['pcontract'] = 0;
		$data['prefnum'] = '';
		$data['ptags'] = array();
		$data['psremarks'] = '';
		$data['pstartw'] = '';
		$data['pendw'] = '';
		$data['pcurr'] = 0;
		$data['pfcurr'] = 0;
		$data['pfinancing'] = 0;
		$data['pftenure'] = 0;
		$data['pftenureu'] = 3;
		$data['pfamount'] = 0;
		$data['pvisible'] = 0;
		$data['pgallery'] = array();
		$notifya = array();
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		$data['units'] = $this->plisting->get_units();
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		if($user['user_type_ref'] <> 3){
			redirect(base_url().'dashboard');
		}	
				
		$action = $this->input->post('action');
		$row_id = $this->input->post('row_id');
		$data['msg'] = '';
		$data['msg_extra'] = '';
			
		$ccategories = $this->plisting->get_categories();
		
		if($ccategories && !empty($ccategories) && is_array($ccategories) && sizeof($ccategories) <> 0){
			$data['pcategories'] = $ccategories;			
		}
		
		$ccontracts = $this->plisting->get_contracts();
		
		if($ccontracts && !empty($ccontracts) && is_array($ccontracts) && sizeof($ccontracts) <> 0){
			$data['pcontracts'] = $ccontracts;			
		}
		
		$sectors = $this->plisting->get_sectors();
		
		if($sectors && !empty($sectors) && is_array($sectors) && sizeof($sectors) <> 0){
			$data['psectors'] = $sectors;			
		}
		
		$pcountries = $this->plisting->get_country();
		
		if($pcountries && !empty($pcountries) && is_array($pcountries) && sizeof($pcountries) <> 0){
			$data['pcountries'] = $pcountries;			
		}
		
		$pstates = $this->plisting->get_state();
		
		if($pstates && !empty($pstates) && is_array($pstates) && sizeof($pstates) <> 0){
			$data['pstates'] = $pstates;			
		}
		
		$data['project_files'] = array();
		$data['pgallery'] = $this->manage->get_project_gallery();
				
		if($action == 'edit' && $row_id <> 0){
			
			$data['proj_row'] = $row_id;
			
			$presult = $this->plisting->get_project_by_id($row_id);
			
			if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
				
				$data['prrow'] = $presult[0]->ID;
				$data['ptitle'] =  $presult[0]->title;
				$data['pbudget'] = $presult[0]->fixedBudget;
				$data['pdesc'] = $presult[0]->description;
				$data['pimage'] = $presult[0]->pimage;
				$data['pfeature'] = $presult[0]->featured;
				$data['pcdate'] = date('Y-m-d H:i:s', strtotime($presult[0]->closingDate));
				$data['prflie'] = $presult[0]->attachFiles;
				$data['pcountry'] = $presult[0]->countryID;
				$data['pstate'] = $presult[0]->stateID;
				$data['pcategory'] = $presult[0]->mainCategoryId;
				$data['pcontract'] = $presult[0]->contractID;
				$data['prefnum'] = $presult[0]->refnum;
				$ptags = explode('~', $presult[0]->sectors);
				
				if(sizeof($ptags) <> 0){
					for($tc=0; $tc < sizeof($ptags); $tc++){
						array_push($data['ptags'], preg_replace("/[\s_]/", "-", strtolower($ptags[$tc])));
					}
				}
				
				$data['pstartw'] = $presult[0]->requestStartDate;
				$data['pendw'] = $presult[0]->requestFinishDate;
				$data['psremarks'] = $presult[0]->special_remarks;
				$data['pcurr'] = $presult[0]->currency_ref;
				$data['pfinancing'] = $presult[0]->financing;  
				$data['pftenure'] = $presult[0]->financing_tenure_value;
				$data['pftenureu'] = $presult[0]->financing_tenure_ref;
				$data['pfcurr'] = $presult[0]->financing_currency_ref;
				$data['pfamount'] = $presult[0]->financing_amount;
				$data['pvisible'] = $presult[0]->visibility;
				
				$data['project_files'] = $this->plisting->get_project_files_by_id($presult[0]->ID);
			
			}	
		}
		
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
		
		if($action == 'update' && $row_id <> 0){	
		
			$data['proj_row'] = $row_id;
									
			$start_within = date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('start_within'))));
			$finish_within = date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('finish_within'))));
			
			$psectors = $this->input->post('sectors_tag');
			
			$sectors = $psectors;
						
			$isfeatured = $this->input->post('featured');
			
			$isfinancing = 0;
			
			if($this->input->post('pfinancing')){
				$isfinancing = 1;
			}
			
			$filesCount = count($_FILES['pdoc']['name']);
            $uploadData = array();
			
			for($i = 0; $i < $filesCount; $i++){
								
                $_FILES['updoc']['name'] = $_FILES['pdoc']['name'][$i];
                $_FILES['updoc']['type'] = $_FILES['pdoc']['type'][$i];
                $_FILES['updoc']['tmp_name'] = $_FILES['pdoc']['tmp_name'][$i];
                $_FILES['updoc']['error'] = $_FILES['pdoc']['error'][$i];
                $_FILES['updoc']['size'] = $_FILES['pdoc']['size'][$i];

				$file_name = time().str_replace(" ", "-", $_FILES["updoc"]['name']);
				$config['file_name'] = $file_name;
				
				$config['upload_path']          = FCPATH.'assets/project_post_files/';
				$config['allowed_types']        = 'gif|jpg|jpeg|png|doc|docx|ppt|pptx|pps|xls|xlsx|pdf|txt|rtf';
				// $config['max_size']             = 1048576;
				// $config['max_width']           = 1024;
				// $config['max_height']           = 1024;
				
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
               
				if(isset($_FILES["updoc"]['name']) && trim($_FILES["updoc"]['name']) <> ''){
					
					if($this->upload->do_upload('updoc')){
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['created'] = date("Y-m-d H:i:s");
						$uploadData[$i]['modified'] = date("Y-m-d H:i:s");
					}
				}else{
					$uploadData[$i]['file_name'] = '';
					$uploadData[$i]['created'] = '';
					$uploadData[$i]['modified'] = '';
				}
			}
								
			$data_add = array();
							
			$data_add['userID'] = $user['user_id'];
			$data_add['userType'] = $user['user_type_ref'];
			$data_add['title'] = $this->input->post('ptitle');
			$data_add['description'] = $this->input->post('pdesc');
			$data_add['pimage'] = $this->input->post('pimage');
			$data_add['mainCategoryId'] = $this->input->post('industry_category');
			$data_add['contractID'] = $this->input->post('contract');
			$data_add['stateID'] = $this->input->post('pstate');
			$data_add['currency_ref'] = $this->input->post('pcurr');
			$data_add['countryID'] = $this->input->post('pcountry');
			$data_add['refnum'] = $this->input->post('refnum');
			$data_add['closingDate'] = date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('closing_date'))));
			$data_add['updatingDate'] = date('Y-m-d H:i:s');
			$data_add['sectors'] = $sectors;
			$data_add['fixedBudget'] = $this->input->post('pbudget');
			$data_add['requestStartDate'] = $start_within;
			$data_add['requestFinishDate'] = $finish_within;
			$data_add['visibility'] = $this->input->post('user_visible_type');
			$data_add['special_remarks'] = $this->input->post('psremarks');
			$data_add['featured'] = $isfeatured;
			$data_add['financing'] = $isfinancing;
			$data_add['financing_currency_ref'] = $this->input->post('pfcurr');
			$data_add['financing_amount'] = $this->input->post('pfamount');
			$data_add['financing_tenure_value'] = $this->input->post('pftenure');
			$data_add['financing_tenure_ref'] = $this->input->post('pftenureu');
			$data_add['isDraft'] = $this->input->post('save_post');
			$isDraft = $this->input->post('save_post');
			
			$result = $this->plisting->update_project_by_id($row_id, $data_add);
			$data['proj_row'] = $row_id;					
			
			if($result && !empty($result) && $filesCount > 0){
				
				// $data_add_file['attachFiles'] = $result.'_project.'.end($file_namea);
				// $this->plisting->update_project_by_id($result, $data_add_file);
				
				$pfilesCount = count($this->input->post('pdocname'));
				$pfilesA = $this->input->post('pdocname');
				$pdoc_id = $this->input->post('pdoc_id');
				
				if($pfilesCount > 0){
				
					for($i = 0; $i < $pfilesCount; $i++){
					
						$prfile = $pfilesA[$i];
						
						if(is_array($uploadData) && !empty($uploadData) && !empty($uploadData[$i]) && $uploadData[$i]['file_name'] != ''){
						
							if($prfile !== '' && file_exists(FCPATH.'assets/project_post_files/'.$prfile)){
								unlink(FCPATH.'assets/project_post_files/'.$prfile);
							}
						
						}
					}
				}
								
				for($i = 0; $i < $filesCount; $i++){
							
					if(is_array($uploadData) && !empty($uploadData) && !empty($uploadData[$i])){
					
						$data_add_file = array();
						// $data_add_file['tppf_project_ref'] = $row_id;
						$data_add_file['tppf_row_deleted'] = 0;
						
						if($uploadData[$i]['file_name'] != ''){
						
							$file_namea = explode('.', $uploadData[$i]['file_name']);
												
							$file_row = $this->plisting->update_project_file_by_id($pdoc_id[$i], $data_add_file);
							
							$data_add_file = array();
							$data_add_file['tppf_filename'] = $pdoc_id[$i].'_'.$row_id.'_project_'.($i+1).'.'.end($file_namea);
							
							$this->plisting->update_project_file_by_id($pdoc_id[$i], $data_add_file);
							
							rename(FCPATH.'assets/project_post_files/'.$uploadData[$i]['file_name'], FCPATH.'assets/project_post_files/'.$pdoc_id[$i].'_'.$row_id.'_project_'.($i+1).'.'.end($file_namea));
							
						}	
					}
			   	}
				
				$success_data = $this->upload->data();
				$data['msg'] = 'success';
										
				if($isDraft == 0){
							
					$data['msg_extra'] = "<h3>Project Updated</h3> <p>Thank You! Project has been successfully updated. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
				}
				
				if($isDraft == 1){
					
					$data['msg_extra'] = "<h3>Project Updated</h3> <p>Thank You! Project has been successfully updated. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
				}
				
			}else{
				
				if($filesCount > 0){
					for($i = 0; $i < $filesCount; $i++){
					
						if(is_array($uploadData) && !empty($uploadData) && !empty($uploadData[$i])){
							unlink(FCPATH.'assets/project_post_files/'.$uploadData[$i]['file_name']);
						}
					}
				}
				
				$data['msg'] = 'error';
				$data['msg_extra'] = "<h3>Project Update Error</h3> <p>Oops! Error occurred during update. Try again! Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
			}
		}
				
		if($action == 'create' && $row_id == 0){
					
			$created_project_id = 0;
			$project_cat_id = $this->input->post('category');
			
			$start_within = date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('start_within'))));
			$finish_within = date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('finish_within'))));
			
			$psectors = $this->input->post('sectors_tag');
			
			$sectors = $psectors;
						
			$isfeatured = $this->input->post('featured');
			
			$isfinancing = 0;
					
			if($this->input->post('pfinancing')){
				$isfinancing = 1;
			}
			
			$filesCount = count($_FILES['pdoc']['name']);
			$uploadData = array();
            
			for($i = 0; $i < $filesCount; $i++){
			
                $_FILES['pdocs']['name'] = $_FILES['pdoc']['name'][$i];
                $_FILES['pdocs']['type'] = $_FILES['pdoc']['type'][$i];
                $_FILES['pdocs']['tmp_name'] = $_FILES['pdoc']['tmp_name'][$i];
                $_FILES['pdocs']['error'] = $_FILES['pdoc']['error'][$i];
                $_FILES['pdocs']['size'] = $_FILES['pdoc']['size'][$i];

				$file_name = time().str_replace(" ", "-", $_FILES["pdocs"]['name']);
				$config['file_name'] = $file_name;
				
				$config['upload_path']          = FCPATH.'assets/project_post_files/';
				$config['allowed_types']        = 'gif|jpg|jpeg|png|doc|docx|ppt|pptx|pps|xls|xlsx|pdf|txt|rtf';
				// $config['max_size']             = 1048576;
				// $config['max_width']           = 1024;
				// $config['max_height']           = 1024;
				
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
               
				if(isset($_FILES["pdocs"]['name']) && trim($_FILES["pdocs"]['name']) <> ''){
					
					if($this->upload->do_upload('pdocs')){
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['created'] = date("Y-m-d H:i:s");
						$uploadData[$i]['modified'] = date("Y-m-d H:i:s");
					}
				}
			}
						
			$data_add = array();
							
			$data_add['userID'] = $user['user_id'];
			$data_add['userType'] = $user['user_type_ref'];
			$data_add['title'] = $this->input->post('ptitle');
			$data_add['description'] = $this->input->post('pdesc');
			$data_add['pimage'] = $this->input->post('pimage');
			$data_add['mainCategoryId'] = $this->input->post('industry_category');
			$data_add['contractID'] = $this->input->post('contract');
			$data_add['stateID'] = $this->input->post('pstate');
			$data_add['currency_ref'] = $this->input->post('pcurr');
			$data_add['countryID'] = $this->input->post('pcountry');
			$data_add['refnum'] = $this->input->post('refnum');
			$data_add['postdate_timestr'] = strtotime(date('Y-m-d H:i:s'));
			$data_add['closingDate'] = date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('closing_date'))));
			$data_add['updatingDate'] = date('Y-m-d H:i:s');
			$data_add['sectors'] = $sectors;
			$data_add['fixedBudget'] = $this->input->post('pbudget');
			$data_add['requestStartDate'] = $start_within;
			$data_add['requestFinishDate'] = $finish_within;
			$data_add['visibility'] = $this->input->post('user_visible_type');
			$data_add['special_remarks'] = $this->input->post('psremarks');
			$data_add['featured'] = $isfeatured;
			$data_add['financing'] = $isfinancing;
			$data_add['financing_currency_ref'] = $this->input->post('pfcurr');
			$data_add['financing_amount'] = $this->input->post('pfamount');
			$data_add['financing_tenure_value'] = $this->input->post('pftenure');
			$data_add['financing_tenure_ref'] = $this->input->post('pftenureu');
			$data_add['isDraft'] = $this->input->post('save_post');
			$isDraft = $this->input->post('save_post');
			
			$result = $this->plisting->add_project($data_add);
			$created_project_id = $result;
			$data['proj_row'] = $created_project_id;					
			
			if($result && !empty($result) && $result > 0 && $filesCount > 0){
				
				// $data_add_file['attachFiles'] = $result.'_project.'.end($file_namea);
				// $this->plisting->update_project_by_id($result, $data_add_file);
								
				for($i = 0; $i < $filesCount; $i++){
							
					if(is_array($uploadData) && !empty($uploadData) && !empty($uploadData[$i])){
					
						$data_add_file = array();
						$data_add_file['tppf_project_ref'] = $result;
						$data_add_file['tppf_row_deleted'] = 0;
						$file_namea = explode('.', $uploadData[$i]['file_name']);
						
						$file_row = $this->plisting->add_project_file_by_id($result, $data_add_file);
						
						$data_add_file = array();
						$data_add_file['tppf_filename'] = $file_row.'_'.$result.'_project_'.($i+1).'.'.end($file_namea);
						
						$this->plisting->update_project_file_by_id($file_row, $data_add_file);
						
						rename(FCPATH.'assets/project_post_files/'.$uploadData[$i]['file_name'], FCPATH.'assets/project_post_files/'.$file_row.'_'.$result.'_project_'.($i+1).'.'.end($file_namea));
					}
			   	}
				
				$success_data = $this->upload->data();
				$data['msg'] = 'success';
										
				if($isDraft == 0){
					
					$data['msg_extra'] = "<h3>Project Created</h3> <p>Thank You! Project has been successfully published. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
				}
				
				if($isDraft == 1){
					
					$data['msg_extra'] = "<h3>Project Created</h3> <p>Thank You! Project has been successfully saved as draft. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
				}
				
			}else{
				
				if($filesCount > 0){
					for($i = 0; $i < $filesCount; $i++){
					
						if(is_array($uploadData) && !empty($uploadData) && !empty($uploadData[$i])){
							unlink(FCPATH.'assets/project_post_files/'.$uploadData[$i]['file_name']);
						}
					}
				}
				
				$data['msg'] = 'error';
				$data['msg_extra'] = "<h3>Project Creation Error</h3> <p>Oops! Error occurred during addition. Try again! Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
			}
									
			if(($data_add['financing_amount'] <> 0 || trim($data_add['financing_amount'] <> ''))){
			
			}

			$all_user_info = $this->manage->get_all_user_info();
			$count = 0;
						
			if(!empty($all_user_info) && is_array($all_user_info) && sizeof($all_user_info) > 0 && $data_add['isDraft'] == 0){
				
				foreach($all_user_info as $aurow)
				{
					$data_add = array();
										
					if($aurow[0]->tfu_utype == 1){
												
						if($aurow[0]->tfsp_posted_project_visibility == 1){
							
							if($created_project_id > 0 && isset($aurow[0]->tfcom_cat_ref) && $project_cat_id == $aurow[0]->tfcom_cat_ref){
								
								$project_list = array();
								
								if($aurow[0]->tfsp_posted_project_list && trim($aurow[0]->tfsp_posted_project_list) != ''){
									$project_list = unserialize($aurow[0]->tfsp_posted_project_list);
									$project_add = array();
									
									if(is_array($project_list) && !empty($project_list) && sizeof($project_list) <> 0){
										
										foreach($project_list as $key => $val){
											if($val == 0){
												$project_add[$key] = $val;
											}
										}
									}
									
									$project_add[$created_project_id] = 0;
														
								}else{
									$project_add[$created_project_id] = 0;
								}
								
								$data_add['tfsp_posted_project_list'] = serialize($project_add);
								$this->manage->update_user_info_by_id_type($aurow[0]->tfu_id, $aurow[0]->tfu_utype, $data_add);
								
								$nofifya[$count]['notify_type'] = 'project_posted';
								$nofifya[$count]['notify_id'] = time();
							
								$project_info = $this->plisting->get_project_info_by_id($created_project_id);
								
								$nofifya[$count]['notify_for_user'] = $project_info[0]->userID;
								$nofifya[$count]['notify_for_user_type'] = $project_info[0]->userType;
								$nofifya[$count]['notify_for_project'] = $created_project_id;
								$nofifya[$count]['notify_for_proposal'] = 0;
								
								$user_info = $this->manage->get_user_info_by_id($project_info[0]->userID);
								
								$nofifya[$count]['notify_user_ref'] = $aurow[0]->tfu_id;
								$nofifya[$count]['notify_user_type_ref'] = $aurow[0]->tfu_utype;
								$nofifya[$count]['notify_text'] = 'Project posted by '.ucwords($user_info[0]->tfb_fname.' '.$user_info[0]->tfb_lname).'(Beneficiary)';
								$nofifya[$count++]['notify_time'] = date('Y-m-d H:i:s');
							}
						}
					} 
					
					if($aurow[0]->tfu_utype == 2){
						
						if($aurow[0]->tff_posted_project_visibility == 1){
							
							if($created_project_id > 0 && isset($aurow[0]->tfcom_cat_ref) && $project_cat_id == $aurow[0]->tfcom_cat_ref){
								
								$project_list = array();
								
								if($aurow[0]->tff_posted_project_list && trim($aurow[0]->tff_posted_project_list) != ''){
									$project_list = unserialize($aurow[0]->tff_posted_project_list);
									$project_add = array();
									
									if(is_array($project_list) && !empty($project_list) && sizeof($project_list) <> 0){
										
										foreach($project_list as $key => $val){
											if($val == 0){
												$project_add[$key] = $val;
											}
										}
									}	
									
									$project_add[$created_project_id] = 0;
														
								}else{
									$project_add[$created_project_id] = 0;
								}
								
								$data_add['tff_posted_project_list'] = serialize($project_add);
								$this->manage->update_user_info_by_id_type($aurow[0]->tfu_id, $aurow[0]->tfu_utype, $data_add);
								
								$nofifya[$count]['notify_type'] = 'project_posted';
								$nofifya[$count]['notify_id'] = time();
								
								$project_info = $this->plisting->get_project_info_by_id($created_project_id);
								
								$nofifya[$count]['notify_for_user'] = $project_info[0]->userID;
								$nofifya[$count]['notify_for_user_type'] = $project_info[0]->userType;
								$nofifya[$count]['notify_for_project'] = $created_project_id;
								$nofifya[$count]['notify_for_proposal'] = 0;
								
								$user_info = $this->manage->get_user_info_by_id($project_info[0]->userID);
								
								$nofifya[$count]['notify_user_ref'] = $aurow[0]->tfu_id;
								$nofifya[$count]['notify_user_type_ref'] = $aurow[0]->tfu_utype;
								$nofifya[$count]['notify_text'] = 'Project posted by '.ucwords($user_info[0]->tfb_fname.' '.$user_info[0]->tfb_lname).'(Beneficiary)';
								$nofifya[$count++]['notify_time'] = date('Y-m-d H:i:s');
							}
						}
					}
				}
			}
			
			if(!empty($nofifya) && sizeof($nofifya) <> 0){
				$this->notification->save_notification($nofifya);
			}
		}
		
		$data['currency'] = $this->plisting->get_currency();
		
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data['uwalleta'] = '';
		$data['uwalletbal'] = '';
		$data['ubankaccno'] = '';
		$data['ubankaccname'] = '';
		$data['ulinkedin'] = '';
		$data['udesignation'] = '';
		
		if($data['user_id'] <> 0){
							
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
			$data['check_company']  = $this->manage->get_company_info_by_uid($data['user_id']);
			
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
				
				$data['uwalleta'] = $uresult[0]->tfu_xdc_walletID;
				$data['uwalletbal'] = $uresult[0]->tfu_xdc_balance;
				$data['ubankaccno'] = $uresult[0]->tfu_bank_acc_number;
				$data['ubankaccname'] = $uresult[0]->tfu_bank_acc_name;
				$data['ulinkedin'] = $uresult[0]->tfu_linkedin;
				$data['udesignation'] = $uresult[0]->tfu_designation;
			}	
		}
						
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/listing_create_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/listing_scripts', $data);
		$this->load->view('includes/footern');
		
	}

	public function project_info(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'listing';
		$data['msg'] = '';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['pcategories'] = '';
		$data['pcontracts'] = '';
		$data['pcountries'] = '';
		$data['pstates'] = '';
		$data['user_info'] = array();
		$data['project_saved']  = 0;
		$data['proposals'] = 0;
		$data['project_listed_info'] = '';
		$data['invitation_accept'] = array();
		$data['proposal_submitted'] = array();
		$data['saved_project'] = array();
		$data['project_proposal'] = array();
		$data['project_user_rating'] = array();
		$data['proposal_accepted'] = array();
		$data['supplier_info'] = array();
		$data["proposals_subcontractor"] = array();
		$data["proposals_subcontractor_info"] = array();
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
				
		$action = $this->input->post('action');
		$row_id = $this->input->post('row_id');
		
		$user_type_request = $this->input->post('user_type_request');
		$user_id_request = $this->input->post('user_id_request');
		$request_type = $this->input->post('request_type');
		
		if(trim($user_type_request) == ''){
			$user_type_request = 0;
		}
		
		if(trim($user_id_request) == ''){
			$user_id_request = 0;
		}
		
		if($action == 'request_completion' && $data['user_id'] <> 0 && $data['user_type_ref'] <> 0){
			
			$this->plisting->request_complete_project($row_id, $data['user_id'], $data['user_type_ref'], $user_id_request, $user_type_request, $request_type);
		}		
				
		if($action == 'publish_job'){
			
			$data_add = array();
			$data_add['isDraft'] = 0;
					
			$result = $this->plisting->update_project_by_id($row_id, $data_add);
								
			if(is_array($result) && !empty($result) && sizeof($result) <> 0){
							
				if($result[0]->isDraft == 0){
					$data['msg'] = 'success';
					$data['msg_extra'] = 'Project has been successfully published!';
				}else{
					$data['msg'] = 'error';
					$data['msg_extra'] = 'Error occurred! Project has not been published.';
				}
			}	
		}

		if($action == 'cancel_job'){
			
			$data_add = array();
			$data_add['isDraft'] = 1;
					
			$result = $this->plisting->update_project_by_id($row_id, $data_add);
								
			if(is_array($result) && !empty($result) && sizeof($result) <> 0){
							
				if($result[0]->isDraft == 1){
					$data['msg'] = 'success';
					$data['msg_extra'] = 'Project has been successfully withdrawn!';
				}else{
					$data['msg'] = 'error';
					$data['msg_extra'] = 'Error occurred! Project has not been withdrawn.';
				}
			}	
		}
		
		if($action == 'save_job'){
			
			$sresult = $this->plisting->save_project($row_id, $data['user_id'], $data['user_type_ref']);
			
			if(!empty($sresult) && !is_array($sresult) && $sresult > 0){
				
				$data['project_saved']  = 1;
				$data['msg'] = 'success';
				$data['msg_extra'] = 'Project has been saved successfully !';
			
			}else if(!empty($sresult) && is_array($sresult) && sizeof($sresult) <> 0){
				
				$data['project_saved']  = 1;
				$data['msg'] = 'success';
				$data['msg_extra'] = 'Project was already saved !';
			
			}else{
				$data['msg'] = 'error';
				$data['msg_extra'] = 'Error occurred during addition. Try again!';
			}
		}
		
		if($data['user_type_ref'] == 1 || $data['user_type_ref'] == 2){
			$project_info = $this->plisting->get_project_info_by_id($row_id);
		}else{
		
			$project_info = $this->plisting->get_project_by_id_uid($data['user_id'], $row_id);
		}
		
		$tproject_proposals = 0;
		
		$project_proposals = $this->plisting->get_project_proposals_by_id_type($row_id, 'p');
		
		if($project_proposals && !empty($project_proposals) && is_array($project_proposals) && sizeof($project_proposals) <> 0){
			 $tproject_proposals += sizeof($project_proposals);			
		}
		
		$project_proposals = $this->plisting->get_project_proposals_by_id_type($row_id, 'f');
		
		if($project_proposals && !empty($project_proposals) && is_array($project_proposals) && sizeof($project_proposals) <> 0){
			 $tproject_proposals += sizeof($project_proposals);			
		}
				
		$data['proposals'] = $tproject_proposals;
		$data['proposal_details_financier'] = array();
		
		if($project_info && !empty($project_info) && is_array($project_info) && sizeof($project_info) <> 0){
			$data['project_listed_info'] = $project_info;	
			$data['proposal_details_financier'][$project_info[0]->ID] = array();
			$data['proposal_details_financier'][$project_info[0]->ID] = $this->plisting->get_sc_financier_proposals_by_project_and_user($project_info[0]->ID, $data['user_id']);	
		}
		
		$data["provider_interested"] = array();
		$data["financier_interested"] = array();
		$data["provider_interested_user"] = array();
		$data["financier_interested_user"] = array();
		$data["beneficiary_provider_accepted"] = array();
		$data["beneficiary_financier_accepted"] = array();
		
		$data["provider_interested"][$row_id] = $this->plisting->fetch_accepted_invitaion($row_id, 1);
		$data["financier_interested"][$row_id] = $this->plisting->fetch_accepted_invitaion($row_id, 2);
		
		$data["beneficiary_provider_accepted"] = $this->plisting->fetch_beneficiary_accepted_invitaion($row_id, 1);
		$data["beneficiary_financier_accepted"] = $this->plisting->fetch_beneficiary_accepted_invitaion($row_id, 2);
		
		$data['project_files'] = array();
		$data['project_files'] = $this->plisting->get_project_files_by_id($row_id);
					
		if(!empty($data["provider_interested"][$row_id]) && is_array($data["provider_interested"][$row_id]) && sizeof($data["provider_interested"][$row_id]) <> 0){
						
			$count = 0;
							
			foreach($data["provider_interested"][$row_id] as $puser){
								
				$data['provider_interested_user'][$row_id][$count]['uid'] = $puser->tfsp_user_ref;
				$data['provider_interested_user'][$row_id][$count]['ufname'] = $puser->tfsp_fname;
				$data['provider_interested_user'][$row_id][$count]['ulname'] = $puser->tfsp_lname;
				$data['provider_interested_user'][$row_id][$count]['uemail'] = $puser->tfsp_email;
				$data['provider_interested_user'][$row_id][$count]['ucontact'] = $puser->tfsp_contact;
				$data['provider_interested_user'][$row_id][$count]['uaddress'] = $puser->tfsp_address;
				$data['provider_interested_user'][$row_id][$count]['uprofpic'] = $puser->tfsp_pic_file;
				$data['provider_interested_user'][$row_id][$count]['company'] = $puser->tfcom_name;
				$data['provider_interested_user'][$row_id][$count]['country'] = $puser->tfc_name;
				
				$proposal = $this->plisting->get_project_proposal_by_id_uid_type($row_id, $puser->tfsp_user_ref, 'p');
				$proposal_id = 0;
				if(!empty($proposal) && is_array($proposal) && sizeof($proposal) <> 0){
					$proposal_id = $proposal[0]->tpp_id;
				}
				
				$data['provider_interested_user'][$row_id][$count]['proposal_id'] = $proposal_id;
				$rresult = $this->plisting->get_rating_info_by_project($row_id, $data['user_id'], $data['user_type_ref'], $puser->tfsp_user_ref, 1);
						
				if(!empty($rresult) && is_array($rresult) && sizeof($rresult) <> 0){
					$data['provider_interested_user'][$row_id][$count]['benif_rating'] = $rresult[0]->tfur_rating_value;
				}else{
					$data['provider_interested_user'][$row_id][$count]['benif_rating'] = 0;
				}
				$data['provider_interested_user'][$row_id][$count]['benif_accept'] = $puser->tpp_beneficiary_accept;
				
				$ratinga = $this->plisting->get_user_rating_by_uid_type($puser->tfsp_user_ref, 1);
						
				if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
					$data['provider_interested_user'][$row_id][$count++]['rating'] = $ratinga[0]->tfur_rating_value;
				}else{	
					$data['provider_interested_user'][$row_id][$count++]['rating'] = 0;
				}
			}	
		}
					
		if(!empty($data["financier_interested"][$row_id]) && is_array($data["financier_interested"][$row_id]) && sizeof($data["financier_interested"][$row_id]) <> 0){
					
			$count = 0;
						
			foreach($data["financier_interested"][$row_id] as $fuser){
												
				$data['financier_interested_user'][$row_id][$count]['uid'] = $fuser->tff_user_ref;
				$data['financier_interested_user'][$row_id][$count]['ufname'] = $fuser->tff_fname;
				$data['financier_interested_user'][$row_id][$count]['ulname'] = $fuser->tff_lname;
				$data['financier_interested_user'][$row_id][$count]['uemail'] = $fuser->tff_email;
				$data['financier_interested_user'][$row_id][$count]['ucontact'] = $fuser->tff_contact;
				$data['financier_interested_user'][$row_id][$count]['uaddress'] = $fuser->tff_address;
				$data['financier_interested_user'][$row_id][$count]['uprofpic'] = $fuser->tff_pic_file;
				$data['financier_interested_user'][$row_id][$count]['company'] = $fuser->tfcom_name;
				$data['financier_interested_user'][$row_id][$count]['country'] = $fuser->tfc_name;
				
				$proposal = $this->plisting->get_project_proposal_by_id_uid_type($row_id, $fuser->tff_user_ref, 'f');
				$proposal_id = 0;
				if(!empty($proposal) && is_array($proposal) && sizeof($proposal) <> 0){
					$proposal_id = $proposal[0]->tpf_id;
				}
				
				$data['financier_interested_user'][$row_id][$count]['proposal_id'] = $proposal_id;
				$rresult = $this->plisting->get_rating_info_by_project($row_id, $data['user_id'], $data['user_type_ref'], $fuser->tff_user_ref, 2);
						
				if(!empty($rresult) && is_array($rresult) && sizeof($rresult) <> 0){
					$data['financier_interested_user'][$row_id][$count]['benif_rating'] = $rresult[0]->tfur_rating_value;
				}else{
					$data['financier_interested_user'][$row_id][$count]['benif_rating'] = 0;
				}
				$data['financier_interested_user'][$row_id][$count]['benif_accept'] = $fuser->tpf_beneficiary_accept;
				
				$ratinga = $this->plisting->get_user_rating_by_uid_type($fuser->tff_user_ref, 2);
				
				if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
					$data['financier_interested_user'][$row_id][$count++]['rating'] = $ratinga[0]->tfur_rating_value;
				}else{
					$data['financier_interested_user'][$row_id][$count++]['rating'] = 0;
				}
			}
		}
			
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
						
			$data['user_info'] = $uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
			
			$savedp = $this->plisting->get_saved_project_by_uid($data['user_id']);
			
			if(!empty($savedp) && is_array($savedp) && sizeof($savedp) <> 0){
				foreach($savedp as $svrow){
					array_push($data['saved_project'], $svrow->tfusp_project_ref);	
				}		
			}
						
			if($user['user_type_ref'] == 1){
			    /* Need Modified */
				
				$proposals_subcontractor = $this->plisting->get_project_proposal_subcontractor_accepted_by_uid_type($data['user_id'], 'p');
				$data["proposals_subcontractor_info"] = $this->plisting->get_proposal_by_contractor_ref($row_id, $data['user_id'], 'p');
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
				
				$invitation_accept = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'p');
				$proposal_submitted = $this->plisting->get_project_proposal_by_uid_type($data['user_id'], 'p');
				
				if(!empty($invitation_accept) && is_array($invitation_accept) && sizeof($invitation_accept) <> 0){
					
					foreach($invitation_accept as $invrow){
						array_push($data['invitation_accept'], $invrow->tfpi_project_ref);
					}	
				}
				
				if(!empty($proposal_submitted) && is_array($proposal_submitted) && sizeof($proposal_submitted) <> 0){
					
					foreach($proposal_submitted as $psrow){
						array_push($data['proposal_submitted'], $psrow->tpp_project_ref);
					}	
				}
				
				$data['project_proposal'] = $this->plisting->get_project_proposal_by_id_uid_type($row_id, $data['user_id'], 'p');
			}
			
			if($user['user_type_ref'] == 2){
				
				$invitation_accept = $this->plisting->get_project_invitation_by_uid_type($data['user_id'], 'f');
				$proposal_submitted = $this->plisting->get_project_proposal_by_uid_type($data['user_id'], 'f');
				
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
				
				$data['project_proposal'] = $this->plisting->get_project_proposal_by_id_uid_type($row_id, $data['user_id'], 'f');
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
		}
		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/project_info', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/listing_scripts', $data);
		$this->load->view('includes/footern');
	}	
	
	public function siteURL() {
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		// $domainName = $_SERVER['HTTP_HOST'] . '/';
		$domainName = $_SERVER['HTTP_HOST'];
		// return $protocol . $domainName;
		return $domainName;
	}
	
	public function remove_project_file(){
	
		$pfile_row = $this->input->post('frow_id');
		$action = $this->input->post('action');
		
		$data = array();
		$data['status'] = 0;
		
		if($action == 'remove_file' && $pfile_row > 0){
			
			$data_add = array();
			$data_add['tppf_row_deleted'] = 1;
			
			$result = $this->plisting->update_project_file_by_id($pfile_row, $data_add);
			
			if(!empty($result) && sizeof($result) <> 0 && $result[0]->tppf_row_deleted == 1){
				$data['status'] = 1;
			}			
		}
		
		echo json_encode($data);
	}
	
	public function invitation(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'invitation';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['pcategories'] = '';
		$data['pcontracts'] = '';
		$data['pcountries'] = '';
		$data['pstates'] = '';
		$data['project_saved']  = 0;
		$data['invitation_accept'] = array();
		$data['saved_project'] = array();
		$data['f_notification'] = 0;
		$data['p_notification'] = 0;
		$data['b_notification'] = 0;
		$data['pp_notification'] = 0;
		$data['ppex_notification'] = 0;
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$data['project_listed_info'] = '';
		
		$action = $this->input->post('action');
		$row_id = $this->input->post('row_id');
		
		redirect(base_url().'project/details');
	
	}
	
	public function fetch_sectors()
	{
		$term = $this->input->post('name_startsWith');
		$sectors = $this->plisting->get_sectors($term);
		$data = array();
		
		if($sectors && !empty($sectors) && is_array($sectors) && sizeof($sectors) <> 0){
			foreach($sectors as $srow){
				
				$name = $srow->sectorName.'|'.$srow->ID;
				array_push($data, $name);
			}
		}	
		
		echo json_encode($data);
	}
	
	public function fetch_state_by_country()
	{
		$country_id = $this->input->post('country_id');
		$states = $this->plisting->get_state_by_country_ref($country_id);
		$html_option = '<option value="0">Please select</option>';
		
		if($states && !empty($states) && is_array($states) && sizeof($states) <> 0){
			foreach($states as $srow){
				
				$html_option .= '<option value="'.$srow->tfs_id.'">'.$srow->tfs_name.'</option>';
	
			}	
		}	
			
		echo $html_option;
	}	
	
	public function fetch_location()
	{
		$term = $this->input->post('name_startsWith');
		$location_type = $this->input->post('location_type');
		$data = array();
		
		if($location_type == 0){
			$result = $this->plisting->get_state($term);
			
			if($result && !empty($result) && is_array($result) && sizeof($result) <> 0){
				foreach($result as $row){
					
					$name = $row->tfs_name.', '.$row->tfc_name.'|'.$row->tfs_id;
					array_push($data, $name);
				}
			}
		}
		
		if($location_type == 1){
			$result = $this->plisting->get_country($term);
			
			if($result && !empty($result) && is_array($result) && sizeof($result) <> 0){
				foreach($result as $row){
					
					$name = $row->tfc_name.'|'.$row->tfc_id;
					array_push($data, $name);
				}
			}
		}
			
		echo json_encode($data);
	}
}
	