<?php

class Pantallas_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function ver_usuarios()
	{
		$this->db->select('id,first_name,last_name');
		$this->db->order_by("first_name", "asc");
		$results = $this->db->get('users')->result();
		return $results;
	}
	
	function ver_pantallas()
	{
		$this->db->select('id,user_id,Contactos,Clientes,Proyectos,Tareas,Usuarios,Clasificaciones,Pantallas,Papelera');
		$results = $this->db->get('Pantallas')->result();
		return $results;
	}
	
	function verificar_pantalla($id)
	{
		$this->db->select('id,user_id');
		$this->db->where('user_id',$id);
		$results = $this->db->get('Pantallas')->row();
		if(empty($results))	return false;
		else return true;
	}
	
	function agregar_usuario_pantalla($form_data)
	{
		$this->db->insert('Pantallas',$form_data);
	}
	
	function editar_pantalla($form_data,$id)
	{
		$this->db->where('user_id',$id);
		$this->db->update('Pantallas',$form_data);
	}
}
?>