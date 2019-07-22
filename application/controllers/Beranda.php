<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('PdfGenerator');
        $this->load->model('login_model');
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
        $this->load->view('component/header');
        $this->load->view('beranda_view');
        $this->load->view('component/footer');
    }
}
