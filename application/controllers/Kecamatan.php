<?php

class kecamatan extends CI_Controller {

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
			$this->load->view("kecamatan",$data,$data1);
			$this->load->view("foot");
		}

	public function edit(){
		$this->load->model("model_awal");
		if(isset($_POST['submit'])){
			$id = $_POST['id'];
			$userData = array(
				'nama' => $this->input->post('nama'),
				
			);
		}
		

		$editUserData = $this->model_awal->edit($userData,$id);

		if($userData){
			$this->session->set_flashdata('success_msg','Berhasil');
			redirect('kecamatan');
		}
		else{
			$this->session->set_flashdata('error_msg','gagal');
		}
	}

	public function tambah(){
		$this->load->model("model_awal");
		if(isset($_POST['submit'])){
			
			$userData = array(
			'nama' => $this->input->post('nama'),
			'k' => $this->input->post('k'),
			'pl' => $this->input->post('pl'),
			'rbl' => $this->input->post('rbl'),
			'ch' => $this->input->post('ch'),
			'cat' => $this->input->post('cat'),
			'jt' => $this->input->post('jt'),
		);

		$insertUserData = $this->model_awal->insertk($userData);
		redirect('kecamatan');
		}
		else {echo "Lengkapi Data !";}
	}

	public function delete(){
		$id = $this->input->post('id');

		$this->load->model("model_awal");
		$this->model_awal->deletek($id);
		redirect("kecamatan");
	}
}
?>
