<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('crud_model_user');

		$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
	   	$this->output->set_header("Pragma: no-cache");
	}

	function index(){

   		$this->load->helper(array('form'));
   		$this->load->view('login_view');
 	}

	public function process(){

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   		if($this->form_validation->run() == FALSE)
   		{
     		//Field validation failed.  User redirected to login page
     		$this->load->view('login_view');
   		}
   		else
   		{
     		//Go to private area
     		redirect('home', 'refresh');
   		}
	}

	function check_database($password){
	   //Field validation succeeded.  Validate against database
	   $username = $this->input->post('username');

	   //query the database
	   $result = $this->crud_model_user->login($username, $password);

	   if($result)
	   {
	     foreach($result as $row)
	     {
	       $sess_array = array(
	         'id' => $row->user_id,
	         'username' => $row->user_name,
             'userrole' => $row->user_role

	       );
	       $this->session->set_userdata('logged_in', $sess_array);
	     }
	     return TRUE;
	   }
	   else
	   {
	     $this->form_validation->set_message('check_database', 'Invalid username or password');
	     return FALSE;
	   }
 	}
}