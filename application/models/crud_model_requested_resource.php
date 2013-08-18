<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cristian
 * Date: 7/25/13
 * Time: 12:41 PM
 * To change this template use File | Settings | File Templates.
 */
class Crud_model_requested_resource extends CI_Model{

    function __construct(){
        parent::__construct();

        $this->load->model("crud_model_requested_player");
    }

    //class methods
    public function countRowsRequests(){
        $totalRows = $this->db->count_all("resources_requested_players");
        return $totalRows;
    }

    public function extractAllResources(){
        $this->db->select()->from("resources_requested_players rr")->join("requested_players rp", "rr.resource_player_id=rp.requested_player_id");
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function extractResourceBasedOnId($requested_resource_id){
        $this->db->select()->from("resources_requested_players rrp")->where(array("rrp.resource_id"=>$requested_resource_id));
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function extractPlayerNickname(){
        $this->db->select("requested_player_nickname")->from("requested_players rp")->join("resources_requested_players rr", "rp.requested_player_id=rr.resource_player_id");
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function insertRequestedResource($parameters){

        $data_to_insert=array(
            "resource_name" => $parameters["resource_name"],
            "resource_link" => $parameters["resource_link"],
            "resource_player_id" => $this->crud_model_requested_player->extractPlayerIDBasedOnNickname($parameters["requested_player_nickname"])
        );

        if($this->db->insert("resources_requested_players", $data_to_insert)){
            return true;
        }else{
            return false;
        }
    }

    public function updateRequestedResource($parameters){

        $data_to_update = array(
            "resource_name" => $parameters["resource_name"],
            "resource_link" => $parameters["resource_link"],
            "resource_player_id" => $parameters["resource_player_id"]
        );

        $this->db->where(array("resource_id"=>$parameters["resource_id"]));
        if($this->db->update("resources_requested_players", $data_to_update)){
            return true;
        }else{
            return false;
        }
    }

}
