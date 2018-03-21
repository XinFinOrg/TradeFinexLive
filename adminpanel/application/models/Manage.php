<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Manage extends CI_Model {

        public function __construct()
        {
             parent::__construct();
			 $this->load->database();
	    }
		
		public function get_superadmin(){
			
			$this->db->select('*');
			$this->db->from('{PRE}admin');
			$where = "tfa_utype = '-1'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
					
		public function get_admins(){
			
			$this->db->select('*');
			$this->db->from('{PRE}admin');
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_profile_by_id($id){
			
			$this->db->select('*');
			$this->db->from('{PRE}admin');
			$where = "tfa_id = '$id'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_admin($id, $data)
		{
			$where = "tfa_id = '$id'";
			$this->db->where($where);
			$this->db->update('{PRE}admin', $data); 

			return $result = $this->get_profile_by_id($id);
		}
		
		public function add_admin($data){
			
			$this->db->insert('{PRE}admin', $data); 
			$id = $this->db->insert_id();
			
			return $id;
		}
		
		public function get_user_profile_by_id($id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user');
			$where = "tfu_id = '$id'";
			$this->db->where($where);
			$query = $this->db->get();
			
			$result = $query->result();
			
			$uresult = array();
			
			if(!empty($result) && sizeof($result) <> 0){
				
				$type_id = $result[0]->tfu_utype;
				
				$this->db->select('*');
				$this->db->from('{PRE}user tfu');
				
				if($type_id == 1){
					$this->db->join('{PRE}service_provider tfsp', 'tfsp.tfsp_user_ref = tfu.tfu_id');
					$this->db->join('{PRE}company tfcop', 'tfcop.tfcom_user_ref = tfu.tfu_id');
					$this->db->join('{PRE}country tfct', 'tfct.tfc_id = tfcop.tfcom_country_ref');
				}
				
				if($type_id == 2){
					$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tfu.tfu_id');
					$this->db->join('{PRE}company tfcop', 'tfcop.tfcom_user_ref = tfu.tfu_id');
					$this->db->join('{PRE}country tfct', 'tfct.tfc_id = tfcop.tfcom_country_ref');
				}
							
				if($type_id == 3){
					$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tfu.tfu_id');
					$this->db->join('{PRE}company tfcop', 'tfcop.tfcom_user_ref = tfu.tfu_id');
					$this->db->join('{PRE}country tfct', 'tfct.tfc_id = tfcop.tfcom_country_ref');
				}
				
				$where = "tfu_id = '$id'";
				$this->db->where($where);
				$query = $this->db->get();
				
				$uresult = $query->result();
			}
			
			return $uresult;
		}
		
		public function get_project_info_by_id($id){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tfb.*, tc.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
			
			$where = "tpp.ID = '$id' AND tpp.isDraft = '0'";
			
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
						
			return $result = $query->result();
		}
				
		public function fetch_user($data){
			
			$result = array();
			
			$result['error'] = 0;
			
			$this->db->select('*');
			$this->db->from('{PRE}admin');
			$where = "tfa_usern = '".$data['user_name']."' AND tfa_passwd = '".$data['user_password']."'";
			$this->db->where($where);
			$query = $this->db->get();
			
			$uresult = $query->result();
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$result['user_detail'] = $uresult[0];
			}else{
				$result['error'] = 1;
			}

			return $result;	
		}
		
		public function get_user_info_by_type($type_id){
					
			$this->db->select('*');
			$this->db->from('{PRE}user tfu');
			
			if($type_id == 1){
				$this->db->join('{PRE}service_provider tfsp', 'tfsp.tfsp_user_ref = tfu.tfu_id');
				$this->db->join('{PRE}company tfcop', 'tfcop.tfcom_user_ref = tfu.tfu_id');
				$this->db->join('{PRE}country tfct', 'tfct.tfc_id = tfcop.tfcom_country_ref');
			}
			
			if($type_id == 2){
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tfu.tfu_id');
				$this->db->join('{PRE}company tfcop', 'tfcop.tfcom_user_ref = tfu.tfu_id');
				$this->db->join('{PRE}country tfct', 'tfct.tfc_id = tfcop.tfcom_country_ref');
			}
						
			if($type_id == 3){
				$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tfu.tfu_id');
				$this->db->join('{PRE}company tfcop', 'tfcop.tfcom_user_ref = tfu.tfu_id');
				$this->db->join('{PRE}country tfct', 'tfct.tfc_id = tfcop.tfcom_country_ref');
			}
						
			$query = $this->db->get();
			
			return $result = $query->result();	
		}
		
		public function get_all_projects_public($admin_approval = 0){
			
			$data = array();
						
			$this->db->select('tpp.*, tcom.*, tfb.*, tc.*, tcu.*, tca.ID as cat_id, tca.cName as cat_name, tct.ID as cont_id, tct.cName as cont_name');
			$this->db->from('{PRE}project_posts tpp');
			$this->db->join('{PRE}company tcom', 'tcom.tfcom_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}industry_categories tca', 'tca.ID = tpp.mainCategoryId', 'left');
			$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tpp.userID', 'left');
			$this->db->join('{PRE}contracts tct', 'tct.ID = tpp.contractID', 'left');
			$this->db->join('{PRE}country tc', 'tc.tfc_id = tpp.countryID', 'left');
			$this->db->join('{PRE}currency tcu', 'tcu.tfcu_id = tpp.currency_ref', 'left');
						
			$where = "tpp.row_deleted = '0' AND tpp.isDraft = '0' AND tpp.admin_approval = '".$admin_approval."'";
			
			$this->db->where($where);
			
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_project_by_id($id, $data)
		{
			$where = "ID = '$id'";
			$this->db->where($where);
			$this->db->update('{PRE}project_posts', $data); 

			return true;
		}
		
		public function activate($tfu_id)
		{ 
			$this->db->query("UPDATE tf_user SET tfu_admin_blocked = '0' WHERE tfu_id = '$tfu_id'");
			
			return true;
		}
		
		public function deactivate($tfu_id)
		{
			$this->db->query("UPDATE tf_user SET tfu_admin_blocked = '1' WHERE tfu_id = '$tfu_id'");
			
			return true;
		}
		
		public function get_industry_by_id(){
			
			$this->db->select('*');
			$this->db->from('{PRE}industry_categories');
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_sectors_by_id($id){
			
			$this->db->select('*');
			$this->db->from('{PRE}sectors');
			$where = "ID = '$id'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function add_skill($data){
			
			$this->db->insert('{PRE}sectors',$data);
			$id = $this->db->insert_id();
			
			return $id;
		}
		
		public function get_sectors(){
			
			$this->db->select('sk.*, cate.*, sk.row_deleted as sector_row, sk.ID as sector_id, cate.ID as cat_id');
			$this->db->from('{PRE}sectors sk');
			$this->db->join('{PRE}industry_categories cate', 'sk.industry_ref = cate.ID');
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_skill($id, $data)
		{
			$where = "ID = '$id'";
			$this->db->where($where);
			$this->db->update('{PRE}sectors', $data); 

			return $result = $this->get_sectors_by_id($id);
		}
		
		public function add_category($data){
			
			$this->db->insert('{PRE}industry_categories',$data);
			$id=$this->db->insert_id();
			
			return $id;
		}
		
		public function get_categories(){
			
			$this->db->select('*');
			$this->db->from('{PRE}industry_categories');
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_categories_by_id($id){
			
			$this->db->select('*');
			$this->db->from('{PRE}industry_categories');
			$where = "ID = '$id'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_category($id, $data){
			
			$where = "ID = '$id'";
			$this->db->where($where);
			$this->db->update('{PRE}industry_categories', $data); 

			return $result = $this->get_categories_by_id($id);
		}
		
		public function add_contract($data){
			
			$this->db->insert('{PRE}contracts',$data);
			$id=$this->db->insert_id();
			return $id;
		}
		
		public function get_contract(){
			
			$this->db->select('*');
			$this->db->from('{PRE}contracts');
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_contracts_by_id($id){
			
			$this->db->select('*');
			$this->db->from('{PRE}contracts');
			$where = "ID = '$id'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function update_contract($id, $data){
			
			$where = "ID = '$id'";
			$this->db->where($where);
			$this->db->update('{PRE}contracts', $data); 

			return $result = $this->get_contracts_by_id($id);
		}
		
		public function add_gallery($data){
			
			$this->db->insert('{PRE}project_gallery',$data);
			$id = $this->db->select('tfpg_id')->order_by('tfpg_id','desc')->limit(1)->get('{PRE}project_gallery')->row('tfpg_id');
			
			return $id;
		}
		
		public function update_gallery($id, $data){
			
			$where = "tfpg_id = '$id'";
			$this->db->where($where);
			$this->db->update('{PRE}project_gallery', $data); 
		}
		
		public function get_gallery(){
			
			$this->db->select('*');
			$this->db->from('{PRE}project_gallery');
			$query = $this->db->get();
			
			return $result = $query->result();
		}
		
		public function get_gallery_by_id($id){
			
			$this->db->select('*');
			$this->db->from('{PRE}project_gallery');
			$where = "tfpg_id = '$id'";
			$this->db->where($where);
			$query = $this->db->get();
			
			return $result = $query->result();
		}
			
		public function get_user_product_by_id($row_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_products');
			$where = "tfup_id = '".$row_id."'";
			$this->db->where($where);
			
			$query = $this->db->get();
			return $result = $query->result();
		}
		
		public function get_user_all_product($admin_approval = 0){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_products');
			$where = "tfup_admin_approval = '".$admin_approval."'";
			$this->db->where($where);
			$query = $this->db->get();
			$presult = $query->result();
			
			$pdata = array();
			
			if(!empty($presult) && is_array($presult) && sizeof($presult) > 0){
				$pdata['category_type'][] = 0;
				$pdata['products'][] = $presult;	
			}
						
			return $pdata;
		}
		
		public function get_user_product_admin_by_id($prod_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_products');
			$where = "tfup_id = '".$prod_id."'";
			$this->db->where($where);
			$query = $this->db->get();
			$presult = $query->result();
			
			$pdata = array();
			
			if(!empty($presult) && is_array($presult) && sizeof($presult) > 0){
				
				foreach($presult as $prow){
					
					$this->db->from('{PRE}user_products');
					$query = $this->db->get();
					$result = $query->result();
					
					$pdata['category_type'][] = 0;
					$pdata['products'][] = $result;
				}				
			}	
			
			return $pdata;
		}
				
		public function get_user_all_service($admin_approval = 0){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_services');
			$where = "tfus_admin_approval = '".$admin_approval."'";
			$this->db->where($where);
			$query = $this->db->get();
			$sresult = $query->result();
			
			$sdata = array();
			
			if(!empty($sresult) && is_array($sresult) && sizeof($sresult) > 0){
				
				$sdata['category_type'][] = 0;
				$sdata['services'][] = $sresult;				
			}	
			
			return $sdata;
		}
		
		public function update_user_product_by_id($row_id, $data_add){
			
			$where = "tfup_id = '".$row_id."'";
			$this->db->where($where);
			$this->db->update('{PRE}user_products', $data_add);
			
			return $this->get_user_product_by_id($row_id);
		}
		
		public function update_user_product_by_category_ref($category_ref, $data_add){
			
			$where = "tfup_category_ref = '".$category_ref."'";
			$this->db->where($where);
			$this->db->update('{PRE}user_products', $data_add);
		}
		
		public function get_user_service_by_id($row_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_services');
			$where = "tfus_id = '".$row_id."'";
			$this->db->where($where);
			
			$query = $this->db->get();
			return $result = $query->result();
		}
		
		public function get_service_user_info_by_id($row_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_services');
			$where = "tfus_id = '".$row_id."'";
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
			
			if(!empty($result) && is_array($result) && sizeof($result) > 0){
				
				if($result[0]->tfus_user_type_ref == 1 || $result[0]->tfus_user_type_ref == 2 || $result[0]->tfus_user_type_ref == 3){
					
					return $this->get_user_profile_by_id($result[0]->tfus_user_ref);
				}
			}	
		}
		
		public function get_product_user_info_by_id($row_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_products');
			$where = "tfup_id = '".$row_id."'";
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
			
			if(!empty($result) && is_array($result) && sizeof($result) > 0){
				
				if($result[0]->tfup_user_type_ref == 1 || $result[0]->tfup_user_type_ref == 2 || $result[0]->tfup_user_type_ref == 3){
					
					return $this->get_user_profile_by_id($result[0]->tfup_user_ref);
				}
			}	
		}
		
		public function get_category_user_info_by_id($row_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_categories_temp');
			$where = "tfuct_id = '".$row_id."'";
			$this->db->where($where);
			
			$query = $this->db->get();
			$result = $query->result();
			
			if(!empty($result) && is_array($result) && sizeof($result) > 0){
				
				if($result[0]->tfuct_user_type_ref == 1 || $result[0]->tfuct_user_type_ref == 2 || $result[0]->tfuct_user_type_ref == 3){
					
					return $this->get_user_profile_by_id($result[0]->tfuct_user_ref);
				}
			}	
		}
				
		public function update_user_service_by_id($row_id, $data_add){
			
			$where = "tfus_id = '".$row_id."'";
			$this->db->where($where);
			$this->db->update('{PRE}user_services', $data_add);
			
			return $this->get_user_service_by_id($row_id);
		}
				
		public function update_user_service_by_category_ref($category_ref, $data_add){
			
			$where = "tfus_category_ref = '".$category_ref."'";
			$this->db->where($where);
			$this->db->update('{PRE}user_services', $data_add);
		}
		
		public function get_user_category_temp_row_deleted_by_id($row_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_categories_temp');
			$where = "tfuct_id = '".$row_id."' AND row_deleted = 0";
			$this->db->where($where);
			
			$query = $this->db->get();
			return $result = $query->result();
		}
				
		public function get_user_category_temp_by_id($row_id){
			
			$this->db->select('*');
			$this->db->from('{PRE}user_categories_temp');
			$where = "tfuct_id = '".$row_id."'";
			$this->db->where($where);
			
			$query = $this->db->get();
			return $result = $query->result();
		}
		
		public function update_user_category_temp_by_id($row_id, $data_add){
			
			$where = "tfuct_id = '".$row_id."'";
			$this->db->where($where);
			$this->db->update('{PRE}user_categories_temp', $data_add);
			
			return $this->get_user_category_temp_by_id($row_id);
		}
		
		public function get_all_user_categories($admin_approval = 0){
			
			$data = array();
						
			$this->db->select('*');
			$this->db->from('{PRE}user_categories');
			$where = "(tfuc_user_type_ref = '1' OR tfuc_user_type_ref = '0' OR tfuc_user_type_ref = '-1') AND tfuc_admin_approval = '".$admin_approval."'";
			$this->db->where($where);
			
			$query = $this->db->get();
			return $result = $query->result();
			
		}
	}