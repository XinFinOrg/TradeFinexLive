<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session', 'email'));
		$this->load->model('manage');
		$this->output->delete_cache();
	}
	
	private function email_config(){
		
		return $config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'beta.tradefinex.org',
			'smtp_port' => 465,
			'smtp_user' => 'contact@beta.tradefinex.org', 
			'smtp_pass' => 'beta@tf2018!', 
			'wordwrap' => TRUE,
			'charset' => 'utf-8'
		  );
	}
	
	public function manage($utype = 0)
	{		
		$data = array();
		$result = array();		
		$data['page'] = 'users';
		$data['sub'] = '';
		$data['msg'] = '';
		$data['users'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = '';
		$data['upic'] = '';
		$data['type_id'] = 0;
						
		$user = $this->session->userdata('alogged_in');
		$type_id = $this->input->post('user_type');
		
		if($type_id == ''){
			if($utype <> 0){
				$type_id = $utype;
			}
		}
				
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			$data['type_id'] = $type_id;
		}else{
			redirect(base_url().'log/out');
		}
			
		if($type_id <> ''){
			
			if($type_id == 1){
				$data['sub'] = 'sp';
				$data['breadcumb'] = 'Supplier';
			}
			
			if($type_id == 2){
				$data['sub'] = 'f';
				$data['breadcumb'] = 'Financier';
			}
			
			if($type_id == 3){
				$data['sub'] = 'b';
				$data['breadcumb'] = 'Beneficiary';
			}
			
			$data['users'] = $this->manage->get_user_info_by_type($type_id);
		}
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_profile_by_id($data['user_id']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/users_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/users_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}
	
	public function admin_manage()
	{		
		$data = array();
		$result = array();		
		$data['page'] = 'Admin';
		$data['sub'] = '';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Admin Manage';
				
		$data['users'] = '';
		$data['adm_row'] = '';
		$data['adm_uname'] = '';
		$data['adm_upwd'] = '';
		$data['adm_utype'] = '';
		$data['adm_fname'] = '';
		$data['adm_lname'] = '';
		$data['adm_email'] = '';
		$data['adm_act'] = '';
				
		$action = $this->input->post('action');
		$row_id = $this->input->post('row_id');
		
		$data['sub'] = $action;
		
		if($action == ''){
			$data['sub'] = 'create';
		}
		
		if($row_id){
			
			if($action == 'edit' && $row_id <> 0){
				
				$result = $this->manage->get_profile_by_id($row_id);
				
				$data['adm_row'] = $result[0]->tfa_id;
				$data['adm_uname'] = $result[0]->tfa_usern;
				$data['adm_upwd'] = $result[0]->tfa_passwd;
				$data['adm_utype'] = $result[0]->tfa_utype;
				$data['adm_fname'] = $result[0]->tfa_fname;
				$data['adm_lname'] = $result[0]->tfa_lname;
				$data['adm_email'] = $result[0]->tfa_email;
				$data['adm_act'] = $result[0]->tfa_active;
			}
			
			if($action == 'update' && $row_id <> 0){
				
				$data_add['tfa_usern'] = $this->input->post('u_name'); 
				$data_add['tfa_passwd'] = $this->input->post('password'); 
				// $data_add['tfa_utype'] = $this->input->post('user_type'); 
				$data_add['tfa_fname'] = $this->input->post('f_name'); 
				$data_add['tfa_lname'] = $this->input->post('l_name'); 
				$data_add['tfa_email'] = $this->input->post('email'); 
				$data_add['tfa_active'] = $this->input->post('status'); 

				$result = $this->manage->update_admin($row_id, $data_add);
				$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Admin has been updated successfully.</font>");
				redirect(base_url().'users/admin_lists');
			}
		}
		
		if($action == 'create' && $row_id == 0){
			
			$data_add['tfa_usern'] = $this->input->post('u_name'); 
			$data_add['tfa_passwd'] = $this->input->post('password'); 
			$data_add['tfa_utype'] = 0; 
			$data_add['tfa_fname'] = $this->input->post('f_name'); 
			$data_add['tfa_lname'] = $this->input->post('l_name'); 
			$data_add['tfa_email'] = $this->input->post('email'); 
			$data_add['tfa_active'] = $this->input->post('status'); 
			
			$result = $this->manage->add_admin($data_add);	
			
			if($result && $result > 0){
				$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Admin has been added successfully.</font>");
				redirect(base_url().'users/admin_lists');
			}
		}
		
		$user = $this->session->userdata('alogged_in');
				
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			redirect(base_url().'log/out');
		}
				
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_profile_by_id($data['user_id']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/admins_details_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/users_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}
	
	public function details($tfu_id)
	{
		$data = array();
		$result = array();		
		$data['page'] = 'users';
		$data['sub'] = 'sp';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Details';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		
		$type_id = $this->input->post('user_type');
		
		$data['user_details'] = $this->manage->get_user_profile_by_id($tfu_id);
		
		if(!empty($data['user_details']) && sizeof($data['user_details']) <> 0){
			
			$type_id = $data['user_details'][0]->tfu_utype;
			
			if($type_id == 1){
				$data['sub'] = 'sp';
				$data['breadcumb'] = 'Supplier > Details';
				$data['page_head'] = 'Supplier Details';
			}
			
			if($type_id == 2){
				$data['sub'] = 'f';
				$data['breadcumb'] = 'Financier > Details';
				$data['page_head'] = 'Financier Details';
			}
			
			if($type_id == 3){
				$data['sub'] = 'b';
				$data['breadcumb'] = 'Beneficiary > Details';
				$data['page_head'] = 'Beneficiary Details';
			}
		}
		
		$data['users'] = '';
				
		$user = $this->session->userdata('alogged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			$data['type_id'] = $type_id;
		}else{
			redirect(base_url().'log/out');
		}
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_profile_by_id($data['user_id']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/users_details_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/users_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}
	
	public function admin_lists()
	{
		$data = array();
		$result = array();		
		$data['page'] = 'Admin';
		$data['sub'] = 'view';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Admins';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['admin'] = $this->manage->get_admins();
		
		$type_id = $this->input->post('user_type');
			
		$data['users'] = '';
				
		$user = $this->session->userdata('alogged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			redirect(base_url().'log/out');
		}
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_profile_by_id($data['user_id']);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/admins_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/admin_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}
		
	public function service_lists_pending()
	{
		$data = array();
		$result = array();		
		$data['page'] = 'userss';
		$data['sub'] = 'listing_pending';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Pending Services';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['admin'] = $this->manage->get_admins();
		$data['ucategories'] = array();
		$data['uservices'] = array();
		
		$type_id = $this->input->post('user_type');
			
		$data['users'] = '';
				
		$user = $this->session->userdata('alogged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			redirect(base_url().'log/out');
		}
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_profile_by_id($data['user_id']);
			$data['user_services'] = $this->manage->get_user_all_service();
			$data['user_info'] = array();			
			
			if(!empty($data['user_services']) && !empty($data['user_services']['services']) && is_array($data['user_services']['services']) && sizeof($data['user_services']['services']) <> 0){
				
				$count = 0;
				
				foreach($data['user_services']['services'] as $usarray){
					
					foreach($usarray as $usrow){
						
						array_push($data['uservices'], $usrow);
						
						$data['user_info'][$usrow->tfus_id] = array();
						$data['user_info'][$usrow->tfus_id]['uname'] = '';
						$data['user_info'][$usrow->tfus_id]['utype'] = '';
						
						if($usrow->tfus_user_type_ref == -1 || $usrow->tfus_user_type_ref == 0){
							
							$data['user_info'][$usrow->tfus_id] = $this->manage->get_profile_by_id($usrow->tfus_user_ref);
							
							if(!empty($data['user_info'][$usrow->tfus_id]) && is_array($data['user_info'][$usrow->tfus_id]) && sizeof($data['user_info'][$usrow->tfus_id]) <> 0){
								$data['user_info'][$usrow->tfus_id]['uname'] = ucwords($data['user_info'][$usrow->tfus_id][0]->tfa_fname.' '.$data['user_info'][$usrow->tfus_id][0]->tfa_lname);
								
								$data['user_info'][$usrow->tfus_id]['utype'] = 'Admin';
								
								if($data['user_info'][$usrow->tfus_id][0]->tfa_utype == -1){
									$data['user_info'][$usrow->tfus_id]['utype'] = 'Superadmin';
								}
								
								// $data['user_info'][$usrow->tfus_id]['cat_type'] = $data['user_services']['category_type'][$count];
						
							}	
						}else{
							
							$data['user_info'][$usrow->tfus_id] = $this->manage->get_user_profile_by_id($usrow->tfus_user_ref);
							
							if(!empty($data['user_info'][$usrow->tfus_id]) && is_array($data['user_info'][$usrow->tfus_id]) && sizeof($data['user_info'][$usrow->tfus_id]) <> 0){
								$data['user_info'][$usrow->tfus_id]['uname'] = ucwords($data['user_info'][$usrow->tfus_id][0]->tfsp_fname.' '.$data['user_info'][$usrow->tfus_id][0]->tfsp_lname);
								
								$data['user_info'][$usrow->tfus_id]['utype'] = 'Supplier';
							}
							
							// $data['user_info'][$usrow->tfus_id]['cat_type'] = $data['user_services']['category_type'][$count];
						
						}
						
						$count++;
					}	
				}
			} 
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/uservice_listing_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/uservice_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}
	
	public function service_lists_approved()
	{
		$data = array();
		$result = array();		
		$data['page'] = 'userss';
		$data['sub'] = 'listing_approve';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Approved Services';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['admin'] = $this->manage->get_admins();
		$data['ucategories'] = array();
		$data['uservices'] = array();
		
		$type_id = $this->input->post('user_type');
			
		$data['users'] = '';
				
		$user = $this->session->userdata('alogged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			redirect(base_url().'log/out');
		}
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_profile_by_id($data['user_id']);
			$data['user_services'] = $this->manage->get_user_all_service(1);
			$data['user_info'] = array();			
			
			if(!empty($data['user_services']) && !empty($data['user_services']['services']) && is_array($data['user_services']['services']) && sizeof($data['user_services']['services']) <> 0){
				
				$count = 0;
				
				foreach($data['user_services']['services'] as $usarray){
					
					foreach($usarray as $usrow){
						
						array_push($data['uservices'], $usrow);
						
						$data['user_info'][$usrow->tfus_id] = array();
						$data['user_info'][$usrow->tfus_id]['uname'] = '';
						$data['user_info'][$usrow->tfus_id]['utype'] = '';
						
						if($usrow->tfus_user_type_ref == -1 || $usrow->tfus_user_type_ref == 0){
							
							$data['user_info'][$usrow->tfus_id] = $this->manage->get_profile_by_id($usrow->tfus_user_ref);
							
							if(!empty($data['user_info'][$usrow->tfus_id]) && is_array($data['user_info'][$usrow->tfus_id]) && sizeof($data['user_info'][$usrow->tfus_id]) <> 0){
								$data['user_info'][$usrow->tfus_id]['uname'] = ucwords($data['user_info'][$usrow->tfus_id][0]->tfa_fname.' '.$data['user_info'][$usrow->tfus_id][0]->tfa_lname);
								
								$data['user_info'][$usrow->tfus_id]['utype'] = 'Admin';
								
								if($data['user_info'][$usrow->tfus_id][0]->tfa_utype == -1){
									$data['user_info'][$usrow->tfus_id]['utype'] = 'Superadmin';
								}
								
								// $data['user_info'][$usrow->tfus_id]['cat_type'] = $data['user_services']['category_type'][$count];
						
							}	
						}else{
							
							$data['user_info'][$usrow->tfus_id] = $this->manage->get_user_profile_by_id($usrow->tfus_user_ref);
							
							if(!empty($data['user_info'][$usrow->tfus_id]) && is_array($data['user_info'][$usrow->tfus_id]) && sizeof($data['user_info'][$usrow->tfus_id]) <> 0){
								$data['user_info'][$usrow->tfus_id]['uname'] = ucwords($data['user_info'][$usrow->tfus_id][0]->tfsp_fname.' '.$data['user_info'][$usrow->tfus_id][0]->tfsp_lname);
								
								$data['user_info'][$usrow->tfus_id]['utype'] = 'Supplier';
							}
							
							// $data['user_info'][$usrow->tfus_id]['cat_type'] = $data['user_services']['category_type'][$count];
						
						}
						
						$count++;
					}	
				}
			} 
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/uservice_listing_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/uservice_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}
	
	public function service_lists_rejected()
	{
		$data = array();
		$result = array();		
		$data['page'] = 'userss';
		$data['sub'] = 'listing_rejected';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Rejected Services';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['admin'] = $this->manage->get_admins();
		$data['ucategories'] = array();
		$data['uservices'] = array();
		
		$type_id = $this->input->post('user_type');
			
		$data['users'] = '';
				
		$user = $this->session->userdata('alogged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			redirect(base_url().'log/out');
		}
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_profile_by_id($data['user_id']);
			$data['user_services'] = $this->manage->get_user_all_service(2);
			$data['user_info'] = array();			
			
			if(!empty($data['user_services']) && !empty($data['user_services']['services']) && is_array($data['user_services']['services']) && sizeof($data['user_services']['services']) <> 0){
				
				$count = 0;
				
				foreach($data['user_services']['services'] as $usarray){
					
					foreach($usarray as $usrow){
						
						array_push($data['uservices'], $usrow);
						
						$data['user_info'][$usrow->tfus_id] = array();
						$data['user_info'][$usrow->tfus_id]['uname'] = '';
						$data['user_info'][$usrow->tfus_id]['utype'] = '';
						
						if($usrow->tfus_user_type_ref == -1 || $usrow->tfus_user_type_ref == 0){
							
							$data['user_info'][$usrow->tfus_id] = $this->manage->get_profile_by_id($usrow->tfus_user_ref);
							
							if(!empty($data['user_info'][$usrow->tfus_id]) && is_array($data['user_info'][$usrow->tfus_id]) && sizeof($data['user_info'][$usrow->tfus_id]) <> 0){
								$data['user_info'][$usrow->tfus_id]['uname'] = ucwords($data['user_info'][$usrow->tfus_id][0]->tfa_fname.' '.$data['user_info'][$usrow->tfus_id][0]->tfa_lname);
								
								$data['user_info'][$usrow->tfus_id]['utype'] = 'Admin';
								
								if($data['user_info'][$usrow->tfus_id][0]->tfa_utype == -1){
									$data['user_info'][$usrow->tfus_id]['utype'] = 'Superadmin';
								}
								
								// $data['user_info'][$usrow->tfus_id]['cat_type'] = $data['user_services']['category_type'][$count];
						
							}	
						}else{
							
							$data['user_info'][$usrow->tfus_id] = $this->manage->get_user_profile_by_id($usrow->tfus_user_ref);
							
							if(!empty($data['user_info'][$usrow->tfus_id]) && is_array($data['user_info'][$usrow->tfus_id]) && sizeof($data['user_info'][$usrow->tfus_id]) <> 0){
								$data['user_info'][$usrow->tfus_id]['uname'] = ucwords($data['user_info'][$usrow->tfus_id][0]->tfsp_fname.' '.$data['user_info'][$usrow->tfus_id][0]->tfsp_lname);
								
								$data['user_info'][$usrow->tfus_id]['utype'] = 'Supplier';
							}
							
							// $data['user_info'][$usrow->tfus_id]['cat_type'] = $data['user_services']['category_type'][$count];
						
						}
						
						$count++;
					}	
				}
			} 
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/uservice_listing_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/uservice_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}	
	
	public function service_admin_approve(){
		
		$service_ref = $this->input->post('service_ref');
		$approve_val = $this->input->post('approve_val');
		$email_bodym = $this->input->post('mail_body');
		$suser_type_ref = 0;
		$service_name = '';	
		
		if($service_ref <> 0){
			
			$sresult = $this->manage->get_user_service_by_id($service_ref);
			
			if(!empty($sresult) && is_array($sresult) && sizeof($sresult) <> 0){
				
				$suser_type_ref = $sresult['services'][0]->tfus_user_type_ref;
				$service_name = $sresult['services'][0]->tfus_name;
				
				$data_add = array();
				$data_add['tfus_admin_approval'] = $approve_val;
								
				if($approve_val == 1){
				
				}
				
				if($approve_val == 2){
					$data_add['tfus_rejection_reason'] = $email_bodym;
				}
						
				$serv_reuslt = $this->manage->update_user_service_by_id($service_ref, $data_add);
			
			}	
		}
		
		$data_add = array();
		$data_add['tfus_admin_approval'] = $approve_val;
		
		if($approve_val == 1){
			// $data_add['row_deleted'] = 1;
		}
		
		if($approve_val == 2){
			$data_add['tfus_rejection_reason'] = $email_bodym;
		}
			
		$serv_reuslt = $this->manage->update_user_service_by_id($service_ref, $data_add);
		
		if($approve_val == 1){
			$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Service has been published successfully.</font>");
		}
		
		if($approve_val == 2){
			$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Service has been rejected successfully.</font>");
		}

		
		if($service_ref <> 0 && trim($email_bodym) != ''){
			
			$service_user_info = $this->manage->get_service_user_info_by_id($service_ref);
			$user_email = '';
			
			if($suser_type_ref <> 0 && ($suser_type_ref == 1 || $suser_type_ref == 2 || $suser_type_ref == 3)){
				
				if(!empty($service_user_info) && is_array($service_user_info) && sizeof($service_user_info) <> 0){
					
					$user_email = $service_user_info[0]->tfu_usern;
				}
			}
						
			$config = array();
			$config = $this->email_config();
						
			$this->email->initialize($config);
						
			$suser = $this->manage->get_superadmin();
			
			$from_email = $config['smtp_user']; 
			$to_email = $user_email; 
						
			$data_add['send_email'] = $to_email;
			$data_add['asend_email'] = $suser[0]->tfa_email;
			
			$this->email->from($from_email, 'Admin Tradefinex'); 
			$this->email->to($to_email);
			$this->email->cc($suser[0]->tfa_email);
					
			$this->email->set_mailtype('html');
			$this->email->subject('Service <strong>"'.$service_name.'"</strong> Rejected By Admin'); 
			$this->email->message($email_bodym); 
			
			// Send mail 
			if($this->email->send()){ 
				$this->session->set_flashdata("email_sent", "<font class='con_msg alerta' color='green'>Thank you for your query. Your query has been received. Our customer support team will respond to your query as soon as possible.</font>"); 
				$this->session->set_flashdata('msg_type', 'success');
			}	
			else{ 
				$this->session->set_flashdata("email_sent", "<font class='con_msg alerta' color='red'>Error in sending Email. Please try again.</font>");
				$this->session->set_flashdata('msg_type', 'error');
			}
		}	
		
		// echo json_encode($data_add);
	}
	
	public function product_lists_pending()
	{
		$data = array();
		$result = array();		
		$data['page'] = 'usersp';
		$data['sub'] = 'listing_pending';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Pending Products';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['admin'] = $this->manage->get_admins();
		$data['ucategories'] = array();
		$data['uproducts'] = array();
		
		$type_id = $this->input->post('user_type');
			
		$data['users'] = '';
				
		$user = $this->session->userdata('alogged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			redirect(base_url().'log/out');
		}
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_profile_by_id($data['user_id']);
			$data['user_products'] = $this->manage->get_user_all_product();
			$data['user_info'] = array();			
			
			if(!empty($data['user_products']) && !empty($data['user_products']['products']) && is_array($data['user_products']['products']) && sizeof($data['user_products']['products']) <> 0){
				
				$count = 0;
				
				foreach($data['user_products']['products'] as $uparray){
					
					foreach($uparray as $uprow){
						
						array_push($data['uproducts'], $uprow);
						
						$data['user_info'][$uprow->tfup_id] = array();
						$data['user_info'][$uprow->tfup_id]['uname'] = '';
						$data['user_info'][$uprow->tfup_id]['utype'] = '';
						
						if($uprow->tfup_user_type_ref == -1 || $uprow->tfup_user_type_ref == 0){
							
							$data['user_info'][$uprow->tfup_id] = $this->manage->get_profile_by_id($uprow->tfup_user_ref);
							
							if(!empty($data['user_info'][$uprow->tfup_id]) && is_array($data['user_info'][$uprow->tfup_id]) && sizeof($data['user_info'][$uprow->tfup_id]) <> 0){
								$data['user_info'][$uprow->tfup_id]['uname'] = ucwords($data['user_info'][$uprow->tfup_id][0]->tfa_fname.' '.$data['user_info'][$uprow->tfup_id][0]->tfa_lname);
								
								$data['user_info'][$uprow->tfup_id]['utype'] = 'Admin';
								
								if($data['user_info'][$uprow->tfup_id][0]->tfa_utype == -1){
									$data['user_info'][$uprow->tfup_id]['utype'] = 'Superadmin';
								}
								
								// $data['user_info'][$uprow->tfup_id]['cat_type'] = $data['user_products']['category_type'][$count];
						
							}	
						}else{
							
							$data['user_info'][$uprow->tfup_id] = $this->manage->get_user_profile_by_id($uprow->tfup_user_ref);
							
							if(!empty($data['user_info'][$uprow->tfup_id]) && is_array($data['user_info'][$uprow->tfup_id]) && sizeof($data['user_info'][$uprow->tfup_id]) <> 0){
								$data['user_info'][$uprow->tfup_id]['uname'] = ucwords($data['user_info'][$uprow->tfup_id][0]->tfsp_fname.' '.$data['user_info'][$uprow->tfup_id][0]->tfsp_lname);
								
								$data['user_info'][$uprow->tfup_id]['utype'] = 'Supplier';
							}
							
							// $data['user_info'][$uprow->tfup_id]['cat_type'] = $data['user_products']['category_type'][$count];
						
						}
						
						$count++;
					}	
				}
			} 
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/uproduct_listing_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/uproduct_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}
	
	public function product_lists_approved()
	{
		$data = array();
		$result = array();		
		$data['page'] = 'usersp';
		$data['sub'] = 'listing_approve';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Approved Products';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['admin'] = $this->manage->get_admins();
		$data['ucategories'] = array();
		$data['uproducts'] = array();
		
		$type_id = $this->input->post('user_type');
			
		$data['users'] = '';
				
		$user = $this->session->userdata('alogged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			redirect(base_url().'log/out');
		}
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_profile_by_id($data['user_id']);
			$data['user_products'] = $this->manage->get_user_all_product(1);
			$data['user_info'] = array();			
			
			if(!empty($data['user_products']) && !empty($data['user_products']['products']) && is_array($data['user_products']['products']) && sizeof($data['user_products']['products']) <> 0){
				
				$count = 0;
				
				foreach($data['user_products']['products'] as $uparray){
					
					foreach($uparray as $uprow){
						
						array_push($data['uproducts'], $uprow);
						
						$data['user_info'][$uprow->tfup_id] = array();
						$data['user_info'][$uprow->tfup_id]['uname'] = '';
						$data['user_info'][$uprow->tfup_id]['utype'] = '';
						
						if($uprow->tfup_user_type_ref == -1 || $uprow->tfup_user_type_ref == 0){
							
							$data['user_info'][$uprow->tfup_id] = $this->manage->get_profile_by_id($uprow->tfup_user_ref);
							
							if(!empty($data['user_info'][$uprow->tfup_id]) && is_array($data['user_info'][$uprow->tfup_id]) && sizeof($data['user_info'][$uprow->tfup_id]) <> 0){
								$data['user_info'][$uprow->tfup_id]['uname'] = ucwords($data['user_info'][$uprow->tfup_id][0]->tfa_fname.' '.$data['user_info'][$uprow->tfup_id][0]->tfa_lname);
								
								$data['user_info'][$uprow->tfup_id]['utype'] = 'Admin';
								
								if($data['user_info'][$uprow->tfup_id][0]->tfa_utype == -1){
									$data['user_info'][$uprow->tfup_id]['utype'] = 'Superadmin';
								}
								
								// $data['user_info'][$uprow->tfup_id]['cat_type'] = $data['user_products']['category_type'][$count];
						
							}	
						}else{
							
							$data['user_info'][$uprow->tfup_id] = $this->manage->get_user_profile_by_id($uprow->tfup_user_ref);
							
							if(!empty($data['user_info'][$uprow->tfup_id]) && is_array($data['user_info'][$uprow->tfup_id]) && sizeof($data['user_info'][$uprow->tfup_id]) <> 0){
								$data['user_info'][$uprow->tfup_id]['uname'] = ucwords($data['user_info'][$uprow->tfup_id][0]->tfsp_fname.' '.$data['user_info'][$uprow->tfup_id][0]->tfsp_lname);
								
								$data['user_info'][$uprow->tfup_id]['utype'] = 'Supplier';
							}
							
							// $data['user_info'][$uprow->tfup_id]['cat_type'] = $data['user_products']['category_type'][$count];
						
						}
						
						$count++;
					}	
				}
			} 
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/uproduct_listing_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/uproduct_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}
	
	public function product_lists_rejected()
	{
		$data = array();
		$result = array();		
		$data['page'] = 'usersp';
		$data['sub'] = 'listing_rejected';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Rejected Products';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['admin'] = $this->manage->get_admins();
		$data['ucategories'] = array();
		$data['uproducts'] = array();
		
		$type_id = $this->input->post('user_type');
			
		$data['users'] = '';
				
		$user = $this->session->userdata('alogged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			redirect(base_url().'log/out');
		}
		
		if($data['user_id'] <> 0){
			
			$uresult = $this->manage->get_profile_by_id($data['user_id']);
			$data['user_products'] = $this->manage->get_user_all_product(2);
			$data['user_info'] = array();			
			
			if(!empty($data['user_products']) && !empty($data['user_products']['products']) && is_array($data['user_products']['products']) && sizeof($data['user_products']['products']) <> 0){
				
				$count = 0;
				
				foreach($data['user_products']['products'] as $uparray){
					
					foreach($uparray as $uprow){
						
						array_push($data['uproducts'], $uprow);
						
						$data['user_info'][$uprow->tfup_id] = array();
						$data['user_info'][$uprow->tfup_id]['uname'] = '';
						$data['user_info'][$uprow->tfup_id]['utype'] = '';
						
						if($uprow->tfup_user_type_ref == -1 || $uprow->tfup_user_type_ref == 0){
							
							$data['user_info'][$uprow->tfup_id] = $this->manage->get_profile_by_id($uprow->tfup_user_ref);
							
							if(!empty($data['user_info'][$uprow->tfup_id]) && is_array($data['user_info'][$uprow->tfup_id]) && sizeof($data['user_info'][$uprow->tfup_id]) <> 0){
								$data['user_info'][$uprow->tfup_id]['uname'] = ucwords($data['user_info'][$uprow->tfup_id][0]->tfa_fname.' '.$data['user_info'][$uprow->tfup_id][0]->tfa_lname);
								
								$data['user_info'][$uprow->tfup_id]['utype'] = 'Admin';
								
								if($data['user_info'][$uprow->tfup_id][0]->tfa_utype == -1){
									$data['user_info'][$uprow->tfup_id]['utype'] = 'Superadmin';
								}
								
								// $data['user_info'][$uprow->tfup_id]['cat_type'] = $data['user_products']['category_type'][$count];
						
							}	
						}else{
							
							$data['user_info'][$uprow->tfup_id] = $this->manage->get_user_profile_by_id($uprow->tfup_user_ref);
							
							if(!empty($data['user_info'][$uprow->tfup_id]) && is_array($data['user_info'][$uprow->tfup_id]) && sizeof($data['user_info'][$uprow->tfup_id]) <> 0){
								$data['user_info'][$uprow->tfup_id]['uname'] = ucwords($data['user_info'][$uprow->tfup_id][0]->tfsp_fname.' '.$data['user_info'][$uprow->tfup_id][0]->tfsp_lname);
								
								$data['user_info'][$uprow->tfup_id]['utype'] = 'Supplier';
							}
							
							// $data['user_info'][$uprow->tfup_id]['cat_type'] = $data['user_products']['category_type'][$count];
						
						}
						
						$count++;
					}	
				}
			} 
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/uproduct_listing_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/uproduct_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}	
	
	public function product_admin_approve(){
		
		$product_ref = $this->input->post('product_ref');
		$approve_val = $this->input->post('approve_val');
		$email_bodym = $this->input->post('mail_body');
		$puser_type_ref = 0;
		$product_name = '';	
		
		if($product_ref <> 0){
			
			$presult = $this->manage->get_user_product_by_id($product_ref);
			
			if(!empty($presult) && is_array($presult) && sizeof($presult) <> 0){
				
				$data_add = array();
				$data_add['tfup_admin_approval'] = $approve_val;
				
				if($approve_val == 1){
					
				}
				
				if($approve_val == 2){
					$data_add['tfup_rejection_reason'] = $email_bodym;
				}
						
				$prod_reuslt = $this->manage->update_user_product_by_id($product_ref, $data_add);
				
			}	
		}
					
		if($approve_val == 1){
			$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Product has been published successfully.</font>");
		}
		
		if($approve_val == 2){
			$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Product has been rejected successfully.</font>");
		}

		if($product_ref <> 0 && trim($email_bodym) != ''){
						
			$product_user_info = $this->manage->get_product_user_info_by_id($product_ref);
			$user_email = '';
			
			if($puser_type_ref <> 0 && ($puser_type_ref == 1 || $puser_type_ref == 2 || $puser_type_ref == 3)){
				
				if(!empty($product_user_info) && is_array($product_user_info) && sizeof($product_user_info) <> 0){
					
					$user_email = $product_user_info[0]->tfu_usern;
				}
			}
			
			$config = array();
			$config = $this->email_config();
						
			$this->email->initialize($config);
						
			$suser = $this->manage->get_superadmin();
			
			$from_email = $config['smtp_user']; 
			$to_email = $user_email; 
						
			$data_add['send_email'] = $to_email;
			$data_add['asend_email'] = $suser[0]->tfa_email;
			
			$this->email->from($from_email, 'Admin Tradefinex'); 
			$this->email->to($to_email);
			$this->email->cc($suser[0]->tfa_email);
					
			$this->email->set_mailtype('html');
			$this->email->subject('Product <strong>"'.$product_name.'"</strong> Rejected By Admin'); 
			$this->email->message($email_bodym); 
			
			// Send mail 
			if($this->email->send()){ 
				$this->session->set_flashdata("email_sent", "<font class='con_msg alerta' color='green'>Thank you for your query. Your query has been received. Our customer support team will respond to your query as soon as possible.</font>"); 
				$this->session->set_flashdata('msg_type', 'success');
			}	
			else{ 
				$this->session->set_flashdata("email_sent", "<font class='con_msg alerta' color='red'>Error in sending Email. Please try again.</font>");
				$this->session->set_flashdata('msg_type', 'error');
			}
		}	
		
		echo json_encode($data_add);
	}
	
	public function activity($tfu_id)
	{
		$data = array();
		$result = array();
		
		$data['page'] = 'users';
		$data['sub'] = '';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = '';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
				
		$user = $this->session->userdata('alogged_in');
		$type_id = $this->input->post('user_type');
		
		$data['type_id'] = $type_id;
		$data['users'] = '';  
		
		$data['full_name'] = '';		
		$user = $this->session->userdata('alogged_in');
		// $type_id = $this->input->post('user_type');
		
		$data['user_details'] = $this->manage->get_user_profile_by_id($tfu_id);
		
		if(!empty($data['user_details']) && sizeof($data['user_details']) <> 0){
			$data['type_id'] = $data['user_details'][0]->tfu_utype;
			$type_id = $data['user_details'][0]->tfu_utype;
		}	
		
		$data['users'] = '';
		
		if($user && !empty($user) && sizeof($user) <> 0){
			$data['full_name'] = ucwords($user['user_full_name']);
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			$data['type_id'] = $type_id;
		}else{
			redirect(base_url().'log/out');
		}
			
		if($type_id <> ''){
			
			if($type_id == 1){
				$data['sub'] = 'sp';
				$data['breadcumb'] = 'Supplier';
			}
			
			if($type_id == 2){
				$data['sub'] = 'f';
				$data['breadcumb'] = 'Financier';
			}
			
			if($type_id == 3){
				$data['sub'] = 'b';
				$data['breadcumb'] = 'Beneficiary';
			}
			
			$data['users'] = $this->manage->get_user_info_by_type($type_id);
		}
			
		if(!empty($data['user_details']) && sizeof($data['user_details']) <> 0){
		
			if($data['user_details'][0]->tfu_admin_blocked == 1){
				
				$this->manage->activate($tfu_id);
				
				$this->session->set_flashdata("op_msg", "<font class='con_msg alert' color='green'>".$data['breadcumb']." has been unblocked successfully.</font>"); 
				$this->session->set_flashdata('msg_type', 'success');
			}
			else
			{
				$this->manage->deactivate($tfu_id);
				
				$this->session->set_flashdata("op_msg", "<font class='con_msg alert' color='green'>".$data['breadcumb']." has been blocked successfully.</font>"); 
				$this->session->set_flashdata('msg_type', 'success');
			}
		}	
			
		redirect(base_url().'users/manage/'.$type_id);
	}
}	