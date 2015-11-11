<?php

class Contacto_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function ver_contactos()
	{
		$this->db->select('m.id,m.nombre,m.puesto,m.telefono,m.correo,m.id_cliente_fk cliente, m.activo, m.comentarios, m.direccion, m.activo2, m.cp,m.titulo,c.nombre name_cliente');
		$this->db->where('borrado','1');
		$this->db->join('clientes c','c.id = m.id_cliente_fk');
		$results = $this->db->get('miembros m')->result();
		return $results;
	}
}
?>