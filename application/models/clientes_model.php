<?php

class Clientes_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function ver_clientes()
	{
		$this->db->select('id,nombre,website,correo,telefono,pais,calle,numero,entre_calles,colonia,ciudad,estado,detalles,fecha_registro ');
		$this->db->where('status','1');
		$results = $this->db->get('clientes')->result();
		return $results;
	}
	
	function ver_cliente($id)
	{
		$this->db->select('nombre');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes')->row();
		return $results;
	}
	
	function ver_clasificaciones()
	{
		$this->db->select('id,nombre');
		$results = $this->db->get('clasificacion_clientes')->result();
		return $results;
	}
	
	function guardar_cliente($form_data)
	{
		$this->db->insert('clientes', $form_data); 
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	function guardar_clasificacion($form_data)
	{
		$this->db->insert('clientes_clasificaciones', $form_data);
	}
	
	function info_cliente($id)
	{
		$this->db->select('id,nombre,website,correo,telefono,pais,calle,numero,entre_calles,colonia,ciudad,estado,detalles,fecha_registro ');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes')->row();
		return $results;
	}
	
	function info_clasificacion($id)
	{
		$this->db->select('clasificacion,prioridad');
		$this->db->where('id_cliente_fk',$id);
		$results = $this->db->get('clientes_clasificaciones')->result();
		return $results;
	}
	
	function actualizar_cliente($id,$form_data)
	{
		$this->db->where('id',$id);
		$this->db->update('clientes',$form_data);
	}
	
	function borrar_clasificacion($id)
	{
		$this->db->where('id_cliente_fk',$id);
		$this->db->delete('clientes_clasificaciones');
	}
	
	function ver_contactos($id)
	{
		$this->db->select('m.id,m.nombre,m.telefono,m.correo,m.puesto,m.id_clasificacion,clas.nombre clasiff');
		$this->db->join('clasificacion_clientes clas','clas.id=m.id_clasificacion', 'left');
		$this->db->where('id_cliente_fk',$id);
		$results = $this->db->get('miembros m')->result();
		return $results;
	}
	
	function clasificacion_cliente($id)
	{
		$this->db->distinct();
		$this->db->where('cc.id_cliente_fk',$id);
		$this->db->select('clas.id,cc.clasificacion,clas.nombre');
		$this->db->join('clasificacion_clientes clas','clas.id=cc.clasificacion');
		$results = $this->db->get('clientes_clasificaciones cc')->result();
		return $results;
	}
	
	function guardar_contacto($form_data)
	{
		$this->db->insert('miembros', $form_data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	function guardar_clasificacion_contacto($form_data)
	{
		$this->db->insert('miembros_clasificaciones', $form_data);
	}
}
?>