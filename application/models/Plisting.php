<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Plisting extends CI_Model {

        public function __construct()
        {
             parent::__construct();
			 $this->load->database();
	    }
				
		public function get_user_info_by_id_and_type($id, $type_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user tfu');
			
			if($type_id == 1){
				$this->db->join('{PRE}service_provider tfsp', 'tfsp.tfsp_user_ref = tfu.tfu_id');
			}
			
			if($type_id == 2){
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tfu.tfu_id');
			}
						
			if($type_id == 3){
				$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tfu.tfu_id');
			}
			
			$where = "tfu.tfu_id = '$id'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();	
		}
						
		public function get_contacts_by_user($userid){
					
			$data = array();
			$usera = array();
						
			$this->db->select('tfpmb_sender_ref, tfpmb_sender_type_ref, tfpmb_receiver_ref, tfpmb_receiver_type_ref');
			$this->db->from('{PRE}project_message_board');
			// $where = "(tfpmb_sender_ref = '$uid' AND tfpmb_sender_type_ref = '$utype') OR (tfpmb_receiver_ref = '$uid' AND tfpmb_receiver_type_ref = '$utype')";
			$where = "tfpmb_sender_ref = '$userid' OR tfpmb_receiver_ref = '$userid'";
			$this->db->where($where);
			$this->db->group_by('tfpmb_id');
			
			$query = $this->db->get();
					
			$resultp = $query->result();
			
			$count = 0;
			
			if($resultp && !empty($resultp) && is_array($resultp) && sizeof($resultp) <> 0){
				foreach($resultp as $row){
					$usera[$count]['uid'] = $row->tfpmb_sender_ref;
					$usera[$count++]['uid'] = $row->tfpmb_receiver_ref;
				}
			}
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_provider');
		
			$where = "tpp_project_user_ref = '$userid'";
			$this->db->where($where);
			
			$query = $this->db->get();
					
			$resultpp = $query->result();
			
			if($resultpp && !empty($resultpp) && is_array($resultpp) && sizeof($resultpp) <> 0){
				foreach($resultpp as $row){
					$usera[$count++]['uid'] = $row->tpp_user_ref;
				}
				
				foreach($resultpp as $row){
					$pref = $row->tpp_project_ref;
					
					$this->db->select('*');
					$this->db->from('{PRE}proposal_financier');
		
					$where = "tpf_project_ref = '$pref'";
					$this->db->where($where);
					
					$query = $this->db->get();
							
					$resultpfu = $query->result();
									
					if($resultpfu && !empty($resultpfu) && is_array($resultpfu) && sizeof($resultpfu) <> 0){
						foreach($resultpfu as $frow){
							$usera[$count++]['uid'] = $frow->tpf_user_ref;
						}
					}
				}
			}	
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_provider');
		
			$where = "tpp_user_ref = '$userid'";
			$this->db->where($where);
			
			$query = $this->db->get();
					
			$resultpp = $query->result();
					
			if($resultpp && !empty($resultpp) && is_array($resultpp) && sizeof($resultpp) <> 0){
				foreach($resultpp as $row){
					$usera[$count++]['uid'] = $row->tpp_project_user_ref;
				}
				
				foreach($resultpp as $row){
					$pref = $row->tpp_project_ref;
					
					$this->db->select('*');
					$this->db->from('{PRE}proposal_financier');
		
					$where = "tpf_project_ref = '$pref'";
					$this->db->where($where);
					
					$query = $this->db->get();
							
					$resultpfu = $query->result();
									
					if($resultpfu && !empty($resultpfu) && is_array($resultpfu) && sizeof($resultpfu) <> 0){
						foreach($resultpfu as $frow){
							$usera[$count++]['uid'] = $frow->tpf_user_ref;
						}
					}
				}
			}
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_financier');
		
			$where = "tpf_project_user_ref = '$userid'";
			$this->db->where($where);
			
			$query = $this->db->get();
					
			$resultpf = $query->result();
			
			if($resultpf && !empty($resultpf) && is_array($resultpf) && sizeof($resultpf) <> 0){
				foreach($resultpf as $row){
					$usera[$count++]['uid'] = $row->tpf_user_ref;
				}
				
				foreach($resultpf as $row){
					$pref = $row->tpf_project_ref;
					
					$this->db->select('*');
					$this->db->from('{PRE}proposal_provider');
		
					$where = "tpp_project_ref = '$pref'";
					$this->db->where($where);
					
					$query = $this->db->get();
							
					$resultppu = $query->result();
					
					if($resultppu && !empty($resultppu) && is_array($resultppu) && sizeof($resultppu) <> 0){
						foreach($resultppu as $prow){
							$usera[$count++]['uid'] = $prow->tpp_user_ref;
						}
					}
				}
			}
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_financier');
		
			$where = "tpf_user_ref = '$userid'";
			$this->db->where($where);
			
			$query = $this->db->get();
					
			$resultpf = $query->result();
					
			if($resultpf && !empty($resultpf) && is_array($resultpf) && sizeof($resultpf) <> 0){
				foreach($resultpf as $row){
					$usera[$count++]['uid'] = $row->tpf_project_user_ref;
				}
				
				foreach($resultpf as $row){
					$pref = $row->tpf_project_ref;
					
					$this->db->select('*');
					$this->db->from('{PRE}proposal_provider');
		
					$where = "tpp_project_ref = '$pref'";
					$this->db->where($where);
					
					$query = $this->db->get();
							
					$resultppu = $query->result();
					
					if($resultppu && !empty($resultppu) && is_array($resultppu) && sizeof($resultppu) <> 0){
						foreach($resultppu as $prow){
							$usera[$count++]['uid'] = $prow->tpp_user_ref;
						}
					}
				}
			}
			
			return $usera;
		}
		
		public function get_categories(){
			
			$this->db->select('*');
			$this->db->from('{PRE}industry_categories');
			$where = "row_deleted = '0'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_units(){
			
			$this->db->select('*');
			$this->db->from('{PRE}units');
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_units_by_id($id){
			
			$this->db->select('tfun_name');
			$this->db->from('{PRE}units');
			$where = "tfun_id = '$id'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_currency(){
			
			$this->db->select('*');
			$this->db->from('{PRE}currency');
			$where = "crow_deleted = '0'";
			$this->db->where($where);
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_currency_by_id($id){
			
			$this->db->select('*');
			$this->db->from('{PRE}currency');
			$where = "tfcu_id = '$id'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_contracts(){
			
			$this->db->select('*');
			$this->db->from('{PRE}contracts');
			$where = "row_deleted = '0'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_sectors($term = ''){
			
			$this->db->select('*');
			$this->db->from('{PRE}sectors');
			$where = "row_deleted = '0'";
			$this->db->where($where);
			
			if($term){
				$this->db->like('sectorName', $term);
			}
			
			$this->db->order_by("sectorName", "asc"); 
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_country($term = ''){
			
			$this->db->select('*');
			$this->db->from('{PRE}country');
			$where = "row_deleted = '0'";
			$this->db->where($where);
						
			if($term){
				$this->db->like('tfc_name', $term);
			}
			
			$query = $this->db->get();
						
			return $result = $query->result();
		}
		
		public function get_state($term = ''){
			
			$this->db->select('*');
			$this->db->from('{PRE}states tfs');
			$this->db->join('{PRE}country tfc', 'tfc.tfc_id = tfs.tfs_country_ref');
			$where = "tfs.row_deleted = '0' AND tfc.row_deleted = '0'";
			$this->db->where($where);
			$this->db->like('tfs_name', $term);
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_state_by_country_ref($id){
			
			$this->db->select('*');
			$this->db->from('{PRE}states tfs');
			$this->db->join('{PRE}country tfc', 'tfc.tfc_id = tfs.tfs_country_ref');
			$where = "tfs.row_deleted = '0' AND tfc.row_deleted = '0' AND tfs.tfs_country_ref = '$id'";
			$this->db->where($where);
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_sectors_by_categories(){
			
			$data = array();
						
			$this->db->select('tcs.ID as sector_id, tcs.sectorName, tca.ID as cat_id, tca.cName as cat_name, tca.imagePath as cat_image');
			$this->db->from('{PRE}industry_categories tca');
			$this->db->join('{PRE}sectors tcs', 'tca.ID = tcs.industry_ref', 'left');
			
			$where = "tca.row_deleted = '0' AND tcs.row_deleted = '0'";
			
			$this->db->where($where);
			$this->db->order_by('tca.ID', 'RANDOM');
						
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
			
		}
		
		public function get_projects_by_categories(){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tcoun.*, tfb.*, tca.ID as cat_id, tca.cName as cat_name, tca.imagePath as cat_image, tct.ID as cont_id, tct.cName as cont_name, tct.imagePath as cont_image');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}country tcoun', 'tcoun.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			
			$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = '1'";
			
			$this->db->where($where);
			$this->db->group_by('tpp.ID');
						
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
				
		public function get_projects_by_categories_id($cat_id){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tfb.*, tca.ID as cat_id, tca.cName as cat_name, tca.imagePath as cat_image, tct.ID as cont_id, tct.cName as cont_name, tct.imagePath as cont_image');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			
			$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = '1' AND tpp.mainCategoryId = '".$cat_id."'";
			
			$this->db->where($where);
			$this->db->group_by('tpp.ID');
						
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
		
		public function get_projects_by_categories_uid($uid){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tfb.*, tca.ID as cat_id, tca.cName as cat_name, tca.imagePath as cat_image, tct.ID as cont_id, tct.cName as cont_name, tct.imagePath as cont_image');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_cat_ref = tca.ID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			
			$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tcom.tfcom_user_ref = '$uid'";
			
			$this->db->where($where);
			$this->db->group_by('tpp.ID');
						
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
			
		public function get_project_invitation_by_uid($user_id){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tfpi.*, tfb.*, tc.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}project_invites tfpi', 'tfpi.tfpi_project_ref = tpp.ID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			
			if($user_id > 0){
				$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tfpi.tfpi_user_ref = '$user_id'";
			}else{
				$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0'";
			}
			
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
		
		public function get_project_invitation_by_uid_type($user_id, $type){
			
			$data = array();
						
			$this->db->select('*');
			$this->db->from('{PRE}project_invites tfpi');
						
			if($type == 'p'){
				$this->db->join('{PRE}proposal_provider tppr', 'tppr.tpp_project_ref = tfpi.tfpi_project_ref', 'left');
			}
			
			if($type == 'f'){
				$this->db->join('{PRE}proposal_financier tppr', 'tppr.tpf_project_ref = tfpi.tfpi_project_ref', 'left');
			}
			
			if($user_id > 0){
				$where = "tfpi.tfpi_user_ref = '$user_id' AND tfpi.tfpi_accept = 1";
			}else{
				$where = "tfpi.tfpi_accept = 1";
			}
			
			$this->db->group_by('tfpi.tfpi_user_ref');
			$this->db->group_by('tfpi.tfpi_id');
		
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
		
		public function get_project_proposal_by_type($type){
			
			$data = array();
						
			$this->db->select('*');
						
			if($type == 'p'){
				$this->db->from('{PRE}proposal_provider');
			}
			
			if($type == 'f'){
				$this->db->from('{PRE}proposal_financier');
			}
			
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
		
		public function get_project_proposal_by_uid_type($user_id, $type){
			
			$data = array();
						
			$this->db->select('*');
						
			if($type == 'p'){
				$this->db->from('{PRE}proposal_provider tppr');
				$where = "tppr.tpp_user_ref = '$user_id'";
			}
			
			if($type == 'f'){
				$this->db->from('{PRE}proposal_financier tppr');
				$where = "tppr.tpf_user_ref = '$user_id'";
			}
					
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
		
		public function get_project_proposal_by_id_uid_type($id, $user_id, $type){
			
			$data = array();
						
			$this->db->select('*');
						
			if($type == 'p'){
				$this->db->from('{PRE}proposal_provider tppr');
				$where = "tppr.tpp_project_ref = '$id' AND tppr.tpp_user_ref = '$user_id'";
			}
			
			if($type == 'f'){
				$this->db->from('{PRE}proposal_financier tppr');
				$where = "tppr.tpf_project_ref = '$id' AND tppr.tpf_user_ref = '$user_id'";
			}
					
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
		
		public function get_project_proposal_accepted_by_uid_type($user_id, $type){
			
			$data = array();
						
			$this->db->select('*');
						
			if($type == 'p'){
				$this->db->from('{PRE}proposal_provider tppr');
				$where = "tppr.tpp_beneficiary_accept = 1 AND tppr.tpp_user_ref = '$user_id'";
			}
			
			if($type == 'f'){
				$this->db->from('{PRE}proposal_financier tppr');
				$where = "tppr.tpf_beneficiary_accept = 1 AND tppr.tpf_user_ref = '$user_id'";
			}
					
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
		
		public function get_project_proposal_subcontractor_accepted_by_uid_type($user_id, $type){
			
			$data = array();
						
			$this->db->select('*');
						
			if($type == 'p'){
				$this->db->from('{PRE}subcontract_supplier tss');
				$this->db->join('{PRE}proposal_provider tppr', 'tppr.tpp_id = tss.tfss_proposal_ref', 'left');
				
				$where = "tppr.tpp_beneficiary_accept = 1 AND tss.tfss_user_ref = '$user_id'";
			}
								
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
		
		public function get_project_all_count($data, $user_id){
			
			$this->db->select('*, count(*) as pcount');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			
			if($user_id > 0){
				$where = "row_deleted = '0' AND userID = '$user_id' AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}else{
				$where = "admin_approval = 1 AND row_deleted = '0' AND isDraft = '0' AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}
			
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
									
			return $result = $query->result();
		}

		public function get_featured_project_all_count($data, $user_id){
			
			$this->db->select('*, count(*) as pcount');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			
			if($user_id > 0){
				$where = "row_deleted = '0' AND featured = 1 AND userID = '$user_id' AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}else{
				$where = "admin_approval = 1 AND featured = 1 AND row_deleted = '0' AND isDraft = '0' AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}
			
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
									
			return $result = $query->result();
		}
		
		public function get_closed_project_all_count($data, $user_id){
			
			$this->db->select('*, count(*) as pcount');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			
			if($user_id > 0){
				$where = "row_deleted = '0' AND awardStatus = 2 AND userID = '$user_id' AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}else{
				$where = "admin_approval = 1 AND awardStatus = 2 AND row_deleted = '0' AND isDraft = '0' AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}
			
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
									
			return $result = $query->result();
		}
		
		public function get_project_files_by_id($id){
		
			$data = array();
						
			$this->db->select('*');
			$this->db->from('{PRE}projects_post_files');
			$where = "tppf_project_ref = '$id'"; // AND tppf_row_deleted = 0
			$this->db->where($where);
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_project_by_id_uid($user_id, $id){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tfb.*, tc.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			if($user_id > 0){
				$where = "tpp.ID = '$id' AND tpp.row_deleted = '0' AND tpp.userID = '$user_id'";
			}else{
				$where = "tpp.ID = '$id' AND tpp.admin_approval = 1 AND tpp.row_deleted = '0' AND tpp.isDraft = '0'";
			}
			
			$this->db->where($where);
			$this->db->order_by("tpp.ID", 'desc');
			
			$query = $this->db->get();
			$result = $query->result();
									
			return $result = $query->result();
		}
		
		public function get_project_info_by_id($id){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tfu.*, tfb.*, tc.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			$where = "tpp.ID = '$id' AND tpp.row_deleted = '0' AND tpp.isDraft = '0'";
			
			$this->db->where($where);
			$this->db->order_by("tpp.ID", 'desc');
			
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
		
		public function get_project_proposals_by_id_type($id, $type){
			
			$this->db->select('*');
			
			if($type == 'p'){
				$this->db->from('{PRE}proposal_provider');
				$where = "tpp_project_ref = '$id'";
			}
			
			if($type == 'f'){
				$this->db->from('{PRE}proposal_financier');
				$where = "tpf_project_ref = '$id'";
			}
			
			$this->db->where($where);
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}

		public function get_project_proposals_by_id($id){
			
			$proposal = array();
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_provider');
			$where = "tpp_project_ref = '$id'";
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
			
			array_merge($proposal, $result);
			
			$this->db->from('{PRE}proposal_financier');
			$where = "tpf_project_ref = '$id'";
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
			
			array_merge($proposal, $result);
			
			return $proposal;
		}
		
		public function get_all_projects_public($data, $user_type){
						
			$this->db->select('tpp.*, tcom.*, tfb.*, tc.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			if($user_type == 0){
				$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}else{
				$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0') AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}
					
			$this->db->where($where);
			$this->db->order_by("tpp.ID", 'desc');
			
			$query = $this->db->get();
					
			return $result = $query->result();
		}
		
		public function get_all_projects($data, $user_id){
						
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
						
			if($user_id > 0){
				$where = "tpp.row_deleted = '0' AND tpp.userID = '$user_id' AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}else{
				$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}
			
			$this->db->where($where);
			$this->db->order_by("tpp.ID", 'desc');
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_all_sc_projects($user_id){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
						
			if($user_id > 0){
				$where = "tpp.row_deleted = '0' AND (tpp.awarded_provider = 2 OR tpp.awarded_provider = 3 OR tpp.awarded_financier = 2 OR tpp.awarded_financier = 3) AND tpp.userID = '$user_id'";
			}else{
				$where = "tpp.row_deleted = '0' AND (tpp.awarded_provider = 2 OR tpp.awarded_provider = 3 OR tpp.awarded_financier = 2 OR tpp.awarded_financier = 3) AND tpp.admin_approval = 1 AND tpp.isDraft = '0'";
			}
			
			$this->db->where($where);
			$this->db->order_by("tpp.ID", 'desc');
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_sc_provider_subcontractor_proposal_by_project($proj_ref){
			
			$this->db->select('tss.*, tppr.*, tpp.*, tfu.*, tfsp.*, tfcom.*, tc.*, tcu.*');
			$this->db->from('{PRE}subcontract_supplier tss');
			$this->db->join('{PRE}proposal_provider tppr', 'tppr.tpp_id = tss.tfss_proposal_ref', 'left');
			$this->db->join('{PRE}project_posts tpp', 'tpp.ID = tppr.tpp_project_ref', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tss.tfss_user_ref', 'left');
			$this->db->join('{PRE}service_provider tfsp', 'tfsp.tfsp_user_ref = tss.tfss_user_ref', 'left');
			$this->db->join('{PRE}company tfcom', 'tfcom.tfcom_user_ref = tss.tfss_user_ref', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tfcom.tfcom_country_ref', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tppr.tpp_price_currency_ref', 'left');
			$where = "tppr.prow_deleted = '0' AND tppr.tpp_project_ref = '".$proj_ref."' AND tppr.tpp_beneficiary_accept = '1'";
			
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_all_sc_financier_projects($user_id){
			
			$data = array();
						
			$this->db->select('tpf.*, tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			$this->db->join('{PRE}proposal_financier tpf', 'tpf.tpf_project_ref = tpp.ID', 'left');
						
			if($user_id > 0){
				$where = "tpp.row_deleted = '0' AND tpp.userID = '$user_id' AND (tpf.tpf_beneficiary_accept = '1' OR tpf.tpf_awardStatus = '1' OR tpf.tpf_awardStatus = '3')";
			}else{
				$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tpf.tpf_beneficiary_accept = '1' AND (tpf.tpf_awardStatus = '1' OR tpf.tpf_awardStatus = '3')";
			}
			
			$this->db->distinct();
			$this->db->where($where);
			$this->db->group_by('tpp.ID');
			$this->db->order_by("tpp.ID", 'desc');
			
			$query = $this->db->get();
			
			$result = $query->result();
			
			return $result = $query->result();
		}
		
		public function get_all_sc_financier_projects_self($user_id){
			
			$data = array();
						
			$this->db->select('tpf.*, tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			$this->db->join('{PRE}proposal_financier tpf', 'tpf.tpf_project_ref = tpp.ID', 'left');
						
			if($user_id > 0){
				$where = "tpp.row_deleted = '0' AND tpf.tpf_user_ref = '$user_id' AND (tpf.tpf_beneficiary_accept = '1' OR tpf.tpf_awardStatus = '1' OR tpf.tpf_awardStatus = '3')";
			}else{
				$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tpf.tpf_beneficiary_accept = '1' AND (tpf.tpf_awardStatus = '1' OR tpf.tpf_awardStatus = '3')";
			}
			
			$this->db->distinct();
			$this->db->where($where);
			$this->db->group_by('tpp.ID');
			$this->db->order_by("tpp.ID", 'desc');
			
			$query = $this->db->get();
			
			$result = $query->result();
			
			return $result = $query->result();
		}

		public function get_all_sc_financier_projects_and_proposals($user_id){
			
			$this->db->select('tpf_id, tpf_project_ref');
			$this->db->from('{PRE}proposal_financier');
			$where = "prow_deleted = '0' AND tpf_user_ref = '".$user_id."' AND tpf_beneficiary_accept = '1'";
			
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_all_sc_financier_accepted_proposals(){
			
			$this->db->select('tpf_id, tpf_project_ref');
			$this->db->from('{PRE}proposal_financier');
			$where = "prow_deleted = '0' AND tpf_beneficiary_0 = '1'";
			
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_all_sc_financier_proposals_by_project($proj_ref){
			
			$this->db->select('tpf.*, tpp.*, tfu.*, tff.*, tfcom.*, tc.*, tcu.*');
			$this->db->from('{PRE}proposal_financier tpf');
			$this->db->join('{PRE}project_posts tpp', 'tpp.ID = tpf.tpf_project_ref', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpf.tpf_user_ref', 'left');
			$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tpf.tpf_user_ref', 'left');
			$this->db->join('{PRE}company tfcom', 'tfcom.tfcom_user_ref = tpf.tpf_user_ref', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tfcom.tfcom_country_ref', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpf.tpf_price_currency_ref', 'left');
			$where = "tpf.prow_deleted = '0' AND tpf.tpf_project_ref = '".$proj_ref."' AND tpf.tpf_beneficiary_accept = '1'";
			
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_all_sc_financier_initiate_proposals_by_project($proj_ref){
			
			$this->db->select('tpf.*, tpp.*, tfu.*, tff.*, tfic.*, tfcom.*, tc.*, tcu.*');
			$this->db->from('{PRE}proposal_financier tpf');
			$this->db->join('{PRE}project_posts tpp', 'tpp.ID = tpf.tpf_project_ref', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpf.tpf_user_ref', 'left');
			$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tpf.tpf_user_ref', 'left');
			$this->db->join('{PRE}company tfcom', 'tfcom.tfcom_user_ref = tpf.tpf_user_ref', 'left');
			$this->db->join('{PRE}industry_categories tfic', 'tfic.ID = tfcom.tfcom_cat_ref', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tfcom.tfcom_country_ref', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpf.tpf_price_currency_ref', 'left');
			// $this->db->join('{PRE}user_rating tfur', 'tfur.tfur_rating_user_to = tpf.tpf_user_ref', 'left');
						
			$where = "tpf.prow_deleted = '0' AND tpf.tpf_project_ref = '".$proj_ref."' AND (tpf.tpf_awardStatus = '1' OR tpf.tpf_awardStatus = '3') AND tpf.tpf_beneficiary_accept = '1'"; //  AND tfur.tfur_rating_user_type_to = 2
			
			$this->db->where($where);
			// $this->db->group_by('tfur.tfur_rating_user_to');
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_sc_financier_proposals_by_project_and_user($proj_ref, $user_ref){
			
			$this->db->select('tpf.*, tpp.*, tfu.*, tff.*, tfcom.*, tc.*, tcu.*');
			$this->db->from('{PRE}proposal_financier tpf');
			$this->db->join('{PRE}project_posts tpp', 'tpp.ID = tpf.tpf_project_ref', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpf.tpf_user_ref', 'left');
			$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tpf.tpf_user_ref', 'left');
			$this->db->join('{PRE}company tfcom', 'tfcom.tfcom_user_ref = tpf.tpf_user_ref', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tfcom.tfcom_country_ref', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpf.tpf_price_currency_ref', 'left');
			$where = "tpf.prow_deleted = '0' AND tpf.tpf_project_ref = '".$proj_ref."' AND tpf.tpf_user_ref = '".$user_ref."' AND tpf.tpf_beneficiary_accept = '1'";
			
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_financer_proposal_by_project_and_user($proj_ref, $user_ref, $user_type_ref, $data_add){
			
			if($user_ref == 0){
				
				$where = "tpf_project_ref = '".$proj_ref."' AND tpf_awardStatus = '0'";
				$this->db->where($where);
				$this->db->update('{PRE}proposal_financier', $data_add);
			}
			
			if($user_ref <> 0){
				
				$where = "tpf_project_ref = '".$proj_ref."' AND tpf_user_ref = '".$user_ref."' AND tpf_beneficiary_accept = '1'";
				$this->db->where($where);
				$this->db->update('{PRE}proposal_financier', $data_add);
			}
		}
						
		public function get_all_projects_pagi($data, $limit, $start, $sort_order, $user_id){
			
			$offset = ($start - 1)* $limit;
						
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			if($user_id > 0){
				$where = "tpp.row_deleted = '0' AND tpp.userID = '$user_id' AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}else{
				$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}
						
			$this->db->where($where);
			
			if($sort_order && trim($sort_order) <> ''){
				$this->db->order_by("tpp.ID", $sort_order);
			}else{
				$this->db->order_by("tpp.ID", 'desc');
			}
			
			$this->db->distinct();
			$this->db->limit($limit, $offset);
						
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_all_projects_public_pagi($data, $limit, $start, $sort_order, $user_type){
			
			$offset = ($start - 1)* $limit;
						
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			if($user_type == 0){
				$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = 1 AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}else{
				$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = 1 AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0') AND tfu.tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$data['user_access_domain_name']."'";
			}
									
			$this->db->where($where);
			
			if($sort_order && trim($sort_order) <> ''){
				$this->db->order_by("tpp.ID", $sort_order);
			}else{
				$this->db->order_by("tpp.ID", 'desc');
			}
			
			$this->db->distinct();
			$this->db->limit($limit, $offset);
						
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function make_query_string($valuea, $col){
			
			$concatq = '';
			$count = 0;
			
			if(sizeof($valuea) <> 0 && trim($col) !== ''){
										
				for($i=0; $i <= sizeof($valuea); $i++){
					
					if($count > 0 && array_key_exists($i, $valuea) && trim($valuea[$i])){
						$concatq .= " OR";
					}
							
					if(array_key_exists($i, $valuea) && trim($valuea[$i])){
						$concatq .= " tpp.$col = $valuea[$i]";
						$count++;
					}
				}
			}
			
			if($concatq){
				return ' AND ( '.$concatq.' )';
			}else{
				return $concatq;
			}	
		}
		
		public function make_company_query_string($valuea, $col){
			
			$concatq = '';
			$count = 0;
			
			if(sizeof($valuea) <> 0 && trim($col) !== ''){
										
				for($i=0; $i <= sizeof($valuea); $i++){
					
					if($count > 0 && array_key_exists($i, $valuea) && trim($valuea[$i])){
						$concatq .= " OR";
					}
							
					if(array_key_exists($i, $valuea) && trim($valuea[$i])){
						$concatq .= " tcom.$col = $valuea[$i]";
						$count++;
					}
				}
			}
			
			if($concatq){
				return ' AND ( '.$concatq.' )';
			}else{
				return $concatq;
			}	
		}
		
		public function make_pattern_query_string($valuea, $col){
			
			$concatq = '';
			$count = 0;
			
			if(sizeof($valuea) <> 0 && trim($col) !== ''){
										
				for($i=0; $i <= sizeof($valuea); $i++){
					
					if($count > 0 && array_key_exists($i, $valuea) && trim($valuea[$i])){
						$concatq .= " OR";
					}
							
					if(array_key_exists($i, $valuea) && trim($valuea[$i])){
						$concatq .= " tpp.$col LIKE '%$valuea[$i]%'";
						$count++;
					}
				}
			}
			
			if($concatq){
				return ' AND ( '.$concatq.' )';
			}else{
				return $concatq;
			}	
		}
		
		public function make_company_pattern_query_string($valuea, $col){
			
			$concatq = '';
			$count = 0;
			
			if(sizeof($valuea) <> 0 && trim($col) !== ''){
										
				for($i=0; $i <= sizeof($valuea); $i++){
					
					if($count > 0 && array_key_exists($i, $valuea) && trim($valuea[$i])){
						$concatq .= " OR";
					}
							
					if(array_key_exists($i, $valuea) && trim($valuea[$i])){
						$concatq .= " tcom.$col LIKE '%$valuea[$i]%'";
						$count++;
					}
				}
			}
			
			if($concatq){
				return ' AND ( '.$concatq.' )';
			}else{
				return $concatq;
			}	
		}
				
		public function get_project_by_type($dataarr, $type, $val, $user_id){
			
			$data = array();
					
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			if($type && $val){
				
				if(is_array($dataarr['scolumn']) && !empty($dataarr['scolumn']) && sizeof($dataarr['scolumn']) <> 0){ 
										
					$concatq = '';
					
					for($cc=0; $cc < sizeof($dataarr['scolumn']); $cc++){
						
						$coulumn = $dataarr['scolumn'][$cc];
						
						if($coulumn == 'mainCategoryId'){
							
							if(sizeof($dataarr['scatval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scatval'], $coulumn);
							}	
						}
						
						if($coulumn == 'contractID'){
							
							if(sizeof($dataarr['sconval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['sconval'], $coulumn);
							}	
						}
						
						if($coulumn == 'countryID'){
							
							if(sizeof($dataarr['scountry']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scountry'], $coulumn);
							}	
						}
						
						if($coulumn == 'sectors'){
							
							if(sizeof($dataarr['sectors']) <> 0){
								
								$concatq .= $this->make_pattern_query_string($dataarr['sectors'], $coulumn);
							}	
						}
					}
									
					if($user_id > 0){
						$where = "tpp.row_deleted = '0' AND tpp.userID = '$user_id'".$concatq;
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'".$concatq;
					}
					
				}else{
				
					if($user_id > 0){
						$where = "tpp.row_deleted = '0' AND tpp.$type = '$val' AND tpp.userID = '$user_id'";
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tpp.$type = '$val'";
					}
				}
				
			}else{
				
				if($user_id > 0){
					$where = "tpp.row_deleted = '0' AND tpp.userID = '$user_id'";
				}else{
					$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'";
				}
			}
			
			$where .= " AND tfu.tfu_domain_type = '".$dataarr['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$dataarr['user_access_domain_name']."'";
			
			$this->db->where($where);
			$this->db->order_by("tpp.ID", 'desc');
			
			$query = $this->db->get();
						
			return $result = $query->result();
		}
		
		public function get_project_public_by_type($dataarr, $type, $val, $user_type){
			
			$data = array();
					
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			if($type && $val){
				
				if(is_array($dataarr['scolumn']) && !empty($dataarr['scolumn']) && sizeof($dataarr['scolumn']) <> 0){ 
										
					$concatq = '';
					
					for($cc=0; $cc < sizeof($dataarr['scolumn']); $cc++){
						
						$coulumn = $dataarr['scolumn'][$cc];
						
						if($coulumn == 'mainCategoryId'){
							
							if(sizeof($dataarr['scatval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scatval'], $coulumn);
							}	
						}
						
						if($coulumn == 'contractID'){
							
							if(sizeof($dataarr['sconval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['sconval'], $coulumn);
							}	
						}
						
						if($coulumn == 'countryID'){
							
							if(sizeof($dataarr['scountry']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scountry'], $coulumn);
							}	
						}
						
						if($coulumn == 'sectors'){
							
							if(sizeof($dataarr['sectors']) <> 0){
								
								$concatq .= $this->make_pattern_query_string($dataarr['sectors'], $coulumn);
							}	
						}
					}
					
					if($user_type == 0){
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'".$concatq;
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0') AND tpp.isDraft = '0'".$concatq;
					}	
						
				}else{
					
					if($user_type == 0){
						$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = 1 AND tpp.$type = '$val'";
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = 1 AND tpp.$type = '$val' AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0')";
					}	
				}
				
			}else{
				
				if($user_type == 0){
					$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = 1";
				}else{	
					$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = 1 AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0')";
				}
			}
			
			$where .= " AND tfu.tfu_domain_type = '".$dataarr['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$dataarr['user_access_domain_name']."'";
			
			$this->db->where($where);
			$this->db->order_by("tpp.ID", 'desc');
			
			$query = $this->db->get();
						
			return $result = $query->result();
		}
		
		public function get_project_by_skey_type($dataarr, $type, $val, $skeyw, $user_id){
			
			$data = array();
			
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
				
			if($type && $val){
				
				if(is_array($dataarr['scolumn']) && !empty($dataarr['scolumn']) && sizeof($dataarr['scolumn']) <> 0){ 
										
					$concatq = '';
					
					for($cc=0; $cc < sizeof($dataarr['scolumn']); $cc++){
						
						$coulumn = $dataarr['scolumn'][$cc];
						
						if($coulumn == 'mainCategoryId'){
							
							if(sizeof($dataarr['scatval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scatval'], $coulumn);
							}	
						}
						
						if($coulumn == 'contractID'){
							
							if(sizeof($dataarr['sconval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['sconval'], $coulumn);
							}	
						}
						
						if($coulumn == 'countryID'){
							
							if(sizeof($dataarr['scountry']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scountry'], $coulumn);
							}	
						}
						
						if($coulumn == 'sectors'){
							
							if(sizeof($dataarr['sectors']) <> 0){
								
								$concatq .= $this->make_pattern_query_string($dataarr['sectors'], $coulumn);
							}	
						}
					}
									
					if($user_id > 0){
						$where = "tpp.row_deleted = '0' AND tpp.userID = '$user_id'".$concatq;
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'".$concatq;
					}
					
				}else{
				
					if($user_id > 0){
						$where = "tpp.row_deleted = '0' AND tpp.$type = '$val' AND tpp.userID = '$user_id'";
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.$type = '$val' AND tpp.admin_approval = 1";
					}
				}
				
			}else{
				
				if($user_id > 0){
					$where = "tpp.row_deleted = '0' AND tpp.userID = '$user_id'";
				}else{
					$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'";
				}
			}
			
			
			
			if(trim($skeyw) != ''){
				/* $where .= ' AND (tpp.title LIKE "%'.$skeyw.'%" OR tpp.description LIKE "%'.$skeyw.'%" OR tpp.sectors LIKE "%'.$skeyw.'%")';	*/
				$where .= ' AND (tpp.title LIKE "%'.$skeyw.'%" OR tpp.description LIKE "%'.$skeyw.'%")';
			}
			
			$where .= " AND tfu.tfu_domain_type = '".$dataarr['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$dataarr['user_access_domain_name']."'";
			
			$this->db->where($where);
			$this->db->order_by("tpp.ID", 'desc');
			$this->db->distinct(); 			
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_user_public_by_skey_type($dataarr, $type, $val, $skeyw, $user_type, $user_id, $suser_type){
			
			$data = array();
					
			$this->db->select('*, tca.ID as cat_id, tca.cName as cat_name');
			$this->db->from('{PRE}user tfu');
			
			if($suser_type == 1){
				$this->db->join('{PRE}service_provider tfsp', 'tfsp.tfsp_user_ref = tfu.tfu_id', 'left');
			}
			
			if($suser_type == 2){
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tfu.tfu_id', 'left');
			}
			
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tfu.tfu_id', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tcom.tfcom_cat_ref', 'left');
					
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
						
			if($type && $val){
							
				if((is_array($dataarr['scatval']) && !empty($dataarr['scatval']) && sizeof($dataarr['scatval']) <> 0) || (is_array($dataarr['scountry']) && !empty($dataarr['scountry']) && sizeof($dataarr['scountry']) <> 0) || (is_array($dataarr['sectors']) && !empty($dataarr['sectors']) && sizeof($dataarr['sectors']) <> 0)){ 
										
					$concatq = '';
					
					if(sizeof($dataarr['scatval']) <> 0){
						$concatq .= $this->make_company_query_string($dataarr['scatval'], 'tfcom_cat_ref');
					}
					
					if(sizeof($dataarr['scountry']) <> 0){
						$concatq .= $this->make_company_query_string($dataarr['scountry'], 'tfcom_country_ref');
					}
					
					if(sizeof($dataarr['sectors']) <> 0){
						$concatq .= $this->make_company_pattern_query_string($dataarr['sectors'], 'tfcom_sectors');
					}
										
					if($suser_type <> 0 && ($user_id == 0 || $user_type == 3)){
						$where = "tfu.tfu_active = '1' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_admin_blocked = '0'".$concatq;
					}else{
						$where = "tfu.tfu_id = '$user_id' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_active = '1' AND tfu.tfu_admin_blocked = '0'".$concatq;
					}	
								
				}else{
					
					if($suser_type <> 0 && ($user_id == 0 || $user_type == 3)){
						$where = "tfu.tfu_active = '1' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_admin_blocked = '0'";
					}else{
						$where = "tfu.tfu_id = '$user_id' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_active = '1' AND tfu.tfu_admin_blocked = '0'";
					}		
				}
				
			}else{
				
				if($suser_type <> 0 && ($user_id == 0 || $user_type == 3)){
					$where = "tfu.tfu_active = '1' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_admin_blocked = '0'";
				}else{
					$where = "tfu.tfu_id = '$user_id' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_active = '1' AND tfu.tfu_admin_blocked = '0'";
				}	
			}
						
			if(trim($skeyw) != ''){
						
				if($suser_type == 1){
					$where .= ' AND (tfsp.tfsp_fname LIKE "%'.$skeyw.'%" OR tcom.tfcom_name LIKE "%'.$skeyw.'%" OR tcom.tfcom_business_overview LIKE "%'.$skeyw.'%")';
				}
				
				if($suser_type == 2){
					$where .= ' AND (tff.tff_fname LIKE "%'.$skeyw.'%" OR tcom.tfcom_name LIKE "%'.$skeyw.'%" OR tcom.tfcom_business_overview LIKE "%'.$skeyw.'%")';
				}
			}
			
			$where .= " AND tfu.tfu_domain_type = '".$dataarr['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$dataarr['user_access_domain_name']."'";
			
			$this->db->where($where);
			$this->db->order_by("tfu.tfu_id", 'desc');
			$this->db->distinct();
						
			$query = $this->db->get();
						
			return $result = $query->result();
		}
		
		public function get_project_public_by_skey_type($dataarr, $type, $val, $skeyw, $user_type){
			
			$data = array();
					
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
						
			if($type && $val){
				
				if(is_array($dataarr['scolumn']) && !empty($dataarr['scolumn']) && sizeof($dataarr['scolumn']) <> 0){ 
										
					$concatq = '';
					
					for($cc=0; $cc < sizeof($dataarr['scolumn']); $cc++){
						
						$coulumn = $dataarr['scolumn'][$cc];
						
						if($coulumn == 'mainCategoryId'){
							
							if(sizeof($dataarr['scatval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scatval'], $coulumn);
							}	
						}
						
						if($coulumn == 'contractID'){
							
							if(sizeof($dataarr['sconval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['sconval'], $coulumn);
							}	
						}
						
						if($coulumn == 'countryID'){
							
							if(sizeof($dataarr['scountry']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scountry'], $coulumn);
							}	
						}
						
						if($coulumn == 'sectors'){
							
							if(sizeof($dataarr['sectors']) <> 0){
								
								$concatq .= $this->make_pattern_query_string($dataarr['sectors'], $coulumn);
							}	
						}
					}
					
					if($user_type == 0){
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'".$concatq;
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1  AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0') AND tpp.isDraft = '0'".$concatq;
					}	
								
				}else{
					
					if($user_type == 0){
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tpp.$type = '$val'";
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tpp.$type = '$val' AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0')";
					}	
				}
				
			}else{
				
				if($user_type == 0){
					$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = 1";
				}else{
					$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = 1 AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0')";
				}	
			}
						
			if(trim($skeyw) != ''){
				$where .= ' AND (tpp.title LIKE "%'.$skeyw.'%" OR tpp.description LIKE "%'.$skeyw.'%" OR tpp.sectors LIKE "%'.$skeyw.'%")';				
			}
			
			$where .= " AND tfu.tfu_domain_type = '".$dataarr['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$dataarr['user_access_domain_name']."'";
			
			$this->db->where($where);
			$this->db->order_by("tpp.ID", 'desc');
			$this->db->distinct();
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_project_by_type_pagi($dataarr, $type, $val, $limit, $start, $sort_order, $user_id){
			
			$data = array();
			$offset = ($start - 1)* $limit;
			
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			if($type && $val){
				
				if(is_array($dataarr['scolumn']) && !empty($dataarr['scolumn']) && sizeof($dataarr['scolumn']) <> 0){ 
										
					$concatq = '';
					
					for($cc=0; $cc < sizeof($dataarr['scolumn']); $cc++){
						
						$coulumn = $dataarr['scolumn'][$cc];
						
						if($coulumn == 'mainCategoryId'){
							
							if(sizeof($dataarr['scatval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scatval'], $coulumn);
							}	
						}
						
						if($coulumn == 'contractID'){
							
							if(sizeof($dataarr['sconval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['sconval'], $coulumn);
							}	
						}
						
						if($coulumn == 'countryID'){
							
							if(sizeof($dataarr['scountry']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scountry'], $coulumn);
							}	
						}
						
						if($coulumn == 'sectors'){
							
							if(sizeof($dataarr['sectors']) <> 0){
								
								$concatq .= $this->make_pattern_query_string($dataarr['sectors'], $coulumn);
							}	
						}
					}
									
					if($user_id > 0){
						$where = "tpp.row_deleted = '0' AND tpp.userID = '$user_id'".$concatq;
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'".$concatq;
					}
					
				}else{
				
					if($user_id > 0){
						$where = "tpp.row_deleted = '0' AND tpp.$type = '$val' AND tpp.userID = '$user_id'";
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tpp.$type = '$val'";
					}
				}	
				
			}else{
				
				if($user_id > 0){
					$where = "tpp.row_deleted = '0' AND tpp.userID = '$user_id'";
				}else{
					$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'";
				}
			}
			
			$where .= " AND tfu.tfu_domain_type = '".$dataarr['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$dataarr['user_access_domain_name']."'";
			$this->db->where($where);
			
			if($sort_order && trim($sort_order) <> ''){
				$this->db->order_by("tpp.ID", $sort_order);
			}else{
				$this->db->order_by("tpp.ID", 'desc');
			}
			
			$this->db->distinct();
			$this->db->limit($limit, $offset);
						
			$query = $this->db->get();
					
			return $result = $query->result();
		}
		
		public function get_project_public_by_type_pagi($dataarr, $type, $val, $limit, $start, $sort_order, $user_type){
			
			$data = array();
			$offset = ($start - 1)* $limit;
			
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			if($type && $val){
				
				if(is_array($dataarr['scolumn']) && !empty($dataarr['scolumn']) && sizeof($dataarr['scolumn']) <> 0){ 
										
					$concatq = '';
					
					for($cc=0; $cc < sizeof($dataarr['scolumn']); $cc++){
						
						$coulumn = $dataarr['scolumn'][$cc];
						
						if($coulumn == 'mainCategoryId'){
							
							if(sizeof($dataarr['scatval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scatval'], $coulumn);
							}	
						}
						
						if($coulumn == 'contractID'){
							
							if(sizeof($dataarr['sconval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['sconval'], $coulumn);
							}	
						}
						
						if($coulumn == 'countryID'){
							
							if(sizeof($dataarr['scountry']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scountry'], $coulumn);
							}	
						}
						
						if($coulumn == 'sectors'){
							
							if(sizeof($dataarr['sectors']) <> 0){
								
								$concatq .= $this->make_pattern_query_string($dataarr['sectors'], $coulumn);
							}	
						}
					}
					
					if($user_type == 0){
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'".$concatq;
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1  AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0') AND tpp.isDraft = '0'".$concatq;
					}
						
				}else{
					
					if($user_type == 0){
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tpp.$type = '$val'";
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tpp.$type = '$val' AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0')";
					}	
				}
				
			}else{
				
				if($user_type == 0){
					$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = 1";
				}else{
					$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = 1 AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0')";
				}	
			}
			
			$where .= " AND tfu.tfu_domain_type = '".$dataarr['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$dataarr['user_access_domain_name']."'";
			
			$this->db->where($where);
			
			if($sort_order && trim($sort_order) <> ''){
				$this->db->order_by("tpp.ID", $sort_order);
			}else{
				$this->db->order_by("tpp.ID", 'desc');
			}
			
			$this->db->distinct();
			$this->db->limit($limit, $offset);
						
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_project_by_skey_type_pagi($dataarr, $type, $val, $skeyw, $limit, $start, $sort_order, $user_id){
			
			$data = array();
			$offset = ($start - 1)* $limit;
			
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			if($type && $val){
				
				if(is_array($dataarr['scolumn']) && !empty($dataarr['scolumn']) && sizeof($dataarr['scolumn']) <> 0){ 
					
					$concatq = '';
					
					for($cc=0; $cc < sizeof($dataarr['scolumn']); $cc++){
						
						$coulumn = $dataarr['scolumn'][$cc];
						
						if($coulumn == 'mainCategoryId'){
							
							if(sizeof($dataarr['scatval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scatval'], $coulumn);
							}	
						}
						
						if($coulumn == 'contractID'){
							
							if(sizeof($dataarr['sconval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['sconval'], $coulumn);
							}	
						}
						
						if($coulumn == 'countryID'){
							
							if(sizeof($dataarr['scountry']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scountry'], $coulumn);
							}	
						}
						
						if($coulumn == 'sectors'){
							
							if(sizeof($dataarr['sectors']) <> 0){
								
								$concatq .= $this->make_pattern_query_string($dataarr['sectors'], $coulumn);
							}	
						}
					}
									
					if($user_id > 0){
						$where = "tpp.row_deleted = '0' AND tpp.userID = '$user_id'".$concatq;
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'".$concatq;
					}
					
				}else{
				
					if($user_id > 0){
						$where = "tpp.row_deleted = '0' AND tpp.$type = '$val' AND tpp.userID = '$user_id'";
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tpp.$type = '$val'";
					}
				}
				
			}else{
				
				if($user_id > 0){
					$where = "tpp.row_deleted = '0' AND tpp.userID = '$user_id'";
				}else{
					$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'";
				}
			}
			
			if(trim($skeyw) != ''){
				/* $where .= ' AND (tpp.title LIKE "%'.$skeyw.'%" OR tpp.description LIKE "%'.$skeyw.'%" OR tpp.sectors LIKE "%'.$skeyw.'%")';	*/	
				$where .= ' AND (tpp.title LIKE "%'.$skeyw.'%" OR tpp.description LIKE "%'.$skeyw.'%")';	
			}
			
			$where .= " AND tfu.tfu_domain_type = '".$dataarr['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$dataarr['user_access_domain_name']."'";
			
			$this->db->where($where);
			
			if($sort_order && trim($sort_order) <> ''){
				$this->db->order_by("tpp.ID", $sort_order);
			}else{
				$this->db->order_by("tpp.ID", 'desc');
			}
			
			$this->db->distinct();
			$this->db->limit($limit, $offset);
				
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_user_public_by_skey_type_pagi($dataarr, $type, $val, $skeyw, $limit, $start, $user_type, $user_id, $suser_type){
			
			$data = array();
			$offset = ($start - 1) * $limit;
					
			$this->db->select('*, tca.ID as cat_id, tca.cName as cat_name');
			$this->db->from('{PRE}user tfu');
			
			if($suser_type == 1){
				$this->db->join('{PRE}service_provider tfsp', 'tfsp.tfsp_user_ref = tfu.tfu_id', 'left');
			}
			
			if($suser_type == 2){
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tfu.tfu_id', 'left');
			}
			
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tfu.tfu_id', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tcom.tfcom_cat_ref', 'left');
					
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
			
			if($type && $val){
				
				if((is_array($dataarr['scatval']) && !empty($dataarr['scatval']) && sizeof($dataarr['scatval']) <> 0) || (is_array($dataarr['scountry']) && !empty($dataarr['scountry']) && sizeof($dataarr['scountry']) <> 0) || (is_array($dataarr['sectors']) && !empty($dataarr['sectors']) && sizeof($dataarr['sectors']) <> 0)){ 
										
					$concatq = '';
					
					if(sizeof($dataarr['scatval']) <> 0){
						$concatq .= $this->make_company_query_string($dataarr['scatval'], 'tfcom_cat_ref');
					}
					
					if(sizeof($dataarr['scountry']) <> 0){
						$concatq .= $this->make_company_query_string($dataarr['scountry'], 'tfcom_country_ref');
					}
					
					if(sizeof($dataarr['sectors']) <> 0){
						$concatq .= $this->make_company_pattern_query_string($dataarr['sectors'], 'tfcom_sectors');
					}
										
					if($suser_type <> 0 && ($user_id == 0 || $user_type == 3)){
						$where = "tfu.tfu_active = '1' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_admin_blocked = '0'".$concatq;
					}else{
						$where = "tfu.tfu_id = '$user_id' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_active = '1' AND tfu.tfu_admin_blocked = '0'".$concatq;
					}	
								
				}else{
					
					if($suser_type <> 0 && ($user_id == 0 || $user_type == 3)){
						$where = "tfu.tfu_active = '1' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_admin_blocked = '0'";
					}else{
						$where = "tfu.tfu_id = '$user_id' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_active = '1' AND tfu.tfu_admin_blocked = '0'";
					}		
				}
				
			}else{
				
				if($suser_type <> 0 && ($user_id == 0 || $user_type == 3)){
					$where = "tfu.tfu_active = '1' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_admin_blocked = '0'";
				}else{
					$where = "tfu.tfu_id = '$user_id' AND tfu.tfu_utype = '$suser_type' AND tfu.tfu_active = '1' AND tfu.tfu_admin_blocked = '0'";
				}	
			}
						
			if(trim($skeyw) != ''){
						
				if($suser_type == 1){
					$where .= ' AND (tfsp.tfsp_fname LIKE "%'.$skeyw.'%" OR tcom.tfcom_name LIKE "%'.$skeyw.'%" OR tcom.tfcom_business_overview LIKE "%'.$skeyw.'%")';
				}
				
				if($suser_type == 2){
					$where .= ' AND (tff.tff_fname LIKE "%'.$skeyw.'%" OR tcom.tfcom_name LIKE "%'.$skeyw.'%" OR tcom.tfcom_business_overview LIKE "%'.$skeyw.'%")';
				}
			}
			
			$where .= " AND tfu.tfu_domain_type = '".$dataarr['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$dataarr['user_access_domain_name']."'";
			
			$this->db->where($where);
			$this->db->order_by("tfu.tfu_id", 'desc');
			$this->db->distinct();
			$this->db->limit($limit, $offset);
			$query = $this->db->get();
											
			return $result = $query->result();
		}
		
		public function get_project_public_by_skey_type_pagi($dataarr, $type, $val, $skeyw, $limit, $start, $sort_order, $user_type){
			
			$data = array();
			$offset = ($start - 1)* $limit;
			
			$this->db->select('tpp.*, tcom.*, tc.*, tfb.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			if($type && $val){
				
				if(is_array($dataarr['scolumn']) && !empty($dataarr['scolumn']) && sizeof($dataarr['scolumn']) <> 0){ 
										
					$concatq = '';
					
					for($cc=0; $cc < sizeof($dataarr['scolumn']); $cc++){
						
						$coulumn = $dataarr['scolumn'][$cc];
						
						if($coulumn == 'mainCategoryId'){
							
							if(sizeof($dataarr['scatval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scatval'], $coulumn);
							}	
						}
						
						if($coulumn == 'contractID'){
							
							if(sizeof($dataarr['sconval']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['sconval'], $coulumn);
							}	
						}
						
						if($coulumn == 'countryID'){
							
							if(sizeof($dataarr['scountry']) <> 0){
								
								$concatq .= $this->make_query_string($dataarr['scountry'], $coulumn);
							}	
						}
						
						if($coulumn == 'sectors'){
							
							if(sizeof($dataarr['sectors']) <> 0){
								
								$concatq .= $this->make_pattern_query_string($dataarr['sectors'], $coulumn);
							}	
						}
					}
					
					if($user_type == 0){
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'".$concatq;
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0') AND tpp.isDraft = '0'".$concatq;
					}	
							
				}else{
					
					if($user_type == 0){
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tpp.$type = '$val'";
					}else{
						$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND tpp.$type = '$val' AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0')";
					}	
				}
				
			}else{
				
				if($user_type == 0){
					$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0'";
				}else{
					$where = "tpp.row_deleted = '0' AND tpp.admin_approval = 1 AND tpp.isDraft = '0' AND (tpp.visibility = '".$user_type."' OR tpp.visibility = '0')";
				}	
			}
			
			if(trim($skeyw) != ''){
				$where .= ' AND (tpp.title LIKE "%'.$skeyw.'%" OR tpp.description LIKE "%'.$skeyw.'%" OR tpp.sectors LIKE "%'.$skeyw.'%")';				
			}
			
			$where .= " AND tfu.tfu_domain_type = '".$dataarr['user_access_domain_type']."' AND tfu.tfu_domain_name = '".$dataarr['user_access_domain_name']."'";
			
			$this->db->where($where);
			
			if($sort_order && trim($sort_order) <> ''){
				$this->db->order_by("tpp.ID", $sort_order);
			}else{
				$this->db->order_by("tpp.ID", 'desc');
			}
			
			$this->db->distinct();
			$this->db->limit($limit, $offset);
						
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_project_by_id($id){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tfb.*, tc.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tca.imagePath as cat_image, tct.ID as cont_id, tct.cName as cont_name, tct.imagePath as cont_image');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left'); 
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			$where = "tpp.ID = '$id'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_proposal_by_id($id, $type){
			
			$data = array();
						
			$this->db->select('*');
			
			$this->db->from('{PRE}project_posts tpp');
			// $this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
							
			if($type == 'p'){
				$this->db->join('{PRE}proposal_provider tppr', 'tppr.tpp_project_ref = tpp.ID', 'left');
				$this->db->join('{PRE}service_provider tsp', 'tsp.tfsp_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tsp.tfsp_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$this->db->join('{PRE}industry_categories tca', 'tca.ID = tcom.tfcom_cat_ref', 'left');
						
				$where = "tppr.tpp_id = '$id'";
			}
			
			if($type == 'f'){
				$this->db->join('{PRE}proposal_financier tppr', 'tppr.tpf_project_ref = tpp.ID', 'left');
				$this->db->join('{PRE}financier tf', 'tf.tff_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tf.tff_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$this->db->join('{PRE}industry_categories tca', 'tca.ID = tcom.tfcom_cat_ref', 'left');
				
				$where = "tppr.tpf_id = '$id'";
			}
						
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_proposal_by_ref($id, $user_id, $type){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tfb.*, tc.*, tcu.*, tppr.*, tspf.*, tca.ID as cat_id, tca.cName as cat_name, tca.imagePath as cat_image, tct.ID as cont_id, tct.cName as cont_name, tct.imagePath as cont_image');
			
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
							
			if($type == 'p' || $type == 1){
				$this->db->join('{PRE}proposal_provider tppr', 'tppr.tpp_project_ref = tpp.ID', 'left');
				$this->db->join('{PRE}service_provider tspf', 'tspf.tfsp_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
							
				$where = "tppr.tpp_project_ref = '$id' AND tppr.tpp_user_ref = '$user_id'";
			}
			
			if($type == 'f' || $type == 2){
				$this->db->join('{PRE}proposal_financier tppr', 'tppr.tpf_project_ref = tpp.ID', 'left');
				$this->db->join('{PRE}financier tspf', 'tspf.tff_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				
				$where = "tppr.tpf_project_ref = '$id' AND tppr.tpf_user_ref = '$user_id'";
			}
						
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_contractor_proposal_by_id($id, $type){
			
			$data = array();
						
			$this->db->select('*');
			
			$this->db->from('{PRE}project_posts tpp');
			// $this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
							
			if($type == 'p'){
				$this->db->join('{PRE}proposal_provider tppr', 'tppr.tpp_project_ref = tpp.ID', 'left');
				$this->db->join('{PRE}subcontract_supplier tss', 'tss.tfss_proposal_ref = tppr.tpp_id', 'left');
				$this->db->join('{PRE}service_provider tsp', 'tsp.tfsp_user_ref = tss.tfss_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tss.tfss_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$this->db->join('{PRE}industry_categories tca', 'tca.ID = tcom.tfcom_cat_ref', 'left');
							
				$where = "tppr.tpp_id = '$id'";
			}
					
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_proposal_by_contractor_ref($id, $user_id, $type){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tfb.*, tss.*, tc.*, tcu.*, tppr.*, tspf.*, tca.ID as cat_id, tca.cName as cat_name, tca.imagePath as cat_image, tct.ID as cont_id, tct.cName as cont_name, tct.imagePath as cont_image');
			
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
							
			if($type == 'p' || $type == 1){
				$this->db->join('{PRE}proposal_provider tppr', 'tppr.tpp_project_ref = tpp.ID', 'left');
				$this->db->join('{PRE}subcontract_supplier tss', 'tss.tfss_proposal_ref = tppr.tpp_id', 'left');
				$this->db->join('{PRE}service_provider tspf', 'tspf.tfsp_user_ref = tss.tfss_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tss.tfss_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
							
				$where = "tppr.tpp_project_ref = '$id' AND tss.tfss_user_ref = '$user_id'";
			}
								
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_message_by_user_and_type($uid, $utype, $send_to_user_ref, $send_to_user_type_ref){
			
			$data = array();
						
			$this->db->select('*');
			$this->db->from('{PRE}project_message_board');
			$where = "(tfpmb_sender_ref = '$uid' AND tfpmb_receiver_ref = '$send_to_user_ref') OR (tfpmb_receiver_ref = '$uid' AND tfpmb_sender_ref = '$send_to_user_ref')";
			$this->db->where($where);
			$this->db->group_by('tfpmb_id');
			// $this->db->order_by('tfpmb_id', 'desc');
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_saved_project_by_uid($user_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_saved_project');
			
			$where = "tfusp_user_ref = '$user_id' AND tfusp_row_deleted = 0";
			
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
		
		public function get_save_project_by_id($id, $user_id){
			
			$data = array();
						
			$this->db->select('*');
			$this->db->from('{PRE}user_saved_project');
			$where = "tfusp_project_ref = '$id' AND tfusp_user_ref = '$user_id'";
			
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function save_project($id, $user_id, $user_type){
						
			$data = array();
			
			$data['tfusp_user_ref'] = $user_id;
			$data['tfusp_user_type'] = $user_type;
			$data['tfusp_project_ref'] = $id;
			
			$sresult = $this->get_save_project_by_id($id, $user_id);
			
			if(!empty($sresult) && is_array($sresult) && sizeof($sresult) <> 0){
				
				$dataup = array();
				$dataup['tfusp_row_deleted'] = 0; 
				$where = "tfusp_user_ref = '".$user_id."' AND tfusp_project_ref = '".$id."'";
				$this->db->where($where);
				$this->db->update('{PRE}user_saved_project', $dataup); 
				
				return $this->get_save_project_by_id($id, $user_id);
			
			}else{
				$this->db->insert('{PRE}user_saved_project', $data); 
				return $this->db->insert_id();
			}	
		}
		
		public function update_save_project($id, $user_id, $dataup){
						
			$data = array();
			
			$data['tfusp_user_ref'] = $user_id;
			$data['tfusp_project_ref'] = $id;
			$result = array();
			
			$sresult = $this->get_save_project_by_id($id, $user_id);
			
			if(!empty($sresult) && is_array($sresult) && sizeof($sresult) <> 0){
				
				$where = "tfusp_user_ref = '".$user_id."' AND tfusp_project_ref = '".$id."'";
				$this->db->where($where);
				$this->db->update('{PRE}user_saved_project', $dataup); 
				
				return $this->get_save_project_by_id($id, $user_id);
				
			}else{
				return $result;
			}
		}
		
		public function add_project($data_add){
			
			$data = array();
						
			$this->db->insert('{PRE}project_posts', $data_add); 
			$id = $this->db->insert_id();
					
			return $id;
		}
		
		public function get_project_file_by_id($id){
			
			$datan = array();
			
			$this->db->select('*');
			$this->db->from('{PRE}projects_post_files');
			$where = "tppf_id = ".$id;
			$this->db->where($where);
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_project_file_by_ref_and_index($pref, $rowindx){
			
			$datan = array();
			
			$this->db->select('*');
			
			$this->db->from('{PRE}projects_post_files');
			$where = "tppf_project_ref = '".$pref."' AND tppf_file_index = '".$rowindx."'";
			
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function add_project_file_by_id($proj_id, $data_add){
			
			$data = array();
						
			$this->db->insert('{PRE}projects_post_files', $data_add); 
			$id = $this->db->insert_id();
					
			return $id;
		
		}
		
		public function update_project_file_by_id($id, $data_add){
			
			$datan = array();
						
			$where = "tppf_id = ".$id;
			$this->db->where($where);
			$this->db->update('{PRE}projects_post_files', $data_add); 
					
			return $result = $this->get_project_file_by_id($id);
		}
		
		public function update_project_by_id($id, $data_add){
			
			$datan = array();
						
			$where = "ID = ".$id;
			$this->db->where($where);
			$this->db->update('{PRE}project_posts', $data_add); 
					
			return $result = $this->get_project_by_id($id);
		}
		
		public function add_proposal($data_add, $type){
			
			$data = array();
			
			$id = 0;
			
			if($type == 'p'){
				$this->db->insert('{PRE}proposal_provider', $data_add); 
				$id = $this->db->insert_id();
			}	
			
			if($type == 'f'){
				$this->db->insert('{PRE}proposal_financier', $data_add); 
				$id = $this->db->insert_id();
			}	
			
			if($id > 0){
								
				$datan = array();
				
				$datan['tfpi_accept'] = 1;			
				
				if($type == 'p'){	
					$where = "tfpi_project_ref = '".$data_add['tpp_project_ref']."' AND tfpi_user_ref = '".$data_add['tpp_user_ref']."'";
				}
				
				if($type == 'f'){	
					$where = "tfpi_project_ref = '".$data_add['tpf_project_ref']."' AND tfpi_user_ref = '".$data_add['tpf_user_ref']."'";
				}
				
				$this->db->where($where);
				$this->db->update('{PRE}project_invites', $datan); 
			}
			
			return $id;
		}
		
		public function get_proposal_files_by_id($id, $type){
		
			$data = array();
						
			$this->db->select('*');
			
			if($type == 'p'){
			
				$this->db->from('{PRE}proposal_supplier_submitted_files');
				$where = "tpssf_proposal_ref = '$id'"; // AND tpssf_row_deleted = 0
				
			}
			
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_proposal_file_by_ref_and_index($pref, $rowindx, $type){
			
			$datan = array();
			
			$this->db->select('*');
			
			if($type == 'p'){
			
				$this->db->from('{PRE}proposal_supplier_submitted_files');
				$where = "tpssf_proposal_ref = '".$pref."' AND tpssf_file_index = '".$rowindx."'";
			}
			
			$this->db->where($where);
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_proposal_file_by_id($id, $type){
			
			$datan = array();
			
			$this->db->select('*');
			
			if($type == 'p'){
			
				$this->db->from('{PRE}proposal_supplier_submitted_files');
				$where = "tpssf_id = ".$id;
			}
			
			$this->db->where($where);
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function add_proposal_file_by_id($prop_id, $data_add, $type){
			
			$data = array();
			
			if($type == 'p'){
				
				$this->db->insert('{PRE}proposal_supplier_submitted_files', $data_add); 
			}
			
			$id = $this->db->insert_id();
					
			return $id;
		
		}
		
		public function update_proposal_file_by_id($id, $data_add, $type){
			
			$datan = array();
			
			if($type == 'p'){		
			
				$where = "tpssf_id = ".$id;
				$this->db->where($where);
				$this->db->update('{PRE}proposal_supplier_submitted_files', $data_add); 
			}
			
			return $result = $this->get_proposal_file_by_id($id, $type);
		}
			
		public function update_proposal_by_id($id, $data_add, $type){
			
			$datan = array();
					
			if($type == 'p'){
				
				$where = "tpp_id = ".$id;
				$this->db->where($where);
				$this->db->update('{PRE}proposal_provider', $data_add); 
			}	
			
			if($type == 'f'){
				
				$where = "tpf_id = ".$id;
				$this->db->where($where);
				$this->db->update('{PRE}proposal_financier', $data_add); 
			}
					
			return $this->get_proposal_by_id($id, $type);
		}
		
		public function update_proposal_by_project_and_user_ref($proj_ref, $user_ref, $data_add, $type){
			
			$datan = array();
					
			if($type == 'p'){
				
				$where = "tpp_project_ref = '".$proj_ref."' AND tpp_user_ref = '".$user_ref."'";
				$this->db->where($where);
				$this->db->update('{PRE}proposal_provider', $data_add); 
			}

			if($type == 'f'){
				
				$where = "tpf_project_ref = '".$proj_ref."' AND tpf_user_ref = '".$user_ref."'";
				$this->db->where($where);
				$this->db->update('{PRE}proposal_financier', $data_add); 
			}
								
			return true;
		}
		
		public function add_supplier_shipment_rejection_by_project_proposal_and_user_ref($data_add, $type){
			
			$id = 0;
			
			if($type == 'p'){
				
				$id = $this->db->insert('{PRE}supplier_shipment_rejection_reason', $data_add); 
			}

			if($type == 'f'){
				
				
			}
								
			return $id;
		}
		
		public function get_supplier_shipment_rejection_by_project_proposal_and_user_ref($proj_ref, $prop_ref, $user_ref, $type){
			
			$datan = array();
					
			if($type == 'p'){
				
				$this->db->select('*');
				$this->db->from('{PRE}supplier_shipment_rejection_reason');
				$where = "tfssrr_proposal_ref = '".$prop_ref."' AND tfssrr_project_ref = '".$proj_ref."' AND tfssrr_user_ref = '".$user_ref."'";
				$this->db->where($where);
				$query = $this->db->get();
				
				return $result = $query->result();
			}

			if($type == 'f'){
				
				
			}
								
			return true;
		}
		
		public function update_supplier_shipment_rejection_by_project_proposal_and_user_ref($proj_ref, $prop_ref, $user_ref, $data_add, $type){
			
			$datan = array();
					
			if($type == 'p'){
				
				$where = "`tfssrr_proposal_ref` = '".$prop_ref."' AND `tfssrr_project_ref` = '".$proj_ref."' AND `tfssrr_user_ref` = '".$user_ref."'";
				
				$this->db->query("UPDATE {PRE}supplier_shipment_rejection_reason SET `tfssrr_rejection_msg` = '".$data_add['tfssrr_rejection_msg']."', `tfssrr_row_deleted` = '".$data_add['tfssrr_row_deleted']."' WHERE ".$where." ORDER BY tfssrr_id DESC LIMIT 1");
				
				$where = "`tpp_id` = '".$prop_ref."' AND `tpp_project_ref` = '".$proj_ref."'";
				
				$this->db->query("UPDATE {PRE}proposal_provider SET `tpp_rejection_msg` = '".$data_add['tfssrr_rejection_msg']."', `tpp_rejected` = 1 WHERE ".$where);
				
			}

			if($type == 'f'){
				
				
			}
								
			return true;
		}
		
		public function reject_other_proposal_by_project($project_ref, $user_id, $type)
		{
			if($type == 'p'){
				
				$this->db->select('*');
				$this->db->from('{PRE}proposal_provider');
			
				$where = "tpp_project_ref = '".$project_ref."' AND tpp_user_ref = '".$user_id."' AND tpp_beneficiary_accept = 0";
				$this->db->where($where);
				
				$query = $this->db->get();
				$result = $query->result();
				
				if(!empty($result) && is_array($result) && sizeof($result) <> 0){
					
					$data_add = array();
					
					foreach($result as $row){
					
						$id = $row->tpp_id;
						$data_add['row_deleted'] = 1;
						$where = "tpp_id = ".$id;
						$this->db->where($where);
						$this->db->update('{PRE}proposal_provider', $data_add); 
					}
				}
				
				$this->db->select('*');
				$this->db->from('{PRE}project_invites');
			
				$where = "tfpi_project_ref = '".$project_ref."' AND tfpi_user_type = 1";
				$this->db->where($where);
				
				$query = $this->db->get();
				$iresult = $query->result();
				
				if(!empty($iresult) && is_array($iresult) && sizeof($iresult) <> 0){
					
					foreach($iresult as $irow){
						
						$data_add = array();
						
						// if($irow->tfpi_user_ref <> $user_id){
							
							$data_add['row_deleted'] = 1;
							$where = "tfpi_id = ".$irow->tfpi_id;
							$this->db->where($where);
							$this->db->update('{PRE}project_invites', $data_add); 
						// }
					}	
				}	
				
				$this->db->select('*');
				$this->db->from('{PRE}user_saved_project');
			
				$where = "tfusp_project_ref = '".$project_ref."' AND tfusp_user_type = 1";
				$this->db->where($where);
				
				$query = $this->db->get();
				$sresult = $query->result();
				
				if(!empty($sresult) && is_array($sresult) && sizeof($sresult) <> 0){
					
					foreach($sresult as $srow){
						
						$data_add = array();
						
						// if($srow->tfusp_user_ref <> $user_id){
							
							$data_add['tfusp_row_deleted'] = 1;
							$where = "tfusp_id = ".$srow->tfusp_id;
							$this->db->where($where);
							$this->db->update('{PRE}user_saved_project', $data_add); 
						// }
					}	
				}
											
				$this->db->select('*');
				$this->db->from('{PRE}project_posts');
				$where = "ID = '".$project_ref."' AND awarded_financier = 0";
				$this->db->where($where);
				
				$query = $this->db->get();
				$presult = $query->result();
				
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
					
				}else{
					$data_add = array();
					$data_add['awardStatus'] = 1;
					// $data_add['pstartingDate'] = date('Y-m-d H:i:s');
					$this->update_project_by_id($project_ref, $data_add);
				}
				
				$this->db->select('*');
				$this->db->from('{PRE}project_posts');
				$where = "ID = '".$project_ref."' AND awarded_provider = 1 AND visibility = 1";
				$this->db->where($where);
				
				$query = $this->db->get();
				$presult = $query->result();
				
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
					$data_add = array();
					$data_add['awardStatus'] = 1;
					// $data_add['pstartingDate'] = date('Y-m-d H:i:s');
					$this->update_project_by_id($project_ref, $data_add);
				}else{
					
				}
			}	
			
			if($type == 'f'){
				
				$this->db->select('*');
				$this->db->from('{PRE}proposal_financier');
			
				$where = "tpf_project_ref = '".$project_ref."' AND tpf_user_ref = '".$user_id."' AND tpf_beneficiary_accept = 0";
				$this->db->where($where);
				
				$query = $this->db->get();
				$result = $query->result();
				
				if(!empty($result) && is_array($result) && sizeof($result) <> 0){
					
					$data_add = array();
					
					foreach($result as $row){
					
						$id = $row->tpp_id;
						$data_add['row_deleted'] = 1;
						$where = "tpf_id = ".$id;
						// $this->db->where($where);
						// $this->db->update('{PRE}proposal_financier', $data_add); 
					}
				}
				
				$this->db->select('*');
				$this->db->from('{PRE}project_invites');
			
				$where = "tfpi_project_ref = '".$project_ref."' AND tfpi_user_type = 2";
				$this->db->where($where);
				
				$query = $this->db->get();
				$iresult = $query->result();
				
				if(!empty($iresult) && is_array($iresult) && sizeof($iresult) <> 0){
					
					foreach($iresult as $irow){
						
						$data_add = array();
						
						// if($irow->tfpi_user_ref <> $user_id){
							
							$data_add['row_deleted'] = 1;
							$where = "tfpi_id = ".$irow->tfpi_id;
							// $this->db->where($where);
							// $this->db->update('{PRE}project_invites', $data_add); 
						// }
					}	
				}	
				
				$this->db->select('*');
				$this->db->from('{PRE}user_saved_project');
			
				$where = "tfusp_project_ref = '".$project_ref."' AND tfusp_user_type = 2";
				$this->db->where($where);
				
				$query = $this->db->get();
				$sresult = $query->result();
				
				if(!empty($sresult) && is_array($sresult) && sizeof($sresult) <> 0){
					
					foreach($sresult as $srow){
						
						$data_add = array();
						
						// if($srow->tfusp_user_ref <> $user_id){
							
							$data_add['tfusp_row_deleted'] = 1;
							$where = "tfusp_id = ".$srow->tfusp_id;
							// $this->db->where($where);
							// $this->db->update('{PRE}user_saved_project', $data_add); 
						// }
					}	
				}
				
				$this->db->select('*');
				$this->db->from('{PRE}project_posts');
				$where = "ID = '".$project_ref."' AND awarded_provider = 0";
				$this->db->where($where);
				
				$query = $this->db->get();
				$presult = $query->result();
				
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
					
				}else{
					$data_add = array();
					$data_add['awardStatus'] = 1;
					// $data_add['fstartingDate'] = date('Y-m-d H:i:s');
					// $this->update_project_by_id($project_ref, $data_add);
				}
				
				$this->db->select('*');
				$this->db->from('{PRE}project_posts');
				$where = "ID = '".$project_ref."' AND awarded_financier = 1 AND visibility = 2";
				$this->db->where($where);
				
				$query = $this->db->get();
				$presult = $query->result();
				
				if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
					$data_add = array();
					$data_add['awardStatus'] = 1;
					// $data_add['pstartingDate'] = date('Y-m-d H:i:s');
					// $this->update_project_by_id($project_ref, $data_add);
				}else{
					
				}
			}
			
			$this->db->select('*');
			$this->db->from('{PRE}user_saved_project');
		
			$where = "tfusp_project_ref = '".$project_ref."' AND tfusp_user_ref = '".$user_id."'";
			$this->db->where($where);
			
			$query = $this->db->get();
			$uresult = $query->result();
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				
				$data_add = array();
				
				foreach($uresult as $row){
				
					$id = $row->tfusp_id;
					$data_add['tfusp_row_deleted'] = 1;
					$where = "tfusp_id = ".$id;
					// $this->db->where($where);
					// $this->db->update('{PRE}user_saved_project', $data_add); 
				}
			}
		}
		
		public function request_complete_project($project_ref, $user_id, $user_type, $user_id_request, $user_type_request, $request_type)
		{
			if($user_type == 1){
				
				if($request_type == 'initiate'){
					
					$data_add = array();
					$data_add['provider_completion_request'] = 1;
					$this->update_project_by_id($project_ref, $data_add);
					
					$data_add = array();
					$data_add['tpp_project_completion_request'] = 1;
					$where = "tpp_project_ref = '".$project_ref."' AND tpp_user_ref = '".$user_id."'";
					$this->db->where($where);
					$this->db->update('{PRE}proposal_provider', $data_add); 
				}

				if($request_type == 'accept'){
					
					$data_add = array();
					$data_add['pcompletedDate'] = date('Y-m-d H:i:s');
					$data_add['provider_completion_request'] = 2;
					$this->update_project_by_id($project_ref, $data_add);
				}
			}
			
			if($user_type == 2){
				
				$data_add = array();
				$data_add['financier_completion_request'] = 1;
				$this->update_project_by_id($project_ref, $data_add);
				
				$data_add = array();
				$data_add['tpf_project_completion_request'] = 1;
				$where = "tpf_project_ref = '".$project_ref."' AND tpf_user_ref = '".$user_id."'";
				$this->db->where($where);
				$this->db->update('{PRE}proposal_financier', $data_add);
			}
			
			if($user_type == 3){
				
				if($user_type_request == 1){
					
					if($request_type == 'initiate'){
					
						$data_add = array();
						$data_add['awarded_provider'] = 2;
						$data_add['pstartingDate'] = date('Y-m-d H:i:s');
						$this->update_project_by_id($project_ref, $data_add);
					}
					
					if($request_type == 'payment'){
					
						$data_add = array();
						$data_add['awarded_provider'] = 3;
						$data_add['ppaidDate'] = date('Y-m-d H:i:s');
						$this->update_project_by_id($project_ref, $data_add);
					}
					
					if($request_type == 'accept'){
									
						$data_add = array();
						$data_add['tpp_beneficiary_accept_project_completion_request'] = 1;
						$where = "tpp_project_ref = '".$project_ref."' AND tpp_user_ref = '".$user_id_request."'";
						$this->db->where($where);
						$this->db->update('{PRE}proposal_provider', $data_add);
						
						$data_add = array();
						$data_add['pbeneficiaryConfirmDate'] = date('Y-m-d H:i:s');
						$this->update_project_by_id($project_ref, $data_add);
					}
					
					if($request_type == 'reject'){
						
						// Start Loop between Supplier and Beneficiary
						$data_add = array();
						$data_add['provider_completion_request'] = 0;
						$this->update_project_by_id($project_ref, $data_add);
						
						$data_add = array();
						$data_add['tpp_project_completion_request'] = 0;
						$data_add['tpp_beneficiary_accept_project_completion_request'] = 0;
						$where = "tpp_project_ref = '".$project_ref."' AND tpp_user_ref = '".$user_id_request."'";
						$this->db->where($where);
						$this->db->update('{PRE}proposal_provider', $data_add);
						
					}
				}
				else if($user_type_request == 2){
					
					if($request_type == 'accept'){
						
						$data_add = array();
						$data_add['awarded_financier'] = 2;
						$data_add['fcompletedDate'] = date('Y-m-d H:i:s');
						$data_add['financier_completion_request'] = 2;
						$this->update_project_by_id($project_ref, $data_add);
						
						$data_add = array();
						$data_add['tpf_beneficiary_accept_project_completion_request'] = 1;
						$where = "tpf_project_ref = '".$project_ref."' AND tpf_user_ref = '".$user_id_request."'";
						$this->db->where($where);
						$this->db->update('{PRE}proposal_financier', $data_add);
					}	
					
					if($request_type == 'reject'){
						
						$data_add = array();
						$data_add['financier_completion_request'] = 0;
						$this->update_project_by_id($project_ref, $data_add);
						
						$data_add = array();
						$data_add['tpf_project_completion_request'] = 0;
						$data_add['tpf_beneficiary_accept_project_completion_request'] = 2;
						$where = "tpf_project_ref = '".$project_ref."' AND tpf_user_ref = '".$user_id_request."'";
						$this->db->where($where);
						$this->db->update('{PRE}proposal_financier', $data_add);
					}	
					
				}else{
					
				}
			}
			
			$this->db->select('*');
			$this->db->from('{PRE}project_posts');
			$where = "ID = '".$project_ref."' AND awarded_provider = 3 AND awarded_financier = 3 AND provider_completion_request = 2 AND financier_completion_request = 2 AND visibility = 0";
			$this->db->where($where);
			
			$query = $this->db->get();
			$presult = $query->result();
			
			if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
				
				$data_add = array();
				$data_add['awardStatus'] = 2;
				$data_add['completedDate'] = date('Y-m-d H:i:s');
				$this->update_project_by_id($project_ref, $data_add);
				
			}else{
				
			}
			
			$this->db->select('*');
			$this->db->from('{PRE}project_posts');
			$where = "ID = '".$project_ref."' AND awarded_provider = 3 AND provider_completion_request = 2 AND visibility = 1";
			$this->db->where($where);
			
			$query = $this->db->get();
			$presult = $query->result();
			
			if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
				
				$data_add = array();
				$data_add['awardStatus'] = 2;
				$data_add['completedDate'] = date('Y-m-d H:i:s');
				$this->update_project_by_id($project_ref, $data_add);
				
			}else{
				
			}
			
			$this->db->select('*');
			$this->db->from('{PRE}project_posts');
			$where = "ID = '".$project_ref."' AND awarded_financier = 3 AND financier_completion_request = 2 AND visibility = 2";
			$this->db->where($where);
			
			$query = $this->db->get();
			$presult = $query->result();
			
			if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
				
				$data_add = array();
				$data_add['awardStatus'] = 2;
				$data_add['completedDate'] = date('Y-m-d H:i:s');
				$this->update_project_by_id($project_ref, $data_add);
				
			}else{
				
			}
		}	
		
		public function fetch_accepted_invitaion($pid, $utype){
			
			$data = array();
						
			$this->db->select('*');
			
			// $this->db->from('{PRE}project_invites tfpi');
					
			if($utype == 1){
				// 'tppr.tpp_project_ref = tfpi.tfpi_project_ref', 'left'
				$this->db->from('{PRE}proposal_provider tppr');
				$this->db->join('{PRE}service_provider tsp', 'tsp.tfsp_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$where = "tppr.tpp_project_ref = '$pid'";
			}
			
			if($utype == 2){
				// 'tppr.tpf_project_ref = tfpi.tfpi_project_ref', 'left'
				$this->db->from('{PRE}proposal_financier tppr');
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$where = "tppr.tpf_project_ref = '$pid'";
			}
					
			// AND tfpi.tfpi_accept = 1 AND tfpi.tfpi_user_type = '".$utype."'
						
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
			
		}
		
		public function fetch_beneficiary_accepted_invitaion($pid, $utype){
			
			$data = array();
							
			if($utype == 1){
				$this->db->select('*');
				$this->db->from('{PRE}proposal_provider tppr');
				$this->db->join('{PRE}service_provider tsp', 'tsp.tfsp_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tppr.tpp_price_currency_ref', 'left');
				$where = "tppr.tpp_project_ref = '$pid' AND tppr.tpp_beneficiary_accept = 1";
				$this->db->where($where);
			}
			
			if($utype == 2){
			
				$this->db->select('tpf.*, tfu.*, tff.*, tfic.*, tfcom.*, tc.*, tcu.*'); // tfur.*, AVG(tfur.tfur_rating_value) AS financier_rating_value
				$this->db->from('{PRE}proposal_financier tpf');
				$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tpf.tpf_user_ref', 'left');
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tpf.tpf_user_ref', 'left');
				$this->db->join('{PRE}company tfcom', 'tfcom.tfcom_user_ref = tpf.tpf_user_ref', 'left');
				$this->db->join('{PRE}industry_categories tfic', 'tfic.ID = tfcom.tfcom_cat_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tfcom.tfcom_country_ref', 'left');
				$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpf.tpf_price_currency_ref', 'left');
				// $this->db->join('{PRE}user_rating tfur', 'tfur.tfur_rating_user_to = tpf.tpf_user_ref', 'left');
							
				$where = "tpf.prow_deleted = '0' AND tpf.tpf_project_ref = '".$pid."' AND tpf.tpf_beneficiary_accept = '1'"; // AND tfur.tfur_rating_user_type_to = 2
							
				/* $this->db->from('{PRE}proposal_financier tppr');
				$this->db->join('{PRE}user tfu', 'tfu.tfu_id = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}industry_categories tfic', 'tfic.ID = tppr.tfcom_cat_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tppr.tpf_price_currency_ref', 'left');
				$where = "tppr.tpf_project_ref = '$pid' AND tppr.tpf_beneficiary_accept = 1"; */
				$this->db->where($where);
				// $this->db->group_by('tfur.tfur_rating_user_to');
			
			}
					
			$query = $this->db->get();
			
			return $result = $query->result();
			
		}
		
		public function fetch_beneficiary_payment_financiers($pid, $utype){
			
			$data = array();
			
			$this->db->select('tppr.*, tff.*, tcom.*, tc.*, SUM(tppr.tpf_emi_amount) as tpf_sum_of_emi, SUM(tppr.tpf_price) as tpf_sum_of_invest');
					
			/* if($utype == 1){
				$this->db->from('{PRE}proposal_provider tppr');
				$this->db->join('{PRE}service_provider tsp', 'tsp.tfsp_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$where = "tppr.tpp_project_ref = '$pid' AND tppr.tpp_beneficiary_accept = 1";
			} */
			
			if($utype == 2){
				$this->db->from('{PRE}proposal_financier tppr');
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$where = "tppr.tpf_project_ref = '$pid' AND tppr.tpf_beneficiary_accept = 1 AND tppr.tpf_fpayment_status = 1";
			}
					
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
			
		}
		
		public function fetch_beneficiary_payment_financiers_info($pid, $utype){
			
			$data = array();
			
			$this->db->select('*');
					
			/* if($utype == 1){
				$this->db->from('{PRE}proposal_provider tppr');
				$this->db->join('{PRE}service_provider tsp', 'tsp.tfsp_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$where = "tppr.tpp_project_ref = '$pid' AND tppr.tpp_beneficiary_accept = 1";
			} */
			
			if($utype == 2){
				$this->db->from('{PRE}proposal_financier tppr');
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$where = "tppr.tpf_project_ref = '$pid' AND tppr.tpf_beneficiary_accept = 1 AND tppr.tpf_fpayment_status = 1";
			}
					
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
			
		}
		
		public function fetch_beneficiary_payment_financiers_by_uid($pid, $user_id, $utype){
			
			$data = array();
						
			$this->db->select('tppr.*, tff.*, tcom.*, tc.*, SUM(tppr.tpf_emi_amount) as tpf_sum_of_emi, SUM(tppr.tpf_price) as tpf_sum_of_invest');
					
			/* if($utype == 1){
				$this->db->from('{PRE}proposal_provider tppr');
				$this->db->join('{PRE}service_provider tsp', 'tsp.tfsp_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpp_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$where = "tppr.tpp_project_ref = '$pid' AND tppr.tpp_beneficiary_accept = 1";
			} */
			
			if($utype == 2){
				$this->db->from('{PRE}proposal_financier tppr');
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tppr.tpf_user_ref', 'left');
				$this->db->join('{PRE}country tc', 'tc.tfc_id = tcom.tfcom_country_ref', 'left');
				$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tppr.tpf_price_currency_ref', 'left');
				$where = "tppr.tpf_project_ref = '$pid' AND tppr.tpf_user_ref = '$user_id' AND tppr.tpf_beneficiary_accept = 1 AND tppr.tpf_fpayment_status = 1";
			}
					
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
				
		public function add_message($data_add){
			
			$data = array();
						
			$this->db->insert('{PRE}project_message_board', $data_add); 
			$id = $this->db->insert_id();
					
			return $id;
		}
		
		public function update_message_by_id($id, $data_add){
			
			$datan = array();
						
			$where = "tfpmb_id = ".$id;
			$this->db->where($where);
			$this->db->update('{PRE}project_message_board', $data_add); 
					
			return $result = $this->get_message_by_id($id);
		}
		
		public function get_message_by_id($id){
			
			$data = array();
						
			$this->db->select('*');
			$this->db->from('{PRE}project_message_board tpmb');
			$this->db->from('{PRE}project_posts tpp', 'tpp.ID = tpmb.tfpmb_project_ref', 'left');
			// $this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			// $this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left'); 
			$where = "tpmb.tfpmb_id = '$id'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_message_by_project_ref($id){
			
			$data = array();
						
			$this->db->select('*');
			$this->db->from('{PRE}project_message_board tpmb');
			$this->db->from('{PRE}project_posts tpp', 'tpp.ID = tpmb.tfpmb_project_ref', 'left');
			// $this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			// $this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			// $this->db->join('{PRE}states ts', 'ts.tfs_id = tpp.stateID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left'); 
			$where = "tpmb.tfpmb_project_ref = '$id'";
			$this->db->where($where);
			$this->db->group_by('tfpmb_id');
			// $this->db->order_by('tfpmb_id', 'desc');
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_rating_info_by_id($id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_rating');
			$where = "tfur_id = '".$id."'";
			$this->db->where($where);
			
			$query = $this->db->get();
			
			return $query->result();
		}
		
		public function get_rating_info_by_project($project_ref, $fuser_ref, $fuser_type, $tuser_ref, $tuser_type){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_rating');
			$where = "tfur_project_ref = '".$project_ref."' AND tfur_rating_user_from = '".$fuser_ref."' AND tfur_rating_user_type_from = '".$fuser_type."' AND tfur_rating_user_to = '".$tuser_ref."' AND 	tfur_rating_user_type_to = '".$tuser_type."'";
			$this->db->where($where);
			
			$query = $this->db->get();
			return $query->result();
		}
		
		public function add_rating_info_by_project($project_ref, $fuser_ref, $fuser_type, $tuser_ref, $tuser_type, $data_add){
			
			$rresult = array();
			$rresult = $this->get_rating_info_by_project($project_ref, $fuser_ref, $fuser_type, $tuser_ref, $tuser_type);
			
			if(!empty($rresult) && is_array($rresult) && sizeof($rresult) <> 0){
				
				$this->update_rating_info_by_project($project_ref, $fuser_ref, $fuser_type, $tuser_ref, $tuser_type, $data_add);
				$rresult = $this->get_rating_info_by_project($project_ref, $fuser_ref, $fuser_type, $tuser_ref, $tuser_type);
				
			}else{
				
				$this->db->insert('{PRE}user_rating', $data_add); 
				$id = $this->db->insert_id();
				$rresult = $this->get_rating_info_by_id($id);
			}	
			
			return $rresult;
		}
		
		public function update_rating_info_by_project($project_ref, $fuser_ref, $fuser_type, $tuser_ref, $tuser_type, $data_add){
			
			$where = "tfur_project_ref = '".$project_ref."' AND tfur_rating_user_from = '".$fuser_ref."' AND tfur_rating_user_type_from = '".$fuser_type."' AND tfur_rating_user_to = '".$tuser_ref."' AND 	tfur_rating_user_type_to = '".$tuser_type."'";
			$this->db->where($where);
			$this->db->update('{PRE}user_rating', $data_add);
		}
		
		public function get_user_rating_by_uid_type($user_ref, $user_type){
			
			if($user_type == 3 || $user_type == 1 || $user_type == 2){
				$this->db->select_avg('tfur_rating_value');
			}
			/* if($user_type == 1 || $user_type == 2){
				$this->db->select_sum('tfur_rating_value');
			} */
			$this->db->from('{PRE}user_rating');
			$where = "tfur_rating_user_to = '".$user_ref."' AND tfur_rating_user_type_to = '".$user_type."'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $query->result();
		}
					
		public function delete_project($rowid)
		{
				
		}
	}