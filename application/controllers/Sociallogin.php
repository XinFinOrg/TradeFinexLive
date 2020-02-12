<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sociallogin extends CI_Controller {

public function __construct()
{
	parent::__construct();
	require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
	$this->load->model('user');
	$this->load->model(array('manage', 'plisting'));
	$this->output->delete_cache();
	$this->load->library(array('session', 'encrypt'));
		
	$this->load->helper('form','url','date');
}
	
	public function index()
	{
		$this->load->view('pages/bond_create');
	}
	
	
	public function login()
	{
		
		$clientId = '974340167294-4tm547181uu7v0gtqj4d1bv4gp1ffugq.apps.googleusercontent.com'; //Google client ID
		$clientSecret = 's1gEY7eIayJBjcYHbsvnA8Ha'; //Google client secret
		$redirectURL = base_url().'sociallogin/login';
		// $redirectURL = 'http://localhost/DemoTradeFinex/sociallogin/login';
		
			
		
		//Call Google API
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if(isset($_GET['code']))
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) 
		{
			$gClient->setAccessToken($_SESSION['token']);
		}
		
		if ($gClient->getAccessToken()) {
			$gpInfo = $google_oauthV2->userinfo->get();
			
			$userData['oauth_provider'] = 'google';
			$userData['oauth_uid']      = $gpInfo['id'];
			$userData['first_name']     = $gpInfo['given_name'];
			$userData['last_name']      = $gpInfo['family_name'];
			$userData['email']          = $gpInfo['email'];
			$userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:'';
			$userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:'';
			$userData['link']           = !empty($gpInfo['link'])?$gpInfo['link']:'';
			$userData['picture']        = !empty($gpInfo['picture'])?$gpInfo['picture']:'';
		
			$userID = $this->user->checkUser($userData);
			
			
			$this->session->set_userdata('loggedIn', true);
			$this->session->set_userdata('userData', $userData);

			
			redirect('publicv/bondCreate');
			// $this->load->view('user_authentication/profile',$userData);

			// echo "<pre>";
			// print_r($userData);
			// die;
			
        } 
		else 
		{
            $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
		}
		
		
	}	

	

}
