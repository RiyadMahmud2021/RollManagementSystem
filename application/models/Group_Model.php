<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Group_Model extends CI_Model {
		function __construct(){   
			parent::__construct();
			$this->load->database();  
		}

        // get post 
		public function getRows( $id = "" ){  
            if(!empty($id)){
                $query = $this->db->get_where('groups' , array ('id' => $id)); // get_where('table_name' , id_mentioning)
                // var_dump($query);
                // exit;
                return $query-> row_array(); // showing row
            }else{
                $query = $this->db->get('groups'); // why???
                return $query-> result_array();
            }
        	}


		// insert post
		function addRole($data){
			$query="INSERT INTO `groups`(`name`, `description`) VALUES (?,?)";
	
			if($this->db->query($query,$data))
			{
				return $this->db->insert_id();
			} 
		}
		public function addPermission($perm_role){
			$this->db->insert('permission_role',$perm_role);
		}
		// update post 
		public function update($data, $id){
		
			if(!empty($data) && !empty($id)){
				$update = $this->db->update('groups',$data, array('id' => $id)); // update('table_name',$data, array('id' => $id));
				return $update ? true : false ;
			}
			else{
				return false;
			} 
		}
		// delete post
		public function delete($id){
		 
			$delete = $this->db->delete('groups', array('id' => $id));
			return $delete ? true : false;	 
	 
		}

         	public function updateRole($role_id,$permission_id){
			$this->db->where('id',$role_id);
			$this->db->update('groups',['name' => $this->input->post('name'),'description' => $this->input->post('description')]);
			
			$this->db->where('group_id',$role_id);
			$this->db->update('permission_role',$permission_id);
	     }

		public function getRoles($id)
		{
			// $this->db->select('g.id as group_id,g.name as group_name,g.description as g_description,pr.permission_id,p.name as permission_name');
			// $this->db->from('groups g');
			// $this->db->join('permission_role pr','g.id = pr.group_id');
			// $this->db->join('permissions p','p.id = pr.permission_id');
			// $this->db->where('g.id',$id);
			// $query = $this->db->get();
			// return $query->result();
			$this->db->select("g.id, g.name, g.description, pr.permission_id as check");
			$this->db->from("groups as g");
			$this->db->join('permission_role as pr', 'g.id = pr.group_id', 'left');
			$this->db->where("g.id",$id);
			$query = $this->db->get();
			return $query->row();
		}

	
		public function getAllPermissions(){
			
			$sql = "SELECT * FROM permissions";
			$query  = $this->db->query($sql);
				$result = $query->result(); 
				return $result;

		}




		// function getUserPermissions($id) 
		// {
		// 	// $sql    = " SELECT p.name,pr.id AS per_id,u.username,u.id AS userid 
		// 	// 			FROM permissions AS p, groups AS g, users AS u, permission_role AS pr 
		// 	// 			WHERE u.id = g.id 
		// 	// 			AND g.id = pr.group_id 
		// 	// 			AND p.id = pr.permission_id 
		// 	// 			AND u.id= '$id'";
		// 	$sql = " SELECT p.name
		// 				FROM permissions AS p, groups AS g, users AS u, permission_role AS pr 
		// 					WHERE u.id = g.id 
		// 						AND g.id = pr.group_id 
		// 						AND p.id = pr.permission_id 
		// 						AND u.id= '$id'";
		// 	$query  = $this->db->query($sql);
		// 		$result = $query->result();
		// 		return $result;
		// }
		
	}
?>