<?php
class Faculty_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    public function insert($record)
    {
        $data = array();
        foreach($record as $key=>$value){
            $data[$key] = $value;
        }
        unset($data['type']);
        return $this->db->insert('faculty', $data);
    }

    public function update($id, $record)
    {
        $data = array();
        $data['id'] = $id;
        foreach($record as $key=>$value){
            $data[$key] = $value;
        }
        return $this->db->replace('faculty', $data);
    }

    public function getFaculty()
    {
        $this->db->select("faculty.id, emp_no, lname, fname, mname, department.name as department");
        $this->db->from("faculty");
        $this->db->join('department','department.id = faculty.dept');
        $this->db->order_by('faculty.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPerson($id)
    {
        $this->db->select("emp_no, lname,fname,mname, CASE WHEN sex = 'm' THEN 'Male' ELSE 'Female' END as sex, tin, sss, department.name as department, tenure_code.description as tenure, DATE_FORMAT(dob,'%M %d, %Y') AS dob, DATE_FORMAT(date_hired,'%M %d, %Y') AS date_hired");
        $this->db->from("faculty");
        $this->db->join('department','department.id = faculty.dept');
        $this->db->join('tenure_code','faculty.tenure = tenure_code.id');
        $this->db->where('faculty.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
