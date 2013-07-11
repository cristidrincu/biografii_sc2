<?php

class User extends CI_Model{
	function login($username, $pass){
		$this->db->select('user_id, user_name, user_password');
   		$this->db->from('USERS');
   		$this->db->where('user_name', $username);
   		$this->db->where('user_password', MD5($pass));
   		$this->db->limit(1);

   		$query = $this->db->get();

   		if($query->num_rows() == 1)
   		{
     		return $query->result();
   		}
   		else
   		{
     		return false;
   		}
	}
}