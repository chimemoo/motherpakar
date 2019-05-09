<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'content' => 'page/dashboard/dashboard'
		];

		$this->load->view('template/template',$data);
	}

}

/* End of file Konsultasi.php */
/* Location: ./application/controllers/Dashboard.php */
