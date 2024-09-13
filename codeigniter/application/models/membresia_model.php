<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membresia_model extends CI_Model
{
	public function membresia($idsocio)
    {
        $this->db->select('idMembresia');
		$this->db->from('membresia');
		$this->db->where('idUsuario', $idsocio);
		$query =$this->db->get();

        return $query->row()->idMembresia;
    }
}
