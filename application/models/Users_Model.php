<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Users_model extends CI_Model {
		function __construct(){   
			parent::__construct();
			
		}

		# Login information checking 
		public function User_login($username, $password){  
			
			$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			// var_dump($sql);
			$query  = $this->db->query($sql);
			$result = $query->row();
			if(!empty($result)):
				return $result;
			else:
				return FALSE;
			endif;
		}


		function getUserPermissionsID($id) 
		{
			// $sql    = " SELECT p.name,pr.id AS per_id,u.username,u.id AS userid 
			// 			FROM permissions AS p, groups AS g, users AS u, permission_role AS pr 
			// 			WHERE u.id = g.id 
			// 			AND g.id = pr.group_id 
			// 			AND p.id = pr.permission_id 
			// 			AND u.id= '$id'";
			$sql = " SELECT pr.permission_id
						FROM permission_role AS pr, groups AS g, users AS u  
							WHERE g.id = pr.group_id
								AND u.group_id = g.id
								AND u.id= '$id'";
			$query  = $this->db->query($sql);
				$result = $query->row();
				return $result;
		}

		function getUserPermissionsById($value){
			$this->db->select('name');
			$this->db->where_in('id', $value);
			$query = $this->db->get('permissions');
			$result = $query->result();
			return $result;
		}
		
	}
?>