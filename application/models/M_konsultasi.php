<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konsultasi extends CI_Model {

	function macam_kerusakan(){
		return $this->db->get('tbl_kerusakan')->result_array();
	}	

	function ambil_gejala($kd_kerusakan){
		$gejala = $this->db->get_where('tbl_relasi',array('kd_kerusakan' => $kd_kerusakan))->result_array();
		$gejala_dapat = $gejala[0]['kd_gejala'];
		$data_gejala = explode(',', $gejala_dapat);
		// $temp_gejala;
		// $list_gejala = [];
		// foreach ($data_gejala as $value) {
		// 	$temp_gejala = $this->nama_gejala($value);
		// 	$list_gejala[$value] = $temp_gejala[0]['gejala'];
		// }
		return $data_gejala;
	}

	function nama_gejala($kd_gejala){
		$this->db->where('kd_gejala',$kd_gejala);
		return $this->db->get('tbl_gejala')->result_array();
	}

	function tmp_start_konsul($data){
		$this->db->insert('tbl_konsultasi',$data);
		return $this->db->get_where('tbl_konsultasi',$data)->result_array();
	}

	function getDetailGejala($kode){
		$this->db->where('kd_gejala',$kode);
		return $this->db->get('tbl_gejala')->result_array();
	}

	function tambah_konsuldetail($data){
		return $this->db->insert('tbl_konsultasi_detail',$data);
	}

}

/* End of file M_konsultasi.php */
/* Location: ./application/models/M_konsultasi.php */
?>