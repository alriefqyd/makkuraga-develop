<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('PdfGenerator');
        $this->load->model('login_model');
        $this->load->helper('url_helper','form');
        $this->load->model('user_model');
        if(empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('flash_data', ' <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Anda belum login</div>');
            redirect('login');
        }

    }
    public function index()
    {
        $level_user = $this->session->userdata("level");
    		$location = $this->session->userdata('lokasi');
    		$data['table_head'] = array('Id user','Nama User','User Name','Password','Level','Lokasi','Aksi');
    		$data['user'] = $this->user_model->getUser();
    		$data['title_bar'] = "User";
        $this->load->view('component/header');
        $this->load->view('user/user_view',$data);
        $this->load->view('component/footer');
    }
    public function save(){
        $newData = json_encode($data);
        $fields = array(
            'nama' => $this->input->post('nama'),
            'user_name' => $this->input->post('user_name'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
            'lokasi' => $this->input->post('lokasi')
        );
        $this->db->insert('user',$fields);
        // print_r($_POST);

    }
}
