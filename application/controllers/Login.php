<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	
	function __Construct(){
		parent::__Construct ();
		$this->load->model('General_model');
	}
	  
    public function index($error=false)
	{
		$data =  array('pagetitle'=>'USC Q.A.M.I.S.',  'error'=>$error);
		$this->load->view('login',$data);
	}
      
	public function validate()
	{
		if($this->input->post('username') == NULL || $this->input->post('pass') == NULL){
            $this->index(true);
        }
        
		$result = $this->General_model->login_check($this->input->post('username'));
		//admin123 || p@ssword
		if($result){
            $this->load->library('encryption');
            $decrypted_pass = $this->encryption->decrypt($result[0]->password);
            if($decrypted_pass == $this->input->post('pass')){
                $newdata = array(
                    'user_id'   => $result[0]->indx,
                    'name'      => $result[0]->temp_name,
                    'level'     => $result[0]->level,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
                redirect('faculty');
            }else{
                $this->index(true);
            }
		}else{
			$this->index(true);
		}
	}
	
	public function logout()
	{
		$array_items = array('user_id', 'name', 'level', 'logged_in');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		$this->index();
	}
	
	public function showkey()
	{
		$this->load->library('encryption');
		if($this->input->post('username') != NULL){
			$ciphertext = $this->encryption->encrypt($this->input->post('pass'));
            echo $this->input->post('pass')."<br>";
            echo $ciphertext;
		}
		
	}
}
?>