<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
require_once APPPATH.'libraries/facebook-php-sdk/autoload.php';

class User_Authentication extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
		$this->load->library('facebook');
		$this->load->model('user');
	}
	
	public function index()
	{
		$this->load->view('pages/public/bond_create',$_SESSION['token']);

	}
	public function fblogin()
	{
	  //   $fb = new Facebook\Facebook([
		// 	'app_id' => '2080555445396680',
		// 	'app_secret' => 'e169cd179a489dfc3901a69f9771d29e',
		// 	'default_graph_version' => 'v3.2',
		// 	'persistent_data_handler' => 'session'
			
		//   ]);
  
		// $helper = $fb->getRedirectLoginHelper();
		
		$fb = new \Facebook\Facebook([ 'app_id' => '2080555445396680', 'app_secret' => 'e169cd179a489dfc3901a69f9771d29e', 'default_graph_version' => 'v3.2', 'persistent_data_handler' => 'session' ]);
		$helper = $fb->getRedirectLoginHelper(); if (isset($_GET['state'])) { $helper->getPersistentDataHandler()->set('state', $_GET['state']); }
		$permissions = ['email']; 
	// For more permissions like user location etc you need to send your application for review
	
		$loginUrl = $helper->getLoginUrl('https://tradefinex.org/user_authentication/fbcallback', $permissions);
		header("location: ".$loginUrl);
	}	

	public function fbcallback()
	{
		// $fb = new Facebook\Facebook([
		// 	'app_id' => '2080555445396680',
		// 	'app_secret' => 'e169cd179a489dfc3901a69f9771d29e',
		// 	'default_graph_version' => 'v3.2',
		// 	'persistent_data_handler' => 'session'
			
		// 	]);
		$fb = new \Facebook\Facebook([ 'app_id' => '2080555445396680', 'app_secret' => 'e169cd179a489dfc3901a69f9771d29e', 'default_graph_version' => 'v3.2', 'persistent_data_handler' => 'session' ]);
		$helper = $fb->getRedirectLoginHelper(); if (isset($_GET['state'])) { $helper->getPersistentDataHandler()->set('state', $_GET['state']); }
			
			// $helper = $fb->getRedirectLoginHelper();  
	  
				if(isset($session)) {
					$accessToken = $session->getToken();
				} else {
					$accessToken = $helper->getAccessToken('https://tradefinex.org/user_authentication/fbcallback');
				}	 
				// echo $accessToken;
				// die;
				$_SESSION['token'] = $accessToken;
				// echo $_SESSION['token'];
				// die;
			  $response = $fb->get('/me?fields=id,name,email,first_name,last_name,birthday,location,gender', $accessToken);
			 	
			// User Information Retrival begins................................................
			$me = $response->getGraphUser();
			$userData['oauth_provider'] = 'facebook';
			$userData['oauth_uid']      = $me->getProperty('id');
			$userData['first_name']     = $me->getProperty('first_name');
			$userData['last_name']      = $me->getProperty('last_name');
			$userData['email']          = !empty($me->getProperty('email'))? $me->getProperty('email') : ' ';
			$userData['gender']         = !empty($me->getProperty('gender'))? $me->getProperty('gender') : ' ';
			$userData['locale']         = !empty($me->getProperty('locale'))? $me->getProperty('locale') : ' ';
			$userData['link']           = !empty($me->getProperty('link'))? $me->getProperty('link') : ' ';
			$userData['picture']        = !empty($me->getProperty('picture'))? $me->getProperty('picture') : ' ';
			$userID = $this->user->checkUser($userData);

			$this->session->set_userdata('loggedIn', true);
			$this->session->set_userdata('userData', $userData);

			
			redirect('publicv/bondCreate');
			
		 
	}
}
?>
