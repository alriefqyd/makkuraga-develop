 <?php
 class Alat_model extends CI_Model
 {
    public function getAlat()
    {
        $this->db->select('*');
        $this->db->from('alat');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function addData($fields)
    {
       if ($this->db->insert('alat',$fields))
        {
            return true;
        }return false;
    }
    public function getAlatById($id)
    {
        $this->db->select('*');
        $this->db->from('alat');
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_alat()
    {
        $this->db->set('ID_alat', $this->input->post('ID_alat'));
        $this->db->set('model', $this->input->post('model'));
        $this->db->set('serial_number', $this->input->post('serial'));
        $this->db->set('lokasi', $this->input->post('lokasi'));
        $this->db->where('id', $this->input->post('id'));
        $result=$this->db->update('alat');
        return $result;
    }
    public function delete_alat()
    {
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('alat'); 
        return $result;
    }
}
