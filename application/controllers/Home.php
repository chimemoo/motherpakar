<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_konsultasi');
	}

	public function index()
	{
		$this->load->view('page/home');
	}

	function konsultasi(){

		$data = [
			'macam_kerusakan' => $this->M_konsultasi->macam_kerusakan()
		];
		$this->load->view('page/konsultasi/pilihkerusakan',$data);
	}
	function start_konsultasi(){
		$konsultasi = $this->input->post('konsultasi');
		$data = [
			'id_user' => 1,
			'waktu'	=> date('Y-m-d H:i:s'),
			'kd_kerusakan' => $konsultasi
		];
		if($data){
			$start_konsultasi = $this->M_konsultasi->tmp_start_konsul($data);
			$array = array(
				'kd_kerusakan' => $konsultasi,
				'id_konsultasi' => $start_konsultasi[0]['id_konsultasi']
			);
			
			$this->session->set_userdata($array);
			redirect(base_url('home/mulai_konsultasi'));
		}
	}

	function mulai_konsultasi(){
		$kd_kerusakan = $_SESSION['kd_kerusakan'];
		$data_gejala = $this->M_konsultasi->ambil_gejala($kd_kerusakan);
		$array = array(
			'data_gejala' => $data_gejala,
			'total_gejala' => count($data_gejala),
			'no' => 0
		);
		
		$this->session->set_userdata( $array );
		$this->load->view('page/konsultasi/pilihgejala');
	}

	function cari_kerusakan($pilihan=''){
		$idkonsultasi = $_SESSION['id_konsultasi'];
		if($_SESSION['no'] < $_SESSION['total_gejala']){
			$kd_gejala = $_SESSION['data_gejala'][$_SESSION['no']];
			$gejalaNow = $this->M_konsultasi->getDetailGejala($kd_gejala);
			$tambah_detail_kerusakan = [
				'id_konsultasi' => $idkonsultasi,
				'kd_gejala' => $kd_gejala,
				'jawab' => $pilihan
			];
			$this->M_konsultasi->tambah_konsuldetail($tambah_detail_kerusakan);
			$_SESSION['no'] = $_SESSION['no']+1;
			echo json_encode($gejalaNow);
		}
	}

	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
?>