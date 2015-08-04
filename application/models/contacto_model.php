<?php

class Contacto_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function ver_contactos()
	{
		$this->db->select('id,nombre,puesto,telefono,correo,id_cliente_fk cliente, activo, comentarios, direccion, activo2, cp,titulo');
		$results = $this->db->get('miembros')->result();
		return $results;
	}
}
?>