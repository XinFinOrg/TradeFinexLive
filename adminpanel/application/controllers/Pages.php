<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'file', 'url', 'date'));
		$this->load->library(array('email', 'session'));
		$this->load->model('manage');
		// $this->output->delete_cache();

		$data = array();
		$data_add = array();
	}
	
	public function media_center(){
		
		$data = array();
		$result = array();
		
		$data['page'] = 'pages';
		$data['sub'] = 'media';
		$data['msg'] = '';
		$data['full_name'] = '';
		$data['breadcumb'] = 'Media Center';
		$data['type_id'] = 0;
		$data['page_head'] = ''; 
		$data['upic'] = '';
					
		$data['pages'] = array();
				
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
		
		$media_published = array();
		$action = $this->input->post('action');
		$media_count = $this->input->post('media_count');
		$this->load->library('upload');
			
		if($action == 'add_media' || $action == 'update_media'){
		
			$media_published['internal'][]['paragraph_1'] = htmlspecialchars($this->input->post('para_1'));
			$media_published['internal'][]['paragraph_2'] = htmlspecialchars($this->input->post('para_2'));
			$media_published['internal'][]['paragraph_3'] = htmlspecialchars($this->input->post('para_3'));
			
			if($media_count > 0){
				$count = 0;
				for($i=1; $i <= $media_count; $i++){
							
					$config['upload_path']          = dirname(FCPATH).'/assets/images/page/media/';
					$config['allowed_types']        = 'jpg|jpeg|png';
					$config['overwrite'] 		 	= TRUE;
					// $config['max_size']           = 500;
					// $config['max_width']          = 1024;
					// $config['max_height']         = 968;
					$file_name = time().str_replace(" ", "-", $_FILES['media_logo_'.$i]['name']);
					$config['file_name'] = $file_name;
					$file_namea = explode('.', $file_name);
					$this->upload->initialize($config);
					
					if(!is_dir($config['upload_path'])){
						mkdir($config['upload_path'], 0755, TRUE);
					}
					
					$media_logo_file = '';
					
					if(isset($_FILES['media_logo_'.$i]['name']) && trim($_FILES['media_logo_'.$i]['name']) <> ''){
						
						if(!$this->upload->do_upload('media_logo_'.$i))
						{
							$data['msg'] = 'error';
													
							if($action == 'update_media'){
								$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='red'>Media has been updated without Logo.</font><br/>".$this->upload->display_errors());
							}
							if($action == 'add_media'){
								$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='red'>Media has been added without Logo.</font><br/>".$this->upload->display_errors());
							}
							
							$mediaf_logo = $this->input->post('mediaf_logo_'.$i);
							
							$media_logo_file = (($mediaf_logo && trim($mediaf_logo) <> '') ? $mediaf_logo : '');
						}
						else
						{
							// $this->upload->do_upload('media_logo_'.$i);
							$data['msg'] = 'success';
							
							$upload_data = $this->upload->data();
							
							$quality = 100; $sourceImage = ''; $fileExtn = '';
							
							/* if(end($file_namea) == 'png'){
								
								$originalFile = dirname(FCPATH).'/assets/images/page/media/'.$file_name;
								$sourceImage = $outputFile = dirname(FCPATH).'/assets/images/page/media/media_'.$i.'.jpg';
								$fileExtn = 'jpg';
								
								$image = imagecreatefrompng($originalFile);
								imagejpeg($image, $outputFile, $quality);
								imagedestroy($image);
							} */
																										
							$image_config = array();
							$image_config["image_library"] = "gd2";
							$image_config["source_image"] = $upload_data["full_path"];
							$image_config['create_thumb'] = FALSE;
							$image_config['maintain_ratio'] = TRUE;
							$image_config['quality'] = "100%";
							$image_config['width'] = 206;
							$image_config['height'] = 63;
							$image_config['new_image'] = $upload_data["file_path"] . 'media_'.$i.'_'.$image_config['width'].'_'.$image_config['height'].'.'.end($file_namea);
							
							$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
							$image_config['master_dim'] = ($dim > 0)? "height" : "width";
							 
							$this->load->library('image_lib');
							$this->image_lib->initialize($image_config);
																								 
							if(!$this->image_lib->resize()){ // Resize image
								// Error
							}else{
								// Success
							}	
							
							rename(dirname(FCPATH).'/assets/images/page/media/'.$file_name, dirname(FCPATH).'/assets/images/page/media/media_'.$i.'.'.end($file_namea));
							
							if($action == 'update_media'){
								$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Media has been updated successfully.</font>");
							}
							if($action == 'add_media'){
								$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Media has been added successfully.</font>");
							}
							
							$mediaf_logo = $this->input->post('mediaf_logo_'.$i);
							
							$mediafn = 'media_'.$i.'.'.end($file_namea);
							
							$media_logo_file = (($mediafn && trim($mediafn) <> '') ? $mediafn : (($mediaf_logo && trim($mediaf_logo) <> '') ? $mediaf_logo : ''));
						}
						
						if(file_exists(dirname(FCPATH).'/assets/images/page/media/'.$file_name)){
							unlink(dirname(FCPATH).'/assets/images/page/media/'.$file_name);
						} 
										
					}else{
						
						if(file_exists(dirname(FCPATH).'/assets/images/page/media/'.$file_name)){
							unlink(dirname(FCPATH).'/assets/images/page/media/'.$file_name);
						}
						
						$data['msg'] = 'success';
						
						if($action == 'update_media'){
							$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Media has been updated successfully.</font>");
						}
						if($action == 'add_media'){
							$this->session->set_flashdata('op_msg', "<font class='con_msg alert' color='green'>Media has been added successfully.</font>");
						}
						
						$mediaf_logo = $this->input->post('mediaf_logo_'.$i);
							
						$media_logo_file = (($mediaf_logo && trim($mediaf_logo) <> '') ? $mediaf_logo : '');
					}
					
					$media_published['external'][strtotime($this->input->post('media_published_date_'.$i))][] = array(
					
						'media_logo' => $media_logo_file,
						'media_heading' => htmlspecialchars($this->input->post('media_heading_'.$i)),
						'media_short_descripttion' => htmlspecialchars($this->input->post('media_short_descripttion_'.$i)),
						'media_published_date' => $this->input->post('media_published_date_'.$i),
						'media_published_url' => $this->input->post('media_published_url_'.$i)
					);
					
					$count++;
				}
			}
			
			$f = fopen(dirname(FCPATH).'/assets/frontend_pages/media/media_center.txt', 'w');
			if ($f !== false) {
				ftruncate($f, 0);
				fclose($f);
			}
			
			write_file(dirname(FCPATH).'/assets/frontend_pages/media/media_center.txt', json_encode($media_published, TRUE), 'r+');
		}
			
		$data['medias'] = $medias = array();
		$data['medias'] = $medias = json_decode(file_get_contents(dirname(FCPATH).'/assets/frontend_pages/media/media_center.txt'), TRUE);
		
							
		$this->load->view('includes/header_common', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view('includes/header_top_nav', $data);
		$this->load->view('pages/media_center_view', $data);
		$this->load->view('includes/footer_after_login', $data);
		$this->load->view('pages_scripts/common_scripts', $data);
		$this->load->view('includes/footer_common', $data);
		
	}
}	