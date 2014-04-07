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

    public $upload_info_inserted = null;
    public $error_upload = null;
    public $currentPlayerImageFromDB = null;

    //parameters for upload regarding Player entity


	//class constructor
	function __construct(){
		parent::__construct();

        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');

        define('IMG_FOLDER_PATH', base_url().'uploads/players/');

        //custom helpers
        $this->load->helper('custom/prevent_back_browser');
        $this->load->helper('auth_helper');
        $this->load->helper('custom/create_entity_report');
        $this->load->helper('custom/pagination_config');

		$this->load->model('login_model');

		$this->load->model('crud_model_player');
		$this->load->model('crud_model_team');
        $this->load->model('crud_model_user');

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
        $this->parameters_crud['user_id'] = $this->crud_model_user->extractUserID($this->setSessionDataUserName());

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

	public function setImagePathThumb($image_path_thumb){
		$this->image_path_thumb=$image_path_thumb;
	}

    public function getImagePathThumb(){
        return $this->image_path_thumb;
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

		$data['username']=$this->setSessionDataUserName();

		//load the view with the form with the creation of a player
		$this->load->view('header_admin_area');
        checkSessionData('create_player', $data);
		$this->load->view('footer_admin_area');

	}

	public function prepare_update_player($entity_id){
//        $tmp_dir = ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir();
//        die($tmp_dir);


		$data['player_details']=$this->crud_model_player->extractPlayerDetailsID($entity_id);
		$data['teams']=$this->crud_model_team->extractTeamName();
		$data['page_title']=$this->setPageTitle("UPDATE PLAYER SCREEN");

		$data['username']=$this->setSessionDataUserName();

		$data['entity_type']=1; //1 is a flag for PLAYER entity
		$this->loadUpdateEntityDetails($data);
	}

	public function prepare_delete_player($player_id){
		$data['page_title']=$this->setPageTitle('Raport preliminar stergere jucator');
		$data['player_details']=$this->crud_model_player->extractPlayerDetailsID($player_id);

	    $data['username'] =  $this->setSessionDataUserName();

		$this->loadDeletePageReport($data);
	}

	public function create_player(){
        $entity_type='player';
        $playerImage = $_FILES['player_image']['name'];
        $user_id = $this->crud_model_user->extractUserID($this->setSessionDataUserName());

        if($this->upload_images()){
            $this->upload_info_inserted = array('upload_data' => $this->upload->data());
        }

        if($this->crud_model_player->prevent_duplicate_player_entries($this->parameters_crud['player_nickname'])){
            redirect('player/load_entity_exists_failure/'.$entity_type);
        }

		if($this->crud_model_player->insertPlayerDB($this->player_team_id, $this->getParametersCRUD(), $playerImage)){
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
		$data['username'] =  $this->setSessionDataUserName();
        $data['user_id'] = $this->crud_model_user->extractUserID($this->setSessionDataUserName());

		//extract players and offset method for pagination
		//$data['player_details']=$this->crud_model_player->extractPlayerTeamName($config['per_page'], $this->uri->segment(3));
        $data['player_details']=$this->crud_model_player->extractPlayerTeamName(10, $this->uri->segment(3));
		$data['entity_type']=1; //1 is a flag for PLAYER entity
        $data['user_role'] = $this->setSessionDataUserRole();
        $data['total_number_of_players'] = $this->crud_model_player->countRowsPlayer();


        $pagination_config = config_pagination(10,"player");//SEE pagination_config_helper HELPER for config_pagination($results_per_page) method

		$this->pagination->initialize($pagination_config);
		$data['links']=$this->pagination->create_links();

		$this->loadEntityDetails($data);
	}

	public function update_player($player_id){

        $this->image_path = "./uploads/players/";

		//initialize player_id variable used in updating a player in the database
		$this->player_id=$this->crud_model_player->extractPlayerID($player_id);

        //helper function containing all configuration parameters for upload of images concerning the player entity
        if($this->upload_images()){
            $this->upload_info_inserted = array('upload_data' => $this->upload->data());
        }

        if(empty($_POST['player_keywords'])){
            $this->parameters_crud['player_keywords']=$this->input->post('player_keywords_actual');
        }else{
            $this->parameters_crud['player_keywords'] .= ", " . $this->input->post('player_keywords_actual');
        }

		if($_POST['update_player_team']=='please_select'){
			$this->setPlayerTeam($this->input->post('player_team'));
            $this->parameters_crud['player_team']=$this->getPlayerTeam();
            $this->setPlayerTeamID($this->crud_model_team->extractTeamID($this->input->post('player_team')));
		}else{
            $this->setPlayerTeam($this->input->post('update_player'));
            $this->parameters_crud['player_team']=$this->getPlayerTeam();
            $this->setPlayerTeamID($this->crud_model_team->extractTeamID($this->input->post('update_player_team')));
		}

        if( !empty($_FILES['player_image']['name']) ){
            if( !empty( $_POST['player_image_current']) ){
                unlink($this->image_path . $_POST['player_image_current']); //delete the current file from the server
            }

            $this->currentPlayerImageFromDB = $_FILES['player_image']['name'];
        }else{
            $this->currentPlayerImageFromDB = $_POST['player_image_current'];
        }


        $this->crud_model_player->updatePlayer($this->player_id, $this->getPlayerTeamID(), $this->parameters_crud, $this->currentPlayerImageFromDB);
        redirect('player/read_player');

	}

    public function upload_images(){
        //prepare upload config
        $config['upload_path'] = './uploads/players';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '5000';
        $config['max_width'] = '1920';
        $config['max_height'] = '2500';
        $config['remove_spaces'] = TRUE;

        //the "player_image" parameter is the name of the upload input field. Usage of $this->input->post('player_image') DOES NOT WORK
        //ALSO CHECK FOR FOLDER PERMISSIONS IN ./uploads/players - if the folder is not writable, you will get an error
        $selected_image = "player_image";

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($selected_image))
        {
            $this->error_upload = array('error' => $this->upload->display_errors());
            return false;
        }else{
            return true;
        }

    }

	public function delete_player($player_id){
        //when a player is deleted, the image on the server must be deleted as well
        $file_name=$this->crud_model_player->extractPlayerImage($player_id);

        if($this->crud_model_player->deletePlayer($player_id)){
            //remove image from server when player deleted
            //unlink('uploads/players/'.$file_name);
            redirect('player/read_player');
        }else{
            //!!!CREATE DELETE FAILURE PAGE
            redirect('player/loadFailurePage');
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

        $data['username']=$this->setSessionDataUserName();

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
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

	public function setSessionDataUserName(){  //helper function for retrieving username based on who is logged in
		$session_data = $this->session->userdata('logged_in');
	    return $session_data['username'];
	}

    public function setSessionDataUserRole(){  //helper function for retrieving username based on who is logged in
        $session_data = $this->session->userdata('logged_in');
        return $session_data['userrole'];
    }
}