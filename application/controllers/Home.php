<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_konsultasi_new');
	}

	public function index()
	{
		$this->load->view('page/home');
	}

	function mulai_konsultasi(){
		$this->session->unset_userdata('gejala');
		$this->session->unset_userdata('kd_kerusakan');
		$this->session->unset_userdata('kesimpulan');
		$this->session->unset_userdata('id_konsultasi');
		$data = [
			'macam_kerusakan' => $this->M_konsultasi_new->macamKerusakan()
		];
		$this->load->view('page/konsultasi/pilihkerusakan',$data);

	}

	function konsultasi(){
		#TAMPILAN PERTANYAAN GEJALA
		$this->load->view('page/konsultasi/pilihgejala');
	}

	function createListGejala($kd_kerusakan){
		
		if(!isset($_SESSION['gejala'])){
			$gejala = $this->M_konsultasi_new->getListGejala($kd_kerusakan);
			$_SESSION['gejala'] = $gejala;
		}
		else {
			$gejala = $this->M_konsultasi_new->getListGejala($kd_kerusakan);
			$totalGejalaAwal = count($_SESSION['gejala']);
			foreach ($gejala as  $value) {
				$_SESSION['gejala'][$totalGejalaAwal] = $value;
				$totalGejalaAwal = $totalGejalaAwal + 1;
			}
		}
	}

	function getPertanyaan($kd_gejala){
		$pertanyaan = $this->M_konsultasi_new->getPertanyaan($kd_gejala);
		$pertanyaan = 'Apakah '.$pertanyaan[0]['gejala'].' ?';
		return $pertanyaan;
	}

	function tambahDataKonsul(){
		#TAMBAH DATA KONSULTASI YG DIALAMI
		$kd_kerusakan = $this->input->post('konsultasi');
		$data = [
			'id_user' => 1,
			'waktu'	=> date('Y-m-d H:i:s'),
			'kd_kerusakan' => $kd_kerusakan
		];
		$start_konsultasi = $this->M_konsultasi_new->tmpStartKonsul($data);
		if($start_konsultasi){
			$listGejala = $this->createListGejala($kd_kerusakan);
			$_GEJALA['gejala'] = null;
			$array = array(
				'id_konsultasi' => $start_konsultasi[0]['id_konsultasi'],
				'kd_kerusakan' => [$kd_kerusakan],
				'no' => 0,
				'start_k' => 0
			);
			
			$this->session->set_userdata( $array );
			redirect(base_url('home2/konsultasi'));
		}
	}

	function pertanyaan(){
		if($_SESSION['no'] < count($_SESSION['gejala'])){
			$no_gejala = $_SESSION['no'];
			$reply = [
				'status' 		=> true,
				'kd_gejala'		=> $_SESSION['gejala'][$no_gejala],
				'gejala' 		=> $this->getPertanyaan($_SESSION['gejala'][$no_gejala])
			];
			echo json_encode($reply);
		}
		else {
			$this->stop();
		}
	}

	function jawab($kd_gejala, $jawaban){
		$this->tambahDataGejala($kd_gejala,$jawaban);
	}

	function tambahDataGejala($kd_gejala,$jawab){
		#TAMBAH DATA GEJALA SEMENTARA
		$tambah_detail_kerusakan = [
			'id_konsultasi' => $_SESSION['id_konsultasi'],
			'kd_gejala' => $kd_gejala,
			'kd_kerusakan' => $_SESSION['kd_kerusakan'][$_SESSION['start_k']],
			'jawab' => $jawab
		];
		$this->M_konsultasi_new->tambahKonsulDetail($tambah_detail_kerusakan);
	}

	function control($param){
		
		if($param == 'start'){
			$this->pertanyaan();
		}
		elseif ($param == 'y') {
			$this->jawab($_SESSION['gejala'][$_SESSION['no']],'y');
			$_SESSION['no'] = $_SESSION['no'] + 1;
			$this->pertanyaan();
		}
		elseif ($param == 't') {
			$this->jawab($_SESSION['gejala'][$_SESSION['no']],'t');
			$alternatifK = $this->M_konsultasi_new->getAlternatifKerusakan($_SESSION['kd_kerusakan'][$_SESSION['start_k']],$_SESSION['gejala'][$_SESSION['no']]);
			if(!in_array($alternatifK, $_SESSION['kd_kerusakan'])){
				if($alternatifK!=null){
					array_push($_SESSION['kd_kerusakan'], $alternatifK);
					$_SESSION['start_k'] = $_SESSION['start_k'] + 1;
					$this->createListGejala($alternatifK);	
				}
				
			}
			$_SESSION['no'] = $_SESSION['no'] + 1;
			$this->pertanyaan();
		}
		
		
	}

	function stop(){
		$reply = [
			'status' => false
		];
		echo json_encode($reply);
	}

	function kesimpulan(){
		$h = $this->M_konsultasi_new->get_count($_SESSION['id_konsultasi']);
		$terbesar = max($h);
		foreach ($h as $key => $value) {
			if($value == $terbesar){
				return $key;
			}
		}
	}


	function getDetailKerusakan($kd_kerusakan){
		$dat = $this->M_konsultasi_new->getDetailKerusakan($kd_kerusakan);
		return $dat[0];
	}

	function hasil_konsultasi(){
		$this->session->unset_userdata('gejala');
		$kerusakan = $this->kesimpulan();

		$data = [
			'kerusakan' => $this->getDetailKerusakan($kerusakan),
			'solusi' => $this->M_konsultasi_new->getSolusiDetail($kerusakan),
			'penyebab' => $this->M_konsultasi_new->getPenyebabDetail($kerusakan)
		];
		$this->load->view('page/konsultasi/hasilkonsultasi',$data);
	}

	function test(){
		var_dump($_SESSION['kd_kerusakan']);
		var_dump($_SESSION['kd_kerusakan'][$_SESSION['start_k']]);
	}

	function riwayat_konsultasi(){
		$data_riwayat = $this->M_konsultasi_new->getRiwayat($_SESSION['id']);
	}




	

}

/* End of file Home2.php */
/* Location: ./application/controllers/Dashboard/Home2.php */ ?>