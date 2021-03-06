<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->library('session');
		// $this->load->helper('url');  
		$this->load->model('Users_Model');   
	}

	public function index(){
	
        $this->load->view('login_view');
	
	}

	public function login(){

		# Getting form input data 1
		$username = $_POST['username'];  
		$password = sha1($_POST['password']);   
		// var_dump($password);
		// exit;

		# Form input sending to model for checking inputs 2
		$data = $this->Users_Model->User_login($username, $password);   
		// echo "<pre>";
		// var_dump($data->id);
		// exit;
		// var_dump($data[$id]);
		// exit; 
		// echo "<pre>";
		// print_r($data->username);
		// exit;

		# Sessions creation (user and user permissins) 
		 if($data){ 
		 	$this->session->set_userdata('user', $data);   // is 'user' a session name???
			// echo $data->id;
			// exit;
		 	$data1 = $this->Users_Model->getUserPermissionsID($data->id);
			// echo "<pre>";
			// print_r($data1);
			// exit;

			$value = explode('-',$data1->permission_id);
			// echo "<pre>";
			// print_r($value);
			// exit;

			$haveUserPermissions = $this->Users_Model->getUserPermissionsById($value);
			
			// echo "<pre>";
			// print_r($haveUserPermissions);
			// exit();
				
			$userPermissions = array();
			foreach ($haveUserPermissions as $value) {
				array_push($userPermissions, $value->name);
			}
			
			$this->session->set_userdata("userPermissions",$userPermissions);

			redirect('Dashboard');

		 }
		 else{

			header('location:'.base_url().$this->index());
		 	$this->session->set_flashdata('error','Invalid login. User not found');

		 } 

	}


	public function logout(){
		 
		$this->session->unset_userdata('user');
		redirect('/');  

	}

}
?>