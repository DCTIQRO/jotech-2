<?php

class Contactos extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('contacto_model');
	}	
	function index()
	{		
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$data['v']="contacto_view";
		$data['contactos']=$this->contacto_model->ver_contactos();
		$this->load->view('main',$data);
	}
}
?>