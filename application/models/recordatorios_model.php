<?php

class Recordatorios_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function guardar_recordatorio($form_data)
	{
		$this->db->insert('Recordatorios',$form_data);
	}
	
	function eliminar_recordatorio($id)
	{
		$this->db->where('idRecordatorios',$id);
		$this->db->delete('Recordatorios');
	}
	
	function ver_recordatorios($id)
	{
		$this->db->where('id_usuario',$id);
		$this->db->select('idRecordatorios, descripcion, Fecha, id_usuario');
		$results = $this->db->get('Recordatorios')->result();
		return $results;
	}
	
	function info_recordatorios($id)
	{
		$this->db->where('idRecordatorios',$id);
		$this->db->select('idRecordatorios, descripcion, Fecha, id_usuario');
		$results = $this->db->get('Recordatorios')->row();
		return $results;
	}
	
	function guardar_edicion($form_data, $id)
	{
		$this->db->where('idRecordatorios',$id);
		$this->db->update('Recordatorios',$form_data);
	}
}
?>