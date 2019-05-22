<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	function login_process($data){
		$this->db->where($data);
		return $this->db->get('tbl_user')->num_rows();
	}

	function getId($data){
		$this->db->where($data);
		$rep = $this->db->get('tbl_user')->result_array();
		return $rep[0]['id_user'];
	}

	function cekJenis($data){
		$this->db->where($data);
		$rep = $this->db->get('tbl_user')->result_array();
		return $rep[0]['jenis'];
	}

	function registration_process($data){
		return $this->db->insert('tbl_user',$data);
	}


}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */
 ?>