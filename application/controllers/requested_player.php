<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cristian
 * Date: 7/23/13
 * Time: 7:36 PM
 * To change this template use File | Settings | File Templates.
 */
class Requested_player extends CI_Controller
{

    //class members
    public $page_title=null;
    private $image_path=null;
    private $image_path_thumb=null;

    //parameters array for model and CRUD operations
    public $parameters=array();

    function __construct(){
        parent::__construct();

        //constant for requested_player_images url
        define("REQ_PLAYER_IMAGES", base_url().'uploads/players/requested_players/');

        //custom helpers
        $this->load->helper('custom/prevent_back_browser');
        $this->load->helper('auth_helper');
        $this->load->helper('custom/upload_config');
        $this->load->helper('custom/create_entity_report');
        $this->load->helper('custom/pagination_config');

        //prevent user from using the back button and relogin or other weird operations
        preventUserBackButtonBrowser();

        //load requests model
        $this->load->model('crud_model_requested_player');

        $this->parameters["requested_player_name"] = $this->input->post("requested_player_name");
        $this->parameters["requested_player_nickname"] = $this->input->post("requested_player_nickname");
        $this->parameters["requested_player_image"] = $this->input->post("requested_player_image");
        $this->parameters["requested_player_image_url"] = REQ_PLAYER_IMAGES.$this->parameters["requested_player_image"];
        $this->parameters["requested_player_race"] = $this->input->post("requested_player_race");
    }

    //getters and setters

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

    public function index(){
        $data['page_title']="PLAYER";
        $data['username']=$this->setSessionData();

        $this->load->view('header_admin_area');
        checkSessionData('prepare_requested_player_view', $data);
        $this->load->view('footer');
    }

    public function prepare_requested_player(){
        $data['page_title']="PLAYER";
        $data['username']=$this->setSessionData();

       $this->load->view('header_admin_area');
       checkSessionData('prepare_requested_player_view', $data);
       $this->load->view('footer');
    }

    public function create_requested_player(){

        //helper function containing all configuration parameters for upload of images concerning the player entity
        configUploadRequestedPlayer();

        $upload_info_inserted['upload_data']=$this->upload->data();
        $this->setImagePath($upload_info_inserted['upload_data']['file_name']);
        $data['image_path']=$this->getImagePath();
        $this->create_thumbs($this->getImagePath());

         if($this->crud_model_requested_player->insertRequestedPlayer($this->parameters, $this->getImagePath())){
             redirect("index.php/requested_player/index");
         }else{
             echo "Failure to comply!";
         }

    }

    public function read_requested_player(){
        $data['requested_players']=$this->crud_model_requested_player->extractAllRequestedPlayers();
        $data['page_title']="Rezultate jucatori REQUESTED";
        $data['entity_type']=5;

        $pagination_config = config_pagination(10,"requested_player");//SEE pagination_config_helper HELPER for config_pagination($results_per_page, $entity_type) method

        $this->pagination->initialize($pagination_config);
        $data['links']=$this->pagination->create_links();

        $this->loadEntityDetails($data);
    }

    public function prepare_update_requested_player($player_id){
        $data["requested_players"]=$this->crud_model_requested_player->extractPlayerDetails($player_id);
        $data['page_title']="Rezultate jucatori REQUESTED";
        $data['entity_type']=5;

        $this->loadUpdateEntityDetails($data);

    }

    public function update_requested_player($player_id){
        $data['page_title']="Update jucator REQUESTED";
        $data['entity_type']=5;
        $this->parameters["requested_player_id"]=$player_id;

        if($_POST["requested_player_race"]=="please_select"){
             $this->parameters["requested_player_race"]=$this->input->post("current_player_race");
        }

        //uses the update_upload_config() function to prepare upload parameters. Also checks to see if the field for a new picture is empty or not
        //If it is empty, nothing will be uploaded, else, it will upload the new picture that is set in the upload field by the user
        $this->update_upload_config();

        if(empty($_FILES['requested_player_image']['name'])){
            $this->parameters["requested_player_image"]=$this->input->post("current_requested_player_image");
        }else{
             $this->parameters["requested_player_image"]=$_FILES['requested_player_image']['name'];
        }

        $image_path = $this->parameters["requested_player_image"];

        if($this->crud_model_requested_player->updateRequestedPlayer($this->parameters, $image_path)){
            redirect("index.php/requested_player/read_requested_player");
        }else{
            echo "Failure";
        }
    }

    public function delete_requested_player($player_id){
        $file_name=$this->crud_model_requested_player->extractPlayerImage($player_id);

        if($this->crud_model_requested_player->deleteRequestedPlayer($player_id)){
            unlink('uploads/players/requested_players/'.$file_name);
            redirect("index.php/requested_player/read_requested_player");
        }
    }

    public function setSessionData(){  //helper function for retrieving username based on who is logged in
        $session_data = $this->session->userdata('logged_in');
        return $session_data['username'];
    }

    //method for loading the view for admin area containing all players in the database
    public function loadEntityDetails($data){
        //load the view with the form with the creation of a title
        $this->load->view('header_admin_area');
        checkSessionData('entity_details_admin', $data);
        $this->load->view('footer_admin_area');
    }

    public function loadUpdateEntityDetails($data){
        //load the view with the form with the creation of a title
        $this->load->view('header_admin_area');
        switch($data['entity_type']){
            case 5:
                checkSessionData('prepare_update_requested_player', $data);
                break;
        }
        $this->load->view('footer_admin_area');
    }

    public function update_upload_config(){
        //prepare upload config
        $config['upload_path'] = './uploads/players/requested_players/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '5000';
        $config['max_width'] = '1920';
        $config['max_height'] = '1500';
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);


        //if the upload field is empty, populate it with the current image in the database for the team that is being updated
        if(empty($_FILES['requested_player_image']['name'])){
            $this->setImagePathThumb($this->input->post('current_requested_player_image'));

        }else{
            $this->upload->do_upload('requested_player_image');
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

    public function create_thumbs($image_path){
        $config['image_library'] = 'gd2';
        $config['source_image']	= $image_path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']	 = 150;
        //$config['height']	= 50;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
}
