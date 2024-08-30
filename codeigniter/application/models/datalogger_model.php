<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datalogger_model extends CI_Model
{
	public function dataloggers()
    {
        $this->db->where('estado', 1);
        $query = $this->db->get('datalogger');
        return $query;
    }
    public function deshabilitados()
    {
        $this->db->where('estado', 0);
        $query = $this->db->get('datalogger');
        return $query;
    }
    public function modificar($id, $data)
	{
		// $data['idAutor']=$this->session->userdata('idUsuario');
		// $data['fechaActualizacion']=date('Y-m-d H:i:s');

		$this->db->where('idDatalogger', $id);
		$this->db->update('datalogger', $data);
	}
    public function deshabilitar($id, $data)
	{
		// $data['idAutor']=$this->session->userdata('idUsuario');
		// $data['fechaActualizacion']=date('Y-m-d H:i:s');
		
		$this->db->where('idDatalogger', $id);
		$this->db->update('datalogger', $data);
	}
    // public function agregar($data)
	// {
		
	// 	$this->db->insert('datalogger', $data);
	// }
	// public function agregar($data)
	// {
	// 	// Inserta los datos en la base de datos
	// 	$this->db->insert('datalogger', $data);

	// 	// devuelve true si la insercion fue exitosa, false sino lo fue
	// 	return $this->db->affected_rows() > 0;
	// }
	public function agregar($data)
	{
		$this->db->insert('ejemplo', $data);
	}
}
