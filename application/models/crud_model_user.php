<?php

class Crud_model_user extends CI_Model{
	function login($username, $pass){
		$this->db->select('user_id, user_name, user_password, user_role');
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

    function countRowsUsers(){
        $total_rows=$this->db->count_all('USERS');
        return $total_rows;
    }

    function extractPublisherName($publisher_id){
        $this->db->select('user_name');
        $this->db->from('USERS');
        $this->db->join('PLAYER', 'PLAYER.publisher_id = USERS.user_id', 'right');
        $this->db->where(array('USERS.user_id'=> $publisher_id));
        $query = $this->db->get();
        foreach($query->result() as $row){
            return $row->user_name;
        }
    }

    function extractUserID($user_name){
        $query=$this->db->get_where('USERS U', array('U.user_name'=>$user_name));
        foreach($query->result() as $row){
            return $row->user_id;
        }
    }

    function extractUserDetails($user_id){
        $this->db->select('user_id, user_name, user_email, user_role')->from('USERS U')->where(array('U.user_id' => $user_id));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function extractUserRoles(){
        $this->db->select('user_role')->from('USERS');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function extractUserPassword($user_id){
        $query = $this->db->get_where('USERS U', array('U.user_id' => $user_id));
        foreach($query->result() as $row){
            return $row->user_password;
        }
    }


    function preventDuplicateUsers($user_name){
        $this->db->select('user_id')->from('USERS U')->where(array('U.user_name'=>$user_name));
        $query= $this->db->get();
        $result = $query->result();
        if($result){
            return true;
        }else{
            return false;
        }
    }

    function createUser($parameters){
        $data=array(
            'user_name'=>$parameters['user_name'],
            'user_password'=>MD5($parameters['user_pass']),
            'user_email'=>$parameters['user_email'],
            'user_role'=>$parameters['user_role']
        );

        if($this->db->insert('USERS', $data)){
            return true;
        }else{
            return false;
        }
    }

    function updateUser($user_id, $parameters){
        $update_data = array(
            'user_name' => $parameters['user_name'],
            'user_password' => $parameters['user_password'],
            'user_email' => $parameters['user_email'],
            'user_role' => $parameters['user_role']
        );

        $this->db->where('user_id', $user_id);
        $this->db->update('USERS', $update_data);
    }

    function deleteUser($user_id){
        if($this->db->delete('USERS', array('user_id'=>$user_id))){
            return true;
        }else{
            return false;
        }
    }

    function extractAllUsers(){
        $this->db->select('user_id, user_name, user_email, user_role')->from('USERS');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}