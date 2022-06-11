<?php

    // test : registration
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Registrations extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Reg_Model'); 

	}

	public function index(){
		// $data['permissions'] = $this->Permission_Model->getAllPermissions();
		// $this->load->view( '/group/group_add',$data); 

		$data['users'] = $this->Reg_Model->getUsers(); 
		// echo '<pre>';
		// var_dump($data);
		// exit;
		// echo '<pre>';
		//$data['user_group'] = $this->Reg_Model->getUserGroupName($id = '$data['users']=['group_id'] '); 
        $this->load->view('registration/reg_index', $data);
		
	}

	
	public function show_Reg_Form(){

		$data['groups'] = $this->Reg_Model->getAllGroups();
		$this->load->view( 'registration/reg_add', $data);
        //$this->load->view('registration/reg_add');
		
	}


	public function addRegistration(){

		// var_dump($_POST);
		// exit;
		if(isset($_FILES['image']['name']))
    	{
			$image = $_FILES['image']['name'];
			$path=$this->do_upload($image);
		}

		$this->form_validation->set_rules('username','Username','required');
		// $this->form_validation->set_rules('password','Password','required');
		// $this->form_validation->set_rules('email','Email','required');
		// $this->form_validation->set_rules('first_name','First_Name','required');
		// $this->form_validation->set_rules('last_name','Last_Name','required');
		// $this->form_validation->set_rules('phone','Phone','required');
		// $this->form_validation->set_rules('nid','NID','required');
		// //$this->form_validation->set_rules('nid_scan','NID_Scan','required'); 
		// $this->form_validation->set_rules('employee_address','Employee_Address','required');
		// $this->form_validation->set_rules('designation','Designation','required');
		// $this->form_validation->set_rules('profile_img','Profile_Img','required');
		// $this->form_validation->set_rules('group_id','Group_Id','required');

	

        if ($this->form_validation->run() == true)
        {

           
            $data = array(
                'username'        => $this->input->post('username'),
                'password'        => $this->input->post('password'),
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

			$this->Reg_Model->insert($data); 
			//$this->Reg_Model->addUser($data);
            // echo "<pre>";
            // var_dump($data);
			// exit();
			redirect('registrations');
		}
		else   
			{    
				
				echo "no";// $this->session->set_flashdata('fail', 'Failed to add new group.'); 
	        	// redirect('registrations');
			}
			// $this->session->set_flashdata('Success', 'Successfully added new group.');
		redirect('registrations');

	}


	// private function do_upload($image){
	// 	if(!empty($image)){
		
	// 		$type = explode('.',$_FILES["images"]["name"]);
	// 		$type = $type[count($type)-1];
	// 		$name = uniqid(rand()).'.'.$type;
	// 		$url = './assets/images/'.$name;//uniqid(rand()).'.'.$type;

	// 		if(in_array($type,array("jpg","jpeg","gif","png"))){
				
	// 			if(is_uploaded_file($_FILES["images"]["tmp_name"])){
					
	// 				if(move_uploaded_file($_FILES["images"]["tmp_name"],$url)){

	// 					return $name;
	// 				}
	// 			}	
	// 		}
	// 		return  "";		
	// 	}
	// }

}
?>