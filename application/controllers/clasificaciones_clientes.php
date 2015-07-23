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
	
	function editar($id)
	{			
		$data['v']="editar_clasificacion_cliente";
		$data['datos']=$this->clasificacion_cliente_model->info_clasificacion($id);
		$this->load->view('main_modal',$data);
	}
	
	function editar_clasificacion()
	{			
		$form_data=array(
			"nombre"	=>	$this->input->post('nombre'),
			"descripcion"	=>	$this->input->post('descripcion')
		);
		
		$this->clasificacion_cliente_model->editar_clasificacion($form_data,$this->input->post('id_clasificacion'));
		$this->load->view('cerrar_facybox');
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
	
	function eliminar_clasificacion($id)
	{
		$form_data=array(
			"status"	=> '0',
		);
		
		$this->clasificacion_cliente_model->editar_clasificacion($form_data,$id);
		redirect('clasificaciones_clientes');
	}
	
	function cambiar_id($id)
	{
		$form_data=array(
			"identificador"	=>	$this->input->post('identificador')
		);
		
		$this->clasificacion_cliente_model->editar_clasificacion($form_data,$id);
	}
}
?>