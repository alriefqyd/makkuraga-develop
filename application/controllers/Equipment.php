<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('PdfGenerator');
        $this->load->model('login_model');
        $this->load->model('backlog_model');
        $this->load->model('mechanic_model');
        $this->load->model('inventory_model');
        $this->load->model('pm_model');
        $this->load->model('user_model');
        $this->load->model('alat_model');
        $this->load->helper('url_helper','form');
        $this->load->helper('tgl_indo');
        if(empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('flash_data', 'You dont have access!');
            redirect('login');
        }

    }
    public function backlog()
    {
        $level_user = $this->session->userdata("level");
        $data['level'] = $this->session->userdata("level");
        $location = $this->session->userdata('lokasi');
        $data['table_head'] = array('No','Down Date','Up Date','ID', 'Model', 'Hours Meter', 'Indication', 'Priority','Status','Location','Details');
        $data['level_user'] = $level_user;
        $data['alat'] =  $this->alat_model->getAlat();

        $data['ID'] = $this->backlog_model->getAllEntity('*','alat');
        $data['model'] = $this->backlog_model->getAllEntity('model','alat');

        // if(isset($_GET['ID']) || isset($_GET['model'])){
        //    $data['backlog'] = $this->backlog_model->getAllDataByFilter();
        // } 
        // else {
        //     $data['backlog'] = $this->backlog_model->getAllData();
        // }

        if($level_user == 'Master Admin'              ||
           $level_user == 'Inventory Admin All Area'  ||
           $level_user == 'Admin All Area'            ||
           $level_user == 'Mekanik Admin All Area'    ||
           $level_user == 'User All Area'             ){
            
            if(isset($_GET['ID']) || isset($_GET['model'])){
               $data['backlog'] = $this->backlog_model->getAllDataByFilter();
            } 
            else {
                $data['backlog'] = $this->backlog_model->getAllDataMaster("backlog");
            }

        }
        else
        {
            if(isset($_GET['ID']) || isset($_GET['model'])){
               $data['backlog'] = $this->backlog_model->getAllDataByFilterHistory("backlog",$location);
            } 
            else {
               $data['backlog'] = $this->backlog_model->getAllDataHistory("backlog",$location);
            }
            
        }
        $data['title_bar'] = "Backlog";
        $this->load->view('component/header');
        $this->load->view('backlog/index',$data);
        $this->load->view('component/footer');
    }
    public function progress()
    {
        $level_user = $this->session->userdata("level");
        $data['level'] = $this->session->userdata("level");
        $data['part_number'] = $this->inventory_model->getAllPart();
        $location = $this->session->userdata('lokasi');
        $data['level_user'] = $level_user;
        $data['alat'] =  $this->alat_model->getAlat();
        $data['table_head'] = array('No','Down Date','Up Date','ID', 'Model', 'Hours Meter', 'Indication', 'Description','Priority','Status','Location','Mekanik','Detail','Sell');
        if($level_user == 'Master Admin'              ||
           $level_user == 'Inventory Admin All Area'  ||
           $level_user == 'Admin All Area'            ||
           $level_user == 'Mekanik Admin All Area'    ||
           $level_user == 'User All Area'             ){
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
        $data['ID'] = $this->backlog_model->getAllEntity('*','alat');
        $data['model'] = $this->backlog_model->getAllEntity('model','alat');
        $level_user = $this->session->userdata("level");
        $data['level'] = $this->session->userdata("level");
        $location = $this->session->userdata('lokasi');
        $data['part_number'] = $this->inventory_model->getAllPart();
        $data['table_head'] = array('No','Down Date','Up Date','ID', 'Model', 'Hours Meter', 'Indication','Description', 'Priority','Status','Location','Detail','Sell');
        $data['alat'] =  $this->alat_model->getAlat();
        if($level_user == 'Master Admin')
        {
            if(isset($_GET['ID']) || isset($_GET['model'])){
               $data['done'] = $this->backlog_model->getAllDataByFilterDone();
            } 
            else {
                $data['done'] = $this->backlog_model->getAllDataMaster("done");
            }

        }
        else
        {
           if(isset($_GET['ID']) || isset($_GET['model'])){
               $data['done'] = $this->backlog_model->getAllDataByFilterHistory("done",$location);
            } 
            else {
               $data['done'] = $this->backlog_model->getAllDataHistory("done",$location);
            }
        }
        $data['title_bar'] = "Done";
        $this->load->view('component/header');
        $this->load->view('done/index',$data);
        $this->load->view('component/footer');
    }
    public function show(){
        $data = $this->backlog_model->getAllData();
        echo json_encode($data);
    }
    public function getDescription(){
        $id = $this->input->post('id_backlog');
        $data = $this->backlog_model->getDescription($id);
        echo json_encode($data);
    }
    public function save(){
        $newData = json_encode($data);

        $source = $this->input->post('down_date');
        $date = new DateTime($source);
        $fields = array(
            'ID' => $this->input->post('ID'),
            'model' => $this->input->post('model'),
            'hours_meter' => $this->input->post('hours_meter'),
            'indication' => $this->input->post('indication'),
            'status' => $this->input->post('status'),
            'priority' => $this->input->post('prioritas'),
            'history' => 'backlog',
            'reminder_km' => $this->input->post('reminder_km'),
            'reminder_hours_meter' => $this->input->post('reminder_hours_meter'),
            'location' => $this->session->userdata("lokasi"),
            'down_date' => $date->format('Y-m-d'),

        );
        var_dump($fields);
        $this->db->insert('backlog',$fields);
        // print_r($_POST);

    }
    public function editPrioritas(){
        $data=$this->backlog_model->update();
        echo json_encode($data);
    }
    public function editStatus(){
        $data=$this->backlog_model->update_status();
        echo json_encode($data);
    }
    public function editDownDate(){
        $data=$this->backlog_model->update_down_date();
        echo json_encode($data);
    }
    public function editUpDate(){
        $data=$this->backlog_model->update_up_date();
        echo json_encode($data);
    }
    public function editDeskripsi(){
        $data=$this->backlog_model->update_deskripsi();
        echo json_encode($data);
    }
    public function editMechanic(){
        $data=$this->backlog_model->update_mechanic();
        echo json_encode($data);
    }
    public function delete(){
            $data=$this->backlog_model->delete_backlog();
            echo json_encode($data);

    }

}
