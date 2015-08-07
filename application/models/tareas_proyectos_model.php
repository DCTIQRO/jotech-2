<?php

class tareas_proyectos_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function guardar_usuarios($form_data)
	{
		$this->db->insert_batch('proyectos_tareas_usuarios', $form_data); 
	}
	
	function ver_tarea($id)
	{
		$this->db->select('nombre,descripcion,id_proyecto_fk,estatus');
		$this->db->where('id',$id);
		$results = $this->db->get('proyectos_tareas')->row();
		return $results;
	}
	
	function ver_proyecto($id)
	{
		$this->db->select('id,nombre');
		$this->db->where('id',$id);
		$results = $this->db->get('proyectos')->row();
		return $results;
	}
	
	function bitacora_tareas_proyecto($id)
	{
		$this->db->select('ptc.id id_comentario,ptc.comentario,ptc.fecha,ptc.fecha_actividad,ptc.id id_bitacora,pt.nombre,u.id id_usuario, u.first_name, u.last_name');
		$this->db->where('ptc.id_proyecto_tarea_fk',$id);
		$this->db->where('ptc.status','1');
		$this->db->join('proyectos_tareas pt','pt.id=ptc.id_proyecto_tarea_fk');
		$this->db->join('users u','u.id=ptc.id_usuario');
		$this->db->order_by('ptc.fecha_actividad','desc');
		$results = $this->db->get('proyectos_tareas_comentarios ptc')->result();
		return $results;
	}
	
	function guardar_bitacora_tarea($form_data)
	{
		$this->db->insert('proyectos_tareas_comentarios', $form_data); 
	}
	
	function agregar_archivo($form_data)
	{
		$this->db->insert('proyectos_tareas_archivos', $form_data);
	}
	
	function ver_usuarios_tarea($id)
	{
		$this->db->select('id,first_name,last_name');
		$this->db->where('id NOT IN (SELECT id_usuario_fk FROM proyectos_tareas_usuarios where id_tarea_fk='.$id.')',NULL,FALSE);
		$results = $this->db->get('users')->result();
		return $results;
	}
	
	function ver_usuarios_asignados($id)
	{
		$this->db->select('u.id,u.first_name,u.last_name');
		$this->db->where('ptu.id_tarea_fk',$id);
		$this->db->join('users u','u.id=ptu.id_usuario_fk');
		$this->db->order_by("first_name", "asc");
		$results = $this->db->get('proyectos_tareas_usuarios ptu')->result();
		return $results;
	}
	
	function desasignar_usuario($id,$tarea)
	{
		$this->db->where('id_tarea_fk',$tarea);
		$this->db->where('id_usuario_fk',$id);
		$this->db->delete('proyectos_tareas_usuarios');
	}
	
	function ver_archivos($id)
	{
		$this->db->select('archivo,url');
		$this->db->where('id_tarea_fk',$id);
		$results = $this->db->get('proyectos_tareas_archivos')->result();
		return $results;
	}
	
	function editar_bitacora_tarea_proyecto($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('proyectos_tareas_comentarios',$form_data);
	}
	
	
	function info_bitacora_tarea_proyecto($id)
	{
		$this->db->select('id,comentario,id_proyecto_tarea_fk');
		$this->db->where('id',$id);
		$results = $this->db->get('proyectos_tareas_comentarios')->row();
		return $results;
	}
	
	function cerrar_tarea($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('proyectos_tareas',$form_data);
	}
	
	function guardar_bitacora_proyecto($form_data)
	{
		$this->db->insert('proyectos_comentarios',$form_data);
	}
}
?>