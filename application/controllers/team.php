<?php 

class Team extends CI_Controller{

	//class members
	public $username=null;
	public $page_title=null;
	public $image_path=null;
	public $image_path_thumb=null;
    public $upload_info_inserted = null;
    public $error_upload = null;
    public $currentTeamLogoFromDB = null;

	//array member used to store parameters for CRUD operations on the Team Entity
	public $parameters_crud=array();

	public $team_id=null;

	//class constructor
	function __construct(){
		parent::__construct();

        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');

		$this->load->model('login_model');
		$this->load->model('crud_model_team');
        $this->load->model('crud_model_user');

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

	//crud operations for team
	public function prepare_team(){
		$this->setPageTitle("ECHIPA");

		$data['username']=$this->setSessionDataUsername();
		$data['page_title']=$this->getPageTitle();

		//load the view with the form with the creation of a team
		$this->load->view('header_admin_area');
		$this->load->view('create_team', $data);
		$this->load->view('footer_admin_area');

	}

	public function prepare_update_team($team_id){
		$data['page_title']=$this->setPageTitle("UPDATE TEAM SCREEN");
		$data['username']=$this->setSessionDataUsername();

		$data['team_details']=$this->crud_model_team->extractTeamDetailsID($team_id);
		$data['entity_type']=2; //2 is a flag for TEAM entity
		$this->loadUpdateEntityDetails($data);
	}

	public function prepare_delete_team($team_id){
		$data['page_title']=$this->setPageTitle('Raport preliminar stergere titlu');
		$data['username']=$this->setSessionDataUsername();

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
			$this->load->view('create_entity_failure', $error);
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
			$data_info_inserted['username']=$this->setSessionDataUsername();
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
		$data['username']=$this->setSessionDataUsername();
        $data['user_role'] = $this->setSessionDataUserRole();

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
        $data['total_number_of_teams'] = $this->crud_model_team->countRowsTeam();
        $data['user_id'] = $this->crud_model_user->extractUserID($this->setSessionDataUserName());
		
		$this->loadEntityDetails($data);
	}

    public function upload_images(){
        //prepare upload config
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '5000';
        $config['max_width'] = '1920';
        $config['max_height'] = '2500';
        $config['remove_spaces'] = TRUE;

        //the "teamLogoUpload" parameter is the name of the upload input field. Usage of $this->input->post('player_image') DOES NOT WORK
        //ALSO CHECK FOR FOLDER PERMISSIONS IN ./uploads/players - if the folder is not writable, you will get an error
        $selected_image = "teamLogoUpload";

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($selected_image))
        {
            $this->error_upload = array('error' => $this->upload->display_errors());
            return false;
        }else{
            return true;
        }

    }

	public function update_team($team_id){

		$this->team_id=$this->crud_model_team->extractTeamIDName($team_id);
        $this->image_path = "./uploads/";

        //helper function containing all configuration parameters for upload of images concerning the player entity
        if($this->upload_images()){
            $this->upload_info_inserted = array('upload_data' => $this->upload->data());
        }

        //if current team logo is empty, take the new file that is being uploaded - this case is for the teams where a bug prevented the upload of a team logo
        if(empty($_POST['team_logo_current'])){
            $this->currentTeamLogoFromDB = $_FILES['teamLogoUpload']['name'];
        }

		//if the upload field is empty, populate it with the current image in the database for the team that is being updated
		if(!empty($_FILES['teamLogoUpload']['name'])){
            if(!empty($_POST['team_logo_current'])){
                if($_FILES['teamLogoUpload']['name'] == $_POST['team_logo_current']){
                    $this->currentTeamLogoFromDB = $_FILES['teamLogoUpload']['name'];
                }else{
                    unlink($this->image_path . $_POST['team_logo_current']); //delete the current file from the server
                    $this->currentTeamLogoFromDB = $_FILES['teamLogoUpload']['name'];
                }
            }
		}else{
            $this->currentTeamLogoFromDB = $_POST['team_logo_current'];
        }

		$this->crud_model_team->updateTeam($this->team_id, $this->parameters_crud, $this->currentTeamLogoFromDB);
		
		redirect('team/read_team');
	}

	public function delete_team($team_id){
		$this->crud_model_team->deleteTeam($team_id);
		redirect('team/read_team', 'location');
	}


	//helper methods
	public function loadSuccessPage($data){
		//load the view with the form with the creation of a video
		$this->load->view('header_admin_area');
		$this->load->view('create_entity_success', $data);
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
		$this->load->view('entity_details_admin', $data);
		$this->load->view('footer_admin_area');
	}

	//report page for the team being deleted
	public function loadDeletePageReport($data){
		$this->load->view('header_admin_area');
		$this->load->view('delete_report_team', $data);
		$this->load->view('footer_admin_area');
	}

	//method for presenting screen information about the entity the user is about to update
	public function loadUpdateEntityDetails($data){
		//load the view with the form with the creation of a title
		$this->load->view('header_admin_area');
		switch($data['entity_type']){
			case 1:
			$this->load->view('prepare_update_player', $data);
			break;
			case 2:
			$this->load->view('prepare_update_team', $data);
			break;
			case 3:
			$this->load->view('prepare_update_title', $data);
			break;
			case 4:
			$this->load->view('prepare_update_video', $data);
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

	public function setSessionDataUsername(){
		$session_data = $this->session->userdata('logged_in');
	    return $session_data['username'];
	}

    public function setSessionDataUserRole(){  //helper function for retrieving username based on who is logged in
        $session_data = $this->session->userdata('logged_in');
        return $session_data['userrole'];
    }
}