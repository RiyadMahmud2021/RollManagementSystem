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
		$data['permissions'] = $this->Permission_Model->getAllPermissions();
		$this->load->view( '/group/group_add',$data);
	}


	function add() // action for form 
	{
		// var_dump($_POST);
		// exit;
		$this->form_validation->set_rules('rolename','Role Name','required');
		$this->form_validation->set_rules('roledescription','Description','required');

		if($this->form_validation->run() == true)
		{
			$data = array(
					'name' => $this->input-> post('rolename'), 
					'description' => $this->input-> post('roledescription')
				);
					// same as below
			// $data['name']=$this->input->post('name');
			// $data['description']=$this->input->post('description');

			$role_id = $this->Group_Model->addRole($data);

			
			$permission = $this->input->post('permission');	
			$permission_role=array();
			if(isset($role_id)){
				$i=0;
				foreach ($permission as $value) {
					$permission_role[$i]=array(
						'permission_id' => $value,
						'group_id'       => $role_id 
					);
					$i++;
				}			
			}
			else   
			{    
				$this->session->set_flashdata('fail', 'Failed to add new group.'); 
	        	redirect('groups');
			}

			$this->Permission_Model->addPermissionRole($permission_role);
			redirect('groups');
		}
	}


	function show_edit_form($id)
	{
		

		$data['roles']=$this->Permission_Model->getRoles($id);
		$data['permission'] = $this->Permission_Model->getAllPermissions();
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
		//$this->form_validation->set_rules('description','Description','required');




		if($this->form_validation->run() == true)
		{

			$this->Group_Model->updateRole();

			redirect('groups');
			// if($this->Permission_Model->updateRole($group_data))
			// {
			// 	if($form_id == $database_id){
			// 		redirect('Permission','referesh');	
			// 	}
			// 	else{
			// 		$permission_role=array();
			// 		if(isset($id)){
			// 			$i=0;
						
			// 			foreach ($permission as $value) {
			// 				$permission_role[$i]=array(
			// 					'permission_id' => $value,
			// 					'role_id'       => $id
			// 				);
			// 				$i++;
			// 			}			
			// 		}
			// 		if($this->Permission_Model->deletePermissionRole($id))
			// 		{
			// 			$this->Permission_Model->addPermissionRole($permission_role);	
			// 			redirect('permission','referesh');
			// 		}
			// 	}	
			// }
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