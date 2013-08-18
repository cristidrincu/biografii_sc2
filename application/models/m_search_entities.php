<?php 
class M_search_entities extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	//search for a players nickname - as in DeMuslim
	public function searchPlayerFirstName($player_name){
		$this->db->select('player_ID,name, nickname, DOB, country, race, team')->from('PLAYER')->like('nickname', $player_name);
		$query=$this->db->get();
		$result = $query->result();
		return $result;
	}

    public function searchPlayerFirstNameRO($player_name){
        $this->db->select('player_ID,name, nickname, DOB, country, race, team')->from('PLAYER_ROMAN')->like('nickname', $player_name);
        $query=$this->db->get();
        $result = $query->result();
        return $result;
    }

	public function searchTeam($team_name){
		$this->db->select('ID, team_name, team_country, number_of_players')->from('TEAM')->like(array('team_name'=>$team_name));
		$query=$this->db->get();
		$result = $query->result();
		return $result;
	}

	public function player_backend_results($nickname){
		$this->db->select()->from('PLAYER P')->like(array('P.nickname'=>$nickname), 'both');
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

    public function player_backend_results_ro($nickname){
        $this->db->select()->from('PLAYER_ROMAN P')->like(array('P.nickname'=>$nickname), 'both');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

	public function team_backend_results($team_name){
		$this->db->select('ID, team_name, team_country, number_of_players, team_found_date')->from('TEAM T')->like(array('T.team_name'=>$team_name), 'both');
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

	public function title_backend_results($title_name){
		$this->db->select('ID, nickname, title_name, title_date')->from('TITLE T')->join("PLAYER P", "T.player_id=P.player_ID AND T.title_name LIKE '%{$title_name}%'", "inner");
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

    public function title_backend_results_ro($title_name){
        $this->db->select('ID, nickname, title_name, title_date')->from('TITLE T')->join("PLAYER_ROMAN P", "T.player_id=P.player_ID AND T.title_name LIKE '%{$title_name}%'", "inner");
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

	public function video_backend_results($video_title){
		$this->db->select('video_id, nickname, video_title, video_link')->from('PLAYER_VIDEOS PV')->join("PLAYER P", "PV.player_video_id=P.player_ID AND PV.video_title LIKE '%{$video_title}%'", "inner");
		$query=$this->db->get();
		$result=$query->result();
		return $result;

	}

    public function video_backend_results_ro($video_title){
        $this->db->select('video_id, nickname, video_title, video_link')->from('PLAYER_VIDEOS PV')->join("PLAYER_ROMAN P", "PV.player_video_id=P.player_ID AND PV.video_title LIKE '%{$video_title}%'", "inner");
        $query=$this->db->get();
        $result=$query->result();
        return $result;

    }

    public function requested_player_backend_results($player_nickname){
        $this->db->select()->from("requested_players");
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
}