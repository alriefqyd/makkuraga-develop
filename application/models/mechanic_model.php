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
}