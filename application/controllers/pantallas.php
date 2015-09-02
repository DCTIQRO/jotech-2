<?php

class Pantallas extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('pantallas_model');
	}	
	function index()
	{
		$login=$this->session->userdata('user_id');
		if(empty($login)){redirect('auth/login');}
		
		$usuarios=$this->pantallas_model->ver_usuarios();
		foreach($usuarios as $usuario)
		{
			if($this->pantallas_model->verificar_pantalla($usuario->id) == FALSE)
			{
				$form_data=array(
					'user_id'	=>	$usuario->id
				);
				$this->pantallas_model->agregar_usuario_pantalla($form_data);
			}
		}
		$data['usuarios']=$usuarios;
		$data['pantallas']=$this->pantallas_model->ver_pantallas();
		$data['v']="pantallas_view";
		$this->load->view('main',$data);
	}
	
	function cambiar_status()
	{
		$form_data=array(
			$this->input->post('pantalla')	=>	$this->input->post('seleccion')
		);
		
		$this->pantallas_model->editar_pantalla($form_data,$this->input->post('id_usuario'));
	}
	
}
?>