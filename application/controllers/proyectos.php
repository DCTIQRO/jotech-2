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
		
	}
	
	function nuevo_proyecto($id)
	{			
		$data['v']="add_proyecto";
		$cliente=$this->proyectos_model->ver_cliente($id);
		$data['clasificaciones']=$this->proyectos_model->ver_clasificaciones();
		$data['tipos']=$this->proyectos_model->ver_tipos();
		$data['tab']="new_proyect";
		$data['titulo']="Crear proyecto de ".$cliente->nombre;
		$data['id_cliente']=$id;
		$this->load->view('main',$data);
	}
	
	function guardar_proyecto()
	{
		list($dia,$mes,$año)=explode('-',$this->input->post('fecha_inicio'));
		date_default_timezone_set('America/Mexico_City');
		$form_data=array(
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'estatus' => $this->input->post('1'),
			'fecha_inicio' => $año."-".$mes."-".$dia,
			'descripcion_corta' => $this->input->post('descripcion_corta'),
			'tipo' => $this->input->post('tipo'),
			'id_cliente_fk' => $this->input->post('id_cliente'),
			'progreso' => $this->input->post('0'),
			'fecha_insercion' => date('Y-m-d H:i:s'),
		);
		
		$id_proyecto=$this->proyectos_model->guardar_proyecto($form_data);
		
		$etiquetas=explode(',',$this->input->post('tags'));
		for($i=0;$i<count($etiquetas);$i++)
		{
			$form_etiqueta[]=array(
				'etiqueta'			=>	$etiquetas[$i],
				'id_proyecto_fk'	=>	$id_proyecto
			);
		}
		$this->proyectos_model->guardar_etiquetas($form_etiqueta);
		print_r($form_data);
		print_r($form_etiqueta);
		redirect('proyectos/proyectos_tareas/'.$this->input->post('id_cliente'));
	}
	
	function proyectos_tareas($id)
	{
		$cliente=$this->proyectos_model->ver_cliente($id);
		$data['v']="proyectos_tareas";
		$data['id_cliente']=$id;
		$data['tab']="proyec_tarea";
		$data['titulo']="Proyectos y Tareas de ".$cliente->nombre;
		$data['proyectos']=$this->proyectos_model->ver_proyectos($id);
		$data['tareas']=$this->proyectos_model->ver_tareas($id);
		$this->load->view('main',$data);
	}
	
	
}
?>