<?php

class Tareas_generales_model extends CI_Model {

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
	
	function guardar_tarea($form_data)
	{
		$this->db->insert('tareas_generales', $form_data); 
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	function guardar_usuarios($form_data)
	{
		$this->db->insert_batch('tareas_generales_usuarios', $form_data); 
	}
	
	function ver_tarea($id)
	{
		$this->db->select('nombre,descripcion,fecha_inicio,fecha_fin,estatus');
		$this->db->where('id',$id);
		$results = $this->db->get('tareas_generales')->row();
		return $results;
	}
	
	function bitacora_tareas_generales($id)
	{
		$this->db->select('ctc.comentario,ctc.fecha,ctc.fecha_actividad,ctc.id id_bitacora,ct.nombre,u.id id_usuario, u.first_name, u.last_name');
		$this->db->where('ctc.id_tarea_general',$id);
		$this->db->where('ctc.status','1');
		$this->db->join('tareas_generales ct','ct.id=ctc.id_tarea_general');
		$this->db->join('users u','u.id=ctc.id_usuario');
		$this->db->order_by('ctc.fecha_actividad','desc');
		$this->db->order_by('ctc.fecha','desc');
		$results = $this->db->get('tareas_generales_comentarios ctc')->result();
		return $results;
	}
	
	function ver_usuarios_tarea($id)
	{
		$this->db->select('id,first_name,last_name');
		$this->db->where('id NOT IN (SELECT id_usuario_fk FROM tareas_generales_usuarios where id_tarea_fk='.$id.')',NULL,FALSE);
		$results = $this->db->get('users')->result();
		return $results;
	}
	
	function ver_usuarios_asignados($id)
	{
		$this->db->select('u.id,u.first_name,u.last_name');
		$this->db->where('tu.id_tarea_fk',$id);
		$this->db->join('users u','u.id=tu.id_usuario_fk');
		$this->db->order_by("first_name", "asc");
		$results = $this->db->get('tareas_generales_usuarios tu')->result();
		return $results;
	}
	
	function desasignar_usuario($id,$tarea)
	{
		$this->db->where('id_tarea_fk',$tarea);
		$this->db->where('id_usuario_fk',$id);
		$this->db->delete('tareas_generales_usuarios');
	}
	
	function ver_archivos($id)
	{
		$this->db->select('archivo,url,id');
		$this->db->where('id_tarea_fk',$id);
		$results = $this->db->get('tareas_generales_archivos')->result();
		return $results;
	}
	
	function editar_tarea($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('tareas_generales',$form_data);
	}
	
	function guardar_bitacora_general($form_data)
	{
		$this->db->insert('bitacora_general',$form_data);
	}
	
	function agregar_archivo($form_data)
	{
		$this->db->insert('tareas_generales_archivos', $form_data);
	}
	
	function ver_archivo($id)
	{
		$this->db->select('archivo,url,id,id_tarea_fk');
		$this->db->where('id',$id);
		$results = $this->db->get('tareas_generales_archivos')->row();
		return $results;
	}
	
	function borrar_archivo($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tareas_generales_archivos');
	}
	
	function guardar_bitacora_tarea($form_data)
	{
		$this->db->insert('tareas_generales_comentarios', $form_data); 
	}
	
	function editar_bitacora_tarea_general($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('tareas_generales_comentarios',$form_data);
	}
	
	function info_bitacora_tarea_general($id)
	{
		$this->db->select('id,comentario,id_tarea_general');
		$this->db->where('id',$id);
		$results = $this->db->get('tareas_generales_comentarios')->row();
		return $results;
	}
}
?>