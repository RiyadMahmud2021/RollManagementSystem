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
		 $username = $_POST['username'];  
		 $password = sha1($_POST['password']);  // 1 
		// var_dump($password);
		// exit;
		$data = $this->Users_Model->user_login($username, $password);   //2 
		// var_dump($data->id);
		// exit;
		// var_dump($data[$id]);
		// exit;

		 if($data){
		 	$this->session->set_userdata('user', $data);   // is 'user' a session name???

		// 	// echo $data->id;
		// 	// exit;
        // $logged_in_sess = array(
        //     'id' => $data->id,
        //     'logged_in' => TRUE   
        // );
        // var_dump($logged_in_sess);
		// exit;
        //     $this->session->set_userdata('loggedIn',$logged_in_sess);            
		// 	var_dump($logged_in_sess);
		// 	exit;
		 	$data1 = $this->Users_Model->getUserPermissions($data->id);
		// 	/*echo "<pre>";
		// 		print_r($data);
		// 		exit();*/
				

		 		$userPermissions = array();
		 		foreach ($data1 as $value) {
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