<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("login_model", "login");
		  $this->load->model('user_model');
		if(!empty($_SESSION['id_user']))
		redirect('beranda');

	}

	public function index() {
		if($_POST) {
			$result = $this->login->validate_user($_POST);
			if(!empty($result)) {
				$data = [
					'id' => $result->id,
					'user_name' => $result->username,
					'nama' => $result->nama,
					'level' => $result->level,
					'lokasi' => $result->lokasi,
					'foto' =>$result->foto

				];

				$this->session->set_userdata($data);
				redirect('beranda');
			} else {
				$this->session->set_flashdata('flash_data', '<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Username atau password yang anda masukkan salah');
				redirect('login');
			}
		}

		$this->load->view("login_view");

	}
	public function logout()
	{
		$data = ['id', 'user_name'];
		$this->session->unset_userdata($data);

		redirect('login');
	}
}
