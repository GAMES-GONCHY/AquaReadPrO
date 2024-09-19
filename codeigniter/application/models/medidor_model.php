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
    public function recuperarinfousuario($idMedidor)
	{
		$this->db->select('usuario.nombre, usuario.primerApellido');
        $this->db->from('medidor');
        $this->db->join('membresia', 'membresia.idMembresia = medidor.idMembresia', 'inner');
        $this->db->join('usuario', 'usuario.idUsuario = membresia.idUsuario', 'inner');
        $this->db->where('usuario.estado', 1);
        $this->db->where('medidor.idMedidor', $idMedidor);
        $query = $this->db->get();
        return $query->row();
	}
}
