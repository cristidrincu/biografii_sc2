<?php

class Login_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function validate(){
		// //grab user input
		 $username = $this->security->xss_clean($this->input->post('username'));
		// //$password=$this->PasswordHash->HashPassword();
		 $password = $this->security->xss_clean($this->input->post('password'));
		

		//prep the query
		$this->db->select('user_name, user_pass')->from('USERS')->where('user_name', $username)->where('user_pass', $password);

		//run the query
		$query = $this->db->get();

		//check if there are any results
		if($query->num_rows()==1){

			//if there is a user, create session data
			$row=$query->row();
			$data=array(
				"user_id" => $row->user_id,
				"user_name" => $row->user_email,
				"user_pass" => $row->user_pass,
				"validated" => true
			);

			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
	}
}