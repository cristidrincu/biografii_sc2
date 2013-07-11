<?php
function check_isvalidated(){
		if(! $this->session->userdata('logged_in')){
			redirect('index.php/login');
		}else{
			$session_data = $this->session->userdata('logged_in');
	     	$data['username'] = $session_data['username'];
	     	// $this->load->view('header');
	     	// $this->load->view('welcome_screen_user', $data);
	     	// $this->load->view('footer');
		}
	}