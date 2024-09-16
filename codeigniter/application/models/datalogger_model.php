<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datalogger_model extends CI_Model
{
	public function habilitados()
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
}
