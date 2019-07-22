<?php
class Login_model extends CI_Model
{
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function validate_user($data) {
        $this->db->where('user_name', $data['user_name']);
        $this->db->where('password', md5($data['password']));
        return $this->db->get('user')->row();
    }
    public function getDataById($id = FALSE)
    {
        $query = $this->db->get_where('user', array('id_user' => $id));
        return $query->row_array(); 
    }

 
    function __destruct() {
        $this->db->close();
    }
    public function registerUser($fields)
    {
        if ($this->db->insert('user',$fields))
        {
            return true;
        }return false;
    }
}
?>