<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Users_model extends CI_Model {
		function __construct(){   
			parent::__construct();
			
		}

		public function user_login($username, $password){  
			
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


		function getUserPermissions($id) 
		{
			// $sql    = " SELECT p.name,pr.id AS per_id,u.username,u.id AS userid 
			// 			FROM permissions AS p, groups AS g, users AS u, permission_role AS pr 
			// 			WHERE u.id = g.id 
			// 			AND g.id = pr.group_id 
			// 			AND p.id = pr.permission_id 
			// 			AND u.id= '$id'";
			$sql = " SELECT p.name
						FROM permissions AS p, groups AS g, users AS u, permission_role AS pr 
							WHERE u.id = g.id 
								AND g.id = pr.group_id 
								AND p.id = pr.permission_id 
								AND u.id= '$id'";
			$query  = $this->db->query($sql);
				$result = $query->result();
				return $result;
		}
		
	}
?>