<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('PdfGenerator');
        $this->load->model('login_model');
        $this->load->model('operation_model');
        $this->load->model('mechanic_model');
        $this->load->helper('url_helper','form');
        $this->load->helper('tgl_indo');
        $this->load->helper('date');
        $this->load->model('user_model');
        $this->load->model('alat_model');

        if(empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('flash_data', 'You dont have access!');
            redirect('login');
        }

    }
    public function index()
    {
        $level_user = $this->session->userdata("level");
        $location = $this->session->userdata('lokasi');
        $data['table_head'] = array('No','Tanggal','ID', 'Model', 'SN', 'Location', 'To Run','Prediction','Last Service','Next Service');
        $tanggal = date('Y-m-d');
        $data['level_user'] = $level_user;
        $data['operation'] = $this->operation_model->getAllDataNow($tanggal);
        if($level_user === "Admin Kodal" || $level_user === "User Kodal" || $level_user === "User Asera" || $level_user === "Inventory Admin Kodal" || $level_user === "Admin Asera"  ){
             $data['operation'] = $this->operation_model->getAllDataNowLokasi($tanggal,$this->session->userdata("lokasi"));
        }
        $data['alat'] =  $this->alat_model->getAlat();
        $data['title_bar'] = "Daily Monitoring";
        $this->load->view('component/header');
        $this->load->view('operation/daily_monitoring',$data);
        $this->load->view('component/footer');
    }
    public function log_daily()
    {
        $level_user = $this->session->userdata("level");
        $location = $this->session->userdata('lokasi');
        $data['table_head'] = array('No','Tanggal','ID', 'Model', 'SN', 'Location', 'To Run','Prediction','Last Service','Next Service');

        $data['level_user'] = $level_user;
        $data['operation'] = $this->operation_model->getAllData();
        if($level_user === "Admin Kodal" || $level_user === "User Kodal" || $level_user === "User Asera" || $level_user === "Inventory Admin Kodal" || $level_user === "Admin Asera" ){
             $data['operation'] = $this->operation_model->getAllDataLokasi($this->session->userdata("lokasi"));
        }
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
        $data = $this->operation_model->getAllData();
        echo json_encode($data);
    }
    public function getOperationById(){
        $data = $this->operation_model->getDataById();
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
            'ID' => $this->input->post('ID'),
            'model' => $this->input->post('model'),
            'start_hm' => $this->input->post('start_hm'),
            'stop_hm' => $this->input->post('stop_hm'),
            'total' => $this->input->post('stop_hm') - $this->input->post('start_hm'),
            'working' => $this->input->post('working'),
            'status' => $this->input->post('status'),
            'shift' => $this->input->post('shift'),
            'lokasi' => $this->input->post('lokasi'),
            'createdBy' => $this->input->post('user'),
            'dateCreated' => date('y-m-d')
        );
        $this->db->insert('operation',$fields);
        // print_r($_POST);
    }
    public function edit(){
        $data=$this->operation_model->update();
        echo json_encode($data);
    }
    public function editKomentar(){
      $id=$this->input->post('id_operation');
      $komentar=$this->input->post('komentar');
      $data=$this->operation_model->updateKomentar($id,$komentar);
      echo json_encode($data);
    }
    public function editTanggal(){
        $id_pm=$this->input->post('id_operation');
        $tanggal=$this->input->post('tanggal');
        $data=$this->operation_model->update_tanggal($id_pm,$tanggal);
        echo json_encode($data);
    }
    public function editLastServiceDate(){
        $data=$this->pm_model->update_last_service();
        echo json_encode($data);
    }
    public function editNextServiceDate(){
        $data=$this->pm_model->update_next_service();
        echo json_encode($data);
    }
    public function editDeskripsi(){
        $data=$this->backlog_model->update_deskripsi();
        echo json_encode($data);

    }public function editMechanic(){
        $data=$this->backlog_model->update_mechanic();
        echo json_encode($data);

    }

}
