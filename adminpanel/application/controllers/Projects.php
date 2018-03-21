<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('email', 'session'));
		$this->load->model('manage');
		// $this->output->delete_cache();

		$data = array();
		$data_add = array();
	}
	
	public function listing(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'projects';
		$data['sub'] = 'listing';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Listing Details';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
					
		$data['projects'] = array();
				
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
			$data['projects'] = $this->manage->get_all_projects_public();
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/plisting_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/projects_scripts', $data);
		$this->load->view('includes/footer_common', $data);
		
	}
	
	public function listing_approve(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'projects';
		$data['sub'] = 'listing_approve';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Approved Listing Details';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
					
		$data['projects'] = array();
				
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
			$data['projects'] = $this->manage->get_all_projects_public(1);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/plisting_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/projects_scripts', $data);
		$this->load->view('includes/footer_common', $data);
		
	}
	
	public function listing_reject(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'projects';
		$data['sub'] = 'listing_reject';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Rejected Listing Details';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
					
		$data['projects'] = array();
				
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
			$data['projects'] = $this->manage->get_all_projects_public(2);
			
			if(!empty($uresult) && is_array($uresult) && sizeof($uresult) <> 0){
				$data['upic'] = $uresult[0]->tfa_pic;
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/plisting_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/projects_scripts', $data);
		$this->load->view('includes/footer_common', $data);
		
	}
	
	public function types(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'types';
		$data['sub'] = 'ptype';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Types Details';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['contract'] = $this->manage->get_contract();
		
		$type_id = $this->input->post('user_type');
		
		$data['types'] = array();
				
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
		$this->load->view('pages/types_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footer_common', $data);
		
	}
	
	public function types_manage(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'types';
		$data['sub'] = 'ptypem';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Types Manage';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['con_row'] = '';
		$data['con_name'] = '';
		$data['con_del'] = '';
		
		$data['types'] = array();
		
		$action = $this->input->post('action');
		$row_id = $this->input->post('row_id');
		
		$data['sub'] = $action;
		
		if($action == ''){
			$data['sub'] = 'create';
		}
		
		if($row_id){
			
			if($action == 'edit' && $row_id <> 0){
				
				$result = $this->manage->get_contracts_by_id($row_id);
				
				$data['con_row'] = $result[0]->ID;
				$data['con_name'] = $result[0]->cName;
				$data['con_del'] = $result[0]->row_deleted;
			}
			
			if($action == 'update' && $row_id <> 0){
				
				$data_add['cName'] = $this->input->post('con_name');
				$data_add['imagePath'] = $image;
				$stat = $this->input->post('status');
				
				if(isset($stat)){
					$data_add['row_deleted'] = 1;
				}
				else{
					$data_add['row_deleted'] = 0;
				}
				$data_add['updateDate'] = date('Y-m-d H:i:s', now());
				
				$result = $this->manage->update_contract($row_id, $data_add);
				$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Contract has been updated successfully.</font>");
			}
			
			redirect(base_url().'projects/types');
		}
		
		if($action == 'create' && $row_id == 0){
			
			$data_add['cName'] = $this->input->post('con_name');
			$stat = $this->input->post('status');
			if(isset($stat)){
				$data_add['row_deleted'] = 1;
			}
			else{
				$data_add['row_deleted'] = 0;
			}
			$result = $this->manage->add_contract($data_add);	
			
			if($result && $result > 0){
				$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Contract has been added successfully.</font>");
			}
			
			redirect(base_url().'projects/types');
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
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/types_manage', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('includes/footer_common', $data);
		
	}
	
	public function image_gallery_manage()
	{
		$data = array();
		$result = array();		
		$data['page'] = 'Gallery';
		$data['sub'] = 'imggalm';
		$data['msg'] = '';
		$data['users'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Gallery Manage';
		$data['upic'] = '';
		$data['type_id'] = 0;
		$data['img_row'] = '';
		$data['img_gal'] = '';
		$data['img_del'] = '';
		
		$action = $this->input->post('action');
		$row_id = $this->input->post('row_id');
		
		$data['sub'] = $action;
		
		if($action == ''){
			$data['sub'] = 'create';
		}
		
		if($row_id){
			
			if($action == 'edit' && $row_id <> 0){
				
				$result = $this->manage->get_gallery_by_id($row_id);
				$data['img_row'] = $result[0]->tfpg_id;
				$data['img_gal'] = $result[0]->tfpg_name;
				$data['img_del'] = $result[0]->trow_deleted;
			}
			
			if($action == 'update' && $row_id <> 0){
				
				$config['upload_path']          = dirname(FCPATH).'/assets/images/projectsimg/';
				$config['allowed_types']        = 'jpg|jpeg|png';
				//$config['max_size']             = 500;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 968;
				$file_name = time().str_replace(" ", "-", $_FILES["gimage"]['name']);
				$config['file_name'] = $file_name;
				$file_namea = explode('.', $file_name);
				$this->load->library('upload', $config);
				
				$stat = $this->input->post('status');
				
				if(isset($stat)){
					$data_add['trow_deleted'] = 1;
				}
				else{
					$data_add['trow_deleted'] = 0;
				}
				
				$result = $this->manage->update_gallery($row_id, $data_add);
				
				if(isset($_FILES["gimage"]['name']) && trim($_FILES["gimage"]['name']) <> ''){
				
					if(!$this->upload->do_upload('gimage'))
					{
						$data['msg'] = 'error';
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='red'>Gallery has been added without Image.</font><br/>".$this->upload->display_errors());
					}
					else
					{
						$data_add = array();
						$data['msg'] = 'success';
						$data_add['tfpg_name'] = $row_id.'_gallery.'.end($file_namea);
						
						rename(dirname(FCPATH).'/assets/images/projectsimg/'.$file_name, dirname(FCPATH).'/assets/images/projectsimg/'.$row_id.'_gallery.'.end($file_namea));
						$success_data = $this->upload->data();
					
						$this->manage->update_gallery($row_id, $data_add);
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Gallery has been updated successfully.</font>");
					}
				}else{
					
					if(file_exists(dirname(FCPATH).'/assets/images/projectsimg/'.$file_name)){
						unlink(dirname(FCPATH).'/assets/images/projectsimg/'.$file_name);
					}
					
					$data['msg'] = 'success';
					$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Gallery has been updated successfully.</font>");
				}
				
				redirect(base_url().'projects/image_gallery');
			}
		}
		
		if($action == 'create' && $row_id == 0){
			
			$config['upload_path']          = dirname(FCPATH).'/assets/images/projectsimg/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            //$config['max_size']           = 500;
            //$config['max_width']          = 1024;
            //$config['max_height']         = 968;
           			
			$file_name = time().str_replace(" ", "-", $_FILES["gimage"]['name']);
			$config['file_name'] = $file_name;
			$file_namea = explode('.', $file_name);
            $this->load->library('upload', $config);
			
			$data_add = array();
			
			$data_add['tfpg_id'] = strtotime(date('Y-m-d H:i:s', now()));
			$stat = $this->input->post('status');
				
			if(isset($stat)){
				$data_add['trow_deleted'] = 1;
			}
			else{
				$data_add['trow_deleted'] = 0;
			}
			
			$result = $this->manage->add_gallery($data_add);
			
			if($result && $result > 0){
				
				if(isset($_FILES["gimage"]['name']) && trim($_FILES["gimage"]['name']) <> ''){
				
					if(!$this->upload->do_upload('gimage'))
					{
						$data['msg'] = 'error';
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='red'>Gallery has been added without Image.</font><br/>".$this->upload->display_errors());
					}
					else
					{
						$data_add = array();
						$data['msg'] = 'success';
						$data_add['tfpg_name'] = $result.'_gallery.'.end($file_namea);
						
						if(file_exists(dirname(FCPATH).'/assets/images/projectsimg/'.$result.'_gallery.'.end($file_namea))){
							unlink(dirname(FCPATH).'/assets/images/projectsimg/'.$result.'_gallery.'.end($file_namea));
						}
						
						rename(dirname(FCPATH).'/assets/images/projectsimg/'.$file_name, dirname(FCPATH).'/assets/images/projectsimg/'.$result.'_gallery.'.end($file_namea));
						$success_data = $this->upload->data();
					
						$this->manage->update_gallery($result, $data_add);
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Gallery has been added successfully.</font>");
					}
				}else{
					
					if(file_exists(dirname(FCPATH).'/assets/images/projectsimg/'.$file_name)){
						unlink(dirname(FCPATH).'/assets/images/projectsimg/'.$file_name);
					}
					
					$data['msg'] = 'success';
					$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Gallery has been updated successfully.</font>");
				}	
					
			}else{
				$data['msg'] = 'error';
				$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='red'>Gallery has been unable to add.</font>");
			}
			
			redirect(base_url().'projects/image_gallery');
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
				$data['type_id'] = $uresult[0]->tfa_utype;
			}
		}
		
		$this->load->view('includes/header_common',$data);
		$this->load->view('includes/sidebar',$data);
		$this->load->view('includes/header_top_nav',$data);
		$this->load->view('pages/gallery_manage',$data);
		$this->load->view('includes/footer_after_login',$data);
		$this->load->view('includes/footer_common',$data);
	}
	
	public function image_gallery(){
		
		$data = array();
		$result = array();		
		$data['page'] = 'Gallery';
		$data['sub'] = 'imggalv';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Lists';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['gallery'] = $this->manage->get_gallery();
		
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
		$this->load->view('pages/gallery_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footer_common', $data);
		
	}
	
	public function admin_approve(){
		
		$project_ref = $this->input->post('project_ref');
		$approve_val = $this->input->post('approve_val');
		$email_bodym = $this->input->post('mail_body');
		
		$data_add = array();
		$data_add['admin_approval'] = $approve_val;
		
		if($approve_val == 2){
			$data_add['rejection_reason'] = $email_bodym;
		}	
		
		$this->manage->update_project_by_id($project_ref, $data_add);
		
		if($approve_val == 1){
			$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Project has been published successfully.</font>");
		}
		if($approve_val == 2){
			$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Project has been rejected successfully.</font>");
		}	
		
		if($project_ref <> 0 && trim($email_bodym) != ''){
			
			$user_project_info = $this->manage->get_project_info_by_id($project_ref);
			
			$config['protocol'] = 'smtp';
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;

			// $this->email->initialize($config);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			
			$suser = $this->manage->get_superadmin();
			
			$from_email = "admin@tradefinex.com"; 
			$to_email = $user_project_info[0]->tfb_email; 
			
			$data_add['send_email'] = $to_email;
			$data_add['asend_email'] = $suser[0]->tfa_email;
			
			$this->email->from($from_email, 'Admin Tradefinex'); 
			$this->email->to($to_email);
			$this->email->cc($suser[0]->tfa_email);
					
			$this->email->set_mailtype('html');
			$this->email->subject('Project No. TF-'.strtotime($user_project_info[0]->postDate).' Rejected By Admin'); 
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
		
		// redirect(base_url().'projects/listing');
	}
}	