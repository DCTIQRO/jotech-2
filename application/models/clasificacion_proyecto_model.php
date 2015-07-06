<?php

class Clasificacion_proyecto_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function ver_clasificaciones()
	{
		$this->db->select('id_clasificacion,nombre,descripcion');
		$results = $this->db->get('clasificacion_proyectos')->result();
		return $results;
	}
	
	function agregar_clasificacion($form_data)
	{
		$this->db->insert('clasificacion_proyectos',$form_data);
	}
}
?>