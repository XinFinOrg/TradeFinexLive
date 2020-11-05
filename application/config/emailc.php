<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// $config['$econfig'] = array(
// 			'protocol' => 'tls',
// 			'smtp_host' => 'ssl://mail-b02.cloudmailbox.in',
// 			'smtp_port' => 465,
// 			'smtp_user' => 'tradefinex@mail-b02.cloudmailbox.in', 
// 			'smtp_pass' => 'soL@88Ar',
// 			'wordwrap' => TRUE,
// 			'charset' => 'utf-8'
// 		 );

$config['$econfig'] = array(
	'protocol' => 'smtp',
	'smtp_host' => 'ssl://smtp.googlemail.com',
	'smtp_port' => 465,
	'smtp_user' => 'apps@xinfin.org', 
	'smtp_pass' => 'erezxflohuazwdbd', 
	'wordwrap' => TRUE,
	'charset' => 'utf-8',
	'send_multipart' => FALSE
	);