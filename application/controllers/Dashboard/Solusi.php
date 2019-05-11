<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solusi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_solusi');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard | Solusi',
			'content' => 'page/dashboard/solusi/list',
			'dtable' => 'page/dashboard/solusi/api_list'
		];

		$this->load->view('template/template',$data);
	}

	function api_list(){
		$list = $this->M_solusi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 

            $row[] = $no;
            $row[] = $field->kd_solusi;
            $row[] = $field->solusi;
            $row[] = '
            	<a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="Hapus" onclick="deleteKamar('."'".$field->kd_solusi."'".')"><i class="fa fa-trash"></i></a>
            	<a href="'.base_url().'admin/Master_kamar/edit/'.$field->solusi.'" class="btn btn-sm btn-success m-1"><i class="fa fa-edit"></i></a>
        			';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_solusi->count_all(),
            "recordsFiltered" => $this->M_solusi->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

}

/* End of file Solusi.php */
/* Location: ./application/controllers/Dashboard/Solusi.php */
?>