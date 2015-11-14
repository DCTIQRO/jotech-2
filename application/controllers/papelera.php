<?php

class Papelera extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('papelera_model');
	}	
	function index()
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		
		$data['clientes']=$this->papelera_model->ver_clientes();
		$data['proyectos']=$this->papelera_model->ver_proyectos();
		$data['contactos']=$this->papelera_model->ver_contactos();
		$data['tareas_proyectos']=$this->papelera_model->ver_tareas_proyectos();
		$data['tareas_clientes']=$this->papelera_model->ver_tareas_cliente();
		$data['tareas_generales']=$this->papelera_model->ver_tareas_generales();
		$data['v']="papelera_view";
		$this->load->view('main',$data);
	}
	
}
?>