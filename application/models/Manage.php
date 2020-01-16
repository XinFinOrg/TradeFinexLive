<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Manage extends CI_Model {

        public function __construct()
        {
             parent::__construct();
			 $this->load->database();
	    }

		public function get_project_gallery(){

			$this->db->select('*');
			$this->db->from('{PRE}project_gallery');
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function get_api_info(){

			$this->db->select('*');
			$this->db->from('{PRE}api_access_code');
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function get_superadmin(){

			$this->db->select('*');
			$this->db->from('{PRE}admin');
			$where = "tfa_utype = '-1'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function get_user_login_by_username($usern){

			$this->db->select('*');
			$this->db->from('{PRE}user');
			$where = "tfu_usern = '$usern'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function verify_user($email, $hash, $data_add){

			$this->db->select('*');
			$this->db->from('{PRE}user');
			$where = "tfu_hash = '$hash'";
			$this->db->where($where);
			$query = $this->db->get();

			$result = $query->result();
// echo("<br>LLL".json_encode($result));
				if(!empty($result) && is_array($result) && sizeof($result) <> 0){
					foreach($result as $row){
					$type_id = $row->tfu_utype;
					// echo ("MMM".$type_id);
					$this->db->select('*');
					$this->db->from('{PRE}user tfu');

					if($type_id == 1){
						$this->db->join('{PRE}service_provider tfsp', 'tfsp.tfsp_user_ref = tfu.tfu_id');
						// $where = "tfsp.tfsp_email = '$email'";
					}

					if($type_id == 2){
						$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tfu.tfu_id');
						// $where = "tff.tff_email = '$email'";
					}

					if($type_id == 3){
						$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tfu.tfu_id');
						// $where = "tfb.tfb_email = '$email'";
						// echo ("jjjjj".$email."<br>");
					}

					$where = "tfu.tfu_usern = '$email' AND tfu_domain_type = '".$data_add['user_access_domain_type']."' AND tfu_domain_name = '".$data_add['user_access_domain_name']."'";

					$this->db->where($where);
					$query = $this->db->get();
					$result1 = $query->result();	
		
					return json_encode($result);
					
						
				}
				}else{

					return false;
				}
			
		}

		public function update_profile_by_id($id, $data){

			$datan = array();

			$datan['cau_userid'] = $data['cau_userid'];
			$datan['cau_passwd'] = $data['cau_passwd'];

			$where = "cau_id = '$id'";
			$this->db->where($where);
			$this->db->update('{PRE}user', $datan);

			$datan = array();

			$datan['cadi_fname'] = $data['cadi_fname'];
			$datan['cadi_lname'] = $data['cadi_lname'];
			$datan['cadi_email'] = $data['cadi_email'];
			$datan['cadi_email_passwd'] = $data['cadi_email_passwd'];

			$where = "cadi_user_ref = '$id'";
			$this->db->where($where);
			$this->db->update('{PRE}admin_info', $datan);

			return $result = $this->get_profile();
		}

		public function update_base_user_info_by_id($id, $data){
$data1 = [
            'tfu_passwd' => $data,
        ];
			$where = "tfu_id = '$id'";
			$this->db->where($where);
			$res = $this->db->update('{PRE}user', $data1);
			return $res;
		}

		public function update_user_info_by_id_type($uid, $type, $data){

			if($type == 1){
				$where = "tfsp_user_ref = '$uid'";
				$this->db->where($where);
				$this->db->update('{PRE}service_provider', $data);
			}

			if($type == 2){
				$where = "tff_user_ref = '$uid'";
				$this->db->where($where);
				$this->db->update('{PRE}financier', $data);
			}
		}

		public function get_user_info_by_id_and_type($id, $type_id){

			$this->db->select('*');
			$this->db->from('{PRE}company');
			$where = "tfcom_user_ref = '".$id."'";
			$this->db->where($where);
			$query = $this->db->get();

			$ucresult = $query->result();

			if(!empty($ucresult) && is_array($ucresult) && sizeof($ucresult) <> 0){

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

				$this->db->join('{PRE}company tfc', 'tfc.tfcom_user_ref = tfu.tfu_id');
				$this->db->join('{PRE}country tfcoun', 'tfcoun.tfc_id = tfc.tfcom_country_ref');
				$this->db->join('{PRE}industry_categories tfcat', 'tfcat.ID = tfc.tfcom_cat_ref');

				$where = "tfu.tfu_id = '$id'";
				$this->db->where($where);
				$query = $this->db->get();

				return $result = $query->result();

			}else{

				return $this->get_user_base_info_by_id_and_type($id, $type_id);
			}
		}

		public function get_membership_fee($user_ref){

			$this->db->select('*');
			$this->db->from('{PRE}membership');
			$where = "tfu_user_ref = '$user_ref'";
			$this->db->where($where);
			$query = $this->db->get();

			$result = $query->result();

			return $result;
		}

		public function update_membership_status_by_id($user_id){

			$data_add['tfu_membership_status'] = 1;

			$where = "tfu_id = '$user_id'";
			$this->db->where($where);
			$this->db->update('{PRE}user', $data_add);

			$result = $this->db->affected_rows();

			return $result;

		}

		public function get_user_base_info_by_id_and_type($id, $type_id){

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

		public function get_user_info_by_id($id){

			$this->db->select('*');
			$this->db->from('{PRE}user');

			$where = "tfu_id = '$id'";
			$this->db->where($where);
			$query = $this->db->get();

			$result = $query->result();

			if(!empty($result) && is_array($result) && sizeof($result) <> 0){

				return $this->get_user_info_by_id_and_type($result[0]->tfu_id, $result[0]->tfu_utype);
			}
		}

		public function get_user_info_by_username($email, $data_add){

			$this->db->select('*');
			$this->db->from('{PRE}user');

			$where = "tfu_usern = '$email' AND tfu_domain_type = '".$data_add['user_access_domain_type']."' AND tfu_domain_name = '".$data_add['user_access_domain_name']."'";
			$this->db->where($where);
			$query = $this->db->get();

			$result = $query->result();

			if(!empty($result) && is_array($result) && sizeof($result) <> 0){

				return $this->get_user_info_by_id_and_type($result[0]->tfu_id, $result[0]->tfu_utype);
			}
		}

		public function update_user_by_mail($uemail, $data_add){

			$this->db->select('*');
			$this->db->from('{PRE}user');

			$where = "tfu_usern = '$uemail'"; // AND tfu_active = 1
			$this->db->where($where);
			$query = $this->db->get();

			$result = $query->result();

			if(!empty($result) && is_array($result) && sizeof($result) <> 0){

				$where = "tfu_usern = '$uemail'";
				$this->db->where($where);
				$this->db->update('{PRE}user', $data_add);

				return $this->get_user_info_by_id_and_type($result[0]->tfu_id, $result[0]->tfu_utype);

			}else{
				return false;
			}
		}

		public function get_all_user_info(){

			$uresult = array();

			$this->db->select('*');
			$this->db->from('{PRE}user');
			$query = $this->db->get();

			$result = $query->result();

			if(!empty($result) && is_array($result) && sizeof($result) <> 0){

				foreach($result as $row){

					$resulta = $this->get_user_info_by_id_and_type($row->tfu_id, $row->tfu_utype);

					if(!empty($resulta) && is_array($resulta) && sizeof($resulta) <> 0){
						array_push($uresult, $resulta);
					}
				}
			}

			return $uresult;
		}

		public function get_user_info_by_id_term($id, $term){

			$this->db->select('*');
			$this->db->from('{PRE}user');

			$where = "tfu_id = '$id'";
			$this->db->where($where);

			$query = $this->db->get();

			$result = $query->result();

			if(!empty($result) && is_array($result) && sizeof($result) <> 0){

				return $this->get_user_info_by_id_and_type_term($result[0]->tfu_id, $result[0]->tfu_utype, $term);
			}
		}

		public function get_user_info_by_id_and_type_term($id, $type_id, $term){

			$this->db->select('*');
			$this->db->from('{PRE}user tfu');

			if($type_id == 1){
				$this->db->join('{PRE}service_provider tfsp', 'tfsp.tfsp_user_ref = tfu.tfu_id');
				$this->db->like('tfsp.tfsp_fname', $term);
				$this->db->or_like('tfsp.tfsp_lname', $term);
			}

			if($type_id == 2){
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tfu.tfu_id');
				$this->db->like('tff.tff_fname', $term);
				$this->db->or_like('tff.tff_lname', $term);
			}

			if($type_id == 3){
				$this->db->join('{PRE}beneficiary tfb', 'tfb.tfb_user_ref = tfu.tfu_id');
				$this->db->like('tfb.tfb_fname', $term);
				$this->db->or_like('tfb.tfb_lname', $term);
			}

			$where = "tfu.tfu_id = '$id'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function get_financier_provider_info($type){

			$uresult = array();
			$result = array();

			if($type == 0 || $type == 1){
				$this->db->select('*');
				$this->db->from('{PRE}user tfu');
				$this->db->join('{PRE}company com', 'com.tfcom_user_ref = tfu.tfu_id');
				$this->db->join('{PRE}industry_categories cat', 'cat.ID = com.tfcom_cat_ref');
				$this->db->join('{PRE}country coun', 'coun.tfc_id = com.tfcom_country_ref');
				$this->db->join('{PRE}service_provider tfsp', 'tfsp.tfsp_user_ref = tfu.tfu_id');

				$where = "tfsp.tfsp_public_visibility = 1";
				$this->db->where($where);

				$query = $this->db->get();

				$result = $query->result();

			}

			array_push($uresult, $result);

			$result = array();

			if($type == 0 || $type == 2){

				$this->db->select('*');
				$this->db->from('{PRE}user tfu');
				$this->db->join('{PRE}company com', 'com.tfcom_user_ref = tfu.tfu_id');
				$this->db->join('{PRE}industry_categories cat', 'cat.ID = com.tfcom_cat_ref');
				$this->db->join('{PRE}country coun', 'coun.tfc_id = com.tfcom_country_ref');
				$this->db->join('{PRE}financier tff', 'tff.tff_user_ref = tfu.tfu_id');

				$where = "tff.tff_public_visibility = 1";
				$this->db->where($where);

				$query = $this->db->get();

				$result = $query->result();
			}

			array_push($uresult, $result);

			return $uresult;
		}

		public function update_profile_details_by_id_type($id, $type_id, $data_add){

			if($type_id == 1){
				$where = "tfsp_user_ref = '$id'";
				$this->db->where($where);
				$this->db->update('{PRE}service_provider', $data_add);
			}

			if($type_id == 2){
				$where = "tff_user_ref = '$id'";
				$this->db->where($where);
				$this->db->update('{PRE}financier', $data_add);
			}

			if($type_id == 3){
				$where = "tfb_user_ref = '$id'";
				$this->db->where($where);
				$this->db->update('{PRE}beneficiary', $data_add);
			}

			return $result = $this->get_user_info_by_id_and_type($id, $type_id);
		}

		public function check_subscription($email){

			$this->db->select('*');
			$this->db->from('{PRE}subscription');
			$where = "tfs_email = '$email'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function add_subscription($data_add){

			$data = array(); $result = array();
			$data['tfs_email'] = $data_add['semail'];

			$result = $this->check_subscription($data_add['semail']);

			if(is_array($result) && !empty($result)){

				$data = array();
				$data['tfs_email'] = $data_add['semail'];
				$data['tfs_active'] = 1;

				$this->update_subscription($data);

			}else{

				$this->db->insert('{PRE}subscription', $data);
			}
		}

		public function update_subscription($data_add){

			$data = array();

			$where = "tfs_email = '".$data_add['tfs_email']."'";
			$this->db->where($where);

			$this->db->update('{PRE}subscription', $data_add);
		}

		public function add_user($data_add, $type){

			$data = array();
			$data['tfu_usern'] = $data_add['usern'];
			$data['tfu_passwd'] = $data_add['upasswd'];
			$data['tfu_utype'] = $type;
			$data['tfu_hash'] = $data_add['hash'];
			$data['tfu_domain_type'] = $data_add['user_access_domain_type'];
			$data['tfu_domain_name'] = $data_add['user_access_domain_name'];

			// $data['tfu_active'] = 1;

			$this->db->select('*');
			$this->db->from('{PRE}user');
			$where = "tfu_usern = '".$data_add['usern']."' AND tfu_domain_type = '".$data_add['user_access_domain_type']."' AND tfu_domain_name = '".$data_add['user_access_domain_name']."'";
			$this->db->where($where);
			$query = $this->db->get();

			$uresult = $query->result();

			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){

				return false;

			}else{

				$this->db->insert('{PRE}user', $data);
				$id = $this->db->insert_id();

				$data = array();

				if($type == 1){

					$data['tfsp_fname'] = $data_add['ufname'];
					$data['tfsp_lname'] = $data_add['ulname'];
					$data['tfsp_email'] = $data_add['uemail'];
					$data['tfsp_user_ref'] = $id;

					$this->db->insert('{PRE}service_provider', $data);
				}

				if($type == 2){

					$data['tff_fname'] = $data_add['ufname'];
					$data['tff_lname'] = $data_add['ulname'];
					$data['tff_email'] = $data_add['uemail'];
					$data['tff_user_ref'] = $id;

					$this->db->insert('{PRE}financier', $data);
				}

				if($type == 3){

					$data['tfb_fname'] = $data_add['ufname'];
					$data['tfb_lname'] = $data_add['ulname'];
					$data['tfb_email'] = $data_add['uemail'];
					$data['tfb_user_ref'] = $id;

					$this->db->insert('{PRE}beneficiary', $data);
				}

				return $result = $this->get_user_info_by_id_and_type($id, $type);
			}
		}

		public function update_user_base_info_by_id_and_type($id, $type_id, $data_add){

			$this->db->select('*');
			$this->db->from('{PRE}user');
			$where = "tfu_xdc_walletID = '".$data_add['tfu_xdc_walletID']."'";
			$this->db->where($where);
			$query = $this->db->get();

			$uresult = $query->result();

			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){

				return false;

			}else{

				$where = "tfu_id = '$id' AND tfu_utype = '$type_id'";
				$this->db->where($where);
				$this->db->update('{PRE}user', $data_add);

				return $result = $this->get_user_info_by_id_and_type($id, $type_id);

			}
		}

		public function update_user_base_info_all_by_id_and_type($id, $type_id, $data_add){

			$where = "tfu_id = '$id' AND tfu_utype = '$type_id'";
			$this->db->where($where);
			$this->db->update('{PRE}user', $data_add);

			return $result = $this->get_user_info_by_id_and_type($id, $type_id);
		}

		public function update_user_info_by_id_and_type($id, $type_id, $data_add){

			$datan = array();
			$datan['tfu_usern'] = $data_add['uname'];
			$datan['tfu_passwd'] = $data_add['upass'];
			// $datan['tfu_bank_acc_number'] = $data_add['ubanknum'];
			// $datan['tfu_bank_acc_name'] = $data_add['ubankname'];
			$datan['tfu_linkedin'] = $data_add['ulinkedin'];
			$datan['tfu_designation'] = $data_add['udesignation'];

			$where = "tfu_id = '$id' AND tfu_utype = '$type_id'";
			$this->db->where($where);
			$this->db->update('{PRE}user', $datan);

			$data = array();

			if($type_id == 1){

				$data['tfsp_fname'] = $data_add['ufname'];
				$data['tfsp_lname'] = $data_add['ulname'];
				$data['tfsp_email'] = $data_add['uemail'];
				$data['tfsp_address'] = $data_add['uaddress'];
				$data['tfsp_contact'] = $data_add['ucontact'];

				$where = "tfsp_user_ref = '$id'";
				$this->db->where($where);
				$this->db->update('{PRE}service_provider', $data);
			}

			if($type_id == 2){

				$data['tff_fname'] = $data_add['ufname'];
				$data['tff_lname'] = $data_add['ulname'];
				$data['tff_email'] = $data_add['uemail'];
				$data['tff_address'] = $data_add['uaddress'];
				$data['tff_contact'] = $data_add['ucontact'];

				$where = "tff_user_ref = '$id'";
				$this->db->where($where);
				$this->db->update('{PRE}financier', $data);
			}

			if($type_id == 3){

				$data['tfb_fname'] = $data_add['ufname'];
				$data['tfb_lname'] = $data_add['ulname'];
				$data['tfb_email'] = $data_add['uemail'];
				$data['tfb_address'] = $data_add['uaddress'];
				$data['tfb_contact'] = $data_add['ucontact'];

				$where = "tfb_user_ref = '$id'";
				$this->db->where($where);
				$this->db->update('{PRE}beneficiary', $data);
			}

			return $result = $this->get_user_info_by_id_and_type($id, $type_id);
		}

		public function fetch_user($data){

			$result = array();

			$result['error'] = 0;

			$this->db->select('*');
			$this->db->from('{PRE}user');
			$where = "tfu_usern = '".$data['user_name']."' AND tfu_passwd = '".$data['user_password']."' AND tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu_domain_name = '".$data['user_access_domain_name']."' AND tfu_active = 1";
			$this->db->where($where);
			$query = $this->db->get();

			$uresult = $query->result();

			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){

				$this->db->select('*');
				$this->db->from('{PRE}company');
				$where = "tfcom_user_ref = '".$uresult[0]->tfu_id."'";
				$this->db->where($where);
				$query = $this->db->get();

				$ucresult = $query->result();

				if(!empty($ucresult) && is_array($ucresult) && sizeof($ucresult) <> 0){

					if($ucresult[0]->tfcom_cat_ref == 0 || $ucresult[0]->tfcom_country_ref == 0){
						$udetail = $this->get_user_base_info_by_id_and_type($uresult[0]->tfu_id, $uresult[0]->tfu_utype);
					}
					else{
						$udetail = $this->get_user_info_by_id_and_type($uresult[0]->tfu_id, $uresult[0]->tfu_utype);
					}

					$result['user_detail'] = $udetail[0];
				}
				else
				{
					$udetail = $this->get_user_base_info_by_id_and_type($uresult[0]->tfu_id, $uresult[0]->tfu_utype);
					$result['user_detail'] = $udetail[0];
				}

				$datan = array();

				$datan['tfu_current_logged'] = 1;
				$this->db->set('tfu_logged', 'NOW()', FALSE);

				$where = "tfu_usern = '".$data['user_name']."' AND tfu_passwd = '".$data['user_password']."' AND tfu_domain_type = '".$data['user_access_domain_type']."' AND tfu_domain_name = '".$data['user_access_domain_name']."' AND tfu_active = 1";
				$this->db->where($where);
				$this->db->update('{PRE}user', $datan);

			}else{
				$result['error'] = 1;
			}

			return $result;
		}

		public function update_user_log($uid, $uref){

			$datan = array();

			$datan['tfu_current_logged'] = 1;
			$this->db->set('tfu_logged', 'NOW()', FALSE);

			$where = "tfu_id = '".$uid."' AND tfu_utype = '".$uref."' AND tfu_active = 1";
			$this->db->where($where);
			$this->db->update('{PRE}user', $datan);
		}

		public function update_logged_user(){

			$datan = array();

			$datan['tfu_current_logged'] = 0;
			$this->db->set('tfu_logged', 'NOW()', FALSE);
			$where = "tfu_current_logged = 1";
			$this->db->where($where);
			$this->db->update('{PRE}user', $datan);

			return true;
		}

		public function update_logout_user($uid, $utype){

			$datan = array();

			$datan['tfu_current_logged'] = 0;
			$this->db->set('tfu_logged', 'NOW()', FALSE);
			$where = "tfu_id = '".$uid."' AND tfu_utype = '".$utype."'";
			$this->db->where($where);
			$this->db->update('{PRE}user', $datan);

			return true;
		}

		public function add_project_viewer($proj_id){

			$this->db->select('view_counts');
			$this->db->from('{PRE}project_posts');
			$where = "ID = '".$proj_id."' AND isDraft = 0 AND row_deleted = 0";
			$this->db->where($where);
			$query = $this->db->get();

			$presult = $query->result();

			if(!empty($presult) && is_array($presult) && sizeof($presult) > 0){

				$count = $presult[0]->view_counts;
				$count++;

				$data_add = array();
				$data_add['view_counts'] = $count;

				$where = "ID = '$proj_id'";
				$this->db->where($where);
				$this->db->update('{PRE}project_posts', $data_add);
			}

			$this->db->select('view_counts');
			$this->db->from('{PRE}project_posts');
			$where = "ID = '".$proj_id."' AND (isDraft = 1 OR row_deleted = 1)";
			$this->db->where($where);
			$query = $this->db->get();

			$pdresult = $query->result();

			if(!empty($pdresult) && is_array($pdresult) && sizeof($pdresult) > 0){

				$data_add = array();
				$data_add['view_counts'] = 0;

				$where = "ID = '$proj_id'";
				$this->db->where($where);
				$this->db->update('{PRE}project_posts', $data_add);
			}
		}

		public function get_contractor_info_by_id($con_id)
		{
			$this->db->select('*');
			$this->db->from('{PRE}subcontract_supplier');
			$where = "tfss_id = '$con_id'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function add_sub_contractor_info($data_add){

			$this->db->insert('{PRE}subcontract_supplier', $data_add);
			$id = $this->db->insert_id();

			return $result = $this->get_contractor_info_by_id($id);
		}

		public function add_company_info($data_add){

			$this->db->query('SET FOREIGN_KEY_CHECKS = 0');
			$this->db->insert('{PRE}company', $data_add);
			$id = $this->db->insert_id();

			return $result = $this->get_company_info_by_id($id);
		}

		public function update_company_info($uid, $data_add){

			$where = "tfcom_user_ref = '$uid'";
			$this->db->where($where);
			$this->db->query('SET FOREIGN_KEY_CHECKS = 0');
			$this->db->update('{PRE}company', $data_add);

			return $result = $this->get_company_info_by_uid($uid);
		}

		public function get_company_info_by_uid($uid){

			$this->db->select('*');
			$this->db->from('{PRE}company');
			$where = "tfcom_user_ref = '$uid'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function get_company_info_by_id($id){

			$this->db->select('*');
			$this->db->from('{PRE}company');
			$where = "tfcom_id = '$id'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function delete_company($rowid)
		{
			$this->db->where('cacoi_id', $rowid);
			$this->db->delete('{PRE}company_info');

			$this->db->select('*');
			$this->db->from('{PRE}admin_info');
			$where = "cadi_company_ref = '$rowid'";
			$this->db->where($where);
			$query = $this->db->get();

			$caresult = $query->result();

			if(!empty($caresult) && is_array($caresult) && sizeof($caresult) > 0){
				foreach($caresult as $carow){

					$this->delete_admin($carow->cadi_user_ref);
				}
			}
		}

		public function get_invite_user_info($data){

			$data_add = array();
			$this->db->select('*');
			$this->db->from('{PRE}project_invites');
			$where = "tfpi_user_ref = '".$data['tfpi_user_ref']."' AND tfpi_project_ref = '".$data['tfpi_project_ref']."'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function get_invite_user_status($uid, $projid){

			$data_add = array();
			$this->db->select('tfpi_invite');
			$this->db->from('{PRE}project_invites');
			$where = "tfpi_user_ref = '".$uid."' AND tfpi_project_ref = '".$projid."'";
			$this->db->where($where);
			$query = $this->db->get();

			$result = $query->result();

			if(!empty($result) && is_array($result) && sizeof($result) > 0){

				return $result[0]->tfpi_invite;
			}else{
				return false;
			}
		}

		public function get_accepted_user_status($uid, $projid){

			$data_add = array();
			$this->db->select('tfpi_accept');
			$this->db->from('{PRE}project_invites');
			$where = "tfpi_user_ref = '".$uid."' AND tfpi_project_ref = '".$projid."'";
			$this->db->where($where);
			$query = $this->db->get();

			$result = $query->result();

			if(!empty($result) && is_array($result) && sizeof($result) > 0){

				return $result[0]->tfpi_accept;
			}else{
				return false;
			}
		}

		public function update_invite_user($flag, $read, $data){

			$data_add = array();
			$data_add['tfpi_invite'] = $flag;
			$data_add['tfpi_read'] = $read;
			$where = "tfpi_user_ref = '".$data['tfpi_user_ref']."' AND tfpi_project_ref = '".$data['tfpi_project_ref']."'";
			$this->db->where($where);
			$this->db->update('{PRE}project_invites', $data_add);

			return  $this->get_invite_user_info($data);
		}

		public function add_invite_user($data){

			$this->db->select('*');
			$this->db->from('{PRE}project_invites');
			$where = "tfpi_user_ref = '".$data['tfpi_user_ref']."' AND tfpi_project_ref = '".$data['tfpi_project_ref']."'";
			$this->db->where($where);
			$query = $this->db->get();

			$iresult = $query->result();

			if(!empty($iresult) && is_array($iresult) && sizeof($iresult) > 0){

				return $this->update_invite_user(1, 0, $data);

			}else{

				$this->db->insert('{PRE}project_invites', $data);
				return $id = $this->db->insert_id();
			}
		}

		public function update_notification_setting($user_id, $user_type_ref, $data_add){

			if($user_type_ref == 1){
				$where = "tfsp_user_ref = '".$user_id."'";
				$this->db->where($where);
				$this->db->update('{PRE}service_provider', $data_add);
			}

			if($user_type_ref == 2){
				$where = "tff_user_ref = '".$user_id."'";
				$this->db->where($where);
				$this->db->update('{PRE}financier', $data_add);
			}

			if($user_type_ref == 3){
				$where = "tfb_user_ref = '".$user_id."'";
				$this->db->where($where);
				$this->db->update('{PRE}beneficiary', $data_add);
			}
		}

		public function update_visibility_setting($user_id, $user_type_ref, $data_add){

			if($user_type_ref == 1){
				$where = "tfsp_user_ref = '".$user_id."'";
				$this->db->where($where);
				$this->db->update('{PRE}service_provider', $data_add);
			}

			if($user_type_ref == 2){
				$where = "tff_user_ref = '".$user_id."'";
				$this->db->where($where);
				$this->db->update('{PRE}financier', $data_add);
			}

			if($user_type_ref == 3){
				$where = "tfb_user_ref = '".$user_id."'";
				$this->db->where($where);
				$this->db->update('{PRE}beneficiary', $data_add);
			}
		}

		public function get_notification_setting($user_id, $user_type_ref){

			$result = array();

			if($user_type_ref == 1){
				$this->db->select('*');
				$this->db->from('{PRE}service_provider');
				$where = "tfsp_user_ref = '".$user_id."'";
			}

			if($user_type_ref == 2){
				$this->db->select('*');
				$this->db->from('{PRE}financier');
				$where = "tff_user_ref = '".$user_id."'";
			}

			if($user_type_ref == 3){
				$this->db->select('*');
				$this->db->from('{PRE}beneficiary');
				$where = "tfb_user_ref = '".$user_id."'";
			}

			$this->db->where($where);
			$query = $this->db->get();
			return $result = $query->result();
		}

		public function get_blocked_product_by_name($productn){

			$this->db->select('*');
			$this->db->from('{PRE}user_products');
			$where = "LOWER(`tfup_name`) = '".strtolower($productn)."' AND tfup_admin_approval = 2";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function check_product_exist_by_name($productn, $uid, $utype){

			$this->db->select('*');
			$this->db->from('{PRE}user_products');
			$where = "LOWER(`tfup_name`) = '".strtolower($productn)."' AND tfup_user_ref = '".$uid."' AND tfup_user_type_ref = '".$utype."'";
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

		public function get_user_product_by_uid($uid){

			$this->db->select('*');
			$this->db->from('{PRE}user_products');
			$where = "tfup_user_ref = '".$uid."' AND row_deleted = 0";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function get_user_product_approved_by_uid($uid, $utype){

			$this->db->select('*');
			$this->db->from('{PRE}user_products');
			$where = "(tfup_user_ref = '".$uid."' AND tfup_user_type_ref = '".$utype."') AND tfup_admin_approval = 1 AND row_deleted = 0";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function get_user_product_public_by_uid($uid, $utype){

			$this->db->select('*');
			$this->db->from('{PRE}user_products');
			$where = "(tfup_user_ref = '".$uid."' AND tfup_user_type_ref = '".$utype."') AND tfup_admin_approval = 1 AND row_deleted = 0";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function get_user_product_public(){

			$this->db->select('*');
			$this->db->from('{PRE}user_products');
			$where = "row_deleted = 0";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function add_user_product($user_id, $user_type, $data_add){

			$this->db->select('*');
			$this->db->from('{PRE}user_products');
			$where = "LOWER('tfup_name') = '".strtolower($data_add['tfup_name'])."' AND tfup_user_ref = '".$user_id."' AND tfup_user_type_ref = '".$user_type."'";

			$this->db->where($where);
			$query = $this->db->get();

			$presult = $query->result();

			if(!empty($presult) && is_array($presult) && sizeof($presult) > 0){


			}else{

				$this->db->insert('{PRE}user_products', $data_add);
				$id = $this->db->insert_id();

				if($id > 0){
					return $this->get_user_product_by_id($id);
				}else{
					return false;
				}
			}
		}

		public function update_user_product_by_id($row_id, $data_add){

			$where = "tfup_id = '".$row_id."'";
			$this->db->where($where);
			$this->db->update('{PRE}user_products', $data_add);

			return $this->get_user_product_by_id($row_id);
		}

		public function get_user_service_by_uid($uid){

			$this->db->select('*');
			$this->db->from('{PRE}user_services');
			$where = "tfus_user_ref = '".$uid."' AND row_deleted = 0";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function get_user_service_approved_by_uid($uid, $utype){

			$this->db->select('*');
			$this->db->from('{PRE}user_services');
			$where = "(tfus_user_ref = '".$uid."' AND tfus_user_type_ref = '".$utype."') AND tfus_admin_approval = 1 AND row_deleted = 0";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function get_user_service_public_by_uid($uid, $utype){

			$this->db->select('*');
			$this->db->from('{PRE}user_services');
			$where = "(tfus_user_ref = '".$uid."' AND tfus_user_type_ref = '".$utype."') AND tfus_admin_approval = 1 AND row_deleted = 0";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function get_user_service_public(){

			$this->db->select('*');
			$this->db->from('{PRE}user_services');
			$where = "row_deleted = 0";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function get_blocked_service_by_name($servicen){

			$this->db->select('*');
			$this->db->from('{PRE}user_services');
			$where = "LOWER(`tfus_name`) = '".strtolower($servicen)."' AND tfus_admin_approval = 2";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function check_service_exist_by_name($servicen, $uid, $utype){

			$this->db->select('*');
			$this->db->from('{PRE}user_services');
			$where = "LOWER(`tfus_name`) = '".strtolower($servicen)."' AND tfus_user_ref = '".$uid."' AND tfus_user_type_ref = '".$utype."'";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function get_user_service_by_id($row_id){

			$this->db->select('*');
			$this->db->from('{PRE}user_services');
			$where = "tfus_id = '".$row_id."'";
			$this->db->where($where);

			$query = $this->db->get();
			return $result = $query->result();
		}

		public function update_user_service_by_id($row_id, $data_add){

			$where = "tfus_id = '".$row_id."'";
			$this->db->where($where);
			$this->db->update('{PRE}user_services', $data_add);

			return $this->get_user_service_by_id($row_id);
		}

		public function add_user_service($user_id, $user_type, $data_add){

			$this->db->select('*');
			$this->db->from('{PRE}user_services');
			$where = "LOWER('tfus_name') = '".strtolower($data_add['tfus_name'])."' AND tfus_user_ref = '".$user_id."' AND tfus_user_type_ref = '".$user_type."'";
			$this->db->where($where);
			$query = $this->db->get();

			$sresult = $query->result();

			if(!empty($sresult) && is_array($sresult) && sizeof($sresult) > 0){

				return $this->update_user_service_by_id($sresult[0]->tfus_id, $data_add);

			}else{

				$this->db->insert('{PRE}user_services', $data_add);
				$id = $this->db->insert_id();

				if($id > 0){
					return $this->get_user_service_by_id($id);
				}else{
					return false;
				}
			}
		}

		public function check_rotp($otpval){

			$this->db->select('*');
			$this->db->from('{PRE}register_otp');
			$where = "tfro_otp_val = '".$otpval."'"; //  AND tfro_row_deleted = '0'
			$this->db->where($where);
			$query = $this->db->get();

			// echo $this->db->last_query();
			return $query->result();
		}


		public function update_rotp($otpval, $userid){

			$data_add = array();

			$otp_results = $this->check_rotp($otpval);

			if(!empty($otp_results)){

				$uarr = explode(',', $otp_results[0]->tfro_uid);

				if(sizeof($uarr) < 3){
					$uadd_str = '';
					for($c = 0; $c < sizeof($uarr); $c++){

						if($c > 0){
							$uadd_str .= ',';
						}

						$uadd_str .= $uarr[$c];
					}

					if(sizeof($uarr) > 0 && $uarr[0] <> ''){
						$uadd_str .= ','.$userid;
					}else{
						$uadd_str .= $userid;
					}

					if(sizeof($uarr) <= 1){

						$data_add['tfro_uid'] = $uadd_str;

					}

					if(sizeof($uarr) == 2){

						$data_add['tfro_row_deleted'] = 1;
						$data_add['tfro_uid'] = $uadd_str;

					}
				}

				$where = "tfro_otp_val = '".$otpval."'";
				$this->db->where($where);
				$this->db->update('{PRE}register_otp', $data_add);
			}
		}

		public function add_instrument($data_add){

			$data = array();
			if(isset($data_add['name'])){
				$data['tfi_instrument'] = $data_add['instrument'];
				$data['tfi_name'] = $data_add['name'];
				$data['tfi_country'] = $data_add['country'];
				$data['tfi_currency'] = $data_add['currency_supported'];
				$data['tfi_amount'] = $data_add['amount'];
				$data['tfi_maturityDate'] = $data_add['maturity_date'];
				$data['tfi_docRef'] = $data_add['docRef'];
				$data['tfi_contractAddr'] = $data_add['contractAddr'];
				$data['tfi_deployerAddr'] = $data_add['deployerAddr'];
				$data['tfi_secretKey'] = $data_add['secretKey'];
			}
			else{
				$data['tfi_instrument'] = $data_add['instrument'];
				$data['tfi_country'] = $data_add['country'];
				$data['tfi_currency'] = $data_add['currency_supported'];
				$data['tfi_amount'] = $data_add['amount'];
				$data['tfi_maturityDate'] = $data_add['maturity_date'];
				$data['tfi_docRef'] = $data_add['docRef'];
				$data['tfi_contractAddr'] = $data_add['contractAddr'];
				$data['tfi_deployerAddr'] = $data_add['deployerAddr'];
				$data['tfi_secretKey'] = $data_add['secretKey'];
			}
			


			$this->db->insert('{PRE}instrument', $data);
			$id = $this->db->insert_id();

			$data = array();

		
			return 1;
			// }
		}
		
		public function get_instrument($date){

			$this->db->select('*');
			$this->db->from('{PRE}instrument')->where('tfi_maturityDate >=',$date)->order_by('tfi_createdAt', 'desc');
			$query = $this->db->get();

			return $result = $query->result();
		}
		public function get_buyersupplier($date){

			$this->db->select('*');
			$this->db->from('{PRE}funding')->where('tfbs_maturityDate >=',$date)->order_by('tfbs_createdAt', 'desc');
			$query = $this->db->get();

			return $result = $query->result();
		}
		public function get_secretkey($contractAddr){

			$this->db->select('*');
			$this->db->from('{PRE}instrument');
			$where = "tfi_contractAddr = '$contractAddr'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}
		public function get_secretkey_by_docRef($docRef){

			$this->db->select('*');
			$this->db->from('{PRE}instrument');
			$where = "tfi_docRef = '$docRef'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function get_contact_details($docRef){

			$this->db->select('*');
			$this->db->from('{PRE}funding');
			$where = "tfbs_docRef = '$docRef'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function get_paypal_payment($addr){

			$this->db->select('*');
			$this->db->from('{PRE}paypal_payment');
			$where = "tfpp_address = '$addr'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function get_paypal_paymentby_tx($tx){

			$this->db->select('*');
			$this->db->from('{PRE}paypal_payment_logs');
			$where = "tfpp_txn_id = '$tx'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->result();
		}

		public function add_paypal_details($data_add){

			$data = array();
			
			$data['tfpp_paddress'] = $data_add['cm'];
			$data['tfpp_inumber'] = $data_add['item_number'];
			$data['tfpp_txn_id'] = $data_add['tx'];
			$data['tfpp_amount'] = $data_add['amt'];
			$data['tfpp_currency_code'] = $data_add['cc'];
			$data['tfpp_pstatus'] = $data_add['st'];
			
			$data1['tfpp_address'] = $data_add['cm'];
			$data1['tfpp_doc_redem'] = floatval($data_add['amt']) / 10;
			$this->db->insert('{PRE}paypal_payment_logs', $data);
			$id = $this->db->insert_id();

			$addr = $data_add['cm'];
			$data2 = [
				'tfpp_doc_redem' => 1,
			];
			$this->db->select('*');
			$this->db->from('{PRE}paypal_payment');
			$where = "tfpp_address = '$addr'";
			$this->db->where($where);
			$query = $this->db->get();
			$result = $query->result();
			// log_message("info","getresult".json_encode($result)."////".$query->result());
			
			if($query->num_rows() > 0) {
				// log_message("info","check1");
				$where = "tfpp_address = '$addr'";
				$this->db->where($where);
				$res = $this->db->update('{PRE}paypal_payment', $data2);
			}
			else{
				// log_message("info","check");
				$this->db->insert('{PRE}paypal_payment', $data1);
				$id = $this->db->insert_id();
			}
				
		
			return 1;
		}
		public function update_paypalpayment_by_txn($addr, $doc){

			$datan = array();
			$data1 = [
				'tfpp_doc_redem' => floatval($doc) - 1,
			];
				$where = "tfpp_address = '$addr'";
				$this->db->where($where);
				$res = $this->db->update('{PRE}paypal_payment', $data1);
				return $res;
		}
		public function get_instrument_count(){

			$this->db->select('*');
			$this->db->from('{PRE}instrument');
			$query = $this->db->get();

			return $result = $query->num_rows();
		}
		public function get_instrument_active_count($date){
			
			$this->db->select('tfi_maturityDate');
			$this->db->from('{PRE}instrument');
			$where = "tfi_maturityDate >='$date'";
			$this->db->where($where);
			$query = $this->db->get();

			return $result = $query->num_rows();
		}
		public function get_receivable_instrument_sum(){

			$this->db->select('tfi_amount,tfi_currency');
			$this->db->from('{PRE}instrument');
			$where = "tfi_instrument = 'REC'";
			$this->db->where($where);
			$query = $this->db->get();
			// log_message("info","<<2.".json_encode($query->result()));
			return $result = $query->result();
		}
		public function get_sblc_instrument_sum(){

			$this->db->select('tfi_amount,tfi_currency');
			$this->db->from('{PRE}instrument');
			$where = "tfi_instrument = 'SBLC'";
			$this->db->where($where);
			$query = $this->db->get();
			// log_message("info","<<2.".json_encode($query->result()));
			return $result = $query->result();
		}
		public function get_loc_instrument_sum(){

			$this->db->select('tfi_amount,tfi_currency');
			$this->db->from('{PRE}instrument');
			$where = "tfi_instrument = 'LC'";
			$this->db->where($where);
			$query = $this->db->get();
			// log_message("info","<<2.".json_encode($query->result()));
			return $result = $query->result();
		}
		public function get_oth_instrument_sum(){

			$this->db->select('tfi_amount,tfi_currency');
			$this->db->from('{PRE}instrument');
			$where = "tfi_instrument = 'OTH'";
			$this->db->where($where);
			$query = $this->db->get();
			// log_message("info","<<2.".json_encode($query->result()));
			return $result = $query->result();
		}
		public function get_wr_instrument_sum(){

			$this->db->select('tfi_amount,tfi_currency');
			$this->db->from('{PRE}instrument');
			$where = "tfi_instrument = 'WR'";
			$this->db->where($where);
			$query = $this->db->get();
			// log_message("info","<<2.".json_encode($query->result()));
			return $result = $query->result();
		}
		public function get_pay_instrument_sum(){

			$this->db->select('tfi_amount,tfi_currency');
			$this->db->from('{PRE}instrument');
			$where = "tfi_instrument = 'PAY'";
			$this->db->where($where);
			$query = $this->db->get();
			// log_message("info","<<2.".json_encode($query->result()));
			return $result = $query->result();
		}
		public function get_bg_instrument_sum(){

			$this->db->select('tfi_amount,tfi_currency');
			$this->db->from('{PRE}instrument');
			$where = "tfi_instrument = 'BG'";
			$this->db->where($where);
			$query = $this->db->get();
			// log_message("info","<<2.".json_encode($query->result()));
			return $result = $query->result();
		}
		public function add_funding_details($data_add){

			$data = array();

			$data['tfbs_email'] = $data_add['email'];
			$data['tfbs_fullName'] = $data_add['name'];
			$data['tfbs_mobileNo'] = $data_add['mobile'];
			$data['tfbs_companyName'] = $data_add['compN'];
			$data['tfbs_docRef'] = $data_add['docRef'];
			$data['tfbs_loanp'] = $data_add['loanp'];
			$data['tfbs_amount'] = $data_add['amount'];
			$data['tfbs_country'] = $data_add['country'];
			$data['tfbs_currency'] = $data_add['currency'];
			$data['tfbs_maturityDate'] = $data_add['maturityDate'];
			
			
			$this->db->insert('{PRE}funding', $data);
			$id = $this->db->insert_id();
		
			return 1;
		}
		
	}
