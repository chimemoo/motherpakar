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

	function mulai_konsultasi(){
		$this->session->unset_userdata('tidak');
		$data = [
			'macam_kerusakan' => $this->M_konsultasi->macam_kerusakan()
		];
		$this->load->view('page/konsultasi/pilihkerusakan',$data);

	}

	function konsultasi(){
		#TAMPILAN PERTANYAAN GEJALA
		$this->load->view('page/konsultasi/pilihgejala');
	}

	function tambah_data_konsul(){
		#TAMBAH DATA KONSULTASI YG DIALAMI
		$konsultasi = $this->input->post('konsultasi');
		$data = [
			'id_user' => 1,
			'waktu'	=> date('Y-m-d H:i:s'),
			'kd_kerusakan' => $konsultasi
		];
		if($this->M_konsultasi->tmp_start_konsul($data)){
			$relasi = $this->M_konsultasi->get_all_relation();
			$start_konsultasi = $this->M_konsultasi->tmp_start_konsul($data);
			$array = array(
				'relasi' => $relasi,
				'no' => 0,
				'no_tot' => 0,
				'total_soal' => count($relasi[$konsultasi])-1,
				'kd_kerusakan' => $konsultasi,
				'id_konsultasi' => $start_konsultasi[0]['id_konsultasi'],
				'alternatif_k' => null,
				'kd_tidak' => null
			);
			
			$this->session->set_userdata( $array );
			$this->daftar_gejala($kd_kerusakan);
			redirect(base_url('home/konsultasi'));
		}
	}


	function daftar_gejala($kd_kerusakan){
		#UNTUK MENCARI DAFTAR GEJALA
		$daftar_gejala = $this->M_konsultasi->ambil_gejala($kd_kerusakan);
		$array = array(
			'daftar_gejala' => $daftar_gejala
		);
		
		$this->session->set_userdata( $array );
	}

	function cek_hasil(){
		#UNTUK MENGHITUNG HASIL
	}

	function jalur_baru(){
		#MENAMBAH GEJALA BARU
		
	}
	function pertanyaan(){
		#AMBIL PERTANYAAN (GEJALA)
		$no_pert = $_SESSION['no'];
		if($_SESSION['no'] > $_SESSION['total_soal']){
			$_SESSION['kd_tidak'] = $_SESSION['kd_kerusakan'];
			$_SESSION['kd_kerusakan'] = $_SESSION['alternatif_k'];
			$_SESSION['no'] = 0;
			$_SESSION['total_soal'] = $_SESSION['no_tot'] + count($_SESSION['relasi'][$_SESSION['kd_kerusakan']]);
		}
		// if($_SESSION['relasi'][$_SESSION['kd_kerusakan']][$no_pert] == $_SESSION['kd_tidak'] ){
		// 	$no_pert = $no_pert +1;
		// }

		$pert = $_SESSION['relasi'][$_SESSION['kd_kerusakan']][$_SESSION['no']];
		$pert = $this->M_konsultasi->getDetailGejala($pert); 
		$pert['kd_kerusakan'] = $_SESSION['kd_kerusakan'];
		$pert['no'] = $_SESSION['no'];
		$pert['total_soal'] = $_SESSION['total_soal'];
		$pert['alternatif_k'] = $_SESSION['alternatif_k'];
		$pert['no_tot'] = $_SESSION['no_tot'];
		echo json_encode($pert);

	}
	function jawab($jawaban){
		$no = $_SESSION['no'];
		$kd = $_SESSION['relasi'][$_SESSION['kd_kerusakan']][$no];
		
		if($jawaban == 'iya'){
			$this->tambah_data_gejala($kd,'iya');
			$_SESSION['no'] = $no+1;
			$_SESSION['no_tot'] = $_SESSION['no_tot'] + 1;
			$this->pertanyaan();
		}
		if ($jawaban == 'tidak' ) {
			$_SESSION['kd_tidak'] = $kd;
			$this->tambah_data_gejala($kd,'tidak');
			$_SESSION['no'] = $no+1;
			$_SESSION['no_tot'] = $_SESSION['no_tot'] + 1;
			$_SESSION['alternatif_k'] = $this->M_konsultasi->new_tree($_SESSION['id_konsultasi'],$_SESSION['relasi'][$_SESSION['kd_kerusakan']][$_SESSION['no']]);

			$this->pertanyaan();
			// if(isset($_SESSION['tidak'])){
			// 	$this->tambah_data_gejala($kd,'tidak');
			// 	$_SESSION['kd_kerusakan'] = $this->M_konsultasi->new_tree($_SESSION['id_konsultasi'],$_SESSION['relasi'][$_SESSION['kd_kerusakan']][$_SESSION['no']]);
			// 	$_SESSION['no'] = 0;
			// 	$this->pertanyaan();
			// }
			// else{
			// 	if($no < sizeof($_SESSION['relasi'][$_SESSION['kd_kerusakan']])){
			// 		$this->tambah_data_gejala($kd,'tidak');
			// 		$_SESSION['tidak'] = $_SESSION['relasi'][$_SESSION['kd_kerusakan']][$_SESSION['no']];
			// 		$_SESSION['no'] = $no+1;
			// 		$this->pertanyaan();
			// 	}
			// 	else {
			// 		$this->tambah_data_gejala($kd,'tidak');
			// 		$_SESSION['kd_kerusakan'] = $this->M_konsultasi->new_tree($_SESSION['id_konsultasi'],$_SESSION['relasi'][$_SESSION['kd_kerusakan']][$_SESSION['no']]);
			// 		$_SESSION['no'] = 0;
			// 		$this->pertanyaan();
			// 	}
			// }
		}


	}

	function tambah_data_gejala($kd_gejala,$jawab){
		#TAMBAH DATA GEJALA SEMENTARA
		$tambah_detail_kerusakan = [
			'id_konsultasi' => $_SESSION['id_konsultasi'],
			'kd_gejala' => $kd_gejala,
			'jawab' => $jawab
		];
		$this->M_konsultasi->tambah_konsuldetail($tambah_detail_kerusakan);
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

	function mulai2_konsultasi(){
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
		if($pilihan = ''){

		}
		else {
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
	function test(){
		var_dump(sizeof($_SESSION['relasi'][$_SESSION['kd_kerusakan']]));
	}

	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
?>