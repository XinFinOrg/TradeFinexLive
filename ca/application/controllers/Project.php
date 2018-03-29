<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'rating', 'notification'));
		$this->load->library('session');
		$this->load->model(array('plisting', 'manage', 'notification'));
		$this->is_logged_in();
		
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
		
		redirect(base_url());
	}
	
	public function add_rating_project_user(){
			
		$data = array();
		$result = array();
		
		$data['page'] = 'project details';
		$data['msg'] = '';
		$data['msg_extra'] = '';
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
		
		$action = $this->input->post('action');
		$project_ref = $this->input->post('project_ref');
		$tuser_ref = $this->input->post('tuser_ref');
		$tuser_type = $this->input->post('tuser_type');
		$rating_val = $this->input->post('rating_val');
		
		if($project_ref){
			
		}else{
			$project_ref = 0;
		}
		
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
		
		if($action == 'add_rating' && $data['user_id'] <> 0 && $project_ref <> 0 && $rating_val > 0){
			
			$data_add = array();
			$project_info = $this->plisting->get_project_info_by_id($project_ref);
			
			if($project_info && !empty($project_info) && is_array($project_info) && sizeof($project_info) <> 0){
				
				$data_add['tfur_project_ref'] = $project_ref;
				$data_add['tfur_rating_value'] = $rating_val;
				$data_add['tfur_rating_user_from'] = $data['user_id'];
				$data_add['tfur_rating_user_type_from'] = $data['user_type_ref'];
				$data_add['tfur_rating_user_to'] = $tuser_ref;
				$data_add['tfur_rating_user_type_to'] = $tuser_type;
				
				$this->plisting->add_rating_info_by_project($project_ref, $data['user_id'], $data['user_type_ref'], $project_info[0]->userID, $project_info[0]->userType, $data_add);
			}	
		}

		if($action == 'update_rating' && $data['user_id'] <> 0 && $project_ref <> 0 && $rating_val > 0){
			
			$data_add = array();
			$project_info = $this->plisting->get_project_info_by_id($project_ref);
			
			if($project_info && !empty($project_info) && is_array($project_info) && sizeof($project_info) <> 0){
				
				$data_add['tfur_project_ref'] = $project_ref;
				$data_add['tfur_rating_value'] = $rating_val;
				$data_add['tfur_rating_user_from'] = $data['user_id'];
				$data_add['tfur_rating_user_type_from'] = $data['user_type_ref'];
				$data_add['tfur_rating_user_to'] = $project_info[0]->userID;
				$data_add['tfur_rating_user_type_to'] = $project_info[0]->userType;
				
				$this->plisting->update_rating_info_by_project($project_ref, $data['user_id'], $data['user_type_ref'], $project_info[0]->userID, $project_info[0]->userType, $data_add);
			}	
		}
	}
	
	public function invitation()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'invitation';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$data['uid'] = 0;
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data['user_view'] = 0;
		$data["projects_listed"] = '';
		$data['project_listed_info'] = '';
		$data['proposals'] = 0;
		
		$action = $this->input->post('action');
		$row_id = $this->input->post('row_id');
		$user_view = $this->input->post('user_view');
		$ruser_type = $this->input->post('user_type');
				
		if(trim($ruser_type) == ''){
			$ruser_type = 0;
		}
		
		if(trim($user_view) <> ''){
			$data['user_view'] = $user_view;
			$ruser_type = $user_view;
		}else{
			if(trim($ruser_type) == '' && trim($user_view) == ''){
				$ruser_type = 0;
			}
			
			if(trim($user_view) == ''){
				$data['user_view'] = 0;
				$user_view = 0;
			}
		}
		
		$data['ruser_type'] = $ruser_type;
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
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
		
		if($data['user_id'] <> 0){
						
			$data["projects_listed"] = $this->plisting->get_all_projects($data, $data['user_id']);
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['uid'] = $uresult[0]->tfsp_id;
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
					$data['uid'] = $uresult[0]->tff_id;
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
				
				if($data['user_type_ref'] == 3){
					$data['uid'] = $uresult[0]->tfb_id;
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
		
		$data['proposal_submitted_provider'] = array();
		$data['proposal_submitted_financier'] = array();
		$proposal_submitted_p = array();
		$proposal_submitted_f = array();
		
		$proposal_submitted_p = $this->plisting->get_project_proposal_by_type('p');
		
		if(!empty($proposal_submitted_p) && is_array($proposal_submitted_p) && sizeof($proposal_submitted_p) <> 0){
			
			foreach($proposal_submitted_p as $prow){
				
				if(isset($data['proposal_submitted_provider'][$prow->tpp_user_ref]) && is_array($data['proposal_submitted_provider'][$prow->tpp_user_ref]) && !empty($data['proposal_submitted_provider'][$prow->tpp_user_ref]) && sizeof($data['proposal_submitted_provider'][$prow->tpp_user_ref]) <> 0){
					
				}else{
					$data['proposal_submitted_provider'][$prow->tpp_user_ref] = array();
				}
						
				array_push($data['proposal_submitted_provider'][$prow->tpp_user_ref], $prow->tpp_project_ref);
			}
		}
				
		$proposal_submitted_f = $this->plisting->get_project_proposal_by_type('f');
		
		if(!empty($proposal_submitted_f) && is_array($proposal_submitted_f) && sizeof($proposal_submitted_f) <> 0){
			
			foreach($proposal_submitted_f as $prow){
				
				if(isset($data['proposal_submitted_financier'][$prow->tpf_user_ref]) && is_array($data['proposal_submitted_financier'][$prow->tpf_user_ref]) && !empty($data['proposal_submitted_financier'][$prow->tpf_user_ref]) && sizeof($data['proposal_submitted_financier'][$prow->tpf_user_ref]) <> 0){
					
				}else{
					$data['proposal_submitted_financier'][$prow->tpf_user_ref] = array();
				}
				
				array_push($data['proposal_submitted_financier'][$prow->tpf_user_ref], $prow->tpf_project_ref);
			}
		}
		
		$all_provider_financier = $this->manage->get_financier_provider_info($ruser_type);
		
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
		
		$fpudata = array();
		
		if(!empty($all_provider_financier) && is_array($all_provider_financier) && sizeof($all_provider_financier) <> 0){
			$count = 0;
			if(!empty($all_provider_financier[0]) && is_array($all_provider_financier[0])){
				foreach($all_provider_financier[0] as $apf){
					$fpudata[$count]['uid'] = $apf->tfu_id;
					$fpudata[$count]['name'] = $apf->tfsp_fname.' '.$apf->tfsp_lname;
					$fpudata[$count]['utype_ref'] = 1;
					$fpudata[$count]['utype'] = 'Supplier';
					$fpudata[$count]['email'] = $apf->tfsp_email;
					$fpudata[$count]['country'] = $apf->tfc_name;
					$fpudata[$count]['industry'] = $apf->cName;
					$fpudata[$count]['company'] = $apf->tfcom_name;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($apf->tfu_id, 1);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$fpudata[$count]['avg_rating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$fpudata[$count]['avg_rating'] = 0;
					}
					$fpudata[$count]['invited'] = $this->manage->get_invite_user_status($apf->tfu_id, $row_id);
					$proposal = $this->plisting->get_project_proposal_by_id_uid_type($row_id, $apf->tfu_id, 'p');
					$proposal_id = 0;
					if(!empty($proposal) && is_array($proposal) && sizeof($proposal) <> 0){
						$proposal_id = $proposal[0]->tpp_id;
					}
					$fpudata[$count]['proposal_id'] = $proposal_id;
					$fpudata[$count++]['accepted'] = $this->manage->get_accepted_user_status($apf->tfu_id, $row_id);
				}
			}
			
			if(!empty($all_provider_financier[1]) && is_array($all_provider_financier[1])){
				foreach($all_provider_financier[1] as $apf){
					$fpudata[$count]['uid'] = $apf->tfu_id;
					$fpudata[$count]['name'] = $apf->tff_fname.' '.$apf->tff_lname;
					$fpudata[$count]['utype_ref'] = 2;
					$fpudata[$count]['utype'] = 'Financier';
					$fpudata[$count]['email'] = $apf->tff_email;
					$fpudata[$count]['country'] = $apf->tfc_name;
					$fpudata[$count]['industry'] = $apf->cName;
					$fpudata[$count]['company'] = $apf->tfcom_name;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($apf->tfu_id, 2);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$fpudata[$count]['avg_rating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$fpudata[$count]['avg_rating'] = 0;
					}
					$fpudata[$count]['invited'] = $this->manage->get_invite_user_status($apf->tfu_id, $row_id);
					$proposal = $this->plisting->get_project_proposal_by_id_uid_type($row_id, $apf->tfu_id, 'f');
					$proposal_id = 0;
					if(!empty($proposal) && is_array($proposal) && sizeof($proposal) <> 0){
						$proposal_id = $proposal[0]->tpf_id;
					}
					$fpudata[$count]['proposal_id'] = $proposal_id;
					$fpudata[$count++]['accepted'] = $this->manage->get_accepted_user_status($apf->tfu_id, $row_id);
				}
			}
		}	
		
		$data['all_finpro_user'] = $fpudata;
		
		$project_info = $this->plisting->get_project_by_id_uid($data['user_id'], $row_id);
		
		$project_proposals = $this->plisting->get_project_proposals_by_id($row_id);
		
		if($project_proposals && !empty($project_proposals) && is_array($project_proposals) && sizeof($project_proposals) <> 0){
			$data['proposals'] = sizeof($project_proposals);			
		}
		
		if($project_info && !empty($project_info) && is_array($project_info) && sizeof($project_info) <> 0){
			$data['project_listed_info'] = $project_info;			
		}
				
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/project_invitation', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/listing_scripts', $data);
		$this->load->view('pages_scripts/invitation_list_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function proposal_supplier()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'proposal';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		
		$nofifya = array();
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$data['uid'] = 0;
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data['project_listed_info'] = '';
		$data['proposals'] = 0;
		$data['check_company']  = '';
		
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
		$data['uwalleta'] = '';
		$data['uwalletbal'] = '';
		$data['ubankaccno'] = '';
		$data['ubankaccname'] = '';
		$data['ulinkedin'] = '';
		$data['udesignation'] = '';
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$action = $this->input->post('action');
		$data['proj_row'] = $data['row_id'] = $row_id = $this->input->post('row_id');
		$prow_id = $this->input->post('prow_id');
		$ruser_type = $this->input->post('user_type');
		
		$config['upload_path']          = FCPATH.'assets/project_proposals/';
        $config['allowed_types']        = 'gif|jpg|png|doc|xls|xlsx|docx|pdf|txt|rtf';
        $config['max_size']             = 1048576;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 1024;
				
		if(trim($ruser_type) == ''){
			$ruser_type = 0;
		}
		
		$data['proposal_files'] = array();
		
		$data['ruser_type'] = $ruser_type;
		$data['units'] = $this->plisting->get_units();
		$data['currency'] = $this->plisting->get_currency();
		
		$project_info = $this->plisting->get_project_by_id($row_id);
		
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
				
		if($data['user_id'] <> 0 && $action == 'edit' && $prow_id <> 0){
			
			$presult = $this->plisting->get_proposal_by_ref($prow_id, $data['user_id'],  'p');
			
			if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
				
				$data['prrow'] = $presult[0]->tpp_id;
				$data['ppriceval'] = $presult[0]->tpp_price;
				$data['pcurr'] = $presult[0]->tpp_price_currency_ref;
				$data['ppricetax'] = $presult[0]->tpp_tax_percent;
				$data['ppricetot'] = $presult[0]->tpp_total_amount;
				$data['pvalid'] = $presult[0]->tpp_validity_value;
				$data['pvalidu'] = $presult[0]->tpp_validity_ref;
				$data['premarks'] = $presult[0]->tpp_remarks;
				$data['pdeliveryt'] = $presult[0]->tpp_delivery_type;
				$data['psleadtime'] = $presult[0]->tpp_delivery_lead_time_value;
				$data['psleadtimeu'] = $presult[0]->tpp_delivery_lead_time_ref;
				$data['pcommission'] = $presult[0]->tpp_completion_time_value;
				$data['pcommissionu'] = $presult[0]->tpp_completion_time_ref;
				$data['pattachf'] = $presult[0]->tpp_file;		

				$data['proposal_files'] = $this->plisting->get_proposal_files_by_id($presult[0]->tpp_id, 'p');
			}	
		}
		
		if($action == 'create_proposal' && $prow_id == 0 && $project_info && !empty($project_info) && is_array($project_info) && sizeof($project_info) <> 0){
		
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
				
				$config['upload_path']          = FCPATH.'assets/project_proposals/';
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
							
			$data_add['tpp_user_ref'] = $user['user_id'];
			$data_add['tpp_project_ref'] = $this->input->post('row_id');
			$data_add['tpp_price'] = $this->input->post('ppriceval');
			$data_add['tpp_price_currency_ref'] = $this->input->post('pcurr');
			$data_add['tpp_tax_percent'] = $this->input->post('ppricetax');
			$data_add['tpp_total_amount'] = $this->input->post('ppricetot');
			$data_add['tpp_validity_value'] = $this->input->post('pvalid');
			$data_add['tpp_validity_ref'] = $this->input->post('pvalidu');
			$data_add['tpp_validity_end_on'] = date('Y-m-d H:i:s', strtotime("+".intval($data_add['tpp_validity_value'])." days"));
			// $data_add[''] = date('Y-m-d H:i:s', strtotime($this->input->post('')));
			$data_add['tpp_delivery_type'] = $this->input->post('pdeliveryt');
			$data_add['tpp_delivery_lead_time_value'] = $this->input->post('psleadtime');
			$data_add['tpp_delivery_lead_time_ref'] = $this->input->post('psleadtimeu');
			$data_add['tpp_remarks'] = $this->input->post('premarks');
			$data_add['tpp_completion_time_value'] = $this->input->post('pcommission');
			$data_add['tpp_completion_time_ref'] = $this->input->post('pcommissionu');
			$data_add['tpp_project_user_ref'] = $project_info[0]->userID;
			
			$result = $this->plisting->add_proposal($data_add, 'p');
			
			if($result && !empty($result) && $result > 0){
								
				for($i = 0; $i < $filesCount; $i++){
							
					if(is_array($uploadData) && !empty($uploadData) && !empty($uploadData[$i])){
					
						$data_add_file = array();
						$data_add_file['tpssf_proposal_ref'] = $result;
						$data_add_file['tpssf_row_deleted'] = 0;
						$data_add_file['tpssf_file_index'] = ($i+1);
						$file_namea = explode('.', $uploadData[$i]['file_name']);
						
						$file_row = $this->plisting->add_proposal_file_by_id($result, $data_add_file, 'p');
						
						$data_add_file = array();
						$data_add_file['tpssf_filename'] = $file_row.'_'.$result.'_proposal_supplier_'.($i+1).'.'.end($file_namea);
						
						$this->plisting->update_proposal_file_by_id($file_row, $data_add_file, 'p');
						
						rename(FCPATH.'assets/project_proposals/'.$uploadData[$i]['file_name'], FCPATH.'assets/project_proposals/'.$file_row.'_'.$result.'_proposal_supplier_'.($i+1).'.'.end($file_namea));
					}
			   	}
				
				$success_data = $this->upload->data();
				$data['msg'] = 'success';
				// $data['msg_extra'] = 'Proposal has been successfully submitted !';
				
				$data['msg_extra'] = "<h3>Proposal Submitted</h3> <p>Thank You! Proposal has been successfully submitted. Click <a href='".base_url()."dashboard'>here</a> to go project dashboard.</p>";
				
				$count = 0;
				$prow_id = $this->input->post('row_id');
				$proposal_id = $result;
						
				$user_project_info = $this->plisting->get_project_info_by_id($prow_id);
				
				if($user_project_info && !empty($user_project_info) && sizeof($user_project_info) <> 0){
					
					$data['f_notification'] = $user_project_info[0]->tfb_financier_notification;
					$data['p_notification'] = $user_project_info[0]->tfb_provider_notification;
					$data['pp_notification'] = $user_project_info[0]->tfb_project_post_visibility;
					$data['ppex_notification'] = $user_project_info[0]->tfb_project_expiration_visibility;
				
					if($data['p_notification'] == 1){
							
						$nresult = $this->notification->get_proposal_provider_notification();
													
						$nofifya[$count]['notify_type'] = 'provider_proposal';
						$nofifya[$count]['notify_id'] = time();
						
						$project_info = $this->plisting->get_project_info_by_id($prow_id);
						
						$nofifya[$count]['notify_for_user'] = $data['user_id'];
						$nofifya[$count]['notify_for_user_type'] = $data['user_type_ref'];	
						$nofifya[$count]['notify_for_project'] = $prow_id;
						$nofifya[$count]['notify_for_proposal'] = $proposal_id;
						
						$user_info = $this->manage->get_user_info_by_id($data['user_id']);
						
						$nofifya[$count]['notify_user_ref'] = $user_project_info[0]->userID;
						$nofifya[$count]['notify_user_type_ref'] = $user_project_info[0]->userType;
						$nofifya[$count]['notify_text'] = 'Proposal from '.ucwords($user_info[0]->tfsp_fname.' '.$user_info[0]->tfsp_lname).'(Supplier)';
						$nofifya[$count++]['notify_time'] = date('Y-m-d H:i:s');
					}
				}
				
		   }else{
		   
				if($filesCount > 0){
					for($i = 0; $i < $filesCount; $i++){
					
						if(is_array($uploadData) && !empty($uploadData) && !empty($uploadData[$i])){
							unlink(FCPATH.'assets/project_proposals/'.$uploadData[$i]['file_name']);
						}
					}
				}
				
				// unlink(FCPATH.'assets/project_proposals/'.$file_name);
				$data['msg'] = 'error';
				// $data['msg_extra'] = 'Error occurred during submission. Try again!';
			   
				$data['msg_extra'] = "<h3>Proposal Submission Error</h3> <p>Oops! Error occurred during proposal submission. Click <a href='".base_url()."dashboard'>here</a> to go project dashboard.</p>";
			}
					
			if(!empty($nofifya) && sizeof($nofifya) <> 0){
				$this->notification->save_notification($nofifya);
			}
		}
		
		if($action == 'update_proposal' && $prow_id <> 0){
		
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
				
				$config['upload_path']          = FCPATH.'assets/project_proposals/';
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
							
			$data_add['tpp_price'] = $this->input->post('ppriceval');
			$data_add['tpp_price_currency_ref'] = $this->input->post('pcurr');
			$data_add['tpp_tax_percent'] = $this->input->post('ppricetax');
			$data_add['tpp_total_amount'] = $this->input->post('ppricetot');
			$data_add['tpp_validity_value'] = $this->input->post('pvalid');
			$data_add['tpp_validity_ref'] = $this->input->post('pvalidu');
			$data_add['tpp_validity_end_on'] = date('Y-m-d H:i:s', strtotime("+".intval($data_add['tpp_validity_value'])." days"));
			// $data_add[''] = date('Y-m-d H:i:s', strtotime($this->input->post('')));
			$data_add['tpp_delivery_type'] = $this->input->post('pdeliveryt');
			$data_add['tpp_delivery_lead_time_value'] = $this->input->post('psleadtime');
			$data_add['tpp_delivery_lead_time_ref'] = $this->input->post('psleadtimeu');
			$data_add['tpp_remarks'] = $this->input->post('premarks');
			$data_add['tpp_completion_time_value'] = $this->input->post('pcommission');
			$data_add['tpp_completion_time_ref'] = $this->input->post('pcommissionu');
			
			$result = $this->plisting->update_proposal_by_id($prow_id, $data_add, 'p');
			
			if(!empty($result) && is_array($result) && sizeof($result) <> 0 && $filesCount > 0){
				
				$data_add = array();
					
				$pfilesCount = count($this->input->post('pdocname'));
				$pfilesA = $this->input->post('pdocname');
				$pdoc_id = $this->input->post('pdoc_id');
				
				if($pfilesCount > 0){
				
					for($i = 0; $i < $pfilesCount; $i++){
					
						$prfile = $pfilesA[$i];
						
						if(is_array($uploadData) && !empty($uploadData) && !empty($uploadData[$i]) && $uploadData[$i]['file_name'] != ''){
						
							if($prfile !== '' && file_exists(FCPATH.'assets/project_proposals/'.$prfile)){
								unlink(FCPATH.'assets/project_proposals/'.$prfile);
							}
						
						}
					}
				}
								
				for($i = 0; $i < $filesCount; $i++){
							
					if(is_array($uploadData) && !empty($uploadData) && !empty($uploadData[$i])){
					
						$data_add_file = array();
						$data_add_file['tpssf_row_deleted'] = 0;
						$row_id = $result[0]->tpp_id;
						
						if($uploadData[$i]['file_name'] != ''){
						
							$file_namea = explode('.', $uploadData[$i]['file_name']);
							
							if(trim($pdoc_id[$i]) == '' || $pdoc_id[$i] == 0){
								$data_add_file['tpssf_proposal_ref'] = $result[0]->tpp_id;
								$data_add_file['tpssf_file_index'] = ($i+1);
								
								$presult = $this->plisting->get_proposal_file_by_ref_and_index($row_id, $data_add_file['tpssf_file_index'], 'p');
								
								if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
									$this->plisting->update_proposal_file_by_id($presult[0]->tpssf_id, $data_add_file, 'p');
									$pdoc_id[$i] = $presult[0]->tpssf_id;
								}else{
									$pdoc_id[$i] = $file_row = $this->plisting->add_proposal_file_by_id($row_id, $data_add_file, 'p');
								}
								
							}else{
								$file_row = $this->plisting->update_proposal_file_by_id($pdoc_id[$i], $data_add_file, 'p');
							}
													
							$data_add_file = array();
							$data_add_file['tpssf_filename'] = $pdoc_id[$i].'_'.$row_id.'_proposal_supplier_'.($i+1).'.'.end($file_namea);
							
							$this->plisting->update_proposal_file_by_id($pdoc_id[$i], $data_add_file, 'p');
							
							rename(FCPATH.'assets/project_proposals/'.$uploadData[$i]['file_name'], FCPATH.'assets/project_proposals/'.$pdoc_id[$i].'_'.$row_id.'_proposal_supplier_'.($i+1).'.'.end($file_namea));
							
						}	
					}
			   	}
				
				$success_data = $this->upload->data();
				
				$data['msg'] = 'success';
				// $data['msg_extra'] = 'Proposal has been successfully posted !';
				
				 $data['msg_extra'] = "<h3>Proposal Updated</h3> <p>Thank You! Proposal has been successfully updated. Click <a href='".base_url()."dashboard'>here</a> to go project dashboard.</p>";
				
		   }else{
			   
				// unlink(FCPATH.'assets/project_proposals/'.$file_name);
				if($filesCount > 0){
					for($i = 0; $i < $filesCount; $i++){
					
						if(is_array($uploadData) && !empty($uploadData) && !empty($uploadData[$i])){
							unlink(FCPATH.'assets/project_proposals/'.$uploadData[$i]['file_name']);
						}
					}
				}
				
				$data['msg'] = 'error';
				// $data['msg_extra'] = 'Error occurred during submission. Try again!';
			   
				$data['msg_extra'] = "<h3>Proposal Update Error</h3> <p>Oops! Error occurred during update. Try again! Click <a href='".base_url()."dashboard'>here</a> to go project dashboard.</p>";
		   }
				
		}
		
		if($data['user_id'] <> 0){
			
			$data['check_company']  = $this->manage->get_company_info_by_uid($data['user_id']);
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['uid'] = $uresult[0]->tfsp_id;
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
				
				if($data['user_type_ref'] == 2){
					$data['uid'] = $uresult[0]->tff_id;
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
				
				if($data['user_type_ref'] == 3){
					$data['uid'] = $uresult[0]->tfb_id;
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
		
		if($project_info && !empty($project_info) && is_array($project_info) && sizeof($project_info) <> 0){
			$data['project_listed_info'] = $project_info;
			
			$ratinga = $this->plisting->get_user_rating_by_uid_type($data['project_listed_info'][0]->userID, $data['project_listed_info'][0]->userType);
						
			if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
				$data['purating'] = $ratinga[0]->tfur_rating_value;
			}else{	
				$data['purating'] = 0;
			}
		}
				
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/proposal_supplier_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/listing_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function proposal_financier()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'proposal';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$data['uid'] = 0;
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data['project_listed_info'] = '';
		$data['proposals'] = 0;
		$action = $this->input->post('action');
		$row_id = $this->input->post('row_id');
		$ruser_type = $this->input->post('user_type');
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$data['prrow'] = 0;
		$data['ppriceval'] = 0;
		$data['pcurr'] = 0;
		$data['ppricetax'] = 0;
		$data['ppriceemi'] = 0;
		$data['ppricetot'] = 0;
		$data['ptenure'] = 0;
		$data['ptenureu'] = 0;
		$data['pvalid'] = 0;
		$data['pvalidu'] = 0;
		$data['premarks'] = '';
		$data['pdeliveryt'] = '';
		$data['pleadtime'] = 0;
		$data['pleadtimeu'] = 0;
		$data['pcompletion'] = 0;
		$data['pcompletionu'] = 0;
		$data['pattachf'] = '';
		$data['check_company']  = '';
		$data['uwalleta'] = '';
		$data['uwalletbal'] = '';
		$data['ubankaccno'] = '';
		$data['ubankaccname'] = '';
		$data['ulinkedin'] = '';
		$data['udesignation'] = '';
		
		$action = $this->input->post('action');
		$data['proj_row'] = $data['row_id'] = $row_id = $this->input->post('row_id');
		$prow_id = $this->input->post('prow_id');
		$ruser_type = $this->input->post('user_type');
		
		$config['upload_path']          = FCPATH.'assets/project_proposals/';
        $config['allowed_types']        = 'gif|jpg|png|doc|xls|xlsx|docx|pdf|txt|rtf';
        $config['max_size']             = 1048576;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 1024;
				
		if(trim($ruser_type) == ''){
			$ruser_type = 0;
		}
		
		$data['ruser_type'] = $ruser_type;
		$data['units'] = $this->plisting->get_units();
		$data['currency'] = $this->plisting->get_currency();
		
		$project_info = $this->plisting->get_project_by_id($row_id);
		
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
				
		if($data['user_id'] <> 0 && $action == 'edit' && $prow_id <> 0){
			
			$presult = $this->plisting->get_proposal_by_ref($prow_id, $data['user_id'],  'f');
			
			if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
				
				$data['prrow'] = $presult[0]->tpf_id;
				$data['ppriceval'] = $presult[0]->tpf_price;
				$data['pcurr'] = $presult[0]->tpf_price_currency_ref;
				$data['ppricetax'] = $presult[0]->tpf_tax_percent;
				$data['ppriceemi'] = $presult[0]->tpf_emi_amount;
				$data['ppricetot'] = $presult[0]->tpf_total_amount;
				$data['pvalid'] = $presult[0]->tpf_validity_value;
				$data['pvalidu'] = $presult[0]->tpf_validity_ref;
				$data['ptenure'] = $presult[0]->tpf_finance_tenure_value;
				$data['ptenureu'] = $presult[0]->tpf_finance_tenure_ref;
				$data['premarks'] = $presult[0]->tpf_remarks;
				$data['pattachf'] = $presult[0]->tpf_file;				
			}	
		}
		
		if($action == 'create_proposal' && $prow_id == 0 && $project_info && !empty($project_info) && is_array($project_info) && sizeof($project_info) <> 0){
					
			$file_name = time().str_replace(" ", "-", $_FILES["pattach"]['name']);
			$config['file_name'] = $file_name;
			$file_namea = explode('.', $file_name);
            $this->load->library('upload', $config);
			
			if(isset($_FILES["pattach"]['name']) && trim($_FILES["pattach"]['name']) <> ''){
				
				if(!$this->upload->do_upload('pattach'))
				{
				   $data['msg'] = 'error';
				   // $data['msg_extra'] = 'Error occurred during addition. <br/>'.$this->upload->display_errors();
				   $data['msg_extra'] = "<h3>Proposal Submission Error</h3> <p> Oops ! Error occurred during proposal submission. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
				}
				else
				{
					$data_add = array();
							
					$data_add['tpf_user_ref'] = $user['user_id'];
					$data_add['tpf_project_ref'] = $this->input->post('row_id');
					$data_add['tpf_price'] = $this->input->post('ppriceval');
					$data_add['tpf_price_currency_ref'] = $this->input->post('pcurr');
					$data_add['tpf_tax_percent'] = $this->input->post('ppricetax');
					$data_add['tpf_emi_amount'] = $this->input->post('ppriceemi');
					$data_add['tpf_total_amount'] = $this->input->post('ppricetot');
					$data_add['tpf_validity_value'] = $this->input->post('pvalid');
					$data_add['tpf_validity_ref'] = $this->input->post('pvalidu');
					$data_add['tpf_finance_tenure_value'] = $this->input->post('ptenure');
					$data_add['tpf_finance_tenure_ref'] = $this->input->post('ptenureu');
					$data_add['tpf_validity_end_on'] = date('Y-m-d H:i:s', strtotime("+".intval($data_add['tpf_validity_value'])." days"));
					$data_add['tpf_project_user_ref'] = $project_info[0]->userID;
					// $data_add[''] = date('Y-m-d H:i:s', strtotime($this->input->post('')));
					$data_add['tpf_remarks'] = $this->input->post('premarks');
					
					$result = $this->plisting->add_proposal($data_add, 'f');
					
					if($result && !empty($result) && $result > 0){
						
						$data_add = array();
						$data_add['tpf_file'] = $result.'_proposal_financier.'.end($file_namea);
						$this->plisting->update_proposal_by_id($result, $data_add, 'f');
						
						rename(FCPATH.'assets/project_proposals/'.$file_name, FCPATH.'assets/project_proposals/'.$result.'_proposal_financier.'.end($file_namea));
						$success_data = $this->upload->data();
						
						$data['msg'] = 'success';
						// $data['msg_extra'] = 'Proposal has been successfully posted !';
						$data['msg_extra'] = "<h3>Proposal Submitted</h3> <p>Thank You! Proposal has been successfully submitted. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
						
				   }else{
					   
					   unlink(FCPATH.'assets/project_proposals/'.$file_name);
					   $data['msg'] = 'error';
					   // $data['msg_extra'] = 'Error occurred during addition. Try again!';
					   $data['msg_extra'] = "<h3>Proposal Submission Error</h3> <p> Oops ! Error occurred during proposal submission. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
				   }
				}
			}else{
				
				$data_add = array();
							
				$data_add['tpf_user_ref'] = $user['user_id'];
				$data_add['tpf_project_ref'] = $this->input->post('row_id');
				$data_add['tpf_price'] = $this->input->post('ppriceval');
				$data_add['tpf_price_currency_ref'] = $this->input->post('pcurr');
				$data_add['tpf_tax_percent'] = $this->input->post('ppricetax');
				$data_add['tpf_emi_amount'] = $this->input->post('ppriceemi');
				$data_add['tpf_total_amount'] = $this->input->post('ppricetot');
				$data_add['tpf_validity_value'] = $this->input->post('pvalid');
				$data_add['tpf_validity_ref'] = $this->input->post('pvalidu');
				$data_add['tpf_finance_tenure_value'] = $this->input->post('ptenure');
				$data_add['tpf_finance_tenure_ref'] = $this->input->post('ptenureu');
				$data_add['tpf_validity_end_on'] = date('Y-m-d H:i:s', strtotime("+".intval($data_add['tpf_validity_value'])." days"));
				$data_add['tpf_project_user_ref'] = $project_info[0]->userID;
				// $data_add[''] = date('Y-m-d H:i:s', strtotime($this->input->post('')));
				$data_add['tpf_remarks'] = $this->input->post('premarks');
				
				$result = $this->plisting->add_proposal($data_add, 'f');
								
				if($result && !empty($result) && $result > 0){
					
					$data['msg'] = 'success';
					// $data['msg_extra'] = 'Proposal has been successfully submitted !';
					$data['msg_extra'] = "<h3>Proposal Submitted</h3> <p>Thank You! Proposal has been successfully submitted. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
					
					$count = 0;
					$prow_id = $this->input->post('row_id');
					$proposal_id = $result;
					
					$user_project_info = $this->plisting->get_project_info_by_id($this->input->post('row_id'));
					
					if($user_project_info && !empty($user_project_info) && sizeof($user_project_info) <> 0){
						
						$data['f_notification'] = $user_project_info[0]->tfb_financier_notification;
						$data['p_notification'] = $user_project_info[0]->tfb_provider_notification;
						$data['pp_notification'] = $user_project_info[0]->tfb_project_post_visibility;
						$data['ppex_notification'] = $user_project_info[0]->tfb_project_expiration_visibility;
					
						if($data['f_notification'] == 1){
								
							$nresult = $this->notification->get_proposal_provider_notification();
														
							$nofifya[$count]['notify_type'] = 'financier_proposal';
							$nofifya[$count]['notify_id'] = time();
							
							$project_info = $this->plisting->get_project_info_by_id($prow_id);
									
							$nofifya[$count]['notify_for_user'] = $data['user_id'];
							$nofifya[$count]['notify_for_user_type'] = $data['user_type_ref'];	
							$nofifya[$count]['notify_for_project'] = $prow_id;
							$nofifya[$count]['notify_for_proposal'] = $proposal_id;
							
							$user_info = $this->manage->get_user_info_by_id($data['user_id']);
							
							$nofifya[$count]['notify_user_ref'] = $user_project_info[0]->userID;
							$nofifya[$count]['notify_user_type_ref'] = $user_project_info[0]->userType;
							$nofifya[$count]['notify_text'] = 'Proposal from '.ucwords($user_info[0]->tff_fname.' '.$user_info[0]->tff_lname).'(Financier)';
							$nofifya[$count++]['notify_time'] = date('Y-m-d H:i:s');
						}
					}
					
				}else{
					$data['msg'] = 'error';
					// $data['msg_extra'] = 'Error occurred during submission. Try again!';
					$data['msg_extra'] = "<h3>Proposal Submission Error</h3> <p> Oops ! Error occurred during proposal submission. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
				}		
			}
							
			if(!empty($nofifya) && sizeof($nofifya) <> 0){
				$this->notification->save_notification($nofifya);
			}
		}
		
		if($action == 'update_proposal' && $prow_id <> 0){
					
			$file_name = time().str_replace(" ", "-", $_FILES["pattach"]['name']);
			$config['file_name'] = $file_name;
			$file_namea = explode('.', $file_name);
            $this->load->library('upload', $config);
			
			if(isset($_FILES["pattach"]['name']) && trim($_FILES["pattach"]['name']) <> ''){
				
				if(!$this->upload->do_upload('pattach'))
				{
				   $data['msg'] = 'error';
				   // $data['msg_extra'] = 'Error occurred during submission. <br/>'.$this->upload->display_errors();
				   $data['msg_extra'] = "<h3>Proposal Update Error</h3> <p> Oops ! Error occurred during proposal submission. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
				}
				else
				{
					$data_add = array();
							
					$data_add['tpf_price'] = $this->input->post('ppriceval');
					$data_add['tpf_price_currency_ref'] = $this->input->post('pcurr');
					$data_add['tpf_tax_percent'] = $this->input->post('ppricetax');
					$data_add['tpf_emi_amount'] = $this->input->post('ppriceemi');
					$data_add['tpf_total_amount'] = $this->input->post('ppricetot');
					$data_add['tpf_validity_value'] = $this->input->post('pvalid');
					$data_add['tpf_validity_ref'] = $this->input->post('pvalidu');
					$data_add['tpf_finance_tenure_value'] = $this->input->post('ptenure');
					$data_add['tpf_finance_tenure_ref'] = $this->input->post('ptenureu');
					$data_add['tpf_beneficiary_edit_mode'] = 0;
					$data_add['tpf_validity_end_on'] = date('Y-m-d H:i:s', strtotime("+".intval($data_add['tpf_validity_value'])." days"));
					// $data_add[''] = date('Y-m-d H:i:s', strtotime($this->input->post('')));
					$data_add['tpf_remarks'] = $this->input->post('premarks');
					
					$result = $this->plisting->update_proposal_by_id($prow_id, $data_add, 'f');
					
					if(!empty($result) && is_array($result) && sizeof($result) <> 0){
						
						$data_add = array();
						$data_add['tpf_file'] = $prow_id.'_proposal_financier.'.end($file_namea);
						$this->plisting->update_proposal_by_id($prow_id, $data_add, 'f');
						
						rename(FCPATH.'assets/project_proposals/'.$file_name, FCPATH.'assets/project_proposals/'.$prow_id.'_proposal_financier.'.end($file_namea));
						$success_data = $this->upload->data();
						
						$data['msg'] = 'success';
						// $data['msg_extra'] = 'Proposal has been successfully submitted !';
						$data['msg_extra'] = "<h3>Proposal Updated</h3> <p>Thank You ! Proposal has been successfully updated. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
						
				   }else{
					   
						unlink(FCPATH.'assets/project_proposals/'.$file_name);
						$data['msg'] = 'error';
						// $data['msg_extra'] = 'Error occurred during submission. Try again!';
						$data['msg_extra'] = "<h3>Proposal Update Error</h3> <p> Oops ! Error occurred during proposal submission. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
				   }
				}
			}else{
				
				$data_add = array();
							
				$data_add['tpf_price'] = $this->input->post('ppriceval');
				$data_add['tpf_price_currency_ref'] = $this->input->post('pcurr');
				$data_add['tpf_tax_percent'] = $this->input->post('ppricetax');
				$data_add['tpf_emi_amount'] = $this->input->post('ppriceemi');
				$data_add['tpf_total_amount'] = $this->input->post('ppricetot');
				$data_add['tpf_validity_value'] = $this->input->post('pvalid');
				$data_add['tpf_validity_ref'] = $this->input->post('pvalidu');
				$data_add['tpf_finance_tenure_value'] = $this->input->post('ptenure');
				$data_add['tpf_finance_tenure_ref'] = $this->input->post('ptenureu');
				$data_add['tpf_beneficiary_edit_mode'] = 0;
				$data_add['tpf_validity_end_on'] = date('Y-m-d H:i:s', strtotime("+".intval($data_add['tpf_validity_value'])." days"));
				// $data_add[''] = date('Y-m-d H:i:s', strtotime($this->input->post('')));
				$data_add['tpf_remarks'] = $this->input->post('premarks');
				
				$result = $this->plisting->update_proposal_by_id($prow_id, $data_add, 'f');
					
				if(!empty($result) && is_array($result) && sizeof($result) <> 0){
					
					$data['msg'] = 'success';
					// $data['msg_extra'] = 'Proposal has been successfully updated !';
					$data['msg_extra'] = "<h3>Proposal Updated</h3> <p>Thank You ! Proposal has been successfully updated. Click <a href='".base_url()."'>here</a> to go project dashboard.</p>";
				
				}else{
					
					$data['msg'] = 'error';
					// $data['msg_extra'] = 'Error occurred during update. Try again!';
					$data['msg_extra'] = "<h3>Proposal Update Error</h3> <p> Oops ! Error occurred during proposal submission. Click <a href='".base_url()."project/details'>here</a> to go project dashboard.</p>";
				}		
			}	
		}
		
		if(trim($ruser_type) == ''){
			$ruser_type = 0;
		}
		
		$data['ruser_type'] = $ruser_type;
		
		if($data['user_id'] <> 0){
			
			$data['check_company']  = $this->manage->get_company_info_by_uid($data['user_id']);
						
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['uid'] = $uresult[0]->tfsp_id;
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
				
				if($data['user_type_ref'] == 2){
					$data['uid'] = $uresult[0]->tff_id;
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
				
				if($data['user_type_ref'] == 3){
					$data['uid'] = $uresult[0]->tfb_id;
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
		
		if($project_info && !empty($project_info) && is_array($project_info) && sizeof($project_info) <> 0){
			$data['project_listed_info'] = $project_info;	

			$ratinga = $this->plisting->get_user_rating_by_uid_type($data['project_listed_info'][0]->userID, $data['project_listed_info'][0]->userType);
						
			if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
				$data['purating'] = $ratinga[0]->tfur_rating_value;
			}else{	
				$data['purating'] = 0;
			}
		}
				
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/proposal_financier_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/listing_scripts', $data);
		$this->load->view('includes/footern');
	}
	
	public function remove_proposal_file(){
	
		$pfile_row = $this->input->post('frow_id');
		$action = $this->input->post('action');
		
		$data = array();
		$data['status'] = 0;
		
		if($action == 'remove_file_supplier' && $pfile_row > 0){
			
			$data_add = array();
			$data_add['tpssf_row_deleted'] = 1;
			
			$result = $this->plisting->update_proposal_file_by_id($pfile_row, $data_add, 'p');
			
			if(!empty($result) && sizeof($result) <> 0 && $result[0]->tpssf_row_deleted == 1){
				$data['status'] = 1;
			}			
		}
		
		echo json_encode($data);
	}
	
	public function proposalv()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'proposalv';
		$data['msg'] = '';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$data['uid'] = 0;
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		$data['uclogo'] = '';
		$data['project_listed_info'] = '';
		$data['proposals'] = 0;
		$data['ptenure'] = 0;
		$data['ptenureu'] = 0;
		$data['puname'] = '';
		$data['puprofpic'] = '';
		$data['pucompany'] = '';
		$data['pucountry'] = '';
		$data['puaddress'] = '';
		$data['puindustry'] = '';
		$data['puclogo'] = '';
					
		$data['putype'] = '';
		$data['purating'] = 0;
		
		$data['prrow'] = 0;
		$data['puser'] = 0;
		$data['ppriceval'] = 0;
		$data['pcurr'] = 0;
		$data['psubc'] = 0;
		$data['psubc_amt'] = 0;
		$data['ppricetax'] = 0;
		$data['ppriceemi'] = 0;
		$data['ppricetot'] = 0;
		$data['pvalid'] = 0;
		$data['pvalidu'] = 0;
		$data['premarks'] = '';
		$data['pdeliveryt'] = '';
		$data['pleadtime'] = 0;
		$data['pleadtimeu'] = 0;
		$data['pcompletion'] = 0;
		$data['pcompletionu'] = 0;
		$data['pattachf'] = '';
		$data['projref'] = 0;
		$data['pawarded'] = 0;
		$data['peditmode'] = 0;
		$data['special_request'] = '';
		$data['paccepted'] = 0;
		$data['prowdeleted'] = 0;
		$data['putype_ref'] = 0;
		$data['psresult'] = array();
		$data['proposal_files'] = array();
		
		$action = $this->input->post('action');
		$data['row_id'] = $row_id = $this->input->post('row_id');
		$prow_id = $this->input->post('prow_id');
		$ruser_id = $this->input->post('user_id');
		$ruser_type = $this->input->post('user_type');
		
		if(trim($ruser_type) == ''){
			$ruser_type = 0;
		}
		
		$data['ruser_type'] = $ruser_type;
		$data['units'] = $this->plisting->get_units();
		$data['currency'] = $this->plisting->get_currency();
		
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
		
		if($action == 'request_message_to_modify' && $row_id > 0 && $data['user_id'] <> 0 && $ruser_id > 0 && $ruser_type > 0){
			
			$data_add = array();
			
			$rmsg_detail = $this->input->post('rmsg_detail');
			
			if($ruser_type == 1){
			
				$data_add['tpp_beneficiary_edit_mode '] = 1;
				$data_add['tpp_beneficiary_request_message'] = $rmsg_detail;
				
				$this->plisting->update_proposal_by_project_and_user_ref($row_id, $ruser_id, $data_add, 'p');
			
			}
			
			if($ruser_type == 2){
			
				$data_add['tpf_beneficiary_edit_mode '] = 1;
				$data_add['tpf_beneficiary_request_message'] = $rmsg_detail;
				
				$this->plisting->update_proposal_by_project_and_user_ref($row_id, $ruser_id, $data_add, 'f');
			
			}
		}
		
		if($action == 'proposal_accept' && $prow_id <> 0){
			
			$data_add = array();
				
			if($ruser_type == 1){
				
				$presult = $this->plisting->get_proposal_by_id($prow_id, 'p');
								
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0 && $presult[0]->tpp_beneficiary_accept == 0){
					$data['msg'] = 'success';
					$data['msg_extra'] = 'Project has been successfully awarded to supplier!';
				}
				
				$data_add['tpp_beneficiary_accept'] = 1;
				$data_add['tpp_beneficiary_accept_time'] = date('Y-m-d H:i:s');
				$result = $this->plisting->update_proposal_by_id($prow_id, $data_add, 'p');
				
				$data_add = array();
				
				if(!empty($result) && is_array($result) && sizeof($result) <> 0){
							
					$data_add['awarded_provider'] = 1;
					// $data_add['pstartingDate'] = date('Y-m-d H:i:s');
					$this->plisting->update_project_by_id($row_id, $data_add);
					
					$this->plisting->reject_other_proposal_by_project($row_id, $ruser_id, 'p');
				}
			}
			
			if($ruser_type == 2){
			
				$presult = $this->plisting->get_proposal_by_id($prow_id, 'f');
				
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0 && $presult[0]->tpf_beneficiary_accept == 0){
					$data['msg'] = 'success';
					$data['msg_extra'] = 'Project has been successfully awarded to financier!';
				}
				
				$data_add['tpf_beneficiary_accept'] = 1;
				$data_add['tpf_beneficiary_accept_time'] = date('Y-m-d H:i:s');
				$result = $this->plisting->update_proposal_by_id($prow_id, $data_add, 'f');
				
				$data_add = array();
				
				if(!empty($result) && is_array($result) && sizeof($result) <> 0){
								
					// $data_add['awarded_financier'] = 1;
					// $data_add['fstartingDate'] = date('Y-m-d H:i:s');
					// $this->plisting->update_project_by_id($row_id, $data_add);
					
					// $this->plisting->reject_other_proposal_by_project($row_id, $ruser_id, 'f');
				}
			}
		}
		
		if($action == 'proposal_reject' && $prow_id <> 0){
			
			$data_add = array();
			
			if($ruser_type == 1){
		
				$presult = $this->plisting->get_proposal_by_id($prow_id, 'p');
					
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0 && $presult[0]->prow_deleted == 0){
					$data['msg'] = 'success';
					$data['msg_extra'] = 'Proposal has been successfully rejected!';
				}
				
				$data_add['prow_deleted'] = 1;
				$result = $this->plisting->update_proposal_by_id($prow_id, $data_add, 'p');
			}	
			
			if($ruser_type == 2){
		
				$presult = $this->plisting->get_proposal_by_id($prow_id, 'f');
					
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0 && $presult[0]->prow_deleted == 0){
					$data['msg'] = 'success';
					$data['msg_extra'] = 'Proposal has been successfully rejected!';
				}
				
				$data_add['prow_deleted'] = 1;
				$data_add['tpf_awardStatus '] = 2;
				$result = $this->plisting->update_proposal_by_id($prow_id, $data_add, 'f');
			}
		}
				
		$project_info = $this->plisting->get_project_by_id($row_id);
				
		if(($action == 'request_message_to_modify' || $action == 'proposal_accept' || $action == 'proposal_reject' || $action == 'proposal_view') && $prow_id <> 0){
			
			if($ruser_type == 1){
			
				$presult = $this->plisting->get_proposal_by_id($prow_id, 'p');
				$psresult = $this->plisting->get_contractor_proposal_by_id($prow_id, 'p');
				$data['psresult'] = $psresult;
				
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
					
					$data['prrow'] = $presult[0]->tpp_id;
					$data['projref'] = $presult[0]->tpp_project_ref;
					$data['puser'] = $presult[0]->tpp_user_ref;
					$data['puname'] = $presult[0]->tfsp_fname.' '.$presult[0]->tfsp_lname;
					$data['puprofpic'] = $presult[0]->tfsp_pic_file;
					$data['puaddress'] = $presult[0]->tfcom_address;
					$data['puindustry'] = $presult[0]->cName;
					$data['pucompany'] = $presult[0]->tfcom_name;
					$data['puclogo'] = $presult[0]->tfcom_logo_file;
					$data['pucountry'] = $presult[0]->tfc_name;
					$data['putype'] = 'supplier';
					$data['putype_ref'] = 1;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($presult[0]->tfsp_user_ref, 1);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$data['purating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$data['purating'] = 0;
					}
					
					$data['pawarded'] = $presult[0]->awarded_provider;
					$data['paccepted'] = $presult[0]->tpp_beneficiary_accept;
					$data['prowdeleted'] = $presult[0]->prow_deleted;
					$data['ppriceval'] = $presult[0]->tpp_price;
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
					$data['psubc'] = $presult[0]->tpp_contract_mode;
					$data['psubc_amt'] = $presult[0]->tpp_contract_amount;
					$data['peditmode'] = $presult[0]->tpp_beneficiary_edit_mode;	
					$data['special_request'] = $presult[0]->tpp_beneficiary_request_message;
				}	
			}
			
			if($ruser_type == 2){
			
				$presult = $this->plisting->get_proposal_by_id($prow_id, 'f');
								
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
					
					$data['prrow'] = $presult[0]->tpf_id;
					$data['projref'] = $presult[0]->tpf_project_ref;
					$data['puser'] = $presult[0]->tpf_user_ref;
					$data['puname'] = $presult[0]->tff_fname.' '.$presult[0]->tff_lname;
					$data['puprofpic'] = $presult[0]->tff_pic_file;
					$data['puaddress'] = $presult[0]->tfcom_address;
					$data['puindustry'] = $presult[0]->cName;
					$data['pucompany'] = $presult[0]->tfcom_name;
					$data['puclogo'] = $presult[0]->tfcom_logo_file;
					$data['pucountry'] = $presult[0]->tfc_name;
					$data['putype'] = 'financier';
					$data['putype_ref'] = 2;
					$ratinga = $this->plisting->get_user_rating_by_uid_type($presult[0]->tff_user_ref, 2);
						
					if(!empty($ratinga) && is_array($ratinga) && sizeof($ratinga) <> 0 && trim($ratinga[0]->tfur_rating_value) <> ''){
						$data['purating'] = $ratinga[0]->tfur_rating_value;
					}else{	
						$data['purating'] = 0;
					}
					$data['pawarded'] = $presult[0]->awarded_financier;
					$data['paccepted'] = $presult[0]->tpf_beneficiary_accept;
					$data['prowdeleted'] = $presult[0]->prow_deleted;
					$data['ppriceval'] = $presult[0]->tpf_price;
					$data['pcurr'] = $this->plisting->get_currency_by_id($presult[0]->tpf_price_currency_ref);
					$data['ppricetax'] = $presult[0]->tpf_tax_percent;
					$data['ppriceemi'] = $presult[0]->tpf_emi_amount;
					$data['ppricetot'] = $presult[0]->tpf_total_amount;
					$data['pvalid'] = $presult[0]->tpf_validity_value;
					$data['pvalidu'] = $this->plisting->get_units_by_id($presult[0]->tpf_validity_ref);
					$data['ptenure'] = $presult[0]->tpf_finance_tenure_value;
					$data['ptenureu'] = $this->plisting->get_units_by_id($presult[0]->tpf_finance_tenure_ref);
					$data['premarks'] = $presult[0]->tpf_remarks;
					$data['pattachf'] = $presult[0]->tpf_file;	
					$data['peditmode'] = $presult[0]->tpf_beneficiary_edit_mode;	
					$data['special_request'] = $presult[0]->tpf_beneficiary_request_message;
				}	
			}
		}
		
		$nofifya = array();
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['uid'] = $uresult[0]->tfsp_id;
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uindustry'] = $uresult[0]->cName;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uclogo'] = $uresult[0]->tfcom_logo_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
				
				if($data['user_type_ref'] == 2){
					$data['uid'] = $uresult[0]->tff_id;
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uindustry'] = $uresult[0]->cName;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uclogo'] = $uresult[0]->tfcom_logo_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
				
				if($data['user_type_ref'] == 3){
					$data['uid'] = $uresult[0]->tfb_id;
					$data['ufname'] = $uresult[0]->tfb_fname;
					$data['ulname'] = $uresult[0]->tfb_lname;
					$data['uemail'] = $uresult[0]->tfb_email;
					$data['ucontact'] = $uresult[0]->tfb_contact;
					$data['uaddress'] = $uresult[0]->tfb_address;
					$data['uindustry'] = $uresult[0]->cName;
					$data['uprofpic'] = $uresult[0]->tfb_pic_file;
					$data['uclogo'] = $uresult[0]->tfcom_logo_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
			}	
			
			if($prow_id <> 0 && $row_id <> 0 && ($action == 'proposal_accept' || $action == 'proposal_reject')){
			
				$userinfo = $this->manage->get_all_user_info();
				$count = 0;
								
				// $user_id = $urow->tfu_id;
				// $user_type_ref = $urow->tfu_utype;
				$user_id = $data['user_id'];
				$user_type_ref = $data['user_type_ref'];
				$data['bb_notification'] = 0;
								
				if($ruser_type == 1){
					
					$nresult = $this->manage->get_notification_setting($ruser_id, $ruser_type);
					
					if(!empty($nresult) && is_array($nresult) && sizeof($nresult) <> 0){
						$data['bb_notification'] = $nresult[0]->tfsp_benif_notification;
					}	
				}
				
				if($ruser_type == 2){
					
					$nresult = $this->manage->get_notification_setting($ruser_id, $ruser_type);
					
					if(!empty($nresult) && is_array($nresult) && sizeof($nresult) <> 0){
						$data['bb_notification'] = $nresult[0]->tff_benif_notification;
					}	
				}
								
				if($ruser_type == 1){
				
					$data['proposal_files'] = $this->plisting->get_proposal_files_by_id($prow_id, 'p');
					
					if($data['bb_notification'] == 1){
						
						if($action == 'proposal_accept'){						
							$nofifya[$count]['notify_type'] = 'provider_proposal_accept';
						}
						
						if($action == 'proposal_reject'){
							$nofifya[$count]['notify_type'] = 'provider_proposal_reject';
						}	
						
						$nofifya[$count]['notify_id'] = time();
						
						$project_info = $this->plisting->get_project_info_by_id($row_id);
						
						$nofifya[$count]['notify_for_user'] = $project_info[0]->userID;
						$nofifya[$count]['notify_for_user_type'] = $project_info[0]->userType;
						$nofifya[$count]['notify_for_project'] = $row_id;
						$nofifya[$count]['notify_for_proposal'] = $prow_id;
						
						$puser_info = $this->manage->get_user_info_by_id($project_info[0]->userID);
						
						$nuser_info = $this->manage->get_user_info_by_id($ruser_id);
						
						$nofifya[$count]['notify_user_ref'] = $nuser_info[0]->tfu_id;
						$nofifya[$count]['notify_user_type_ref'] = $nuser_info[0]->tfu_utype;
						
						if($action == 'proposal_accept'){
							$nofifya[$count]['notify_text'] = 'Proposal accepted by '.ucwords($puser_info[0]->tfb_fname.' '.$puser_info[0]->tfb_lname).'(Beneficiary)';
						}
						
						if($action == 'proposal_reject'){
							$nofifya[$count]['notify_text'] = 'Proposal rejected by '.ucwords($puser_info[0]->tfb_fname.' '.$puser_info[0]->tfb_lname).'(Beneficiary)';
						}
						
						$nofifya[$count++]['notify_time'] = date('Y-m-d H:i:s');
						
					}	
				}	
				
				if($ruser_type == 2){
					
					if($data['bb_notification'] == 1){
						
						if($action == 'proposal_accept'){						
							$nofifya[$count]['notify_type'] = 'financier_proposal_accept';
						}
						
						if($action == 'proposal_reject'){
							$nofifya[$count]['notify_type'] = 'financier_proposal_reject';
						}	
						
						$nofifya[$count]['notify_id'] = time();
						
						$project_info = $this->plisting->get_project_info_by_id($row_id);
						
						$nofifya[$count]['notify_for_user'] = $project_info[0]->userID;
						$nofifya[$count]['notify_for_user_type'] = $project_info[0]->userType;
						$nofifya[$count]['notify_for_project'] = $row_id;
						$nofifya[$count]['notify_for_proposal'] = $prow_id;
						
						$puser_info = $this->manage->get_user_info_by_id($project_info[0]->userID);
						
						$nuser_info = $this->manage->get_user_info_by_id($ruser_id);
						
						$nofifya[$count]['notify_user_ref'] = $nuser_info[0]->tfu_id;
						$nofifya[$count]['notify_user_type_ref'] = $nuser_info[0]->tfu_utype;
						
						if($action == 'proposal_accept'){
							$nofifya[$count]['notify_text'] = 'Proposal accepted by '.ucwords($puser_info[0]->tfb_fname.' '.$puser_info[0]->tfb_lname).'(Beneficiary)';
						}
						
						if($action == 'proposal_reject'){
							$nofifya[$count]['notify_text'] = 'Proposal rejected by '.ucwords($puser_info[0]->tfb_fname.' '.$puser_info[0]->tfb_lname).'(Beneficiary)';
						}
						
						$nofifya[$count++]['notify_time'] = date('Y-m-d H:i:s');
					}
				}
								
				if(!empty($nofifya) && sizeof($nofifya) <> 0){
					$this->notification->save_notification($nofifya);
				}
			}
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
	
		if($project_info && !empty($project_info) && is_array($project_info) && sizeof($project_info) <> 0){
			$data['project_listed_info'] = $project_info;			
		}
					
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/submitted_proposal_view', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/listing_scripts', $data);
		$this->load->view('includes/footern');
	}

	public function get_contacts(){
	
		$data = array();
		$result = array();
		
		$data['page'] = 'invitation';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$contact_list = $this->plisting->get_contacts_by_user($user['user_id']);
		
		$usera = array();
		
		foreach($contact_list as $crow){
			
			if(!in_array($crow['uid'], $usera) && $crow['uid'] !== $data['user_id']){
				array_push($usera, $crow['uid']);
			}
		}
		
		$user_detail = array();
		
		for($i=0; $i < sizeof($usera); $i++){
		
			$uresult = $this->manage->get_user_info_by_id($usera[$i]);
			array_push($user_detail, $uresult); 
		}
		
		return $user_detail;
	}
	
	public function message_board(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'Message Board';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$data['uid'] = 0;
		$data['ufname'] = '';
		$data['ulname'] = '';
		$data['uemail'] = '';
		$data['ucontact'] = '';
		$data['uaddress'] = '';
		$data['uname'] = '';
		$data['upass'] = '';
		$data['uprofpic'] = '';
		
		$data["projects_listed"] = '';
		$data['project_listed_info'] = '';
		$data['proposals'] = 0;
		$data['pmessages'] = array();
		$data['msg_user'] = array();
		$data['user_contacts'] = array();
		$data['msg_suser'] = array();
		
		$action = $this->input->post('action');
		// $row_id = $this->input->post('row_id');
		// $pref = $this->input->post('pref');
		$send_to_user_ref = $this->input->post('send_user');
		$send_to_user_type_ref = $this->input->post('send_user_type');
				
		if($send_to_user_ref && $send_to_user_ref > 0){
			$data['send_user'] = $send_to_user_ref;
			$this->session->set_userdata('sendto_user_ref', $send_to_user_ref);
		}else{
			$data['send_user'] = 0;
		}
		
		if($send_to_user_type_ref && $send_to_user_type_ref > 0){
			$data['send_user_type'] = $send_to_user_type_ref;
			$this->session->set_userdata('sendto_user_type_ref', $send_to_user_type_ref);
		}else{
			$data['send_user_type'] = 0;
		} 
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$data['msg'] = '';
		$data['msg_extra'] = '';
				
		$config['upload_path']          = FCPATH.'assets/project_post_files/';
        $config['allowed_types']        = 'gif|jpg|png|doc|xls|xlsx|docx|pdf|txt|rtf';
        $config['max_size']             = 1048576;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 1024;
		
		if($action == 'send' && $send_to_user_ref <> 0 && $send_to_user_type_ref <> 0){
				
			$file_name = time().str_replace(" ", "-", $_FILES["mdoc"]['name']);
			$config['file_name'] = $file_name;
			$file_namea = explode('.', $file_name);
            $this->load->library('upload', $config);
					
			if(isset($_FILES["mdoc"]['name']) && trim($_FILES["mdoc"]['name']) <> ''){
				
				if(!$this->upload->do_upload('mdoc'))
				{
				   $data['msg'] = 'error';
				   $data['msg_extra'] = 'Error occurred during upload. <br/>'.$this->upload->display_errors();
				}
				else
				{
					$data_add = array();
							
					$data_add['tfpmb_sender_ref'] = $user['user_id'];
					$data_add['tfpmb_sender_type_ref'] = $user['user_type_ref'];
					$data_add['tfpmb_receiver_ref'] = $send_to_user_ref;
					$data_add['tfpmb_receiver_type_ref'] = $send_to_user_type_ref;
					$data_add['tfpmb_message'] = preg_replace('/(<br>)+$/', '', $this->input->post('mdesc'));
					// $data_add['tfpmb_project_ref'] = $this->input->post('pref');
										
					$result = $this->plisting->add_message($data_add);
					
					if($result && !empty($result) && $result > 0){
						
						$data_add = array();
						$data_add['tfpmb_file'] = $result.'_message.'.end($file_namea);
						$this->plisting->update_message_by_id($result, $data_add);
						
						rename(FCPATH.'assets/project_post_files/'.$file_name, FCPATH.'assets/project_post_files/'.$result.'_message.'.end($file_namea));
						$success_data = $this->upload->data();
						$data['msg'] = 'success';
									
					}else{
					   
						unlink(FCPATH.'assets/project_post_files/'.$file_name);
						$data['msg'] = 'error';
						$data['msg_extra'] = 'Error occurred during upload. Try again!';
					}
				}
			}else{
				
				$data_add = array();
							
				$data_add['tfpmb_sender_ref'] = $user['user_id'];
				$data_add['tfpmb_sender_type_ref'] = $user['user_type_ref'];
				$data_add['tfpmb_receiver_ref'] = $send_to_user_ref;
				$data_add['tfpmb_receiver_type_ref'] = $send_to_user_type_ref;
				$data_add['tfpmb_message'] = preg_replace('/(<br>)+$/', '', $this->input->post('mdesc'));
				// $data_add['tfpmb_project_ref'] = $this->input->post('pref');
					
				$result = $this->plisting->add_message($data_add);
								
				if($result && !empty($result) && $result > 0){
					
					$data['msg'] = 'success';
										
				}else{
					$data['msg'] = 'error';
					$data['msg_extra'] = 'Error occurred during sending message. Try again!';
				}		
			}	
		}
		
		if($send_to_user_ref <> 0 && $send_to_user_type_ref <> 0){
			
			$mresult = $this->plisting->get_message_by_user_and_type($user['user_id'], $user['user_type_ref'], $send_to_user_ref, $send_to_user_type_ref);
			$data['pmessages'] = $mresult;
			
			$msuser_info = $this->plisting->get_user_info_by_id_and_type($send_to_user_ref, $send_to_user_type_ref);
										
			if(!empty($msuser_info) && is_array($msuser_info) && sizeof($msuser_info) <> 0){
				
				if($send_to_user_type_ref == 1){
					$data['msg_suser']['uid'] = $msuser_info[0]->tfsp_id;
					$data['msg_suser']['ufname'] = $msuser_info[0]->tfsp_fname;
					$data['msg_suser']['ulname'] = $msuser_info[0]->tfsp_lname;
					$data['msg_suser']['utype'] = 'Supplier';
					$data['msg_suser']['uemail'] = $msuser_info[0]->tfsp_email;
					$data['msg_suser']['ucontact'] = $msuser_info[0]->tfsp_contact;
					$data['msg_suser']['uaddress'] = $msuser_info[0]->tfsp_address;
					$data['msg_suser']['uprofpic'] = $msuser_info[0]->tfsp_pic_file;
					$data['msg_suser']['uname'] = $msuser_info[0]->tfu_usern;
					$data['msg_suser']['upass'] = $msuser_info[0]->tfu_passwd;
				}
				
				if($send_to_user_type_ref == 2){
					$data['msg_suser']['uid'] = $msuser_info[0]->tff_id;
					$data['msg_suser']['ufname'] = $msuser_info[0]->tff_fname;
					$data['msg_suser']['ulname'] = $msuser_info[0]->tff_lname;
					$data['msg_suser']['utype'] = 'Financier';
					$data['msg_suser']['uemail'] = $msuser_info[0]->tff_email;
					$data['msg_suser']['ucontact'] = $msuser_info[0]->tff_contact;
					$data['msg_suser']['uaddress'] = $msuser_info[0]->tff_address;
					$data['msg_suser']['uprofpic'] = $msuser_info[0]->tff_pic_file;
					$data['msg_suser']['uname'] = $msuser_info[0]->tfu_usern;
					$data['msg_suser']['upass'] = $msuser_info[0]->tfu_passwd;
				}
				
				if($send_to_user_type_ref == 3){
					$data['msg_suser']['uid'] = $msuser_info[0]->tfb_id;
					$data['msg_suser']['ufname'] = $msuser_info[0]->tfb_fname;
					$data['msg_suser']['ulname'] = $msuser_info[0]->tfb_lname;
					$data['msg_suser']['utype'] = 'Beneficiary';
					$data['msg_suser']['uemail'] = $msuser_info[0]->tfb_email;
					$data['msg_suser']['ucontact'] = $msuser_info[0]->tfb_contact;
					$data['msg_suser']['uaddress'] = $msuser_info[0]->tfb_address;
					$data['msg_suser']['uprofpic'] = $msuser_info[0]->tfb_pic_file;
					$data['msg_suser']['uname'] = $msuser_info[0]->tfu_usern;
					$data['msg_suser']['upass'] = $msuser_info[0]->tfu_passwd;
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
			
			if($mresult && !empty($mresult) && sizeof($mresult) <> 0){
			
				foreach($mresult as $mrow){
					
					$muser_info = $this->plisting->get_user_info_by_id_and_type($mrow->tfpmb_sender_ref, $mrow->tfpmb_sender_type_ref);
										
					if(!empty($muser_info) && is_array($muser_info) && sizeof($muser_info) <> 0){
						
						if($mrow->tfpmb_sender_type_ref == 1){
							$data['msg_user'][$mrow->tfpmb_id]['uid'] = $muser_info[0]->tfsp_id;
							$data['msg_user'][$mrow->tfpmb_id]['ufname'] = $muser_info[0]->tfsp_fname;
							$data['msg_user'][$mrow->tfpmb_id]['ulname'] = $muser_info[0]->tfsp_lname;
							$data['msg_user'][$mrow->tfpmb_id]['uemail'] = $muser_info[0]->tfsp_email;
							$data['msg_user'][$mrow->tfpmb_id]['ucontact'] = $muser_info[0]->tfsp_contact;
							$data['msg_user'][$mrow->tfpmb_id]['uaddress'] = $muser_info[0]->tfsp_address;
							$data['msg_user'][$mrow->tfpmb_id]['uprofpic'] = $muser_info[0]->tfsp_pic_file;
							$data['msg_user'][$mrow->tfpmb_id]['uname'] = $muser_info[0]->tfu_usern;
							$data['msg_user'][$mrow->tfpmb_id]['upass'] = $muser_info[0]->tfu_passwd;
						}
						
						if($mrow->tfpmb_sender_type_ref == 2){
							$data['msg_user'][$mrow->tfpmb_id]['uid'] = $muser_info[0]->tff_id;
							$data['msg_user'][$mrow->tfpmb_id]['ufname'] = $muser_info[0]->tff_fname;
							$data['msg_user'][$mrow->tfpmb_id]['ulname'] = $muser_info[0]->tff_lname;
							$data['msg_user'][$mrow->tfpmb_id]['uemail'] = $muser_info[0]->tff_email;
							$data['msg_user'][$mrow->tfpmb_id]['ucontact'] = $muser_info[0]->tff_contact;
							$data['msg_user'][$mrow->tfpmb_id]['uaddress'] = $muser_info[0]->tff_address;
							$data['msg_user'][$mrow->tfpmb_id]['uprofpic'] = $muser_info[0]->tff_pic_file;
							$data['msg_user'][$mrow->tfpmb_id]['uname'] = $muser_info[0]->tfu_usern;
							$data['msg_user'][$mrow->tfpmb_id]['upass'] = $muser_info[0]->tfu_passwd;
						}
						
						if($mrow->tfpmb_sender_type_ref == 3){
							$data['msg_user'][$mrow->tfpmb_id]['uid'] = $muser_info[0]->tfb_id;
							$data['msg_user'][$mrow->tfpmb_id]['ufname'] = $muser_info[0]->tfb_fname;
							$data['msg_user'][$mrow->tfpmb_id]['ulname'] = $muser_info[0]->tfb_lname;
							$data['msg_user'][$mrow->tfpmb_id]['uemail'] = $muser_info[0]->tfb_email;
							$data['msg_user'][$mrow->tfpmb_id]['ucontact'] = $muser_info[0]->tfb_contact;
							$data['msg_user'][$mrow->tfpmb_id]['uaddress'] = $muser_info[0]->tfb_address;
							$data['msg_user'][$mrow->tfpmb_id]['uprofpic'] = $muser_info[0]->tfb_pic_file;
							$data['msg_user'][$mrow->tfpmb_id]['uname'] = $muser_info[0]->tfu_usern;
							$data['msg_user'][$mrow->tfpmb_id]['upass'] = $muser_info[0]->tfu_passwd;
						}
					}
				}
			}
		}
		
		if($data['user_id'] <> 0){
						
			$uresult = $this->manage->get_user_info_by_id_and_type($data['user_id'], $data['user_type_ref']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				if($data['user_type_ref'] == 1){
					$data['uid'] = $uresult[0]->tfsp_id;
					$data['ufname'] = $uresult[0]->tfsp_fname;
					$data['ulname'] = $uresult[0]->tfsp_lname;
					$data['uemail'] = $uresult[0]->tfsp_email;
					$data['ucontact'] = $uresult[0]->tfsp_contact;
					$data['uaddress'] = $uresult[0]->tfsp_address;
					$data['uprofpic'] = $uresult[0]->tfsp_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
				
				if($data['user_type_ref'] == 2){
					$data['uid'] = $uresult[0]->tff_id;
					$data['ufname'] = $uresult[0]->tff_fname;
					$data['ulname'] = $uresult[0]->tff_lname;
					$data['uemail'] = $uresult[0]->tff_email;
					$data['ucontact'] = $uresult[0]->tff_contact;
					$data['uaddress'] = $uresult[0]->tff_address;
					$data['uprofpic'] = $uresult[0]->tff_pic_file;
					$data['uname'] = $uresult[0]->tfu_usern;
					$data['upass'] = $uresult[0]->tfu_passwd;
				}
				
				if($data['user_type_ref'] == 3){
					$data['uid'] = $uresult[0]->tfb_id;
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
		
		$user_contacts = $this->get_contacts();
		
		if(!empty($user_contacts) && is_array($user_contacts) && sizeof($user_contacts) <> 0){
			
			$count = 0;
			
			foreach($user_contacts as $urow){
			
				if(!empty($urow) && sizeof($urow) <> 0){
					
					if($urow[0]->tfu_utype == 1){
						
						$data['user_contacts'][$count]['uid'] = $urow[0]->tfu_id;
						$data['user_contacts'][$count]['utype'] = $urow[0]->tfu_utype;
						$data['user_contacts'][$count]['ufname'] = $urow[0]->tfsp_fname;
						$data['user_contacts'][$count]['ulname'] = $urow[0]->tfsp_lname;
						$data['user_contacts'][$count]['uemail'] = $urow[0]->tfsp_email;
						$data['user_contacts'][$count]['ucontact'] = $urow[0]->tfsp_contact;
						$data['user_contacts'][$count]['uaddress'] = $urow[0]->tfsp_address;
						$data['user_contacts'][$count]['uprofpic'] = $urow[0]->tfsp_pic_file;
						$data['user_contacts'][$count]['logged'] = $urow[0]->tfu_logged;
						$data['user_contacts'][$count]['activelog'] = $urow[0]->tfu_current_logged;
						$data['user_contacts'][$count]['uname'] = $urow[0]->tfu_usern;
						$data['user_contacts'][$count++]['upass'] = $urow[0]->tfu_passwd;
					}
						
					if($urow[0]->tfu_utype == 2){
						
						$data['user_contacts'][$count]['uid'] = $urow[0]->tfu_id;
						$data['user_contacts'][$count]['utype'] = $urow[0]->tfu_utype;
						$data['user_contacts'][$count]['ufname'] = $urow[0]->tff_fname;
						$data['user_contacts'][$count]['ulname'] = $urow[0]->tff_lname;
						$data['user_contacts'][$count]['uemail'] = $urow[0]->tff_email;
						$data['user_contacts'][$count]['ucontact'] = $urow[0]->tff_contact;
						$data['user_contacts'][$count]['uaddress'] = $urow[0]->tff_address;
						$data['user_contacts'][$count]['uprofpic'] = $urow[0]->tff_pic_file;
						$data['user_contacts'][$count]['logged'] = $urow[0]->tfu_logged;
						$data['user_contacts'][$count]['activelog'] = $urow[0]->tfu_current_logged;
						$data['user_contacts'][$count]['uname'] = $urow[0]->tfu_usern;
						$data['user_contacts'][$count++]['upass'] = $urow[0]->tfu_passwd;
					}
						
					if($urow[0]->tfu_utype == 3){
					
						$data['user_contacts'][$count]['uid'] = $urow[0]->tfu_id;
						$data['user_contacts'][$count]['utype'] = $urow[0]->tfu_utype;
						$data['user_contacts'][$count]['ufname'] = $urow[0]->tfb_fname;
						$data['user_contacts'][$count]['ulname'] = $urow[0]->tfb_lname;
						$data['user_contacts'][$count]['uemail'] = $urow[0]->tfb_email;
						$data['user_contacts'][$count]['ucontact'] = $urow[0]->tfb_contact;
						$data['user_contacts'][$count]['uaddress'] = $urow[0]->tfb_address;
						$data['user_contacts'][$count]['uprofpic'] = $urow[0]->tfb_pic_file;
						$data['user_contacts'][$count]['logged'] = $urow[0]->tfu_logged;
						$data['user_contacts'][$count]['activelog'] = $urow[0]->tfu_current_logged;
						$data['user_contacts'][$count]['uname'] = $urow[0]->tfu_usern;
						$data['user_contacts'][$count++]['upass'] = $urow[0]->tfu_passwd;
					}
				}
			}	
		}
		
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/message_board', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/message_scripts', $data);
		$this->load->view('includes/footern');
	}
		
	public function contact_synchro(){
		
		$user_contacts = $this->get_contacts();
		$data = array();
		$data['user_contacts'] = array();
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$data['sendto_user_ref'] = $sendto_user_ref = $this->session->userdata('sendto_user_ref');
		$data['sendto_user_type_ref'] = $sendto_user_type_ref = $this->session->userdata('sendto_user_type_ref');
		
		if(!empty($user_contacts) && is_array($user_contacts) && sizeof($user_contacts) <> 0){
			
			$count = 0;
			
			foreach($user_contacts as $urow){
				
				if(!empty($urow) && sizeof($urow) <> 0){
				
					if($urow[0]->tfu_utype == 1){
						
						$data['user_contacts'][$count]['uid'] = $urow[0]->tfu_id;
						$data['user_contacts'][$count]['utype'] = $urow[0]->tfu_utype;
						$data['user_contacts'][$count]['ufname'] = $urow[0]->tfsp_fname;
						$data['user_contacts'][$count]['ulname'] = $urow[0]->tfsp_lname;
						$data['user_contacts'][$count]['uemail'] = $urow[0]->tfsp_email;
						$data['user_contacts'][$count]['ucontact'] = $urow[0]->tfsp_contact;
						$data['user_contacts'][$count]['uaddress'] = $urow[0]->tfsp_address;
						$data['user_contacts'][$count]['uprofpic'] = $urow[0]->tfsp_pic_file;
						$data['user_contacts'][$count]['logged'] = $urow[0]->tfu_logged;
						$data['user_contacts'][$count]['activelog'] = $urow[0]->tfu_current_logged;
						$data['user_contacts'][$count]['uname'] = $urow[0]->tfu_usern;
						$data['user_contacts'][$count++]['upass'] = $urow[0]->tfu_passwd;
					}
						
					if($urow[0]->tfu_utype == 2){
						
						$data['user_contacts'][$count]['uid'] = $urow[0]->tfu_id;
						$data['user_contacts'][$count]['utype'] = $urow[0]->tfu_utype;
						$data['user_contacts'][$count]['ufname'] = $urow[0]->tff_fname;
						$data['user_contacts'][$count]['ulname'] = $urow[0]->tff_lname;
						$data['user_contacts'][$count]['uemail'] = $urow[0]->tff_email;
						$data['user_contacts'][$count]['ucontact'] = $urow[0]->tff_contact;
						$data['user_contacts'][$count]['uaddress'] = $urow[0]->tff_address;
						$data['user_contacts'][$count]['uprofpic'] = $urow[0]->tff_pic_file;
						$data['user_contacts'][$count]['logged'] = $urow[0]->tfu_logged;
						$data['user_contacts'][$count]['activelog'] = $urow[0]->tfu_current_logged;
						$data['user_contacts'][$count]['uname'] = $urow[0]->tfu_usern;
						$data['user_contacts'][$count++]['upass'] = $urow[0]->tfu_passwd;
					}
						
					if($urow[0]->tfu_utype == 3){
					
						$data['user_contacts'][$count]['uid'] = $urow[0]->tfu_id;
						$data['user_contacts'][$count]['utype'] = $urow[0]->tfu_utype;
						$data['user_contacts'][$count]['ufname'] = $urow[0]->tfb_fname;
						$data['user_contacts'][$count]['ulname'] = $urow[0]->tfb_lname;
						$data['user_contacts'][$count]['uemail'] = $urow[0]->tfb_email;
						$data['user_contacts'][$count]['ucontact'] = $urow[0]->tfb_contact;
						$data['user_contacts'][$count]['uaddress'] = $urow[0]->tfb_address;
						$data['user_contacts'][$count]['uprofpic'] = $urow[0]->tfb_pic_file;
						$data['user_contacts'][$count]['logged'] = $urow[0]->tfu_logged;
						$data['user_contacts'][$count]['activelog'] = $urow[0]->tfu_current_logged;
						$data['user_contacts'][$count]['uname'] = $urow[0]->tfu_usern;
						$data['user_contacts'][$count++]['upass'] = $urow[0]->tfu_passwd;
					}
				}	
			}	
		}
		
		$this->load->view('pages/contacts_synch', $data);
	}
	
	public function fetch_users_contact()
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'User Contact Synch';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}
		
		$data['sendto_user_ref'] = $sendto_user_ref = $this->session->userdata('sendto_user_ref');
		$data['sendto_user_type_ref'] = $sendto_user_type_ref = $this->session->userdata('sendto_user_type_ref');
		
		$term = $this->input->post('name_startsWith');
		
		$contact_list = $this->plisting->get_contacts_by_user($user['user_id']);
		
		$usera = array();
		
		foreach($contact_list as $crow){
			
			if(!in_array($crow['uid'], $usera) && $crow['uid'] !== $data['user_id']){
				array_push($usera, $crow['uid']);
			}
		}
		
		$user_contacts = array();
		
		for($i=0; $i < sizeof($usera); $i++){
		
			$uresult = $this->manage->get_user_info_by_id_term($usera[$i], $term);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				array_push($user_contacts, $uresult); 
			}
		}
		
		$data = array();
		
		if(!empty($user_contacts) && is_array($user_contacts) && sizeof($user_contacts) <> 0){
			
			$count = 0;
			
			foreach($user_contacts as $urow){
			
				if($urow[0]->tfu_utype == 1){
					
					$name = ucwords($urow[0]->tfsp_fname.' '.$urow[0]->tfsp_lname.' (Supplier)').'|'.$urow[0]->tfu_id.'|'.$urow[0]->tfu_utype;
				}
					
				if($urow[0]->tfu_utype == 2){
					
					$name = ucwords($urow[0]->tff_fname.' '.$urow[0]->tff_lname.' (Financier)').'|'.$urow[0]->tfu_id.'|'.$urow[0]->tfu_utype;
				}
					
				if($urow[0]->tfu_utype == 3){
				
					$name = ucwords($urow[0]->tfb_fname.' '.$urow[0]->tfb_lname.' (Beneficiary)').'|'.$urow[0]->tfu_id.'|'.$urow[0]->tfu_utype;
				}
				
				array_push($data, $name);
			}	
		}
			
		echo json_encode($data);
	}
	
	public function message_synchro(){
	
		$data = array();
		$result = array();
		
		$data['page'] = 'message_synch';
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
		}else{
			redirect(base_url().'log/out');
		}
		
		$data['sendto_user_ref'] = $sendto_user_ref = $this->session->userdata('sendto_user_ref');
		$data['sendto_user_type_ref'] = $sendto_user_type_ref = $this->session->userdata('sendto_user_type_ref');
				
		$data["projects_listed"] = '';
		$data['project_listed_info'] = '';
		$data['proposals'] = 0;
		$data['pmessages'] = array();
		$data['msg_user'] = array();
		
		$action = $this->input->post('action');
		$send_to_user_ref = $this->input->post('send_user');
		$send_to_user_type_ref = $this->input->post('send_user_type');
		
		if($send_to_user_ref && $send_to_user_ref > 0){
			$data['send_user'] = $send_to_user_ref;
		}else{
			$data['send_user'] = 0;
		}
		
		if($send_to_user_type_ref && $send_to_user_type_ref > 0){
			$data['send_user_type'] = $send_to_user_type_ref;
		}else{
			$data['send_user_type'] = 0;
		} 
		
		$data['msg'] = '';
		$data['msg_extra'] = '';
		
		if($send_to_user_ref <> 0 && $send_to_user_type_ref <> 0){
			
			$mresult = $this->plisting->get_message_by_user_and_type($user['user_id'], $user['user_type_ref'], $send_to_user_ref, $send_to_user_type_ref);
			$data['pmessages'] = $mresult;
			
			if($mresult && !empty($mresult) && sizeof($mresult) <> 0){
			
				foreach($mresult as $mrow){
					
					$muser_info = $this->plisting->get_user_info_by_id_and_type($mrow->tfpmb_sender_ref, $mrow->tfpmb_sender_type_ref);
										
					if(!empty($muser_info) && is_array($muser_info) && sizeof($muser_info) <> 0){
						
						if($mrow->tfpmb_sender_type_ref == 1){
							$data['msg_user'][$mrow->tfpmb_id]['uid'] = $muser_info[0]->tfsp_id;
							$data['msg_user'][$mrow->tfpmb_id]['ufname'] = $muser_info[0]->tfsp_fname;
							$data['msg_user'][$mrow->tfpmb_id]['ulname'] = $muser_info[0]->tfsp_lname;
							$data['msg_user'][$mrow->tfpmb_id]['uemail'] = $muser_info[0]->tfsp_email;
							$data['msg_user'][$mrow->tfpmb_id]['ucontact'] = $muser_info[0]->tfsp_contact;
							$data['msg_user'][$mrow->tfpmb_id]['uaddress'] = $muser_info[0]->tfsp_address;
							$data['msg_user'][$mrow->tfpmb_id]['uprofpic'] = $muser_info[0]->tfsp_pic_file;
							$data['msg_user'][$mrow->tfpmb_id]['uname'] = $muser_info[0]->tfu_usern;
							$data['msg_user'][$mrow->tfpmb_id]['upass'] = $muser_info[0]->tfu_passwd;
						}
						
						if($mrow->tfpmb_sender_type_ref == 2){
							$data['msg_user'][$mrow->tfpmb_id]['uid'] = $muser_info[0]->tff_id;
							$data['msg_user'][$mrow->tfpmb_id]['ufname'] = $muser_info[0]->tff_fname;
							$data['msg_user'][$mrow->tfpmb_id]['ulname'] = $muser_info[0]->tff_lname;
							$data['msg_user'][$mrow->tfpmb_id]['uemail'] = $muser_info[0]->tff_email;
							$data['msg_user'][$mrow->tfpmb_id]['ucontact'] = $muser_info[0]->tff_contact;
							$data['msg_user'][$mrow->tfpmb_id]['uaddress'] = $muser_info[0]->tff_address;
							$data['msg_user'][$mrow->tfpmb_id]['uprofpic'] = $muser_info[0]->tff_pic_file;
							$data['msg_user'][$mrow->tfpmb_id]['uname'] = $muser_info[0]->tfu_usern;
							$data['msg_user'][$mrow->tfpmb_id]['upass'] = $muser_info[0]->tfu_passwd;
						}
						
						if($mrow->tfpmb_sender_type_ref == 3){
							$data['msg_user'][$mrow->tfpmb_id]['uid'] = $muser_info[0]->tfb_id;
							$data['msg_user'][$mrow->tfpmb_id]['ufname'] = $muser_info[0]->tfb_fname;
							$data['msg_user'][$mrow->tfpmb_id]['ulname'] = $muser_info[0]->tfb_lname;
							$data['msg_user'][$mrow->tfpmb_id]['uemail'] = $muser_info[0]->tfb_email;
							$data['msg_user'][$mrow->tfpmb_id]['ucontact'] = $muser_info[0]->tfb_contact;
							$data['msg_user'][$mrow->tfpmb_id]['uaddress'] = $muser_info[0]->tfb_address;
							$data['msg_user'][$mrow->tfpmb_id]['uprofpic'] = $muser_info[0]->tfb_pic_file;
							$data['msg_user'][$mrow->tfpmb_id]['uname'] = $muser_info[0]->tfu_usern;
							$data['msg_user'][$mrow->tfpmb_id]['upass'] = $muser_info[0]->tfu_passwd;
						}
					}
				}
			}
		}
		
		$this->load->view('pages/message_board_synch', $data);
	}
	
	public function send_invite(){
		
		$user_id = $this->input->post('uid');
		$proj_id = $this->input->post('pid');
		$u_type = $this->input->post('utype');
		
		$data = array();
		$data_add = array();
		$nofifya = array();
		$data_add['tfpi_project_ref'] = $proj_id;
		$data_add['tfpi_user_ref'] = $user_id;
		$data_add['tfpi_user_type'] = $u_type;
			
		$data['status'] = 0;
		
		$count = 0;
			
		$user_project_info = $this->plisting->get_project_info_by_id($proj_id);
		$invited_user_info = $this->plisting->get_user_info_by_id_and_type($user_id, $u_type);
		
		$nresult = $this->manage->get_notification_setting($user_id, $u_type);
			
		if(!empty($nresult) && is_array($nresult) && sizeof($nresult) <> 0){
			
			if($u_type == 1){
				$data['b_notification'] = $nresult[0]->tfsp_benif_notification;
				$data['pp_notification'] = $nresult[0]->tfsp_posted_project_visibility;
			}

			if($u_type == 2){
				$data['b_notification'] = $nresult[0]->tff_benif_notification;
				$data['pp_notification'] = $nresult[0]->tff_posted_project_visibility;
			}
					
			if($data['b_notification'] == 1){
										
				$nofifya[$count]['notify_type'] = 'invitaion_received';
				$nofifya[$count]['notify_id'] = time();
				
				$project_info = $this->plisting->get_project_info_by_id($proj_id);
				
				$nofifya[$count]['notify_for_user'] = $project_info[0]->userID;
				$nofifya[$count]['notify_for_user_type'] = $project_info[0]->userType;
				$nofifya[$count]['notify_for_project'] = $proj_id;
				$nofifya[$count]['notify_for_proposal'] = 0;
							
				$user_info = $this->manage->get_user_info_by_id($project_info[0]->userID);
				
				$nofifya[$count]['notify_user_ref'] = $user_id;
				$nofifya[$count]['notify_user_type_ref'] = $u_type;
				$nofifya[$count]['notify_text'] = 'Project invitation from '.ucwords($user_info[0]->tfb_fname.' '.$user_info[0]->tfb_lname).'(Beneficiary)';
				$nofifya[$count++]['notify_time'] = date('Y-m-d H:i:s');
						
			}	
			
			if(!empty($nofifya) && sizeof($nofifya) <> 0){
				$this->notification->save_notification($nofifya);
			}
		}
		
		$result = $this->manage->add_invite_user($data_add);
		
		if($result && !empty($result) && $result > 0){
			$data['status'] = 1;
		}
		
		echo json_encode($data);
	}
	
	public function cancel_invite(){
		
		$user_id = $this->input->post('uid');
		$proj_id = $this->input->post('pid');
		$u_type = $this->input->post('utype');
		
		$data = array();
		$data_add = array();
		$data_add['tfpi_project_ref'] = $proj_id;
		$data_add['tfpi_user_ref'] = $user_id;
		$data_add['tfpi_user_type'] = $u_type;
		
		$data['status'] = 0;
			
		$result = $this->manage->update_invite_user(0, 0, $data_add);
		
		if($result && !empty($result) && $result > 0){
			$data['status'] = 1;
		}
		
		$data_add = array();
		$data_add['notify_read'] = 1;
		$data_add['row_deleted'] = 1;
		
		$this->notification->update_notification($proj_id, $user_id, $u_type, $data_add);
		
		echo json_encode($data);
	}
	
	public function siteURL() {
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		// $domainName = $_SERVER['HTTP_HOST'] . '/';
		$domainName = $_SERVER['HTTP_HOST'];
		// return $protocol . $domainName;
		return $domainName;
	}
}
	