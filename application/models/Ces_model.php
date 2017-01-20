<?php
class Ces_model extends CI_Model {
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    public function myces()
    {
        $this->db->select("activity, date_start, name_benefeciary, role, status");
        $this->db->from("ces");
        $this->db->join("ces_part","ces_part.ces = ces.id");
        // $this->db->where("emp",<my_ID>);
        $query = $this->db->get();
        return $query->result();
    }

    public function activities()
    {
      $this->db->select("*");
      $this->db->from("ces");
      // $this->db->where("emp",<my_ID>);
      $query = $this->db->get();
      return $query->result();
    }

}
?>
