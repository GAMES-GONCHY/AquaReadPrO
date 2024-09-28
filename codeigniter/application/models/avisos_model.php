<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avisos_model extends CI_Model
{
	public function obtener_avisos_pendientes() 
    {
        $this->db->where('estado', 'pendiente');
        $query = $this->db->get('avisoCobranza');
        return $query->result_array();
    }

    public function actualizar_codigo_qr($idAviso, $codigoQR) 
    {
        $this->db->set('codigoQR', $codigoQR);
        $this->db->where('idAviso', $idAviso);
        $this->db->update('avisoCobranza');
    }
}
