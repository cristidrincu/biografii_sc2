<?php 

class Team extends CI_Controller{

	//class members
	public $username=null;
	public $page_title=null;
	public $image_path=null;
	public $image_path_thumb=null;

	//array member used to store parameters for CRUD operations on the Team Entity
	public $parameters_crud=array();

	public $team_id=null;

	//class constructor
	function __construct(){
		parent::__construct();
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
		$this->output->set_header("Pragma: no-cache");
		$this->load->model('login_model');
		$this->load->model('crud_model_team');

		//load validation helper
		$this->load->helper('check_user_validation');

		//initialize crud parameters by assigning them values from the $_POST array which contains player team, name etc
		$this->parameters_crud['team_name']=$this->input->post('team_name');
		$this->parameters_crud['team_country']=$this->input->post('team_country');
		$this->parameters_crud['team_number_of_players']=$this->input->post('team_number_of_players');
		$this->parameters_crud['team_description']=$this->input->post('team_description');
		$this->parameters_crud['team_founded']=$this->input->post('team_founded');
		$this->parameters_crud['team_manager']=$this->input->post('team_manager');
		$this->parameters_crud['team_sponsors']=$this->input->post('team_sponsors');
	}

	//injects the username for all views that require it
	public function setSessionUsername(){
		$this->username=$this->session->userdata('username');
	}

	public function setPageTitle($page_title){
		$this->page_title=$page_title;
	}

	public function getPageTitle(){
		return $this->page_title;
	}

	public function getImagePathThumb(){
		return $this->image_path_thumb;
	}

	public function setImagePathThumb($image_path_thumb){
		$this->image_path_thumb=$image_path_thumb;
	}

    public function checkSessionData($page_type, $data){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('header_admin_area');
            $this->load->view($page_type, $data);
            $this->load->view('footer');
        }
        else
        {
            //If no session, redirect to login page
            redirect('index.php/login', 'refresh');
        }
    }


	//crud operations for team
	public function prepare_team(){
		$this->setPageTitle("ECHIPA");

		$data['username']=$this->setSessionData();
		$data['page_title']=$this->getPageTitle();

		//load the view with the form with the creation of a team
		$this->load->view('header_admin_area');
        $this->checkSessionData('create_team', $data);
		//$this->load->view('create_team', $data);
		$this->load->view('footer_admin_area');

	}

	public function prepare_update_team($team_id){
		$data['page_title']=$this->setPageTitle("UPDATE TEAM SCREEN");
		$data['username']=$this->setSessionData();

		$data['team_details']=$this->crud_model_team->extractTeamDetailsID($team_id);
		$data['entity_type']=2; //2 is a flag for TEAM entity
		$this->loadUpdateEntityDetails($data);
	}

	public function prepare_delete_team($team_id){
		$data['page_title']=$this->setPageTitle('Raport preliminar stergere titlu');
		$data['username']=$this->setSessionData();

		$data['team_details']=$this->crud_model_team->extractTeamDetailsID($team_id);
		$this->loadDeletePageReport($data);
	}

	public function create_team(){

		//prepare upload config
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width'] = '1920';
		$config['max_height'] = '1500';
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('teamLogoUpload')){
			$error['error'] = $this->upload->display_errors();
            $this->checkSessionData('create_entity_failure', $error);
			print_r($error);
		}
		else
		{
			$data_info_inserted['upload_data']=$this->upload->data();
			$this->image_path=$data_info_inserted['upload_data']['file_name'];
			$data['image_path']=$this->image_path;
			$this->create_thumbs($this->image_path);
		}

		$this->upload->initialize($config);


		if($this->crud_model_team->insertTeam($this->parameters_crud, $this->image_path)){
			$data_info_inserted['username']=$this->setSessionData();
			$data_info_inserted['team_name']=$this->input->post('team_name');
			$data_info_inserted['team_country']=$this->input->post('team_country');
			$data_info_inserted['team_number_of_players']=$this->input->post('team_number_of_players');
			$data_info_inserted['team_description']=$this->input->post('team_description');
			$data_info_inserted['team_founded']=$this->input->post('team_founded');
			$data_info_inserted['team_manager']=$this->input->post('team_manager');
			$data_info_inserted['team_sponsors']=$this->input->post('team_sponsors');
			$data_info_inserted['entity_type']=2;
			$data_info_inserted['report_entity']='Team';

			//load the view with the form with the creation of a player
			$this->loadSuccessPage($data_info_inserted);
		}else{
			//load the view with the form with the creation of a player
			$this->loadFailurePage();
		}
	}

	public function read_team(){

		$this->setPageTitle("READ TEAMS");

		$data['page_title']=$this->getPageTitle();
		$data['username']=$this->setSessionData();

		//pagination configuration for results
		$config['base_url']=base_url().'index.php/team/read_team/';
		$config['total_rows']=$this->crud_model_team->countRowsTeam();
		$config['per_page']=10;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';

		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		

		//apply model methods for getting the teams in the database
		$data['team_details']=$this->crud_model_team->extractTeamDetails($config['per_page'], $this->uri->segment(3));
		$data['entity_type']=2; //2 is a flag for TEAM entity

		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		
		$this->loadEntityDetails($data);
	}

	public function update_team($team_id){

		$this->team_id=$this->crud_model_team->extractTeamIDName($team_id);

		//prepare upload config
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width'] = '1920';
		$config['max_height'] = '1500';
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		//if the upload field is empty, populate it with the current image in the database for the team that is being updated
		if(empty($_FILES['teamLogoUpload']['name'])){
			$this->setImagePathThumb($this->input->post('team_logo_current'));
		}else{
			$this->upload->do_upload('teamLogoUpload');
			$data_info_inserted['upload_data']=$this->upload->data();

			//get the full path of the image being uploaded - will be used in creating a thumbnail
			$this->image_path=$data_info_inserted['upload_data']['full_path'];
			//the create_thumbs function will automatically append a _thumb.jpg|png|gif to the image in question
			$this->create_thumbs($this->image_path);
			//get the raw name of the image, without the .jpg,.png extension - append the _thumb to the file name - this filename will be inserted in the database
			$this->setImagePathThumb($data_info_inserted['upload_data']['raw_name'].'_thumb'.$data_info_inserted['upload_data']['file_ext']);
		}

		$this->upload->initialize($config);

		//assign the getImagePathThumb return value to a variable
		$team_logo=$this->getImagePathThumb();

		$this->crud_model_team->updateTeam($this->team_id, $this->parameters_crud, $team_logo);
		
		redirect('index.php/team/read_team');
	}

	public function delete_team($team_id){
		$this->crud_model_team->deleteTeam($team_id);
		redirect('index.php/team/read_team', 'location');
	}


	//helper methods
	public function loadSuccessPage($data){
		//load the view with the form with the creation of a video
		$this->load->view('header_admin_area');
        $this->checkSessionData('create_entity_success', $data);
		$this->load->view('footer_admin_area');
	}

	public function loadFailurePage(){
		//load the view with the form with the creation of a title
		$this->load->view('header_admin_area');
		$this->load->view('create_entity_failure');
		$this->load->view('footer_admin_area');
	}

	//method for loading the view for admin area containing all players in the database
	public function loadEntityDetails($data){
		//load the view with the form with the creation of a title
		$this->load->view('header_admin_area');
        $this->checkSessionData('entity_details_admin', $data);
		$this->load->view('footer_admin_area');
	}

	//report page for the team being deleted
	public function loadDeletePageReport($data){
		$this->load->view('header_admin_area');
        $this->checkSessionData('delete_report_team', $data);
		$this->load->view('footer_admin_area');
	}

	//method for presenting screen information about the entity the user is about to update
	public function loadUpdateEntityDetails($data){
		//load the view with the form with the creation of a title
		$this->load->view('header_admin_area');
		switch($data['entity_type']){
			case 2:
            $this->checkSessionData('prepare_update_team', $data);
			break;
		}
		$this->load->view('footer_admin_area');
	}

	public function create_thumbs($image_path){
		$config['image_library'] = 'gd2';
		$config['source_image']	= $this->image_path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']	 = 300;
		//$config['height']	= 50;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

	public function setSessionData(){
		$session_data = $this->session->userdata('logged_in');
	    return $session_data['username'];
	}
}