<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('PdfGenerator');
        $this->load->model('login_model');
        $this->load->helper('url_helper','form');
        $this->load->helper('tgl_indo');
        $this->load->model('user_model');
        $this->load->model('backlog_model');
        $this->load->model('operation_model');
        $this->load->helper('date');
        if(empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('flash_data', ' <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Anda belum login</div>');
            redirect('login');
        }
    }
    public function index()
    {
        if ($this->session->userdata('level') !== 'Master Admin') {
          redirect('404');
        }
        $level_user = $this->session->userdata("level");
    		$location = $this->session->userdata('lokasi');
    		$data['table_head'] = array('Id user','Nama User','User Name','Password','Level','Lokasi','Aksi');
    		$data['user'] = $this->user_model->getUser();
        $data['editUser'] = $this->user_model->getUser();
    		$data['title_bar'] = "User";
        $this->load->view('component/header');
        $this->load->view('user/user_view',$data);
        $this->load->view('component/footer');
    }
    public function save(){
       if ($this->session->userdata('level') !== 'Master Admin') {
          redirect('404');
        }
        $newData = json_encode($data);
        $fields = array(
            'nama' => $this->input->post('nama'),
            'user_name' => $this->input->post('user_name'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level'),
            'lokasi' => $this->input->post('lokasi')
        );
        $this->db->insert('user',$fields);
    }
    public function getUserById(){
  			$id = $this->input->post('id');
  			$data = $this->user_model->getUserById($id);
  			echo json_encode($data);
  	}
    public function show(){
        $data = $this->user_model->getUser();
        echo json_encode($data);
    }
    public function editUser(){
     $this->load->library('upload');
     $id=$this->input->post('id');
     $config['upload_path']  = 'assets/images/';
     $config['allowed_types'] = 'jpg|jpeg|png|gif|PNG|JPEG|JPG|GIF';
     $config['max_size']  = 2048000;
     $config['file_name']  = now('Asia/Makassar').'_'.$this->input->post("name");

     $this->upload->initialize($config);
     if(!$this->upload->do_upload('foto_baru'))
     {
       redirect('user/detail/'.$id.'?success=false');
     }
     else {
       $a = $this->input->post('foto_lama');
       $foto = $config['file_name'].$this->upload->data('file_ext');
       $this->user_model->update_user($id,$foto);
       if($a !== "user.png"){
         unlink('assets/images/'.$a);
       }
       redirect('user/detail/'.$id.'?success=true');
     }
  	}
  	public function deleteUser(){
       if ($this->session->userdata('level') !== 'Master Admin') {
          redirect('404');
        }
  			$data=$this->user_model->delete_user();
  			echo json_encode($data);

  	}
    public function detail($id){
      $this->load->helper('form');
      $data['operation'] = $this->operation_model->getDataByUser($id);
  		$data['user'] = $this->user_model->getUserById($id);
  		$this->load->view('component/header');
  		$this->load->view('user/detail',$data);
  		$this->load->view('component/footer.php');
    }
}
