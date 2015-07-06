<?php

class Clasificacion_cliente_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function ver_clasificaciones()
	{
		$this->db->select('id,nombre,descripcion');
		$results = $this->db->get('clasificacion_clientes')->result();
		return $results;
	}
	
	function agregar_clasificacion($form_data)
	{
		$this->db->insert('clasificacion_clientes',$form_data);
	}
}
?>