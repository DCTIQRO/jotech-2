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
		$this->db->select('cc.idclientes_comentarios,cc.tipo,cc.comentario,cc.fecha,cc.fecha_actividad,cc.idclientes_comentarios id_bitacora,c.nombre,u.id, u.first_name, u.last_name');
		$this->db->where('cc.id_cliente',$id);
		$this->db->where('cc.status','1');
		$this->db->join('clientes c','c.id=cc.id_cliente');
		$this->db->join('users u','u.id=cc.id_usuario');
		$this->db->order_by('cc.fecha','desc');
		$results = $this->db->get('clientes_comentarios cc')->result();
		return $results;
	}
	
	function info_bitacora($id)
	{
		$this->db->select('cc.idclientes_comentarios,cc.comentario');
		$this->db->where('cc.idclientes_comentarios',$id);
		$results = $this->db->get('clientes_comentarios cc')->row();
		return $results;
	}
	
	function guardar_bitacora_cliente($form_data)
	{
		$this->db->insert('clientes_comentarios',$form_data);
	}
	
	function editar_bitacora_cliente($form_data,$id)
	{
		$this->db->where('idclientes_comentarios',$id);
		$this->db->update('clientes_comentarios',$form_data);
	}
	
	function agregar_archivo($form_data)
	{
		$this->db->insert('clientes_archivos', $form_data);
	}
	
	function ver_archivos($id)
	{
		$this->db->select('archivo,url,id');
		$this->db->where('id_cliente',$id);
		$results = $this->db->get('clientes_archivos')->result();
		return $results;
	}
	
	function ver_archivo($id)
	{
		$this->db->select('archivo,url,id,id_cliente');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes_archivos')->row();
		return $results;
	}
	
	function borrar_archivo($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('clientes_archivos');
	}
}
?>