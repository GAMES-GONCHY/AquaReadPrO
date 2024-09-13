<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medidor_model extends CI_Model
{
	public function habilitados()
    {
        $this->db->where('estado', 1);
        $query = $this->db->get('medidor');
        return $query;
    }
    public function deshabilitados()
    {
        $this->db->where('estado', 0);
        $query = $this->db->get('medidor');
        return $query;
    }
	public function agregar($data)
	{
		$this->db->insert('medidor', $data);
        return $this->db->insert_id();
	}
    public function modificar($idMedidor,$data)
	{
		$this->db->where('idMedidor', $idMedidor);
        $this->db->update('medidor',$data);

        return $this->db->affected_rows() > 0;
	}
}
