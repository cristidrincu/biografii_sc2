<?php

class Search_Ro extends CI_Controller{

    //class members
    public $page_title=null;
    public $entity_type=null;

    public $dataDefaultKeywords=array();
    public $dataPlayerEntity=array();
    public $playerNickname=null;

    public function __construct(){
        parent::__construct();
        $this->load->model('m_search_entities');

        $this->dataDefaultKeywords[]='Starcraft 2, Starcraft2, Blizzard, jucatori pro, jucatori romani, biografii, coreea, europa, statele unite, castiguri, titluri, clipuri video, echipe profesionale, evil geniuses, team liquid, alliance, acer, alternate, axiom, azubu, cjentus, complexity gaming, fnatic, fxopen, incredible miracle, mvp, prime, team 8, samsung khan, root gaming, sk gaming, sk telecom t1, startale, stx soul, team empire, team liquid, woongjin stars';
        //$this->playerNickname=$this->input->post('search_field');
        $this->dataPlayerEntity=$this->m_search_entities->searchPlayerFirstName($this->input->post('search_field'));
    }

    public function setPageTitle($title){
        $this->page_title=$title;
    }

    public function getPageTitle(){
        return $this->page_title;
    }

    public function setEntityType($type){
        $this->entity_type=$type;
    }

    public function getEntityType(){
        return $this->entity_type;
    }

    public function getDefaultKeywords(){
        return $this->dataDefaultKeywords;
    }

    public function setDataPlayerEntity($data){
        $this->dataPlayerEntity=$data;
    }

    public function getDataPlayerEntity(){
        return print_r($this->dataPlayerEntity);
    }

    public function results_ro(){
        $dataKeywords['data_keywords']=$this->getDefaultKeywords();
        $data['search_results_nickname']=$this->m_search_entities->searchPlayerFirstNameRO($this->input->post('search_field'));
        if(empty($_POST['search_field'])){
            redirect('index.php/search/loadNoResultsPage');
        }else if(count($data['search_results_nickname'])==0){
            redirect('index.php/search_ro/loadNoResultsPage');
        }else{
            redirect('index.php/search_ro/loadResultsPage/'.$this->input->post('search_field'));
        }
    }

    //controller methods for redirecting to views and preventing form resubmission
    public function loadNoResultsPage(){
        $dataKeywords['data_keywords']=$this->getDefaultKeywords();

        $this->load->view('header', $dataKeywords);
        $this->load->view('no_database_results_ro');
        $this->load->view('footer');
    }

    public function loadResultsPage($nickname){
        $dataKeywords['data_keywords']=$this->getDefaultKeywords();
        $data['search_results_nickname']=$this->m_search_entities->searchPlayerFirstNameRO($nickname);
        $this->load->view('header', $dataKeywords);
        $this->load->view('search_results_ro', $data);
        $this->load->view('footer');

    }

    public function loadResultsPageTeam($team_name){
        $dataKeywords['data_keywords']=$this->getDefaultKeywords();
        $data['search_results_team_name']= $this->m_search_entities->searchTeam($team_name);

        $this->load->view('header', $dataKeywords);
        $this->load->view('search_results_team', $data);
        $this->load->view('footer');
    }

    //MUST IMPLEMENT PRG DESIGN PATTERN FOR TEAM RESULTS
    public function team_results(){

        //load the model
        $data['search_results_team_name'] = $this->m_search_entities->searchTeam($this->input->post('search_field_team'));

        if(empty($_POST['search_field_team'])){
            redirect('index.php/search/loadNoResultsPage');
        }else{
            if(count($data['search_results_team_name'])==0){
                redirect('index.php/search/loadNoResultsPage');
            }else{
                redirect('index.php/search/loadResultsPageTeam/'.$this->input->post('search_field_team'));
            }
        }
    }

    //BACKEND SEARCH FUNCTIONS
    //THE GET FUNCTIONS THAT COMPOSE THE POST-REDIRECT-GET DESIGN PATTERN
    public function load_no_results_page_backend(){
        $this->load->view('header_admin_area');
        $this->load->view('no_database_results');
        $this->load->view('footer');
    }

    public function load_results_page_backend_player_ro($search_keyword, $entity_type){

        $this->setPageTitle('Rezultate cautare dupa jucator');

        $data['player_entity']=$this->m_search_entities->player_backend_results_ro($search_keyword);


        $data['page_title']=$this->getPageTitle();
        $data['username']=$this->setSessionData();
        $data['entity_type']=$entity_type;

        $this->load->view('header_admin_area');
        $this->load->view('search_results_backend_ro', $data);
        $this->load->view('footer');
    }

    public function load_results_page_backend_team($search_keyword, $entity_type){
        $this->setPageTitle('Rezultate cautare dupa echipa');

        $data['team_entity']=$this->m_search_entities->team_backend_results($search_keyword);
        $data['page_title']=$this->getPageTitle();
        $data['username']=$this->setSessionData();
        $data['entity_type']=$entity_type;

        $this->load->view('header_admin_area');
        $this->load->view('search_results_backend', $data);
        $this->load->view('footer');
    }

    public function load_results_page_backend_title($search_keyword, $entity_type){
        $this->setPageTitle('Rezultate cautare dupa titlu');

        $data['title_entity']=$this->m_search_entities->title_backend_results_ro($search_keyword);
        $data['page_title']=$this->getPageTitle();
        $data['username']=$this->setSessionData();
        $data['entity_type']=$entity_type;

        $this->load->view('header_admin_area');
        $this->load->view('search_results_backend_ro', $data);
        $this->load->view('footer');
    }

    public function load_results_page_backend_video($search_keyword, $entity_type){
        $this->setPageTitle('Rezultate cautare dupa video');

        $data['video_entity']=$this->m_search_entities->video_backend_results_ro($search_keyword);
        $data['page_title']=$this->getPageTitle();
        $data['username']=$this->setSessionData();
        $data['entity_type']=$entity_type;

        $this->load->view('header_admin_area');
        $this->load->view('search_results_backend_ro', $data);
        $this->load->view('footer');

    }

    //POST-REDIRECT-GET DESIGN PATTERN - BELOW ARE THE POST FUNCTIONS + INDIVIDUAL REDIRECTS PER THE ENTITY THEY REPRESENT
    public function get_player_backend_ro(){

        //sets the entity type - this way, the view will now, based on the entity type, what table to load with how many cells etc - entity type 1 is a PLAYER entity
        $this->setEntityType(1);
        $data['player_entity']=$this->m_search_entities->player_backend_results_ro($this->input->post('search_field'));

        if(empty($_POST['search_field'])){
            redirect('index.php/search/load_no_results_page_backend');
        }else if(count($data['player_entity'])==0){
            redirect('index.php/search/load_no_results_page_backend');
        }else{
            redirect('index.php/search_ro/load_results_page_backend_player_ro/'.$this->input->post('search_field').'/'.$this->getEntityType());
        }
    }

    public function get_team_backend(){
        $this->setEntityType(2); //entity type 2 is a TEAM entity

        $data['team_entity']=$this->m_search_entities->team_backend_results($this->input->post('search_field'));

        if(empty($_POST['search_field'])){
            redirect('index.php/search/load_no_results_page_backend');
        }else if(count($data['team_entity'])===0){
            redirect('index.php/search/load_no_results_page_backend');
        }else{
            redirect('index.php/search/load_results_page_backend_team/'.$this->input->post('search_field').'/'.$this->getEntityType());
        }
    }

    public function get_title_backend_ro(){

        $this->setEntityType(3); //entity type 3 is a TITLE entity
        $data['title_entity']=$this->m_search_entities->title_backend_results_ro($this->input->post('search_field'));

        if(empty($_POST['search_field'])){
            redirect('index.php/search/load_no_results_page_backend');
        }else if(count($data['title_entity'])==0){
            redirect('index.php/search/load_no_results_page_backend');
        }else{
            redirect('index.php/search/load_results_page_backend_title/'.$this->input->post('search_field').'/'.$this->getEntityType());
        }
    }

    public function get_video_backend_ro(){

        $this->setEntityType(4);
        $data['video_entity']=$this->m_search_entities->video_backend_results_ro($this->input->post('search_field'));


        if(empty($_POST['search_field'])){
            redirect('index.php/search/load_no_results_page_backend');
        }else if(count($data['video_entity'])==0){
            redirect('index.php/search/load_no_results_page_backend');
        }else{
            redirect('index.php/search/load_results_page_backend_video/'.$this->input->post('search_field').'/'.$this->getEntityType());
        }
    }
    //END OF PRG DESIGN PATTERN FUNCTIONS


    public function setSessionData(){
        $session_data = $this->session->userdata('logged_in');
        return $session_data['username'];
    }
}