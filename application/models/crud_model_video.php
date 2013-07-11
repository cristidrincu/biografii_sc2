<?php

class Crud_model_video extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function countRowsVideo(){
		$total_rows=$this->db->count_all('PLAYER_VIDEOS');
		return $total_rows;
	}

    public function countRowsVideoRO(){
        $total_rows=$this->db->count_all('PLAYER_VIDEOS_ROMAN');
        return $total_rows;
    }

	public function extractVideoDetails($results_per_page, $offset){
		$this->db->distinct('video_id, nickname, video_title, video_link')->from('PLAYER_VIDEOS V')->join('PLAYER P', 'V.player_video_id=P.player_ID')->order_by('nickname', 'ASC')->limit($results_per_page,$offset);
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

    public function extractVideoDetailsRO($results_per_page, $offset){
        $this->db->distinct('video_id, nickname, video_title, video_link')->from('PLAYER_VIDEOS_ROMAN V')->join('PLAYER_ROMAN P', 'V.player_video_id=P.player_ID')->order_by('nickname', 'ASC')->limit($results_per_page,$offset);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

	public function extractVideoDetailsID($video_ID){
		$this->db->select('video_id, video_title, video_link')->from('PLAYER_VIDEOS PV')->where(array('PV.video_id'=>$video_ID));
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

    public function extractVideoDetailsIDRO($video_ID){
        $this->db->select('video_id, video_title, video_link')->from('PLAYER_VIDEOS_ROMAN PV')->where(array('PV.video_id'=>$video_ID));
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

	public function extractVideoID($video_id){
		
		$query=$this->db->get_where('PLAYER_VIDEOS PV', array('PV.video_id'=>$video_id));
		foreach($query->result() as $row){
			return $row->video_id;
		}
	}

    public function extractVideoIDRO($video_id){

        $query=$this->db->get_where('PLAYER_VIDEOS_ROMAN PV', array('PV.video_id'=>$video_id));
        foreach($query->result() as $row){
            return $row->video_id;
        }
    }

	public function insertVideo($player_video_id, $parameters){
		$data=array(
			"player_video_id" => $player_video_id,
			"video_title" => $parameters['video_name'],
			"video_link" => $parameters['video_link']
		);

		if($this->db->insert("PLAYER_VIDEOS", $data)){
			return true;
		}else{
			return false;
		}
	}

    public function insertVideoRO($player_video_id, $parameters){
        $data=array(
            "player_video_id" => $player_video_id,
            "video_title" => $parameters['video_name'],
            "video_link" => $parameters['video_link']
        );

        if($this->db->insert("PLAYER_VIDEOS_ROMAN", $data)){
            return true;
        }else{
            return false;
        }
    }

	public function updateVideo($video_id, $parameters){
		$update_data=array(
			"video_id"=>$video_id,
			"video_title"=>$parameters['video_name'],
			"video_link"=>$parameters['video_link']
		);

		$this->db->where(array('video_id'=>$video_id));
		$this->db->update('PLAYER_VIDEOS', $update_data);
	}

    public function updateVideoRO($video_id, $parameters){
        $update_data=array(
            "video_id"=>$video_id,
            "video_title"=>$parameters['video_name'],
            "video_link"=>$parameters['video_link']
        );

        $this->db->where(array('video_id'=>$video_id));
        $this->db->update('PLAYER_VIDEOS_ROMAN', $update_data);
    }

	public function deleteVideo($video_id){
		$this->db->delete('PLAYER_VIDEOS', array('video_id'=>$video_id));
	}

    public function deleteVideoRO($video_id){
        $this->db->delete('PLAYER_VIDEOS_ROMAN', array('video_id'=>$video_id));
    }
}