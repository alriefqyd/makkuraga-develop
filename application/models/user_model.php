<?php
class User_model extends CI_Model
{
   public function getUser()
   {
       $this->db->select('*');
       $this->db->from('user');
       $query = $this->db->get();
       return $query->result_array();
   }
   public function addData($fields)
   {
      if ($this->db->insert('mechanic',$fields))
       {
           return true;
       }return false;
   }
   public function getUserById($id)
   {
       $this->db->select('*');
       $this->db->from('user');
       $this->db->where("id",$id);
       $query = $this->db->get();
       return $query->result_array();
   }
   public function update_user()
   {
       $id=$this->input->post('id');
       $nama=$this->input->post('nama');
       $user_name=$this->input->post('user_name');
       $password=md5($this->input->post('password'));
       $level=$this->input->post('level');
       $lokasi=$this->input->post('lokasi');

       $this->db->set('nama', $nama);
       $this->db->set('user_name', $user_name);
       $this->db->set('password', $password);
       $this->db->set('level', $level);
       $this->db->set('lokasi', $lokasi);
       $this->db->where('id', $id);
       $result=$this->db->update('user');
       return $result;
   }
   public function delete_mekanik()
   {
       $id=$this->input->post('id');
       $this->db->where('id', $id);
       $this->db->delete('mechanic');
       return $result;
   }
   // public function update_user()
   // {
   //     $id=$this->input->post('id');
   //     $fields = array(
   //         'nama' => $this->input->post('nama'),
   //         'user_name' => $this->input->post('user_name'),
   //         'password' => $this->input->post('password'),
   //         'level' => $this->input->post('level'),
   //         'lokasi' => $this->input->post('lokasi')
   //     );
   //     $result = $this->db->update_where('user',$id);
   //     return $result;
   // }
   public function delete_user()
   {
       $id=$this->input->post('id');
       $this->db->where('id', $id);
       $this->db->delete('mechanic');
       return $result;
   }
}
