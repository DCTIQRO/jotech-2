<?php

class Recordatorios extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('recordatorios_model');
	}	
	function index()
	{			
		$data['v']="recordatorios_view";
		$data['recordatorios']=$this->recordatorios_model->ver_recordatorios($this->session->userdata('user_id'));
		$this->load->view('main',$data);
	}
	
	function guardar_recordatorio()
	{			
		date_default_timezone_set('America/Mexico_City');
		
		list($dia,$mes,$año)=explode("-",$this->input->post('fecha'));
		$form_data=array(
			'descripcion'	=>	$this->input->post('descripcion'),
			'Fecha'			=>	$año."-".$mes."-".$dia,
			'id_usuario'	=>	$this->session->userdata('user_id')
		);
		$this->recordatorios_model->guardar_recordatorio($form_data);
		redirect('recordatorios');
	}
	
	function eliminar_recordatorio($id)
	{
		$this->recordatorios_model->eliminar_recordatorio($id);
		redirect('recordatorios');
	}
	
	function editar_recordatorio($id)
	{
		$data['v']="editar_recordatorio";
		$data['recordatorio']=$this->recordatorios_model->info_recordatorios($id);
		$this->load->view('main_modal',$data);
	}
	
	function guardar_edicion()
	{
		date_default_timezone_set('America/Mexico_City');
		
		list($dia,$mes,$año)=explode("-",$this->input->post('fecha'));
		$form_data=array(
			'descripcion'	=>	$this->input->post('descripcion'),
			'Fecha'			=>	$año."-".$mes."-".$dia,
		);
		$this->recordatorios_model->guardar_edicion($form_data,$this->input->post('id_recordatorio'));
		$this->load->view('cerrar_facybox');
	}
}
?>