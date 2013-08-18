<?php

class Player extends CI_Controller{

	//class members
	public $page_title=null;
	public $player_team=null;
	public $image_path=null;
	public $image_path_thumb=null;

	//variable representing player id - uses the crud_model_player->extractPlayerID($player_id) to extract player id
	public $player_id=null;

	//variable representing the team id for a player - uses the crud_model_team->extractTeamID($team_name) to extract the id
	public $player_team_id=null;

	//variable representing the team id for a player - uses the crud_model_player->extractPlayerTeamID($player_id) to extract the team_id
	public $player_team_id_id=null;

	 //array member used to store parameters for CRUD operations on the Player Entity
	public $parameters_crud=array();

    //parameters for upload regarding Player entity


	//class constructor
	function __construct(){
		parent::__construct();

        define('IMG_FOLDER_PATH', base_url().'uploads/players/');

        //custom helpers
        $this->load->helper('custom/prevent_back_browser');
        $this->load->helper('auth_helper');
        $this->load->helper('custom/upload_config');
        $this->load->helper('custom/create_entity_report');
        $this->load->helper('custom/pagination_config');

		$this->load->model('login_model');

		$this->load->model('crud_model_player');
		$this->load->model('crud_model_team');

        //prevent user from using the back button and relogin or other weird operations
        preventUserBackButtonBrowser();

		//initialize crud parameters by assigning them values from the $_POST array which contains player team, name etc
		$this->parameters_crud['player_team']=$this->input->post('player_team');
		$this->parameters_crud['player_name']=$this->input->post('player_name');
		$this->parameters_crud['player_nickname']=$this->input->post('player_nickname');
		$this->parameters_crud['player_dob']=$this->input->post('player_dob');
		$this->parameters_crud['player_country']=$this->input->post('player_country');
		$this->parameters_crud['player_race']=$this->input->post('player_race');
		$this->parameters_crud['player_team']=$this->input->post('player_team');
		$this->parameters_crud['player_winnings']=$this->input->post('player_winnings');
		$this->parameters_crud['player_description']=$this->input->post('player_description');
		$this->parameters_crud['player_image']=$this->input->post('player_image');
        $this->parameters_crud['player_keywords']=$this->input->post('player_keywords');

		//initialize player_team_id variable used in inserting a new player in the database
		$this->player_team_id=$this->crud_model_team->extractTeamID($this->parameters_crud['player_team']);
	}

    public function setParametersCRUD($parameters){
       $this->parameters_crud=$parameters;
    }

    public function getParametersCRUD(){
        return $this->parameters_crud;
    }

	public function setPageTitle($title){
		$this->page_title=$title;
		return $this->page_title;
	}

	public function setPlayerTeam($team_name){
		$this->player_team=$team_name;
	}

	public function getPlayerTeam(){
		return $this->player_team;
	}

    public function setImagePath($image_path){
       $this->image_path=$image_path;
    }

    public function getImagePath(){
        return $this->image_path;
    }

	public function getImagePathThumb(){
		return $this->image_path_thumb;
	}

	public function setImagePathThumb($image_path_thumb){
		$this->image_path_thumb=$image_path_thumb;
	}

    public function setPlayerTeamID($player_team_id){
        $this->player_team_id_id=$player_team_id;
    }

    public function getPlayerTeamID(){
        return $this->player_team_id_id;
    }

	public function prepare_player(){

		$data['teams']=$this->crud_model_team->extractTeamName();
		$data['page_title']="PLAYER";

		$data['username']=$this->setSessionData();

		//load the view with the form with the creation of a player
		$this->load->view('header_admin_area');
        checkSessionData('create_player', $data);
		$this->load->view('footer_admin_area');

	}

	public function prepare_update_player($entity_id){

		$data['player_details']=$this->crud_model_player->extractPlayerDetailsID($entity_id);
		$data['teams']=$this->crud_model_team->extractTeamName();
		$data['page_title']=$this->setPageTitle("UPDATE PLAYER SCREEN");

		$data['username']=$this->setSessionData();

		$data['entity_type']=1; //1 is a flag for PLAYER entity
		$this->loadUpdateEntityDetails($data);
	}

	public function prepare_delete_player($player_id){
		$data['page_title']=$this->setPageTitle('Raport preliminar stergere jucator');
		$data['player_details']=$this->crud_model_player->extractPlayerDetailsID($player_id);

	    $data['username'] =  $this->setSessionData();

		$this->loadDeletePageReport($data);
	}

	public function create_player(){
        $entity_type='player';

        //helper function containing all configuration parameters for upload of images concerning the player entity
        configUpload();

        if($this->crud_model_player->prevent_duplicate_player_entries($this->parameters_crud['player_nickname'])){
            redirect('index.php/player/load_entity_exists_failure/'.$entity_type);
        }

        $upload_info_inserted['upload_data']=$this->upload->data();
		//$this->image_path=$data_info_inserted['upload_data']['file_name'];
        $this->setImagePath($upload_info_inserted['upload_data']['file_name']);
		$data['image_path']=$this->getImagePath();
		$this->create_thumbs($this->getImagePath());

		//first parameter is the team id based on the team name, second parameter is the controller defined array, parameter_crud, which contains all variables for an insert statement defined in the model, third and final parameter is the image path, also defined in the controller 
		if($this->crud_model_player->insertPlayerDB($this->player_team_id, $this->getParametersCRUD(), $this->getImagePath())){

            $data_info_inserted=playerReport($this->getParametersCRUD()); //SEE create_entity_report HELPER for playerReport() method
			$this->loadSuccessPage($data_info_inserted);
		}else{
			//load the view with the form with the creation of a player
			$this->loadFailurePage();
		}
	}

	public function read_player(){

		//session username and page title
		$data['page_title']=$this->setPageTitle("READ PLAYERS");
		$data['username'] =  $this->setSessionData();

		//extract players and offset method for pagination
		//$data['player_details']=$this->crud_model_player->extractPlayerTeamName($config['per_page'], $this->uri->segment(3));
        $data['player_details']=$this->crud_model_player->extractPlayerTeamName(10, $this->uri->segment(3));
		$data['entity_type']=1; //1 is a flag for PLAYER entity

        $pagination_config = config_pagination(10,"player");//SEE pagination_config_helper HELPER for config_pagination($results_per_page) method

		$this->pagination->initialize($pagination_config);
		$data['links']=$this->pagination->create_links();

		$this->loadEntityDetails($data);
	}

	public function update_player($player_id){

		//initialize player_id variable used in updating a player in the database
		$this->player_id=$this->crud_model_player->extractPlayerID($player_id);

        //uses the update_upload_config() function to prepare upload parameters. Also checks to see if the field for a new picture is empty or not
        //If it is empty, nothing will be uploaded, else, it will upload the new picture that is set in the upload field by the user
        $this->update_upload_config();

        if(empty($_POST['player_keywords'])){
            $this->parameters_crud['player_keywords']=$this->input->post('player_keywords_actual');
        }

        //check to see if the FIELD for a possible new image is empty or not
		if($_POST['update_player']=='please_select'){
			$this->setPlayerTeam($this->input->post('player_team'));
            $this->parameters_crud['player_team']=$this->getPlayerTeam();
            //the team id is needed when updating a player - a team id is extracted by passing the team name to the model method extractTeanID($team_name)
            $this->setPlayerTeamID($this->crud_model_team->extractTeamID($this->input->post('player_team')));
		}else{
            $this->setPlayerTeam($this->input->post('update_player'));
            $this->parameters_crud['player_team']=$this->getPlayerTeam();
            $this->setPlayerTeamID($this->crud_model_team->extractTeamID($this->input->post('update_player')));
		}

		//assign return value for getImagePathThumb to a variable and pass that variable to the updatePlayer() method
		$team_logo=$this->getImagePathThumb();

		//load crud_model and the method that does the updating
		//1st parameter - player_id, 2nd parameter - player team id, 3rd parameter - array containing name, nickname etc, 4th parameter - the image to be uploaded
		$this->crud_model_player->updatePlayer($this->player_id, $this->getPlayerTeamID(), $this->parameters_crud, $team_logo);

		redirect('index.php/player/read_player');
	}

	public function delete_player($player_id){
        //when a player is deleted, the image on the server must be deleted as well
        $file_name=$this->crud_model_player->extractPlayerImage($player_id);

        if($this->crud_model_player->deletePlayer($player_id)){
            unlink('uploads/players/'.$file_name);
            redirect('index.php/player/read_player');
        }else{
            //!!!CREATE DELETE FAILURE PAGE
            redirect('index.php/player/loadFailurePage');
        }
	}


	//helper methods
	public function loadSuccessPage($data){
		//load the view with the form with the creation of a player
		$this->load->view('header_admin_area');
        checkSessionData('create_entity_success', $data);
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
        checkSessionData('entity_details_admin', $data);
		$this->load->view('footer_admin_area');
	}

	//report page for the team being deleted
	public function loadDeletePageReport($data){
		$this->load->view('header_admin_area');
        checkSessionData('delete_report_player', $data);
		$this->load->view('footer_admin_area');
	}

    public function load_entity_exists_failure($entity_type){

        $data['username']=$this->setSessionData();

        if($entity_type=='player'){
            $data['entity_type']=1;
        }

        $this->load->view('header_admin_area');
        checkSessionData('entity_exists_failure', $data);
        $this->load->view('footer_admin_area');
    }

	//method for presenting screen information about the entity the user is about to update
	public function loadUpdateEntityDetails($data){
		//load the view with the form with the creation of a title
		$this->load->view('header_admin_area');
		switch($data['entity_type']){
			case 1:
            checkSessionData('prepare_update_player', $data);
			break;
		}
		$this->load->view('footer_admin_area');
	}

	public function create_thumbs($image_path){
		$config['image_library'] = 'gd2';
		$config['source_image']	= $image_path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']	 = 500;
		//$config['height']	= 50;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

	public function setSessionData(){  //helper function for retrieving username based on who is logged in
		$session_data = $this->session->userdata('logged_in');
	    return $session_data['username'];
	}

    public function update_upload_config(){
        //prepare upload config
        $config['upload_path'] = './uploads/players';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '5000';
        $config['max_width'] = '1920';
        $config['max_height'] = '1500';
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);

        //if the upload field is empty, populate it with the current image in the database for the team that is being updated
        if(empty($_FILES['player_image']['name'])){
            $this->setImagePathThumb($this->input->post('player_image_current'));
        }else{
            $this->upload->do_upload('player_image');
            $data_info_inserted['upload_data']=$this->upload->data();

            //get the full path of the image being uploaded - will be used in creating a thumbnail
            $this->image_path=$data_info_inserted['upload_data']['full_path'];
            //the create_thumbs function will automatically append a _thumb.jpg|png|gif to the image in question
            $this->create_thumbs($this->image_path);
            //get the raw name of the image, without the .jpg,.png extension - append the _thumb to the file name - this filename will be inserted in the database
            $this->setImagePathThumb($data_info_inserted['upload_data']['raw_name'].'_thumb'.$data_info_inserted['upload_data']['file_ext']);
        }

        $this->upload->initialize($config);
    }
}