<?php

class Bitacora extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('download');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('bitacora_model');
	}	
	function index()
	{			
		
	}
	
	function cliente($id)
	{
		date_default_timezone_set('America/Mexico_City');
		$this->form_validation->set_rules('comentario', 'Comentario', 'required');
		$this->form_validation->set_rules('fecha', 'Fecha Actividad', 'required');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$cliente=$this->bitacora_model->ver_cliente($id);
			$data['v']="bitacora_cliente";
			$data['tab']="bitacora";
			$data['titulo']="Bitacora de ".$cliente->nombre;
			$data['id_cliente']=$id;
			$data['bitacoras']=$this->bitacora_model->bitacora_cliente($id);
			$data['archivos']=$this->bitacora_model->ver_archivos($id);
			$this->load->view('main',$data);
		}
		else
		{
				list($dia,$mes,$año)=explode('-',set_value('fecha'));
				$form_data=array(
					'comentario'		=>	set_value('comentario'),
					'fecha'				=>	date('Y-m-d H:i:s'),
					'fecha_actividad'	=>	$año."-".$mes."-".$dia,
					'id_usuario'		=>	$this->session->userdata('user_id'),
					'id_cliente'		=>	$this->input->post('id_cliente'),
					'status'			=>	'1',
					'tipo'				=>	'1'
				);
				
				$this->bitacora_model->guardar_bitacora_cliente($form_data);
				redirect('bitacora/cliente/'.$id);
		}
	}
	
	function eliminar($id,$id_cliente)
	{
		$form_data=array(
			'status'	=>	'0'
		);
		$this->bitacora_model->editar_bitacora_cliente($form_data,$id);
		redirect('bitacora/cliente/'.$id_cliente);
	}
	
	function editar($id)
	{
		$data['v']="editar_bitacora_cliente";
		$data['datos']=$this->bitacora_model->info_bitacora($id);
		$this->load->view('main_modal',$data);
	}
	
	function guardar_edicion()
	{
		$form_data=array(
			'comentario'	=>	$this->input->post('comentario'),
		);
		$this->bitacora_model->editar_bitacora_cliente($form_data,$this->input->post('id_bitacora'));
		$this->load->view('cerrar_facybox');
	}
	
	function cambiar_fecha()
	{
		list($dia,$mes,$año)=explode("-",$this->input->post('fecha'));
		$form_data=array(
			'fecha_actividad'	=>	$año."-".$mes."-".$dia
		);
		
		$this->bitacora_model->editar_bitacora_cliente($form_data,$this->input->post('id_bitacora'));
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
				'id_cliente'	=>	$id
			);
			$this->bitacora_model->agregar_archivo($form_data);
			$form_bitacora=array(
				'comentario'		=>	'Se agrego el archivo <a href="'.site_url('bitacora/descargar/'.$_FILES["file"]["name"].'/'.$fileName).'">'.$_FILES["file"]["name"].'</a> al cliente.',
				'fecha'				=>	date('Y-m-d H:i:s'),
				'fecha_actividad'	=>	date('Y-m-d'),
				'id_usuario'		=>	$this->session->userdata('user_id'),
				'id_cliente'		=>	$id,
				'status'			=> '1',
				'tipo'				=> '2'
			);
			
			$this->bitacora_model->guardar_bitacora_cliente($form_bitacora);
        }
    }
	
	function descargar($archivo,$url)
	{
		$datos = file_get_contents("assets/upload/".$url); // Leer el contenido del archivo

		force_download($archivo, $datos);
	}
}
?>