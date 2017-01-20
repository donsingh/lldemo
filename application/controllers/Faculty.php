<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {

	public function __construct()
	{
			 parent::__construct();

			$user = $this->session->userdata('user_id');
            if(!isset($user)) {
                redirect('Login');
            }
			$this->load->model('General_model');
			$this->load->model('Faculty_model');
	}

	public function index()
	{
		$test = $this->Faculty_model->getFaculty("faculty");
		$data = array(
			'page_title'        => 'No Title',
			'page_header'       => 'Faculty Records',
			'page_description'  => 'Enter Description Here',
			'footer_text'       => 'University of San Carlos',
			'menu_index'				=> 2,
			'test'							=> $test
		);
		$this->load->view('header',$data);
		$this->load->view('faculty/table');
		$this->load->view('footer');
		$this->load->view('faculty/table_engine');
	}

	// LOAD EMPTY FORM OR EDIT FACULTY FORM
	public function faculty_form($mode="new",$id=NULL)
	{
		$tenure = $this->General_model->getTable("tenure_code");
		$departments = $this->General_model->getTable("department");

		if($mode == "update" && $id != NULL){
				$record =  $this->Faculty_model->getPerson($id);
				$header = "Update your record!";
		}else{
				$record = array();
				$header = "New Faculty Record";
		}

    $data = array(
      'page_title'        => 'No Title',
      'page_header'       => $header,
      'page_description'  => 'Enter Description Here',
      'footer_text'       => 'University of San Carlos',
			'menu_index'				=> 2,
			'tenure'						=> $tenure,
			'dept'							=> $departments,
			'rec'								=> $record
    );

		if($mode == "update" && $id != NULL){
				$data['update'] = $id;
		}

		$this->load->view('header',$data);
		$this->load->view('faculty/insert');
		$this->load->view('footer');
		$this->load->view('faculty/insert_engine');
	}

	// INSERT FUNCTION FOR NEW DATA
	public function new_faculty()
	{
			if(count($this->input->post()) > 0){
					if($this->Faculty_model->insert($this->input->post())){
							if(null !== $this->input->post('type') && $this->input->post('type') == "ajax"){
								echo "1";
							}else{
								redirect('Faculty');
							}
					}
			}else{
					if(null !== $this->input->post('type') && $this->input->post('type') == "ajax"){
						echo "0";
					}else{
						redirect('Faculty/faculty_form');
					}
			}
	}

	// FETCH TABULAR FACULTY DATA, FORMATTED
	public function faculty_info()
	{
			if($this->input->post('id')){
					echo json_encode($this->Faculty_model->getPerson($this->input->post('id')));
			}
	}

	// UPDATE FUNCTION FOR EXISTING FACULTY
	public function update($id)
	{
			if(count($this->input->post()) > 0){
					if($this->Faculty_model->update($id,$this->input->post())){
							redirect('Faculty');
					}
			}
	}

	// BATCH INSERT AND UPLOAD
	public function batch()
	{
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'xls|xlsx';
			$config['max_size']             = 100;

			$this->load->library('upload', $config);


			$data = array(
				'page_title'        => 'Batch Insert',
				'page_header'       => 'Batch Insert Faculty Records',
				'page_description'  => 'Enter Description Here',
				'footer_text'       => 'University of San Carlos',
				'menu_index'				=> 2
			);
			$this->load->view('header',$data);
			$this->load->view('faculty/batch',array('error' => ' ' ));
			$this->load->view('footer');
			// $this->load->view('faculty/');
	}

	public function do_upload()
	{
			$tenure = $this->General_model->getTable("tenure_code");
			$departments = $this->General_model->getTable("department");

			$data = array(
				'page_title'        => 'Batch Insert',
				'page_header'       => 'Batch Insert Faculty Records',
				'page_description'  => 'Enter Description Here',
				'footer_text'       => 'University of San Carlos',
				'menu_index'				=> 2,
				'tenure'						=> $tenure,
				'dept'							=> $departments
			);
			$config['upload_path']          = FCPATH.'assets\upload\files\\';
			$config['file_ext_tolower']			= true;
			$config['allowed_types']        = 'xls|xlsx';
			$config['max_size']             = 1000;
			$config['file_name']             = uniqid();

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$this->load->view('header',$data);
			if ( ! $this->upload->do_upload('facultyfile'))
			{
							$error = array('error' => $this->upload->display_errors());

							$this->load->view('faculty/batch', $error);
			}
			else
			{
							$data['headers'] = ($this->input->post('cheaders')=="on")?1:0;

							$file = FCPATH.'assets\upload\files\\'.$this->upload->data('file_name');
							$this->load->library('excel');
							$objReader = PHPExcel_IOFactory::createReader('Excel2007');
					    $objReader->setReadDataOnly(true);
					    $objPHPExcel = $objReader->load($file);
							$data['sheet'] = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

							$this->load->view('faculty/process_upload', $data);
			}


			$this->load->view('footer');
			$this->load->view('faculty/process_upload_engine');
	}
}
