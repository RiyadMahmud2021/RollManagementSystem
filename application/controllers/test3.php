<?php
// Permission 
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Permissions extends CI_Controller {

    function __construct(){
		parent::__construct();  
		$this->load->model('Permission_Model');

		$logged_info = $this->session->userdata('user');
        $loggedin = $logged_info->id;
        if (!isset($loggedin)) { // putting session condition
		
           redirect('login');
            
        }

	}

	public function index(){
		    
		$data = array(); 
		$data['permiss'] = $this->Permission_Model->getRows(); 

        $this->load->view('/permission/index', $data);
       		
	}

	public function show_Perm_Form(){

		$this->load->view('/permission/add'); 
		
	}

	// add post  
	public function add(){

		// var_dump($_POST);
		// exit; 

		$this->form_validation->set_rules('name', 'Name', 'required'); 
		$this->form_validation->set_rules('description', 'Description', 'required');  

		if( $this-> form_validation->run() == true ){

			$data = array(
				'name' => $this->input-> post('name'), 
				'description' => $this->input-> post('description'),
		
			);
		// var_dump($data);
		// exit;
			
			$insert = $this->Permission_Model->insert($data); 

			if($insert){
				$this->session->set_flashdata('successed', 'successed to add new group.');  
				redirect('permissions'); 
			}else{
				$this->session->set_flashdata('failed', 'Failed to add new group.'); 
	        	redirect('permissions');
			}
		}

		//$this->load->view('/permission/add');
		// var_dump($data);
		// exit;
		// $data['action'] = 'Add'; 
	}

	public function view($id){ 
		
		$data = array();  

		if(!empty($id)){
			$data['pos'] = $this->Permission_Model->getRows($id);    
			$this->load->view('/permission/view', $data);
		}
		else{
			redirect('permissions'); 
		}
	}
		// update post

	    public function edit($id){

	// 		$data = array();	
	// 		$postData = $this->Permission_Model->getRows($id); 

	// 		$submit = $this->input->post('postSubmit'); 

	// 		if($submit){
	// 			// validation rule setting it explains how form_validation will be complete
	// 			$this->form_validation->set_rules('name', 'Name', 'required');
	// 			$this->form_validation->set_rules('description', 'Description', 'required');

	// 			// form input data is taking on another array $postData 
	// 			$postData =array(
	// 				'name' => $this->input-> post('name'), // 'fields_name'=> $this->input-> post_method('db_field')
	// 				'description' => $this->input-> post('description') // 'fields_name'=> $this->input-> post_method('db_field')
	// 			);

	// 			// check validation
	// 			if( $this-> form_validation->run() == true ){
	// 				$update = $this->Permission_Model->update($postData, $id); // $this->model_name->update_database_query(input_array_variable)

	// 				if($update){
	// 					$this->session->set_userdata('success_msg', 'Successfully updated.');
	// 					redirect('permissions'); // '/posts' = '/posts/index'
	// 				}else{
	// 					$data['error_msg'] = 'Failed to update';
	// 				}
	// 			}

	// 		}
	// 	$data['pos'] = $postData; // all data of post putting on $data as posts key
		 
	// 	$this->load->view( '/permission/edit' , $data);
		 
	}

	

 
}
?>