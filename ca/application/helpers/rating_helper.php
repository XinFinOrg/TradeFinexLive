<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Written by Souvik Saha */
/* Email : sahasouvik9@gmail.com */
/* Dated : 30-11-2017 */

if (!function_exists('set_rating_user'))
{
    function set_rating_user($rating)
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		$CI->load->helper('url');
		
		$rating_user = '';
				
		if($rating > 0){
			
			$whole = floor($rating);      
			$fraction = $rating - $whole;
			
			
			
			for($i = 1; $i <= $whole; $i++){
				$rating_user .= '<img class="star_img" src="'.base_url().'assets/images/icon/star-on.png">';
			}
			
			if($fraction > 0 && $fraction <= 0.8){
				$rating_user .= '<img class="star_img" src="'.base_url().'assets/images/icon/star-half.png">';
				$whole++;
			}
			
			if($fraction > 0.8){
				$rating_user .= '<img class="star_img" src="'.base_url().'assets/images/icon/star-on.png">';
				$whole++;
			}
			
			$lefts = 5 - $whole;
			
			if($lefts > 0){
				for($j = 1; $j <= $lefts; $j++){
					$rating_user .= '<img class="star_img" src="'.base_url().'assets/images/icon/star-off.png">';
				}
			}
											
		}else{
			for($i = 0; $i < 5; $i++){
				$rating_user .= '<img class="star_img" src="'.base_url().'assets/images/icon/star-off.png">';
			}
		}
		
		return $rating_user;
    }
}