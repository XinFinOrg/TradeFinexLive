<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Industry extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'file'));
		$this->load->library('session');
		$this->load->model('manage');
		$this->output->delete_cache();
	}
	
	public function manage()
	{
		$data = array();
		$result = array();		
		$data['page'] = 'Industry';
		$data['sub'] = '';
		$data['msg'] = '';
		$data['users'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Manage';
		$data['upic'] = '';
		$data['type_id'] = 0;
		$data['cate_row'] = '';
		$data['cate_name'] = '';
		$data['cate_image'] = '';
		$data['cate_del'] = '';
		
		$action = $this->input->post('action');
		$row_id = $this->input->post('row_id');
		
		$data['sub'] = $action;
		
		if($action == ''){
			$data['sub'] = 'create';
		}
		
		if($row_id){
			
			if($action == 'edit' && $row_id <> 0){
				
				$result = $this->manage->get_categories_by_id($row_id);
				$data['cate_row'] = $result[0]->ID;
				$data['cate_name'] = $result[0]->cName;
				$data['cate_image'] = $result[0]->imagePath;
				$data['cate_del'] = $result[0]->row_deleted;
			}
			
			if($action == 'update' && $row_id <> 0){
				
				$config['upload_path']          = dirname(FCPATH).'/public/images/industry/';
				$config['allowed_types']        = 'jpg|jpeg|png';
				//$config['max_size']           = 500;
				//$config['max_width']          = 1024;
				//$config['max_height']         = 968;
				$file_name = time().str_replace(" ", "-", $_FILES["cimage"]['name']);
				$config['file_name'] = $file_name;
				$file_namea = explode('.', $file_name);
				$this->load->library('upload', $config);
							
				$data_add['cName'] = $this->input->post('cname');
				$data_add['imagePath'] = $image;
				$stat = $this->input->post('status');
				
				if(isset($stat)){
					$data_add['row_deleted'] = 1;
				}
				else{
					$data_add['row_deleted'] = 0;
				}
				
				$data_add['updateDate'] = date('Y-m-d H:i:s', now());
				$result = $this->manage->update_category($row_id, $data_add);
				
				if(isset($_FILES["cimage"]['name']) && trim($_FILES["cimage"]['name']) <> ''){
				
					if(!$this->upload->do_upload('cimage'))
					{
						$data['msg'] = 'error';
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='red'>Industry has been added without Image.</font><br/>".$this->upload->display_errors());
					}
					else
					{
						$data_add = array();
						$data['msg'] = 'success';
						$data_add['imagePath'] = $row_id.'_industry.'.end($file_namea);
						
						if(file_exists(dirname(FCPATH).'/public/images/industry/'.$row_id.'_industry.'.end($file_namea))){
							unlink(dirname(FCPATH).'/public/images/industry/'.$row_id.'_industry.'.end($file_namea));
						}
						
						rename(dirname(FCPATH).'/public/images/industry/'.$file_name, dirname(FCPATH).'/public/images/industry/'.$row_id.'_industry.'.end($file_namea));
						$success_data = $this->upload->data();
					
						$this->manage->update_category($row_id, $data_add);
						
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Industry has been updated successfully.</font>");
					}
				}else{
					
					if(file_exists(dirname(FCPATH).'/public/images/industry/'.$file_name)){
						unlink(dirname(FCPATH).'/public/images/industry/'.$file_name);
					}
					
					$data['msg'] = 'success';
					$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Industry has been updated successfully.</font>");
				}	
				
				redirect(base_url().'industry/listing');
			}
		}
		
		if($action == 'create' && $row_id == 0){
			
			$config['upload_path']          = dirname(FCPATH).'/public/images/industry/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            //$config['max_size']           = 500;
            //$config['max_width']          = 1024;
            //$config['max_height']         = 968;
           			
			$file_name = time().str_replace(" ", "-", $_FILES["cimage"]['name']);
			$config['file_name'] = $file_name;
			$file_namea = explode('.', $file_name);
            $this->load->library('upload', $config);
			
			$data_add = array();
			
			$data_add['cName'] = $this->input->post('cname');
			$data_add['row_deleted'] = $this->input->post('status');
			$result = $this->manage->add_category($data_add);	
			
			if($result && $result > 0){
				
				if(isset($_FILES["cimage"]['name']) && trim($_FILES["cimage"]['name']) <> ''){
				
					if(!$this->upload->do_upload('cimage'))
					{
						$data['msg'] = 'error';
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='red'>Industry has been added without Image.</font><br/>".$this->upload->display_errors());
					}
					else
					{
						$data_add = array();
						$data['msg'] = 'success';
						$data_add['imagePath'] = $result.'_industry.'.end($file_namea);
						
						if(file_exists(dirname(FCPATH).'/public/images/industry/'.$result.'_industry.'.end($file_namea))){
							unlink(dirname(FCPATH).'/public/images/industry/'.$result.'_industry.'.end($file_namea));
						}
						
						rename(dirname(FCPATH).'/public/images/industry/'.$file_name, dirname(FCPATH).'/public/images/industry/'.$result.'_industry.'.end($file_namea));
						$success_data = $this->upload->data();
					
						$this->manage->update_category($result, $data_add);
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Industry has been added successfully.</font>");
					}
				}else{
					
					if(file_exists(dirname(FCPATH).'/public/images/industry/'.$file_name)){
						unlink(dirname(FCPATH).'/public/images/industry/'.$file_name);
					}
					
					$data['msg'] = 'success';
					$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Industry has been updated successfully.</font>");
				}	
					
			}else{
				$data['msg'] = 'error';
				$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='red'>Industry has been unable to add.</font>");
			}
			
			redirect(base_url().'industry/listing');
		}
		
		$this->load->view('includes/header_common',$data);
		$this->load->view('includes/sidebar',$data);
		$this->load->view('includes/header_top_nav',$data);
		$this->load->view('pages/industry_view',$data);
		$this->load->view('includes/footer_after_login',$data);
		$this->load->view('pages_scripts/users_scripts',$data);
		$this->load->view('includes/footer_common',$data);
	}
	
	public function listing(){
		
		$data = array();
		$result = array();		
		$data['page'] = 'Industries';
		$data['sub'] = 'view';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Lists';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['categories'] = $this->manage->get_categories();
		
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
		$this->load->view('pages/industry_lists', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}
	
	public function sector_manage()
	{
		$data = array();
		$result = array();		
		$data['page'] = 'Sectors';
		$data['sub'] = '';
		$data['msg'] = '';
		$data['users'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Manage';
		$data['upic'] = '';
		$data['type_id'] = 0;
		//$data['adm_row'] = '';
		$data['skl_row'] = '';
		$data['skl_name'] = '';
		$data['skl_image'] = '';
		$data['skl_ref'] = '';
		$data['skl_del'] = '';
				
		$data['records']=$this->manage->get_industry_by_id();
		
		$action = $this->input->post('action');
		$row_id = $this->input->post('row_id');
		
		$data['sub'] = $action;
		
		if($action == ''){
			$data['sub'] = 'create';
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
		
		if($row_id){
			
			if($action == 'edit' && $row_id <> 0){
				
				$result = $this->manage->get_sectors_by_id($row_id);
				$data['skl_row'] = $result[0]->ID;
				$data['skl_name'] = $result[0]->sectorName;
				$data['skl_image'] = $result[0]->sector_image;
				$data['skl_ref'] = $result[0]->industry_ref;
				$data['skl_del'] = $result[0]->row_deleted;
			}
			
			if($action == 'update' && $row_id <> 0){
				
				$config['upload_path']          = dirname(FCPATH).'/public/images/industry_sectors/';
				$config['allowed_types']        = 'jpg|jpeg|png';
				//$config['max_size']             = 500;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 968;
				$file_name = time().str_replace(" ", "-", $_FILES["simage"]['name']);
				$config['file_name'] = $file_name;
				$file_namea = explode('.', $file_name);
				$this->load->library('upload', $config);
				
				$data_add['sectorName'] = $this->input->post('sname');
				$data_add['industry_ref'] = $this->input->post('industry_ref');
				$stat = $this->input->post('status');
				
				if(isset($stat)){
					$data_add['row_deleted'] = 1;
				}
				else{
					$data_add['row_deleted'] = 0;
				}
				
				$data_add['updateDate'] = date('Y-m-d H:i:s', now());
				
				$result = $this->manage->update_skill($row_id, $data_add);
				
				if(isset($_FILES["simage"]['name']) && trim($_FILES["simage"]['name']) <> ''){
				
					if(!$this->upload->do_upload('simage'))
					{
						$data['msg'] = 'error';
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='red'>Sector has been added without Image.</font><br/>".$this->upload->display_errors());
					}
					else
					{
						$data_add = array();
						$data['msg'] = 'success';
						$data_add['sector_image'] = $row_id.'_sector.'.end($file_namea);
						
						rename(dirname(FCPATH).'/public/images/industry_sectors/'.$file_name, dirname(FCPATH).'/public/images/industry_sectors/'.$row_id.'_sector.'.end($file_namea));
						$success_data = $this->upload->data();
					
						$this->manage->update_skill($row_id, $data_add);
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Sector has been updated successfully.</font>");
					}
				}else{
					
					if(file_exists(dirname(FCPATH).'/public/images/industry_sectors/'.$file_name)){
						unlink(dirname(FCPATH).'/public/images/industry_sectors/'.$file_name);
					}
					
					$data['msg'] = 'success';
					$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Sector has been updated successfully.</font>");
				}
				
				redirect(base_url().'industry/sector_listing');
			}
		}
		
		if($action == 'create' && $row_id == 0){
			
			$config['upload_path']          = dirname(FCPATH).'/public/images/industry_sectors/';
            $config['allowed_types']        = 'jpg|png';
            //$config['max_size']             = 500;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 968;
            $file_name = time().str_replace(" ", "-", $_FILES["simage"]['name']);
			$config['file_name'] = $file_name;
			$file_namea = explode('.', $file_name);
			$this->load->library('upload', $config);
			
			$data_add['sectorName'] = $this->input->post('sname');
			$data_add['industry_ref'] = $this->input->post('industry_ref');
			$stat = $this->input->post('status');
				
			if(isset($stat)){
				$data_add['row_deleted'] = 1;
			}
			else{
				$data_add['row_deleted'] = 0;
			}
			
			$result = $this->manage->add_skill($data_add);	
			
			if($result && $result > 0){
				
				if(isset($_FILES["simage"]['name']) && trim($_FILES["simage"]['name']) <> ''){
				
					if(!$this->upload->do_upload('simage'))
					{
						$data['msg'] = 'error';
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='red'>Sector has been added without Image.</font><br/>".$this->upload->display_errors());
					}
					else
					{
						$data_add = array();
						$data['msg'] = 'success';
						$data_add['sector_image'] = $result.'_sector.'.end($file_namea);
						
						if(file_exists(dirname(FCPATH).'/public/images/industry_sectors/'.$result.'_sector.'.end($file_namea))){
							unlink(dirname(FCPATH).'/public/images/industry_sectors/'.$result.'_sector.'.end($file_namea));
						}
						rename(dirname(FCPATH).'/public/images/industry_sectors/'.$file_name, dirname(FCPATH).'/public/images/industry_sectors/'.$result.'_sector.'.end($file_namea));
						$success_data = $this->upload->data();
					
						$this->manage->update_skill($result, $data_add);
						$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Sector has been added successfully.</font>");
					}
				}else{
					
					if(file_exists(dirname(FCPATH).'/images/industry_sectors/'.$file_name)){
						unlink(dirname(FCPATH).'/images/industry_sectors/'.$file_name);
					}
					
					$data['msg'] = 'success';
					$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Sector has been updated successfully.</font>");
				}	
					
			}else{
				$data['msg'] = 'error';
				$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='red'>Sector has been unable to add.</font>");
			}
			
			redirect(base_url().'industry/sector_listing');
		}
		
		$this->load->view('includes/header_common',$data);
		$this->load->view('includes/sidebar',$data);
		$this->load->view('includes/header_top_nav',$data);
		$this->load->view('pages/sectors_view',$data);
		$this->load->view('includes/footer_after_login',$data);
		$this->load->view('pages_scripts/users_scripts',$data);
		$this->load->view('includes/footer_common',$data);
	}
	
	public function sector_listing()
	{
		$data = array();
		$result = array();		
		$data['page'] = 'Sectors';
		$data['sub'] = 'view';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Listing';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
		$data['sectors'] = $this->manage->get_sectors();
		
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
		$this->load->view('pages/sectors_lists', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/admin_scripts', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footer_common', $data);
	}
}
?>