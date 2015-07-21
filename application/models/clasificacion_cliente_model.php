<?php

class Clasificacion_cliente_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function ver_clasificaciones()
	{
		$this->db->select('id,nombre,descripcion');
		$this->db->where('status','1');
		$results = $this->db->get('clasificacion_clientes')->result();
		return $results;
	}
	
	function contar_clasificaciones()
	{
		$this->db->where('status','1');
		$this->db->select('COUNT(*) as total');
		$results = $this->db->get('clasificacion_clientes')->result();
		return $results;
	}
	
	function info_clasificacion($id)
	{
		$this->db->select('id,nombre,descripcion');
		$this->db->where('id',$id);
		$results = $this->db->get('clasificacion_clientes')->row();
		return $results;
	}
	
	function agregar_clasificacion($form_data)
	{
		$this->db->insert('clasificacion_clientes',$form_data);
	}
	
	function editar_clasificacion($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('clasificacion_clientes',$form_data);
	}
}
?>