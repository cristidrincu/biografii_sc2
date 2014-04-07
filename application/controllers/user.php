<?php

class User extends CI_Controller {
    function __construct(){
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('email');

        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');

        $this->load->model('crud_model_user');
        //custom helpers
        $this->load->helper('custom/prevent_back_browser');
        $this->load->helper('auth_helper');
        $this->load->helper('custom/create_entity_report');
        $this->load->helper('custom/pagination_config');

        //prevent user from using the back button and relogin or other weird operations
        preventUserBackButtonBrowser();

        //initialize crud parameters by assigning them values from the $_POST array which contains user name etc
        $this->parameters_crud['user_name']=$this->input->post('user_name');
        $this->parameters_crud['user_email']=$this->input->post('user_email');
        $this->parameters_crud['user_pass']=$this->input->post('user_pass');
        $this->parameters_crud['user_role']=$this->input->post('user_role');
    }

    public function getParametersCRUD(){
        return $this->parameters_crud;
    }

    public function prepare_create_user(){
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['userrole'] = $session_data['userrole'];
        $data['page_title'] = "USER";

        $data['roles'] = $this->crud_model_user->extractUserRoles();

        $this->load->view('header_admin_area');
        checkSessionData('create_user', $data);
        $this->load->view('footer_admin_area');
    }

    public function create_user(){
        $data_info_inserted = $this->getParametersCRUD();
        $email_message = "Te poti loga la urmatoarea adresa: http://www.biografii.starcraft2-vidcasts.ro/login. Username: ". $this->parameters_crud['user_name']. "Parola: " . $this->parameters_crud['user_pass'];

        if($this->crud_model_user->preventDuplicateUsers($this->parameters_crud['user_name'])){
            $this->loadFailurePage();
        }

        if($this->crud_model_user->createUser($this->getParametersCRUD())){
            $this->loadSuccessPage($data_info_inserted);
            $this->email->to($this->parameters_crud['user_email']);
            $this->email->from('warbringer@starcraft2-vidcasts.ro');
            $this->email->subject('Contul tau pentru biografii.starcraft2-vidcasts.ro a fost creat!');
            $this->email->message($email_message);
        }else{
            $this->loadFailurePage();
        }
    }

    public function read_users(){
        $data['page_title']="READ USERS";
        $data['username'] = $this->setSessionDataUserName();
        $data['user_role'] = $this->setSessionDataUserRole();

        //extract players and offset method for pagination
        //$data['player_details']=$this->crud_model_player->extractPlayerTeamName($config['per_page'], $this->uri->segment(3));
        $data['user_details']=$this->crud_model_user->extractAllUsers();
        $data['entity_type']=5; //1 is a flag for PLAYER entity

        $pagination_config = config_pagination(10, "user");//SEE pagination_config_helper HELPER for config_pagination($results_per_page) method

        $this->pagination->initialize($pagination_config);
        $data['links']=$this->pagination->create_links();

        $this->loadEntityDetails($data);
    }

    public function prepare_update_user($user_id){
        $data['username'] = $this->setSessionDataUserName();
        $data['user_details'] = $this->crud_model_user->extractUserDetails($user_id);
        $this->loadUpdateEntityDetails($data);
    }

    public function update_user($user_id){

        $newPassword = $this->input->post('user_password');
        $confirmNewPassword = $this->input->post('confirm_user_password');

        $parameters['user_name'] = $this->input->post('user_name');
        $parameters['user_email'] = $this->input->post('user_email');

        if($this->checkChangingPassword($newPassword, $confirmNewPassword)){
            $parameters['user_password'] = MD5($this->input->post('user_password'));
        }else{
            $parameters['user_password'] = $this->crud_model_user->extractUserPassword($user_id);
        }

        $parameters['user_role'] = $this->input->post('user_role');

        $this->crud_model_user->updateUser($user_id, $parameters);
        redirect('user/read_users');
    }

    public function delete_user($user_id){
        if($this->crud_model_user->deleteUser($user_id)){
            redirect('user/read_users');
        }else{
            $this->loadFailurePage();
        }
    }

    //helper methods
    public function loadSuccessPage($data){
        //load the view with the form with the creation of a player
        $this->load->view('header_admin_area');
        checkSessionData('create_user_success', $data);
        $this->load->view('footer_admin_area');
    }

    public function loadFailurePage(){
        //load the view with the form with the creation of a title
        $this->load->view('header_admin_area');
        $this->load->view('create_user_failure');
        $this->load->view('footer_admin_area');
    }

    //method for loading the view for admin area containing all players in the database
    public function loadEntityDetails($data){
        //load the view with the form with the creation of a title
        $this->load->view('header_admin_area');
        checkSessionData('entity_details_admin', $data);
        $this->load->view('footer_admin_area');
    }

    //method for presenting screen information about the entity the user is about to update
    public function loadUpdateEntityDetails($data){
        //load the view with the form with the creation of a title
        $this->load->view('header_admin_area');
        checkSessionData('prepare_update_user', $data);
        $this->load->view('footer_admin_area');
    }

    public function setSessionDataUserName(){  //helper function for retrieving username based on who is logged in
        $session_data = $this->session->userdata('logged_in');
        return $session_data['username'];
    }

    public function setSessionDataUserRole(){  //helper function for retrieving username based on who is logged in
        $session_data = $this->session->userdata('logged_in');
        return $session_data['userrole'];
    }

    public function checkChangingPassword($newPassword, $checkNewPassword){
        if(!empty($newPassword) && !empty($checkNewPassword)){
            if($newPassword === $checkNewPassword){
                return true;
            }
        }else{
            return false;
        }
    }
} 