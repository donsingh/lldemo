<?php
class General_model extends CI_Model {
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    public function getTable($table,$col = "*")
    {
        $this->db->select($col);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }

    public function insertTable($table, $data)
    {
        $this->db->save_queries = FALSE;
        
    }
    
    public function login_check($username)
    {
        $this->db->select("*");
        $this->db->from('accounts');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->result();
    }

}
