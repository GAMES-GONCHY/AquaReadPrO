<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datalogger_model extends CI_Model
{
	public function habilitados()
    { 
        $this->db->where_in('estado', [1,2]);
        $query = $this->db->get('datalogger');
        return $query;
    }
    public function deshabilitados()
    {
        $this->db->where('estado', 0);
        $query = $this->db->get('datalogger');
        return $query;
    }
	public function agregar($data)
	{
		$this->db->insert('datalogger', $data);
        return $this->db->insert_id();
	}
    public function modificar($idDatalogger,$data)
	{
		$this->db->where('idDatalogger', $idDatalogger);
        $this->db->update('datalogger',$data);

        return $this->db->affected_rows() > 0;
	}
    public function recuperaridmax()
	{
		$this->db->select_max('idDatalogger');
        $this->db->where('estado', 1); 
        $query = $this->db->get('datalogger');
        //return $query->row()->idDatalogger;
        return $query;
	}
    public function contardl()
	{
		$query = $this->db->count_all('datalogger');
        return $query;
	}
    
    public function obtenerip()
	{
        $this->db->distinct();
        $this->db->select('M.idMembresia, ME.codigoSocio, D.codigoDatalogger, 
                        D.IP, M.puerto, M.codigoMedidor, M.idMedidor,
                        CONCAT(U.nombre, " ", U.primerApellido, " ", IFNULL(U.segundoApellido,""))  AS nombreSocio,
                        T.idTarifa, T.tarifaVigente');

        $this->db->from('datalogger D');
        $this->db->join('medidor M', 'D.idDatalogger = M.idDatalogger', 'inner');
        $this->db->join('membresia ME', 'M.idMembresia = ME.idMembresia', 'inner');
        $this->db->join('usuario U', 'U.idUsuario = ME.idUsuario', 'inner');
        $this->db->join('lectura L', 'M.idMedidor = L.idMedidor', 'inner');
        $this->db->join('tarifa T', 'L.idTarifa = T.idTarifa', 'inner');
        $this->db->where('D.estado', 1);
        $this->db->where('M.estado', 1);
        $this->db->where('D.IP IS NOT NULL');
        $this->db->where('M.puerto IS NOT NULL');
        $this->db->where('T.idTarifa = (SELECT MAX(idTarifa) FROM tarifa WHERE estado = "vigente")');
        $query = $this->db->get();

        // // Realizar primero una consulta más simple que sabemos que funciona
        // $this->db->select('datalogger.IP, datalogger.idDatalogger');
        // $this->db->from('datalogger');
        // $this->db->where('datalogger.estado', 1);
        
        // // Agregar el JOIN de la tabla medidor gradualmente
        // $this->db->join('medidor', 'datalogger.idDatalogger = medidor.idDatalogger', 'inner');
        
        // // Añadir la selección de puerto y codigoMedidor
        // $this->db->select('medidor.puerto, medidor.codigoMedidor, medidor.idMedidor');
        
        // // Agregar las condiciones adicionales
        // $this->db->where('datalogger.IP IS NOT NULL');
        // $this->db->where('medidor.puerto IS NOT NULL');
        
        // // Ejecutar la consulta
        // $query = $this->db->get();
        
        // Verificar si se encontraron resultados
        if ($query->num_rows() > 0) 
        {
            log_message('debug', 'Dataloggers encontrados: ' . json_encode($query->result_array()));
            return $query->result_array();
        }
        else 
        {
            log_message('debug', 'No se encontraron dataloggers activos.');
            return []; // Retorna un arreglo vacío si no hay resultados
        }
    }
    public function recuperarinfousuario($idDatalogger)
    {
        $this->db->select('D.IP, M.idMembresia');
        $this->db->from('datalogger D');
        $this->db->join('medidor M', 'D.idDatalogger = M.idDatalogger', 'inner');
        $this->db->where('M.estado', 1);
        $this->db->where('D.estado', 1);
        $this->db->where('D.idDatalogger', $idDatalogger);
        $query = $this->db->get();
        return $query->row();
    }

}
