<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->library('PdfGenerator');
		$this->load->model('login_model');
		$this->load->model('alat_model');
		$this->load->helper('url_helper','form');
		$this->load->model('user_model');
		
		if(empty($this->session->userdata('id'))) {
			$this->session->set_flashdata('flash_data', 'You dont have access!');
			redirect('login');
		}

	}
	public function index()
	{
		$level_user = $this->session->userdata("level");
		$location = $this->session->userdata('lokasi');
		$data['table_head'] = array('id','ID Alat','Model','Serial Number','Lokasi', 'Action');
		$data['alat'] = $this->alat_model->getAlat();
		$data['title_bar'] = "Alat";
		$this->load->view('component/header');
		$this->load->view('alat/index',$data);
		$this->load->view('component/footer');
	}
	public function save(){
		$newData = json_encode($data);
		$fields = array(
			'ID_alat' => $this->input->post('ID_alat'),
			'serial_number' => $this->input->post('serial'),
			'model' => $this->input->post('model'),
			'lokasi' => $this->input->post("lokasi")

		);
		$this->db->insert('alat',$fields);
		// print_r($_POST);

	}
	public function show(){
		$data = $this->mechanic_model->getMechanic();
		echo json_encode($data);
	}
	public function getAlatById(){
			$id = $this->input->post('id');
			$data = $this->alat_model->getAlatById($id);
			echo json_encode($data);
	}
	public function editAlat(){
			// $newData = json_encode($data);
			// $fields = array(
			//     'priority' => $this->input->post('priority'),
			// );
			//  $this->db->where('id_backlog', 'id_backlog');
			// $this->db->update('backlog',$fields);
			$data=$this->alat_model->update_alat();
			echo json_encode($data);

	}
	public function deleteAlat(){
			// $newData = json_encode($data);
			// $fields = array(
			//     'priority' => $this->input->post('priority'),
			// );
			//  $this->db->where('id_backlog', 'id_backlog');
			// $this->db->update('backlog',$fields);
			$data=$this->alat_model->delete_alat();
			echo json_encode($data);

	}
}
