<?php

class Tareas extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('download');
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('tareas_model');
	}	
	function index()
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$usuario=$this->tareas_model->ver_usuario($this->session->userdata('user_id'));
		$data['v']="tareas_cliente_view";
		$data['titulo']="Ver Tareas de ".($usuario->first_name)." ".$usuario->last_name;
		$data['usuario']=$this->session->userdata('user_id');
		$data['tareas_generales']=$this->tareas_model->todas_tarea_general();
		$data['tareas_proyectos']=$this->tareas_model->todas_tarea_proyectos();
		$data['tareas_clientes']=$this->tareas_model->todas_tarea_cliente();
		$data['usuarios_generales']=$this->tareas_model->usuarios_tarea_general();
		$data['usuarios_clientes']=$this->tareas_model->usuarios_tarea_cliente();
		$data['usuarios_proyectos']=$this->tareas_model->usuarios_tarea_proyecto();
		$this->load->view('main',$data);
	}
	
	function mis_tareas()
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$usuario=$this->tareas_model->ver_usuario($this->session->userdata('user_id'));
		$data['v']="tareas_view";
		$data['titulo']="Ver Tareas de ".($usuario->first_name)." ".$usuario->last_name;
		$data['usuario']=$this->session->userdata('user_id');
		$data['tareas_generales']=$this->tareas_model->ver_tarea_general($this->session->userdata('user_id'));
		$data['tareas_proyectos']=$this->tareas_model->ver_tarea_proyectos($this->session->userdata('user_id'));
		$data['tareas_clientes']=$this->tareas_model->ver_tarea_cliente($this->session->userdata('user_id'));
		$this->load->view('main',$data);
	}
	
	function nueva_tarea($id)
	{		
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$cliente=$this->tareas_model->ver_cliente($id);
		$data['v']="add_tarea";
		$data['titulo']="Crear Tarea de ".$cliente->nombre;
		$data['id_cliente']=$id;
		$data['usuarios']=$this->tareas_model->ver_usuarios();
		$this->load->view('main',$data);
	}	
	
	function agregar_tarea($id)
	{		
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$cliente=$this->tareas_model->ver_cliente($id);
		$data['v']="add_tarea_modal";
		$data['titulo']="Crear Tarea de ".$cliente->nombre;
		$data['id_cliente']=$id;
		$data['usuarios']=$this->tareas_model->ver_usuarios();
		$this->load->view('main_modal',$data);
	}	
	
	function guardar_tarea()
	{
		date_default_timezone_set('America/Mexico_City');
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
		
		$form_bitacora=array(
			'comentario'	=>	'Se ha creado la tarea cliente <a href="'.site_url('tareas/ver_tarea/'.$id_tarea).'">'.$this->input->post('nombre').'</a>',
			'fecha'			=>	date('Y-m-d H:i:s'),
			'fecha_actividad'	=>	date('Y-m-d'),
			'id_usuario'	=>	$this->session->userdata('user_id'),
			'id_cliente'	=>	$this->input->post('id_cliente'),
			'status'		=>	'1',
			'tipo'			=>	'2'
		);
		$this->tareas_model->guardar_bitacora_cliente($form_bitacora);
		
		redirect('proyectos/proyectos_tareas/'.$this->input->post('id_cliente'));
	}
	
	function guardar_tarea_modal()
	{
		date_default_timezone_set('America/Mexico_City');
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
		
		$form_bitacora=array(
			'comentario'	=>	'Se ha creado la tarea cliente <a href="'.site_url('tareas/ver_tarea/'.$id_tarea).'">'.$this->input->post('nombre').'</a>',
			'fecha'			=>	date('Y-m-d H:i:s'),
			'fecha_actividad'	=>	date('Y-m-d'),
			'id_usuario'	=>	$this->session->userdata('user_id'),
			'id_cliente'	=>	$this->input->post('id_cliente'),
			'status'		=>	'1',
			'tipo'			=>	'2'
		);
		$this->tareas_model->guardar_bitacora_cliente($form_bitacora);
		
		$this->load->view('cerrar_facybox');
	}
	
	function ver_tarea($id)
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$tarea=$this->tareas_model->ver_tarea($id);
		$cliente=$this->tareas_model->ver_cliente($tarea->id_cliente_fk);
		$data['v']="ver_tarea_cliente";
		$data['titulo']="Tarea ".$tarea->nombre;
		$data['descripcion']=$tarea->descripcion;
		$data['id_tarea']=$id;
		$data['status']=$tarea->estatus;
		$data['fecha_inicio']=$tarea->fecha_inicio;
		$data['fecha_fin']=$tarea->fecha_fin;
		$data['cliente']=$tarea->id_cliente_fk;
		$data['nombre_cliente']=$cliente->nombre;
		$data['bitacoras']=$this->tareas_model->bitacora_tareas_cliente($id);
		$data['usuarios']=$this->tareas_model->ver_usuarios_tarea($id);
		$data['asignados']=$this->tareas_model->ver_usuarios_asignados($id);
		$data['archivos']=$this->tareas_model->ver_archivos($id);
		$this->load->view('main',$data);
	}	
	
	function cliente($id)
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$cliente=$this->tareas_model->ver_cliente($id);
		$data['v']="tareas_vista_cliente";
		$data['id_cliente']=$id;
		$data['tab']="tarea_vista";
		$data['titulo']="Tareas de ".$cliente->nombre;
		$data['tareas']=$this->tareas_model->ver_tareas($id);
		$this->load->view('main',$data);
	}
	
	function guardar_bitacora()
	{
		date_default_timezone_set('America/Mexico_City');
		list($dia,$mes,$año)=explode("-",$this->input->post('fecha'));
		$form_data=array(
			'comentario'		=>	$this->input->post('comentario'),
			'fecha'				=>	date('Y-m-d H:i:s'),
			'fecha_actividad'	=>	$año."-".$mes."-".$dia,
			'id_usuario'		=>	$this->session->userdata('user_id'),
			'id_cliente_tarea'	=>	$this->input->post('id_tarea'),
			'status'		=> '1',
		);
		
		$this->tareas_model->guardar_bitacora_tarea($form_data);
		
		redirect('tareas/ver_tarea/'.$this->input->post('id_tarea'));
	}
	
	function asignar_usuario()
	{
		date_default_timezone_set('America/Mexico_City');
		
		$form_usuarios[]=array(
				'id_usuario_fk'		=>	$this->input->post('usuario'),
				'id_tarea_fk'	=>	$this->input->post('id_tarea'),
		);
		
		$this->tareas_model->guardar_usuarios($form_usuarios);
	}
	
	function desasignar_usuario($id,$id_tarea)
	{
		$this->tareas_model->desasignar_usuario($id,$id_tarea);
		redirect('tareas/ver_tarea/'.$id_tarea);
	}
	
	function upload($id) 
    {
		date_default_timezone_set('America/Mexico_City');
        if (!empty($_FILES)) {
			$nuevo_nombre=num_random(10);
			$temp = explode(".",$_FILES["file"]["name"]);    
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $nuevo_nombre.'.' .end($temp);
			$targetPath = 'assets/upload/';
			$targetFile = $targetPath . $fileName;
			move_uploaded_file($tempFile, $targetFile);
			chmod($targetFile,0644);
			
			$form_data=array(
				'archivo'		=>	$_FILES["file"]["name"],
				'url'			=>	$fileName,
				'id_tarea_fk'	=>	$id
			);
			$this->tareas_model->agregar_archivo($form_data);
			
			$form_bitacora=array(
				'comentario'	=>	'Se agrego el archivo <a href="'.site_url('proyectos/descargar/'.$_FILES["file"]["name"].'/'.$fileName).'">'.$_FILES["file"]["name"].'</a> a la tarea.',
				'fecha'			=>	date('Y-m-d H:i:s'),
				'fecha_actividad'	=>	date('Y-m-d'),
				'id_usuario'	=>	$this->session->userdata('user_id'),
				'id_cliente_tarea'	=>	$id,
				'status'		=> '1',
				'tipo'			=> '2'
			);
			
			$this->tareas_model->guardar_bitacora_tarea($form_bitacora);
        }
    }
	
	function descargar($archivo,$url)
	{
		$datos = file_get_contents("assets/upload/".$url); // Leer el contenido del archivo

		force_download($archivo, $datos);
	}
	
	function cerrar_tarea($id)
	{
		date_default_timezone_set('America/Mexico_City');
		
		$form_data=array(
			'estatus'	=>	'1'
		);
		$this->tareas_model->cerrar_tarea($form_data,$id);
		
		$tarea=$this->tareas_model->ver_tarea($id);
		
		$form_bitacora=array(
			'comentario'	=>	'Se ha cerrado la tarea <a href="'.site_url('tareas/ver_tarea/'.$id).'">'.($tarea->nombre).'</a>',
			'fecha_actividad'	=>	date('Y-m-d'),
			'fecha'			=>	date('Y-m-d H:i:s'),
			'id_usuario'	=>	$this->session->userdata('user_id'),
			'id_cliente'	=>	$tarea->id_cliente_fk,
			'status'		=>	'1',
			'tipo'			=>	'2'
		);
		$this->tareas_model->guardar_bitacora_cliente($form_bitacora);
		
		redirect('tareas/ver_tarea/'.$id);
	}
	
	function abrir_tarea($id)
	{
		date_default_timezone_set('America/Mexico_City');
		$form_data=array(
			'estatus'	=>	'0'
		);
		$this->tareas_model->cerrar_tarea($form_data,$id);
		
		$tarea=$this->tareas_model->ver_tarea($id);
		
		$form_bitacora=array(
			'comentario'	=>	'Se ha abierto la tarea <a href="'.site_url('tareas/ver_tarea/'.$id).'">'.($tarea->nombre).'</a>',
			'fecha_actividad'	=>	date('Y-m-d'),
			'fecha'			=>	date('Y-m-d H:i:s'),
			'id_usuario'	=>	$this->session->userdata('user_id'),
			'id_cliente'	=>	$tarea->id_cliente_fk,
			'status'		=>	'1',
			'tipo'			=>	'2'
		);
		$this->tareas_model->guardar_bitacora_cliente($form_bitacora);
		
		redirect('tareas/ver_tarea/'.$id);
	}
	
	function editar_bitacora_tareas($id)
	{
		$data['v']="editar_bitacora_tarea_cliente";
		$data['datos']=$this->tareas_model->info_bitacora_tarea_cliente($id);
		$this->load->view('main_modal',$data);
	}

	function guardar_edicion_bitacora_tareas()
	{
		$form_data=array(
			'comentario'	=>	$this->input->post('comentario'),
		);
		$this->tareas_model->editar_bitacora_tarea_cliente($form_data,$this->input->post('id_bitacora'));
		$this->load->view('cerrar_facybox');
	}
	
	function cambiar_fecha()
	{
		list($dia,$mes,$año)=explode("-",$this->input->post('fecha'));
		$form_data=array(
			'fecha_actividad'	=>	$año."-".$mes."-".$dia
		);
		$this->tareas_model->editar_bitacora_tarea_cliente($form_data,$this->input->post('id_bitacora'));
	}
	
	function cambiar_inicio_tarea()
	{
		list($dia,$mes,$año)=explode("-",$this->input->post('fecha'));
		$form_data=array(
			'fecha_inicio'	=>	$año."-".$mes."-".$dia
		);
		$this->tareas_model->editar_tarea($form_data,$this->input->post('id_tarea'));
	}
	
	function cambiar_fin_tarea()
	{
		list($dia,$mes,$año)=explode("-",$this->input->post('fecha'));
		$form_data=array(
			'fecha_fin'	=>	$año."-".$mes."-".$dia
		);
		$this->tareas_model->editar_tarea($form_data,$this->input->post('id_tarea'));
	}
	
	function eliminar_bitacora_tarea_cliente($id,$idtarea)
	{
		$form_data=array(
			'status'	=>	'0'
		);
		$this->tareas_model->editar_bitacora_tarea_cliente($form_data,$id);
		redirect('tareas/ver_tarea/'.$idtarea);
	}
	
	function editar_descripcion($id)
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		
		$this->form_validation->set_rules('descripcion', 'descripcion', 'required');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$tarea=$this->tareas_model->ver_tarea($id);
			$data['titulo']="Tarea ".$tarea->nombre;
			$data['v']="editar_descripcion_tarea";
			$data['id']=$id;
			$data['descripcion']=$tarea->descripcion;
			$this->load->view('main_modal',$data);
		}
		else // passed validation proceed to post success logic
		{
			echo "entra";
			$form_data = array(
				'descripcion' => set_value('descripcion')
			);
		
			$this->tareas_model->editar_tarea($form_data,$id);
			$this->load->view('cerrar_facybox');   // or whatever logic needs to occur
		}
	}
	
	function borrar_archivo($id)
	{
		date_default_timezone_set('America/Mexico_City');
		$archivo=$this->tareas_model->ver_archivo($id);
		$this->tareas_model->borrar_archivo($id);
		unlink('assets/upload/'.$archivo->url);
		
		$form_bitacora=array(
			'comentario'	=>	'Se elimino el archivo '.$archivo->archivo.' de la tarea.',
			'fecha'			=>	date('Y-m-d H:i:s'),
			'fecha_actividad'	=>	date('Y-m-d'),
			'id_usuario'	=>	$this->session->userdata('user_id'),
			'id_cliente_tarea'	=>	$archivo->id_tarea_fk,
			'status'		=> '1',
			'tipo'			=> '2'
		);
		
		$this->tareas_model->guardar_bitacora_tarea($form_bitacora);
		
		redirect('tareas/ver_tarea/'.$archivo->id_tarea_fk);
		
	}
}
?>