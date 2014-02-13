<?php
function config_pagination($results_per_page, $entity_type){

    $ci=&get_instance();
    $ci->load->library('pagination');
    $ci->load->model('crud_model_player');
    $ci->load->model('crud_model_title');
    $ci->load->model('crud_model_team');
    $ci->load->model('crud_model_video');
    $ci->load->model('crud_model_requested_player');



    switch($entity_type){
        case "player":
            $config["base_url"] = base_url().'index.php/player/read_player/';
            $config['total_rows']=$ci->crud_model_player->countRowsPlayer();
        break;
        case "title":
            $config["base_url"] = base_url().'index.php/title/read_title/';
            $config["total_rows"]=$ci->crud_model_title-countRowsTitle();
        break;
        case "team":
            $config["base_url"] = base_url().'index.php/team/read_team/';
            $config["total_rows"]=$ci->crud_model_team->countRowsTeam();
        break;
        case "video":
            $config["base_url"] = base_url().'index.php/video/read_video/';
            $config["total_rows"]=$ci->crud_model_video->countRowsVideo();
        break;
        case "requested_player":
            $config["base_url"] = base_url().'index.php/requested_player/read_requested_player/';
            $config["total_rows"]=$ci->crud_model_requested_player->countRowsReqPlayer();
        break;
        case "resource_requested_player":
            $config["base_url"] = base_url().'index.php/resources_requested_player/read_requested_resource/';
            $config["total_rows"]=$ci->crud_model_requested_resource->countRowsRequests();
        break;
    }



    $config['per_page']=$results_per_page;
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

    return $config;

}