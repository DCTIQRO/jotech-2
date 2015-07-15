<?php

class Bitacora extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
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
		$this->form_validation->set_rules('comentario', 'comentario', 'required');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$cliente=$this->bitacora_model->ver_cliente($id);
			$data['v']="bitacora_cliente";
			$data['tab']="bitacora";
			$data['titulo']="Bitacora de ".$cliente->nombre;
			$data['id_cliente']=$id;
			$data['bitacoras']=$this->bitacora_model->bitacora_cliente($id);
			$this->load->view('main',$data);
		}
		else
		{
				$form_data=array(
					'comentario'	=>	set_value('comentario'),
					'fecha'			=>	date('Y-m-d H:i:s'),
					'id_usuario'	=>	$this->session->userdata('user_id'),
					'id_cliente'	=>	$this->input->post('id_cliente'),
					'status'		=>	'1'
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
}
?>