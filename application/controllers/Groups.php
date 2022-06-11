<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Groups extends CI_Controller {

    function __construct(){
		
		parent::__construct();  
		$this->load->model('Group_Model');  
		$this->load->model('Permission_Model');

		$logged_info = $this->session->userdata('user');
		// var_dump($logged_info);
		// exit;
		$loggedin = $logged_info->id;
		if (!isset($loggedin)) { // putting session condition
				
			redirect('login');
			
		}

	}

	public function index(){ 
		$data['groups'] = $this->Group_Model->getRows(); 
        	$this->load->view('/group/group_index', $data);		
	} 

    // view post
	public function view($id){ 
		if(!empty($id)){
			$data['grp'] = $this->Group_Model->getRows($id);    
			$this->load->view('/group/group_view', $data);
		}
		else{
			redirect('groups'); 
		}
	}

	// add post 

	public function show_add_form(){	
		$data['permissions'] = $this->Group_Model->getAllPermissions();
		$this->load->view( '/group/group_add',$data);
	}


	function add() // action for form 
	{
		// echo "<pre>";
		// print_r($_POST);
		// exit;
		$this->form_validation->set_rules('rolename','Role Name','required');
		$this->form_validation->set_rules('roledescription','Description','required');

		if($this->form_validation->run() == true)
		{
			$data = array(
					'name' => $this->input-> post('rolename'), 
					'description' => $this->input-> post('roledescription')
				);
				if(count($this->input->post('permission')) == 0){
					$this->session->set_flashdata('checkboxValid','Please check at least one role');
					redirect('groups/show_add_form');
				}

			$role_id = $this->Group_Model->addRole($data);
			$permission = $this->input->post('permission');
			$permission_id = implode("-",$permission);
			$permission_role = array('group_id'=> $role_id, 'permission_id' => $permission_id );
			// echo $permission_id;
			// exit;
			$this->Group_Model->addPermission($permission_role);
			redirect('groups');
		}
	}


	function show_edit_form($id)
	{
		$data['roles']=$this->Group_Model->getRoles($id);
		$data['permission'] = $this->Group_Model->getAllPermissions();
		//$data['checked_permissions'] = $this->Permission_Model->getcheckedPermissions($id);
		//  echo "<pre>";
		//  print_r($data['roles']);exit;
		$this->load->view('group/group_edit',$data);
		//$this->load->view('group/group_edit');
	}

	/*
		update users group data
	*/
	function edit()
	{
		$this->form_validation->set_rules('name','Role Name','required');
		$this->form_validation->set_rules('description','Description','required');


		if($this->form_validation->run() == true)
		{
			$permission = $this->input->post('permission');
			// echo "<pre>";
			// print_r($this->input->post('role_id'));
			// exit;
			$permission_id = implode("-",$permission);
			$permission_role = array('permission_id' => $permission_id );
			$this->Group_Model->updateRole($this->input->post('role_id'),$permission_role);

			redirect('groups');

		}
	}

	// public function delete($id){

	// 	if($id){
	// 		$delete = $this->post_model->delete($id); // $this->model_name->delete($id);

	// 		if($delete){
	// 			$this->session->set_userdata('success_msg','Successfully deleted');
	// 		}else{
	// 			$this->session->set_userdata('error_msg','Failed to delete');
	// 		}
	// 	}

	// 	redirect('Posts_c/posts'); // '/posts' = '/posts/index'
	// }

	
		 
		 
}
	
 

?>