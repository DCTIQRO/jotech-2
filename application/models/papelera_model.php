<?php

class Papelera_model extends CI_Model {

	function ver_clientes()
	{
		$this->db->select('id,nombre');
		$this->db->where('status','0');
		$result=$this->db->get('clientes')->result();
		
		return $result;
	}
	
	function ver_proyectos()
	{
		$this->db->select('id,nombre');
		$this->db->where('borrado','0');
		$result=$this->db->get('proyectos')->result();
		
		return $result;
	}
	
	function ver_tareas_proyectos()
	{
		$this->db->select('id,nombre');
		$this->db->where('borrado','0');
		$result=$this->db->get('proyectos_tareas')->result();
		
		return $result;
	}
	
	function ver_tareas_cliente()
	{
		$this->db->select('id,nombre');
		$this->db->where('borrado','0');
		$result=$this->db->get('proyectos_tareas')->result();
		
		return $result;
	}
	
	function ver_tareas_generales()
	{
		$this->db->select('id,nombre');
		$this->db->where('borrado','0');
		$result=$this->db->get('tareas_generales')->result();
		
		return $result;
	}
	
	function ver_contactos()
	{
		$this->db->select('id,nombre,titulo');
		$this->db->where('status','0');
		$result=$this->db->get('miembros')->result();
		
		return $result;
	}
	
}
?>