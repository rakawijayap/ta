<?php

class Longsor extends CI_Controller {

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	public function index(){
			$this->load->model("model_awal");
			$data['list_kec'] = $this->model_awal->load_kec();
			$data1['list_profile'] = $this->model_awal->load_profile();

			$this->load->view("sidebar",$data1);

			$this->load->view("nav");
			$this->load->view("rbl",$data,$data1);
			$this->load->view("foot");
		}

	public function edit(){
		$this->load->model("model_awal");
		if(isset($_POST['submit'])){
			$nama = $_POST['nama'];
			$userData = array(
				'rbl' => $this->input->post('rbl'),
				
			);
		}
		

		$editUserData = $this->model_awal->edit($userData,$nama);

		if($userData){
			$this->session->set_flashdata('success_msg','Berhasil');
			redirect('Longsor');
		}
		else{
			$this->session->set_flashdata('error_msg','gagal');
		}
	}
}
?>
