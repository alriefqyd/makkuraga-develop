<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('PdfGenerator');
        $this->load->model('login_model');
        $this->load->model('user_model');
        $this->load->model('pm_model');
        $this->load->model('backlog_model');
        $this->load->model('mechanic_model');
        $this->load->helper('url_helper','form');
        if(empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('flash_data', ' <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Anda belum login</div>');
            redirect('login');
        }

    }
    public function index()
    {
      $location = $this->session->userdata('lokasi');
      $level_user = $this->session->userdata("level");
      if($level_user == 'Master Admin'              ||
         $level_user == 'Inventory Admin All Area'  ||
         $level_user == 'Admin All Area'            ||
         $level_user == 'Mekanik Admin All Area'    ||
         $level_user == 'User All Area'             ){
          $data['backlog'] = $this->backlog_model->getAllDataMaster("backlog");
          $data['progress'] = $this->backlog_model->getAllDataMaster("progress");
          $data['done'] = $this->backlog_model->getAllDataMaster("done");
        }
        else
        {
            $data['backlog'] = $this->backlog_model->getAllDataHistory("backlog",$location);
            $data['progress'] = $this->backlog_model->getAllDataHistory("progress",$location);
            $data['done'] = $this->backlog_model->getAllDataHistory("done",$location);
        }
        $data['pm'] = $this->pm_model->getAllData();
        $data['user'] = $this->user_model->getUser();
        $data['mechanic'] = $this->mechanic_model->getMechanic();
        $this->load->view('component/header');
        $this->load->view('beranda_view',$data);
        $this->load->view('component/footer');
    }
}
