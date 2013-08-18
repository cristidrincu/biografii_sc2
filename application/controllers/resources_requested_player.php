<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cristian
 * Date: 7/25/13
 * Time: 12:38 PM
 * To change this template use File | Settings | File Templates.
 */
class Resources_requested_player extends CI_Controller{

    //class members
    public $parameters=array();

    function __construct(){
        parent::__construct();

        //custom helpers
        $this->load->helper('custom/prevent_back_browser');
        $this->load->helper('auth_helper');
        $this->load->helper('custom/upload_config');
        $this->load->helper('custom/create_entity_report');
        $this->load->helper('custom/pagination_config');

        //prevent user from using the back button and relogin or other weird operations
        preventUserBackButtonBrowser();

        //load requests model
        $this->load->model("crud_model_requested_player");
        $this->load->model('crud_model_requested_resource');

        $this->parameters["resource_name"] = $this->input->post("resource_name");
        $this->parameters["resource_link"] = $this->input->post("resource_link");
        $this->parameters["requested_player_nickname"] = $this->input->post("resource_player_nickname");
    }

    public function prepare_requested_resource(){
        $data['page_title']="RESURSA";
        $data['username']=$this->setSessionData();
        $data["requested_players"]=$this->crud_model_requested_player->extractAllRequestedPlayers();

        $this->load->view('header_admin_area');
        checkSessionData('prepare_requested_resource_view', $data);
        $this->load->view('footer');
    }

    public function prepare_update_requested_resource($requested_resource_id){
        $data['page_title']="RESURSA";
        $data['username']=$this->setSessionData();
        $data["requested_resource"] = $this->crud_model_requested_resource->extractResourceBasedOnId($requested_resource_id);
        $data["requested_resource_player"] = $this->crud_model_requested_resource->extractPlayerNickname();
        $data["requested_other_players"] = $this->crud_model_requested_player->eliminatePlayerFromQuery($requested_resource_id);

        $this->load->view("header_admin_area");
        checkSessionData("prepare_update_requested_resource", $data);
        $this->load->view("footer_admin_area");
    }

    /**
     *CRUD OPERATIONS START HERE
     * */
    public function read_requested_resources(){
        //session username and page title
        $data['page_title']="READ RESOURCES";
        $data['username'] =  $this->setSessionData();
        $data['entity_type']=6; //6 is a flag for REQUESTED RESOURCE entity
        $data['requested_resources']=$this->crud_model_requested_resource->extractAllResources();

        $pagination_config = config_pagination(10,"resource_requested_player");//SEE pagination_config_helper HELPER for config_pagination($results_per_page) method

        $this->pagination->initialize($pagination_config);
        $data['links']=$this->pagination->create_links();

        $this->loadEntityDetails($data);

    }

    public function create_requested_resource(){

        if($this->crud_model_requested_resource->insertRequestedResource($this->parameters)){
            $data_info_inserted=requestedResourceReport($this->parameters); //SEE create_entity_report HELPER for playerReport() method
            $this->loadSuccessPage($data_info_inserted);
        }else{
           $this->loadFailurePage();
        }
    }

    public function update_requested_resource($requested_resource_id){

        $this->parameters["resource_id"] = $requested_resource_id;
        $this->parameters["resource_player_id"] = $this->crud_model_requested_player->extractPlayerIDNickname($_POST["other_player"]);

        if(empty($_POST["new_resource_name"])){
            $this->parameters["resource_name"] = $this->input->post("resource_name");
        }else{
            $this->parameters["resource_name"] = $_POST["new_resource_name"];
        }

        if(empty($_POST["new_resource_link"])){
            $this->parameters["resource_link"] = $this->input->post("resource_link");
        }else{
            $this->parameters["resource_link"] = $_POST["new_resource_link"];
        }

        if($this->crud_model_requested_resource->updateRequestedResource($this->parameters)){
            redirect("index.php/resources_requested_player/read_requested_resources");
        }else{
            echo "Failure";
        }
    }

    public function setSessionData(){  //helper function for retrieving username based on who is logged in
        $session_data = $this->session->userdata('logged_in');
        return $session_data['username'];
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
}
