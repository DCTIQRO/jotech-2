<?php

class Proyectos_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function ver_clasificaciones()
	{
		$this->db->distinct();
		$this->db->select('clasificacion');
		$this->db->order_by("clasificacion", "asc");
		$results = $this->db->get('clientes_clasificaciones')->result();
		return $results;
	}
	
	function ver_tipos()
	{
		$this->db->select('id,tipo');
		$results = $this->db->get('tipo_proyectos')->result();
		return $results;
	}
	
	function ver_cliente($id)
	{
		$this->db->select('nombre');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes')->row();
		return $results;
	}
	
	function guardar_proyecto($form_data)
	{
		$this->db->insert('proyectos', $form_data); 
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	function guardar_etiquetas($form_data)
	{
		$this->db->insert_batch('proyectos_etiquetas', $form_data); 
	}
	
	function ver_proyectos($id)
	{
		$this->db->select('id,nombre,fecha_inicio,progreso');
		$this->db->where('id_cliente_fk',$id);
		$results = $this->db->get('proyectos')->result();
		return $results;
	}
	
	function ver_tareas($id)
	{
		$this->db->select('id,nombre,fecha_fin,estatus');
		$this->db->where('id_cliente_fk',$id);
		$results = $this->db->get('clientes_tareas')->result();
		return $results;
	}
}
?>