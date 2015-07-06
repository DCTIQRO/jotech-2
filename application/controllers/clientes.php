<?php

class Clientes extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('clientes_model');
	}	
	function index()
	{			
		$data['v']="clientes_view";
		$data['clientes']=$this->clientes_model->ver_clientes();
		$this->load->view('main',$data);
	}
	
	function nuevo_cliente()
	{			
		$data['v']="add_cliente";
		$data['clasificaciones']=$this->clientes_model->ver_clasificaciones();
		$this->load->view('main',$data);
	}
	
	function guardar_cliente()
	{
		date_default_timezone_set('America/Mexico_City');
		$form_data=array(
			'nombre' => $this->input->post('nombre'),
			'website' => $this->input->post('web'),
			'correo' => $this->input->post('correo'),
			'telefono' => $this->input->post('telefono'),
			'calle' => $this->input->post('calle'),
			'numero' => $this->input->post('numero'),
			'colonia' => $this->input->post('colonia'),
			'entre_calles' => $this->input->post('referencia'),
			'ciudad' => $this->input->post('ciudad'),
			'estado' => $this->input->post('estado'),
			'pais' => $this->input->post('pais'),
			'detalles' => $this->input->post('detalles'),
			'ciudad' => $this->input->post('ciudad'),
			'fecha_registro' => date('Y-m-d'),
		);

		$id_cliente=$this->clientes_model->guardar_cliente($form_data);
		
		if($id_cliente>0)
		{
			$clasi=$this->input->post('clasificacion');
			if($clasi != '0'){
				$form_clasificacion=array(
					'clasificacion' => $clasi,
					'prioridad' 	=> $this->input->post('prioridad'),
					'id_cliente_fk' => $id_cliente,
				);
				$this->clientes_model->guardar_clasificacion($form_clasificacion);
			}
			
			$num=$this->input->post('numero_clas');
			
			for($i=1;$i<=$num;$i++)
			{
				$clasi=$this->input->post('clasificacion'.$i);
				if($clasi != '0'){
					$form_clasificacion=array(
						'clasificacion' => $clasi,
						'prioridad' 	=> $this->input->post('prioridad'.$i),
						'id_cliente_fk' => $id_cliente,
					);
					$this->clientes_model->guardar_clasificacion($form_clasificacion);
				}
			}
		}
		
		redirect('clientes');
	}
	
	function ver($id)
	{
		$cliente=$this->clientes_model->ver_cliente($id);
		$data['v']="ver_cliente";
		$data['datos']=$this->clientes_model->info_cliente($id);
		$data['clasificacion']=$this->clientes_model->info_clasificacion($id);
		$data['clasificaciones']=$this->clientes_model->ver_clasificaciones();
		$data['tab']="detalles";
		$data['titulo']="Información del Cliente ".$cliente->nombre;
		$data['id_cliente']=$id;
		$this->load->view('main',$data);
	}
	
	function actualizar($id)
	{
		$form_data=array(
			'nombre' => $this->input->post('nombre'),
			'website' => $this->input->post('web'),
			'correo' => $this->input->post('correo'),
			'telefono' => $this->input->post('telefono'),
			'calle' => $this->input->post('calle'),
			'numero' => $this->input->post('numero'),
			'colonia' => $this->input->post('colonia'),
			'entre_calles' => $this->input->post('referencia'),
			'ciudad' => $this->input->post('ciudad'),
			'estado' => $this->input->post('estado'),
			'pais' => $this->input->post('pais'),
			'detalles' => $this->input->post('detalles'),
			'ciudad' => $this->input->post('ciudad'),
		);
		
		$this->clientes_model->actualizar_cliente($id,$form_data);
		$cl=$this->input->post('clasificacion');
		echo $cl;
		if($cl == '0'){$cl=$this->input->post('new_clas');}
		
		$form_clasificacion=array(
				'clasificacion' => $cl,
				'prioridad' 	=> $this->input->post('prioridad'),
		);
		print_r($form_clasificacion);
		$this->clientes_model->actualizar_clasificacion($id,$form_clasificacion);
		redirect('clientes/ver/'.$id);
	}
	
	function contacto($id)
	{
		$cliente=$this->clientes_model->ver_cliente($id);
		$data['v']="contacto";
		$data['tab']="contacto";
		$data['titulo']="Contactos de ".$cliente->nombre;
		$data['id_cliente']=$id;
		$data['contactos']=$this->clientes_model->ver_contactos($id);
		$this->load->view('main',$data);
	}
}
?>