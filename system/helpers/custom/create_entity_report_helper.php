<?php
function playerReport($entity_properties){

    $ci=&get_instance();

    //create an array that holds the information inserted in the database
    $data_info_inserted['username']=$ci->setSessionData();
    $data_info_inserted['player_name']=$entity_properties['player_name'];
    $data_info_inserted['player_nickname']=$entity_properties['player_nickname'];
    $data_info_inserted['player_dob']=$entity_properties['player_dob'];
    $data_info_inserted['player_country']=$entity_properties['player_country'];
    $data_info_inserted['player_race']=$entity_properties['player_race'];
    $data_info_inserted['player_team']=$entity_properties['player_team'];
    $data_info_inserted['player_winnings']=$entity_properties['player_winnings'];
    $data_info_inserted['player_keywords']=$entity_properties['player_keywords'];
    $data_info_inserted['entity_type']=1;
    $data_info_inserted['report_entity']='Player';

    return $data_info_inserted;
}