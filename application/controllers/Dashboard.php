<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
        $logged_info = $this->session->userdata('user');
        $loggedin = $logged_info->id;
        if (!isset($loggedin)) {
            
           redirect('login');
            
        }
	}

	public function index(){
		 
        $this->load->view('dashboard');

	}
}
?>