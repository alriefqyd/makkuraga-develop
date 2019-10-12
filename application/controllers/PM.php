<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pm extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('PdfGenerator');
        $this->load->model('login_model');
        $this->load->model('pm_model');
        $this->load->model('mechanic_model');
        $this->load->helper('url_helper','form');
        $this->load->helper('tgl_indo');
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
        $data['table_head'] = array('No','PM State','ID', 'Model', 'SN', 'Location', 'To Run','Prediction','Last Service','Next Service');
        $data['alat'] =  $this->alat_model->getAlat();
        $data['level_user'] = $level_user;

        $data['ID'] = $this->pm_model->getAllEntity('ID','pm');
        $data['model'] = $this->pm_model->getAllEntity('model','pm');
        $filterlokasi = isset($_GET['ID']) ? $_GET['ID'] : "";
        $filterPartNumber = isset($_GET['model']) ? $_GET['model'] : "";

        
        if(isset($_GET['ID']) || isset($_GET['model'])){
           $data['pm'] = $this->pm_model->getAllDataByFilter();
        } 
        else {
            $data['pm'] = $this->pm_model->getAllData();
        }
        
        if($level_user == "User Kodal" || $level_user == "Admin Kodal" || $level_user == "Admin Asera" || $level_user == "User Asera"){
            if(isset($_GET['ID']) || isset($_GET['model'])){
                $data['pm'] = $this->pm_model->getAllDataByFilterLokasi($this->session->userdata("lokasi"));
            } 
            else {
               $data['pm'] = $this->pm_model->getAllDataLokasi($this->session->userdata("lokasi"));
            }
            
        }
        $data['title_bar'] = "PM";
        $this->load->view('component/header');
        $this->load->view('pm/index',$data);
        $this->load->view('component/footer');
    }
    public function progress()
    {
        $level_user = $this->session->userdata("level");
        $location = $this->session->userdata('lokasi');
        $data['table_head'] = array('No','Down Date','Up Date','ID', 'Model', 'Hours Meter', 'Indication', 'Description','Priority','Status','Mekanik');

        if($level_user == 'Master Admin')
        {
            $data['progress'] = $this->backlog_model->getAllDataMaster("onprogress");
        }
        else
        {
            $data['progress'] = $this->backlog_model->getAllDataHistory("onprogress",$location);
        }
        $data['mechanic'] = $this->mechanic_model->getMechanic();
        $data['title_bar'] = "Progress";
        $this->load->view('component/header');
        $this->load->view('progress/index',$data);
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
        $data = $this->pm_model->getAllData();
        echo json_encode($data);
    }
    public function showById(){
        $data = $this->pm_model->getDataById();
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
            'sn' => $this->input->post('sn'),
            'location' => $this->input->post('location')
        );
        $this->db->insert('pm',$fields);
        // print_r($_POST);
    }
    public function editPm(){
        $data=$this->pm_model->update();
        echo json_encode($data);
    }
    public function editHm(){
      $id_pm=$this->input->post('id_pm');
      $data_ = $this->pm_model->getDescription($id_pm);
      $hm=$this->input->post('hm');
      $table=$this->input->post('table');
      foreach ($data_ as $dat) {
       if($table == 'actual_hours_meter'){
         $to_run = $dat['next_service_meter'] - $hm;
       }else if ($table == 'next_service_meter'){
         $to_run = $hm - $dat['actual_hours_meter'];
       } else{
         $to_run = $dat['to_run'];
       }
      }

      $data=$this->pm_model->updateHm($to_run);
      echo json_encode($data);
    }
    public function editActualHoursDate(){
        $data=$this->pm_model->update_actual_date();
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
