<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct()
	{
			parent::__construct();

			$user = $this->session->userdata('user_id');
            if(!isset($user)) {
                redirect('Login');
            }
			$this->load->model('Book_model');
	}

	public function index()
	{
		$books = $this->Book_model->getBooks();
        $data = array(
            'page_title'        => 'No Title',
            'page_header'       => 'Book Publications',
            'page_description'  => '',
            'footer_text'       => 'University of San Carlos',
			'menu_index'		=> 4,
			'books'				=> $books
        );
		$this->load->view('header',$data);
		$this->load->view('book/book_table');
		$this->load->view('footer');
		$this->load->view('book/book_engine');
	}
	
	public function journal()
	{
		$journals = $this->Book_model->getJournals();
        $data = array(
            'page_title'        => 'No Title',
            'page_header'       => 'Book Publications',
            'page_description'  => '',
            'footer_text'       => 'University of San Carlos',
			'menu_index'		=> 4,
			'journals'				=> $journals
        );
		$this->load->view('header',$data);
		$this->load->view('book/journal_table');
		$this->load->view('footer');
		$this->load->view('book/journal_engine');
	}


	public function book_details()
	{
		if($this->input->post('book') != NULL){
			echo json_encode($this->Book_model->bookDetails($this->input->post('book')));
		}else{
			echo "1";
		}
	}
	
	public function journal_details()
	{
		if($this->input->post('journal') != NULL){
			echo json_encode($this->Book_model->bookDetails($this->input->post('book')));
		}else{
			echo "1";
		}
	}
}
