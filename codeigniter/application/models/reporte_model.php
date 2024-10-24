<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model
{
	public function obtener_socio_por_codigo($criterio) 
	{
		// Consulta para encontrar al socio con el código proporcionado
		$this->db->select("CONCAT_WS(' ', U.nombre, U.primerApellido, IFNULL(U.segundoApellido, '')) AS nombre, M.codigoSocio");
		$this->db->from('usuario U');
		$this->db->join('membresia M', 'U.idUsuario = M.idUsuario', 'inner');
		$this->db->where('M.codigoSocio', $criterio);
		$this->db->or_where('U.primerApellido', $criterio); // Usa 'or_where' para la condición OR
		$query = $this->db->get();
	
		if ($query->num_rows() > 0)
		{
		  return $query->row();  // Retorna el primer resultado encontrado (un solo socio)
		}
		else
		{
		  return false;  // Si no se encuentra el socio
		}
	}

}
