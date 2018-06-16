<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Written by Souvik Saha */
/* Email : sahasouvik9@gmail.com */
/* Dated : 30-11-2017 */

if (!function_exists('get_notification_status'))
{
    function get_initial_notification_status()
    {
		$data = array();
		$data['f_notification'] = 0;
		$data['p_notification'] = 0;
		$data['b_notification'] = 0;
		$data['pp_notification'] = 0;
		$data['ppex_notification'] = 0;
		
		return $data;
	}
	
	function get_notification_status($options = array())
    {
        $CI =& get_instance();
		$CI->load->helper(array('url', 'date', 'crediwatch'));
		$CI->load->library(array('session', 'encrypt'));
		$CI->load->model(array('manage', 'plisting'));
		
		$data = array();
		
		$user_type = $options['user_type'];
		$user_id = $options['user_id'];
		$nresult = $CI->manage->get_notification_setting($user_id, $user_type);
		
		$data['f_notification'] = 0;
		$data['p_notification'] = 0;
		$data['b_notification'] = 0;
		$data['pp_notification'] = 0;
		$data['ppex_notification'] = 0;
			
		if(!empty($nresult) && is_array($nresult) && sizeof($nresult) <> 0){
			
			if($user_type == 1){
				$data['b_notification'] = $nresult[0]->tfsp_benif_notification;
				$data['pp_notification'] = $nresult[0]->tfsp_posted_project_visibility;
			}

			if($user_type == 2){
				$data['b_notification'] = $nresult[0]->tff_benif_notification;
				$data['pp_notification'] = $nresult[0]->tff_posted_project_visibility;
			}
			
			if($user_type == 3){
			
				$data['f_notification'] = $nresult[0]->tfb_financier_notification;
				$data['p_notification'] = $nresult[0]->tfb_provider_notification;
				$data['pp_notification'] = $nresult[0]->tfb_project_post_visibility;
				$data['ppex_notification'] = $nresult[0]->tfb_project_expiration_visibility;
			}
		}
		
		return $data;
    }
	
	function create_notification($ntype, $nid, $from_user_id, $from_user_type, $projecct_ref, $proposal_ref, $to_user_id, $to_user_type, $message)
    {
		
		
	
	}
} 