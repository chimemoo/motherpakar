<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
	}

	public function index()
	{
		$this->is_login();
		$this->load->view('page/login');
	}

	function login_process(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = [
			'username' => $username,
			'password' => $password
		];
		if($this->M_auth->login_process($data) > 0){
			if($this->M_auth->cekJenis($data) == 'pengguna'){
				$userdata = [
					'username' => $username,
					'id_user'  => $this->M_auth->getId($data),
					'jenis'	   => 'pengguna'
				];
				$this->session->set_userdata($userdata);
				redirect(base_url('Home'));	
			}
			else{
				$userdata = [
					'username' => $username,
					'id_user'  => $this->M_auth->getId($data),
					'jenis'	   => 'pakar'
				];
				$this->session->set_userdata($userdata);
				redirect(base_url('Dashboard/main'));
			}
			
		}
	}

	function registration_process(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$alamat   = $this->input->post('alamat');
		$data = [
			'username' => $username,
			'password' => $password,
			'alamat'   => $alamat,
			'jenis'    => 'pengguna'
		];
		if($this->M_auth->registration_process($data) > 0){
			redirect(base_url('Login'));
		}
	}

	function is_login(){
		if(isset($_SESSION['jenis'])){
			if($_SESSION['jenis'] == 'pengguna'){
				redirect(base_url('Home'));
			}
			else {
				redirect(base_url('Dashboard/main'));	
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
