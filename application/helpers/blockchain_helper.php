<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Written by Mansi */
/* Dated : 09-12-2019 */

if (!function_exists('createAddress'))
{
    function createAddress()
    {
        try{
            $output = array();
            $value = "createAcnt";
            
            $node = exec('cd && node test.js --func='.$value,$output);
            // var_dump($output);
            log_message('info','Get Address and Private Key'.$output.$value);
            return $output;
        
        }
        catch (Exception $e) {
            log_message("error".$e->getMessage());
            return '0';
        }
        
    }
}
if (!function_exists('getBalance'))
{
    function getBalance($addr)
    {
        try{
            $output = array();
            $value = "getBal";
            $node = exec('cd && node test.js --func='.$value.' --addr='.$addr,$output);
            // var_dump($output);
            log_message('info','Get Balance of>>'.$addr);
            return $node;
        
        }
        catch (Exception $e) {
            log_message("error".$e->getMessage());
            return '0';
        }
        
    }
}
if (!function_exists('sendTokens'))
{
    function sendTokens($privKey,$toAddr,$value)
    {
        try{
            $output = array();
            $func = "signTx";
            $node = exec('cd && node test.js --func='.$func.' --privKey='.$privKey.' --to='.$toAddr.' --value='.$value,$output);
            // var_dump($output);
            log_message('info','send Tokens>>'.$output);
            return $output;
        
        }
        catch (Exception $e) {
            log_message("error".$e->getMessage());
            return '0';
        }
        
    }
}

if (!function_exists('cmcModule'))
{
    function cmcModule()
    {
        $CI =& get_instance();
		$CI->load->library('curl');
		
		$rcurlxdc = $CI->curl->simple_get('https://api.coinmarketcap.com/v1/ticker/xinfin-network/');
		
		if($rcurlxdc){
			$rcurlxdca = json_decode(stripslashes($rcurlxdc));
            if(strtolower($rcurlxdca->status) == 'success'){
				$xdcpval = $rcurlxdca->todayxdcprice;
			}
		}
		
		return json_decode(stripslashes($rcurlxdc));
    }
}

if (!function_exists('getFinancier'))
{
    function getFinancier($key)
    {
        try{
            $output = array();
            $node = exec('cd node_scripts && node index.js --privKey='.$key,$output);
            // var_dump($output);
            // log_message('info','private key exist'.$node);
            return $node;
        
        }
        catch (Exception $e) {
            log_message("error".$e->getMessage());
            return '0';
        }
        
    }
}

if (!function_exists('getAddress'))
{
    function getAddress($key)
    {
        try{
            $output = array();
            $node = exec('cd node_scripts && node paypal.js --privKey='.$key,$output);
            // var_dump($output);
            // log_message('info','private key exist'.$node);
            return $node;
        
        }
        catch (Exception $e) {
            log_message("error".$e->getMessage());
            return '0';
        }
        
    }
}

if (!function_exists('getConversion'))
{
    function getConversion($currency)
    {
        try{
            $CI =& get_instance();
            $CI->load->library('curl');
            
            $rcurlxdc = $CI->curl->simple_get('https://free.currconv.com/api/v7/convert?q='. $currency .'_USD&compact=ultra&apiKey=d1688fd33c2d3d944d5d');
            
            if($rcurlxdc){
                $rcurlxdca = json_decode($rcurlxdc);
                // log_message("info","Currency conversion".$rcurlxdca);
            }
		
		return $rcurlxdca;
    
        
        }
        catch (Exception $e) {
            log_message("error".$e->getMessage());
            return '0';
        }
        
    }
}
if (!function_exists('getConverted'))
{
    function getConverted($currency)
    {
        try{
            $CI =& get_instance();
            $CI->load->library('curl');
            
            $rcurlxdc = $CI->curl->simple_get('https://free.currconv.com/api/v7/convert?q=USD_'. $currency .'&compact=ultra&apiKey=d1688fd33c2d3d944d5d');
            
            if($rcurlxdc){
                $rcurlxdca = json_decode($rcurlxdc);
                // log_message("info","Currency conversion".$rcurlxdca);
            }
		
		return $rcurlxdca;
    
        
        }
        catch (Exception $e) {
            log_message("error".$e->getMessage());
            return '0';
        }
        
    }
}

if (!function_exists('burnXDC'))
{
    function burnXDC($amount)
    {
        try{
            $output = array();
            $node = exec('cd node_scripts && node paypal_burn.js --amnt='.$amount,$output);
            // var_dump($output);
            log_message('info','Burn'.$output);
            return $output;
        
        }
        catch (Exception $e) {
            log_message("error".$e->getMessage());
            return '0';
        }
        
    }
}

// if (!function_exists('getXDCburntValue'))
// {
//     function getXDCburntValue()
//     {
//         try{
//             $CI =& get_instance();
//             $CI->load->library('curl');
            
//             $rcurlxdc = $CI->curl->simple_post('https://explorerapi.xinfin.network/totalBurntValue');
            
//             if($rcurlxdc){
//                 $rcurlxdca = json_decode($rcurlxdc);
//                 log_message("info","XDC Burnt".$rcurlxdc);
//             }
		
// 		return $rcurlxdc;
    
        
//         }
//         catch (Exception $e) {
//             log_message("error".$e->getMessage());
//             return '0';
//         }
        
//     }
// }

// if (!function_exists('getmasternode'))
// {
//     function getmasternode()
//     {
//         try{
//             $CI =& get_instance();
//             $CI->load->library('curl');
            
//             $rcurlxdc = $CI->curl->simple_post('https://explorerapi.xinfin.network/totalMasterNodes');
            
//             if($rcurlxdc){
//                 $rcurlxdca = json_decode($rcurlxdc);
//                 log_message("info","XDC masternodes".$rcurlxdc);
//             }
		
// 		return $rcurlxdc;
    
        
//         }
//         catch (Exception $e) {
//             log_message("error".$e->getMessage());
//             return '0';
//         }
        
//     }
// }

// if (!function_exists('stakedXDC'))
// {
//     function stakedXDC()
//     {
//         try{
//             $CI =& get_instance();
//             $CI->load->library('curl');
            
//             $rcurlxdc = $CI->curl->simple_post('https://explorerapi.xinfin.network/totalStakedValue');
            
//             if($rcurlxdc){
//                 $rcurlxdca = json_decode($rcurlxdc);
//                 log_message("info","XDC staked".$rcurlxdc);
//             }
		
// 		return $rcurlxdc;
    
        
//         }
//         catch (Exception $e) {
//             log_message("error".$e->getMessage());
//             return '0';
//         }
        
//     }
// }

// if (!function_exists('totalXDC'))
// {
//     function totalXDC()
//     {
//         try{
//             $CI =& get_instance();
//             $CI->load->library('curl');
            
//             $rcurlxdc = $CI->curl->simple_post('https://explorerapi.xinfin.network/publicAPI?module=balance&action=totalXDC&apikey=YourApiKeyToken');
            
//             if($rcurlxdc){
//                 $rcurlxdca = json_decode($rcurlxdc);
//                 log_message("info","Total XDC".$rcurlxdc);
//             }
		
// 		return $rcurlxdca;
    
        
//         }
//         catch (Exception $e) {
//             log_message("error".$e->getMessage());
//             return '0';
//         }
        
//     }
// }

// if (!function_exists('todayRewards'))
// {
//     function todayRewards()
//     {
//         try{
//             $CI =& get_instance();
//             $CI->load->library('curl');
            
//             $rcurlxdc = $CI->curl->simple_post('https://explorer.xinfin.network/todayRewards');
            
//             if($rcurlxdc){
//                 $rcurlxdca = json_decode($rcurlxdc);
//                 log_message("info","Total XDC".$rcurlxdc);
//             }
		
// 		return $rcurlxdca;
    
        
//         }
//         catch (Exception $e) {
//             log_message("error".$e->getMessage());
//             return '0';
//         }
        
//     }
// }

// if (!function_exists('xdcVolume'))
// {
//     function xdcVolume()
//     {
//         try{
//             $CI =& get_instance();
//             $CI->load->library('curl');
            
//             $rcurlxdc = $CI->curl->simple_get('https://api2.alphaex.net/api/xdcVolume');
            
//             if($rcurlxdc){
//                 $rcurlxdca = json_decode($rcurlxdc);
//                 log_message("info","XDC Volume".$rcurlxdc);
//             }
		
// 		return $rcurlxdca;
    
        
//         }
//         catch (Exception $e) {
//             log_message("error".$e->getMessage());
//             return '0';
//         }
        
//     }
// }

if (!function_exists('getXinFinStats'))
{
    function getXinFinStats()
    {
        try{
            $CI =& get_instance();
            $CI->load->library('curl');
            
            $rcurlxdc = $CI->curl->simple_post('https://explorer.xinfin.network/getXinFinStats');
            
            if($rcurlxdc){
                $rcurlxdca = json_decode($rcurlxdc);
                log_message("info","Xinfin Stats".$rcurlxdc);
            }
		
		return $rcurlxdca;
    
        
        }
        catch (Exception $e) {
            log_message("error".$e->getMessage());
            return '0';
        }
        
    }
}
