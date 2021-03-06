<?php

class Clasificaciones_proyectos extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('clasificacion_proyecto_model');
	}	
	function index()
	{	
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$data['v']="clasificaciones_proyectos_view";
		$data['clasificaciones']=$this->clasificacion_proyecto_model->ver_clasificaciones();
		$this->load->view('main',$data);
	}
	
	function guardar_clasificacion()
	{			
		$form_data=array(
			"nombre"	=>	$this->input->post('nombre'),
			"descripcion"	=>	$this->input->post('descripcion')
		);
		
		$this->clasificacion_proyecto_model->agregar_clasificacion($form_data);
		
		redirect('clasificaciones_proyectos');
	}
}
?>