<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suser extends CI_Model {
    
    function __construct() {
             parent::__construct();
			 $this->load->database();;
    }
    
    public function checkUser($data = array()){
        $this->tableName = 'tf_users';
        $this->primaryKey = 'id';
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        
        $con = array(
            'oauth_provider' => $data['oauth_provider'],
            'oauth_uid' => $data['oauth_uid']
        );
        $this->db->where($con);
        
        $query = $this->db->get();
        
        $check = $query->num_rows();
        
        if($check > 0){
            // Get prev user data
            $result = $query->row_array();
        
            // Update user data
            // $data['modified'] = date("Y-m-d H:i:s");
            // $update = $this->db->update($this->tableName, $data, array('id'=>$result['id']));
            // echo "User already exists";
            redirect('publicv/bondCreate');
            // die;
            // user id
            // $userID = $result['id'];
        }else{
            // Insert user data
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            
            $insert = $this->db->insert($this->tableName,$data);
            // user id
            $userID = $this->db->insert_id();
        }
        
        // Return user id
        return $userID?$userID:false;
    }

    public function checkSocialUser($data_add){
        
        $result = array();
        $result['error'] = 0;

        $this->db->select('*');
        $this->db->from('{PRE}social_user');
        $where = "tfs_auth_provider = '".$data_add['oauth_provider']."' AND tfs_auth_id = '".$data_add['oauth_uid']."'";
        $this->db->where($where);
        $query = $this->db->get();
        
        $uresult = $query->result();
        
        if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){

            $this->db->select('*');
            $this->db->from('{PRE}social_user_company');
            $where = "tfscom_user_ref = '".$uresult[0]->tfs_id."'";
            $this->db->where($where);
            $query = $this->db->get();

            $ucresult = $query->result();

            if(!empty($ucresult) && is_array($ucresult) && sizeof($ucresult) <> 0){

                if($ucresult[0]->tfcom_cat_ref == 0 || $ucresult[0]->tfcom_country_ref == 0){
                    $udetail = $uresult[0]->tfs_id;
                }
                else{
                    $udetail = $this->get_social_user_company_info_by_id($uresult[0]->tfs_id);
                }

                $result['user_detail'] = $udetail[0];
            }
            else
            {
                
                $udetail = $uresult[0]->tfs_id;
                $result['user_detail'] = $uresult[0];
            }

            $datan = array();

            $datan['tfs_current_logged'] = 1;
            $this->db->set('tfs_logged', 'NOW()', FALSE);

            $where = "tfs_auth_provider = '".$data_add['oauth_provider']."' AND tfs_auth_id = '".$data_add['oauth_uid']."'";
            $this->db->where($where);
            $this->db->update('{PRE}social_user', $datan);

        }else{
            $result['error'] = 1;
            // // Insert user data
            // $this->db->insert('{PRE}social_user',$data);
            // $userID = $this->db->insert_id();
            // $data['userID'] = $userID;
            // return $result = get_social_user_info_by_id( $data['userID']);
        }
        return $result;
    }

    public function add_social_user($data_add){
        $data = array();
        $data['tfs_auth_provider'] = $data_add['oauth_provider'];
        $data['tfs_auth_id'] = $data_add['oauth_uid'];
        $data['tfs_first_name'] = $data_add['first_name'];
        $data['tfs_last_name'] = $data_add['last_name'];
        $data['tfs_email'] = $data_add['email'];
        $data['tfs_created_at'] = date("Y-m-d H:i:s");
        // Insert user data

            $this->db->select('*');
			$this->db->from('{PRE}social_user');
			$where = "tfs_auth_provider = '".$data_add['oauth_provider']."' AND tfs_auth_id = '".$data_add['oauth_uid']."'";
			$this->db->where($where);
			$query = $this->db->get();

			$uresult = $query->result();
        
            if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){

				return false;

			}else{
                $this->db->insert('{PRE}social_user',$data);
                $userID = $this->db->insert_id();
                $data['userID'] = $userID;
                return $result = $this->get_social_user_company_info_by_id($id);
            }
    }

    public function get_social_user_company_info_by_id($id){

        $this->db->select('*');
        $this->db->from('{PRE}social_user_company');
        $where = "tfscom_user_ref = '".$id."'";
        $this->db->where($where);
        $query = $this->db->get();

        $ucresult = $query->result();

        if(!empty($ucresult) && is_array($ucresult) && sizeof($ucresult) <> 0){

            $this->db->select('*');
            $this->db->from('{PRE}social_user tfs');

    
            $this->db->join('{PRE}social_user_company tfc', 'tfc.tfscom_user_ref = tfs.tfs_id');
            $this->db->join('{PRE}country tfcoun', 'tfcoun.tfc_id = tfc.tfscom_country_ref');
            $this->db->join('{PRE}industry_categories tfcat', 'tfcat.ID = tfc.tfscom_cat_ref');

            $where = "tfs.tfs_id = '$id'";
            $this->db->where($where);
            $query = $this->db->get();

            return $result = $query->result();

        }else{

            return $id;
        }
    }

    public function get_company_info_by_uid($uid){

        $this->db->select('*');
        $this->db->from('{PRE}social_user_company');
        $where = "tfscom_user_ref = '$uid'";
        $this->db->where($where);
        $query = $this->db->get();

        return $result = $query->result();
    }
    public function get_social_user_info_by_id($id){

        $this->db->select('*');
        $this->db->from('{PRE}social_user');

        $where = "tfs_id = '$id'";
        $this->db->where($where);
        $query = $this->db->get();

        $result = $query->result();

        if(!empty($result) && is_array($result) && sizeof($result) <> 0){

            return $this->get_company_info_by_uid($result[0]->tfs_id);
        }
    }

    public function update_logout_user($uid){

        $datan = array();

        $datan['tfs_current_logged'] = 0;
        $this->db->set('tfs_logged', 'NOW()', FALSE);
        $where = "tfs_id = '".$uid."'";
        $this->db->where($where);
        $this->db->update('{PRE}social_user', $datan);

        return true;
    }

    public function update_user_base_info_all_by_id($id, $data_add){

        $where = "tfu_id = '$id' AND tfu_utype = '$type_id'";
        $this->db->where($where);
        $this->db->update('{PRE}user', $data_add);

        return $result = $this->get_user_info_by_id_and_type($id, $type_id);
    }
    
    public function update_user_info_by_id($id, $data_add){

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
}