<?php

class Proyectos_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function ver_clasificaciones()
	{
		$this->db->where('status','1');
		$this->db->select('id,nombre');
		$results = $this->db->get('clasificacion_clientes')->result();
		return $results;
	}
	
	function clasificacion_cliente($id)
	{
		$this->db->where('cc.id_cliente_fk',$id);
		$this->db->where('clas.status','1');
		$this->db->select('clas.id,cc.clasificacion,clas.nombre');
		$this->db->join('clasificacion_clientes clas','clas.id=cc.clasificacion');
		$results = $this->db->get('clientes_clasificaciones cc')->result();
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
		$this->db->select('nombre,id');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes')->row();
		return $results;
	}
	
	function ver_usuarios()
	{
		$this->db->where('active','1');
		$this->db->select('id,first_name,last_name');
		$this->db->order_by("first_name", "asc");
		$results = $this->db->get('users')->result();
		return $results;
	}

	function ver_logueado($id)
	{
		$this->db->where('active','1');
		$this->db->select('id,first_name,last_name');
		$this->db->where('id',$id);
		$row = $this->db->get('users')->row();
		return $row;

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
	
	function guardar_contactos($form_data)
	{
		$this->db->insert_batch('proyectos_contactos', $form_data);
	}
	
	function ver_proyectos($id)
	{
		$this->db->select('id,nombre,fecha_inicio,progreso,estatus,descripcion');
		$this->db->where('id_cliente_fk',$id);
		$this->db->where('borrado','1');
		$this->db->order_by('fecha_inicio','desc');
		$results = $this->db->get('proyectos')->result();
		return $results;
	}
	
	function ver_tareas($id)
	{
		$this->db->select('id,nombre,fecha_fin,estatus');
		$this->db->where('id_cliente_fk',$id);
		$this->db->where('borrado','1');
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
		$this->db->where('p.borrado','1');
		$this->db->select('p.id,p.nombre,p.descripcion_corta,p.estatus,p.descripcion,p.progreso,p.fecha_inicio,p.progreso,c.nombre cliente, c.id id_cliente');
		$this->db->join('clientes c','c.id=p.id_cliente_fk');
		$results = $this->db->get('proyectos p')->result();
		return $results;
	}
	
	function ver_proyecto($id)
	{
		$this->db->select('nombre,descripcion,estatus,id_cliente_fk,avisador,divisor');
		$this->db->where('id',$id);
		$results = $this->db->get('proyectos')->row();
		return $results;
	}
	
	function bitacora_proyecto($id)
	{
		$this->db->select('pc.id id_comentario,pc.tipo,pc.comentario,pc.fecha,pc.fecha_actividad,pc.id id_bitacora,p.nombre,u.id id_usuario, u.first_name, u.last_name');
		$this->db->where('pc.id_proyecto_fk',$id);
		$this->db->where('pc.status','1');
		$this->db->join('proyectos p','p.id=pc.id_proyecto_fk');
		$this->db->join('users u','u.id=pc.id_usuario_fk');
		$this->db->order_by('pc.fecha_actividad','desc');
		$this->db->order_by('pc.fecha','desc');
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
		$this->db->where('active','1');
		$this->db->where('id NOT IN (SELECT id_usuario_fk FROM proyectos_usuarios where id_proyecto_fk='.$id.')',NULL,FALSE);
		$results = $this->db->get('users')->result();
		return $results;
	}
	
	function ver_usuarios_asignados($id)
	{
		$this->db->select('u.id,u.first_name,u.last_name,u.email');
		$this->db->where('u.active','1');
		$this->db->where('pu.id_proyecto_fk',$id);
		$this->db->join('users u','u.id=pu.id_usuario_fk');
		$this->db->order_by("first_name", "asc");
		$results = $this->db->get('proyectos_usuarios pu')->result();
		return $results;
	}
	
	function ver_contactos_asignados($id)
	{
		$this->db->select('m.id,m.nombre,m.telefono,m.correo');
		$this->db->where('pc.id_proyecto_fk',$id);
		$this->db->where('m.borrado','1');
		$this->db->join('miembros m','m.id=pc.id_miembro_fk');
		$this->db->order_by("m.nombre", "asc");
		$results = $this->db->get('proyectos_contactos pc')->result();
		return $results;
	}
	
	function ver_tareas_proyecto($id)
	{
		$this->db->select('id,nombre,estatus,descripcion,fecha_inicio,fecha_fin');
		$this->db->where('id_proyecto_fk',$id);
		$this->db->where('borrado','1');
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
	
	function desasignar_contacto($id,$proyecto)
	{
		$this->db->where('id_proyecto_fk',$proyecto);
		$this->db->where('id_miembro_fk',$id);
		$this->db->delete('proyectos_contactos');
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
	
	function ver_contactos_proyectos($id,$id_cliente)
	{
		$this->db->select('m.id,m.nombre');
		$this->db->where('m.status','1');
		$this->db->where('m.borrado','1');
		$this->db->where('m.id_cliente_fk',$id_cliente);
		$this->db->where('m.id NOT IN (SELECT id_miembro_fk FROM proyectos_contactos where id_proyecto_fk='.$id.')',NULL,FALSE);
		$this->db->where('mc.clasificacion = SOME (SELECT id_clasificacion FROM proyectos_clasificaciones where id_proyecto_fk='.$id.')',NULL,FALSE);
		$this->db->join('miembros_clasificaciones mc','mc.id_miembro_fk=m.id','inner');
		$this->db->group_by('m.nombre');
		$results = $this->db->get('miembros m')->result();
		return $results;
	}
	
	function ver_contactos_proyectos_allclas($id,$id_cliente)
	{
		$this->db->select('m.id,m.nombre');
		$this->db->where('m.status','1');
		$this->db->where('m.borrado','1');
		$this->db->where('m.id_cliente_fk',$id_cliente);
		$this->db->where('m.id NOT IN (SELECT id_miembro_fk FROM proyectos_contactos where id_proyecto_fk='.$id.')',NULL,FALSE);
		$this->db->where('mc.clasificacion','1');
		$this->db->join('miembros_clasificaciones mc','mc.id_miembro_fk=m.id','inner');
		$this->db->group_by('m.nombre');
		$results = $this->db->get('miembros m')->result();
		return $results;
	}
	
	function agregar_archivo($form_data)
	{
		$this->db->insert('proyectos_archivos', $form_data);
	}
	
	function ver_archivos($id)
	{
		$this->db->select('archivo,url,id');
		$this->db->where('id_proyecto',$id);
		$results = $this->db->get('proyectos_archivos')->result();
		return $results;
	}
	
	function editar_proyecto($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('proyectos',$form_data);
	}
	
	function editar_tarea_proyecto($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('proyectos_tareas',$form_data);
	}
	
	function ver_proyecto_clasificacion($id)
	{
		$this->db->select('cc.nombre,cc.id,pc.prioridad,pc.observaciones');
		$this->db->join('clasificacion_clientes cc','pc.id_clasificacion=cc.id');
		$this->db->where('pc.id_proyecto_fk',$id);
		$this->db->order_by('pc.prioridad','desc');
		$results = $this->db->get('proyectos_clasificaciones pc')->result();
		return $results;
	}
	
	function borrar_clasificacion($id)
	{
		$this->db->where('id_proyecto_fk',$id);
		$this->db->delete('proyectos_clasificaciones');
	}
	
	function ver_archivo($id)
	{
		$this->db->select('archivo,url,id,id_proyecto');
		$this->db->where('id',$id);
		$results = $this->db->get('proyectos_archivos')->row();
		return $results;
	}
	
	function borrar_archivo($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('proyectos_archivos');
	}
	
	function todas_clasificacion_proyecto()
	{
		$this->db->where('clas.status','1');
		$this->db->select('clas.id,cc.id_clasificacion,clas.nombre,cc.id_proyecto_fk,cc.prioridad');
		$this->db->join('clasificacion_clientes clas','clas.id=cc.id_clasificacion');
		$results = $this->db->get('proyectos_clasificaciones cc')->result();
		return $results;
	}
	
	function todas_etiquetas_proyecto()
	{
		$this->db->select('id,etiqueta,id_proyecto_fk');
		$results = $this->db->get('proyectos_etiquetas')->result();
		return $results;
	}
	
	function todos_contactos_proyecto()
	{
		$this->db->where('m.borrado','1');
		$this->db->select('m.id,pc.id_proyecto_fk,m.nombre,m.id_cliente_fk');
		$this->db->join('miembros m','m.id=pc.id_miembro_fk');
		$results = $this->db->get('proyectos_contactos pc')->result();
		return $results;
	}
	
	function todos_usuarios_proyecto()
	{
		$this->db->where('u.active','1');
		$this->db->select('u.id,pu.id_proyecto_fk,u.first_name,u.last_name');
		$this->db->join('users u','u.id=pu.id_usuario_fk');
		$results = $this->db->get('proyectos_usuarios pu')->result();
		return $results;
	}
	
}
?>