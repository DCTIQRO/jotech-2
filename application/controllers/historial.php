<?php

class Historial extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('historial_model');
	}	
	function index()
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		
		$data['comentarios']=$this->historial_model->ver_bitacora();
		
		$data['v']="historial_view";
		$this->load->view('main',$data);
	}
	
}
?>