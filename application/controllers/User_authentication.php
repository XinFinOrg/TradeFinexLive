<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Authentication extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
        // Load google oauth library
        $this->load->library('google');
        
        // Load user model
        $this->load->model('user');
    }

    
    public function profile(){
        // Redirect to login page if the user not logged in
        if(!$this->session->userdata('loggedIn')){
            redirect('/user_authentication/');
        }
        
        // Get user info from session
        $data['userData'] = $this->session->userdata('userData');
        
        // Load user profile view
        $this->load->view('user_authentication/profile',$data);
    }
    
    public function logout(){
        // Reset OAuth access token
        //$this->google->revokeToken();
        
        // Remove token and user data from the session
        $this->session->unset_userdata('loggedIn');
        $this->session->unset_userdata('userData');
        
        // Destroy entire session data
        $this->session->sess_destroy();
        
        // Redirect to login page
        redirect('sociallogin/');
    }
    
}