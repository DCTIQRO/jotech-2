<?php

class Historial_model extends CI_Model {

	function ver_bitacora()
	{
		$this->db->select('gb.id,gb.comentario,gb.fecha,gb.id_usuario,gb.status,gb.fecha_actividad,gb.tipo,u.first_name,u.last_name');
		$this->db->join('users u','u.id=gb.id_usuario');
		$result=$this->db->get('bitacora_general gb')->result();
		
		return $result;
	}
}
?>