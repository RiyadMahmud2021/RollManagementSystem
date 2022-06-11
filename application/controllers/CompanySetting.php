<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class CompanySetting extends CI_Controller {

	function __construct(){
		parent::__construct(); 
		$this->load->model('Company_Setting');	
				// echo '<pre>';
				// var_dump($this->load);
				// exit; 
		$logged_info = $this->session->userdata('user');
          $loggedin = $logged_info->id;

        if (!isset($loggedin)) { // putting session condition
		
           redirect('login');
        
        }
	}

	public function index(){
		
		$data['countries']  = $this->Company_Setting->getCountry();
		$data['states']  = $this->Company_Setting->getState();
		$data['data']     = $this->Company_Setting->getData();
		// echo '<pre>';
		// print_r($data);
		// exit; 
        	$this->load->view('company_setting', $data);  
		// //echo '<pre>';
		// var_dump($this->load);
		// exit; 
	}

	public function add_company(){
			
			$this->form_validation->set_rules('name','name','required');  
			$this->form_validation->set_rules('short_name','short_name','required');
			$this->form_validation->set_rules('email','email','required');  
			$this->form_validation->set_rules('phone','phone','required');  
			// $this->form_validation->set_rules('bank_name"','bank_name"','required');  
			// $this->form_validation->set_rules('ac_no','ac_no','required');  
			// $this->form_validation->set_rules('gstin','short_name','required');  
			// $this->form_validation->set_rules('street','street','required');  
			// $this->form_validation->set_rules('country','country','required');  
			// $this->form_validation->set_rules('state','state','required'); 
			// $this->form_validation->set_rules('zipcode','zipcode','required'); 
			// $this->form_validation->set_rules('login_logo','country','required'); 
			// $this->form_validation->set_rules('invoice_logo','country','required'); 

			if ($this->form_validation->run() == true)
			{
				$fileName = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_",$_FILES['login_logo']['name']); // no extention in db and image folder
				$destinationWithFileName = "asset/images/".$fileName; // associative array: contains a key( input field name) and value
				$tempFilenameWithTempPath = $_FILES['login_logo']['tmp_name'];
				// echo '<pre>';
				// print_r($tempFilenameWithTempPath);
				// exit; 
				move_uploaded_file($tempFilenameWithTempPath,$destinationWithFileName);
	
				$data = array(

					'name'            => $this->input->post('name'),
					'short_name'      => $this->input->post('short_name'),
					'email'           => $this->input->post('email'),
					'phone'     	  => $this->input->post('phone'),
					'street'       	  => $this->input->post('street'),
					'state'           => $this->input->post('state'),
					'zip_code'        => $this->input->post('zipcode'),
					'country_id'	  => $this->input->post('country'),
					'gstin'        	  => $this->input->post('gstin'),
					'bank_name'       => $this->input->post('bank_name'),
					'ac_no'           => $this->input->post('ac_no'),
					'loginpage_image'     => $destinationWithFileName,
					// 'loginpage_image'        => $this->input->post('invoice_logo'),
					// 'invoice_image'        => $this->input->post('invoice_image')
					
			);
				// echo "<pre>";
				// print_r($data); 
				// exit();
				$this->Company_Setting->addUpdate($data);

				redirect('CompanySetting');
				}

			else   
				{    
					
					echo "no";// $this->session->set_flashdata('fail', 'Failed to add new group.'); 
					// redirect('registrations');
				}
			// 	// $this->session->set_flashdata('Success', 'Successfully added new group.');
			// redirect('CompanySetting');

			}

		}
?> 