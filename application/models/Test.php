<?php

// Reg_Model
defined('BASEPATH') OR exit('No direct script access allowed');

	class Reg_Model extends CI_Model {
		function __construct(){   
			parent::__construct();
			
		}

		public function getAllGroups(){
			
			// $sql = "SELECT * FROM groups";
			// $query  = $this->db->query($sql);
			// 	$result = $query->result(); 
			// 	return $result;
			return $this->db->get('groups')->result();

		}

		function addUser($data){

			// $query="INSERT INTO `users`(`username`, `password`,`email`,`first_Name`,`last_name`, `phone`, `nid`,`employee_address`, `designation`,`group_id`) VALUES (?,?,?,?,?,?,?,?,?,?)";

			// if($this->db->query($query,$data)) 
			// {
			// 	return $this->db->insert_id();
			// }

			if($this->db->insert('users',$data)){
				return true;
			}
			return false;
			
		}

		public function getUsers(){ 
                $query = $this->db->get('users'); 

                return $query-> result(); 
				//return $query-> result_array();
        } 

		// function getUserGroupName($id) 
		// {
		// 	// $sql    = " SELECT g.name,pr.id AS per_id,u.username,u.id AS userid 
		// 	// 			FROM permissions AS p, groups AS g, users AS u, permission_role AS pr 
		// 	// 			WHERE u.id = g.id 
		// 	// 			AND g.id = pr.group_id 
		// 	// 			AND p.id = pr.permission_id 
		// 	// 			AND u.id= '$id'";
		// 	$sql = " SELECT g.name
		// 				FROM groups AS g, users AS u,
		// 					WHERE u.group_id = g.id 
		// 						AND u.group_id= '$id'";
		// 	$query  = $this->db->query($sql);
		// 		$result = $query->result();
		// 		return $result;
		// }


		function getUserGroupName($id) 
		{
			// $sql    = " SELECT g.name,pr.id AS per_id,u.username,u.id AS userid 
			// 			FROM permissions AS p, groups AS g, users AS u, permission_role AS pr 
			// 			WHERE u.id = g.id 
			// 			AND g.id = pr.group_id 
			// 			AND p.id = pr.permission_id 
			// 			AND u.id= '$id'";
			$sql = " SELECT g.name, g.id
						FROM groups AS g, users AS u
							WHERE u.group_id = g.id
								AND u.group_id = '$id'";
			$query  = $this->db->query($sql);
				$result = $query->result();
				return $result;
		}

		
	}
?>