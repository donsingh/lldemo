<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
			 parent::__construct();

			//  $user = $this->session->userdata('id');
			//   if (!isset($user)) {
			//     redirect('Home');
			//   }
			$this->load->model('General_model');
			// $this->load->model('Faculty_model');
	}

	public function index($tbl="fac_rank_code")
	{
			$ranks = $this->General_model->getTable($tbl);
	    $data = array(
	      'page_title'        => 'Faculty Ranks',
	      'page_header'       => 'Faculty Ranks',
	      'page_description'  => 'Enter Description Here',
	      'footer_text'       => 'University of San Carlos',
				'menu_index'				=> 4,
				'table'							=> $ranks
	    );
			$this->load->view('header',$data);
			$this->load->view('settings/table');
			$this->load->view('footer');
			$this->load->view('settings/table_engine');
	}
}
