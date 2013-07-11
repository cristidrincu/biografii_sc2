<?php

class Crud_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	//HELPER METHODS
	//method to extract team name and populate the select element on the view used to create a new player in the database
	public function extractTeamName(){
		$this->db->select('team_name')->from('TEAM')->order_by('team_name','ASC');
		$query=$this->db->get();
		$result = $query->result();
		return $result;
	}

	public function extractTeamID($team_name){
		$sql = 'SELECT ID FROM TEAM WHERE team_name= "' . $team_name . '"';
		$query=$this->db->query($sql);
		//$query=$this->db->select('ID')->from('TEAM')->where('name',$team_name);
		if($query->num_rows()>0)
		{
   			$row=$query->row();
   			return $row->ID;
		}
	}

	public function extractPlayerName(){
		$this->db->select('nickname')->from('PLAYER')->order_by('nickname', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function extractPlayerID($player_name){
		$sql='SELECT player_ID FROM PLAYER WHERE nickname="' . $player_name . '"';
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			$row=$query->row();
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

	//method for obtaining information from a player based on his ID
	public function extractPlayerDetailsID($player_id){
		$this->db->select('player_ID, nickname, name, DOB, country, race, team_name, winnings, description')->from('PLAYER P')->join('TEAM T', 'P.player_team_id=T.ID')->where('P.player_ID',$player_id);
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

	//this method will display the team name stored in the TEAM table
	public function extractPlayerTeamName(){
		$this->db->select()->from('TEAM T')->join('PLAYER P', 'T.ID=P.player_team_id');
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

	public function extractPlayerTeamID($team_id){
		$this->db->select('player_team_id')->from('PLAYER P')->join('TEAM T','P.player_team_id=T.'.$team_id.'');
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

	//general method for displaying all teams in the database
	public function extractTeamDetails(){
		$this->db->select('ID, team_name, team_country, number_of_players')->from('TEAM')->order_by('team_name','ASC');
		$query = $this->db->get();
		$result=$query->result();
		return $result;
	}

	//method that extracts the team id based on its name - will be used in the updatePlayer method
	public function extractTeamIDName($team_name){
		$query=$this->db->query('SELECT ID FROM TEAM T WHERE T.team_name="'.$team_name.'" LIMIT 1');
		//$query=$this->db->select('ID')->from('TEAM T')->where('T.team_name', $team_name);
		if($query->num_rows() > 0){
			$row=$query->row();
			return $row->ID;
		}
	}

	//method that extracts the team details based on the team ID - will be used in the updateTeam method
	public function extractTeamDetailsID($team_id){
		$this->db->select('ID, team_name, team_country, number_of_players')->from('TEAM')->where('ID', $team_id);
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

	public function extractTitleDetails(){
		$this->db->distinct('ID, nickname, title_name, title_date')->from('TITLE T')->join('PLAYER P', 'T.player_id=P.player_ID')->order_by('nickname', 'ASC');//use ->limit(10) to retrieve just the 1st 10 results
		$query=$this->db->get();
		$result=$query->result();
		return $result;		
	}

	public function extractTitleDetailsID($title_id){
		$this->db->select('ID, title_name, title_date')->from('TITLE')->where('ID', $title_id);
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

	public function extractTitleID($title_id){
		$query=$this->db->query('SELECT ID FROM TITLE T WHERE T.ID="'.$title_id.'"');
		if($query->num_rows()>0){
			$row=$query->row();
			return $row->ID;
		}
	}

	public function extractVideoDetails(){
		$this->db->distinct('video_id, nickname, video_title, video_link')->from('PLAYER_VIDEOS V')->join('PLAYER P', 'V.player_video_id=P.player_ID')->order_by('nickname', 'ASC');
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}


	//CREATE METHODS FOR PLAYER, TEAM, TITLE AND VIDEO ENTITIES
	public function insertPlayerDB($player_team_id, $name, $nickname, $dob, $country, $race, $team_name, $winnings, $description){
		$data=array(
			'player_team_id'=>$player_team_id,
			'name'=>$name,
			'nickname'=>$nickname,
			'DOB'=>$dob,
			'country'=>$country,
			'race'=>$race,
			'team'=>$team_name,
			'winnings'=>$winnings,
			'description'=>$description
		);
		
		if($this->db->insert('PLAYER', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function insertTeam($team_name, $team_country, $team_number_of_players){
		$data=array(
			"team_name" => $team_name,
			"team_country" => $team_country,
			"number_of_players" => $team_number_of_players
		);

		if($this->db->insert('TEAM', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function insertTitle($player_id, $title_name, $title_date){
		$data=array(
			"player_id" => $player_id,
			"title_name" => $title_name,
			"title_date" => $title_date
		);

		if($this->db->insert("TITLE", $data)){
			return true;
		}else{
			return false;
		}
	}

	public function insertVideo($player_video_id, $video_title, $video_link){
		$data=array(
			"player_video_id" => $player_video_id,
			"video_title" => $video_title,
			"video_link" => $video_link
		);

		if($this->db->insert("PLAYER_VIDEOS", $data)){
			return true;
		}else{
			return false;
		}
	}

	public function updatePlayer($player_id, $player_team_id, $name, $nickname, $dob, $country, $race, $team_name, $winnings, $description){
		$update_data=array(
			'player_team_id'=>$this->extractTeamIDName($team_name),
			'name'=>$name,
			'nickname'=>$nickname,
			'DOB'=>$dob,
			'country'=>$country,
			'race'=>$race,
			'team'=>$team_name,
			'winnings'=>$winnings,
			'description'=>$description
		);
		$this->db->where('player_ID', $player_id);
		$this->db->update('PLAYER', $update_data);
	}

	public function updateTeam($team_id, $team_name, $team_country, $number_of_players){
		$update_data=array(
			'team_name'=>$team_name,
			'team_country'=>$team_country,
			'number_of_players'=>$number_of_players
		);
		$this->db->where('ID', $team_id);
		$this->db->update('TEAM', $update_data);
	}

	public function updateTitle($title_id, $title_name, $title_date){
		$update_data=array(
			'title_name'=>$title_name,
			'title_date'=>$title_date
		);

		$this->db->where('ID', $title_id);
		$this->db->update('TITLE', $update_data);
	}
}