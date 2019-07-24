 <?php
 class Mechanic_model extends CI_Model
 {
    public function getMechanic()
    {
        $this->db->select('*');
        $this->db->from('mechanic');
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
    public function getMechanicById($id)
    {
        $this->db->select('*');
        $this->db->from('mechanic');
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_mechanic()
    {
        $id=$this->input->post('id');
        $name=$this->input->post('name');
        $location=$this->input->post('location');

        $this->db->set('name', $name);
        $this->db->set('location', $location);
        $this->db->where('id', $id);
        $result=$this->db->update('mechanic');
        return $result;
    }
    public function delete_mekanik()
    {
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('mechanic'); 
        return $result;
    }
}
