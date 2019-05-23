<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konsultasi_new extends CI_Model {

	function macamKerusakan(){
		return $this->db->get('tbl_kerusakan')->result_array();
	}

	function getListGejala($kd_kerusakan)
	{
		$this->db->where('kd_kerusakan', $kd_kerusakan);
		$gejala = $this->db->get('tbl_relasi')->result_array();
		$gejala_dapat = $gejala[0]['kd_gejala'];
		$data_gejala = explode(',', $gejala_dapat);
		return $data_gejala;
	}

	function getPertanyaan($kd_gejala){
		return $this->db->get_where('tbl_gejala',array('kd_gejala' => $kd_gejala))->result_array();
	}

	function tmpStartKonsul($data){
		$this->db->insert('tbl_konsultasi',$data);
		return $this->db->get_where('tbl_konsultasi',$data)->result_array();
	}

	function getAlternatifKerusakan($kd_kerusakan, $kd_gejala){
		$tmp = $this->db->get('tbl_relasi')->result_array();
		foreach ($tmp as $key1 => $value1) {
			if(!in_array($value1['kd_kerusakan'],$_SESSION['kd_kerusakan'])){
				$gejala = $this->getListGejala($value1['kd_kerusakan']);
				foreach ($gejala as $key2 => $value2) {
					if ($value2 == $kd_gejala) {
						return $value1['kd_kerusakan'];
					}
				}
			}
		}
	}

	function tambahKonsulDetail($data){
		return $this->db->insert('tbl_konsultasi_detail',$data);
	}

	function get_count($id_konsultasi){
		$count = [];
		foreach ($_SESSION['kd_kerusakan'] as $key => $value) {
			$kondisi = [
				'id_konsultasi' => $id_konsultasi,
				'kd_kerusakan' => $value,
				'jawab' => 'y'
			];
			$this->db->where('kd_kerusakan', $value);
			$count[$value] = $this->db->get('tbl_konsultasi_detail')->num_rows();
		}
		return $count;
	}
	function getDetailKerusakan($kd_kerusakan){
		$this->db->where('kd_kerusakan',$kd_kerusakan);
		return $this->db->get('tbl_kerusakan')->result_array();
	}
	function getListSolusi($kd_kerusakan)
	{
		$this->db->where('kd_kerusakan', $kd_kerusakan);
		$solusi = $this->db->get('tbl_relasi')->result_array();
		$solusi_dapat = $solusi[0]['kd_solusi'];
		$data_solusi = explode(',', $solusi_dapat);
		return $data_solusi;
	}
	function getSolusiDetail($kd_kerusakan){
		$solusiList = $this->getListSolusi($kd_kerusakan);
		$detailSolusi = [];
		foreach ($solusiList as $key => $value) {
			$this->db->where('kd_solusi',$value);
			$detail_temp = $this->db->get('tbl_solusi')->result_array();
			$detailSolusi[$value] = $detail_temp[0]['solusi'];
		}
		return $detailSolusi;
	}
	function getListPenyebab($kd_kerusakan)
	{
		$this->db->where('kd_kerusakan', $kd_kerusakan);
		$penyebab = $this->db->get('tbl_relasi')->result_array();
		$penyebab_dapat = $penyebab[0]['kd_penyebab'];
		$data_penyebab = explode(',', $penyebab_dapat);
		return $data_penyebab;
	}
	function getPenyebabDetail($kd_kerusakan){
		$penyebabList = $this->getListPenyebab($kd_kerusakan);
		$detailPenyebab = [];
		foreach ($penyebabList as $key => $value) {
			$this->db->where('kd_penyebab',$value);
			$detail_temp = $this->db->get('tbl_penyebab')->result_array();
			$detailPenyebab[$value] = $detail_temp[0]['penyebab'];
		}
		return $detailPenyebab;
	}
	function getRiwayat($id_user){
		$this->db->where('id_user',$id_user);
		return $this->db->get('tbl_konsultasi')->result_array();
	}
	function updateKonsultasi($kd_kerusakan,$id_konsultasi){
		$this->db->set('kd_kerusakan', $kd_kerusakan);
        $this->db->where('id_konsultasi', $id_konsultasi);
        return $this->db->update('tbl_konsultasi');
	}
	function getIdKonsultasi($id_konsultasi){
		$this->db->where('id_konsultasi',$id_konsultasi);
		return $this->db->get('tbl_konsultasi')->result_array();
	}




}

/* End of file M_konsultasi_new.php */
/* Location: ./application/models/M_konsultasi_new.php */
?>