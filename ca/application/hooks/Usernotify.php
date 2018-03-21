<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Usernotify{
    
	private $CI;

    function __construct() {
		
		$this->CI =& get_instance();

        if(!isset($this->CI->session)){  //Check if session lib is loaded or not
            $this->CI->load->library('session');  //If not loaded, then load it here
        }
		
		$this->CI->load->helper(array('url', 'date'));
		$this->CI->load->model(array('notification', 'manage', 'plisting'));
	}

    public function Create_Notification()
    {
        $this->CI =& get_instance();
        $class = $this->CI->router->fetch_class();
		
		$data = array();
		
		$data['user_id'] = 0;
		$data['user_type'] = '';
		$data['full_name'] = '';
		$data['user_typer'] = '';
		$data['notification_count'] = 0;
		$data['nofifya'] = array();
		$data['narrkey'] = array();
		$nofifya = array();
		$narrkey = array();
		
        if($class == 'project' || $class == 'listing') {
            // Hook procedures
			$user = $this->CI->session->userdata('logged_in');
			
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
				
				$userinfo = $this->CI->manage->get_all_user_info();
				$count = 0;
						
				if(!empty($userinfo) && is_array($userinfo) && sizeof($userinfo) <> 0){
					
					foreach($userinfo as $urow){
						
						$data['f_notification'] = 0;
						$data['p_notification'] = 0;
						$data['b_notification'] = 0;
						$data['pp_notification'] = 0;
						
						$user_id = $urow->tfu_id;
						$user_type_ref = $urow->tfu_utype;
						
						$nresult = $this->CI->manage->get_notification_setting($user_id, $user_type_ref);
				
						if(!empty($nresult) && is_array($nresult) && sizeof($nresult) <> 0){
							
							if($user_type_ref == 1){
								$data['b_notification'] = $nresult[0]->tfsp_benif_notification;
							}

							if($user_type_ref == 2){
								$data['b_notification'] = $nresult[0]->tff_benif_notification;
							}
							
							if($user_type_ref == 3){
							
								$data['f_notification'] = $nresult[0]->tfb_financier_notification;
								$data['p_notification'] = $nresult[0]->tfb_provider_notification;
								$data['pp_notification'] = $nresult[0]->tfb_project_post_visibility;
							}
						}
								
						$user_ref = $user_id;
									
						if($user_type_ref == 3){
							
							if($data['p_notification'] == 1){
							
								$nresult = $this->CI->notification->get_proposal_provider_notification();
							
								if($nresult && !empty($nresult) && sizeof($nresult) <> 0){
									
									$notification_count += sizeof($nresult);
									
									foreach($nresult as $nrow){
										
										$narrkey[strtotime($nrow->tpp_posted)] = $count;
										$nofifya[$count]['notify_type'] = 'provider_proposal';
										$nofifya[$count]['notify_id'] = $nrow->tpp_id;
										$nofifya[$count]['notify_project'] = $nrow->tpp_project_ref;
										
										$user_info = $this->CI->manage->get_user_info_by_id($nrow->tpp_user_ref);
										
										$nofifya[$count]['notify_user_ref'] = $nrow->tpp_user_ref;
										$nofifya[$count]['notify_user_type_ref'] = $user_info[0]->tfu_utype;
										$nofifya[$count]['notify_text'] = 'Proposal from '.ucwords($user_info[0]->tfsp_fname.' '.$user_info[0]->tfsp_lname).'(Provider)';
										$nofifya[$count++]['notify_time'] = $nrow->tpp_posted;
									}
								}
							}
							
							if($data['f_notification'] == 1){
							
								$nresult = $this->CI->notification->get_proposal_financier_notification();
						
								if($nresult && !empty($nresult) && sizeof($nresult) <> 0){
									
									$notification_count += sizeof($nresult);
									
									foreach($nresult as $nrow){
										
										$narrkey[strtotime($nrow->tpf_posted)] = $count;
										$nofifya[$count]['notify_type'] = 'financier_proposal';
										$nofifya[$count]['notify_id'] = $nrow->tpf_id;
										$nofifya[$count]['notify_project'] = $nrow->tpf_project_ref;
										
										$user_info = $this->CI->manage->get_user_info_by_id($nrow->tpf_user_ref);
										
										$nofifya[$count]['notify_user_ref'] = $nrow->tpf_user_ref;
										$nofifya[$count]['notify_user_type_ref'] = $user_info[0]->tfu_utype;
										$nofifya[$count]['notify_text'] = 'Proposal from '.ucwords($user_info[0]->tff_fname.' '.$user_info[0]->tff_lname).'(Financier)';
										$nofifya[$count++]['notify_time'] = $nrow->tpf_posted;
									}
								}
							}
						}
						
						if($user_type_ref == 1){
							
							if($data['b_notification'] == 1){
									
								$nresult = $this->CI->notification->get_proposal_accept_provider_notification($data['user_id']);
								
								if($nresult && !empty($nresult) && sizeof($nresult) <> 0){
									
									$notification_count += sizeof($nresult);
									
									foreach($nresult as $nrow){
										
										$narrkey[strtotime($nrow->tpp_beneficiary_accept_time)] = $count;
										$nofifya[$count]['notify_type'] = 'provider_proposal_received';
										$nofifya[$count]['notify_id'] = $nrow->tpp_id;
										
										$nofifya[$count]['notify_project'] = $nrow->tpp_project_ref;
										
										$user_info = $this->CI->manage->get_user_info_by_id($nrow->tpp_project_user_ref);
										
										$nofifya[$count]['notify_user_ref'] = $nrow->tpp_project_user_ref;
										$nofifya[$count]['notify_user_type_ref'] = $user_type_ref;
										
										if($nrow->tpp_beneficiary_accept == 1){
											$nofifya[$count]['notify_text'] = 'Proposal accepted by '.ucwords($user_info[0]->tfb_fname.' '.$user_info[0]->tfb_lname).'(Beneficiary)';
										}
										
										if($nrow->tpp_beneficiary_accept == 2){
											$nofifya[$count]['notify_text'] = 'Proposal rejected by '.ucwords($user_info[0]->tfb_fname.' '.$user_info[0]->tfb_lname).'(Beneficiary)';
										}
										
										$nofifya[$count++]['notify_time'] = $nrow->tpp_posted;
									}
								}
							}	
						}	
						
						if($user_type_ref == 2){
							
							if($data['b_notification'] == 1){
								
								$nresult = $this->CI->notification->get_proposal_accept_financier_notification($data['user_id']);
								
								if($nresult && !empty($nresult) && sizeof($nresult) <> 0){
									
									$notification_count += sizeof($nresult);
									
									foreach($nresult as $nrow){
										
										$narrkey[strtotime($nrow->tpf_beneficiary_accept_time)] = $count;
										$nofifya[$count]['notify_type'] = 'financier_proposal_received';
										$nofifya[$count]['notify_id'] = $nrow->tpf_id;
										
										$nofifya[$count]['notify_project'] = $nrow->tpf_project_ref;
										
										$user_info = $this->CI->manage->get_user_info_by_id($nrow->tpf_project_user_ref);
										
										$nofifya[$count]['notify_user_ref'] = $nrow->tpf_project_user_ref;
										$nofifya[$count]['notify_user_type_ref'] = $user_type_ref;
										
										if($nrow->tpf_beneficiary_accept == 1){
											$nofifya[$count]['notify_text'] = 'Proposal accepted by '.ucwords($user_info[0]->tfb_fname.' '.$user_info[0]->tfb_lname).'(Beneficiary)';
										}
										
										if($nrow->tpf_beneficiary_accept == 2){
											$nofifya[$count]['notify_text'] = 'Proposal rejected by '.ucwords($user_info[0]->tfb_fname.' '.$user_info[0]->tfb_lname).'(Beneficiary)';
										}
										
										$nofifya[$count++]['notify_time'] = $nrow->tpf_posted;
									}
								}
							}	
						}
						
						if($user_type_ref == 1 || $user_type_ref == 2){
						
							if($data['b_notification'] == 1){
								
								$nresult = $this->CI->notification->get_project_invites_notification($user_ref, $user_type_ref);
								
								if($nresult && !empty($nresult) && sizeof($nresult) <> 0){
									
									$notification_count += sizeof($nresult);
									
									foreach($nresult as $nrow){
										
										$narrkey[strtotime($nrow->tfpi_created)] = $count;
										$nofifya[$count]['notify_type'] = 'invitaion_received';
										$nofifya[$count]['notify_id'] = $nrow->tfpi_id;
										$nofifya[$count]['notify_project'] = $nrow->tfpi_project_ref;
										
										$project_info = $this->CI->plisting->get_project_info_by_id($nrow->tfpi_project_ref);
										$user_info = $this->CI->manage->get_user_info_by_id($project_info[0]->userID);
										
										$nofifya[$count]['notify_user_ref'] = $project_info[0]->userID;
										$nofifya[$count]['notify_user_type_ref'] = $project_info[0]->userType;
										$nofifya[$count]['notify_text'] = 'Project invitation from '.ucwords($user_info[0]->tfb_fname.' '.$user_info[0]->tfb_lname).'(Beneficiary)';
										$nofifya[$count++]['notify_time'] = $nrow->tfpi_created;
									}
								}
							}	
						}
					}
				}
				
				// $this->CI->manage->save_notification($nofifya);
			}
        }
    }
}