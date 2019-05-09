<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_gejala');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard | Gejala',
			'content' => 'page/dashboard/gejala/list',
			'dtable' => 'page/dashboard/gejala/api_list'
		];

		$this->load->view('template/template',$data);
	}

	function api_list(){
		$list = $this->M_gejala->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 

            $row[] = $no;
            $row[] = $field->kd_gejala;
            $row[] = $field->gejala;
            $row[] = '
                <a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="Hapus" onclick="deleteKamar('."'".$field->kd_gejala."'".')"><i class="fa fa-trash"></i></a>
                <a href="'.base_url().'admin/Master_kamar/edit/'.$field->gejala.'" class="btn btn-sm btn-success m-1"><i class="fa fa-edit"></i></a>
        			';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_gejala->count_all(),
            "recordsFiltered" => $this->M_gejala->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}
    function get_gejala(){
        var_dump($this->M_gejala->get_gejala());
    }

}

/* End of file Gejala.php */
/* Location: ./application/controllers/Dashboard/Gejala.php */
?>