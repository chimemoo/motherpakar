<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerusakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kerusakan');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard | Kerusakan',
			'content' => 'page/dashboard/kerusakan/list',
			'dtable' => 'page/dashboard/kerusakan/api_list'
		];

		$this->load->view('template/template',$data);
	}

	function api_list(){
		$list = $this->M_kerusakan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 

            $row[] = $no;
            $row[] = $field->kd_kerusakan;
            $row[] = $field->kerusakan;
            $row[] = '
            	<a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="Hapus" onclick="deleteKamar('."'".$field->kd_kerusakan."'".')"><i class="fa fa-trash"></i></a>
            	<a href="'.base_url().'admin/Master_kamar/edit/'.$field->kerusakan.'" class="btn btn-sm btn-success m-1"><i class="fa fa-pencil"></i></a>
        			';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_kerusakan->count_all(),
            "recordsFiltered" => $this->M_kerusakan->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

}

/* End of file Kerusakan.php */
/* Location: ./application/controllers/Dashboard/Kerusakan.php */
?>