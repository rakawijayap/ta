<?php

class map extends CI_Controller {

	
	public function index(){
			$this->load->model("model_awal");
			$data1['list_profile'] = $this->model_awal->load_profile();

			$this->load->view("sidebar", $data1);

			$this->load->view("nav");
			$this->load->view("map");
			$this->load->view("foot");
		}
}
?>
