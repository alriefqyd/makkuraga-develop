<?php
class Pm_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('pm');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataById()
    {
        $id_pm = $this->input->post('id_pm');
        $this->db->select('*');
        $this->db->from('pm');
        $this->db->where('id_pm',$id_pm);
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
       if ($this->db->insert('pm',$fields))
        {
            return true;
        }return false;
    }
    public function update()
    {
        $id_pm=$this->input->post('id_pm');
        $pm_state=$this->input->post('pm_state');

        $this->db->set('pm_state', $pm_state);
        $this->db->where('id_pm', $id_pm);
        $result=$this->db->update('pm');
        return $result;
    }
    public function updateHm($to_run)
    {
        $id_pm=$this->input->post('id_pm');
        $hm=$this->input->post('hm');
        $table=$this->input->post('table');
        // if($table == 'next_service_meter'){
        //   $to_run = $hm - $data;
        // }

        $this->db->set($table, $hm);
        $this->db->set('to_run', $to_run);
        $this->db->where('id_pm', $id_pm);
        $result=$this->db->update('pm');
        return $result;
    }
    public function update_actual_date()
    {
        $id_pm=$this->input->post('id_pm');
        $actual_hours_date=$this->input->post('date');

        $this->db->set('actual_hours_date', $actual_hours_date);
        $this->db->where('id_pm', $id_pm);
        $result=$this->db->update('pm');
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
