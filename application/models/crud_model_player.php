<?php

class Crud_model_player extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function countRowsPlayer(){
		$total_rows=$this->db->count_all('PLAYER');
		return $total_rows;
	}

    //db method for romanian players
    public function countRowsPlayerRO(){
        $total_rows=$this->db->count_all('PLAYER_ROMAN');
        return $total_rows;
    }

	public function extractPlayerName(){
		$this->db->select('nickname')->from('PLAYER')->order_by('nickname', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

    //db method for romanian players
    public function extractPlayerNameRO(){
        $this->db->select('nickname')->from('PLAYER_ROMAN')->order_by('nickname', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

	public function extractPlayerID($player_id){
		$query=$this->db->get_where('PLAYER P', array('P.player_ID'=>$player_id));
		foreach($query->result() as $row){
			return $row->player_ID;
		}
	}

    //db method for romanian players
    public function extractPlayerIDRO($player_id){
        $query=$this->db->get_where('PLAYER_ROMAN P', array('P.player_ID'=>$player_id));
        foreach($query->result() as $row){
            return $row->player_ID;
        }
    }

	public function extractPlayerIDNickname($player_nickname){
		$query=$this->db->get_where('PLAYER P', array('P.nickname'=>$player_nickname));
		foreach($query->result() as $row){
			return $row->player_ID;
		}
	}

    //db method for romanian players
    public function extractPlayerIDNicknameRO($player_nickname){
        $query=$this->db->get_where('PLAYER_ROMAN P', array('P.nickname'=>$player_nickname));
        foreach($query->result() as $row){
            return $row->player_ID;
        }
    }

	//general method for displaying all players in the database
	public function extractPlayerDetails(){
		$this->db->select('player_ID, nickname, name, DOB, country, race, team_name, winnings')->from('PLAYER P')->JOIN('TEAM T', 'P.player_team_id=T.ID')->order_by('nickname', 'ASC');
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

    public function extractPlayerDetailsRO(){
        $this->db->select('player_ID, nickname, name, DOB, country, race, team_name, winnings')->from('PLAYER_ROMAN P')->JOIN('TEAM T', 'P.player_team_id=T.ID')->order_by('nickname', 'ASC');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

	//method for obtaining information from a player based on his ID
	public function extractPlayerDetailsID($player_id){
		$this->db->select('player_ID, nickname, name, DOB, country, race, team_name, winnings, description, player_image, player_keywords')->from('PLAYER P')->join('TEAM T', 'P.player_team_id=T.ID')->where('P.player_ID',$player_id);
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

    public function extractPlayerDetailsIDRO($player_id){
        $this->db->select('player_ID, nickname, name, DOB, country, race, team_name, winnings, description, player_image, player_keywords')->from('PLAYER_ROMAN P')->join('TEAM T', 'P.player_team_id=T.ID')->where('P.player_ID',$player_id);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

	//this method will display the team name stored in the TEAM table
	public function extractPlayerTeamName($results_per_page, $offset){
		$this->db->select()->from('TEAM T')->join('PLAYER P', 'T.ID=P.player_team_id')->limit($results_per_page, $offset);
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

    public function extractPlayerTeamNameRO($results_per_page, $offset){
        $this->db->select()->from('TEAM T')->join('PLAYER_ROMAN P', 'T.ID=P.player_team_id')->limit($results_per_page, $offset);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

	public function extractPlayerTeamID($player_id){
		$query = $this->db->get_where('PLAYER P', array('P.player_ID'=>$player_id));
		foreach($query->result() as $row){
			return $row->player_team_id;
		}
	}

    public function extractPlayerTeamIDRO($player_id){
        $query = $this->db->get_where('PLAYER_ROMAN P', array('P.player_ID'=>$player_id));
        foreach($query->result() as $row){
            return $row->player_team_id;
        }
    }

    public function extractPlayerImage($player_id){
        $query=$this->db->get_where('PLAYER P', array('P.player_ID'=>$player_id));
        foreach($query->result() as $row){
            return $row->player_image;
        }
    }


//CREATE METHODS FOR PLAYER, TEAM, TITLE AND VIDEO ENTITIES
	public function insertPlayerDB($player_team_id, $parameters, $image_path){

		$data=array(
			'player_team_id'=>$player_team_id,
			'name'=>$parameters['player_name'],
			'nickname'=>$parameters['player_nickname'],
			'DOB'=>$parameters['player_dob'],
			'country'=>$parameters['player_country'],
			'race'=>$parameters['player_race'],
			'team'=>$parameters['player_team'],
			'winnings'=>$parameters['player_winnings'],
			'description'=>$parameters['player_description'],
			'player_image'=>$image_path,
            'player_keywords'=>$parameters['player_keywords']
		);
		
		if($this->db->insert('PLAYER', $data)){
			return true;
		}else{
			return false;
		}
	}

    public function insertPlayerDBRO($player_team_id, $parameters, $image_path){

        $data=array(
            'player_team_id'=>$player_team_id,
            'name'=>$parameters['player_name'],
            'nickname'=>$parameters['player_nickname'],
            'DOB'=>$parameters['player_dob'],
            'country'=>$parameters['player_country'],
            'race'=>$parameters['player_race'],
            'team'=>$parameters['player_team'],
            'winnings'=>$parameters['player_winnings'],
            'description'=>$parameters['player_description'],
            'player_image'=>$image_path,
            'player_keywords'=>$parameters['player_keywords']
        );

        if($this->db->insert('PLAYER_ROMAN', $data)){
            return true;
        }else{
            return false;
        }
    }

    public function prevent_duplicate_player_entries($player_nickname){
        $this->db->select('player_ID')->from('PLAYER P')->where(array('P.nickname'=>$player_nickname));
        $query= $this->db->get();
        $result = $query->result();
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function prevent_duplicate_player_entries_RO($player_nickname){
        $this->db->select('player_ID')->from('PLAYER_ROMAN P')->where(array('P.nickname'=>$player_nickname));
        $query= $this->db->get();
        $result = $query->result();
        if($result){
            return true;
        }else{
            return false;
        }
    }

	public function updatePlayer($player_id, $player_team_id, $parameters, $image_path){
		$update_data=array(
			'player_team_id'=>$player_team_id,
			'name'=>$parameters['player_name'],
			'nickname'=>$parameters['player_nickname'],
			'DOB'=>$parameters['player_dob'],
			'country'=>$parameters['player_country'],
			'race'=>$parameters['player_race'],
			'team'=>$parameters['player_team'],
			'winnings'=>$parameters['player_winnings'],
			'description'=>$parameters['player_description'],
			'player_image'=>$image_path,
            'player_keywords'=>$parameters['player_keywords']
		);
		$this->db->where('player_ID', $player_id);
		$this->db->update('PLAYER', $update_data);
	}

    public function updatePlayerRO($player_id, $player_team_id, $parameters, $image_path){
        $update_data=array(
            'player_team_id'=>$player_team_id,
            'name'=>$parameters['player_name'],
            'nickname'=>$parameters['player_nickname'],
            'DOB'=>$parameters['player_dob'],
            'country'=>$parameters['player_country'],
            'race'=>$parameters['player_race'],
            'team'=>$parameters['player_team'],
            'winnings'=>$parameters['player_winnings'],
            'description'=>$parameters['player_description'],
            'player_image'=>$image_path,
            'player_keywords'=>$parameters['player_keywords']
        );
        $this->db->where('player_ID', $player_id);
        $this->db->update('PLAYER_ROMAN', $update_data);
    }

	public function deletePlayer($player_id){
		if($this->db->delete('PLAYER', array('player_ID'=>$player_id))){
            return true;
        }else{
            return false;
        }
	}

    public function deletePlayerRO($player_id){
        $this->db->delete('PLAYER_ROMAN', array('player_ID'=>$player_id));
    }

}