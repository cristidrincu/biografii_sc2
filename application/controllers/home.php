<?php

class Home extends CI_Controller{

    public $dataDefaultKeywords=array();

	function __construct(){
		parent::__construct();
		$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
		$this->output->set_header("Pragma: no-cache");

		//$this->load->library('SimpleLoginSecure');

		$this->load->model('user');
        $this->dataDefaultKeywords[]='Starcraft 2, Starcraft2, Blizzard, jucatori pro, biografii, coreea, europa, statele unite, castiguri, titluri, clipuri video, echipe profesionale, evil geniuses, team liquid, alliance, acer, alternate, axiom, azubu, cjentus, complexity gaming, fnatic, fxopen, incredible miracle, mvp, prime, team 8, samsung khan, root gaming, sk gaming, sk telecom t1, startale, stx soul, team empire, team liquid, woongjin stars';
	}

    public function getDefaultKeywords(){
        return $this->dataDefaultKeywords;
    }

	function index(){
	   if($this->session->userdata('logged_in')){
	     $session_data = $this->session->userdata('logged_in');
	     $data['username'] = $session_data['username'];
         $dataKeywords['data_keywords']=$this->getDefaultKeywords();
	     $this->load->view('header', $dataKeywords);
	     $this->load->view('welcome_screen_user', $data);
	     $this->load->view('footer');
	   }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/login', 'refresh');
	   }
 	}

 	function logout(){
	   $this->session->unset_userdata('logged_in');
	   $this->session->sess_destroy();
	   $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
	   $this->output->set_header("Pragma: no-cache");
	   redirect('index.php/login', 'refresh');
 	}
}