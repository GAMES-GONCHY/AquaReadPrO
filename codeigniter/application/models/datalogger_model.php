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
        // $this->db->select('datalogger.IP, medidor.puerto, medidor.codigoMedidor');
        // $this->db->from('datalogger');
        // $this->db->join('medidor', 'datalogger.idDatalogger=medidor.idDatalogger', 'inner');
        // $this->db->where('datalogger.estado', 1);
        // $this->db->where('datalogger.IP IS NOT NULL');
        // $this->db->where('medidor.puerto IS NOT NULL');
        
        // Realizar primero una consulta más simple que sabemos que funciona
        $this->db->select('datalogger.IP, datalogger.idDatalogger');
        $this->db->from('datalogger');
        $this->db->where('datalogger.estado', 1);
        
        // Agregar el JOIN de la tabla medidor gradualmente
        $this->db->join('medidor', 'datalogger.idDatalogger = medidor.idDatalogger', 'inner');
        
        // Añadir la selección de puerto y codigoMedidor
        $this->db->select('medidor.puerto, medidor.codigoMedidor, medidor.idMedidor');
        
        // Agregar las condiciones adicionales
        $this->db->where('datalogger.IP IS NOT NULL');
        $this->db->where('medidor.puerto IS NOT NULL');
        
        // Ejecutar la consulta
        $query = $this->db->get();
        
        // Verificar si se encontraron resultados
        if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        }
        else 
        {
            return []; // Retorna un arreglo vacío si no hay resultados
        }
    }

}
