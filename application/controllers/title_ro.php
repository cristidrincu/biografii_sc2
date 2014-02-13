<?php

class Title_Ro extends CI_Controller{

    //class members
    public $page_title = null;

    public $title_id = null;

    public $title_player_id=null;

    public $parameters_crud=array();

    //class constructor
    function __construct(){
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->library('pagination');
        $this->load->model('login_model');
        $this->load->model('crud_model_player');
        $this->load->model('crud_model_title');

        $this->parameters_crud['player_nickname']=$this->input->post('player_nickname');
        $this->parameters_crud['title_name']=$this->input->post('title_name');
        $this->parameters_crud['title_date']=$this->input->post('title_date');

        $this->title_player_id=$this->crud_model_player->extractPlayerIDNicknameRO($this->parameters_crud['player_nickname']);
    }

    public function setPageTitle($pageTitle){
        $this->page_title=$pageTitle;
    }

    public function getPageTitle(){
        return $this->page_title;
    }

    public function prepare_update_title_ro($title_id){
        $data['title_details']=$this->crud_model_title->extractTitleDetailsIDRO($title_id);

        $data['page_title']=$this->setPageTitle('UPDATE TITLE SCREEN');
        $data['username']=$this->setSessionData();

        $data['entity_type']=3; //3 is a flag for title
        $this->loadUpdateEntityDetails($data);
    }

    public function update_title_ro($title_ID){
        $this->title_id = $this->crud_model_title->extractTitleIDRO($title_ID);
        $this->crud_model_title->updateTitleRO($this->title_id, $this->parameters_crud);
        redirect('index.php/title_ro/read_title_ro');
    }


    //crud operations for title entity
    public function prepare_title_ro(){
        $this->setPageTitle("TITLU");

        $data['page_title']=$this->getPageTitle();
        $data['username']=$this->setSessionData();

        $data['players']=$this->crud_model_player->extractPlayerNameRO();

        //load the view with the form with the creation of a player
        $this->load->view('header_admin_area');
        $this->load->view('create_title_ro', $data);
        $this->load->view('footer_admin_area');
    }

    public function create_title(){
        //echo $this->input->post('player_nickname');

        if($this->crud_model_title->insertTitleRO($this->title_player_id, $this->parameters_crud)){
            $data_info_inserted['username']=$this->setSessionData();
            $data_info_inserted['player_nickname']=$this->input->post('player_nickname');
            $data_info_inserted['title_name']=$this->input->post('title_name');
            $data_info_inserted['title_date']=$this->input->post('title_date');
            $data_info_inserted['entity_type']=3;
            $data_info_inserted['report_entity']='Title';

            //load the view with the form with the creation of a title
            $this->loadSuccessPage($data_info_inserted);
        }else{
            //load the view with the form with the creation of a title
            $this->loadFailurePage();
        }
    }

    //this function will present the user with a screen offering details about the title that the user is about to delete
    public function prepare_delete_title($title_id){
        $data['page_title']=$this->setPageTitle('Raport preliminar stergere titlu');
        $data['username']=$this->setSessionData();

        $data['title_details']=$this->crud_model_title->extractTitleDetailsIDRO($title_id);
        $this->loadDeletePageReport($data);
    }

    public function delete_title($title_id){
        $this->crud_model_title->deleteTitleRO($title_id);
        redirect('index.php/title/read_title', 'refresh');
    }

    public function read_title_ro(){

        $this->setPageTitle('READ TITLES');

        //pagination configuration for results
        $config['base_url']=base_url().'index.php/title_ro/read_title_ro/';
        $config['total_rows']=$this->crud_model_title->countRowsTitleRO();
        $config['per_page']=20;
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

        $data['page_title']=$this->getPageTitle();
        $data['username']=$this->setSessionData();
        //apply model methods for getting the teams in the database
        $data['title_details']=$this->crud_model_title->extractTitleDetailsRO($config['per_page'],$this->uri->segment(3));//limit and offset parameters
        $data['entity_type']=3; //3 is a flag for TITLE entity

        $this->pagination->initialize($config);
        $data['links']=$this->pagination->create_links();

        $this->loadEntityDetails($data);
    }


    //helper methods
    public function loadSuccessPage($data){
        //load the view with the form with the creation of a video
        $this->load->view('header_admin_area');
        $this->load->view('create_entity_success_ro', $data);
        $this->load->view('footer_admin_area');
    }

    public function loadFailurePage(){
        //load the view with the form with the creation of a title
        $this->load->view('header_admin_area');
        $this->load->view('create_entity_failure');
        $this->load->view('footer_admin_area');
    }

    public function loadDeletePageReport($data){
        $this->load->view('header_admin_area');
        $this->load->view('delete_report_title', $data);
        $this->load->view('footer_admin_area');
    }

    //method for loading the view for admin area containing all players in the database
    public function loadEntityDetails($data){
        //load the view with the form with the creation of a title
        $this->load->view('header_admin_area');
        $this->load->view('entity_details_admin_ro', $data);
        $this->load->view('footer_admin_area');
    }

    //method for presenting screen information about the entity the user is about to update
    public function loadUpdateEntityDetails($data){
        //load the view with the form with the creation of a title
        $this->load->view('header_admin_area');
        switch($data['entity_type']){
            case 1:
                $this->load->view('prepare_update_player_ro', $data);
                break;
            case 2:
                $this->load->view('prepare_update_team', $data);
                break;
            case 3:
                $this->load->view('prepare_update_title_ro', $data);
                break;
            case 4:
                $this->load->view('prepare_update_video_ro', $data);
        }
        $this->load->view('footer_admin_area');
    }

    public function setSessionData(){
        $session_data = $this->session->userdata('logged_in');
        return $session_data['username'];
    }
}