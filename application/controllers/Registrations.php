<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Registrations extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Reg_Model'); 
		
		$logged_info = $this->session->userdata('user');
        $loggedin = $logged_info->id;
        if (!isset($loggedin)) { // putting session condition
		
           redirect('login');
            
        }

	}

	public function index(){
		// $data['users'] = $this->Reg_Model->getUsers(); 
		$data['users'] = $this->Reg_Model->getUsersWithGroupName();
		// echo '<pre>';
		// print_r($data);
		// exit;
		// echo '<pre>';
        $this->load->view('registration/reg_index', $data);

		
	}

	public function show_Reg_Form(){

		$data['groups'] = $this->Reg_Model->getAllGroups();
		$this->load->view( 'registration/reg_add', $data);
		
	}

	public function addRegistration(){

		// var_dump($_POST);
		// exit;

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('email','Email','required');
		// $this->form_validation->set_rules('first_name','First_Name','required');
		// $this->form_validation->set_rules('last_name','Last_Name','required');
		// $this->form_validation->set_rules('phone','Phone','required');
		// $this->form_validation->set_rules('nid','NID','required');
		// //$this->form_validation->set_rules('nid_scan','NID_Scan','required'); 
		// $this->form_validation->set_rules('employee_address','Employee_Address','required');
		// $this->form_validation->set_rules('designation','Designation','required');
		// $this->form_validation->set_rules('user_group','User Group','required');
		// $this->form_validation->set_rules('group_id','Group_Id','required');

	

        if ($this->form_validation->run() == true)
        {
            $data = array( 
                'username'        => $this->input->post('username'),
                'password'        => sha1($this->input->post('password')),
                'email'           => $this->input->post('email'),
				'first_name'      => $this->input->post('first_name'),
				'last_name'       => $this->input->post('last_name'),
				'phone'           => $this->input->post('phone'),
                'nid'             => $this->input->post('nid'),
				'employee_address'=> $this->input->post('employee_address'),
				'designation'     => $this->input->post('designation'),
                //'profile_img'     => $path,
                'group_id'        => $this->input->post('user_group')
            );

			$addUser = $this->Reg_Model->addUser($data);
            // echo "<pre>";
            // var_dump($data);
			// exit();
			if($addUser){
				$this->session->set_flashdata('Successed', 'Successfully added new user.');
				redirect('registrations');
			}
		}
		else{    	
				// echo "no";
				$this->session->set_flashdata('Failed', 'Failed to add new user.'); 
				// $a = $this->session->flashdata('failed');
				// echo "<pre>";
				// print_r($a);
				// exit();
		}
		redirect('registrations');
	}


	public function show_edit_Form($id){
	
		$data['edit_users']  = $this->Reg_Model->getRowData($id);
	
		$data['groups'] = $this->Reg_Model->getAllGroups();
		// echo "<pre>";
		// print_r($data);
		// exit();
		//$data['users'] =$this->Reg_Model->edit(); 
		$this->load->view( '/registration/reg_edit',$data);

	}

	public function edit($id){

		// var_dump($_POST);
		// exit;

		$this->form_validation->set_rules('username','Username','required');
		// $this->form_validation->set_rules('password','Password','required'); // Notice for edit
		$this->form_validation->set_rules('email','Email','required');
		// $this->form_validation->set_rules('first_name','First_Name','required');
		// $this->form_validation->set_rules('last_name','Last_Name','required');
		// $this->form_validation->set_rules('phone','Phone','required');
		// $this->form_validation->set_rules('nid','NID','required');
		// //$this->form_validation->set_rules('nid_scan','NID_Scan','required'); 
		// $this->form_validation->set_rules('employee_address','Employee_Address','required');
		// $this->form_validation->set_rules('designation','Designation','required');
		// $this->form_validation->set_rules('user_group','User Group','required');
		// $this->form_validation->set_rules('group_id','Group_Id','required');


        if ($this->form_validation->run() == true){
			
            $edit_users = array( 
                'username'        => $this->input->post('username'),
                // 'password'        => sha1($this->input->post('password')), // Notice for edit
                'email'           => $this->input->post('email'),
				'first_name'      => $this->input->post('first_name'),
				'last_name'       => $this->input->post('last_name'),
				'phone'           => $this->input->post('phone'),
                'nid'             => $this->input->post('nid'),
				'employee_address'=> $this->input->post('employee_address'),
				'designation'     => $this->input->post('designation'),
                //'profile_img'     => $path,
                'group_id'        => $this->input->post('user_group')
            );

				$update = $this->Reg_Model->update($edit_users,  $id);
				// echo "<pre>";
				// print_r($edit_users);
				// exit();

				if($update){
					$this->session->set_flashdata('Successedu', 'Successfully updated a group.');  
					redirect('registrations');
				}

			}
			else{
				$this->session->set_flashdata('Failedu', 'Failed to update group.'); 
				redirect('registrations');
			}

	}

}
?>