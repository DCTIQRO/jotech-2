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
			'comentarios' => $this->input->post('comentario'),
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
			if(!empty($clasi)){
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
				if(!empty($clasi)){
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
		$data['clasificaciones_cliente']=$this->clientes_model->info_clasificacion($id);
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
			'comentarios' => $this->input->post('comentario'),
			'colonia' => $this->input->post('colonia'),
			'entre_calles' => $this->input->post('referencia'),
			'ciudad' => $this->input->post('ciudad'),
			'estado' => $this->input->post('estado'),
			'pais' => $this->input->post('pais'),
			'detalles' => $this->input->post('detalles'),
			'ciudad' => $this->input->post('ciudad'),
		);
		
		$this->clientes_model->actualizar_cliente($id,$form_data);
		
		$num=$this->input->post('numero_clas');
		
		$this->clientes_model->borrar_clasificacion($id);
			
		for($i=1;$i<=$num;$i++)
		{
			$clasi=$this->input->post('clasificacion'.$i);
			if(!empty($clasi)){
				if($clasi != '0'){
					$form_clasificacion=array(
						'clasificacion' => $clasi,
						'prioridad' 	=> $this->input->post('prioridad'.$i),
						'id_cliente_fk' => $id,
					);
					$this->clientes_model->guardar_clasificacion($form_clasificacion);
				}
			}
		}
		
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
		$data['clasificaciones']=$this->clientes_model->ver_clasificaciones_contactos();
		$this->load->view('main',$data);
	}
	
	function nuevo_contacto($id)
	{
		$cliente=$this->clientes_model->ver_cliente($id);
		$data['v']="new_contacto";
		$data['tab']="contacto";
		$data['titulo']="Nuevo Contacto de ".$cliente->nombre;
		$data['id_cliente']=$id;
		$data['clasificaciones']=$this->clientes_model->clasificacion_cliente($id);
		$this->load->view('main',$data);
	}
	
	function guardar_contacto()
	{
		date_default_timezone_set('America/Mexico_City');
		$form_data=array(
			'nombre'			=>	$this->input->post('nombre'),
			'puesto'			=>	$this->input->post('puesto'),
			'telefono'			=>	$this->input->post('telefono'),
			'direccion'			=>	$this->input->post('direccion'),
			'correo'			=>	$this->input->post('correo'),
			'activo'			=>	$this->input->post('activo'),
			'activo2'			=>	$this->input->post('activo2'),
			'comentarios'			=>	$this->input->post('comentario'),
			'id_cliente_fk'		=>	$this->input->post('id_cliente'),
			'fecha_registro'	=>	date('Y-m-d'),
		);
		$id_contacto=$this->clientes_model->guardar_contacto($form_data);
		if($id_contacto>0)
		{
			$clasi=$this->input->post('clasificacion');
			
			for($i=0;$i<count($clasi);$i++)
			{
					$form_clasificacion=array(
						'clasificacion' => $clasi[$i],
						'id_miembro_fk' => $id_contacto,
					);
					$this->clientes_model->guardar_clasificacion_contacto($form_clasificacion);
			}
		}
		redirect('clientes/contacto/'.$this->input->post('id_cliente'));
	}
	
	function editar_contacto($id,$id_cliente)
	{
		$data['v']="editar_contacto";
		$data['datos']=$this->clientes_model->info_contacto($id);
		$data['clasificaciones']=$this->clientes_model->clasificacion_cliente($id_cliente);
		$data['clasificaciones_contacto']=$this->clientes_model->info_clasificaciones_contacto($id);
		$this->load->view('main_modal',$data);
	}
	
	function guardar_edicion_contacto()
	{
		$form_data=array(
			'nombre'			=>	$this->input->post('nombre'),
			'puesto'			=>	$this->input->post('puesto'),
			'telefono'			=>	$this->input->post('telefono'),
			'direccion'			=>	$this->input->post('direccion'),
			'correo'			=>	$this->input->post('correo'),
			'activo'			=>	$this->input->post('activo'),
			'activo2'			=>	$this->input->post('activo2'),
			'comentarios'			=>	$this->input->post('comentario'),
		);
		
		$id_contacto=$this->input->post('id_contacto');
		$this->clientes_model->editar_contacto($form_data,$id_contacto);
		$this->clientes_model->borrar_clasificacion_contacto($id_contacto);
		
		$clasi=$this->input->post('clasificacion');
		
		for($i=0;$i<count($clasi);$i++)
		{
				$form_clasificacion=array(
					'clasificacion' => $clasi[$i],
					'id_miembro_fk' => $id_contacto,
				);
				$this->clientes_model->guardar_clasificacion_contacto($form_clasificacion);
		}
		$this->load->view('cerrar_facybox');
	}
	
	function eliminar_contacto($id,$id_cliente)
	{
		$form_data=array(
			'status'	=>	'0',
		);
		$this->clientes_model->editar_contacto($form_data,$id);
		redirect('clientes/contacto/'.$id_cliente);
	}
}
?>