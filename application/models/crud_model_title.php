<?php

class Crud_model_title extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function countRowsTitle(){
		$total_rows=$this->db->count_all('TITLE');
		return $total_rows;
	}

    public function countRowsTitleRO(){
        $total_rows=$this->db->count_all('TITLE_JUCATOR_ROMAN');
        return $total_rows;
    }

	public function extractTitleDetails($results_per_page, $offset){
		$this->db->select('ID, nickname, title_name, title_date')->from('TITLE T')->join('PLAYER P', 'T.player_id=P.player_ID')->order_by('nickname', 'ASC')->limit($results_per_page,$offset);// to retrieve just the 1st 10 results
		$query=$this->db->get();
		$result=$query->result();
		return $result;		
	}

    public function extractTitleDetailsRO($results_per_page, $offset){
        $this->db->select('ID, nickname, title_name, title_date')->from('TITLE_JUCATOR_ROMAN T')->join('PLAYER_ROMAN P', 'T.player_id=P.player_ID')->order_by('nickname', 'ASC')->limit($results_per_page,$offset);// to retrieve just the 1st 10 results
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

    public function extractTitleDetailsIDRO($title_id){
        $this->db->select('ID, title_name, title_date')->from('TITLE_JUCATOR_ROMAN')->where('ID', $title_id);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

	public function extractTitleIDName($title_id){
		$query=$this->db->query('SELECT ID FROM TITLE T WHERE T.ID="'.$title_id.'"');
		if($query->num_rows()>0){
			$row=$query->row();
			return $row->ID;
		}
	}

	public function extractTitleID($title_id){
		$query=$this->db->get_where('TITLE T', array('T.ID'=>$title_id));
		foreach($query->result() as $row){
			return $row->ID;
		}
	}

    public function extractTitleIDRO($title_id){
        $query=$this->db->get_where('TITLE_JUCATOR_ROMAN T', array('T.ID'=>$title_id));
        foreach($query->result() as $row){
            return $row->ID;
        }
    }

	public function insertTitle($player_id, $parameters){
		$data=array(
			"player_id" => $player_id,
			"title_name" => $parameters['title_name'],
			"title_date" => $parameters['title_date']
		);

		if($this->db->insert("TITLE", $data)){
			return true;
		}else{
			return false;
		}
	}

    public function insertTitleRO($player_id, $parameters){
        $data=array(
            "player_id" => $player_id,
            "title_name" => $parameters['title_name'],
            "title_date" => $parameters['title_date']
        );

        if($this->db->insert("TITLE_JUCATOR_ROMAN", $data)){
            return true;
        }else{
            return false;
        }
    }

	public function updateTitle($title_id, $parameters){
		$update_data=array(
			'title_name'=>$parameters['title_name'],
			'title_date'=>$parameters['title_date']
		);

		$this->db->where('ID', $title_id);
		$this->db->update('TITLE', $update_data);
	}

    public function updateTitleRO($title_id, $parameters){
        $update_data=array(
            'title_name'=>$parameters['title_name'],
            'title_date'=>$parameters['title_date']
        );

        $this->db->where('ID', $title_id);
        $this->db->update('TITLE_JUCATOR_ROMAN', $update_data);
    }

	public function deleteTitle($title_id){
		$this->db->delete('TITLE', array('ID'=>$title_id));
	}

    public function deleteTitleRO($title_id){
        $this->db->delete('TITLE_JUCATOR_ROMAN', array('ID'=>$title_id));
    }
}