<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('get_xdc_token_rate'))
{
    function get_xdc_token_rate()
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		
		$rcurlxdc = $CI->curl->simple_get('http://217.23.12.125:3000/api/todayxdcprice');
		$xdcpval = 0.1;
		
		if($rcurlxdc){
			$rcurlxdca = json_decode(stripslashes($rcurlxdc));
			if(strtolower($rcurlxdca->status) == 'success'){
				$xdcpval = $rcurlxdca->todayxdcprice;
			}
		}
		
		return $xdcpval;
    }
}

if (!function_exists('get_add_project_block_chain_status'))
{
	function get_add_project_block_chain_status($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		
		$project_status = '';
		
		$rcurladdp = $CI->curl->simple_post('http://217.23.12.125:3001/api/tradefinex/add/project', $options);
		
		if($rcurladdp){
			$project_status = $rcurladdp;
		}
		
		return $project_status;
    }
}

if (!function_exists('get_signin_status_with_otp'))
{
	function get_signin_status_with_otp($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		
		$signin_status = '';
		
		$rcurlsignin = $CI->curl->simple_post('http://217.23.12.125:3000/api/signin', $options);
		
		if($rcurlsignin){
			$signin_status = $rcurlsignin;
		}
		
		return $signin_status;
    }
}

if (!function_exists('get_xdc_balance'))
{
	function get_xdc_balance($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		
		$wallet_balance = '';
		
		$rcurlwbal = $CI->curl->simple_post('http://217.23.12.125:3000/api/balance', $options);
		
		if($rcurlwbal){
			$wallet_balance = $rcurlwbal;
		}
		
		return $wallet_balance;
    }
}

if (!function_exists('get_status_after_financier_payment_to_beneficiary'))
{
	function get_status_after_financier_payment_to_beneficiary($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		
		$fpayment_status = '';
		
		$rcurlpfstatus = $CI->curl->simple_post('http://217.23.12.125:3001/api/tradefinex/finance/project', $options);
		
		if($rcurlpfstatus){
			$fpayment_status = $rcurlpfstatus;
		}
		
		return $fpayment_status;
    }
}

if (!function_exists('get_status_after_beneficiary_payment_to_financier'))
{
	function get_status_after_beneficiary_payment_to_financier($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		
		$bpayment_status = '';
		
		$rcurlpbstatus = $CI->curl->simple_post('http://217.23.12.125:3001/api/tradefinex/distribute/returns', $options);
		
		if($rcurlpbstatus){
			$bpayment_status = $rcurlpbstatus;
		}
		
		return $bpayment_status;
    }
}

if (!function_exists('get_status_after_initiate_supplier'))
{
	function get_status_after_initiate_supplier($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		
		$isupplier_status = '';
		
		$rcurlisstatus = $CI->curl->simple_post('http://217.23.12.125:3002/api/trade/initiate/project', $options);
		
		if($rcurlisstatus){
			$isupplier_status = $rcurlisstatus;
		}
		
		return $isupplier_status;
    }
}

if (!function_exists('get_status_after_initiate_sub_supplier'))
{
	function get_status_after_initiate_sub_supplier($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		
		$isupplier_status = '';
		
		$rcurlisstatus = $CI->curl->simple_post('http://217.23.12.125:3002/api/trade/add/participant', $options);
		
		if($rcurlisstatus){
			$isupplier_status = $rcurlisstatus;
		}
		
		return $isupplier_status;
    }
}


if (!function_exists('get_status_after_completed_supplier'))
{
	function get_status_after_completed_supplier($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		
		$csupplier_status = '';
		
		$rcurlcsstatus = $CI->curl->simple_post('http://217.23.12.125:3002/api/trade/settle/project', $options);
		
		if($rcurlcsstatus){
			$csupplier_status = $rcurlcsstatus;
		}
		
		return $csupplier_status;
    }
}

if (!function_exists('get_status_after_terminate_supplier'))
{
	function get_status_after_terminate_supplier($options = array())
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		
		$tsupplier_status = '';
		
		$rcurltsstatus = $CI->curl->simple_post('http://217.23.12.125:3002/api/trade/cancel/project', $options);
		
		if($rcurltsstatus){
			$tsupplier_status = $rcurltsstatus;
		}
		
		return $tsupplier_status;
    }
}
