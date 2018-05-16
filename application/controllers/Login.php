<?php

class Login extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('Login_Model');
        $this->load->library('session');

}

public function index()
{
$this->load->view("login.php");
}


public function login_view(){

$this->load->view("login.php");

}

function login_user(){
  $user_login=array(

  'user_nip'=>$this->input->post('user_nip'),
  'user_password'=>$this->input->post('user_password')

    );

    $data=$this->Login_Model->login_user($user_login['user_nip'],$user_login['user_password']);
      if($data)
      {
        $this->session->set_userdata('user_id',$data['user_id']);
        $this->session->set_userdata('user_name',$data['user_name']);
        $this->session->set_userdata('user_nip',$data['user_nip']);
        $this->session->set_userdata('user_jabatan',$data['user_jabatan']);

        $this->load->view('user_profile.php');

      }
      else{
        $this->session->set_flashdata('error', 'NIP atau Password salah');
        $this->load->view("login.php");

      }


}

function user_profile(){

$this->load->view('user_profile.php');

}
public function user_logout(){

  $this->session->sess_destroy();
  redirect('Login/login_view', 'refresh');
}

}

?>
