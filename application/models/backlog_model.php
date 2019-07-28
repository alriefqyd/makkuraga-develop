<?php
class Backlog_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('backlog');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDescription($id)
    {
        $this->db->select('*');
        $this->db->from('backlog');
        $this->db->where("id_backlog",$id);
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
       if ($this->db->insert('backlog',$fields))
        {
            return true;
        }return false;
    }
    public function update()
    {
        $id_backlog=$this->input->post('id_backlog');
        $priority=$this->input->post('priority');

        $this->db->set('priority', $priority);
        $this->db->where('id_backlog', $id_backlog);
        $result=$this->db->update('backlog');
        return $result;
    }
    public function update_down_date()
    {
        $id_backlog=$this->input->post('id_backlog');
        $down_date=$this->input->post('down_date');

        $this->db->set('down_date', $down_date);
        $this->db->set('history', 'onprogress');
        $this->db->where('id_backlog', $id_backlog);
        $result=$this->db->update('backlog');
        return $result;
    }
    public function update_up_date()
    {
        $id_backlog=$this->input->post('id_backlog');
        $up_date=$this->input->post('up_date');

        $this->db->set('up_date', $up_date);
        $this->db->set('history', 'done');
        $this->db->set('status', 'Service Log');
        $this->db->where('id_backlog', $id_backlog);
        $result=$this->db->update('backlog');
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
