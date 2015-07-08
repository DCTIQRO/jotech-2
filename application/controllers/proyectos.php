<?php

class Proyectos extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('proyectos_model');
	}	
	function index()
	{			
		$data['v']="proyectos_view";
		$data['tab']="proyectos";
		$data['titulo']="Listado de Proyectos";
		$data['proyectos']=$this->proyectos_model->todos_proyectos();
		$this->load->view('main',$data);
	}
	
	function nuevo_proyecto($id)
	{			
		$data['v']="add_proyecto";
		$cliente=$this->proyectos_model->ver_cliente($id);
		$data['clasificaciones']=$this->proyectos_model->ver_clasificaciones();
		$data['tipos']=$this->proyectos_model->ver_tipos();
		$data['titulo']="Crear proyecto de ".$cliente->nombre;
		$data['usuarios']=$this->proyectos_model->ver_usuarios();
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
		
		$clasi=$this->input->post('clasificacion');
		if($clasi != '0'){
			$form_clasificacion=array(
				'id_clasificacion' => $clasi,
				'prioridad' 	=> $this->input->post('prioridad'),
				'id_proyecto_fk' => $id_proyecto,
			);
			$this->proyectos_model->guardar_clasificacion($form_clasificacion);
		}
		
		$num=$this->input->post('numero_clas');
		
		for($i=1;$i<=$num;$i++)
		{
			$clasi=$this->input->post('clasificacion'.$i);
			if($clasi != '0'){
				$form_clasificacion=array(
					'id_clasificacion' => $clasi,
					'prioridad' 	=> $this->input->post('prioridad'.$i),
					'id_proyecto_fk' => $id_proyecto,
				);
				$this->proyectos_model->guardar_clasificacion($form_clasificacion);
			}
		}
			
		$usuarios=$this->input->post('usuarios');
		
		for($i=0;$i<count($usuarios);$i++)
		{
			$form_usuarios[]=array(
				'id_usuario_fk'		=>	$usuarios[$i],
				'id_proyecto_fk'	=>	$id_proyecto,
				'fecha_insercion'	=>	date('Y-m-d H:i:s'),
				'permiso'			=>	'1'
			);
		}
		$this->proyectos_model->guardar_usuarios($form_usuarios);
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
	
	function ver_proyecto($id)
	{
		$proyecto=$this->proyectos_model->ver_proyecto($id);
		$data['v']="ver_proyecto";
		$data['tab']="proyectos";
		$data['id_proyecto']=$id;
		$data['titulo']="Proyecto ".$proyecto->nombre;
		$data['descripcion']="Proyecto ".$proyecto->descripcion;
		$data['bitacoras']=$this->proyectos_model->bitacora_proyecto($id);
		$data['usuarios']=$this->proyectos_model->ver_usuarios_proyectos($id);
		$data['asignados']=$this->proyectos_model->ver_usuarios_asignados($id);
		$data['tareas']=$this->proyectos_model->ver_tareas_proyecto($id);
		$this->load->view('main',$data);
	}
	
	function guardar_bitacora()
	{
		date_default_timezone_set('America/Mexico_City');
		
		$form_data=array(
			'comentario'	=>	$this->input->post('comentario'),
			'fecha'			=>	date('Y-m-d H:i:s'),
			'id_usuario_fk'	=>	$this->session->userdata('user_id'),
			'id_proyecto_fk'	=>	$this->input->post('id_proyecto')
		);
		
		$this->proyectos_model->guardar_bitacora_proyecto($form_data);
		redirect('proyectos/ver_proyecto/'.$this->input->post('id_proyecto'));
	}
	
	function asignar_usuario()
	{
		date_default_timezone_set('America/Mexico_City');
		
		$form_usuarios[]=array(
				'id_usuario_fk'		=>	$this->input->post('usuario'),
				'id_proyecto_fk'	=>	$this->input->post('id_proyecto'),
				'fecha_insercion'	=>	date('Y-m-d H:i:s'),
				'permiso'			=>	'1'
		);
		
		$this->proyectos_model->guardar_usuarios($form_usuarios);
	}
	
	function desasignar_usuario($id,$id_proyecto)
	{
		$this->proyectos_model->desasignar_usuario($id,$id_proyecto);
		redirect('proyectos/ver_proyecto/'.$id_proyecto);
	}
	
	function crear_tarea_proyecto()
	{
		list($dia,$mes,$año)=explode('-',$this->input->post('fecha_inicio'));
		list($dia2,$mes2,$año2)=explode('-',$this->input->post('fecha_fin'));
		
		$form_data=array(
			'nombre'			=>	$this->input->post('nombre_tarea'),
			'descripcion'		=>	$this->input->post('descripcion_tarea'),
			'id_proyecto_fk'	=>	$this->input->post('proyecto'),
			'fecha_inicio'		=>	$año."-".$mes."-".$dia,
			'fecha_fin'			=>	$año2."-".$mes2."-".$dia2,
			'estatus'			=>	'0'
		);
		$id_tarea=$this->proyectos_model->crear_tarea_proyecto($form_data);
		$usuarios=$this->input->post('usuarios_tarea');
		if($id_tarea > 0)
		{
			for($i=0;$i<count($usuarios);$i++)
			{
				$form_usuarios[]=array(
					'id_usuario_fk'		=>	$usuarios[$i],
					'id_tarea_fk'		=>	$id_tarea,
				);
			}
			$this->proyectos_model->asignar_tareas($form_usuarios);
			redirect('proyectos/ver_proyecto/'.$this->input->post('proyecto'));
		}
		
	}
	
	
	
}
?>