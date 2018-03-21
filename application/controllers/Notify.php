<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notify extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'notification'));
		$this->load->library(array('session', 'encrypt'));
		$this->load->model(array('notification','manage', 'plisting'));
		$this->output->delete_cache();
		$data = array();
		$data_add = array();
	}
	
	public function listing_count()
	{
		$data = array();
		$result = array();
				
		$data['msg'] = '';
		
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
		$data['notification_count'] = 0;
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			
			redirect(base_url().'log/out');
		}
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$notification_count = 0;
		$notificationa = array();
		
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
				
			$user_ref = $data['user_id'];
			$user_type_ref = $data['user_type_ref'];
						
			$notificationa = $this->notification->get_notification_count($data['user_id'], $data['user_type_ref']);
		}	

		$data['notification_count'] = sizeof($notificationa);	
	
		echo json_encode($data);
	}
	
	public function mlisting_count()
	{
		$data = array();
		$result = array();
				
		$data['msg'] = '';
		
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
		$data['notification_count'] = 0;
					
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			
			redirect(base_url().'log/out');
		}
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
		
		$notification_count = 0;
		$notificationa = array();
		
		if($data['user_id'] <> 0){
			
			$user_ref = $data['user_id'];
			$user_type_ref = $data['user_type_ref'];
					
			$nresult = $this->notification->get_message_unread_notification($user_ref, $user_type_ref);
			
			if($nresult && !empty($nresult) && sizeof($nresult) <> 0){
				$notification_count += sizeof($nresult);
			}
			
		}	
		
		$data['notification_count'] = $notification_count;	
		
		echo json_encode($data);
	}
	
	public function listing_ui()
	{
		$data = array();
		$result = array();
				
		$data['msg'] = '';
		
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
		$data['notification_count'] = 0;
		$data['nofifya'] = array();
		$data['narrkey'] = array();
		$nofifya = array();
		$narrkey = array();
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			
			redirect(base_url().'log/out');
		}
		
		$notification_count = 0;
		
		$data['notifications'] = array();
		$data['notifications'] = get_initial_notification_status();
		
		if($data['user_id'] <> 0){
			
			$options = array();
			$options['user_id'] = $data['user_id'];
			$options['user_type'] = $data['user_type_ref'];
			
			$data['notifications'] = get_notification_status($options);
		}
		
		if($data['user_id'] <> 0){
							
			$user_ref = $data['user_id'];
			$user_type_ref = $data['user_type_ref'];
			$count = 0;
						
			$data['nofifya'] = $this->notification->get_notification($data['user_id'], $data['user_type_ref']);
		}	
		
		$data['notification_count'] = $notification_count;	
		
		$this->load->view('pages/notify_list', $data);
	}
	
	public function mlisting_ui()
	{
		$data = array();
		$result = array();
				
		$data['msg'] = '';
		
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
		$data['notification_count'] = 0;
		$data['nofifya'] = array();
		$data['narrkey'] = array();
		$nofifya = array();
		$narrkey = array();
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
			
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			
			redirect(base_url().'log/out');
		}
		
		$notification_count = 0;
		
		if($data['user_id'] <> 0){
			
			$user_ref = $data['user_id'];
			$user_type_ref = $data['user_type_ref'];
			$count = 0;
					
			$nresult = $this->notification->get_message_notification($user_ref, $user_type_ref);
			
			if($nresult && !empty($nresult) && sizeof($nresult) <> 0){
				
				$notification_count += sizeof($nresult);
				
				foreach($nresult as $nrow){
					
					$narrkey[strtotime($nrow->tfpmb_created)] = $count;	
					$nofifya[$count]['notify_type'] = 'message_received';
					$nofifya[$count]['notify_id'] = $nrow->tfpmb_id;
					$nofifya[$count]['notify_project'] = 0;
					$nofifya[$count]['notify_user_ref'] = $nrow->tfpmb_sender_ref;
					$nofifya[$count]['notify_user_type_ref'] = $nrow->tfpmb_sender_type_ref;
					$user_info = $this->manage->get_user_info_by_id_and_type($nrow->tfpmb_sender_ref, $nrow->tfpmb_sender_type_ref);
					
					if($nrow->tfpmb_sender_type_ref == 1){
						$nofifya[$count]['notify_text'] = ucwords($user_info[0]->tfsp_fname.' '.$user_info[0]->tfsp_lname).' sent a Message';
					}
					if($nrow->tfpmb_sender_type_ref == 2){
						$nofifya[$count]['notify_text'] = ucwords($user_info[0]->tff_fname.' '.$user_info[0]->tff_lname).' sent a Message';
					}
					if($nrow->tfpmb_sender_type_ref == 3){
						$nofifya[$count]['notify_text'] = ucwords($user_info[0]->tfb_fname.' '.$user_info[0]->tfb_lname).' sent a Message';
					}
					
					$nofifya[$count++]['notify_time'] = $nrow->tfpmb_created;
				}
			}
		}	

		$data['notification_count'] = $notification_count;	
		$data['nofifya'] = $nofifya;
		$data['narrkey'] = $narrkey;
		
		$this->load->view('pages/notify_listm', $data);
	}
	
	public function update_notifyc(){
		
		$data = array();
				
		$data['msg'] = '';
		
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
		$data['notification_count'] = 0;
		
		$data['csrf'] = array();
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data['csrf'] = $csrf;
				
		$user = $this->session->userdata('logged_in');
		
		if($user && !empty($user) && sizeof($user) <> 0){
			
			$data['full_name'] = $user['user_full_name'];
			$data['user_id'] = $user['user_id'];
			$data['user_typer'] = $user['user_type'];
			$data['user_type'] = str_replace('-', ' ', $user['user_type']);
			$data['user_type_ref'] = $user['user_type_ref'];
			
		}else{
			
			redirect(base_url().'log/out');
		}
		
		if($data['user_id'] <> 0){
			
			$user_ref = $data['user_id'];
			$user_type_ref = $data['user_type_ref'];
			
			$this->notification->update_proposal_provider_unread_notification();
			$this->notification->update_proposal_accept_provider_unread_notification($data['user_id']);
			$this->notification->update_proposal_financier_unread_notification();
			$this->notification->update_proposal_accept_financier_unread_notification($data['user_id']);
			$this->notification->update_project_invites_unread_notification($user_ref, $user_type_ref);
			$this->notification->update_message_unread_notification($user_ref, $user_type_ref);
			$this->notification->update_project_posted_unread_notification($user_ref, $user_type_ref);
			
			$data_add = array();
			$data_add['notify_read'] = 1;
			
			$this->notification->update_notification_all($user_ref, $user_type_ref, $data_add);
		}
	}
}
	