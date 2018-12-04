<?php

	// echo getcwd();

//
// A very simple PHP example that sends a HTTP POST to a remote site
//

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://www.example.com/tester.phtml");
curl_setopt($ch, CURLOPT_POST, 1);
/* curl_setopt($ch, CURLOPT_POSTFIELDS, "postvar1=value1&postvar2=value2&postvar3=value3"); */

// in real life you should use something like:
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('username' => 'souvik_cs@yahoo.com', 'password' => 'souvik123', 'MerchantCode' => 'TF', 'MerchantName' => 'tradefinex', 'APIKey' => '56e56af3-166d-400a-a9ec5-acdfg55-789', 'otpNo' => '')));

/*
{
	"username": "souvik_cs@yahoo.com",
	"password": "souvik123",
	"MerchantCode": "TF",
	"MerchantName": "tradefinex",
	"APIKey": "56e56af3-166d-400a-a9ec5-acdfg55-789",
	"otpNo": ""
}	
*/

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

// further processing ....
if ($server_output) {  
    
    echo '<pre>';
    print_r($server_output);
    
} else { }

?>


