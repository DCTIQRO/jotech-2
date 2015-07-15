<?php

class Tareas_model extends CI_Model {

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
	
	function ver_usuario($id)
	{
		$this->db->select('first_name,last_name');
		$this->db->where('id',$id);
		$results = $this->db->get('users')->row();
		return $results;
	}
	
	function ver_cliente($id)
	{
		$this->db->select('nombre');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes')->row();
		return $results;
	}
	
	function guardar_tarea($form_data)
	{
		$this->db->insert('clientes_tareas', $form_data); 
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	function guardar_usuarios($form_data)
	{
		$this->db->insert_batch('tareas_usuarios', $form_data); 
	}
	
	function ver_tarea($id)
	{
		$this->db->select('nombre,descripcion,estatus,id_cliente_fk');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes_tareas')->row();
		return $results;
	}
	
	function bitacora_tareas_cliente($id)
	{
		$this->db->select('ctc.comentario,ctc.fecha,ct.nombre, u.first_name, u.last_name');
		$this->db->where('ctc.id_cliente_tarea',$id);
		$this->db->join('clientes_tareas ct','ct.id=ctc.id_cliente_tarea');
		$this->db->join('users u','u.id=ctc.id_usuario');
		$this->db->order_by('ctc.fecha','asc');
		$results = $this->db->get('clientes_tareas_comentarios ctc')->result();
		return $results;
	}
	
	function guardar_bitacora_tarea($form_data)
	{
		$this->db->insert('clientes_tareas_comentarios', $form_data); 
	}
	
	function agregar_archivo($form_data)
	{
		$this->db->insert('clientes_tareas_archivos', $form_data);
	}
	
	function ver_usuarios_tarea($id)
	{
		$this->db->select('id,first_name,last_name');
		$this->db->where('id NOT IN (SELECT id_usuario_fk FROM tareas_usuarios where id_tarea_fk='.$id.')',NULL,FALSE);
		$results = $this->db->get('users')->result();
		return $results;
	}
	
	function ver_usuarios_asignados($id)
	{
		$this->db->select('u.id,u.first_name,u.last_name');
		$this->db->where('tu.id_tarea_fk',$id);
		$this->db->join('users u','u.id=tu.id_usuario_fk');
		$this->db->order_by("first_name", "asc");
		$results = $this->db->get('tareas_usuarios tu')->result();
		return $results;
	}
	
	function desasignar_usuario($id,$tarea)
	{
		$this->db->where('id_tarea_fk',$tarea);
		$this->db->where('id_usuario_fk',$id);
		$this->db->delete('tareas_usuarios');
	}
	
	function ver_archivos($id)
	{
		$this->db->select('archivo,url');
		$this->db->where('id_tarea_fk',$id);
		$results = $this->db->get('clientes_tareas_archivos')->result();
		return $results;
	}
	
	function ver_tarea_proyectos($id)
	{
		$this->db->select('t.id,t.nombre,t.descripcion,p.nombre proyecto,t.fecha_inicio,t.fecha_fin,t.fecha_entrega,t.estatus');
		$this->db->where('u.id_usuario_fk',$id);
		$this->db->join('proyectos p','p.id=t.id_proyecto_fk');
		$this->db->join('proyectos_tareas_usuarios u','u.id_tarea_fk=t.id');
		$results = $this->db->get('proyectos_tareas t')->result();
		return $results;
	}
	
	function ver_tarea_cliente($id)
	{
		$this->db->select('t.id,t.nombre,t.descripcion,c.nombre cliente,t.fecha_inicio,t.fecha_fin,t.fecha_entrega,t.estatus');
		$this->db->where('u.id_usuario_fk',$id);
		$this->db->join('clientes c','c.id=t.id_cliente_fk');
		$this->db->join('tareas_usuarios u','u.id_tarea_fk=t.id');
		$results = $this->db->get('clientes_tareas t')->result();
		return $results;
	}
	
	function cerrar_tarea($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('clientes_tareas',$form_data);
	}
	
	function guardar_bitacora_cliente($form_data)
	{
		$this->db->insert('clientes_comentarios',$form_data);
	}
}
?>