<?php
class Operation_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('operation');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllDataLokasi($lokasi)
    {
        $this->db->select('*');
        $this->db->from('operation');
        $this->db->where('lokasi',$lokasi);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllDataNow($tanggal)
    {
        $this->db->select('*');
        $this->db->from('operation');
        $this->db->where('tanggal',$tanggal);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllDataNowLokasi($tanggal,$location)
    {
        $this->db->select('*');
        $this->db->from('operation');
        $this->db->where('tanggal',$tanggal);
        $this->db->where('lokasi',$location);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataById()
    {
        $id = $this->input->post('id_operation');
        $this->db->select('*');
        $this->db->from('operation');
        $this->db->where('id_operation',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataByUser()
    {
        $id = $this->session->userdata("id");
        $this->db->select('*');
        $this->db->from('operation');
        $this->db->where('createdBy',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDescription($id)
    {
        $this->db->select('*');
        $this->db->from('pm');
        $this->db->where("id_pm",$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllDataHistory($history,$location)
    {
        $this->db->select('*');
        $this->db->from('backlog');
        $this->db->where("history",$history);
        $this->db->where("location",$location);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllDataMaster($history)
    {
        $this->db->select('*');
        $this->db->from('backlog');
        $this->db->where("history",$history);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function addData($fields)
    {
       if ($this->db->insert('operation',$fields))
        {
            return true;
        }return false;
    }
    public function update()
    {
      // $fields = array(
      //     'ID' => $this->input->post('ID'),
      //     'model' => $this->input->post('model'),
      //     'start_hm' => $this->input->post('start_hm'),
      //     'stop_hm' => $this->input->post('stop_hm'),
      //     'total' => $this->input->post('stop_hm') - $this->input->post('start_hm'),
      //     'working' => $this->input->post('working'),
      //     'status' => $this->input->post('status'),
      //     'shift' => $this->input->post('shift'),
      //     'lokasi' => $this->input->post('lokasi')
      // );
        // $id = $this->input->post('id');
        // $result=$this->db->where('id', $id);
        // $result=$this->db->update('operation',$fields);
        // return $result;

        $ids=$this->input->post('id');
        $ID_=$this->input->post('ID_');
        $model=$this->input->post('model');
        $start_hm=$this->input->post('start_hm');
        $stop_hm=$this->input->post('stop_hm');
        $working=$this->input->post('working');
        $total= ($stop_hm - $start_hm);
        $status=$this->input->post('status');
        $shift=$this->input->post('shift');
        $location=$this->input->post('lokasi');

        $this->db->set('ID', $ID_);
        $this->db->set('model', $model);
        $this->db->set('start_hm', $start_hm);
        $this->db->set('stop_hm', $stop_hm);
        $this->db->set('working', $working);
        $this->db->set('total',$total);
        $this->db->set('status', $status);
        $this->db->set('shift', $shift);
        $this->db->set('lokasi', $location);
        $this->db->where('id_operation', $ids);
        $result=$this->db->update('operation');
        return $result;
    }
    public function updateKomentar($id,$komentar)
    {
        $this->db->set('komentar', $komentar);
        $this->db->where('id_operation', $id);
        $result=$this->db->update('operation');
        return $result;
    }
    public function update_tanggal($id_pm,$tanggal)
    {
        $this->db->set('tanggal', $tanggal);
        $this->db->where('id_operation', $id_pm);
        $result=$this->db->update('operation');
        return $result;
    }
    public function update_last_service()
    {
        $id_pm=$this->input->post('id_pm');
        $date=$this->input->post('date');

        $this->db->set('last_service_date', $date);
        $this->db->where('id_pm', $id_pm);
        $result=$this->db->update('pm');
        return $result;
    }
    public function update_next_service()
    {
        $id_pm=$this->input->post('id_pm');
        $date=$this->input->post('date');

        $this->db->set('next_service_date', $date);
        $this->db->where('id_pm', $id_pm);
        $result=$this->db->update('pm');
        return $result;
    }
    public function update_deskripsi()
    {
        $id_backlog=$this->input->post('id_backlog');
        $deskripsi=$this->input->post('description');

        $this->db->set('description', $deskripsi);
        $this->db->where('id_backlog', $id_backlog);
        $result=$this->db->update('backlog');
        return $result;
    }
    public function update_mechanic()
    {
        $id_backlog=$this->input->post('id_backlog');
        $mechanic=$this->input->post('mechanic');

        $this->db->set('mechanic', $mechanic);
        $this->db->where('id_backlog', $id_backlog);
        $result=$this->db->update('backlog');
        return $result;
    }
}
?>
