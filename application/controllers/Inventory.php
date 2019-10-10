<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('PdfGenerator');
        $this->load->model('login_model');
        $this->load->model('inventory_model');
        $this->load->model('mechanic_model');
        $this->load->helper('url_helper','form');
        $this->load->model('user_model');
        $this->load->helper('tgl_indo');
        $this->load->helper('date_indo');
        if(empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('flash_data', 'You dont have access!');
            redirect('login');
        }

    }
    public function sell()
    {
        $level_user = $this->session->userdata("level");
        $location = $this->session->userdata('lokasi');
        $tanggal = date('Y-m-d');
        $data['level_user'] = $level_user;
        $filterlokasi = isset($_GET['lokasi']) ? $_GET['lokasi'] : "";
        if(isset($_GET['lokasi'])){
          if($filterlokasi != "All" && $filterlokasi != "low_stock"){
            $data['inventory'] = $this->inventory_model->getAllDataByLocation($filterlokasi);
          }
          else if($filterlokasi == "low_stock"){
            $data['inventory'] = $this->inventory_model->getAllDataLowStock();
          }
          else {
            $data['inventory'] = $this->inventory_model->getAllData();
          }
        } else {
            $data['inventory'] = $this->inventory_model->getAllData();
        }

        $data['table_head'] = array('No','Part Number','Description', 'Category', 'Cost', 'Price', 'Location','Quantity','Account Code','Action');
        $data['title_bar'] = "Inventory";
        $this->load->view('component/header');
        $this->load->view('inventory/sell',$data);
        $this->load->view('component/footer');
    }
    public function sellLog()
    {

        $level_user = $this->session->userdata("level");
        $location = $this->session->userdata('lokasi');
        $tanggal = date('Y-m-d');
        $data['level_user'] = $level_user;
        $filterlokasi = isset($_GET['lokasi']) ? $_GET['lokasi'] : "";
        if(isset($_GET['lokasi'])){
          if($filterlokasi != "All"){
            $data['inventory'] = $this->inventory_model->getAllDataSellByLocation($filterlokasi);
          }
          else {
              $data['inventory'] = $this->inventory_model->getAllDataSell();
          }
        } else {
            $data['inventory'] = $this->inventory_model->getAllDataSell();
        }

        $data['table_head'] = array('No','Date','ID', 'Model', 'Part Number', 'Lokasi','Quantity','Harga Jual','Total');
        $data['title_bar'] = "Sell Log";
        $this->load->view('component/header');
        $this->load->view('inventory/sell_log',$data);
        $this->load->view('component/footer');
    }
    public function transfer()
    {
        $level_user = $this->session->userdata("level");
        $location = $this->session->userdata('lokasi');
        $tanggal = date('Y-m-d');
        $data['level_user'] = $level_user;
        $filterlokasi = isset($_GET['lokasi']) ? $_GET['lokasi'] : "";
        if(isset($_GET['lokasi'])){
          if($filterlokasi != "All"){
            $data['inventory'] = $this->inventory_model->getAllDataByLocation($filterlokasi);
          }
          else {
              $data['inventory'] = $this->inventory_model->getAllData();
          }
        } else {
            $data['inventory'] = $this->inventory_model->getAllData();
        }

        $data['table_head'] = array('No','Part Number','Description', 'Category', 'Cost', 'Price', 'Location','Quantity','Account Code','Action');
        $data['title_bar'] = "Transfer";
        $this->load->view('component/header');
        $this->load->view('inventory/transfer',$data);
        $this->load->view('component/footer');
    }
    public function transfer_log()
    {
        $level_user = $this->session->userdata("level");
        $location = $this->session->userdata('lokasi');
        $tanggal = date('Y-m-d');
        $data['level_user'] = $level_user;
        $filterlokasi = isset($_GET['lokasi']) ? $_GET['lokasi'] : "";
        if(isset($_GET['lokasi'])){
          if($filterlokasi != "All"){
            $data['inventory'] = $this->inventory_model->getAllDataTransferByLocation($filterlokasi);
          }
          else {
              $data['inventory'] = $this->inventory_model->getAllDataTransfer();
          }
        } else {
            $data['inventory'] = $this->inventory_model->getAllDataTransfer();
        }

        $data['table_head'] = array('No','Part Number','Location From', 'Location Transfer', 'User', 'Tanggal Transfer', 'Quantity Awal','Quantity Transfer');
        $data['title_bar'] = "Transfer";
        $this->load->view('component/header');
        $this->load->view('inventory/transfer_log',$data);
        $this->load->view('component/footer');
    }
    public function log_daily()
    {
        $level_user = $this->session->userdata("level");
        $location = $this->session->userdata('lokasi');
        $data['table_head'] = array('No','Tanggal','ID', 'Model', 'SN', 'Location', 'To Run','Prediction','Last Service','Next Service');

        $data['level_user'] = $level_user;
        $data['operation'] = $this->operation_model->getAllData();

        $data['title_bar'] = "PM";
        $this->load->view('component/header');
        $this->load->view('operation/daily_log',$data);
        $this->load->view('component/footer');
    }
    public function done()
    {
        $level_user = $this->session->userdata("level");
        $location = $this->session->userdata('lokasi');
        $data['table_head'] = array('No','Down Date','Up Date','ID', 'Model', 'Hours Meter', 'Indication','Description', 'Priority','Status');

        if($level_user == 'Master Admin')
        {
            $data['done'] = $this->backlog_model->getAllDataMaster("done");
        }
        else
        {
            $data['done'] = $this->backlog_model->getAllDataHistory("done",$location);
        }
        $data['title_bar'] = "Done";
        $this->load->view('component/header');
        $this->load->view('done/index',$data);
        $this->load->view('component/footer');
    }
    public function show(){
        $data = $this->inventory_model->getAllData();
        echo json_encode($data);
    }
    public function getDataById(){
  			$id = $this->input->post('id');
  			$data = $this->inventory_model->getDataById($id);
  			echo json_encode($data);
  	}
    public function getDataByLocationAndPartNumber(){
  			$pn = $this->input->post('part_number');
        $location = $this->input->post('location_to_actual');
  			$data = $this->inventory_model->getDataByLocationAndPartNumber($pn,$location);
  			echo json_encode($data);
  	}
    public function getDescription(){
        $id = $this->input->post('id_backlog');
        $data = $this->backlog_model->getDescription($id);
        echo json_encode($data);
    }
    public function save(){
        $newData = json_encode($data);
        $fields = array(
            'part_number' => $this->input->post('part_number'),
            'description' => $this->input->post('description'),
            'category' => $this->input->post('category'),
            'cost' => $this->input->post('cost'),
            'price' => $this->input->post('price'),
            'location' => $this->input->post('location'),
            'quantity' => $this->input->post('quantity'),
            'ideal_quantity' => $this->input->post('ideal_quantity'),
            'minimum_quantity' => $this->input->post('minimum_quantity'),
            'supplier' => $this->input->post('supplier'),
            'alokasi' => $this->input->post('alokasi'),
            'account_code' => $this->input->post('account_code')
        );
        $this->db->insert('inventory',$fields);
    }
    public function editInventory(){
        $data=$this->inventory_model->update_inventory();
        echo json_encode($data);
    }
    public function transferInventory(){
        $data=$this->inventory_model->transfer_inventory();
        echo json_encode($data);
        
        // Save Transfer Log

        $part_number = $this->input->post('part_number');
        $location_from = $this->input->post('location_from');
        $location_to = $this->input->post('location_to');
        $quantity_compare = $this->input->post('quantity_compare');
        $quantity = $this->input->post('quantity');
        date_default_timezone_set("Asia/Makassar");
        $fields = array(
            'part_number' => $part_number,
            'location_from' => $location_from,
            'location_to' => $location_to,
            'user' => $this->session->userdata('nama'),
            'date' => date('Y-m-d H:i:s'),
            'quantity_awal' => $quantity_compare,
            'quantity_transfer' => $quantity

        );
        $this->db->insert('transfer_log',$fields);

    }
    public function createInventoryTransfer(){
        // Create Inventory
        $fields = array(
            'part_number' => $this->input->post('part_number'),
            'description' => $this->input->post('description'),
            'category' => $this->input->post('category'),
            'cost' => $this->input->post('cost'),
            'price' => $this->input->post('price'),
            'location' => $this->input->post('location_to'),
            'quantity' => $this->input->post('quantity'),
            'ideal_quantity' => $this->input->post('ideal_quantity'),
            'minimum_quantity' => $this->input->post('minimum_quantity'),
            'supplier' => $this->input->post('supplier'),
            'alokasi' => $this->input->post('alokasi'),
            'account_code' => $this->input->post('account_code')
        );
        $this->db->insert('inventory',$fields);
        $part_number = $this->input->post('part_number');
        $quantity_compare = $this->input->post('quantity_compare');
        $quantity = $this->input->post('quantity');
        $result = ($quantity_compare - $quantity);
        $location_from = $this->input->post('location_from');
        $location_to = $this->input->post('location_to');
        
        // Update Inventory Data Location From
        $this->db->set('quantity', $result);
        $this->db->where('location', $location_from);
        $this->db->where('part_number', $part_number);
        $update = $this->db->update("inventory");
        
       
        // Transfer Log
        date_default_timezone_set("Asia/Makassar");
        $log = array(
            'part_number' => $part_number,
            'location_from' => $location_from,
            'location_to' => $location_to,
            'user' => $this->session->userdata('nama'),
            'date' => date('Y-m-d H:i:s'),
            'quantity_awal' => $quantity_compare,
            'quantity_transfer' => $quantity

        );
        $this->db->insert('transfer_log',$log);
    }
    public function deleteInventory(){
  			// $newData = json_encode($data);
  			// $fields = array(
  			//     'priority' => $this->input->post('priority'),
  			// );
  			//  $this->db->where('id_backlog', 'id_backlog');
  			// $this->db->update('backlog',$fields);
  			$data=$this->inventory_model->delete_inventory();
  			echo json_encode($data);

  	}
    public function save_sell(){
        $newData = json_encode($data);
        $source = $this->input->post('date');
        $date = new DateTime($source);

        $fields = array(
            'ID' => $this->input->post('ID'),
            'tanggal' => $date->format('Y-m-d'), // 31-07-2012,
            'part_number' => $this->input->post('part_number'),
            'harga' => $this->input->post('price_sell'),
            'quantity' => $this->input->post('quantity'),
            'total' => $this->input->post('total'),
            'model' => $this->input->post('model'),

        );
        $this->db->insert('sell',$fields);
        // print_r($_POST);
        $id_inventory = $this->input->post('part_number');
        $quantity = $this->input->post('quantity');
        $quantity_awal = $this->input->post('quantity_awal');

        $this->db->set('quantity', ($quantity_awal - $quantity));
        $this->db->where('id', $id_inventory);
        $update = $this->db->update("inventory");
    }

}
