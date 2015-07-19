<?php

class Clientes_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function ver_clientes()
	{
		$this->db->select('id,nombre,website,correo,telefono,pais,calle,comentarios,entre_calles,colonia,ciudad,estado,detalles,fecha_registro ');
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
		$this->db->select('id,nombre,website,correo,telefono,pais,calle,comentarios,entre_calles,colonia,ciudad,estado,detalles,fecha_registro ');
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
		$this->db->select('clas.nombre,cc.id_miembro_fk');
		$this->db->where('clas.status','1');
		$this->db->join('clasificacion_clientes clas','clas.id=cc.clasificacion');
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
		$this->db->select('m.id,m.nombre,m.telefono,m.correo,m.puesto,m.activo,m.activo2,m.comentarios,m.cp');
		$this->db->where('id_cliente_fk',$id);
		$this->db->where('m.status','1');
		$results = $this->db->get('miembros m')->result();
		return $results;
	}
	
	function info_contacto($id)
	{
		$this->db->select('id,nombre,telefono,correo,puesto,direccion,activo,activo2,comentarios,cp');
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
}
?>