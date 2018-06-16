<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Notification extends CI_Model {

        public function __construct()
        {
             parent::__construct();
			 $this->load->database();
	    }
					
		public function get_proposal_provider_unread_notification(){
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_provider');
			$where = "tpp_beneficiary_read = 0 AND prow_deleted = 0";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_proposal_provider_unread_notification(){
			
			$data = array();
			$data['tpp_beneficiary_read'] = 1;
			
			$where = "tpp_beneficiary_read = 0 AND prow_deleted = 0";
			$this->db->where($where);
			$this->db->update('{PRE}proposal_provider', $data); 
			
			return true;
		}
		
		public function get_proposal_provider_notification(){
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_provider');
			$where = "prow_deleted = 0";
			$this->db->where($where);
			$this->db->order_by('tpp_posted', 'desc');
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_proposal_accept_provider_unread_notification($user_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_provider');
			$where = "tpp_beneficiary_accept_read = 0 AND (tpp_beneficiary_accept = 1 OR tpp_beneficiary_accept = 2) AND tpp_user_ref = '$user_id' AND prow_deleted = 0";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_proposal_accept_provider_unread_notification($user_id){
			
			$data = array();
			$data['tpp_beneficiary_accept_read'] = 1;
			
			$where = "tpp_beneficiary_accept_read = 0 AND tpp_user_ref = '$user_id' AND prow_deleted = 0";
			$this->db->where($where);
			$this->db->update('{PRE}proposal_provider', $data); 
			
			return true;
		}
		
		public function get_proposal_accept_provider_notification($user_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_provider');
			$where = "prow_deleted = 0 AND tpp_user_ref = '$user_id' AND (tpp_beneficiary_accept = 1 OR tpp_beneficiary_accept = 2)";
			$this->db->where($where);
			$this->db->order_by('tpp_posted', 'desc');
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_proposal_financier_unread_notification(){
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_financier');
			$where = "tpf_beneficiary_read = 0 AND prow_deleted = 0";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_proposal_financier_unread_notification(){
			
			$data = array();
			$data['tpf_beneficiary_read'] = 1;
			
			$where = "tpf_beneficiary_read = 0 AND prow_deleted = 0";
			$this->db->where($where);
			$this->db->update('{PRE}proposal_financier', $data); 
			
			return true;
		}
		
		public function get_proposal_financier_notification(){
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_financier');
			$where = "prow_deleted = 0";
			$this->db->where($where);
			$this->db->order_by('tpf_posted', 'desc');
			$query = $this->db->get();
						
			return $result = $query->result();
		}
		
		public function get_proposal_accept_financier_unread_notification($user_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_financier');
			$where = "tpf_beneficiary_accept_read = 0 AND tpf_user_ref = '$user_id' AND (tpf_beneficiary_accept = 1 OR tpf_beneficiary_accept = 2) AND prow_deleted = 0";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_proposal_accept_financier_unread_notification($user_id){
			
			$data = array();
			$data['tpf_beneficiary_accept_read'] = 1;
			
			$where = "tpf_beneficiary_accept_read = 0 AND tpf_user_ref = '$user_id' AND prow_deleted = 0";
			$this->db->where($where);
			$this->db->update('{PRE}proposal_financier', $data); 
			
			return true;
		}
		
		public function get_proposal_accept_financier_notification($user_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}proposal_financier');
			$where = "prow_deleted = 0 AND tpf_user_ref = '$user_id' AND (tpf_beneficiary_accept = 1 OR tpf_beneficiary_accept = 2)";
			$this->db->where($where);
			$this->db->order_by('tpf_posted', 'desc');
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_project_invites_unread_notification($user_ref, $user_type){
			
			$this->db->select('*');
			$this->db->from('{PRE}project_invites');
			$where = "tfpi_read = 0 AND row_deleted = 0 AND tfpi_user_ref = '".$user_ref."' AND tfpi_user_type = '".$user_type."'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_project_invites_unread_notification($user_ref, $user_type){
			
			$data = array();
			$data['tfpi_read'] = 1;
			
			$where = "tfpi_read = 0 AND row_deleted = 0 AND tfpi_user_ref = '".$user_ref."' AND tfpi_user_type = '".$user_type."'";
			$this->db->where($where);
			$this->db->update('{PRE}project_invites', $data); 
			
			return true;
		}
		
		public function get_project_invites_notification($user_ref, $user_type){
			
			$this->db->select('*');
			$this->db->from('{PRE}project_invites');
			$where = "row_deleted = 0 AND tfpi_user_ref = '".$user_ref."' AND tfpi_user_type = '".$user_type."'";
			$this->db->where($where);
			$this->db->order_by('tfpi_created', 'desc');
			$query = $this->db->get();
						
			return $result = $query->result();
		}
		
		public function get_message_unread_notification($user_ref, $user_type){
			
			$this->db->select('*');
			$this->db->from('{PRE}project_message_board');
			$where = "tfpmb_receiver_notification_read = 0 AND row_deleted = 0 AND tfpmb_receiver_ref = '".$user_ref."' AND tfpmb_receiver_type_ref = '".$user_type."'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_message_unread_notification($user_ref, $user_type){
			
			$data = array();
			$data['tfpmb_receiver_notification_read'] = 1;
			
			$where = "tfpmb_receiver_notification_read = 0 AND row_deleted = 0 AND tfpmb_receiver_ref = '".$user_ref."' AND tfpmb_receiver_type_ref = '".$user_type."'";
			$this->db->where($where);
			$this->db->update('{PRE}project_message_board', $data); 
			
			return true;
		}
		
		public function get_message_notification($user_ref, $user_type){
			
			$this->db->select('*');
			$this->db->from('{PRE}project_message_board');
			$where = "row_deleted = 0 AND tfpmb_receiver_ref = '".$user_ref."' AND tfpmb_receiver_type_ref = '".$user_type."'";
			$this->db->where($where);
			$this->db->order_by('tfpmb_created', 'desc');
			$query = $this->db->get();
						
			return $result = $query->result();
		}
				
		public function update_base_user_info_by_id($id, $data){
			
			$where = "tfu_id = '$id'";
			$this->db->where($where);
			$this->db->update('{PRE}user', $data); 
		}

		public function save_notification($data){
			
			$data_add = array();
			
			if(!empty($data) && sizeof($data) <> 0){
				
				foreach($data as $drow){
					
					$data_add['notify_type'] = $drow['notify_type'];
					$data_add['notify_id'] = $drow['notify_id'];
					$data_add['notify_for_user'] = $drow['notify_for_user'];
					$data_add['notify_for_user_type'] = $drow['notify_for_user_type'];
					$data_add['notify_for_project'] = $drow['notify_for_project'];
					$data_add['notify_for_proposal'] = $drow['notify_for_proposal'];
					$data_add['notify_user_ref'] = $drow['notify_user_ref'];
					$data_add['notify_user_type_ref'] = $drow['notify_user_type_ref'];
					$data_add['notify_text'] = $drow['notify_text'];
					$data_add['notify_time'] = $drow['notify_time'];
					
					$this->db->select('*');
					$this->db->from('{PRE}notification');
					$where = "notify_type = '".$drow['notify_type']."' AND notify_for_project = '".$drow['notify_for_project']."' AND notify_user_ref = '".$drow['notify_user_ref']."' AND notify_user_type_ref = '".$drow['notify_user_type_ref']."' AND notify_text = '".$drow['notify_text']."'";
					
					$this->db->where($where);
					$query = $this->db->get();
						
					$result = $query->result();
					
					if(!empty($result) && is_array($result) && sizeof($result) <> 0){
						
						$data_add = array();
						$data_add['notify_read'] = 0;
						$data_add['row_deleted'] = 0;
						
						$this->update_notification($drow['notify_for_project'], $drow['notify_user_ref'], $drow['notify_user_type_ref'], $data_add);
						
					}else{
						$this->db->insert('{PRE}notification', $data_add); 
					}
				}
			}
		}
		
		public function get_notification($user_id, $user_type_ref){
			
			$data_add = array();
			
			$this->db->select('*');
			$this->db->from('{PRE}notification');
			$where = "notify_user_ref = '".$user_id."' AND notify_user_type_ref = '".$user_type_ref."'";
			$this->db->where($where);
			$this->db->order_by('notify_time', 'desc');
			
			$query = $this->db->get();
						
			return $result = $query->result();
		}
		
		public function update_notification($project_ref, $user_id, $user_type_ref, $data_add){
			
			$where = "notify_for_project = '".$project_ref."' AND notify_user_ref = '".$user_id."' AND notify_user_type_ref = '".$user_type_ref."'";
			
			$this->db->where($where);
			$this->db->update('{PRE}notification', $data_add);
		}
		
		public function update_notification_all($user_id, $user_type_ref, $data_add){
			
			$where = "notify_user_ref = '".$user_id."' AND notify_user_type_ref = '".$user_type_ref."'";
			
			$this->db->where($where);
			$this->db->update('{PRE}notification', $data_add);
		}
		
		public function get_notification_count($user_id, $user_type_ref){
			
			$data_add = array();
			
			$this->db->select('*');
			$this->db->from('{PRE}notification');
			$where = "notify_user_ref = '".$user_id."' AND notify_user_type_ref = '".$user_type_ref."' AND notify_read = 0 AND row_deleted = 0";
			$this->db->where($where);
			
			$query = $this->db->get();
						
			return $result = $query->result();
		}
		
		public function update_project_posted_unread_notification($user_id, $user_type_ref){
			
			if($user_type_ref == 1){
				
				$this->db->select('*');
				$this->db->from('{PRE}user tfu');
				$this->db->join('{PRE}service_provider tfsp', 'tfsp.tfsp_user_ref = tfu.tfu_id');
				$this->db->join('{PRE}company tfc', 'tfc.tfcom_user_ref = tfu.tfu_id');
			
				$where = "tfu.tfu_id = '$user_id'";
				$this->db->where($where);
				$query = $this->db->get();
			
				$result = $query->result();	
				
				if($result[0]->tfsp_posted_project_list && trim($result[0]->tfsp_posted_project_list) != ''){
					$project_list = unserialize($result[0]->tfsp_posted_project_list);
					$project_add = array();
					
					if(is_array($project_list) && !empty($project_list) && sizeof($project_list) <> 0){
						foreach($project_list as $key => $val){
							$project_add[$key] = 1;
						}
					}	
						
					$data_add = array();
					
					$data_add['tfsp_posted_project_list'] = serialize($project_add);
					
					$where = "tfsp_user_ref = '$user_id'";
					$this->db->where($where);
					$this->db->update('{PRE}service_provider', $data_add); 
				}
			}
			
			if($user_type_ref == 2){
				
				$this->db->select('*');
				$this->db->from('{PRE}user tfu');
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tfu.tfu_id');
				$this->db->join('{PRE}company tfc', 'tfc.tfcom_user_ref = tfu.tfu_id');
			
				$where = "tfu.tfu_id = '$user_id'";
				$this->db->where($where);
				$query = $this->db->get();
			
				$result = $query->result();	
				
				if($result[0]->tff_posted_project_list && trim($result[0]->tff_posted_project_list) != ''){
					$project_list = unserialize($result[0]->tff_posted_project_list);
					$project_add = array();
					
					if(is_array($project_list) && !empty($project_list) && sizeof($project_list) <> 0){	
						foreach($project_list as $key => $val){
							$project_add[$key] = 1;
						}
					}
					
					$data_add = array();
					
					$data_add['tff_posted_project_list'] = serialize($project_add);
					
					$where = "tff_user_ref = '$user_id'";
					$this->db->where($where);
					$this->db->update('{PRE}financier', $data_add); 
				}
			}
		}	
	}