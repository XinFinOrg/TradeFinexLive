<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Written by Souvik Saha */
/* Email : sahasouvik9@gmail.com */
/* Dated : 30-11-2017 */

if (!function_exists('get_crediwatch_initial_search_result'))
{
    function get_crediwatch_initial_search_result($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		$rcurl_initial_search_array = array();
		$rcurl_initial_search = $CI->curl->simple_post('http://beta.crediwatch.com/api/search', $options);
		
		if($rcurl_initial_search){
			$rcurl_initial_search_array = json_decode(stripslashes($rcurl_initial_search), true);
		}
		
		return $rcurl_initial_search_array;
    }
} 
 
if (!function_exists('get_crediwatch_basic_search_result'))
{
    function get_crediwatch_basic_search_result($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		$rcurl_basic_search_array = array();
		$rcurl_basic_search = $CI->curl->simple_post('http://beta.crediwatch.com/api/search', $options);
		
		if($rcurl_basic_search){
			$rcurl_basic_search_array = json_decode(stripslashes($rcurl_basic_search), true);
		}
		
		return $rcurl_basic_search_array;
    }
}

if (!function_exists('get_crediwatch_product_search_result'))
{
	function get_crediwatch_product_search_result($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		$rcurl_product_search_array = array();
		$rcurl_product_search = $CI->curl->simple_post('http://beta.crediwatch.com/api/product', $options);
		
		if($rcurl_product_search){
			$rcurl_product_search_array = json_decode(stripslashes($rcurl_product_search), true);;
		}
		
		return $rcurl_product_search_array;
    }
}
