<?php
class Inventory_model extends CI_Model
{
  function __construct() {
    parent::__construct();
    $this->load->database();
  }
  public function getAllData()
  {
    $this->db->select('*');
    $this->db->from('inventory');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getAllDataTransfer()
  {
    $this->db->select('*');
    $this->db->from('transfer_log');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getAllDataTransferByFilter()
  {
    $filterPartNumber = isset($_GET['part_number']) ? $_GET['part_number'] : "";
    $filterTanggal = isset($_GET['date']) ? $_GET['date'] : "";
    $filterlokasi = isset($_GET['lokasi']) ? $_GET['lokasi'] : "";
    $filterlokasiTransfer = isset($_GET['lokasi_transfer']) ? $_GET['lokasi_transfer'] : "";
  
    $this->db->select('*');
    $this->db->from('transfer_log');
    if(isset($_GET['part_number']))
    {
      if($_GET['part_number'] != ""){
        $this->db->where('part_number',$filterPartNumber);
      }
    }
    if(isset($_GET['date']))
    {
      if($_GET['date'] != ""){
        $this->db->where("DATE_FORMAT(date,'%Y-%m-%d')", $filterTanggal);
      }
    }
    if(isset($_GET['lokasi']))
    {
      if($_GET['lokasi'] != ""){
        $this->db->where('location_from',$filterlokasi);
      }
    }
    if(isset($_GET['lokasi_transfer']))
    {
      if($_GET['lokasi_transfer'] != ""){
        $this->db->where('location_to',$filterlokasiTransfer);
      }
    }
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getAllEntity($entity,$table)
  {
    $this->db->distinct();
    $this->db->select($entity);
    $this->db->from($table);

    $query = $this->db->get();
    return $query->result_array();
  }
  public function getAllEntitySell()
  {
    $this->db->select('sell.part_number,alat.id,alat.ID_alat');
    $this->db->distinct('part_number');
    $this->db->from('sell');
    $this->db->join('alat', 'alat.id = sell.part_number', 'left outer');
    

    $query = $this->db->get();
    return $query->result_array();
  }
   public function getAllDate()
  {
    $this->db->distinct();
    $this->db->select('DATE_FORMAT(date, "%Y-%m-%d")');
    $this->db->from('transfer_log');

    $query = $this->db->get();
    return $query->result_array();
  }
  public function getAllTanggal()
  {
    $this->db->distinct();
    $this->db->select('DATE_FORMAT(tanggal, "%Y-%m-%d")');
    $this->db->from('sell');

    $query = $this->db->get();
    return $query->result_array();
  }
  public function getAllDataByFilter()
  {
    $filterlokasi = isset($_GET['lokasi']) ? $_GET['lokasi'] : "";
    $filterPartNumber = isset($_GET['part_number']) ? $_GET['part_number'] : "";
    $filterLowStock = isset($_GET['low_stock']) ? $_GET['low_stock'] : "";
    $filterCategory = isset($_GET['category']) ? $_GET['category'] : "";
    $filterSupplier = isset($_GET['supplier']) ? $_GET['supplier'] : "";
    $filterAccountCode = isset($_GET['account_code']) ? $_GET['account_code'] : "";
    $filterAlokasi = isset($_GET['alokasi']) ? $_GET['alokasi'] : "";
    $this->db->select('*');
    $this->db->from('inventory');
    if(isset($_GET['lokasi']))
    {
      if($_GET['lokasi'] != ""){
        $this->db->where('location',$filterlokasi);
      }
    }
    if(isset($_GET['part_number']))
    {
      if($_GET['part_number'] != ""){
        $this->db->where('part_number',$filterPartNumber);
      }
    }
    if(isset($_GET['low_stock']))
    {
      if($_GET['low_stock'] != ""){
       $this->db->where('quantity < minimum_quantity');
      }
    }
    if(isset($_GET['category']))
    {
      if($_GET['category'] != ""){
        $this->db->where('category',$filterCategory);
      }
    }
    if(isset($_GET['supplier']))
    {
      if($_GET['supplier'] != ""){
        $this->db->where('supplier',$filterSupplier);
      }
    }
    if(isset($_GET['account_code']))
    {
      if($_GET['account_code'] != ""){
        $this->db->where('account_code',$filterAccountCode);
      }
    }
    if(isset($_GET['alokasi']))
    {
      if($_GET['alokasi'] != ""){
        $this->db->where('alokasi',$filterAlokasi);
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
public function getAllDataSell()
{
  $this->db->select('*');
  $this->db->from('sell','s');
  $this->db->join('inventory', 'inventory.id = sell.part_number', 'left outer');
  $query = $this->db->get();
  return $query->result_array();
}
public function getAllDataSellByFilter()
{
    $filterlokasi = isset($_GET['lokasi']) ? $_GET['lokasi'] : "";
    $filterPartNumber = isset($_GET['part_number']) ? $_GET['part_number'] : "";
    $filterLowStock = isset($_GET['low_stock']) ? $_GET['low_stock'] : "";
    $filterCategory = isset($_GET['category']) ? $_GET['category'] : "";
    $filterTanggal = isset($_GET['supplier']) ? $_GET['supplier'] : "";
    $filterAccountCode = isset($_GET['account_code']) ? $_GET['account_code'] : "";
    $filterModel = isset($_GET['model']) ? $_GET['model'] : "";
     $this->db->select('*');
     $this->db->from('sell');
    $this->db->join('inventory', 'inventory.id = sell.part_number', 'left outer');
    if(isset($_GET['part_number']))
    {
      if($_GET['part_number'] != ""){
        $this->db->where('sell.part_number',$filterPartNumber);
      }
    }
    if(isset($_GET['lokasi']))
    {
      if($_GET['lokasi'] != ""){
        $this->db->where('inventory.location',$filterlokasi);
      }
    }
    if(isset($_GET['model']))
    {
      if($_GET['model'] != ""){
        $this->db->where('sell.model',$filterModel);
      }
    }
    if(isset($_GET['tanggal']))
    {
      if($_GET['tanggal'] != ""){
        $this->db->where('sell.tanggal', '2019-09-30');
      }
    }
 
 
  $query = $this->db->get();
  return $query->result_array();
}
public function getAllDataSellByLocation($lokasi)
{
  $this->db->select('*');
  $this->db->from('sell');
  $this->db->join('inventory', 'inventory.id = sell.part_number', 'left outer');
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
public function getAllPart()
{
  $this->db->select('*');
  $this->db->from('inventory');
  $query = $this->db->get();
  return $query->result_array();
}
public function getDataById()
{
  $id_pm = $this->input->post('id');
  $this->db->select('*');
  $this->db->from('inventory');
  $this->db->where('id',$id_pm);
  $query = $this->db->get();
  return $query->result_array();
}
public function getDataByLocationAndPartNumber($pn,$location)
{
  $this->db->select('*');
  $this->db->from('inventory');
  $this->db->where('part_number',$pn);
  $this->db->where('location',$location);
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
  $id_pm=$this->input->post('id_pm');
  $pm_state=$this->input->post('pm_state');

  $this->db->set('pm_state', $pm_state);
  $this->db->where('id_pm', $id_pm);
  $result=$this->db->update('pm');
  return $result;
}
public function update_inventory()
{
  $id=$this->input->post('id');
  $part_number = $this->input->post('part_number');
  $description = $this->input->post('description');
  $category = $this->input->post('category');
  $cost = $this->input->post('cost');
  $price = $this->input->post('price');
  $location = $this->input->post('location');
  $quantity = $this->input->post('quantity');
  $alokasi = $this->input->post('alokasi');
  $supplier = $this->input->post('supplier');
  $ideal_quantity = $this->input->post('ideal_quantity');
  $minimum_quantity = $this->input->post('minimum_quantity');
  $account_code = $this->input->post('account_code');

  $this->db->set('part_number', $part_number);
  $this->db->set('description', $description);
  $this->db->set('category', $category);
  $this->db->set('cost', $cost);
  $this->db->set('price', $price);
  $this->db->set('location', $location);
  $this->db->set('quantity', $quantity);
  $this->db->set('account_code', $account_code);
  $this->db->set('alokasi', $alokasi);
  $this->db->set('supplier', $supplier);
  $this->db->set('minimum_quantity', $minimum_quantity);
  $this->db->set('ideal_quantity', $ideal_quantity);
  $this->db->where('id', $id);
  $result=$this->db->update('inventory');
  return $result;
}
public function delete_inventory()
{
  $id=$this->input->post('id');
  $this->db->where('id', $id);
  $this->db->delete('inventory');
  return $result;
}

public function transfer_inventory(){
  $part_number = $this->input->post('part_number');
  $location_from = $this->input->post('location_from');
  $location_to = $this->input->post('location_to');
  $quantity_compare = $this->input->post('quantity_compare');
  $quantity = $this->input->post('quantity');
  $quantity_location_to = $this->input->post('quantity_location_to');
  $result = ($quantity_compare - $quantity);

  $this->db->set('quantity', $result);
  $this->db->where('location', $location_from);
  $this->db->where('part_number', $part_number);
  $update = $this->db->update("inventory");

  $result_transfer = ($quantity + $quantity_location_to);
  $this->db->set('quantity', $result_transfer);
  $this->db->where('location', $location_to);
  $this->db->where('part_number', $part_number);
  $update_transfer = $this->db->update("inventory");

      // insert to transfer_log

      // $fields = array(
      //     'part_number' => $part_number,
      //     'location_from' => $location_from,
      //     'location_to' => $location_to,
      //     'quantity_awal' => $this->input->post('quantity'),
      //     'account_code' => $this->input->post('account_code')
      // );
      // $this->db->insert('transfer_log',$fields);

  return $update;
  return $update_transfer;

}



}
?>
