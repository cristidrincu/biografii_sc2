<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cristian
 * Date: 7/23/13
 * Time: 8:02 PM
 * To change this template use File | Settings | File Templates.
 */
class Crud_model_requested_player extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    public function countRowsReqPlayer(){
        $total_rows=$this->db->count_all("requested_players");
        return $total_rows;
    }

    public function extractPlayerIDNickname($player_nickname){
        $query = $this->db->get_where("requested_players rp",array("rp.requested_player_nickname" => $player_nickname));
        foreach($query->result() as $row){
            return $row->requested_player_id;
        }
    }

    public function extractPlayerImage($player_id){
        $query=$this->db->get_where("requested_players", array("requested_player_id"=>$player_id));
        foreach($query->result() as $row){
            return $row->requested_player_image;
        }
    }

    public function extractAllRequestedPlayers(){
        $this->db->select()->from("requested_players");
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function extractPlayerDetails($player_id){
        $this->db->select()->from("requested_players rp")->where(array("rp.requested_player_id"=>$player_id));
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function extractRequestedPlayer($player_id){
        $query=$this->db->get_where("requested_players rp", array("rp.requested_player_id"=>$player_id));
        foreach($query->result() as $row){
            return $row->requested_player_id;
        }
    }


    public function eliminatePlayerFromQuery(){
        $this->db->select("requested_player_nickname")->from("requested_players rp")->join("resources_requested_players rrp", "rp.requested_player_id != rrp.resource_player_id", "right");
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function extractPlayerIDBasedOnNickname($nickname){
        $query=$this->db->get_where("requested_players rp", array("rp.requested_player_nickname"=>$nickname));
        foreach($query->result() as $row){
            return $row->requested_player_id;
        }
    }

    public function extractRequestedPlayers($race){
        //define query
        $this->db->select()->from('requested_players rp')->where(array('rp.requested_player_race'=>$race));
        $query = $this->db->get();
        $result=$query->result();
        return $result;
    }

    public function insertRequestedPlayer($parameters, $image_path){
        $data_to_insert=array(
            "requested_player_nickname" => $parameters["requested_player_nickname"],
            "requested_player_name" => $parameters["requested_player_name"],
            "requested_player_image" => $image_path,
            "requested_player_image_url" => $parameters["requested_player_image_url"].$image_path,
            "requested_player_race" => $parameters["requested_player_race"]
        );

        if($this->db->insert("requested_players", $data_to_insert)){
            return true;
        }else{
            return false;
        }
    }

    public function updateRequestedPlayer($parameters, $image_path){
        $update_data=array(
        "requested_player_nickname"=>$parameters["requested_player_nickname"],
        "requested_player_image"=>$image_path,
        "requested_player_name"=>$parameters["requested_player_name"],
        "requested_player_race"=>$parameters["requested_player_race"],
        "requested_player_image_url"=>$parameters["requested_player_image_url"].$image_path
        );

        $this->db->where("requested_player_id", $parameters["requested_player_id"]);
        if($this->db->update("requested_players", $update_data)){
            return true;
        }else{
            return false;
        }
    }

    public function deleteRequestedPlayer($player_id){
        if($this->db->delete("requested_players", array("requested_player_id"=>$player_id))){
            return true;
        }else{
            return false;
        }
    }
}
