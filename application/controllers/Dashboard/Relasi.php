 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_relasi');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard | Relasi',
			'content' => 'page/dashboard/relasi/list',
			'dtable' => 'page/dashboard/relasi/api_list'
		];

		$this->load->view('template/template',$data);
	}

	function api_list(){
		$list = $this->M_relasi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 

            $row[] = $no;
            $row[] = $field->kd_kerusakan;
            $row[] = $field->kd_gejala;
            $row[] = $field->kd_solusi;
            $row[] = $field->kd_penyebab;
            $row[] = '
                <a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="Hapus" onclick="deleteRelasi('."'".$field->kd_kerusakan."'".')"><i class="fa fa-trash"></i></a>
                <a href="'.base_url().'dashboard/relasi/edit/'.$field->kd_kerusakan.'" class="btn btn-sm btn-success m-1"><i class="fa fa-edit"></i></a>
        			';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_relasi->count_all(),
            "recordsFiltered" => $this->M_relasi->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}
    function get_relasi(){
        var_dump($this->M_relasi->get_relasi());
    }

    function tambah(){
        $data = $this->input->post();
        if($this->M_relasi->tambah($data)){
            redirect(base_url('dashboard/relasi'));
        };
    }
    function hapus($id){
        $this->M_kerusakan->hapus($id);
    }
    function edit($kode)
    {
        $data = [
            'title' => 'Dashboard | Relasi - Edit',
            'content' => 'page/dashboard/relasi/edit',
            'detail' => $this->M_relasi->showDetail($kode),
            'kode' => $kode
        ];

        $this->load->view('template/template',$data);
    }
    function update($kode){
        if($this->M_relasi->update($this->input->post(),$kode)){
            redirect(base_url('dashboard/relasi'));
        }
    }

}

/* End of file Relasi.php */
/* Location: ./application/controllers/Dashboard/Relasi.php */
?>