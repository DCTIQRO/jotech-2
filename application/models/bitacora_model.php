<?php

class Bitacora_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function ver_cliente($id)
	{
		$this->db->select('nombre');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes')->row();
		return $results;
	}

	function bitacora_cliente($id)
	{
		$this->db->select('cc.comentario,cc.fecha,c.nombre, u.first_name, u.last_name');
		$this->db->where('cc.id_cliente',$id);
		$this->db->join('clientes c','c.id=cc.id_cliente');
		$this->db->join('users u','u.id=cc.id_usuario');
		$this->db->order_by('cc.fecha','asc');
		$results = $this->db->get('clientes_comentarios cc')->result();
		return $results;
	}
	
	function guardar_bitacora_cliente($form_data)
	{
		$this->db->insert('clientes_comentarios',$form_data);
	}
}
?>