<?php

class Tareas_proyectos extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('download');
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('tareas_proyectos_model');
	}	
	function index()
	{			
		
	}
	
	function ver_tarea($id)
	{			
		$tarea=$this->tareas_proyectos_model->ver_tarea($id);
		$data['v']="ver_tarea_proyecto";
		$data['titulo']="Tarea ".$tarea->nombre;
		$data['descripcion']=$tarea->descripcion;
		$data['id_tarea']=$id;
		$data['bitacoras']=$this->tareas_proyectos_model->bitacora_tareas_proyecto($id);
		$data['usuarios']=$this->tareas_proyectos_model->ver_usuarios_tarea($id);
		$data['asignados']=$this->tareas_proyectos_model->ver_usuarios_asignados($id);
		$data['archivos']=$this->tareas_proyectos_model->ver_archivos($id);
		$this->load->view('main',$data);
	}	
	
	function guardar_bitacora()
	{
		date_default_timezone_set('America/Mexico_City');
		
		$form_data=array(
			'comentario'		=>	$this->input->post('comentario'),
			'fecha'				=>	date('Y-m-d H:i:s'),
			'id_usuario'		=>	$this->session->userdata('user_id'),
			'id_proyecto_tarea_fk'	=>	$this->input->post('id_tarea')
		);
		
		$this->tareas_proyectos_model->guardar_bitacora_tarea($form_data);
		redirect('tareas_proyectos/ver_tarea/'.$this->input->post('id_tarea'));
	}
	
	function asignar_usuario()
	{
		
		$form_usuarios[]=array(
				'id_usuario_fk'		=>	$this->input->post('usuario'),
				'id_tarea_fk'	=>	$this->input->post('id_tarea'),
		);
		
		$this->tareas_proyectos_model->guardar_usuarios($form_usuarios);
	}
	
	function desasignar_usuario($id,$id_tarea)
	{
		$this->tareas_proyectos_model->desasignar_usuario($id,$id_tarea);
		redirect('tareas_proyectos/ver_tarea/'.$id_tarea);
	}
	
	function upload($id) 
    {
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
			$this->tareas_proyectos_model->agregar_archivo($form_data);
        }
    }
	
	function descargar($archivo,$url)
	{
		$datos = file_get_contents("assets/upload/".$url); // Leer el contenido del archivo

		force_download($archivo, $datos);
	}
}
?>