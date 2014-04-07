<?php

function checkSessionData($page_type, $data){
    $ci=& get_instance();
    $ci->load->library('session');
    if($ci->session->userdata('logged_in')){
        $session_data = $ci->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $ci->load->view($page_type, $data);
    }
    else{
        redirect('login', 'refresh');
    }
}