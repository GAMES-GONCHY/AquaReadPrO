<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model
{
	// public function obtener_socio_por_criterio($criterio) 
	// {
	// 	// Consulta para encontrar al socio con el código proporcionado
	// 	$this->db->select("CONCAT_WS(' ', U.nombre, U.primerApellido, IFNULL(U.segundoApellido, '')) AS nombre, M.codigoSocio");
	// 	$this->db->from('usuario U');
	// 	$this->db->join('membresia M', 'U.idUsuario = M.idUsuario', 'inner');
	// 	$this->db->where('M.codigoSocio', $criterio);
	// 	$this->db->or_where('U.primerApellido', $criterio); // Usa 'or_where' para la condición OR
	// 	$query = $this->db->get();
	
	// 	if ($query->num_rows() > 0)
	// 	{
	// 	  return $query->row();  // Retorna el primer resultado encontrado (un solo socio)
	// 	}
	// 	else
	// 	{
	// 	  return false;  // Si no se encuentra el socio
	// 	}
	// }
	public function obtener_socio_por_criterio($criterio) 
	{
		$this->db->select("CONCAT_WS(' ', U.nombre, U.primerApellido, IFNULL(U.segundoApellido, '')) AS nombre, M.codigoSocio, M.idMembresia");
		$this->db->from('usuario U');
		$this->db->join('membresia M', 'U.idUsuario = M.idUsuario', 'inner');
		
		// Agrupar condiciones para limitar la búsqueda
		$this->db->group_start();
		$this->db->where('M.codigoSocio', $criterio);
		$this->db->or_where('U.primerApellido', $criterio);
		$this->db->group_end();

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	// 
		
	public function obtener_datos_historicos($data) 
	{
		$this->db->select('socio, totalPagado, fechaLectura, fechaPago, consumo, observacion');
		$this->db->from('reportepagosconsumos');

		// Condición de estado según el tipo de reporte
		if ($data['tipoReporte'] == 'pagos')
		{
			$this->db->where('estado', 'pagado');  // Historial de pagos: estado = 'pagado'
		}
		elseif ($data['tipoReporte'] == 'consumos')
		{
			$this->db->where('estado !=', 'deshabilitado');  // Historial de consumos: estado distinto de 'deshabilitado'
		}
		$this->db->where('idMembresia', $data['idMembresia']);
		$this->db->where('codigoSocio', $data['codigoSocio']);
		$this->db->where('fechaPago >=', $data['fechaInicio']);
		$this->db->where('fechaPago <=', $data['fechaFin']);

		$query = $this->db->get();

		// Retorna los resultados como un array de objetos
		if ($query->num_rows() > 0) {
			return $query->result_array(); 
		} else {
			return [];
		}
	}
}
