<?php

class Crud_model_team extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function countRowsTeam(){
		$total_rows=$this->db->count_all('TEAM');
		return $total_rows;
	}

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

	//general method for displaying all teams in the database
	public function extractTeamDetails($results_per_page, $offset){
		$this->db->select('ID, team_name, team_country, number_of_players, team_manager, team_sponsors, team_found_date')->from('TEAM')->order_by('team_name','ASC')->limit($results_per_page, $offset);
		$query = $this->db->get();
		$result=$query->result();
		return $result;
	}

	//method that extracts the team id based on its name - will be used in the updatePlayer method
	public function extractTeamIDName($team_id){
		$query=$this->db->get_where('TEAM T', array('T.ID'=>$team_id));
		//$query=$this->db->select('ID')->from('TEAM T')->where('T.team_name', $team_name);
		if($query->num_rows() > 0){
			$row=$query->row();
			return $row->ID;
		}
	}

	//method that extracts the team details based on the team ID - will be used in the updateTeam method
	public function extractTeamDetailsID($team_id){
		$this->db->select('ID, team_name, team_country, number_of_players, team_description, team_found_date, team_manager, team_sponsors, team_logo')->from('TEAM')->where('ID', $team_id);
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

	public function extractTeamLogo($team_id){
		$query=$this->db->select('team_logo')->from('TEAM')->where(array('ID'=>$team_id));
		foreach($query->result() as $row){
			return $row->team_logo;
		}
	}

	public function insertTeam($parameters, $image){
		$data=array(
			"team_name" => $parameters['team_name'],
			"team_country" => $parameters['team_country'],
			"number_of_players" => $parameters['team_number_of_players'],
			"team_description" => $parameters['team_description'],
			"team_found_date" => $parameters['team_founded'],
			"team_manager" => $parameters['team_manager'],
			"team_sponsors" => $parameters['team_sponsors'],
			"team_logo" => $image
		);

		if($this->db->insert('TEAM', $data)){
			return true;
		}else{
			return false;
		}
	}	

	public function updateTeam($team_id, $parameters, $team_logo){
		$update_data=array(
			'team_name'=>$parameters['team_name'],
			'team_country'=>$parameters['team_country'],
			'number_of_players'=>$parameters['team_number_of_players'],
			'team_description' => $parameters['team_description'],
			'team_found_date' => $parameters['team_founded'],
			'team_manager' => $parameters['team_manager'],
			'team_sponsors' => $parameters['team_sponsors'],
			'team_logo' => $team_logo
		);
		$this->db->where('ID', $team_id);
		$this->db->update('TEAM', $update_data);
	}

	public function deleteTeam($team_id){
		$this->db->delete('TEAM', array('ID'=>$team_id));
	}
}