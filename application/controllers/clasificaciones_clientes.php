<?php

class Clasificaciones_clientes extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('clasificacion_cliente_model');
	}	
	function index()
	{			
		$data['v']="clasificaciones_clientes_view";
		$data['clasificaciones']=$this->clasificacion_cliente_model->ver_clasificaciones();
		$this->load->view('main',$data);
	}
	
	function guardar_clasificacion()
	{			
		$form_data=array(
			"nombre"	=>	$this->input->post('nombre'),
			"descripcion"	=>	$this->input->post('descripcion')
		);
		
		$this->clasificacion_cliente_model->agregar_clasificacion($form_data);
		
		redirect('clasificaciones_clientes');
	}
}
?>