<?php
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
			
			$insert = $this->Permission_Model->insert($data); 
			// echo "<pre>";
			// var_dump($data);
			// exit();

			if($insert){
				$this->session->set_flashdata('Successed', 'Successfully added new permission.');  
				redirect('permissions'); 
			}
		}
		else{
			$this->session->set_flashdata('Failed', 'Failed to add new permission.'); 
			redirect('permissions');
		}


	}

	public function view($id){ 
		
		if(!empty($id)){
			$data['perm'] = $this->Permission_Model->getRows($id);    
			$this->load->view('/permission/view', $data);
		}
		else{
			redirect('permissions'); 
		}
	}


	public function show_Perm_Edit_Form($id){
		
		$data['perm'] =  $this->Permission_Model->getRows($id); 
		$this->load->view( '/permission/edit' , $data);
		
	}

	public function edit($id){

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if($this->form_validation->run() == true){

			$data =array(
				'name' => $this->input-> post('name'), // 'fields_name'=> $this->input-> post_method('db_field')
				'description' => $this->input-> post('description') // 'fields_name'=> $this->input-> post_method('db_field')
			);

			$update = $this->Permission_Model->update($data, $id); // $this->model_name->update_database_query(input_array_variable)

			if($update){
				$this->session->set_flashdata('Successedu', 'Successfully updated new permission.');  
				redirect('permissions'); 
			}
		}
		else{
			$this->session->set_flashdata('Failedu', 'Failed to update a permission.'); 
			redirect('permissions');
		}
	}

	public function delete($id){

		if(!empty($id)){
			$delete = $this->Permission_Model->delete($id); // $this->model_name->delete($id);

			if($delete){
				$this->session->set_userdata('success_msgd','Successfully deleted');
			}else{
				$this->session->set_userdata('error_msgd','Failed to delete');
			}
		}

		redirect('permissions');
	}
	

 
}
?>