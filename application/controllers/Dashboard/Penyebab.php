<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyebab extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penyebab');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard | Penyebab',
			'content' => 'page/dashboard/penyebab/list',
			'dtable' => 'page/dashboard/penyebab/api_list'
		];

		$this->load->view('template/template',$data);
	}

	function api_list(){
		$list = $this->M_penyebab->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 

            $row[] = $no;
            $row[] = $field->kd_penyebab;
            $row[] = $field->penyebab;
            $row[] = '
            	<a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="Hapus" onclick="deletePenyebab('."'".$field->kd_penyebab."'".')"><i class="fa fa-trash"></i></a>
            	<a href="'.base_url().'dashboard/penyebab/edit/'.$field->kd_penyebab.'" class="btn btn-sm btn-success m-1"><i class="fa fa-edit"></i></a>
        			';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_penyebab->count_all(),
            "recordsFiltered" => $this->M_penyebab->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}
    
    function tambah(){
        $data = $this->input->post();
        if($this->M_penyebab->tambah($data)){
            redirect(base_url('dashboard/penyebab'));
        };
    }
    function hapus($id){
        $this->M_penyebab->hapus($id);
    }
    function edit($kode)
    {
        $data = [
            'title' => 'Dashboard | Penyebab - Edit',
            'content' => 'page/dashboard/penyebab/edit',
            'detail' => $this->M_penyebab->showDetail($kode),
            'kode' => $kode
        ];

        $this->load->view('template/template',$data);
    }
    function update($kode){
        if($this->M_penyebab->update($this->input->post(),$kode)){
            redirect(base_url('dashboard/penyebab'));
        }
    }
    

}

/* End of file Penyebab.php */
/* Location: ./application/controllers/Dashboard/Penyebab.php */
?>