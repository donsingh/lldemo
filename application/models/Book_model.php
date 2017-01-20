<?php
class Book_model extends CI_Model {
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    
    public function getBooks()
    {
		$this->db->select("id,ISBN, title, year_published, publisher");
		$this->db->from("book");
		$query = $this->db->get();
		return $query->result();
    }
	
	public function getJournals()
    {
		$this->db->select("id, title, journal_name, year_published, publisher");
		$this->db->from("journal");
		$query = $this->db->get();
		return $query->result();
    }
	
	public function bookDetails($book_id)
	{
		$this->db->select("*");
		$this->db->from("book");
		$this->db->where("id", $book_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function journalDetails($journal_id)
	{
		$this->db->select("*");
		$this->db->from("journal");
		$this->db->where("id", $journal_id);
		$query = $this->db->get();
		return $query->result();
	}

}
?>
