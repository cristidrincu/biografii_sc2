<?php 
class Upload extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));

		$image_path=null;
		$image_name=null;
		
	}

	public function index(){
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	public function do_upload(){

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width'] = '1920';
		$config['max_height'] = '1500';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('user_cristi'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->image_path=$data['upload_data']['full_path'];
			$this->image_name=$data['upload_data']['file_name'];
			$data['image_name']=$this->image_name;
			//$this->create_thumbs($this->image_path);
			$this->load->view('upload_success', $data);
		}

		$this->upload->initialize($config);
	}

	public function create_thumbs($image_path){
		$config['image_library'] = 'gd2';
		$config['source_image']	= $this->image_path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']	 = 75;
		$config['height']	= 50;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}
}