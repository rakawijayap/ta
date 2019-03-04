<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('model_login');

	}

	function index(){
		$this->load->view('login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		$where = array(
			'username' => $username,
			
			'sebagai' => "admin"
			);
		$where1 = array(
			'username' => $username,
			'sebagai' => "Manager"
			
			);
		$where2 = array(
			'username' => $username,
			'sebagai' => "user"
			
			);
		$cek = $this->model_login->cek_login("user",$where)->num_rows();
		$cek1 = $this->model_login->cek_login("user",$where1)->num_rows();
		$cek2 = $this->model_login->cek_login("user",$where2)->num_rows();
		$query = $this->db->query("SELECT * from user where username = '$username'");
    		$row = $query->row();	

		if($cek > 0){
					
    		if(password_verify($pass, $row->pass)){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("kelerengan"));}
			else{
				echo '<script language="javascript">
                    window.alert("LOGIN GAGAL! Silakan coba lagi");
                    window.location.href="./";
                  </script>';
			}

		}
		
			elseif($cek1 > 0){
				
					
    		if(password_verify($pass, $row->pass)){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("kecamatan"));}
			else{
				echo '<script language="javascript">
                    window.alert("LOGIN GAGAL! Silakan coba lagi");
                    window.location.href="./";
                  </script>';
			}

		}
		else{
		 	if($cek2 > 0){
					
    		if(password_verify($pass, $row->pass)){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("lahan"));}
			else{
				echo '<script language="javascript">
                    window.alert("LOGIN GAGAL! Silakan coba lagi");
                    window.location.href="./";
                  </script>';
			}

			}
		}
	}
	

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
