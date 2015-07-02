<?php

class Proyectos extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('proyectos_model');
	}	
	function index()
	{			
		$data['v']="clientes_view";
		$data['clientes']=$this->proyectos_model->ver_clientes();
		$this->load->view('main',$data);
	}
	
	function nuevo_proyecto($id)
	{			
		$data['v']="add_proyecto";
		$data['id_cliente']=$id;
		$cliente=$this->proyectos_model->ver_cliente($id);
		$data['clasificaciones']=$this->proyectos_model->ver_clasificaciones();
		$data['tipos']=$this->proyectos_model->ver_tipos();
		$data['tab']="new_proyect";
		$data['titulo']="Crear proyecto de ".$cliente->nombre;
		$data['id_cliente']=$id;
		$this->load->view('main',$data);
	}
	
	
}
?>