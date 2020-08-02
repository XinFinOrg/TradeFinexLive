<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * LinkedIn OAuth Client for CodeIgniter 3.x
 *
 * Library for LinkedIn login. It helps the user to login with their LinkedIn account
 * in CodeIgniter application.
 *
 * This library requires the LinkedIn OAuth PHP client and it should be placed in third_party folder.
 *
 * It also requires linkedin configuration file and it should be placed in the config directory.
 *
 * @package     CodeIgniter
 * @category    Libraries
 * @author      CodexWorld
 * @license     http://www.codexworld.com/license/
 * @link        http://www.codexworld.com
 * @version     3.0
 */

Class LinkedIn{
	public $client;
    private $userData;

	public function __construct(){
		
		$CI =& get_instance();
		$CI->config->load('linkedin');
		
		// Include the oauth client library
		require APPPATH .'third_party/linkedin-oauth-client/http.php';
		require APPPATH .'third_party/linkedin-oauth-client/oauth_client.php';
		
		if(!isset($this->client)){
			$client = new oauth_client_class;
			$client->client_id = $CI->config->item('linkedin_api_key');
			$client->client_secret = $CI->config->item('linkedin_api_secret');
			$client->redirect_uri = base_url().$CI->config->item('linkedin_redirect_url');
			$client->scope = $CI->config->item('linkedin_scope');
			$client->debug = 1;
			$client->debug_http = 1;
			$application_line = __LINE__;
			
			if(strlen($client->client_id) == 0 || strlen($client->client_secret) == 0){
				die('Please go to LinkedIn Apps page https://www.linkedin.com/secure/developer?newapp= , '.
					'create an application, and in the line '.$application_line.
					' set the client_id to Consumer key and client_secret with Consumer secret. '.
					'The Callback URL must be '.$client->redirect_uri.'. Make sure you enable the '.
					'necessary permissions to execute the API calls your application needs.');
			}
			$this->client = $client;
		}
	}
    
    public function authenticate() {
		if($success = $this->client->Initialize()){
			if(($success = $this->client->Process())){
				if(strlen($this->client->authorization_error)){
					$this->client->error = $this->client->authorization_error;
					$success = false;
				}elseif(strlen($this->client->access_token)){
					$success = $this->client->CallAPI(
						'https://api.linkedin.com/v2/me?projection=(id,firstName,lastName,profilePicture(displayImage~:playableStreams))', 
						'GET', array(
							'format'=>'json'
						), array('FailOnAccessError'=>true), $userInfo);
					$emailRes = $this->client->CallAPI(
						'https://api.linkedin.com/v2/emailAddress?q=members&projection=(elements*(handle~))', 
						'GET', array(
							'format'=>'json'
						), array('FailOnAccessError'=>true), $userEmail);
					
					$userData = array(
						'account' => $userInfo,
						'email' => $userEmail
					);
					$this->userData = $userData;
				}
			}
			$success = $this->client->Finalize($success);
		}
		
		if($this->client->exit) exit;
		
		if(strlen($this->client->authorization_error)){
			$this->client->error = $this->client->authorization_error;
			$success = false;
		}
		return $success;
    }
	
	public function getUserInfo() {
        return $this->userData;
    }
}