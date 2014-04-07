<?php

class M_all_entities extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

    public function countResults($table_name, $race){
        $this->db->like('race', $race);
        $this->db->from($table_name);
        $rows=$this->db->count_all_results();
        return $rows;
    }

	//get all players from the db based on their race
	public function getAllPlayers($race){
		$this->db->select('player_ID,name, nickname, DOB, country, race, team')->from('PLAYER')->where('race', $race)->order_by('nickname', 'asc');
		//$this->db->order_by('name', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//get the latest 6 player entries based on the timestamp field in the database
	public function getLatestPlayers(){
		$this->db->select('player_ID, name, nickname, DOB, country, race, team');
		$this->db->order_by('nickname','asc');
		$query = $this->db->get_where('PLAYER', 'created_at BETWEEN SUBDATE(CURDATE(), INTERVAL 1 MONTH) AND NOW()', 12);//limit to 12 players only
		return $query->result();
	}

	//get a specific player based on ID
	public function getPlayer($player_id){
		$this->db->select('player_ID, name, nickname, DOB, country, race, team, description, winnings, player_image')->from('PLAYER')->where('player_ID', $player_id);
		$query=$this->db->get();
		$result = $query->result();
		return $result;
	}

    public function getPlayerKeywords($player_id){
        $query=$this->db->get_where('PLAYER',array('player_ID'=>$player_id));
        foreach($query->result() as $row){
            return array($row->player_keywords);
        }
    }

	public function getPlayerTitles($player_id){
		$this->db->select("player_id, title_name, title_date")->from('TITLE')->where('player_id', $player_id);
		//$query = $this->db->get_where("TITLE", array("player_id"=>$player_id));
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function getPlayerVideos($player_id){
		$this->db->select("video_title, video_link")->from("PLAYER_VIDEOS")->where("player_video_id", $player_id);
		$query = $this->db->get();
		$result=$query->result();
		return $result;
	}

	public function getAllTeams(){
		$this->db->select('ID, team_name, team_country, number_of_players, team_description')->from('TEAM')->order_by('team_name', 'asc');
		//$this->db->order_by('name','asc');
		$query=$this->db->get();
		return $query->result();
	}

	//another function to get team details such as the description of the team
	public function getTeamDetails($team_id){
		$this->db->select('ID, team_name, team_country, team_description, team_found_date, team_manager, team_sponsors, team_logo')->from('TEAM')->where('ID', $team_id);
		//$query = $this->db->get_where('TEAM', array('name'=>$name));
		$query= $this->db->get();
		$result = $query->result();
		return $result;
	}

	//should refactor to getPlayersDetailsTeam
	public function getPlayersDetailsTeam($ID){
		$this->db->select('player_ID, player_team_id, name, nickname, race')->from('PLAYER')->where('player_team_id', $ID);
		//$query = $this->db->get_where('PLAYER', array('player_team_id'=>$ID));
		$query=$this->db->get();
		$result = $query->result();
		return $result;
	}

    public function findPlayerFirstLetter($firstLetter, $race){
        $this->db->select('player_ID, name, nickname, DOB, country, race, team')->from('PLAYER P')->where(array('race'=>$race))->like('nickname', $firstLetter, 'after');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function findTeamFirstLetter($firstLetter){
        $this->db->select('ID, team_name, team_country, number_of_players')->from('TEAM T')->like('team_name', $firstLetter, 'after');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getPublisherID($player_id){
        $query=$this->db->get_where('PLAYER',array('player_ID'=>$player_id));
        foreach($query->result() as $row){
            return $row->publisher_id;
        }

    }

    public function getPlayerPublishingDate($player_id){
        $query=$this->db->get_where('PLAYER P', array('P.player_ID'=>$player_id));
        foreach($query->result() as $row){
            return $row->created_at;
        }
    }
}