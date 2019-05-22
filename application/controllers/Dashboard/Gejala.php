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
                <a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="Hapus" onclick="deleteGejala('."'".$field->kd_gejala."'".')"><i class="fa fa-trash"></i></a>
                <a href="'.base_url().'dashboard/gejala/edit/'.$field->kd_gejala.'" class="btn btn-sm btn-success m-1"><i class="fa fa-edit"></i></a>
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

    function tambah(){
        $data = $this->input->post();
        if($this->M_gejala->tambah($data)){
            redirect(base_url('dashboard/gejala'));
        };
    }
    function hapus($id){
        $this->M_kerusakan->hapus($id);
    }
    function edit($kode)
    {
        $data = [
            'title' => 'Dashboard | Gejala - Edit',
            'content' => 'page/dashboard/gejala/edit',
            'detail' => $this->M_gejala->showDetail($kode),
            'kode' => $kode
        ];

        $this->load->view('template/template',$data);
    }
    function update($kode){
        if($this->M_gejala->update($this->input->post(),$kode)){
            redirect(base_url('dashboard/gejala'));
        }
    }

}

/* End of file Gejala.php */
/* Location: ./application/controllers/Dashboard/Gejala.php */
?>