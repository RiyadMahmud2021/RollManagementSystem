<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Permission_Model extends CI_Model {
		function __construct(){   
			parent::__construct();
			//$this->load->database();  
		}

        // get post 
		public function getRows( $id = "" ){ 
            if(!empty($id)){
                $query = $this->db->get_where('permissions' , array ('id' => $id)); // get_where('table_name' , id_mentioning)
                // var_dump($query);
                // exit;
                return $query-> row_array(); // showing row
            }else{
                $query = $this->db->get('permissions'); // why???
                return $query-> result_array();
            }
        } 
        // insert post
        public function insert( $data = array()){ // -------(i)  $data = array(); database input array declaring / initialize
            $insert = $this->db->insert('permissions',$data); // insert('table_name',data_taking_input_array)
            
            if($insert){
                return $this->db->insert_id(); // returning insert_id
            }
            else{
                return false; // if not return
            }
        }
		// update post 
		public function update($data, $id){
			
			if(!empty($data) && !empty($id)){
				$update = $this->db->update('permissions',$data, array('id' => $id)); // update('table_name',$data, array('id' => $id));
				return $update ? true : false ;
			}
			else{
				return false;
			} 
		}

		public function delete($id){
			
			$this->db->where('id', $id);
			$this->db->delete('permissions');

		}
		



		public function addPermissionRole($permission)
		{
			$this->db->insert_batch('permission_role', $permission);
		}



	function getPermission()
	{	
		$query = $this->db->get('permissions');
		return $query->result();
	}

	public function getcheckedPermissions($id){
		$this->db->where('group_id',$id);
		$query = $this->db->get('permission_role');
		return $query->result();
	}
		
	}
?>