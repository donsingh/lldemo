<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ces extends CI_Controller {

	public function __construct()
	{
			 parent::__construct();

			//  $user = $this->session->userdata('id');
			//   if (!isset($user)) {
			//     redirect('Home');
			//   }
			$this->load->model('Ces_model');
			// $this->load->model('Faculty_model');
	}

	public function index()
	{
		$myces = $this->Ces_model->myces();
    $data = array(
      'page_title'        => 'No Title',
      'page_header'       => 'CES',
      'page_description'  => 'Your CES Records',
      'footer_text'       => 'University of San Carlos',
			'menu_index'				=> 3,
			'myces'							=> $myces
    );
		$this->load->view('header',$data);
		$this->load->view('ces/myces');
		$this->load->view('footer');
		$this->load->view('ces/myces_engine');
	}

	public function activities()
	{
		$acts = $this->Ces_model->activities();
    $data = array(
      'page_title'        => 'No Title',
      'page_header'       => 'CES',
      'page_description'  => 'CES Activities',
      'footer_text'       => 'University of San Carlos',
			'menu_index'				=> 3,
			'acts'							=> $acts
    );
		$this->load->view('header',$data);
		$this->load->view('ces/activities');
		$this->load->view('footer');
		$this->load->view('ces/activities_engine');
	}
}
