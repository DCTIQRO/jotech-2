<?php

class Proyectos extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('download');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('proyectos_model');
	}	
	function index()
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$data['v']="proyectos_view";
		$data['tab']="proyectos";
		$data['titulo']="Listado de Proyectos";
		$data['proyectos']=$this->proyectos_model->todos_proyectos();
		$data['clasificaciones']=$this->proyectos_model->todas_clasificacion_proyecto();
		$data['contactos']=$this->proyectos_model->todos_contactos_proyecto();
		$data['usuarios']=$this->proyectos_model->todos_usuarios_proyecto();
		$this->load->view('main',$data);
	}
	
	function nuevo_proyecto($id)
	{		
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$data['v']="add_proyecto";
		$cliente=$this->proyectos_model->ver_cliente($id);
		$data['clasificaciones']=$this->proyectos_model->clasificacion_cliente($id);
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
			'estatus' => '1',
			'fecha_inicio' => $año."-".$mes."-".$dia,
			'rango' => $this->input->post('rango'),
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
		if(!empty($clasi)){
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
			if(!empty($clasi)){
				$form_clasificacion=array(
					'id_clasificacion' => $clasi,
					'prioridad' 	=> $this->input->post('prioridad'.$i),
					'id_proyecto_fk' => $id_proyecto,
				);
				$this->proyectos_model->guardar_clasificacion($form_clasificacion);
			}
		}
			
		$usuarios=$this->input->post('usuarios');
		if(!empty($usuarios)){
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
		}		
		$form_bitacora=array(
			'comentario'		=>	'Se ha creado el proyecto <a href="'.site_url('proyectos/ver_proyecto/'.$id_proyecto).'">'.$this->input->post('nombre').'</a>',
			'fecha'				=>	date('Y-m-d H:i:s'),
			'fecha_actividad'	=>	date('Y-m-d'),
			'id_usuario'		=>	$this->session->userdata('user_id'),
			'id_cliente'		=>	$this->input->post('id_cliente'),
			'status'			=>	'1',
			'tipo'				=>	'2'
		);
		$this->proyectos_model->guardar_bitacora_cliente($form_bitacora);
		
		redirect('proyectos/cliente/'.$this->input->post('id_cliente'));
	}
	
	function proyectos_tareas($id)
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$cliente=$this->proyectos_model->ver_cliente($id);
		$data['v']="proyectos_tareas";
		$data['id_cliente']=$id;
		$data['tab']="proyec_tarea";
		$data['titulo']="Proyectos y Tareas de ".$cliente->nombre;
		$data['etiquetas']=$this->proyectos_model->todas_etiquetas_proyecto();
		$data['proyectos']=$this->proyectos_model->ver_proyectos($id);
		$data['tareas']=$this->proyectos_model->ver_tareas($id);
		$this->load->view('main',$data);
	}
	
	function cliente($id)
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$cliente=$this->proyectos_model->ver_cliente($id);
		$data['v']="proyectos_tareas";
		$data['id_cliente']=$id;
		$data['tab']="proyec_tarea";
		$data['titulo']="Proyectos y Tareas de ".$cliente->nombre;
		$data['proyectos']=$this->proyectos_model->ver_proyectos($id);
		$data['clasificaciones']=$this->proyectos_model->todas_clasificacion_proyecto();
		$data['etiquetas']=$this->proyectos_model->todas_etiquetas_proyecto();
		$data['usuarios']=$this->proyectos_model->todos_usuarios_proyecto();
		$data['tareas']=$this->proyectos_model->ver_tareas($id);
		$this->load->view('main',$data);
	}
	
	function ver_proyecto($id)
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		$proyecto=$this->proyectos_model->ver_proyecto($id);
		$cliente=$this->proyectos_model->ver_cliente($proyecto->id_cliente_fk);
		$data['v']="ver_proyecto";
		$data['tab']="proyectos";
		$data['id_proyecto']=$id;
		$data['datos_cliente']=$cliente;
		$data['titulo']="Proyecto ".$proyecto->nombre;
		$data['status']=$proyecto->estatus;
		$data['avisador']=$proyecto->avisador;
		$data['divisor']=$proyecto->divisor;
		$data['cliente']=$proyecto->id_cliente_fk;
		$data['descripcion']="Proyecto ".$proyecto->descripcion;
		$data['clasificaciones']=$this->proyectos_model->ver_proyecto_clasificacion($id);
		$data['bitacoras']=$this->proyectos_model->bitacora_proyecto($id);
		$data['usuarios']=$this->proyectos_model->ver_usuarios_proyectos($id);
		$data['contactos']=$this->proyectos_model->ver_contactos_proyectos($id,$proyecto->id_cliente_fk);
		$data['contactos_all']=$this->proyectos_model->ver_contactos_proyectos_allclas($id,$proyecto->id_cliente_fk);
		$data['asignados']=$this->proyectos_model->ver_usuarios_asignados($id);
		$data['asignados_contactos']=$this->proyectos_model->ver_contactos_asignados($id);
		$data['tareas']=$this->proyectos_model->ver_tareas_proyecto($id);
		$data['archivos']=$this->proyectos_model->ver_archivos($id);
		$this->load->view('main',$data);
	}
	
	function ver_descripcion($id)
	{
		$proyecto=$this->proyectos_model->ver_proyecto($id);
		
		$data['v']="ver_descripcion_proyecto";
		$data['titulo']="Proyecto ".$proyecto->nombre;
		$data['descripcion']=$proyecto->descripcion;
		$data['clasificaciones']=$this->proyectos_model->ver_proyecto_clasificacion($id);
		
		$this->load->view('main_modal',$data);
	}
	
	function ver_usuarios_asignados($id)
	{
		$proyecto=$this->proyectos_model->ver_proyecto($id);
		
		$data['v']="ver_usuarios_proyectos";
		$data['titulo']="Proyecto ".$proyecto->nombre;
		$data['usuarios']=$this->proyectos_model->ver_usuarios_asignados($id);
		
		$this->load->view('main_modal',$data);
	}
	
	function ver_contactos_proyectos($id)
	{
		$proyecto=$this->proyectos_model->ver_proyecto($id);
		
		$data['v']="ver_contactos_proyectos";
		$data['titulo']="Proyecto ".$proyecto->nombre;
		$data['contactos']=$this->proyectos_model->ver_contactos_asignados($id);
		
		$this->load->view('main_modal',$data);
	}
	
	function editar_descripcion($id)
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		
		$this->form_validation->set_rules('descripcion', 'descripcion', 'required');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$proyecto=$this->proyectos_model->ver_proyecto($id);
			$data['titulo']="Proyecto ".$proyecto->nombre;
			$data['v']="editar_descripcion_proyecto";
			$data['tab']="proyectos";
			$data['id']=$id;
			$data['descripcion']=$proyecto->descripcion;
			$this->load->view('main_modal',$data);
		}
		else // passed validation proceed to post success logic
		{
			echo "entra";
			$form_data = array(
				'descripcion' => set_value('descripcion')
			);
		
			$this->proyectos_model->editar_proyecto($form_data,$id);
			$this->load->view('cerrar_facybox');   // or whatever logic needs to occur
		}
	}
	
	function editar_clasificaciones($id)
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		
		$proyecto=$this->proyectos_model->ver_proyecto($id);
		$data['titulo']="Proyecto ".$proyecto->nombre;
		$data['v']="editar_clasificacion_proyecto";
		$data['tab']="proyectos";
		$data['id']=$id;
		$data['clasificaciones']=$this->proyectos_model->clasificacion_cliente($proyecto->id_cliente_fk);
		$data['clasificaciones_asignadas']=$this->proyectos_model->ver_proyecto_clasificacion($id);
		$this->load->view('main_modal',$data);
	}
	
	function guardar_edicion_clasificaciones($id) {
		$num=$this->input->post('numero_clas');
		
		$this->proyectos_model->borrar_clasificacion($id);
			
		for($i=1;$i<=$num;$i++)
		{
			$clasi=$this->input->post('clasificacion'.$i);
			if(!empty($clasi)){
				if($clasi != '0'){
					$form_clasificacion=array(
						'id_clasificacion' => $clasi,
						'prioridad' 	=> $this->input->post('prioridad'.$i),
						'id_proyecto_fk' => $id,
					);
					$this->proyectos_model->guardar_clasificacion($form_clasificacion);
				}
			}
		}
		
		$this->load->view('cerrar_facybox'); 
	}
	
	function cambiar_inicio_tarea()
	{
		list($dia,$mes,$año)=explode('-',$this->input->post('fecha'));
		$form_data=array(
			'fecha_inicio'	=>	$año."-".$mes."-".$dia
		);
		print_r($form_data);
		$this->proyectos_model->editar_tarea_proyecto($form_data,$this->input->post('id_tarea'));
	}
	
	function cambiar_fin_tarea()
	{
		list($dia,$mes,$año)=explode('-',$this->input->post('fecha'));
		$form_data=array(
			'fecha_fin'	=>	$año."-".$mes."-".$dia
		);
		print_r($form_data);
		$this->proyectos_model->editar_tarea_proyecto($form_data,$this->input->post('id_tarea'));
	}
	
	function guardar_bitacora()
	{
		date_default_timezone_set('America/Mexico_City');
		
		list($dia,$mes,$año)=explode("-",$this->input->post('fecha'));
		
		$form_data=array(
			'comentario'	=>	$this->input->post('comentario'),
			'fecha'			=>	date('Y-m-d H:i:s'),
			'fecha_actividad'	=>	$año."-".$mes."-".$dia,
			'id_usuario_fk'	=>	$this->session->userdata('user_id'),
			'id_proyecto_fk'	=>	$this->input->post('id_proyecto'),
			'status'		=> '1',
			'tipo'			=> '1'
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
	
	function asignar_contacto()
	{
		date_default_timezone_set('America/Mexico_City');
		
		$form_usuarios[]=array(
				'id_miembro_fk'		=>	$this->input->post('usuario'),
				'id_proyecto_fk'	=>	$this->input->post('id_proyecto'),
				'fecha_insercion'	=>	date('Y-m-d H:i:s'),
		);
		
		$this->proyectos_model->guardar_contactos($form_usuarios);
	}
	
	function desasignar_usuario($id,$id_proyecto)
	{
		$this->proyectos_model->desasignar_usuario($id,$id_proyecto);
		redirect('proyectos/ver_proyecto/'.$id_proyecto);
	}
	
	function desasignar_contacto($id,$id_proyecto)
	{
		$this->proyectos_model->desasignar_contacto($id,$id_proyecto);
		redirect('proyectos/ver_proyecto/'.$id_proyecto);
	}
	
	function crear_tarea_proyecto()
	{
		date_default_timezone_set('America/Mexico_City');

		list($dia,$mes,$año)=explode('/',$this->input->post('fecha_inicio'));
		list($dia2,$mes2,$año2)=explode('/',$this->input->post('fecha_fin'));
		
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
			
			$form_bitacora=array(
				'comentario'		=>	'Se ha creado la Tarea <a href="'.site_url('tareas_proyectos/ver_tarea/'.$id_tarea).'">'.$this->input->post('nombre_tarea').'</a>',
				'fecha'				=>	date('Y-m-d H:i:s'),
				'fecha_actividad'	=>	date('Y-m-d'),
				'id_usuario_fk'		=>	$this->session->userdata('user_id'),
				'id_proyecto_fk'	=>	$this->input->post('proyecto'),
				'status'			=> '1',
				'tipo'				=> '2'
			);
			$this->proyectos_model->guardar_bitacora_proyecto($form_bitacora);
			
			redirect('proyectos/ver_proyecto/'.$this->input->post('proyecto'));
		}
		
	}
	
	function cerrar_proyecto($id)
	{
		date_default_timezone_set('America/Mexico_City');
		$fecha=date('Y-m-d');
		$form_data=array(
			'estatus'	=>	'0',
			'fecha_entrega' => $fecha
		);
		$this->proyectos_model->cerrar_proyecto($form_data,$id);
		
		$proyecto=$this->proyectos_model->ver_proyecto($id);
		
		$form_bitacora=array(
			'comentario'		=>	'Se ha cerrado el proyecto <a href="'.site_url('proyectos/ver_proyecto/'.$id).'">'.($proyecto->nombre).'</a>',
			'fecha'				=>	date('Y-m-d H:i:s'),
			'fecha_actividad'	=>	date('Y-m-d'),
			'id_usuario'		=>	$this->session->userdata('user_id'),
			'id_cliente'		=>	$proyecto->id_cliente_fk,
			'status'			=>	'1',
			'tipo'				=>	'2'
		);
		$this->proyectos_model->guardar_bitacora_cliente($form_bitacora);
		redirect('proyectos/ver_proyecto/'.$id);
	}
	
	function abrir_proyecto($id)
	{
		date_default_timezone_set('America/Mexico_City');
		$form_data=array(
			'estatus'	=>	'1',
			'fecha_entrega' => '0000-00-00'
		);
		$this->proyectos_model->cerrar_proyecto($form_data,$id);
		
		$proyecto=$this->proyectos_model->ver_proyecto($id);
		
		$form_bitacora=array(
			'comentario'		=>	'Se ha abierto el proyecto <a href="'.site_url('proyectos/ver_proyecto/'.$id).'">'.($proyecto->nombre).'</a>',
			'fecha'				=>	date('Y-m-d H:i:s'),
			'fecha_actividad'	=>	date('Y-m-d'),
			'id_usuario'		=>	$this->session->userdata('user_id'),
			'id_cliente'		=>	$proyecto->id_cliente_fk,
			'status'			=>	'1',
			'tipo'				=>	'2'
		);
		$this->proyectos_model->guardar_bitacora_cliente($form_bitacora);
		
		redirect('proyectos/ver_proyecto/'.$id);
	}
	
	function cambiar_estado_tarea($id)
	{
		date_default_timezone_set('America/Mexico_City');
		$tarea=$this->proyectos_model->ver_tarea($id);
		$estado=$tarea->estatus;
		
		if($estado == '0')
		{
			$form_data=array(
				'estatus'	=>	'1'
			);
		
			$form_bitacora=array(
				'comentario'		=>	'Se ha cerrado la Tarea <a href="'.site_url('tareas_proyectos/ver_tarea/'.$id).'">'.($tarea->nombre).'</a>',
				'fecha'				=>	date('Y-m-d H:i:s'),
				'fecha_actividad'	=>	date('Y-m-d'),
				'id_usuario_fk'		=>	$this->session->userdata('user_id'),
				'id_proyecto_fk'	=>	$tarea->id_proyecto_fk,
				'status'			=> '1',
				'tipo'				=> '2'
			);
			
		}
		else
		{
			$form_data=array(
				'estatus'	=>	'0'
			);
			$form_bitacora=array(
				'comentario'		=>	'Se ha abierto la Tarea <a href="'.site_url('tareas_proyectos/ver_tarea/'.$id).'">'.($tarea->nombre).'</a>',
				'fecha'				=>	date('Y-m-d H:i:s'),
				'fecha_actividad'	=>	date('Y-m-d'),
				'id_usuario_fk'		=>	$this->session->userdata('user_id'),
				'id_proyecto_fk'	=>	$tarea->id_proyecto_fk,
				'status'			=> '1',
				'tipo'				=> '2'
			);
		}
		$this->proyectos_model->cambiar_estado_tarea($form_data,$id);
		$this->proyectos_model->guardar_bitacora_proyecto($form_bitacora);
	}
	
	function editar_bitacora_proyecto($id)
	{
		$data['v']="editar_bitacora_proyecto";
		$data['datos']=$this->proyectos_model->info_bitacora_proyecto($id);
		$this->load->view('main_modal',$data);
	}

	function guardar_edicion_bitacora_proyecto()
	{
		$form_data=array(
			'comentario'	=>	$this->input->post('comentario'),
		);
		$this->proyectos_model->editar_bitacora_proyecto($form_data,$this->input->post('id_bitacora'));
		$this->load->view('cerrar_facybox');
	}
	
	function cambiar_fecha()
	{
		list($dia,$mes,$año)=explode("-",$this->input->post('fecha'));
		$form_data=array(
			'fecha_actividad'	=>	$año."-".$mes."-".$dia
		);
		$this->proyectos_model->editar_bitacora_proyecto($form_data,$this->input->post('id_bitacora'));
	}
	
	function eliminar_bitacora_proyecto($id,$id_proyecto)
	{
		$form_data=array(
			'status'	=>	'0'
		);
		$this->proyectos_model->editar_bitacora_proyecto($form_data,$id);
		redirect('proyectos/ver_proyecto/'.$id_proyecto);
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
				'id_proyecto'	=>	$id
			);
			$this->proyectos_model->agregar_archivo($form_data);
			$form_bitacora=array(
				'comentario'	=>	'Se agrego el archivo <a href="'.site_url('proyectos/descargar/'.$_FILES["file"]["name"].'/'.$fileName).'">'.$_FILES["file"]["name"].'</a> al proyecto.',
				'fecha'			=>	date('Y-m-d H:i:s'),
				'fecha_actividad'	=>	date('Y-m-d'),
				'id_usuario_fk'	=>	$this->session->userdata('user_id'),
				'id_proyecto_fk'	=>	$id,
				'status'		=> '1',
				'tipo'			=> '2'
			);
			
			$this->proyectos_model->guardar_bitacora_proyecto($form_bitacora);
        }
    }
	
	function descargar($archivo,$url)
	{
		$datos = file_get_contents("assets/upload/".$url); // Leer el contenido del archivo

		force_download($archivo, $datos);
	}
	
	function borrar_archivo($id)
	{
		date_default_timezone_set('America/Mexico_City');
		$archivo=$this->proyectos_model->ver_archivo($id);
		$this->proyectos_model->borrar_archivo($id);
		unlink('assets/upload/'.$archivo->url);
		
		$form_bitacora=array(
			'comentario'	=>	'Se elimino el archivo '.($archivo->archivo).' del proyecto.',
			'fecha'			=>	date('Y-m-d H:i:s'),
			'fecha_actividad'	=>	date('Y-m-d'),
			'id_usuario_fk'	=>	$this->session->userdata('user_id'),
			'id_proyecto_fk'	=>	$archivo->id_proyecto,
			'status'		=> '1',
			'tipo'			=> '2'
		);
		
		$this->proyectos_model->guardar_bitacora_proyecto($form_bitacora);
		
		redirect('proyectos/ver_proyecto/'.$archivo->id_proyecto);
		
	}
	
	function divisor($id)
	{
		$form_data = array(
			'divisor' => $this->input->post('divisor')
		);
	
		$this->proyectos_model->editar_proyecto($form_data,$id);
		echo $this->input->post('divisor');
	}
	
	function avisador($id)
	{
		$form_data = array(
			'avisador' => $this->input->post('avisor')
		);
	
		$this->proyectos_model->editar_proyecto($form_data,$id);
		
		echo $this->input->post('avisor');
	}
	
}
?>