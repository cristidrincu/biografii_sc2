<?php
    function configUpload(){
        $ci=&get_instance();

        //prepare upload config
		$config['upload_path'] = './uploads/players';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width'] = '1920';
		$config['max_height'] = '1500';
		$config['remove_spaces'] = TRUE;

        $ci->load->library('upload', $config);

        if (!$ci->upload->do_upload()){
            $error['error'] = $ci->upload->display_errors();
            $ci->load->view('create_entity_failure', $error);
        }
}

function configUploadRequestedPlayer(){

    $ci=&get_instance();

    //prepare upload config
    $config['upload_path'] = './uploads/players/requested_players/';
    $config['allowed_types'] = 'jpg|png';
    $config['max_size']	= '5000';
    $config['max_width'] = '1920';
    $config['max_height'] = '1500';
    $config['remove_spaces'] = TRUE;
    //$this->load->library('upload', $config);

    $ci->load->library('upload', $config);

    if (!$ci->upload->do_upload('requested_player_image')){
        $error['error'] = $ci->upload->display_errors();
        $ci->load->view('create_entity_failure', $error);
    }
}

