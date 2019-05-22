<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kerusakan extends CI_Model {

	var $table = 'tbl_kerusakan'; 
    var $column_order = array(null,'kd_kerusakan','kerusakan'); 
    var $column_search = array('kd_kerusakan','kerusakan'); 
    var $order = array('kd_kerusakan' => 'desc');  
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
  
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    //DATATABLES
    function tambah($data){
        return $this->db->insert('tbl_kerusakan',$data);
    }
    function hapus($id){
        $this->db->where('kd_kerusakan',$id);
        return $this->db->delete('tbl_kerusakan');
    }	
    function showDetail($kode){
        $this->db->where('kd_kerusakan',$kode);
        return $this->db->get('tbl_kerusakan')->result_array();
    }
    function update($data,$id){
        $this->db->where('kd_kerusakan', $id);
        return $this->db->update('tbl_kerusakan', $data);
    }
 
}

/* End of file M_kerusakan.php */
/* Location: ./application/models/M_kerusakan.php */
?>