<?php

class Home extends CI_Controller{

    public $dataDefaultKeywords=array();

	function __construct(){
		parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');

		$this->load->model('crud_model_user');
        $this->dataDefaultKeywords[]='Starcraft 2, Starcraft2, Blizzard, jucatori pro, biografii, coreea, europa, statele unite, castiguri, titluri, clipuri video, echipe profesionale, evil geniuses, team liquid, alliance, acer, alternate, axiom, azubu, cjentus, complexity gaming, fnatic, fxopen, incredible miracle, mvp, prime, team 8, samsung khan, root gaming, sk gaming, sk telecom t1, startale, stx soul, team empire, team liquid, woongjin stars';
	}

    public function getDefaultKeywords(){
        return $this->dataDefaultKeywords;
    }

	function index(){
	   if($this->session->userdata('logged_in')){
	     $session_data = $this->session->userdata('logged_in');
	     $data['username'] = $session_data['username'];
         $data['userrole'] = $session_data['userrole'];
         $data['user_id'] = $this->crud_model_user->extractUserID($this->setSessionDataUserName());
         $dataKeywords['data_keywords']=$this->getDefaultKeywords();
	     $this->load->view('header', $dataKeywords);
           if($data['userrole'] == 'contributor'){
               $this->load->view('welcome_screen_contributor', $data);
           }else{
               $this->load->view('welcome_screen_user', $data);
           }
	     $this->load->view('footer');
	   }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');
	   }
 	}

 	function logout(){
	   $this->session->unset_userdata('logged_in');
       $this->session->unset_userdata('username');
       $this->session->unset_userdata('userrole');
	   $this->session->sess_destroy();
	   $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
	   $this->output->set_header("Pragma: no-cache");
	   redirect('login', 'refresh');
 	}

    public function setSessionDataUsername(){
        $session_data = $this->session->userdata('logged_in');
        return $session_data['username'];
    }

    public function setSessionDataUserRole(){  //helper function for retrieving username based on who is logged in
        $session_data = $this->session->userdata('logged_in');
        return $session_data['userrole'];
    }
}