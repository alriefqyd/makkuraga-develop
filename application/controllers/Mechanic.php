<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mechanic extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('PdfGenerator');
		$this->load->model('login_model');
		$this->load->model('mechanic_model');
		$this->load->helper('url_helper','form');
		if(empty($this->session->userdata('id'))) {
			$this->session->set_flashdata('flash_data', 'You dont have access!');
			redirect('login');
		}
		
	}
	public function index()
	{
		$level_user = $this->session->userdata("level");
		$location = $this->session->userdata('lokasi');
		$data['table_head'] = array('id mechanic','Nama Mechanic','Lokasi','Action');
		$data['mechanic'] = $this->mechanic_model->getMechanic();
		$data['title_bar'] = "Backlog";
		$this->load->view('component/header');
		$this->load->view('mechanic/index',$data);
		$this->load->view('component/footer');
	}
	public function save(){
		$newData = json_encode($data);
		$fields = array(
			'name' => $this->input->post('name'),
			'location' => $this->input->post("location")
			
		);
		$this->db->insert('mechanic',$fields);
		// print_r($_POST);
		
	}
	public function show(){
		$data = $this->mechanic_model->getMechanic();
		echo json_encode($data);
	}
}
