<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listingv extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'url'));
		$this->load->library(array('session', 'pagination'));
		$this->load->model(array('plisting', 'manage'));
		// $this->output->cache(0.5);
		
		$data = array();
		$data_add = array();
	}
		
	public function project_info(){
		
		$data = array();
		$result = array();
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		); 
		
		$data['csrf'] = $csrf;
		
		$data['page'] = 'listing';
		$data['msg'] = '';
		$data['msg'] = '';
		$data['msg_extra'] = '';
		$data['full_name'] = '';
		$data['user_id'] = 0;
		$data['user_type_ref'] = 0;
		$data['pcategories'] = '';
		$data['pcontracts'] = '';
		$data['pcountries'] = '';
		$data['pstates'] = '';
		$data['project_saved']  = 0;
		$data['proposals'] = 0;
		$data['project_listed_info'] = '';
		$data['invitation_accept'] = array();
		$data['proposal_submitted'] = array();
		$data['saved_project'] = array();
		$data['project_proposal'] = array();
		$data['project_user_rating'] = array();
		$data['user_info'] = array();
						
		$action = $this->input->post('action');
		$row_id = $this->input->post('row_id');
								
		$project_info = $this->plisting->get_project_info_by_id($row_id);
		
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

			$data['user_info'] = $uresult = $this->manage->get_user_info_by_id_and_type($project_info[0]->userID, $project_info[0]->userType);
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
				
		$this->load->view('includes/headern', $data);
		$this->load->view('includes/header_publicn', $data);
		$this->load->view('pages/project_info', $data);
		$this->load->view('includes/footer_commonn', $data);
		$this->load->view('pages_scripts/listing_scripts', $data);
		$this->load->view('includes/footern');
	}	
}
	