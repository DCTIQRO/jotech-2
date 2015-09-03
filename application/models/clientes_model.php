<?php

class Clientes_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function ver_clientes()
	{
		$this->db->select('id,nombre,website,correo,telefono,pais,calle,comentarios,entre_calles,cp,colonia,ciudad,estado,detalles,fecha_registro ');
		$this->db->where('status','1');
		$results = $this->db->get('clientes')->result();
		return $results;
	}
	
	function ver_cliente($id)
	{
		$this->db->select('nombre');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes')->row();
		return $results;
	}
	
	function ver_clasificaciones()
	{
		$this->db->select('id,nombre');
		$this->db->where('status','1');
		$results = $this->db->get('clasificacion_clientes')->result();
		return $results;
	}
	
	function guardar_cliente($form_data)
	{
		$this->db->insert('clientes', $form_data); 
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	function guardar_clasificacion($form_data)
	{
		$this->db->insert('clientes_clasificaciones', $form_data);
	}
	
	function info_cliente($id)
	{
		$this->db->select('id,nombre,website,correo,telefono,pais,calle,comentarios,cp,colonia,ciudad,estado,detalles,fecha_registro ');
		$this->db->where('id',$id);
		$results = $this->db->get('clientes')->row();
		return $results;
	}
	
	function info_clasificacion($id)
	{
		$this->db->select('cc.clasificacion,cc.prioridad');
		$this->db->where('clas.status','1');
		$this->db->where('cc.id_cliente_fk',$id);
		$this->db->join('clasificacion_clientes clas','clas.id=cc.clasificacion');
		$results = $this->db->get('clientes_clasificaciones cc')->result();
		return $results;
	}
	
	function ver_clasificaciones_contactos()
	{
		$this->db->select('clas.nombre,cc.id_miembro_fk,cc.clasificacion');
		$this->db->where('clas.status != ','0');
		$this->db->join('clasificacion_clientes clas','clas.id=cc.clasificacion','LEFT');
		$results = $this->db->get('miembros_clasificaciones cc')->result();
		return $results;
	}
	
	function actualizar_cliente($id,$form_data)
	{
		$this->db->where('id',$id);
		$this->db->update('clientes',$form_data);
	}
	
	function borrar_clasificacion($id)
	{
		$this->db->where('id_cliente_fk',$id);
		$this->db->delete('clientes_clasificaciones');
	}
	
	function ver_contactos($id)
	{
		$this->db->select('m.id,m.nombre,m.telefono,m.correo,m.puesto,m.activo,m.activo2,m.comentarios,m.titulo');
		$this->db->where('id_cliente_fk',$id);
		$this->db->where('m.borrado','1');
		$results = $this->db->get('miembros m')->result();
		return $results;
	}
	
	function todos_contactos()
	{
		$this->db->select('m.id,m.nombre,m.titulo,m.id_cliente_fk');
		$this->db->where('m.borrado','1');
		$this->db->where('m.activo2','3');
		$results = $this->db->get('miembros m')->result();
		return $results;
	}
	
	function info_contacto($id)
	{
		$this->db->select('id,nombre,telefono,correo,puesto,direccion,activo,activo2,comentarios,titulo,id_cliente_fk');
		$this->db->where('id',$id);
		$results = $this->db->get('miembros')->row();
		return $results;
	}
	
	function info_clasificaciones_contacto($id)
	{
		$this->db->select('clasificacion');
		$this->db->where('id_miembro_fk',$id);
		$results = $this->db->get('miembros_clasificaciones')->result();
		return $results;
	}
	
	function vista_clasificaciones_contacto($id)
	{
		$this->db->select('clas.nombre,cc.id_miembro_fk,cc.clasificacion');
		$this->db->where('cc.id_miembro_fk',$id);
		$this->db->join('clasificacion_clientes clas','clas.id=cc.clasificacion','LEFT');
		$results = $this->db->get('miembros_clasificaciones cc')->result();
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
	
	function guardar_contacto($form_data)
	{
		$this->db->insert('miembros', $form_data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	function guardar_clasificacion_contacto($form_data)
	{
		$this->db->insert('miembros_clasificaciones', $form_data);
	}
	
	function editar_contacto($form_data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('miembros',$form_data);
	}
	
	function borrar_clasificacion_contacto($id)
	{
		$this->db->where('id_miembro_fk',$id);
		$this->db->delete('miembros_clasificaciones');
	}
	
	function limpiar_proyectos($id)
	{
		$this->db->select('id');
		$this->db->where('id_cliente_fk',$id);
		$results = $this->db->get('proyectos')->result();
		
		foreach($results as $result)
		{
			$form_data=array(
				'borrado'	=>	'0'
			);
			$this->db->where('id',$result->id);
			$this->db->update('proyectos',$form_data);
		}
		return $results;
	}
	
	function regresar_proyectos($id)
	{
		$this->db->select('id');
		$this->db->where('id_cliente_fk',$id);
		$results = $this->db->get('proyectos')->result();
		
		foreach($results as $result)
		{
			$form_data=array(
				'borrado'	=>	'1'
			);
			$this->db->where('id',$result->id);
			$this->db->update('proyectos',$form_data);
		}
		return $results;
	}
	
	function delete_proyectos($id)
	{
		$this->db->select('id');
		$this->db->where('id_cliente_fk',$id);
		$results = $this->db->get('proyectos')->result();
		
		foreach($results as $result)
		{
			$form_data=array(
				'borrado'	=>	'2'
			);
			$this->db->where('id',$result->id);
			$this->db->update('proyectos',$form_data);
		}
		return $results;
	}
	
	function limpiar_tareas_proyectos($id,$form_data)
	{
		$this->db->where('id_proyecto_fk',$id);
		$this->db->update('proyectos_tareas',$form_data);
	}
	
	function limpiar_tareas($id)
	{
		$form_data=array(
			'borrado'	=>	'0'
		);
		$this->db->where('id_cliente_fk',$id);
		$this->db->update('clientes_tareas',$form_data);
	}
	
	function regresar_tareas($id)
	{
		$form_data=array(
			'borrado'	=>	'1'
		);
		$this->db->where('id_cliente_fk',$id);
		$this->db->update('clientes_tareas',$form_data);
	}
	
	function delete_tareas($id)
	{
		$form_data=array(
			'borrado'	=>	'2'
		);
		$this->db->where('id_cliente_fk',$id);
		$this->db->update('clientes_tareas',$form_data);
	}
	
	function limpiar_contactos($id)
	{
		$form_data=array(
			'borrado'	=>	'0',
			'status'	=>	'0'
		);
		$this->db->where('id_cliente_fk',$id);
		$this->db->update('miembros',$form_data);
	}
	
	function regresar_contactos($id)
	{
		$form_data=array(
			'borrado'	=>	'1',
			'status'	=>	'1'
		);
		$this->db->where('id_cliente_fk',$id);
		$this->db->update('miembros',$form_data);
	}
	
	function delete_contactos($id)
	{
		$form_data=array(
			'borrado'	=>	'2',
			'status'	=>	'2'
		);
		$this->db->where('id_cliente_fk',$id);
		$this->db->update('miembros',$form_data);
	}
	
	function todas_clasificacion_cliente()
	{
		$this->db->where('clas.status','1');
		$this->db->select('clas.id,cc.clasificacion,clas.nombre,cc.id_cliente_fk,cc.prioridad');
		$this->db->join('clasificacion_clientes clas','clas.id=cc.clasificacion');
		$results = $this->db->get('clientes_clasificaciones cc')->result();
		return $results;
	}
	
	function guardar_bitacora($form_data)
	{
		$this->db->insert('bitacora_general', $form_data); 
	}
}
?>