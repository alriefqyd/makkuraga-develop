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

        if($level_user == 'Master Admin')
        {
            $data['pm'] = $this->pm_model->getAllData();
        }
        else
        {
            $data['pm'] = $this->pm_model->getAllData();
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
        $data=$this->pm_model->updateHm();
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
        // $newData = json_encode($data);
        // $fields = array(
        //     'priority' => $this->input->post('priority'),
        // );
        //  $this->db->where('id_backlog', 'id_backlog');
        // $this->db->update('backlog',$fields);
        $data=$this->backlog_model->update_deskripsi();
        echo json_encode($data);

    }public function editMechanic(){
        // $newData = json_encode($data);
        // $fields = array(
        //     'priority' => $this->input->post('priority'),
        // );
        //  $this->db->where('id_backlog', 'id_backlog');
        // $this->db->update('backlog',$fields);
        $data=$this->backlog_model->update_mechanic();
        echo json_encode($data);

    }

}
