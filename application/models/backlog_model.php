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
    public function getAllEntity($entity,$table)
    {
        $this->db->distinct();
        $this->db->select($entity);
        $this->db->from($table);
        // $this->db->join('alat', 'alat.id = backlog.ID', 'left outer');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllDataByFilter()
    {
        $IDFilter = isset($_GET['ID']) ? $_GET['ID'] : "";
        $modelFilter = isset($_GET['model']) ? $_GET['model'] : "";
       
        $this->db->select('*');
        $this->db->from('backlog');
        $this->db->join('alat', 'alat.id = backlog.ID', 'left outer');
        if(isset($_GET['ID']))
        {
          if($_GET['ID'] != ""){
            $this->db->where('backlog.ID',$IDFilter);
          }
        }
        if(isset($_GET['model']))
        {
          if($_GET['model'] != ""){
            $this->db->where('backlog.model',$modelFilter);
          }
        }
  //   if($_GET['part_number'] !== ""){
  //    $this->db->where('part_number',$filterPartNumber);
  //  }
  //  if($_GET['low_stock'] !== ""){
  //   $this->db->where('quantity < minimum_quantity');
  // }
  // if($_GET['category'] !== ""){
  //   $this->db->where('category', $filterCategory);
  // }
  // if($_GET['supplier'] !== ""){
  //   $this->db->where('supplier', $filterSupplier);
  // }
  // if($_GET['account_code'] !== ""){
  //   $this->db->where('account_code', $filterAccountCode);
  // }
  // if($_GET['alokasi'] !== ""){
  //   $this->db->where('alokasi', $filterAlokasi);
  // }
        // $this->db->where($colom,$filter);
      $query = $this->db->get();
      return $query->result_array();
    }
    public function getAllDataByFilterDone()
    {
        $IDFilter = isset($_GET['ID']) ? $_GET['ID'] : "";
        $modelFilter = isset($_GET['model']) ? $_GET['model'] : "";
       
        $this->db->select('*');
        $this->db->from('backlog');
        $this->db->join('alat', 'alat.id = backlog.ID', 'left outer');
        $this->db->where('history',"done");
        if(isset($_GET['ID']))
        {
          if($_GET['ID'] != ""){
            $this->db->where('backlog.ID',$IDFilter);
          }
        }
        if(isset($_GET['model']))
        {
          if($_GET['model'] != ""){
            $this->db->where('backlog.model',$modelFilter);
          }
        }
  //   if($_GET['part_number'] !== ""){
  //    $this->db->where('part_number',$filterPartNumber);
  //  }
  //  if($_GET['low_stock'] !== ""){
  //   $this->db->where('quantity < minimum_quantity');
  // }
  // if($_GET['category'] !== ""){
  //   $this->db->where('category', $filterCategory);
  // }
  // if($_GET['supplier'] !== ""){
  //   $this->db->where('supplier', $filterSupplier);
  // }
  // if($_GET['account_code'] !== ""){
  //   $this->db->where('account_code', $filterAccountCode);
  // }
  // if($_GET['alokasi'] !== ""){
  //   $this->db->where('alokasi', $filterAlokasi);
  // }
        // $this->db->where($colom,$filter);
      $query = $this->db->get();
      return $query->result_array();
    }
    public function getAllDataByFilterHistory($history,$location)
    {
        $IDFilter = isset($_GET['ID']) ? $_GET['ID'] : "";
        $modelFilter = isset($_GET['model']) ? $_GET['model'] : "";

        $this->db->select('*');
        $this->db->from('backlog');
        $this->db->join('mechanic', 'mechanic.id = backlog.mechanic', 'left outer');
        $this->db->join('alat', 'alat.id = backlog.ID', 'left outer');
        $this->db->where("history",$history);
        $this->db->where("alat.lokasi",$location);
        if(isset($_GET['ID']))
        {
          if($_GET['ID'] != ""){
            $this->db->where('backlog.ID',$IDFilter);
          }
        }
        if(isset($_GET['model']))
        {
          if($_GET['model'] != ""){
            $this->db->where('backlog.model',$modelFilter);
          }
        }
       
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllDataHistory($history,$location)
    {
        $this->db->select('*');
        $this->db->from('backlog');
        $this->db->join('mechanic', 'mechanic.id = backlog.mechanic', 'left outer');
        $this->db->join('alat', 'alat.id = backlog.ID', 'left outer');
        $this->db->where("history",$history);
        $this->db->where("alat.lokasi",$location);
       
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllDataMaster($history)
    {
        $this->db->select('*');
        $this->db->from('backlog');
        $this->db->join('mechanic', 'mechanic.id = backlog.mechanic', 'left outer');
        $this->db->join('alat', 'alat.id = backlog.ID', 'left outer');
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
        $history = $this->input->post('history');

        $this->db->set('down_date', $down_date);
        $this->db->set('history', $history);
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
    public function update_status()
    {
        $id_backlog=$this->input->post('id_backlog');
        $status=$this->input->post('status');

        $this->db->set('status', $status);
        $this->db->where('id_backlog', $id_backlog);
        $result=$this->db->update('backlog');
        return $result;
    }
    public function delete_backlog()
    {
        $id=$this->input->post('id_backlog');
        $this->db->where('id_backlog', $id);
        $this->db->delete('backlog');
        return $result;
    }
}
?>
