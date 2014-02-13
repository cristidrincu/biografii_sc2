<?php

class Video_Ro extends CI_Controller{

    //class members
    public $page_title=null;

    //crud parameters for video entity
    public $parameters_crud=array();

    public $video_player_id=null;

    public $video_id=null;

    //class constructor
    function __construct(){
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->library('pagination');
        $this->load->model('login_model');
        $this->load->model('crud_model_player');
        $this->load->model('crud_model_video');

        $this->parameters_crud['player_nickname']=$this->input->post('player_nickname');
        $this->parameters_crud['video_name']=$this->input->post('video_name');
        $this->parameters_crud['video_link']=$this->input->post('video_link');
    }

    //injects the username for all views that require it
    public function setSessionUsername(){
        $this->username=$this->session->userdata('username');
        return $this->username;
    }

    public function setPageTitle($page_title){
        $this->page_title=$page_title;
    }

    public function getPageTitle(){
        return $this->page_title;
    }


    //crud operations for video entity
    public function prepare_video_ro(){
        $this->setPageTitle("VIDEO");

        $data['page_title']=$this->getPageTitle();
        $data['username']=$this->setSessionData();

        $data['players']=$this->crud_model_player->extractPlayerNameRO();

        //load the view with the form with the creation of a video
        $this->load->view('header_admin_area');
        $this->load->view('create_video_ro', $data);
        $this->load->view('footer_admin_area');
    }

    public function prepare_update_video_ro($video_id){
        $this->setPageTitle('Update video');

        $data['page_title']=$this->getPageTitle();
        $data['username']=$this->setSessionData();

        $data['video_details']=$this->crud_model_video->extractVideoDetailsIDRO($video_id);

        $data['entity_type']=4;
        $this->loadUpdateEntityDetails($data);
    }

    public function prepare_delete_video_ro($video_id){
        $this->setPageTitle('Raport preliminar stergere titlu');

        $data['page_title']=$this->getPageTitle();
        $data['username']=$this->setSessionData();

        $data['video_details']=$this->crud_model_video->extractVideoDetailsIDRO($video_id);

        $this->loadDeletePageReport($data);
    }

    public function create_video_ro(){

        $this->video_player_id=$this->crud_model_player->extractPlayerIDNicknameRO($this->parameters_crud['player_nickname']);

        if($this->crud_model_video->insertVideoRO($this->video_player_id, $this->parameters_crud)){

            $data_info_inserted['username']=$this->setSessionData();
            $data_info_inserted['player_nickname']=$this->input->post('player_nickname');
            $data_info_inserted['video_name']=$this->input->post('video_name');
            $data_info_inserted['video_link']=$this->input->post('video_link');
            $data_info_inserted['entity_type']=4;
            $data_info_inserted['report_entity']='Video';

            //load the view with the form with the creation of a video
            $this->loadSuccessPage($data_info_inserted);
        }else{
            //load the view with the form with the creation of a title
            $this->loadFailurePage();
        }
    }

    public function update_video_ro($video_id){

        $this->video_id=$this->crud_model_video->extractVideoIDRO($video_id);

        $this->crud_model_video->updateVideoRO($this->video_id, $this->parameters_crud);

        redirect('index.php/video/read_video');
    }

    public function read_video_ro(){
        $this->setPageTitle('READ VIDEOS');

        $data['page_title']=$this->getPageTitle();
        $data['username']=$this->setSessionData();

        //pagination configuration for results
        $config['base_url']=base_url().'index.php/video_ro/read_video_ro/';
        $config['total_rows']=$this->crud_model_video->countRowsVideoRO();
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
        $data['video_details']=$this->crud_model_video->extractVideoDetailsRO($config['per_page'],$this->uri->segment(3));//limit and offset parameters
        $data['entity_type']=4; //4 is a flag for VIDEO entity

        $this->pagination->initialize($config);
        $data['links']=$this->pagination->create_links();


        $this->loadEntityDetails($data);
    }

    public function delete_video_ro($video_id){
        $this->crud_model_video->deleteVideoRO($video_id);
        redirect('index.php/video/read_video', 'location');

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
        $this->load->view('entity_details_admin_ro', $data);
        $this->load->view('footer_admin_area');
    }

    //report page for the video being deleted
    public function loadDeletePageReport($data){
        $this->load->view('header_admin_area');
        $this->load->view('delete_report_video', $data);
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