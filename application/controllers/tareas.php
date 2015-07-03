<?php

class Tareas extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('tareas_model');
	}	
	function index()
	{			
		
	}
	
	function nueva_tarea($id)
	{			
		$cliente=$this->tareas_model->ver_cliente($id);
		$data['v']="add_tarea";
		$data['tab']="new_tarea";
		$data['titulo']="Crear Tarea de ".$cliente->nombre;
		$data['id_cliente']=$id;
		$data['usuarios']=$this->tareas_model->ver_usuarios();
		$this->load->view('main',$data);
	}	
	
	function guardar_tarea()
	{
		list($dia,$mes,$año)=explode('-',$this->input->post('fecha_inicio'));
		list($dia2,$mes2,$año2)=explode('-',$this->input->post('fecha_fin'));
		date_default_timezone_set('America/Mexico_City');
		$form_data=array(
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'fecha_inicio' => $año."-".$mes."-".$dia,
			'fecha_fin' => $año2."-".$mes2."-".$dia2,
			'estatus' => '0',
			'id_cliente_fk' => $this->input->post('id_cliente'),
			'fecha_registro' => date('Y-m-d H:i:s'),
		);
		
		$id_tarea=$this->tareas_model->guardar_tarea($form_data);
		
		$usuarios=$this->input->post('usuarios');
		
		for($i=0;$i<count($usuarios);$i++)
		{
			$form_usuarios[]=array(
				'id_usuario_fk'	=>	$usuarios[$i],
				'id_tarea_fk'	=>	$id_tarea,
				'tipo'			=>	'0'
			);
		}
		
		$this->tareas_model->guardar_usuarios($form_usuarios);
		redirect('proyectos/proyectos_tareas/'.$this->input->post('id_cliente'));
	}
}
?>