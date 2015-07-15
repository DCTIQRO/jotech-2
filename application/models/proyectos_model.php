<?php

class Proyectos_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function ver_clasificaciones()
	{
		$this->db->select('id,nombre');
		$results = $this->db->get('clasificacion_clientes')->result();
		return $results;
	}
	
	function ver_tipos()
	{
		$this->db->select('id,tipo');
		$results = $this->db->get('tipo_proyectos')->result();
		return $results;
	}
	
	function ver_cliente($id)
	{
		$this->db->select('nombre');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes')->row();
		return $results;
	}
	
	function ver_usuarios()
	{
		$this->db->select('id,first_name,last_name');
		$this->db->order_by("first_name", "asc");
		$results = $this->db->get('users')->result();
		return $results;
	}
	
	function guardar_proyecto($form_data)
	{
		$this->db->insert('proyectos', $form_data); 
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	function guardar_etiquetas($form_data)
	{
		$this->db->insert_batch('proyectos_etiquetas', $form_data); 
	}
	
	function guardar_clasificacion($form_data)
	{
		$this->db->insert('proyectos_clasificaciones', $form_data);
	}
	
	function guardar_usuarios($form_data)
	{
		$this->db->insert_batch('proyectos_usuarios', $form_data);
	}
	
	function ver_proyectos($id)
	{
		$this->db->select('id,nombre,fecha_inicio,progreso,estatus');
		$this->db->where('id_cliente_fk',$id);
		$results = $this->db->get('proyectos')->result();
		return $results;
	}
	
	function ver_tareas($id)
	{
		$this->db->select('id,nombre,fecha_fin,estatus');
		$this->db->where('id_cliente_fk',$id);
		$results = $this->db->get('clientes_tareas')->result();
		return $results;
	}
	
	function ver_tarea($id)
	{
		$this->db->select('id,estatus,id_proyecto_fk,nombre');
		$this->db->where('id',$id);
		$results = $this->db->get('proyectos_tareas')->row();
		return $results;
	}
	 
	function todos_proyectos()
	{
		$this->db->select('p.id,p.nombre,p.descripcion_corta,p.estatus,p.descripcion,p.progreso,p.fecha_inicio,p.progreso,c.nombre cliente');
		$this->db->join('clientes c','c.id=p.id_cliente_fk');
		$results = $this->db->get('proyectos p')->result();
		return $results;
	}
	
	function ver_proyecto($id)
	{
		$this->db->select('nombre,descripcion,estatus,id_cliente_fk');
		$this->db->where('id',$id);
		$results = $this->db->get('proyectos')->row();
		return $results;
	}
	
	function bitacora_proyecto($id)
	{
		$this->db->select('pc.id id_comentario,pc.comentario,pc.fecha,p.nombre,u.id id_usuario, u.first_name, u.last_name');
		$this->db->where('pc.id_proyecto_fk',$id);
		$this->db->where('pc.status','1');
		$this->db->join('proyectos p','p.id=pc.id_proyecto_fk');
		$this->db->join('users u','u.id=pc.id_usuario_fk');
		$this->db->order_by('pc.fecha','asc');
		$results = $this->db->get('proyectos_comentarios pc')->result();
		return $results;
	}
	
	function guardar_bitacora_proyecto($form_data)
	{
		$this->db->insert('proyectos_comentarios',$form_data);
	}
	
	function ver_usuarios_proyectos($id)
	{
		$this->db->select('id,first_name,last_name');
		$this->db->where('id NOT IN (SELECT id_usuario_fk FROM proyectos_usuarios where id_proyecto_fk='.$id.')',NULL,FALSE);
		$results = $this->db->get('users')->result();
		return $results;
	}
	
	function ver_usuarios_asignados($id)
	{
		$this->db->select('u.id,u.first_name,u.last_name');
		$this->db->where('pu.id_proyecto_fk',$id);
		$this->db->join('users u','u.id=pu.id_usuario_fk');
		$this->db->order_by("first_name", "asc");
		$results = $this->db->get('proyectos_usuarios pu')->result();
		return $results;
	}
	
	function ver_tareas_proyecto($id)
	{
		$this->db->select('id,nombre,estatus');
		$this->db->where('id_proyecto_fk',$id);
		$this->db->order_by("fecha_fin", "desc");
		$results = $this->db->get('proyectos_tareas')->result();
		return $results;
	}
	
	function desasignar_usuario($id,$proyecto)
	{
		$this->db->where('id_proyecto_fk',$proyecto);
		$this->db->where('id_usuario_fk',$id);
		$this->db->delete('proyectos_usuarios');
	}
	
	function crear_tarea_proyecto($form_data)
	{
		$this->db->insert('proyectos_tareas', $form_data); 
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	function asignar_tareas($form_data)
	{
		$this->db->insert_batch('proyectos_tareas_usuarios', $form_data); 
	}
	
	function cerrar_proyecto($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('proyectos',$form_data);
	}
	
	function cambiar_estado_tarea($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('proyectos_tareas',$form_data);
	}
	
	function editar_bitacora_proyecto($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('proyectos_comentarios',$form_data);
	}
	
	function info_bitacora_proyecto($id)
	{
		$this->db->select('id,comentario,id_proyecto_fk');
		$this->db->where('id',$id);
		$results = $this->db->get('proyectos_comentarios')->row();
		return $results;
	}
	
	function guardar_bitacora_cliente($form_data)
	{
		$this->db->insert('clientes_comentarios',$form_data);
	}
}
?>