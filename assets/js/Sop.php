<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sop extends CI_Controller {

     function __construct() {
          parent::__construct();
          $this->load->helper('url_helper','form');
          $this->load->model('sop_model');

     }

     public function add()
     {
          $data = $this->uri->segment(1);
          $this->load->helper('form','date');
          $this->load->library('form_validation');
          $this->form_validation->set_rules('pertanyaan1','Satu','required');
          $this->form_validation->set_rules('pertanyaan2','Dua','required');

         
          if($this->form_validation->run()===FALSE)
          {
               $this->load->view('component/header');
               // $this->load->view('component/aside');
               $this->load->view('register');
               $this->load->view('component/footer');
          }
          else
          {
               $fields = array(
                    'satu' => $this->input->post('satu'),
                    'dua' => $this->input->post('dua'),
                    'sop' => $data
                    
                    );
              
               $this->sop_model->add($fields);
               //$this->session->set_flashdata('pesan','Data berhasil di tambahkan');
               redirect('beranda');

         // insert each row to another table

               
          }

     }
     public function addKomentar()
     {
          $this->load->library('form_validation');
          $this->form_validation->set_rules('komentar','Komentar','required');
          $this->form_validation->set_rules('id_sop','Id Sop','required');
          if($this->form_validation->run()===FALSE)
          {
             
         // insert each row to another table
          	redirect($this->uri->segment(0));
              
          }
          else
          {
          	  $fields = array(
                    'komentar' => $this->input->post('komentar'),
                    'id_sop' => $this->input->post('id_sop')
                    
                    
                    );
              
               $this->sop_model->addKomentar($fields);
               //$this->session->set_flashdata('pesan','Data berhasil di tambahkan');
               redirect($this->input->post('link')."?input=true");

          }

     }
 }

