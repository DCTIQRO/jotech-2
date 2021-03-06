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
		$this->db->select('nombre,descripcion,fecha_inicio,fecha_fin,estatus,id_cliente_fk');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes_tareas')->row();
		return $results;
	}
	
	function tareas_cliente()
	{
		$this->db->select('id,nombre,descripcion,estatus,id_cliente_fk,fecha_inicio,fecha_fin');
		$results = $this->db->get('clientes_tareas')->result();
		return $results;
	}
	
	function bitacora_tareas_cliente($id)
	{
		$this->db->select('ctc.comentario,ctc.fecha,ctc.fecha_actividad,ctc.id id_bitacora,ct.nombre,u.id id_usuario, u.first_name, u.last_name');
		$this->db->where('ctc.id_cliente_tarea',$id);
		$this->db->where('ctc.status','1');
		$this->db->join('clientes_tareas ct','ct.id=ctc.id_cliente_tarea');
		$this->db->join('users u','u.id=ctc.id_usuario');
		$this->db->order_by('ctc.fecha_actividad','desc');
		$this->db->order_by('ctc.fecha','desc');
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
		$this->db->select('archivo,url,id');
		$this->db->where('id_tarea_fk',$id);
		$results = $this->db->get('clientes_tareas_archivos')->result();
		return $results;
	}
	
	function ver_tarea_general($id)
	{
		date_default_timezone_set('America/Mexico_City');
		$this->db->select('t.id,t.nombre,t.descripcion,t.fecha_inicio,t.fecha_fin,t.fecha_entrega,t.estatus');
		$this->db->where('u.id_usuario_fk',$id);
		$this->db->where('t.estatus','0');
		$this->db->where('MONTH(fecha_fin) <=',date('m'));
		$this->db->join('tareas_generales_usuarios u','u.id_tarea_fk=t.id');
		$results = $this->db->get('tareas_generales t')->result();
		return $results;
	}
	
	function todas_tarea_general()
	{
		date_default_timezone_set('America/Mexico_City');
		$this->db->select('t.id,t.nombre,t.descripcion,t.fecha_inicio,t.fecha_fin,t.fecha_entrega,t.estatus');
		$this->db->where('t.estatus','0');
		$results = $this->db->get('tareas_generales t')->result();
		return $results;
	}
	
	function ver_tarea_proyectos($id)
	{
		date_default_timezone_set('America/Mexico_City');
		$this->db->select('t.id,t.nombre,t.descripcion,t.id_proyecto_fk,p.nombre proyecto,c.nombre cliente,p.id_cliente_fk id_cliente,t.fecha_inicio,t.fecha_fin,t.fecha_entrega,t.estatus');
		$this->db->where('u.id_usuario_fk',$id);
		$this->db->where('t.estatus','0');
		$this->db->where('MONTH(fecha_fin) <=',date('m'));
		$this->db->join('proyectos p','p.id=t.id_proyecto_fk');
		$this->db->join('clientes c','c.id=p.id_cliente_fk');
		$this->db->join('proyectos_tareas_usuarios u','u.id_tarea_fk=t.id');
		$results = $this->db->get('proyectos_tareas t')->result();
		return $results;
	}
	
	function todas_tarea_proyectos()
	{
		date_default_timezone_set('America/Mexico_City');
		$this->db->select('t.id,t.nombre,t.descripcion,t.id_proyecto_fk,p.nombre proyecto,c.nombre cliente,p.id_cliente_fk id_cliente,t.fecha_inicio,t.fecha_fin,t.fecha_entrega,t.estatus');
		$this->db->where('t.estatus','0');
		$this->db->join('proyectos p','p.id=t.id_proyecto_fk');
		$this->db->join('clientes c','c.id=p.id_cliente_fk');
		$results = $this->db->get('proyectos_tareas t')->result();
		return $results;
	}
	
	function ver_tarea_cliente($id)
	{
		$this->db->select('t.id,t.nombre,t.id_cliente_fk,t.descripcion,c.nombre cliente,t.fecha_inicio,t.fecha_fin,t.fecha_entrega,t.estatus');
		$this->db->where('u.id_usuario_fk',$id);
		$this->db->where('t.estatus','0');
		$this->db->where('MONTH(fecha_fin) <=',date('m'));
		$this->db->join('clientes c','c.id=t.id_cliente_fk');
		$this->db->join('tareas_usuarios u','u.id_tarea_fk=t.id');
		$results = $this->db->get('clientes_tareas t')->result();
		return $results;
	}
	
	function todas_tarea_cliente()
	{
		$this->db->select('t.id,t.nombre,t.id_cliente_fk,t.descripcion,c.nombre cliente,t.fecha_inicio,t.fecha_fin,t.fecha_entrega,t.estatus');
		$this->db->where('t.estatus','0');
		$this->db->join('clientes c','c.id=t.id_cliente_fk');
		$results = $this->db->get('clientes_tareas t')->result();
		return $results;
	}
	
	function usuarios_tarea_cliente()
	{
		$this->db->where('u.active','1');
		$this->db->select('u.id,tu.id_tarea_fk,u.first_name,u.last_name');
		$this->db->join('users u','u.id=tu.id_usuario_fk');
		$results = $this->db->get('tareas_usuarios tu')->result();
		return $results;
	}
	
	function usuarios_tarea_proyecto()
	{
		$this->db->where('u.active','1');
		$this->db->select('u.id,tu.id_tarea_fk,u.first_name,u.last_name');
		$this->db->join('users u','u.id=tu.id_usuario_fk');
		$results = $this->db->get('proyectos_tareas_usuarios tu')->result();
		return $results;
	}
	
	function usuarios_tarea_general()
	{
		$this->db->where('u.active','1');
		$this->db->select('u.id,tu.id_tarea_fk,u.first_name,u.last_name');
		$this->db->join('users u','u.id=tu.id_usuario_fk');
		$results = $this->db->get('tareas_generales_usuarios tu')->result();
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
	
	function editar_bitacora_tarea_cliente($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('clientes_tareas_comentarios',$form_data);
	}

	function editar_tarea($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('clientes_tareas',$form_data);
	}
	
	function info_bitacora_tarea_cliente($id)
	{
		$this->db->select('id,comentario,id_cliente_tarea');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes_tareas_comentarios')->row();
		return $results;
	}
	
	function ver_archivo($id)
	{
		$this->db->select('archivo,url,id,id_tarea_fk');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes_tareas_archivos')->row();
		return $results;
	}
	
	function borrar_archivo($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('clientes_tareas_archivos');
	}
	
	function ver_tareas($id)
	{
		$this->db->select('id,nombre,fecha_fin,estatus,fecha_inicio');
		$this->db->where('id_cliente_fk',$id);
		$this->db->where('borrado','1');
		$this->db->order_by("estatus", "DESC");
		$results = $this->db->get('clientes_tareas')->result();
		return $results;
	}
}
?>