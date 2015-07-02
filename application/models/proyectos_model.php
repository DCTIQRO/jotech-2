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
}
?>